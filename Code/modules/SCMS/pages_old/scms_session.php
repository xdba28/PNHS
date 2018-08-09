<?php
		include_once('db_connect.php');

		if (!empty($_POST['u'] && $_POST['p'])){
			
        $user = $_POST['u'];   
        $password = $_POST['p'];

		$login = mysqli_query($mysqli,"SELECT * FROM `cms_account` WHERE cms_username = '".$user."' AND cms_password = '".$password."'")
		or die("Error: Could not fetch rows!".mysqli_error($mysqli));
		
		$row = mysqli_fetch_array($login);
  

		if($row['cms_username'] == $user && $row['cms_password'] == $password)
		{
			$fetch_priv = mysqli_query($mysqli, "SELECT * FROM cms_privilege
			WHERE cms_account_id = '".$row['cms_account_ID']."'")
			or die(mysqli_error($mysqli));
			
			$priv = mysqli_fetch_array($fetch_priv);
			
			session_start();
			$_SESSION['user_data']['acct']['cms_username'] = $row['cms_username'];
			$_SESSION['user_data']['acct']['cms_account_ID'] = $row['cms_account_ID'];
            $_SESSION['user_data']['acct']['emp_no'] = $row['emp_no'];
            $_SESSION['user_data']['acct']['lrn'] = $row['lrn'];		
			
			
			
			$_SESSION['user_data']['priv']['cms_account_type'] = $priv['cms_account_type'];
			$_SESSION['user_data']['priv']['cms_priv_ID'] = $priv['cms_priv_id'];
			$_SESSION['user_data']['priv']['cms_priv'] = $priv['cms_priv'];
			$_SESSION['user_data']['priv']['frms_priv'] = $priv['frms_priv'];
			$_SESSION['user_data']['priv']['ims_priv'] = $priv['ims_priv'];
			$_SESSION['user_data']['priv']['ipcrms_priv'] = $priv['ipcrms_priv'];
			$_SESSION['user_data']['priv']['oes_priv'] = $priv['oes_priv'];
			$_SESSION['user_data']['priv']['pms_priv'] = $priv['pms_priv'];
			$_SESSION['user_data']['priv']['pims_priv'] = $priv['pims_priv'];
			$_SESSION['user_data']['priv']['prs_priv'] = $priv['prs_priv'];
			$_SESSION['user_data']['priv']['css_priv'] = $priv['css_priv'];
			$_SESSION['user_data']['priv']['scms_priv'] = $priv['scms_priv'];
			$_SESSION['user_data']['priv']['sis_priv'] = $priv['sis_priv'];
			$_SESSION['user_data']['priv']['memo_priv'] = $priv['memo_priv'];
			$_SESSION['user_data']['priv']['calendar_priv'] = $priv['calendar_priv'];
			$_SESSION['user_data']['priv']['news_priv'] = $priv['news_priv'];
			$_SESSION['user_data']['priv']['ach_priv'] = $priv['ach_priv'];
			$_SESSION['user_data']['priv']['carousel_priv'] = $priv['carousel_priv'];
			$_SESSION['user_data']['priv']['project_priv'] = $priv['project_priv'];
			$_SESSION['user_data']['priv']['gallery_priv'] = $priv['gallery_priv'];
			header('Location: index.php');
		}
		else
		{
			
			 echo ("<SCRIPT LANGUAGE= 'JavaScript'>
           window.alert('Incorrect username and password.')
             window.location = 'login.php';
           </SCRIPT>");
		}
		}
		else 
		{
			
           echo ("<SCRIPT LANGUAGE= 'JavaScript'>
           window.alert('Complete the required field.')
		   window.location = 'login.php';
           </SCRIPT>");
        }
?>

