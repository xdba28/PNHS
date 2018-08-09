<?php
include("../db/dbcon.php");
    date_default_timezone_set('Asia/Manila');
    $date=date("Y-m-d");
    $yesterday=date("Y-m-d",time()-86400);
    session_start();
    if(isset($_SESSION['priv_data']['acct']['frms_priv']) && isset($_SESSION['acct_data']['acct']['emp_no']) && isset($_SESSION['user_data']['acct']['cms_account_ID']) && isset($_SESSION['user_data']['acct']['cms_password']) && isset($_SESSION['user_data']['acct']['cms_username']) ){
    $emp=$_SESSION['acct_data']['acct']['emp_no'];
    $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
    $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
    $recrow=mysqli_fetch_assoc($rec);
    $recid=$recrow['rec_no'];
        }else{
            echo "<script>alert('Error! You do not have permission to access this site!'); window.location='../login.php';</script>";
        }
    $doc=$_GET['doc'];
    $yr=$_GET['yr'];
    $lk=$_GET['lock'];
    $eid=$_GET['emp'];
    if($lk=='0'){
        $mysqli->query("set autocommit=0");
        $mysqli->query("start transaction");
        $mysqli->query("LOCK TABLE dms_document,pims_personnel READ");
        $up=$mysqli->query("UPDATE dms_document SET doc_lock='$lk' WHERE dms_document.doc_id=$doc");
        if($up){
            $mysqli->query("COMMIT");
            echo "<script>window.location='personnel.php?emp=".$eid."&yr=$yr';</script>";
        }else{
            $mysqli->query("ROLLBACK");
        }
        $mysqli->query("UNLOCK TABLE");
    }else{
        $mysqli->query("set autocommit=0");
        $mysqli->query("start transaction");
        $mysqli->query("LOCK TABLE dms_document,pims_personnel READ");
        $up=$mysqli->query("UPDATE dms_document SET doc_lock='$lk' WHERE dms_document.doc_id=$doc");
        if($up){
            $mysqli->query("COMMIT");
            echo "<script>window.location='personnel.php?emp=".$eid."&yr=$yr';</script>";
        }else{
            $mysqli->query("ROLLBACK");
        }
        $mysqli->query("UNLOCK TABLE");
    }
    
?>