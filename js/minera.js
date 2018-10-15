( function( $ ){
/*
form search header js
*/
	console.log($('#form-search-product'));
	$( '#btn-search-product' ).on( 'click', function(){
		$( '#form-search-product' ).css({ 'display': 'block' });
	} );
	$( '#close-btn' ).on( 'click', function(){
		$( '#form-search-product' ).css({ 'display': 'none' });
	} );

	
})(jQuery);