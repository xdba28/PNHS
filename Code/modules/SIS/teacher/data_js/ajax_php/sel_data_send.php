<?php
include('../../../db_con_i.php');

if(isset($_POST['section']) === true && empty($_POST['section']) === false)
{
	$data = mysql_real_escape_string(trim($_POST['section']));
}

$sec = explode("-", $data);

$get_student = $mysqli->query("SELECT sis_student.lrn as lrn, stu_fname, stu_lname, stu_mname 
								FROM sis_student, sis_stu_rec, css_section, css_school_yr

								WHERE sis_student.lrn = sis_stu_rec.lrn
								AND sis_stu_rec.sy_id = css_school_yr.sy_id
								AND sis_stu_rec.section_id = css_section.SECTION_ID
								AND SEcTION_NAME = '$sec[1]'
								AND YEAR_LEVEL = '$sec[0]'
								AND css_school_yr.status = 'active'")
					or die("Error get_student: " . $mysqli->error);

	if(mysqli_num_rows($get_student) !== 0)
	{
		while($row = $get_student->fetch_array())
		{
			$json_data[] = array(
							'lrn'=>$row['lrn'],
							'fname'=>$row['stu_fname'],
							'mname'=>$row['stu_mname'],
							'lname'=>$row['stu_lname']);
			header("Content-type:application/json");
		}
		echo json_encode($json_data);
	}
	else
	{
		
	}
	
?>