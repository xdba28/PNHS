<?php
    include('../func.php');
    include('../php/connection.php');
    include('../php/_Func.php');
    include('../php/_Def.php');
    include('../php/fpdf/fpdf.php');
    //echo '<pre>'; echo var_export($_REQUEST); echo '</pre>'; die();
    if(isset($_SESSION['user_data']['acct']['emp_no']) AND $_SESSION['user_data']['priv']['cms_priv']==1 OR $_SESSION['user_data']['priv']['superadmin']==1) {

    }
    else {
    header('Location: ../index.php');
        die();
    }

    class PDF extends FPDF {
        function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true) {
            $str_width=$this->GetStringWidth($txt);
            if($w==0)
                $w = $this->w-$this->rMargin-$this->x;
                $ratio = ($w-$this->cMargin*2)/$str_width;
                $fit = ($ratio < 1 || ($ratio > 1 && $force));
            if ($fit) {
                if ($scale) {
                    $horiz_scale=$ratio*100.0;
                    $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
                }
                else {
                    $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                    $this->_out(sprintf('BT %.2F Tc ET',$char_space));
                }
                $align='';
            }
            $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
            if ($fit)
                $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
        }
        function CellFitScale($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='') {
            $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,false);
        }
        function CellFitScaleForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='') {
            $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,true);
        }
        function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='') {
            $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
        }
        function CellFitSpaceForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='') {
            $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,true);
        }
        function MBGetStringLength($s) {
            if($this->CurrentFont['type']=='Type0') {
                $len = 0;
                $nbbytes = strlen($s);
                for ($i = 0; $i < $nbbytes; $i++) {
                    if (ord($s[$i])<128)
                        $len++;
                    else {
                        $len++;
                        $i++;
                    }
                }
                return $len;
            }
            else
                return strlen($s);
        }
        function Header() {
            include('../php/connection.php');
            $get_sec_lvlF = $mysqli->real_escape_string($_GET['lvl_sec']);
            $this->SetFont('Arial','B','14');
            $this->Cell(0,5,"PAG-ASA National High School",0,1,"C");
            $this->SetFont('Arial','','14');
            $this->Cell(0,5,"Student Account List",0,1,"C");
            $this->Ln();
            if($get_sec_lvlF == 'All') {
                $this->Cell(200,10,'', 1, 1,"C");
            }
            else {
                $this->Cell(200,10,"Section: $get_sec_lvlF", 1, 1,"C");
            }
            $this->SetFont('Arial','B','10');
            $this->Cell(50,9,"Learner's Reference Number", 1, 0, "C");
            $this->Cell(50,9,"Student Name", 1, 0, "C");
            $this->Cell(50,9, "Username", 1, 0, "C");
            $this->Cell(50,9, "Password", 1, 0, "C");
            $this->ln();
        }
    }

    if(isset($_GET['lvl_sec'])) {
    	$get_sec_lvl = $_GET['lvl_sec'];
    }
    else {
    	//echo '<script>alert('Empty Year Level and Section'); window.location = "../student/student_list.php"; </script>'
        header('Location: student_accounts.php');
    }
    $check = array();
    array_push($check, 'All');
    $q = "SELECT SECTION_NAME, YEAR_LEVEL FROM css_section, css_school_yr WHERE css_section.sy_id = css_school_yr.sy_id AND css_school_yr.status = 'active' ORDER BY YEAR_LEVEL ASC;";
    $q_run = $mysqli->query($q);
    if($q_run->num_rows > 0) {
         while($select = $q_run->fetch_assoc()) {
            $a = $select['YEAR_LEVEL'];
            $b = $select['SECTION_NAME'];
            array_push($check, $a."-".$b);
        }
    }
    if(in_array($get_sec_lvl, $check)) {
        //header('Location: student_accounts.php');
    }
    else {
        header('Location: student_accounts.php');
    }
    //echo '<pre>'; echo var_export($get_sec_lvl); echo '</pre>'; die();
    if($get_sec_lvl == 'All') {
        $get_section = $mysqli->query("SELECT sis_student.lrn as lrn, cms_username, cms_password, stu_lname, stu_fname, stu_mname, section_name, year_level FROM css_section, sis_student, sis_stu_rec, css_school_yr, cms_account WHERE sis_student.lrn = sis_stu_rec.lrn AND sis_stu_rec.section_id = css_section.section_id AND sis_stu_rec.sy_id = css_school_yr.sy_id AND cms_account.lrn = sis_student.lrn AND css_school_yr.status = 'active' AND cms_account.lrn is NOT NULL;");
    }
    else {
        $ex_get = explode("-", $get_sec_lvl);
        $get_section = $mysqli->query("SELECT sis_student.lrn as lrn, cms_username, cms_password, stu_lname, stu_fname, stu_mname, section_name, year_level FROM css_section, sis_student, sis_stu_rec, css_school_yr, cms_account WHERE sis_student.lrn = sis_stu_rec.lrn AND sis_stu_rec.section_id = css_section.section_id AND sis_stu_rec.sy_id = css_school_yr.sy_id AND cms_account.lrn = sis_student.lrn AND css_school_yr.status = 'active' AND css_section.section_name = '$ex_get[1]' AND css_section.year_level = '$ex_get[0]' AND cms_account.lrn is NOT NULL;");
    }

    
    $pdf = new PDF('P','mm','Legal');
    $file_name = $get_sec_lvl.' Student Accounts.pdf';
    $pdf->SetTitle('Student Accounts');
    $pdf->SetFont('Arial','',12);
    $pdf->AddPage();
    while($row = $get_section->fetch_assoc()) {
        $pasu = pcrypt($mysqli->real_escape_string($row['cms_password']), 'dcrypt');
        $str='';
        if(!$pasu == '<unknownvalue>') {
            for($cnt1=0; $cnt1<strlen($pasu); ++$cnt1) {
                $str .= '*';
            }
            $pasu = $str;
        }
    	$name = iconv('UTF-8', 'windows-1252', ($row['stu_lname'] . ", " . $row['stu_fname'] . " " . $row['stu_mname']));
    	$pdf->CellFitScale(50, 9, $row['lrn'], 1, 0, "C");
    	$pdf->CellFitScale(50, 9, $name, 1, 0, "C");
    	$pdf->CellFitScale(50, 9, $row['cms_username'], 1, 0, "C");
    	$pdf->CellFitScale(50, 9, $pasu, 1, 0, "C");
    	$pdf->Ln();
        //echo '<pre>'; echo print_r($row); echo '</pre>';
    }
    $pdf->Output('I', $file_name, true);
?>