/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	//Update header background color...
	wp.customize( 'header_color', function( value ) {
		value.bind( function( newval ) {
			$('.jumbotron').css('background-color', newval );
		} );
	} );

	//Update header background color...
	wp.customize( 'card_one_image', function( value ) {
		value.bind( function( newval ) {
			$('#card-one').css('background-image', newval );
		} );
	} );

	//Update header background color...
	wp.customize( 'card_two_image', function( value ) {
		value.bind( function( newval ) {
			$('#card-two').css('background-image', newval );
		} );
	} );

	//Update header background color...
	wp.customize( 'card_three_image', function( value ) {
		value.bind( function( newval ) {
			$('#card-three').css('background-image', newval );
		} );
	} );

} )( jQuery );