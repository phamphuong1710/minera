( function( $ ){
/*
form search header js
*/
	// console.log($('#form-search-product'));
	$( '#btn-search-product' ).on( 'click', function(){
		$( '#form-search-product' ).css({ 'display': 'block' });
		$( '.search-product' ).focus();
	} );
	$( '#close-btn' ).on( 'click', function(){
		$( '#form-search-product' ).css({ 'display': 'none' });
	} );

/*

*/
	jQuery('.quantity').each(function() {
		var spinner = jQuery(this),
		input = spinner.find('input[type="number"]'),
		btnUp = spinner.find('#inc'),
		btnDown = spinner.find('#dec'),
		min = input.attr('min'),
		max = input.attr('max');
		console.log(btnUp);
		btnUp.click(function() {
			console.log(btnUp);
			var oldValue = parseFloat(input.val());
			if (oldValue > max) {
				var newVal = oldValue;
			} else {
				var newVal = oldValue + 1;
			}
			var newVal = oldValue + 1;

			spinner.find("input").val(newVal);
			spinner.find("input").trigger("change");

			 $( "[name='update_cart']" ).prop( "disabled", false );
		});

		btnDown.click(function() {
			var oldValue = parseFloat(input.val());
			if (oldValue <= min) {
			  var newVal = oldValue;
			} else {
			  var newVal = oldValue - 1;
			}
			spinner.find("input").val(newVal);
			spinner.find("input").trigger("change");

			$( "[name='update_cart']" ).prop( "disabled", false );
		});

	});

	$( ".shipping-calculator-form b .button" ).on( "click", function(){

		location.reload();
	} );

})(jQuery);