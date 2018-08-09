window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 11111) {
        document.getElementById("guide").style.display = "block";
    } else {
        document.getElementById("guide").style.display = "none";
    } 
	
}
