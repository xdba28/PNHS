<?php
include('dummyconnection.php');
require('fpdf.php');

$emp=$_GET['emp'];
$docqg=$mysqli->query("SELECT concat(p_fname,' ',p_lname) as Name,css_schedule.sched_id,subject_name,section_name,year,year_level FROM pims_personnel,pims_employment_records,css_section,css_school_yr,css_subject,css_schedule
WHERE css_section.sy_id=css_school_yr.sy_id
AND css_schedule.section_id=css_section.section_id
AND css_schedule.subject_id=css_subject.subject_id
AND css_schedule.sy_id=css_school_yr.sy_id
AND pims_employment_records.emp_rec_id=css_section.emp_rec_id
AND pims_personnel.emp_no=pims_employment_records.emp_no
AND pims_employment_records.emp_no=$emp");

$temp=$docqg->fetch_assoc();
$chnum=$docqg->num_rows;
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
        $this->Image('../../docs/img/deped1.png',10,4,25);
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
        $this->Cell(75,5,"Pag-Asa National High School",1,0,"C");
        $this->Cell(15,5,"",0,0,"C");
        $this->SetFont("Arial","","10");
        $this->Cell(10,5,"School ID",0,0,"R");
        $this->SetFont("Arial","","8");
        $this->Cell(35,5,"8100",1,1,"C");
        $this->Image('../../docs/img/deped_logo.png',170,4,25);
        $this->ln();
    }
    

}

