<?php
require_once '../Classes/PHPExcel.php';
include_once('../DB Con.php');

session_start();

if(isset($_SESSION['user_data']['acct']['cms_username']) && isset($_SESSION['user_data']['acct']['cms_password']) && $_SESSION['user_data']['acct']['cms_account_type']=='admin')
{
	$_SESSION['user_data']['acct']['cms_account_ID'];
	$_SESSION['user_data']['acct']['cms_account_type'];
}
else
{
	header('Location: ../index.php');	
}

if(!isset($_POST['action']) && !isset($_FILES['excel_file']['name']))
{
    header('Location: excel_import.php');
	break;
}

if(!empty($_FILES['excel_file']['name']))
{
	$file_type = $_FILES['excel_file']['type'];
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
			window.location = "excel_import.php";
		</script>
		<?php
	}
}
else
{
?>
<script>
    alert('Empty Submittion!');
	window.location = "excel_import.php";
</script>
<?php
}

$action = $_POST['action'];
$name = $_FILES['excel_file']['name']; // excel name

$target_dir = "../import/";
$target_file = $target_dir . basename($_FILES["excel_file"]["name"]);      // excel directory + file name

$excel_file_type = pathinfo($target_file,PATHINFO_EXTENSION);

move_uploaded_file($_FILES["excel_file"]["tmp_name"], $target_file);   // excel save in import directory

$excel_read = PHPExcel_IOFactory::createReaderForFile($target_file); // excel read file
$excel_object = $excel_read->load($target_file);                    // load file
$stu_worksheet = $excel_object->getSheet(0);                       // load specified sheet

$column = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", 
                "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",
                "AA", "AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK", "AL", "AM");

$row = 2; // excel index starts at 1;

$count = 0;


?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>Student Information System</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../css/w3/w3.css">
    
    <!-- MetisMenu CSS -->
    <link href="../Template%20(reference)/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../Template%20(reference)/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../Template%20(reference)/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../Template%20(reference)/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../Template%20(reference)/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="../css/sideNav.css">
    <link rel="stylesheet" href="../css/backToTop.css">

    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script href="../Template%20(reference)/vendor/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script href="../Template%20(reference)/vendor/bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>

<nav class="navbar-fixed-top w3-theme-bd5 w3-card-4" style="background-color:rgba(42,101,149,0.95)!important" role="navigation">
<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand w3-card-4" href="../index.php"><img src="../docs/img/pnhs_logo.png" width="75px" height="75px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <hr class="hidden-sm hidden-md hidden-lg" style="height:10px; border:0">


      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../student/student_list.php">Student List</a></li>
        <li><a href="excel_import.php">Excel Import</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Account <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#"><i class="fa fa-user fa-fw"></i> Admin Profile</a></li>
              <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
              <li class="divider"></li>
              <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
<hr class="w3-theme-yd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
<hr class="w3-theme-bd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
</nav>
<div class="container" style="padding:35px; background:rga(0,0,0,0.5)"></div>

<div id="mySidenav" class="sidenav w3-card-4">
  <a href="javascript:void(0)" class="closebtn" style="margin-left:150px" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div id="main">

<a id="openBtn" onclick="openNav()" alt="Open Side Navigation" data-toggle="tooltip" data-placement="right">
    <span class="glyphicon glyphicon-chevron-right" style="top:45%"></span>
</a>

<a id="back-to-top" href="#" class="w3-circle w3-card-4" alt="Return to Top" data-toggle="tooltip" data-placement="left">
    <span class="glyphicon glyphicon-chevron-up"></span>
</a>
    
    <div class="container">
        <h1 class="page-header w3-center"></h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
             
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead class="w3-theme-bl1">
                                <tr>
                                    <th>LRN</th>
                                    <th>Lastname</th>
                                    <th>Firstname</th>
                                    <th>Middle Name</th>
                                    <th>Status</th>
                                    <th>Section</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
<?php


// $get_added_student = mysql_query("SELECT lrn, stu_lname, stu_fname, stu_mname, stu_status FROM sis_student")
//                             or die("Error get_added_student: " . mysqlerro());

