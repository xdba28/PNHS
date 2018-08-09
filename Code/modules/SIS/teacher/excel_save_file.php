<?php
require_once '../Classes/PHPExcel.php';
include_once('../DB Con.php');

session_start();

if(isset($_SESSION['user_data']['acct']['cms_username']) && isset($_SESSION['user_data']['acct']['cms_password']) && $_SESSION['user_data']['acct']['cms_account_type']=='user')
{
	$_SESSION['user_data']['acct']['cms_account_ID'];
	$_SESSION['user_data']['acct']['cms_account_type'];
}
else
{
	header('Location: ../login.php');	
}

if(isset($_POST['file']))
{
	$file = $_POST['file'];
}
else
{
	header('Location: student_list.php');
}

$target_dir = "Grades/";
$target_file = $target_dir . $file;      // excel directory + file name

$excel_file_type = pathinfo($target_file,PATHINFO_EXTENSION);

if(file_exists($target_file))
{
	?>
	<script>
		alert('File uploaded successfully!');
		window.location = "student_list.php";
	</script>
	<?php
}
else
{
	?>
	<script>
		alert('File upload failed!');
		window.location = "student_list.php";
	</script>
		<?php
}
?>