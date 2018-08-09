<?php
	include("db_connect.php");
	include("databaseDictionary1.php");
	
	$echo = "";
	$echo1 = "";
	
	$query = "select * from pims_personnel , pims_profile_updates where pims_personnel.emp_No = pims_profile_updates.emp_No and pims_profile_updates.p_update_id = ".$_GET['id']." ; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row1 = mysqli_fetch_array($result);
	$nameStr = $row1['P_lname'] . ", " . $row1['P_fname'];
	if ( $row1['P_mname'] != null ) $nameStr = $nameStr . " " . $row1['P_mname'];
	if ( $row1['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row1['P_extension_name'];
	$echo1 = $echo1 . " $('#span1').text('".$nameStr."'); ";
	$echo1 = $echo1 . " $('#spanStatus1').text('".$row1['p_update_status']."'); ";
	$echo1 = $echo1 . " $('#img1').attr({ 'src':'../myfunc/showimageprofile.php?id=".$row1['emp_No']."' }); ";
	
	if ( $row1['p_update_status'] == "Pending" ){
		$echo1 = $echo1 . " $('#spanButtons1').append( $('<button>APPROVED</button>&emsp;').attr({ 'id':'approvedButton' , 'type':'button' , 'class':'btn btn-outline btn-success' , 'onclick':'clickApproved(".$_GET['id'].");' }) ); ";
		$echo1 = $echo1 . " $('#spanButtons1').append( '&emsp;' ); ";
		$echo1 = $echo1 . " $('#spanButtons1').append( $('<button>DISAPPROVED</button>').attr({ 'id':'disapprovedButton' , 'type':'button' , 'class':'btn btn-outline btn-danger' , 'onclick':'clickDisapproved(".$_GET['id'].");' }) ); ";
		if ( $row1['emp_No'] != $_SESSION['pims_data']['emp_id'] ){
			$echo1 = $echo1 . " $('#spanButtons1').append( '&emsp;' ); ";
			$echo1 = $echo1 . " $('#spanButtons1').append( $('<button>MESSAGE</button>').attr({ 'id':'messageButton' , 'type':'button' , 'class':'btn btn-outline btn-info' , 'onclick':'clickMessage(".$row1['emp_No'].");' }) ); ";
		}
	}
	else{
		if ( $row1['emp_No'] != $_SESSION['pims_data']['emp_id'] ){
			$echo1 = $echo1 . " $('#spanButtons1').append( '&emsp;' ); ";
			$echo1 = $echo1 . " $('#spanButtons1').append( $('<button>MESSAGE</button>').attr({ 'id':'messageButton' , 'type':'button' , 'class':'btn btn-outline btn-info' , 'onclick':'clickMessage(".$row1['emp_No'].");' }) ); ";
		}
	}
	
	$echo2 = "";
	
	if( $row1['p_update_table'] == '1' ){
		$query = "select * from pims_personnel where emp_No = ".$row1['emp_No']."; ";
		$result = mysqli_query($_SESSION['pims_data']['connection'] , $query );
		$row = mysqli_fetch_array($result);
		$counter1 = 2;
		while ( $counter1 < mysqli_num_fields($result) ){
			if ( $counter1 != mysqli_num_fields($result) - 2 ){
				$echo2 = $echo2 . "<b>" . translate1("pims_personnel",mysqli_fetch_field_direct($result,$counter1)->name) ."</b>: " . $row[$counter1];
				$echo2 = $echo2 . " <br />";
			}
			$counter1++;
		}	
	}
	else if( $row1['p_update_table'] == '2' ){
		$query = "select * from pims_family_background where emp_No = ".$row1['emp_No']."; ";
		$result = mysqli_query($_SESSION['pims_data']['connection'] , $query );
		$row = mysqli_fetch_array($result);
		$counter1 = 1;
		while ( $counter1 < mysqli_num_fields($result) - 1 ){
			$echo2 = $echo2 . "<b>" . translate1("pims_family_background",mysqli_fetch_field_direct($result,$counter1)->name) ."</b>: " . $row[$counter1];
			$echo2 = $echo2 . " <br />";
			$counter1++;
		}	
	}
	else if( $row1['p_update_table'] == '3' ){
		$query = "select * from pims_educational_background where emp_No = ".$row1['emp_No']."; ";
		$result = mysqli_query($_SESSION['pims_data']['connection'] , $query );
		$row = mysqli_fetch_array($result);
		$counter1 = 1;
		while ( $counter1 < mysqli_num_fields($result) - 1 ){
			$echo2 = $echo2 . "<b>" . translate1("pims_educational_background",mysqli_fetch_field_direct($result,$counter1)->name) ."</b>: " . $row[$counter1];
			$echo2 = $echo2 . " <br />";
			$counter1++;
		}
	}
	else if( $row1['p_update_table'] == '4' ){
		$query = "select * from pims_work_experience where emp_No = ".$row1['emp_No']."; ";
		$result = mysqli_query($_SESSION['pims_data']['connection'] , $query );
		$counter1 = 1;
		while ( $row = mysqli_fetch_array($result) ){
			$echo2 = $echo2 . $counter1++ . ". <b>" . translate1("pims_work_experience","we_date_from") ."</b>: " . $row["we_date_from"];
			$echo2 = $echo2 . " <br />";
			$echo2 = $echo2 . "<b>" . translate1("pims_work_experience","we_date_to") ."</b>: " . $row["we_date_to"];
			$echo2 = $echo2 . " <br />";
			$echo2 = $echo2 . "<b>" . translate1("pims_work_experience","we_position") ."</b>: " . $row["we_position"];
			$echo2 = $echo2 . " <br />";
			$echo2 = $echo2 . "<b>" . translate1("pims_work_experience","company") ."</b>: " . $row["company"];
			$echo2 = $echo2 . " <br />";
		}
		if ( $counter1 == 1 ){
			$echo2 = $echo2 . "<b>No information available</b>";
		}
	}
	else if( $row1['p_update_table'] == '5' ){
		$query = "select * from pims_training_programs where emp_No = ".$row1['emp_No']."; ";
		$result = mysqli_query($_SESSION['pims_data']['connection'] , $query );
		$counter1 = 1;
		while ( $row = mysqli_fetch_array($result) ){
			$echo2 = $echo2 . $counter1++ . ". <b>" . translate1("pims_training_programs","training_title") ."</b>: " . $row["training_title"];
			$echo2 = $echo2 . " <br />";
			$echo2 = $echo2 . "<b>" . translate1("pims_training_programs","location") ."</b>: " . $row["location"];
			$echo2 = $echo2 . " <br />";
			$echo2 = $echo2 . "<b>" . translate1("pims_training_programs","date_start") ."</b>: " . $row["date_start"];
			$echo2 = $echo2 . " <br />";
			$echo2 = $echo2 . "<b>" . translate1("pims_training_programs","date_finish") ."</b>: " . $row["date_finish"];
			$echo2 = $echo2 . " <br />";
			$echo2 = $echo2 . "<b>" . translate1("pims_training_programs","no_of_hours") ."</b>: " . $row["no_of_hours"];
			$echo2 = $echo2 . " <br />";
		}
		if ( $counter1 == 1 ){
			$echo2 = $echo2 . "<b>No information available</b>";
		}
	}
	else if( $row1['p_update_table'] == '6' ){
		$query = "select * from pims_employment_records where emp_No = ".$row1['emp_No']."; ";
		$result = mysqli_query($_SESSION['pims_data']['connection'] , $query );
		$row = mysqli_fetch_array($result);
		$counter1 = 1;
		while ( $counter1 < mysqli_num_fields($result) - 3 ){
			$echo2 = $echo2 . "<b>" . translate1("pims_employment_records",mysqli_fetch_field_direct($result,$counter1)->name) ."</b>: " . $row[$counter1];
			$echo2 = $echo2 . " <br />";
			$counter1++;
		}
	}
	else if ( $row1['p_update_table'] == '7' ){
		$query = "select * from pims_employment_records where emp_No = ".$row1['emp_No']."; ";
		$result = mysqli_query($_SESSION['pims_data']['connection'] , $query );
		$row = mysqli_fetch_array($result);
		
		$query3 = "select * from pims_job_title where job_title_code = '".$row["job_title_code"]."'; ";
		$result3 = mysqli_query( $_SESSION['pims_data']['connection'] , $query3 );
		$row3 = mysqli_fetch_array($result3);
				
		$echo2 = $echo2 . "<b>" . translate1("pims_employment_records","job_title_code") ."</b>: " . $row3["job_title_name"];
		$echo2 = $echo2 . " <br />";
		
		$query3 = "select * from pims_department where dept_ID = ".$row["dept_ID"]."; ";
		$result3 = mysqli_query( $_SESSION['pims_data']['connection'] , $query3 );
		$row3 = mysqli_fetch_array($result3);
				
		$echo2 = $echo2 . "<b>" . translate1("pims_employment_records","dept_ID") ."</b>: " . $row3["dept_name"];
		$echo2 = $echo2 . " <br />";
				
	}
	
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo "<script>" . $echo1 . " $('#appendhere2').html('".$echo2."'); viewDetails(".$_GET['id']."); </script>";
?>