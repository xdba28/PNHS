// Updated as of: 03/03/2018 3:13 AM
//Edited By: Kyra
//

$(document).ready( function(){
	$(".create_submit").click(function(e){
		
		$.each($("#content1 select"), function(){
		var va = $(this).val();
		if(va == null || va == ""){
			e.preventDefault();
			var y = $(this).parent().offset().top;
			var top_nav = $('.navigation-top').height();
			var x = y - top_nav - 50;
			window.scrollTo(0, x );
			$(this).parent().css('color', 'red');
			var winview = $(window).scrollTop();
			if(winview < x ){
				setTimeout(function(){ swal("Please choose an option!"); }, 0200);
			}
			return false;
		} else {
			$(this).parent().css('color', 'black');
		}
		});
	});
	
	
	
	//MANAGE EXAM SELECT
	$(".exam_select_subject").change(function(){
		var subj = $(".exam_select_subject").children("option").filter(":selected").val();
		$(".exams").empty();
		select_exam(subj);
		
	});
	
	//CREATE EXAM SELECT
	$('.exam_create_subject').change(function(){
		var subj = $('.exam_create_subject').children("option").filter(":selected").val();
		$('.class_select').empty();
		select_section(subj);
	});
	
	
});

//SHOW ALL EXAMS IN SUBJECT
function select_exam(subj){
	
	$.ajax({
		method: "POST",
		url: "php/exam_select.php",
		data: {subject_code: subj},
		dataType: "json",
		success: function(data) {
			$(".exams").empty();
			$('.exam_thead').empty();
			$('.exam_thead').append("<tr><th><span>Exam Name</span></th><th><span>Exam Type</span></th><th><span>Section</span></th><th><span>Duration</span></th><th><span>No. of Items</span></th><th><span>Status</span></th><th><span>Date Created</span></th><th><span>Action</span></th></tr>");
			$.each(data, function(i, item){
				data[i].section_name = data[i].section_name.replace(/,\s*$/, "");
				data[i].sched_id = data[i].sched_id .replace(/,\s*$/, "");
				var exam_title = encodeURIComponent(data[i].exam_title); //encode parameters for fix function
				var exam_title = encodeURIComponent(data[i].exam_title); //encode parameters for fix function
				var section_name = encodeURIComponent(data[i].section_name); //encode parameters for fix function
				var exam_type = encodeURIComponent(data[i].exam_type); //encode parameters for fix function
				var btn_click = 'fix("'+data[i].exam_no+'","'+exam_title+'","'+section_name+'","'+subj+'","'+exam_type+'")';
				$(".exams").append("<tr class='row" + data[i].exam_no + "'><td>"+data[i].exam_title + "</td><td>"+data[i].exam_type + "</td><td>"+data[i].section_name + "</td><td>"+data[i].duration + " minute(s)</td><td>"+data[i].no_items + "</td><td>"+data[i].stats + "</td><td>"+data[i].date_created + "</td><td><div class='btn-group'><button type='button' class='btn  btn-default edit_exam"+data[i].exam_no+"' title='Edit exam details'><i class='fa  fa-lg  fa-cog' aria-hidden='true'></i></button></button><button type='button' class='btn  btn-default' onclick="+btn_click+"  title='Edit exam content'><i class='fa  fa-lg  fa-pencil-square-o' aria-hidden='true'></i></button><button type='button' class='btn btn-default delete_exam" + data[i].exam_no + "' title='Delete exam'><i class='fa  fa-lg  fa-trash-o'></i></button></div></td></tr>");
				
				//DELETE EXAM
				$(".delete_exam"+data[i].exam_no).click( function(){
					var exam_no = data[i].exam_no;
					var del_alert = "Are you sure you want to delete this exam? This can't be undone.";
                    var minor = "Deleting the exam would also delete its contents, answers and results."
					if($("#tab3").val()){
						var open_exno = $('.exam_no').val();
						if(exam_no == open_exno){
							del_alert = "This exam is currently being edited! Are you sure you want to delete this exam?";
						} 
					}
                    swal({
          title: del_alert,
          text: minor,
          icon: "warning",
          buttons: [
            'Cancel',
            'Continue'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {            
			$.ajax({
						method: "POST",
						url: "php/exam_delete.php",
						data: {exam_no: exam_no},
						dataType: 'json',
						success: function(response){
							if(response.stat == "Success"){
								$(".row"+data[i].exam_no).remove();
								swal("Success! Exam: "+ data[i].exam_title + " is removed");
								
								 $('#tab3').remove();
								 $('label[for=tab3]').remove();
								 $('#edit_call').addClass("edit_tab");
								 $('.qb_wrapper').empty();
								  $('.field_wrapper').empty();
								document.getElementById("tab2").checked = true;
								$('.update_items').val(lisize()-1);
								if($('.exams').text() == ""){
									$('.exam_thead').empty();
									$('.exam_thead').append("<center>There is no exam!</center>");
								}
							} else {
								swal(response.err + "Please reload page."); 
							}
							}
					});
			}
        });
				});
				
				//EDIT EXAM DETAILS
				$(".edit_exam"+data[i].exam_no).click( function(){
					$("#edit_details").modal("show");
					$(".edit_exam_no").val(data[i].exam_no);
					$(".edit_exam_name").val(data[i].exam_title);
					$(".edit_password").val(data[i].exam_password);
					$(".edit_no_items").val(data[i].no_items);
					$(".edit_passing").val(data[i].passing);
					$(".edit_startdate").val(data[i].startdate);
					$(".edit_starttime").val(data[i].starttime);
					$(".edit_enddate").val(data[i].enddate);
					$(".edit_endtime").val(data[i].endtime);
					edit_class(subj,data[i].section_name);
					 $('.dropdown-button').dropdown('open');
					
					
					$(".edit_duration").val(data[i].duration);
					$(".edit_duration").trigger("autoresize");
					Materialize.updateTextFields();
					
					$('.edit_question_per_page').material_select("destroy");
					$('.edit_question_per_page').find('option[value='+data[i].question_per_page+']').prop('selected', true);
					 $('.edit_question_per_page').material_select();
					 
					$('.edit_shuffle').material_select("destroy");
					$('.edit_shuffle').find('option[value="'+data[i].shuffle+'"]').prop('selected', true);
					$('.edit_shuffle').material_select();
					
					$('.edit_review').material_select("destroy");
					$('.edit_review').find('option[value="'+data[i].exam_review+'"]').prop('selected', true);
					$('.edit_review').material_select();
					
					$('.exam_edit_type').material_select("destroy");
					$('.exam_edit_type').find('option[value="'+data[i].exam_type+'"]').prop('selected', true);
					$('.exam_edit_type').material_select();
				
					$('.edit_subject').material_select("destroy");
					$('.edit_subject').find('option[value="'+data[i].exam_subject+'"]').prop('selected', true);
					$('.edit_subject').find('option[value="'+data[i].exam_subject+'"]').prop('selected', true);
					$('.edit_subject').material_select();
					$('.edit_subject').change(function(){
						edit_class(subj,"");
					});
						$('.reset_btn').click( function(){
							$(".edit_exam_name").val(data[i].exam_title);
							$(".edit_password").val(data[i].exam_password);
							$(".edit_no_items").val(data[i].no_items);
							$(".edit_passing").val(data[i].passing);
							$(".edit_startdate").val(data[i].startdate);
							$(".edit_starttime").val(data[i].starttime);
							$(".edit_enddate").val(data[i].enddate);
							$(".edit_endtime").val(data[i].endtime);
							
							edit_class(subj,data[i].section_name);
							
							$(".edit_duration").val(data[i].duration);
							$(".edit_duration").trigger("autoresize");
							Materialize.updateTextFields();
							
							$('.edit_question_per_page').material_select("destroy");
							$('.edit_question_per_page').find('option[value='+data[i].question_per_page+']').prop('selected', true);
							 $('.edit_question_per_page').material_select();
							 
							$('.edit_shuffle').material_select("destroy");
							$('.edit_shuffle').find('option[value="'+data[i].shuffle+'"]').prop('selected', true);
							$('.edit_shuffle').material_select();
							
							$('.edit_review').material_select("destroy");
							$('.edit_review').find('option[value="'+data[i].exam_review+'"]').prop('selected', true);
							$('.edit_review').material_select();
							
							$('.exam_edit_type').material_select("destroy");
							$('.exam_edit_type').find('option[value="'+data[i].exam_type+'"]').prop('selected', true);
							$('.exam_edit_type').material_select();
							
							$('.edit_subject').material_select("destroy");
							$('.edit_subject').find('option[value="'+data[i].exam_subject+'"]').prop('selected', true);
							$('.edit_subject').find('option[value="'+data[i].exam_subject+'"]').prop('selected', true);
							$('.edit_subject').material_select();
							$('.edit_subject').change(function(){
								edit_class(subj,"");
							});
						});
				});
			});
		},
		error: function(){
            $('.exam_thead').empty();
			$('.exam_thead').append("<h2><center>Subject has no exam!</center></h2>");
        }
				
	});
	
}

//GET CLASS
function edit_class(subj,section_name){
	$('.edit_class').empty();
	$.ajax({
						method: "POST",
						url: "php/select_class.php",
						data: {subject_code: subj},
						dataType: "json",
						success: function(datum) {
							$(".edit_class").remove();
							var tag = '<select multiple required class="edit_class active" aria-required="true" name="edit_class[]"><option value="" disabled selected> Select Class Section</option>'
							var list='';
							$.each(datum, function(i, item){
								list = list + "<option value='"+datum[i].sched_id+"'>"+datum[i].section_name+"</option>";
								
							});
							
							list = tag+ list + "</select>" + "<label>Class Section</label>"
							$(".edit_upper").children("label").remove();
							$(".edit_upper").append(list);
							$('.edit_class').material_select();
							if(section_name != ""){
								var sect = section_name.split(",");
								var sectlen = sect.length;
								
								var q = '';
								for(q=0; q < sectlen; q++){
									var sec = sect[q];
									$('.edit_class ul.dropdown-content li:contains('+sec+')').click();
									$('.edit_class ul.dropdown-content li:contains('+sec+')').addClass("selected")
									$('.multiple-select-dropdown').click();
									
								}
							}
							$(".edit_submit_btn").click(function(e){
								
								var edit_class = $('.edit_class input[type=text]').val();
								var count_chk = $(".edit_class input[type='checkbox']:checked").length;
								
								if (count_chk == 0) {
									e.preventDefault();
									for(q=0; q < sectlen; q++){
										var sec = sect[q];
										$('.edit_class ul.dropdown-content li:contains('+sec+')').click();
										$('.edit_class ul.dropdown-content li:contains('+sec+')').click();
									}
									$('.edit_class').css('color', 'red');
									setTimeout(function(){ swal("Please choose a class!"); }, 0200);
									
								}
								
							});
						}
					});
}

function check_status(exam_no){
	
}



//LOAD QUESTIONS
function load_question_bank(subject_code,exam_no){
	// LOAD QUESTION BANK
		$.ajax({
		method: "POST",
		url: "php/question_select.php",
		data: {subject_code: subject_code},
		dataType: "json",
		success: function(data) {
			$.each(data, function(i, item){
				var key_answer = data[i].key_answer;
				var wrong = data[i].wrong_answer;
				var wrong_answer = wrong.replace(/ /g, ",");
				wrong_answer = wrong_answer.replace(/_/g, " ");
				wrong_answer = wrong_answer.replace(/,\s*$/, "");
				
				var answer = key_answer.replace(/ /g, ",");
				answer = answer.replace(/_/g, " ");
				answer = answer.replace(/,\s*$/, "");
				
				var question = data[i].question;
				var question_type = data[i].question_type;
				var question_no = data[i].question_no;
				switch(data[i].question_type){
					case 'Identification':
						$(".qb_wrapper").append('<li class="qb_outline-thread"><div class="qb_title-thread"><label for="filled-in-b'+question_no+'" class="lab"><div class="row"><div class="col-md-12"><div class="form-inline"><div class="col-lg-3 no-padding"><div class="form-group"><div class="clearfx"><input type="checkbox" class="filled-in" id="filled-in-b'+question_no+'"/><label for="filled-in-box" class="color">Identification</label></div></div></div></div></div><div class="col-md-12 clearfx"><h6 class="h6b">Question: <span class="quest">'+question+'</span></h6><h6 class="h6b">Answer: <span class="mark green">'+answer+'</span></h6></div></div></label></div><input hidden type="text" name="ques_no" class="ques_no" value="'+question_no+'" readonly /></li>');
						break;
					case 'Multiple Choice':
						$(".qb_wrapper").append('<li class="qb_outline-thread"><div class="qb_title-thread" ><label for="filled-in-bo'+question_no+'" class="lab"><div class="row"><div class="col-md-12"><div class="form-inline"><div class="col-lg-3 no-padding"><div class="form-group"><div class="clearfx"><input type="checkbox" class="filled-in" id="filled-in-bo'+question_no+'"/><label for="filled-in-box" class="color">Multiple Choice</label></div></div></div></div></div><div class="col-md-12 clearfx"><h6 class="h6b">Question: <span class="quest">'+question+'</span></h6><h6 class="h6b">Correct Answer: <span class="mark green">'+answer+'</span></h6><h6 class="h6b">Wrong Answer: <span class="mark red">'+wrong_answer+'</span></h6></div></div></label></div><input hidden type="text" name="ques_no" class="ques_no" value="'+question_no+'" readonly /></li>');
						break;
					case 'Enumeration':
						$(".qb_wrapper").append('<li class="qb_outline-thread"><div class="qb_title-thread" ><label for="filled-in-box'+question_no+'" class="lab"><div class="row"><div class="col-md-12"><div class="form-inline"><div class="col-lg-3 no-padding"><div class="form-group"><div class="clearfx"><input type="checkbox" class="filled-in" id="filled-in-box'+question_no+'"/><label for="filled-in-box" class="color">Enumeration</label></div></div></div></div></div><div class="col-md-12 clearfx"><h6 class="h6b">Question: <span class="quest">'+question+'</span></h6><h6 class="h6b">Answer: <span class="mark green">'+answer+'</span></h6></div></div></label></div><input hidden type="text" name="ques_no" class="ques_no" value="'+question_no+'" readonly /></li>');
						break;
				}
			});
			$('.qb_wrapper .qb_outline-thread').click(function(){
				var count_chk = $(".qb_wrapper input[type='checkbox']:checked").length;
				if (count_chk > 0) {
					$('.add_qb').prop("disabled", false);
											
				} else {
					$('.add_qb').prop("disabled", true);
				}
			});
			
			
			
			var len_qb = $("#add_from_qb input[class='ques_no']:hidden").parent().length;
			
			//swal($("#outline-thread").parent().html());
			
			/*var count_chk = $(".qb_wrapper input[name='ques_no']:visible").length;	
			var qb_text= $('.qb_wrapper').text();
			swal(count_chk);
			if (qb_text == "") {
				$('.qb_wrapper').append("<h1 class='no_qb'><center>Question Bank is empty!</center><h1>");
				$('.add_qb').prop("hidden",true);
			} else {
				$('.add_qb').prop("hidden",false);
				$('.no_qb').remove();
			}*/
			
			
			//LOAD EXAM CONTENTS
			$.ajax({
				method: "POST",
				url: "php/load_exam_content.php",
				data: {exam_no: exam_no},
				dataType: "json",
				success: function(datum) {
					$(".field_wrapper").empty();
					
					$.each(datum, function(i, item){
						
						
						var key_answer = datum[i].key_answer;
						var wrong = datum[i].wrong_answer;
						var wrong_answer = wrong.replace(/_/g, " ");
						var answer = key_answer.replace(/_/g, " ");
						var question = datum[i].question;
						
						var question_type = datum[i].question_type;
						var question_no = datum[i].question_no;
						var mark = datum[i].mark;
						
						switch(question_type){
								case 'Identification':
								
									var correct_answer = key_answer;
									var answer_array = correct_answer.split(" ");
									var elem_count = answer_array.length;
									var new_ans = [];
									for(i = 0; i < elem_count; i++){
										if(answer_array[i] != ""){
											answer_array[i] = answer_array[i].replace(/_/g, " ");
											new_ans.push(answer_array[i]);
										}
									}
									elem_count = new_ans.length;
									var input = '';
									for(i = 1; i < elem_count; i++){
										input = input + '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Correct Answer" name="iden_correct[]" value="'+new_ans[i]+'" required /><div class="iden_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
									}
									
									$('.field_wrapper').append('<li id="outline-thread" class="outline-thread"><div class="title-thread"><div class="row"><div class="col-md-12"><div class="form-inline"><div class="col-lg-4 no-padding"><div class="form-group"><div class="clearfx"><h5 class="thin h4a">Identification</h5><input hidden type="text" name="question_type[]" value="Identification" readonly /><input hidden type="text" name = "iden_no_correct[]" value="'+elem_count+'" class="no_correct" readonly /></div></div></div><div class="col-lg-2 col-lg-offset-1 no-padding"><div class="form-group"><div class="clearfx"><span class="new badge">Item Number <span class="sortable-number">' + lisize() + '</span></span></div></div></div><div class="col-lg-4 col-lg-offset-1 no-padding"><div class="form-group pull-right" style="white-space:nowrap"><label for="mark" style="margin-right: 0.25em;">Point(s)</label><input type="text" class="mark'+question_no+' form-control" placeholder="Point(s)" name="mark[]" value="'+mark+'" required></div></div></div><div class="form-group"><input type="text" class="form-control" placeholder="Question" name="question[]" value="'+question+'" required></div></div><div class="col-md-12"><div class="col-md-12 correct_group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Correct Answer" name="iden_correct[]" value="'+new_ans[0]+'" required></div></div><div class="correct_field">'+input+'</div></div><div class="clearfx" style="margin-bottom: 1em;"><div><div class="col s12 m6 l6"><div class="left"><button class="waves-effect waves-light btn iden_add_correct">Add Correct Answer</button></div></div><div class="col s12 m6 l6"><div class="right"><button class="remove_button waves-effect waves-light btn red" title="Remove field">Remove Field</button></div></div></div></div></div></div></div><input hidden type="text" name="ques_no[]" class="ques_no" value="'+question_no+'" readonly /></li>');
									$(".mark"+question_no).change( function(){
									var mark = $(".mark"+question_no).val();
										if($.isNumeric(mark)){
										} else {
											$(this).val("");
										}
										
									});
									break;
								case 'Multiple Choice':
									var correct_answer = answer;
									var answer_array = datum[i].wrong_answer.split(" ");
									var elem_count = answer_array.length;
									var new_ans = [];
									for(i = 0; i < elem_count; i++){
										if(answer_array[i] != ""){
											answer_array[i] = answer_array[i].replace(/_/g, " ");
											new_ans.push(answer_array[i]);
											
										}
										
									}
									
									elem_count = new_ans.length;
									var input = '';
									for(i = 1; i < elem_count; i++){
										input = input + '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Correct Answer" name="mul_wrong[]" value="'+new_ans[i]+'" required /><div class="mul_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
									}
									
									$('.field_wrapper').append('<li id="outline-thread" class="outline-thread"><div class="title-thread"><div class="row"><div class="col-md-12"><div class="form-inline"><div class="col-lg-4 no-padding"><div class="form-group"><div class="clearfx"><h5 class="thin h4a">Multiple Choice</h5><input hidden type="text" name="question_type[]" value="Multiple Choice" readonly /><input hidden type="text" name = "mul_no_wrong[]" value="'+new_ans.length+'" class="no_wrong" readonly /></div></div></div><div class="col-lg-2 col-lg-offset-1 no-padding"><div class="form-group"><div class="clearfx"><span class="new badge">Item Number <span class="sortable-number">' + lisize() + '</span></span></div></div></div><div class="col-lg-4 col-lg-offset-1 no-padding"><div class="form-group pull-right" style="white-space:nowrap"><label for="mark" style="margin-right: 0.25em;">Point(s)</label><input type="text" class="mark'+question_no+' form-control" placeholder="Point(s)" name="mark[]" value="'+mark+'" required></div></div></div><div class="form-group"><input type="text" class="qb_ques form-control" placeholder="Question" name="question[]" value="'+question+'" required></div></div><div class="col-md-12"><div class="col-md-12 correct_group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Correct Answer" name="mul_correct[]" value="'+correct_answer+'" required /></div></div><div class="correct_field"></div></div><div class="col-md-12 wrong-group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Wrong Answer" name="mul_wrong[]" value="'+new_ans[0]+'" required /></div></div><div class="wrong_field">'+input+'</div></div><div class="col-md-12 col-sm-12"><div class="clearfx" style="margin-bottom: 1em;"><div><div class="col s12 m6 l6"><div class="left"><button class="waves-effect waves-light btn add_wrong">Add Wrong Answer</button></div></div><div class="col s12 m6 l6"><div class="right"><button class="qb_mul_remove_button waves-effect waves-light btn red" title="Remove field">Remove Field</button></div></div></div></div></div></div></div></div><input hidden type="text" name="ques_no[]" class="ques_no" value="'+question_no+'" readonly /></li>');
									$(".mark"+question_no).change( function(){
									var mark = $(".mark"+question_no).val();
										if($.isNumeric(mark)){
										} else {
											$(this).val("");
										}
										
									});
									break;
								case 'Enumeration':
									var correct_answer = key_answer;
									var answer_array = correct_answer.split(" ");
									var elem_count = answer_array.length;
									var new_ans = [];
									for(i = 0; i < elem_count; i++){
										if(answer_array[i] != ""){
											answer_array[i] = answer_array[i].replace(/_/g, " ");
											new_ans.push(answer_array[i]);
										}
									}
									elem_count = new_ans.length;
									var input = '';
									for(i = 1; i < elem_count; i++){
										input = input + '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Answer" name="enum_answer[]" value="'+new_ans[i]+'" required /><div class="enum_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
									}
									
									$('.field_wrapper').append('<li id="outline-thread" class="outline-thread"><div class="title-thread"><div class="row"><div class="col-md-12"><div class="form-inline"><div class="col-lg-4 no-padding"><div class="form-group"><div class="clearfx"><h5 class="thin h4a">Enumeration</h5><input hidden type="text" name="question_type[]" value="Enumeration" readonly /><input hidden type="text" name = "enum_no_correct[]" value="'+elem_count+'" class="no_correct" readonly /></div></div></div><div class="col-lg-2 col-lg-offset-1 no-padding"><div class="form-group"><div class="clearfx"><span class="new badge">Item Number <span class="sortable-number">'+ lisize() + '</span></span></div></div></div><div class="col-lg-4 col-lg-offset-1 no-padding"><div class="form-group pull-right" style="white-space:nowrap"><label for="mark" style="margin-right: 0.25em;">Point(s)</label><input type="text" class="mark'+question_no+' form-control" placeholder="Point(s)" name="mark[]" value="'+mark+'" required /></div></div></div><div class="form-group"><input type="text" class="form-control" placeholder="Question" name="question[]" value="'+question+'" required /></div></div><div class="col-md-12"><div class="col-md-12 answer_group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Answer" name="enum_answer[]" value="'+new_ans[0]+'" required></div></div><div class="answer_field">'+input+'</div></div><div class="clearfx" style="margin-bottom: 1em;"><div><div class="col s12 m6 l6"><div class="left"><button class="waves-effect waves-light btn add_answer">Add An Answer</button></div></div><div class="col s12 m6 l6"><div class="right"><button class="remove_button waves-effect waves-light btn red" title="Remove field">Remove Field</button></div></div></div></div></div></div></div><input hidden type="text" name="ques_no[]" class="ques_no" value="'+question_no+'" readonly /></li>');
									$(".mark"+question_no).change( function(){
									var mark = $(".mark"+question_no).val();
										if($.isNumeric(mark)){
										} else {
											$(this).val("");
										}
										
									});
									break;
							}
							$('.update_items').val(lisize()-1);
						
						
						//$(".qb_wrapper").find("input[name=ques_no][value="+question_no+"]").parent().prop("hidden",true);
						$(".qb_wrapper input[name='ques_no'][value='"+question_no+"']").parent().addClass("hidden");
						
					});
					//CHECK STATUS OF EXAM
					$.ajax({
						method: "POST",
						url: "php/check_status2.php",
						data: {exam_no: exam_no},
						dataType: "json",
						success: function(data) {
							stat = data.exam_status;
							
							if(stat == "Open"){
								$('.field_wrapper').children().prop("disabled",true);
								$('.field_wrapper input').prop("disabled",true);
								$('.field_wrapper button').prop("disabled",true);
								$('.question_type').material_select("destroy");
								$('.question_type').prop("disabled", true);
								$('.question_type').material_select();
								$('.add_b').prop("disabled",true);
								$('.save_content').prop("disabled",true);
								$('.enum_remove_field').remove();
								$('.iden_remove_field').remove();
								$('.mul_remove_field').remove();
								
								if($('.edit_err').length == 0){
									$('.exam_sect').after("<center><h6 class='edit_err'>(Editing is currently disabled. Please change the opening date/time of the exam.)</h6></center>");
								}
							} else if(stat == "Closed" || stat == "Unposted"){
								$('.field_wrapper input').prop("disabled",false);
								$('.field_wrapper button').prop("disabled",false);
								$('.question_type').material_select("destroy");
								$('.question_type').prop("disabled", false);
								$('.question_type').material_select();
								$('.add_b').prop("disabled",false);
								$('.save_content').prop("disabled",false);
							}
							window.scrollTo(0, 0);
						}
					});
					return false;
				}, 
				error: function(){
					$('.field_wrapper').append("<h2 class='cont_emp'><center>Exam is empty!</center></h2>");
					$('.save_content').prop("disabled",true);
				}
			});
			return false;
		},
		error: function(){
			$('.qb_wrapper').append("<h1 class='no_qb'><center>Question Bank is empty!</center><h1>");
			$('.field_wrapper').append("<h2 class='cont_emp'><center>Exam is empty!</center></h2>");
			$('.add_qb').prop("hidden",true);
		}
	});
}

function select_section(subj){
	$.ajax({
		method: "POST",
		url: "php/select_class.php",
		data: {subject_code: subj},
		dataType: "json",
		success: function(data) {
			$(".class_select").remove();
			var tag = '<select multiple required class="class_select active" aria-required="true" name="exam_create_class[]"><option value="" disabled selected> Select Class Section</option>'
			var list='';
			$.each(data, function(i, item){
				list = list + "<option value='"+data[i].sched_id+"'>"+data[i].section_name+"</option>";
			});
			
			list = tag+ list + "</select>" + "<label>Class Section</label>"
			$(".upper").children("label").remove();
			$(".upper").append(list);
			$('.class_select').material_select();
		}
	});
}


//GET EXAM CONTENTS AND QUESTION BANK CONTENTS
function fix(exam_no,exam_title,sect_name, subj, exam_type){
	
	var subject_code = subj;
	var exam_title = decodeURIComponent(exam_title); //DECRYPT PARAMETER
	var sect_name = decodeURIComponent(sect_name); //DECRYPT PARAMETER
	var exam_type = decodeURIComponent(exam_type); //DECRYPT PARAMETER
	if($("#tab3").val()){
		swal("Exam: " + $('.exam_title').text() + " is currently being edited. Please save or close the exam first!");
	} else {
		$('.edit_tab').before('<input id="tab3" type="radio" name="tabs"><label for="tab3" class="tab">Edit Exam Content</label>');
		$('#edit_call').removeClass('edit_tab');
		document.getElementById("tab3").checked = true;
		$('.exam_no').val(exam_no);
		$('.subject_id').val(subj);
		$('.exam_title').text(exam_title);
		$('.subj_desc').text($(".exam_select_subject").children("option").filter(":selected").text());
		$('.cont_exam_type').text(exam_type);
		load_question_bank(subject_code,exam_no);
		return false;
	}
	
}

