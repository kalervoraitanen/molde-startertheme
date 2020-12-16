/*
 * Molde Scripts File
*/

jQuery(document).ready(function($) { // Start of jQuery

/*
 * Put your jQuery code here
*/

	// Change the aria-expanded value depending wheter
	// the navigation is expanded or not
  $(".nav-button").click(function() {
    $(".main-nav").toggleClass("active");

    if( $(this).attr('aria-expanded') === 'true' ) {
      $(this).attr( 'aria-expanded', 'false');
    }
    else {
      $(this).attr( 'aria-expanded', 'true');       
    }   
  });

	// Change the aria-expanded value depending wheter
	// the search is expanded or not
  $(".search-toggle").click(function(event) {
    $(".searchform").toggleClass("active");

    // Change the search icon button
    if( $(".searchform").hasClass("active") )
      $(".search-icon").html("x");
    else
      $(".search-icon").html("&#9906;");

    if( $(this).attr('aria-expanded') === 'true' ) {
      $(this).attr( 'aria-expanded', 'false');
    }
    else {
      $(this).attr( 'aria-expanded', 'true');       
    }   
  });

}); // End of jQuery
