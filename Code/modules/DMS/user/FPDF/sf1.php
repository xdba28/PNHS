<?php
include('dummyconnection.php');
require('fpdf.php');
$emp_no=$_GET['emp'];
    $dc=$_GET['dc'];
$sec_id=$_GET['sec'];
date_default_timezone_set('Asia/Manila');
$date=date("Y-m-d");
$person=$mysqli->query("SELECT concat(p_lname,'_',p_fname) as Name 
FROM pims_personnel
WHERE emp_no=$emp_no");
$per=$person->fetch_assoc();
$name=$per['Name']."_SchoolFileOne.pdf";
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
            $emp_no=$_GET['emp'];
            $sec=$_GET['sec'];
            $adv=$mysqli->query("SELECT year,section_name,year_level 
            FROM css_section,css_school_yr
            WHERE css_section.sy_id=css_school_yr.sy_id
            AND section_id=$sec");
            $adr=$adv->fetch_assoc();
            $sy=$adr['year'];
            $sname=$adr['section_name'];
            $grade=$adr['year_level'];
           // $this->Image('../docs/img/deped1.png',15,6,25);
            $this->SetFont("Times","","20");
            $this->Cell(0,5,"School Form 1 (SF1) School Register",0,1,"C");
            $this->SetFont('Times','','8');
            $this->Cell(0,5,"(This replaces Form 1, Master List & STSForm 2-Family Background and Profile)",0,1,"C");
            $this->Ln(5);
            $this->Cell(35,5,"",0,0,"L");

            $this->SetFont('Arial','','10');
            $this->Cell(25,5,"School ID       :",0,0,"L");
            $this->Cell(20,5,"1003267",1,0,"C");

            $this->SetFont('Arial','','10');
            $this->Cell(15,5,"Region : ",0,0,"L");
            $this->Cell(25,5,"V",1,0,"C");
            $this->Cell(10,5,"",0,0,"L");

            $this->Cell(25,5,"Division        :",0,0,"L");
            $this->Cell(55,5," Legazpi City ",1,0,"C");

            $this->ln();

            $this->Cell(35,5,"",0,0,"L");
            $this->Cell(25,5,"School Name :",0,0,"L");
            $this->SetFont('Arial','');
            $this->Cell(60,5,"Pag-Asa National High School",1,0,"C");

            $this->SetFont('Arial','','10');
            $this->Cell(10,5,"",0,0,"L");
            $this->Cell(25,5,"School Year :",0,0,"L");
            $this->Cell(25,5," $sy",1,0,"C");
            $this->Cell(15,5,"Grade: ",0,0,"L");
            $this->Cell(15,5,"$grade ",1,0,"C");
            $this->Cell(19,5,"",0,0,"L");
            $this->Cell(20,5," Section :",0,0,"L");
            $this->Cell(30,5,"$sname",1,0,"C");
            $this->ln();

            $this->SetFont('Arial','','6');
            $this->Cell(15,7,"","LTR",0,"C");//LRN
            $this->Cell(32,7,"","LTR",0,"C");//Name
            $this->Cell(6,7,"","LTR",0,"C");//Sex
            $this->Cell(15,7,"","LTR",0,"C");//Bday
            $this->Cell(10,7,"","LTR",0,"C");//Age
            $this->Cell(10,7,"","LTR",0,"C");//Mother Tongue
            $this->Cell(8,7,"","LTR",0,"C");//IP
            $this->Cell(15,7,"","LTR",0,"C");//Religion
            $this->Cell(66,7,"Address",1,0,"C");
            $this->Cell(40,7,"Parents",1,0,"C");
            $this->Cell(32,7,"Guardians",1,0,"C");
            $this->Cell(15,7,"","LTR",0,"C");
            $this->Cell(15,7,"Remarks",1,0,"C");
            $this->ln();
            $this->Cell(15,15,"LRN","LRB",0,"C");
            $y = $this->GetY();
            $x = $this->GetX();
            $width = 32;
            $this->MultiCell($width,5, "NAME\n(Last Name, First Name, Middle Name)", "LRB", 'C');
            $this->SetXY($x + $width, $y);
            $y = $this->GetY();
            $x = $this->GetX();
            $width = 6;
            $this->MultiCell($width,5,"Sex\n(M/F)","LRB","C");
            $this->SetXY($x + $width, $y);
            $y = $this->GetY();
            $x = $this->GetX();
            $width = 15;
            $this->MultiCell($width,7.5,"Birthdate\n(mm/dd/yyyy)","LRB","C");
            $this->SetXY($x + $width, $y);
            $y = $this->GetY();
            $x = $this->GetX();
            $width = 10;
            $this->MultiCell($width,3,"Age\n as of 1st \nFriday of June","LRB","C");
            $this->SetXY($x + $width, $y);
            $y = $this->GetY();
            $x = $this->GetX();
            $width = 10;
            $this->MultiCell($width,3,"Mother Tongue\n(Grade 1 to 3 only)","LRB","C");
            $this->SetXY($x + $width, $y);
            $y = $this->GetY();
            $x = $this->GetX();
            $width = 8;
            $this->MultiCell($width,2.5,"IP\n\n(Ethnic Group)","LRB","C");
            $this->SetXY($x + $width, $y);
            $y = $this->GetY();
            $x = $this->GetX();
            $width = 15;
            $this->Cell($width,15,"Religion","LRB",0,"C");
            $y = $this->GetY();
            $x = $this->GetX();
            $width = 12;
            $this->MultiCell($width,3.8,"House#/\nStreet/\nSitio/\nPurok","LRB","C");
            $this->SetXY($x + $width, $y);
            $this->Cell(20,15,"Barangay","LRB",0,"C");
            $this->Cell(20,15,"Municipality/City","LRB",0,"C");
            $this->Cell(14,15,"Province","LRB",0,"C");
            $y = $this->GetY();
            $x = $this->GetX();
            $width = 20;
            $this->MultiCell($width,3,"Father's\nName\n (Last Name, \nFirst Name, \nMiddle Name)","LRB","C");
            $this->SetXY($x + $width, $y);
            $y = $this->GetY();
            $x = $this->GetX();
            $width = 20;
            $this->MultiCell($width,3,"Mother's Maiden Name\n(Last Name,\nFirst Name,\nMiddle Name)","LRB","C");
            $this->SetXY($x + $width, $y);
            $this->Cell(17,15,"Name","LRB",0,"C");
            $this->Cell(15,15,"Relationship","LRB",0,"C");
            $y = $this->GetY();
            $x = $this->GetX();
            $width = 15;
            $this->MultiCell($width,5,"Contact # of \nParent or Gurdian","LRB","C");
            $this->SetXY($x + $width, $y);
            $y = $this->GetY();
            $x = $this->GetX();
            $width = 15;
            $this->MultiCell($width,3.7,"(Please refer\nto the legend\non the last page)","LRB","C");

        }//Header
    
    function Footer()
    {
        date_default_timezone_set('Asia/Manila');
        $date=date("l, M d,Y");
        include('dummyconnection.php');
        $emp_no=$_GET['emp'];
        $adv=$mysqli->query("SELECT concat(p_fname,' ',p_lname) as Name FROM pims_personnel WHERE emp_no=$emp_no");
        $adr=$adv->fetch_assoc();
        $prn=$mysqli->query("SELECT concat(p_fname,' ',p_lname) as Name 
        FROM pims_personnel,pims_job_title ,pims_employment_records
        WHERE pims_job_title.job_title_code=pims_employment_records.job_title_code
        AND pims_personnel.emp_no=pims_employment_records.emp_no
        ANd role_type='Principal' AND work_stat!='RETIRED'");
        $prr=$prn->fetch_assoc();
        $adviser=$adr['Name'];
        $principal=$prr['Name'];
        // Go to 1.5 cm from bottom
        $this->SetY(-50);
        // Select Arial italic 8
        $this->SetFont('Arial','',12);
        // Print centered page number
        $this->Cell(130,6,'List and Code of Indicators under REMARKS column',0,0,'C');
        $this->ln();
        $this->SetFont('Arial','B',8);
        $this->Cell(20,6,'Indicator',1,0,'L');
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 6;
        $this->MultiCell($width,3,'Code',1,'L');
        $this->SetXY($x + $width, $y);
        $this->Cell(45,6,'Required Information',1,0,'L');
        $this->Cell(22,6,'Indicator',1,0,'L');
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 7;
        $this->MultiCell($width,3,'Code',1,'L');
        $this->SetXY($x + $width, $y);
        $this->Cell(45,6,'Required Information',1,0,'L');
        $this->Cell(5,6,'',0,0,'L');
        $this->Cell(20,6,'REGISTERED',1,0,'L');
        $this->Cell(12,6,'BoSY',1,0,'L');
        $this->Cell(12,6,'EoSY',1,0,'L');
        $this->Cell(5,6,'',0,0,'L');
        $this->Cell(35,6,'Prepared by:',0,0,'L');
        $this->Cell(5,6,'',0,0,'L');
        $this->Cell(35,6,'Certified Correct',0,0,'L');
        $this->ln();
        $this->SetFont('Arial','B',6);
        $this->Cell(20,8,'Tranfered Out',"TLR",0,'L');
        $this->Cell(6,8,'T/O',"TLR",0,'L');
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 45;
        $this->MultiCell($width,4,"Name of Public(P) Private(PR)\nSchool & Effectivity Date","TLR",'L');
        $this->SetXY($x + $width, $y);
        $this->Cell(22,8,'CCT Receipient',"TLR",0,'L');
        $this->Cell(7,8,'CCT',"TLR",0,'L');
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 45;
        $this->MultiCell($width,4,"CCT Control/reference number &\nEffectivity Date","TLR",'L');
        $this->SetXY($x + $width, $y);
        $this->Cell(5,6,'',0,0,'L');
        $this->Cell(20,8,'Male',1,0,'C');
        $this->Cell(12,8,'N',0,0,'C');
        $this->Cell(12,8,'N',0,0,'C');
        $this->Cell(5,8,'',0,0,'L');
        $this->Cell(35,8,"$adviser","B",0,'C');
        $this->Cell(5,8,'',0,0,'C');
        $this->Cell(35,8,"$principal","B",0,'C');
        $this->ln();
        $this->Cell(20,6,'Tranfered In',"LR",0,'L');
        $this->Cell(6,6,'T/I',"LR",0,'L');
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 45;
        $this->MultiCell($width,3,"Name of Public(P) Private(PR)\nSchool & Effectivity Date","LR",'L');
        $this->SetXY($x + $width, $y);
        $this->Cell(22,6,'Balik Aral',"LR",0,'L');
        $this->Cell(7,6,'B/A',"LR",0,'L');
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 45;
        $this->MultiCell($width,6,"Name of school last attended & Year","LR",'L');
        $this->SetXY($x + $width, $y);
        $this->Cell(5,6,'',0,0,'L');
        $this->Cell(20,6,'Female',1,0,'C');
        $this->Cell(12,6,'N',0,0,'C');
        $this->Cell(12,6,'N',0,0,'C');
        $this->Cell(5,6,'',0,0,'L');
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 35;
        $this->MultiCell($width,4,"(Signature of Adviser over\nPrintedName)",0,'C');
        $this->SetXY($x + $width, $y);
        $this->Cell(5,6,'',0,0,'C');
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 35;
        $this->MultiCell($width,4,"(Signature of School Head over\nPrintedName)",0,'C');
        $this->SetXY($x + $width, $y);
        $this->ln();
        $this->Cell(20,12,'Dropped',"LRB",0,'L');
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 6;
        $this->MultiCell($width,4,"DRP\nLE","LRB",'C');
        $this->SetXY($x + $width, $y);
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 45;
        $this->MultiCell($width,6,"Reason and Effectivity Date\nReason(Enrollment beyond 1st friday of)","LRB",'L');
        $this->SetXY($x + $width, $y);
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 22;
        $this->MultiCell($width,4,"Learner With\nDisability Accelerated","LRB",'L');
        $this->SetXY($x + $width, $y);
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 7;
        $this->MultiCell($width,6,'LWDACL',"LRB",'L');
        $this->SetXY($x + $width, $y);
        $y = $this->GetY();
        $x = $this->GetX();
        $width = 45;
        $this->MultiCell($width,12,"Specify Level & Efficiency Date","LRB",'L');
        $this->SetXY($x + $width, $y);
        $this->Cell(5,12,'',0,0,'L');
        $this->Cell(20,12  ,'TOTAL',"LRB",0,'C');
        $this->Cell(12,10,'N',0,0,'C');
        $this->Cell(12,10,'N',0,0,'C');
        $this->Cell(5,10,'',0,0,'L');
        $y = $this->GetY();
        $x = $this->GetX();
        $this->Cell(17.5,12,'BoSy Date','B',0,'B');
        $this->Cell(17.5,12,'EoSy Date','B',0,'B');
        $this->Cell(5,12,'',0,0,'C');
        $this->Cell(17.5,12,'BoSy Date','B',0,'B');
        $this->Cell(17.5,12,'EoSy Date','B',0,'B');
        $this->ln();
        $this->Setfont("Arial","",8);
        $this->Cell(25,10,"Generated on: $date",0,0,'B');
        //$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }//fOOTER

}



$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',7.5);
$pdf->AddPage();
$pdf->SetAutoPageBreak("True",50);
   
//MALE

$sql="SELECT * FROM sis_student,sis_parent_guardian,sis_stu_rec,css_section,css_school_yr 
        WHERE sis_student.lrn=sis_parent_guardian.lrn 
        and sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_student.sis_gender='Male'
        and css_section.SECTION_ID=$sec_id
        ORDER BY sis_student.stu_lname asc";
$result=mysqli_query($mysqli,$sql);
$nboys=mysqli_num_rows($result);
//$ctb=0;
while($row=mysqli_fetch_assoc($result))
{  
            
                $lrn=$row['lrn'];  
                $pdf->Cell(15,5,"$lrn",1,0,"C");
                
                
                $l_name=$row['stu_lname'];
                $f_name=$row['stu_fname'];
                $m_name=$row['stu_mname'];
                $pdf->CellFitScale(32,5,"$l_name, $f_name $m_name",1,0,"C");
                
         
                
                $pdf->Cell(6,5,"M",1,0,"C");
                  $bbday=strtotime($row['sis_b_day']); 
                    $bday= date("m/d/Y",$bbday);
                $pdf->Cell(15,5,"$bday",1,0,"C");
                $now=time();
                $dif=$now-$bbday;  
                $age=floor($dif/31556926);
                $pdf->Cell(10,5,"$age",1,0,"C");
                
                $m_tounge=$row['m_tounge'];
                $pdf->CellFitScale(10,5,"$m_tounge",1,0,"C");
                
             
                $ethnic= $row['ethnic'];  
                $pdf->Cell(8,5,"$ethnic",1,0,"C");
        
                $religion=$row['sis_religion'];  
                $pdf->CellFitScale(15,5,"$religion ",1,0,"C");
                
                $street=$row['street'];   
                $pdf->CellFitScale(12,5,"$street ",1,0,"C");
                
                 $brng=$row['brng'];
                $pdf->CellFitScale(20,5,"$brng",1,0,"C");
                
               $munic=$row['munic'];
                $pdf->Cell(20,5,"$munic",1,0,"C");
                
               
                $pdf->Cell(14,5,"Albay",1,0,"C");
                
                 $father=$row['sis_f_fname']." ".$row['sis_f_mname'].",".$row['sis_f_fname'];  
                $pdf->CellFitScale(20,5," $father",1,0,"C");
                
              $mother=$row['sis_m_fname']." ".$row['sis_m_mname'].",".$row['sis_m_fname']; 
                $pdf->CellFitScale(20,5," $mother",1,0,"C");
                
                $guardian =$row['sis_g_fname'];
                $pdf->CellFitScale(17,5," $guardian",1,0,"C");
                
                 $guardian_rel=$row['guardian_relation'];
                $pdf->Cell(15,5," $guardian_rel",1,0,"C");
                
                $contact=$row['f_contact'];  
                $pdf->CellFitScale(15,5," $contact",1,0,"C");
                
                 
                $pdf->Cell(15,5,"REMARKS",1,1,"C");
                /*
               $ctb++;
                if($ctb==20){
                    $pdf->ln();
                    $pdf->ln();
                    $pdf->ln();
                    $pdf->ln();
                    $pdf->ln();
                    $pdf->ln();
                    $ctb=0;
                }*/
}  


                $pdf->Cell(15,5,"$nboys",1,0,"C");
                

                $pdf->Cell(32,5,"<=== TOTAL MALE",1,0,"L");
                
               
                $pdf->Cell(6,5," ",1,0,"C");
                
               
                $pdf->Cell(15,5,"",1,0,"C");
                
               
                $pdf->Cell(10,5,"",1,0,"C");
                
              
                $pdf->Cell(10,5,"",1,0,"C");
                
               
                $pdf->Cell(8,5,"",1,0,"C");
                
               
                $pdf->Cell(15,5,"",1,0,"C");
                
              
                $pdf->Cell(12,5,"",1,0,"C");
                
               
                $pdf->Cell(20,5,"",1,0,"C");
                
               
                $pdf->Cell(20,5,"",1,0,"C");
                
              
                $pdf->Cell(14,5,"",1,0,"C");
                
             
                $pdf->Cell(20,5,"",1,0,"C");
                
             
                $pdf->Cell(20,5,"",1,0,"C");
                
               
                $pdf->Cell(17,5,"",1,0,"C");
                
               
                $pdf->Cell(15,5,"",1,0,"C");
                
              
                $pdf->Cell(15,5,"",1,0,"C");
                
               
                $pdf->Cell(15,5,"",1,1,"C");
           
//FEMALE

$sql="SELECT * FROM sis_student,sis_parent_guardian,sis_stu_rec,css_section,css_school_yr 
        WHERE sis_student.lrn=sis_parent_guardian.lrn 
        and sis_student.lrn=sis_stu_rec.lrn 
        and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id 
        and sis_student.sis_gender='Female'
        and css_section.SECTION_ID=$sec_id
        ORDER BY sis_student.stu_lname asc";
$result=mysqli_query($mysqli,$sql);
$ngirls=mysqli_num_rows($result);

while($row=mysqli_fetch_assoc($result))
{  
            
                $lrn=$row['lrn'];  
                $pdf->Cell(15,5,"$lrn",1,0,"C");
                
                
                $l_name=$row['stu_lname'];
                $f_name=$row['stu_fname'];
                $m_name=$row['stu_mname'];
                $pdf->CellFitScale(32,5,"$l_name, $f_name $m_name",1,0,"C");
                
         
                
                $pdf->Cell(6,5,"F",1,0,"C");
                
                  $bbday=strtotime($row['sis_b_day']); 
                    $bday= date("m/d/Y",$bbday);
                $pdf->Cell(15,5,"$bday",1,0,"C");
                
                $now=time();
                $dif=$now-$bbday;  
                $age=floor($dif/31556926);
                $pdf->Cell(10,5,"$age",1,0,"C");
                
                $m_tounge=$row['m_tounge'];
                $pdf->CellFitScale(10,5,"$m_tounge",1,0,"C");
                
             
                $ethnic= $row['ethnic'];  
                $pdf->Cell(8,5,"$ethnic",1,0,"C");
        
                $religion=$row['sis_religion'];  
                $pdf->CellFitScale(15,5,"$religion ",1,0,"C");
                
                $street=$row['street'];   
                $pdf->CellFitScale(12,5,"$street ",1,0,"C");
                
                 $brng=$row['brng'];
                $pdf->CellFitScale(20,5,"$brng",1,0,"C");
                
               $munic=$row['munic'];
                $pdf->Cell(20,5,"$munic",1,0,"C");
                
               
                $pdf->Cell(14,5,"Albay",1,0,"C");
                
                 $father=$row['sis_f_fname']." ".$row['sis_f_mname'].",".$row['sis_f_fname'];  
                $pdf->CellFitScale(20,5," $father",1,0,"C");
                
              $mother=$row['sis_m_fname']." ".$row['sis_m_mname'].",".$row['sis_m_fname'];  
                $pdf->CellFitScale(20,5," $mother",1,0,"C");
                
                $guardian =$row['sis_g_fname'];
                $pdf->CellFitScale(17,5," $guardian",1,0,"C");
                
                 $guardian_rel=$row['guardian_relation'];
                $pdf->Cell(15,5," $guardian_rel",1,0,"C");
                
                $contact=$row['f_contact'];  
                $pdf->CellFitScale(15,5," $contact",1,0,"C");
                
                 
                $pdf->Cell(15,5,"REMARKS",1,1,"C");
                
                
             
         
  
 
}  


                $pdf->Cell(15,5,"$ngirls",1,0,"C");
                

                $pdf->Cell(32,5,"<=== TOTAL FEMALE",1,0,"L");
                
               
                $pdf->Cell(6,5," ",1,0,"C");
                
               
                $pdf->Cell(15,5,"",1,0,"C");
                
               
                $pdf->Cell(10,5,"",1,0,"C");
                
              
                $pdf->Cell(10,5,"",1,0,"C");
                
               
                $pdf->Cell(8,5,"",1,0,"C");
                
               
                $pdf->Cell(15,5,"",1,0,"C");
                
              
                $pdf->Cell(12,5,"",1,0,"C");
                
               
                $pdf->Cell(20,5,"",1,0,"C");
                
               
                $pdf->Cell(20,5,"",1,0,"C");
                
              
                $pdf->Cell(14,5,"",1,0,"C");
                
             
                $pdf->Cell(20,5,"",1,0,"C");
                
             
                $pdf->Cell(20,5,"",1,0,"C");
                
               
                $pdf->Cell(17,5,"",1,0,"C");
                
               
                $pdf->Cell(15,5,"",1,0,"C");
                
              
                $pdf->Cell(15,5,"",1,0,"C");
                
               
                $pdf->Cell(15,5,"",1,1,"C");
                
$total= $nboys+$ngirls;
 $pdf->Cell(15,5,"$total",1,0,"C");
                

                $pdf->Cell(32,5,"<=== TOTAL",1,0,"L");
                
               
                $pdf->Cell(6,5," ",1,0,"C");
                
               
                $pdf->Cell(15,5,"",1,0,"C");
                
               
                $pdf->Cell(10,5,"",1,0,"C");
                
              
                $pdf->Cell(10,5,"",1,0,"C");
                
               
                $pdf->Cell(8,5,"",1,0,"C");
                
               
                $pdf->Cell(15,5,"",1,0,"C");
                
              
                $pdf->Cell(12,5,"",1,0,"C");
                
               
                $pdf->Cell(20,5,"",1,0,"C");
                
               
                $pdf->Cell(20,5,"",1,0,"C");
                
              
                $pdf->Cell(14,5,"",1,0,"C");
                
             
                $pdf->Cell(20,5,"",1,0,"C");
                
             
                $pdf->Cell(20,5,"",1,0,"C");
                
               
                $pdf->Cell(17,5,"",1,0,"C");
                
               
                $pdf->Cell(15,5,"",1,0,"C");
                
              
                $pdf->Cell(15,5,"",1,0,"C");
                
               
                $pdf->Cell(15,5,"",1,1,"C");
                   



$pdf->Output('I',$name);
?>
