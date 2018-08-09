<?php
include('../../../db_con_i.php');

if(isset($_POST['sy']) === true && empty($_POST['sy']) === false)
{
	$trim_sy = $_POST['sy'];
	$sy = mysqli_real_escape_string($mysqli, trim($trim_sy));
}

if($sy == "-")
{
	echo 'empty';
	die;
}

$get_student = $mysqli->query("SELECT sis_student.lrn as lrn, stu_fname, stu_mname, stu_lname, stu_status, SECTION_NAME, YEAR_LEVEL, year
								FROM sis_student, sis_stu_rec, css_section, css_school_yr
								WHERE sis_student.lrn = sis_stu_rec.lrn
								AND sis_stu_rec.section_id = css_section.section_id
								AND sis_stu_rec.sy_id = css_school_yr.sy_id
								AND year = '$sy'")
					or die("<script>alert('Error in fetching student data');</script>");

if(mysqli_num_rows($get_student) !== 0)
{
	while($row = $get_student->fetch_array())
	{
		$lrn = base64_encode($row['lrn']);
		
		$stu_data[] = array(
						'cryplrn'=>$lrn,
						'lrn'=>$row['lrn'],
						'fname'=>$row['stu_fname'],
						'mname'=>$row['stu_mname'],
						'lname'=>$row['stu_lname'],
						'status'=>$row['stu_status'],
						'lvl'=>$row['YEAR_LEVEL'],
						'section'=>$row['SECTION_NAME'],
						'year'=>$row['year']);
				header("Content-type:application/json");
	}
	echo json_encode($stu_data);
}
else
{
	echo "No Students";
}

?>