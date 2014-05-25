<?php
add_theme_support( 'menus' );

load_theme_textdomain( 'default', TEMPLATEPATH.'/lang' );

wp_register_script( 'validator', get_bloginfo( 'template_directory') . '/js/validator.js', array( 'jquery' ), '1.0' );

wp_register_style( 'custom', get_bloginfo( 'template_directory') . '/css/custom.css' );

define( 'IMAGENS', get_bloginfo( 'template_directory') . '/images' );

register_nav_menu( 'main-menu', __('Main Menu') );

register_nav_menu( 'main-top', __('Menu Topo') );

// remover a versão do sistema
remove_action('wp_head', 'wp_generator');


/* ------------------------------------------------
   Register Sidebars
------------------------------------------------ */

register_sidebar( array(
	'name'          => __( 'Destaque' ),
	'id'            => 'side-destaque',
	'before_widget' => '<ul><li>',
	'after_widget'  => '</li></ul>',
	'before_title'  => '<h3 class="title">',
	'after_title'   => '</h3>')
);

register_sidebar( array(
	'name'          => __( 'Side Lateral' ),
	'id'            => 'my-sidebar',
	'before_widget' => '<ul><li>',
	'after_widget'  => '</li></ul>',
	'before_title'  => '<h3 class="title">',
	'after_title'   => '</h3>')
);

register_sidebar( array(
	'name'          => __( 'Coluna 1' ),
	'id'            => 'side-coluna-1',
	'before_widget' => '<ul><li>',
	'after_widget'  => '</li></ul>',
	'before_title'  => '<h3 class="title">',
	'after_title'   => '</h3>')
);register_sidebar( array(
	'name'          => __( 'Coluna 2' ),
	'id'            => 'side-coluna-2',
	'before_widget' => '<ul><li>',
	'after_widget'  => '</li></ul>',
	'before_title'  => '<h3 class="title">',
	'after_title'   => '</h3>')
);
register_sidebar( array(
	'name'          => __( 'Coluna 3' ),
	'id'            => 'side-coluna-3',
	'before_widget' => '<ul><li>',
	'after_widget'  => '</li></ul>',
	'before_title'  => '<h3 class="title">',
	'after_title'   => '</h3>')
);register_sidebar( array(
	'name'          => __( 'Coluna 4' ),
	'id'            => 'side-coluna-4',
	'before_widget' => '<ul><li>',
	'after_widget'  => '</li></ul>',
	'before_title'  => '<h3 class="title">',
	'after_title'   => '</h3>')
);

// Widgets
// include("functions/widgets/widget-tweets.php");
include('functions/widgets/widget-facebook.php');
// include('functions/widgets/widget-plus.php');
// include('functions/widgets/widget-rss.php');
include('functions/widgets/widget-artigos-populares.php');
// include('functions/demo.php');
// Theme Settings

add_filter('user_contactmethods', 'social_user_contactmethods');

function social_user_contactmethods($user_contactmethods){
  	$user_contactmethods['twitter'] = 'Twitter';
  	$user_contactmethods['facebook'] = 'Facebook';
	$user_contactmethods['plus'] = 'Google Plus';
  	return $user_contactmethods;
}

// Chamar arquivos do Custom Post Types
$child_theme_path = pathinfo(__FILE__);
$functions_path = $child_theme_path["dirname"].'/functions/';

// Custom Post Types
//require_once($functions_path . 'custom-post-types.php');


// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );

add_image_size( 'thumbnail', 100, 100, true );

// alterar tamanho dos resumos  e link somente no leia mais
add_post_type_support('page','excerpt');

function tamanho_do_resumo() {
	return 25;
}

add_filter( 'excerpt_length', 'tamanho_do_resumo' );

function leia_mais() {
return '... <div class="leiamais"><a href="'. get_permalink( $post->ID ) . '" title="'. get_the_title( $post->ID ) .'">Leia mais...</a></div>';
}

add_filter( 'excerpt_more', 'leia_mais' );

//Adiciona links para feeds automaticamente
add_theme_support('automatic-feed-links');

add_action( 'login_head', 'leoartes_custom_login' );
function leoartes_custom_login() {
    echo '<link media="all" type="text/css" href="'.get_template_directory_uri().'/css/login-style.css" rel="stylesheet">';
}

add_filter('login_headerurl', 'leoartes_custom_wp_login_url');
function leoartes_custom_wp_login_url() {
	return home_url();
}

add_filter('login_headertitle', 'leoartes_custom_wp_login_title');
function leoartes_custom_wp_login_title() {
	return get_option('blogname');
}


// função breadcrumb
function the_breadcrumb() {
	if (!is_home()) {
		echo '<div class="breadcrumb">';
		echo '<b>Você está aqui:</b> ';
		echo '<a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo "</a> | ";
		if (is_category() || is_single()) {
			the_category('title_li=');
			if (is_single()) {
				echo " » ";
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
		}
		echo '</div>';
	}
}


// muestra tercera fila de iconos al editor visual
function add_more_buttons($buttons) {
$buttons[] = 'hr';
$buttons[] = 'del';
$buttons[] = 'sub';
$buttons[] = 'sup';
$buttons[] = 'fontselect';
$buttons[] = 'fontsizeselect';
$buttons[] = 'cleanup';
$buttons[] = 'styleselect';
return $buttons;
}
add_filter("mce_buttons_3", "add_more_buttons");

// Alterar footer do admin
function remove_footer_admin () {
  echo 'Customizado por <a href="http://www.leoartes.com.br" target="_blank">Léo Artes - Comunicação & Web</a>.';
}
add_filter('admin_footer_text', 'remove_footer_admin');

function wps_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    // $wp_admin_bar->remove_menu('view-site');
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );

