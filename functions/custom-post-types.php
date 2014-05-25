<?php
/* Post Type Videos */

add_action('init', 'videos_register');
function videos_register() {
     $labels = array(
	    'name' => _x('Videos', 'post type general name'),
	    'singular_name' => _x('Video', 'post type singular name'),
	    'add_new' => _x('Cadastrar novo', 'edital item'),
	    'add_new_item' => __('Cadastrar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Cadastrar novo'),
	    'view_item' => __('Visualizar'),
	    'search_items' => __('Procurar'),
	    'not_found' =>  __('Nada encontrado'),
	    'not_found_in_trash' => __('Nada enontrado na lixeira'),
	    'parent_item_colon' => ''
	);
    $args = array(
	   'labels' => $labels,
	   'public' => true,
	   'publicly_queryable' => true,
	   'show_ui' => true,
	   'show_in_menu' => true,
	   'query_var' => true,
	   'rewrite' => array('slug'=>'videos','with_front'=>true),
	   'capability_type' => 'post',
	   'has_archive' => true,
	   'hierarchical' => false,
	   'menu_position' => 5,
//	   'register_meta_box' => 'video_meta_box',
	   'menu_icon' => IMAGENS . '/film.png',
	   'supports' => array( 'title', 'excerpt')
      );
    register_post_type('videos',$args);

}

// Custom Post Aniversariantes

add_action('init', 'niver_register');
function niver_register() {
     $labelsniver = array(
	    'name' => _x('Aniversariantes', 'post type general name'),
	    'singular_name' => _x('Aniversariante', 'post type singular name'),
	    'add_new' => _x('Cadastrar novo', 'edital item'),
	    'add_new_item' => __('Cadastrar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Cadastrar novo'),
	    'view_item' => __('Visualizar'),
	    'search_items' => __('Procurar'),
	    'not_found' =>  __('Nada encontrado'),
	    'not_found_in_trash' => __('Nada enontrado na lixeira'),
	    'parent_item_colon' => ''
	);
    $argsniver = array(
	   'labels' => $labelsniver,
	   'public' => true,
	   'publicly_queryable' => true,
	   'show_ui' => true, 
	   'show_in_menu' => true, 
	   'query_var' => true,
	   'rewrite' => array('slug'=>'aniversariantes','with_front'=>false),
	   'capability_type' => 'post', 
	   'has_archive' => true, 
	   'hierarchical' => false,
	   'menu_position' => 5,
//	   'register_meta_box' => 'niver_meta_box',
	   'menu_icon' => IMAGENS . '/bolo.png',
	   'supports' => array( 'title', 'thumbnail')
      );
    register_post_type('aniversariantes',$argsniver);

}

// Exibir Lista de Aniversariantes
add_action("manage_posts_custom_column",  "niver_custom_columns");
add_filter("manage_niver_posts_columns", "niver_edit_columns");

function niver_edit_columns($columns){
$columns = array(
"cb" => "<input type=\"checkbox\" />",
"title" => "Nome",
"niver_date" => "Data Aniversario",
//"event_location" => "Location",
//"event_city" => "City",
);
return $columns;
}

function niver_custom_columns($column){
global $post;
$custom = get_post_custom();

switch ($column) {
case "niver_date":
echo format_date($custom["niver_date"][0]) //. '<br /><em>' .
//$custom["event_start_time"][0] . ' - ' .
//$custom["event_end_time"][0] . '</em>'
;
break;
/*
case "event_location":
echo $custom["event_location"][0];
break;

case "event_city":
echo $custom["event_city"][0];
break;
*/
}
}

function format_date($unixtime) {
    return date("d", $unixtime)."/".date("m", $unixtime)."/".date("Y", $unixtime);
}

// Colunas Classificaveis
add_filter("manage_edit-niver_sortable_columns", "niver_date_column_register_sortable");
add_filter("request", "niver_date_column_orderby" );

function niver_date_column_register_sortable( $columns ) {
$columns['niver_date'] = 'niver_date';
return $columns;
}

