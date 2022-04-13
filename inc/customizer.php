<?php
/**
 * Theme Customizer.
 *
 * @package bikes2ride
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */
function bikes2ride_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'bikes2ride_get_customizer_options' , array(
		'prefix'     => 'bikes2ride',
		'capability' => 'edit_theme_options',
		'type'       => 'theme_mod',
		'options'    => array(

			/** `Site Indentity` section */
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline after logo', 'bikes2ride' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => false,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_visibility' => array(
				'title'    => esc_html__( 'Show ToTop button', 'bikes2ride' ),
				'section'  => 'title_tagline',
				'priority' => 61,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'bikes2ride' ),
				'section'  => 'title_tagline',
				'priority' => 62,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'general_settings' => array(
				'title'    => esc_html__( 'General Site settings', 'bikes2ride' ),
				'priority' => 40,
				'type'     => 'panel',
			),

			/** `Logo & Favicon` section */
			'logo_favicon' => array(
				'title'    => esc_html__( 'Logo &amp; Favicon', 'bikes2ride' ),
				'priority' => 25,
				'panel'    => 'general_settings',
				'type'     => 'section',
			),
			'header_logo_type' => array(
				'title'   => esc_html__( 'Logo Type', 'bikes2ride' ),
				'section' => 'logo_favicon',
				'default' => 'image',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'bikes2ride' ),
					'text'  => esc_html__( 'Text', 'bikes2ride' ),
				),
				'type' => 'control',
			),
			'header_logo_url' => array(
				'title'           => esc_html__( 'Logo Upload', 'bikes2ride' ),
				'description'     => esc_html__( 'Upload logo image', 'bikes2ride' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_logo_image',
			),
			'invert_header_logo_url' => array(
				'title'           => esc_html__( 'Invert Logo Upload', 'bikes2ride' ),
				'description'     => esc_html__( 'Upload logo image', 'bikes2ride' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/invert-logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_logo_image',
			),
			'retina_header_logo_url' => array(
				'title'           => esc_html__( 'Retina Logo Upload', 'bikes2ride' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'bikes2ride' ),
				'section'         => 'logo_favicon',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_logo_image',
			),
			'invert_retina_header_logo_url' => array(
				'title'           => esc_html__( 'Invert Retina Logo Upload', 'bikes2ride' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'bikes2ride' ),
				'section'         => 'logo_favicon',
				'default'         => false,
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_logo_image',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'bikes2ride' ),
				'section'         => 'logo_favicon',
				'default'         => 'Montserrat, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_logo_text',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'bikes2ride' ),
				'section'         => 'logo_favicon',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => bikes2ride_get_font_styles(),
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_logo_text',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'bikes2ride' ),
				'section'         => 'logo_favicon',
				'default'         => '700',
				'field'           => 'select',
				'choices'         => bikes2ride_get_font_weight(),
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_logo_text',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'bikes2ride' ),
				'section'         => 'logo_favicon',
				'default'         => '40',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_logo_text',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'bikes2ride' ),
				'section'         => 'logo_favicon',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => bikes2ride_get_character_sets(),
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_logo_text',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'bikes2ride' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'bikes2ride' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'bikes2ride' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_page_title' => array(
				'title'   => esc_html__( 'Enable page title in breadcrumbs area', 'bikes2ride' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_path_type' => array(
				'title'   => esc_html__( 'Show full/minified path', 'bikes2ride' ),
				'section' => 'breadcrumbs',
				'default' => 'full',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'bikes2ride' ),
					'minified' => esc_html__( 'Minified', 'bikes2ride' ),
				),
				'type'    => 'control',
			),

			/** `Social links` section */
			'social_links' => array(
				'title'    => esc_html__( 'Social links', 'bikes2ride' ),
				'priority' => 50,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_social_links' => array(
				'title'   => esc_html__( 'Show social links in header', 'bikes2ride' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_social_links' => array(
				'title'   => esc_html__( 'Show social links in footer', 'bikes2ride' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to blog posts', 'bikes2ride' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to single blog post', 'bikes2ride' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title'    => esc_html__( 'Page Layout', 'bikes2ride' ),
				'priority' => 55,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_container_type' => array(
				'title'   => esc_html__( 'Header type', 'bikes2ride' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'bikes2ride' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'bikes2ride' ),
				),
				'type' => 'control',
			),
			'content_container_type' => array(
				'title'   => esc_html__( 'Content type', 'bikes2ride' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'bikes2ride' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'bikes2ride' ),
				),
				'type' => 'control',
			),
			'footer_container_type' => array(
				'title'   => esc_html__( 'Footer type', 'bikes2ride' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'bikes2ride' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'bikes2ride' ),
				),
				'type' => 'control',
			),
			'container_width' => array(
				'title'       => esc_html__( 'Container width (px)', 'bikes2ride' ),
				'section'     => 'page_layout',
				'default'     => 1200,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 960,
					'max'  => 1920,
					'step' => 1,
				),
				'type' => 'control',
			),
			'sidebar_width' => array(
				'title'   => esc_html__( 'Sidebar width', 'bikes2ride' ),
				'section' => 'page_layout',
				'default' => '1/3',
				'field'   => 'select',
				'choices' => array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'bikes2ride' ),
				'description' => esc_html__( 'Configure Color Scheme', 'bikes2ride' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Regular scheme` section */
			'regular_scheme' => array(
				'title'       => esc_html__( 'Regular scheme', 'bikes2ride' ),
				'priority'    => 10,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'regular_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'bikes2ride' ),
				'section' => 'regular_scheme',
				'default' => '#c53537',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'bikes2ride' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'bikes2ride' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_text_color' => array(
				'title'   => esc_html__( 'Text color', 'bikes2ride' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_color' => array(
				'title'   => esc_html__( 'Link color', 'bikes2ride' ),
				'section' => 'regular_scheme',
				'default' => '#808080',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'bikes2ride' ),
				'section' => 'regular_scheme',
				'default' => '#c53537',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'bikes2ride' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'bikes2ride' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'bikes2ride' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'bikes2ride' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'bikes2ride' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'bikes2ride' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Invert scheme` section */
			'invert_scheme' => array(
				'title'       => esc_html__( 'Invert scheme', 'bikes2ride' ),
				'priority'    => 20,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'invert_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'bikes2ride' ),
				'section' => 'invert_scheme',
				'default' => '#f6f6f6',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'bikes2ride' ),
				'section' => 'invert_scheme',
				'default' => '#c53537',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'bikes2ride' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Text color', 'bikes2ride' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_color' => array(
				'title'   => esc_html__( 'Link color', 'bikes2ride' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'bikes2ride' ),
				'section' => 'invert_scheme',
				'default' => '#c53537',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'bikes2ride' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'bikes2ride' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'bikes2ride' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'bikes2ride' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'bikes2ride' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'bikes2ride' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'bikes2ride' ),
				'description' => esc_html__( 'Configure typography settings', 'bikes2ride' ),
				'priority'    => 45,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body text', 'bikes2ride' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bikes2ride' ),
				'section' => 'body_typography',
				'default' => 'Lato, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bikes2ride' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bikes2ride' ),
				'section' => 'body_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bikes2ride' ),
				'section'     => 'body_typography',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bikes2ride' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bikes2ride' ),
				'section'     => 'body_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'bikes2ride' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bikes2ride' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bikes2ride_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'bikes2ride' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => bikes2ride_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'    => esc_html__( 'H1 Heading', 'bikes2ride' ),
				'priority' => 10,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bikes2ride' ),
				'section' => 'h1_typography',
				'default' => 'Lato, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bikes2ride' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bikes2ride' ),
				'section' => 'h1_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bikes2ride' ),
				'section'     => 'h1_typography',
				'default'     => '100',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bikes2ride' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bikes2ride' ),
				'section'     => 'h1_typography',
				'default'     => '0.9',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'bikes2ride' ),
				'section'     => 'h1_typography',
				'default'     => '0.01',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bikes2ride' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bikes2ride_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'bikes2ride' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => bikes2ride_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'    => esc_html__( 'H2 Heading', 'bikes2ride' ),
				'priority' => 15,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bikes2ride' ),
				'section' => 'h2_typography',
				'default' => 'Lato, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bikes2ride' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bikes2ride' ),
				'section' => 'h2_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bikes2ride' ),
				'section'     => 'h2_typography',
				'default'     => '40',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bikes2ride' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bikes2ride' ),
				'section'     => 'h2_typography',
				'default'     => '0.9',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'bikes2ride' ),
				'section'     => 'h2_typography',
				'default'     => '0.06',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bikes2ride' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bikes2ride_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'bikes2ride' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => bikes2ride_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'    => esc_html__( 'H3 Heading', 'bikes2ride' ),
				'priority' => 20,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bikes2ride' ),
				'section' => 'h3_typography',
				'default' => 'Lato, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bikes2ride' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bikes2ride' ),
				'section' => 'h3_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bikes2ride' ),
				'section'     => 'h3_typography',
				'default'     => '26',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bikes2ride' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bikes2ride' ),
				'section'     => 'h3_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'bikes2ride' ),
				'section'     => 'h3_typography',
				'default'     => '0.01',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bikes2ride' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bikes2ride_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'bikes2ride' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => bikes2ride_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'    => esc_html__( 'H4 Heading', 'bikes2ride' ),
				'priority' => 25,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bikes2ride' ),
				'section' => 'h4_typography',
				'default' => 'Lato, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bikes2ride' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bikes2ride' ),
				'section' => 'h4_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bikes2ride' ),
				'section'     => 'h4_typography',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bikes2ride' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bikes2ride' ),
				'section'     => 'h4_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'bikes2ride' ),
				'section'     => 'h4_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bikes2ride' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bikes2ride_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'bikes2ride' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => bikes2ride_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'    => esc_html__( 'H5 Heading', 'bikes2ride' ),
				'priority' => 30,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bikes2ride' ),
				'section' => 'h5_typography',
				'default' => 'Lato, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bikes2ride' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bikes2ride' ),
				'section' => 'h5_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bikes2ride' ),
				'section'     => 'h5_typography',
				'default'     => '18',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bikes2ride' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bikes2ride' ),
				'section'     => 'h5_typography',
				'default'     => '1.7',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'bikes2ride' ),
				'section'     => 'h5_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bikes2ride' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bikes2ride_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'bikes2ride' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => bikes2ride_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'    => esc_html__( 'H6 Heading', 'bikes2ride' ),
				'priority' => 35,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bikes2ride' ),
				'section' => 'h6_typography',
				'default' => 'Lato, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bikes2ride' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bikes2ride' ),
				'section' => 'h6_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bikes2ride' ),
				'section'     => 'h6_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bikes2ride' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bikes2ride' ),
				'section'     => 'h6_typography',
				'default'     => '1.714',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'bikes2ride' ),
				'section'     => 'h6_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bikes2ride' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bikes2ride_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'bikes2ride' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => bikes2ride_get_text_aligns(),
				'type'    => 'control',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs_typography' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'bikes2ride' ),
				'priority' => 45,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'breadcrumbs_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bikes2ride' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'Lato, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'breadcrumbs_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bikes2ride' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_styles(),
				'type'    => 'control',
			),
			'breadcrumbs_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bikes2ride' ),
				'section' => 'breadcrumbs_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_weight(),
				'type'    => 'control',
			),
			'breadcrumbs_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bikes2ride' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bikes2ride' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bikes2ride' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'bikes2ride' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'breadcrumbs_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bikes2ride' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bikes2ride_get_character_sets(),
				'type'    => 'control',
			),

			/** `Meta` section */
			'meta_typography' => array(
				'title'       => esc_html__( 'Entry meta', 'bikes2ride' ),
				'priority'    => 50,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'meta_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bikes2ride' ),
				'section' => 'meta_typography',
				'default' => 'Lato, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'meta_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bikes2ride' ),
				'section' => 'meta_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_styles(),
				'type'    => 'control',
			),
			'meta_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bikes2ride' ),
				'section' => 'meta_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => bikes2ride_get_font_weight(),
				'type'    => 'control',
			),
			'meta_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bikes2ride' ),
				'section'     => 'meta_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'meta_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bikes2ride' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bikes2ride' ),
				'section'     => 'meta_typography',
				'default'     => '1.714',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'meta_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'bikes2ride' ),
				'section'     => 'meta_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'meta_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bikes2ride' ),
				'section' => 'meta_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bikes2ride_get_character_sets(),
				'type'    => 'control',
			),

			/** `Header` panel */
			'header_options' => array(
				'title'    => esc_html__( 'Header', 'bikes2ride' ),
				'priority' => 60,
				'type'     => 'panel',
			),

			/** `Header styles` section */
			'header_styles' => array(
				'title'    => esc_html__( 'Styles', 'bikes2ride' ),
				'priority' => 5,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'bikes2ride' ),
				'section' => 'header_styles',
				'default' => 'style-5',
				'field'   => 'select',
				'choices' => bikes2ride_get_header_layout_options(),
				'type'    => 'control',
			),
			'header_transparent_layout' => array(
				'title'   => esc_html__( 'Header overlay', 'bikes2ride' ),
				'section' => 'header_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_invert_color_scheme' => array(
				'title'   => esc_html__( 'Enable invert color scheme', 'bikes2ride' ),
				'section' => 'header_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'bikes2ride' ),
				'section' => 'header_styles',
				'field'   => 'hex_color',
				'default' => '#f7f7f6',
				'type'    => 'control',
			),
			'header_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'bikes2ride' ),
				'section' => 'header_styles',
				'field'   => 'image',
				'type'    => 'control',
			),
			'header_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'bikes2ride' ),
				'section' => 'header_styles',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat' => esc_html__( 'No Repeat', 'bikes2ride' ),
					'repeat'    => esc_html__( 'Tile', 'bikes2ride' ),
					'repeat-x'  => esc_html__( 'Tile Horizontally', 'bikes2ride' ),
					'repeat-y'  => esc_html__( 'Tile Vertically', 'bikes2ride' ),
				),
				'type'    => 'control',
			),
			'header_bg_position_x' => array(
				'title'   => esc_html__( 'Background Position', 'bikes2ride' ),
				'section' => 'header_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'bikes2ride' ),
					'center' => esc_html__( 'Center', 'bikes2ride' ),
					'right'  => esc_html__( 'Right', 'bikes2ride' ),
				),
				'type'    => 'control',
			),
			'header_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'bikes2ride' ),
				'section' => 'header_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'bikes2ride' ),
					'fixed'  => esc_html__( 'Fixed', 'bikes2ride' ),
				),
				'type'    => 'control',
			),

			/** `Top Panel` section */
			'header_top_panel' => array(
				'title'    => esc_html__( 'Top Panel', 'bikes2ride' ),
				'priority' => 10,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'top_panel_visibility' => array(
				'title'   => esc_html__( 'Enable top panel', 'bikes2ride' ),
				'section' => 'header_top_panel',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_text' => array(
				'title'           => esc_html__( 'Disclaimer Text', 'bikes2ride' ),
				'description'     => esc_html__( 'HTML formatting support', 'bikes2ride' ),
				'section'         => 'header_top_panel',
				'default'         => 'We Rent the Best Bicycles Out!',
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_top_panel_enable',
			),
			'top_panel_bg'        => array(
				'title'           => esc_html__( 'Background color', 'bikes2ride' ),
				'section'         => 'header_top_panel',
				'default'         => '#f5f6f9',
				'field'           => 'hex_color',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_top_panel_enable',
			),
			'top_menu_visibility' => array(
				'title'           => esc_html__( 'Show top menu', 'bikes2ride' ),
				'section'         => 'header_top_panel',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_top_panel_enable',
			),

			/** `Header elements` section */
			'header_elements' => array(
				'title'       => esc_html__( 'Header Elements', 'bikes2ride' ),
				'priority'    => 15,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_search' => array(
				'title'   => esc_html__( 'Show search', 'bikes2ride' ),
				'section' => 'header_elements',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_btn_visibility' => array(
				'title'   => esc_html__( 'Show header call to action button', 'bikes2ride' ),
				'section' => 'header_elements',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_btn_text' => array(
				'title'           => esc_html__( 'Header call to action button', 'bikes2ride' ),
				'description'     => esc_html__( 'Button text', 'bikes2ride' ),
				'section'         => 'header_elements',
				'default'         => esc_html__( 'Buy theme!', 'bikes2ride' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_btn_visible',
			),
			'header_btn_url' => array(
				'title'           => '',
				'description'     => esc_html__( 'Button url', 'bikes2ride' ),
				'section'         => 'header_elements',
				'default'         => '#',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_btn_visible',
			),

			/** `Header contact block` section */
			'header_contact_block' => array(
				'title'    => esc_html__( 'Header Contact Block', 'bikes2ride' ),
				'priority' => 20,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_contact_block_visibility' => array(
				'title'   => esc_html__( 'Show Header Contact Block', 'bikes2ride' ),
				'section' => 'header_contact_block',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_contact_icon_1' => array(
				'title'           => esc_html__( 'Contact item 1', 'bikes2ride' ),
				'description'     => esc_html__( 'Choose icon', 'bikes2ride' ),
				'section'         => 'header_contact_block',
				'field'           => 'iconpicker',
				'default'         => 'linearicon-map-marker',
				'icon_data'       => array(
					'icon_set'    => 'bikes2rideLinearIcons',
					'icon_css'    => BIKES2RIDE_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => bikes2ride_get_linear_icons_set(),
				),
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_contact_block_visible',
			),
			'header_contact_label_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'bikes2ride' ),
				'section'         => 'header_contact_block',
				'default'         => ' ',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_contact_block_visible',
			),
			'header_contact_text_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'bikes2ride' ),
				'section'         => 'header_contact_block',
				'default'         => bikes2ride_get_default_contact_information( 'address' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_contact_block_visible',
			),
			'header_contact_icon_2' => array(
				'title'           => esc_html__( 'Contact item 2', 'bikes2ride' ),
				'description'     => esc_html__( 'Choose icon', 'bikes2ride' ),
				'section'         => 'header_contact_block',
				'field'           => 'iconpicker',
				'default'         => ' ',
				'icon_data'       => array(
					'icon_set'    => 'bikes2rideLinearIcons',
					'icon_css'    => BIKES2RIDE_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => bikes2ride_get_linear_icons_set(),
				),
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_contact_block_visible',
			),
			'header_contact_label_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'bikes2ride' ),
				'section'         => 'header_contact_block',
				'default'         => ' ',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_contact_block_visible',
			),
			'header_contact_text_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'bikes2ride' ),
				'section'         => 'header_contact_block',
				'default'         => ' ',
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_contact_block_visible',
			),
			'header_contact_icon_3' => array(
				'title'           => esc_html__( 'Contact item 3', 'bikes2ride' ),
				'description'     => esc_html__( 'Choose icon', 'bikes2ride' ),
				'section'         => 'header_contact_block',
				'field'           => 'iconpicker',
				'default'         => ' ',
				'icon_data'       => array(
					'icon_set'    => 'bikes2rideLinearIcons',
					'icon_css'    => BIKES2RIDE_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => bikes2ride_get_linear_icons_set(),
				),
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_contact_block_visible',
			),
			'header_contact_label_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'bikes2ride' ),
				'section'         => 'header_contact_block',
				'default'         => ' ',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_contact_block_visible',
			),
			'header_contact_text_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'bikes2ride' ),
				'section'         => 'header_contact_block',
				'default'         => ' ',
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_header_contact_block_visible',
			),

			/** `Main Menu` section */
			'header_main_menu' => array(
				'title'    => esc_html__( 'Main Menu', 'bikes2ride' ),
				'priority' => 20,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_menu_sticky' => array(
				'title'   => esc_html__( 'Enable sticky menu', 'bikes2ride' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_attributes' => array(
				'title'   => esc_html__( 'Enable description', 'bikes2ride' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'more_button_type' => array(
				'title'   => esc_html__( 'More Menu Button Type', 'bikes2ride' ),
				'section' => 'header_main_menu',
				'default' => 'text',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'bikes2ride' ),
					'icon'  => esc_html__( 'Icon', 'bikes2ride' ),
					'text'  => esc_html__( 'Text', 'bikes2ride' ),
				),
				'type'    => 'control',
			),
			'more_button_text' => array(
				'title'           => esc_html__( 'More Menu Button Text', 'bikes2ride' ),
				'section'         => 'header_main_menu',
				'default'         => esc_html__( 'More', 'bikes2ride' ),
				'field'           => 'input',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_more_button_type_text',
			),
			'more_button_icon' => array(
				'title'           => esc_html__( 'More Menu Button Icon', 'bikes2ride' ),
				'section'         => 'header_main_menu',
				'field'           => 'iconpicker',
				'type'            => 'control',
				'default'         => 'fa-arrow-down',
				'active_callback' => 'bikes2ride_is_more_button_type_icon',
				'icon_data'       => array(
					'icon_set'    => 'moreButtonFontAwesome',
					'icon_css'    => BIKES2RIDE_THEME_URI . '/assets/css/font-awesome.min.css',
					'icon_base'   => 'fa',
					'icon_prefix' => 'fa-',
					'icons'       => bikes2ride_get_icons_set(),
				),
			),
			'more_button_image_url' => array(
				'title'           => esc_html__( 'More Button Image Upload', 'bikes2ride' ),
				'description'     => esc_html__( 'Upload More Button image', 'bikes2ride' ),
				'section'         => 'header_main_menu',
				'default'         => '',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_more_button_type_image',
			),
			'retina_more_button_image_url' => array(
				'title'           => esc_html__( 'Retina More Button Image Upload', 'bikes2ride' ),
				'description'     => esc_html__( 'Upload More Button image for retina-ready devices', 'bikes2ride' ),
				'section'         => 'header_main_menu',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_more_button_type_image',
			),

			/** `Sidebar` section */
			'sidebar_settings' => array(
				'title'    => esc_html__( 'Sidebar', 'bikes2ride' ),
				'priority' => 105,
				'type'     => 'section',
			),
			'sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar Position', 'bikes2ride' ),
				'section' => 'sidebar_settings',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'bikes2ride' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'bikes2ride' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'bikes2ride' ),
				),
				'type' => 'control',
			),

			/** `MailChimp` section */
			'mailchimp' => array(
				'title'       => esc_html__( 'MailChimp', 'bikes2ride' ),
				'description' => esc_html__( 'Setup MailChimp settings for subscribe widget', 'bikes2ride' ),
				'priority'    => 109,
				'type'        => 'section',
			),
			'mailchimp_api_key' => array(
				'title'   => esc_html__( 'MailChimp API key', 'bikes2ride' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),
			'mailchimp_list_id' => array(
				'title'   => esc_html__( 'MailChimp list ID', 'bikes2ride' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),

			/** `Ads Management` panel */
			'ads_management' => array(
				'title'    => esc_html__( 'Ads Management', 'bikes2ride' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'ads_header' => array(
				'title'             => esc_html__( 'Header', 'bikes2ride' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_home_before_loop' => array(
				'title'             => esc_html__( 'Front Page Before Loop', 'bikes2ride' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_content' => array(
				'title'             => esc_html__( 'Post Before Content', 'bikes2ride' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_comments' => array(
				'title'             => esc_html__( 'Post Before Comments', 'bikes2ride' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'    => esc_html__( 'Footer', 'bikes2ride' ),
				'priority' => 110,
				'type'     => 'panel',
			),

			/** `Footer styles` section */
			'footer_styles' => array(
				'title'    => esc_html__( 'Footer Styles', 'bikes2ride' ),
				'priority' => 5,
				'panel'    => 'footer_options',
				'type'     => 'section',
			),
			'footer_logo_visibility' => array(
				'title'   => esc_html__( 'Show Footer Logo', 'bikes2ride' ),
				'section' => 'footer_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_logo_url' => array(
				'title'           => esc_html__( 'Logo upload', 'bikes2ride' ),
				'section'         => 'footer_styles',
				'field'           => 'image',
				'default'         => '%s/assets/images/footer-logo.png',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_footer_logo_visible',
			),
			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'bikes2ride' ),
				'section' => 'footer_styles',
				'default' => bikes2ride_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),
			'footer_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'bikes2ride' ),
				'section' => 'footer_styles',
				'default' => 'style-2',
				'field'   => 'select',
				'choices' => bikes2ride_get_footer_layout_options(),
				'type' => 'control',
			),
			'footer_bg' => array(
				'title'   => esc_html__( 'Footer Background color', 'bikes2ride' ),
				'section' => 'footer_styles',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_widget_area_visibility' => array(
				'title'   => esc_html__( 'Show Footer Widgets Area', 'bikes2ride' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_widget_columns' => array(
				'title'           => esc_html__( 'Widget Area Columns', 'bikes2ride' ),
				'section'         => 'footer_styles',
				'default'         => '4',
				'field'           => 'select',
				'choices'         => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_footer_area_visible',
			),
			'footer_widgets_bg' => array(
				'title'           => esc_html__( 'Footer Widgets Area Background color', 'bikes2ride' ),
				'section'         => 'footer_styles',
				'default'         => '#222222',
				'field'           => 'hex_color',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_footer_area_visible',
			),
			'footer_menu_visibility' => array(
				'title'   => esc_html__( 'Show Footer Menu', 'bikes2ride' ),
				'section' => 'footer_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Footer contact block` section */
			'footer_contact_block' => array(
				'title'    => esc_html__( 'Footer Contact Block', 'bikes2ride' ),
				'priority' => 10,
				'panel'    => 'footer_options',
				'type'     => 'section',
			),
			'footer_contact_block_visibility' => array(
				'title'   => esc_html__( 'Show Footer Contact Block', 'bikes2ride' ),
				'section' => 'footer_contact_block',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_contact_icon_1' => array(
				'title'           => esc_html__( 'Contact item 1', 'bikes2ride' ),
				'description'     => esc_html__( 'Choose icon', 'bikes2ride' ),
				'section'         => 'footer_contact_block',
				'field'           => 'iconpicker',
				'default'         => false,
				'icon_data'       => array(
					'icon_set'    => 'bikes2rideLinearIcons',
					'icon_css'    => BIKES2RIDE_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => bikes2ride_get_linear_icons_set(),
				),
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_footer_contact_block_visible',
			),
			'footer_contact_label_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'bikes2ride' ),
				'section'         => 'footer_contact_block',
				'default'         => esc_html__( 'Address:', 'bikes2ride' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_footer_contact_block_visible',
			),
			'footer_contact_text_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Value (HTML formatting support)', 'bikes2ride' ),
				'section'         => 'footer_contact_block',
				'default'         => bikes2ride_get_default_contact_information( 'address' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_footer_contact_block_visible',
			),
			'footer_contact_icon_2' => array(
				'title'           => esc_html__( 'Contact item 2', 'bikes2ride' ),
				'description'     => esc_html__( 'Choose icon', 'bikes2ride' ),
				'section'         => 'footer_contact_block',
				'field'           => 'iconpicker',
				'default'         => false,
				'icon_data'       => array(
					'icon_set'    => 'bikes2rideLinearIcons',
					'icon_css'    => BIKES2RIDE_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => bikes2ride_get_linear_icons_set(),
				),
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_footer_contact_block_visible',
			),
			'footer_contact_label_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'bikes2ride' ),
				'section'         => 'footer_contact_block',
				'default'         => false,
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_footer_contact_block_visible',
			),
			'footer_contact_text_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Value (HTML formatting support)', 'bikes2ride' ),
				'section'         => 'footer_contact_block',
				'default'         => bikes2ride_get_default_contact_information( 'phones' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_footer_contact_block_visible',
			),
			'footer_contact_icon_3' => array(
				'title'           => esc_html__( 'Contact item 3', 'bikes2ride' ),
				'description'     => esc_html__( 'Choose icon', 'bikes2ride' ),
				'section'         => 'footer_contact_block',
				'field'           => 'iconpicker',
				'default'         => false,
				'icon_data'       => array(
					'icon_set'    => 'bikes2rideLinearIcons',
					'icon_css'    => BIKES2RIDE_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => bikes2ride_get_linear_icons_set(),
				),
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_footer_contact_block_visible',
			),
			'footer_contact_label_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'bikes2ride' ),
				'section'         => 'footer_contact_block',
				'default'         => esc_html__( 'E-mail:', 'bikes2ride' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_footer_contact_block_visible',
			),
			'footer_contact_text_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Value (HTML formatting support)', 'bikes2ride' ),
				'section'         => 'footer_contact_block',
				'default'         => bikes2ride_get_default_contact_information( 'email' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_footer_contact_block_visible',
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'    => esc_html__( 'Blog Settings', 'bikes2ride' ),
				'priority' => 115,
				'type'     => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'           => esc_html__( 'Blog', 'bikes2ride' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
				'active_callback' => 'is_home',
			),
			'blog_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'bikes2ride' ),
				'section' => 'blog',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'          => esc_html__( 'Listing', 'bikes2ride' ),
					'grid-2-cols'      => esc_html__( 'Grid (2 Columns)', 'bikes2ride' ),
					'grid-3-cols'      => esc_html__( 'Grid (3 Columns)', 'bikes2ride' ),
					'masonry-2-cols'   => esc_html__( 'Masonry (2 Columns)', 'bikes2ride' ),
					'masonry-3-cols'   => esc_html__( 'Masonry (3 Columns)', 'bikes2ride' ),
					'vertical-justify' => esc_html__( 'Vertical Justify', 'bikes2ride' ),
				),
				'type' => 'control',
			),
			'blog_sticky_type' => array(
				'title'   => esc_html__( 'Sticky label type', 'bikes2ride' ),
				'section' => 'blog',
				'default' => 'label',
				'field'   => 'select',
				'choices' => array(
					'label' => esc_html__( 'Text Label', 'bikes2ride' ),
					'icon'  => esc_html__( 'Font Icon', 'bikes2ride' ),
					'both'  => esc_html__( 'Text with Icon', 'bikes2ride' ),
				),
				'type' => 'control',
			),
			'blog_sticky_icon' => array(
				'title'           => esc_html__( 'Icon for sticky post', 'bikes2ride' ),
				'section'         => 'blog',
				'field'           => 'iconpicker',
				'default'         => 'linearicon-star',
				'icon_data'       => array(
					'icon_set'    => 'bikes2rideLinearIcons',
					'icon_css'    => BIKES2RIDE_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => bikes2ride_get_linear_icons_set(),
				),
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_sticky_icon',
			),
			'blog_sticky_label' => array(
				'title'           => esc_html__( 'Featured Post Label', 'bikes2ride' ),
				'description'     => esc_html__( 'Label for sticky post', 'bikes2ride' ),
				'section'         => 'blog',
				'default'         => ' ',
				'field'           => 'text',
				'active_callback' => 'bikes2ride_is_sticky_text',
				'type'            => 'control',
			),
			'blog_posts_content' => array(
				'title'   => esc_html__( 'Post content', 'bikes2ride' ),
				'section' => 'blog',
				'default' => 'excerpt',
				'field'   => 'select',
				'choices' => array(
					'excerpt' => esc_html__( 'Only excerpt', 'bikes2ride' ),
					'full'    => esc_html__( 'Full content', 'bikes2ride' ),
					'none'    => esc_html__( 'Hide', 'bikes2ride' ),
				),
				'type' => 'control',
			),
			'blog_featured_image' => array(
				'title'           => esc_html__( 'Featured image', 'bikes2ride' ),
				'section'         => 'blog',
				'default'         => 'fullwidth',
				'field'           => 'select',
				'choices'         => array(
					'small'     => esc_html__( 'Small', 'bikes2ride' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'bikes2ride' ),
				),
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_blog_featured_image',
			),
			'blog_read_more_text' => array(
				'title'       => esc_html__( 'Read More button text', 'bikes2ride' ),
				'description' => esc_html__( 'Leave empty to hide button', 'bikes2ride' ),
				'section'     => 'blog',
				'default'     => ' ',
				'field'       => 'text',
				'type'        => 'control',
			),
			'blog_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'bikes2ride' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'bikes2ride' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'bikes2ride' ),
				'section' => 'blog',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'bikes2ride' ),
				'section' => 'blog',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'bikes2ride' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'bikes2ride' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_post_type' => array(
				'title'   => esc_html__( 'Post style', 'bikes2ride' ),
				'section' => 'blog_post',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default' => esc_html__( 'Default', 'bikes2ride' ),
					'modern'  => esc_html__( 'Modern', 'bikes2ride' ),
				),
				'type' => 'control',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'bikes2ride' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'bikes2ride' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'bikes2ride' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'bikes2ride' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'bikes2ride' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_author_block' => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'bikes2ride' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_navigation' => array(
				'title'   => esc_html__( 'Enable post navigation', 'bikes2ride' ),
				'section' => 'blog_post',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Related Posts` section */
			'related_posts' => array(
				'title'           => esc_html__( 'Related posts block', 'bikes2ride' ),
				'panel'           => 'blog_settings',
				'priority'        => 30,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'related_posts_visible' => array(
				'title'   => esc_html__( 'Show related posts block', 'bikes2ride' ),
				'section' => 'related_posts',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_block_title' => array(
				'title'           => esc_html__( 'Related posts block title', 'bikes2ride' ),
				'section'         => 'related_posts',
				'default'         => esc_html__( 'Latest Posts', 'bikes2ride' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_related_posts_visible',
			),
			'related_posts_count' => array(
				'title'           => esc_html__( 'Number of post', 'bikes2ride' ),
				'section'         => 'related_posts',
				'default'         => '2',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_related_posts_visible',
			),
			'related_posts_grid' => array(
				'title'           => esc_html__( 'Layout', 'bikes2ride' ),
				'section'         => 'related_posts',
				'default'         => '2',
				'field'           => 'select',
				'choices'         => array(
					'2' => esc_html__( '2 columns', 'bikes2ride' ),
					'3' => esc_html__( '3 columns', 'bikes2ride' ),
					'4' => esc_html__( '4 columns', 'bikes2ride' ),
				),
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_related_posts_visible',
			),
			'related_posts_title' => array(
				'title'           => esc_html__( 'Show post title', 'bikes2ride' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_related_posts_visible',
			),
			'related_posts_title_length' => array(
				'title'           => esc_html__( 'Number of words in the title', 'bikes2ride' ),
				'section'         => 'related_posts',
				'default'         => '10',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_related_posts_visible',
			),
			'related_posts_image' => array(
				'title'           => esc_html__( 'Show post image', 'bikes2ride' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_related_posts_visible',
			),
			'related_posts_content' => array(
				'title'           => esc_html__( 'Display content', 'bikes2ride' ),
				'section'         => 'related_posts',
				'default'         => 'hide',
				'field'           => 'select',
				'choices'         => array(
					'hide'         => esc_html__( 'Hide', 'bikes2ride' ),
					'post_excerpt' => esc_html__( 'Excerpt', 'bikes2ride' ),
					'post_content' => esc_html__( 'Content', 'bikes2ride' ),
				),
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_related_posts_visible',
			),
			'related_posts_content_length' => array(
				'title'           => esc_html__( 'Number of words in the content', 'bikes2ride' ),
				'section'         => 'related_posts',
				'default'         => '25',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_related_posts_visible',
			),
			'related_posts_categories' => array(
				'title'           => esc_html__( 'Show post categories', 'bikes2ride' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_related_posts_visible',
			),
			'related_posts_tags' => array(
				'title'           => esc_html__( 'Show post tags', 'bikes2ride' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_related_posts_visible',
			),
			'related_posts_author' => array(
				'title'           => esc_html__( 'Show post author', 'bikes2ride' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_related_posts_visible',
			),
			'related_posts_publish_date' => array(
				'title'           => esc_html__( 'Show post publish date', 'bikes2ride' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_related_posts_visible',
			),
			'related_posts_comment_count' => array(
				'title'           => esc_html__( 'Show post comment count', 'bikes2ride' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'bikes2ride_is_related_posts_visible',
			),

			/** `Woocommerce Settings` panel */
			'woocommerce_settings' => array(
				'title'           => esc_html__( 'Woocommerce options', 'bikes2ride' ),
				'priority'        => 120,
				'type'            => 'panel',
				'active_callback' => 'bikes2ride_is_woocommerce_activated',
			),
			/** `Badge` section */
			'woo_badge_options' => array(
				'title'    => esc_html__( 'Woocommerce badge', 'bikes2ride' ),
				'panel'    => 'woocommerce_settings',
				'priority' => 10,
				'type'     => 'section',
			),
			'onsale_badge_bg' => array(
				'title'   => esc_html__( 'Onsale badge bg', 'bikes2ride' ),
				'section' => 'woo_badge_options',
				'default' => '#ff596d',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'featured_badge_bg' => array(
				'title'   => esc_html__( 'Featured badge bg', 'bikes2ride' ),
				'section' => 'woo_badge_options',
				'default' => '#ffc045',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'new_badge_bg' => array(
				'title'   => esc_html__( 'New badge bg', 'bikes2ride' ),
				'section' => 'woo_badge_options',
				'default' => '#000000',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `404` panel */
			'page_404_options' => array(
				'title'    => esc_html__( '404 Page', 'bikes2ride' ),
				'priority' => 130,
				'type'     => 'section',
			),
			'page_404_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'bikes2ride' ),
				'section' => 'page_404_options',
				'field'   => 'hex_color',
				'default' => '#f9b707',
				'type'    => 'control',
			),
			'page_404_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'bikes2ride' ),
				'section' => 'page_404_options',
				'field'   => 'image',
				'default' => '%s/assets/images/bg_404.jpg',
				'type'    => 'control',
			),
			'page_404_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'bikes2ride' ),
				'section' => 'page_404_options',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat'  => esc_html__( 'No Repeat', 'bikes2ride' ),
					'repeat'     => esc_html__( 'Tile', 'bikes2ride' ),
					'repeat-x'   => esc_html__( 'Tile Horizontally', 'bikes2ride' ),
					'repeat-y'   => esc_html__( 'Tile Vertically', 'bikes2ride' ),
				),
				'type' => 'control',
			),
			'page_404_bg_position_x' => array(
				'title'   => esc_html__( 'Background Position', 'bikes2ride' ),
				'section' => 'page_404_options',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'bikes2ride' ),
					'center' => esc_html__( 'Center', 'bikes2ride' ),
					'right'  => esc_html__( 'Right', 'bikes2ride' ),
				),
				'type' => 'control',
			),
			'page_404_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'bikes2ride' ),
				'section' => 'page_404_options',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'bikes2ride' ),
					'fixed'  => esc_html__( 'Fixed', 'bikes2ride' ),
				),
				'type' => 'control',
			),
		),
	) );
}

/**
 * Return true if setting is value. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function bikes2ride_is_setting( $control, $setting, $value ) {

	if ( $value == $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Return true if value of passed setting is not equal with passed value.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function bikes2ride_is_not_setting( $control, $setting, $value ) {

	if ( $value !== $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Return true if logo in header has image type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function bikes2ride_is_header_logo_image( $control ) {
	return bikes2ride_is_setting( $control, 'header_logo_type', 'image' );
}

/**
 * Return true if logo in header has text type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function bikes2ride_is_header_logo_text( $control ) {
	return bikes2ride_is_setting( $control, 'header_logo_type', 'text' );
}

/**
 * Return blog-featured-image true if blog layout type is default. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function bikes2ride_is_blog_featured_image( $control ) {
	return bikes2ride_is_setting( $control, 'blog_layout_type', 'default' );
}

/**
 * Return true if sticky label type set to text or text with icon.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function bikes2ride_is_sticky_text( $control ) {
	return bikes2ride_is_not_setting( $control, 'blog_sticky_type', 'icon' );
}

/**
 * Return true if sticky label type set to icon or text with icon.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function bikes2ride_is_sticky_icon( $control ) {
	return bikes2ride_is_not_setting( $control, 'blog_sticky_type', 'label' );
}

/**
 * Return true if More button (in the main menu) has image type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function bikes2ride_is_more_button_type_image( $control ) {

	if ( ( $control->manager->get_setting( 'more_button_type' )->value() == 'image' ) ) {
		return true;
	}

	return false;
}

/**
 * Return true if More button (in the main menu) has text type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function bikes2ride_is_more_button_type_text( $control ) {

	if ( ( $control->manager->get_setting( 'more_button_type' )->value() == 'text' ) ) {
		return true;
	}

	return false;
}

/**
 * Return true if More button (in the main menu) has icon type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function bikes2ride_is_more_button_type_icon( $control ) {

	if ( ( $control->manager->get_setting( 'more_button_type' )->value() == 'icon' ) ) {
		return true;
	}

	return false;
}

/**
 * Return true if option Show header call to action button is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function bikes2ride_is_header_btn_visible( $control ) {
	return bikes2ride_is_setting( $control, 'header_btn_visibility', true );
}

/**
 * Return true if option Show Header Contact Block is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function bikes2ride_is_header_contact_block_visible( $control ) {
	return bikes2ride_is_setting( $control, 'header_contact_block_visibility', true );
}

/**
 * Return true if option Show Footer Contact Block is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function bikes2ride_is_footer_contact_block_visible( $control ) {
	return bikes2ride_is_setting( $control, 'footer_contact_block_visibility', true );
}

/**
 * Return true if option Show Related Posts Block is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function bikes2ride_is_related_posts_visible( $control ) {
	return bikes2ride_is_setting( $control, 'related_posts_visible', true );
}

/**
 * Return true if option Enable Top Panel is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function bikes2ride_is_top_panel_enable( $control ) {
	return bikes2ride_is_setting( $control, 'top_panel_visibility', true );
}

/**
 * Return true if option Show Footer Logo is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function bikes2ride_is_footer_logo_visible( $control ) {
	return bikes2ride_is_setting( $control, 'footer_logo_visibility', true );
}

/**
 * Return true if option Show Footer Widgets Area is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function bikes2ride_is_footer_area_visible( $control ) {
	return bikes2ride_is_setting( $control, 'footer_widget_area_visibility', true );
}

/**
 * Get default header layouts.
 *
 * @since  1.0.0
 * @return array
 */
function bikes2ride_get_header_layout_options() {
	return apply_filters( 'bikes2ride_header_layout_options', array(
		'default' => esc_html__( 'Style 1', 'bikes2ride' ),
		'style-2' => esc_html__( 'Style 2', 'bikes2ride' ),
		'style-3' => esc_html__( 'Style 3', 'bikes2ride' ),
		'style-4' => esc_html__( 'Style 4', 'bikes2ride' ),
		'style-5' => esc_html__( 'Style 5', 'bikes2ride' ),
		'style-6' => esc_html__( 'Style 6', 'bikes2ride' ),
		'style-7' => esc_html__( 'Style 7', 'bikes2ride' ),
	) );
}

/**
 * Get default footer layouts.
 *
 * @since  1.0.0
 * @return array
 */
function bikes2ride_get_footer_layout_options() {
	return apply_filters( 'bikes2ride_footer_layout_options', array(
		'default' => esc_html__( 'Style 1', 'bikes2ride' ),
		'style-2' => esc_html__( 'Style 2', 'bikes2ride' ),
	) );
}

/**
 * Get default header layouts options for Post Meta boxes
 *
 * @return array
 */
function bikes2ride_get_header_layout_pm_options() {
	$inherit_option = array(
		'inherit' => esc_html__( 'Inherit', 'bikes2ride' ),
	);

	$options = bikes2ride_get_header_layout_options();

	return array_merge( $inherit_option, $options );
}

/**
 * Get default footer layouts options for Post Meta boxes
 *
 * @return array
 */
function bikes2ride_get_footer_layout_pm_options() {
	$inherit_option = array(
		'inherit' => esc_html__( 'Inherit', 'bikes2ride' ),
	);

	$options = bikes2ride_get_footer_layout_options();

	return array_merge( $inherit_option, $options );
}

// Move native `site_icon` control (based on WordPress core) in custom section.
add_action( 'customize_register', 'bikes2ride_customizer_change_core_controls', 20 );
/**
 * Move native `site_icon` control (based on WordPress core) into custom section.
 *
 * @since 1.0.0
 * @param  object $wp_customize Object wp_customize.
 * @return void
 */
function bikes2ride_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section         = 'bikes2ride_logo_favicon';
	$wp_customize->get_control( 'background_color' )->label    = esc_html__( 'Body Background Color', 'bikes2ride' );

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}

// Typography utility function
/**
 * Get font styles
 *
 * @since 1.0.0
 * @return array
 */
function bikes2ride_get_font_styles() {
	return apply_filters( 'bikes2ride_get_font_styles', array(
		'normal'  => esc_html__( 'Normal', 'bikes2ride' ),
		'italic'  => esc_html__( 'Italic', 'bikes2ride' ),
		'oblique' => esc_html__( 'Oblique', 'bikes2ride' ),
		'inherit' => esc_html__( 'Inherit', 'bikes2ride' ),
	) );
}

/**
 * Get character sets
 *
 * @since 1.0.0
 * @return array
 */
function bikes2ride_get_character_sets() {
	return apply_filters( 'bikes2ride_get_character_sets', array(
		'latin'        => esc_html__( 'Latin', 'bikes2ride' ),
		'greek'        => esc_html__( 'Greek', 'bikes2ride' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'bikes2ride' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'bikes2ride' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'bikes2ride' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'bikes2ride' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'bikes2ride' ),
	) );
}

/**
 * Get text aligns
 *
 * @since 1.0.0
 * @return array
 */
function bikes2ride_get_text_aligns() {
	return apply_filters( 'bikes2ride_get_text_aligns', array(
		'inherit' => esc_html__( 'Inherit', 'bikes2ride' ),
		'center'  => esc_html__( 'Center', 'bikes2ride' ),
		'justify' => esc_html__( 'Justify', 'bikes2ride' ),
		'left'    => esc_html__( 'Left', 'bikes2ride' ),
		'right'   => esc_html__( 'Right', 'bikes2ride' ),
	) );
}

/**
 * Get font weights
 *
 * @since 1.0.0
 * @return array
 */
function bikes2ride_get_font_weight() {
	return apply_filters( 'bikes2ride_get_font_weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */
function bikes2ride_get_dynamic_css_options() {
	return apply_filters( 'bikes2ride_get_dynamic_css_options', array(
		'prefix'    => 'bikes2ride',
		'type'      => 'theme_mod',
		'parent_handle' => 'bikes2ride-theme-style',
		'single'    => true,
		'css_files' => array(
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/site/elements.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/site/header.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/site/forms.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/site/social.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/site/menus.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/site/post.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/site/navigation.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/site/footer.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/site/misc.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/site/buttons.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/widgets/widget-default.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/widgets/taxonomy-tiles.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/widgets/image-grid.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/widgets/carousel.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/widgets/smart-slider.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/widgets/instagram.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/widgets/subscribe.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/widgets/custom-posts.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/widgets/playlist-slider.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/widgets/featured-posts-block.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/widgets/news-smart-box.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/widgets/contact-information.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/plugins/cherry-team-members.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/plugins/cherry-services-list.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/plugins/cherry-testimonials.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/plugins/cherry-project.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/plugins/cherry-search.css',
			BIKES2RIDE_THEME_DIR . '/assets/css/dynamic/tm-gallery/tm-gallery.css',
		),
		'options' => array(
			'header_logo_font_style',
			'header_logo_font_weight',
			'header_logo_font_size',
			'header_logo_font_family',

			'body_font_style',
			'body_font_weight',
			'body_font_size',
			'body_line_height',
			'body_font_family',
			'body_letter_spacing',
			'body_text_align',

			'h1_font_style',
			'h1_font_weight',
			'h1_font_size',
			'h1_line_height',
			'h1_font_family',
			'h1_letter_spacing',
			'h1_text_align',

			'h2_font_style',
			'h2_font_weight',
			'h2_font_size',
			'h2_line_height',
			'h2_font_family',
			'h2_letter_spacing',
			'h2_text_align',

			'h3_font_style',
			'h3_font_weight',
			'h3_font_size',
			'h3_line_height',
			'h3_font_family',
			'h3_letter_spacing',
			'h3_text_align',

			'h4_font_style',
			'h4_font_weight',
			'h4_font_size',
			'h4_line_height',
			'h4_font_family',
			'h4_letter_spacing',
			'h4_text_align',

			'h5_font_style',
			'h5_font_weight',
			'h5_font_size',
			'h5_line_height',
			'h5_font_family',
			'h5_letter_spacing',
			'h5_text_align',

			'h6_font_style',
			'h6_font_weight',
			'h6_font_size',
			'h6_line_height',
			'h6_font_family',
			'h6_letter_spacing',
			'h6_text_align',

			'breadcrumbs_font_style',
			'breadcrumbs_font_weight',
			'breadcrumbs_font_size',
			'breadcrumbs_line_height',
			'breadcrumbs_font_family',
			'breadcrumbs_letter_spacing',
			'breadcrumbs_text_align',

			'meta_font_style',
			'meta_font_weight',
			'meta_font_size',
			'meta_line_height',
			'meta_font_family',
			'meta_letter_spacing',
			'meta_text_align',

			'regular_accent_color_1',
			'regular_accent_color_2',
			'regular_accent_color_3',
			'regular_text_color',
			'regular_link_color',
			'regular_link_hover_color',
			'regular_h1_color',
			'regular_h2_color',
			'regular_h3_color',
			'regular_h4_color',
			'regular_h5_color',
			'regular_h6_color',

			'invert_accent_color_1',
			'invert_accent_color_2',
			'invert_accent_color_3',
			'invert_text_color',
			'invert_link_color',
			'invert_link_hover_color',
			'invert_h1_color',
			'invert_h2_color',
			'invert_h3_color',
			'invert_h4_color',
			'invert_h5_color',
			'invert_h6_color',

			'header_bg_color',
			'header_bg_image',
			'header_bg_repeat',
			'header_bg_position_x',
			'header_bg_attachment',

			'page_404_bg_color',
			'page_404_bg_repeat',
			'page_404_bg_position_x',
			'page_404_bg_attachment',

			'top_panel_bg',

			'container_width',

			'footer_widgets_bg',
			'footer_bg',

			'onsale_badge_bg',
			'featured_badge_bg',
			'new_badge_bg',
		),
	) );
}

/**
 * Return array of arguments for Google Font loader module.
 *
 * @since  1.0.0
 * @return array
 */
function bikes2ride_get_fonts_options() {
	return apply_filters( 'bikes2ride_get_fonts_options', array(
		'prefix'  => 'bikes2ride',
		'type'    => 'theme_mod',
		'single'  => true,
		'options' => array(
			'body' => array(
				'family'  => 'body_font_family',
				'style'   => 'body_font_style',
				'weight'  => 'body_font_weight',
				'charset' => 'body_character_set',
			),
			'h1' => array(
				'family'  => 'h1_font_family',
				'style'   => 'h1_font_style',
				'weight'  => 'h1_font_weight',
				'charset' => 'h1_character_set',
			),
			'h2' => array(
				'family'  => 'h2_font_family',
				'style'   => 'h2_font_style',
				'weight'  => 'h2_font_weight',
				'charset' => 'h2_character_set',
			),
			'h3' => array(
				'family'  => 'h3_font_family',
				'style'   => 'h3_font_style',
				'weight'  => 'h3_font_weight',
				'charset' => 'h3_character_set',
			),
			'h4' => array(
				'family'  => 'h4_font_family',
				'style'   => 'h4_font_style',
				'weight'  => 'h4_font_weight',
				'charset' => 'h4_character_set',
			),
			'h5' => array(
				'family'  => 'h5_font_family',
				'style'   => 'h5_font_style',
				'weight'  => 'h5_font_weight',
				'charset' => 'h5_character_set',
			),
			'h6' => array(
				'family'  => 'h6_font_family',
				'style'   => 'h6_font_style',
				'weight'  => 'h6_font_weight',
				'charset' => 'h6_character_set',
			),
			'meta' => array(
				'family'  => 'meta_font_family',
				'style'   => 'meta_font_style',
				'weight'  => 'meta_font_weight',
				'charset' => 'meta_character_set',
			),
			'header_logo' => array(
				'family'  => 'header_logo_font_family',
				'style'   => 'header_logo_font_style',
				'weight'  => 'header_logo_font_weight',
				'charset' => 'header_logo_character_set',
			),
			'breadcrumbs' => array(
				'family'  => 'breadcrumbs_font_family',
				'style'   => 'breadcrumbs_font_style',
				'weight'  => 'breadcrumbs_font_weight',
				'charset' => 'breadcrumbs_character_set',
			),
		),
	) );
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function bikes2ride_get_default_footer_copyright() {
	return esc_html__( 'Copyright &copy; %%year%% All rights reserved by %%site-name%% ', 'bikes2ride' );
}

/**
 * Get default contact information.
 *
 * @since  1.0.0
 * @return string
 */
function bikes2ride_get_default_contact_information( $value ) {
	$contact_information = array(
		'address' => esc_html__( '11559 Ventura Boulevard, Studio City, CA 91604', 'bikes2ride' ),
		'phones'  => sprintf( '<a href="tel:%1$s">%1$s</a>; <a href="tel:%2$s">%2$s</a>', esc_html__( '(800)123-0045', 'bikes2ride' ), esc_html__( '(800)123-0046', 'bikes2ride' ) ),
		'email'   => sprintf( '<a href="mailto:%1$s">%1$s</a>', esc_html__( 'info@demolink.org', 'bikes2ride' ) ),
	);

	return $contact_information[ $value ];
}

/**
 * Get FontAwesome icons set
 *
 * @return array
 */
function bikes2ride_get_icons_set() {

	static $font_icons;

	if ( ! $font_icons ) {

		ob_start();

		include BIKES2RIDE_THEME_DIR . '/assets/js/icons.json';
		$json = ob_get_clean();

		$font_icons = array();
		$icons      = json_decode( $json, true );

		foreach ( $icons['icons'] as $icon ) {
			$font_icons[] = $icon['id'];
		}
	}

	return $font_icons;
}

/**
 * Get linear icons set
 *
 * @return array
 */
function bikes2ride_get_linear_icons_set() {

	static $linear_icons;

	if ( ! $linear_icons ) {

		ob_start();

		include BIKES2RIDE_THEME_DIR . '/assets/js/linear-icons.json';
		$json = ob_get_clean();

		$linear_icons = array();
		$icons        = json_decode( $json, true );

		foreach ( $icons['icons'] as $icon ) {
			$linear_icons[] = $icon['id'];
		}
	}

	return $linear_icons;
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function bikes2ride_customize_preview_js() {
	wp_enqueue_script( 'bikes2ride-customize-preview', BIKES2RIDE_THEME_JS . '/customize-preview.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'bikes2ride_customize_preview_js' );
