<?php
/**
 * Test Teme functions and definitions
 */

if ( ! function_exists( 'test_teme_setup' ) ) :
	function test_teme_setup() {
		load_theme_textdomain(
			'test-teme',
			get_template_directory() . '/languages'
		);
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus( array(
			'primary_menu' => esc_html__( 'Primary Menu', 'test-teme' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support(
			'custom-background',
			apply_filters(
				'test_teme_custom_background_args',
				array(
					'default-color' => 'fff',
					'default-image' => '',
					)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		add_editor_style( 
			array( '/assets/css/editor-style.css', test_teme_fonts_url() )
		);
		add_theme_support( 
			'editor-color-palette',
			array(
				array(
					'name' => esc_html__( 'Blue', 'test-teme' ),
					'slug' => 'blue',
					'color' => '#2c7dfa',
				),
				array(
					'name' => esc_html__( 'Green', 'test-teme' ),
					'slug' => 'green',
					'color' => '#07d79c',
				),
				array(
					'name' => esc_html__( 'Orange', 'test-teme' ),
					'slug' => 'orange',
					'color' => '#ff8737',
				),
				array(
					'name' => esc_html__( 'Black', 'test-teme' ),
					'slug' => 'black',
					'color' => '#2f3633',
				),
				array(
					'name' => esc_html__( 'Grey', 'test-teme' ),
					'slug' => 'grey',
					'color' => '#82868b',
				),
			)
		);

		add_theme_support( 'align-wide' );
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name' => esc_html__( 'small', 'test-teme' ),
					'shortName' => esc_html__( 'S', 'test-teme' ),
					'size' => 12,
					'slug' => 'small'
				),
				array(
					'name' => esc_html__( 'regular', 'test-teme' ),
					'shortName' => esc_html__( 'M', 'test-teme' ),
					'size' => 16,
					'slug' => 'regular'
				),
				array(
					'name' => esc_html__( 'larger', 'test-teme' ),
					'shortName' => esc_html__( 'L', 'test-teme' ),
					'size' => 36,
					'slug' => 'larger'
				),
				array(
					'name' => esc_html__( 'huge', 'test-teme' ),
					'shortName' => esc_html__( 'XL', 'test-teme' ),
					'size' => 48,
					'slug' => 'huge'
				)
			)
		);
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );
	}
endif;

add_action( 'after_setup_theme', 'test_teme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function test_teme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'test_teme_content_width', 790 );
}
add_action( 'after_setup_theme', 'test_teme_content_width', 0 );

/**
 * Register custom fonts.
 */
function test_teme_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	if ( 'off' !== _x( 'on', 'Poppins: on or off', 'test-teme' ) ) {
		$fonts[] = 'Poppins:300,400,500,600';
	}

	if ( 'off' !== _x( 'on', 'Raleway: on or off', 'test-teme' ) ) {
		$fonts[] = 'Raleway:300,400,500,600,700';
	}

	if ( 'off' !== _x( 'on', 'Lora: on or off', 'test-teme' ) ) {
		$fonts[] = 'Lora:400,400i,700,700i';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		),  'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Register widget area.
 */
function test_teme_widgets_init() {
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Sidebar', 'test-teme' ),
			'id'            => 'sidebar-one',
			'description'   => esc_html__( 'Add widgets here.', 'test-teme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) 
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'test-teme' ),
			'id'            => 'sidebar-two',
			'description'   => __( 'Add widgets here to appear in your footer.', 'test-teme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'test-teme' ),
			'id'            => 'sidebar-three',
			'description'   => __( 'Add widgets here to appear in your footer.', 'test-teme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'test-teme' ),
			'id'            => 'sidebar-four',
			'description'   => __( 'Add widgets here to appear in your footer.', 'test-teme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'test_teme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function test_teme_scripts() {
	$fonts_url = test_teme_fonts_url();

	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'test-teme-google-fonts', $fonts_url, array(), null );
	}

	wp_enqueue_style( 'test-teme-blocks', get_template_directory_uri() . '/assets/css/blocks.css' );

	wp_enqueue_style( 'test-teme-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'test-teme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'test-teme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '1.0', true );
	
	$test_teme_l10n = array(
		'quote'          => test_teme_get_svg( array( 'icon' => 'angle-down' ) ),
		'expand'         => esc_html__( 'Expand child menu', 'test-teme' ),
		'collapse'       => esc_html__( 'Collapse child menu', 'test-teme' ),
		'icon'           => test_teme_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) ),
	);
	
	wp_localize_script( 'test-teme-navigation', 'test_teme_l10n', $test_teme_l10n );

	wp_enqueue_script('imagesloaded');
	
	wp_enqueue_script( 'jquery-packery', get_template_directory_uri() . '/assets/js/packery.pkgd.js', array(), 'v2.1.2', true );

	wp_enqueue_script( 'test-teme-custom-script', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'test_teme_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since Test Teme 1.0.0
 */
function test_teme_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'test-teme-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'test-teme-fonts', test_teme_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'test_teme_block_editor_styles' );

/**
 * Removing category text from category page.
 */
function test_teme_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'test_teme_category_title' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * SVG icons functions and filters.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom classes for customizer options
 */
require get_template_directory() . '/inc/customizer/customizer-classes.php';