function niver_date_column_orderby( $vars ) {
if ( isset( $vars['orderby'] ) && 'niver_date' == $vars['orderby'] ) {
$vars = array_merge( $vars, array(
'meta_key' => 'niver_date',
'orderby' => 'meta_value_num'
) );
}
return $vars;
}

// Editar Aniversariantes
add_action("admin_init", "niver_admin_init");

function niver_admin_init(){
add_meta_box("niver_meta", "Data de Aniversario", "niver_details_meta", "aniversariantes", "normal", "default");
}

function niver_details_meta() {

$ret = '<p><label>Date de Aniversário: </label><input type="date" name="niver_date" value="' . format_date(get_niver_field("niver_date")) . '" /><em>(dd/mm/yyyy)</em></p>';

echo $ret;
}

function get_niver_field($niver_field) {
global $post;

$custom = get_post_custom($post->ID);

if (isset($custom[$niver_field])) {
return $custom[$niver_field][0];
}
}


// Salvando detalhes do Aniversário

add_action('save_post', 'save_niver_details');

function save_niver_details(){
global $post;

if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
return;

if ( get_post_type($post) == 'Aniversariante')
return;

if(isset($_POST["niver_date"])) {
update_post_meta($post->ID, "niver_date", strtotime($_POST["niver_date"]));
}

}

function save_niver_field($niver_field) {
global $post;

if(isset($_POST[$niver_field])) {
update_post_meta($post->ID, $niver_field, $_POST[$niver_field]);
}
}

// Exibir Eventos

add_shortcode( 'aniversariantes', 'get_niver_shortcode' );

function get_niver_shortcode($atts){
global $post;

// get shortcode parameter for daterange (can be "current" or "past")
extract( shortcode_atts( array(
'daterange' => 'proximo',
), $atts ) );

ob_start();

// prepare to get a list of events sorted by the event date
$args = array(
'post_type' => 'aniversariantes',
'orderby'   => 'niver_date',
'meta_key'  => 'niver_date',
'order'     => 'ASC'
);

query_posts( $args );

$niver_found = false;

// build up the HTML from the retrieved list of events
if ( have_posts() ) {
while ( have_posts() ) {
the_post();
$niver_date = get_post_meta($post->ID, 'niver_date', true);

switch ($daterange) {
case "proximo":
if ($niver_date >= time() ) {
echo get_niver_container();
$niver_found = true;
}
break;

case "passados":
if ($niver_date < time() ) {
echo get_past_niver_summary();
$niver_found = true;
}
break;
}
}
}

wp_reset_query();

if (!$niver_found) {
echo "<p>Aniversariante não encontrado.</p>";
}

$output_string = ob_get_contents();
ob_end_clean();

return $output_string;
}

function get_niver_container() {
global $post;
$ret = '<section>';
$ret =  $ret . get_niver_calendar_icon() . '<section>';
$ret = $ret .  get_niver_details(false, true);
$ret =  $ret . '</section></section>';

return $ret;
}

function get_past_niver_summary() {
global $post;
$ret = '<section>';
$ret = $ret . format_date(get_post_meta($post->ID, 'niver_date', true)) . ' - ';
$ret =  $ret .  $post->post_title . '';
$ret =  $ret . '</section>';

return $ret;
}

// Exibir Eventos Individuais

function get_niver_calendar_icon() {
global $post;
$unixtime = get_post_meta($post->ID, 'niver_date', true);
$month = date("m", $unixtime);
$day = date("d", $unixtime);
//$year = date("Y", $unixtime);
//return  '<div>' . $day . '<em>' . $month . '</em></div>';
}

function get_niver_details($include_register_button, $include_title) {
global $post;
$unixtime = get_post_meta($post->ID, 'niver_date', true);

$ret = '';
$ret = $ret . date("d/m", $unixtime) . ' - ';
if ($include_title) {
$ret =  $ret . $post-> post_title;
}


if (!empty($register_url) && $include_register_button && $unixtime > time()) {
$ret = $ret .'<a href="' . $register_url . '">register</a>';
}

return $ret;
}

function format_possibly_missing_metadata($field_name) {
global $post;
$field_value = get_post_meta($post->ID, $field_name, true);

if (!empty($field_value)) {
return $field_value.'';
}
}
?>