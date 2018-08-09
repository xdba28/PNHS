<?php
require('fpdf.php');
include("dummyconnection.php");
$sec_id=$_GET['sec'];
$emp=$_GET['emp'];
$dc=$_GET['dc'];
$sfinfo=mysqli_query($mysqli,"SELECT section_name,year_level,year,school_id FROM css_section,css_school_yr,pims_employment_records WHERE css_section.sy_id=css_school_yr.sy_id AND css_section.emp_rec_id=pims_employment_records.emp_rec_id AND css_section.section_id=$sec_id");
$sfrow=mysqli_fetch_assoc($sfinfo);
$sy=$sfrow['year'];
$YEAR_LEVEL=$sfrow['year_level'];
$SECTION_NAME=$sfrow['section_name'];
class PDF extends FPDF
{
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
    

    function Header(){
        include("dummyconnection.php");
        $sec_id=$_GET['sec'];
        $emp=$_GET['emp'];
        $dc=$_GET['dc'];
        $sfinfo=mysqli_query($mysqli,"SELECT section_name,year_level,year,school_id FROM css_section,css_school_yr,pims_employment_records WHERE css_section.sy_id=css_school_yr.sy_id AND css_section.emp_rec_id=pims_employment_records.emp_rec_id AND css_section.section_id=$sec_id");
        $sfrow=mysqli_fetch_assoc($sfinfo);
        $sy=$sfrow['year'];
        $YEAR_LEVEL=$sfrow['year_level'];
        $SECTION_NAME=$sfrow['section_name'];
        $this->Image('../../docs/img/pnhs_logo.png',15,6,25);
        $this->SetFont("Times","","17");
        $this->Cell(30,10,'',0,0,'C');
        $this->Cell(220,10,'School Form 5 (SF 5) Report on Promotion and Level of Proficiency & Achievement',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','I', 9);
        $this->Cell(0,3,'(This replaces Forms 18-E1, 18-E2, 18A and List of Graduates)',0,0,'C',false);
        $this->Image('../../docs/img/deped1.png',255,6,25);
        $this->Ln();
        $this->Cell(35,5,"",0,0,"L");
        $this->ln();
        $this->Cell(45,5,"",0,0,"L");
        $this->SetFont('Arial','','10');
        $this->Cell(15,5,"Region ",0,0,"L");
        $this->Cell(25,5,"Region V",1,0,"C");
        $this->Cell(7,5,"",0,0,"L");
        $this->Cell(18,5,"Division",0,0,"L");
        $this->Cell(40,5," Legazpi City ",1,0,"C");
        $this->ln();

        $this->Cell(41,5,"",0,0,"L");
        $this->Cell(19,5,"School ID ",0,0,"L");
        $this->SetFont('Arial','');
        $this->Cell(25,5,"302261",1,0,"C");
        $this->SetFont('Arial','','10');
        $this->Cell(25,5,"School Year",0,0,"L");
        $this->Cell(40,5,"$sy",1,0,"C");
        $this->Cell(10,5,"",0,0,"L");
        $this->Cell(27,5,"Curriculum",0,0,"L");
        $this->Cell(30,5," ",1,0,"C");
        $this->ln();

        $this->Cell(35,5,"",0,0,"L");
        $this->Cell(25,5,"School Name",0,0,"L");
        $this->SetFont('Arial','');
        $this->Cell(90,5,"Pag-Asa National High School",1,0,"C");

        $this->SetFont('Arial','','10');
        $this->Cell(10,5,"",0,0,"L");
        $this->Cell(27,5,"Grade Level",0,0,"L");
        $this->Cell(30,5,"Grade $YEAR_LEVEL(Year 1) ",1,0,"C");
        $this->Cell(15,5," Section",0,0,"L");
        $this->Cell(30,5,"$SECTION_NAME",1,0,"C");
        $this->ln();
        $this->SetFont('Arial','B','8');
        $this->Cell(30,7,"","LTR",0,"C");//LRN
        $this->Cell(65,7,"","LTR",0,"C");//Name
        $this->Cell(23,7,"","LTR",0,"C");//General Ave
        $this->Cell(31,7,"","LTR",0,"C");//Action
        $this->Cell(33,7,"","LTR",0,"C");//Did not
        $this->Cell(5,6,'',0,0,'L');
        /*$this->Cell(75,7,"SUMMARY TABLE",1,0,"C"); */
        $this->ln();
        $this->Cell(30,15,"LRN","LRB",0,"C");
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 65;
        $this->MultiCell($width,5, "\nLEARNER'S NAME\n(Last Name, First Name, Middle Name)", "LRB", 'C');
        $this->SetXY($x + $width, $y);
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 23;
        $this->MultiCell($width,5,"\nGeneral \n Average","LRB","C");
        $this->SetXY($x + $width, $y);
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 31;
        $this->MultiCell($width,3.7, "ACTION TAKEN:\nPROMOTED,\nCONDITIONAL\nor RETAINED", "LRB", 'C');
        $this->SetXY($x + $width, $y);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetFont('Arial','','8');
        $width = 33;
        $this->MultiCell($width,3, "Did Not Meet \nExpectations of the ff. Learning Area/s as of\n end of current School Year", "LRB", 'C');
    }
    function Footer(){
        include("dummyconnection.php");
        $sec_id=$_GET['sec'];
        $emp=$_GET['emp'];
        $dc=$_GET['dc'];
        $sql="SELECT COUNT(sis_gender) as Male FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade
        WHERE  sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_stu_rec.rec_id=sis_grade.rec_id
        and sis_student.sis_gender='Male'
        and sis_stu_rec.section_id=$sec_id
        and sis_grade.sis_grade_quarter='Final'
        and sis_grade.grade_remarks='Passed' ";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $male=$row['Male'];


        //FEMALE
         $sql="SELECT COUNT(sis_gender) as Female FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade,css_schedule
        WHERE  sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_stu_rec.rec_id=sis_grade.rec_id
        AND sis_grade.sched_id=css_schedule.sched_id
        and sis_student.sis_gender='Female'
        and sis_stu_rec.section_id=$sec_id
        and sis_grade.sis_grade_quarter='Final'
        and sis_grade.grade_remarks='Passed' ";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $female=$row['Female'];

        //TOTAL

        $total= $female + $male;
        $this->SetY(-167);
        $this->SetFont("Arial","B","8");
        $this->Cell(187,5,"",0,0,"C");
        $this->Cell(79,5,"SUMMARY TABLE",1,0,"C");
        $this->ln();
        $this->Cell(187,5,"",0,0,"C");
        $this->Cell(25,5,"STATUS",1,0,"C");
        $this->Cell(21,5,"MALE",1,0,"C");
        $this->Cell(20,5,"FEMALE",1,0,"C");
        $this->Cell(13,5,"TOTAL",1,0,"C");
        $this->ln();
        $this->Cell(187,5,"",0,0,"C");
        $this->Cell(25,5,"PROMOTED",1,0,"C");
        $this->Cell(21,5,"$male",1,0,"C");
        $this->Cell(20,5,"$female",1,0,"C");
        $this->Cell(13,5,"$total",1,0,"C");
        $this->ln();
        
        
        $this->Cell(187,5,"",0,0,"C");
        $this->SetFont("Arial","I","6");
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 25;
        $this->MultiCell($width,2.5,"CONDITIONALLY\nPROMOTED",1,"C");
        $this->SetXY($x + $width, $y);
        $this->SetFont("Arial","B","8");
        $this->Cell(21,5,"0",1,0,"C");
        $this->Cell(20,5,"0",1,0,"C");
        $this->Cell(13,5,"0",1,0,"C");
        $this->ln();
        
        //MALE 
        $sql="SELECT COUNT(sis_gender) as Male FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade,css_schedule
        WHERE  sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_stu_rec.rec_id=sis_grade.rec_id
        AND sis_grade.sched_id=css_schedule.sched_id
        and sis_student.sis_gender='Male'
        and sis_stu_rec.section_id=$sec_id
        and sis_grade.sis_grade_quarter='Final'
        and sis_grade.grade_remarks='Failed'";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $male=$row['Male'];


        //FEMALE
         $sql="SELECT COUNT(sis_gender) as Female FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade,css_schedule
        WHERE  sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_stu_rec.rec_id=sis_grade.rec_id
        AND sis_grade.sched_id=css_schedule.sched_id
        and sis_student.sis_gender='Female'
        and sis_stu_rec.section_id=$sec_id
        and sis_grade.sis_grade_quarter='Final'
        and sis_grade.grade_remarks='Failed' ";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $female=$row['Female'];

        //TOTAL

        $total= $female + $male;
        $this->Cell(187,5,"",0,0,"C");
        $this->Cell(25,5,"RETAINED",1,0,"C");
        $this->Cell(21,5,"$male",1,0,"C");
        $this->Cell(20,5,"$female",1,0,"C");
        $this->Cell(13,5,"$total",1,0,"C");
        $this->ln();
        $this->Cell(187,2,"",0,0,"C");
        $this->ln();
        
        $this->Cell(187,5,"",0,0,"C");
        $this->Cell(79,5,"LEVEL OF PROGRESS AND ACHIEVEMENT",1,0,"C");
        $this->ln();
        $this->Cell(187,5,"",0,0,"C");
        $this->SetFont("Arial","B","6");
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 25;
        $this->MultiCell($width,2.5,"DISCRIPTOR &\nGRADING",1,"C");
        $this->SetXY($x + $width, $y);
        $this->SetFont("Arial","B","8");
        $this->Cell(21,5,"MALE",1,0,"C");
        $this->Cell(20,5,"FEMALE",1,0,"C");
        $this->Cell(13,5,"TOTAL",1,0,"C");
        $this->ln();
        
        //MALE 
        $sql="SELECT COUNT(sis_gender) as Male FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade,css_schedule
        WHERE  sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_stu_rec.rec_id=sis_grade.rec_id
        AND sis_grade.sched_id=css_schedule.sched_id
        and sis_student.sis_gender='Male'
        and sis_stu_rec.section_id=$sec_id
        and sis_grade.sis_grade_quarter='Final'
        and sis_grade.grade_remarks='Failed'";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $male=$row['Male'];


        //FEMALE
         $sql="SELECT COUNT(sis_gender) as Female FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade,css_schedule
        WHERE  sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_stu_rec.rec_id=sis_grade.rec_id
        AND sis_grade.sched_id=css_schedule.sched_id
        and sis_student.sis_gender='Female'
        and sis_stu_rec.section_id=$sec_id
        and sis_grade.sis_grade_quarter='Final'
        and sis_grade.grade_remarks='Failed'";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $female=$row['Female'];

        //TOTAL

        $total= $female + $male;
        $this->Cell(187,5,"",0,0,"C");
        $this->SetFont("Arial","B","5");
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 25;
        $this->MultiCell($width,2.5,"Did not meet Expectations\n(74 and Below)",1,"C");
        $this->SetXY($x + $width, $y);
        $this->SetFont("Arial","B","8");
        $this->Cell(21,5,"$male",1,0,"C");
        $this->Cell(20,5,"$female",1,0,"C");
        $this->Cell(13,5,"$total",1,0,"C");
        $this->ln();
        
        //MALE 
        $sql="SELECT COUNT(sis_gender) as Male FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade,css_schedule
        WHERE  sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_stu_rec.rec_id=sis_grade.rec_id
        AND sis_grade.sched_id=css_schedule.sched_id
        and sis_student.sis_gender='Male'
        and sis_stu_rec.section_id=$sec_id
        and sis_grade.sis_grade_quarter='Final'
        and sis_grade.grade_val BETWEEN '75' AND '79' ";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $male=$row['Male'];


        //FEMALE
         $sql="SELECT COUNT(sis_gender) as Female FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade,css_schedule
        WHERE  sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_stu_rec.rec_id=sis_grade.rec_id
        AND sis_grade.sched_id=css_schedule.sched_id
        and sis_student.sis_gender='Female'
        and sis_stu_rec.section_id=$sec_id
        and sis_grade.sis_grade_quarter='Final'
        and sis_grade.grade_val BETWEEN '75' AND '79' ";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $female=$row['Female'];

        //TOTAL

        $total= $female + $male;
        $this->Cell(187,5,"",0,0,"C");
        $this->SetFont("Arial","B","6");
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 25;
        $this->MultiCell($width,2.5,"Fairly Satisfactory\n(75 - 79)",1,"C");
        $this->SetXY($x + $width, $y);
        $this->SetFont("Arial","B","8");
        $this->Cell(21,5,"$male",1,0,"C");
        $this->Cell(20,5,"$female",1,0,"C");
        $this->Cell(13,5,"$total",1,0,"C");
        $this->ln();
        
        //MALE 
        $sql="SELECT COUNT(sis_gender) as Male FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade,css_schedule
        WHERE  sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_stu_rec.rec_id=sis_grade.rec_id
        AND sis_grade.sched_id=css_schedule.sched_id
        and sis_student.sis_gender='Male'
        and sis_stu_rec.section_id=$sec_id
        and sis_grade.sis_grade_quarter='Final'
        and sis_grade.grade_val BETWEEN '80' AND '84'";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $male=$row['Male'];


        //FEMALE
         $sql="SELECT COUNT(sis_gender) as Female FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade,css_schedule
        WHERE  sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_stu_rec.rec_id=sis_grade.rec_id
        AND sis_grade.sched_id=css_schedule.sched_id
        and sis_student.sis_gender='Female'
        and sis_stu_rec.section_id=$sec_id
        and sis_grade.sis_grade_quarter='Final'
        and sis_grade.grade_val BETWEEN '80' AND '84'";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $female=$row['Female'];

        //TOTAL

        $total= $female + $male;
        $this->Cell(187,5,"",0,0,"C");
        $this->SetFont("Arial","B","7");
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 25;
        $this->MultiCell($width,5,"Satisfactory (80-84)",1,"C");
        $this->SetXY($x + $width, $y);
        $this->SetFont("Arial","B","8");
        $this->Cell(21,5,"$male",1,0,"C");
        $this->Cell(20,5,"$female",1,0,"C");
        $this->Cell(13,5,"$total",1,0,"C");
        $this->ln();
        
        //MALE 
        $sql="SELECT COUNT(sis_gender) as Male FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade,css_schedule
        WHERE  sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_stu_rec.rec_id=sis_grade.rec_id
        AND sis_grade.sched_id=css_schedule.sched_id
        and sis_student.sis_gender='Male'
        and sis_stu_rec.section_id=$sec_id
        and sis_grade.sis_grade_quarter='Final'
        and sis_grade.grade_val BETWEEN '85' AND '89'";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $male=$row['Male'];


        //FEMALE
         $sql="SELECT COUNT(sis_gender) as Female FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade,css_schedule
        WHERE  sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_stu_rec.rec_id=sis_grade.rec_id
        AND sis_grade.sched_id=css_schedule.sched_id
        and sis_student.sis_gender='Female'
        and sis_stu_rec.section_id=$sec_id
        and sis_grade.sis_grade_quarter='Final'
        and sis_grade.grade_val BETWEEN '85' AND '89'";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $female=$row['Female'];

        //TOTAL

        $total= $female + $male;
        $this->Cell(187,5,"",0,0,"C");
        $this->SetFont("Arial","B","6");
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 25;
        $this->MultiCell($width,2.5,"Very Satisfactory\n(85-89)",1,"C");
        $this->SetXY($x + $width, $y);
        $this->SetFont("Arial","B","8");
        $this->Cell(21,5,"$male",1,0,"C");
        $this->Cell(20,5,"$female",1,0,"C");
        $this->Cell(13,5,"$total",1,0,"C");
        $this->ln();
        
        //MALE 
        $sql="SELECT COUNT(sis_gender) as Male FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade,css_schedule
        WHERE  sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_stu_rec.rec_id=sis_grade.rec_id
        AND sis_grade.sched_id=css_schedule.sched_id
        and sis_student.sis_gender='Male'
        and sis_stu_rec.section_id=$sec_id
        and sis_grade.sis_grade_quarter='Final'
        and sis_grade.grade_val BETWEEN '90' AND '100'";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $male=$row['Male'];


        //FEMALE
         $sql="SELECT COUNT(sis_gender) as Female FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade,css_schedule
        WHERE  sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_stu_rec.rec_id=sis_grade.rec_id
        AND sis_grade.sched_id=css_schedule.sched_id
        and sis_student.sis_gender='Female'
        and sis_stu_rec.section_id=$sec_id
        and sis_grade.sis_grade_quarter='Final'
        and sis_grade.grade_val BETWEEN '90' AND '100'";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $female=$row['Female'];

        //TOTAL

        $total= $female + $male;
        $this->Cell(187,5,"",0,0,"C");
        $this->SetFont("Arial","B","7");
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 25;
        $this->MultiCell($width,2.5,"Outstanding\n(90-100)",1,"C");
        $this->SetXY($x + $width, $y);
        $this->SetFont("Arial","B","8");
        $this->Cell(21,5,"$male",1,0,"C");
        $this->Cell(20,5,"$female",1,0,"C");
        $this->Cell(13,5,"$total",1,0,"C");
        $this->ln();
        
        $sql="SELECT UCASE(p_lname) as p_lname,UCASE(p_fname) as p_fname,concat(ifnull(substring(p_mname,'1','1'),''),'') as p_mname
        FROM css_section,pims_personnel,pims_employment_records
        WHERE
         pims_personnel.emp_No=pims_employment_records.emp_No
        and pims_employment_records.emp_rec_ID=css_section.emp_rec_id
        and css_section.section_id=$sec_id
        AND pims_personnel.emp_no=$emp";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $adv=$row['p_fname']." ".$row['p_mname'].". ".$row['p_lname'];
        
        $shead=$mysqli->query("SELECT ucase(concat(p_fname,' ',ifnull(concat(substring(p_mname,'1','1'),'. '),' '),p_lname)) as Name FROM pims_employment_records,pims_personnel WHERE pims_personnel.emp_no=pims_employment_records.emp_no AND role_type='Principal'");
        $head=$shead->fetch_assoc();
        $pr=$head['Name'];
        
        $divrep=$mysqli->query("SELECT ucase(concat(p_fname,' ',ifnull(concat(substring(p_mname,'1','1'),'. '),' '),p_lname)) as Name FROM pims_employment_records,pims_personnel,pims_job_title WHERE pims_personnel.emp_no=pims_employment_records.emp_no AND pims_job_title.job_title_code=pims_employment_records.job_title_code AND job_title_name='Division Representative'");
        $div=$divrep->fetch_assoc();
        $dr=$div['Name'];
        
        $this->Cell(187,2,"",0,0,"C");
        $this->ln();
        $this->SetFont("Arial","","8");
        $this->Cell(187,5,"",0,0,"C");
        $this->Cell(79,5,"PREPARED BY:",0,0,"L");
        $this->ln();
        $this->Cell(187,5,"",0,0,"C");
        $this->Cell(79,5,"$adv","B",0,"C");
        $this->ln();
        $this->Cell(187,2,"",0,0,"C");
        $this->SetFont("Arial","I","7");
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 79;
        $this->MultiCell($width,2.5,"Class Adviser\n(Name and Signature)",0,"C");
        $this->SetXY($x + $width, $y);
        $this->SetFont("Arial","","7");
        $this->ln();
        $this->ln();
        $this->Cell(187,5,"",0,0,"C");
        $this->Cell(79,5,"CERTIFIED CORRECT & SUBMITTED BY:",0,0,"L");
        $this->ln();
        $this->Cell(187,5,"",0,0,"C");
        $this->Cell(79,5,"$pr","B",0,"C");
        $this->ln();
        $this->Cell(187,2,"",0,0,"C");
        $this->SetFont("Arial","I","7");
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 79;
        $this->MultiCell($width,2.5,"School Head\n(Name and Signature)",0,"C");
        $this->SetXY($x + $width, $y);
        $this->ln();
        $this->SetFont("Arial","","7");
        $this->Cell(187,5,"",0,0,"C");
        $this->Cell(79,5,"REVIEWED BY:",0,0,"L");
        $this->ln();
        $this->Cell(187,5,"",0,0,"C");
        $this->Cell(79,5,"$dr","B",0,"C");
        $this->ln();
        $this->Cell(187,2,"",0,0,"C");
        $this->SetFont("Arial","I","7");
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 79;
        $this->MultiCell($width,2.5,"(Name and Signature)\nDivision Representative",0,"C");
        $this->SetXY($x + $width, $y);
        $this->SetFont("Arial","","7");
        $this->ln();
        $this->SetFont("Arial","B","7");
        $this->Cell(187,5,"",0,0,"C");
        $this->Cell(79,5,"GUIDELINES:",0,0,"L");
        $this->ln();
        $this->Cell(187,2,"",0,0,"C");
        $this->SetFont("Arial","I","5");
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 79;
        $this->MultiCell($width,3.5,"1. Do not include Dropouts and Transferred Out (D.O.4, 2014)\n2.  To be prepared by the Adviser. Final rating per learning area should be taken\nfrom the record of subject teachers. The class adviser should compute for the\nGeneral Average. (leave it blank for *conditionally promoted).\n3.  On the summary table, reflect the total number of learners PROMOTED\n(Final Grade of at least 75% in ALL learning areas), RETAINED (Did\nnot meet expectations in three (3) or more learning areas) and *CONDITIONALLY\nPROMOTED (*did not meet expectations in not more than two (2) learning areas)\nand the Level of Progress and Achievement according to the individual General\nAverage. All provisions on classroom assessment and the grading system in the\nsaid Order shall be in effect for all grade levels - Deped Order 29, s. 2015.\n4.  Incomplete Learning Areas. The 1st sub-column refers to learning area/s that\nfailed from previous SY but had been completed in the current SY. The 2nd sub-column\npresented the list of learning area/s that did not meet expectation during the\ncurrent SY.5.  Protocols of validation & submission is under the ",0,"L");
        $this->SetXY($x + $width, $y);
        $this->SetFont("Arial","","7");
        $this->ln();
    }
}
$pdf=new PDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetLineWidth(.3);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,4,'Male',1,0,'C',false);
$pdf->Cell(65,4,'',1,0,'C',false);
$pdf->Cell(23,4,'',1,0,'C',false);
$pdf->Cell(31,4,'',1,0,'C',false);
$pdf->Cell(33,4,'',1,0,'C',false);
$pdf->ln();
$sql="SELECT * FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade,css_schedule
    WHERE  sis_student.lrn=sis_stu_rec.lrn 
    and sis_stu_rec.section_id=css_section.SECTION_ID
    and sis_stu_rec.sy_id=css_school_yr.sy_id 
    and sis_stu_rec.rec_id=sis_grade.rec_id
    AND sis_grade.sched_id=css_schedule.sched_id
    and sis_student.sis_gender='Male'
    and sis_stu_rec.section_id=$sec_id
    and sis_grade.sis_grade_quarter='Final'
    ORDER BY sis_student.stu_lname asc";
    $result=mysqli_query($mysqli,$sql);
    $num_rows_male = mysqli_num_rows($result);
    while($row=mysqli_fetch_assoc($result))
    {
        if($row['grade_remarks'] == "Passed"){
            $remarks='PROMOTED';
        }else{
            $remarks='RETAINED';
        }
        $lrn=$row['lrn'];
        $name=$row['stu_lname'].", ".$row['stu_fname']." ".$row['stu_mname'];
        $grade=$row['grade_val'];
        $remarks=$row['grade_remarks'];
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(30,4,"$lrn",1,0,'L',false);
        $pdf->Cell(65,4,"$name",1,0,'L',false);
        $pdf->Cell(23,4,"$grade",1,0,'R',false);
        $pdf->Cell(31,4,"$remarks",1,0,'L',false);
        $pdf->Cell(33,4,'',1,0,'C',false);
        $pdf->Ln();
    }
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,4,"$num_rows_male",1,0,'R',false);
$pdf->Cell(65,4,'<=== TOTAL MALE',1,0,'L',false);
$pdf->Cell(23,4,'',1,0,'R',false);
$pdf->Cell(31,4,'',1,0,'L',false);
$pdf->Cell(33,4,'',1,0,'C',false);

