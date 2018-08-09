<?php
include('dummyconnection.php');
require('fpdf.php');
include("../../curr.php");
$emp_no=$_GET['emp'];
$dc=$_GET['dc'];
$check=$mysqli->query("SELECT servRec_ID,concat(p_fname,' ',p_lname) as Name 
FROM pims_service_records,pims_employment_records,pims_personnel
WHERE pims_personnel.emp_no=pims_employment_records.emp_no
AND pims_employment_records.emp_rec_id=pims_service_records.emp_rec_id
ANd pims_personnel.emp_no=$emp_no");
$chn=$check->num_rows;
$person=$mysqli->query("SELECT concat(p_lname,'_',p_fname) as Name 
FROM pims_personnel
WHERE emp_no=$emp_no");
$per=$person->fetch_assoc();
if($chn==0){
    echo "<script>alert('No available data yet!');window.location='../personnel.php?emp=$emp_no&dc=$dc';</script>";
}else{
    $name=$per['Name']."Service_Record.pdf";

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
        $sql="SELECT emp_no,p_lname,p_fname,concat(ifnull(substring(p_mname,'1','1'),'N/A'),'.') as mname,pims_birthdate,GSIS_No FROM pims_personnel WHERE emp_No='$emp_no'";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($result);
        $dd=strtotime($row['pims_birthdate']);
        $m=date("F",$dd);
        $d=date("d",$dd);
        $y=date("Y",$dd);

        $this->Image('../../docs/img/pnhs_logo.png',25,6,30);
        $this->SetFont("Arial","","10");
        // Title
        $this->Cell(0,5,"Republic of the Philippines",0,1,"C");
        $this->SetFont('Arial','B','10');
        $this->Cell(0,5,"DEPARTMENT OF EDUCATION",0,1,"C");
        $this->Cell(0,5,"REGION V",0,1,"C");
        $this->SetFont("Arial","","10");
        $this->Cell(0,5,"DIVISION OF LEGAZPI CITY",0,1,"C");
        $this->SetFont("Arial","B","10");
        $this->Cell(0,5,"Pag-asa National High School",0,1,"C");
        $this->Ln(5);
        $this->SetFont("Times","B","12");
        $this->Cell(0,5,"SERVICE RECORD",0,1,"C");
        $this->SetFont("Arial","","10");
        $this->Cell(0,5,"(To be accomplished by Employer)",0,1,"C");
        $this->Image('../../docs/img/deped1.png',148,6,30);

        $emp_no=$row['emp_no'];
        $GSIS_no=$row['GSIS_No'];
        $p_fname=$row['p_fname'];
        $p_mname=$row['mname'];
        $p_lname=$row['p_lname'];

    $this->Cell(170,5,"Emp No. :",0,0,"R");
    $this->Cell(20,5,"$emp_no","B",1,"L");
    $this->SetFont('Arial','',10);
    $this->Cell(170,5,"GSIS No. :",0,0,"R");
    $this->Cell(20,5,"$GSIS_no","B",1,"L");

    //NAME
    $this->SetFont('Arial','',8);
    $this->Cell(12,5,"NAME:",0,0,"R");
    $this->Cell(35,5,"$p_lname","B",0,"C");
    $this->Cell(35,5,"$p_fname","B",0,"C");
    $this->Cell(15,5,"$p_mname","B",0,"C");
    $this->Cell(93,5,"(If married woman, give maiden name)",0,1,"L");
    //UNDER NAME

    $this->Cell(12,5,"",0,0,"R");
    $this->Cell(35,5,"(Last)",0,0,"C");
    $this->Cell(35,5,"(First)",0,0,"C");
    $this->Cell(15,5,"(MI)",0,0,"C");
    $this->Cell(93,5,"",0,1,"L");
    //BDAY

    $this->Cell(20,5,"BIRTHDATE:",0,0,"R");
    $this->Cell(77,5," $m $d, $y","B",0,"C");
    $this->Cell(93,5,"(Date herein should be checked from birth or baptismal",0,1,"L");
    //nxtline_BDAY
    $this->Cell(97,5,"",0,0,"C");
    $this->Cell(93,5,"Certificate or some reliable documents)",0,1,"L");
    //TEXT
    $this->Ln(3);
    $this->Cell(190,5,"This is to certify that the  employee named herein above  actually rendered service  in this Office and shown by the service record below each line of",0,1,"R");
    $this->Cell(190,5,"which supported by appointment and other paper actually issued this Office and approved by the authorities concerned.",0,1,"L");

    //Table

    //top
    $this->SetFont('Arial','',8);
    $this->Cell(48,7.5,"SERVICE (Inclusive date)",1,0,"C");
    $this->Cell(63.1,7.5,"RECORD OF APPOINTMENT",1,0,"C");
    $this->Cell(25,15,'OFFICE ENTRY',1,0,"C");
    $this->Cell(26,15,"SOURCE OF FUND",1,0,"C");
    $this->Cell(28,15,"REMARKS",1,0,"C");
    $this->Ln(7.5);
    //below_top
    $this->Cell(24,7.5,"From",1,0,"C");
    $this->Cell(24,7.5,"To",1,0,"C");
    $this->Cell(20.7,7.5,"Designation",1,0,"C");
    $this->Cell(19.7,7.5,"STATUS",1,0,"C");
    $this->Cell(22.7,7.5,"SALARY",1,1,"C");

    }
    
    function Footer()
    {
        include('dummyconnection.php');
        session_start();
        $p1=$_SESSION['user_data']['acct']['emp_no'];
        $sql1="SELECT p_lname,p_fname,concat(ifnull(substring(p_mname,'1','1'),' '),'') as mname,pims_employment_records.job_title_code 
        FROM pims_personnel,pims_employment_records,pims_job_title
        WHERE pims_personnel.emp_no=pims_employment_records.emp_no
        AND pims_employment_records.job_title_code=pims_job_title.job_title_code
        AND pims_employment_records.emp_No='$p1'";
        $result1=mysqli_query($mysqli,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $name1=$row1['p_fname']." ".$row1['mname']." ".$row1['p_lname'];
        $jt1=$row1['job_title_code'];
        $this->SetY(-35);
        $this->SetFont('Arial','',8);
        $this->Cell(95,5,"CHECKED AND VERIFIED BY:",0,0,"C");
        $this->Cell(95,5,"CERTIFIED CORRECT:",0,0,"C");
        $this->Ln(5);
        $this->Cell(95,10,"",0,0,"C");
        $this->Cell(95,10,"",0,0,"C");
        $this->Ln(10);
        $this->Cell(95,5,"$name1",0,0,"C");
        $this->Cell(95,5,"MA. DULCE G. POBRE",0,1,"C");
        $this->Ln(0);
        $this->Cell(95,5,"$jt1, Office of the HRMO",0,0,"C");
        $this->Cell(95,5,"  Administrative Officer V",0,0,"C");
    }
    

}



$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',10);
$pdf->SetAutoPageBreak("True",50);    
$pdf->AddPage();


            

//DATA

 $sql1="SELECT * FROM pims_personnel,pims_service_records,pims_employment_records
            WHERE pims_personnel.emp_No=pims_employment_records.emp_No and pims_employment_records.emp_rec_ID=pims_service_records.emp_rec_ID and pims_employment_records.emp_No='$emp_no' ";
            $res=mysqli_query($mysqli,$sql1);
            $num=mysqli_num_rows($res);
 while($row=mysqli_fetch_assoc($res))
                    {
                        
                           $inclusive_date_start=$row['inclusive_date_start'];
                           $pdf->Cell(24,5,"$inclusive_date_start",1,0,"C");
                           
                           $inclusive_date_end= $row['inclusive_date_end'];
                           $pdf->Cell(24,5," $inclusive_date_end",1,0,"C");
                        
                           $designation=$row['designation'];
                           $pdf->CellFitScale(20.7,5,"$designation",1,0,"C");
                        
                           $sr_status=$row['sr_status'];
                           $pdf->Cell(19.7,5,"$sr_status",1,0,"C");
                        
                           $salary=money_format('%i',$row['salary']);
                           $pdf->CellFitScale(22.7,5," $salary",1,0,"C");
                        
                           $place_of_assignment=$row['place_of_assignment'];
                           $pdf->Cell(25,5,"$place_of_assignment",1,0,"C");
                        
                           $srce_of_fund=$row['srce_of_fund'];
                           $pdf->Cell(26,5,"$srce_of_fund",1,0,"C");
                        
                           $remarks=$row['remarks'];
                           $pdf->Cell(28,5,"$remarks",1,0,"C");
                        
                           $pdf->Ln(5);


                       
                    }
$pdf->SetFont('Arial','',8);
$pdf->Cell(190,5,"Issued in compliance with Executive Order No. 54, dated August 10, 1954 and in accordance with Circular No. 10 s’ 1954 of the system.",0,1,"C");

//header('Content-disposition: attachment; filename="'.$name.'"');  
$pdf->Output('I',$name);

}
?>
