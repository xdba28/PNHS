$('#stat_sel').on('change', function()
{
	var section = $('#stat_sel').val();
	var $table = $('#TableData');

	var tableHTML = "" +
	"<tr>" +
		"<td>{{lrn}}</td>" +
		"<td>{{lname}}</td>" +
		"<td>{{fname}}</td>" +
		"<td>{{mname}}</td>" +
		"<td>{{status}}</td>" +
	"</tr>";

	var no_data = "" +
	"<tr>" +
		"<td></td>" +
		"<td></td>" +
		"<td>No data to be displayed</td>" +
		"<td></td>" +
		"<td></td>" +
	"</tr>";

	$.ajax(
	{
		type: 'POST',
		url: 'data_js/ajax_php/stat_ajax.php',
		data: {section: section},
		success: function(data)
		{
			if(data.length == 11)
			{
				swal("No Students in this Section");
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
