<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
	<meta charset="<?php bloginfo('charset') ?>" />
	<title><?php wp_title('-', true, 'right'); bloginfo()?></title>

    <!-- Favicon: Browser + iPhone Webclip -->
    <link rel="shortcut icon" href="<?php echo IMAGENS . '/favicon.ico'; ?>" />
    <link rel="apple-touch-icon" href="<?php echo IMAGENS . '/iphone.png'; ?>" />

	<meta name="keywords" content="..." />
	<meta name="viewport" content="width=device-width; initial-scale=1"/><?php /* Adicionar "máxima escala = 1" para corrigir o bug Mobile Safari auto-zoom sobre as mudanças de orientação, mas tenha em mente que ele irá desativar completamente user-zoom. Ruim para a acessibilidade. */ ?>

	<!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet/less" href="<?php bloginfo('template_url') ?>/css/estilo.less" />
	<link rel="stylesheet/less" href="<?php bloginfo('template_url') ?>/css/mobile.less" media="screen and (max-width: 480px)" />

	<!-- LESS -->
	<script src="<?php bloginfo('template_url') ?>/js/less-1.3.0.min.js"></script>

	<!-- RSS & Atom -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo() ?> - RSS" href="<?php bloginfo('rss2_url') ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo() ?> - Atom" href="<?php bloginfo('atom_url') ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo( 'rss_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Concert+One' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
            <!--<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>-->

<script type="text/javascript">
jQuery.noconflict();
</script>
		<?php
		wp_enqueue_script( 'jquery' );  /* Carrega jQuery se não tiver já sido carregado */

		if ( is_singular() && get_option( 'thread_comments' ) ){
			wp_enqueue_script( 'comment-reply' );
			wp_enqueue_script( 'validator' );
		}
		?>
	<?php /* O Shim HTML5 é necessário para navegadores mais antigos, versões mais antigas, principalmente IE */ ?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?> <?php /* este é usado por muitas características Wordpress e plugins para trabalhar proporly */ ?>
</head>
	<body <?php body_class() ?>>

		<div id="page-wrap">

			<div id="header">
                            <div class="logo">
                                <a href="<?php bloginfo( 'url' ); ?>"><img src="<?php echo IMAGENS . '/bisporoberto.png'; ?>" width="229" height="237" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>"/></a>  <br/>
                            </div>
            <div id="slogan"><img src="<?php echo IMAGENS . '/slogan.png'; ?>" width="512" height="173" alt=""/> </div>
		<div id="links_bar">
			<?php wp_nav_menu('theme_location=main-top'); ?>
		</div>
			</div>