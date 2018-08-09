$('.pane-hScroll4').scroll(function() {
  $('.pane-vScroll4').width($('.pane-hScroll4').width() + $('.pane-hScroll4').scrollLeft());
});