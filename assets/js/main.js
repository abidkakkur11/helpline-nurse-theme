( function () {
	'use strict';

	const menuToggle = document.getElementById( 'menu-toggle' );
	const primaryNavigation = document.getElementById( 'primary-navigation' );

	if ( ! menuToggle || ! primaryNavigation ) {
		return;
	}

	menuToggle.addEventListener( 'click', function () {
		const isOpen = primaryNavigation.classList.toggle( 'is-open' );

		menuToggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
	} );
}() );
