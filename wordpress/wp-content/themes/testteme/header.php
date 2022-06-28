<?php
/**
 * The header for our theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'test-teme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<div class="container">
				<div class="site-branding-container">
					<div class="site-branding-logo">
						<?php the_custom_logo(); ?>
					</div>

					<div class="site-branding-text">
						<?php if ( is_front_page() ) : ?>
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); ?>
								</a>
							</h1>
						<?php else : ?>
							<p class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); ?>
								</a>
							</p>
						<?php endif; ?>

						<?php
						$description = get_bloginfo( 'description', 'display' );

						if ( $description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo esc_html( $description ); ?></p>
						<?php endif; ?>
					</div>
				</div>

				<?php 
				$header_advertisement_section_show   = get_theme_mod( 'header_advertisement_section_show', false );
				$header_advertisement_image          = get_theme_mod( 'header_advertisement_image' );
				$header_advertisement_url            = get_theme_mod( 'header_advertisement_url', "#" );

				if ( $header_advertisement_section_show == true ): ?>
					<?php if( !empty( $header_advertisement_image ) && !empty( $header_advertisement_url ) ) : ?>
	                	<div id="header-advertisement">
	                    	<a href="<?php echo esc_url($header_advertisement_url); ?>" target="_blank"><img src="<?php echo esc_url($header_advertisement_image); ?>" alt="<?php esc_attr_e('header-advertisement', 'test-teme'); ?>"></a>
	                	</div>
        			<?php endif; ?>
            	<?php endif; ?>
			</div>
		</div>
		
		<nav id="site-navigation" class="main-navigation navigation-menu">
			<div class="container">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<?php
						echo test_teme_get_svg( array( 'icon' => 'bars' ) );
						echo test_teme_get_svg( array( 'icon' => 'close' ) );
					?>
					<span class="primary-menu-label"><?php esc_html_e( 'Menu', 'test-teme' ); ?></span>
				</button>

				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary_menu',
	    			'container' 	 => false,
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'nav-menu',
				) );
				?>

				<?php get_search_form(); ?>
			</div>
		</nav>
	</header>

	<?php if( is_front_page() || !is_paged() ) {
		get_template_part( 'inc/header', 'image' );
	} ?>

	<div id="content" class="site-content">
		

