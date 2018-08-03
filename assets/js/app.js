require('../sass/app.scss');

$(function() {
	$('#resume-list').hide();
	$('#project-list').hide();
	$('#message-list').hide();
	$('#skill-list').hide();

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


	$('.alert-delete').click(function(e) {
		e.preventDefault();
		if (confirm("Voulez-vous supprimer cet enregistrement ?")) {
			$(this).parent('form').submit();
		}
	});
})
