<?php
require_once '../../Classes/PHPExcel.php';
include_once('../../db_con_i.php');
session_start();
include('../../session.php');
include('../../../../php/_Func.php');
if($_POST['lrn'] == "")
{
	?>
	<script>
		alert('No LRN inputted!');
		window.location = "../add.php";
	</script>
	<?php
}
elseif($_POST['section'] == "none")
{
	?>
	<script>
		alert('Choose a section!');
		window.location = "../add.php";
	</script>
	<?php

}
elseif(!is_numeric($_POST['lrn']))
{
	?>
	<script>
		alert('LRN inputed is not numeric!');
		window.location = '../add.php';
	</script>
	<?php
}
elseif(strlen($_POST['lrn']) > 10)
{
	?>
	<script>
		alert('LRN is greater than 20!');
		window.location = '../add.php';
	</script>
	<?php
}
elseif($_POST['gender'] == "none")
{
	?>
	<script>
		alert('No sex selected!');
		window.location = '../add.php';
	</script>
	<?php
}
else
{

	$val_stu = $mysqli->query("SELECT lrn FROM sis_student")
	or die("Error val_stu: " . $mysqli->error);

	$lrn = $_POST['lrn'];

	while($row = $val_stu->fetch_array())
	{
		if($row['lrn'] == $_POST['lrn'])
		{
			?>
			<script>
				alert('LRN: <?php echo $lrn;?> already exists')
				window.location = "../add.php";
			</script>
			<?php
		}
	}

	if(!empty($_FILES['pic']['name']))
	{
		$target_dir = "../../pics/";
		$name = $_FILES['pic']['name'];
		$target_file = $target_dir . basename($_FILES['pic']['name']);

		$image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));	
		$img = getimagesize($_FILES['pic']['tmp_name']);

		if($img == FALSE)
		{
			?>
			<script>
				alert('File is not an image!');
				window.location = "../update.php?lrn=<?php echo base64_encode($lrn);?>"
			</script>
			<?php
		}

		if($image_type != "jpg" && $image_type != "png" && $image_type != "gif" && $image_type != "jpeg")
		{
			?>
			<script>
				alert('File is not of JPG, JPEG, PNG or GIF format');
				window.location = "../update.php?lrn=<?php echo base64_encode($lrn);?>"
			</script>
			<?php
		}

		move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
	}

	$ufirst = $_POST['first'];
	$umiddle = $_POST['middle'];
	$ulast = $_POST['last'];
	$ubirth = $_POST['birth'];
	$uplc_birth = $_POST['plc_birth'];
	$uhouse_no = $_POST['house_no'];
	$ustreet = $_POST['street'];
	$ubrng = $_POST['brng'];
	$umunic = $_POST['munic'];
	$ugender = $_POST['gender'];
	$ureligion = $_POST['religion'];
	$um_tounge = $_POST['m_tounge'];
	$uethnic = $_POST['ethnic'];
	$usection = $_POST['section'];
	$usy = $_POST['sy'];
	$utransfer_date = $_POST['transfer_date'];
	$uelem = $_POST['elem'];
	$ucontact = $_POST['contact'];
	$uacce = $_POST['acce'];
	$ucct = $_POST['cct'];
	$uf_fname = $_POST['f_fname'];
	$uf_mname = $_POST['f_mname'];
	$uf_lname = $_POST['f_lname'];
	$um_fname = $_POST['m_fname'];
	$um_mname = $_POST['m_mname'];
	$um_lname = $_POST['m_lname'];
	$ug_fname = $_POST['g_fname'];
	$ug_mname = $_POST['g_mname'];
	$ug_lname = $_POST['g_lname'];
	$uf_work = $_POST['f_work'];
	$um_work = $_POST['m_work'];
	$ucont_f = $_POST['cont_f'];
	$ucont_m = $_POST['cont_m'];
	$ucont_g = $_POST['cont_g'];
	$urela = $_POST['rela'];
	$uF_ext = $_POST['F_ext'];
	$uM_ext = $_POST['M_ext'];
	$uG_ext = $_POST['G_ext'];
		
	$first = mysqli_real_escape_string($mysqli, trim($ufirst));
	$middle = mysqli_real_escape_string($mysqli, trim($umiddle));
	$last = mysqli_real_escape_string($mysqli, trim($ulast));
	$birth = mysqli_real_escape_string($mysqli, trim($ubirth));
	$plc_birth = mysqli_real_escape_string($mysqli, trim($uplc_birth));
	$house_no = mysqli_real_escape_string($mysqli, trim($uhouse_no));
	$street = mysqli_real_escape_string($mysqli, trim($ustreet));
	$brng = mysqli_real_escape_string($mysqli, trim($ubrng));
	$munic = mysqli_real_escape_string($mysqli, trim($umunic));
	$gender = mysqli_real_escape_string($mysqli, trim($ugender));
	$religion = mysqli_real_escape_string($mysqli, trim($ureligion));
	$m_tounge = mysqli_real_escape_string($mysqli, trim($um_tounge));
	$ethnic = mysqli_real_escape_string($mysqli, trim($uethnic));
	$section = mysqli_real_escape_string($mysqli, trim($usection));
	$sy = mysqli_real_escape_string($mysqli, trim($usy));
	$transfer_date = mysqli_real_escape_string($mysqli, trim($utransfer_date));
	$elem = mysqli_real_escape_string($mysqli, trim($uelem));
	$contact = mysqli_real_escape_string($mysqli, trim($ucontact));
	$acc = mysqli_real_escape_string($mysqli, trim($uacce));
	$cct = mysqli_real_escape_string($mysqli, trim($ucct));
	$f_fname = mysqli_real_escape_string($mysqli, trim($uf_fname));
	$f_mname = mysqli_real_escape_string($mysqli, trim($uf_mname));
	$f_lname = mysqli_real_escape_string($mysqli, trim($uf_lname));
	$m_fname = mysqli_real_escape_string($mysqli, trim($um_fname));
	$m_mname = mysqli_real_escape_string($mysqli, trim($um_mname));
	$m_lname = mysqli_real_escape_string($mysqli, trim($um_lname));
	$g_fname = mysqli_real_escape_string($mysqli, trim($ug_fname));
	$g_mname = mysqli_real_escape_string($mysqli, trim($ug_mname));
	$g_lname = mysqli_real_escape_string($mysqli, trim($ug_lname));
	$f_work = mysqli_real_escape_string($mysqli, trim($uf_work));
	$m_work = mysqli_real_escape_string($mysqli, trim($um_work));
	$cont_f = mysqli_real_escape_string($mysqli, trim($ucont_f));
	$cont_m = mysqli_real_escape_string($mysqli, trim($ucont_m));
	$cont_g = mysqli_real_escape_string($mysqli, trim($ucont_g));
	$rela = mysqli_real_escape_string($mysqli, trim($urela));
	$F_ext = mysqli_real_escape_string($mysqli, trim($uF_ext));
	$M_ext = mysqli_real_escape_string($mysqli, trim($uM_ext));
	$G_ext = mysqli_real_escape_string($mysqli, trim($uG_ext));

	$date_enroll = date('Y-m-d');

	$sec_ex = explode("-", $section);
}

