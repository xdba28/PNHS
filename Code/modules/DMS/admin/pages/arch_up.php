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
            echo "<script>alert('Error! You do not have permission to access this site!'); window.location='../../login.php';</script>";
        }
        
        $emp=$_GET['e_no'];
        $stat=$_GET['stat'];
        if($stat=='1'){
            mysqli_query($mysqli,"set autocommit=0");
            mysqli_query($mysqli,"start transaction");
            mysqli_query($mysqli,"LOCK TABLES dms_document,pims_personnel READ");

            $sql=mysqli_query($mysqli,"UPDATE dms_document SET arch_stat='1' WHERE emp_no=$emp");
            if($sql){
                mysqli_query($mysqli,"COMMIT");
                echo "<script>alert('Document/s Archived!')</script>"; 
                echo "<script>window.location='../archiving.php'</script>"; 
            }else{
                mysqli_query($mysqli,"COMMIT");
                echo "<script>alert('Archiving Failed!')</script>"; 
                echo "<script>window.location='../archiving.php'</script>"; 
            }
            mysqli_query($mysqli,"UNLOCK TABLES");
            
        }else if($stat=='0'){
            mysqli_query($mysqli,"set autocommit=0");
            mysqli_query($mysqli,"start transaction");
            mysqli_query($mysqli,"LOCK TABLES dms_document,pims_personnel READ");

            $sql=mysqli_query($mysqli,"UPDATE dms_document SET arch_stat='0' WHERE emp_no=$emp");
            if($sql){
                mysqli_query($mysqli,"COMMIT");
                echo "<script>alert('Document/s Unarchived!')</script>"; 
                echo "<script>window.location='../archiving.php'</script>"; 
            }else{
                mysqli_query($mysqli,"COMMIT");
                echo "<script>alert('Archiving Failed!')</script>"; 
                echo "<script>window.location='../archiving.php'</script>"; 
            }
            mysqli_query($mysqli,"UNLOCK TABLES");
            
        }else{
            echo "<script>alert('Data Error!!')</script>"; 
            echo "<script>window.location='../archiving.php'</script>"; 
        }
        
        
    ?>