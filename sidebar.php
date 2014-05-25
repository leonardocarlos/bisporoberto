	<div id="sidebar">
	<div id="redes">
		<a href="http://www.facebook.com/bisporobertoamaral" target="_blank" title="Acesse nosso Facebook"><img src="<?php echo IMAGENS . '/facebook.png'; ?>" width="31" height="31" alt=""/></a>
        <a href="#" target="_blank" title="Faça parte de nosso Círculo"><img src="<?php echo IMAGENS . '/googleplus.png'; ?>" width="31" height="31" alt=""/></a>
		<a href="http://www.youtube.com/user/535Bra" target="_blank" title="Acesse nosso canal do Youtube"><img src="<?php echo IMAGENS . '/youtube.png'; ?>" width="31" height="31" alt=""/></a>
		<a href="<?php bloginfo( 'rss2_url' ); ?>" target="_blank" title="Assine nossa RSS"><img src="<?php echo IMAGENS . '/rss.png'; ?>" width="32" height="32" alt=""/></a>
	</div>
	<br><br>
		<?php get_search_form(); ?>
 		<?php //BibliaOnline::formBiblia(); ?>

 		<?php if ( !dynamic_sidebar( 'my-sidebar' ) ) : ?>
					<ul>
						<li><h3><?php _e( 'Archive' ); ?></h3></li>
						<li>
							<ul>
								<?php wp_get_archives(); ?>
							</ul>
						</li>
					</ul>
					<?php endif; ?>

	</div><!-- #sidebar -->