$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',10);
$pdf->SetAutoPageBreak("True",50);    
$pdf->AddPage();
$nn=0;
$nnn=$docqg->num_rows;
while($qg=mysqli_fetch_assoc($docqg)){
    $sec_id=$qg['sched_id'];
    $yr=$qg['year'];
    $yr_lv=$qg['year_level'];
    $sub_name=$qg['subject_name'];
    $secname=$qg['section_name'];
    $tch_q=$mysqli->query("SELECT concat(p_fname,' ',p_lname) as Name FROM pims_personnel,pims_employment_records,css_section,css_school_yr,css_subject,css_schedule
    WHERE css_section.sy_id=css_school_yr.sy_id
    AND css_schedule.section_id=css_section.section_id
    AND css_schedule.subject_id=css_subject.subject_id
    AND css_schedule.sy_id=css_school_yr.sy_id
    AND pims_employment_records.emp_rec_id=css_schedule.emp_rec_id
    AND pims_personnel.emp_no=pims_employment_records.emp_no
    AND css_schedule.sched_id=$sec_id");
    $tch_r=$tch_q->fetch_assoc();
    $tch=$tch_r['Name'];
    $pdf->SetFont("Arial","B","9");
    $pdf->Cell(5,18,"",1,0,"C");
    $pdf->Cell(60,18,"LEARNER'S NAME",1,0,"C");
    $pdf->SetFont("Arial","B","7");
    $pdf->Cell(60,5,"GRADE & SECTION: $yr_lv - $secname",1,0,"L");
    $pdf->Cell(60,5,"SCHOOL YEAR: $yr",1,1,"L");
    $pdf->Cell(5,5,"",0,0,"C");
    $pdf->Cell(60,5,"",0,0,"C");
    $pdf->Cell(60,5,"TEACHER: $tch",1,0,"L");
    $pdf->Cell(60,5,"SUBJECT: $sub_name",1,1,"L");
    $pdf->Cell(10,8,"",0,0,"C");
    $pdf->Cell(55,8,"",0,0,"C");
    $y = $pdf->GetY();
    $x = $pdf->GetX();
    $width = 20;
    $pdf->MultiCell($width,4, "$subject\n1st Quarter",1, 'C');
    $pdf->SetXY($x + $width, $y);
    $y = $pdf->GetY();
    $x = $pdf->GetX();
    $width = 20;
    $pdf->MultiCell($width,4, "$subject\n2nd Quarter",1, 'C');
    $pdf->SetXY($x + $width, $y);
    $y = $pdf->GetY();
    $x = $pdf->GetX();
    $width = 20;
    $pdf->MultiCell($width,4, "$subject\n3rd Quarter",1, 'C');
    $pdf->SetXY($x + $width, $y);
    $y = $pdf->GetY();
    $x = $pdf->GetX();
    $width = 20;
    $pdf->MultiCell($width,4, "$subject\n4th Quarter",1, 'C');
    $pdf->SetXY($x + $width, $y);
    $y = $pdf->GetY();
    $x = $pdf->GetX();
    $width = 20;
    $pdf->MultiCell($width,4, "FINAL\nGRADE",1, 'C');
    $pdf->SetXY($x + $width, $y);
    $pdf->Cell(20,8,"REMARK",1,0,"C");
    $pdf->ln();
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

        $sql1=" $temp_sql and sis_grade.sis_grade_quarter='Final'";
        $result1=mysqli_query($mysqli,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $gr5=$row1['grade_val'];

        $sql1=" $temp_sql and sis_grade.sis_grade_quarter='Final'";
        $result1=mysqli_query($mysqli,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $gr6=$row1['grade_remarks'];

        $pdf->Cell(5,5,"$mct",1,0,"C");
        $pdf->Cell(60,5,"$name",1,0,"C");
        $pdf->Cell(20,5,"$gr1",1,0,"C");
        $pdf->Cell(20,5,"$gr2",1,0,"C");
        $pdf->Cell(20,5,"$gr3",1,0,"C");
        $pdf->Cell(20,5,"$gr4",1,0,"C");
        $pdf->Cell(20,5,"$gr5",1,0,"C");
        $pdf->Cell(20,5,"$gr6",1,1,"C");

        $mct++;
        } 

    //FEMALE DATA
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

        $sql1=" $temp_sql and sis_grade.sis_grade_quarter='Final'";
        $result1=mysqli_query($mysqli,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $gr5=$row1['grade_val'];

        $sql1=" $temp_sql and sis_grade.sis_grade_quarter='Final'";
        $result1=mysqli_query($mysqli,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $gr6=$row1['grade_remarks'];

        $pdf->Cell(5,5,"$fct",1,0,"C");
        $pdf->Cell(60,5,"$name",1,0,"C");
        $pdf->Cell(20,5,"$gr1",1,0,"C");
        $pdf->Cell(20,5,"$gr2",1,0,"C");
        $pdf->Cell(20,5,"$gr3",1,0,"C");
        $pdf->Cell(20,5,"$gr4",1,0,"C");
        $pdf->Cell(20,5,"$gr5",1,0,"C");
        $pdf->Cell(20,5,"$gr6",1,1,"C");

        $fct++;
        }
    if($nn<$nnn-1){
        $pdf->AddPage();
    }
    $nn++;    
}
$sec_name=$temp['section_name'];
$person=$mysqli->query("SELECT faculty_type,concat(p_lname,'_',p_fname) as Name, concat(p_fname,' ',p_lname) as arch
FROM pims_personnel,pims_employment_records
WHERE pims_personnel.emp_no=pims_employment_records.emp_no
AND pims_employment_records.emp_no=$emp");
$per=$person->fetch_assoc();
$name=$sec_name."_QuerterlyGrades.pdf";        
$folder=$per['arch'];
$type=$per['faculty_type'];
$syqry=$mysqli->query("SELECT year FROM css_school_yr WHERE status='active'");
$syrow=$syqry->fetch_assoc();
$synow=$syrow['year'];
$disk=$_GET['disk'];
if($chnum>0){
    $pdf->Output('F',"$disk://Archive_".$synow."/".$folder."/".$name);
}

$check_adv=$mysqli->query("SELECT css_section.emp_rec_id 
FROM css_section,pims_employment_records,pims_personnel,css_school_yr 
WHERE pims_employment_records.emp_rec_id=css_section.emp_rec_id
AND pims_employment_records.emp_no=pims_personnel.emp_no
AND css_section.sy_id=css_School_yr.sy_id
AND pims_employment_records.emp_no=$emp");
$ch=$check_adv->num_rows;
if($ch>=1){
    echo "<script>window.location.href='archive_mg.php?emp=$emp&disk=$disk';</script>";    
}else{
    mysqli_query($mysqli,"set autocommit=0");
    mysqli_query($mysqli,"start transaction");
    mysqli_query($mysqli,"LOCK TABLES dms_archive WRITE");
    $in=$mysqli->query("INSERT INTO dms_archive(emp_no,arch_date) VALUES($emp,'$date')");
    if($in){
        mysqli_query($mysqli,"COMMIT");
        echo "<script>window.location.href='../arch_alert.php?er=0&su=1';</script>";
    }else{
        mysqli_query($mysqli,"ROLLBACK");
        echo "<script>window.location.href='../arch_alert.php?er=1&su=0';</script>";
    }
    mysqli_query($mysqli,"UNLOCK TABLES"); 
}
?>
