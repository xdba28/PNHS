<?php
require_once '../Classes/PHPExcel.php';
include_once('../db_con_i.php');
session_start();
include('../func.php');
include('../session.php');

if(!isset($_FILES['sample']['name']))
{
    header('Location: student_list.php');
	break;
}

if(!empty($_FILES['sample']['name']))
{
	$file_type = $_FILES['sample']['type'];
	if($file_type=="application/vnd.ms-excel");
	elseif($file_type=='application/vnd.ms-excel.addin.macroEnabled.12');
	elseif($file_type=='application/vnd.ms-excel.sheet.binary.macroEnabled.12');
	elseif($file_type=='application/vnd.ms-excel.sheet.macroEnabled.12');
	elseif($file_type=='application/vnd.ms-excel.template.macroEnabled.12');
	elseif($file_type=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	else
	{
		?>
		<script>
			alert('Wrong file type submitted!');
			window.location = "student_list.php";
		</script>
		<?php
	}
}
else
{
?>
<script>
    alert('Empty Submittion!');
	window.location = "student_list.php";
</script>
<?php
}
$name = $_FILES['sample']['name']; // excel name
$target_dir = "../excel/Grade Process/";
$target_file = $target_dir . basename($_FILES["sample"]["name"]);      // excel directory + file name
$excel_file_type = pathinfo($target_file,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["sample"]["tmp_name"], $target_file);   // excel save in import directory
$excel_read = PHPExcel_IOFactory::identify($target_file);
$objPHPExcel = PHPExcel_IOFactory::createReader($excel_read); // excel read file
$objPHPExcel->setReadDataOnly(true);
$objPHPExcel = $objPHPExcel->load($target_file);
$stu_worksheet = $objPHPExcel->getSheet(0);                       // load specified sheet

$emp = $_SESSION['user_data']['acct']['emp_no'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css1/style.css">

    <!-- DataTables CSS -->
    <link href="../Template%20(reference)/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../Template%20(reference)/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../Template%20(reference)/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    
    <!-- Custom Fonts -->
    <link href="../Template%20(reference)/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/red.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="../css/backToTop.css">

    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
</head>

<body>
<?php include("../topnav.php"); ?>   
	<div id="wrapper" style="padding-top:60px">
            <?php include("../sidenav.php"); ?>

<div class="container" style="background:rga(0,0,0,0.5)"></div>

<div id="main">

<?php
$excel_temp = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('A' . '1')->getCalculatedValue()));

if($excel_temp == 'PAGASA GRADE FORM')
{
?>
    <div class="container">
		<h1 class="page-header w3-center">Grade Import Validation</h1>
		<div id="warning" align="center" style="visibility:hidden" class="alert alert-warning">
			<h1>Warning!!!</h1>
			<h5 id="notice"></h5>
		</div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
             
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead class="w3-theme-bl1">
<?php
}
elseif($excel_temp == "Report on Learner\'s Observed Values")
{
	?>
    <div class="container">
		<h1 class="page-header w3-center">Core Values Import Validation</h1>
		<div id="warning" align="center" style="visibility:hidden" class="alert alert-warning">
			<h1>Warning!!!</h1>
			<h5 id="notice"></h5>
		</div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
             
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-bordered table-striped table-hover" id="dataTables-example">
                            <thead class="w3-theme-bl1">
	<?php
}

