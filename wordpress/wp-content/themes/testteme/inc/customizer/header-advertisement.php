<?php
/**
 * Header Advertisement.
 *
 * @package test_teme
 */

// Add Panel.
$wp_customize->add_panel( 'header_advertisement',
	array(
	'title'      => __( 'Header Advertisement', 'test-teme' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	)
);

// Header Advertisement
$wp_customize->add_section('section_header_advertisement', array(    
	'title'       => __('Advertisement', 'test-teme'),
	'panel'       => 'header_advertisement'    
));

// Show Advertisement
$wp_customize->add_setting('header_advertisement_section_show', array(
	'default' 			=> false,
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'test_teme_sanitize_checkbox'
	)
);

$wp_customize->add_control('header_advertisement_section_show', array(		
	'label' 	=> __('Show Advertisement', 'test-teme'),
	'section' 	=> 'section_header_advertisement',
	'type' 		=> 'checkbox',	
	)
);

// Advertisement Image
$wp_customize->add_setting('header_advertisement_image', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'test_teme_sanitize_image',
));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'test_teme_header_advertisement', 
	array(
			'label' 	=> __('Advertisement Image: 900 x 60', 'test-teme'),
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
    'label'             => esc_html__( 'Advertisement Url', 'test-teme' ),
    'section'           => 'section_header_advertisement',
    'type'              => 'url',
) );