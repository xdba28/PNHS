// Updated as of: 03/03/2018 3:13 AM
//Edited By: Kyra
//

$(document).ready(function() {
	
    $('select').material_select();
	
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 5, // Creates a dropdown of 5 years to control year,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false, // Close upon selecting a date,
        min: true,
        max: [2019, 11, 31],
        format: 'mmmm dd, yyyy',
        formatSubmit: 'yyyy/mm/dd' //Format to be saved int he database

    });
    var from_$input = $('#startdate').pickadate(),
        from_picker = from_$input.pickadate('picker')

    var to_$input = $('#enddate').pickadate(),
        to_picker = to_$input.pickadate('picker')


    // Check if there’s a “from” or “to” date to start with.
    if (from_picker.get('value')) {
        to_picker.set('min', from_picker.get('select'))
    }
    if (to_picker.get('value')) {
        from_picker.set('max', to_picker.get('select'))
    }

    // When something is selected, update the “from” and “to” limits.
    from_picker.on('set', function(event) {
        if (event.select) {
            to_picker.set('min', from_picker.get('select'))
        } else if ('clear' in event) {
            to_picker.set('min', false)
        }
    })
    to_picker.on('set', function(event) {
        if (event.select) {
            from_picker.set('max', to_picker.get('select'))
        } else if ('clear' in event) {
            from_picker.set('max', false)
        }
    })
    $('.timepicker').pickatime({
        format: 'HH:i',
        formatLabel: 'HH:i',
        default: 'now', // Set default time: 'now', '1:30AM', '16:30'
        fromnow: 0, // set default time to * milliseconds from now (using with default = 'now')
        twelvehour: true, // Use AM/PM or 24-hour format
        donetext: 'OK', // text for done-button
        cleartext: 'Clear', // text for clear-button
        canceltext: 'Cancel', // Text for cancel-button
        autoclose: false, // automatic close timepicker
        ampmclickable: true, // make AM PM clickable
        aftershow: function() {} //Function for after opening timepicker
    });
    

	var iden_correctfieldHTML = '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Correct Answer" name="iden_correct[]" required /><div class="iden_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
    
	var mul_correctfieldHTML = '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Correct Answer" name="mul_correct[]" required /><div class="mul_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
	
	var answerfieldHTML = '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Answer" name="enum_answer[]" required /><div class="enum_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
	
    var wrongfieldHTML = '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control"  placeholder="Wrong Answer" name="mul_wrong[]" required /><div class="mul_wrong_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
	
     $(document).on('click', '.add_b', function(e) { 
         e.preventDefault();
         if($('.question_type').find(":selected").text() == 'Add Question from Question Bank'){
             $("#add_from_qb").modal({backdrop: 'static', keyboard: false});
				var hid_len = $(".qb_wrapper .hidden").length;
				var li_len = $(".qb_wrapper .qb_outline-thread").length;
				//$('.hidden').hide();
				if(hid_len == li_len){
					if($('.no_qb').length == 0){
						$('.qb_wrapper').append("<h1 class='no_qb'><center>Question Bank is empty!</center><h1>");
						$('.add_qb').prop("hidden",true);
					}
				} else {
					$('.no_qb').remove();
					$('.add_qb').prop("hidden",false);
				}
         } else if($('.question_type').find(":selected").text() == "Select Question Type"){
			 swal("Please select a question type!");
		 } else{
			$('.cont_emp').remove();
			$(this).parent('div').parent('div').parent('div').siblings('.field_wrapper').append(q_type($('.question_type').find(":selected").text()));
			$('.save_content').prop("disabled",false);
         }
		 $('.mark').each( function(){
			$(this).change(function(){
				var mark = $(this).val();
				if($.isNumeric(mark)){
					
				} else {
					$(this).val("");
				}
			});
		 });
		 $('.update_items').val(lisize()-1);
     });
	 $(document).on('click', '.save_content', function(e) {
		 $('.update_items').val(lisize()-1);
		 if($('.field_wrapper').is(':empty')){
             swal({
          title: "The exam is currently empty. Save exam?",
          icon: "warning",
          buttons: [
            'Cancel',
            'Continue'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {  
          } else {
			  e.preventDefault();
          }
        });
		 }
		 $('.update_items').val(lisize()-1);
     });
	 $(document).on('click', '.close_qb', function(e) {
		 $('.add_qb').prop("disabled",true);
		 $.each($("input[class=filled-in]:checked"), function(){
			 $("input[class=filled-in]").prop("checked",false);
		 });
	 });
	 
	 //Identification and Enumeration Box Remove Button
		
		$('.field_wrapper').on('click', '.remove_button', function(e) { 
			 e.preventDefault();
			 var ques_no = $(this).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').siblings().val();
			 
			 $(".qb_wrapper").find("input[name=ques_no][value="+ques_no+"]").parent().prop("hidden",false);
			 $(".qb_wrapper").find("input[name=ques_no][value="+ques_no+"]").parent().removeClass("hidden");
			 
			 $(this).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').parent('li').remove(); 
			 $('.field_wrapper').children('li').each(function() {
					 var newVal = $(this).index() + 1;
					 $(this).find('.sortable-number').html(newVal);
				 });
			$('.update_items').val(lisize()-1);
			var check_qb = $(".no_qb").length;
			if (check_qb != 0) {
				$('.add_qb').prop("hidden",false);
				$('.no_qb').remove()
			}
			var check_cont = $(".field_wrapper").text();
			var check_emp = $(".cont_emp").text();
			
			if (check_cont == "") {
				$('.field_wrapper').append("<h2 class='cont_emp'><center>Exam is empty!</center></h2>");
				$('.save_content').prop("disabled",false);
			} else {
				 $(".cont_emp").remove();
				 $('.save_content').prop("disabled",false);
			}
		});
	
	//Remove field for multiple choice from qb
		$(document).on('click', '.qb_mul_remove_button', function(e) { 
			 e.preventDefault();
			 var ques_no = $(this).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').siblings().val();
			 $(this).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').parent('li').remove(); 
			 $('.field_wrapper').children('li').each(function() {
					 var newVal = $(this).index() + 1;
					 $(this).find('.sortable-number').html(newVal);
				 });
			
			 $(".qb_wrapper").find("input[name=ques_no][value="+ques_no+"]").parent().prop("hidden",false);
			 $(".qb_wrapper").find("input[name=ques_no][value="+ques_no+"]").parent().removeClass("hidden");
			 $('.update_items').val(lisize()-1);
			var check_qb = $(".no_qb").length;
			if (check_qb != 0) {
				$('.add_qb').prop("hidden",false);
				$('.no_qb').remove()
			}
			var check_cont = $(".field_wrapper").text();
			if (check_cont == "") {
				$('.field_wrapper').append("<h2 class='cont_emp'><center>Exam is empty!</center></h2>");
				$('.save_content').prop("disabled",false);
			} else {
				 $(".cont_emp").remove();
				 $('.save_content').prop("disabled",false);
			}
		});
	 
    $(document).on('click', '.add_qb', function(e) { 
		$('#add_from_qb').modal("hide");
		$('.cont_emp').remove();
		$('.add_qb').prop("disabled",true);
		$('.save_content').prop("disabled",false);
		$.each($("input[class=filled-in]:checked"), function(){
				var question_no = $(this).parent().parent().parent().parent().parent().parent().parent().parent().siblings().val();
                var question = $(this).parent().parent().parent().parent().parent().siblings().children().children('.quest').text();
				var q_type =$(this).siblings().html();
				
				switch(q_type){
					case 'Identification':
					
						var ans = $(this).parent().parent().parent().parent().parent().siblings().children().children('.green').text();
						iden_ans = ans.split(",");
						elem = iden_ans.length;
						var input = '';
						for(i = 1; i < iden_ans.length; i++){
							input = input + '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Correct Answer" name="iden_correct[]" value="'+iden_ans[i]+'" required /><div class="iden_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
						}
						$('.field_wrapper').append('<li class="outline-thread"><div class="title-thread"><div class="row"><div class="col-md-12"><div class="form-inline"><div class="col-lg-4 no-padding"><div class="form-group"><div class="clearfx"><h5 class="thin h4a">Identification</h5><input hidden type="text" name="question_type[]" value="Identification" readonly /><input hidden type="text" name = "iden_no_correct[]" value="'+iden_ans.length+'" class="no_correct" readonly /></div></div></div><div class="col-lg-2 col-lg-offset-1 no-padding"><div class="form-group"><div class="clearfx"><span class="new badge">Item Number <span class="sortable-number">' + lisize() + '</span></span></div></div></div><div class="col-lg-4 col-lg-offset-1 no-padding"><div class="form-group pull-right" style="white-space:nowrap"><label for="mark" style="margin-right: 0.25em;">Point(s)</label><input type="text" class="mark'+question_no+' form-control" placeholder="Point(s)" name="mark[]" value="" required></div></div></div><div class="form-group"><input type="text" class="qb_ques form-control" placeholder="Question" name="question[]" value="'+question+'" required></div></div><div class="col-md-12"><div class="col-md-12 correct_group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Correct Answer" name="iden_correct[]" value="'+iden_ans[0]+'" required></div></div><div class="correct_field">'+input+'</div></div><div class="clearfx" style="margin-bottom: 1em;"><div><div class="col s12 m6 l6"><div class="left"><button class="waves-effect waves-light btn iden_add_correct">Add Correct Answer</button></div></div><div class="col s12 m6 l6"><div class="right"><button class="remove_button waves-effect waves-light btn red" title="Remove field">Remove Field</button></div></div></div></div></div></div></div><input hidden type="text" name="ques_no[]" value="'+question_no+'" readonly /></li>');
						
						
						
						$(this).prop("checked", false);
						$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().addClass("hidden");
						$(".mark"+question_no).change( function(){
							var mark = $(".mark"+question_no).val();
								if($.isNumeric(mark)){
								} else {
									$(this).val("");
								}
								
							});
						break;
						
					case 'Multiple Choice':
						var ans = $(this).parent().parent().parent().parent().parent().siblings().children().children('.green').text();
						var wrong = $(this).parent().parent().parent().parent().parent().siblings().children().children('.red').text();
						mul_wrong = wrong.split(",");
						elem = mul_wrong.length;
						var input = '';
						for(i = 1; i < mul_wrong.length; i++){
							input = input + '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Correct Answer" name="mul_wrong[]" value="'+mul_wrong[i]+'" required /><div class="mul_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
						}
						$('.field_wrapper').append('<li class="outline-thread"><div class="title-thread"><div class="row"><div class="col-md-12"><div class="form-inline"><div class="col-lg-4 no-padding"><div class="form-group"><div class="clearfx"><h5 class="thin h4a">Multiple Choice</h5><input hidden type="text" name="question_type[]" value="Multiple Choice" readonly /><input hidden type="text" name = "mul_no_wrong[]" value="'+mul_wrong.length+'" class="no_wrong" readonly /></div></div></div><div class="col-lg-2 col-lg-offset-1 no-padding"><div class="form-group"><div class="clearfx"><span class="new badge">Item Number <span class="sortable-number">' + lisize() + '</span></span></div></div></div><div class="col-lg-4 col-lg-offset-1 no-padding"><div class="form-group pull-right" style="white-space:nowrap"><label for="mark" style="margin-right: 0.25em;">Point(s)</label><input type="text" class="mark'+question_no+' form-control" placeholder="Point(s)" name="mark[]" value="" required></div></div></div><div class="form-group"><input type="text" class="qb_ques form-control" placeholder="Question" name="question[]" value="'+question+'" required></div></div><div class="col-md-12"><div class="col-md-12 correct_group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Correct Answer" name="mul_correct[]" value="'+ans+'" required /></div></div><div class="correct_field"></div></div><div class="col-md-12 wrong-group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Wrong Answer" name="mul_wrong[]" value="'+mul_wrong[0]+'" required /></div></div><div class="wrong_field">'+input+'</div></div><div class="col-md-12 col-sm-12"><div class="clearfx" style="margin-bottom: 1em;"><div><div class="col s12 m6 l6"><div class="left"><button class="waves-effect waves-light btn add_wrong">Add Wrong Answer</button></div></div><div class="col s12 m6 l6"><div class="right"><button class="qb_mul_remove_button waves-effect waves-light btn red" title="Remove field">Remove Field</button></div></div></div></div></div></div></div></div><input hidden type="text" name="ques_no[]" value="'+question_no+'" readonly /></li>');
						
						
						
						$(this).prop("checked", false);
						$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().addClass("hidden");
						$(".mark"+question_no).change( function(){
		
								var mark = $(".mark"+question_no).val();
								if($.isNumeric(mark)){
									
								} else {
									$(this).val("");
								}
								
							});
						break;
					case 'Enumeration':
						var ans = $(this).parent().parent().parent().parent().parent().siblings().children().children('.green').text();
						enum_ans = ans.split(",");
						elem = enum_ans.length;
						var input = '';
						for(i = 1; i < enum_ans.length; i++){
							input = input + '<div class="col-md-6 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="Answer" name="enum_answer[]" value="'+enum_ans[i]+'" required /><div class="enum_remove_field input-group-addon btn btn-danger" title="Remove answer field">Delete</div></div></div></div>';
						}
						$('.field_wrapper').append('<li class="outline-thread"><div class="title-thread"><div class="row"><div class="col-md-12"><div class="form-inline"><div class="col-lg-4 no-padding"><div class="form-group"><div class="clearfx"><h5 class="thin h4a">Enumeration</h5><input hidden type="text" name="question_type[]" value="Enumeration" readonly /><input hidden type="text" name = "enum_no_correct[]" value="'+enum_ans.length+'" class="no_correct" readonly /></div></div></div><div class="col-lg-2 col-lg-offset-1 no-padding"><div class="form-group"><div class="clearfx"><span class="new badge">Item Number <span class="sortable-number">'+ lisize() + '</span></span></div></div></div><div class="col-lg-4 col-lg-offset-1 no-padding"><div class="form-group pull-right" style="white-space:nowrap"><label for="mark" style="margin-right: 0.25em;">Point(s)</label><input type="text" class="mark'+question_no+' form-control" placeholder="Point(s)" name="mark[]" value="" required /></div></div></div><div class="form-group"><input type="text" class="form-control" placeholder="Question" name="question[]" value="'+question+'" required /></div></div><div class="col-md-12"><div class="col-md-12 answer_group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Answer" name="enum_answer[]" value="'+enum_ans[0]+'" required></div></div><div class="answer_field">'+input+'</div></div><div class="clearfx" style="margin-bottom: 1em;"><div><div class="col s12 m6 l6"><div class="left"><button class="waves-effect waves-light btn add_answer">Add An Answer</button></div></div><div class="col s12 m6 l6"><div class="right"><button class="remove_button waves-effect waves-light btn red" title="Remove field">Remove Field</button></div></div></div></div></div></div></div><input hidden type="text" name="ques_no[]" value="'+question_no+'" readonly /></li>');
						
						
						$(this).prop("checked", false);
						$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().addClass("hidden");
						$(".mark"+question_no).change( function(){
		
								var mark = $(".mark"+question_no).val();
								if($.isNumeric(mark)){
									
								} else {
									$(this).val("");
								}
								
							});
						break;
				}
        });
		$('.update_items').val(lisize()-1);
		//$('.hidden').hide();
		var hid_len = $(".qb_wrapper .hidden").length;
		var li_len = $(".qb_wrapper .qb_outline-thread").length;
			if(hid_len == li_len){
				if($('.no_qb').length == 0){
					$('.qb_wrapper').append("<h1 class='no_qb'><center>Question Bank is empty!</center><h1>");
					$('.add_qb').prop("hidden",true);
				}
			} else {
				$('.no_qb').remove();
				$('.add_qb').prop("hidden",false);
			}
		
     });
    
	$(document).on('click', '.close_exam', function(e) { 
        swal({
          title: "Close exam without saving?",
          icon: "warning",
          buttons: [
            'Cancel',
            'Continue'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {
			  $('.qb_wrapper').empty();
			 $('.field_wrapper').empty();
			 $('#tab3').remove();
			 $('label[for=tab3]').remove();
			 $('#edit_call').addClass("edit_tab");
			document.getElementById("tab2").checked = true;
			$('.update_items').val(lisize()-1);
			window.scrollTo(0, 75);
          }
          });
     });
	
    //Add Correct Answer for Identification
     $(document).on('click', '.iden_add_correct', function(e) {
         e.preventDefault();
		$(this).parent().parent().parent().parent().siblings('.correct_group').children('.correct_field').append(iden_correctfieldHTML);          
		
		 
		 var no_correct =  $(this).parent().parent().parent().parent().parent().siblings().children().children().children().children().children('.no_correct').val();
		 
		 var sum = 1;
		 sum += Number(no_correct);
		$(this).parent().parent().parent().parent().parent().siblings().children().children().children().children().children('.no_correct').val(sum);
     });
	 
	 
	 // Add Answer for Enumeration
	  $(document).on('click', '.add_answer', function(e) { 
         e.preventDefault();
         $(this).parent().parent().parent().parent().siblings('.answer_group').children('.answer_field').append(answerfieldHTML);
		
		var no_correct =  $(this).parent().parent().parent().parent().parent().siblings().children().children().children().children().children('.no_correct').val();
		 
		 var sum = 1;
		 sum += Number(no_correct);
		 $(this).parent().parent().parent().parent().parent().siblings().children().children().children().children().children('.no_correct').val(sum);
		no_correct = sum;
		
     });
     
	 //Add Wrong Answer
     $(document).on('click', '.add_wrong', function(e) { 
         e.preventDefault();
        $(this).parent().parent().parent().parent().parent().siblings('.wrong-group').append(wrongfieldHTML);
		
		var no_wrong =  $(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children().children('.no_wrong').val();
		 var sum = 1;
		 sum += Number(no_wrong);
		$(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children().children('.no_wrong').val(sum);
     });
	 
     // Remove field for identification question
     $(document).on('click', '.iden_remove_field', function(e) { 
         e.preventDefault();
		 var no_correct =  $(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children().children('.no_correct').val();
		var diff = no_correct - 1;
		$(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children().children('.no_correct').val(diff);
         $(this).parent('div').parent('div').parent('div').remove();
		 
     });
	 
	 
	 
	 // Remove field for multiple choice question
     $(document).on('click', '.mul_remove_field', function(e) { 
         e.preventDefault();
		 var no_correct =  $(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children().children('.no_wrong').val();
		
		
		var diff = no_correct - 1;
		$(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children('.no_correct').val(diff);
         $(this).parent('div').parent('div').parent('div').remove();
		 
     });
	 
	 $(document).on('click', '.enum_remove_field', function(e) { 
         e.preventDefault();
		 var no_correct =  $(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children().children('.no_correct').val();
		
		
		var diff = no_correct - 1;
		 $(this).parent().parent().parent().parent().parent().parent().siblings().children().children().children().children().children('.no_correct').val(diff);
         $(this).parent('div').parent('div').parent('div').remove();
		 
     });
	 
	 //Remove field for multiple question wrong answer
	 $(document).on('click', '.mul_wrong_remove_field', function(e) { 
         e.preventDefault();
		
		 var no_wrong = $(this).parent().parent().parent().parent().parent().siblings().children().children().children().children().children('.no_wrong').val();
		
		var diff = no_wrong - 1;
		$(this).parent().parent().parent().parent().parent().siblings().children().children().children().children().children('.no_wrong').val(diff);
		
        $(this).parent('div').parent('div').parent('div').remove();
		 
     });
	 
     
     $('.field_wrapper').sortable({
         update: function(event, ui) {
             var $divs = $(this).children('li');
             $divs.each(function() {
                 var newVal = $(this).index() + 1;
                 $(this).find('.sortable-number').html(newVal);
             });
         }
     });
	 
	
	
});

function q_type(qtype) {
     switch (qtype) {
         case 'Identification':
			
             return '<li class="outline-thread"><div class="title-thread"><div class="row"><div class="col-md-12"><div class="form-inline"><div class="col-lg-4 no-padding"><div class="form-group"><div class="clearfx"><h5 class="thin h4a">Identification</h5><input hidden type="text" name="question_type[]" value="Identification" readonly /><input hidden type="text" name = "iden_no_correct[]" value="1" class="no_correct" readonly /></div></div></div><div class="col-lg-2 col-lg-offset-1 no-padding"><div class="form-group"><div class="clearfx"><span class="new badge">Item Number <span class="sortable-number">' + lisize() + '</span></span></div></div></div><div class="col-lg-4 col-lg-offset-1 no-padding"><div class="form-group pull-right" style="white-space:nowrap"><label for="mark" style="margin-right: 0.25em;">Point(s)</label><input type="text" class="mark form-control" placeholder="Point(s)" name="mark[]" required></div></div></div><div class="form-group"><input type="text" class="form-control" placeholder="Question" name="question[]" required></div></div><div class="col-md-12"><div class="col-md-12 correct_group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Correct Answer" name="iden_correct[]" required></div></div><div class="correct_field"></div></div><div class="clearfx" style="margin-bottom: 1em;"><div><div class="col s12 m6 l6"><div class="left"><button class="waves-effect waves-light btn iden_add_correct">Add Correct Answer</button></div></div><div class="col s12 m6 l6"><div class="right"><button class="remove_button waves-effect waves-light btn red" title="Remove field">Remove Field</button></div></div></div></div></div></div></div><input hidden type="text" name="ques_no[]" value="0" readonly /></li>';
			 
             break;
         case 'Multiple Choice':
             return '<li class="outline-thread"><div class="title-thread"><div class="row"><div class="col-md-12"><div class="form-inline"><div class="col-lg-4 no-padding"><div class="form-group"><div class="clearfx"><h5 class="thin h4a">Multiple Choice</h5><input hidden type="text" name="question_type[]" value="Multiple Choice" readonly /><input hidden type="text" name = "mul_no_wrong[]" class="no_wrong" value="1" readonly /></div></div></div><div class="col-lg-2 col-lg-offset-1 no-padding"><div class="form-group"><div class="clearfx"><span class="new badge">Item Number <span class="sortable-number">' + lisize() + '</span></span></div></div></div><div class="col-lg-4 col-lg-offset-1 no-padding"><div class="form-group pull-right" style="white-space:nowrap"><label for="mark" style="margin-right: 0.25em;">Point(s)</label><input type="text" class="mark form-control" placeholder="Point(s)" name="mark[]" required></div></div></div><div class="form-group"><input type="text" class="form-control" placeholder="Question" name="question[]" required></div></div><div class="col-md-12"><div class="col-md-12 correct_group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Correct Answer" name="mul_correct[]" required /></div></div><div class="correct_field"></div></div><div class="col-md-12 wrong-group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Wrong Answer" name="mul_wrong[]" required /></div></div><div class="wrong_field"></div></div><div class="col-md-12 col-sm-12"><div class="clearfx" style="margin-bottom: 1em;"><div><div class="col s12 m6 l6"><div class="left"><button class="waves-effect waves-light btn add_wrong">Add Wrong Answer</button></div></div><div class="col s12 m6 l6"><div class="right"><button type="button" class="qb_mul_remove_button waves-effect waves-light btn red" title="Remove field">Remove Field</button></div></div></div></div></div></div></div></div><input hidden type="text" name="ques_no[]" value="0" readonly /></li>';
             break;
         case 'Enumeration':
             return '<li class="outline-thread"><div class="title-thread"><div class="row"><div class="col-md-12"><div class="form-inline"><div class="col-lg-4 no-padding"><div class="form-group"><div class="clearfx"><h5 class="thin h4a">Enumeration</h5><input hidden type="text" name="question_type[]" value="Enumeration" readonly /><input hidden type="text" name = "enum_no_correct[]" value="1" class="no_correct" readonly></div></div></div><div class="col-lg-2 col-lg-offset-1 no-padding"><div class="form-group"><div class="clearfx"><span class="new badge">Item Number <span class="sortable-number">'+ lisize() + '</span></span></div></div></div><div class="col-lg-4 col-lg-offset-1 no-padding"><div class="form-group pull-right" style="white-space:nowrap"><label for="mark" style="margin-right: 0.25em;">Point(s)</label><input type="text" class="mark form-control" placeholder="Point(s)" name="mark[]" required /></div></div></div><div class="form-group"><input type="text" class="form-control" placeholder="Question" name="question[]" required /></div></div><div class="col-md-12"><div class="col-md-12 answer_group"><div class="col-md-6 col-sm-6"><div class="form-group"><input type="text" class="form-control" placeholder="Answer" name="enum_answer[]" required></div></div><div class="answer_field"></div></div><div class="clearfx" style="margin-bottom: 1em;"><div><div class="col s12 m6 l6"><div class="left"><button class="waves-effect waves-light btn add_answer">Add An Answer</button></div></div><div class="col s12 m6 l6"><div class="right"><button class="remove_button waves-effect waves-light btn red" title="Remove field">Remove Field</button></div></div></div></div></div></div></div><input hidden type="text" name="ques_no[]" value="0" readonly /></li>';
             break;
         default:
             swal('Please select a question type!');
     }
 }

function lisize(){
    return $(".field_wrapper li").length + 1;
}


