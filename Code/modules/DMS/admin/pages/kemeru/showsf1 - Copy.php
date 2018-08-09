<?php 
include('../db/dbcon.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SEARCH SF1</title>
<style type = "text/css">

	.main{width:1290gkpx; margin: 10px 10px 0px 10px;}
	.submain{width:1290px; margin: 0px 10px 10px 0x;}
	.second{margin: 0px 0px 0px 0px;float:left;-webkit-print-color-adjust: exact;}
	.third{margin: 0px 0px 0px 0px;float:left;-webkit-print-color-adjust: exact;}
	.fourth{margin: 0px 0px 0px 0px;float:left;-webkit-print-color-adjust: exact;}
	.fifth{margin: 0px 0px 0px 0px;float:left;-webkit-print-color-adjust: exact;}
	
	table, th, td {
       border: 1px solid black;	 border-collapse: collapse	;
      }
	table.no_border{
            border: 0px;
      }  
	  
    tr.hide_right > td, td.hide_right{
        border-right-style:hidden;}
		
	td.hide_left_right{

		border-left-style:hidden;
		border-right-style:hidden;

	  }
	
      
    tr.hide_all > td, td.hide_all{
        border-style:hidden;
      }
	  
	td.hide_top {

		border-top-style:hidden;

	  }
	  
	td.hide_bottom {

		border-bottom-style:hidden;

	  }
	  
	  
	td.bot_text {vertical-align:bottom;text-align:center;
	  
	  }
	td.right_text {text-align:right;
		   		border-left-style:hidden;
		border-top-style:hidden;
				border-bottom-style:hidden;
	  }
	td.right_text_left_border {text-align:right;
		border-top-style:hidden;
				border-bottom-style:hidden;
	  }
	  

    
	</style>

</head>
<body>



<?php 


		$stu_yr_lvl=7;
		
		$SECTION_NAME='Benevolent';
		
		$sy_start='2015';
		
		$sy_end='2016';
    ?>
    <div>
        <table  class='no_border' align='center'> 
            <tr>
                <td class='hide_all'align='center'><font size='6'>School Form 1 (SF1) School Register</font> <br>
                    <font size='1'>(This replaces Form 1, Master List & STSForm 2-Family Background and Profile)</font>
                </td>
            </tr>  
        </table> 
        <table class='no_border' >
            <tr>
                <td class='right_text' width='150'><font size='2'>School ID</font></td>
                <td width='100'> <font size='3'></font></td>
                <td class='hide_top' width='5'><font size='3'></font></td>
                <td width='65' align='center'><font size='2'>Region V</font></td>
                <td  class='right_text_left_border' width='100'> <font size='2'>Division</font></td>
                <td colspan='3' align='center' width='240'> <font size='2'>Legaspi City</font></td>
            </tr>

            <tr>
                <td class='right_text'> <font size='2'>School Name</font></td>
                <td colspan='3' align='center' ><font size='2'>Pag-asa National High School</font></td>
                <td class='right_text_left_border'> <font size='2'>School Year</font></td>
                <td align='center'> <font size='2'><?php echo $sy_start."-".$sy_end; ?></font></td>

                <td align='center'> <font size='2'>Grade Level</font></td>
                <td align='center'> <font size='2'><?php echo $stu_yr_lvl; ?></font></td>
                <td class='right_text_left_border' width='50'> <font size='2'>Section</font></td>
                <td align='center' width='300'><font size='2'><?php echo $SECTION_NAME ;?></font></td>
            </tr>
        </table>

        <table>
            <tr>
                <td width='100' rowspan='2' align='center'> <font size='2'>LRN</font></td>
                <td width='150' rowspan='2' align='center'> <font size='2'>NAME<br>(Last Name,First Name <br> Middle Name)</font></td>
                <td width='10' rowspan='2' align='center'> <font size='1'>SEX<br>(M/F)</font></td>
                <td width='50' rowspan='2' align='center'> <font size='1'>BIRTH DATE<br>(mm/dd/yyyy)</font></td>
                <td width='35' rowspan='2'  align='center'> <font size='1'>AGE as of 1st<br>Friday June</font></td>

                <td width='50' rowspan='2' align='center'><font size='1'>MOTHER<br>TONGUE<br>(Grade 1 to <br> 3 Only)</font></td>

                <td width='35' rowspan='2' align='center'><font size='1'>IP<br>(Ethnic<br>Group)</font></td> 

                <td width='85' rowspan='2' align='center'> <font size='1'>RELIGION</font></td>

                <td colspan='4' align='center'> <font size='1'>ADDRESS</font></td>

                <td  colspan='2' align='center'> <font size='1'>PARENTS</font></td>

                <td  colspan='2' align='center'> <font size='1'>GUARDIANS<br>(if Not Parent)</font></td>

                <td rowspan='2' align='center'> <font size='1'>Contact #<br>of Parent or Gurdian</font></td>

                <td align='center'> <font size='1'>REMARKS</font></td>

            </tr>

            <tr>
                <td align='center'><font size='1'>House#/<br>Street/<br>Sitio/<br>Purok</font></td>
                <td width='55' align='center'> <font size='1'>Barangay</font></td> 
                <td  width='55' align='center'> <font size='1'>Municipality/<br>City</font></td>
                <td width='55' align='center'> <font size='1'>Province</font></td> 
                <td width='85' align='center'> <font size='1'>Father's Name<br>(Last Name,<br>First Name,<br>Middle Name)</font></td>
                <td width='85' align='center'> <font size='1'>Mother's Maiden Name<br>(Last Name,<br>First Name,<br>Middle Name)</font></td>
                <td width='85' align='center'> <font size='1'>Name</font></td>
                <td width='85' align='center'> <font size='1'>Relationship</font></td>
                <td width='68' align='center'> <font size='1'>(Please refer to<br>the legend on<br>last page)</font></td>
            </tr>

    
<?php
    
 $sql="SELECT * FROM sis_student,sis_parent_guardian,sis_stu_rec,css_section,css_school_yr 
        WHERE sis_student.lrn=sis_parent_guardian.lrn and sis_student.lrn=sis_stu_rec.lrn and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id and sis_student.sis_gender='Male'
        and css_section.SECTION_NAME='Lark' 
        and css_section.year_level='7'
        and year='2017-2018'
        ORDER BY sis_student.stu_lname asc";
$result=mysqli_query($mysqli,$sql);
$nboys=mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result))
{ ?>
            <tr>
                <td><font size='1'><?php echo $row['lrn'];?></font></td>
                <td><font size='1'><?php echo $row['stu_lname'].",".$row['stu_fname']." ".$row['stu_mname'];?></font></td>
                <td><font size='1'><?php echo $row['sis_gender'];?></font></td>
                <td><font size='1'><?php echo $row['sis_b_day'] ;?></font></td>
                <td><font size='1'><?php echo 'age';?></font></td>
                <td><font size='1'><?php echo $row['m_tounge'];?></font></td>
                <td><font size='1'><?php echo $row['ethnic'];?></font></td>
                <td><font size='1'><?php echo $row['sis_religion'];?></font></td>
                <td><font size='1'><?php echo $row['street'];?></font></td>
                <td><font size='1'><?php echo $row['brng'];?></font></td>
                <td><font size='1'><?php echo $row['munic'];?></font></td>
                <td><font size='1'><?php echo 'Albay';?></font></td>
                <td><font size='1'><?php echo $row['sis_father'];?></font></td>
                <td><font size='1'><?php echo $row['sis_mother'];?></font></td>
                <td><font size='1'><?php echo $row['sis_guardian'];?></font></td>
                <td><font size='1'><?php echo $row['guardian_relation'];?></font></td>
                <td><font size='1'><?php echo $row['pg_contact'];?></font></td>
                <td><font size='1'><?php echo 'REMARKS';?></font></td>
            </tr>
  
<?php
}?> 
            <tr>
                <td align='center'><font size='1'><?php echo $nboys;?></font></td>
                <td><font size='1'><?php "<=== TOTAL MALE";?></font></td>
                <td><font size='1'></font></td>    
                <td><font size='1'></font></td>
                <td><font size='1'></font></td>
                <td><font size='1'></font></td>
                <td><font size='1'></font></td>
                <td><font size='1'></font></td>
                <td><font size='1'></font></td>
                <td><font size='1'></font></td>
                <td><font size='1'></font></td>	
                <td><font size='1'></font></td>
                <td><font size='1'></font></td>
                <td><font size='1'></font></td>
                <td><font size='1'></font></td>
                <td><font size='1'></font></td>
                <td><font size='1'></font></td>
                <td><font size='1'></font></td>
            </tr>

