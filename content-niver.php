<article>
<div class="post">
        <h1><a href="#">Aniversariantes</a></h1>

     <?php /* Loop the stuff from the aniversariante post type */
          $newsArgs = array( 'post_type' => 'aniversariante', 'posts_per_page' => 10 );
          $loop = new WP_Query( $newsArgs );
          while ( $newsLoop->have_posts() ) : $newsLoop->the_post();?>
<div id="loop">
	<div id="data">
		<?php // $mb_date = explode( ' ', get_the_date( 'd  M' ) ); ?>
		<?php // echo implode( ' ', $mb_date ); ?>
	</div>
    <div>
    <a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title() ); ?>" rel="bookmark"><?php the_title(); ?></a>
    <p>
    <?php echo get_post_meta($post -> ID, 'valor_meta', true);?>
    </p>
    </div>
			<div id='thumbnail'>
					<?php /* if( has_post_thumbnail() )
								  the_post_thumbnail('miniatura', array('class' => 'thumbnail'));
								else 
						  echo '<img src="' . get_bloginfo( 'template_url') . '/images/thumbnail.png" width="75" height="75" class="thumbnail" alt="Imagem não disponível" />';
					*/ ?>
			</div>  <!-- .thumbnail -->
    <div id="resumo">

    </div>
    </div>
     <?php endwhile;?>

     </div><!-- .post -->

</article><!-- #post-<?php the_ID(); ?> -->