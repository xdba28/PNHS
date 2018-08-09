<?php
require_once '../PHPExcel/Classes/PHPExcel.php'; // including of PHPExcel library
include('../db_con_i.php');
session_start();
include("../func.php");
include("../session.php");

// checking of correct file type submitted which need to be ".xlsx" format

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

// you can copy these PHP copy
// COPY START ~

$name = $_FILES['sample']['name']; // excel name


//replace this value for your directory
$target_dir = "../excel/Add Student/"; // excel directory to save files



$target_file = $target_dir . basename($_FILES["sample"]["name"]);      // excel directory + file name

$excel_file_type = pathinfo($target_file,PATHINFO_EXTENSION); // file path information  (not used though)

move_uploaded_file($_FILES["sample"]["tmp_name"], $target_file);   // excel save in import directory

$excel_read = PHPExcel_IOFactory::identify($target_file);

$objPHPExcel = PHPExcel_IOFactory::createReader($excel_read);

$objPHPExcel->setReadDataOnly(true);

$objPHPExcel = $objPHPExcel->load($target_file); // loading of file to read

$stu_worksheet = $objPHPExcel->getSheet(0); // load specified sheet (first work sheet)

// COPY END ~

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
<?php include('../topnav.php');?>
<div id="wrapper" style="padding-top:60px">
	<?php include('../sidenav.php');?>
	<div class="container" style="background:rga(0,0,0,0.5)"></div>

<div id="main">

    
    <div class="container">
		<h1 class="page-header w3-center">Add Student Validation</h1>

		<!-- Hidden Warning notification -->
        <div id="warning" align="center" style="visibility:hidden" class="alert alert-warning">
            <h1>Warning!!!</h1>
            <div id="warning_data" align="center" style="visibility:hidden">
                <h5 id="notice"></h5>
            </div>
		</div>
		<!-- Hidden Warning notification -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
            
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-bordered table-striped table-hover" id="dataTables-example">
                            <thead class="w3-theme-bl1">
                                <tr>
                                    <th>#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th>LRN</th>
                                    <th>Firstname</th>
                                    <th>Middlename</th>
                                    <th>Lastname</th>
                                    <th>Birthday</th>
                                    <th>Place of Birth</th>
                                    <th>Gender</th>
                                    <th>Religion</th>
                                    <th>Mother Tongue</th>
                                    <th>Ethnic</th>
                                    <th>Status</th>
                                    <th>Contact</th>
									<th>Elementary School</th>
                                    <th>House Number</th>
                                    <th>Street</th>
                                    <th>Barangay</th>
                                    <th>Municipality</th>
                                    <th>Grade Level & Section</th>
                                    <th>School Year</th>
                                    <th>Date Enrolled</th>
                                    <th>Accelarated</th>
                                    <th>CCT recepient</th>
                                    <th>Father's First name</th>
                                    <th>Father's Middle name</th>
									<th>Father's Last name</th>
									<th>Father's Occupation</th>
                                    <th>Mother's First name</th>
                                    <th>Mother's Middle name</th>
									<th>Mother's Last name</th>
									<th>Mother's Occupation</th>
                                    <th>Guardian's First name</th>
                                    <th>Guardian's Middle name</th>
                                    <th>Guardian's Last name</th>
                                    <th>Guardian Relationship</th>
                                    <th>Father's Contact Num</th>
                                    <th>Mother's Contact Num</th>
                                    <th>Guardian's Contact Num</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php

// LOOP to store data for error checking purposes

$array_readData = array();

