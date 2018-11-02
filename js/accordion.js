( function ( $ ) {
	/*
	* Accordion widget
	*/

	
	var accordion = $( '.minera-accordion-item .minera-title-item' );
	var t = accordion.length;
	for (var i = 0; i < t; i++ ) {


		accordion[i].addEventListener( 'click', function () {

			// $( this ).parents().find('.accordion-item-active').removeClass('accordion-item-active');
			// $( this ).parents().find('.minera-accordion-active').removeClass('minera-accordion-active');

			this.classList.toggle("accordion-item-active");
			this.parentElement.classList.toggle('minera-accordion-active');

			var panel = this.nextElementSibling;
			if (panel.style.display === "block") {
				panel.style.display = "none";
			} else {
				panel.style.display = "block";
			}


		} );
	}
} )(jQuery);