/* Add Author Box */
function add_autor_box_escola() {
	$author_box = '<div id="authorarea">';
 	$author_box .= get_avatar(get_the_author_meta('email'), '100' );
 	$author_name = get_the_author();
 	$author_desc = get_the_author_meta('description');

	$author_box .= '<div class="author_social">';
	if (get_the_author_meta('facebook') <> ''){
		$author_box .= '<a href="http://facebook.com/'. get_the_author_meta('facebook') .'"><img src="'. get_bloginfo('template_directory') . '/images/facebook-author.png" alt="facebook" /></a>';	
	}
	if (get_the_author_meta('twitter') <> ''){
		$author_box .= '<a href="http://twitter.com/'. get_the_author_meta('twitter') .'"><img src="'. get_bloginfo('template_directory') . '/images/twitter-author.png" alt="twitter" /></a>';	
	}
	if (get_the_author_meta('plus') <> ''){
		$author_box .= '<a href="http://plus.google.com/'. get_the_author_meta('google_plus') .'"><img src="'. get_bloginfo('template_directory') . '/images/plus-author.png" alt="google plus" /></a>';	
	}
	$author_box .= '</div>';

 	$author_box .= '
		<div class="authorinfo">
			<h3>' . $author_name . '</h3>';
		
	$author_box .= $author_desc . '</div>
		</div>';
    	return $author_box;
}



// Esconder Menu Help
function hide_help() {
    echo '<style type="text/css">
            #contextual-help-link-wrap { display: none !important; }
          </style>';
}
add_action('admin_head', 'hide_help');

//Post format
if( function_exists( 'add_theme_support' ) ) {

   // Adiciona suporte a Post Formats
   add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'video', 'audio' ) );

   if( function_exists( 'add_post_type_support' ) ) {
      // Atribui Post Formats aos Posts
      add_post_type_support( 'post', 'post-formats' );
	  add_post_type_support( 'page', 'post-formats' );
   }
} 

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );

add_image_size( 'niver', 50, 50, true); //600 pixels wide (and unlimited height)

add_image_size( 'miniatura', 75, 75, true); //600 pixels wide (and unlimited height)

add_image_size( 'thumb-gallery', 150, 150, true); //600 pixels wide (and unlimited height)

set_post_thumbnail_size( 100, 100, true );


// tamanho diferente para as mídias
if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'tamanho_ideal', 600, 9999); //600 pixels wide (and unlimited height)
}

add_filter('image_size_names_choose', 'meu_tamanho_padrao');

function meu_tamanho_padrao($sizes) {
$addsizes = array("tamanho_ideal" => __( "Tamanho Ideal")
);
$newsizes = array_merge($sizes, $addsizes);
return $newsizes;
}

/* auto set post thumbnail */	  
// define imagem destacada a todos os posts já existentes
add_action('the_post', 'imwboiuna_autoset_featured');
// define imagem destacada ao salvar o post
add_action('save_post', 'imwboiuna_autoset_featured');
// define imagem destacada ao salvar um post como "rascunho"
add_action('draft_to_publish', 'imwboiuna_autoset_featured');
// define imagem destacada ao publicar um post
add_action('new_to_publish', 'imwboiuna_autoset_featured');
add_action('pending_to_publish', 'imwboiuna_autoset_featured');
add_action('future_to_publish', 'imwboiuna_autoset_featured');

function imwboiuna_autoset_featured() {
  global $post;
  $already_has_thumb = has_post_thumbnail($post->ID);

  if (!$already_has_thumb)  {

	 $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );

         if ($attached_image) { // verifica se existe anexo

                foreach ($attached_image as $attachment_id => $attachment) {
	             set_post_thumbnail($post->ID, $attachment_id);
		}

	 } else { // se não houver, vamos usar uma imagem padrão

                 set_post_thumbnail($post->ID, 172); // onde '504' é o ID da imagem padrão
         }
  }

}

// Carregar scripts no Rodapé

remove_action('wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_enqueue_scripts', 1);
add_action('wp_footer', 'wp_print_scripts', 5);
add_action('wp_footer', 'wp_enqueue_scripts', 5);
add_action('wp_footer', 'wp_print_head_scripts', 5);

// Lista de posts com cores diferentes de acordo com o status
add_action('admin_footer','posts_status_color');
function posts_status_color(){
?>
<style>
.status-draft{background: #FCE3F2 !important;}
.status-pending{background: #87C5D6 !important;}
.status-publish{/* Nenhum background. Manter as cores alternadas */}
.status-future{background: #C6EBF5 !important;}
.status-private{background:#F2D46F;}
</style>
<?php
}

// paginação do wordpress

function post_pagination($pages = '', $range = 5)
{
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='paginacao'><span>P&aacute;ginas</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."' class='current'>&laquo;</a>";
         if($paged > 6 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>1</a> <span class='current'>...</span>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<span class='current'>...</span> <a href='".get_pagenum_link($pages)."'>$pages</a>";
         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."' class='current'>&raquo;</a>";
         echo "</div>\n";
     }
}

//funcção copyright
function comicpress_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "© " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}

if ( ! function_exists( 'toolbox_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own toolbox_posted_on to override in a child theme
 *
 * @since Toolbox 1.2
 */
function toolbox_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'toolbox' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'toolbox' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;

//limitar carecteres em um titulo
function title_limite($maximo) {
$title = get_the_title();
if ( strlen($title) > $maximo ) {
$continua = '...';
}
$title = mb_substr( $title, 0, $maximo, 'UTF-8' );
echo $title.$continua;
}
?>
