<?php
include_once('..//db_connect.php');
session_start();

include_once('log.php');

mysqli_query($mysqli, "LOCK TABLES cms_account, sis_student, pims_personnel READ");
$f_accountstuper = mysqli_query($mysqli, "SELECT * FROM cms_account
	WHERE cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'")
	or die(mysqli_error($mysqli));
	
$accountstuper = mysqli_fetch_array($f_accountstuper);

if($accountstuper['emp_no'] == NULL)
{
	$f_student = mysqli_query($mysqli, "SELECT *, LEFT(stu_mname, 1) FROM sis_student
		WHERE lrn = '".$accountstuper['lrn']."'")
		or die(mysqli_error($mysqli));
		
	$stuper = mysqli_fetch_array($f_student);
	$lname = $stuper['stu_lname'];
	$fname = $stuper['stu_fname'];
	$mname = $stuper['stu_mname'];
	$no = $stuper['lrn'];
	$gender = $stuper['sis_gender'];
	$bday = $stuper['sis_b_day'];
	
	if($stuper['stu_mname'] == NULL)
	{
		$name = $stuper['stu_lname'].', '.$stuper['stu_fname'];

	}		
	else
	{
		$name = $stuper['stu_lname'].', '.$stuper['stu_fname'].' '.$stuper['LEFT(stu_mname, 1)'].'.';
	}
			$useru = $stuper['stu_fname'].' '.$stuper['stu_lname'];
}
else if($accountstuper['lrn'] == NULL)
{
	$f_personnel = mysqli_query($mysqli, "SELECT *, LEFT(P_mname, 1) FROM pims_personnel
		WHERE emp_No = '".$accountstuper['emp_no']."'")
		or die(mysqli_error($mysqli));
		
	$stuper = mysqli_fetch_array($f_personnel);
	$lname = $stuper['P_lname'];
	$fname = $stuper['P_fname'];
	$mname = $stuper['P_mname'];
	$no = $stuper['emp_No'];
	$gender = $stuper['pims_gender'];
	$bday = $stuper['pims_birthdate'];
	
	if($stuper['P_mname'] == NULL)
	{
		$name = $stuper['P_lname'].', '.$stuper['P_fname'];
	
	}		
	else
	{
		$name = $stuper['P_lname'].', '.$stuper['P_fname'].' '.$stuper['LEFT(P_mname, 1)'].'.';
	}
		$useru = $stuper['P_fname'].' '.$stuper['P_lname'];
}
mysqli_query($mysqli, "UNLOCK TABLES");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>User</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../../css/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/t.css">
    
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../Template (reference)/vendor/jquery/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../Template (reference)/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>
	body {
        color: #404E67;
        background: #FFFFFF;
		font-family: 'arial', sans-serif;
	}	
	.icon-background4 {
    color: #36f40b;
	}
	</style>
</head>
<body>
<?php
	$r = strval($_GET['t']);

	if ($r=="Yes")
	{echo'
		<div class="form-group">
		<label>Description</label><br>
        <textarea class="control-label col-md-12 col-sm-4 col-xs-12" name = "eyedesc" id ="eyedesc"></textarea>
        </div>
	';
	}
	else
	{echo'
		<div class="form-group">
		<label>Description</label><br>
        <textarea class="control-label col-md-12 col-sm-4 col-xs-12" disabled="disabled" name = "eyedesc" id ="eyedesc"></textarea>
        </div>
	';
	}
	?>
</body>
</html>
