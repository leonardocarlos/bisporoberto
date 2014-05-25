<?php get_header(); ?>

<div id="container">
<!--
<div id="destaques">
    <?php //if (function_exists('nivoslider4wp_show')) { nivoslider4wp_show(); } ?>
</div>
<div id="destaques2">
	<?php // dynamic_sidebar( 'side-destaque' )  ?>
</div>
-->
<div id="bemvindo">
  <h3>Seja bem vindo ao nosso Blog</h3>
</div>
	<div id="redes">
		<a href="http://www.facebook.com/bisporobertoamaral" target="_blank" title="Acesse nosso Facebook"><img src="<?php echo IMAGENS . '/facebook.png'; ?>" width="31" height="31" alt=""/></a>
        <a href="#" target="_blank" title="Faça parte de nosso Círculo"><img src="<?php echo IMAGENS . '/googleplus.png'; ?>" width="31" height="31" alt=""/></a>
		<a href="http://www.youtube.com/user/535Bra" target="_blank" title="Acesse nosso canal do Youtube"><img src="<?php echo IMAGENS . '/youtube.png'; ?>" width="31" height="31" alt=""/></a>
		<a href="<?php bloginfo( 'rss2_url' ); ?>" target="_blank" title="Assine nossa RSS"><img src="<?php echo IMAGENS . '/rss.png'; ?>" width="32" height="32" alt=""/></a>
	</div>


				<div id="content-full">
					<div id="middle">
						<div id="coluna1">
							<?php get_template_part('loop1'); ?>
                        </div>
                    	<div id="coluna2">
                        	<?php dynamic_sidebar( 'side-coluna 4' )  ?>
                            <?php get_template_part('noticias'); ?>
                        <div>
                            <h3 class="title">Ouça o Bispo</h3>
                                <?php query_posts('cat=29&showposts=5');
                                if ( have_posts() ) : while ( have_posts() ) : the_post();?>
                                <div>
                                    <?php $mb_date = explode( '/', get_the_date( 'd/m' ) ); ?>
                                    <?php echo implode( '/', $mb_date ); ?> - <a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title() ); ?>"><?php title_limite(35); ?></a>
                                </div>
                        <?php endwhile; ?>
                        <?php post_pagination();?>
                        <?php else: ?>
                        <?php endif; wp_reset_query;?>
                         </div>
                        </div>
					</div>
                                    <!-- colunas -->
                                    <div id="sidebottom1">
                                    <div id="col1">
                                    <?php // get_template_part('aniversariante'); ?>
                                      <div class="cls"  ></div>
                                        <?php dynamic_sidebar( 'side-coluna 1' )  ?>
                                    </div>
                                    <div id="col2">
                                        <?php dynamic_sidebar( 'side-coluna 2' )  ?>
                                    </div>
                                    <div id="col3">
                                        <?php dynamic_sidebar( 'side-coluna 3' )  ?>
                                    </div>
                                    </div>
                                    <br /><br />
								<?php // if(function_exists( 'wp_bannerize' ))	wp_bannerize( 'random=1' ); ?>
				</div><!-- #content -->
<?php get_footer(); ?>