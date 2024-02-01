<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<?php require "language.php"; ?>
<head>
	<meta name="google-site-verification" content="7GXAYXgBpNE7QOL3ehXO0nRA0ISiVOUT3sVuNigpwQ0" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class();?> >
<div class="globalWrap">
	<header class="Fixed masterHead">
		<div class="bodyHeader">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 noPaddingRight">
						<a class="logoHeaderLink" href="<?php echo home_url(); ?>">
							<?php
							$custom_post = pods('page', icl_object_id(10, 'page', true));
							$galeria = $custom_post->field('galeria');
							$imatge = $galeria[0];
							echo wp_get_attachment_image($imatge['ID'], 'full', false, array( 'alt' => $imatge['post_title'], 'class' => 'img-responsive logoHeader' ));
							?>
						</a>
						<nav>
							<ul class="nav" role="menu">
								<?php
									switch(ICL_LANGUAGE_CODE){
										case "ca": echo getNavMenu('menuCat'); break;
										case "es": echo getNavMenu('menuEs'); break;
									}
									icl_post_languages_totretolacio();
								?>
							</ul>
						</nav>
						<nav class="the-menu" id="the-menu">
							<ul role="menu">
								<?php
									switch(ICL_LANGUAGE_CODE){
										case "ca": echo getNavMenu('menuCat', false); break;
										case "es": echo getNavMenu('menuEs', false); break;
									}
									icl_post_languages_totretolacio(true);
								?>
							</ul>
						</nav>
						<nav id="mobile-header">
							<a class="navbar-button" id="hamburger" href="#the-menu">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<!--<span class="top-bar"></span>
								<span class="middle-bar"></span>
								<span class="bottom-bar"></span>-->
							</a>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div class="bodyHeaderShadow"></div>
	</header>

	<main class="mainBodyFlex">
		<div class="contentFlex">
			<div class="initialSpacing"></div>
