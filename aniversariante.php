<aside>
        <h3 class="title">Aniversariantes do Mês</h3>

     <?php /* Loop the stuff from the aniversariante post type */
          $newsArgs = array( 'post_type' => 'aniversariantes', 'posts_per_page' => 12 );
          $newsLoop = new WP_Query( $newsArgs );
          while ( $newsLoop->have_posts() ) : $newsLoop->the_post();?>

    		<div class="fl">
            <a href="<?php bloginfo( 'url' ); ?>/aniversariantes/" title="<?php echo get_niver_details(true, false); ?> - <?php the_title(); ?>">
					<?php  if( has_post_thumbnail() )
								  the_post_thumbnail('niver', array('class' => 'thumbnail'));
								else
						  echo '<img src="' . get_bloginfo( 'template_url') . '/images/thumbnail.png" width="50" height="50" class="thumbnail" alt="Imagem não disponível" />';
					 ?>  </a>
			</div>  <!-- .thumbnail -->

     <?php endwhile;?>

<br/>
<a href="<?php bloginfo( 'url' ); ?>/aniversariantes/">Veja mais</a>

</aside>