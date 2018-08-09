$(document).ready( function(){
	$('.attempt_btn').click( function(){
		$exam_no = $('.exam_no').val();
		$.ajax({
		method: "POST",
		url: "php/select_pass.php",
		data: {exam_no: exam_no},
		success: function(data) {
			$('.pass_input').val() == data.pass;
		}
	});
});

function exam_no(exam_no){
	$('.modal').modal('show');
	$('.exam_no').val(exam_no);
}