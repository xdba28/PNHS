$(document).ready(function(){
	$('.print_out').click(function(){
		
		var check_input = 0; //0 = all inputs have values
		$.each($(".field_wrapper input"), function(){ //CHECK IF ALL INPUT FIELD ARE FILLED-IN
			var input_field = $(this).val();
			if(input_field == ""){
				var y = $(this).parent().offset().top;
				var top_nav = $('.navigation-top').height();
				var x = y - top_nav - 50;
				window.scrollTo(0, x );
				swal("Please input a text before printing the exam questions!");
				check_input = 1;
				return false;
			}
			
		});
		if($('.cont_emp').length > 0){ //CHECK IF CONTENT IS EMPTY
			swal("Exam is currently empty! Please insert a question.");
		} else {
			//PRINT EXAM CONTENTS
			if(check_input == 0){
				var doc_heading = '<center><p style="font-size:12px; color:black">Republic of the Philippines<br>Pagasa National High School<br>Rawis, Legazpi City<br></p></center>';
				var title = $('#content3 .exam_title').text();
				var exam_subject = $('#content3 .subj_desc').text();
				var exam_type = $('#content3 .cont_exam_type').text();
				if($(this).hasClass("open_print")){
					$(this).removeClass("open_print");
					$(this).addClass("close_print");
					$(this).text("Close printing window");
					var newWin=window.open('','Print-Window');
					newWin.document.open();
					newWin.document.write('<html><head><title></title></head><body onload="window.print()" style="margin-top:25px; margin-bottom: 25px; margin-left:25px; margin-right:25px">'+doc_heading);
					newWin.document.write('<br><h3 style="margin-bottom: 1px"><center>'+title+'<br>'+exam_type+'<br>'+exam_subject+'</center></h3><br>');
					var count = 1;
					var add = 1;
					$.each($(".field_wrapper .outline-thread"), function(){
						var q_type = $(this).find(".thin").text();
						var question = $(this).children(".title-thread").children(".row").children(".col-md-12").children(".form-group").children("input").val();
						switch(q_type){
							case 'Identification':
								newWin.document.write('<p style="margin-bottom: 10px; text-align: justify">______________ ' + count +'. '+question+'</p>');
							break;
							
							case 'Multiple Choice':
								var correct = $(this).children(".title-thread").children(".row").children(".col-md-12").children(".correct_group").children(".col-md-6").children(".form-group").children("input").val();
								var wrong_count = $(this).children(".title-thread").children(".row").children(".col-md-12").children(".wrong-group").children(".col-md-6").length;
								var choices_array = [correct];
								$.each($(this).find('.wrong-group').find('input'), function(){
									var wrong = $(this).val();
									choices_array.push(wrong);
								});
								var count_array = choices_array.length;
								var letter = "a";
								var i = 0;
								newWin.document.write('<p style="margin-bottom: 10px; text-align: justify">' + count +'. '+question+'</p>');
								newWin.document.write('<p class="choices" style="margin-bottom: 10px; text-align: justify">');
								for(i = 0; i < count_array; i++){
									newWin.document.write("&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+ letter +'. '+choices_array[i]);
									letter = String.fromCharCode(letter.charCodeAt() + 1)
								}
								$('.choices').css({"display":"table-cell","text-align":"center"});
								newWin.document.write('</p>');
								;
								break;
								
							case 'Enumeration':
								var enum_ans = [];
								$.each($(this).find('.answer_group').find('input'), function(){
									var ans = $(this).val();
									enum_ans.push(ans);
								});
								var count_array = enum_ans.length;
								var i = 1;
								
								newWin.document.write('<p style="margin-bottom: 10px; text-align: justify">' + count +'. '+question+'</p>');
								newWin.document.write('<p style="margin-bottom: 10px; text-align: justify">');
								
								
								for(i = 1; i <= count_array; i++){
									var num = (i / 3) - Math.floor(i / 3);
									if(num == 0){
										newWin.document.write( '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+i +'. __________________');
										newWin.document.write('</p>');
										newWin.document.write('<p style="margin-bottom: 10px; text-align: justify">');
										
									} else {
										newWin.document.write( '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+i +'. __________________');
									}
									
								}
								newWin.document.write('</p>');
								break;
						}
						count+=Number(add);
						count = count;
						
					});
					newWin.document.write('</body></html>');
					newWin.document.close();
					setTimeout(function(){
						newWin.close();
						$('.print_out').removeClass("close_print");
						$('.print_out').addClass("open_print");
						$('.print_out').text("Print Exam Questions");
						swal("Please don't forget to save the exam!");
						},10);
					
				} else {
					swal("Printing window is currently open. Please close the printing window!");
				}
				}
			}
		
	});
});