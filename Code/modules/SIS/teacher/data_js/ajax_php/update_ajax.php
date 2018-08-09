<?php
include('../../../db_con_i.php');

$qua = mysqli_real_escape_string($mysqli, trim($_POST['quarter']));
$sub = mysqli_real_escape_string($mysqli, trim($_POST['subject']));
$lrn = mysqli_real_escape_string($mysqli, trim($_POST['lrn']));

$get_rec = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section, css_school_yr
						WHERE sis_stu_rec.section_id = css_section.SECTION_ID
						AND sis_stu_rec.sy_id = css_school_yr.sy_id
						AND status = 'active'
						AND sis_stu_rec.lrn = '$lrn'")
				or die($mysqli->error);

	if(mysqli_num_rows($get_rec) !== 0)
	{
		$rec = $get_rec->fetch_assoc();
		$rec_id = $rec['rec_id'];
		if($sub != 'NULL' && $qua != 'Final')
		{
			$get_grade = $mysqli->query("SELECT grade_val FROM sis_grade, sis_stu_rec, css_subject
							WHERE sis_grade.rec_id = sis_stu_rec.rec_id
							AND sis_grade.subject_id = css_subject.subject_id
							AND css_subject.sub_desc = '$sub'
							AND sis_stu_rec.rec_id = '$rec_id'
							AND sis_grade_quarter = '$qua'")
					or die($mysqli->error);
		}
		elseif($sub == 'NULL' && $qua == 'Final')
		{
			$get_grade = $mysqli->query("SELECT grade_val, grade_remarks FROM sis_grade, sis_stu_rec
										WHERE sis_stu_rec.rec_id = sis_grade.rec_id
										AND subject_id IS NULL
										AND sis_stu_rec.rec_id = '$rec_id'
										AND sis_grade_quarter = '$qua'")
							or die($mysqli->error);
		}

		if(mysqli_num_rows($get_grade) !== 0)
		{
			$res = $get_grade->fetch_assoc();
			$grade = $res['grade_val'];
			echo $grade;
		}
		else
		{
			
		}
	}
	else
	{

	}

?>