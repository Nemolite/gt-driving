<?php
/**
 * Template part for default header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bikes2ride
 */
?>
<div class="header-container_wrap container">
	<div class="header-container__flex">
		<div class="site-branding">
			<?php bikes2ride_header_logo() ?>
			<?php bikes2ride_site_description(); ?>
		</div>

		<?php bikes2ride_main_menu(); ?>
		<?php bikes2ride_header_btn(); ?>

	</div>
</div>
