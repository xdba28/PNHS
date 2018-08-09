<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	//echo '<script>alert(\'Error getting Student Accounts\');window.location = \'../student/student_list.php\'; </script>';
	//echo print_r($_REQUEST); die();
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['pswd']) AND is_string($_POST['pswd']) AND isset($_POST['npswd']) AND is_string($_POST['npswd']) AND isset($_POST['spswd']) AND is_string($_POST['spswd'])) {
				$pswd = trim($mysqli->real_escape_string($_POST['pswd']));
				$npswd = trim($mysqli->real_escape_string($_POST['npswd']));
				$spswd = trim($mysqli->real_escape_string($_POST['spswd']));
				$_SESSION['q'] = $pswd;
				$_SESSION['w'] = $npswd;
				$_SESSION['e'] = $spswd;
				$cms_id = $_SESSION['user_data']['acct']['cms_account_ID'];
				//$mysqli->autocommit(FALSE);
				//$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);;\
				$news_query="SELECT * FROM `cms_account` WHERE `cms_account_ID` = ".$cms_id.";";
				$get_news = $mysqli->query($news_query);
				while($news = $get_news->fetch_assoc()) {
					//echo $pwd = base64_encode(trim($news['cms_password']));
					$pwd = pcrypt(trim($news['cms_password']), 'dcrypt');
					//die();
					$chpwd = trim($news['cms_cpasswd']);
				}
				if($pswd==$pwd) {
					if($npswd==$spswd) {
						$npswd = pcrypt($npswd, 'ecrypt');
						$cpwd_query = "UPDATE `cms_account` SET `cms_password` = '$npswd', `cms_cpasswd` = '0' WHERE `cms_account`.`cms_account_ID` = '$cms_id';";
						$get_cpwd = $mysqli->query($cpwd_query);
						if($get_cpwd) {
							unset($_SESSION['q']); unset($_SESSION['w']); unset($_SESSION['e']);
							$_SESSION['msg']='Password Updated';
							header('Location: ../../index.php');
							die();
						}
						else {
							$_SESSION['msg']='Update Failed';
							header('Location: ../cpasswd.php');
							die();
						}
					}
					else {
						$_SESSION['msg']='Passwords don\'t match.';
						header('Location: ../cpasswd.php');
						die();
					}
				}
				else {
					$_SESSION['msg']='Current Password is incorrect.';
					header('Location: ../cpasswd.php');
					die();
				}
			}
			else {
				header('Location: ../cpasswd.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>