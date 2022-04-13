<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bikes2ride
 */
?>
<section class="error-404 not-found">
	<header class="page-header">
		<h1 class="page-title screen-reader-text"><?php esc_html_e( '404', 'bikes2ride' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<div class="invert">

			<h2><?php esc_html_e( 'Page Not Found.', 'bikes2ride' ); ?></h2>
			<p><?php esc_html_e( 'Unfortunately the page you were looking for could not be found. Maybe search can help.', 'bikes2ride' ); ?></p>

		</div>
		<p><a class="btn btn-secondary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go home', 'bikes2ride' ); ?></a></p>

	</div><!-- .page-content -->
</section><!-- .error-404 -->
