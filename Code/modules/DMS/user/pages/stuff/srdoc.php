<html>
    <head>
    <?php
        include("../dbcon.php");
        date_default_timezone_set('Asia/Manila');
        $date=date("Y-m-d");
        $yesterday=date("Y-m-d",time()-86400);
        session_start();
        if(isset($_SESSION['emp']) && isset($_SESSION['aid'])){
            $emp=$_SESSION['emp'];
            $aid=$_SESSION['aid'];
            $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
            $recrow=mysqli_fetch_assoc($rec);
            $recid=$recrow['rec_no'];
        }else{
            echo "<script>alert('Error! You do not have permission to access this site!'); window.location='login.php';</script>";
        }
    ?>
    
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <style type = "text/css">

	.main{ margin: 10px 350px 0px 350px;}
	.second{margin: 0px 0px 350px 350px;float:left}
	.third{margin: 0px 0px 350px 5px;float:left}
	.fourth{ margin: 0px 0px 350px 7px;float:left}
	.fifth{margin: 0px 350px 350px 5px;}
	
 table, th, td {
       border: 1px solid black;
      }
	table.no_border{
            border: 0px;
      }  
	  
      tr.hide_right > td, td.hide_right{
        border-right-style:hidden;
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
    <?php
        $sql=mysqli_query($mysqli,"SELECT pims_birthdate,p_fname,p_lname,substring(p_mname,1,1) as mname,gsis_no,inclusive_date_start,inclusive_date_end,designation,emp_status,salary,place_of_assignment,srce_of_fund,remarks,pims_employment_records.emp_no FROM pims_service_records,pims_employment_records,pims_personnel WHERE pims_personnel.emp_no=pims_employment_records.emp_no AND pims_service_records.emp_rec_ID=pims_employment_records.emp_rec_ID and pims_service_records.emp_rec_ID=110");
        $row=mysqli_fetch_assoc($sql);
           
    ?>
    </head>

<body>
    
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <div>
                <table  class="no_border" align="center">
                <tr>
                    <td class="hide_all" align="center">
                        <p>Republic of the Philippines <br>
                        <b>DEPARTMENT OF EDUCATION <br>Region V</b>
                        <br> DIVISION OF LEGAZPI CITY <br>
                        <b>Pag-asa National High School</b>
                        <br> Rawis, Legazpi City</p>

                        <b>SERVICE RECORD</b><br>
                        (To be accomplished by Employer)
                    </td>
                </tr>
                </table>


                <p style="text-align:right">
Emp. No.0000<?php echo $row["emp_no"]; ?><br>
GSIS No. CM<?php echo $row["gsis_no"]; ?><br><br>
</p>
    

    
                NAME: <u><?php echo $row['p_lname'].",&nbsp;&nbsp; ".$row['p_fname']."&nbsp;&nbsp;  ".$row["mname"]."."; ?></u> (If married woman, give maiden name)<br>
                        (Last)  (First) (MI) <br> <br>

                BIRTHDATE: <u><?php echo $row["pims_birthdate"]; ?></u> (Date herein should be checked from birth or baptismal<br>
                                                    Certificate or some reliable documents)<br><br>

                This is to certify that the employee named hereinabove actually rendered service in this Office and shown by <br>
                the service record below each line of which supported and otherr paper actually issued this Office and<br>
                approved by the authorities concerned. <br><br>

                <table style="width:100%" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <th colspan="2">SERVICE <br> Inclusive Date</th>
        <th colspan="3">RECORD OF APPOINTMENT</th>
        <th>OFFICE ENTRY DIV./STATION <br> Place of Assignment</th>
        <th>SOURCE OF FUND</th>
        <th>REMARKS</th>
    </tr> 
    
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;Destination&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;STATUS&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;SALARY&nbsp;&nbsp;</td>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td> &nbsp; </td> 
    </tr>
    
    <tr>
        <td><center><?php echo $row["inclusive_date_start"];
             ?> </center></td>
        <td><center> <?php echo $row["inclusive_date_end"]; ?> </center></td>
        <td><center> <?php echo $row["designation"]; ?> </center></td>
        <td><center> <?php echo $row["emp_status"]; ?></center> </td>
        <td><center> <?php echo $row["salary"]; ?> </center></td>
        <td><center> <?php echo $row["place_of_assignment"]; ?> </center></td>
        <td><center> <?php echo $row["srce_of_fund"]; ?></center> </td>
        <td><center> <?php echo $row["remarks"]; ?> </center></td>
        
    </tr>
    
    <tr>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td> &nbsp; </td> 
    </tr>
</table>

                <p style="text-align:center">Issued in compliance with Executive Order No. 54, dated August 10, 1954 and in accordance with<br> Circular No. 10's 1954 of the system</p>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    
    
<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</body>
</html>