$(document).ready( function(){
	$('.exam_create_subject').change( function(){
		var subj = $(".class_select").children("option").filter(":selected").val();
		select_class(subj);
	});
});

function select_class(subj){
	$.ajax({
		method: "POST",
		url: "php/select_class.php",
		data: {subject_code: subj},
		dataType: "json",
		success: function(data) {
			$(".class_select").empty();
			$(".class_select").append("<option value='' disabled selected> Select Class Section</option>");
			$.each(data, function(i, item){
				$(".class_select").append("<option value='" + data[i].sched_id+ "'>"+ data[i].section_name+"</option>");
			});
		}
	});
}