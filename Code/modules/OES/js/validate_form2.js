// Updated as of: 02/03/2018 11:55 PM
//Author: Kyra
//

$(document).ready( function(){
	$.each($("select"), function(){
		var va = $(this).val();
		if(empty(va)){
			 var x = $("select").position();
			window.scrollTo(0, x.top);
		}
	});
	
	
});