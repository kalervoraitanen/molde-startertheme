/*
 * Molde Scripts File
*/

// Wait till the DOM is fully loaded
window.addEventListener('DOMContentLoaded', (event) => {

  // Change the aria-expanded value depending wheter
	// the navigation is expanded or not
  document.querySelector(".nav-button").addEventListener('click', handleNavBtn );
  
  function handleNavBtn(event) {
    let expanded = this.getAttribute("aria-expanded");

    document.querySelector(".main-nav").classList.toggle("active");

    if (expanded == "false") {
      this.setAttribute("aria-expanded", "true");
    }
    else {
      this.setAttribute("aria-expanded", "false");
    }
  }


 	// Change the aria-expanded value depending wheter
	// the search is expanded or not

  document.querySelector(".search-toggle").addEventListener('click', handleSearchBtn );

  function handleSearchBtn(event) {
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
});
