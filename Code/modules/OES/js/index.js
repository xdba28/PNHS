$(document).ready(function() {
    $('[data-toggle="offcanvas"]').click(function() {
        $('#wrapper').toggleClass('toggled');
    });
    
	//REPORT TAB SELECTION
   if (window.location.href.indexOf("tab") > -1) {
        var tab_id = window.location.toString().split("=");
        if ($("#tab" + tab_id[tab_id.length - 1]).length > 0) {
            document.getElementById("tab" + tab_id[tab_id.length - 1]).checked = true;
        } else {
            window.history.back();
        }
    }
    $('select').material_select();
    
    //SUBJECT SELECT EVENT
    $('.select_subject').change(function() {
        var subj = $('.select_subject').children("option").filter(":selected").val();
		//SELECT RE-INITIALIZE
        $('.sect_name').material_select("destroy");
        $('.sect_name').empty();
        $('.sect_name').append('<option disabled selected>Select Section</option>');
        $('.sect_name').material_select();
		$('.exam_name').material_select("destroy");
        $('.exam_name').empty();
        $('.exam_name').append('<option disabled selected>Select Exam</option>');
        $('.exam_name').material_select();
		
		//DESTROY OR OVERWRITE EXISITING TABLE
		var tb_len = $("#datatable_subject").length;
		if(tb_len > 0){
			$('#datatable_subject').DataTable().clear();
			$('#datatable_subject').DataTable().destroy();
			$('#datatable_subject').remove();
			$("#content6").empty();
			$("#content6").append('<table id="datatable_subject" class="table table-striped table-bordered" width="100%" cellspacing="0"><thead><tr><th></th><th>Exam Name</th><th>Number of Passed</th><th>Number of Failed</th><th>Number of Taker</th></tr></thead></table>');
			$('.save_pdf').parent().parent().remove();
			
		}
		//AJAX FOR SUBJECT SELECT
		$.ajax({
            method: "POST",
            url: "php/report_exam.php",
            data: {
                subject_code  : subj
            },
            dataType: "json",
            success: function(data) {
				add_btn();
				$('.delete_attempts').prop('disabled', true);
                var table = $('#datatable_subject').DataTable({
                    bDestroy: true,
                    data: data,
                    columns: [{
                            render: function(data, type, full) {
                                return '<input type="checkbox" class="select-checkbox" id="' + full.exam_no + '" />';
                            }},{
                                data: 'exam_title', className: 'exam_title'
                            },
                        {
                            data: 'no_passed', className: 'no_passed text-center'
                        },
                        {
                            data: 'no_failed', className: 'no_failed text-center'
                        },
                        {
                            data: 'no_taker', className: 'no_taker text-center'
                        }
                    ],
                    columnDefs: [{
                        orderable: false,
                        targets: 0,
                        className: "text-center",
                        width: "4%"
                    },{
                        targets: 1,
                        width: "40%"
                    }
					],
                    
                    select: {
                        style: 'multi',
                        selector: 'td:first-child .select-checkbox'
                    },
                    order: [
                        [1, 'asc']
                    ],
                    dom: "<'row'<'col-sm-6 clearfx'B><'col-sm-6'f>>" + "<'row'<'col-sm-12't>>" + "<'row'<'col-sm-4 clearfx'l><'col-sm-3 clearfx'i><'col-sm-5'p>>",
                    buttons: [{
                        text: 'Select all',
                        className: 'waves-effect btn mark select_all',
                        action: function() {
                            $('.delete_attempts').prop('disabled', false);
                            $('.deselect_all').prop('disabled', false);
							$('#datatable_subject').DataTable().$('tr').addClass('selected');
							$.each($("#datatable_subject_wrapper input[type='checkbox']"), function(){
								if($(this).is(":checked")){
									
								} else {
									$(this).click();
									$(this).prop("checked",true);
								}
							});
                        }
                    }, {
                        text: 'Select none',
                        className: 'waves-effect btn mark deselect_all',
                        action: function() {
							$('.delete_attempts').prop('disabled', true);
                           $('.deselect_all').prop('disabled', true);
							$('#datatable_subject').DataTable().$("tr.selected").click();
							$.each($("input[type='checkbox']"), function(){
							
								if($(this).is(":checked")){
									$(this).click();
									$(this).prop("checked",false);
								} else {
									
								}
							});
							$('.deselect_all').prop('disabled', true);
							$('.delete_attempts').prop('disabled', true);
							$('.select_all').prop('disabled', false);
                        }
                    }]
                });
				$('.deselect_all').prop('disabled', true);
				$("input[type='checkbox']").click(function(){
					var count_chk = $("input[type='checkbox']:checked").length;
					var count_bx = $("input[type='checkbox']").length;
					if(count_chk > 0){
						$('.deselect_all').prop("disabled",false);
						$('.delete_attempts').prop('disabled', false);
					} else{
						$('.deselect_all').prop("disabled",true);
						$('.delete_attempts').prop('disabled', true);
					}
					if(count_chk == count_bx ){
						$('.select_all').prop("disabled",true);
					} else{
						$('.select_all').prop("disabled",false);
					}
				});
				$('.exam_name').material_select("destroy");
				$('.exam_name').empty();
				$('.exam_name').append('<option value="" disabled selected>Select Exam</option>');
				$.each(data, function(i, item) {
					$('.exam_name').append('<option value="'+data[i].exam_no+'">'+data[i].exam_title+'</option>');
				});
				$('.exam_name').material_select();
				subject_exam_log(subj);
            },
			error: function(){
				$("#content7 #line-chart").remove();
				$("#content7").empty();
				$("#content7").append("<br><h2><center>No chart to display</center></h2><br>");
				$('#datatable_subject').DataTable().clear();
				$('#datatable_subject').DataTable().destroy();
				$('#datatable_subject').DataTable();
				$('.save_pdf').parent().parent().remove();
			}
        });
    });
	
	
	
	
	// SUBJECT LINE-CHART
	function subject_exam_log(subj){
		$("#content7 #line-chart").remove();
		$("#content7").empty();
		$('#content7').append('<canvas id="line-chart"></canvas>');
		
        $.ajax({
            url: "php/data.php",
            method: "POST",
            data: {
                subject_code: subj
            },
            dataType: 'json',
            success: function(data) {

 var lineChartData = { labels: ["0% - 10%", "11% - 20%", "21% - 30%", "31% - 40%", "41% - 50%", "51% - 60%", "61% - 70%", "71% - 80%", "81% - 90%", "91% - 100%"], datasets: [] };
				$.each(data, function(i, item) {
					var label = data[i].exam_title;
                    lineChartData.datasets.push({
                        label: label,
                        borderColor: getRandomolor(),
                        fill: 'false',
                        data: [data[i].zero,data[i].one,data[i].two,data[i].three,data[i].four,data[i].five,data[i].six,data[i].seven,data[i].eight,data[i].nine]
                    });
				});
                var ctx = $("#line-chart");
                var lineGraph = new Chart(ctx, {
                    type: 'line',
                         data: lineChartData,
                    options: {
                        legend: {
                            display: true
                        },
                        title: {
                            display: true,
                            text: 'Overall number of students achieving grade ranges per subject'
                        },
                        scales: {
                            xAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Grade Range'
                                }
                            }],
                            yAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Exam taker'
                                }
                            }]
                        }
                    }
                });

            },
			error: function(data){
				$("#content7").empty();
				$("#content7").append("<br><h2><center>No chart to display</center></h2><br>");
			}

        });
	}
	
	// EXAM SELECT EVENT
	$('.exam_name').change(function(){
		var exam_no = $('.exam_name').children("option").filter(":selected").val();
		//DESTROY OR OVERWRITE EXISITING TABLE
			var tb_len = $("#datatable_subject").length;
			if(tb_len > 0){
				$('#datatable_sect').DataTable().clear();
				$('#datatable_sect').DataTable().destroy();
				$('#datatable_sect').remove();
				$("#content6").empty();
				$("#content6").append('<table id="datatable_subject" class="table table-striped table-bordered" width="100%" cellspacing="0"><thead><tr><th></th><th>Name</th><th>State</th><th>Score</th><th>Equivalent</th><th>Remarks</th><th>Date Taken</th><th>Action</th></tr></thead></table>');
				$('.save_pdf').parent().parent().remove();
			}
		 $.ajax({
            method: "POST",
            url: "php/report_exam.php",
            data: {
                exam_no: exam_no
            },
            dataType: "json",
            success: function(data) {
				add_btn();
				$('.delete_attempts').prop('disabled', true);
				var uniqueNames = [];
				for(i = 0; i< data.length; i++){    
					if(uniqueNames.indexOf(data[i].stud_sect) === -1){
						uniqueNames.push(data[i].sched_id);    
						uniqueNames.push(data[i].stud_sect);   
					}        
				}
				//ADD OPTIONS TO SECTION NAME
				$('.sect_name').material_select("destroy");
				$('.sect_name').empty();
				$('.sect_name').append('<option value="" disabled selected>Select Section</option>');
				var ct = uniqueNames.length;
				for(i = 0; i< ct; i++){
					var sum = 1; 
					sum+=Number(i);
					$('.sect_name').append('<option value="'+uniqueNames[i]+'">'+uniqueNames[sum]+'</option>');
					i = sum;
					
				}
				$('.sect_name').material_select();
                var table = $('#datatable_subject').DataTable({
                    bDestroy: true,
                    data: data,
                    columns: [{
                            render: function(data, type, full) {
                                return '<input type="checkbox" class="select-checkbox" id="' + full.lrn + '"/>';
                            }},{
                                data: 'student_name', className: 'student_name'
                            },
                        {
                            data: 'stud_sect', className: 'stud_sect text-center'
                        },
                        {
                            data: 'exam_score', className: 'exam_score text-center'
                        },
                        {
                            data: 'exam_equiv', className: 'exam_equiv text-center'
                        },
                        {
                            data: 'exam_remark', className: 'exam_remark text-center'
                        },
                        {
                            data: 'examtaken', className: 'examdate text-center'
                        },
						{ 
							data: 'lrn', className: 'exam_hide text-center',
							render: function(data,  type, row){
								if(data == 0){
									data = "Not Available";
								}
								else if(type === 'display'){
									data = '<a href="teacher_review.php?id=' + exam_no +'&'+'lrn='+data+ '">Review</a>';
								}
								return data;
							}
						}
                    ],
                    columnDefs: [{
                        orderable: false,
                        targets: 0,
                        className: "text-center",
                        width: "4%"
                    }],
                    createdRow: function(row, data, dataIndex) {
                        if (data['exam_remark'] == "Failed.") {
                            $(row).css('background-color', '#f44336');
                            $(row).css('color', 'white');
                        }
                    },
                    select: {
                        style: 'multi',
                        selector: 'td:first-child .select-checkbox'
                    },
                    order: [
                        [1, 'asc']
                    ],
                    dom: "<'row'<'col-sm-6 clearfx'B><'col-sm-6'f>>" + "<'row'<'col-sm-12't>>" + "<'row'<'col-sm-4 clearfx'l><'col-sm-3 clearfx'i><'col-sm-5'p>>",
                    buttons: [{
                        text: 'Select all',
                        className: 'waves-effect btn mark select_all',
                        action: function() {
                            $('.delete_attempts').prop('disabled', false);
                            $('.deselect_all').prop('disabled', false);
							$('#datatable_subject').DataTable().$('tr').addClass('selected');
							$.each($("#datatable_subject_wrapper input[type='checkbox']"), function(){
								if($(this).is(":checked")){
									
								} else {
									$(this).click();
									$(this).prop("checked",true);
								}
							});
                        }
                    }, {
                        text: 'Select none',
                        className: 'waves-effect btn mark deselect_all',
                        action: function() {
							$('.deselect_all').prop('disabled', true);
							$('#datatable_subject').DataTable().$("tr.selected").click();
							$.each($("input[type='checkbox']"), function(){
							
								if($(this).is(":checked")){
									$(this).click();
									$(this).prop("checked",false);
								} else {
									
								}
							});
							$('.deselect_all').prop('disabled', true);
							$('.delete_attempts').prop('disabled', true);
							$('.select_all').prop('disabled', false);
                        }
                    }]
                });
				$('.deselect_all').prop('disabled', true);
				$("input[type='checkbox']").click(function(){
					var count_chk = $("input[type='checkbox']:checked").length;
					var count_bx = $("input[type='checkbox']").length;
					if(count_chk > 0){
						$('.deselect_all').prop("disabled",false);
						$('.delete_attempts').prop('disabled', false);
					} else{
						$('.deselect_all').prop("disabled",true);
						$('.delete_attempts').prop('disabled', true);
					}
					if(count_chk == count_bx ){
						$('.select_all').prop("disabled",true);
					} else{
						$('.select_all').prop("disabled",false);
					}
				});
				data_chart();
            },
			error: function(data) {
				$("#content7").empty();
				$("#content7").append("<br><h2><center>No chart to display</center></h2><br>");
				$('#datatable_subject').DataTable().clear();
				$('#datatable_subject').DataTable().destroy();
				$('#datatable_subject').DataTable();
				$('.save_pdf').parent().parent().remove();
			}
        });
	});
	
	//ADD BUTTONS FUNCTION
	function add_btn(){
		if($(".save_pdf").length == 0){
			$("#content6").append('<div class="container clearfx"><div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Download Table as: <button type="submit" class="save_pdf waves-effect btn mark blue" >PDF</button>&nbsp;&nbsp;<button type="submit" class="save_excel waves-effect btn mark green accent-4">EXCEL</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="delete_attempts waves-effect btn mark dark-red">Delete Selected Attempts</button></div></div>');
			
			//DELETE ATTEMPTS PER SUBJECT, PER SECTION
			$('.delete_attempts').click(function(e) {
				var subj = $('.select_subject').children("option").filter(":selected").val();
				var sect = $('.sect_name').children("option").filter(":selected").val();
				var exam_no = $('.exam_name').children("option").filter(":selected").val();
                swal({
                        title: "Are you sure you want to delete the attempt/s?",
          icon: "warning",
          buttons: [
            'Cancel',
            'Continue'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {
					if(sect == "Select Section"){
						$.each($("#datatable_subject_wrapper input[class='select-checkbox']:checked"), function(){
							var exam_no = $(this).val();
							var att = $(this).parent().siblings(".no_taker").text();
							var title = $(this).parent().siblings('.exam_title').text();
							if(att > 0){
								var exam_no = $(this).attr('id');
								$.ajax({
									method: "POST",
									url: "php/delete_attempt.php",
									data: {exam_no: exam_no},
									dataType: 'json',
									success: function(response) {
										if(response.stat == "Success"){
											swal("Result of "+title+" is removed"); 
											
											$("#datatable_subject_wrapper #"+exam_no).parent().siblings(".no_passed").text("0");
											$("#datatable_subject_wrapper #"+exam_no).parent().siblings(".no_failed").text("0");
											$("#datatable_subject_wrapper #"+exam_no).parent().siblings(".no_taker").text("0");
											$("#datatable_subject_wrapper #"+exam_no).click();
											subject_exam_log(subj);
										} else {
											swal("Unable to delete");
											$("#datatable_subject_wrapper #"+exam_no).click();
										}
									}
								});
							} else {
								swal("Unable to delete exam " +title+ ". There is no record!");
								$(this).click();
							}
						});
						
					} else{
						var sched_id = $('.sect_name').children("option").filter(":selected").val();
						var exam_no = $('.exam_name').children("option").filter(":selected").val();
						$.each($("input[class='select-checkbox']:checked"), function(){
							var exam_status = $(this).parent().siblings('.exam_status').text();
							var stud_sect = $(this).parent().siblings('.stud_sect').text();
							var lrn = $(this).attr('id');
							var name = $(this).parent().siblings('.student_name').text();
							var input = 1;
							var exam_no = $('.exam_name').children("option").filter(":selected").val();
							$.ajax({
								method: "POST",
								url: "php/delete_attempt.php",
								data: {exam_no: exam_no, lrn: lrn},
								dataType: 'json',
								success: function(response) {
									if(response.stat == "Success"){
										swal("Result of " + name + " is removed");
										$("#datatable_subject_wrapper #"+lrn).parent().parent().remove();

										var stats_len = $(".exam_status").length;
										if(stats_len == 1){
											$('#datatable_subject').DataTable().clear();
											$('#datatable_subject').DataTable().destroy();
											$('#datatable_subject').DataTable();
											
											$('.save_pdf').parent().parent().remove();
											$("#content7").empty();
											$("#content7").append("<br><h2><center>No chart to display</center></h2><br>");
										} else {
											data_chart(exam_no, sched_id);
										}
										
									} else {
										swal("Unable to delete");
									}
								}
							});
							
						});
						
					}         
          }
                    });
			});
			
			//EXCEL BUTTON EVENT
			$(".save_excel").click(function(e){
				e.preventDefault();
				
				var subj = $('.select_subject ').children("option").filter(":selected").val();
				var sched_id = $('.sect_name ').children("option").filter(":selected").val();
				var exam_no = $('.exam_name').children("option").filter(":selected").val();
				
				if(sched_id != "Select Section" && sched_id != ""){
					$('#form_save').attr('action', 'EXCEL/exam_result.php?sched_id='+sched_id+"&exam_no="+exam_no);
					$('#form_save').submit();
						
				} else if(exam_no != "Select Exam" && exam_no != ""){
					
					$('#form_save').attr('action', 'EXCEL/exam_result.php?exam_no='+exam_no);
					$('#form_save').submit();
				}	else if(subj != "Select Subject" && subj != ""){
					$('#form_save').attr('action', 'EXCEL/exam_result.php?subj='+subj);
					$('#form_save').submit();
				}
			});
			//PDF BUTTON EVENT
			$(".save_pdf").click(function(e){
				$('#form_save').attr('action', 'php/table.php');
			});
			
			
			
		}
	}
	
	//SECTION SELECT EVENT
	
	$('.sect_name').change(function(){
		//DESTROY OR OVERWRITE EXISITING TABLE
		var tb_len = $("#datatable_subject").length;
		if(tb_len > 0){
			$('#datatable_sect').DataTable().clear();
			$('#datatable_sect').DataTable().destroy();
			$('#datatable_sect').remove();
			$("#content6").empty();
			$("#content6").append('<table id="datatable_subject" class="table table-striped table-bordered" width="100%" cellspacing="0"><thead><tr><th></th><th>Name</th><th>State</th><th>Score</th><th>Equivalent</th><th>Remarks</th><th>Date Taken</th><th>Action</th></tr></thead></table>');
			$('.save_pdf').parent().parent().remove();
		}
		var sched_id = $('.sect_name').children("option").filter(":selected").val();
		var exam_no = $('.exam_name').children("option").filter(":selected").val();
		 $.ajax({
            method: "POST",
            url: "php/report_exam.php",
            data: {
                sched_id: sched_id,
				exam_no: exam_no
            },
            dataType: "json",
            success: function(data) {
				add_btn();
				$('.delete_attempts').prop('disabled', true);
                var table = $('#datatable_subject').DataTable({
                    bDestroy: true,
                    data: data,
                    columns: [{
                            render: function(data, type, full) {
                                return '<input type="checkbox" class="select-checkbox" id="' + full.lrn + '"/>';
                            }},{
                                data: 'student_name', className: 'student_name'
                            },
                        {
                            data: 'exam_status', className: 'exam_status text-center'
                        },
                        {
                            data: 'exam_score', className: 'exam_score text-center'
                        },
                        {
                            data: 'exam_equiv', className: 'exam_equiv text-center'
                        },
                        {
                            data: 'exam_remark', className: 'exam_remark text-center'
                        },
                        {
                            data: 'examtaken', className: 'examdate text-center'
                        },
						{ 
							data: 'lrn', className: 'exam_hide text-center',
							render: function(data,  type, row){
								if(data == 0){
									data = "Not Available";
								}
								else if(type === 'display'){
									data = '<a href="teacher_review.php?id=' + exam_no +'&'+'lrn='+data+ '">Review</a>';
								}
								return data;
							}
						}
                    ],
                    columnDefs: [{
                        orderable: false,
                        targets: 0,
                        className: "text-center",
                        width: "4%"
                    }],
                    createdRow: function(row, data, dataIndex) {
                        if (data['exam_remark'] == "Failed.") {
                            $(row).css('background-color', '#f44336');
                            $(row).css('color', 'white');
                        }
                    },
                    select: {
                        style: 'multi',
                        selector: 'td:first-child .select-checkbox'
                    },
                    order: [
                        [1, 'asc']
                    ],
                    dom: "<'row'<'col-sm-6 clearfx'B><'col-sm-6'f>>" + "<'row'<'col-sm-12't>>" + "<'row'<'col-sm-4 clearfx'l><'col-sm-3 clearfx'i><'col-sm-5'p>>",
                    buttons: [{
                        text: 'Select all',
                        className: 'waves-effect btn mark select_all',
                        action: function() {
                            $('.delete_attempts').prop('disabled', false);
                            $('.deselect_all').prop('disabled', false);
							$('#datatable_subject').DataTable().$('tr').addClass('selected');
							$.each($("#datatable_subject_wrapper input[type='checkbox']"), function(){
								if($(this).is(":checked")){
									
								} else {
									$(this).click();
									$(this).prop("checked",true);
								}
							});
                        }
                    }, {
                        text: 'Select none',
                        className: 'waves-effect btn mark deselect_all',
                        action: function() {
							$('.deselect_all').prop('disabled', true);
							$('#datatable_subject').DataTable().$("tr.selected").click();
							$.each($("input[type='checkbox']"), function(){
							
								if($(this).is(":checked")){
									$(this).click();
									$(this).prop("checked",false);
								} else {
									
								}
							});
							$('.deselect_all').prop('disabled', true);
							$('.delete_attempts').prop('disabled', true);
							$('.select_all').prop('disabled', false);
                        }
                    }]
                });
				$('.deselect_all').prop('disabled', true);
				$("input[type='checkbox']").click(function(){
					var count_chk = $("input[type='checkbox']:checked").length;
					var count_bx = $("input[type='checkbox']").length;
					if(count_chk > 0){
						$('.deselect_all').prop("disabled",false);
						$('.delete_attempts').prop('disabled', false);
					} else{
						$('.deselect_all').prop("disabled",true);
						$('.delete_attempts').prop('disabled', true);
					}
					if(count_chk == count_bx ){
						$('.select_all').prop("disabled",true);
					} else{
						$('.select_all').prop("disabled",false);
					}
				});
				data_chart();
			},
			error: function(){
				$("#content7").empty();
				$("#content7").append("<br><h2><center>No chart to display</center></h2><br>");
				$('#datatable_subject').DataTable().clear();
				$('#datatable_subject').DataTable().destroy();
				$('#datatable_subject').DataTable();
				$('.save_pdf').parent().parent().remove();
			}
		});
		
	});


    //CHECK CHECKED INPUTS FOR ABLING OF DELETE ATTEMPT BUTTON
    function delete_attempt() {
        $("input[type='checkbox']").click(function() {
            var count_chk = $("input[type='checkbox']:checked").length;
            if (count_chk > 0) {
                $('.delete_attempts').prop('disabled', false);
            } else {
                $('.delete_attempts').prop('disabled', true);
            }
        });
    }
	
	//STUDENT RESULT CHART
	function data_chart(){
		$('#content7').empty();
		var subj = $('.select_subject').children("option").filter(":selected").val();
		var sched_id = $('.sect_name').children("option").filter(":selected").val();
		var exam_no = $('.exam_name').children("option").filter(":selected").val();
		if(sched_id != "Select Section" && sched_id != ""){
			$.ajax({
				url: "php/data.php",
				method: "POST",
				data: {
					exam_no: exam_no,
					sched_id: sched_id
				},
				dataType: 'json',
				success: function(data) {
					if($("#content7 #bar-chart").length == 0){
						$('#content7').append('<canvas id="bar-chart"></canvas>');
					}
					var ctx = $("#bar-chart");
					var barGraph = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: ["0% - 10%", "11% - 20%", "21% - 30%", "31% - 40%", "41% - 50%", "51% - 60%", "61% - 70%", "71% - 80%", "81% - 90%", "91% - 100%"],
						datasets: [{
							label: "Exam Taker",
							data: data,
							backgroundColor: [getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor()],
						}]
					},
					options: {
						legend: { display: false },
						title: {
							display: true,
							text: 'Overall number of students achieving grade ranges per section'
						},
						scales: {
							xAxes: [{
								scaleLabel: {
									display: true,
									labelString: 'Grade Range'
								}
							}],
							yAxes: [{
								scaleLabel: {
									display: true,
									labelString: 'Exam taker'
								}
							}]
						}
					}
				});

				},
				error: function() {
					$("#content7").empty();
					$("#content7").append("<br><h2><center>No chart to display</center></h2><br>");
				}

			});
		} else if(exam_no != "Select Exam" && exam_no != ""){
			$.ajax({
				url: "php/data.php",
				method: "POST",
				data: {
					exam_no: exam_no,
				},
				dataType: 'json',
				success: function(data) {
					if($("#content7 #bar-chart").length == 0){
						$('#content7').append('<canvas id="bar-chart"></canvas>');
					}
					var ctx = $("#bar-chart");
					var barGraph = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: ["0% - 10%", "11% - 20%", "21% - 30%", "31% - 40%", "41% - 50%", "51% - 60%", "61% - 70%", "71% - 80%", "81% - 90%", "91% - 100%"],
						datasets: [{
							label: "Exam Taker",
							data: data,
							backgroundColor: [getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor()],
						}]
					},
					options: {
						legend: { display: false },
						title: {
							display: true,
							text: 'Overall number of students achieving grade ranges per exam'
						},
						scales: {
							xAxes: [{
								scaleLabel: {
									display: true,
									labelString: 'Grade Range'
								}
							}],
							yAxes: [{
								scaleLabel: {
									display: true,
									labelString: 'Exam taker'
								}
							}]
						}
					}
				});

				},
				error: function() {
					$("#content7").empty();
					$("#content7").append("<br><h2><center>No chart to display</center></h2><br>");
				}

			});
		}
        
	}
	
});
//END OF DOCUMENT READY FUNCTION
//
//
//START OF OTHERS
//
for (var i = 0; i < document.getElementsByTagName('figure').length; i++) {
    document.getElementsByTagName('figure')[i].style.background = getRandomColor();
}

function getRandomColor() {
    var colors = ['#091b27', '#2e0e0a', '#4f3204', '#061c10', '#000000'];
    var rand = Math.floor(Math.random() * colors.length);
    return colors[rand];
}

function getRandomolor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
if (window.location.href.indexOf("report") > -1) {
    var table = $(document).ready(function() {
        $('#datatable_subject').DataTable();
    });
}
