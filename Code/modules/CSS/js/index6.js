$('.pane-hScroll6').scroll(function() {
  $('.pane-vScroll6').width($('.pane-hScroll6').width() + $('.pane-hScroll6').scrollLeft());
});