foreach ($stu_worksheet->getRowIterator() as $row)
{
    if(1 == $row->getRowIndex()) continue; // skipping row header RowIndex starts at 1
	$rowIndex = $row->getRowIndex();
	
    $array_readData[$rowIndex] = array(
		'lrn'=>$stu_worksheet->getCell('A' . $rowIndex)->getCalculatedValue(),
		'First name'=>$stu_worksheet->getCell('B' . $rowIndex)->getCalculatedValue(),
		'Middle name'=>$stu_worksheet->getCell('C' . $rowIndex)->getCalculatedValue(),
		'Last name'=>$stu_worksheet->getCell('D' . $rowIndex)->getCalculatedValue(),
		'Birthday'=>$stu_worksheet->getCell('E' . $rowIndex)->getCalculatedValue(),
		'Place of Birth'=>$stu_worksheet->getCell('F' . $rowIndex)->getCalculatedValue(),
		'Gender'=>$stu_worksheet->getCell('G' . $rowIndex)->getCalculatedValue(),
		'Religion'=>$stu_worksheet->getCell('H' . $rowIndex)->getCalculatedValue(),
		'Mother Tounge'=>$stu_worksheet->getCell('I' . $rowIndex)->getCalculatedValue(),
		'Ethnic'=>$stu_worksheet->getCell('J' . $rowIndex)->getCalculatedValue(),
		'Status'=>$stu_worksheet->getCell('K' . $rowIndex)->getCalculatedValue(),
		'Contact'=>$stu_worksheet->getCell('L' . $rowIndex)->getCalculatedValue(),
		'House Number'=>$stu_worksheet->getCell('M' . $rowIndex)->getCalculatedValue(),
		'Street'=>$stu_worksheet->getCell('N' . $rowIndex)->getCalculatedValue(),
		'Barangay'=>$stu_worksheet->getCell('O' . $rowIndex)->getCalculatedValue(),
		'Municipality'=>$stu_worksheet->getCell('P' . $rowIndex)->getCalculatedValue(),
		'Year Level & Section'=>$stu_worksheet->getCell('Q' . $rowIndex)->getCalculatedValue(),
		'School Year'=>$stu_worksheet->getCell('R' . $rowIndex)->getCalculatedValue(),
		'Data Enrolled'=>$stu_worksheet->getCell('S' . $rowIndex)->getCalculatedValue(),
		'Accelarated'=>$stu_worksheet->getCell('T' . $rowIndex)->getCalculatedValue(),
		'CCT Recepient'=>$stu_worksheet->getCell('U' . $rowIndex)->getCalculatedValue(),
		'Father\'s First name'=>$stu_worksheet->getCell('V' . $rowIndex)->getCalculatedValue(),
		'Father\'s Middle name'=>$stu_worksheet->getCell('W' . $rowIndex)->getCalculatedValue(),
		'Father\'s Last name'=>$stu_worksheet->getCell('X' . $rowIndex)->getCalculatedValue(),
		'Father\'s Occupation'=>$stu_worksheet->getCell('Y' . $rowIndex)->getCalculatedValue(),
		'Mother\'s First name'=>$stu_worksheet->getCell('Y' . $rowIndex)->getCalculatedValue(),
		'Mother\'s Middle name'=>$stu_worksheet->getCell('Z' . $rowIndex)->getCalculatedValue(),
		'Mother\'s Last name'=>$stu_worksheet->getCell('AA' . $rowIndex)->getCalculatedValue(),
		'Guardian\'s First name'=>$stu_worksheet->getCell('AB' . $rowIndex)->getCalculatedValue(),
		'Guardian\'s Middle name'=>$stu_worksheet->getCell('AC' . $rowIndex)->getCalculatedValue(),
		'Guardian\'s Last name'=>$stu_worksheet->getCell('AD' . $rowIndex)->getCalculatedValue(),            
		'Guardian Relationship'=>$stu_worksheet->getCell('AE' . $rowIndex)->getCalculatedValue(),
		'Father\'s Contact'=>$stu_worksheet->getCell('AF' . $rowIndex)->getCalculatedValue(),
		'Mother\'s Contact'=>$stu_worksheet->getCell('AG' . $rowIndex)->getCalculatedValue(),
		'Guardian\'s Contact'=>$stu_worksheet->getCell('AH' . $rowIndex)->getCalculatedValue());
}
// END of loop

$dupli_count=0;

