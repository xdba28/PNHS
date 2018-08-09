// Open Side Navigator
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
} 

// Close Side Navigator
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}

// When the user scrolls down 300px from the top of the document, side Navigation will show up
$(document).ready(function(){

     $(window).scroll(function () {

            if ($(this).scrollTop() > 300) {

                $('#openBtn').fadeIn();

            } 
	    else {
		$('#openBtn').tooltip('hide');

                $('#openBtn').fadeOut();
	    }

        });


        $('#openBtn').click(function () {

            $('#openBtn').tooltip('hide');

              return false;

        });

        
        
$('#openBtn').tooltip('show');

});
