$('#myframe', window.parent.document).width('100%');
		$('#myframe', window.parent.document).height('500px');
		
		
		function myFunction() {
			  // Declare variables 
			var input, filter, table, tr, td, i;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("myTable");
			tr = table.getElementsByTagName("tr");

			// Loop through all table rows, and hide those who don't match the search query
			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[0];
				if (td) {
					if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
					} else {
						tr[i].style.display = "none";
					}
				} 
			}
		}
		
		function changeIFrame(id){
			$('#myframe').attr({ 'src':'chat.php?id='+id });
		}
		
		function changeIFrame2(id,id2){
			window.location.href = "chatroom.php?id="+id;
		}
		
		