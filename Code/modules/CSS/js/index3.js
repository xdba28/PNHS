$('.pane-hScroll3').scroll(function() {
  $('.pane-vScroll3').width($('.pane-hScroll3').width() + $('.pane-hScroll3').scrollLeft());
});