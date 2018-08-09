<?php
include('../../../db_con_i.php');

if(isset($_POST['section']) === true && empty($_POST['section']) === false)
{
	$data = mysql_real_escape_string(trim($_POST['section']));
}

if($data == '-')
{
	echo 'empty';
	die;
}

$sec_ex = explode("-", $data);

$get_data = $mysqli->query("SELECT sis_student.lrn as lrn, stu_lname, stu_fname, stu_mname, stu_status
							FROM css_section, sis_student, sis_stu_rec, css_school_yr, cms_account
							WHERE sis_student.lrn = sis_stu_rec.lrn
							AND sis_stu_rec.section_id = css_section.section_id
							AND sis_stu_rec.sy_id = css_school_yr.sy_id
							AND cms_account.lrn = sis_student.lrn
							AND css_school_yr.status = 'active'
							AND css_section.section_name = '$sec_ex[1]'
							AND css_section.year_level = '$sec_ex[0]'
							AND cms_account.lrn IS NOT NULL")
						or die("<script>
						alert('Error getting Student Accounts');
						window.location = '../student/student_list.php';
						</script>");

	if(mysqli_num_rows($get_data) !== 0)
	{
		while($row = $get_data->fetch_array())
		{
			$json_data[] = array(
							'lrn'=>$row['lrn'],
							'fname'=>$row['stu_fname'],
							'mname'=>$row['stu_mname'],
							'lname'=>$row['stu_lname'],
							'status'=>$row['stu_status']);
			header("Content-type:application/json");
		}
		echo json_encode($json_data);
	}
	else
	{
		echo "No Students";
	}
				
?>