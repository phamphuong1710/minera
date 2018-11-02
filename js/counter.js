( function ( $ ) {
	/*
	* Accordion widget
	*/

	var counter = $( '.minera-counter' );
	var t = counter.length;
	console.log(t)
	console.log( counter );
	for (var i = 0; i < counter.length; i++) {
		console.log();
		var spinner = jQuery(counter[i]);
		var end = spinner.find( '.minera-counter-number .counter-number' );
		var endcount = end.attr( 'data-to-value' );
		end.counterUp({
			delay: 10,
			time: 1000
		});
	};
	 
} )(jQuery);