<?php
/**
 * The main template file
 */

get_header();
?>

<div>
	<main>
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</main>
</div>

<?php
get_footer();
