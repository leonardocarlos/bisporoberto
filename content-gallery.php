<article >
	<?php if ( have_posts() ): while( have_posts() ): the_post(); ?>
<section>
	<div class="post">
  <aside>
  <a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title() ); ?>">
          <?php if( has_post_thumbnail() )
                        the_post_thumbnail('thumb-gallery', array('class' => 'thumbnail'));
                      else
                echo '<img src="' . get_bloginfo( 'template_url') . '/images/thumbnail.png" class="thumbnail" alt="Imagem não disponível" />';
           ?>
</a>
	<Small><?php // the_title(); ?></small>
  </aside>  <!-- .thumbnail -->


					</div><!-- .post -->

</section>
					<?php endwhile; ?>	<?php else: ?>
				<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->