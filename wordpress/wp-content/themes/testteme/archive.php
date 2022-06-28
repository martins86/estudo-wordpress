<?php
/**
 * The template for displaying archive pages
 */

get_header();
?>

<div class="container">
		<main>					
			<div>
				<?php if ( have_posts() ) : ?>
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>
			<?php
				get_template_part( 'template-parts/content', 'pagination' );
			?>
		</main>
	</div>
</div>

<?php
get_footer();
