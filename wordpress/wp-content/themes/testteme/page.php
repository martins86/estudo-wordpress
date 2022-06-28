<?php
/**
 * The template for displaying all pages
 */

get_header();
?>

<div>
	<main>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile;
		?>
	</main>
</div>

<?php
get_footer();
