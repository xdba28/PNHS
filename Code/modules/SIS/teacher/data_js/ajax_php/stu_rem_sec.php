<?php
include('../../../db_con_i.php');

if(isset($_POST['section']) === true && isset($_POST['lrn']) == true && empty($_POST['section']) === false && empty($_POST['lrn']) === false)
{
	$section = mysql_real_escape_string(trim($_POST['section']));
	$lrn = mysql_real_escape_string(trim($_POST['lrn']));
}

$sec_ex = explode("-", $section);

$select_sec_sy = $mysqli->query("SELECT SECTION_ID, css_school_yr.sy_id as id FROM css_section, css_school_yr
								WHERE css_section.sy_id = css_school_yr.sy_id
								AND css_school_yr.status = 'active'
								AND SECTION_NAME = '$sec_ex[1]'
								AND YEAR_LEVEL = '$sec_ex[0]'")
								or die("Error select_sec_sy: " . $mysqli->error);

	$res = $select_sec_sy->fetch_assoc();
	$sec_id = $res['SECTION_ID'];
	$sy_id = $res['id'];

$remove_section = $mysqli->query("UPDATE sis_stu_rec SET section_id = NULL
									WHERE sy_id = '$sy_id'
									AND lrn = '$lrn'")
								or die("Error remove_section: " . $mysqli->error);
?>