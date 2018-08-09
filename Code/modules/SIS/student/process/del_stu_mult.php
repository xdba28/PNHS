<?php
include_once('../../DB Con.php');
session_start();

if(!empty($_SESSION['user_data']['acct']['emp_no']))
{
    $_SESSION['user_data']['acct']['emp_no'];
}
elseif(empty($_SESSION['user_data']['acct']['emp_no']))
{
    $_SESSION['user_data']['acct']['lrn'];
}
else
{
    header('Location: ../../../admin_idx.php');
}
if(isset($_POST['lrn']))
{
	$stu_p = $_POST['lrn'];
}
else
{
	?>
	<script>
		alert('No Student Selected!');
		window.location = "stu_del_mult.php";
	</script>
	<?php
}

foreach($stu_p as $arr)
{
	$arr_exp = explode("-", $arr);
	$lrn = $arr_exp[0];
	$section = $arr_exp[1];
	// echo $lrn . ' | ' . $section . '<br>';

	$autocommit = mysql_query("SET AUTOCOMMIT = 1");
	$start_transac = mysql_query("START TRANSACTION");

	$del_pg = mysql_query("DELETE FROM sis_parent_guardian WHERE lrn = '$lrn'")
							or die("Error del_pg: " .mysql_error());

	$get_rec_id = mysql_query("SELECT rec_id FROM sis_stu_rec, sis_student, css_school_yr
								WHERE sis_student.lrn = sis_stu_rec.lrn
								AND css_school_yr.sy_id = sis_stu_rec.sy_id
								AND css_school_yr.status = 'active'
								AND sis_student.lrn = '$lrn'");

	$res = mysql_fetch_assoc($get_rec_id);
	$rec_id = $res['rec_id'];

	$del_grade = mysql_query("DELETE FROM sis_grade WHERE rec_id = '$rec_id'")
								or die("Error del_grade: " .mysql_error());

	$del_stu_rec = mysql_query("DELETE FROM sis_stu_rec WHERE lrn = '$lrn'")
								or die("Error del_stu_rec: " .mysql_error());

	$del_f137 = mysql_query("DELETE FROM sis_f137_rel WHERE lrn = '$lrn'")
								or die("Error del_f137: " .mysql_error());

	$del_student = mysql_query("DELETE FROM sis_student WHERE lrn = '$lrn'")
								or die("Error del_student: " .mysql_error());

	$commit = mysql_query("COMMIT");

	header('Location: ../student_list.php');
}

?>