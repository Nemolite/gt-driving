<?php get_header( bikes2ride_template_base() ); ?>

	<?php bikes2ride_site_breadcrumbs(); ?>

	<?php do_action( 'bikes2ride_render_widget_area', 'full-width-header-area' ); ?>

	<?php bikes2ride_single_modern_header(); ?>

	<div <?php gt_content_wrap_class(); ?>>

		<?php do_action( 'bikes2ride_render_widget_area', 'before-content-area' ); ?>

		<div class="row">

			<div id="primary" <?php bikes2ride_primary_content_class(); ?>>

				<?php do_action( 'bikes2ride_render_widget_area', 'before-loop-area' ); ?>

				<main id="main" class="site-main" role="main">

					<?php include bikes2ride_template_path(); ?>

				</main><!-- #main -->

				<?php do_action( 'bikes2ride_render_widget_area', 'after-loop-area' ); ?>

			</div><!-- #primary -->

			<?php get_sidebar(); // Loads the sidebar.php. ?>

		</div><!-- .row -->

		<?php do_action( 'bikes2ride_render_widget_area', 'after-content-area' ); ?>

	</div><!-- .container -->

	<?php do_action( 'bikes2ride_render_widget_area', 'after-content-full-width-area' ); ?>

<?php get_footer( bikes2ride_template_base() ); ?>
