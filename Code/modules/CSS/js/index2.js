$('.pane-hScroll2').scroll(function() {
  $('.pane-vScroll2').width($('.pane-hScroll2').width() + $('.pane-hScroll2').scrollLeft());
});