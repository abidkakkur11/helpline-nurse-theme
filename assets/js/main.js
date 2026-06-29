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

	// FAQ Accordion Logic
	const faqQuestions = document.querySelectorAll( '.faq-question' );
	faqQuestions.forEach( function ( button ) {
		button.addEventListener( 'click', function () {
			const isExpanded = this.getAttribute( 'aria-expanded' ) === 'true';
			const answerId = this.getAttribute( 'aria-controls' );
			const answerDiv = document.getElementById( answerId );

			// Toggle state
			this.setAttribute( 'aria-expanded', ! isExpanded );
			
			if ( answerDiv ) {
				if ( isExpanded ) {
					answerDiv.setAttribute( 'hidden', '' );
				} else {
					answerDiv.removeAttribute( 'hidden' );
				}
			}
		} );
	} );
	// Scroll Entrance Animations for Sections
	const observerOptions = {
		root: null,
		rootMargin: '0px',
		threshold: 0.15
	};

	const sectionObserver = new IntersectionObserver( ( entries, observer ) => {
		entries.forEach( entry => {
			if ( entry.isIntersecting ) {
				entry.target.classList.add( 'is-visible' );
				observer.unobserve( entry.target ); // Only animate once
			}
		} );
	}, observerOptions );

	const sections = document.querySelectorAll( 'section' );
	sections.forEach( section => {
		section.classList.add( 'animate-on-scroll' );
		sectionObserver.observe( section );
	} );
}() );
