<?php /* Template Name: Aniversariantes */ ?>
<?php get_header(); ?>
<div id="container">
<div id="content-full">
<?php the_breadcrumb(); ?><br />	 

<div class="post">
        <h1>Aniversariantes</h1>
                        
     <?php /* Loop the stuff from the aniversariante post type */
          $newsArgs = array( 'post_type' => 'aniversariantes', 'posts_per_page' => 50 );
          $newsLoop = new WP_Query( $newsArgs );
          while ( $newsLoop->have_posts() ) : $newsLoop->the_post();?>
		
    		<div class="fl">
			  <?php  if( has_post_thumbnail() )
                            the_post_thumbnail('thumb-gallery', array('class' => 'thumbnail'));
                          else 
                    echo '<img src="' . get_bloginfo( 'template_url') . '/images/thumbnail.png" width="150" height="150" class="thumbnail" alt="Imagem não disponível" />';
               ?>     
                     <p class="center"><strong><?php echo get_niver_details(true, false); ?> </strong><br/><small> <?php the_title(); ?></small> </p>
			</div>  <!-- .thumbnail -->     


                  
     <?php endwhile;?>
                 <?php post_pagination();?>
     </div><!-- .post -->

     </div><!-- content-full -->
     
<?php get_footer(); ?>