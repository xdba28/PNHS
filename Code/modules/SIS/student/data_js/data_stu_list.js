$('#sel_sy').on('change', function()
{
	var sy = $('#sel_sy').val();
	var $table = $('#TableData');
	
	var tableHTML = "" +
	"<tr>" +
		"<td>{{lrn}}</td>" +
		"<td>{{lname}}</td>" +
		"<td>{{fname}}</td>" +
		"<td>{{mname}}</td>" +
		"<td>{{status}}</td>" +
		"<td>{{lvl}}-{{section}}</td>" +
		"<td>{{year}}" +
		"<td><center>" +
		"<a href='student_pi.php?lrn={{cryplrn}}'" +
		"<button class='w3-card-4 w3-theme-bl1 w3-hover-blue w3-xsmall' style='border:0;margin-left:10px'>" +
		"<i class='fa fa-eye' Title='View'></i>" +
		"</button>" +
		"</a>" +
		"<a href='#drp{{cryplrn}}' data-toggle='modal'>" +
		"<button class='w3-card-4 w3-theme-rl1 w3-hover-red w3-xsmall' style='border:0'>" +
		"<i class='fa fa-user-times' Title='Drop' data-toggle='modal' data-target='#drp'>" +
		"</i>" +
		"</button>" +
		"</a>" +
		"</center></td>"+
	"</tr>"

	"<div class='modal fade' id='drp{{lrn}}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>" +
	"<div class='modal-dialog modal-lg' role='document'>" +
	"<div class='modal-content'>" +
		"<div class='modal-header'>";
	// 	<center><h4 class="modal-title" id="myModalLabel">Are you sure you want to drop this student?</h4></center>
	// 	</div>
	// 	<form action="process/drop_student.php" method="post">
	// 	<div class="modal-body">
	// 	<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
	// 		<thead>
	// 			<tr>
	// 				<th>LRN</th>
	// 				<th>Lastname</th>
	// 				<th>Firstname</th>
	// 				<th>Middlename</th>
	// 				<th>Grade Level & Section</th>
	// 				<th>School Year</th>
	// 			</tr>
	// 		</thead>
	// 		<tbody>
	// 			<tr>
	// 				<?php 
	// 				$modal_get_section = $mysqli->query("SELECT YEAR_LEVEL, SECTION_NAME, year FROM sis_stu_rec, css_section, css_school_yr
	// 												WHERE sis_stu_rec.section_id = css_section.SECTION_ID
	// 												AND sis_stu_rec.sy_id = css_school_yr.sy_id
	// 												AND css_school_yr.status = 'active'
	// 												AND lrn = $lrn")
	// 										or die("Error: modal_get_section: ".$mysqli->error);

	// 				echo 
	// 				'<td><input hidden name="lrn" id="lrn" value=' . $lrn . '>' . $lrn . '</td>
	// 				<td>'  . $lname . '</td>
	// 				<td>'  . $fname . '</td>
	// 				<td>'  . $mname . '</td>';

	// 				while($row = $modal_get_section->fetch_array())
	// 				{
	// 					echo
	// 						'<td>'. $row['YEAR_LEVEL'] . " - " . $row['SECTION_NAME'] . '</td>
	// 						<td>' . $row['year'] . '</td>'; 
	// 				}//get_section while end

	// 				?>

	// 			</tr>
	// 		</tbody>
	// 	</table>
	// 	</div>
	// 	<div class="modal-footer"><center>
	// 	<button type="submit" class="btn w3-hover-green btn-success w3-card-2">
	// 	&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
	// 	</button>
	// 	<button type="button" class="btn w3-hover-red w3-theme-rl1 w3-card-2" data-dismiss="modal">
	// 	Cancel</button>
	// 	</center>
	// 	</div>
	// 	</form>    
	// </div>
	// </div>
	// </div>  

	var no_data = "";
	
	$.ajax(
	{
		type: 'POST',
		url: 'data_js/ajax_php/stu_list_data.php',
		data: {sy: sy},
		success: function(data)
		{
			if(data.length == 11)
			{
				swal("No Students in this School Year");
				$table.html("");
				$table.append(Mustache.render(no_data));
			}
			else if(data.length == 5)
			{
				// $table.html("");
			}
			else
			{
				$table.html("");
				$.each(data, function(i, lrn)
				{
					$table.append(Mustache.render(tableHTML, lrn));
				})
			}		
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
				console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
			window.alert("Request Not sent");
		}
	})
});
