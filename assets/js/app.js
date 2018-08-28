require('../sass/app.scss');

import '../js/admin.js';

$(function() {
	$('#resume-list').hide();
	$('#project-list').hide();
	$('#message-list').hide();
	$('#skill-list').hide();
	$('#myNav').hide();


	$('#resume').click(function(){
		$('#resume-list').toggle('fast');
	});
	$('#project').click(function(){
		$('#project-list').animate({
			width: "toggle"
		});
	});
	$('#message').click(function(){
		$('#message-list').fadeToggle('5000');
	});
	$('#skill').click(function(){
		$('#skill-list').fadeToggle('5000');
	});

	$('.hamburger').on('click', function() {
		$(this).toggleClass('opened');
		$('#myNav').toggle('fast');
	});



	$('.alert-delete').click(function(e) {
		e.preventDefault();
		if (confirm("Voulez-vous supprimer cet enregistrement ?")) {
			$(this).parent('form').submit();
		}
	});

	//FIX MOBILE BROWSER BAR ON 100VH HEADER

	// $('#header').css("height", $(window).height());



	$( ".overlay-content > a" ).on('click', function() {
		$('#myNav').hide('fast');
		$('.hamburger').removeClass('opened');
	});


})


// Check that service workers are registered
// if ('serviceWorker' in navigator) {
//   // Use the window load event to keep the page load performant
//   window.addEventListener('load', () => {
//     navigator.serviceWorker.register('/service_worker.js');
//   });
// }

var $button = document.querySelector('.btn-send');
$button.addEventListener('click', function() {
	var duration = 0.3,
	delay = 0.08;
	TweenMax.to($button, duration, {scaleY: 1.6, ease: Expo.easeOut});
	TweenMax.to($button, duration, {scaleX: 1.2, scaleY: 1, ease: Back.easeOut, easeParams: [3], delay: delay});
	TweenMax.to($button, duration * 1.25, {scaleX: 1, scaleY: 1, ease: Back.easeOut, easeParams: [6], delay: delay * 3 });
});


