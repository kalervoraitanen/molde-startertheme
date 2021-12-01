/*
 * Molde Starter Theme: Demo 1 - Scripts
*/

/* Observe when an image is visible in the viewport and fade-in the image. */
var observer = new IntersectionObserver(
  (entries, observer) => {
      entries.forEach(entry => {
          if (entry.intersectionRatio > 0.0) {
              img = entry.target;
              if ( !img.classList.contains('show') ) {
                  img.classList.add('show');
              }
          }
      });
  },
  {}
)
for (let img of document.getElementsByTagName('img')) {
  observer.observe(img);
}


// Add class to <body> element when the search form is expanded.
const handleSearchToggle = function (event) {
  document.querySelector("body").classList.toggle("searchform-open");     
}
document.querySelector(".search-toggle").addEventListener('click', handleSearchToggle ); 


/* Navigation handling with keyboard navigation support. */
 ( function() {
	const siteNavigation = document.querySelector( '.main-nav' );

	/* Check if navigation is set */
	if ( ! siteNavigation ) {
		return;
	}

	const button = document.querySelector( '.nav-button' );

	// Check if navigation toggle button is set */
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if navigation menu is empty.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	/* Check if navigation menu list has a class "nav-menu" otherwise add the class */
	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	// Toggle the .active class each time the button is clicked.
	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle('active');
		button.classList.toggle('close');
		document.querySelector( 'body' ).classList.toggle('nav-open');
		document.querySelector( 'body' ).classList.toggle('no-scroll');
	} );

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	// Toggle focus each time a menu link is focused or blurred.
	for ( const link of links ) {
		link.addEventListener( 'focus', toggleFocus, true );
		link.addEventListener( 'blur', toggleFocus, true );
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for ( const link of linksWithChildren ) {
		link.addEventListener( 'touchstart', toggleFocus, false );
	}

	/* Toggles .focus class on an element. */
	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		if ( event.type === 'touchstart' ) {
			const menuItem = this.parentNode;
			event.preventDefault();
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}
	}
}() );
/* End of navigation handling */