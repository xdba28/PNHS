$(document).ready(function(){
    $(window).show(function () {
        if ($(this).scrollTop()) {
            $('#back-to-top').show();
        } 
	    else {
		    $('#back-to-top').tooltip('hide');
            $('#back-to-top').show();
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