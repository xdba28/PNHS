$(document).ready(function () {
  var trigger = $('.hamburger'),
	   isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {
      if (isClosed == true) {
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
        $(".hamburger-remove").show();
      } else {
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
        $(".hamburger-remove").hide();
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});