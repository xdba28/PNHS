<?php
include('dummyconnection.php');
require('fpdf.php');
date_default_timezone_set('Asia/Manila');
$date=date("Y-m-d");
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


}



    $pdf = new PDF('P','mm','A4');
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','',10);
    $pdf->AddPage();

             $emp_no=$_GET['emp'];
            //$yr=$_GET['dc'];
            
            //PHP
              $sql="SELECT * FROM pims_personnel,pims_family_background,pims_educational_background
              WHERE  pims_personnel.emp_No=pims_family_background.emp_No 
              and pims_personnel.emp_No=pims_educational_background.emp_No
              and pims_personnel.emp_no='$emp_no'";
                $result=mysqli_query($mysqli,$sql);
                $row=mysqli_fetch_assoc($result);
                $dd=strtotime($row['pims_birthdate']);
                $m=date("F",$dd);
                $d=date("d",$dd);
                $y=date("Y",$dd);

        $pdf->SetFont('Arial','B',20);
        $pdf->Cell(190,10,"PERSONAL DATA SHEET",1,1,"C");

        $pdf->SetFont('Arial','B',7);
        $pdf->MultiCell(190,5, "WARNING: Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administrative/\ncriminal case/s against the person concerned.", "LRB", 'J');

        $pdf->SetFont('Arial','B',6);
        $pdf->Cell(190,5,"READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.",1,1,"J");
        $pdf->Cell(135,5,"Print legibly. Tick appropriate boxes (     ) and use separate sheet if necessary. Indicate N/A if not applicable.  DO NOT ABBREVIATE.",1,0,"J");
        $pdf->Cell(15,5,"1. CS ID No.",1,0,"J");
        $pdf->Cell(40,5,"          (Do not fill up. For CSC use only)",1,1,"J");


        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(190,5,"I. PERSONAL INFORMATION",1,1,"L");

            //I
            $l_name=$row['P_lname'];
            $pdf->Cell(30,5,"2. LAST NAME",1,0,"L");
            $pdf->Cell(160,5,"$l_name",1,1,"J");
            
            $f_name=$row['P_fname'];
            $pdf->Cell(30,5,"   FIRST NAME",1,0,"L");
            $pdf->Cell(100,5,"$f_name",1,0,"J");

            $extension=$row['P_extension_name'];
            $pdf->Cell(60,5,"Name Extension:  $extension ",1,1,"J");

            $m_name=$row['P_mname'];
            $pdf->Cell(30,5,"   MIDDLE NAME",1,0,"L");
            $pdf->Cell(160,5,"$m_name",1,1,"J");

            
            $pdf->Cell(30,5,"3. DATE OF BIRTH",1,0,"L");
            $pdf->Cell(70,5,"$m $d, $y",1,0,"L");

            $ctzn=$row['nationality'];
            $pdf->Cell(30,15,"16. CITIZENSHIP",1,0,"L");
            $pdf->Cell(60,15,"$ctzn",1,0,"L");
            $pdf->Ln(5);

            $pob=$row['place_of_birth'];
            $pdf->Cell(30,5,"4. PLACE OF BIRTH",1,0,"L");
            $pdf->Cell(70,5,"$pob",1,0,"L");

            $pdf->Ln(5);
            
            $sex=$row['pims_gender'];
            $pdf->Cell(30,5,"5. SEX",1,0,"L");
            $pdf->Cell(70,5,"$sex",1,1,"L");

            $stats=$row['civil_status'];
            $pdf->Cell(30,5,"6. CIVIL STATUS","1",0,"L");
            $pdf->Cell(70,5,"$stats",1,0,"L"); 
            $pdf->Cell(25,15,"17.TEMP. AD.",1,0,"L");

            //DATA_street
             $house_no=$row['temp_address_house_no'];
            $pdf->Cell(32.5,3.5," $house_no",1,0,"C");
            $street=$row['temp_address_street'];
            $pdf->Cell(32.5,3.5," $street",1,0,"C");
            
            //street
            $pdf->Ln(3.5);
            $pdf->Cell(30,1.5,"","",0,"L");
            $pdf->Cell(70,1.5,"",0,0,"L");
            $pdf->Cell(25,1.5,"",0,0,"L"); 
            $pdf->SetFont('Arial','B',4);
            $pdf->Cell(32.5,1.5,"House/Block/Lot No.",1,0,"C"); 
            $pdf->Cell(32.5,1.5,"Street",1,0,"C"); 
            $pdf->SetFont('Arial','B',7);

            //SPACE
            $pdf->Ln(1.5);
            $pdf->Cell(30,5,"",1,0,"L");
            $pdf->Cell(70,5,"",1,0,"L");
            $pdf->Cell(25,5,"",0,0,"L"); 
            
            //DATA_barangay
            $village=$row['temp_address_subdivision_village'];
            $pdf->Cell(32.5,3.5,"$village",1,0,"C");
            
            $barangay=$row['temp_address_barangay'];
            $pdf->Cell(32.5,3.5,"$barangay",1,0,"C");
            
            //BARANGAY
            $pdf->Ln(3.5);
            $pdf->Cell(30,1.5,"","",0,"L");
            $pdf->Cell(70,1.5,"",0,0,"L");
            $pdf->Cell(25,1.5,"",0,0,"L"); 
            $pdf->SetFont('Arial','B',4);
            $pdf->Cell(32.5,1.5,"Subdivision/Village",1,0,"C"); 
            $pdf->Cell(32.5,1.5,"Barangay",1,0,"C"); 
            $pdf->SetFont('Arial','B',7);
            
            //SPACE
            $pdf->Ln(1.5);
            $height=$row['height_m'];
            $pdf->Cell(30,5,"7. HEIGHT(m)",1,0,"L");
            $pdf->Cell(70,5,"$height",1,0,"L");
            $pdf->Cell(25,5,"",0,0,"L"); 
            
            //DATA_province
            $munic=$row['temp_address_municipality_city'];
            $pdf->Cell(32.5,3.5,"$munic",1,0,"C");
            
            $province=$row['temp_address_province'];
            $pdf->Cell(32.5,3.5,"$province",1,0,"C");

            //PROVINCE
            $pdf->Ln(3.5);
            $pdf->Cell(30,1.5,"","",0,"L");
            $pdf->Cell(70,1.5,"",0,0,"L");
            $pdf->Cell(25,1.5,"",0,0,"L"); 
            $pdf->SetFont('Arial','B',4);
            $pdf->Cell(32.5,1.5,"City/Municipality",1,0,"C"); 
            $pdf->Cell(32.5,1.5,"Province",1,0,"C"); 
            $pdf->SetFont('Arial','B',7);

        
            
            //ZIP
            $pdf->Ln(1.5);
            $weight=$row['weight_kg'];
            $pdf->Cell(30,5,"8. WEIGHT(kg)",1,0,"L");
            $pdf->Cell(70,5,"$weight",1,0,"L");
            $pdf->Cell(25,5,"ZIP CODE",1,0,"C"); 
            
            //DATA_ZIP
            $zip=$row['temp_address_zipCode'];
            $pdf->Cell(65,5,"$zip",1,1,"L");



            //BELOW

            $blood=$row['bloodtype'];
            $pdf->Cell(30,5,"9. BLOOD TYPE",1,0,"L");
            $pdf->Cell(70,5,"$blood",1,0,"L"); 
            $pdf->Cell(25,15,"18.PERMANENT AD.",1,0,"L");

            //DATA_street
            $perm_house_no=$row['perm_address_house_no'];
            $pdf->Cell(32.5,3.5,"$perm_house_no",1,0,"C");

            $perm_street=$row['perm_address_street']; 
            $pdf->Cell(32.5,3.5,"$perm_street",1,0,"C");
            
            //street
            $pdf->Ln(3.5);
            $pdf->Cell(30,1.5,"","",0,"L");
            $pdf->Cell(70,1.5,"",0,0,"L");
            $pdf->Cell(25,1.5,"",0,0,"L"); 
            $pdf->SetFont('Arial','B',4);
            $pdf->Cell(32.5,1.5,"House/Block/Lot No.",1,0,"C"); 
            $pdf->Cell(32.5,1.5,"Street",1,0,"C"); 
            $pdf->SetFont('Arial','B',7);

            //SPACE
            $pdf->Ln(1.5);
            $GSIS=$row['GSIS_No'];
            $pdf->Cell(30,5,"10. GSIS ID NO.",1,0,"L");
            $pdf->Cell(70,5," $GSIS",1,0,"L");
            $pdf->Cell(25,5,"",0,0,"L"); 
            
            //DATA_barangay
              $perm_village=$row['perm_address_subdivision_village'];
            $pdf->Cell(32.5,3.5," $perm_village",1,0,"C");

            $perm_barangay=$row['perm_address_barangay'];
            $pdf->Cell(32.5,3.5," $perm_barangay",1,0,"C");
            
            //BARANGAY
            $pdf->Ln(3.5);
            $pdf->Cell(30,1.5,"","",0,"L");
            $pdf->Cell(70,1.5,"",0,0,"L");
            $pdf->Cell(25,1.5,"",0,0,"L"); 
            $pdf->SetFont('Arial','B',4);
            $pdf->Cell(32.5,1.5,"Subdivision/Village",1,0,"C"); 
            $pdf->Cell(32.5,1.5,"Barangay",1,0,"C"); 
            $pdf->SetFont('Arial','B',7);
            
            //SPACE
            $pdf->Ln(1.5);

            $pagibig=$row['PAG_IBIG_id']; 
            $pdf->Cell(30,5,"11. PAGI-BIG ID NO.",1,0,"L");
            $pdf->Cell(70,5," $pagibig",1,0,"L");
            $pdf->Cell(25,5,"",0,0,"L"); 
            
            //DATA_province

            $perm_munic=$row['perm_address_municipality_city'];
            $pdf->Cell(32.5,3.5," $perm_munic",1,0,"C");
            
            $perm_province=$row['perm_address_province'];
            $pdf->Cell(32.5,3.5,"$perm_province",1,0,"C");

            //PROVINCE
            $pdf->Ln(3.5);
            $pdf->Cell(30,1.5,"","",0,"L");
            $pdf->Cell(70,1.5,"",0,0,"L");
            $pdf->Cell(25,1.5,"",0,0,"L"); 
            $pdf->SetFont('Arial','B',4);
            $pdf->Cell(32.5,1.5,"City/Municipality",1,0,"C"); 
            $pdf->Cell(32.5,1.5,"Province",1,0,"C"); 
            $pdf->SetFont('Arial','B',7);

        
            
            //ZIP
            $pdf->Ln(1.5);
            $phil=$row['PHILHEALTH_no'];
            $pdf->Cell(30,5,"12. PHILHEALTH NO.",1,0,"L");
            $pdf->Cell(70,5,"$phil",1,0,"L");

            $pdf->Cell(25,5,"ZIP CODE",1,0,"C"); 
            
            //DATA_ZIP
             $perm_zip=$row['perm_address_zipCode'];
            $pdf->Cell(65,5," $perm_zip",1,1,"L");

            //LASTPART I
            $sss= $row['SSS_no'];
            $pdf->Cell(30,5,"13. SSS NO.",1,0,"L");
            $pdf->Cell(70,5,"$sss",1,0,"L");
            
            $t_no=$row['pims_telephone_no'];
            $pdf->Cell(25,5,"19. TELEPHONE NO.",1,0,"L"); 
            $pdf->Cell(65,5,"$t_no",1,1,"L");

            $tin=$row['TIN_no'];
            $pdf->Cell(30,5,"14. TIN NO.",1,0,"L");
            $pdf->Cell(70,5,"$tin",1,0,"L");

            $mobile= $row['pims_contact_no']; 
            $pdf->Cell(25,5,"12. MOBILE NO.",1,0,"L"); 
            $pdf->Cell(65,5,"$mobile",1,1,"L");

            
            $pdf->Cell(30,5,"15. AGENCT EMP. NO.",1,0,"L");
            $pdf->Cell(70,5,"$emp_no",1,0,"L");


            $email=$row['P_email'];
            $pdf->Cell(25,5,"21.EMAIL AD.",1,0,"L"); 
            $pdf->Cell(65,5,"$email",1,1,"L");


            //II FAMILY_BG
             $pdf->Cell(190,5,"II. FAMILY BACKGROUD",1,1,"L");


          $pdf->Cell(30,5,"22.SPOUSE'S SURNAME",1,0,"L");
          $spouse_l_name=$row['spouse_lastname'];
          $pdf->Cell(160,5,"$spouse_l_name",1,1,"L");
    
          $pdf->Cell(30,5,"     FIRST NAME",1,0,"L");
          $spouse_f_name=$row['spouse_firstname'];
          $pdf->Cell(120,5,"$spouse_f_name",1,0,"L");
          $spouse_extn=$row['spouse_extension_name'];
          $pdf->Cell(40,5,"Extension Name: $spouse_extn ",1,1,"L");
          
        
          $pdf->Cell(30,5,"     MIDDLE NAME",1,0,"L");
          $spouse_m_name=$row['spouse_middlename'];
          $pdf->Cell(160,5,"$spouse_m_name",1,1,"L");


            $pdf->Cell(30,5,"     OCCUPATION",1,0,"L");
          $pdf->Cell(160,5,"",1,1,"L");

            $pdf->Cell(30,5,"     EMPLOYER",1,0,"L");
          $pdf->Cell(160,5,"",1,1,"L");
        
            $pdf->Cell(30,5,"     BUSINESS AD",1,0,"L");
          $pdf->Cell(160,5,"",1,1,"L");

             $pdf->Cell(30,5,"    TELEPHONE NO.",1,0,"L");
          $pdf->Cell(160,5,"",1,1,"L");

          $pdf->Cell(30,5,"23.FATHER'S SURNAME",1,0,"L");
          $father_sname= $row['father_lname'];
          $pdf->Cell(160,5," $father_sname",1,1,"L");

          $pdf->Cell(30,5,"     FIRST NAME",1,0,"L");
          $father_fname= $row['father_fname'];  
          $pdf->Cell(120,5,"$father_fname",1,0,"L");
        

         
          $pdf->Cell(40,5,"Extension Name: ",1,1,"L");
   
          $pdf->Cell(30,5,"     MIDDLE NAME",1,0,"L");
          $father_mname= $row['father_mname'];
          $pdf->Cell(160,5,"$father_mname",1,1,"L");



          $mother_maiden=$row['mother_maidenname'];
          $pdf->Cell(30,5,"24.MOTHER'S MAIDEN",1,0,"L");
          $pdf->Cell(160,5,"$mother_maiden",1,1,"L");

          $mother_lname=$row['mother_lname'];
          $pdf->Cell(30,5,"24.MOTHER'S SURNAME",1,0,"L");
          $pdf->Cell(160,5,"$$mother_lname",1,1,"L");


          $mother_fname=$row['mother_fname'];
          $pdf->Cell(30,5,"     FIRST NAME",1,0,"L");
          $pdf->Cell(160,5,"$mother_fname",1,1,"L");
            
          $mother_mname=$row['mother_mname'];
          $pdf->Cell(30,5,"     MIDDLE NAME",1,0,"L");
          $pdf->Cell(160,5,"$mother_mname",1,1,"L");

        //CHILDREN
            $pdf->Cell(140,5,"25. NAME of CHILDREN  (Write full name and list all)",1,0,"C");
          $pdf->Cell(50,5,"DATE OF BIRTH (mm/dd/yyyy) ",1,1,"C");

            $pdf->Cell(140,5,"",1,0,"C");
          $pdf->Cell(50,5,"",1,1,"C");

            $pdf->Cell(140,5,"",1,0,"C");
          $pdf->Cell(50,5,"",1,1,"C");

            $pdf->Cell(140,5,"",1,0,"C");
          $pdf->Cell(50,5,"",1,1,"C");
           
            



            //III. EDUCATIONAL_BG

            $pdf->Cell(190,5,"III. EDUCATIONAL BACKGROUND",1,1,"L");
            
            $pdf->Cell(27.14,10,"26. LEVEL",1,0,"C");
            $pdf->Cell(32.14,10,"NAME OF SCHOOL",1,0,"C");
            $pdf->Cell(27.14,10,"BASIC DEGREE",1,0,"C");

            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(27.14,5,"PERIOD OF ATTENDANCE",1,0,"C");

          
            $pdf->Cell(27.14,10,"HIGHEST LEVEL EARNED",1,0,"C");
 
            $pdf->Cell(22.14,10,"YEAR GRADUATED",1,0,"C");
            $pdf->SetFont('Arial','B',7);
            $pdf->Cell(27.14,10,"ACADEMIC HONORS",1,0,"C");
 
            //SPACE
   
            $pdf->Ln(5);
            $pdf->Cell(27.14,5,"",0,0,"C");
            $pdf->Cell(32.14,5,"",0,0,"C");
            $pdf->Cell(27.14,5,"",0,0,"C");
            $pdf->Cell(13.57,5,"From",1,0,"C");
            $pdf->Cell(13.57,5,"To",1,0,"C");
            $pdf->Cell(27.14,5,"",0,0,"C");
            $pdf->Cell(22.14,5,"",0,0,"C");
            $pdf->Cell(27.14,5,"",0,1,"C");


            //ELEM
            $pdf->Cell(27.14,5,"ELEMENTARY",1,0,"C");
            $elem_name=$row['elementary_school_name'];
            $pdf->Cell(32.14,5," $elem_name",1,0,"C");
            $pdf->Cell(27.14,5,"",1,0,"C");
            $pdf->Cell(13.57,5,"",1,0,"C");
            $pdf->Cell(13.57,5,"",1,0,"C");
            $pdf->Cell(27.14,5,"Elementary Graduate",1,0,"C");
            $elem_acad=$row['elementary_academic_yr'];
            $pdf->Cell(22.14,5,"$elem_acad",1,0,"C");
            $pdf->Cell(27.14,5,"",1,1,"C");

            //HS
            $pdf->Cell(27.14,5,"HIGH SCHOOL",1,0,"C");
            $hs_name=$row['secondary_school_name'];
            $pdf->Cell(32.14,5,"$hs_name",1,0,"C");
            $pdf->Cell(27.14,5,"",1,0,"C");
            $pdf->Cell(13.57,5,"",1,0,"C");
            $pdf->Cell(13.57,5,"",1,0,"C");
            $pdf->Cell(27.14,5,"High School Grad.",1,0,"C");
            $hs_acad=$row['secondary_academic_yr'];
            $pdf->Cell(22.14,5," $hs_acad",1,0,"C");
            $pdf->Cell(27.14,5,"",1,1,"C");

            //VOCATIONAL
            $pdf->Cell(27.14,5,"VOCATIONAL",1,0,"C");
            $pdf->Cell(32.14,5,"",1,0,"C");
            $pdf->Cell(27.14,5,"",1,0,"C");
            $pdf->Cell(13.57,5,"",1,0,"C");
            $pdf->Cell(13.57,5,"",1,0,"C");
            $pdf->Cell(27.14,5,"",1,0,"C");
            $pdf->Cell(22.14,5,"",1,0,"C");
            $pdf->Cell(27.14,5,"",1,1,"C");


            //COLLEGE
            $pdf->Cell(27.14,5,"COLLEGE",1,0,"C");
            $college_name=$row['tertiary_school_name'];
            $pdf->Cell(32.14,5,"$college_name",1,0,"C");
            $pdf->Cell(27.14,5,"",1,0,"C");
            $pdf->Cell(13.57,5,"",1,0,"C");
            $pdf->Cell(13.57,5,"",1,0,"C");
            $pdf->Cell(27.14,5,"College Grad.",1,0,"C");
            $college_acad=$row['tertiary_academic_yr'];
            $pdf->Cell(22.14,5," $college_acad",1,0,"C");
            $pdf->Cell(27.14,5,"",1,1,"C");

            //GRADUATE STUDIES
            $pdf->Cell(27.14,5,"GRADUATE STUDIES",1,0,"C");
            $pdf->Cell(32.14,5,"",1,0,"C");
            $pdf->Cell(27.14,5,"",1,0,"C");
            $pdf->Cell(13.57,5,"",1,0,"C");
            $pdf->Cell(13.57,5,"",1,0,"C");
            $pdf->Cell(27.14,5,"",1,0,"C");
            $pdf->Cell(22.14,5,"",1,0,"C");
            $pdf->Cell(27.14,5,"",1,1,"C");

            //SIGNATURE
            $pdf->Cell(27.14,10,"SIGNATURE",1,0,"C");
            $pdf->Cell(59.28,10,"",1,0,"C");
           
            $pdf->Cell(27.14,10,"DATE",1,0,"C");
            $pdf->Cell(76.42,10," ",1,0,"C");
$person=$mysqli->query("SELECT faculty_type,concat(p_lname,'_',p_fname) as Name, concat(p_fname,' ',p_lname) as arch
FROM pims_personnel,pims_employment_records
WHERE pims_personnel.emp_no=pims_employment_records.emp_no
AND pims_employment_records.emp_no=$emp_no");
$per=$person->fetch_assoc();
$name=$per['Name']."_PersonalDataSheet.pdf";        
$folder=$per['arch'];
$type=$per['faculty_type'];
$syqry=$mysqli->query("SELECT year FROM css_school_yr WHERE status='active'");
$syrow=$syqry->fetch_assoc();
$synow=$syrow['year'];
$disk=$_GET['disk'];
$pdf->Output('F',"$disk://Archive_".$synow."/".$folder."/".$name);
if($type=="Teaching"){
    echo "<script>window.location.href='archive_qg.php?emp=$emp_no&disk=$disk';</script>";
}else{
    mysqli_query($mysqli,"set autocommit=0");
    mysqli_query($mysqli,"start transaction");
    mysqli_query($mysqli,"LOCK TABLES dms_archive WRITE");
    $in=$mysqli->query("INSERT INTO dms_archive(emp_no,arch_date) VALUES($emp_no,'$date')");
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