if($excel_temp == 'PAGASA GRADE FORM')
{
?>

<script>
	var mirror = 0, empty_name = 0, empty_grade = 0, empty_remark = 0;
	var empty_sec = 0, empty_sub = 0, empty_qua = 0, empty_sy = 0;
	var empty_month = 0, empty_attendance = 0, empty_lrn=0;
	var _Nsy = 0, lrn_not = 0;
	var db_GS_error = 0, db_sy_error = 0, db_sub_error = 0;
	var db_sub_Nexist = 0, db_GS_Nexist =0;
	var lrn_wrong_sec = 0;
	var notice_div = document.getElementById('notice');
</script>

<?php


	$empty_month=0;
	$lrn_empty=0;
	$array_readGrade = array();

	$grade_sec = $stu_worksheet->getCell('D' . '1')->getCalculatedValue();
	$subject = $stu_worksheet->getCell('D' . '2')->getCalculatedValue();
	$quarter = $stu_worksheet->getCell('D' . '3')->getCalculatedValue();
	$sy = $stu_worksheet->getCell('D' . '4')->getCalculatedValue();
	if($quarter != 'Final' && $quarter != 'Average')
	{
		$_1stM = $stu_worksheet->getCell('E' . '4')->getCalculatedValue();
		$_2ndM = $stu_worksheet->getCell('G' . '4')->getCalculatedValue();
		$_3rdM = $stu_worksheet->getCell('I' . '4')->getCalculatedValue();	
	}

	if(empty($sy))
	{
		?>
		<script>
			empty_sy++;
			var error_notice_sy = document.createTextNode("School Year not seleted in Document");
			var line_break = document.createElement("BR");
			var line_break2 = document.createElement("BR");
			notice_div.appendChild(error_notice_sy);
			notice_div.appendChild(line_break);
			notice_div.appendChild(line_break2);
		</script>
		<?php
	}
	elseif(!empty($sy))
	{
		$get_active_sy = $mysqli->query("SELECT status FROM css_school_yr WHERE year = '$sy'")
									or die("<script>
											db_sy_error++;
											alert('Error fetching active school year');
											</script>");

		$res = $get_active_sy->fetch_assoc();
		$status = $res['status'];

		if($status != 'active')
		{
			?>
			<script>
				_Nsy++;
				var error_notice_not_active= document.createTextNode("School Year selected is not active");
				var line_break = document.createElement("BR");
				var line_break2 = document.createElement("BR");
				notice_div.appendChild(error_notice_not_active);
				notice_div.appendChild(line_break);
				notice_div.appendChild(line_break2);
			</script>
			<?php
		}
	}

	if(empty($grade_sec))
	{
		?>
		<script>
			empty_sec++;
			var error_notice_grade_sec= document.createTextNode("Grade Level & Section not seleted in Document");
			var line_break = document.createElement("BR");
			var line_break2 = document.createElement("BR");
			notice_div.appendChild(error_notice_grade_sec);
			notice_div.appendChild(line_break);
			notice_div.appendChild(line_break2);
		</script>
		<?php
	}
	elseif(!empty($grade_sec))
	{
		$trim_G_S = trim($grade_sec," ");
		$ex = explode("-", $trim_G_S);

		$get_subject = $mysqli->query("SELECT section_name, year_level FROM css_section, css_school_yr
										WHERE css_section.sy_id = css_school_yr.sy_id
										AND section_name = '$ex[1]' AND year_level = '$ex[0]'
										AND status = 'active'")
									or die("<script>
											db_GS_error++;
											alert('Error fetching Grade Level & Section');
											</script>");
		$res = $get_subject->fetch_assoc();
		
		if($res['year_level'] != $ex[0] && $res['section_name'] != $ex[1])
		{
			?>
			<script>
				db_GS_Nexist++;
				var error_notice_GS_Nexist= document.createTextNode("Grade Level & Section does not exist");
				var line_break = document.createElement("BR");
				var line_break2 = document.createElement("BR");
				notice_div.appendChild(error_notice_GS_Nexist);
				notice_div.appendChild(line_break);
				notice_div.appendChild(line_break2);
			</script>
			<?php
		}


	}

	if(empty($subject) && $quarter != 'Final')
	{
		?>
		<script>
			empty_sub++;
			var error_notice_subject = document.createTextNode("Subject not seleted in Document");
			var line_break = document.createElement("BR");
			var line_break2 = document.createElement("BR");
			notice_div.appendChild(error_notice_subject);
			notice_div.appendChild(line_break);
			notice_div.appendChild(line_break2);
		</script>
		<?php
	}
	elseif(!empty($subject))
	{
		$get_subject = $mysqli->query("SELECT sub_desc FROM css_subject WHERE sub_desc = '$subject'")
							or die("<script>
									db_sub_error++
									alert('Error fetching subject');
									</script>");

		$res = $get_subject->fetch_assoc();
		//if existing subject
		if($res['sub_desc'] != $subject)
		{
			?>
			<script>
				$db_sub_Nexist++;
				var error_notice_subject = document.createTextNode("Subject not does not exist");
				var line_break = document.createElement("BR");
				var line_break2 = document.createElement("BR");
				notice_div.appendChild(error_notice_subject);
				notice_div.appendChild(line_break);
				notice_div.appendChild(line_break2);
			</script>
			<?php
		}
	}

	if(empty($quarter))
	{
		?>
		<script>
			empty_qua++;
			var error_notice_qua = document.createTextNode("Quarter not seleted in Document");
			var line_break = document.createElement("BR");
			var line_break2 = document.createElement("BR");
			notice_div.appendChild(error_notice_qua);
			notice_div.appendChild(line_break);
			notice_div.appendChild(line_break2);
		</script>
		<?php
	}

	if(!empty($quarter))
	{
		if($quarter != 'Final' && $quarter != 'Average')
		{
			if($quarter == '1st' || $quarter == '3rd')
			{
				if(empty($_1stM) || empty($_2ndM) || empty($_3rdM))
				{
					$empty_month=1;
				// 	?>
				 	<script>
				// 		empty_month++;
				// 		var quar = '<?php 
				// echo $quarter;?>';
				// 		var error_notice_month = document.createTextNode(quar + " quarter has an empty month");
				// 		var line_break = document.createElement("BR");
				// 		var line_break2 = document.createElement("BR");
				// 		notice_div.appendChild(error_notice_month);
				// 		notice_div.appendChild(line_break);
				// 		notice_div.appendChild(line_break2);
				// 	</script>
				 	<?php
				}
			}
			elseif($quarter == '2nd' || $quarter == '4th')
			{
				if(empty($_1stM) || empty($_2ndM))
				{
					$empty_month=1;
				// 	?>
				 	<script>
				// 		empty_month++;
				// 		var quar = '<?php 
				// echo $quarter;?>';
				// 		var error_notice_month = document.createTextNode(quar + " quarter has an empty month");
				// 		var line_break = document.createElement("BR");
				// 		var line_break2 = document.createElement("BR");
				// 		notice_div.appendChild(error_notice_month);
				// 		notice_div.appendChild(line_break);
				// 		notice_div.appendChild(line_break2);
				// 	</script>
				 	<?php
				}
			}
		}
	}

	foreach($stu_worksheet->getRowIterator() as $row)
	{
		$rowIndex = $row->getRowIndex();
		if($rowIndex==1||$rowIndex==2||$rowIndex==3||$rowIndex==4||$rowIndex==5)continue;

		if(empty($stu_worksheet->getCell('A' . $rowIndex)->getCalculatedValue())) $lrn_empty++;
		$array_readGrade[$rowIndex] = array('lrn'=>$stu_worksheet->getCell('A' . $rowIndex)->getCalculatedValue(),
											'Student Name'=>$stu_worksheet->getCell('B' . $rowIndex)->getCalculatedValue(),
											'Grade'=>$stu_worksheet->getCell('C' . $rowIndex)->getCalculatedValue(),
											'Remark'=>$stu_worksheet->getCell('D' . $rowIndex)->getCalculatedValue(),
											'1st Present'=>$stu_worksheet->getCell('E' . $rowIndex)->getCalculatedValue(),
											'1st Absent'=>$stu_worksheet->getCell('F' . $rowIndex)->getCalculatedValue(),
											'2nd Present'=>$stu_worksheet->getCell('G' . $rowIndex)->getCalculatedValue(),
											'2nd Absent'=>$stu_worksheet->getCell('H' . $rowIndex)->getCalculatedValue(),
											'3rd Present'=>$stu_worksheet->getCell('I' . $rowIndex)->getCalculatedValue(),
											'3rd Absent'=>$stu_worksheet->getCell('J' . $rowIndex)->getCalculatedValue());		
	}

	if($lrn_empty>0)
	{
		?>
		<script>
			var empty_lrn = '<?php echo $lrn_empty;?>';
			var error_notice_empty_lrn = document.createTextNode(empty_lrn + " empty LRN in Document");
			var line_break = document.createElement("BR");
			var line_break2 = document.createElement("BR");
			notice_div.appendChild(error_notice_empty_lrn);
			notice_div.appendChild(line_break);
			notice_div.appendChild(line_break2);
		</script>
		<?php
	}
?>
                                <tr>
                                    <th>#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th>LRN</th>
                                    <th>Student Name</th>
                                    <th>Grade Level & Section</th>
                                    <th>Subject</th>
                                    <th>Quarter</th>
                                    <th>School Year</th>
                                    <th>Grade</th>
                                    <th>Remark</th>

                            <?php
								//if adviser
						if($quarter != 'Final' && $quarter != 'Average')
						{
							if($empty_month!=1)
							{
								if($quarter == '1st' || $quarter == '3rd')
								{
									echo '
									<th>Days present in ' . $_1stM . '<br>
									<th>Days absent in ' . $_1stM . '<br>
									<th>Days present in ' . $_2ndM . '<br>
									<th>Days absent in ' . $_2ndM . '<br>
									<th>Days present in ' . $_3rdM . '<br>
									<th>Days absent in ' . $_3rdM . '<br>';
								}
								elseif($quarter == '2nd' || $quarter == '4th')
								{
									echo '
									<th>Days present in ' . $_1stM . '<br>
									<th>Days absent in ' . $_1stM . '<br>
									<th>Days present in ' . $_2ndM . '<br>
									<th>Days absent in ' . $_2ndM . '<br>';
								}
							}
						}
							?>
                                </tr>
                            </thead>
                            <tbody>

<?php

$first_occur = 0;
$second_occur = 0;
$dupli_count = 0;

foreach($array_readGrade as $dbcheck)
{
	$lrn = $dbcheck['lrn'];

	$val_stu = $mysqli->query("SELECT lrn FROM sis_student WHERE lrn = '$lrn'")
					or die("<script>alert('Error fetching lrn');</script>");

	$res = $val_stu->fetch_assoc();

	// find unexisting data
	if($res['lrn'] == '')
	{
		?>
		<script>
			lrn_not++;
			var lrn_db = <?php echo $lrn;?>;
			var error_notice_lrn_db = document.createTextNode(lrn_db + ": LRN does not exist in Database");
			var line_break = document.createElement("BR");
			var line_break2 = document.createElement("BR");
			notice_div.appendChild(error_notice_lrn_db);
			notice_div.appendChild(line_break);
			notice_div.appendChild(line_break2);
		</script>
		<?php
	}

	if(!empty($grade_sec) && !empty($sy))
	{
		$GS_ex = explode("-", $grade_sec);
		$select_GRD_SEC_SY = $mysqli->query("SELECT lrn, year FROM sis_stu_rec, css_section, css_school_yr
											WHERE sis_stu_rec.section_id = css_section.SECTION_ID
											AND sis_stu_rec.sy_id = css_school_yr.sy_id
											AND css_school_yr.status = 'active'
											AND lrn = '$lrn'
											AND css_section.SECTION_NAME = '$GS_ex[1]'
											AND css_section.YEAR_LEVEL = '$GS_ex[0]'")
									or die("Error in checking section and school year");

		$res = $select_GRD_SEC_SY->fetch_assoc();
		if($res['lrn'] != $lrn && $res['year'] != $sy)
		{
			?>
			<script>
				lrn_wrong_sec++;
				var lrn_wrong = <?php echo $lrn;?>;
				var error_notice_lrn_wrong_sec = document.createTextNode(lrn_wrong + ": LRN does not belong to this section");
				var line_break = document.createElement("BR");
				var line_break2 = document.createElement("BR");
				notice_div.appendChild(error_notice_lrn_wrong_sec);
				notice_div.appendChild(line_break);
				notice_div.appendChild(line_break2);
			</script>
			<?php
		}			
		
	}
}

foreach($array_readGrade as $reference)
{
    foreach($array_readGrade as $check)
    {
        // echo 'Step 1 -> ' . $reference['lrn'] . " | " . $check['lrn'] . "<br>";
        $lrn = $reference['lrn'];
        if(in_array($lrn, $check, true) && $first_occur == 0)
        {
            $first_occur = 1;
            // echo 'Step 2 -> First duplicate<br>';
            continue;
        }

        // echo 'Step 3 -> Dupli count: ' . $first_occur . '<br>';

        if(in_array($lrn, $check, true) && $first_occur == 1)
        {
			$first_occur = 0;
			$check_lrn = $reference['lrn'];
			// $array_check[$dupli_count] = array('lrn'=>$lrn);
			// $dupli_count++;
            // echo "Step 4 -> Second duplicate ----------------------------------<br>";
            ?>
            <script>
			    mirror++;
                var lrn = <?php echo $check_lrn;?>;
				var error_notice_lrn = document.createTextNode(lrn + ": LRN duplicate in Document");
				var line_break = document.createElement("BR");
				var line_break2 = document.createElement("BR");
                notice_div.appendChild(error_notice_lrn);
				notice_div.appendChild(line_break);
				notice_div.appendChild(line_break2);
	           </script>
		   <?php
			// echo 'Step 3 -> Dupli count: ' . $first_occur . '<br>';
        	// echo 'Duplicate LRN: ' . $check_lrn . ' in Document<br>';
		}
		$first_occur = 0;
	}

	if(empty($reference['Student Name']))
	{
		$name_check = $reference['lrn'];
		?>
		<script>
			empty_name++;
			var lrn_name = <?php echo $name_check;?>;
			var error_notice_name = document.createTextNode(lrn_name + ": LRN has no Name");
			var line_break = document.createElement("BR");
			var line_break2 = document.createElement("BR");
			notice_div.appendChild(error_notice_sec);
			notice_div.appendChild(line_break);
			notice_div.appendChild(line_break2);
		</script>
		<?php
	}

	if(empty($reference['Grade']))
	{
		$grade_check = $reference['lrn'];
		?>
		<script>
			empty_grade++;
			var lrn_grade = <?php echo $grade_check;?>;
			var error_notice_grade = document.createTextNode(lrn_grade + ": LRN has no Grade");
			var line_break = document.createElement("BR");
			var line_break2 = document.createElement("BR");
			notice_div.appendChild(error_notice_grade);
			notice_div.appendChild(line_break);
			notice_div.appendChild(line_break2);
		</script>
		<?php
	}

	if(empty($reference['Remark']))
	{
		$remark_check = $reference['lrn'];
		?>
		<script>
			empty_remark++;
			var lrn_remark = <?php echo $remark_check;?>;
			var error_notice_grade = document.createTextNode(lrn_remark + ": LRN has no Remark");
			var line_break = document.createElement("BR");
			var line_break2 = document.createElement("BR");
			notice_div.appendChild(error_notice_grade);
			notice_div.appendChild(line_break);
			notice_div.appendChild(line_break2);
		</script>
		<?php
	}
	// if($empty_month!=1)
	// {
		// if($quarter != 'Final' && $quarter != 'Average')
		// {
		// 	if($quarter == '1st' || $quarter == '3rd')
		// 	{
		// 		if(empty($_1stM) || empty($_2ndM) || empty($_3rdM))
		// 		{
		// 			?>
		 			<script>
		// 				empty_attendance++;
		// 				var quar = '<?php 
		// echo $quarter;?>';
		// 				var error_notice_month = document.createTextNode(quar + " attendance as an empty value");
		// 				var line_break = document.createElement("BR");
		// 				var line_break2 = document.createElement("BR");
		// 				notice_div.appendChild(error_notice_month);
		// 				notice_div.appendChild(line_break);
		// 				notice_div.appendChild(line_break2);
		// 			</script>
		 			<?php
		// 		}
		// 	}
		// 	elseif($quarter == '2nd' || $quarter == '4th')
		// 	{
		// 		if(empty($_1stM) || empty($_2ndM))
		// 		{
		// 			?>
					<script>
		// 				empty_attendance++;
		// 				var quar = '<?php 
		// echo $quarter;?>';
		// 				var error_notice_month = document.createTextNode(quar + " attendance as an empty value");
		// 				var line_break = document.createElement("BR");
		// 				var line_break2 = document.createElement("BR");
		// 				notice_div.appendChild(error_notice_month);
		// 				notice_div.appendChild(line_break);
		// 				notice_div.appendChild(line_break2);
		// 			</script>
		 			<?php
		// 		}
		// 	}
		// }
	// }
}

foreach($stu_worksheet->getRowIterator() as $row)
{
	$rowIndex = $row->getRowIndex();
	if($rowIndex==1||$rowIndex==2||$rowIndex==3||$rowIndex==4||$rowIndex==5)continue;
	echo '<tr>
			<td></td>
	<td>' . $stu_worksheet->getCell('A' . $rowIndex)->getCalculatedValue() . '</td>
	<td>' . $stu_worksheet->getCell('B' . $rowIndex)->getCalculatedValue() . '</td>
	<td>' . $stu_worksheet->getCell('D' . '1')->getCalculatedValue() . '</td>
	<td>' . $stu_worksheet->getCell('D' . '2')->getCalculatedValue() . '</td>
	<td>' . $stu_worksheet->getCell('D' . '3')->getCalculatedValue() . '</td>
	<td>' . $stu_worksheet->getCell('D' . '4')->getCalculatedValue() . '</td>
	<td>' . $stu_worksheet->getCell('C' . $rowIndex)->getCalculatedValue() . '</td>
	<td>' . $stu_worksheet->getCell('D' . $rowIndex)->getCalculatedValue() . '</td>';

	if($empty_month!=1)
	{
		if(!empty($quarter))
		{
			if($quarter != 'Final' && $quarter != 'Average')
			{
				if($quarter == '1st' || $quarter == '3rd')
				{
					echo '
					<td>' . $stu_worksheet->getCell('E' . $rowIndex)->getCalculatedValue() . '</td>
					<td>' . $stu_worksheet->getCell('F' . $rowIndex)->getCalculatedValue() . '</td>
					<td>' . $stu_worksheet->getCell('G' . $rowIndex)->getCalculatedValue() . '</td>
					<td>' . $stu_worksheet->getCell('H' . $rowIndex)->getCalculatedValue() . '</td>
					<td>' . $stu_worksheet->getCell('I' . $rowIndex)->getCalculatedValue() . '</td>
					<td>' . $stu_worksheet->getCell('J' . $rowIndex)->getCalculatedValue() . '</td>';
				}
				elseif($quarter == '2nd' || $quarter == '4th')
				{
					echo '
					<td>' . $stu_worksheet->getCell('E' . $rowIndex)->getCalculatedValue() . '</td>
					<td>' . $stu_worksheet->getCell('F' . $rowIndex)->getCalculatedValue() . '</td>
					<td>' . $stu_worksheet->getCell('G' . $rowIndex)->getCalculatedValue() . '</td>
					<td>' . $stu_worksheet->getCell('H' . $rowIndex)->getCalculatedValue() . '</td>';
				}
			}
		}
	}
	echo '</tr>';
}

?>
                            </tbody>
                        </table>
                        <center>

                        <form action="process/grade_process.php" method="post" enctype="multipart/form-data">

                        <input type="hidden" id="file" name="file" value="<?php echo $name;?>">
                        <button id="vutton" type="submit" class="btn w3-hover-green btn-success w3-card-2">
                        <i class="fa fa-check">
                        </i>&nbsp;&nbsp;Submit&nbsp;</button>
                        <form>

                        <a href="process/grade_file_del.php?f=<?php echo base64_encode($name);?>">
                        <button type="button" class="btn w3-hover-red w3-theme-rl1 w3-card-2">
                        <i class="fa fa-close"></i>&nbsp;&nbsp;Cancel&nbsp;
                        </button></a>
						</center>
						

			<script>
				console.log("mirror-> " + mirror + " empty_name-> " + empty_name + " empty_grade-> " + empty_grade);
				console.log("empty_remark-> " + empty_remark + " empty_sub-> " + empty_sub + " empty_qua-> " + empty_qua + " empty_sy-> " + empty_sy);
				console.log("empty_sec-> " + empty_sec + " empty_month-> " + empty_month + " _Nsy-> " + _Nsy);
				//if adviser
                if(mirror>0 || empty_name>0 || empty_grade>0 || empty_remark>0 || empty_sub>0 || empty_qua>0 || empty_sy>0 || empty_sec>0 || empty_month>0 || empty_attendance>0 || _Nsy>0 || lrn_not>0 || db_GS_error>0 || db_sy_error>0 || db_GS_Nexist>0 || db_sub_error>0 || db_sub_Nexist>0 || empty_lrn>0 || lrn_wrong_sec>0)
                {
                    document.getElementById('warning').style.visibility = 'visible';
                    document.getElementById('vutton').disabled = true;
					document.getElementById('vutton').setAttribute('title', "Cannot Submit due to error(s)");
                }
            </script>
<?php
}
elseif($excel_temp == "Report on Learner\'s Observed Values")
{
?>
<script>
	var mirror = 0, empty_name = 0, empty_grade = 0, empty_remark = 0;
	var empty_sec = 0, empty_sub = 0, empty_qua = 0, empty_sy = 0;
	var empty_month = 0, empty_attendance = 0, empty_lrn=0;
	var _Nsy = 0, lrn_not = 0;
	var db_GS_error = 0, db_sy_error = 0, db_sub_error = 0;
	var db_sub_Nexist = 0, db_GS_Nexist =0;
	var lrn_wrong_sec = 0;
	var notice_div = document.getElementById('notice');
</script>
<?php
	
	$array_cv = array();
	$grade_sec = $stu_worksheet->getCell('M' . '2')->getCalculatedValue();
	$quarter = $stu_worksheet->getCell('M' . '3')->getCalculatedValue();
	$sy = $stu_worksheet->getCell('M' . '4')->getCalculatedValue();

	foreach($stu_worksheet->getRowIterator() as $row)
	{
		$rowIndex = $row->getRowIndex();
		if($rowIndex==1||$rowIndex==2||$rowIndex==3||$rowIndex==4||$rowIndex==5)continue;

		if(empty($stu_worksheet->getCell('A' . $rowIndex)->getCalculatedValue()))
		$array_cv[$rowIndex] = array('lrn'=>$stu_worksheet->getCell('A' . $rowIndex)->getCalculatedValue(),
										'Student Name'=>$stu_worksheet->getCell('B' . $rowIndex)->getCalculatedValue(),
										'cv_1_1'=>$stu_worksheet->getCell('C' . $rowIndex)->getCalculatedValue(),
										'cv_1_2'=>$stu_worksheet->getCell('D' . $rowIndex)->getCalculatedValue(),
										'cv_2_1'=>$stu_worksheet->getCell('E' . $rowIndex)->getCalculatedValue(),
										'cv_2_2'=>$stu_worksheet->getCell('F' . $rowIndex)->getCalculatedValue(),
										'cv_3'=>$stu_worksheet->getCell('G' . $rowIndex)->getCalculatedValue(),
										'cv_4_1'=>$stu_worksheet->getCell('H' . $rowIndex)->getCalculatedValue(),
										'cv_4_2'=>$stu_worksheet->getCell('I' . $rowIndex)->getCalculatedValue());
	}

	if(empty($quarter))
	{
		?>
		<script>
			empty_qua++;
			var error_notice_qua = document.createTextNode("Quarter not seleted in Document");
			var line_break = document.createElement("BR");
			var line_break2 = document.createElement("BR");
			notice_div.appendChild(error_notice_qua);
			notice_div.appendChild(line_break);
			notice_div.appendChild(line_break2);
		</script>
		<?php
	}

				?>
							<tr>
								<th>#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th>LRN</th>
								<th>Student Name</th>
								<th>Grade Level & Section</th>
								<th>Quarter</th>
								<th>School Year</th>
								<th>Maka-Diyos: Belief</th>
								<th>Maka-Diyos: Truth</th>
								<th>Makatao: Senitivity</th>
								<th>Makatao: Solidarity</th>
								<th>Makakalikasan</th>
								<th>Makabansa: Citizen</th>
								<th>Makabansa: Community</th>
							</tr>

                            </thead>
                            <tbody>
				<?php


	foreach($stu_worksheet->getRowIterator() as $row)
	{
		$rowIndex = $row->getRowIndex();
		if($rowIndex==1||$rowIndex==2||$rowIndex==3||$rowIndex==4||$rowIndex==5)continue;
		echo '<tr>
				<td></td>
		<td>' . $stu_worksheet->getCell('A' . $rowIndex)->getCalculatedValue() . '</td>
		<td>' . $stu_worksheet->getCell('B' . $rowIndex)->getCalculatedValue() . '</td>
		<td>' . $stu_worksheet->getCell('M' . '2')->getCalculatedValue() . '</td>
		<td>' . $stu_worksheet->getCell('M' . '3')->getCalculatedValue() . '</td>
		<td>' . $stu_worksheet->getCell('M' . '4')->getCalculatedValue() . '</td>
		<td>' . $stu_worksheet->getCell('C' . $rowIndex)->getCalculatedValue() . '</td>
		<td>' . $stu_worksheet->getCell('D' . $rowIndex)->getCalculatedValue() . '</td>
		<td>' . $stu_worksheet->getCell('E' . $rowIndex)->getCalculatedValue() . '</td>
		<td>' . $stu_worksheet->getCell('F' . $rowIndex)->getCalculatedValue() . '</td>
		<td>' . $stu_worksheet->getCell('G' . $rowIndex)->getCalculatedValue() . '</td>
		<td>' . $stu_worksheet->getCell('H' . $rowIndex)->getCalculatedValue() . '</td>
		<td>' . $stu_worksheet->getCell('I' . $rowIndex)->getCalculatedValue() . '</td>
		</tr>';
	}
			?>
                            </tbody>
                        </table>
                        <center>

                        <form action="process/grade_process.php" method="post" enctype="multipart/form-data">

                        <input type="hidden" id="file" name="file" value="<?php echo $name;?>">
                        <button id="vutton" type="submit" class="btn w3-hover-green btn-success w3-card-2">
                        <i class="fa fa-check">
                        </i>&nbsp;&nbsp;Submit&nbsp;</button>
                        <form>

                        <a href="process/grade_file_del.php?f=<?php echo base64_encode($name);?>">
                        <button type="button" class="btn w3-hover-red w3-theme-rl1 w3-card-2">
                        <i class="fa fa-close"></i>&nbsp;&nbsp;Cancel&nbsp;
                        </button></a>
						</center>

				<script>
				console.log("mirror-> " + mirror + " empty_name-> " + empty_name + " empty_grade-> " + empty_grade);
				console.log("empty_remark-> " + empty_remark + " empty_sub-> " + empty_sub + " empty_qua-> " + empty_qua + " empty_sy-> " + empty_sy);
				console.log("empty_sec-> " + empty_sec + " empty_month-> " + empty_month + " _Nsy-> " + _Nsy);
				//if adviser
                if(mirror>0 || empty_name>0 || empty_grade>0 || empty_remark>0 || empty_sub>0 || empty_qua>0 || empty_sy>0 || empty_sec>0 || empty_month>0 || empty_attendance>0 || _Nsy>0 || lrn_not>0 || db_GS_error>0 || db_sy_error>0 || db_GS_Nexist>0 || db_sub_error>0 || db_sub_Nexist>0 || empty_lrn>0 || lrn_wrong_sec>0)
                {
                    document.getElementById('warning').style.visibility = 'visible';
                    document.getElementById('vutton').disabled = true;
					document.getElementById('vutton').setAttribute('title', "Cannot Submit due to error(s)");
                }
				</script>

			<?php	
}
?>

                        </center>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
	</div>

    
<!-- jQuery -->
<script src="../Template%20(reference)/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../Template%20(reference)/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../Template%20(reference)/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="../Template%20(reference)/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../Template%20(reference)/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../Template%20(reference)/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../Template%20(reference)/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>
</div>
</div>
<?php include('../footer.php');?>
</body>
</html>