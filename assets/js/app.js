require('../sass/app.scss');

import '../js/admin.js';

$(function() {


	$('[data-toggle="tooltip"]').tooltip();

	$('#resume-list').hide();
	$('#project-list').hide();
	$('#message-list').hide();
	$('#skill-list').hide();
	$('#about-list').hide();
	$('#myNav').hide();
	$('.show-more').hide();


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
	$('#admin-about').click(function(){
		$('#about-list').fadeToggle('5000');
	});

	$('.hamburger').on('click', function() {
		$(this).toggleClass('opened');
		$('#myNav').toggle('fast');
	});

	$('.btn-more').click(function(){
		$('.show-more').fadeToggle('5000');
		if ($('.btn-more').html() == 'Show more') {
			$('.btn-more').html('Show less');
		}else {
			$(document).scrollTop( $("#projects").offset().top );
			$('.btn-more').html('Show more');

		}
	});

	

	$('.alert-delete').click(function(e) {
		e.preventDefault();
		if (confirm("Voulez-vous supprimer cet enregistrement ?")) {
			$(this).parent('form').submit();
		}
	});

	$( ".overlay-content > a" ).on('click', function() {
		$('#myNav').hide('fast');
		$('.hamburger').removeClass('opened');
	});


	$('.col-desc:eq(1)').addClass('order-sm-2');
	$('.col-desc:eq(3)').addClass('order-sm-2');
	$('.col-desc:eq(5)').addClass('order-sm-2');
	$('.col-desc:eq(7)').addClass('order-sm-2');
	$('.col-desc:eq(9)').addClass('order-sm-2');


})


var $button = document.querySelector('.btn-send');
$button.addEventListener('click', function() {
	var duration = 0.3,
	delay = 0.08;
	TweenMax.to($button, duration, {scaleY: 1.6, ease: Expo.easeOut});
	TweenMax.to($button, duration, {scaleX: 1.2, scaleY: 1, ease: Back.easeOut, easeParams: [3], delay: delay});
	TweenMax.to($button, duration * 1.25, {scaleX: 1, scaleY: 1, ease: Back.easeOut, easeParams: [6], delay: delay * 3 });
});


// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
//var content = document.querySelectorAll('.modal-inner');
var img = document.querySelectorAll('.portfolio-projects--image');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
var captionText1 = document.getElementById("caption1");

//console.log(content[0]);

for (var i = 0; i < img.length; i++) {
	img[i].addEventListener('click', function() {
		modal.style.display = "block";
		modalImg.src = this.src;
		this.alt = this.alt.replace("image", "");
		
		captionText.innerHTML = this.alt;
		captionText1.innerHTML = '<p>'+ this.dataset.text + '</p>';
		//console.log(i);
	});
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
	modal.style.display = "none";
}


