<div>
	<h3 class="title">Mais Artigos e Notícias</h3>
		<?php query_posts('showposts=10');
		if ( have_posts() ) : while ( have_posts() ) : the_post();?>
		<div>
			<?php $mb_date = explode( '/', get_the_date( 'd/m' ) ); ?>
			<?php echo implode( '/', $mb_date ); ?> - <a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title() ); ?>"><?php title_limite(35); ?></a>
		</div>
<?php endwhile; else: ?>
<?php endif; wp_reset_query;?>
 </div>