
 $(document).ready(function() {
     $('select').material_select();

    var iden_correctfieldHTML = '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Correct Answer" name="iden_correct[]" required /><div class="iden_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
    
	var mul_correctfieldHTML = '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Correct Answer" name="mul_correct[]" required /><div class="mul_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
	
	var answerfieldHTML = '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Answer" name="enum_answer[]" required /><div class="enum_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
	
    var wrongfieldHTML = '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control"  placeholder="Wrong Answer" name="mul_wrong[]" required /><div class="mul_wrong_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
	
	var edit_iden_correctfieldHTML = '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Correct Answer" name="edit_iden_correct[]" required /><div class="edit_iden_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
    
	var edit_mul_correctfieldHTML = '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Correct Answer" name="edit_mul_correct[]" required /><div class="edit_mul_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
	
	var edit_answerfieldHTML = '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Answer" name="edit_enum_answer[]" required /><div class="edit_enum_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
	
    var edit_wrongfieldHTML = '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control"  placeholder="Wrong Answer" name="edit_mul_wrong[]" required /><div class="edit_mul_wrong_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
    
	$(document).on('click', '.add_b', function(e) { 
         e.preventDefault();
         if($('.questioncreate_subject').find(":selected").text() == 'Select Subject'){
             swal('Please select a subject where the question(s) will be added');
         }
         else{
             $(this).parent('div').parent('div').parent('div').siblings('.field_wrapper').append(q_type($('.question_type').find(":selected").text()));
         }
     });
	 
     //Add Correct Answer for Identification
     $(document).on('click', '.iden_add_correct', function(e) {
         e.preventDefault();
         $(this).parent().parent().parent().parent().parent().siblings('.correct_group').children('.correct_field').append(iden_correctfieldHTML); 
		 
		 var no_correct =  $(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_correct').val();
		 
		 var sum = 1;
		 sum += Number(no_correct);
		$(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_correct').val(sum);
     });
	 
	 $(document).on('click', '.edit_iden_add_correct', function(e) {
         e.preventDefault();
         $(this).parent().parent().parent().parent().parent().siblings('.correct_group').children('.correct_field').append(edit_iden_correctfieldHTML); 
     });
	 
	 //Add Correct Answer for Multiple Choice
	  $(document).on('click', '.mul_add_correct', function(e) {
         e.preventDefault();
         $(this).parent().parent().parent().parent().parent().siblings('.wrong_group').children('.correct_field').append(mul_correctfieldHTML); 
		 
		 var no_correct =  $(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_correct').val();
		 
		 var sum = 1;
		 sum += Number(no_correct);
		$(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_correct').val(sum);
     });
	  $(document).on('click', '.edit_mul_add_correct', function(e) {
         e.preventDefault();
         $(this).parent().parent().parent().parent().parent().siblings('.correct_group').children('.correct_field').append(edit_mul_correctfieldHTML); 
     });
	 // Add Answer for Enumeration
	  $(document).on('click', '.add_answer', function(e) { 
         e.preventDefault();
         $(this).parent().parent().parent().parent().parent().siblings('.answer_group').children('.answer_field').append(answerfieldHTML);
		
		 var no_correct =  $(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_correct').val();
		 
		 var sum = 1;
		 sum += Number(no_correct);
		$(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_correct').val(sum);
     });
     $(document).on('click', '.edit_add_answer', function(e) { 
         e.preventDefault();
         $(this).parent().parent().parent().parent().parent().siblings('.answer_group').children('.answer_field').append(edit_answerfieldHTML);
     });
     //Add Wrong Answer
     $(document).on('click', '.add_wrong', function(e) { 
         e.preventDefault();
         $(this).parent().parent().parent().parent().parent().siblings('.wrong-group').children('.wrong_field').append(wrongfieldHTML);
		
		var no_wrong =  $(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_wrong').val();
		 
		 var sum = 1;
		 sum += Number(no_wrong);
		$(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_wrong').val(sum);
     });
	 $(document).on('click', '.edit_add_wrong', function(e) { 
         e.preventDefault();
         $(this).parent().parent().parent().parent().parent().siblings('.wrong-group').children('.wrong_field').append(edit_wrongfieldHTML);
     });
	 // Remove field for identification question
     $(document).on('click', '.iden_remove_field', function(e) { 
         e.preventDefault();
		 var no_correct =  $(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_correct').val();
		var diff = no_correct - 1;
		$(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_correct').val(diff);
         $(this).parent('div').parent('div').parent('div').remove();
		 
     });
	  $(document).on('click', '.edit_iden_remove_field', function(e) { 
         e.preventDefault();

         $(this).parent('div').parent('div').parent('div').remove();
		 
     });
	 // Remove field for multiple choice question
     $(document).on('click', '.mul_remove_field', function(e) { 
         e.preventDefault();
		 var no_correct =  $(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_correct').val();

		
		var diff = no_correct - 1;
		$(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_correct').val(diff);
         $(this).parent('div').parent('div').parent('div').remove();
		 
     });
	      $(document).on('click', '.edit_mul_remove_field', function(e) { 
         e.preventDefault();
		 
         $(this).parent('div').parent('div').parent('div').remove();
		 
     });
	 // Remove field for enumeration question
     $(document).on('click', '.enum_remove_field', function(e) { 
         e.preventDefault();
		 var no_correct =  $(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_correct').val();

		
		var diff = no_correct - 1;
		$(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_correct').val(diff);
         $(this).parent('div').parent('div').parent('div').remove();
		 
     });
	 $(document).on('click', '.edit_enum_remove_field', function(e) { 
         e.preventDefault();
         $(this).parent('div').parent('div').parent('div').remove();
		 
     });
	 //Remove field for multiple question wrong answer
	 $(document).on('click', '.mul_wrong_remove_field', function(e) { 
         e.preventDefault();
		 var no_wrong =  $(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_wrong').val();

		
		var diff = no_wrong - 1;
		$(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_wrong').val(diff);
         $(this).parent('div').parent('div').parent('div').remove();
		 
     });
	 $(document).on('click', '.edit_mul_wrong_remove_field', function(e) { 
         e.preventDefault();
		
         $(this).parent('div').parent('div').parent('div').remove();
		 
     });
     $('.field_wrapper').on('click', '.remove_button', function(e) { 
         e.preventDefault();
         $(this).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').remove(); 
     });
	 
	  $('.field_wrapper').on('click', '.edit_remove_button', function(e) { 
         e.preventDefault();
         $(this).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').remove(); 
     });
 });

 function q_type(qtype) {
     switch (qtype) {
         case 'Identification':
             return '<div class="outline-thread"><div class="title-thread"><div class="row"><div class="col-md-12"><div class="col-md-12 col-sm-12 upper" style="margin-bottom: 1em;"><div class="form-inline"><div class="clearfx"><h4 class="thin h4a">Identification</h4><input hidden type="text" name="question_type[]" value="Identification" /><input hidden type="text" name = "iden_no_correct[]" value="1" class="no_correct" /></div></div></div><div class="col-md-12 col-sm-12"><div class="form-group"><input type="text" class="form-control" placeholder="Question" name="question[]" required /></div></div></div><div class="col-md-12"><div class="col-md-12 correct_group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Correct Answer" name="iden_correct[]" required /></div></div><div class="correct_field"></div></div><div class="col-md-12 col-sm-12"><div class="clearfx" style="margin-bottom: 1em;"><div><div class="col s12 m6 l6"><div class="left"><button type="button" class="waves-effect waves-light btn iden_add_correct">Add Correct Answer</button></div></div><div class="col s12 m6 l6"><div class="right"><button class="remove_button waves-effect waves-light btn red" title="Remove field">Remove Field</button></div></div></div></div></div></div></div></div></div>';
			 
             break;
         case 'Multiple Choice':
             return '<div class="outline-thread"><div class="title-thread"><div class="row"><div class="col-md-12"><div class="col-md-12 col-sm-12" style="margin-bottom: 1em;"><div class="form-inline"><div class="clearfx"><h4 class="thin h4a">Multiple Choice</h4><input hidden type="text" name="question_type[]" value="Multiple Choice" /><input type="text" name="mul_no_wrong[]" class="no_wrong" value="1" hidden /> </div></div></div><div class="col-md-12 col-sm-12"><div class="form-group"><input type="text" class="form-control" placeholder="Question" name="question[]" required /></div></div></div><div class="col-md-12"><div class="col-md-12 correct_group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Correct Answer" name="mul_correct[]" required /></div></div><div class="correct_field"></div></div><div class="col-md-12 wrong-group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Wrong Answer" name="mul_wrong[]" required /></div></div><div class="wrong_field"></div></div><div class="col-md-12 col-sm-12"><div class="clearfx" style="margin-bottom: 1em;"><div class="row"><div class="col s12 m6 l4"><div class="center"></div></div><div class="col s12 m6 l4"><div class="center"><button class="waves-effect waves-light btn add_wrong">Add Wrong Answer</button></div></div><div class="col s12 m6 l4"><div class="center"><button class="remove_button waves-effect waves-light btn red" title="Remove field">Remove Field</button></div></div></div></div></div></div></div></div></div>';
             break;
         case 'Enumeration':
             return '<div class="outline-thread"><div class="title-thread"><div class="row"><div class="col-md-12"><div class="col-md-12 col-sm-12" style="margin-bottom: 1em;"><div class="form-inline"><div class="clearfx"><h4 class="thin h4a">Enumeration</h4><input hidden type="text" name="question_type[]" value="Enumeration" /><input type="text" name = "enum_no_correct[]" value="1" class="no_correct" hidden /></div></div></div><div class="col-md-12 col-sm-12"><div class="form-group"><input type="text" class="form-control" placeholder="Question" name="question[]" required /></div></div></div><div class="col-md-12"><div class="col-md-12 answer_group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Answer" name="enum_answer[]" required /></div></div><div class="answer_field"></div></div><div class="col-md-12 col-sm-12"><div class="clearfx" style="margin-bottom: 1em;"><div><div class="col s12 m6 l6"><div class="left"><button class="waves-effect waves-light btn add_answer">Add An Answer</button></div></div><div class="col s12 m6 l6"><div class="right"><button class="remove_button waves-effect waves-light btn red" title="Remove field">Remove Field</button></div></div></div></div></div></div></div></div>';
             break;
         default:
             swal('Please select a question type.');
     }
 }