//         while($row = mysql_fetch_array($get_added_student))
//         {
//             $lrn = $row['lrn'];
//             echo 
//                 '<tr>
//                     <td><a href="../student/student_pi.php?lrn=' . $lrn . '"> ' . $lrn . ' </a></td>
//                     <td>' . $row['stu_lname'] . '</td>
//                     <td>' . $row['stu_fname'] . '</td>
//                     <td>' . $row['stu_mname'] . '</td>
//                     <td>' . $row['stu_status'] .'</td>';

//             $get_section = mysql_query("SELECT css_section.SECTION_NAME AS section, sis_stu_rec.lrn, sis_stu_rec.sy_id FROM sis_stu_rec, css_section
//                                         WHERE sis_stu_rec.section_id = css_section.SECTION_ID AND sis_stu_rec.lrn = '$lrn'")
//                                         or die("Error get_section: " .mysql_error());
//                 while($row = mysql_fetch_array($get_section))
//                 {
//                     echo '<td>' . $row['section'] . '</td>
//                           </tr>';
//                 }
//         }
if($action=='add')
{
    for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
    {
        echo '<tr>';
        for($count=0;$stu_worksheet->getCell($column[$count] . $row)->getValue()!=NULL;$count++)
        {
            echo '<td>' . $stu_worksheet->getCell($column[$count] . $row)->getValue(); '</td>';
        }
        echo '</tr>';
    }
}
elseif($action=='transfer_in')
{
    for($row=2;$worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
    {
        echo '<tr>';
        for($count=0;$worksheet->getCell($column[$count] . $row)->getValue()!=NULL;$count++)
        {
            echo '<td>' . $worksheet->getCell($column[$count] . $row)->getValue(); '</td>';
        }
        echo '</tr>';
    }
}
elseif($action=='transfer_out')
{
    for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
    {
        echo '<tr>';
        for($count=0;$stu_worksheet->getCell($column[$count] . $row)->getValue()!=NULL;$count++)
        {
            echo '<td>' . $stu_worksheet->getCell($column[$count] . $row)->getValue(); '</td>';
        }
        echo '</tr>';
    }
}
elseif($action=='grade')
{   
	for($row=7;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
	{
        echo '<tr>
              <td>' . $stu_worksheet->getCell($column[0] . $row)->getValue() . '</td>
              <td>' . $stu_worksheet->getCell($column[2] . $row)->getValue() . '</td>
              <td>'	. $stu_worksheet->getCell($column[3] . $row)->getValue() . '</td>
              <td>' . $stu_worksheet->getCell($column[4] . $row)->getValue() . '</td>
              <td>' . $stu_worksheet->getCell($column[5] . $row)->getValue() . '</td>
              <td>' . $stu_worksheet->getCell($column[6] . $row)->getValue() . '</td>
              </tr>';
    }
}

// for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
// {
//     echo '<tr>';
// 	for($count=0;$stu_worksheet->getCell($column[$count] . $row)->getValue()!=NULL;$count++)
// 	{
//         echo '<td>' . $stu_worksheet->getCell($column[$count] . $row)->getValue(); '</td>';
//     }
//     echo '</tr>';
// }
?>

                               
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                
                <form action="excel_upload.php" method="post" enctype="multipart/form-data">
                    <input name="action" id="action" hidden value="<?php echo $action?>">
                    <input name="file" id="file" hidden value="<?php echo $name; ?>">
                    <input type="submit" value="Submit" name="submit">
                </form>

                <!-- <a href="excel_import.php">&nbsp&nbsp&nbsp Back to Import</a> -->

                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    
<script src="../js/alert.js"></script>
<script src="../js/slideshow.js"></script>
<script src="../js/backToTop.js"></script>
<script src="../js/sideNavII.js"></script>
<script src="../js/showNav.js"></script>
    
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
    
<!-- Footer -->
<footer class="w3-container w3-theme-bd5" style="margin-top:20%">
  <h3>Footer</h3>
</footer>

</body>

</html>