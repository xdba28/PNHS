<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 510  || document.documentElement.scrollTop > 510) {
        document.getElementById("submission").style.display = "block";
    } else {
        document.getElementById("submission").style.display = "none";
    }

}
</script>				
