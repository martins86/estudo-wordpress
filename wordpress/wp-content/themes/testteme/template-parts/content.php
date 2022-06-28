<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mero_magazine
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item'); ?>>
	<div class="blog-post-item clear">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="featured-image">
				<?php mero_magazine_post_thumbnail(); ?>
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
				<?php mero_magazine_posted_on(); ?>
			</div><!-- .entry-meta -->
		</div><!-- .entry-container -->
	</div><!-- .blog-post-item -->
</article><!-- #post-<?php the_ID(); ?> -->
