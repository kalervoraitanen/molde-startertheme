/*
 * Molde Starter Theme: Demo 5 - Scripts
*/

/* Masonry layout for sidebar */
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

var grids = _toConsumableArray(document.querySelectorAll('aside'));

if (grids.length && getComputedStyle(grids[0]).gridTemplateRows !== 'masonry') {
  var layout = function layout() {
    grids.forEach(function (grid) {
      /* get the post relayout number of columns */
      var ncol = getComputedStyle(grid._el).gridTemplateColumns.split(' ').length;
      grid.items.forEach(function (c) {
        var new_h = c.getBoundingClientRect().height;

        if (new_h !== +c.dataset.h) {
          c.dataset.h = new_h;
          grid.mod++;
        }
      });
      /* if the number of columns has changed */

      if (grid.ncol !== ncol || grid.mod) {
        /* update number of columns */
        grid.ncol = ncol;
        /* revert to initial positioning, no margin */

        grid.items.forEach(function (c) {
          return c.style.removeProperty('margin-top');
        });
        /* if we have more than one column */

        if (grid.ncol > 1) {
          grid.items.slice(ncol).forEach(function (c, i) {
            var prev_fin = grid.items[i].getBoundingClientRect().bottom
            /* bottom edge of item above */
            ,
                curr_ini = c.getBoundingClientRect().top
            /* top edge of current item */
            ;
            c.style.marginTop = "".concat(prev_fin + grid.gap - curr_ini, "px");
          });
        }

        grid.mod = 0;
      }
    });
  };

  grids = grids.map(function (grid) {
    return {
      _el: grid,
      gap: parseFloat(getComputedStyle(grid).gridRowGap),
      items: _toConsumableArray(grid.childNodes).filter(function (c) {
        return c.nodeType === 1 && +getComputedStyle(c).gridColumnEnd !== -1;
      }),
      ncol: 0,
      mod: 0
    };
  });
  addEventListener('load', function (e) {
    layout();
    /* initial load */

    addEventListener('resize', layout, false);
    /* on resize */
  }, false);
}
/* End of Masonry layout for sidebar */


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