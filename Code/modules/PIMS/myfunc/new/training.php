<?php
	error_reporting(0);
	$q = $_GET['q'];
	
	if ( $q = "gettrainingprograms" ){
		gettrainingprograms();
	}
	
	function gettrainingprograms(){
		// For: training.php
		// Purpose: To load personnel Training Program Records data on profile.php page
		
		include("db_connect.php");
		
		$echo = "";
		$echotemp = "";
		
		$query = "select * from pims_training_programs where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		
		$count1 = 1;
		
		if ( mysqli_num_rows($result) > 0 ){
			while($row = mysqli_fetch_array( $result )){
				$echotemp = "";
				$echotemp = $echotemp . "<td>" . $count1 . "</td>";
				
				if ( !empty($row['training_title']) ){
					$echotemp = $echotemp . " <td>".$row['training_title']."</td> ";
				}
				else{
					$echotemp = $echotemp . " <td>Not Available</td> ";
				}
				
				if ( !empty($row['location']) ){
					$echotemp = $echotemp . " <td>".$row['location']."</td> ";
				}
				else{
					$echotemp = $echotemp . " <td>Not Available</td> ";
				}
				
				if ( !empty($row['date_start'])  ){
					if ( !empty($row['date_finish']) ){
						$timestamp1 = strtotime($row['date_start']);
						$timestamp2 = strtotime($row['date_finish']);
						$echotemp = $echotemp . " <td>".date("m d,Y" , $timestamp1 )." - ".date("m d,Y" , $timestamp2 )."</td> ";
					}
					else{
						$timestamp1 = strtotime($row['date_start']);
						$echotemp = $echotemp . " <td>".date("m d,Y" , $timestamp1 )." - now</td> ";
					}
				}
				else{
					$echotemp = $echotemp . " <td>Not Available</td> ";
				}
				
				if ( !empty($row['no_of_hours']) ){
					$echotemp = $echotemp . " <td>".$row['no_of_hours']."</td> ";
				}
				else{
					$echotemp = $echotemp . " <td>Not Available</td> ";
				}
				
				if ( !empty($row['others']) ){
					$echotemp = $echotemp . " <td>".$row['others']."</td> ";
				}
				else{
					$echotemp = $echotemp . " <td>Not Available</td> ";
				}
				
				$count1++;
				$echo = $echo . " $('#t01').append('<tr>".$echotemp."</tr>'); ";
				
			}
		}
		
		if ( $count1 == 1 ){
			$echo = $echo . " $('#t01').append('<tr><td colspan=6><center>No information to load.</center></td></tr>'); ";
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] );
		
		echo "<script> " . $echo . " $('#empNo1').html('<u>".$_SESSION['pims_data']['emp_id']."</u>'); </script>";
	}
?>