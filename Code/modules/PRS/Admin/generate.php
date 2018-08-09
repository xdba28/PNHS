<?php
	include('../connection.php');
	include('../sanitise.php');
 
  if(isset($_POST['generate'])){
	  
	  
	  						
							$newnew = mysqli_query($mysqli,"SELECT count(pims_personnel.emp_No) as pers FROM pims_personnel, prs_salary_record, prs_salary, prs_grade
															  where  pims_personnel.emp_No=prs_salary_record.emp_No
                                                              AND prs_grade.grade_id=prs_salary_record.grade_id
                                                              AND prs_salary.salary_id=prs_salary_record.salary_id
															   
															  ");
								$newnew1= mysqli_fetch_array($newnew);
															
												$num = $newnew1['pers'];
												
								$newnew2 = mysqli_query($mysqli,"select count(emp_No) as new from pims_personnel");
									$perspers = mysqli_fetch_assoc($newnew2);
								$ploc = $perspers['new'];		
											
								$timecheck = mysqli_query($mysqli,"SELECT count(id) as lodi FROM `prs_dtr_rec` WHERE month(date_import)= month(now()) and year(date_import) = year(now())") or die("timecheck error");
								$lodirow = mysqli_fetch_assoc($timecheck);
								$lodi = $lodirow['lodi'];
								
								$addinfocheck = mysqli_query($mysqli,"select count(prs_add_info.info_id) as infocheck  from pims_personnel, prs_add_info where pims_personnel.emp_No=prs_add_info.emp_No");
								$addinforow = mysqli_fetch_assoc($addinfocheck);
								$addinfonum = $addinforow['infocheck'];
								
	if($lodi > 0)
	{		
	
	if ($ploc == $num  && $addinfonum == $num  )
	{
		
		$qry9= mysqli_query($mysqli,"SELECT * FROM pims_personnel, prs_report 
										Where month(prs_report.date_issued) = month(now()) AND
										year(prs_report.date_issued) = year(now()) AND
										pims_personnel.emp_No=prs_report.emp_No	");
				
			//CHECK THE PRS_REPORT IF THIS MONTH REPORT IS GENERATED OR NOT
					
					$num = mysqli_num_rows($qry9);
		
		if(empty($num))
		{
		
		$emp=mysqli_query($mysqli,"SELECT emp_no FROM pims_personnel");
	  
		while($emprow=mysqli_fetch_assoc($emp)){
		    //getting each personnel info: salary+allowance
			$qry=mysqli_query($mysqli,"SELECT * FROM pims_personnel, prs_salary_record, prs_allowance, prs_grade, prs_salary
			WHERE pims_personnel.emp_No=prs_salary_record.emp_No 
            AND  prs_salary.salary_id=prs_salary_record.salary_id
            AND  prs_grade.grade_id=prs_salary_record.grade_id
            AND  pims_personnel.emp_No=".$emprow['emp_no']." ");
			$emp_No="";
			while($row=mysqli_fetch_array($qry)){
				$emp_No 	= $emprow['emp_no'];
				$allowance	= $row['allowance'];
				$salary		= $row['amount'];
				
			//calculation of gross pay
				$gross_pay= $salary + $allowance;
			
			{	
			//getting the bracket contribution of philhealth	
				$qry1= mysqli_query($mysqli,"SELECT philhealth_id, ph_employee_share FROM prs_philhealth WHERE (ph_range_fr<=$gross_pay && ph_range_to>=$gross_pay)");
				$ph_share="";	
				while($row1=mysqli_fetch_assoc($qry1) ){
					$row1['philhealth_id'];
					$ph_share=$row1['ph_employee_share'];
				}
			}	
			
			//calculating the GSIS	
			{
				$qry2= mysqli_query($mysqli,"SELECT gsis_percentage/100 as percent FROM prs_gsis");
				$gsis_percentage=mysqli_fetch_assoc($qry2);
				$percent = $gsis_percentage['percent'];
				
				$total_gsis = $gross_pay * $percent;
			 	
			}
			//getting the PAGIBIG		
			{
				$qry3= mysqli_query($mysqli,"SELECT pi_amount FROM prs_pagibig ");
				$pi_amount=mysqli_fetch_assoc($qry3);
				$pi_total=$pi_amount['pi_amount'];
			}	
			
			//Calculating the  LOAN ::
			//
			
							$qry6=mysqli_query($mysqli,"SELECT SUM(prs_loan.loan_amount) as total_amortization, loan_name,  date_start, date_end FROM pims_personnel, prs_loan
											WHERE pims_personnel.emp_No=prs_loan.emp_No AND
											prs_loan.loan_status= 'ONGOING' AND
											pims_personnel.emp_No=".$emprow['emp_no']."
											
										");
										$total_loan=mysqli_fetch_assoc($qry6);
										$loan_name = $total_loan['loan_name'];
										$date_start = $total_loan['date_start'];
										$date_end = $total_loan['date_end'];
										$loan = $total_loan['total_amortization'];
				
			// INSERT ABSENT COST					
					$absent = mysqli_query($mysqli,"SELECT prs_dtr_rec.late_min as late FROM prs_dtr_rec where prs_dtr_rec.personnel_id=".$emprow['emp_no']."
					AND month(prs_dtr_rec.date_import) = month(now())
					AND year(prs_dtr_rec.date_import) = year(now())
					") or die("absent have an error!");
					$absentrow = mysqli_fetch_assoc($absent);
			     	$late = $absentrow['late'];
					$cal = ($gross_pay / 8 / 60) * $late;
					$absent_cost = $cal;
					
					$initial_total= $gross_pay - ($pi_total + $ph_share + $total_gsis +$loan); //calculating the ALL deduction share 
					
				
				//Calculating the Tax : percentage * (net_pay-tax_base) + exemption
		$taxstatus = mysqli_query($mysqli,"SELECT * FROM prs_add_info, pims_personnel, prs_civil_status where pims_personnel.emp_No=prs_add_info.emp_No and prs_civil_status.civil_id=prs_add_info.civil_id and pims_personnel.emp_No= '$emp_No'");
			
			
					$taxamount = "";
					$taxpercentage = "";
					$taxexemption = "";
			
			while($taxstatusrow = mysqli_fetch_assoc($taxstatus))
				{
					$spouse = $taxstatusrow['spouse_name'];
					$civil_status = $taxstatusrow['status'];
					$career_status = $taxstatusrow['career_status'];
					$no_of_dependents = $taxstatusrow['no_of_dependents'];
					$q1 = $taxstatusrow['Q1'];
					$q2 = $taxstatusrow['Q2'];
			    	$register = $taxstatusrow['register'];
				
				
				if( ($civil_status == 'Single' && $register == 'Registered'  ) || ($civil_status == 'Married' && $career_status == 'Unemployed' && $register == 'Registered') || 
					($civil_status == 'Married' && $q1 == 'Yes' && $q2 == 'Yes' && $no_of_dependents == '0') || ($civil_status == 'Married' && $q1 == 'Yes' && $no_of_dependents == '0') || ($civil_status == 'Married' && $q2 == 'Yes' && $no_of_dependents == '0') || ($civil_status == 'Widowed' && $register=='Not Registered' ) )
					{
					$SME = mysqli_query($mysqli," SELECT prs_tax_amount.amount_fr as amount , prs_stat_ex.percentage as percentage, prs_stat_ex.exemption as exemption from prs_stat_ex, prs_tax_amount, prs_withholding_tax
										where prs_stat_ex.stat_id=prs_tax_amount.stat_id and prs_withholding_tax.tax_id=prs_tax_amount.tax_id
										and prs_withholding_tax.tax_name = 'S/ME' and (prs_tax_amount.amount_fr <= $gross_pay ) group by prs_tax_amount.amount_fr desc limit 1 ");
					
					$taxrow = mysqli_fetch_assoc($SME);
					$taxamount = $taxrow['amount'];
					$taxpercentage = $taxrow['percentage'];
					$taxexemption = $taxrow['exemption'];
				
					}
				elseif(($civil_status == 'Single' && $register == 'Not Registered') || ($civil_status== 'Married' && $register == 'Not Registered') )
					{
					$Z = mysqli_query(" SELECT prs_tax_amount.amount_fr as amount , prs_stat_ex.percentage as percentage, prs_stat_ex.exemption as exemption from prs_stat_ex, prs_tax_amount, prs_withholding_tax
										where prs_stat_ex.stat_id=prs_tax_amount.stat_id and prs_withholding_tax.tax_id=prs_tax_amount.tax_id
										and prs_withholding_tax.tax_name = 'Z' and (prs_tax_amount.amount_fr <= $gross_pay ) group by prs_tax_amount.amount_fr desc limit 1 ");
					
					$taxrow = mysqli_fetch_assoc($Z);
					$taxamount = $taxrow['amount'];
					$taxpercentage = $taxrow['percentage'];
					$taxexemption = $taxrow['exemption'];
				
					}
				elseif( ($civil_status == 'Married' && $no_of_dependents == '1' && $register == 'Registered' ) || ($civil_status == 'Single' && $no_of_dependents == '1' && $register == 'Registered') || ($civil_status == 'Widowed' && $no_of_dependents == '1' && $register == 'Registered') )
					{
						$MES1 = mysqli_query($mysqli," SELECT prs_tax_amount.amount_fr as amount , prs_stat_ex.percentage as percentage, prs_stat_ex.exemption as exemption from prs_stat_ex, prs_tax_amount, prs_withholding_tax
										where prs_stat_ex.stat_id=prs_tax_amount.stat_id and prs_withholding_tax.tax_id=prs_tax_amount.tax_id
										and prs_withholding_tax.tax_name = 'ME/S1' and (prs_tax_amount.amount_fr <= $gross_pay ) group by prs_tax_amount.amount_fr desc limit 1 ");
					
					$taxrow = mysqli_fetch_assoc($MES1);
					$taxamount = $taxrow['amount'];
					$taxpercentage = $taxrow['percentage'];
					$taxexemption = $taxrow['exemption'];
				
						
					}
				elseif( ($civil_status == 'Married' && $no_of_dependents == '2' && $register == 'Registered') || ($civil_status == 'Single' && $no_of_dependents == '2' && $register == 'Registered')  || ($civil_status == 'Widowed' && $no_of_dependents == '2' && $register == 'Registered') )
					{
						$MES2 = mysqli_query($mysqli," SELECT prs_tax_amount.amount_fr as amount , prs_stat_ex.percentage as percentage, prs_stat_ex.exemption as exemption from prs_stat_ex, prs_tax_amount, prs_withholding_tax
										where prs_stat_ex.stat_id=prs_tax_amount.stat_id and prs_withholding_tax.tax_id=prs_tax_amount.tax_id
										and prs_withholding_tax.tax_name = 'ME/S2' and (prs_tax_amount.amount_fr <= $gross_pay ) group by prs_tax_amount.amount_fr desc limit 1 ");
					
					$taxrow = mysqli_fetch_assoc($MES2);
					$taxamount = $taxrow['amount'];
					$taxpercentage = $taxrow['percentage'];
					$tax_perc 		= $taxpercentage / 100;
					$taxexemption = $taxrow['exemption'];
						
					}
				elseif( ($civil_status == 'Married' && $no_of_dependents == '3' && $register == 'Registered') || ($civil_status == 'Single' && $no_of_dependents == '3' && $register == 'Registered')  || ($civil_status == 'Widowed' && $no_of_dependents == '3' && $register == 'Registered') )
					{
						$MES3 = mysqli_query($mysqli," SELECT prs_tax_amount.amount_fr as amount , prs_stat_ex.percentage as percentage, prs_stat_ex.exemption as exemption from prs_stat_ex, prs_tax_amount, prs_withholding_tax
										where prs_stat_ex.stat_id=prs_tax_amount.stat_id and prs_withholding_tax.tax_id=prs_tax_amount.tax_id
										and prs_withholding_tax.tax_name = 'ME/S3' and (prs_tax_amount.amount_fr <= $gross_pay ) group by prs_tax_amount.amount_fr desc limit 1 ");
					
					$taxrow = mysqli_fetch_assoc($MES3);
					$taxamount = $taxrow['amount'];
					$taxpercentage = $taxrow['percentage'];
					$tax_perc 		= $taxpercentage / 100;
					$taxexemption = $taxrow['exemption'];
					
					}	
				elseif( ($civil_status == 'Married' && $no_of_dependents == '4' && $register == 'Registered') || ($civil_status == 'Single' && $no_of_dependents == '4' && $register == 'Registered') || ($civil_status == 'Widowed' && $no_of_dependents == '4' && $register == 'Registered') )
					{
						$MES4 = mysqli_query($mysqli," SELECT prs_tax_amount.amount_fr as amount , prs_stat_ex.percentage as percentage, prs_stat_ex.exemption as exemption from prs_stat_ex, prs_tax_amount, prs_withholding_tax
										where prs_stat_ex.stat_id=prs_tax_amount.stat_id and prs_withholding_tax.tax_id=prs_tax_amount.tax_id
										and prs_withholding_tax.tax_name = 'ME/S4' and (prs_tax_amount.amount_fr <= $gross_pay ) group by prs_tax_amount.amount_fr desc limit 1 ");
					
					$taxrow = mysqli_fetch_assoc($MES4);
					$taxamount = $taxrow['amount'];
					$taxpercentage = $taxrow['percentage'];
					$taxexemption = $taxrow['exemption'];
					
					}
				
				}							
				
					$tax_perc = $taxpercentage / 100;
					
				//Tax Calculation	
					$cal1 = $initial_total - $taxamount ;
				 	$cal2 = $taxexemption + $cal1;
					$tax_total = $cal2 * $tax_perc;
														 
					$deduc  = $pi_total + $ph_share + $total_gsis + $loan + $absent_cost + $tax_total;									 
						
				    $net_pay = $initial_total - $tax_total; 

		//DETERMINING IF LOAN IS PAID OR NOT || UPDATE LOAN	 
				
				$qry4=mysqli_query($mysqli," SELECT * FROM pims_personnel, prs_loan
									WHERE pims_personnel.emp_No=prs_loan.emp_No AND
									pims_personnel.emp_No=".$emprow['emp_no']."
								");
				
				
				//change date_end in M Y 
				
				while($row4=mysqli_fetch_array($qry4))
				{
					$loan_id   = $row4['loan_id'];
					$status = $row4['loan_status'];
					$date_start = $row4['date_start'];
					$date_end = date("m-Y", strtotime($row4['date_end']));
					$amortization = $row4['loan_amount'];
					$stat = 'ONGOING';
					$stat1 = 'PAID';
					$date = date("m-Y");	
					if($status == $stat)
					{
						
						if($date == $date_end)
						{
										$ongoingloan=mysqli_query($mysqli,"SELECT loan_status, loan_amount, loan_name,  date_start, date_end  FROM pims_personnel, prs_loan
											WHERE pims_personnel.emp_No=prs_loan.emp_No AND
											prs_loan.loan_status= 'ONGOING' AND
											pims_personnel.emp_No=".$emprow['emp_no']." AND
											prs_loan.loan_id = '$loan_id'
										");
											
												while(	$ongoingrow=mysqli_fetch_assoc($ongoingloan)){
											$loan_name1 = $ongoingrow['loan_name'];
											$date_start1 = $ongoingrow['date_start'];
											$date_end1 = $ongoingrow['date_end'];
											$loan_status1 = $ongoingrow['loan_status'];
											$loan_amount1 = $ongoingrow['loan_amount'];
											
											$prevmonthpayloan = date('Y-m-d');
										
										//Insert data in prs_loan_pay
							$insertpayloan = mysqli_query($mysqli,"INSERT INTO prs_loan_pay (pay_loan_name, pay_loan_amount, date_start, date_end, loan_status, pay_date, emp_No) VALUES ('$loan_name1', '$loan_amount1', '$date_start1', '$date_end1', '$loan_status1', '$prevmonthpayloan', '$emp_No')")or die("Failed  Query insertpayloan");
										
									
								//Update Loan if Payed or Not
							$qry5 =mysqli_query($mysqli," UPDATE pims_personnel, prs_loan
												  SET prs_loan.loan_status='$stat1'
												  WHERE pims_personnel.emp_No=prs_loan.emp_No AND
												pims_personnel.emp_No=".$emprow['emp_no']."  AND
												prs_loan.loan_id = '$loan_id'
												")or die("Failed Sql QRY5");			        	}
												
						} else
								{

										$ongoingloan=mysqli_query($mysqli,"SELECT loan_status, loan_amount, loan_name,  date_start, date_end  FROM pims_personnel, prs_loan
											WHERE pims_personnel.emp_No=prs_loan.emp_No AND
											prs_loan.loan_status= 'ONGOING' AND
											pims_personnel.emp_No=".$emprow['emp_no']." AND
											prs_loan.loan_id = '$loan_id'
										");
											
										while(	$ongoingrow=mysqli_fetch_assoc($ongoingloan)){
											$loan_name1 = $ongoingrow['loan_name'];
											$date_start1 = $ongoingrow['date_start'];
											$date_end1 = $ongoingrow['date_end'];
											$loan_status1 = $ongoingrow['loan_status'];
											$loan_amount1 = $ongoingrow['loan_amount'];
									
											$prevmonthpayloan = date('Y-m-d');
										
							$insertpayloan = mysqli_query($mysqli,"INSERT INTO prs_loan_pay (pay_loan_name, pay_loan_amount, date_start, date_end, loan_status, pay_date, emp_No) VALUES ('$loan_name1', '$loan_amount1', '$date_start1', '$date_end1', '$loan_status1', '$prevmonthpayloan', '$emp_No')") or die("Failed  Query insertpayloan");
									
																							}
							}
					
					}
					
					
				}
						$date = date_default_timezone_set('Asia/Manila');
						$previousmonth = date('Y-m-d');
						
				
					$qry8 = mysqli_query($mysqli," INSERT INTO prs_report (rep_basic_pay, rep_allowance, rep_gross_pay, rep_net_pay, date_issued, total_ph, rep_pi_total, total_gsis, absent_cost, total_tax, total_deduction, emp_No) VALUES ('$salary', '$allowance', '$gross_pay', '$net_pay', '$previousmonth' ,'$ph_share', '$pi_total', '$total_gsis','$absent_cost' ,'$tax_total', '$deduc',  '$emp_No')
										") or die("Failed  Query insertreportlastmonth");
		
			echo "<script>  window.open('paytable.php','_newtab')</script>";
			echo "<script> window.location='payrollrep.php' </script>";
			
		
		
		
					
//end end
		
//1st emp_no end				
			}
		
		
	//2	
		}
	//check end 2
		
// 1 
		}
//last if 1	  
	  
	  else 
	  {
		
		 echo "<script>alert('Already Generated!'); </script>";
		 echo "<script> window.location='payrollrep.php' </script>";	
	  }
	  
									}
									else
									{
										 echo "<script>alert('There are Personnels that are not Setup(Grade/Step) & Fill Up Tax Form'); </script>";
								  		 echo "<script> window.location='employee.php' </script>";	
									}
									
//isset end				
						}
						
						else		{
										 echo "<script>alert('Late Deduction For This Month Is Not Yet Submitted'); </script>";
										 echo "<script> window.location='employee.php' </script>";	

									}
						}
						

?>