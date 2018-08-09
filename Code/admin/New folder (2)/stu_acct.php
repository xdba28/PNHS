<?php
    include('../func.php');
    include('../php/connection.php');
    include('../php/_Func.php');
    include('../php/_Def.php');
    include('../php/fpdf/fpdf.php');

    if(isset($_GET['lvl_sec'])) {
    	$get_sec_lvl = $_GET['lvl_sec'];
    }
    else {
    	//echo '<script>alert('Empty Year Level and Section'); window.location = "../student/student_list.php"; </script>'
    }
    $ex_get = explode("-", $get_sec_lvl);
    $get_section = $mysqli->query("SELECT sis_student.lrn as lrn, cms_username, cms_password, stu_lname, stu_fname, stu_mname, section_name, year_level 
    								FROM css_section, sis_student, sis_stu_rec, css_school_yr, cms_account
                                    WHERE sis_student.lrn = sis_stu_rec.lrn
                                    AND sis_stu_rec.section_id = css_section.section_id
                                    AND sis_stu_rec.sy_id = css_school_yr.sy_id
    								AND cms_account.lrn = sis_student.lrn
    								AND css_school_yr.status = 'active'
    								AND css_section.section_name = '$ex_get[1]'
    								AND css_section.year_level = '$ex_get[0]'
    								AND cms_account.lrn is NOT NULL")
                                or die("<script>alert('Error getting Student Accounts');window.location = '../student/student_list.php'; </script>");

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
    		$get_sec_lvlF = $_GET['lvl_sec'];
            $this->SetFont('Arial','B','14');
            $this->Cell(0,5,"PAG-ASA National High School",0,1,"C");
            $this->SetFont('Arial','','14');
            $this->Cell(0,5,"Student Account List",0,1,"C");
            $this->Ln();
    		$this->Cell(200,10,"Section: $get_sec_lvlF", 1, 1,"C");
    		$this->SetFont('Arial','B','10');
            $this->Cell(50,9,"Learner's Reference Number", 1, 0, "C");
    		$this->Cell(50,9,"Student Name", 1, 0, "C");
    		$this->Cell(50,9, "Username", 1, 0, "C");
    		$this->Cell(50,9, "Password", 1, 0, "C");
            $this->ln();
        }
    }
    $pdf = new PDF('P','mm','Legal');
    $file_name = $get_sec_lvl . ' Student Accounts.pdf';
    $pdf->SetTitle('Student Accounts');
    $pdf->SetFont('Arial','',12);
    $pdf->AddPage();
    while($row = mysqli_fetch_array($get_section)) {
    	$name = $row['stu_lname'] . ", " . $row['stu_fname'] . " " . $row['stu_mname'];
    	$pdf->CellFitScale(50, 9, $row['lrn'], 1, 0, "C");
    	$pdf->CellFitScale(50, 9, $name, 1, 0, "C");
    	$pdf->CellFitScale(50, 9, $row['cms_username'], 1, 0, "C");
    	$pdf->CellFitScale(50, 9, $row['cms_password'], 1, 0, "C");
    	$pdf->Ln();
    }
    $pdf->Output('', $file_name);
?>