if(empty($_POST['transfer_date']))
{

	$add_new_student_set_autocommit = $mysqli->query("SET AUTOCOMMIT = 1");
	$add_new_student_transac = $mysqli->query("START TRANSACTION");

	$add_new_student = $mysqli->query("INSERT INTO sis_student(lrn, stu_fname, stu_mname, stu_lname, 
									sis_b_day, plc_birth, sis_gender, sis_religion, m_tounge, ethnic, stu_status, 
									stu_contact, house_no, street, brng, munic, sis_elem, date_enrolled, accelerated, cct_recepient)

						VALUES('$lrn', '$first', '$middle', '$last', '$birth', '$plc_birth',
								'$gender', '$religion', '$m_tounge', '$ethnic', 'Enrolled', '$contact',
								'$house_no', '$street', '$brng', '$munic', '$elem', '$date_enroll', '$acc', '$cct')")
							or die("<script>alert('Error in inserting student');</script>");

	$add_parent = $mysqli->query("INSERT INTO sis_parent_guardian(lrn, sis_f_lname, sis_f_fname, sis_f_mname, sis_f_ext, sis_f_work,
																	   sis_m_lname, sis_m_fname, sis_m_mname, sis_m_ext, sis_m_work,
																	   sis_g_lname, sis_g_fname, sis_g_mname, sis_g_ext, guardian_relation,
																	   f_contact, m_contact, g_contact)
														  VALUES('$lrn', '$f_lname', '$f_fname', '$f_mname', '$F_ext', '$f_work',
																		   '$m_lname', '$m_fname', '$m_mname', '$M_ext', '$m_work',
																		   '$g_lname', '$g_fname', '$g_mname', '$G_ext', '$rela',
																		   '$cont_f', '$cont_m', '$cont_g')")
															or die("<script>alert('Error in inserting parent/guardian info');</script>");
	
	$get_sy = $mysqli->query("SELECT sy_id FROM css_school_yr WHERE year = '$sy'")
								or die("<script>alert('Error in getting school year');</script>");

	$res_sy = $get_sy->fetch_assoc();
	$sy_id = $res_sy['sy_id'];

	$add_get_section = $mysqli->query("SELECT SECTION_ID FROM css_section 
								WHERE YEAR_LEVEL = '$sec_ex[0]' AND SECTION_NAME = '$sec_ex[1]'")
									or die("<script>alert('Error in getting section');</script>");

	$res_sec = $add_get_section->fetch_assoc();
	$sec_id = $res_sec['SECTION_ID'];


	$add_new_stu_rec = $mysqli->query("INSERT INTO sis_stu_rec(lrn, section_id, sy_id)

									VALUES('$lrn', '$sec_id', '$sy_id')")
										or die("<script>alert('Error in inserting student record');</script>");

	$ufirst = strtolower(preg_replace('/\s+/', '', $first));
	$ulast = strtolower(preg_replace('/\s+/', '', $last));
	$pass_encry = $first[0] . $ulast . '_pnhs';
	$password = pcrypt($pass_encry, "ecrypt");
	$username = $ufirst . '_' . $lrn;
									
	$add_stu_accoutn = $mysqli->query("INSERT INTO cms_account(cms_username, cms_password, cms_cpasswd, lrn, cms_current_log_date, cms_current_log_time, cms_prev_log_date, cms_prev_log_time, status, superadmin)
													VALUES('$username', '$password', '1', '$lrn', 'NULL', 'NULL', 'NULL', 'NULL', '1', '0')")
											or die($mysqli->error);
	
	$add_new_stu_rec_commit = $mysqli->query("COMMIT");
	?>
	<script>
		alert('Successfully added student LRN: <?php echo $lrn . " " . $first . " " . $middle . " " . $last;?>')
		window.location = '../student_list.php'
	</script>
	<?php
}
elseif(!empty($_POST['transfer_date']))
{
	$trnsf_stu_set_autocommit = $mysqli->query("SET AUTOCOMMIT = 1");
	$trnsf_stu_transac = $mysqli->query("START TRANSACTION");

	$trnsf_student = $mysqli->query("INSERT INTO sis_student(lrn, stu_fname, stu_mname, stu_lname, 
									sis_b_day, plc_birth, sis_gender, sis_religion, m_tounge, ethnic, stu_status, 
									stu_contact, trnsf_in_date, house_no, street, brng, munic, sis_elem, date_enrolled, accelerated, cct_recepient)

							VALUES('$lrn', '$first', '$middle', '$last', '$birth', '$plc_birth',
									'$gender', '$religion', '$m_tounge', '$ethnic', 'Enrolled', '$contact', '$transfer_date',
									'$house_no', '$street', '$brng', '$munic', '$elem', '$date_enroll', '$acc', '$cct')")
								or die("<script>alert('Error in inserting student');</script>". $mysqli->error);

	$trnsf_add_parent = $mysqli->query("INSERT INTO sis_parent_guardian(lrn, sis_f_lname, sis_f_fname, sis_f_mname, sis_f_ext, sis_f_work,
																	   sis_m_lname, sis_m_fname, sis_m_mname, sis_m_ext, sis_m_work,
																	   sis_g_lname, sis_g_fname, sis_g_mname, sis_g_ext, guardian_relation,
																	   f_contact, m_contact, g_contact)
														VALUES('$lrn', '$f_lname', '$f_fname', '$f_mname', '$F_ext', '$f_work',
																		'$m_lname', '$m_fname', '$m_mname', '$M_ext', '$m_work',
																		'$g_lname', '$g_fname', '$g_mname', '$G_ext', '$rela',
																		'$cont_f', '$cont_m', '$cont_g')")
														or die("<script>alert('Error in inserting parent/guardian info');</script>");

	$trnsf_get_sy = $mysqli->query("SELECT sy_id, year FROM css_school_yr WHERE year = '$sy'")
								or die("<script>Error in getting school year</script>");

	$res_sy = $trnsf_get_sy->fetch_assoc();
	$sy_id = $res_sy['sy_id'];
	$year = $res_sy['year'];
	
	$trnsf_get_section = $mysqli->query("SELECT SECTION_ID FROM css_section 
								WHERE YEAR_LEVEL = '$sec_ex[0]' AND SECTION_NAME = '$sec_ex[1]'")
							or die("<script>alert('Error in getting section');</script>");

	$res_sec = $trnsf_get_section->fetch_assoc();
	$sec_id = $res_sec['SECTION_ID'];

	$trnsf_new_stu_rec = $mysqli->query("INSERT INTO sis_stu_rec(lrn, section_id, sy_id)
										VALUES('$lrn', '$sec_id', '$sy_id')")
										or die("<script>alert('Error in inserting student record');</script>");

	if($sec_ex[0] == 8)
	{
		$sy_ex = explode("-", $sy);
		$sy1_old = $sy_ex[0] - 1;
		$sy2_old = $sy_ex[1] - 1;
		$sy7_imp = array($sy1_old, $sy2_old);
		$sy7 = implode("-", $sy7_imp);
		$g7 = $mysqli->query("SELECT sy_id FROM css_school_yr WHERE year = '$sy7'");
		$res_sy7 = $g7->fetch_assoc();
		$sy_data7 = $res_sy7['sy_id'];

		$insert_g7 = $mysqli->query("INSERT INTO sis_stu_rec(lrn, sy_id)
									VALUES('$lrn', '$sy_data7')")
							or die($mysqli->error);
	}
	elseif($sec_ex[0] == 9)
	{
		$sy_ex = explode("-", $sy);
		$sy1_old = $sy_ex[0] - 1;
		$sy2_old = $sy_ex[1] - 1;
		$sy7_imp = array($sy1_old, $sy2_old);
		$sy7 = implode("-", $sy7_imp);
		$g7 = $mysqli->query("SELECT sy_id FROM css_school_yr WHERE year = '$sy7'");
		$res_sy7 = $g7->fetch_assoc();
		$sy_data7 = $res_sy7['sy_id'];

		$insert_g7 = $mysqli->query("INSERT INTO sis_stu_rec(lrn, sy_id)
									VALUES('$lrn', '$sy_data7')")
							or die($mysqli->error);

		$sy1_old = $sy_ex[0] - 2;
		$sy2_old = $sy_ex[1] - 2;
		$sy8_imp = array($sy1_old, $sy2_old);
		$sy8 = implode("-", $sy8_imp);
		$g8 = $mysqli->query("SELECT sy_id FROM css_school_yr WHERE year = '$sy8'");
		$res_sy8 = $g8->fetch_assoc();
		$sy_data8 = $res_sy8['sy_id'];

		$insert_g8 = $mysqli->query("INSERT INTO sis_stu_rec(lrn, sy_id)
									VALUES('$lrn', '$sy_data8')")
							or die($mysqli->error);
	}
	elseif($sec_ex[0] == 10)
	{
		$sy_ex = explode("-", $sy);
		$sy1_old = $sy_ex[0] - 1;
		$sy2_old = $sy_ex[1] - 1;
		$sy7_imp = array($sy1_old, $sy2_old);
		$sy7 = implode("-", $sy7_imp);
		$g7 = $mysqli->query("SELECT sy_id FROM css_school_yr WHERE year = '$sy7'");
		$res_sy7 = $g7->fetch_assoc();
		$sy_data7 = $res_sy7['sy_id'];

		$insert_g7 = $mysqli->query("INSERT INTO sis_stu_rec(lrn, sy_id)
									VALUES('$lrn', '$sy_data7')")
							or die($mysqli->error);

		$sy1_old = $sy_ex[0] - 2;
		$sy2_old = $sy_ex[1] - 2;
		$sy8_imp = array($sy1_old, $sy2_old);
		$sy8 = implode("-", $sy8_imp);
		$g8 = $mysqli->query("SELECT sy_id FROM css_school_yr WHERE year = '$sy8'");
		$res_sy8 = $g8->fetch_assoc();
		$sy_data8 = $res_sy8['sy_id'];

		$insert_g8 = $mysqli->query("INSERT INTO sis_stu_rec(lrn, sy_id)
									VALUES('$lrn', '$sy_data8')")
							or die($mysqli->error);

		$sy1_old = $sy_ex[0] - 3;
		$sy2_old = $sy_ex[1] - 3;
		$sy9_imp = array($sy1_old, $sy2_old);
		$sy9 = implode("-", $sy9_imp);
		$g9 = $mysqli->query("SELECT sy_id FROM css_school_yr WHERE year = '$sy9'");
		$res_sy9 = $g9->fetch_assoc();
		$sy_data9 = $res_sy9['sy_id'];

		$insert_g9 = $mysqli->query("INSERT INTO sis_stu_rec(lrn, sy_id)
									VALUES('$lrn', '$sy_data9')")
							or die($mysqli->error);
					
	}

	$ufirst = strtolower(preg_replace('/\s+/', '', $first));
	$ulast = strtolower(preg_replace('/\s+/', '', $last));
	$pass_encry = $first[0] . $ulast . '_pnhs';
	$password = pcrypt($pass_encry, "ecrypt");
	$username = $ufirst . '_' . $lrn;

	$add_stu_accoutn = $mysqli->query("INSERT INTO cms_account(cms_username, cms_password, cms_cpasswd, lrn, cms_current_log_date, cms_current_log_time, cms_prev_log_date, cms_prev_log_time, status, superadmin)
													VALUES('$username', '$password', '1', '$lrn', 'NULL', 'NULL', 'NULL', 'NULL', '1', '0')")
											or die($mysqli->error);
									
	if(!empty($_FILES['past']['name']))
	{
		$file_type = $_FILES['past']['type'];
		if($file_type=="application/vnd.ms-excel");
		elseif($file_type=='application/vnd.ms-excel.addin.macroEnabled.12');
		elseif($file_type=='application/vnd.ms-excel.sheet.binary.macroEnabled.12');
		elseif($file_type=='application/vnd.ms-excel.sheet.macroEnabled.12');
		elseif($file_type=='application/vnd.ms-excel.template.macroEnabled.12');
		elseif($file_type=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		else	
		{
			?>
			<script>
				alert('Wrong file type submitted!');
				window.location = "../add.php";
			</script>
			<?php
		}

		$target_dir = "../../excel/Past Grade/"; // excel directory to retrieve files
		$target_file = $target_dir . basename($_FILES["past"]["name"]);      // excel directory + file name
		$excel_file_type = pathinfo($target_file,PATHINFO_EXTENSION); // file path information  (not used though)
		move_uploaded_file($_FILES["past"]["tmp_name"], $target_file);   // excel save in import directory
		$excel_read = PHPExcel_IOFactory::identify($target_file);
		$objPHPExcel = PHPExcel_IOFactory::createReader($excel_read); // excel read file
		$objPHPExcel->setReadDataOnly(true);
		$objPHPExcel = $objPHPExcel->load($target_file); // loading of file to read
		$stu_worksheet7 = $objPHPExcel->getSheet(0); // load specified sheet (first work sheet)
		$stu_worksheet8 = $objPHPExcel->getSheet(1);
		$stu_worksheet9 = $objPHPExcel->getSheet(2);

		if($sec_ex[0] == 8)
		{
			foreach ($stu_worksheet7->getRowIterator() as $row)
			{
				if(1 == $row->getRowIndex()) continue;
				if(10 == $row->getRowIndex()) break;
				$rowIndex = $row->getRowIndex();

				$subject = mysqli_real_escape_string($mysqli, trim($stu_worksheet7->getCell('A' . $rowIndex)->getCalculatedValue()));
				$_1st = mysqli_real_escape_string($mysqli, trim($stu_worksheet7->getCell('B' . $rowIndex)->getCalculatedValue()));
				$_2nd = mysqli_real_escape_string($mysqli, trim($stu_worksheet7->getCell('C' . $rowIndex)->getCalculatedValue()));
				$_3rd = mysqli_real_escape_string($mysqli, trim($stu_worksheet7->getCell('D' . $rowIndex)->getCalculatedValue()));
				$_4th = mysqli_real_escape_string($mysqli, trim($stu_worksheet7->getCell('E' . $rowIndex)->getCalculatedValue()));
				$_Ave = mysqli_real_escape_string($mysqli, trim($stu_worksheet7->getCell('F' . $rowIndex)->getCalculatedValue()));

				$get_subject = $mysqli->query("SELECT subject_id FROM css_subject WHERE sub_desc = '$subject'")
								or die("<script>alert('Error in fetching subject ID');</script>");
				$res = $get_subject->fetch_assoc();
				$subject_id = $res['subject_id'];

				$get_stu_rec = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section
												WHERE sis_stu_rec.section_id = css_section.SECTION_ID
												AND lrn = '$lrn'
												AND section_name = '$sec_ex[1]'
												AND year_level = '$sec_ex[0]'")
										or die("<script>alert('Error in feching student record');</script>");
				$res = $get_stu_rec->fetch_assoc();
				$rec_id = $res['rec_id'];
		
				if($_1st >= 75) $remark_1st = 'Passed';
				elseif($_1st < 75) $remark_1st = 'Failed';

				echo $subject_id . '<br>';

				$in_q_1st = $mysqli->query("INSERT INTO sis_grade(rec_id, subject_id, grade_val, grade_remarks, sis_grade_quarter)
											VALUES('$rec_id', '$subject_id', '$_1st', '$remark_1st', '1st')")
									or die("-1".$mysqli->error);
				
				if($_2nd >= 75) $remark_2nd = 'Passed';
				elseif($_2nd >= 75) $remark_2nd = 'Failed';

				$in_q_2nd = $mysqli->query("INSERT INTO sis_grade(rec_id, subject_id, grade_val, grade_remarks, sis_grade_quarter)
											VALUES('$rec_id', '$subject_id', '$_2nd', '$remark_2nd', '2nd')")
									or die("2".$mysqli->error);

				if($_3rd >= 75) $remark_3rd = 'Passed';
				elseif($_3rd < 75) $remark_3rd = 'Failed';

				$in_q_3rd = $mysqli->query("INSERT INTO sis_grade(rec_id, subject_id, grade_val, grade_remarks, sis_grade_quarter)
											VALUES('$rec_id', '$subject_id', '$_3rd', '$remark_3rd', '3rd')")
									or die("3".$mysqli->error);

				if($_4th >= 75) $remark_4th = 'Passed';
				elseif($_4th < 75) $remark_4th = 'Failed';

				$in_q_4th = $mysqli->query("INSERT INTO sis_grade(rec_id, subject_id, grade_val, grade_remarks, sis_grade_quarter)
											VALUES('$rec_id', '$subject_id', '$_3rd', '$remark_4th', '4th')")
									or die("4".$mysqli->error);

				if($_Ave >= 75) $remark_ave = 'Passed';
				elseif($_Ave < 75) $remark_ave = 'Failed';

				$in_q_4th = $mysqli->query("INSERT INTO sis_grade(rec_id, subject_id, grade_val, grade_remarks, sis_grade_quarter)
											VALUES('$rec_id', '$subject_id', '$_3rd', '$remark_ave', 'Average')")
									or die("5".$mysqli->error);
					
			}
			
			$final = mysqli_real_escape_string($mysqli, trim($stu_worksheet7->getCell('B11')->getCalculatedValue()));

			if($final >= 75) $remarks_f = 'Passed';
			elseif($final >= 75) $remark_f = 'Failed';

			$in_f = $mysqli->query("INSERT INTO sis_grade(rec_id, grade_val, grade_remarks, sis_grade_quarter)
									VALUES('$rec_id', '$final', '$remarks_f', 'Final')")
							or die($mysqli->error);
	}
		elseif($sec_ex[0] == 9)
		{
			foreach ($stu_worksheet8->getRowIterator() as $row)
			{
				if(1 == $row->getRowIndex()) continue;
				if(10 == $row->getRowIndex()) die;
				$rowIndex = $row->getRowIndex();

				$subject = mysqli_real_escape_string($mysqli, trim($stu_worksheet8->getCell('A' . $rowIndex)->getCalculatedValue()));
				$_1st = mysqli_real_escape_string($mysqli, trim($stu_worksheet8->getCell('B' . $rowIndex)->getCalculatedValue()));
				$_2nd = mysqli_real_escape_string($mysqli, trim($stu_worksheet8->getCell('C' . $rowIndex)->getCalculatedValue()));
				$_3rd = mysqli_real_escape_string($mysqli, trim($stu_worksheet8->getCell('D' . $rowIndex)->getCalculatedValue()));
				$_4th = mysqli_real_escape_string($mysqli, trim($stu_worksheet8->getCell('E' . $rowIndex)->getCalculatedValue()));
				$_Ave = mysqli_real_escape_string($mysqli, trim($stu_worksheet8->getCell('F' . $rowIndex)->getCalculatedValue()));

				$get_subject = $mysqli->query("SELECT subject_id FROM css_subject WHERE sub_desc = '$subject'")
								or die("<script>alert('Error in fetching subject ID');</script>");
				$res = $get_subject->fetch_assoc();
				$subject_id = $res['subject_id'];

				$GS_ex = explode("-", $grade_sec);
				$get_stu_rec = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section
												WHERE sis_stu_rec.section_id = css_section.SECTION_ID
												AND lrn = '$lrn'
												AND section_name = '$sec_ex[1]'
												AND year_level = '$sec_ex[0]'")
										or die("<script>alert('Error in feching student record');</script>");
				$res = $get_stu_rec->fetch_assoc();
				$rec_id = $res['rec_id'];
		
				if($_1st >= 75) $remark_1st = 'Passed';
				elseif($_1st < 75) $remark_1st = 'Failed';

				$in_q_1st = $mysqli->query("INSERT INTO sis_grade(rec_id, grade_val, grade_remarks, sis_grade_quarter)
											VALUES('$rec_id', '$_1st', '$remark_1st', '1st')")
									or die($mysqli->error);
				
				if($_2nd >= 75) $remarks_2nd = 'Passed';
				elseif($_2nd >= 75) $remark_2nd = 'Failed';

				$in_q_2nd = $mysqli->query("INSERT INTO sis_grade(rec_id, grade_val, grade_remarks, sis_grade_quarter)
											VALUES('$rec_id', '$_2nd', '$remark_2nd', '2nd')")
									or die($mysqli->error);

				if($_3rd >= 75) $remark_3rd = 'Passed';
				elseif($_3rd < 75) $remark_3rd = 'Failed';

				$in_q_3rd = $mysqli->query("INSERT INTO sis_grade(rec_id, grade_val, grade_remarks, sis_grade_quarter)
											VALUES('$rec_id', '$_3rd', '$remark_3rd', '3rd')")
									or die($mysqli->error);

				if($_4th >= 75) $remark_4th = 'Passed';
				elseif($_4th < 75) $remark_4th = 'Failed';

				$in_q_4th = $mysqli->query("INSERT INTO sis_grade(rec_id, grade_val, grade_remarks, sis_grade_quarter)
											VALUES('$rec_id', '$_3rd', '$remark_4th', '4th')")
									or die($mysqli->error);

			}

			$final = mysqli_real_escape_string($mysqli, trim($stu_worksheet8->getCell('B11')->getCalculatedValue()));

			
		}
	}
	$trnsf_stu_commit = $mysqli->query("COMMIT");
}
?>
<script>
	alert('Successfully added student LRN: <?php echo $lrn . " " . $first . " " . $middle . " " . $last;?>');
	window.location = '../student_list.php'
</script>