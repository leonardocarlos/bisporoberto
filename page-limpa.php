<?php /* Template Name: Página Limpa */ ?>
<?php get_header(); ?>
<div id="container">
				<div id="content-full">
<?php the_breadcrumb(); ?><br />  					
				<?php if ( have_posts() ):
					while( have_posts() ): the_post(); ?>
					
					<div class="post">
						<h1><a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title() ); ?>"><?php the_title(); ?></a></h1>

												
						<div class="entry"> 
							<?php the_content(); ?>
						</div> 
						
					</div><!-- .post -->

					<!-- Links de Compartilhamento -->

<a href="https://twitter.com/share" class="twitter-share-button" data-via="nazarenoedsonpa" data-lang="pt">Tweetar</a>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-width="200" data-show-faces="false" data-font="segoe ui"></div>

<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><g:plusone></g:plusone>                                      

					<?php endwhile; ?>
				<?php else: ?>
					<?php get_template_part('no-results'); ?>
				<?php endif; ?>
				</div>

<?php get_footer(); ?>