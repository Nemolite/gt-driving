<?php
/**
 * The template for displaying the style-2 footer layout.
 *
 * @package bikes2ride
 */

?>
<div class="footer-container <?php echo bikes2ride_get_invert_class_customize_option( 'footer_bg' ); ?>">
	<div class="site-info container">
		<?php
			bikes2ride_footer_logo();
			bikes2ride_footer_menu();
			bikes2ride_contact_block( 'footer' );
			bikes2ride_social_list( 'footer' );
			bikes2ride_footer_copyright();
		?>
	</div><!-- .site-info -->
</div><!-- .container -->
