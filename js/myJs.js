$(document).ready(function(){

	// $('.errorLogin').hide();

	$('#peminjaman').bind('mouseover', function() {
		$('this').css({
			-webkit-transform: 'perspective(2000px) rotateY(30deg)',
	   -moz-transform: 'perspective(2000px) rotateY(30deg)',
	    -ms-transform: 'perspective(2000px) rotateY(30deg)',
	     -o-transform: 'perspective(2000px) rotateY(30deg)',
	        transform: 'perspective(2000px) rotateY(30deg)'
		});
	});

});

function errorLogin(){
	$('.errorLogin').show();
	$('.errorLogin').delay(3000).fadeOut();
}