?>
<script>
    var mirror = 0, empty_sec = 0, empty_sy = 0, db_lrn = 0, empty_place = 0, empty_birth = 0;
	var notice_div = document.getElementById('notice');
</script>
<?php


// ---- START OF LOOP for error checking --------------------------------------------------->>>>>>>>>

// using javascript for dynamic HTML content creation
					
// Database duplicate checking
// echoes for error checking
foreach($array_readData as $lrn_db_check)
{
	$docu_check = $lrn_db_check['lrn'];

	$get_students = $mysqli->query("SELECT lrn FROM sis_student")
						or die("<script>alert('Error getting students')</script>");
						
	while($row = $get_students->fetch_array())
	{
		// echo $docu_check . ' | ' . $row['lrn'] . '<br>';
		if($docu_check == $row['lrn'])
		{
			?>
			<script>
				db_lrn++;
				var lrn_db_copy = <?php echo $docu_check?>;
				var line_break = document.createElement("BR");
				var line_break2 = document.createElement("BR");
				var error_notice_db = document.createTextNode(lrn_db_copy + ": LRN duplicate in Database");
				notice_div.appendChild(error_notice_db);
				notice_div.appendChild(line_break2);
				notice_div.appendChild(line_break);
			</script>
			<?php
			// echo "DUPLICATE-----><br>";
		}	
	}
}



foreach($array_readData as $dupli_check)
{
    foreach($array_readData as $check)
    {
        // echo 'Step 1 -> ' . $dupli_check['lrn'] . " | " . $check['lrn'] . "<br>";
        $lrn = $dupli_check['lrn'];
        if(in_array($lrn, $check, true) && $dupli_count == 0)
        {
            $dupli_count=1;
            // echo 'Step 2 -> First duplicate<br>';
            continue;
        }

        // echo 'Step 3 -> Dupli count: ' . $dupli_count . '<br>';

        if(in_array($lrn, $check, true) && $dupli_count == 1)
        {
            $check_lrn = $dupli_check['lrn'];
            // echo "Step 4 -> Second duplicate ----------------------------------<br>";
            ?>
            <script>
			    mirror++;
                var lrn = <?php echo $check_lrn;?>;
				var error_notice_lrn = document.createTextNode(lrn + ": LRN duplicate in Document");
				var line_break = document.createElement("BR");
				var line_break2 = document.createElement("BR");
                notice_div.appendChild(error_notice_lrn);
				notice_div.appendChild(line_break2);
				notice_div.appendChild(line_break);
	           </script>
           <?php
        	// echo 'Duplicate LRN: ' . $check_lrn . ' in Document<br>';
           $dupli_count=0;
        }
	}

    if(empty($dupli_check['Year Level & Section']))
    {
		
        $section_check = $dupli_check['lrn'];
        // echo 'LRN: ' . $section_check . ' No Section selected' . '<br>';
        ?>
        <script>
            empty_sec++;
			var lrn_section = <?php echo $section_check;?>;
			var error_notice_sec = document.createTextNode(lrn_section + ": LRN has no Section selected");
			var line_break = document.createElement("BR");
			var line_break2 = document.createElement("BR");
			notice_div.appendChild(error_notice_sec);
			notice_div.appendChild(line_break);
			notice_div.appendChild(line_break2);
		</script>
        <?php
	}
	
	if(empty($dupli_check['School Year']))
	{
		$sy = $dupli_check['lrn'];
		?>
		<script>
			empty_sy++;
			var lrn_sy = <?php echo $sy;?>;
			var error_notice_sy = document.createTextNode(lrn_sy + ": LRN has no School Year selected");
			var line_break = document.createElement("BR");
			var line_break2 = document.createElement("BR");			
			notice_div.appendChild(error_notice_sy);
			notice_div.appendChild(line_break);
			notice_div.appendChild(line_break2);
		</script>
		<?php
	}

	if(empty($dupli_check['Place of Birth']))
	{
		$place_birth = $dupli_check['lrn'];
		?>
		<script>
			empty_place++;
			var place = <?php echo $place_birth;?>;
			var error_notice_place = document.createTextNode(place + ": LRN has no place of birth");
			var line_break = document.createElement("BR");
			var line_break2 = document.createElement("BR");			
			notice_div.appendChild(error_notice_place);
			notice_div.appendChild(line_break);
			notice_div.appendChild(line_break2);
		</script>
		<?php
	}

	if(empty($dupli_check['Birthday']))
	{
		$birthday = $dupli_check['lrn'];
		?>
		<script>
			empty_birth++;
			var birth = <?php echo $birthday;?>;
			var error_notice_birth = document.createTextNode(birth + ": LRN has no birthday");
			var line_break = document.createElement("BR");
			var line_break2 = document.createElement("BR");			
			notice_div.appendChild(error_notice_birth);
			notice_div.appendChild(line_break);
			notice_div.appendChild(line_break2);
		</script>
		<?php
	}

    $dupli_count=0;
    // echo 'Step 5 -> END<br><br>';
}


