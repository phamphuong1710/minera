jQuery(document).ready(function () {


	function accordion() {
		var accordion = $( '.minera-accordion-item .minera-title-item' );
		var t = accordion.length;
		for (var i = 0; i < t; i++ ) {


			accordion[i].addEventListener( 'click', function () {


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
	}


	function counter() {
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
	}




	if (undefined !== window.elementorFrontend && undefined !== window.elementorFrontend.hooks) {
		window.elementorFrontend.hooks.addAction('frontend/element_ready/global', function () {

			accordion();
			counter();

		});
	}
});