<?php
/**
 * The template for displaying search results pages
 */

get_header();
?>

<section>
	<main>
		<header>
			<h1>
				<?php
				printf( esc_html__( 'Search Results for: %s', 'pgerdau' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header>

		<div>
			<?php if ( have_posts() ) : ?>

				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'search' );

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</div>
	</main>
</section>

<?php
get_footer();
