$('#$row['rqst_qty'], #$row['est_unit_cost']').on('output', function(){
	
      var $row['rqst_qty'] = parseFloat($('#$row['rqst_qty']').val()) || 0;
      var $row['est_unit_cost'] = parseFloat($('#$row['est_unit_cost']').val()) || 0;
	  
	  $('#cost1').val($row['rqst_qty']*$row['est_unit_cost']);
});





