<?php
include_once('../../db_con_i.php');
session_start();
include('../../func.php');
include('../../session.php');

$lrn = $_POST['lrn'];

if(!isset($_POST['lrn']))
{
	header('Location: ../student_list.php');
}
elseif($_POST['section'] == "none")
{
	?>
	<script>
		alert('Choose a section!');
		window.location = "../update.php?lrn=<?php echo base64_encode($lrn);?>";
	</script>
	<?php
}
elseif(!is_numeric($_POST['lrn']))
{
	?>
	<script>
		alert('LRN inputed is not numeric!');
		window.location = "../update.php?lrn=<?php echo base64_encode($lrn);?>";
	</script>
	<?php
}
elseif(strlen($_POST['lrn']) > 19)
{
	?>
	<script>
		alert('LRN is greater than 20!');
		window.location = "../update.php?lrn=<?php echo base64_encode($lrn);?>";
	</script>
	<?php
}
elseif($_POST['gender'] == "none")
{
	?>
	<script>
		alert('No sex selected!');
		window.location = "../update.php?lrn=<?php echo base64_encode($lrn);?>";
	</script>
	<?php
}
else
{
	$lrn = $_POST['lrn'];

	$name = $_POST['img'];

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
	$ustatus = $_POST['status'];
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
	$status = mysqli_real_escape_string($mysqli, trim($ustatus));
	$F_ext = mysqli_real_escape_string($mysqli, trim($uF_ext));
	$M_ext = mysqli_real_escape_string($mysqli, trim($uM_ext));
	$G_ext = mysqli_real_escape_string($mysqli, trim($uG_ext));

	$date_enroll = date('Y-m-d');

	$sec_ex = explode("-", $section);

}


$update_student = $mysqli->query("UPDATE sis_student SET 
							sis_image = '$name',
							stu_fname = '$first',
							stu_mname = '$middle', 
							stu_lname = '$last', 
							sis_b_day = '$birth',
							plc_birth = '$plc_birth', 
							sis_gender = '$gender', 
							sis_religion = '$religion',
							m_tounge = '$m_tounge', 
							ethnic = '$ethnic', 
							stu_status = '$status',
							stu_contact = '$contact', 
							house_no = '$house_no',
							street = '$street', 
							brng = '$brng', 
							munic = '$munic',
							sis_elem = '$elem',
							accelerated = '$acc',
							cct_recepient = '$cct'
							WHERE lrn = '$lrn'")
					or die("<script>alert('Error in updating student');</script>" . $mysqli->error);

$update_parent = $mysqli->query("UPDATE sis_parent_guardian SET 
			sis_f_lname = '$f_lname', sis_f_fname = '$f_fname', sis_f_mname = '$f_mname', sis_f_ext = '$F_ext', sis_f_work = '$f_work',
			sis_m_lname = '$m_lname', sis_m_fname = '$m_fname', sis_m_mname='$m_mname', sis_m_ext = '$M_ext', sis_m_work = '$m_work',
			sis_g_lname = '$g_lname', sis_g_fname = '$g_fname', sis_g_mname = '$g_mname', sis_g_ext = '$G_ext',
				guardian_relation = '$rela',
				f_contact = '$cont_f', 
				m_contact = '$cont_m', 
				g_contact = '$cont_g'
				WHERE lrn = '$lrn'")
		or die("<script>alert('Error in upadating student\'s parent information');</script>");
 
$select_section = $mysqli->query("SELECT css_section.SECTION_ID AS id FROM css_section, css_school_yr
								WHERE css_section.sy_id = css_school_yr.sy_id
								AND css_section.SECTION_NAME = '$sec_ex[1]'
								AND css_section.YEAR_LEVEL = '$sec_ex[0]'
								AND status = 'active'")
						or die("<script>alert('Error in fetching section');</script>");

$res = $select_section->fetch_assoc();
$id = $res['id'];

if($id!=NULL)
{
	$update_rec = $mysqli->query("UPDATE sis_stu_rec SET section_id = '$id' WHERE lrn = '$lrn'")
						or die("<script>alert('Error in updating student\'s section');</script>");
}

$commit = $mysqli->query("COMMIT");

if(isset($_POST['grade']))
{
	$subject = mysqli_real_escape_string($mysqli, trim($_POST['subject']));
	$quarter = mysqli_real_escape_string($mysqli, trim($_POST['quarter']));
	$grade = mysqli_real_escape_string($mysqli, trim($_POST['grade']));

	if($grade >= 75)
	{
		$remark = 'Passed';
	}
	elseif($grade < 75)
	{
		$remark = 'Failed';
	}

	$get_subject = $mysqli->query("SELECT subject_id FROM css_subject WHERE sub_desc = '$subject'")
							or die($mysqli->error);
	$res = $get_subject->fetch_assoc();
	$subj_id = $res['subject_id'];

	$get_rec = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section, css_school_yr
						WHERE sis_stu_rec.section_id = css_section.SECTION_ID
						AND sis_stu_rec.sy_id = css_school_yr.sy_id
						AND status = 'active'
						AND sis_stu_rec.lrn = '$lrn'")
				or die($mysqli->error);
	$rec = $get_rec->fetch_assoc();
	$rec_id = $rec['rec_id'];

	$up_grade = $mysqli->query("UPDATE sis_grade SET 
								grade_val = '$grade',
								grade_remarks = '$remark'
								WHERE rec_id = '$rec_id'
								AND subject_id = '$subj_id'
								AND sis_grade_quarter = '$quarter'")
						or die($mysqli->error);
}
?>
<script>
	alert('Succesfully updated <?php echo $lrn . ': ' . $first . ' ' . $middle . ' ' . $last;?>');
	window.location = "../student_pi.php?lrn=<?php echo base64_encode($lrn);?>";
</script>