<?php
    
 $sqlg="SELECT * FROM sis_student,sis_parent_guardian,sis_stu_rec,css_section,css_school_yr 
        WHERE sis_student.lrn=sis_parent_guardian.lrn and sis_student.lrn=sis_stu_rec.lrn and sis_stu_rec.section_id=css_section.SECTION_ID
        and sis_stu_rec.sy_id=css_school_yr.sy_id and sis_student.sis_gender='Female'
        and css_section.SECTION_NAME='Lark' 
        and css_section.year_level='7'
        and year='2017-2018'
        ORDER BY sis_student.stu_lname asc";
$resultg=mysqli_query($mysqli,$sqlg);
$ngirls=mysqli_num_rows($resultg);
while($rowg=mysqli_fetch_assoc($resultg))
{ ?>
            <tr>
                <td><font size='1'><?php echo $rowg['lrn'];?></font></td>
                <td><font size='1'><?php echo $rowg['stu_lname'].",".$row['stu_fname']." ".$row['stu_mname'];?></font></td>
                <td><font size='1'><?php echo $rowg['sis_gender'];?></font></td>
                <td><font size='1'><?php echo $rowg['sis_b_day'] ;?></font></td>
                <td><font size='1'><?php echo 'age';?></font></td>
                <td><font size='1'><?php echo $rowg['m_tounge'];?></font></td>
                <td><font size='1'><?php echo $rowg['ethnic'];?></font></td>
                <td><font size='1'><?php echo $rowg['sis_religion'];?></font></td>
                <td><font size='1'><?php echo $rowg['street'];?></font></td>
                <td><font size='1'><?php echo $rowg['brng'];?></font></td>
                <td><font size='1'><?php echo $rowg['munic'];?></font></td>
                <td><font size='1'><?php echo 'Albay';?></font></td>
                <td><font size='1'><?php echo $rowg['sis_father'];?></font></td>
                <td><font size='1'><?php echo $rowg['sis_mother'];?></font></td>
                <td><font size='1'><?php echo $rowg['sis_guardian'];?></font></td>
                <td><font size='1'><?php echo $rowg['guardian_relation'];?></font></td>
                <td><font size='1'><?php echo $rowg['pg_contact'];?></font></td>
                <td><font size='1'><?php echo 'REMARKS';?></font></td>
            </tr>
<?php
}
?>
    <tr>        
    <td align='center'><font size='1'><?php $ngirls; ?> </font></td>
	<td><font size='1'> <?php echo "<=== TOTAL FEMALE"; ?> </font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
    <td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>	
    <td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
    <td><font size='1'></font></td>
