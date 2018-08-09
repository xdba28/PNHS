$('#unitcost1, #rate1, #rate2, #rate3, #rate4').on('input', function(){
	  var unitcost1 = parseFloat($('#unitcost1').val()) || 0;
      var rate1 = parseFloat($('#rate1').val()) || 0;
      var rate2 = parseFloat($('#rate2').val()) || 0;
      var rate3 = parseFloat($('#rate3').val()) || 0;
      var rate4 = parseFloat($('#rate4').val()) || 0;
      
      $('#box1').val(unitcost1*rate1);
	  $('#box2').val(unitcost1*rate2);
	  $('#box3').val(unitcost1*rate3);
	  $('#box4').val(unitcost1*rate4);
});