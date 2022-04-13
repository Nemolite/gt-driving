<?php
/**
 * Template part for style-2 header layout.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bikes2ride
 */

$search       = get_theme_mod( 'header_search', bikes2ride_theme()->customizer->get_default( 'header_search' ) );
?>
<div class="header-container_wrap container">
	<div class="header-container__top">
		<div class="header-container__flex">
			<div class="site-branding">
				<?php bikes2ride_header_logo() ?>
				<?php bikes2ride_site_description(); ?>
			</div>
			<div class="header-elements-wrap">
				<?php bikes2ride_contact_block( 'header' ); ?>
				<?php bikes2ride_header_btn(); ?>
			</div>
		</div>
	</div>

	<div class="header-container__bottom">
		<div class="header-container__flex">
			<?php bikes2ride_main_menu(); ?>

			<?php if ( $search ) : ?>
			<div class="header-icons divider">
				<?php bikes2ride_header_search( '<div class="header-search"><span class="search-form__toggle"></span>%s<span class="search-form__close"></span></div>' ); ?>
			</div>
			<?php endif; ?>

		</div>
	</div>
</div>
