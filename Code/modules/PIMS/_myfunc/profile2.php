<?php
	// Name: profile2.php
	// 
	// Purpose: To update the editing_view with the user current info
	// 
	// Note: Please don't modify the code below
	include("db_connect.php");
	
	$query = "select * from pims_personnel where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array( $result );
	
	
	$nameStr = "NAME: " . $row['P_lname'] . ", " . $row['P_fname'];
	if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
	if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
	
	
	
	echo '
	<script>
	$("#name1").html("'.$nameStr.'");
	
	if ( "'.$row['pims_gender'].'" == "Male" ){
		$("input:radio[name=gender1]:nth(0)").attr("checked",true);
	}
	else if ( "'.$row['pims_gender'].'" == "Female" ){
		$("input:radio[name=gender1]:nth(1)").attr("checked",true);
	}
	
	$("#birthdate1").val("'.$row['pims_birthdate'].'");
	$("#nationality1").val("'.$row['nationality'].'");
	
	if ( "'.$row['civil_status'].'" == "Single" ){
		$("input:radio[name=civilStatus1]:nth(0)").attr("checked",true);
	}
	else if ( "'.$row['civil_status'].'" == "Married" ){
		$("input:radio[name=civilStatus1]:nth(1)").attr("checked",true);
	}
	else if ( "'.$row['civil_status'].'" == "Widowed" ){
		$("input:radio[name=civilStatus1]:nth(2)").attr("checked",true);
	}
	else if ( "'.$row['civil_status'].'" == "Seperated" ){
		$("input:radio[name=civilStatus1]:nth(3)").attr("checked",true);
	}
	else{
		$("input:radio[name=civilStatus1]:nth(4)").attr("checked",true);
		$("#civilStatusOthers1").val("'.$row['civil_status'].'");
		$("#civilStatusOthers1").attr("style","display: block");
	}
	
	$("#bloodType1").val("'.$row['bloodtype'].'");
	$("#gsis1").val("'.$row['GSIS_No'].'");
	$("#contactNo1").val("'.$row['pims_contact_no'].'");
	$("#emailAddress1").val("'.$row['P_email'].'");
	$("#religion1").val("'.$row['pims_religion'].'");
	
	$("#tempStreet1").val("'.$row['temp_address_street'].'");
	$("#tempHouseNo1").val("'.$row['temp_address_house_no'].'");
	$("#tempBarangay1").val("'.$row['temp_address_barangay'].'");
	$("#tempMunicipalityCity1").val("'.$row['temp_address_municipality_city'].'");
	$("#tempProvince1").val("'.$row['temp_address_province'].'");
	$("#tempZipCode1").val("'.$row['temp_address_zipCode'].'");
	
	$("#permStreet1").val("'.$row['perm_address_street'].'");
	$("#permHouseNo1").val("'.$row['perm_address_house_no'].'");
	$("#permBarangay1").val("'.$row['perm_address_barangay'].'");
	$("#permMunicipalityCity1").val("'.$row['perm_address_municipality_city'].'");
	$("#permProvince1").val("'.$row['perm_address_province'].'");
	$("#permZipCode1").val("'.$row['perm_address_zipCode'].'");
	
	</script>
	';
	
	
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
?>