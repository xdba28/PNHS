<?php
        include("../db/dbcon.php");
        date_default_timezone_set('Asia/Manila');
        $date=date("Y-m-d");
        $yesterday=date("Y-m-d",time()-86400);
        session_start();
        if(isset($_SESSION['priv_data']['acct']['frms_priv']) && isset($_SESSION['acct_data']['acct']['emp_no']) && isset($_SESSION['user_data']['acct']['cms_account_ID']) && isset($_SESSION['user_data']['acct']['cms_password']) && isset($_SESSION['user_data']['acct']['cms_username']) ){
            $emp=$_SESSION['acct_data']['acct']['emp_no'];
            $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
            $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
            $recrow=mysqli_fetch_assoc($rec);
            $recid=$recrow['rec_no'];
        }else{
            echo "<script>alert('Error! You do not have permission to access this site!'); window.location='../login.php';</script>";
        }
    ?>
<html>
    
    <head>
    <style type = "text/css">

	.main{ margin: 10px 10px 0px 10px;}
	.second{margin: 0px 0px 350px 350px;float:left}
	.third{margin: 0px 0px 350px 5px;float:left}
	.fourth{ margin: 0px 0px 350px 7px;float:left}
	.fifth{margin: 0px 350px 350px 5px;}
	
 th, td {
       border: 1px solid black;
      }
	table.no_border{
            border: 0px;
      }  
    tr.no_border > td, td.no_border{
        border: 0px;;
        }
	  
      tr.hide_right > td, td.hide_right{
        border-right-style:hidden;
        }
         
     tr.hide_bot > td, td.hide_bot{
		border-bottom-style:hidden;
	  }
    
     
    tr.show_only_bot > td, td.show_only_bot{
		border-right-style:hidden;
        border-top-style:hidden;
        border-left-style:hidden;
        
	  }  
        

      tr.hide_all > td, td.hide_all{
        border-style:hidden;
      }
	  td.bot_text {vertical-align:bottom;text-align:center;
	       border-right-style:hidden;
		border-left-style:hidden;
		border-top-style:hidden;
	  
	  }
	  	  td.right_text {text-align:right;
	       border-style:hidden;
	  }
    

    
    </style>
    <title> SERVICE RECORD </title>
    </head>

<body>
<div class='row'>
    <div class='col-md-4'></div>
    <div class='col-md-4'>

<div class='main'>
    <table  class='no_border' align='center'>
        <tr>
            <td class='hide_all' align='center'>
            <p>Republic of the Philippines <br>
                <b>DEPARTMENT OF EDUCATION <br>
                Region V</b>
                <br> DIVISION OF LEGAZPI CITY <br>
                <b>Pag-asa National High School</b>
                <br> Rawis, Legazpi City</p>
                <b>SERVICE RECORD</b><br>
                (To be accomplished by Employer)
            </td>
        </tr>
    </table>



    
   
    
    

<?php 
    
     $emp_no=$_GET['emp'];
    $sql="SELECT * FROM pims_personnel WHERE emp_No='$emp_no'";
$result=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_assoc($result);
    
echo"<p style='text-align:right'>
Emp. No. ".$row['emp_No']."<br>

   
 GSIS No. CM".$row['GSIS_No']."<br><br>    
</p>";    
    
    
 echo"<table width='660'  cellpadding='0' cellspacing='0'>
        <tr>
            <td class='no_border' width='50' align='center'>NAME:</td>
            <td class='show_only_bot' align='center' widht='150'>".$row['P_lname']."</td>
            <td class='show_only_bot' align='center' widht='150'>".$row['P_fname']."</td>
            <td class='show_only_bot' align='center' widht='50'>".$row['P_mname']."</td>
            <td class='no_border' width='260' align='center'>(If married woman, give maiden name)</td>
        </tr>
         <tr>
            <td class='no_border' width='50' align='center'></td>
            <td  class='no_border' widht='150' align='center'>(Last)</td>
            <td  class='no_border' widht='150' align='center'>(First)</td>
            <td  class='no_border' widht='50' align='center'>(MN)</td>
            <td class='no_border' width='260' align='center'></td>
        </tr>
  </table>
    
 <table width='660'  cellpadding='0' cellspacing='0'>
        <tr>
            <td class='no_border' width='50' align='center'>BIRTHDATE:</td>
            <td class='show_only_bot' align='center' widht='250'>".$row['pims_birthdate']."</td>

            <td class='no_border' width='360' >(Date herein should be checked from birth or baptismal<br>
                                    Certificate or some reliable documents)</td>
        </tr>
  
  </table>
    
    <table width='1000'  cellpadding='0' cellspacing='0'>
     <tr >
     <td class='no_border' width='1000' >&nbsp &nbsp &nbsp This is to certify that the employee named herein above actually rendered service in this Office and shown by the <br> service record below each line of which supported and other paper actually issued this Office and <br>
     approved by the authorities concerned. <br><br>
     </td>
     </tr>
    </table>
    
 <table style='width:70%' border='1' align='center' cellpadding='0' cellspacing='0'>
    <tr>
        <th colspan='2'>SERVICE <br> Inclusive Date</th>
        <th colspan='3'>RECORD OF APPOINTMENT</th>
        <th rowspan=2>OFFICE ENTRY DIV./STATION <br> Place of Assignment</th>
        <th rowspan=2>SOURCE OF FUND</th>
        <th rowspan=2>REMARKS</th>
    </tr> 
    
    <tr>
        <td align='center'>From</td>
        <td align='center'>To</td>
        <td align='center'>Designation</td>
        <td align='center'>STATUS</td>
        <td align='center'>SALARY</td>
 
    </tr>";
    
    
   
    
            $sql="SELECT * FROM pims_personnel,pims_service_records,pims_employment_records
            WHERE pims_personnel.emp_No=pims_employment_records.emp_No and pims_employment_records.emp_rec_ID=pims_service_records.emp_rec_ID and pims_employment_records.emp_No='$emp_no' ";
            $result=mysqli_query($mysqli,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<tr>";
	
                    echo "<td align='center'><font size='3'>".$row['inclusive_date_start']."</font></td>";
                    echo "<td align='center'><font size='3'>".$row['inclusive_date_end']."</font></td>";
                    echo "<td align='center'><font size='3'>".$row['designation']."</font></td>";
                    echo "<td align='center'><font size='3'>".$row['sr_status']."</font></td>";
                    echo "<td align='center'><font size='3'>".$row['salary']."</font></td>";
                    echo "<td align='center'><font size='3'>".$row['place_of_assignment']."</font></td>";
                    echo "<td align='center'><font size='3'>".$row['srce_of_fund']."</font></td>";
                    echo "<td align='center'><font size='3'>".$row['remarks']."</font></td>";
                
	
                echo "</tr>";
            }
    
    
    echo"</table>

<p style='text-align:center'>Issued in compliance with Executive Order No. 54, dated August 10, 1954 and in accordance with<br> Circular No. 10's 1954 of the system</p>";
    
    ?>   
    <center><button onclick="print()" type="button" class="btn btn-success">Print</button></center>

</div>
</div> 
</div>
</body>
</html>