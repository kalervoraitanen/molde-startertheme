<aside id="sidebar" role="complementary">

	<?php /* If sidebar is active show it's content */ ?>
	<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

		<ul>

		<?php dynamic_sidebar( 'sidebar-1' ); ?>
		
		</ul>

	<?php else : ?>

		<?php
			/*
			 * This content shows up if there are no widgets defined in the backend.
			*/
		?>

	<?php endif; ?>

</aside>
