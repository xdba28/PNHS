$(document).ready(function(){

     $(window).scroll(function () {

            if ($(this).scrollTop() > 300) {

                $('#back-to-top').fadeIn();

            } 
	    else {
		$('#back-to-top').tooltip('hide');

                $('#back-to-top').fadeOut();
	    }

        });


        $('#back-to-top').click(function () {

            $('#back-to-top').tooltip('hide');

            $('body,html').animate({

                scrollTop: 0

            }, 800);

            return false;

        });

        
        
$('#back-to-top').tooltip('show');

});