// @ts-nocheck
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
		"<a href='../student/student_pi.php?lrn={{cryplrn}}'" +
		"<button class='w3-card-4 w3-theme-bl1 w3-hover-blue w3-xsmall' style='border:0;margin-left:10px'>" +
		"<i class='fa fa-eye' Title='View'></i>" +
		"</button>" +
	"</tr>";

	
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
