<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bikes2ride
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<style>
.gt_header {
	width: 100%;
	height: 100vh;
	background-image: url(<?php echo get_site_url(); ?>/wp-content/uploads/2022/04/bl1-scaled.jpg);	
	background-size: cover;
	background-repeat: no-repeat;
	background-attachment: scroll;
}

.program_study {
	width: 100%;
	min-height: 700px;
	background-image: url(<?php echo get_site_url(); ?>/wp-content/uploads/2022/04/fonps-scaled.jpg);
	background-size: cover;
	background-repeat: no-repeat;
	background-attachment: scroll;
	padding-top: 100px;
}

.sertificat {
	width: 100%;
	min-height: 570px;
	height: auto;
	background-image: url(<?php echo get_site_url(); ?>/wp-content/uploads/2022/04/podar-scaled.jpg);
	background-size: cover;
	background-repeat: no-repeat;
	background-attachment: scroll;
	padding-top: 100px;
}

.otziv {
	width: 100%;
	min-height: 570px;	
	height: auto;
	background-image: url(<?php echo get_site_url(); ?>/wp-content/uploads/2022/04/otziv-scaled.jpg);
	background-size: cover;
	background-repeat: no-repeat;
	background-attachment: scroll;
	padding-top: 130px;	
}
@media (max-width: 320px) { 
	.sertificat {
		width: 100%;
		/* height: 570px; */
		background-image: url(<?php echo get_site_url(); ?>/wp-content/uploads/2022/04/podar-scaled.jpg);
		background-size: cover;
		background-repeat: no-repeat;
		background-attachment: scroll;
		padding-top: 100px;
		min-height: 570px;
	}
}

@media (min-width: 321px) and (max-width: 575px) { 
	.sertificat {
		width: 100%;
		/* height: 570px; */
		background-image: url(<?php echo get_site_url(); ?>/wp-content/uploads/2022/04/podar-scaled.jpg);
		background-size: cover;
		background-repeat: no-repeat;
		background-attachment: scroll;
		padding-top: 100px;
		min-height: 570px;
	}
}

</style>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php bikes2ride_get_page_preloader(); ?>
<div id="page" class="site">
	<?php
		if( is_front_page() ) {
			$gt_header = "gt_header";
	   } else {
		$gt_header = "";
	   }
	?>
	<div class="header <?php echo esc_attr( $gt_header ); ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bikes2ride' ); ?></a>
		<header id="masthead" <?php gt_bikes2ride_header_class(); ?> role="banner">
			<?php bikes2ride_ads_header() ?>
			<?php get_template_part( 'template-parts/header/mobile-panel' ); ?>
			<?php get_template_part( 'template-parts/header/top-panel', get_theme_mod( 'header_layout_type' ) ); ?>

			<div <?php bikes2ride_header_container_class(); ?>>
				<?php get_template_part( 'template-parts/header/layout', get_theme_mod( 'header_layout_type' ) ); ?>
			</div><!-- .header-container -->
		</header><!-- #masthead -->
	</div><!-- .header -->

	<div id="content" <?php bikes2ride_content_class(); ?>>
	<?php
	if( is_front_page() ) {
	   gt_driving_program_study(); 
       gt_driving_our_auto();
	   gt_podar_sertificat();
	   gt_bor();
	   gt_otziv();
	   gt_youtuber();
	   gt_proba();
	   gt_autos();
  }

