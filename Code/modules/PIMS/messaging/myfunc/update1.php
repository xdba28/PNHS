<?php
	include("../myfunc/db_connect.php");
	
	$echo = "";
	
	$query = "select * from pims_participant where p_part_id = ".$_GET['id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array($result);
	
	if ( $row['p_user_one'] == $_SESSION['pims_data']['cms_id'] ){
		$_SESSION['pims_data']['messenger'] = $row['p_user_two'];
	}
	else if ( $row['p_user_two'] == $_SESSION['pims_data']['cms_id'] ){
		$_SESSION['pims_data']['messenger'] = $row['p_user_one'];
	}
	
	$query = "select * from pims_personnel , cms_account where pims_personnel.emp_No = cms_account.emp_no and cms_account.cms_account_ID  = ".$_SESSION['pims_data']['messenger']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array($result);
	$nameStr = $row['P_lname'] . ", " . $row['P_fname'];
	if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
	if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
	$echo = $echo . " initialUpdate(".$_SESSION['pims_data']['messenger'].",'".$nameStr."'); ";
	
	$query = "select * from pims_messages where p_part_id = ".$_GET['id']." order by p_time asc; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$latestMessage = 0;
	
	if ( mysqli_num_rows($result) > 0 ){
		while($row = mysqli_fetch_array($result)){
			$latestMessage = $row['p_mes_id'];
			if ( $_SESSION['pims_data']['messenger'] == $row['cms_account_ID'] ){
				$year = substr( $row['p_time'] , 0 , 4 );
				$month = substr ( $row['p_time'] , 5 , 2 );
				$day = substr ( $row['p_time'] , 8 , 2 );
				$hr = substr ( $row['p_time'] , 11 , 2 );
				$min = substr ( $row['p_time'] , 14 , 2 );
				
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
				
				$date = $date . " " . $day . ", " . $year . " " . $hr . ":" . $min;
				$echo = $echo . " newMessageOther(".$row['p_mes_id'].",".$row['cms_account_ID'].",'".$row['p_message']."','".$date."'); ";
				$echo = $echo . " seenMessage(".$row['p_mes_id']."); ";
			}
			else{
				$year = substr( $row['p_time'] , 0 , 4 );
				$month = substr ( $row['p_time'] , 5 , 2 );
				$day = substr ( $row['p_time'] , 8 , 2 );
				$hr = substr ( $row['p_time'] , 11 , 2 );
				$min = substr ( $row['p_time'] , 14 , 2 );
				
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
				
				$date = $date . " " . $day . ", " . $year . " " . $hr . ":" . $min;
				$echo = $echo . " newMessageSelf(".$row['p_mes_id'].",".$row['cms_account_ID'].",'".$row['p_message']."','".$date."'); ";
			}
		}
	}
	else{
		$echo = $echo . " newDayDiv('Start CONVERSATION'); ";
	}
	
	$echo = $echo . " updatelastMessage(".$latestMessage."); ";
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo "<script>" . $echo . "</script>";
?>