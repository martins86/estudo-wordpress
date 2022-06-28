<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */

get_header();
?>

<div class="container">
	<main>
		<section>
			<header>
				<h3>
					<?php esc_html_e( '404', 'testteme' ); ?>
				</h3>
				<h1>
					<?php esc_html_e(
						 'Oops! That page can&rsquo;t be found.',
						 'testteme'
					 ); ?>
				</h1>
			</header>

			<div>
				<p>
					<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'testteme' ); ?>
				</p>
				<?php get_search_form(); ?>
			</div>
		</section>
	</main>
</div>

<?php
get_footer();
