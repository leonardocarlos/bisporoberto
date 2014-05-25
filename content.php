				<?php if ( have_posts() ):
					while( have_posts() ): the_post(); ?>

					<div class="post">
						<h1><a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title() ); ?>"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php //toolbox_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
			<aside>
					<?php if( has_post_thumbnail() )
								  the_post_thumbnail('miniatura', array('class' => 'thumbnail'));
								else
						  echo '<img src="' . get_bloginfo( 'template_url') . '/images/thumbnail.png" class="thumbnail" alt="Imagem não disponível" />';
					 ?>
			</aside>  <!-- .thumbnail -->
						<div class="entry-meta">
							<p><?php _e( 'Write on' ); ?>:
								<?php $mb_date = explode( '/', get_the_date( 'd/m/Y' ) ); ?>
								<span><a href="<?php echo get_month_link( $mb_date[2], $mb_date[1] ); ?>" title="<?php echo implode( '/', $mb_date ); ?>"><?php the_date(); ?></a></span> <?php _e( 'by' ); ?>
								<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php printf( esc_attr__( 'More posts from %s' ), get_the_author() ); ?>"><?php the_author(); ?></a></span>
							</p>
						</div>

						<div class="entry">
							<?php the_excerpt(); ?>
						</div>

						<div class="post-utility">
							<p>
								<?php _e( 'Posted on' ); ?>:
								<?php
								if ( get_the_category() )
									echo get_the_category_list( ', ' );
								else
									_e( 'Without category' );

								echo ' - ' . __( 'Tags' );?>:
								<?php
								if ( !get_the_tags() )
									_e( 'Without tags' );
								else
									echo get_the_tag_list( '', ', ' );
								?>
							</p>
						</div>

					</div><!-- .post -->

					<?php endwhile; ?>

					<?php post_pagination();?>

				<?php else: ?>
					<?php get_template_part('no-results'); ?>
				<?php endif; ?>
