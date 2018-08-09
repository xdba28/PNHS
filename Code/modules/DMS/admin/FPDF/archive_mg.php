<?php
include('dummyconnection.php');
require('fpdf.php');

$emp_no=$_GET['emp'];
$docmg=$mysqli->query("SELECT css_section.section_id,section_name 
FROM pims_personnel,pims_employment_records,css_section,css_school_yr
WHERE css_section.sy_id=css_school_yr.sy_id
AND pims_personnel.emp_no=pims_employment_records.emp_no
AND pims_employment_records.emp_rec_id=css_section.emp_rec_id
ANd status='active'
AND pims_employment_records.emp_no=$emp_no");
$mg=mysqli_fetch_assoc($docmg);
$sec=$mg['section_id'];
$sec_name=$mg['section_name'];
class PDF extends FPDF
{
    function Header(){
        include('dummyconnection.php');

        $emp_no=$_GET['emp'];
        $docmg=$mysqli->query("SELECT css_section.section_id 
        FROM pims_personnel,pims_employment_records,css_section,css_school_yr
        WHERE css_section.sy_id=css_school_yr.sy_id
        AND pims_personnel.emp_no=pims_employment_records.emp_no
        AND pims_employment_records.emp_rec_id=css_section.emp_rec_id
        AND pims_employment_records.emp_no=$emp_no");
        $mg=mysqli_fetch_assoc($docmg);
        $sec=$mg['section_id'];

        $temp_sql=mysqli_query($mysqli,"SELECT *
        FROM css_section,css_school_yr
        WHERE css_section.sy_id=css_school_yr.sy_id
        AND css_section.SECTION_ID='$sec'");
        $hi=mysqli_fetch_assoc($temp_sql);
    
        $sy=$hi['year'];
        $yr_lvl= $hi['YEAR_LEVEL'];
        $sec_name=$hi['SECTION_NAME'];
        $this->Cell(80,30," ",0,0,"C");
        $this->Image('../../docs/img/pnhs_logo.png',20,6,25);
        $this->SetFont("Arial","B","20");
        // Title
        $this->Cell(120,10,"Final Grades and General Average",0,0,"C");
        $this->Image('../../docs/img/deped_logo.png',250,6,25);
        $this->Cell(30,25,"",0,1,"C");

        $this->SetFont('Arial','B','10');
        $this->Cell(46.33,5,"Region:",0,0,"R");
        $this->Cell(56.33,5,"V",1,0,"C");
        $this->Cell(5,5,"",0,0,"C");
        $this->Cell(21.33,5,"Division:",0,0,"L");
        $this->Cell(46.33,5,"Legazpi City Division",1,0,"C");
        $this->Cell(46.33,5,"School Year:",0,0,"R");
        $this->Cell(46.33,5,"$sy",1,1,"C");


        $this->Cell(46.33,5,"School Name:",0,0,"R");
        $this->Cell(56.33,5,"Pag-Asa National High School",1,0,"C");
        $this->Cell(5,5,"",0,0,"L");
        $this->Cell(21.33,5,"School ID:",0,0,"L");
        $this->Cell(46.33,5,"302261",1,0,"C");
        $this->Cell(46.33,5,"Grade & Section:",0,0,"R");
        $this->Cell(46.33,5," $yr_lvl-$sec_name",1,1,"C");
    }


}



$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$sql="SELECT emp_no,p_lname,p_fname,concat(ifnull(substring(p_mname,'1','1'),'N/A'),'.') as mname,pims_birthdate,GSIS_No FROM pims_personnel WHERE emp_No='$emp_no'";
$result=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_assoc($result);

$p_fname=$row['p_fname'];
$p_mname=$row['mname'];
$p_lname=$row['p_lname'];
//DATA

$pdf->SetFont('Arial','B','6');

$pdf->Ln(5);

$temp_sql=mysqli_query($mysqli,"SELECT *
FROM css_section,css_school_yr
WHERE css_section.sy_id=css_school_yr.sy_id
AND css_section.SECTION_ID='$sec'");
$hi=mysqli_fetch_assoc($temp_sql);
$sy=$hi['sy_id'];
 //DISPLAY_SUBJECTS
$pdf->SetFillColor(175,238,238);  
$pdf->Cell(47.8,5,"Adviser: $p_fname $p_mname $p_lname ",1,0,"C","TRUE");
        
$temp_sql="SELECT DISTINCT css_subject.subject_name 
FROM css_section,css_school_yr,css_subject,css_schedule
WHERE css_schedule.section_id=css_section.SECTION_ID 
and css_schedule.sy_id=css_school_yr.sy_id 
and css_schedule.subject_id=css_subject.subject_id 
AND css_schedule.sy_id=$sy 
AND css_schedule.section_id=$sec";
$sql1=" $temp_sql ORDER BY css_subject.subject_name ASC";
$result1=mysqli_query($mysqli,$sql1);
$num_subject= mysqli_num_rows($result1);

while($row1=mysqli_fetch_assoc($result1))  {
    $subject=$row1['subject_name'];
    $pdf->Cell(25.51,5,"$subject",1,0,"C",'TRUE');

}
                  
$pdf->Cell(25.51,5,"General Avg",1,1,"C","TRUE");

//QUARTERS_FG
$pdf->Cell(47.8,5,"Name of Learners",1,0,"C");
$num='1';    
while ($num<= $num_subject):
$pdf->Cell(20.4,5,"Quarter",1,0,"C");
$pdf->Cell(5.1,5,"FG",1,0,"C");
     $num++;
endwhile;
 $pdf->Cell(25.51,5,"",1,1,"C");


//QUARTERS
$pdf->Cell(47.8,5,"",1,0,"C");
 $num='1';
while ($num<= $num_subject):
$pdf->Cell(5.1,5,"1st",1,0,"C");
$pdf->Cell(5.1,5,"2nd",1,0,"C");
$pdf->Cell(5.1,5,"3rd",1,0,"C");
$pdf->Cell(5.1,5,"4th",1,0,"C");
$pdf->Cell(5.1,5,"",1,0,"C");
    $num++;
endwhile;
$pdf->Cell(25.51,5,"",1,1,"C");


//MALE_SPACE
$pdf->Cell(47.8,5,"MALE",1,0,"C");
 $num='1';
while ($num<= $num_subject):
$pdf->Cell(5.1,5,"",1,0,"C");
$pdf->Cell(5.1,5,"",1,0,"C");
$pdf->Cell(5.1,5,"",1,0,"C");
$pdf->Cell(5.1,5,"",1,0,"C");
$pdf->Cell(5.1,5,"",1,0,"C");
    $num++;
endwhile;
$pdf->Cell(25.51,5,"",1,1,"C");



//MALE_PHP

 $temp_sql1="SELECT DISTINCT sis_student.lrn,sis_student.stu_fname,sis_student.stu_mname,sis_student.stu_lname 
 FROM sis_student,css_schedule,sis_stu_rec
  WHERE sis_student.lrn=sis_stu_rec.lrn 
  AND css_schedule.section_id=sis_stu_rec.section_id 
   and sis_stu_rec.sy_id=$sy 
  AND sis_student.sis_gender='Male' 
  AND sis_stu_rec.section_id=$sec
  ORDER BY sis_student.stu_lname asc";
           
           
$sql1=$temp_sql1;
                $result=mysqli_query($mysqli,$sql1);
           while($row=mysqli_fetch_assoc($result))
           {
                $lrn=$row['lrn'];
               
        
                $l_name=$row['stu_lname'];
                $f_name=$row['stu_fname'];
                $m_name=$row['stu_mname'];
               
               $pdf->Cell(47.8,5,"$l_name,$f_name $m_name",1,0,"C");
               
               
               $temp_sql2="SELECT * FROM sis_student,sis_stu_rec,css_subject,sis_grade 
                        WHERE sis_student.lrn=sis_stu_rec.lrn 
                        AND sis_grade.subject_id=css_subject.subject_id 
                        and sis_stu_rec.sy_id=$sy 
                        and sis_student.lrn=$lrn
                        AND sis_stu_rec.rec_id=sis_grade.rec_id
                        AND sis_stu_rec.section_id=$sec";         
           
                 $sql2=" $temp_sql2 ORDER BY css_subject.subject_name, sis_grade.sis_grade_quarter ASC
                 ";
                $result2=mysqli_query($mysqli,$sql2);
              while($row2=mysqli_fetch_assoc($result2))  
              {
                  $grade=$row2['grade_val'];
                    $pdf->Cell(5.1,5,"$grade",1,0,"C");
                  
                   
                  
                  
                
              }
               
               
            
               $sql3="SELECT * FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade 
               WHERE sis_student.lrn=sis_stu_rec.lrn 
               and sis_stu_rec.section_id=css_section.SECTION_ID 
               and sis_stu_rec.sy_id=css_school_yr.sy_id 
               and sis_stu_rec.rec_id=sis_grade.rec_id
                and sis_stu_rec.sy_id=$sy 
               and sis_student.lrn=$lrn 
               AND sis_stu_rec.section_id=$sec 
               and sis_grade.sis_grade_quarter='Final'";
                
                $result3=mysqli_query($mysqli,$sql3);
            $row3=mysqli_fetch_assoc($result3);
         
            $final=$row3['grade_val'];
            if($final<="74" && !empty($final)){
                $pdf->SetFillColor(255,69,0);
                $pdf->Cell(25.51,5,"$final",1,1,"C","TRUE");
            }else{
                $pdf->Cell(25.51,5,"$final",1,1,"C");
            }

  
            
           
           }



//FEMALE_SPACE
$pdf->Cell(47.8,5,"FEMALE",1,0,"C");
 $num='1';
while ($num<= $num_subject):
$pdf->Cell(5.1,5,"",1,0,"C");
$pdf->Cell(5.1,5,"",1,0,"C");
$pdf->Cell(5.1,5,"",1,0,"C");
$pdf->Cell(5.1,5,"",1,0,"C");
$pdf->Cell(5.1,5,"",1,0,"C");
    $num++;
endwhile;
$pdf->Cell(25.51,5,"",1,1,"C");

//FEMALE_PHP

 $temp_sql1="SELECT DISTINCT sis_student.lrn,sis_student.stu_fname,sis_student.stu_mname,sis_student.stu_lname 
 FROM sis_student,css_schedule,sis_stu_rec
  WHERE sis_student.lrn=sis_stu_rec.lrn 
  AND css_schedule.section_id=sis_stu_rec.section_id 
   and sis_stu_rec.sy_id=$sy 
  AND sis_student.sis_gender='Female' 
  AND sis_stu_rec.section_id=$sec
  ORDER BY sis_student.stu_lname asc";
           
           
$sql1=$temp_sql1;
                $result=mysqli_query($mysqli,$sql1);
           while($row=mysqli_fetch_assoc($result))
           {
                $lrn=$row['lrn'];
               
        
                $l_name=$row['stu_lname'];
                $f_name=$row['stu_fname'];
                $m_name=$row['stu_mname'];
               
               $pdf->Cell(47.8,5,"$l_name,$f_name $m_name",1,0,"C");
               
               
               $temp_sql2="SELECT * FROM sis_student,sis_stu_rec,css_subject,sis_grade 
                        WHERE sis_student.lrn=sis_stu_rec.lrn 
                        AND sis_grade.subject_id=css_subject.subject_id 
                        and sis_stu_rec.sy_id=$sy 
                        and sis_student.lrn=$lrn
                        AND sis_stu_rec.rec_id=sis_grade.rec_id
                        AND sis_stu_rec.section_id=$sec";         
           
                 $sql2=" $temp_sql2 ORDER BY css_subject.subject_name, sis_grade.sis_grade_quarter ASC
                 ";
                $result2=mysqli_query($mysqli,$sql2);
              while($row2=mysqli_fetch_assoc($result2))  
              {
              $grade=$row2['grade_val'];     
                  
                  $pdf->Cell(5.1,5,"$grade",1,0,"C");
                
              }
               
               
            
               $sql3="SELECT * FROM sis_student,sis_stu_rec,css_section,css_school_yr,sis_grade 
               WHERE sis_student.lrn=sis_stu_rec.lrn 
               and sis_stu_rec.section_id=css_section.SECTION_ID 
               and sis_stu_rec.sy_id=css_school_yr.sy_id 
               and sis_stu_rec.rec_id=sis_grade.rec_id
                and sis_stu_rec.sy_id=$sy 
               and sis_student.lrn=$lrn 
               AND sis_stu_rec.section_id=$sec 
               and sis_grade.sis_grade_quarter='Final'";
                
                $result3=mysqli_query($mysqli,$sql3);
              $row3=mysqli_fetch_assoc($result3);
         
             $final=$row3['grade_val'];
      
           $pdf->Cell(25.51,5,"$final",1,1,"C");

  
            
           
           }

$person=$mysqli->query("SELECT faculty_type,concat(p_lname,'_',p_fname) as Name, concat(p_fname,' ',p_lname) as arch
FROM pims_personnel,pims_employment_records
WHERE pims_personnel.emp_no=pims_employment_records.emp_no
AND pims_employment_records.emp_no=$emp_no");
$per=$person->fetch_assoc();
$name=$sec_name."_MasterGradingSheet.pdf";        
$folder=$per['arch'];
$type=$per['faculty_type'];
$syqry=$mysqli->query("SELECT year FROM css_school_yr WHERE status='active'");
$syrow=$syqry->fetch_assoc();
$synow=$syrow['year'];
$disk=$_GET['disk'];
$pdf->Output('F',"$disk://Archive_".$synow."/".$folder."/".$name);
echo "<script>window.location.href='archive_sf1.php?emp=$emp_no&disk=$disk';</script>";

?>
