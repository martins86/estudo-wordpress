<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test_teme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item'); ?>>
	<div class="blog-post-item clear">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="featured-image">
				<?php test_teme_post_thumbnail(); ?>
			</div><!-- .featured-image -->
        <?php endif; ?>
        
        <div class="entry-container">

			<header class="entry-header">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-meta">
				<?php test_teme_posted_on(); ?>
			</div><!-- .entry-meta -->
		</div><!-- .entry-container -->
	</div><!-- .blog-post-item -->
</article><!-- #post-<?php the_ID(); ?> -->