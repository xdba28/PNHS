$(document).ready(function(){
	$.ajax({
		method: "",
		url: "subject_select.php",
		data: "",
		dataType: "json",
		success: function(data) {
			
			$(".selectholder").append("<option value='math'></option>");

			
		}
});