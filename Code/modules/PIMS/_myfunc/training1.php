<?php
	// Name: training.php
	//
	// Purpose: To load information on the training table
	// 
	// Note: Please don't modify the code below
	include("db_connect.php");
	
	$query = "select * from pims_training_programs where emp_No = ".$_SESSION['pims_data']['emp_id']." order by training_ID desc ; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	
	$echo = "";
	$counter = 1;
	
	while( $row = mysqli_fetch_array($result) ){
		$Data = "<td>".$counter++."</td>";
		$Data = $Data . "<td>".$row['training_title']."</td>";
		$Data = $Data . "<td>".$row['location']."</td>";
		
		$Date1 = "";
	
		$year1 = substr( $row['date_start'] , 0 , 4 );
		$month1 = substr ( $row['date_start'] , 5 , 2 );
		$day1 = substr ( $row['date_start'] , 8 , 2 );
			
		switch($month1){
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
		$Date1 = $Date1 . " " . $day1 . ", " . $year1;
		$Data = $Data . "<td>".$Date1."</td>";
		
		$Date2 = "";
	
		$year2 = substr( $row['date_finish'] , 0 , 4 );
		$month2 = substr ( $row['date_finish'] , 5 , 2 );
		$day2 = substr ( $row['date_finish'] , 8 , 2 );
			
		switch($month1){
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
		$Date2 = $Date2 . " " . $day2 . ", " . $year2;
		$Data = $Data . "<td>".$Date2."</td>";
		
		$Data = $Data . "<td>".$row['no_of_hours']."</td>";
		$Data = $Data . "<td>".$row['others']."</td>";
		
		$echo = $echo . " $('#t01').append($('<tr> " . $Data . " </tr>') ); ";
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	echo "<script> $('#empNo1').html('<u>".$_SESSION['pims_data']['emp_id']."</u>'); ". $echo ."</script>";

?>