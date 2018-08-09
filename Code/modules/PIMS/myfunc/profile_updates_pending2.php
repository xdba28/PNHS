<?php
	include("db_connect.php");
	include("databaseDictionary1.php");
	
	$echo = "";
	
	$query = "select * from pims_personnel where emp_No = ".$_GET['id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array($result);
	$nameStr = $row['P_lname'] . ", " . $row['P_fname'];
	if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
	if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
	$echo = $echo . " $('#name1').text('".$nameStr."'); ";
	
	$query = "select * from pims_profile_update_list , pims_profile_updates where pims_profile_updates.p_update_id = pims_profile_update_list.p_update_id and pims_profile_updates.p_update_id = ".$_GET['id2']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$countnum = mysqli_num_rows($result);
	$count = 0;
	while ( $row = mysqli_fetch_array($result) ){
		if ( $row['p_column_name'] != "P_picture" && $count++ < 6 ){
			if ( $row['p_update_table'] == '1' ) $echo = $echo . " $('#appendhere').append($('<div>".translate1('pims_personnel',$row['p_column_name']).": ".$row[$row['p_data_column']]."</div>').attr({ 'class':'col-md-6' })); ";
			else if ( $row['p_update_table'] == '2' ) $echo = $echo . " $('#appendhere').append($('<div>".translate1('pims_family_background',$row['p_column_name']).": ".$row[$row['p_data_column']]."</div>').attr({ 'class':'col-md-6' })); ";
			else if ( $row['p_update_table'] == '3' ) $echo = $echo . " $('#appendhere').append($('<div>".translate1('pims_educational_background',$row['p_column_name']).": ".$row[$row['p_data_column']]."</div>').attr({ 'class':'col-md-6' })); ";
			else if ( $row['p_update_table'] == '4' ) $echo = $echo . " $('#appendhere').append($('<div>".translate1('pims_work_experience',$row['p_column_name']).": ".$row[$row['p_data_column']]."</div>').attr({ 'class':'col-md-6' })); ";
			else if ( $row['p_update_table'] == '5' ) $echo = $echo . " $('#appendhere').append($('<div>".translate1('pims_training_programs',$row['p_column_name']).": ".$row[$row['p_data_column']]."</div>').attr({ 'class':'col-md-6' })); ";
			else if ( $row['p_update_table'] == '6' ) $echo = $echo . " $('#appendhere').append($('<div>".translate1('pims_employment_records',$row['p_column_name']).": ".$row[$row['p_data_column']]."</div>').attr({ 'class':'col-md-6' })); ";
			else if ( $row['p_update_table'] == '7' ){
				if ( $row['p_column_name'] == "job_title_code" ) $query3 = "select * from pims_job_title where job_title_code = '".$row[$row['p_data_column']]."'; ";
				else $query3 = "select * from pims_department where dept_ID = ".$row[$row['p_data_column']]."; ";
				$result3 = mysqli_query( $_SESSION['pims_data']['connection'] , $query3 );
				$row3 = mysqli_fetch_array($result3);
				
				if ( $row['p_column_name'] == "job_title_code" ) $echo = $echo . " $('#appendhere').append($('<div>".translate1('pims_employment_records',$row['p_column_name']).": ".$row3['job_title_name']."</div>').attr({ 'class':'col-md-6' })); ";
				else $echo = $echo . " $('#appendhere').append($('<div>".translate1('pims_employment_records',$row['p_column_name']).": ".$row3['dept_name']."</div>').attr({ 'class':'col-md-6' })); ";
				
			}
			else if ( $row['p_update_table'] == '8' ) $echo = $echo . " $('#appendhere').append($('<div>".translate1('pims_cs_eligibility',$row['p_column_name']).": ".$row[$row['p_data_column']]."</div>').attr({ 'class':'col-md-6' })); ";
			else if ( $row['p_update_table'] == '9' ) $echo = $echo . " $('#appendhere').append($('<div>".translate1('pims_voluntary_work',$row['p_column_name']).": ".$row[$row['p_data_column']]."</div>').attr({ 'class':'col-md-6' })); ";
		}
		else if ( $count == 6 ){
			$echo = $echo . " $('#appendhere').append($('<div> and ".($countnum - 6)." more .. </div>').attr({ 'class':'col-md-12' })); ";
			break;
		}
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo $echo;
?>