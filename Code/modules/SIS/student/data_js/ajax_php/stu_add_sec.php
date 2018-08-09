<?php
include('../../../db_con_i.php');

if(isset($_POST['section']) === true && isset($_POST['lrn']) == true && empty($_POST['section']) === false && empty($_POST['lrn']) === false)
{
	$section = mysql_real_escape_string(trim($_POST['section']));
	$lrn = mysql_real_escape_string(trim($_POST['lrn']));
}

$sec_ex = explode("-", $section);

	$check_new_sy = $mysqli->query("SELECT sis_stu_rec.lrn FROM sis_stu_rec, css_school_yr, sis_student
								WHERE sis_stu_rec.sy_id = css_school_yr.sy_id
								AND sis_student.lrn = sis_stu_rec.lrn
								AND sis_stu_rec.lrn = '$lrn'
								AND sis_stu_rec.section_id IS NOT NULL
								AND sis_student.stu_status = 'Pending Section'
								AND css_school_yr.status = 'inactive'")
						or die("Error check_new_sy: " . $mysqli->error);
	
	$check_null_data = $mysqli->query("SELECT sis_stu_rec.lrn FROM sis_stu_rec, css_school_yr, sis_student
								WHERE sis_stu_rec.sy_id = css_school_yr.sy_id
								AND sis_student.lrn = sis_stu_rec.lrn
								AND sis_stu_rec.lrn = '$lrn'
								AND section_id IS NULL
								AND sis_student.stu_status = 'Enrolled'
								AND css_school_yr.status = 'active'")
						or die("Error check_null_data: " . $mysqli->error);

	$res_new_sy = mysqli_num_rows($check_new_sy);
	$res_null_data = mysqli_num_rows($check_null_data);

	if($res_new_sy == !0 && $res_null_data == 0)
	{
		$select_sec_sy = $mysqli->query("SELECT SECTION_ID, css_school_yr.sy_id FROM css_section, css_school_yr
										WHERE css_section.sy_id = css_school_yr.sy_id
										AND css_school_yr.status = 'active'
										AND SECTION_NAME = '$sec_ex[1]'
										AND YEAR_LEVEL = '$sec_ex[0]'")
								or die("Error select_sec_sy: " . $mysqli->error);

			$res = $select_sec_sy->fetch_assoc();
			$sec_id = $res['SECTION_ID'];
			$sy_id = $res['sy_id'];

		$add_section = $mysqli->query("INSERT INTO sis_stu_rec(lrn, section_id, sy_id)
										VALUES('$lrn', '$sec_id', '$sy_id')")
									or die("Error add_section: " . $mysqli->error);
		
		$update_status = $mysqli->query("UPDATE sis_student SET stu_status = 'Enrolled' WHERE lrn = '$lrn'")
										or die("Error update_status: " .$mysqli->error);
	}
	elseif($res_null_data == !0)
	{
		$select_sec_sy = $mysqli->query("SELECT SECTION_ID, css_school_yr.sy_id FROM css_section, css_school_yr
										WHERE css_section.sy_id = css_school_yr.sy_id
										AND css_school_yr.status = 'active'
										AND SECTION_NAME = '$sec_ex[1]'
										AND YEAR_LEVEL = '$sec_ex[0]'")
								or die("Error select_sec_sy: " . $mysqli->error);

			$res = $select_sec_sy->fetch_assoc();
			$sec_id = $res['SECTION_ID'];
			$sy_id = $res['sy_id'];

		$update_section = $mysqli->query("UPDATE sis_stu_rec SET section_id = '$sec_id' WHERE lrn = '$lrn'")
										or die("Error update_section: " . $mysqli->error);
	}
?>