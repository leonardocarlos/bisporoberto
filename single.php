<?php get_header(); ?>
<div id="container">
				<div id="content">
<?php the_breadcrumb(); ?><br />
				<?php if ( have_posts() ):
					while( have_posts() ): the_post(); ?>

					<div class="post">
						<h1><a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title() ); ?>"><?php the_title(); ?></a></h1>

						<div class="entry-meta">
							<p><?php _e( 'Write on' ); ?>:
								<?php $mb_date = explode( '/', get_the_date( 'd/m/Y' ) ); ?>
								<a href="<?php echo get_month_link( $mb_date[2], $mb_date[1] ); ?>" title="<?php echo implode( '/', $mb_date ); ?>"><?php the_date(); ?></a> <?php _e( 'by' ); ?>
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php printf( esc_attr__( 'More posts from %s' ), get_the_author() ); ?>"><?php the_author(); ?></a>
								<?php comments_popup_link( __( 'Leave a comment' ), __( '1 Comment' ), __( '% Comments' ), 'comments', __( 'Comments are close.' ) ); ?>
							</p>
						</div>

						<div class="entry">
							<?php the_content(); ?>
						</div>


						<div class="post-utility">
							<p>
								<?php _e( 'Posted on' ); ?>:
								<?php
								if ( get_the_category() )
									echo get_the_category_list( ', ' );
								else
									_e( 'Without category' );

								echo ' | ' . __( 'Tags' );?>:
								<?php
								if ( !get_the_tags() )
									_e( 'Without tags' );
								else
									echo get_the_tag_list( '', ', ' );
								?>
							</p>
						</div>

					</div><!-- .post -->
					<!-- Links de Compartilhamento -->

<a href="https://twitter.com/share" class="twitter-share-button" data-via="imwedsonpassos" data-lang="pt">Tweetar</a>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-width="200" data-show-faces="false" data-font="segoe ui"></div>

<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><g:plusone></g:plusone>

					<?php comments_template(); ?>

					<?php endwhile; ?>
				<?php else: ?>
					<?php get_template_part('no-results'); ?>
				<?php endif; ?>
				</div>

<?php get_sidebar(); get_footer(); ?>