// ---- END of LOOP for error checking






// LOOPING through the worksheet for displaying data
foreach ($stu_worksheet->getRowIterator() as $row)
{
	// printing of row data
    if(1 == $row->getRowIndex()) continue; // skipping row header RowIndex starts at 1
    echo '<tr>
            <td></td>';
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);
    $rowIndex = $row->getRowIndex();
    foreach($cellIterator as $cell)
    {
		// printing of column data
        if(!is_null($cell))
        {
			$value = $cell->getCalculatedValue();
			echo '<td>' . $value . '</td>';
		}
		else
		{
			echo '<td>"`"</td>';
		}
    }
    echo '</tr>';
}

// echo the file name in a hidden input to be able to pass to the next apge

                            ?>
                               
                            </tbody>
                        </table>
                        <center>

                        <form action="process/add_process_mult.php" method="post" enctype="multipart/form-data" id="submit">

						<!-- hidden file -->
                        <input form="submit" type="hidden" id="file" name="file" value="<?php echo $name;?>">
						<!-- hidden file -->

                        <button id="vutton" form="submit" title="Submit" type="submit" class="btn w3-hover-green btn-success w3-card-2">
                        <i class="fa fa-check">
                        </i>&nbsp;&nbsp;Submit&nbsp;</button>

						<!-- button for deleting not submitted file -->
						<!-- optional to delete file -->
                        <a href="process/add_file_del.php?f=<?php echo base64_encode($name);?>">
                        <button type="button" class="btn w3-hover-red w3-theme-rl1 w3-card-2">
                        <i class="fa fa-close"></i>&nbsp;&nbsp;Cancel&nbsp;
                        </button></a>
                        </center>
						<!-- button for deleting not submitted file -->


            <script>
				console.log("mirror-> " + mirror + " empty_sec-> " + empty_sec + " empty_sy-> " + empty_sy + " db_lrn-> " + db_lrn + " place-> " + empty_place);
				console.log("birthday-> " + empty_birth);
                if(mirror>0 || empty_sec>0 || empty_sy>0 || db_lrn>0)
                {
                    document.getElementById('warning').style.visibility = 'visible';
                    document.getElementById('warning_data').style.visibility = 'visible';
                    document.getElementById('vutton').disabled = true;
					document.getElementById('vutton').setAttribute('title', "Cannot Submit due to Error(s)");
                }
            </script>

                        
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

<script src='../js1/jquery.min.js'></script>
<script src='../js1/bootstrap.min.js'></script>
<script src="../js/index.js"></script>
<script src="../../../js/metisMenu.min.js"></script>
<script src="../../../js/sb-admin-2.min.js"></script>

<!-- DataTables JavaScript -->
<script src="../Template%20(reference)/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../Template%20(reference)/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../Template%20(reference)/vendor/datatables-responsive/dataTables.responsive.js"></script>


	<script src="../mustache/mustache.js"></script>
	<script src="data_js/data_stu_list.js"></script>
	<script src="../js/sweetalert.js"></script>


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