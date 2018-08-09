$('#ch').on('change', function()
{
	var sec = $('#ch').val();
	var $div = $('#drop_zone');
	var all_student = "" +
	
	"<div id='{{lrn}}' class='objects' draggable='true' ondragstart='drag_start(event)'>{{lrn}}: {{lname}}, {{fname}} {{mname}}</div>";

	var no_student = "" +
	"<center>"+
	"<h2>No Students in this Section</h2>"+
	"</center>";

	$.ajax(
	{
		type: 'POST',
		url: 'data_js/ajax_php/sel_data_send.php',
		data: {section: sec},
		success: function(data)
		{
			if(data.length == 0)
			{
				$div.html("");
				$div.append(Mustache.render(no_student));
			}
			else
			{
				$div.html("");
				$.each(data, function(i, lrn)
				{
					$div.append(Mustache.render(all_student, lrn))
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

function _(id)
{
	return document.getElementById(id);
}

var droppedIn = false;

function drag_start(event)
{
	event.dataTransfer.dropEffect = "move";
	event.dataTransfer.setData("text", event.target.getAttribute('id'));
}

function add_student(event)
{
	event.preventDefault(); //Prevent undesirable default behavior while dropping
	var lrn = event.dataTransfer.getData("text");
	var get_section = $('#ch').val();
	var $div = $('#drop_zone');

	if(get_section == '--')
	{
		window.alert('Select a Section');
	}
	else
	{
		var data_in = confirm("Do you want to add Student: " + lrn + " to Section: " + get_section + "?");
		if(data_in==true)
		{
			$.ajax(
			{
				type: 'POST',
				url: 'data_js/ajax_php/stu_add_sec.php',
				data: {lrn: lrn, section: get_section},
				success: function(data)
				{
					event.target.appendChild(_(lrn));
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
		}
		else
		{
	
		}
	}
}//end of function

function remove_section(event)
{
	event.preventDefault(); //Prevent undesirable default behavior while dropping
	var lrn = event.dataTransfer.getData("text");
	var $selection = $('#selection');
	var get_section = $('#ch').val();

	var data_out = confirm("Do you want to remove Student: " + lrn + " from Section: " + get_section + "?");
	if(data_out==true)
	{
		$.ajax(
		{
			type: 'POST',
			url: 'data_js/ajax_php/stu_rem_sec.php',
			data: {lrn: lrn, section: get_section},
			success: function(data)
			{
				event.target.appendChild(_(lrn));
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
	}
	else
	{

	}
}

// $('#section').on('change', function()
// {
// 	var stu_list_section = $('#section').val();
// 	var $stu_list_div = $('#data');
// 	var $stu_list_modal = $('');
	
// 	$.ajax(
// 	{
// 		type: 'POST',
// 		url: 'data_js/ajax_php/sel_data_send.php',
// 		data: {section: stu_list_section},
// 		success: function(data)
// 		{
// 			$stu_list_div.html("");
// 		},
// 		error: function(data)
// 		{
// 			window.alert("Request Not sent");
// 		}
// 	})
// });