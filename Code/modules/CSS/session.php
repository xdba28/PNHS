<?php
    session_start();
    if($_SESSION['user_data']['priv']['css_priv']=="1" && isset($_SESSION['user_data']['acct']['emp_no']) && isset($_SESSION['user_data']['acct']['cms_account_ID'])){
        $emp=$_SESSION['user_data']['acct']['emp_no'];
        $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
    }elseif(isset($_SESSION['user_data']['acct']['lrn']) && isset($_SESSION['user_data']['acct']['cms_account_ID'])){
        if ($_SESSION['user_data']['priv']['css_priv']=="1") {
			$emp=$_SESSION['user_data']['acct']['lrn'];
			$aid=$_SESSION['user_data']['acct']['cms_account_ID'];
		}
    }elseif(isset($_SESSION['user_data']['acct']['emp_no']) && isset($_SESSION['user_data']['acct']['cms_account_ID'])){
        if ($_SESSION['user_data']['priv']['css_priv']=="0") {
			$emp=$_SESSION['user_data']['acct']['emp_no'];
			$aid=$_SESSION['user_data']['acct']['cms_account_ID'];
		}
    }
	else{
        echo "<script>alert('Error! You do not have permission to access this site!'); window.location='../../../index.php';</script>";
    }
        
    ?>