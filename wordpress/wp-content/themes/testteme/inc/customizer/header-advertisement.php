<?php
/**
 * Header Advertisement.
 *
 * @package mero_magazine
 */

// Add Panel.
$wp_customize->add_panel( 'header_advertisement',
	array(
	'title'      => __( 'Header Advertisement', 'mero-magazine' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	)
);

// Header Advertisement
$wp_customize->add_section('section_header_advertisement', array(    
	'title'       => __('Advertisement', 'mero-magazine'),
	'panel'       => 'header_advertisement'    
));

// Show Advertisement
$wp_customize->add_setting('header_advertisement_section_show', array(
	'default' 			=> false,
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'mero_magazine_sanitize_checkbox'
	)
);

$wp_customize->add_control('header_advertisement_section_show', array(		
	'label' 	=> __('Show Advertisement', 'mero-magazine'),
	'section' 	=> 'section_header_advertisement',
	'type' 		=> 'checkbox',	
	)
);

// Advertisement Image
$wp_customize->add_setting('header_advertisement_image', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'mero_magazine_sanitize_image',
));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mero_magazine_header_advertisement', 
	array(
			'label' 	=> __('Advertisement Image: 900 x 60', 'mero-magazine'),
            'settings'  => 'header_advertisement_image',
			'section' 	=> 'section_header_advertisement',
        )
    )
);

// Advertisement Url
$wp_customize->add_setting( 'header_advertisement_url', array(
	'default' 			=> '#',
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'header_advertisement_url', array(
    'label'             => esc_html__( 'Advertisement Url', 'mero-magazine' ),
    'section'           => 'section_header_advertisement',
    'type'              => 'url',
) );