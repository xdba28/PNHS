<?php
include('dummyconnection.php');
error_reporting(0);
require('fpdf.php');

$sec_id=$_GET['sec'];
$dc=$_GET['dc'];
$emp=$_GET['emp'];

$person=$mysqli->query("SELECT concat(p_lname,'_',p_fname) as Name 
FROM pims_personnel
WHERE emp_no=$emp");
$per=$person->fetch_assoc();
$prname=$per['Name']."QuarterlyGrades.pdf";

class PDF extends FPDF
{
    //CellFit function start
    //Cell with horizontal scaling if text is too wide
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);

        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;

        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }

        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);

        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }

    //Cell with horizontal scaling only if necessary
    function CellFitScale($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,false);
    }

    //Cell with horizontal scaling always
    function CellFitScaleForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,true);
    }

    //Cell with character spacing only if necessary
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }

    //Cell with character spacing always
    function CellFitSpaceForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        //Same as calling CellFit directly
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,true);
    }

    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }

    //CellFit function end
    function Header()
    {
        include('dummyconnection.php');
        $sec_id=$_GET['sec'];
        $dc=$_GET['dc'];
        $emp=$_GET['emp'];
        $subs=$mysqli->query("SELECT concat(p_fname,' ',p_lname) as Name,subject_name,sub_desc,section_name,year_level,year 
        FROM css_subject,css_schedule,css_section,css_school_yr,pims_employment_records,pims_personnel 
        WHERE css_schedule.subject_id=css_subject.subject_id 
        AND css_section.section_id=css_schedule.section_id
        AND css_section.sy_id=css_school_yr.sy_id
        AND pims_employment_records.emp_no=pims_personnel.emp_no
        AND pims_employment_records.emp_rec_id=css_schedule.emp_rec_id
        AND pims_employment_records.emp_no=$emp
        AND css_schedule.sched_id=$sec_id");
        $subr=$subs->fetch_assoc();
        $subject=$subr['subject_name'];
        $desc=$subr['sub_desc'];
        $sectionn=$subr['section_name'];
        $y_lvl=$subr['year_level'];
        $nnname=$subr['Name'];
        $skul=$subr['year'];
        $this->Image('../img/deped_logo.jpg',10,4,25);
        $this->SetFont("Arial","B","12");
        $this->Cell(0,5,"Summary Of Quarterly Grades",0,1,"C");
        $this->ln();
        $this->SetFont("Arial","","10");
        $this->Cell(30,5,"",0,0,"C");
        $this->Cell(20,5,"Region",0,0,"R");
        $this->SetFont("Arial","","8");
        $this->Cell(20,5,"V Bicol",1,0,"C");
        $this->Cell(5,5,"",0,0,"C");
        $this->SetFont("Arial","","10");
        $this->Cell(15,5,"Division",0,0,"R");
        $this->SetFont("Arial","","8");
        $this->Cell(35,5,"Legazpi",1,1,"C");
        $this->Cell(30,5,"",0,0,"C");
        $this->SetFont("Arial","","10");
        $this->Cell(20,5,"School Name",0,0,"R");
        $this->SetFont("Arial","","8");
        $this->Cell(75,5,"PAG-ASA NATIONAL HIGH SCHOOL",1,0,"C");
        $this->Cell(15,5,"",0,0,"C");
        $this->SetFont("Arial","","10");
        $this->Cell(10,5,"School ID",0,0,"R");
        $this->SetFont("Arial","","8");
        $this->Cell(35,5,"8100",1,1,"C");
        $this->Image('../img/pnhs_logo.jpg',170,4,25);
        $this->ln();
        $this->SetFont("Arial","B","9");
        $this->Cell(5,18,"",1,0,"C");
        $this->Cell(60,18,"LEARNER'S NAME",1,0,"C");
        $this->SetFont("Arial","B","7");
        $this->Cell(60,5,"GRADE & SECTION: $y_lvl-$sectionn ",1,0,"L");
        $this->Cell(60,5,"SCHOOL YEAR: $skul",1,1,"L");
        $this->Cell(5,5,"",0,0,"C");
        $this->Cell(60,5,"",0,0,"C");
        $this->Cell(60,5,"TEACHER: $nnname",1,0,"L");
        $this->Cell(60,5,"SUBJECT: $desc",1,1,"L");
        $this->Cell(10,8,"",0,0,"C");
        $this->Cell(55,8,"",0,0,"C");
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 20;
        $this->MultiCell($width,4, "$subject\n1st Quarter",1, 'C');
        $this->SetXY($x + $width, $y);
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 20;
        $this->MultiCell($width,4, "$subject\n2nd Quarter",1, 'C');
        $this->SetXY($x + $width, $y);
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 20;
        $this->MultiCell($width,4, "$subject\n3rd Quarter",1, 'C');
        $this->SetXY($x + $width, $y);
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 20;
        $this->MultiCell($width,4, "$subject\n4th Quarter",1, 'C');
        $this->SetXY($x + $width, $y);
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 20;
        $this->MultiCell($width,4, "FINAL\nGRADE",1, 'C');
        $this->SetXY($x + $width, $y);
        $this->Cell(20,8,"REMARK",1,0,"C");
        $this->ln();
    }
    

    

}



