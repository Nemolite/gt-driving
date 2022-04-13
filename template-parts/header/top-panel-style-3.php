<?php
/**
 * Template part for top panel in header (style-3 layout).
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bikes2ride
 */

// Don't show top panel if all elements are disabled.
if ( ! bikes2ride_is_top_panel_visible() ) {
	return;
} ?>

<div class="top-panel <?php echo bikes2ride_get_invert_class_customize_option( 'top_panel_bg' ); ?>">
	<div class="top-panel__container container">
		<div class="top-panel__top">
			<div class="top-panel__left">
				<?php bikes2ride_top_message( '<div class="top-panel__message">%s</div>' ); ?>
				<?php bikes2ride_contact_block( 'header' ); ?>
			</div>

			<div class="top-panel__right">
				<?php bikes2ride_top_menu(); ?>
				<?php bikes2ride_social_list( 'header' ); ?>
			</div>
		</div>
	</div>
</div><!-- .top-panel -->
