<?php
    if(isset($_SESSION['user_data']['acct']['emp_no'])){
        if(($_SESSION['user_data']['priv']['sis_priv']=="1" || $_SESSION['user_data']['priv']['sis_user']=="1") && isset($_SESSION['user_data']['acct']['cms_account_ID'])){
            $emp=$_SESSION['user_data']['acct']['emp_no'];
            $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
        }else{
            echo "<script>alert('Error! You do not have permission to access this site!'); window.location='../../../index.php';</script>";
        }
    }else if(isset($_SESSION['user_data']['acct']['lrn'])){
        if($_SESSION['user_data']['priv']['sis_priv']=="1" && isset($_SESSION['user_data']['acct']['cms_account_ID'])){
            $lrn=$_SESSION['user_data']['acct']['lrn'];
            $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
        }else{
            echo "<script>alert('Error! You do not have permission to access this site!'); window.location='../../../index.php';</script>";
        }
    }else{
        echo "<script>alert('Error! You do not have permission to access this site!'); window.location='../../../index.php';</script>";
    }
    ?>