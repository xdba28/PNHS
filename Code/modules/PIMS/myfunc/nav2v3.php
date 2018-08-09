<?php
	include("../myfunc/db_connect.php");
	
	$count = 0;
	
	$echo = "";
	
	$query2 = "select * from pims_personnel where emp_No != ".$_SESSION['pims_data']['emp_id']." order by p_lname , p_fname , p_mname , p_extension_name asc";
	$result2 = mysqli_query( $_SESSION['pims_data']['connection'] , $query2 );
	$echo = $echo . " $('#myTable').append($('<tr></tr>').attr({ 'id':'zeroresults' , 'style':'display:none' })); ";
	$echo = $echo . " $('#zeroresults').append($('<center></center>').attr({ 'id':'zeroresults1' })); ";
	$echo = $echo . " $('#zeroresults1').append($('<i></i>').attr({ 'class':'fa fa-info-circle fa-fw' })); ";
	$echo = $echo . " $('#zeroresults1').append($('<span>&nbsp</span>')); ";
	$echo = $echo . " $('#zeroresults1').append($('<label>No results. Please try again</label>').attr({ 'style':'max-height: 10px; color:white; ' })); ";
	while ( $row2 = mysqli_fetch_array($result2) ){
			
		$nameStr = $row2['P_lname'] . ", " . $row2['P_fname'];
		if ( $row2['P_mname'] != null ) $nameStr = $nameStr . " " . $row2['P_mname'];
		if ( $row2['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row2['P_extension_name'];
				
		$echo = $echo . " $('#myTable').append($('<tr></tr>').attr({ 'id':'tr".$count."' })); ";
		$echo = $echo . " $('#tr".$count."').append($('<td></td>').attr({ 'id':'td".$count."' })); ";
		$echo = $echo . " $('#td".$count."').append($('<a></a>').attr({ 'id':'a".$count."' , 'href':'browse_profile.php?id=".$row2['emp_No']."' })); ";
		$echo = $echo . " $('#a".$count."').append($('<img />').attr({ 'alt':'Pic' , 'style':'margin: 0 auto; max-height: 30px; max-width: 30px;' , 'src':'../myfunc/showimageprofile.php?id=".$row2['emp_No']."' , 'class':'img-square ims-responsive' })); ";
		$echo = $echo . " $('#a".$count."').append($('<span>&nbsp</span>')); ";
		$echo = $echo . " $('#a".$count."').append($('<label>".$nameStr."</label>').attr({ 'style':'max-height: 10px; color:white; ' })); ";
			
		$count++;
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo $echo;
?>