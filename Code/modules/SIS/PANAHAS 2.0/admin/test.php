<?php include("../db_con_i.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>TEST FIELD</title>

</head>
<body>


	<select id="ch" name="ch">
		<option>--</option>
		<?php
		
		$get_section = $mysqli->query("SELECT SECTION_NAME, YEAR_LEVEL FROM css_section")
								or die("Error get_section: " . $mysqli->error);
			
			while($row = $get_section->fetch_array())
			{
				echo
				"<option value=". $row['YEAR_LEVEL'] . "-" . $row['SECTION_NAME'] . ">". $row['YEAR_LEVEL'] . "-" . $row['SECTION_NAME'] . "</option>";
			}

		?>
	</select>
	
	<div id="echo"></div>

	<script src="../jquery.min.js"></script>
	<script src="sample_script.js"></script>
</body>
</html>