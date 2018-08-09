<?php
	include("db_connect.php");
	
	$echo = "";
	
	$query = "select * from pims_profile_updates , pims_personnel where pims_personnel.emp_No = pims_profile_updates.emp_No and p_update_status = 'Disapproved' order by p_update_id desc; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$count = 1;
	while ( $row = mysqli_fetch_array($result) ){
		$echo = $echo . " $('#tbody1').append($('<tr></tr>').attr({ 'id':'tr".$row['p_update_id']."' , 'class':'danger' , 'onclick':'loadSideMenu(".$row['emp_No'].",".$row['p_update_id'].")' })); ";
		$echo = $echo . " $('#tr".$row['p_update_id']."').append($('<td>".$count++."</td>')); ";
		$nameStr = $row['P_lname'] . ", " . $row['P_fname'];
		if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
		if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
		$echo = $echo . " $('#tr".$row['p_update_id']."').append($('<td>".$nameStr."</td>')); ";
		$year = substr( $row['p_update_date'] , 0 , 4 );
		$month = substr ( $row['p_update_date'] , 5 , 2 );
		$day = substr ( $row['p_update_date'] , 8 , 2 );
		
		switch($month){
				case "01": $date = "January"; break;
				case "02": $date = "February"; break;
				case "03": $date = "March"; break;
				case "04": $date = "April"; break;
				case "05": $date = "May"; break;
				case "06": $date = "June"; break;
				case "07": $date = "July"; break;
				case "08": $date = "August"; break;
				case "09": $date = "September"; break;
				case "10": $date = "October"; break;
				case "11": $date = "November"; break;
				case "12": $date = "December"; break;
		}
		
		$date = $date . " " . $day . ", " . $year;
		$echo = $echo . " $('#tr".$row['p_update_id']."').append($('<td>".$date."</td>')); ";
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo "<script>" . $echo . "</script>";
?>