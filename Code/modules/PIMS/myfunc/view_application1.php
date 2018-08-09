<?php
	include("db_connect.php");
	
	$echo = "";
	
	$query = "select * from pims_personnel , pims_leave_balance , pims_leave where pims_leave.leave_bal_id = pims_leave_balance.leave_bal_ID and pims_leave_balance.emp_No = pims_personnel.emp_No and pims_leave.leave_ID = ".$_GET['id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	while( $row = mysqli_fetch_array($result) ){
		$nameStr = $row['P_lname'] . ", " . $row['P_fname'];
		if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
		if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
		$echo = $echo . " $('#span1').text('".$nameStr."'); ";
		$echo = $echo . " $('#img1').attr({ 'src' : '../myfunc/showimageprofile.php?id=".$row['emp_No']."' }); ";
		$echo = $echo . " $('#span2').text('".$row['leave_credits']."'); ";
		$echo = $echo . " $('#span3').text('".$row['type']."'); ";
		$year = substr( $row['leave_start'] , 0 , 4 );
		$month = substr ( $row['leave_start'] , 5 , 2 );
		$date = substr ( $row['leave_start'] , 8 , 2 );
		switch($month){
				case "01": $date1 = "January"; break;
				case "02": $date1 = "February"; break;
				case "03": $date1 = "March"; break;
				case "04": $date1 = "April"; break;
				case "05": $date1 = "May"; break;
				case "06": $date1 = "June"; break;
				case "07": $date1 = "July"; break;
				case "08": $date1 = "August"; break;
				case "09": $date1 = "September"; break;
				case "10": $date1 = "October"; break;
				case "11": $date1 = "November"; break;
				case "12": $date1 = "December"; break;
		}
		$date1 = $date1 . " " . $date . ", " . $year;
		$echo = $echo . " $('#span4').text('".$date1."'); ";
		$year = substr( $row['leave_end'] , 0 , 4 );
		$month = substr ( $row['leave_end'] , 5 , 2 );
		$date = substr ( $row['leave_end'] , 8 , 2 );
		switch($month){
				case "01": $date1 = "January"; break;
				case "02": $date1 = "February"; break;
				case "03": $date1 = "March"; break;
				case "04": $date1 = "April"; break;
				case "05": $date1 = "May"; break;
				case "06": $date1 = "June"; break;
				case "07": $date1 = "July"; break;
				case "08": $date1 = "August"; break;
				case "09": $date1 = "September"; break;
				case "10": $date1 = "October"; break;
				case "11": $date1 = "November"; break;
				case "12": $date1 = "December"; break;
		}
		$date1 = $date1 . " " . $date . ", " . $year;
		$echo = $echo . " $('#span5').text('".$date1."'); ";
		$echo = $echo . " $('#span6').text('".$row['place_to_be_visited']."'); ";
		$echo = $echo . " $('#span7').text('".$row['purpose']."'); ";
		
		if ( $row['attachment_type'] != "" ){
			$echo = $echo . " $('#span8').html('<a href = ../myfunc/leave_attachment.php?id=".$row['leave_ID']." target=_blank >".$row['attachment_name']."</a>'); ";
		}
		$echo = $echo . " $('#span9').text('".$row['leave_application_status']."'); ";
		
		if ( $row['leave_application_status'] == "Pending" ){
			if ( $row['leave_credits'] == 0 ){
				$echo = $echo . " $('#span10').append( $('<button>APPROVED</button>&emsp;').attr({ 'id':'approvedButton' , 'type':'button' , 'class':'btn btn-outline btn-success' , 'onclick':'clickApproved(".$_GET['id'].");' }) ); ";
				$echo = $echo . " $('#span10').append( '&emsp;' ); ";
				
			}
			else{
				$echo = $echo . " $('#span10').append( $('<button>APPROVED</button>&emsp;').attr({ 'id':'approvedButton' , 'type':'button' , 'class':'btn btn-outline btn-success' , 'onclick':'clickApproved(".$_GET['id'].");' }) ); ";
				$echo = $echo . " $('#span10').append( '&emsp;' ); ";
			}
			$echo = $echo . " $('#span10').append( $('<button>DISAPPROVED</button>').attr({ 'id':'disapprovedButton' , 'type':'button' , 'class':'btn btn-outline btn-danger' , 'onclick':'clickDisapproved(".$_GET['id'].");' }) ); ";
		}
		if ( $row['emp_No'] != $_SESSION['pims_data']['emp_id'] ){
			$query2 = "select * from cms_account where emp_No = " . $row['emp_No'];
			$result2 = mysqli_query($_SESSION['pims_data']['connection'],$query2);
			$row2 = mysqli_fetch_array($result2);
			$echo = $echo . " $('#span10').append( '&emsp;' ); ";
			$echo = $echo . " $('#span10').append( $('<button>MESSAGE</button>').attr({ 'id':'messageButton' , 'type':'button' , 'class':'btn btn-outline btn-info' , 'onclick':'clickMessage(".$row2['cms_account_ID'].");' }) ); ";
		}
		
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo "<script>" . $echo . "</script>";
?>