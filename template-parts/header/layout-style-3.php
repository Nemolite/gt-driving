<?php
/**
 * Template part for style-3 header layout.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bikes2ride
 */
?>
<div class="header-container_wrap container">
	<?php bikes2ride_vertical_main_menu(); ?>
	<div class="header-container__flex">
		<div class="site-branding">
			<?php bikes2ride_header_logo() ?>
			<?php bikes2ride_site_description(); ?>
		</div>

		<div class="header-icons">
			<?php bikes2ride_header_search( '<div class="header-search"><span class="search-form__toggle"></span>%s<span class="search-form__close"></span></div>' ); ?>
			<?php bikes2ride_vertical_menu_toggle( 'main-menu' ); ?>
			<?php bikes2ride_header_btn(); ?>
		</div>

	</div>
</div>
