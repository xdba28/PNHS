<?php
    include("../../db/dbcon.php");
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
    
    $eid=$_GET['emp'];
    $doc=$_GET['d'];
    $yr=$_GET['yr'];
    mysqli_query($mysqli,"set autocommit=0");
    mysqli_query($mysqli,"start transaction");
    mysqli_query($mysqli,"LOCK TABLE dms_document,pims_personnel READ");
        if($doc=="sr"){
            $ins=$mysqli->query("INSERT INTO dms_document(doc_type,emp_no,doc_year,doc) VALUES('Service Record',$eid,'$yr')");
            if($ins){
                mysqli_query($mysqli,"COMMIT");
                echo "<script>alert('New Folder Added!');</script>";
                echo "<script>window.location='../personnel.php?emp=".$eid."&yr=$yr';</script>";
            }else{
                mysqli_query($mysqli,"ROLLBACK");
                echo "<script>alert('ID Error!');</script>";
                echo "<script>window.location='../personnel.php?emp=".$eid."';</script>";
            }
        }else if($doc=="pd"){
            $ins=$mysqli->query("INSERT INTO dms_document(doc_type,emp_no,doc_year) VALUES('Personal Data Sheet',$eid,'$yr')");
            if($ins){
                mysqli_query($mysqli,"COMMIT");
                echo "<script>alert('New Folder Added!');</script>";
                echo "<script>window.location='../personnel.php?emp=".$eid."';</script>";
            }else{
                mysqli_query($mysqli,"ROLLBACK");
                echo "<script>alert('ID Error!');</script>";
                echo "<script>window.location='../personnel.php?emp=".$eid."';</script>";
            }
        }else if($doc=="mg"){
            $ins=$mysqli->query("INSERT INTO dms_document(doc_type,emp_no,doc_year) VALUES('Master Grading Sheet',$eid,'$yr')");
            if($ins){
                mysqli_query($mysqli,"COMMIT");
                echo "<script>alert('New Folder Added!');</script>";
                echo "<script>window.location='../personnel.php?emp=".$eid."';</script>";
            }else{
                mysqli_query($mysqli,"ROLLBACK");
                echo "<script>alert('ID Error!');</script>";
                echo "<script>window.location='../personnel.php?emp=".$eid."';</script>";
            }
        }else if($doc=="qg"){
            $ins=$mysqli->query("INSERT INTO dms_document(doc_type,emp_no,doc_year) VALUES('Quarterly Grades',$eid,'$yr')");
            if($ins){
                mysqli_query($mysqli,"COMMIT");
                echo "<script>alert('New Folder Added!');</script>";
                echo "<script>window.location='../personnel.php?emp=".$eid."';</script>";
            }else{
                mysqli_query($mysqli,"ROLLBACK");
                echo "<script>alert('ID Error!');</script>";
                echo "<script>window.location='../personnel.php?emp=".$eid."';</script>";
            }
        }else if($doc=="sf1"){
            $ins=$mysqli->query("INSERT INTO dms_document(doc_type,emp_no,doc_year) VALUES('School File 1',$eid,'$yr')");
            if($ins){
                mysqli_query($mysqli,"COMMIT");
                echo "<script>alert('New Folder Added!');</script>";
                echo "<script>window.location='../personnel.php?emp=".$eid."';</script>";
            }else{
                mysqli_query($mysqli,"ROLLBACK");
                echo "<script>alert('ID Error!');</script>";
                echo "<script>window.location='../personnel.php?emp=".$eid."';</script>";
            }
        }else if($doc=="sf5"){
            $ins=$mysqli->query("INSERT INTO dms_document(doc_type,emp_no,doc_year) VALUES('School File 5',$eid,'$yr')");
            if($ins){
                mysqli_query($mysqli,"COMMIT");
                echo "<script>alert('New Folder Added!');</script>";
                echo "<script>window.location='../personnel.php?emp=".$eid."';</script>";
            }else{
                mysqli_query($mysqli,"ROLLBACK");
                echo "<script>alert('ID Error!');</script>";
                echo "<script>window.location='../personnel.php?emp=".$eid."';</script>";
            }
        }
    mysqli_query($mysqli,"UNLOCK TABLE");

?>