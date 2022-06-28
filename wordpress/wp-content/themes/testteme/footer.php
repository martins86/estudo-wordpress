<?php
/**
 * The template for displaying the footer
 */

?>
	</div>

	<footer>
		<?php if ( is_active_sidebar( 'sidebar-two' ) || is_active_sidebar( 'sidebar-three' ) || is_active_sidebar( 'sidebar-four' ) ) : ?>
			<div>
				<?php
					get_template_part( 'inc/footer', 'widgets' );
				?>
			</div>
		<?php endif; ?>

		<div>
			<div>
				<?php
				$copyright_text = sprintf( __( 'Test Teme by %s', 'test-teme' ), '<a target="_blank" rel="designer" href="'.esc_url( '#' ).'">'. esc_html__( 'Thiago Martins', 'test-teme' ). '</a>' ); ?>

				<?php echo $copyright_text; ?>
			</div>
		</div>
	</footer>

	<a href="#page" class="to-top"></a>
	
</div>

<?php wp_footer(); ?>

</body>
</html>
