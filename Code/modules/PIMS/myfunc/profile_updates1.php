<?php
	include("db_connect.php");
	
	$echo = "";
	
	$query = "select * from pims_profile_updates where emp_No = ".$_SESSION['pims_data']['emp_id']." order by p_update_id desc; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$count = 1;
	while ( $row = mysqli_fetch_array($result) ){
		
		//$echo = $echo . " $('#tr".$row['p_update_id']."').append($('<td>".$count++."</td>')); ";
		$echo = $echo . "<td>".$count++."</td>";
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
		//$echo = $echo . " $('#tr".$row['p_update_id']."').append($('<td>".$date."</td>')); ";
		$echo = $echo . "<td>".$date."</td>";
		if ( $row['p_update_table'] == "1" ){
			//$echo = $echo . " $('#tr".$row['p_update_id']."').append($('<td>Personal Info Updates</td>')); ";
			$echo = $echo . "<td>Personal Info Updates</td>";
		}
		else if ( $row['p_update_table'] == "2" ){
			//$echo = $echo . " $('#tr".$row['p_update_id']."').append($('<td>Family Background Updates</td>')); ";
			$echo = $echo . "<td>Family Background Updates</td>";
		}
		else if ( $row['p_update_table'] == "3" ){
			//$echo = $echo . " $('#tr".$row['p_update_id']."').append($('<td>Educational Background Updates</td>')); ";
			$echo = $echo . "<td>Educational Background Updates</td>";
		}
		//$echo = $echo . " $('#tr".$row['p_update_id']."').append($('<td>".$row['p_update_status']."</td>')); ";
		$echo = $echo . "<td>".$row['p_update_status']."</td>";
		
		if ( $row['p_update_status'] == "Pending" ) $echo = " $('#tbody1').append($('<tr> ".$echo." </tr>').attr({ 'class': 'info' , 'id':'tr".$row['p_update_id']."' , 'onclick':'viewDetails(".$row['p_update_id'].")' })); ";
		else if ( $row['p_update_status'] == "Approved" ) $echo = " $('#tbody1').append($('<tr> ".$echo." </tr>').attr({  'id':'tr".$row['p_update_id']."' , 'onclick':'viewDetails(".$row['p_update_id'].")' })); ";
		else if ( $row['p_update_status'] == "Disapproved" ) $echo = " $('#tbody1').append($('<tr> ".$echo." </tr>').attr({ 'class': 'danger' , 'id':'tr".$row['p_update_id']."' , 'onclick':'viewDetails(".$row['p_update_id'].")' })); ";
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo "<script>" . $echo . "</script>";
?>