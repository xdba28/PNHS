<?php
require_once '../../Classes/PHPExcel.php';
include_once('../../db_con_i.php');
session_start();
include('../../../../php/_Func.php');
include('../../session.php');

if(isset($_POST['file']))
{
	// file from hidden input
	$file = $_POST['file'];
}
else
{
	header('Location: ../student_list.php');
}


$target_dir = "../../excel/Add Student/"; // excel directory to retrieve files

$target_file = $target_dir . $file;      // excel directory + file name

$excel_file_type = pathinfo($target_file,PATHINFO_EXTENSION); // file path information  (not used though)

$excel_read = PHPExcel_IOFactory::identify($target_file);

$objPHPExcel = PHPExcel_IOFactory::createReader($excel_read); // excel read file

$objPHPExcel->setReadDataOnly(true);

$objPHPExcel = $objPHPExcel->load($target_file); // loading of file to read

$stu_worksheet = $objPHPExcel->getSheet(0); // load specified sheet (first work sheet)



$student_count = 0;

$auto_commit = $mysqli->query("SET AUTOCOMMIT = 1");
$transac = $mysqli->query("START TRANSACTION");

foreach ($stu_worksheet->getRowIterator() as $row)
{
    if(1 == $row->getRowIndex()) continue;
	$rowIndex = $row->getRowIndex();

	// mysqli real escape for security purposes ~~~~~~~~~
	// mysqli_real_escape_string($mysqli, trim( <--  EXCEL DATA  --> ));

	// This code below retrieves EXCEL DATA ~~~~~~
	// $stu_worksheet->getCell('A' . $rowIndex)->getCalculatedValue()


	// DATE data manipulation ~~~~~~~~~
	// date_create( <--  EXCEL DATA  --> ) -----> This makes the Excel data become a DATE data type

	// date_format( <--  DATE CREATE FUNCTION  -->,  'Y-m-d') ---> This makes the date format from excel data SERVER DATABASE acceptable
	// from 1/28/1999 TO 1999-01-28

	// date_format(date_create( <--  EXCEL DATA  --> ), 'Y-m-d')) COMPLETE CODE
	
	$lrn = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('A' . $rowIndex)->getCalculatedValue()));
	$first = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('B' . $rowIndex)->getCalculatedValue()));
	$middle = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('C' . $rowIndex)->getCalculatedValue()));
	$last = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('D' . $rowIndex)->getCalculatedValue()));
	$bday = mysqli_real_escape_string($mysqli, trim(date_format(date_create($stu_worksheet->getCell('E' . $rowIndex)->getCalculatedValue()), 'Y-m-d')));
	$place = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('F' . $rowIndex)->getCalculatedValue()));
	$gender = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('G' . $rowIndex)->getCalculatedValue()));
	$religion = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('H' . $rowIndex)->getCalculatedValue()));
	$m_tounge = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('I' . $rowIndex)->getCalculatedValue()));
	$ethnic = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('J' . $rowIndex)->getCalculatedValue()));
	$status = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('K' . $rowIndex)->getCalculatedValue()));
	$contact = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('L' . $rowIndex)->getCalculatedValue()));
	$elem = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('M' . $rowIndex)->getCalculatedValue()));
	$house_no = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('N' . $rowIndex)->getCalculatedValue()));
	$street = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('O' . $rowIndex)->getCalculatedValue()));
	$brng = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('P' . $rowIndex)->getCalculatedValue()));
	$munic = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('Q' . $rowIndex)->getCalculatedValue()));
	$grade_sec = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('R' . $rowIndex)->getCalculatedValue()));
	$sy = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('S' . $rowIndex)->getCalculatedValue()));
	$date_enroll = mysqli_real_escape_string($mysqli, trim(date_format(date_create($stu_worksheet->getCell('T' . $rowIndex)->getCalculatedValue()), 'Y-m-d')));
	$accelareted = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('U' . $rowIndex)->getCalculatedValue()));
	$cct = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('V' . $rowIndex)->getCalculatedValue()));
	$f_fname = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('W' . $rowIndex)->getCalculatedValue()));
	$f_mname = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('X' . $rowIndex)->getCalculatedValue()));
	$f_lname = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('Y' . $rowIndex)->getCalculatedValue()));
	$f_work = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('Z' . $rowIndex)->getCalculatedValue()));
	$m_fname = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('AA' . $rowIndex)->getCalculatedValue()));
	$m_mname = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('AB' . $rowIndex)->getCalculatedValue()));
	$m_lname = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('AC' . $rowIndex)->getCalculatedValue()));
	$m_work = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('AD' . $rowIndex)->getCalculatedValue()));
	$g_fname = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('AE' . $rowIndex)->getCalculatedValue()));
	$g_mname = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('AF' . $rowIndex)->getCalculatedValue()));
	$g_lname = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('AG' . $rowIndex)->getCalculatedValue()));
	$relation = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('AH' . $rowIndex)->getCalculatedValue()));
	$f_cont = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('AI' . $rowIndex)->getCalculatedValue()));
	$m_cont = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('AJ' . $rowIndex)->getCalculatedValue()));
	$g_cont = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('AK' . $rowIndex)->getCalculatedValue()));


	$add_student = $mysqli->query("INSERT INTO sis_student(lrn, stu_fname, stu_mname, stu_lname,
											sis_b_day, plc_birth, sis_gender, sis_religion, m_tounge, ethnic, stu_status, stu_contact,
												house_no, street, brng, munic, sis_elem, date_enrolled, accelerated, cct_recepient)
												
											VALUES('$lrn', '$first', '$middle', '$last',
											'$bday', '$place', '$gender', '$religion', '$m_tounge', '$ethnic', '$status', '$contact',
												'$house_no', '$street', '$brng', '$munic', '$elem', '$date_enroll', '$accelareted', '$cct')")
										or die("<script>alert('Error in inserting student');</script>" . $mysqli->error);

	$add_parent_guardian = $mysqli->query("INSERT INTO sis_parent_guardian(lrn, sis_f_lname, sis_f_fname, sis_f_mname, sis_f_work,
																				sis_m_lname, sis_m_fname, sis_m_mname, sis_m_work,
																				sis_g_lname, sis_g_fname, sis_g_mname, guardian_relation,
																				f_contact, m_contact, g_contact)
																				
																	VALUES('$lrn', '$f_lname', '$f_fname', '$f_mname', '$f_work',
																					'$m_lname', '$m_fname', '$m_mname', '$m_work',
																					'$g_lname', '$g_fname', '$g_mname', '$relation',
																					'$f_cont', '$m_cont', '$g_cont')")
																		or die("<script>alert('Error in inserting parent/guardian data');</script>" . $mysqli->error);
		
	$get_sy = $mysqli->query("SELECT sy_id FROM css_school_yr WHERE year = '$sy'")
							or die("<script>alert('Error in getting school year');</script>");
										
	$res_sy = $get_sy->fetch_assoc();
	$sy_id = $res_sy['sy_id'];

	$sec_ex = explode("-", $grade_sec);

	$add_get_section = $mysqli->query("SELECT SECTION_ID FROM css_section 
								WHERE YEAR_LEVEL = '$sec_ex[0]' AND SECTION_NAME = '$sec_ex[1]'")
								or die("<script>alert('Error in getting section');</script>");

	$res_sec = $add_get_section->fetch_assoc();
	$sec_id = $res_sec['SECTION_ID'];

	$add_stu_rec = $mysqli->query("INSERT INTO sis_stu_rec(lrn, section_id, sy_id)
													VALUES('$lrn', '$sec_id', '$sy_id')")
								or die("<script>alert('Error in inserting student record');</script>");

	// $stu_full_name = trim($first);
	$ufirst = strtolower(preg_replace('/\s+/', '', $first));
	$ulast = strtolower(preg_replace('/\s+/', '', $last));
	$pass_encry = $ufirst[0] . $ulast . '_pnhs';
	$password = pcrypt($pass_encry, "ecrypt");
	$username = $ufirst . '_' . $lrn;
									
	$add_stu_accoutn = $mysqli->query("INSERT INTO cms_account(cms_username, cms_password, cms_cpasswd, lrn, cms_current_log_date, cms_current_log_time, cms_prev_log_date, cms_prev_log_time, status, superadmin)
													VALUES('$username', '$password', '1', '$lrn', 'NULL', 'NULL', 'NULL', 'NULL', '1', '0')")
											or die($mysqli->error);

	// $select_account = $mysqli->query("SELECT cms_account_ID FROM cms_account, sis_student
	// 								WHERE cms_account.lrn = sis_student.lrn
	// 								AND sis_student.lrn = '$lrn'")
	// 					or die("<script>alert('Error in fetching student account');</script>");

	// $res = $select_account->fetch_assoc();
	// $cms_id = $res['cms_account_ID'];

	// $add_priv = $mysqli->query("INSERT INTO cms_privilege(cms_priv, ims_priv, ipcrms_priv, oes_priv, pims_priv, prs_priv, css_priv, scms_priv,
	// 														sis_priv, frms_priv, cms_account_type, cms_account_id, memo_priv, calendar_priv,
	// 														news_priv, ach_priv, gallery_priv, pms_priv, project_priv, carousel_priv)
	// 							VALUES('1', '0', '0', '1', '1', '0', '0', '1', '1', '1', 'user', '$cms_id', '0', '0', '0', '0', '0', '1', '0', '0')")
	// 					or die("<script>alert('Error in creating privilege for student');</script>");
							
	$student_count++;
}
$commit = $mysqli->query("COMMIT");
?>
<script>
	alert('Successfully added ' + <?php echo $student_count;?> + ' students');
	window.location = '../student_list.php';
</script>