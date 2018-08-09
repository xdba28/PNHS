<?php
	include('../func.php');
	include('../php/connection.php');
	include('../php/_Func.php');
	include('../php/_Def.php');
	include('../php/fpdf/fpdf.php');
	$_SESSION['hist'] = $_SERVER['REQUEST_URI'];

	if(isset($_SESSION['user_data'])) {
        $emp=$_SESSION['user_data']['acct']['emp_no'];
        $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
        $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
        $recrow=mysqli_fetch_assoc($rec);
        $recid=$recrow['rec_no'];
		foreach(definePerson($aid) as $key=>$val) {
			if($key=="css") { $css_priv=$val; }
			else if($key=="dms") { $dms_priv=$val; }
			else if($key=="ims") { $ims_priv=$val; }
			else if($key=="ipcr") { $ipcr_priv=$val; }
			else if($key=="pims") { $pims_priv=$val; }
			else if($key=="pms") { $pms_priv=$val; }
			else if($key=="oes") { $oes_priv=$val; }
			else if($key=="prs") { $prs_priv=$val; }
			else if($key=="scms") { $scms_priv=$val; }
			else if($key=="sis") { $sis_priv=$val; }
			else if($key=="user_type") { $user_type=$val; }
			else if($key=="job") { $job_title=$val; }
			else if($key=="emp_type") { $emp_type=$val; }
			else if($key=="dept") { $dept=$val; }
		}
	}
			$y2=date('Y')+1;
			$y=date('Y');
			$sy=$y.'-'.$y2;
			if(isset($_GET['id'])) {
				$id=$_GET['id'];
			}
			else {
				$id="";
			}
			$pdf = new FPDF('P','mm','A4');
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',8);
			$pdf->SetFillColor(0, 153, 255);
			$pdf->SetTextColor(255);
			$pdf->SetDrawColor(0,0,0);
			$pdf->SetLineWidth(.3);
			$pdf->SetFont('','B');
			$pdf->Cell(27.7+6.7,7,'Student ID',1,0,'C',true);
			$pdf->Cell(35.7+19+25.7+6.7,7,'Fullname',1,0,'C',true);
			$pdf->Cell(31.7+6.7+25.4+6.7,7,'Password',1,0,'C',true);
			$pdf->Ln();
			$pdf->SetFont('Arial','B',8);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->SetTextColor(0);
			$cat=$mysqli->query("SELECT * FROM `cms_account` WHERE `lrn` != 'NULL'");
			$rowcount=0;
			while($row=$cat->fetch_assoc()) {
				$id=$row['lrn'];
				$username=$row['cms_username'];
				$password=$row['cms_password'];
				$stu_fname = $stu_mname = $stu_lname = $lrn = $job_title_code = $job_title_name = '';
				$pims_query="SELECT `lrn`, `stu_fname`, `stu_mname`, `stu_lname` FROM `sis_student` WHERE `lrn` = '$id';";
				$get_pims = $mysqli->query($pims_query);
				while($pims = $get_pims->fetch_assoc()) {
					$stu_fname = $pims['stu_fname'];
					$stu_mname = $pims['stu_mname'];
					$stu_lname = $pims['stu_lname'];
					$lrn = $pims['lrn'];
				}
				$pdf->Cell(27.7+6.7,7,$lrn,1,0,'C',true);
				$pdf->Cell(35.7+19+25.7+6.7,7,$stu_lname.', '.$stu_fname.' '.$stu_mname,1,0,'C',true);
				$pdf->Cell(31.7+6.7+25.4+6.7,7,$password,1,0,'C',true);
				$pdf->Ln();
				++$rowcount;
				if($rowcount==37) {
					$pdf->SetFont('Arial','B',8);
					$pdf->SetFillColor(0, 153, 255);
					$pdf->SetTextColor(255);
					$pdf->SetDrawColor(0,0,0);
					$pdf->SetLineWidth(.3);
					$pdf->SetFont('','B');
					$pdf->Cell(27.7+6.7,7,'Student ID',1,0,'C',true);
					$pdf->Cell(35.7+19+25.7+6.7,7,'Fullname',1,0,'C',true);
					$pdf->Cell(31.7+6.7+25.4+6.7,7,'Password',1,0,'C',true);
					$pdf->Ln();
					$pdf->SetFont('Arial','B',8);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->SetTextColor(0);
					$rowcount=0;
				}
			}
			$pdf->Output();
