$(document).ready( function(){
	var fulldate = new Date();
	var month = fulldate.getMonth();
	var day = fulldate.getDate();
	var year = fulldate.getFullYear();
	if (month < 10){
		month = "0" + month;
	}
	$("#date_added").val(month + "-" + day + "-" + year);
});