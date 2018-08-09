<?php
	error_reporting(0);
	$q = $_GET['q'];
	
	if ( $q == "getemploymentrecords" ){
		getemploymentrecords();
	}
	
	function getemploymentrecords(){
		// For: profile.php
		// Purpose: To load personnel employment record data on emp_rec.php page
		
		include("db_connect.php");
		
		$echo = "";
		$echotemp = "";
		
		$query = "select * from pims_employment_records where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		
		if ( mysqli_num_rows($result) != 0 ){
			$row = mysqli_fetch_array($result);
			
			if ( !empty($row['complete_item_no']) ){
				$echo = $echo . " $('#for1').text('".$row['complete_item_no']."'); ";
			}
			else{
				$echo = $echo . " $('#for1').text('No information available'); ";
			}
			
			if ( !empty($row['emp_No']) ){
				$echo = $echo . " $('#for2').text('".$row['emp_No']."'); ";
			}
			else{
				$echo = $echo . " $('#for2').text('No information available'); ";
			}
			
			$query2 = "select * from pims_personnel where emp_No = ".$row['emp_No']."; ";
			$result2 = mysqli_query( $_SESSION['pims_data']['connection'] , $query2 );
			$row2 = mysqli_fetch_array($result2);
			
			$query3 = "select * from pims_department where dept_ID = ".$row['dept_ID']."; ";
			$result3 = mysqli_query( $_SESSION['pims_data']['connection'] , $query3 );
			$row3 = mysqli_fetch_array($result3);
			
			$query4 = "select * from pims_job_title where job_title_code = '".$row['job_title_code']."'; ";
			$result4 = mysqli_query( $_SESSION['pims_data']['connection'] , $query4 );
			$row4 = mysqli_fetch_array($result4);
			
			if ( !empty($row2['P_lname']) ){
				$nameStr = $row2['P_lname'] . ", " . $row2['P_fname'];
				if ( !empty($row2['P_mname']) ) $nameStr = $nameStr . " " . $row2['P_mname'];
				if ( !empty($row2['P_extension_name']) ) $nameStr = $nameStr . " " . $row2['P_extension_name'];
				
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Name</label>:</div><div class=col-md-7>".$nameStr."</div> </div>'); ";
			}
			else{
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Name</label>:</div><div class=col-md-7>Not available</div> </div>'); ";
			}
			
			if ( !empty($row['role_type']) ){
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Role Type</label>:</div><div class=col-md-7>".$row['role_type']."</div> </div>'); ";
			}
			else{
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Role Type</label>:</div><div class=col-md-7>Not available</div> </div>'); ";
			}
			
			if ( !empty($row['div_code']) ){
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Division Code</label>:</div><div class=col-md-7>".$row['div_code']."</div> </div>'); ";
			}
			else{
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Division Code</label>:</div><div class=col-md-7>Not available</div> </div>'); ";
			}
			
			if ( !empty($row['biometric_ID']) ){
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Biometric ID</label>:</div><div class=col-md-7>".$row['biometric_ID']."</div> </div>'); ";
			}
			else{
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Biometric ID</label>:</div><div class=col-md-7>Not available</div> </div>'); ";
			}
			
			if ( !empty($row['school_ID']) ){
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>School ID</label>:</div><div class=col-md-7>".$row['school_ID']."</div> </div>'); ";
			}
			else{
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>School ID</label>:</div><div class=col-md-7>Not available</div> </div>'); ";
			}
			
			if ( !empty($row3['office_org_code']) ){
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Region Org. Code</label>:</div><div class=col-md-7>".$row['office_org_code']."</div> </div>'); ";
			}
			else{
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Region Org. Code</label>:</div><div class=col-md-7>Not available</div> </div>'); ";
			}
			
			if ( !empty($row['emp_status']) ){
				$echotemp = strtolower($row['emp_status']);
				$echotemp = ucwords($echotemp);
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-4><label>Employment Status</label>:</div><div class=col-md-6>".$echotemp."</div> </div>'); ";
			}
			else{
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-4><label>Employment Status</label>:</div><div class=col-md-6>Not available</div> </div>'); ";
			}
			
			if ( !empty($row['date_joined']) ){
				$timestamp = strtotime($row['date_joined']);
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Date Joined</label>:</div><div class=col-md-7>".date("M d,Y" , $timestamp )."</div> </div>'); ";
			}
			else{
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Date Joined</label>:</div><div class=col-md-7>Not available</div> </div>'); ";
			}
			
			if ( !empty($row['appointment_date']) ){
				$timestamp = strtotime($row['appointment_date']);
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-4><label>Date of Original Appointment</label>:</div><div class=col-md-6>".date("M d,Y" , $timestamp )."</div> </div>'); ";
			}
			else{
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-4><label>Date of Original Appointment</label>:</div><div class=col-md-6>Not available</div> </div>'); ";
			}
			
			if ( !empty($row['job_title_code']) ){
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Job Title Code</label>:</div><div class=col-md-7>".$row['job_title_code']."</div> </div>'); ";
			}
			else{
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Job Title Code</label>:</div><div class=col-md-7>Not available</div> </div>'); ";
			}
			
			if ( !empty($row4['job_title_name']) ){
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Job Title Name</label>:</div><div class=col-md-7>".$row4['job_title_name']."</div> </div>'); ";
			}
			else{
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Job Title Name</label>:</div><div class=col-md-7>Not available</div> </div>'); ";
			}
			
			if ( !empty($row3['dept_name']) ){
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Department</label>:</div><div class=col-md-7>".$row3['dept_name']."</div> </div>'); ";
			}
			else{
				$echo = $echo . " $('#emp_rec_div').append('<div class=col-lg-10> <div class=col-md-3><label>Department</label>:</div><div class=col-md-7>Not available</div> </div>'); ";
			}
			
		}
		else{
			$echo = $echo . " $('#for1').text('No information available'); ";
			$echo = $echo . " $('#for2').text('No information available'); ";
			$echo = $echo . " $('#emp_rec_div').html('<div class=col-lg-10>No information available</div>'); ";
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] );
		
		echo "<script> " . $echo . "</script>";
	}
?>