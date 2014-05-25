<div>
	<?php query_posts('showposts=4');
		if ( have_posts() ) : while ( have_posts() ) : the_post();?>
<div id="loop">
	<div id="data">
		<?php $mb_date = explode( ' ', get_the_date( 'd  M' ) ); ?>
		<?php echo implode( ' ', $mb_date ); ?>
	</div>
			<div id='thumbnail'>
					<?php if( has_post_thumbnail() )
								  the_post_thumbnail('miniatura', array('class' => 'thumbnail'));
								else
						  echo '<img src="' . get_bloginfo( 'template_url') . '/images/thumbnail.png" width="75" height="75" class="thumbnail" alt="Imagem não disponível" />';
					 ?>
			</div>  <!-- .thumbnail -->
    <div id="resumo">
    	<h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title() ); ?>" rel="bookmark"><?php title_limite(32); ?></a></h3>

          <?php the_excerpt(15); ?>
    </div>
    </div>
<?php endwhile; else: ?>
<?php endif; wp_reset_query;?>
 </div>