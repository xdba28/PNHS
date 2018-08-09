<?php
	session_start();
	include("../../myfunc/db_connect.php");
	
	$echo = "";
	
	$query = "select * from pims_messages where p_part_id = ".$_GET['f']." and p_mes_id > ".$_GET['lm']." order by p_time asc; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$latestMessage = 0;
	
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
	
	
	$echo = $echo . " updatelastMessage(".$latestMessage."); ";
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo $echo ;
?>