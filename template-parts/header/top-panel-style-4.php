<?php
/**
 * Template part for top panel in header (style-4 layout).
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bikes2ride
 */

// Don't show top panel if all elements are disabled.
if ( ! bikes2ride_is_top_panel_visible() ) {
	return;
}
$message                  = get_theme_mod( 'top_panel_text', bikes2ride_theme()->customizer->get_default( 'top_panel_text' ) );
$menu                     = has_nav_menu( 'top' ) && get_theme_mod( 'top_menu_visibility', bikes2ride_theme()->customizer->get_default( 'top_menu_visibility' ) );
$contact_block_visibility = get_theme_mod( 'header_contact_block_visibility', bikes2ride_theme()->customizer->get_default( 'header_contact_block_visibility' ) );
$social_menu_visibility   = get_theme_mod( 'header_social_links', bikes2ride_theme()->customizer->get_default( 'header_social_links' ) );
?>

<div class="top-panel <?php echo bikes2ride_get_invert_class_customize_option( 'top_panel_bg' ); ?>">
	<div class="top-panel__container container">
		<div class="top-panel__top">
			<div class="top-panel__left">
				<?php bikes2ride_top_message( '<div class="top-panel__message">%s</div>' ); ?>
				<?php if ( empty( $message ) ) {
					bikes2ride_contact_block( 'header' );
				} ?>
			</div>
			<div class="top-panel__right">
				<?php bikes2ride_top_menu(); ?>
				<?php bikes2ride_social_list( 'header' ); ?>
				<?php if ( ! $menu && ! $social_menu_visibility && ! empty( $message ) ) {
					bikes2ride_contact_block( 'header' );
				} ?>
			</div>
		</div>

		<?php if ( $contact_block_visibility && ! empty( $message ) && ( $menu || $social_menu_visibility ) ) : ?>
			<div class="top-panel__bottom">
				<?php bikes2ride_contact_block( 'header' ); ?>
			</div>
		<?php endif; ?>
	</div>
</div><!-- .top-panel -->