$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,4,'FEMALE',1,0,'C',false);
$pdf->Cell(65,4,'',1,0,'C',false);
$pdf->Cell(23,4,'',1,0,'R',false);
$pdf->Cell(31,4,'',1,0,'L',false);
$pdf->Cell(33,4,'',1,0,'C',false);
$pdf->Ln();
$sql="SELECT * FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade,css_schedule
    WHERE  sis_student.lrn=sis_stu_rec.lrn 
    and sis_stu_rec.section_id=css_section.SECTION_ID
    and sis_stu_rec.sy_id=css_school_yr.sy_id 
    and sis_stu_rec.rec_id=sis_grade.rec_id
    AND sis_grade.sched_id=css_schedule.sched_id
    and sis_student.sis_gender='Female'
    and sis_stu_rec.section_id=$sec_id
    and sis_grade.sis_grade_quarter='Final'
    ORDER BY sis_student.stu_lname asc";
    $result=mysqli_query($mysqli,$sql);
    $num_rows_female = mysqli_num_rows($result);
    while($row=mysqli_fetch_assoc($result))
    {
        if($row['grade_remarks'] == "Passed"){
            $remarks='PROMOTED';
        }else{
            $remarks='RETAINED';
        }
        $lrn=$row['lrn'];
        $name=$row['stu_lname'].", ".$row['stu_fname']." ".$row['stu_mname'];
        $grade=$row['grade_val'];
        $remarks=$row['grade_remarks'];
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(30,4,"$lrn",1,0,'L',false);
        $pdf->Cell(65,4,"$name",1,0,'L',false);
        $pdf->Cell(23,4,"$grade",1,0,'R',false);
        $pdf->Cell(31,4,"$remarks",1,0,'L',false);
        $pdf->Cell(33,4,'',1,0,'C',false);
        $pdf->Ln();
    }
$total=$num_rows_male+$num_rows_female;
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,4,"$num_rows_female",1,0,'R',false);
$pdf->Cell(65,4,'<=== TOTAL FEMALE',1,0,'L',false);
$pdf->Cell(23,4,'',1,0,'C',false);
$pdf->Cell(31,4,'',1,0,'L',false);
$pdf->Cell(33,4,'',1,0,'C',false);
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,4,"$total",1,0,'R',false);
$pdf->Cell(65,4,'<=== COMBINED',1,0,'L',false);
$pdf->Cell(23,4,'',1,0,'R',false);
$pdf->Cell(31,4,'',1,0,'L',false);
$pdf->Cell(33,4,'',1,0,'C',false);




$pdf->output();
?>