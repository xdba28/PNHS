<?php
	session_start();
	include("db_connect.php");
	include("databaseDictionary1.php");
	
	$echo = "";
	
	$query = "select * from pims_profile_update_list where p_update_id = ".$_GET['id']."; ";
	$result = mysqli_query($_SESSION['pims_data']['connection'] , $query);
	while( $row = mysqli_fetch_array($result) ){
		$echo = $echo . "<b>";
		$query1 = "select * from pims_profile_updates where p_update_id = ".$_GET['id']."; ";
		$result1 = mysqli_query($_SESSION['pims_data']['connection'] , $query1 );
		$row1 = mysqli_fetch_array($result1);
		
		if( $row1['p_update_table'] == '1' ){
			$query2 = "select ".$row['p_column_name']." from pims_personnel where emp_No = ".$row1['emp_No']."; ";
			$result2 = mysqli_query($_SESSION['pims_data']['connection'] , $query2 );
			$row2 = mysqli_fetch_array($result2);
			$echo = $echo . translate1("pims_personnel",$row['p_column_name']);
		}
		else if( $row1['p_update_table'] == '2' ){
			$query2 = "select ".$row['p_column_name']." from pims_family_background where emp_No = ".$row1['emp_No']."; ";
			$result2 = mysqli_query($_SESSION['pims_data']['connection'] , $query2 );
			$row2 = mysqli_fetch_array($result2);
			$echo = $echo . translate1("pims_family_background",$row['p_column_name']);
		}
		else if( $row1['p_update_table'] == '3' ){
			$query2 = "select ".$row['p_column_name']." from pims_educational_background where emp_No = ".$row1['emp_No']."; ";
			$result2 = mysqli_query($_SESSION['pims_data']['connection'] , $query2 );
			$row2 = mysqli_fetch_array($result2);
			$echo = $echo . translate1("pims_educational_background",$row['p_column_name']);
		}
		else if ( $row1['p_update_table'] == '4' ){
			$echo = $echo . translate1("pims_work_experience",$row['p_column_name']);
		}
		else if ( $row1['p_update_table'] == '5' ){
			$echo = $echo . translate1("pims_training_programs",$row['p_column_name']);
		}
		else if ( $row1['p_update_table'] == '6' ){
			$query2 = "select ".$row['p_column_name']." from pims_employment_records where emp_No = ".$row1['emp_No']."; ";
			$result2 = mysqli_query($_SESSION['pims_data']['connection'] , $query2 );
			$row2 = mysqli_fetch_array($result2);
			$echo = $echo . translate1("pims_employment_records",$row['p_column_name']);
		}
		else if ( $row1['p_update_table'] == '7' ){
			$query2 = "select ".$row['p_column_name']." from pims_employment_records where emp_No = ".$row1['emp_No']."; ";
			$result2 = mysqli_query($_SESSION['pims_data']['connection'] , $query2 );
			$row2 = mysqli_fetch_array($result2);
			$echo = $echo . translate1("pims_employment_records",$row['p_column_name']);
		}
		
		if ( $row1['p_update_table'] == '1' || $row1['p_update_table'] == '2' || $row1['p_update_table'] == '3' ){
			$columnData1 = $row2[$row['p_column_name']];
			if ( $row['p_column_name'] == "P_picture" ){
				$columnData2 = "../myfunc/showimageprofile.php?id=".$row1['emp_No']."'";	
			}
			else if( $row['p_column_name'] == "pims_birthdate" || $row['p_column_name'] == "father_birthdate" || $row['p_column_name'] == "mother_birthdate" ){
				$year = substr( $row2[$row['p_column_name']] , 0 , 4 );
				$month = substr ( $row2[$row['p_column_name']] , 5 , 2 );
				$day = substr ( $row2[$row['p_column_name']] , 8 , 2 );
				
				switch($month){
						case "01": $date = "January"; 
							$columnData1 = $date . " " . $day . ", " . $year;
							break;
						case "02": $date = "February"; 
							$columnData1 = $date . " " . $day . ", " . $year;
							break;
						case "03": $date = "March"; 
							$columnData1 = $date . " " . $day . ", " . $year;
							break;
						case "04": $date = "April"; 
							$columnData1 = $date . " " . $day . ", " . $year;
							break;
						case "05": $date = "May"; 
							$columnData1 = $date . " " . $day . ", " . $year;
							break;
						case "06": $date = "June"; 
							$columnData1 = $date . " " . $day . ", " . $year;
							break;
						case "07": $date = "July"; 
							$columnData1 = $date . " " . $day . ", " . $year;
							break;
						case "08": $date = "August"; 
							$columnData1 = $date . " " . $day . ", " . $year;
							break;
						case "09": $date = "September"; 
							$columnData1 = $date . " " . $day . ", " . $year;
							break;
						case "10": $date = "October"; 
							$columnData1 = $date . " " . $day . ", " . $year;
							break;
						case "11": $date = "November"; 
							$columnData1 = $date . " " . $day . ", " . $year;
							break;
						case "12": $date = "December"; 
							$columnData1 = $date . " " . $day . ", " . $year;
							break;
						default: $columnData1 = "";
				}
				
				
			}
			
			$echo = $echo . "</b>: ";
			
			if ( $row1['p_update_status'] == "Pending" ){
				if ( $row['p_column_name'] == "P_picture" ){
					$echo = $echo . "<img src='".$columnData2."' height = 80px width = 80px />";	
				}
				else{
					$echo = $echo . $columnData1;
				}
				$echo = $echo . " <i class='fa  fa-arrow-circle-right'></i> ";
			}
			
			if ( $row['p_column_name'] == "P_picture" ){
				$echo = $echo . "<img src='../myfunc/showimageprofilefromppul.php?id=".$row['p_update_list_id']."' height = 80px width = 80px />";
			}
			else if( $row['p_column_name'] == "pims_birthdate" || $row['p_column_name'] == "father_birthdate" || $row['p_column_name'] == "mother_birthdate" ){
				$year = substr( $row[$row['p_data_column']] , 0 , 4 );
				$month = substr ( $row[$row['p_data_column']] , 5 , 2 );
				$day = substr ( $row[$row['p_data_column']] , 8 , 2 );
				
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
				$echo = $echo . $date;
			}
			else{
				$echo = $echo . $row[$row['p_data_column']];
			}
			$echo = $echo . " <br />";
		}
		else if ( $row1['p_update_table'] == '4' ) {
			$echo = $echo . "</b>: " . $row[$row['p_data_column']] . "<br / >";
		}
		else if ( $row1['p_update_table'] == '5' ){
			if ( $row['p_column_name'] == "date_start" || $row['p_column_name'] == "date_finish" ){
				$timestamp = strtotime($row[$row['p_data_column']]);
				$echo = $echo . "</b>: " . date("M d,Y", $timestamp) . "<br / >";
			}
			else{
				$echo = $echo . "</b>: " . $row[$row['p_data_column']] . "<br / >";
			}
		}
		else if ( $row1['p_update_table'] == '6' ){
			$echo = $echo . "</b>: ". $row2[$row['p_column_name']] ."  <i class='fa  fa-arrow-circle-right'></i>  " . $row[$row['p_data_column']] . "<br / >";
		}
		else if ( $row1['p_update_table'] == '7' ){
			if ( $row['p_column_name'] == "job_title_code" ) $query3 = "select * from pims_job_title where job_title_code = '".$row[$row['p_data_column']]."'; ";
			else $query3 = "select * from pims_department where dept_ID = ".$row[$row['p_data_column']]."; ";
			$result3 = mysqli_query( $_SESSION['pims_data']['connection'] , $query3 );
			$row3 = mysqli_fetch_array($result3);
			
			if ( $row['p_column_name'] == "job_title_code" ) $query4 = "select * from pims_job_title where job_title_code = '".$row2[$row['p_column_name']]."'; ";
			else $query4 = "select * from pims_department where dept_ID = ".$row2[$row['p_column_name']]."; ";
			$result4 = mysqli_query( $_SESSION['pims_data']['connection'] , $query4 );
			$row4 = mysqli_fetch_array($result4);
				
			if ( $row['p_column_name'] == "job_title_code" ) $echo = $echo . "</b>: ". $row4['job_title_name'] ."  <i class='fa  fa-arrow-circle-right'></i>  " . $row3[''] . "<br / >";
			else $echo = $echo . "</b>: ". $row4['dept_name'] ."  <i class='fa  fa-arrow-circle-right'></i>  " . $row3['dept_name'] . "<br / >";
				
			
		}
		
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo $echo;
?>