require('../sass/app.scss');


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

	$('#header').css("height", $(window).height());


})

//SCROLL BY 100VH
$(document).ready(function () {
    var divs = $('.mydiv');
    var dir = 'up'; // wheel scroll direction
    var div = 0; // current div
    $(document.body).on('DOMMouseScroll mousewheel', function (e) {
        if (e.originalEvent.detail > 0 || e.originalEvent.wheelDelta < 0) {
            dir = 'down';
        } else {
            dir = 'up';
        }
        // find currently visible div :
        div = -1;
        divs.each(function(i){
            if (div<0 && ($(this).offset().top >= $(window).scrollTop())) {
                div = i;
            }
        });
        if (dir == 'up' && div > 0) {
            div--;
        }
        if (dir == 'down' && div < divs.length) {
            div++;
        }
        //console.log(div, dir, divs.length);
        $('html,body').stop().animate({
            scrollTop: divs.eq(div).offset().top
        }, 1000);
        return false;
    });

    //BACK TO TOP
//     $(window).resize(function () {
//         $('html,body').scrollTop(divs.eq(div).offset().top);
//     });



});


var $button = document.querySelector('.btn-send');
$button.addEventListener('click', function() {
	var duration = 0.3,
	delay = 0.08;
	TweenMax.to($button, duration, {scaleY: 1.6, ease: Expo.easeOut});
	TweenMax.to($button, duration, {scaleX: 1.2, scaleY: 1, ease: Back.easeOut, easeParams: [3], delay: delay});
	TweenMax.to($button, duration * 1.25, {scaleX: 1, scaleY: 1, ease: Back.easeOut, easeParams: [6], delay: delay * 3 });
});