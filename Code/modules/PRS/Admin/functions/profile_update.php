<?php
 include('../../connection.php');
 include('../../sanitise.php');

 
if(isset($_POST['submit1'])){
//database connection

								  
				 
			     $emp_No		= sanitise($_POST['emp_id']);
				 $basic_pay 	= sanitise($_POST['basic_pay']);
				 $allowance 	= sanitise($_POST['allowance']);
				 $absent_cost	= sanitise($_POST['absent_cost']);
				 $pag_ibig 		=sanitise($_POST['pag_ibig']);
				 $philhealth 	=sanitise($_POST['philhealth']);
				
				
				
					
				 $qry =("UPDATE    pims_personnel, prs_charges,prs_deduction, prs_payslip                                  
								   SET prs_payslip.basic_pay='$basic_pay', prs_payslip.allowance='$allowance',
								       prs_deduction.late='$absent_cost', prs_charges.pi_total='$pag_ibig',
									   prs_charges.ph_total='$philhealth'
								   Where pims_personnel.emp_No='$emp_No' AND 
								   prs_charges.emp_No=pims_personnel.emp_No AND 
                                   prs_deduction.charges_id=prs_charges.charges_id AND
                                   prs_payslip.emp_No=pims_personnel.emp_No");
                 $result = mysql_query($qry) or die("Failed Sql Query");
				 
 
			
				    $gross_pay= $basic_pay + $allowance;
					
					 $qry1 =("UPDATE    pims_personnel,  prs_payslip                                  
								   SET prs_payslip.gross_pay='$gross_pay'
								   Where pims_personnel.emp_No='$emp_No' AND 
								   prs_payslip.emp_No=pims_personnel.emp_No");
                 $result1 = mysql_query($qry1) or die("Failed Sql Query");
				 
 
if($result){
					echo "<script>alert('Success!'); </script>";
					echo "<script> window.location='../../admin/profile.php?emp_id=".$emp_No."' </script>";
					
				}else{
					echo "<script>alert('Error!'); </script>";
				}
 
				
}



?>						



