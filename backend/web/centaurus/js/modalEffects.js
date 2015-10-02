/**
 * modalEffects.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
//var ModalEffects = (function() {

	//function init() {
	function modalEffects()
    {

		var overlay = document.querySelector( '.md-overlay' );

		[].slice.call( document.querySelectorAll( '.md-trigger' ) ).forEach( function( el, i ) {

			var modal = document.querySelector( '#' + el.getAttribute( 'data-modal' ) ),
				close = modal ? modal.querySelector( '.md-close' ) : null;

			function removeModal( hasPerspective ) {
				classie.remove( modal, 'md-show' );
				if ($(modal).attr('url')) {
					window.history.pushState('string', 'Title', $(modal).attr('url'));
				}

				if( hasPerspective ) {
					classie.remove( document.documentElement, 'md-perspective' );
				}
			}

			function removeModalHandler() {
				removeModal( classie.has( el, 'md-setperspective' ) );
			}

			el.addEventListener( 'click', function( ev ) {
				classie.add( modal, 'md-show' );
				overlay.removeEventListener( 'click', removeModalHandler );
				overlay.addEventListener( 'click', removeModalHandler );

				if( classie.has( el, 'md-setperspective' ) ) {
					setTimeout( function() {
						classie.add( document.documentElement, 'md-perspective' );
					}, 25 );
				}
			});

			if (close) {
				close.addEventListener( 'click', function( ev ) {
					ev.stopPropagation();
					removeModalHandler();
				});
			}

			//close on escape
			$(document).keyup(function(e) {
				if (e.keyCode == 27) {
					e.stopPropagation();
					removeModalHandler();
				}
			});

		} );


	}

	//init();
	modalEffects();
    $(document).ajaxStop(function() {
        modalEffects();
    });

//})();