</tr>
<?php
$tot=$nboys+$ngirls;
?> 
<tr>
<td align='center'><font size='1'><?php echo $tot; ?></font></td>
	<td><font size='1'><?php echo "<=== COMBINED"; ?> </font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
		<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>	
		<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>
	<td><font size='1'></font></td>

		<td><font size='1'></font></td>
</tr>
</table>
</div>  

<div class='submain'>
    <div class='second'>
        <table width='680'>
            <tr>
                <td colspan='6' align='center'>
                    <font size='1'>
                        List and Code of Indicators under REMARKS column
                    </font>
                </td>
            </tr>
            <tr>
                <td height='22' width='116' align='center'> <font size='1'>Indicator</font></td>
                <td width='15' align='center'> <font size='1'>Code</font></td>
                <td width='150' align='center'> <font size='1'>Required Information</font></td>
                <td width='100' align='center'> <font size='1'>Indicator</font></td>
                <td width='15' align='center'> <font size='1'>Code</font></td>
                <td width='150' align='center'> <font size='1'>Required Information</font></td>
            </tr>
            <tr>
                <td height='22' align='center'> <font size='1'>Transfered Out</font></td>
                <td align='center'> <font size='1'>T/O</font></td>
                <td align='center'> <font size='1'>Name of Public(P) Private (PR) School & Effectively Date</font></td>
                <td align='center'> <font size='1'>CCT Recepient</font></td>
                <td align='center'> <font size='1'>CCT</font></td>
                <td align='center'> <font size='1'>CCT Control/Reference NO. & Effectively Date</font></td>
            </tr>
 
            <tr>
                <td height='22' align='center'> <font size='1'>Transfered In</font></td>
                <td align='center'> <font size='1'>T/I</font></td>
                <td align='center'> <font size='1'>Name of Public(P) Private (PR) School & Effectively Date</font></td>
                <td align='center'> <font size='1'>Balik Aral</font></td>
                <td align='center'> <font size='1'>B/A</font></td>
                <td align='center'> <font size='1'>Name of School last attended & Year</font></td>
            </tr>

            <tr>
                <td height='22' align='center'> <font size='1'>Dropped</font></td>
                <td align='center'> <font size='1'>DRP</font></td>
                <td align='center'> <font size='1'>Reason and Effectively Date</font></td>
                <td align='center'> <font size='1'>Learner With Disability</font></td>
                <td align='center'> <font size='1'>LWD</font></td>
                <td align='center'> <font size='1'>Specify</font></td>
            </tr>

            <tr>
                <td height='22' align='center'> <font size='1'>Late Enrollee</font></td>
                <td align='center'> <font size='1'>LE</font></td>
                <td align='center'> <font size='1'>Reason (Enrollment beyond 1st Friday of</font></td>
                <td align='center'> <font size='1'>Accelerated</font></td>
                <td align='center'> <font size='1'>ACL</font></td>
                <td align='center'> <font size='1'>Specify Level & Effectively Data</font></td>
            </tr>
        </table>
    </div>

    <div class='third'>
        <table>
            <tr>
                <td height='40' width='30' align='center'> <font size='1'>REGISTERED</font></td>
                <td width='30'  align='center'> <font size='1'>BoSY</font></td>
                <td width='30'  align='center'> <font size='1'>EoSY</font></td>
            </tr>
            <tr>
                <td height='30' align='center'> <font size='2'>MALE</font></td>
                <td  align='center'> <font size='2'><?php echo $nboys; ?></font></td>
                <td align='center'> <font size='2'><?php echo $nboys; ?></font></td>
            </tr>
            <tr>
                <td height='30' align='center'> <font size='2'>FEMALE</font></td>
                <td align='center'> <font size='2'><?php echo $ngirls; ?></font></td>
                <td align='center'> <font size='2'><?php echo $ngirls; ?></font></td>
            </tr>
            <tr>
                <td height='25' align='center'> <font size='2'>TOTAL</font></td>
                <td align='center'> <font size='2'></font><?php echo $tot; ?></td>
                <td align='center'> <font size='2'></font><?php echo $tot; ?></td>
            </tr>
        </table>
    </div>

    <div class='fourth'>
        <table width='200'>
        <tr>
            <td class='hide_bottom' height='20' colspan='4'> <font size='1'>Prepared by;</font></td>
        </tr>
        <tr>
            <td class='bot_text' colspan='4' height='63' width='200' align='bottom-center' > <font size='1'>DENNIS MARBELLA SERRANO<!-- SAMPLE --></font></td>
        </tr>
        <tr>
            <td colspan='4' align='center'>   <font size='1'>(Signature of Adviser over Printed Name)</font></td>
        </tr>
     
            <td height='30' > <font size='1'>BoSY</font></td>
            <td>   <font size='1'>EoSY</font></td>
      
                	
        </table>
    </div>



    <div class='fifth'>
        <table width='200'>
        <tr>
            <td class='hide_bottom' height='20' colspan='4'> <font size='1'>Certified Correct:</font></td>

        </tr>
        <tr>
             <td class='bot_text' colspan='4' height='63' width='200' align='bottom-center'><font size='1'>JEREMY A. CRUZ<!-- SAMPLE --></font></td>

        </tr>
        <tr>
              <td colspan='4' align='center'><font size='1'>(Signature of School Head over Printed Name)</font></td>
        </tr>
        
            <td height='30' > <font size='1'>BoSY</font></td>
          
            
        </table>
    </div>
</div>
</body>
</html>