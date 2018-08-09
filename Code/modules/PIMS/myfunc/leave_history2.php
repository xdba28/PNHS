<?php
	
	// Name: leave_history2.php
	// 
	// Purpose: To load the alert pop up for the information of the leave
	// 
	// Note: Please don't modify the code below
	
	session_start();
	include("db_connect.php");
	
	$leave_id = $_GET['id'];
	
	$query = "select * from pims_leave where leave_ID = " . $leave_id . "; ";
	$result = mysqli_query($_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array( $result );
	
	$Date1 = "";
	
	$year1 = substr( $row['leave_start'] , 0 , 4 );
	$month1 = substr ( $row['leave_start'] , 5 , 2 );
	$day1 = substr ( $row['leave_start'] , 8 , 2 );
		
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
	
	
	$Date2 = "";
	
	$year2 = substr( $row['leave_end'] , 0 , 4 );
	$month2 = substr ( $row['leave_end'] , 5 , 2 );
	$day2 = substr ( $row['leave_end'] , 8 , 2 );
			
	switch($month2){
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
	
	if ( $row['date_responded'] == null ){
		$Status = "<b>Status:</b> ".$row['leave_application_status']." ";
	}
	else{
		$Date3 = "";
	
		$year3 = substr( $row['date_responded'] , 0 , 4 );
		$month3 = substr ( $row['date_responded'] , 5 , 2 );
		$day3 = substr ( $row['date_responded'] , 8 , 2 );
			
		switch($month3){
			case "01": $Date3 = "January"; break;
			case "02": $Date3 = "February"; break;
			case "03": $Date3 = "March"; break;
			case "04": $Date3 = "April"; break;
			case "05": $Date3 = "May"; break;
			case "06": $Date3 = "June"; break;
			case "07": $Date3 = "July"; break;
			case "08": $Date3 = "August"; break;
			case "09": $Date3 = "September"; break;
			case "10": $Date3 = "October"; break;
			case "11": $Date3 = "November"; break;
			case "12": $Date3 = "December"; break;
			default: $Date3 = "00"; break;
		}
		$Date3 = $Date3 . " " . $day3 . ", " . $year3;
		$Status = "<b>Status:</b> ".$row['leave_application_status']." - " . $Date3;
	}
	
	$echo = "<h3><b>LEAVE APPLICATION INFORMATION:</b></h3> <br /><b>Leave ID:</b> ".$row['leave_ID']." <br />".$Status." <br /><b>Remarked by:</b> ".$row['approved_by']." <br /><b>Leave Start:</b> ".$Date1." <br/><b>Leave End:</b> ".$Date2." <br /><b>Place to be visited:</b> ".$row['place_to_be_visited']." <br /><b>Purpose:</b> ".$row['purpose']." <br /><b>Attachment:</b> <a href = 'myfunc/leave_attachment.php?id=".$row['leave_ID']."' target='_blank' >".$row['attachment_name']."</a> ";
	
	if ( $row['leave_application_status'] == 'Pending' ){
		$echo1 = "confirm";
	}
	else{
		$echo1 = "alert";
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	echo '				alertify.'.$echo1.'("'.$echo.'", function (e) {
								if (e) {
									
								} else {
									resetAlertify();
									alertify.set({ labels: {
										ok     : "YES",
										cancel : "No"
									} });
									alertify.set({ buttonReverse: true });
									alertify.confirm("Are you want to cancel this leave application?", function (e) {
										if (e) {
											$.ajax({
												url: "../myfunc/leave_history3.php?id=" + id,
												success: function(data){
													$.ajax({
														url: "../myfunc/updateLeaveHistory1.php?id=" + id,
														success: function(data){
															eval(data);
														}
													});
													resetAlertify();
													alertify.success(data);
												}
											});
										} else {
											resetAlertify();
											alertify.error("Canceled");
										}
									});
								}
						}); ';
?>