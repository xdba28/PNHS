<?php
	include("db_connect.php");
	
	$echo = "";
	
	$query = "select * from pims_service_records , pims_employment_records , pims_personnel where pims_personnel.emp_No = ".$_SESSION['pims_data']['emp_id']." and pims_personnel.emp_No = pims_employment_records.emp_No and pims_employment_records.emp_rec_ID = pims_service_records.emp_rec_ID; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	
	$count = 0;
	while( $row = mysqli_fetch_array($result) ){
		if ( $count == 0 ){
			$echo = $echo . " $('#span1').text('".$row['emp_No']."'); ";
			$echo = $echo . " $('#span2').text('".$row['GSIS_No']."'); ";
			$nameStr = $row['P_lname'] . ", " . $row['P_fname'];
			if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
			if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
			$echo = $echo . " $('#span3').text('".$nameStr."'); ";
			$year = substr( $row['pims_birthdate'] , 0 , 4 );
			$month = substr ( $row['pims_birthdate'] , 5 , 2 );
			$day = substr ( $row['pims_birthdate'] , 8 , 2 );
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
			$echo = $echo . " $('#span4').text('".$date."'); ";
		}
		
		$echo = $echo . " $('#tbody1').append($('<tr></tr>').attr({ 'id':'tr".$count."' })); ";
		
		$year = substr( $row['inclusive_date_start'] , 0 , 4 );
		$month = substr ( $row['inclusive_date_start'] , 5 , 2 );
		$day = substr ( $row['inclusive_date_start'] , 8 , 2 );
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
		$echo = $echo . " $('#tr".$count."').append($('<td>".$date."</td>')); ";
		$year = substr( $row['inclusive_date_end'] , 0 , 4 );
		$month = substr ( $row['inclusive_date_end'] , 5 , 2 );
		$day = substr ( $row['inclusive_date_end'] , 8 , 2 );
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
		$echo = $echo . " $('#tr".$count."').append($('<td>".$date."</td>')); ";
		$echo = $echo . " $('#tr".$count."').append($('<td>".$row['designation']."</td>')); ";
		$echo = $echo . " $('#tr".$count."').append($('<td>".$row['sr_status']."</td>')); ";
		$echo = $echo . " $('#tr".$count."').append($('<td>".$row['salary']."</td>')); ";
		$echo = $echo . " $('#tr".$count."').append($('<td>".$row['place_of_assignment']."</td>')); ";
		$echo = $echo . " $('#tr".$count."').append($('<td>".$row['srce_of_fund']."</td>')); ";
		$echo = $echo . " $('#tr".$count."').append($('<td>".$row['remarks']."</td>')); ";
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo "<script>" . $echo . "</script>";
?>