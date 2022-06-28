<?php
/**
 * The sidebar containing the main widget area
 */

if ( ! is_active_sidebar( 'sidebar-one' ) ) {
	return;
}
?>

<aside>
	<?php dynamic_sidebar( 'sidebar-one' ); ?>
</aside>
