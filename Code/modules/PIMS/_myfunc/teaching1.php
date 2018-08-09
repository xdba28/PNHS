<?php
	include("db_connect.php");
	
	$echo = "";
	$data = "";
	$count = 1;
	
	$query = "select * from pims_personnel , pims_employment_records where faculty_type = 'Teaching' and pims_personnel.emp_No = pims_employment_records.emp_No order by P_lname , P_fname , P_mname , P_extension_name asc ; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	
	if ( mysqli_num_rows($result) > 0 ){
		while( $row = mysqli_fetch_array($result) ){
			
			$data = "<td>".$count++."</td><td>".$row['P_lname']."</td><td>".$row['P_fname']."</td><td>".$row['P_mname']."</td><td>".$row['pims_gender']."</td><td>".$row['pims_age']."</td><td>".$row['emp_status']."</td>";
			$echo = $echo . " $('#tbody1').append($('<tr> " . $data . " </tr>').attr({ onclick : 'userInfo(".$row['emp_No'].");' })); ";
			
		}
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo "<script>" . $echo . "</script>";
?>