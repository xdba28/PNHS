$(document).ready(function(){
	$(".questionmanage_subject").change(function(){
		var subj = $(".questionmanage_subject option:selected").val();
		$(".iden_body").empty();
		$(".mul_body").empty();
		$(".enum_body").empty();
		select_question(subj);
	});
	
	$(".add_q").click(function(e){
		
		$.each($("#content4 select"), function(){
		var va = $(this).val();
		if(va == null || va == ""){
			e.preventDefault();
			var y = $(this).parent().offset().top;
			var top_nav = $('.navigation-top').height();
			var x = y - top_nav - 50;
			window.scrollTo(0, x );
			$(this).parent().css('color', 'red');
			var winview = $(window).scrollTop();
			if(winview <= x ){
				setTimeout(function(){ swal("Please choose an option!"); }, 0200);
			}
			return false;
		} else {
			$(this).parent().css('color', 'black');
		}
		});
		var field = $('.field_wrapper').text();
		var ques_sel = $('.questioncreate_subject').children("option").filter(":selected").val();
		var ques_type = $('.question_type').children("option").filter(":selected").val();

		if(field == "" && ques_sel != "" && ques_type != ""){
			e.preventDefault();
			swal("Please insert a question!");
		}
	});
});

function select_question(subj){
	
	$.ajax({
		method: "POST",
		url: "php/question_select.php",
		data: {subject_code: subj},
		dataType: "json",
		success: function(data) {
			
			$.each(data, function(i, item){
				var key_answer = data[i].key_answer;
				var wrong = data[i].wrong_answer;
				var answer = key_answer.replace(/ /g, ",");
				answer = answer.replace(/_/g, " ");
				answer = answer.replace(/,\s*$/, "");
				var question = data[i].question;
				var question_type = data[i].question_type;
				var question_no = data[i].question_no;
				switch(data[i].question_type){
					case 'Identification':
						$(".iden_body").append("<tr class='ques_row"+ data[i].question_no+"'><td id = 'question' class='question'>" +data[i].question + "</td><td id = 'answer'>"+answer + "</td><td><div class='btn-group'><button type='button' class='btn  btn-default edit_question"+data[i].question_no+"' title='Edit question'><i class='fa  fa-lg  fa-pencil'></i></button><button type='button' class='btn btn-default delete_question"+data[i].question_no+ "' title='Delete question'><i class='fa  fa-lg  fa-trash-o'></i></button></div></td></tr>");
						break;
					case 'Multiple Choice':
						$(".mul_body").append("<tr class='ques_row"+ data[i].question_no+"'><td id = 'question' class='question'>" +data[i].question + "</td><td id = 'answer'>"+answer + "</td><td><div class='btn-group'><button type='button' class='btn  btn-default edit_question"+data[i].question_no+"' title='Edit question'><i class='fa  fa-lg  fa-pencil'></i></button><button type='button' class='btn btn-default delete_question"+data[i].question_no+ "' title='Delete question'><i class='fa  fa-lg  fa-trash-o'></i></button></div></td></tr>");
						break;
					case 'Enumeration':
						$(".enum_body").append("<tr class='ques_row"+ data[i].question_no+"'><td id = 'question' class='question'>" +data[i].question + "</td><td id = 'answer'>"+answer + "</td><td><div class='btn-group'><button type='button' class='btn  btn-default edit_question"+data[i].question_no+" title='Edit question'><i class='fa  fa-lg  fa-pencil'></i></button><button type='button' class='btn btn-default delete_question"+data[i].question_no+ "' title='Delete question'><i class='fa  fa-lg  fa-trash-o'></i></button></div></td></tr>");
						break;
				}
				// Individual Functions for Buttons
				
				$(".delete_question"+question_no).click( function(){
					var clas = $(this).attr('class');
					var res = clas.split("delete_question");
					var question_no = res[1];
					swal({
                        title: "Are you sure you want to delete this question? This can't be undone.",
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
						url: "php/question_delete.php",
						data: {question_no: question_no},
						dataType: 'json',
						success: function(response){
							if(response.stat == 'Success'){
							$(".ques_row"+question_no).remove();
							swal("Question: " + data[i].question + " is removed"); 
							} else if(response.stat == "Failed"){
								swal("Delete Error! There is an error in deleting this question. Please check if the question is included in exam/s. (If yes, delete question in exam before deleting question in question bank)"); 
							}
						}
					});
          }
                    });
				});
				
				$(".edit_question"+question_no).click( function(){
					var clas = $(this).attr('class');
					var res = clas.split("edit_question");
					$('#edit_question').modal("show");
					$('.question_body').empty();
					var ques_no = res[1];
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
								input = input + '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Correct Answer" name="edit_iden_correct[]" value="'+new_ans[i]+'" required /><div class="edit_iden_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
							}
							
							$('.question_body').append('<div class="outline-thread"><div class="title-thread"><div class="row"><div class="col-md-12"><div class="col-md-12 col-sm-12 upper" style="margin-bottom: 1em;"><div class="form-inline"><div class="clearfx"><h4 class="thin h4a">Identification</h4><input type="text" name="edit_question_type" value="Identification" hidden  /><input type="text" name = "edit_question_no" value="'+question_no+'" class="question_no" hidden /></div></div></div><div class="col-md-12 col-sm-12"><div class="form-group"><input type="text" class="form-control" placeholder="Question" name="edit_question" value="' + question + '" required /></div></div></div><div class="col-md-12"><div class="col-md-12 correct_group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Correct Answer" name="edit_iden_correct[]" value="' + new_ans[0] +'" required /></div></div><div class="correct_field"></div></div><div class="col-md-12 col-sm-12"><div class="clearfx" style="margin-bottom: 1em;"><div><div class="col s12 m6 l6"><div class="left"><button type="button" class="waves-effect waves-light btn edit_iden_add_correct">Add Correct Answer</button></div></div></div></div></div></div></div></div></div>');
							$('.edit_iden_add_correct').parent().parent().parent().parent().parent().siblings('.correct_group').children('.correct_field').append(input); 
							break;
						case 'Multiple Choice':
							var correct_answer = answer;
							var answer_array = wrong.split(" ");
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
								input = input + '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control"  placeholder="Wrong Answer" name="edit_mul_wrong[]" value="'+new_ans[i]+'"required /><div class="edit_mul_wrong_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
							}
							
							$('.question_body').append('<div class="outline-thread"><div class="title-thread"><div class="row"><div class="col-md-12"><div class="col-md-12 col-sm-12" style="margin-bottom: 1em;"><div class="form-inline"><div class="clearfx"><h4 class="thin h4a">Multiple Choice</h4><input type="text" name="edit_question_type" value="Multiple Choice" hidden /><input type="text" name = "edit_question_no" value="'+question_no+'" class="question_no" hidden /></div></div></div><div class="col-md-12 col-sm-12"><div class="form-group"><input type="text" class="form-control" placeholder="Question" name="edit_question" value="'+question+'"required /></div></div></div><div class="col-md-12"><div class="col-md-12 correct_group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Correct Answer" name="edit_mul_correct" value="'+correct_answer+'" required /></div></div><div class="correct_field"></div></div><div class="col-md-12 wrong-group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Wrong Answer" name="edit_mul_wrong[]" value="'+new_ans[0]+'"required /></div></div><div class="wrong_field"></div></div><div class="col-md-12 col-sm-12"><div class="clearfx" style="margin-bottom: 1em;"><div class="row"><div class="col s12 m6 l4"><div class="center"></div></div><div class="col s12 m6 l4"><div class="center"><button class="waves-effect waves-light btn edit_add_wrong">Add Wrong Answer</button></div></div></div></div></div></div></div></div></div>');
							$('.edit_add_wrong').parent().parent().parent().parent().parent().siblings('.wrong-group').children('.wrong_field').append(input);
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
								input = input + '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Correct Answer" name="edit_enum_answer[]" value="'+new_ans[i]+'" required /><div class="edit_enum_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
							}
							
							$('.question_body').append('<div class="outline-thread"><div class="title-thread"><div class="row"><div class="col-md-12"><div class="col-md-12 col-sm-12" style="margin-bottom: 1em;"><div class="form-inline"><div class="clearfx"><h4 class="thin h4a">Enumeration</h4><input type="text" name="edit_question_type" value="Enumeration"  hidden /><input type="text" name = "edit_question_no" value="'+question_no+'" class="question_no" hidden /></div></div></div><div class="col-md-12 col-sm-12"><div class="form-group"><input type="text" class="form-control" placeholder="Question" name="edit_question" value="'+question+'" required /></div></div></div><div class="col-md-12"><div class="col-md-12 answer_group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Answer" name="edit_enum_answer[]" value = "'+new_ans[0]+'"required /></div></div><div class="answer_field"></div></div><div class="col-md-12 col-sm-12"><div class="clearfx" style="margin-bottom: 1em;"><div><div class="col s12 m6 l6"><div class="left"><button class="waves-effect waves-light btn edit_add_answer">Add An Answer</button></div></div></div></div></div></div></div></div>');
							$('.edit_add_answer').parent().parent().parent().parent().parent().siblings('.answer_group').children('.answer_field').append(input);
							break;
					}
					
					
					$('.question_body').append(' <div class="row button_top"><div class="col s12 m12 l4"><button class="modal_outline outline submit_btn" name="edit_save_btn" type="submit"><div class="add"><div class="name_title">Save Changes</div></div></button><button class="modal_outline outline" data-dismiss="modal"><div class="add add_red"><div class="name_title">Cancel</div></div></button> </div></div>');
					
				});
			
		});
		}
	});
}