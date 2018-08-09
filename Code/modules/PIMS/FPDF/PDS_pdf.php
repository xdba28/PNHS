<?php
include('dummyconnection.php');
require('fpdf.php');

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

    //WrapCell
   function myCell($w,$h,$x,$t){
        $height= $h/3;
        $first = $height+2;
        $second= $height+$height+$height+3;
        $len = strlen($t);
            if($len>30){
                $txt=str_split($t,30);
                $this->SetX($x);
                $this->Cell($w,$first,$txt[0]);
                $this->SetX($x);
                $this->Cell($w,$second,$txt[1]);
                $this->SetX($x);
                $this->Cell($w,$h,'','LTRB',0,'L',0);
            }else{
                $this->SetX($x);
                $this->Cell($w,$h,$t,'LTRB',0,'L',0);
        }
}
}



    $pdf = new PDF('P','mm','A4');
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','',10);
    $pdf->AddPage();

        //$emp_no=4567891;
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
          $pdf->Cell(70,5,"$spouse_l_name",1,0,"L");

        $pdf->Cell(50,5,"NAME OF CHILDREN",1,0,"C");
        $pdf->Cell(40,5,"DATE OF BIRTH (mm/dd/yyyy)",1,1,"C");

        $child = array();
        $child_bday= array();
        $count=0;
         $sql1="SELECT * FROM pims_children WHERE emp_No=$emp_no";
        $result1=mysqli_query($mysqli,$sql1);
        while($row1=mysqli_fetch_assoc($result1))
                {
                    $child[$count]=$row1['child_name'];
                    $child_bday[$count]=$row1['child_birthdate'];
                    $count= $count + 1;
                }


          


    
          $pdf->Cell(30,5,"     FIRST NAME",1,0,"L");
          $spouse_f_name=$row['spouse_firstname'];
          $pdf->Cell(40,5,"$spouse_f_name",1,0,"L");
          $spouse_extn=$row['spouse_extension_name'];
          $pdf->Cell(30,5,"Extension Name: $spouse_extn",1,0,"L");
          //CHILD1
          if(isset($child[0]))
          {
                $dd=strtotime($child_bday[0]);
                $m=date("F",$dd);
                $d=date("d",$dd);
                $y=date("Y",$dd);

            $pdf->Cell(50,5,"$child[0]",1,0,"L");
           $pdf->Cell(40,5,"$m $d, $y",1,1,"L");
       }else{
        $pdf->Cell(50,5,"",1,0,"L");
           $pdf->Cell(40,5,"",1,1,"L");
       }
           


        
          $pdf->Cell(30,5,"     MIDDLE NAME",1,0,"L");
          $spouse_m_name=$row['spouse_middlename'];
          $pdf->Cell(70,5,"$spouse_m_name",1,0,"L");
           //CHILD2
          if(isset($child[1]))
          {
                $dd=strtotime($child_bday[1]);
                $m=date("F",$dd);
                $d=date("d",$dd);
                $y=date("Y",$dd);

            $pdf->Cell(50,5,"$child[1]",1,0,"L");
           $pdf->Cell(40,5,"$m $d, $y",1,1,"L");
       }else{
        $pdf->Cell(50,5,"",1,0,"L");
           $pdf->Cell(40,5,"",1,1,"L");
       }


            $pdf->Cell(30,5,"     OCCUPATION",1,0,"L");
          $pdf->Cell(70,5,"",1,0,"L");
           //CHILD3
            if(isset($child[2]))
          {
                $dd=strtotime($child_bday[2]);
                $m=date("F",$dd);
                $d=date("d",$dd);
                $y=date("Y",$dd);

            $pdf->Cell(50,5,"$child[2]",1,0,"L");
           $pdf->Cell(40,5,"$m $d, $y",1,1,"L");
       }else{
        $pdf->Cell(50,5,"",1,0,"L");
           $pdf->Cell(40,5,"",1,1,"L");
       }


            $pdf->Cell(30,5,"     EMPLOYER",1,0,"L");
          $pdf->Cell(70,5,"",1,0,"L");
           //CHILD4
           if(isset($child[3]))
          {
                $dd=strtotime($child_bday[3]);
                $m=date("F",$dd);
                $d=date("d",$dd);
                $y=date("Y",$dd);

            $pdf->Cell(50,5,"$child[3]",1,0,"L");
           $pdf->Cell(40,5,"$m $d, $y",1,1,"L");
       }else{
        $pdf->Cell(50,5,"",1,0,"L");
           $pdf->Cell(40,5,"",1,1,"L");
       }

        
            $pdf->Cell(30,5,"     BUSINESS AD",1,0,"L");
          $pdf->Cell(70,5,"",1,0,"L");
           //CHILD5
            if(isset($child[4]))
          {
                $dd=strtotime($child_bday[4]);
                $m=date("F",$dd);
                $d=date("d",$dd);
                $y=date("Y",$dd);

            $pdf->Cell(50,5,"$child[4]",1,0,"L");
           $pdf->Cell(40,5,"$m $d, $y",1,1,"L");
       }else{
        $pdf->Cell(50,5,"",1,0,"L");
           $pdf->Cell(40,5,"",1,1,"L");
       }


             $pdf->Cell(30,5,"    TELEPHONE NO.",1,0,"L");
          $pdf->Cell(70,5,"",1,0,"L");
           //CHILD6
            if(isset($child[5]))
          {
                $dd=strtotime($child_bday[5]);
                $m=date("F",$dd);
                $d=date("d",$dd);
                $y=date("Y",$dd);

            $pdf->Cell(50,5,"$child[5]",1,0,"L");
           $pdf->Cell(40,5,"$m $d, $y",1,1,"L");
       }else{
        $pdf->Cell(50,5,"",1,0,"L");
           $pdf->Cell(40,5,"",1,1,"L");
       }


          $pdf->Cell(30,5,"23.FATHER'S SURNAME",1,0,"L");
          $father_sname= $row['father_lname'];
          $pdf->Cell(70,5," $father_sname",1,0,"L");
           //CHILD7
           if(isset($child[6]))
          {
                $dd=strtotime($child_bday[6]);
                $m=date("F",$dd);
                $d=date("d",$dd);
                $y=date("Y",$dd);

            $pdf->Cell(50,5,"$child[6]",1,0,"L");
           $pdf->Cell(40,5,"$m $d, $y",1,1,"L");
       }else{
        $pdf->Cell(50,5,"",1,0,"L");
           $pdf->Cell(40,5,"",1,1,"L");
       }


          $pdf->Cell(30,5,"     FIRST NAME",1,0,"L");
          $father_fname= $row['father_fname'];  
          $pdf->Cell(40,5,"$father_fname",1,0,"L");
          $pdf->Cell(30,5,"Extension Name: ",1,0,"L");
             //CHILD8
            if(isset($child[7]))
          {
                $dd=strtotime($child_bday[7]);
                $m=date("F",$dd);
                $d=date("d",$dd);
                $y=date("Y",$dd);

            $pdf->Cell(50,5,"$child[7]",1,0,"L");
           $pdf->Cell(40,5,"$m $d, $y",1,1,"L");
       }else{
        $pdf->Cell(50,5,"",1,0,"L");
           $pdf->Cell(40,5,"",1,1,"L");
       }

          $pdf->Cell(30,5,"     MIDDLE NAME",1,0,"L");
          $father_mname= $row['father_mname'];
          $pdf->Cell(70,5,"$father_mname",1,0,"L");
           //CHILD9
            if(isset($child[8]))
          {
                $dd=strtotime($child_bday[8]);
                $m=date("F",$dd);
                $d=date("d",$dd);
                $y=date("Y",$dd);

            $pdf->Cell(50,5,"$child[8]",1,0,"L");
           $pdf->Cell(40,5,"$m $d, $y",1,1,"L");
       }else{
        $pdf->Cell(50,5,"",1,0,"L");
           $pdf->Cell(40,5,"",1,1,"L");
       }




          $mother_maiden=$row['mother_maidenname'];
          $pdf->Cell(30,5,"24.MOTHER'S MAIDEN",1,0,"L");
          $pdf->Cell(70,5,"$mother_maiden",1,0,"L");
           //CHILD10
           if(isset($child[9]))
          {
                $dd=strtotime($child_bday[9]);
                $m=date("F",$dd);
                $d=date("d",$dd);
                $y=date("Y",$dd);

            $pdf->Cell(50,5,"$child[9]",1,0,"L");
           $pdf->Cell(40,5,"$m $d, $y",1,1,"L");
       }else{
        $pdf->Cell(50,5,"",1,0,"L");
           $pdf->Cell(40,5,"",1,1,"L");
       }


          $mother_lname=$row['mother_lname'];
          $pdf->Cell(30,5,"   MOTHER'S SURNAME",1,0,"L");
          $pdf->Cell(70,5,"$mother_lname",1,0,"L");
           //CHILD11
            if(isset($child[10]))
          {
                $dd=strtotime($child_bday[10]);
                $m=date("F",$dd);
                $d=date("d",$dd);
                $y=date("Y",$dd);

            $pdf->Cell(50,5,"$child[10]",1,0,"L");
           $pdf->Cell(40,5,"$m $d, $y",1,1,"L");
       }else{
        $pdf->Cell(50,5,"",1,0,"L");
           $pdf->Cell(40,5,"",1,1,"L");
       }



          $mother_fname=$row['mother_fname'];
          $pdf->Cell(30,5,"     FIRST NAME",1,0,"L");
          $pdf->Cell(70,5,"$mother_fname",1,0,"L");
           //CHILD12
           if(isset($child[11]))
          {
                $dd=strtotime($child_bday[11]);
                $m=date("F",$dd);
                $d=date("d",$dd);
                $y=date("Y",$dd);

            $pdf->Cell(50,5,"$child[11]",1,0,"L");
           $pdf->Cell(40,5,"$m $d, $y",1,1,"L");
       }else{
        $pdf->Cell(50,5,"",1,0,"L");
           $pdf->Cell(40,5,"",1,1,"L");
       }

            
          $mother_mname=$row['mother_mname'];
          $pdf->Cell(30,5,"     MIDDLE NAME",1,0,"L");
          $pdf->Cell(70,5,"$mother_mname",1,0,"L");
           //CHILD13
           $pdf->Cell(90,5,"(Continue on separate sheet if necessary)",1,1,"C");
         


           
            



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

            $pdf->Cell(190,5,"(Continue on separate sheet if necessary)",1,1,"C");
            //SIGNATURE
            $pdf->Cell(27.14,10,"SIGNATURE",1,0,"C");
            $pdf->Cell(50.28,10,"",1,0,"C");
           
            $pdf->Cell(26.14,10,"DATE",1,0,"C");
            $pdf->Cell(36.42,10,"",1,0,"C");

            $pdf->Cell(50,10," CS FORM 212 (Revised 2017), Page 1 of 4",1,0,"C");


            //PAGE 2
            $pdf->AddPage();
             $pdf->Cell(190,5,"IV.  CIVIL SERVICE ELIGIBILITY",1,1,"L");

            $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->MultiCell(62, 5, "27. CAREER SERVICE/ RA 1080 (BOARD/ BAR) "."\n"."UNDER SPECIAL LAWS/ CES/ CSEE"."\n"." BARANGAY ELIGIBILITY / DRIVER'S LICENSE", 1, 'C');

            $pdf->SetXY($x + 62, $y);
            $pdf->MultiCell(16,5,"RATING "."\n". "(If"."\n"."Applicable)", 1, 'C');


            $pdf->SetXY($x + 78, $y);
            $pdf->MultiCell(25,5, "DATE OF"."\n"."EXAMINATION/"."\n"."CONFERMENT", 1, 'C');

            $pdf->SetXY($x + 103, $y);
            $pdf->MultiCell(55,15,"PLACE OF EXAMINATION / CONFERMENT", 1, 'C');

            $pdf->SetXY($x + 158, $y);
            $pdf->MultiCell(32,5, "LICENSE (if applicable)", 1, 'C');
            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(158,5, "", 0, 'C');
            $pdf->SetXY($x + 158, $y);
            $pdf->MultiCell(16,10, "NUMBER", 1, 'C');
            $pdf->SetXY($x + 174, $y);
            $pdf->MultiCell(16,5, "Date of"."\n"."Validity", 1, 'C');
            $pdf->Ln(0);

        

             $sql1="SELECT * FROM pims_cs_eligibility WHERE emp_No=$emp_no";
        $result1=mysqli_query($mysqli,$sql1);
        $num_rows = mysqli_num_rows($result1);
        while($row1=mysqli_fetch_assoc($result1))
                {
                    $career_serv=$row1['career_service'];
                    $cs_rating=$row1['rating'];
                    $cs_exam_date=$row1['exam_date'];
                    $cs_exam_place=$row1['exam_place'];
                    $cs_license=$row1['license_no'];
                    $cs_val_date=$row1['license_validity_date'];

                    $cs_ex_date =$cs_exam_date;
                    $newDate = date("m/d/Y", strtotime($cs_ex_date));

                        $cs_v_date =$cs_val_date;
                    $newDate1 = date("m/d/Y", strtotime($cs_v_date));
               

                   $pdf->Cell(62,5,"$career_serv",1,0,"C");
                   $pdf->Cell(16,5,"$cs_rating",1,0,"C");
                   $pdf->Cell(25,5,"$newDate",1,0,"C");
                   $pdf->Cell(55,5,"$cs_exam_place",1,0,"C");
                   $pdf->Cell(16,5,"$cs_license",1,0,"C"); 
                   $pdf->Cell(16,5,"$newDate1",1,1,"C"); 
                }

                //DATA
          for($c=$num_rows;$c<=7;$c++)
         {
         $pdf->Cell(62,5,"",1,0,"C");
          $pdf->Cell(16,5,"",1,0,"C");
          $pdf->Cell(25,5,"",1,0,"C");
         $pdf->Cell(55,5,"",1,0,"C");
         $pdf->Cell(16,5,"",1,0,"C"); 
          $pdf->Cell(16,5,"",1,1,"C"); 
           }



            //Last row
            $pdf->Cell(190,5,"(Continue on separate sheet if necessary)",1,1,"C");


            //V.  WORK EXPERIENCE 
            $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->MultiCell(190,5,"V.  WORK EXPERIENCE"."\n"."(Include private employment.  Start from your recent work) Description of duties should be indicated in the attached Work Experience sheet.", 1, 'L');
            $pdf->Ln(0);
          

            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(45, 5, "28. INCLUSIVE DATES "."\n"." (mm/dd/yyyy)", 1, 'C');
            $pdf->SetXY($x + 45, $y);
            $pdf->MultiCell(25,5,"POSITION TITLE"."\n"."(Write in full/Do"."\n"." not abbreviate)", 1, 'C');

            $pdf->SetXY($x + 70, $y);
            $pdf->MultiCell(40,5,"DEPARTMENT / AGENCY / OFFICE / COMPANY"."\n"."(Write in full/Do not abbreviate)", 1, 'C');

            $pdf->SetXY($x + 110, $y);
            $pdf->MultiCell(15,7.5,"MONTHLY"."\n"."SALARY", 1, 'C');
                $pdf->SetFont('Arial','',6);
            $pdf->SetXY($x + 125, $y);
            $pdf->MultiCell(30,5,"SALARY/ JOB/ PAY GRADE (if applicable)& STEP  (Format '00-0')/ INCREMENT", 1, 'C');
                   $pdf->SetFont('Arial','',7);
            $pdf->SetXY($x + 155, $y);
            $pdf->MultiCell(20,7.5,"STATUS OF"."\n"."APPOINTMENT", 1, 'C');
            $pdf->SetXY($x + 175, $y);
            $pdf->MultiCell(15,5,"GOV'T"."\n"."SERVICE"."\n"."(Y/N))", 1, 'C');
            
            $pdf->Ln(-5);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(22.5, 5, "From", 1, 'C');
             $pdf->SetXY($x + 22.5, $y);
            $pdf->MultiCell(22.5, 5, "To", 1, 'C');


            $pdf->Ln(0);
            //DATA

             $sql1="SELECT * FROM pims_work_experience WHERE emp_No=$emp_no";
        $result1=mysqli_query($mysqli,$sql1);
        $num_rows = mysqli_num_rows($result1);
        while($row1=mysqli_fetch_assoc($result1))
                {
                    $we_from=$row1['we_date_from'];
                    $we_to=$row1['we_date_to'];
                    $we_pos=$row1['we_position'];
                    $we_dept=$row1['we_department'];
                    $we_agency=$row1['agency'];
                    $we_office=$row1['office'];
                    $we_comp=$row1['company'];
                    $we_sal=$row1['we_monthly_salary'];
                    $we_pay_grade=$row1['pay_grade'];
                    $we_app=$row1['appointment_status'];
                    $we_govt_serv=$row1['govt_service'];


                   
                    $from = date("m/d/Y", strtotime($we_from));

                       
                    $to = date("m/d/Y", strtotime($we_to));
               
                    $pdf->Cell(22.5,5," $from",1,0,"C");
                    $pdf->Cell(22.5,5,"$to",1,0,"C");
                    $pdf->Cell(25,5,"$we_pos",1,0,"C");
                    $pdf->Cell(40,5,"$we_dept $we_agency $we_office $we_comp",1,0,"C");
                    $pdf->Cell(15,5,"$we_sal",1,0,"C");
                    $pdf->Cell(30,5,"$we_pay_grade",1,0,"C");
                    $pdf->Cell(20,5,"$we_app",1,0,"C");
                    $pdf->Cell(15,5,"$we_govt_serv",1,1,"C"); 

                  
                }

            for($c=$num_rows;$c<=31;$c++)
            {
            $pdf->Cell(22.5,5,"",1,0,"C");
            $pdf->Cell(22.5,5,"",1,0,"C");
            $pdf->Cell(25,5,"",1,0,"C");
            $pdf->Cell(40,5,"",1,0,"C");
            $pdf->Cell(15,5,"",1,0,"C");
            $pdf->Cell(30,5,"",1,0,"C");
            $pdf->Cell(20,5,"",1,0,"C");
            $pdf->Cell(15,5,"",1,1,"C"); 
            }
            $pdf->Cell(190,5,"(Continue on separate sheet if necessary)",1,1,"C");
            //SIGNATURE
            $pdf->Cell(27.14,10,"SIGNATURE",1,0,"C");
            $pdf->Cell(50.28,10,"",1,0,"C");
           
            $pdf->Cell(26.14,10,"DATE",1,0,"C");
            $pdf->Cell(36.42,10,"",1,0,"C");

            $pdf->Cell(50,10," CS FORM 212 (Revised 2017), Page 2 of 4",1,0,"C");


             //PAGE 3
            $pdf->AddPage();
            $pdf->Cell(190,5,"VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S",1,1,"L");

            $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->MultiCell(65, 7.5, "29. NAME & ADDRESS OF ORGANIZATION"."\n"."(Write in full)", 1, 'C');

            $pdf->SetXY($x + 65, $y);
            $pdf->MultiCell(45,5,"INCLUSIVE DATES OF"."\n"."ATTENDANCE (mm/dd/yyyy)", 1, 'C');

            $pdf->SetXY($x + 110, $y);
            $pdf->MultiCell(15,5,"NUMBER OF"."\n"."HOURS", 1, 'C');

            $pdf->SetXY($x + 125, $y);
            $pdf->MultiCell(65,15,"POSITION / NATURE OF WORK", 1, 'C');



             $pdf->Ln(-5);
            $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 65, $y);
            $pdf->MultiCell(22.5, 5, "From", 1, 'C');
            $pdf->SetXY($x + 87.5, $y);
            $pdf->MultiCell(22.5, 5, "To", 1, 'C');

            $pdf->Ln(0);
            //DATA
            $sql1="SELECT * FROM pims_voluntary_work WHERE emp_No=$emp_no";
        $result1=mysqli_query($mysqli,$sql1);
        $num_rows = mysqli_num_rows($result1);
        while($row1=mysqli_fetch_assoc($result1))
                {
                   
                    $org_name_ad=$row1['org_name_address'];
                    $vw_from=$row1['vw_date_from'];
                    $vw_to=$row1['vw_date_to'];
                    $vw_hours=$row1['vw_no_of_hrs'];
                    $vw_pos=$row1['vw_position'];
 

                   
                    $from = date("m/d/Y", strtotime($vw_from));

                       
                    $to = date("m/d/Y", strtotime($vw_to));
               
                   $pdf->Cell(65,5,"$org_name_ad",1,0,"C");
                    $pdf->Cell(22.5,5,"$from",1,0,"C");
                     $pdf->Cell(22.5,5,"$to",1,0,"C");
                     $pdf->Cell(15,5,"$vw_hours",1,0,"C");
                     $pdf->Cell(65,5,"$vw_pos",1,1,"C");

                  
                }


            for($c=$num_rows;$c<=7;$c++)
            {
            $pdf->Cell(65,5,"",1,0,"C");
            $pdf->Cell(22.5,5,"",1,0,"C");
            $pdf->Cell(22.5,5,"",1,0,"C");
            $pdf->Cell(15,5,"",1,0,"C");
            $pdf->Cell(65,5,"",1,1,"C");
            }
            $pdf->Cell(190,5,"(Continue on separate sheet if necessary)",1,1,"C");

             $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->MultiCell(190,7.5,"VII.  LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED", 1, 'L');
            $pdf->Ln(-5);
             $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetFont('Arial','',6);
             $pdf->MultiCell(190,6,"(Start from the most recent L&D/training program and include only the relevant L&D/training taken for the last five (5) years for Division Chief/Executive/Managerial positions)", 0, 'L');
            $pdf->Ln(-1);

            $y = $pdf->GetY();
            $x = $pdf->GetX();
                $pdf->SetFont('Arial','',7);
            $pdf->MultiCell(65,5, "30. TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS"."\n"."(Write in full)", 1, 'C');

            $pdf->SetXY($x + 65, $y);
            $pdf->MultiCell(45,5,"INCLUSIVE DATES OF"."\n"."ATTENDANCE (mm/dd/yyyy)", 1, 'C');

            $pdf->SetXY($x + 110, $y);
            $pdf->MultiCell(15,5,"NUMBER OF"."\n"."HOURS", 1, 'C');

            $pdf->SetXY($x + 125, $y);
            $pdf->MultiCell(30,5,"Type of LD( Managerial/"."\n"."Supervisory/"."\n"."Technical/etc)", 1, 'C');

            $pdf->SetXY($x + 155, $y);
            $pdf->MultiCell(35,5," CONDUCTED/ SPONSORED BY"."\n"."(Write in full)", 1, 'C');

            $pdf->Ln(-5);
            $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 65, $y);
            $pdf->MultiCell(22.5, 5, "From", 1, 'C');
            $pdf->SetXY($x + 87.5, $y);
            $pdf->MultiCell(22.5, 5, "To", 1, 'C');

            //DATA
            $sql1="SELECT * FROM pims_training_programs WHERE emp_No=$emp_no";
        $result1=mysqli_query($mysqli,$sql1);
        $num_rows = mysqli_num_rows($result1);
        while($row1=mysqli_fetch_assoc($result1))
                {
                   
                    $training_title=$row1['training_title'];
                    $location=$row1['location'];
                    $t_start=$row1['date_start'];
                    $t_finish=$row1['date_finish'];
                    $no_hours=$row1['no_of_hours'];
                    $training_type=$row1['training_type'];
                    $conducted_by=$row1['conducted_by'];
 

                   
                    $from = date("m/d/Y", strtotime($t_start));

                       
                    $to = date("m/d/Y", strtotime($t_finish));
               
                    $pdf->Cell(65,5,"$training_title",1,0,"C");
                    $pdf->Cell(22.5,5,"$from",1,0,"C");
                    $pdf->Cell(22.5,5,"$to",1,0,"C");
                    $pdf->Cell(15,5,"$no_hours",1,0,"C");
                    $pdf->Cell(30,5,"$training_type",1,0,"C");
                    $pdf->Cell(35,5,"$conducted_by",1,1,"C");

                  
                }

            $pdf->Ln(0);
                 for($c=$num_rows;$c<=18;$c++)
            {
            $pdf->Cell(65,5,"",1,0,"C");
            $pdf->Cell(22.5,5,"",1,0,"C");
            $pdf->Cell(22.5,5,"",1,0,"C");
            $pdf->Cell(15,5,"",1,0,"C");
            $pdf->Cell(30,5,"",1,0,"C");
            $pdf->Cell(35,5,"",1,1,"C");
            }
            $pdf->Cell(190,5,"(Continue on separate sheet if necessary)",1,1,"C");

            //VIII.  OTHER INFORMATION
             $pdf->Cell(190,5,"VIII.  OTHER INFORMATION",1,1,"L");

            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(60,7.5,"31. SPECIAL SKILLS "."\n"."and HOBBIES", 1, 'C');
            $pdf->SetXY($x + 60, $y);
            $pdf->MultiCell(70, 7.5, "32. NON-ACADEMIC DISTINCTIONS / RECOGNITION"."\n"."(Write in full)", 1, 'C');
            $pdf->SetXY($x + 130, $y);
            $pdf->MultiCell(60,5, "MEMBERSHIP IN "."\n"."ASSOCIATION /ORGANIZATION"."\n"."(Write in full)", 1, 'C');

            $pdf->Ln(0);

            //DATA
                 $sql1="SELECT * FROM pims_other_info WHERE emp_No=$emp_no";
        $result1=mysqli_query($mysqli,$sql1);
        $num_rows = mysqli_num_rows($result1);
        while($row1=mysqli_fetch_assoc($result1))
                {
                   
                    $special_skills=$row1['special_skills'];
                    $hobbies=$row1['hobbies'];
                    $oi_recognition=$row1['oi_recognition'];
                    $org_membership=$row1['org_membership'];
       
 

                   $pdf->Cell(60,5," $special_skills , $hobbies ",1,0,"C");
            $pdf->Cell(70,5,"$oi_recognition",1,0,"C");
            $pdf->Cell(60,5,"$org_membership",1,1,"C");

                  
                }


                 for($c=$num_rows;$c<=7;$c++)
            {
            $pdf->Cell(60,5,"",1,0,"C");
            $pdf->Cell(70,5,"",1,0,"C");
            $pdf->Cell(60,5,"",1,1,"C");

            }
            $pdf->Cell(190,5,"(Continue on separate sheet if necessary)",1,1,"C");

            //SIGNATURE
            $pdf->Cell(27.14,10,"SIGNATURE",1,0,"C");
            $pdf->Cell(50.28,10,"",1,0,"C");
           
            $pdf->Cell(26.14,10,"DATE",1,0,"C");
            $pdf->Cell(36.42,10,"",1,0,"C");

            $pdf->Cell(50,10," CS FORM 212 (Revised 2017), Page 3 of 4",1,0,"C");
    
             //PAGE 4
            $pdf->AddPage();
           $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(115,5,"34. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the"."\n"."chief of bureau or office or to the person who has immediate supervision over you in the Office,"."\n"."Bureau or Department where you will be apppointed,"."\n"."a. within the third degree?"."\n"."b. within the fourth degree (for Local Government Unit - Career Employees)?"."\n".""."\n".""."\n"."", 1, 'L');

             $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(75, 35,"", 1, 'L');

             $pdf->Ln(-20);
             $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');

                 $sql2="SELECT * FROM pims_question_info WHERE emp_no=$emp_no";
                $result2=mysqli_query($mysqli,$sql2);
                $row2=mysqli_fetch_assoc($result2);

            //34 A. YES / NO
    $consanguinity_3rDegree=$row2['consanguinity_3rDegree'];
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(10,5 ,"$consanguinity_3rDegree", 1, 'C');
    $consanguinity_4thDegree=$row2['consanguinity_4thDegree'];
            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
             $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            //34 B. YES/ NO
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(10,5 ,"$consanguinity_4thDegree", 1, 'C');


            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
             $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(25,5 ,"If YES, give details: ", 0, 'L');

            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
             $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
         $degree_details=$row2['degree_details'];
            //DETIALS if YES
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(70,5 ,"$degree_details", 1, 'L');

            $pdf->Ln(0);

            //35
             $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(115,5,"35. a. Have you ever been found guilty of any administrative offense?"."\n".""."\n".""."\n"."b. Have you been criminally charged before any court?"."\n".""."\n".""."\n".""."\n"."", 1, 'L');

             $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(75,15,"", 1, 'L');



             $pdf->Ln(-15);
             $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
        $been_guilty=$row2['been_guilty'];
            //35 A. YES / NO
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(10,5 ,"$been_guilty", 1, 'C');


            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(25,5 ,"If YES, give details: ", 0, 'L');

            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
             $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            //DETIALS if YES
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(70,5 ,"", 1, 'L');


            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(75,20,"", 1, 'L');

            $pdf->Ln(-20);
             $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');

            //35 B. YES / NO
            $pdf->SetXY($x + 120, $y);
            $criminallyCharged=$row2['criminallyCharged'];
            $pdf->MultiCell(10,5 ,"$criminallyCharged", 1, 'C');
            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(25,5 ,"If YES, give details: ", 0, 'L');

             $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(30,5,"Date Filed:", 0, 'R');
            //DATA Date field
            $criminallyCharged_date=$row2['criminallyCharged_date'];
            $pdf->SetXY($x + 145, $y);
            $pdf->MultiCell(45,5," $criminallyCharged_date", 1, 'L');

            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(30,5,"Status of Case/s:", 0, 'R');
            //DATA Stats field
            $criminallyCharged_caseStatus=$row2['criminallyCharged_caseStatus'];
            $pdf->SetXY($x + 145, $y);
            $pdf->MultiCell(45,5,"$criminallyCharged_caseStatus", 1, 'L');


            $pdf->Ln(0);

            //36
             $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(115,5,"36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or"."\n"." regulation by any court or tribunal?"."\n".""."\n"."", 1, 'L');

             $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(75,15,"", 1, 'L');



             $pdf->Ln(-15);
             $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');

            //36 A. YES / NO
            $been_convicted=$row2['been_convicted'];
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(10,5 ,"$been_convicted", 1, 'C');


            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(25,5 ,"If YES, give details: ", 0, 'L');

            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
             $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            //DETIALS if YES
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(70,5 ,"", 1, 'L');

            $pdf->Ln(0);

            //37
             $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(115,5,"37.Have you ever been separated from the service in any of the following modes: resignation, "."\n"."retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out"."\n"."(abolition) in the public or private sector?"."\n"."", 1, 'L');

             $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(75,15,"", 1, 'L');



             $pdf->Ln(-15);
             $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');

            //37 A. YES / NO
            $separated_fromService=$row2['separated_fromService'];
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(10,5 ,"$separated_fromService", 1, 'C');


            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(25,5 ,"If YES, give details: ", 0, 'L');

            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
             $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            //DETIALS if YES
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(70,5 ,"", 1, 'L');

                 $pdf->Ln(0);

            //38
             $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(115,5,"38 a. Have you ever been a candidate in a national or local election held within the last year (except"."\n"."Barangay election)?"."\n".""."\n"."b. Have you resigned from the government service during the three (3)-month period before the"."\n"."last election to promote/actively campaign for a national or local candidate?", 1, 'L');

             $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(75,25,"", 1, 'L');



             $pdf->Ln(-25);
             $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');

            //38 A. YES / NO
            $been_aCandidate=$row2['been_aCandidate'];
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(10,5 ,"$been_aCandidate", 1, 'C');


            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(25,5 ,"If YES, give details: ", 0, 'L');

            $pdf->SetXY($x + 145, $y);
            $pdf->MultiCell(45,5 ,"", 1, 'L');

            
            //Blank space
            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(75,5 ,"", 0, 'L');

             $pdf->Ln(0);
             $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            //38 B. YES / NO
            $resigned_GovtService=$row2['resigned_GovtService'];
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(10,5 ,"$resigned_GovtService", 1, 'C');

            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(25,5 ,"If YES, give details: ", 0, 'L');

            $pdf->SetXY($x + 145, $y);
            $pdf->MultiCell(45,5 ,"", 1, 'L');

            $pdf->Ln(0);

            //39
             $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(115,5,"39. Have you acquired the status of an immigrant or permanent resident of another country?"."\n".""."\n".""."\n"."", 1, 'L');

             $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(75,15,"", 1, 'L');



             $pdf->Ln(-15);
             $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');

            //39 9. YES / NO

            $were_immigrant=$row2['were_immigrant'];
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(10,5 ,"$were_immigrant", 1, 'C');


            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(40,5 ,"If YES, give details (Country): ", 0, 'L');

            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
             $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            //DETIALS if YES
            $were_immigrant_country=$row2['were_immigrant_country'];
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(70,5 ,"$were_immigrant_country", 1, 'L');

            $pdf->Ln(0);


            $pdf->Ln(0);

            //40
             $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(115,5,"40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA"."\n"."7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:"."\n"."a. Are you a member of any indigenous group?"."\n".""."\n"."b. Are you a person with disability?"."\n".""."\n"."c. Are you a solo parent?"."\n".""."\n"."", 1, 'L');

             $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(75,40,"", 1, 'L');





             $pdf->Ln(-30);
             $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');

            //40. a YES / NO
            $indigenous_member=$row2['indigenous_member'];
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(10,5 ,"$indigenous_member", 1, 'C');

            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(27,5 ,"If YES, please specify:", 0, 'L');

            $indigenous_memberGroup=$row2['indigenous_memberGroup'];
            $pdf->SetXY($x + 147, $y);
            $pdf->MultiCell(43,5 ,"", 1, 'L');


             $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');

            //40. b YES / NO
            $PWD=$row2['PWD'];
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(10,5 ,"$PWD", 1, 'C');

            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(35,5 ,"If YES, please specify ID No:", 0, 'L');

            $pdf->SetXY($x + 155, $y);
            $pdf->MultiCell(35,5 ,"", 1, 'L');


            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');

            //40. c YES / NO
            $solo_parent=$row2['solo_parent'];
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(10,5 ,"$solo_parent", 1, 'C');

            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 115, $y);
            $pdf->MultiCell(5,5 ,"", 0, 'L');
            
            $pdf->SetXY($x + 120, $y);
            $pdf->MultiCell(35,5 ,"If YES, please specify ID No:", 0, 'L');

            $solo_parentID=$row2['solo_parentID'];
            $pdf->SetXY($x + 155, $y);
            $pdf->MultiCell(35,5 ,"$solo_parentID", 1, 'L');

            //41
            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
             $pdf->MultiCell(130,5 ,"41. REFERENCES (Person not related by consanguinity or affinity to applicant /appointee)", 1, 'L');

             $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX(); 
            $pdf->MultiCell(50,5 ,"NAME", 1, 'C');
            $pdf->SetXY($x + 50, $y);
            $pdf->MultiCell(50,5 ,"ADDRESS", 1, 'C');
            $pdf->SetXY($x + 100, $y);
            $pdf->MultiCell(30,5 ,"TEL. NO.", 1, 'C');
            //DATA

            $sql3="SELECT * FROM pims_ref WHERE emp_No=$emp_no";
        $result3=mysqli_query($mysqli,$sql3);
        $num_rows = mysqli_num_rows($result3);
        while($row3=mysqli_fetch_assoc($result3))
                {
                   
                    $r_name=$row3['r_name'];
                    $r_address=$row3['r_address'];
                    $r_telno=$row3['r_telno'];
  
       
            
            $pdf->Cell(50,5,"$r_name",1,0,"C");
            $pdf->Cell(50,5,"$r_address",1,0,"C");
            $pdf->Cell(30,5,"$r_telno",1,1,"C");

                  
                }

            $pdf->Ln(0);
                 for($c=$num_rows;$c<=2;$c++)
            {
            $pdf->Cell(50,5,"",1,0,"C");
            $pdf->Cell(50,5,"",1,0,"C");
            $pdf->Cell(30,5,"",1,1,"C");

            }

            //42
            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetFont('Arial','',6);
             $pdf->MultiCell(130,5 ,"42. I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines. I authorize the agency head / authorized representative to verify/validate the contents stated herein. I  agree that any misrepresentation made in this document and its attachments shall cause the filing of administrative/criminal case/s against me.", 1, 'J');

            $pdf->Ln(-45);
            $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 140, $y);
            $pdf->MultiCell(45,5,"ID picture taken within the last  6 months 3.5 cm. X 4.5 cm (passport size)"."\n"."With full and handwritten"."\n"."name tag and signature over"."\n"."printed name"."\n"."Computer generated"."\n"."or photocopied picture"."\n"."is not acceptable", 1, 'C');

             //42
            $pdf->Ln(5);
            $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->MultiCell(65,5 ,"Government Issued ID (i.e.Passport, GSIS, SSS, PRC, Driver's License, etc.)PLEASE INDICATE ID Number and Date of Issuance", 1, 'L');
            $pdf->SetXY($x + 65, $y);
            $pdf->MultiCell(65,15 ,"", 1, 'C');
            $pdf->SetFont('Arial','',7);


            $pdf->Ln(-5);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(30,5 ,"Government Issued ID:", 1, 'L');
            $pdf->SetXY($x + 30, $y);
            $pdf->MultiCell(35,5 ,"", 1, 'C');

            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(30,5 ,"ID/License/Passport No.:", 1, 'L');
            $pdf->SetXY($x + 30, $y);
            $pdf->MultiCell(35,5 ,"", 1, 'C');


            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(30,5 ,"Date/Place of Issuance:", 1, 'L');
            $pdf->SetXY($x + 30, $y);
            $pdf->MultiCell(35,5 ,"", 1, 'C');

            $pdf->Ln(-10);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetFont('Arial','',6);
            $pdf->SetXY($x + 65, $y);
            $pdf->MultiCell(65,3.33 ,"Signature (Sign inside the box)", 1, 'C');

            //DATA on DATE ACCOMPLISHED
            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 65, $y);
            $pdf->MultiCell(65,3.33 ,"", 1, 'C');

            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x + 65, $y);
            $pdf->MultiCell(65,3.33 ,"Date Accomplished", 1, 'C');


            $pdf->Ln(-30);
            $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x +145, $y);
            $pdf->MultiCell(35,25 ,"", 1, 'C');


            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();

            $pdf->SetXY($x +145, $y);
            $pdf->MultiCell(35,3.33 ,"Right Thumbmark", 1, 'C');

        

            $pdf->Ln(1.5);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(47,3.33,"SUBSCRIBED AND SWORN to before me this", 1, 'L');
             $pdf->SetXY($x +47, $y);
            $pdf->MultiCell(63,3.33 ,"", 1, 'C');

            $pdf->SetXY($x +110, $y);
            $pdf->MultiCell(80,3.33 ,", affiant exhibiting his/her validly issued government ID as indicated above.", 1, 'L');

            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 50, $y);
            $pdf->MultiCell(60,7,"", 1, 'L');

            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->SetXY($x + 50, $y);
            $pdf->MultiCell(60,3.33,"Person Administering Oath", 1, 'C');


            $pdf->Ln(0);
            $y = $pdf->GetY();
            $x = $pdf->GetX();
            $pdf->MultiCell(190,3.33,"CS FORM 212 (Revised 2017),  Page 4 of 4", 1, 'R');


            $pdf->SetAutoPageBreak(1,1);
            
 







            


       










$pdf->Output();
?>
