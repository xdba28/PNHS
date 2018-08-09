<?php
	//if ( isset($_SESSION['pims_data']['pims_priv_admin']) && $_SESSION['pims_data']['pims_priv_admin'] == '1' ){
		include("session1.php");
		include("db_connect.php");
		
		$query = "select job_title_code from pims_employment_records where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		$row = mysqli_fetch_array($result);
		
	//}
	
?>