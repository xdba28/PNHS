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

if(!isset($_POST['file']) && !isset($_POST['action']))
{
	header('Location: excel_import.php');
	exit;
}

$name = $_POST['file'];
$action = $_POST['action'];

$target_dir = "../import/";
$target_file = $target_dir . basename($name);      // excel directory + file name

$excel_file_type = pathinfo($target_file,PATHINFO_EXTENSION);

move_uploaded_file($name, $target_file);   // excel save in import directory

$excel_read = PHPExcel_IOFactory::createReaderForFile($target_file); // excel read file
$excel_object = $excel_read->load($target_file);                    // load file
$stu_worksheet = $excel_object->getSheet(0);                       // load specified sheet
$parent_worksheet = $excel_object->getSheet(1);                   // load specified sheet	


$column = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", 
				"N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",
				"AA", "AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK", "AL", "AM");

$row = 2; // excel index starts at 1;

$count = 0;

if($action=='add')
{
	for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
	{
		$lrn[$row]           = $stu_worksheet->getCell($column[0] . $row)->getValue();
		$stu_fname[$row]     = $stu_worksheet->getCell($column[1] . $row)->getValue();
		$stu_mname[$row]     = $stu_worksheet->getCell($column[2] . $row)->getValue();
		$stu_lname[$row]     = $stu_worksheet->getCell($column[3] . $row)->getValue();
		$b_day[$row]         = $stu_worksheet->getCell($column[4] . $row)->getValue();
		$plc[$row]           = $stu_worksheet->getCell($column[5] . $row)->getValue();
		$gender[$row]        = $stu_worksheet->getCell($column[6] . $row)->getValue();
		$religion[$row]      = $stu_worksheet->getCell($column[7] . $row)->getValue();
		$mother_tounge[$row] = $stu_worksheet->getCell($column[8] . $row)->getValue();
		$ethnic[$row]        = $stu_worksheet->getCell($column[9] . $row)->getValue();
		$status[$row]        = $stu_worksheet->getCell($column[10] . $row)->getValue();
		$stu_contact[$row]   = $stu_worksheet->getCell($column[11] . $row)->getValue();
		$email[$row]         = $stu_worksheet->getCell($column[12] . $row)->getValue();
		$house_no[$row]      = $stu_worksheet->getCell($column[13] . $row)->getValue();
		$street[$row]        = $stu_worksheet->getCell($column[14] . $row)->getValue();
		$brng[$row]          = $stu_worksheet->getCell($column[15] . $row)->getValue();
		$munic[$row]         = $stu_worksheet->getCell($column[16] . $row)->getValue();

		$add_stu_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
		$add_stu_transac = mysql_query("START TRANSACTION");

		$add_stu_excel = mysql_query("INSERT INTO sis_student(lrn, stu_fname, stu_mname, stu_lname, 
										sis_b_day, plc_birth, sis_gender, sis_religion, m_tounge, ethnic, stu_status, 
											stu_contact, sis_email, house_no, street, brng, munic)

										VALUES('$lrn[$row]', '$stu_fname[$row]', '$stu_mname[$row]', '$stu_lname[$row]', 
												'$b_day[$row]', '$plc[$row]', '$gender[$row]', '$religion[$row]', '$mother_tounge[$row]', 
												'$ethnic[$row]', '$status[$row]', '$stu_contact[$row]', '$email[$row]', '$house_no[$row]', 
												'$street[$row]', '$brng[$row]', '$munic[$row]')")
										or die("Error: save_stu_excel: ".mysql_error());

		$add_stu_excel_commit = mysql_query("COMMIT");
	}
	
	$row = 2; // excel index starts at 1;
	
	$count = 0;
	
	for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
	{
		$pg_lrn[$row]        = $parent_worksheet->getCell($column[0] . $row)->getValue();
		$father[$row]        = $parent_worksheet->getCell($column[1] . $row)->getValue();
		$mother[$row]        = $parent_worksheet->getCell($column[2] . $row)->getValue();
		$guardian[$row]      = $parent_worksheet->getCell($column[3] . $row)->getValue();
		$guardian_rela[$row] = $parent_worksheet->getCell($column[4] . $row)->getValue();
		$pg_contact[$row]    = $parent_worksheet->getCell($column[5] . $row)->getValue();

		$add_pg_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
		$add_pg_transac = mysql_query("START TRANSACTION");

		$add_pg_excel = mysql_query("INSERT INTO sis_parent_guardian(lrn, sis_father, sis_mother, sis_guardian, 
														guardian_relation, pg_contact)

										VALUES('$pg_lrn[$row]', '$father[$row]', '$mother[$row]', '$guardian[$row]', 
														'$guardian_rela[$row]', '$pg_contact[$row]')")
												or die("Error: save_pg_excel: ".mysql_error());
		$add_pg_excel_commit = mysql_query("COMMIT");
}

	$row = 2; // excel index starts at 1;
	
	$count = 0;

	for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
	{
		$lrn[$row] =     $stu_worksheet->getCell($column[0] . $row)->getValue();
		$yr_lvl[$row] =  $stu_worksheet->getCell($column[17] . $row)->getValue();
		$section[$row] = $stu_worksheet->getCell($column[18] . $row)->getValue();
		$sy[$row] =      $stu_worksheet->getCell($column[19] . $row)->getValue();
		
		$sy_cut = $sy[$row];

		$get_sy = mysql_query("SELECT sy_id FROM css_school_yr WHERE year = '$sy_cut'")
								or die("Error get_sy: " .mysql_error());

		$res_sy = mysql_fetch_assoc($get_sy);
		$sy_id = $res_sy['sy_id'];

		$sec = $section[$row];

		$add_get_section = mysql_query("SELECT SECTION_ID, SECTION_NAME, YEAR_LEVEL FROM css_section 
									WHERE YEAR_LEVEL = $yr_lvl[$row] AND SECTION_NAME = '$sec'")
										or die("Error add_get_section: " .mysql_error());

		$res_sec = mysql_fetch_assoc($add_get_section);
		$sec_id = $res_sec['SECTION_ID'];
		$sec_name = $res_sec['SECTION_NAME'];
		$sec_yr = $res_sec['YEAR_LEVEL'];

		$add_stu_rec_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
		$add_stu_rec_transac = mysql_query("START TRANSACTION");

		$add_create_stu_rec = mysql_query("INSERT INTO sis_stu_rec(lrn, section_id, sy_id)
										
										VALUES('$lrn[$row]', '$sec_id', '$sy_id')")
												or die("Error add_create_stu_rec: " .mysql_error());

		$add_stu_rec_commit = mysql_query("COMMIT");
	}
}
// else if($action=='transfer_in')
// {
// 	for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
// 	{
// 		$lrn[$row]           = $stu_worksheet->getCell($column[0] . $row)->getValue();
// 		$stu_fname[$row]     = $stu_worksheet->getCell($column[1] . $row)->getValue();
// 		$stu_mname[$row]     = $stu_worksheet->getCell($column[2] . $row)->getValue();
// 		$stu_lname[$row]     = $stu_worksheet->getCell($column[3] . $row)->getValue();
// 		$b_day[$row]         = $stu_worksheet->getCell($column[4] . $row)->getValue();
// 		$plc[$row]           = $stu_worksheet->getCell($column[5] . $row)->getValue();
// 		$gender[$row]        = $stu_worksheet->getCell($column[6] . $row)->getValue();
// 		$religion[$row]      = $stu_worksheet->getCell($column[7] . $row)->getValue();
// 		$mother_tounge[$row] = $stu_worksheet->getCell($column[8] . $row)->getValue();
// 		$ethnic[$row]        = $stu_worksheet->getCell($column[9] . $row)->getValue();
// 		$status[$row]        = $stu_worksheet->getCell($column[10] . $row)->getValue();
// 		$stu_contact[$row]   = $stu_worksheet->getCell($column[11] . $row)->getValue();
// 		$email[$row]         = $stu_worksheet->getCell($column[12] . $row)->getValue();
// 		$house_no[$row]      = $stu_worksheet->getCell($column[13] . $row)->getValue();
// 		$street[$row]        = $stu_worksheet->getCell($column[14] . $row)->getValue();
// 		$brng[$row]          = $stu_worksheet->getCell($column[15] . $row)->getValue();
// 		$munic[$row]         = $stu_worksheet->getCell($column[16] . $row)->getValue();

// 		$transfer_in[$row]   = $stu_worksheet->getCell($column[20] . $row)->getValue();

// 		$trnsf_stu_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
// 		$trnsf_stu_transac = mysql_query("START TRANSACTION");

// 		$trnsf_save_stu_excel = mysql_query("INSERT INTO sis_student(lrn, stu_fname, stu_mname, stu_lname, 
// 										sis_b_day, plc_birth, sis_gender, sis_religion, m_tounge, ethnic, stu_status, 
// 											stu_contact, sis_email, trnsf_in_date, house_no, street, brng, munic)

// 										VALUES('$lrn[$row]', '$stu_fname[$row]', '$stu_mname[$row]', '$stu_lname[$row]', 
// 												'$b_day[$row]', '$plc[$row]', '$gender[$row]', '$religion[$row]', '$mother_tounge[$row]', 
// 												'$ethnic[$row]', '$status[$row]', '$stu_contact[$row]', '$email[$row]', '$transfer_in[$row]', 
// 												'$house_no[$row]', '$street[$row]', '$brng[$row]', '$munic[$row]')")
// 										or die("Error: trnsf_save_stu_excel: ".mysql_error());

// 		$trnsf_save_stu_commit = mysql_query("COMMIT");
// 	}
	
// 	$row = 2; // excel index starts at 1;
	
// 	$count = 0;
	
// 	for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
// 	{
// 		$pg_lrn[$row]        = $parent_worksheet->getCell($column[0] . $row)->getValue();
// 		$father[$row]        = $parent_worksheet->getCell($column[1] . $row)->getValue();
// 		$mother[$row]        = $parent_worksheet->getCell($column[2] . $row)->getValue();
// 		$guardian[$row]      = $parent_worksheet->getCell($column[3] . $row)->getValue();
// 		$guardian_rela[$row] = $parent_worksheet->getCell($column[4] . $row)->getValue();
// 		$pg_contact[$row]    = $parent_worksheet->getCell($column[5] . $row)->getValue();

// 		$trnsf_stu_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
// 		$trnsf_stu_transac = mysql_query("START TRANSACTION");
// 		$trnsf_save_pg_excel = mysql_query("INSERT INTO sis_parent_guardian(lrn, sis_father, sis_mother, sis_guardian, 
// 														guardian_relation, pg_contact)

// 										VALUES('$pg_lrn[$row]', '$father[$row]', '$mother[$row]', '$guardian[$row]', 
// 														'$guardian_rela[$row]', '$pg_contact[$row]')")
// 												or die("Error: trans_save_pg_excel: ".mysql_error());

// 		$trnsf_save_pg_commit = mysql_query("COMMIT");
// 	}

// 	$row = 2;
	
// 	$count = 0;

// 	for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
// 	{
// 		$lrn[$row] =     $stu_worksheet->getCell($column[0] . $row)->getValue();
// 		$yr_lvl[$row] =  $stu_worksheet->getCell($column[17] . $row)->getValue();
// 		$section[$row] = $stu_worksheet->getCell($column[18] . $row)->getValue();
// 		$sy[$row] =      $stu_worksheet->getCell($column[19] . $row)->getValue();
		
// 		$sy_cut = $sy[$row];

// 		$trnsf_get_sy = mysql_query("SELECT sy_id FROM css_school_yr WHERE year = '$sy_cut'")
// 								or die("Error get_sy: " .mysql_error());

// 		$res_sy = mysql_fetch_assoc($trnsf_get_sy);
// 		$sy_id = $res_sy['sy_id'];

// 		$sec = $section[$row];

// 		$trnsf_get_section = mysql_query("SELECT SECTION_ID, SECTION_NAME, YEAR_LEVEL FROM css_section 
// 									WHERE YEAR_LEVEL = '$yr_lvl[$row]' AND SECTION_NAME = '$sec'")
// 										or die("Error trnsf_get_section: " .mysql_error());

// 		$res_sec = mysql_fetch_assoc($trnsf_get_section);
// 		$sec_id = $res_sec['SECTION_ID'];
// 		$sec_name = $res_sec['SECTION_NAME'];
// 		$sec_yr = $res_sec['YEAR_LEVEL'];

// 		$trnsf_save_stu_rec_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
// 		$trnsf_save_stu_rec_transac = mysql_query("START TRANSACTION");

// 		$trnsf_crt_stu_rec = mysql_query("INSERT INTO sis_stu_rec(lrn, section_id, sy_id)
										
// 										VALUES('$lrn[$row]', '$sec_id', '$sy_id')")
// 												or die("Error trnsf_create_stu_rec: " .mysql_error());

// 		$trnsf_save_stu_rec_commit = mysql_query("COMMIT");
// 	}
// }
// else if($action=='transfer_out')
// {
// 	for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
// 	{
// 		$lrn[$row] 		 = $stu_worksheet->getCell($column[0] . $row)->getValue();
// 		$trnsf_out[$row] = $stu_worksheet->getCell($column[2] . $row)->getValue();
// 		$yr_lvl[$row]	 = $stu_worksheet->getCell($column[3] . $row)->getValue();
// 		$section[$row]	 = $stu_worksheet->getCell($column[4] . $row)->getValue();

// 		$trnsf_out_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
// 		$trnsf_out_transac = mysql_query("START TRANSACTION");
// 		$trnsf_out_excel = mysql_query("UPDATE sis_student SET trnsf_out_date = '$trnsf_out[$row]',
// 										stu_status = 'Transferred Out' WHERE lrn = '$lrn[$row]'")
// 									or die("Error trnsf_out_excel: " .mysql_error());

// 		$trnsf_out_commit = mysql_query("COMMIT");
// 	}
// }
// else if($action=='update')
// {
// 	for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
// 	{
// 		$lrn[$row]           = $stu_worksheet->getCell($column[0] . $row)->getValue();
// 		$stu_fname[$row]     = $stu_worksheet->getCell($column[1] . $row)->getValue();
// 		$stu_mname[$row]     = $stu_worksheet->getCell($column[2] . $row)->getValue();
// 		$stu_lname[$row]     = $stu_worksheet->getCell($column[3] . $row)->getValue();
// 		$b_day[$row]         = $stu_worksheet->getCell($column[4] . $row)->getValue();
// 		$plc[$row]           = $stu_worksheet->getCell($column[5] . $row)->getValue();
// 		$gender[$row]        = $stu_worksheet->getCell($column[6] . $row)->getValue();
// 		$religion[$row]      = $stu_worksheet->getCell($column[7] . $row)->getValue();
// 		$mother_tounge[$row] = $stu_worksheet->getCell($column[8] . $row)->getValue();
// 		$ethnic[$row]        = $stu_worksheet->getCell($column[9] . $row)->getValue();
// 		$status[$row]        = $stu_worksheet->getCell($column[10] . $row)->getValue();
// 		$stu_contact[$row]   = $stu_worksheet->getCell($column[11] . $row)->getValue();
// 		$email[$row]         = $stu_worksheet->getCell($column[12] . $row)->getValue();
// 		$house_no[$row]      = $stu_worksheet->getCell($column[13] . $row)->getValue();
// 		$street[$row]        = $stu_worksheet->getCell($column[14] . $row)->getValue();
// 		$brng[$row]          = $stu_worksheet->getCell($column[15] . $row)->getValue();
// 		$munic[$row]         = $stu_worksheet->getCell($column[16] . $row)->getValue();

// 		$update_stu_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
// 		$update_stu_transac = mysql_query("START TRANSACTION");

// 		$update_student = mysql_query("UPDATE sis_student SET stu_fname = '$stu_fname[$row]',
// 								stu_mname = '$stu_mname[$row]', stu_lname = '$stu_lname[$row]', sis_b_day = '$b_day[$row]',
// 								plc_birth = '$plc[$row]', sis_gender = '$gender[$row]', sis_religion = '$religion[$row]',
// 								m_tounge = '$mother_tounge[$row]', ethnic = '$ethnic[$row]', stu_status = '$status[$row]',
// 								stu_contact = '$stu_contact[$row]', sis_email = '$email[$row]', house_no = '$house_no[$row]',
// 								street = '$street[$row]', brng = '$brng[$row]', munic = '$munic[$row]' WHERE lrn = '$lrn[$row]'")
// 							or die("Error update_student: " .mysql_error());

// 		$update_student = mysql_query("COMMIT");
// 	}

// 	for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
// 	{
// 		$pg_lrn[$row]        = $parent_worksheet->getCell($column[0] . $row)->getValue();
// 		$father[$row]        = $parent_worksheet->getCell($column[1] . $row)->getValue();
// 		$mother[$row]        = $parent_worksheet->getCell($column[2] . $row)->getValue();
// 		$guardian[$row]      = $parent_worksheet->getCell($column[3] . $row)->getValue();
// 		$guardian_rela[$row] = $parent_worksheet->getCell($column[4] . $row)->getValue();
// 		$pg_contact[$row]    = $parent_worksheet->getCell($column[5] . $row)->getValue();

// 		$update_pg_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
// 		$update_pg_transac = mysql_query("START TRANSACTION");

// 		$update_pg = mysql_query("UPDATE sis_parent_guardian SET sis_father = '$father[$row]', sis_mother = '$mother[$row]', 
// 								sis_guardian = '$guardian[$row]', guardian_relation = '$guardian_rela[$row]',
// 								pg_contact = '$pg_contact[$row]' WHERE lrn = $lrn[$row]")
// 							or die("Error update_pg: " .mysql_error());

// 		$update_pg_commit = mysql_query("COMMIT");
// 	}
// }
else if($action=='del_stu')
{
	for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
	{
		$lrn[$row] = $parent_worksheet->getCell($column[0] . $row)->getValue();
		
		$del_pg_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
		$del_pg_transac = mysql_query("START TRANSACTION");
		$del_pg_excel = mysql_query("DELETE FROM sis_parent_guardian WHERE lrn = '$lrn[$row]'")
										or die("Error: del_pg_excel: ".mysql_error());

		$del_pg_commit = mysql_query("COMMIT");
	}

	for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
	{
		$lrn[$row] = $stu_worksheet->getCell($column[0] . $row)->getValue();
		$sy[$row] = $stu_worksheet->getCell($column[19] . $row)->getValue();

		$get_sy = mysql_query("SELECT year FROM css_school_yr WHERE year = '$sy[$row]'")
							or die("Error get_sy: " .mysql_error());

		$res_sy = mysql_fetch_assoc($get_sy);
		$year = $res_sy['year'];

		$get_rec_id = mysql_query("SELECT rec_id FROM sis_stu_rec, css_school_yr WHERE 
								css_school_yr.sy_id = sis_stu_rec.sy_id AND
								lrn = '$lrn[$row]' AND
								year = '$year'")
								or die("Error get_rec_id: " .mysql_error());

		$rec_id_res = mysql_fetch_assoc($get_rec_id);
		$rec_id = $rec_id_res['rec_id'];

		$chech_grade = mysql_query("SELECT grade_id FROM sis_grade, sis_stu_rec
									WHERE sis_grade.rec_id = sis_stu_rec.rec_id AND
									lrn = '$lrn[$row]'")
								or die("Error check_grade: " .mysql_error());

		if($chech_grade = mysql_query("SELECT grade_id FROM sis_grade, sis_stu_rec
										WHERE sis_grade.rec_id = sis_stu_rec.rec_id AND
										lrn = '$lrn[$row]'")
									or die("Error check_grade: " .mysql_error()) == NULL)
		{

		}
		else
		{
			$del_stu_rec_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
			$del_stu_rec_transac = mysql_query("START TRANSACTION");
	
			$del_grade = mysql_query("DELETE FROM sis_grade WHERE rec_id = $rec_id")
									or die("Error del_grade: " .mysql_error());
	
			$del_stu_rec_commit = mysql_query("COMMIT");
		}
		
		$del_stu_rec_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
		$del_stu_rec_transac = mysql_query("START TRANSACTION");

		$del_stu_rec_excel = mysql_query("DELETE FROM sis_stu_rec WHERE lrn = '$lrn[$row]'")
									or die("Error del_stu_rec_exce: " .mysql_error());

		$del_stu_rec_commit = mysql_query("COMMIT");
	}
	
	for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
	{
		$lrn[$row] = $stu_worksheet->getCell($column[0] . $row)->getValue();
		
		$del_stu_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
		$del_stu_transac = mysql_query("START TRANSACTION");
		$del_stu_excel = mysql_query("DELETE FROM sis_student WHERE lrn = '$lrn[$row]'")
										or die("Error: del_stu_excel: ".mysql_error());

		$del_stu_commit = mysql_query("COMMIT");				
	}
}
else if($action=='drp')
{
	for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
	{
		$lrn[$row] 		= $stu_worksheet->getCell($column[0] . $row)->getValue();
		$drp_date[$row] = $stu_worksheet->getCell($column[2] . $row)->getValue();
		$yr_lvl[$row]   = $stu_worksheet->getCell($column[3] . $row)->getValue();
		$section		= $stu_worksheet->getCell($column[4] . $row)->getValue();

		$drp_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
		$drp_stu_transac = mysql_query("START TRANSCATION");
		$drp_stu = mysql_query("UPDATE sis_student SET drp = '$drp_date[$row]',
								stu_status = 'Dropped Out' WHERE lrn = '$lrn[$row]'")
								or die("Error drp_stu: " .mysql_error());

		$drp_stu_commit = mysql_query("COMMIT");
	}
}
else if($action=='grade')
{
	$no_ww =   $stu_worksheet->getCell($column[5].'2')->getValue();
	$tt_ww =   $stu_worksheet->getCell($column[4].'2')->getValue();
	$no_pt =   $stu_worksheet->getCell($column[5].'3')->getValue();
	$tt_pt =   $stu_worksheet->getCell($column[4].'3')->getValue();
	$tt_qa =   $stu_worksheet->getCell($column[4].'4')->getValue();
	$subject = $stu_worksheet->getCell($column[3].'1')->getValue();
	$quarter = $stu_worksheet->getCell($column[5].'7')->getValue();
	$yr_lvl  = $stu_worksheet->getCell($column[2].'7')->getValue();
	$section = $stu_worksheet->getCell($column[3].'7')->getValue();

	switch ($subject)
	{
		case 'Filipino':
			$ws_ww = 30;
			$ws_pt = 50;
			$ws_qa = 20;
			$subject = 'Fil';
			break;
		case 'Fil':
			$ws_ww = 30;
			$ws_pt = 50;
			$ws_qa = 20;
			$subject = 'Fil';
			break;
		case 'English':
			$ws_ww = 30;
			$ws_pt = 50;
			$ws_qa = 20;
			$subject = 'Eng';
			break;
		case 'Eng':
			$ws_ww = 30;
			$ws_pt = 50;
			$ws_qa = 20;
			$subject = 'Eng';
			break;
		case 'Araling Panlipunan':
			$ws_ww = 30;
			$ws_pt = 50;
			$ws_qa = 20;
			$subject = 'AP';
			break;
		case 'AP':
			$ws_ww = 30;
			$ws_pt = 50;
			$ws_qa = 20;
			$subject = 'AP';
			break;
		case 'Edukasyon sa Pagpapakatao':
			$ws_ww = 30;
			$ws_pt = 50;
			$ws_qa = 20;
			$subject = 'EsP';
			break;
		case 'Esp':
			$ws_ww = 30;
			$ws_pt = 50;
			$ws_qa = 20;
			$subject = 'EsP';
			break;
		case 'EsP':
			$ws_ww = 30;
			$ws_pt = 50;
			$ws_qa = 20;
			$subject = 'EsP';
			break;
		case 'Science':
			$ws_ww = 40;
			$ws_pt = 40;
			$ws_qa = 20;
			$subject = 'Sci';
			break;
		case 'Sci':
			$ws_ww = 40;
			$ws_pt = 40;
			$ws_qa = 20;
			$subject = 'Sci';
			break;
		case 'Mathematics':
			$ws_ww = 40;
			$ws_pt = 40;
			$ws_qa = 20;
			$subject = 'Math';
			break;
		case 'Math':
			$ws_ww = 40;
			$ws_pt = 40;
			$ws_qa = 20;
			$subject = 'Math';
			break;
		case 'MAPEH':
			$ws_ww = 20;
			$ws_pt = 60;
			$ws_qa = 20;
			$subject = 'Mapeh';
			break;
		case 'Mapeh':
			$ws_ww = 20;
			$ws_pt = 60;
			$ws_qa = 20;
			$subject = 'Mapeh';
			break;
		case $yr_lvl<=6:
			$ws_ww = 20;
			$ws_pt = 60;
			$ws_qa = 20;
			$subject = 'EPP';
			break;
		case $yr_lvl>=7 && $yr_lvl<=10:
			$ws_ww = 20;
			$ws_pt = 60;
			$ws_qa = 20;
			$subject = 'TLE';
			break;
	}

	$limit = 0;

	for($row=7;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
	{
		$lrn[$row] = $stu_worksheet->getCell($column[0] . $row)->getValue();
		$sy[$row] = $stu_worksheet->getCell($column[4] . $row)->getValue();

		$tt_ww_score = 0;
		$count = 0;
		$column_count = 6;
		
		while($count<$no_ww)
		{
			$get_score_ww = $stu_worksheet->getCell($column[$column_count] . $row)->getValue();
			$tt_ww_score = $tt_ww_score + $get_score_ww;
			$column_count++;
			$count++;
		}

		$ps_ww = round(($tt_ww_score / $tt_ww) * 100, 2); // Percentage Score Written Work

		$tt_pt_score = 0;
		$count = 0;

		while($count<$no_pt)
		{
			$get_score_pt = $stu_worksheet->getCell($column[$column_count] . $row)->getValue();
			$tt_pt_score = $tt_pt_score + $get_score_pt;
			$column_count++;
			$count++;
		}

		$ps_pt = round(($tt_pt_score / $tt_pt) * 100, 2); // Percentage Score Performance Task

		$ps_qa = $stu_worksheet->getCell($column[$column_count] . $row)->getValue();

		$ps_qa = round(($ps_qa / $tt_qa) * 100, 2); // Percentage Score Quarterly Assessment

		$ws_ww_dec = $ws_ww / 100;
		$ws_ww_score = round(($ps_ww * $ws_ww_dec),2); // Weighted Score Written Work

		$ws_pt_dec = $ws_pt / 100;
		$ws_pt_score = round(($ps_pt * $ws_pt_dec),2); // Weighted Score Performance Task

		$ws_qa_dec = $ws_qa / 100;
		$ws_qa_score = round(($ps_qa * $ws_qa_dec),2); // Weighted Score Quarterly Assessment

		$grade_result = round($ws_ww_score + $ws_pt_score + $ws_qa_score); // Grade Result

		
		if($grade_result>=75)
		{
			$remark = 'Passed';
		}
		elseif($grade_result<75)
		{
			$remark = 'Failed';
		}
		
		$get_section_subject = mysql_query("SELECT SECTION_ID, subject_id FROM css_section, css_subject 
									WHERE SECTION_NAME = '$section' AND YEAR_LEVEL = '$yr_lvl'
									AND subject_name = '$subject'")
								or die("Error get_section: " .mysql_error());

		$res = mysql_fetch_assoc($get_section_subject);
		$section_id = $res['SECTION_ID'];
		$subject_id = $res['subject_id'];
		
		$get_sched_id = mysql_query("SELECT rec_id, sched_id FROM css_schedule, sis_stu_rec 
									WHERE lrn = $lrn[$row]
									AND subject_id  = '$subject_id'
									AND css_schedule.SECTION_ID = '$section_id'
									AND sis_stu_rec.section_id = '$section_id'")
								or die("Error get_sched_id: " .mysql_error());
		
		$sched_id_res = mysql_fetch_assoc($get_sched_id);
		$rec_id = $sched_id_res['rec_id'];
		$sched_id = $sched_id_res['sched_id'];

		$grade_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
		$grade_transac = mysql_query("START TRANSACTION");

		$save_excel_grade = mysql_query("INSERT INTO sis_grade(rec_id, sched_id, grade_val, 
														grade_remarks, sis_grade_quarter)
														
										VALUES('$rec_id', '$sched_id', '$grade_result',
												'$remark', '$quarter')")
									or die("Error save_excel_grade: " .mysql_error());

		$grade_commit = mysql_query("COMMIT");
		$limit++;		
	} // end of for loop
	
	// processing of average grade per subject
	if($quarter == '4th')
	{
		$get_student = mysql_query("SELECT rec_id FROM sis_stu_rec, css_school_yr
									WHERE sis_stu_rec.sy_id = css_school_yr.sy_id
									AND sy_status = 'active'")
								or die("Error get_student: " .mysql_error());

		while($row = mysql_fetch_array($get_student))
		{
			$record = $row['rec_id'];
			$average_grade = mysql_query("SELECT grade_id FROM sis_grade
											WHERE sis_grade_quarter = '4th'
											AND rec_id = '$record'
											AND sched_id = '$sched_id'")
									or die("Error average_grade: " . mysql_error());
			$res = mysql_fetch_assoc($average_grade);
			$grade_id = $res['grade_id'];
			if(!empty($grade_id))
			{
				$get_grade_section = mysql_query("SELECT SUM(grade_val) AS total_grade 
													FROM sis_grade, css_school_yr, sis_stu_rec
													WHERE sis_grade.rec_id = sis_stu_rec.rec_id
													AND sis_stu_rec.sy_id = css_school_yr.sy_id
													AND sis_grade.rec_id = '$record'
													AND sched_id = '$sched_id'
													AND sy_status = 'active'")
										or die("Error get_grade_section: " .mysql_error());

				$res = mysql_fetch_assoc($get_grade_section);
				$grade = $res['total_grade'];
				$ave = round($grade / 4, 2);

				if($ave>=75)
				{
					$remark = 'Passed';
				}
				elseif($ave<75)
				{
					$remark = 'Failed';
				}
				
				$ave_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
				$ave_transac = mysql_query("START TRANSACTION");
		
				$save_ave_grade = mysql_query("INSERT INTO sis_grade(rec_id, sched_id, grade_val,
												grade_remarks, sis_grade_quarter)
												
										VALUES('$record', '$sched_id', '$ave', '$remark', 'Average')")
									or die("Error save_ave_grade: " .mysql_error());

				$ave_commit = mysql_query("COMMIT");		
			}
			else
			{
				
			}
		}	// end of Record ID loop
	}
	else
	{
		header('Location: excel_import.php');
	}	// end of 4th quarter check grade insert

	$get_last_grade_id = mysql_query("SELECT sis_student.lrn AS lrn, sis_grade_quarter 
										FROM sis_stu_rec, sis_student, sis_grade
										WHERE sis_student.lrn = sis_stu_rec.lrn
										AND sis_stu_rec.rec_id = sis_grade.rec_id
										ORDER BY grade_id DESC LIMIT $limit")
								or die("Error get_last_grade_id");

	while($row = mysql_fetch_array($get_last_grade_id))
	{
		if($row['sis_grade_quarter'] == 'Average')
		{
		$lrn = $row['lrn'];
		$get_stu_sched = mysql_query("SELECT css_schedule.sched_id AS sched, sis_stu_rec.rec_id AS rec
		
									FROM css_school_yr, sis_grade, css_section, css_schedule, sis_stu_rec, sis_student,
									css_subject
		
									WHERE sis_grade.sched_id = css_schedule.SCHED_ID
									AND sis_stu_rec.rec_id = sis_grade.rec_id
									AND css_schedule.sy_id = css_school_yr.sy_id
									AND css_schedule.SECTION_ID = css_section.SECTION_ID
									AND sis_student.lrn = sis_stu_rec.lrn
									AND sis_stu_rec.section_id = css_section.SECTION_ID
									AND sis_stu_rec.sy_id = css_school_yr.sy_id
									AND css_schedule.subject_id = css_subject.subject_id
									AND sy_status = 'active' AND sis_student.lrn = '$lrn'
									GROUP BY css_schedule.SCHED_ID")
								or die("Error get_stu_sched: " .mysql_error());
		
		$get_sched_count = mysql_query("SELECT COUNT(css_schedule.sched_id) AS sched_count
		
										FROM css_school_yr, sis_grade, css_section, css_schedule, sis_stu_rec, sis_student,
										css_subject
		
										WHERE sis_grade.sched_id = css_schedule.SCHED_ID
										AND sis_stu_rec.rec_id = sis_grade.rec_id
										AND css_schedule.sy_id = css_school_yr.sy_id
										AND css_schedule.SECTION_ID = css_section.SECTION_ID
										AND sis_student.lrn = sis_stu_rec.lrn
										AND sis_stu_rec.section_id = css_section.SECTION_ID
										AND sis_stu_rec.sy_id = css_school_yr.sy_id
										AND css_schedule.subject_id = css_subject.subject_id
										AND sy_status = 'active' AND sis_student.lrn = '$lrn'
										AND sis_grade.sis_grade_quarter = 'Average'")
								or die("Error get_sched_count: " .mysql_error());
		
		$res = mysql_fetch_assoc($get_sched_count);
		$sched_count = $res['sched_count'];
		$count = 1;
		
			while($row = mysql_fetch_array($get_stu_sched))
			{
				$sched = $row['sched'];
				$record = $row['rec'];
				$check_grade_ave = mysql_query("SELECT sis_grade.grade_val AS val FROM sis_grade
												WHERE sched_id = '$sched'
												AND rec_id = '$record'
												AND sis_grade_quarter = 'Average'")
											or die("Error chech_grade_ave: " .mysql_error());
				$res = mysql_fetch_assoc($check_grade_ave);
				$value = $res['val'];
				if($count==$sched_count)
				{
					$general_ave = mysql_query("SELECT AVG(sis_grade.grade_val) AS grade
					
												FROM css_school_yr, sis_grade, css_section, css_schedule, sis_stu_rec, sis_student,
												css_subject
												WHERE sis_grade.sched_id = css_schedule.SCHED_ID
												AND sis_stu_rec.rec_id = sis_grade.rec_id
												AND css_schedule.sy_id = css_school_yr.sy_id
												AND css_schedule.SECTION_ID = css_section.SECTION_ID
												AND sis_student.lrn = sis_stu_rec.lrn
												AND sis_stu_rec.section_id = css_section.SECTION_ID
												AND sis_stu_rec.sy_id = css_school_yr.sy_id
												AND css_schedule.subject_id = css_subject.subject_id
												AND sy_status = 'active' AND sis_stu_rec.rec_id = '$record'
												AND sis_grade.sis_grade_quarter = 'Average'")
										or die("Error general_ave: " .mysql_error());
					
					$res = mysql_fetch_assoc($general_ave);
					$total = round($res['grade']);

					if($total>=75)
					{
						$remark = 'Passed';
					}
					elseif($total<75)
					{
						$remark = 'Failed';
					}

					$general_auto_commit = mysql_query("SET AUTOCOMMIT = 1");
					$general_transac = mysql_query("START TRANSACTION");

					$save_general_average = mysql_query("INSERT INTO sis_grade(rec_id, grade_val,
														grade_remarks, sis_grade_quarter)
														
														VALUES('$record', '$total', '$remark', 'Final')")
													or die("Error save_general_average: " .mysql_error());

					$general_commit = mysql_query("COMMIT");
				}
				else
				{
					$count++;			
				}
			}
		}
		else
		{
			header('Location: excel_import.php');
		} // end of while loops
	}// end of general average for loop ~ lrn ~
}

header('Location: excel_import.php');