<?php
	include("db_connect.php");
	
	$echo = "";
	$data = "";
	$count = 1;
	
	$query = "select * from pims_personnel , pims_leave_balance , pims_leave where pims_leave.leave_bal_id = pims_leave_balance.leave_bal_id and pims_personnel.emp_No = pims_leave_balance.emp_No and pims_leave_balance.leave_status = 'On-Leave' and pims_leave.leave_application_status = 'Approved' order by leave_start asc ; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	
	while ( $row = mysqli_fetch_array($result) ){
		
		$nameStr = $row['P_lname'] . ", " . $row['P_fname'];
		if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
		if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
		
		$year = substr( $row['leave_start'] , 0 , 4 );
		$month = substr ( $row['leave_start'] , 5 , 2 );
		$date = substr ( $row['leave_start'] , 8 , 2 );
		
		switch($month){
				case "01": $Date1 = "January"; break;
				case "02": $Date1 = "February"; break;
				case "03": $Date1 = "March"; break;
				case "04": $Date1 = "April"; break;
				case "05": $Date1 = "May"; break;
				case "06": $Date1 = "June"; break;
				case "07": $Date1 = "July"; break;
				case "08": $Date1 = "August"; break;
				case "09": $Date1 = "September"; break;
				case "10": $Date1 = "October"; break;
				case "11": $Date1 = "November"; break;
				case "12": $Date1 = "December"; break;
		}
		$Date1 = $Date1 . " " . $date . ", " . $year;
		
		$year = substr( $row['leave_end'] , 0 , 4 );
		$month = substr ( $row['leave_end'] , 5 , 2 );
		$date = substr ( $row['leave_end'] , 8 , 2 );
		
		switch($month){
				case "01": $Date2 = "January"; break;
				case "02": $Date2 = "February"; break;
				case "03": $Date2 = "March"; break;
				case "04": $Date2 = "April"; break;
				case "05": $Date2 = "May"; break;
				case "06": $Date2 = "June"; break;
				case "07": $Date2 = "July"; break;
				case "08": $Date2 = "August"; break;
				case "09": $Date2 = "September"; break;
				case "10": $Date2 = "October"; break;
				case "11": $Date2 = "November"; break;
				case "12": $Date2 = "December"; break;
		}
		$Date2 = $Date2 . " " . $date . ", " . $year;
		
		$now = strtotime($row['leave_end']); // or your date as well
		$your_date = strtotime($row['leave_start']);
		$datediff = $now - $your_date;
		$datediff = floor($datediff / (60 * 60 * 24));
		if ( $datediff > 1 ){
			$datediffStr = $datediff . " days";
		}
		else if ( $datediff == 1 ){
			$datediffStr = $datediff . " day";
		}
		
		$data = "<td>".$count++."</td><td>".$nameStr."</td><td>".$row['place_to_be_visited']."</td><td>".$row['purpose']."</td><td>".$Date1."</td><td>".$Date2."</td><td>".$datediffStr."</td>";
		$echo = $echo . " $('#tbody1').append($('<tr> " . $data . " </tr>')); ";
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo "<script>" . $echo . "</script>";
?>