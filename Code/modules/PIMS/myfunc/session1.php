<?php
	/*
		*$_SESSION['pims_data']['emp_id']
		*$_SESSION['pims_data']['messenger']
		*$_SESSION['pims_data']['pims_priv_user'] !
		*$_SESSION['pims_data']['pims_priv_admin'] !
		*$_SESSION['pims_data']['name']
         $_SESSION['pims_data']['cms_id']
		 
		$_SESSION['pims_data']['emp_id'] - Employee ID
		$_SESSION['pims_data']['name'] - Employee Name
		$_SESSION['pims_data']['cms_id'] - CMD ID
	*/
	
	if( ( !isset($_SESSION['user_data']['acct']['cms_account_ID']) || empty($_SESSION['user_data']['acct']['cms_account_ID']) ) && ( !isset($_SESSION['user_data']['acct']['cms_account_type']) || empty($_SESSION['user_data']['acct']['cms_account_type']) ) && ( !isset($_SESSION['user_data']['acct']['cms_username']) || empty($_SESSION['user_data']['acct']['cms_username']) ) ){
		header("Location: ../../../index.php");
	}
	else{
		//$_SESSION['pims_data']['emp_id'] = $_SESSION['user_data']['acct']['cms_account_ID'];
		include("db_connect.php");
		
		$query = "select emp_no from cms_account where cms_account_ID = ".$_SESSION['user_data']['acct']['cms_account_ID']." and cms_username = '".$_SESSION['user_data']['acct']['cms_username']."'; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		$numrow = mysqli_num_rows( $result );
		
		$echo = "";
		
		if ( $numrow == 0 ){
			// FORBIDDEN ACCESS
			header("Location: ../../../index.php");
		}
		else{
			$row = mysqli_fetch_array( $result );
			if ( isset($_SESSION['pims_data']['emp_id']) && !empty($_SESSION['pims_data']['emp_id']) ){
				if ( $_SESSION['pims_data']['emp_id'] !== $row['emp_no'] ){
					// the user has switch account
					unset($_SESSION['pims_data']['emp_id']);
					header("Location: ../../../index.php"); // please refer to the cms home page
				}
			}
			//else{
				$_SESSION['pims_data']['emp_id'] = $row['emp_no'];
				
				$query = "select * from pims_personnel where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
				$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				$row = mysqli_fetch_array( $result );
				
				$nameStr = $row['P_lname'] . ", " . $row['P_fname'];
				if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
				if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
				
				$_SESSION['pims_data']['name'] = $nameStr;
                $_SESSION['pims_data']['cms_id'] = $_SESSION['user_data']['acct']['cms_account_ID'];
				
				// $_SESSION['pims_data']['pims_priv_user'] = '0';
				// $_SESSION['pims_data']['pims_priv_admin'] = '0';

				/*
				$query = "select pims_priv , cms_account_type from cms_privilege , cms_account where cms_account.cms_account_ID = cms_privilege.cms_account_id and cms_account.emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
				$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				while ( $row = mysqli_fetch_array( $result ) ){
					if ( $row['cms_account_type'] == "user" ){
						$_SESSION['pims_data']['pims_priv_user'] = $row['pims_priv'];
					}
					else if ( $row['cms_account_type'] == "admin" ){
						$_SESSION['pims_data']['pims_priv_admin'] = $row['pims_priv'];
					}
				}
				*/
				
			//}
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] ); 
		
		echo $echo;
	}
		
	
	
	

?>