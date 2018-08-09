// When the user scrolls down 600px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
        document.getElementById("openBtn").style.display = "block";
    } else {
        document.getElementById("openBtn").style.display = "none";
    }
}

