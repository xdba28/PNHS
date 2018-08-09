<?php	
		session_start();
		if ( isset($_GET['id']) && !empty($_GET['id']) ){
			if ( $_SESSION['pims_data']['emp_id'] != $_GET['id'] ){
				$sender =$_GET['id2'];
				$receiver = $_GET['id'];
				$errorNo = 0;
                $rollbackCall = 0;
                $chatPartId = 0;
				
				include("../../myfunc/db_connect.php");
				
				$query = "select * from pims_participant where ( p_user_one = ".$sender." or p_user_two = ".$sender." ) and ( p_user_one = ".$receiver." or p_user_two = ".$receiver." ); ";
				$result = mysqli_query($_SESSION['pims_data']['connection'],$query);
			
				if ( mysqli_num_rows($result) > 0){
					$row = mysqli_fetch_array($result);
					$chatPartId = $row['p_part_id'];
				}
				else{
					$query = "insert into pims_participant set p_user_one = ".$sender." , p_user_two = ".$receiver."; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo > 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = $errorNo;
						$rollbackCall++;
					}
					if ( $errorNo == 0 ){
						$query = "select * from pims_participant where ( p_user_one = ".$sender." or p_user_two = ".$sender." ) and ( p_user_one = ".$receiver." or p_user_two = ".$receiver." ); ";
						$result = mysqli_query($_SESSION['pims_data']['connection'],$query);
						if ( mysqli_num_rows($result) == 1 ){
							$row = mysqli_fetch_array($result);
							mysqli_commit($_SESSION['pims_data']['connection']);
							$chatPartId = $row['p_part_id'];
						}
						else{
							$chatPartId = 0;
						}
					}
				}
			
				mysqli_close( $_SESSION['pims_data']['connection'] );
				unset( $_SESSION['pims_data']['connection'] ); 
				
				//if ( isset($chatPartId) && $chatPartId > 0 )echo "<script> $(document).ready(function(){  $('#myframe').attr({ 'src':'chat.php?id=".$chatPartId."' });  });</script>";
				echo "<script>window.location.href = '../chat.php?id=".$_GET['id']."';</script>";
			}
		}
?>