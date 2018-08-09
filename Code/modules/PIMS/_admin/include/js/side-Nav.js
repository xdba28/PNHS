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

// When the user scrolls down 600px from the top of the document, side Navigation will show up
$(document).ready(function(){
     $(window).show(function() {
        if ($(this).scrollTop()) {
            $('#openBtn').show();
        } 
        else {
            $('#openBtn').tooltip('hide');
            $('#openBtn').show();
        }
    });
    $('#openBtn').click(function () {
        $('#openBtn').tooltip('hide');
        return false;
    });
    $('#openBtn').tooltip('show');
});