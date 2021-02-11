<aside id="sidebar" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'molde-theme' ); ?>">

	<?php /* If sidebar is active show it's content */ ?>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

		<?php dynamic_sidebar( 'sidebar-1' ); ?>

	<?php else : ?>

		<?php
			/*
			 * This content shows up if there are no widgets defined in the backend.
			*/
		?>

	<?php endif; ?>

</aside>
