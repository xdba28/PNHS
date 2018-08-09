<?php
	include("../myfunc/db_connect.php");
	
	$echo = "";
	$count = 0;
	
	$query = "select * from pims_participant where p_user_one = ".$_SESSION['pims_data']['cms_id']." or p_user_two = ".$_SESSION['pims_data']['cms_id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	while ( $row = mysqli_fetch_array($result) ){
		if ( $row['p_user_one'] == $_SESSION['pims_data']['cms_id'] ){
			$query1 = "select * from cms_account where cms_account_id = ".$row['p_user_two']."; ";
			$result1 = mysqli_query( $_SESSION['pims_data']['connection'] , $query1 );
			$row1 = mysqli_fetch_array($result1);
			
			$query2 = "select * from pims_personnel where emp_No = ".$row1['emp_no']."; ";
			$result2 = mysqli_query( $_SESSION['pims_data']['connection'] , $query2 );
			$row2 = mysqli_fetch_array($result2);
			
			$nameStr = $row2['P_lname'] . ", " . $row2['P_fname'];
			if ( $row2['P_mname'] != null ) $nameStr = $nameStr . " " . $row2['P_mname'];
			if ( $row2['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row2['P_extension_name'];
			
			$echo = $echo . " $('#myTable2').append($('<tr></tr>').attr({ 'id':'tr".$count."' })); ";
			$echo = $echo . " $('#tr".$count."').append($('<td></td>').attr({ 'id':'td".$count."' })); ";
			$echo = $echo . " $('#td".$count."').append($('<a></a>').attr({ 'id':'a".$count."' , 'onclick':'changeIFrame(" . $row['p_part_id'] . ")' })); ";
			$echo = $echo . " $('#a".$count."').append($('<img />').attr({ 'alt':'User' , 'style':'margin: 0 auto; max-height: 30px; max-width: 30px;' , 'src':'../myfunc/showimageprofile.php?id=".$row1['emp_no']."' , 'class':'img-square ims-responsive' })); ";
			$echo = $echo . " $('#a".$count."').append($('<span>&nbsp</span>')); ";
			$echo = $echo . " $('#a".$count."').append($('<label>".$nameStr."</label>').attr({ 'style':'max-height: 10px; ' })); ";
			
			$query3 = "select * from pims_messages where p_part_id = ".$row['p_part_id']." and p_status = '0' and cms_account_id != ".$_SESSION['pims_data']['cms_id']."; ";
			$result3 = mysqli_query( $_SESSION['pims_data']['connection'] , $query3 );
			$num3 = mysqli_num_rows( $result3 );
			if ( $num3 > 0 ){
				$echo = $echo . " $('#a".$count."').append($('<span>&nbsp</span>')); ";
				$echo = $echo . " $('#a".$count."').append($('<span>".$num3."</span>').attr({ 'style':'font-weight:bold; color:red;' })); ";
			}
		}
		else if ( $row['p_user_two'] == $_SESSION['pims_data']['cms_id'] ){
			$query1 = "select * from cms_account where cms_account_id = ".$row['p_user_one']."; ";
			$result1 = mysqli_query( $_SESSION['pims_data']['connection'] , $query1 );
			$row1 = mysqli_fetch_array($result1);
			
			$query2 = "select * from pims_personnel where emp_No = ".$row1['emp_no']."; ";
			$result2 = mysqli_query( $_SESSION['pims_data']['connection'] , $query2 );
			$row2 = mysqli_fetch_array($result2);
			
			$nameStr = $row2['P_lname'] . ", " . $row2['P_fname'];
			if ( $row2['P_mname'] != null ) $nameStr = $nameStr . " " . $row2['P_mname'];
			if ( $row2['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row2['P_extension_name'];
			
			$echo = $echo . " $('#myTable2').append($('<tr></tr>').attr({ 'id':'tr".$count."' })); ";
			$echo = $echo . " $('#tr".$count."').append($('<td></td>').attr({ 'id':'td".$count."' })); ";
			$echo = $echo . " $('#td".$count."').append($('<a></a>').attr({ 'id':'a".$count."' , 'onclick':'changeIFrame(" . $row['p_part_id'] . ")' })); ";
			$echo = $echo . " $('#a".$count."').append($('<img />').attr({ 'alt':'User' , 'style':'margin: 0 auto; max-height: 30px; max-width: 30px;' , 'src':'../myfunc/showimageprofile.php?id=".$row1['emp_no']."' , 'class':'img-square ims-responsive' })); ";
			$echo = $echo . " $('#a".$count."').append($('<span>&nbsp</span>')); ";
			$echo = $echo . " $('#a".$count."').append($('<label>".$nameStr."</label>').attr({ 'style':'max-height: 10px; ' })); ";
			
			$query3 = "select * from pims_messages where p_part_id = ".$row['p_part_id']." and p_status = '0' and cms_account_id != ".$_SESSION['pims_data']['cms_id']."; ";
			$result3 = mysqli_query( $_SESSION['pims_data']['connection'] , $query3 );
			$num3 = mysqli_num_rows( $result3 );
			if ( $num3 > 0 ){
				$echo = $echo . " $('#a".$count."').append($('<span>&nbsp</span>')); ";
				$echo = $echo . " $('#a".$count."').append($('<span>".$num3."</span>').attr({ 'style':'font-weight:bold; color:red;' })); ";
			}
		}
		$count++;
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo  $echo ;
?>