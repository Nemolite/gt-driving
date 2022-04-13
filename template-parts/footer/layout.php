<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package bikes2ride
 */

$footer_contact_block_visibility = get_theme_mod( 'footer_contact_block_visibility', bikes2ride_theme()->customizer->get_default( 'footer_contact_block_visibility' ) );
?>

<div class="footer-container <?php echo bikes2ride_get_invert_class_customize_option( 'footer_bg' ); ?>">
	<div class="site-info container">
		<div class="site-info-wrap">
			<?php bikes2ride_footer_logo(); ?>
			<?php bikes2ride_footer_menu(); ?>

			<?php if ( $footer_contact_block_visibility ) : ?>
			<div class="site-info__bottom">
			<?php endif; ?>
				<?php bikes2ride_footer_copyright(); ?>
				<?php bikes2ride_contact_block( 'footer' ); ?>
			<?php if ( $footer_contact_block_visibility ) : ?>
			</div>
			<?php endif; ?>

			<?php bikes2ride_social_list( 'footer' ); ?>
		</div>

	</div><!-- .site-info -->
</div><!-- .container -->
