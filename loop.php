<?php 
if ( has_post_format( 'video' ) ) {
   // Include com layout para videos
   include( TEMPLATEPATH . '/content-video.php' );

}elseif ( has_post_format( 'gallery' ) ) {
   // Include com layout para Galerias
   include( TEMPLATEPATH . '/content-gallery.php' );

}elseif ( has_post_format( 'aside' ) ) {
   // Include com layout para Notas
    include( TEMPLATEPATH . '/content-single.php' );

}elseif ( has_post_format( 'quote' ) ) {
   // Include com layout para Notas
    include( TEMPLATEPATH . '/content-niver.php' );	
   
} else {

// include( TEMPLATEPATH . '/content-single.php' );

get_template_part( 'content', get_post_format() );

}?>  
