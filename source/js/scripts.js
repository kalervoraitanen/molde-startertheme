/*
 * Molde Scripts File
*/

// Wait till the DOM is fully loaded
window.addEventListener('DOMContentLoaded', (event) => {
  
  // Change the aria-expanded value depending wheter
	// the navigation is expanded or not
  const handleNavBtn = function (event) {
    let expanded = this.getAttribute("aria-expanded");

    if (expanded == "false") {
      this.setAttribute("aria-expanded", "true");
    }
    else {
      this.setAttribute("aria-expanded", "false");
    }
  }

  // Check if the navigation button is clicked
  document.querySelector(".nav-button").addEventListener('click', handleNavBtn );


 	// Change the aria-expanded value depending wheter
	// the search is expanded or not
  const handleSearchBtn = function (event) {
    let searchForm = document.querySelector(".searchform");
    let searchIcon = document.querySelector(".search-icon");
    let expanded = this.getAttribute("aria-expanded");

    searchForm.classList.toggle("active");

    if ( searchForm.classList.contains("active") ) {
      searchIcon.innerHTML = "x";
    }
    else {
      searchIcon.innerHTML = "&#9906;";
    }

    if ( expanded === "false" ) {
      this.setAttribute("aria-expanded", "true");
    }
    else {
      this.setAttribute("aria-expanded", "false");
    }
  } 

   // Check if the search toggle button is clicked
  document.querySelector(".search-toggle").addEventListener('click', handleSearchBtn );

  // Add menu items with submenus to aria-haspopup="true".
  document.querySelectorAll( '.menu-item-has-children' ).forEach(item => item.setAttribute( 'aria-haspopup', 'true' ));

  const handleDropDownBtns = function (event) {
    event.preventDefault();
    this.classList.toggle( 'toggled-on' );
    console.log(this);
    if ( this.classList.contains("toggled-on") ) {
      this.innerText = "-";
      this.setAttribute( 'aria-expanded', 'true' );
    }
    else {
      this.innerText = "+";
      this.setAttribute( 'aria-expanded', 'false' );
    }
    this.nextSibling.classList.toggle( 'toggled-on' );
  }
  // Watch if the dropdown button is clicked
  document.querySelectorAll( '.dropdown-toggle' ).forEach(btn => btn.addEventListener('click', handleDropDownBtns )); 

});
