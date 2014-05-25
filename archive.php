<?php get_header(); ?>
<div id="container">
				<div id="content">
<?php the_breadcrumb(); ?><br />
					<h1 id="archive">
						<?php
						if ( is_day() )
							printf( __( 'Arquivo do Dia: <span>%s</span>' ) , get_the_date() );
						else if ( is_month() )
							printf( __( 'Arquivo do Mês: <span>%s</span>' ) , get_the_date( 'F Y' ) );
						else if ( is_year() )
							printf( __( 'Arquivos do Ano: <span>%s</span>' ) , get_the_date( 'Y' ) );
						else if ( is_tag() )
							printf( __( 'Tags: <span>%s</span>' ) , single_tag_title( '', false ) );
						else if ( is_category() )
							printf( __( 'Categoria: <span>%s</span>' ) , single_cat_title( '', false ) );
						else if ( is_author() ){
							$author = get_userdata( $_GET['author'] );
							printf( __( 'Autor: <span>%s</span>' ) , $author->display_name  );
						}
						else
							_e( 'Arquivos do Blog' );
						?>
					</h1>
					<?php get_template_part('loop'); ?>
				</div><!-- #content -->

<?php get_sidebar(); get_footer(); ?>