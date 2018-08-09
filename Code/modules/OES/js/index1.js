$(document).ready(function() {
    var trigger = $('.hamburger'),
        isClosed = false;

    trigger.click(function() {
        hamburger_cross();
    });

    function hamburger_cross() {
        if (isClosed == true) {
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
            $(".hamburger-remove").show();
        } else {
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
            $(".hamburger-remove").hide();
        }
    }
    $('[data-toggle="offcanvas"]').click(function() {
        $('#wrapper').toggleClass('toggled');
    });
    $('.delete_attempts').prop('disabled', true);
    $.ajax({
        url: "php/data.php",
        method: "POST",
        data: {
            exam_no: 0
        },
        dataType: 'json',
        success: function(data) {
            console.log(data);

            var ctx = $("#bar-chart");
            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["0.00 - 10.00", "11.00 - 20.00", "21.00 - 30.00", "31.00 - 40.00", "41.00 - 50.00", "51.00 - 60.00", "61.00 - 70.00", "71.00 - 80.00", "81.00 - 90.00", "91.00 - 100.00"],
                    datasets: [{
                        label: "Exam Taker",
                        data: data,
                        backgroundColor: [getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor()],
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Overall number of students achieving grade ranges'
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
        error: function(data) {
            console.log(data);
        }

    });
    if (window.location.href.indexOf("tab") > -1) {
        var tab_id = window.location.toString().split("=");
        if ($("#tab" + tab_id[tab_id.length - 1]).length > 0) {
            document.getElementById("tab" + tab_id[tab_id.length - 1]).checked = true;
        } else {
            window.history.back();
        }
    }
    
    // Subject Select
    $('.select_subject').change(function() {
        $('.select_all').prop('disabled', true);
        $('.deselect_all').prop('disabled', true);
        $('.save_pdf').prop('disabled', true);
        $('.delete_attempts').prop('disabled', true);
        var subj = $('.select_subject').children("option").filter(":selected").val();
        $('.sect_name').empty();
        $('.exam_name').material_select("destroy");
        $('.exam_name').empty();
        $('.exam_name').append('<option disabled selected>Select Exam</option>');
        $('.exam_name').material_select();
        $('#datatable tbody').empty();
        $('#datatable tbody').append('<tr class="odd"><td valign="top" colspan="7" class="dataTables_empty">No data available in table</td></tr>');
        $("#bar-chart").remove();
        select_section(subj);
    });

    function chart_data(sched_id) {
        $.ajax({
            method: "POST",
            url: "php/select_exam_name.php",
            data: {
                sched_id: sched_id
            },
            dataType: "json",
            success: function(data) {
                $(".exam_name").remove();

                var tag = '<i class="material-icons prefix">format_list_numbered</i><select class="exam_name" name="exam" required><option value="" disabled selected>Select Exam</option>';
                var list = '';
                $.each(data, function(i, item) {
                    list = list + "<option value='" + data[i].exam_no + "'>" + data[i].exam_title + "</option>";
                });

                list = tag + list + "</select>" + "<label>Exam Name</label>";

                $(".bts").children("label").remove();
                $(".bts").append(list);
                $('.exam_name').material_select();
                // Exam
                $('.exam_name').change(function() {
                    var exam_no = $('.exam_name').children("option").filter(":selected").val();
                    var sched_id = $('.sect_name').children("option").filter(":selected").val();
                    $("#bar-chart").remove();
                    show_res(exam_no, sched_id);
                    $('.select_all').prop('disabled', false);
                    $('.save_pdf').prop('disabled', false);
                });
            }
        });
    }

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
	function data_chart(exam_no){
		$('#content7').append('<canvas id="bar-chart"></canvas>');
        $.ajax({
            url: "php/data.php",
            method: "POST",
            data: {
                exam_no: exam_no
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);

                var ctx = $("#bar-chart");
                var barGraph = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["0.00 - 10.00", "11.00 - 20.00", "21.00 - 30.00", "31.00 - 40.00", "41.00 - 50.00", "51.00 - 60.00", "61.00 - 70.00", "71.00 - 80.00", "81.00 - 90.00", "91.00 - 100.00"],
                        datasets: [{
                            label: "Exam Taker",
                            data: data,
                            backgroundColor: [getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor(), getRandomolor()],
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Overall number of students achieving grade ranges'
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
            error: function(data) {
                console.log(data);
            }

        });
	}
	
    function show_res(exam_no, sched_id) {
        var sect_name = $('.sect_name').children("option").filter(":selected").text();
        $('#datatable tbody').empty();
        $.ajax({
            method: "POST",
            url: "php/select_exam_result.php",
            data: {
                exam_no: exam_no,
                sched_id: sched_id
            },
            dataType: "json",
            success: function(data) {
                $(".save_pdf").show();
                $(".delete_attempts").show();
                var table = $('#datatable').DataTable({
                    bDestroy: true,
                    data: data,
                    columns: [{
                            render: function(data, type, full) {
                                return '<input type="checkbox" class="select-checkbox" id="' + full.lrn + '" />';
                            }},{
                                data: 'student_name', className: 'student_name'
                            },
                        {
                            data: 'exam_status', className: 'exam_status'
                        },
                        {
                            data: 'stud_sect', className: 'stud_sect'
                        },
                        {
                            data: 'exam_score', className: 'exam_score'
                        },
                        {
                            data: 'exam_equiv', className: 'exam_equiv'
                        },
                        {
                            data: 'exam_remark', className: 'exam_remark'
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
                            $('input:checkbox').prop('checked', true);
                            $('.delete_attempts').prop('disabled', false);
                            $('.deselect_all').prop('disabled', false);
                            $('.select_all').prop('disabled', true);
                        }
                    }, {
                        text: 'Select none',
                        className: 'waves-effect btn mark deselect_all',
                        action: function() {
                            var count_chk = $("input[type='checkbox']:checked").length;
                            if (count_chk > 0) {
                                $('.delete_attempts').prop('disabled', true);
                                $('input:checkbox').prop('checked', false);
                                $('.deselect_all').prop('disabled', true);
                                $('.select_all').prop('disabled', false);

                            }
                        }
                    }]
                });
                $("input[type='checkbox']").click(function() {
                    var count_chk = $("input[type='checkbox']:checked").length;
                    if (count_chk > 0) {
                        $('.delete_attempts').prop('disabled', false);
                        $('.deselect_all').prop('disabled', false);
                    } else {
                        $('.delete_attempts').prop('disabled', true);
                    }
                });
            }
        });

        data_chart(exam_no);
    }

    function select_section(subj) {
        $.ajax({
            method: "POST",
            url: "php/select_class.php",
            data: {
                subject_code: subj
            },
            dataType: "json",
            success: function(data) {
                $(".sect_name").remove();
                var tag = '<select class="sect_name" name="section" required><option value="" disabled selected>Select Section</option>';
                var list = '';
                $.each(data, function(i, item) {
                    list = list + "<option value='" + data[i].sched_id + "'>" + data[i].section_name + "</option>";
                });

                list = tag + list + "</select>" + "<label>Class Section</label>"
                $(".section").children("label").remove();
                $(".section").append(list);
                $('.sect_name').material_select();
                //Section
                $('.sect_name').change(function() {
                    $('.select_all').prop('disabled', true);
                    $('.deselect_all').prop('disabled', true);
                    $('.save_pdf').prop('disabled', true);
                    $('.delete_attempts').prop('disabled', true);
                    var sched_id = $('.sect_name').children("option").filter(":selected").val();
                    $('#datatable tbody').empty();
                    $('#datatable tbody').append('<tr class="odd"><td valign="top" colspan="7" class="dataTables_empty">No data available in table</td></tr>');
                    $("#bar-chart").remove();
                    chart_data(sched_id);

                });
            }

        });
    }
    $('.delete_attempts').click(function(e) {
        if ($("input[type='checkbox']:checked").length > 0) {
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
					 $.each($("input[class=select-checkbox]:checked"), function(){
						
						 var exam_status = $(this).parent().siblings('.exam_status').text();
						 var stud_sect = $(this).parent().siblings('.stud_sect').text();
						 var lrn = $(this).attr('id');
						 var name = $(this).parent().siblings('.student_name').text();
						 if(exam_status == 'Not Finished'){
							 swal(name + " has not attempted the exam yet!");
							 $(this).prop('checked', false);
						 } else {
							 var exam_no = $('.exam_name').children("option").filter(":selected").val();
								$.ajax({
									method: "POST",
									url: "php/delete_attempt.php",
									data: {exam_no: exam_no, lrn: lrn},
									dataType: 'json',
									success: function(response) {
										if(response.stat == "Success"){
											swal("Result of " + name + " is removed"); 
											$('#'+lrn).prop('checked',false);
											$('#'+lrn).parent().siblings('.student_name').text(name);
											$('#'+lrn).parent().siblings('.exam_status').text("Not Finished");
											$('#'+lrn).parent().siblings('.stud_sect').text(stud_sect);
											$('#'+lrn).parent().siblings('.exam_score').text("N/A");
											$('#'+lrn).parent().siblings('.exam_equiv').text("N/A");
											$('#'+lrn).parent().siblings('.exam_remark').text("N/A");
											$('#'+lrn).parent().parent().css('background-color', 'white');
											$('#'+lrn).parent().parent().css('color', 'black');
											data_chart(exam_no);
										} else {
											swal("Unable to delete");
										}
									}
									
								});
						 }
					 });
			} else {
				e.preventDefault();
			}
        });
        }
    });
});
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
        $('#datatable').DataTable();
        $(".save_pdf").hide();
        $(".delete_attempts").hide();
    });
    table.cell('.selected', 0).rows().select();
}