$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',10);
$pdf->SetAutoPageBreak("True",50);    
$pdf->AddPage();


            

//DATA
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(160,160,160);
$pdf->Cell(5,5,"",1,0,"C","TRUE");
$pdf->Cell(60,5,"MALE",1,0,"L","TRUE");
$pdf->Cell(20,5,"",1,0,"C","TRUE");
$pdf->Cell(20,5,"",1,0,"C","TRUE");
$pdf->Cell(20,5,"",1,0,"C","TRUE");
$pdf->Cell(20,5,"",1,0,"C","TRUE");
$pdf->Cell(20,5,"",1,0,"C","TRUE");
$pdf->Cell(20,5,"",1,1,"C","TRUE");
$male=mysqli_query($mysqli,"SELECT DISTINCT sis_student.lrn,sis_student.stu_fname,sis_student.stu_mname,sis_student.stu_lname
                    FROM sis_student,sis_stu_rec,css_section,css_school_yr,css_subject,css_schedule,pims_employment_records
                    WHERE  sis_student.lrn=sis_stu_rec.lrn
                    and sis_stu_rec.section_id=css_section.SECTION_ID
                    and sis_stu_rec.sy_id=css_school_yr.sy_id
                    and css_schedule.subject_id=css_subject.subject_id
                    and sis_student.sis_gender='Male'
                    AND css_schedule.emp_rec_id=pims_employment_records.emp_rec_ID
                    AND css_schedule.SCHED_ID=$sec_id
                    AND css_schedule.section_id=css_section.SECTION_ID
                    ORDER BY sis_student.stu_lname asc");
$mct=1;
while($mrow=mysqli_fetch_assoc($male)){
    $lrn=$mrow['lrn'];
    $temp_sql="SELECT *
        FROM sis_student,sis_stu_rec,css_section,css_school_yr,css_subject,sis_grade,css_schedule
        WHERE  sis_student.lrn=sis_stu_rec.lrn
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id
        and sis_grade.subject_id=css_subject.subject_id
        and css_schedule.subject_id=css_subject.subject_id
        and sis_stu_rec.rec_id=sis_grade.rec_id
        and sis_student.lrn='$lrn'
        AND css_schedule.SCHED_ID=$sec_id";
    $name=$mrow['stu_lname'].", ".$mrow['stu_fname']." ".$mrow['stu_mname'];
    $sql1=" $temp_sql and sis_grade.sis_grade_quarter='1st'";
    $result1=mysqli_query($mysqli,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $gr1=$row1['grade_val'];
    
    $sql1=" $temp_sql and sis_grade.sis_grade_quarter='2nd'";
    $result1=mysqli_query($mysqli,$sql1);
    $row1=mysqli_fetch_assoc($result1);    
    $gr2=$row1['grade_val'];
    
    $sql1=" $temp_sql and sis_grade.sis_grade_quarter='3rd'";
    $result1=mysqli_query($mysqli,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $gr3=$row1['grade_val'];
    
    $sql1=" $temp_sql and sis_grade.sis_grade_quarter='4th'";
    $result1=mysqli_query($mysqli,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $gr4=$row1['grade_val'];
    
    $sql1=" $temp_sql and sis_grade.sis_grade_quarter='Average'";
    $result1=mysqli_query($mysqli,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $gr5=$row1['grade_val'];
    
    $pdf->Cell(5,5,"$mct",1,0,"C");
    $pdf->Cell(60,5,"$name",1,0,"C");
    $pdf->Cell(20,5,"$gr1",1,0,"C");
    $pdf->Cell(20,5,"$gr2",1,0,"C");
    $pdf->Cell(20,5,"$gr3",1,0,"C");
    $pdf->Cell(20,5,"$gr4",1,0,"C");
    $pdf->Cell(20,5,"$gr5",1,0,"C");
    if($gr5<="74" && !empty($gr5)){
        $pdf->SetFillColor(255,40,0);
        $pdf->Cell(20,5,"FAILED",1,1,"C","TRUE");
    }else if($gr5>"74" && !empty($gr5)){
        $pdf->Cell(20,5,"PASSED",1,1,"C");
    }else{
        $pdf->Cell(20,5,"",1,1,"C");
    }
                           
    $mct++;
    } 

//FEMALE DATA
$pdf->SetFillColor(160,160,160);
$pdf->Cell(5,5,"",1,0,"C","TRUE");
$pdf->Cell(60,5,"FEMALE",1,0,"L","TRUE");
$pdf->Cell(20,5,"",1,0,"C","TRUE");
$pdf->Cell(20,5,"",1,0,"C","TRUE");
$pdf->Cell(20,5,"",1,0,"C","TRUE");
$pdf->Cell(20,5,"",1,0,"C","TRUE");
$pdf->Cell(20,5,"",1,0,"C","TRUE");
$pdf->Cell(20,5,"",1,1,"C","TRUE");
$female=mysqli_query($mysqli,"SELECT DISTINCT sis_student.lrn,sis_student.stu_fname,sis_student.stu_mname,sis_student.stu_lname
                    FROM sis_student,sis_stu_rec,css_section,css_school_yr,css_subject,css_schedule,pims_employment_records
                    WHERE  sis_student.lrn=sis_stu_rec.lrn
                    and sis_stu_rec.section_id=css_section.SECTION_ID
                    and sis_stu_rec.sy_id=css_school_yr.sy_id
                    and css_schedule.subject_id=css_subject.subject_id
                    and sis_student.sis_gender='Female'
                    AND css_schedule.emp_rec_id=pims_employment_records.emp_rec_ID
                    AND css_schedule.SCHED_ID=$sec_id
                    AND css_schedule.section_id=css_section.SECTION_ID
                    ORDER BY sis_student.stu_lname asc");
$fct=1;
while($frow=mysqli_fetch_assoc($female)){
    $lrn=$frow['lrn'];
    $temp_sql="SELECT *
        FROM sis_student,sis_stu_rec,css_section,css_school_yr,css_subject,sis_grade,css_schedule
        WHERE  sis_student.lrn=sis_stu_rec.lrn
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id
        and sis_grade.subject_id=css_subject.subject_id
        and css_schedule.subject_id=css_subject.subject_id
        and sis_stu_rec.rec_id=sis_grade.rec_id
        and sis_student.lrn='$lrn'
        AND css_schedule.SCHED_ID=$sec_id";
    $name=$frow['stu_lname'].", ".$frow['stu_fname']." ".$frow['stu_mname'];
    $sql1=" $temp_sql and sis_grade.sis_grade_quarter='1st'";
    $result1=mysqli_query($mysqli,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $gr1=$row1['grade_val'];
    
    $sql1=" $temp_sql and sis_grade.sis_grade_quarter='2nd'";
    $result1=mysqli_query($mysqli,$sql1);
    $row1=mysqli_fetch_assoc($result1);    
    $gr2=$row1['grade_val'];
    
    $sql1=" $temp_sql and sis_grade.sis_grade_quarter='3rd'";
    $result1=mysqli_query($mysqli,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $gr3=$row1['grade_val'];
    
    $sql1=" $temp_sql and sis_grade.sis_grade_quarter='4th'";
    $result1=mysqli_query($mysqli,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $gr4=$row1['grade_val'];
    
    $sql1=" $temp_sql and sis_grade.sis_grade_quarter='Average'";
    $result1=mysqli_query($mysqli,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $gr5=$row1['grade_val'];
    
    $pdf->Cell(5,5,"$fct",1,0,"C");
    $pdf->Cell(60,5,"$name",1,0,"C");
    $pdf->Cell(20,5,"$gr1",1,0,"C");
    $pdf->Cell(20,5,"$gr2",1,0,"C");
    $pdf->Cell(20,5,"$gr3",1,0,"C");
    $pdf->Cell(20,5,"$gr4",1,0,"C");
    $pdf->Cell(20,5,"$gr5",1,0,"C");
    if($gr5<="74" && !empty($gr5)){
        $pdf->SetFillColor(255,40,0);
        $pdf->Cell(20,5,"FAILED",1,1,"C","TRUE");
    }else if($gr5>"74" && !empty($gr5)){
        $pdf->Cell(20,5,"PASSED",1,1,"C");
    }else{
        $pdf->Cell(20,5,"",1,1,"C");
    }
                           
    $fct++;
    }

header('Content-disposition: attachment; filename="'.$prname.'"');  
$pdf->Output('I',$prname);
?>
