$('#rate1, #rate2, #rate3, #rate4, #box1, #box2, #box3, #box4').on('input', function(){
      var rate1 = parseFloat($('#rate1').val()) || 0;
      var rate2 = parseFloat($('#rate2').val()) || 0;
      var rate3 = parseFloat($('#rate3').val()) || 0;
      var rate4 = parseFloat($('#rate4').val()) || 0;
      var box1 = parseFloat($('#box1').val()) || 0;
      var box2 = parseFloat($('#box2').val()) || 0;
      var box3 = parseFloat($('#box3').val()) || 0;
      var box4 = parseFloat($('#box4').val()) || 0;
      
      $('#amount1').val(box1+box2+box3+box4);
	   $('#amount1_1').val(rate1+rate2+rate3+rate4);
	  
});





