(function ( $ ) {
	$ ( function () {
		var header = {
			init : function () {
				$ ( document ).ready ( function () {
					$ ( '#navbarNav a[href="' + location.pathname + '"]' ).parent ().addClass ( 'active' );
					$ ( '#navbarCollapse a[href="' + location.pathname + '"]' ).parent ().addClass ( 'active' );
					$ ( 'html' ).click ( function () {
						$ ( "#navbarCollapse" ).removeClass ( "show_menu" );
					} );
					$ ( "#mobile_menu_button" ).click ( function () {
						event.stopPropagation ();
						$ ( "#navbarCollapse" ).toggleClass ( "show_menu" );
					} )
				} );
			}
		}
		header.init ();
	} );
}) ( jQuery );