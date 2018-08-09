$(document).ready( function(){
	
	$(".no_items").change( function(){
		
		var no_items = $(".no_items").val();
		if($.isNumeric(no_items)){
			
		} else {
			$(".no_items").val("");
		}
		
	});
	$(".duration").change( function(){
		
		var duration = $(".duration").val();
		if($.isNumeric(duration)){
			
		} else {
			$(".duration").val("");
		}
		
	});
	
	$(".passing").change( function(){
		
		var passing = $(".passing").val();
		if($.isNumeric(passing)){
			
		} else {
			$(".passing").val("");
		}
		
	});
	
	$(".edit_no_items").change( function(){
		
		var edit_no_items = $(".edit_no_items").val();
		if($.isNumeric(edit_no_items)){
			
		} else {
			$(".edit_no_items").val("");
		}
		
	});
	$(".edit_duration").change( function(){
		
		var edit_duration = $(".edit_duration").val();
		if($.isNumeric(edit_duration)){
			
		} else {
			$(".edit_duration").val("");
		}
		
	});
	
	$(".edit_passing").change( function(){
		
		var edit_passing = $(".edit_passing").val();
		if($.isNumeric(edit_passing)){
			
		} else {
			$(".edit_passing").val("");
		}
		
	});
	
	
	
	
});