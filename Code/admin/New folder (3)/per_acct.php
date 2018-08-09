<?php
    include('../func.php');
    include('../php/connection.php');
    include('../php/_Func.php');
    include('../php/_Def.php');
    include('../php/fpdf/fpdf.php');
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
            $get_sec_lvlF = $mysqli->real_escape_string($_GET['dep']);
            $this->SetFont('Arial','B','14');
            $this->Cell(0,5,"PAG-ASA National High School",0,1,"C");
            $this->SetFont('Arial','','14');
            $this->Cell(0,5,"Personnel Account List",0,1,"C");
            $this->Ln();
            $departmentq = "SELECT * FROM `pims_department` WHERE `dept_ID` = '$get_sec_lvlF';";
            $departmente = $mysqli->query($departmentq);
            if($departmente->num_rows > 0) {
                while($data = $departmente->fetch_assoc()) {
                    $dtadep = $data['dept_name'];
                }
            }
            $this->Cell(200,10,$dtadep, 1, 1,"C");
            $this->SetFont('Arial','B','10');
            $this->Cell(50,9,"Personnel Number", 1, 0, "C");
            $this->Cell(50,9,"Personnel Name", 1, 0, "C");
            $this->Cell(50,9, "Username", 1, 0, "C");
            $this->Cell(50,9, "Password", 1, 0, "C");
            $this->ln();
        }
    }

    if(isset($_GET['dep'])) {
        $get_sec_lvl = $mysqli->real_escape_string($_GET['dep']);
    }
    else {
        //echo '<script>alert('Empty Year Level and Section'); window.location = "../student/student_list.php"; </script>'
    }
    $ex_get = explode("-", $get_sec_lvl);
    $get_section = $mysqli->query("SELECT pims_department.dept_name , pims_personnel.emp_No , pims_personnel.P_fname, pims_personnel.P_mname, pims_personnel.P_lname, cms_account.cms_username, cms_account.cms_password FROM pims_personnel, pims_employment_records, pims_department, cms_account WHERE pims_department.dept_ID=pims_employment_records.dept_ID AND pims_personnel.emp_No=pims_employment_records.emp_No AND pims_personnel.emp_No=cms_account.emp_no AND pims_department.dept_ID='$get_sec_lvl'")
                                or die("<script>alert('Error getting Student Accounts');window.location = '../student/student_list.php'; </script>");

    $pdf = new PDF('P','mm','Legal');
    $file_name = $get_sec_lvl . ' Student Accounts.pdf';
    $pdf->SetTitle('Personnel Accounts');
    $pdf->SetFont('Arial','',12);
    $pdf->AddPage();
    while($row = mysqli_fetch_array($get_section)) {
        $pasu = pcrypt($mysqli->real_escape_string($row['cms_password']), 'dcrypt');
        $name = $row['P_lname'] . ", " . $row['P_fname'] . " " . $row['P_mname'];
        $pdf->CellFitScale(50, 9, $row['emp_No'], 1, 0, "C");
        $pdf->CellFitScale(50, 9, $name, 1, 0, "C");
        $pdf->CellFitScale(50, 9, $row['cms_username'], 1, 0, "C");
        $pdf->CellFitScale(50, 9, $pasu, 1, 0, "C");
        $pdf->Ln();
    }
    $pdf->Output('', $file_name);
?>