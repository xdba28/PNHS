<?php
	include("db_connect.php");
	
	$echo = "";
	
	$query = "select * from pims_leave , pims_leave_balance , pims_personnel where leave_application_status = 'Disapproved' and pims_leave.leave_bal_id = pims_leave_balance.leave_bal_ID and pims_leave_balance.emp_No = pims_personnel.emp_No; ";
	$result = mysqli_query($_SESSION['pims_data']['connection'] , $query);
	
	$count = 1;
	
	while( $row = mysqli_fetch_array($result) ){
		$echo = $echo . " $('#tbody1').append($('<tr></tr>').attr({ 'class' : 'danger' , 'id' : 'tr".$count."' })); ";
		$echo = $echo . " $('#tr".$count."').append($('<td>".$count."</td>')); ";
		$nameStr = $row['P_lname'] . ", " . $row['P_fname'];
		if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
		if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
		$echo = $echo . " $('#tr".$count."').append($('<td>".$nameStr."</td>')); ";
		$echo = $echo . " $('#tr".$count."').append($('<td>".$row['type']."</td>')); ";
		$year = substr( $row['date_submitted'] , 0 , 4 );
		$month = substr ( $row['date_submitted'] , 5 , 2 );
		$date = substr ( $row['date_submitted'] , 8 , 2 );
		switch($month){
				case "01": $date1 = "January"; break;
				case "02": $date1 = "February"; break;
				case "03": $date1 = "March"; break;
				case "04": $date1 = "April"; break;
				case "05": $date1 = "May"; break;
				case "06": $date1 = "June"; break;
				case "07": $date1 = "July"; break;
				case "08": $date1 = "August"; break;
				case "09": $date1 = "September"; break;
				case "10": $date1 = "October"; break;
				case "11": $date1 = "November"; break;
				case "12": $date1 = "December"; break;
		}
		$date1 = $date1 . " " . $date . ", " . $year;
		$echo = $echo . " $('#tr".$count."').append($('<td>".$date1."</td>')); ";
		$year = substr( $row['date_responded'] , 0 , 4 );
		$month = substr ( $row['date_responded'] , 5 , 2 );
		$date = substr ( $row['date_responded'] , 8 , 2 );
		switch($month){
				case "01": $date1 = "January"; break;
				case "02": $date1 = "February"; break;
				case "03": $date1 = "March"; break;
				case "04": $date1 = "April"; break;
				case "05": $date1 = "May"; break;
				case "06": $date1 = "June"; break;
				case "07": $date1 = "July"; break;
				case "08": $date1 = "August"; break;
				case "09": $date1 = "September"; break;
				case "10": $date1 = "October"; break;
				case "11": $date1 = "November"; break;
				case "12": $date1 = "December"; break;
		}
		$date1 = $date1 . " " . $date . ", " . $year;
		$echo = $echo . " $('#tr".$count."').append($('<td>".$date1."</td>')); ";
		$echo = $echo . " $('#tr".$count."').append($('<td></td>').attr({ 'id' : 'tdend".$count."' })); ";
		$echo = $echo . " $('#tdend".$count."').append($('<a></a>').attr({ 'type':'button' , 'data-toggle':'tooltip' , 'data-placement':'left' , 'title':'View' , 'class':'fa fa-eye fa-fw-o btn btn-primary btn-sm' , 'href':'view_application.php?id=".$row['leave_ID']."' })); ";
		$count++;
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo "<script>" . $echo . "</script>";
?>