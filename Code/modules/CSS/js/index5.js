$('.pane-hScroll5').scroll(function() {
  $('.pane-vScroll5').width($('.pane-hScroll5').width() + $('.pane-hScroll5').scrollLeft());
});