?><?php
	require 'php/connection.php';
	require 'fpdf.php';
	if(isset($_SESSION['user_data'])) {
		$account_type = $_SESSION['user_data']['priv']['cms_account_type'];
		switch($account_type) {
			case 'superadmin':  break;
			case 'admin':  break;
			case 'personnel':  break;
			case 'user':  break;
			case 'student': header(); break;
			default: header('Location: index.php'); break;
		}
		if($_SESSION['user_data']['priv']['cms_priv']==1){
			$y2=date('Y')+1;
			$y=date('Y');
			$sy=$y.'-'.$y2;
			if(isset($_GET['id'])) {
				$id=$_GET['id'];
			}
			else {
				$id="";
			}
			$pdf = new FPDF('P','mm','A4');
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',8);
			$pdf->SetFillColor(0, 153, 255);
			$pdf->SetTextColor(255);
			$pdf->SetDrawColor(0,0,0);
			$pdf->SetLineWidth(.3);
			$pdf->SetFont('','B');
			$pdf->Cell(27.7+6.7,7,'Student ID',1,0,'C',true);
			$pdf->Cell(35.7+19+25.7+6.7,7,'Fullname',1,0,'C',true);
			$pdf->Cell(31.7+6.7+25.4+6.7,7,'Password',1,0,'C',true);
			$pdf->Ln();
			$pdf->SetFont('Arial','B',8);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->SetTextColor(0);
			$cat=$mysqli->query("SELECT * FROM `cms_account` WHERE `lrn` != 'NULL'");
			$rowcount=0;
			while($row=$cat->fetch_assoc()) {
				$id=$row['lrn'];
				$username=$row['cms_username'];
				$password=$row['cms_password'];
				$stu_fname = $stu_mname = $stu_lname = $lrn = $job_title_code = $job_title_name = '';
				$pims_query="SELECT `lrn`, `stu_fname`, `stu_mname`, `stu_lname` FROM `sis_student` WHERE `lrn` = '$id';";
				$get_pims = $mysqli->query($pims_query);
				while($pims = $get_pims->fetch_assoc()) {
					$stu_fname = $pims['stu_fname'];
					$stu_mname = $pims['stu_mname'];
					$stu_lname = $pims['stu_lname'];
					$lrn = $pims['lrn'];
				}
				$pdf->Cell(27.7+6.7,7,$lrn,1,0,'C',true);
				$pdf->Cell(35.7+19+25.7+6.7,7,$stu_lname.', '.$stu_fname.' '.$stu_mname,1,0,'C',true);
				$pdf->Cell(31.7+6.7+25.4+6.7,7,$password,1,0,'C',true);
				$pdf->Ln();
				++$rowcount;
				if($rowcount==37) {
					$pdf->SetFont('Arial','B',8);
					$pdf->SetFillColor(0, 153, 255);
					$pdf->SetTextColor(255);
					$pdf->SetDrawColor(0,0,0);
					$pdf->SetLineWidth(.3);
					$pdf->SetFont('','B');
					$pdf->Cell(27.7+6.7,7,'Student ID',1,0,'C',true);
					$pdf->Cell(35.7+19+25.7+6.7,7,'Fullname',1,0,'C',true);
					$pdf->Cell(31.7+6.7+25.4+6.7,7,'Password',1,0,'C',true);
					$pdf->Ln();
					$pdf->SetFont('Arial','B',8);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->SetTextColor(0);
					$rowcount=0;
				}
			}
			$pdf->Output();
		}
		else {
			header('Location: index.php');
		}
	}
	else {
		header('Location: index.php');
	}
?>