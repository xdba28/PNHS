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
            echo "<script>alert('Error! You do not have permission to access this site!'); window.location='login.php';</script>";
        }
   
$id=$_GET['id'];
                                    $emp=$_GET['emp'];
                                    //$type="Service Record";
                                    //echo $_POST['insert'.$x.''];
                                    
                                    mysqli_query($mysqli,"set autocommit=0");
                                    mysqli_query($mysqli,"start transaction");
                                    mysqli_query($mysqli,"LOCK TABLES dms_document,pims_service_records,pims_personnel READ");
                                    $ins=mysqli_query($mysqli,"INSERT INTO dms_document (doc_type,doc_lock, emp_no, grade_id, pds_id, sf_id, servRec_ID) VALUES('Service Record','0',$emp,null,null,null,$id)");

                                    if($ins){
                                        mysqli_query($mysqli,"COMMIT");
                                        echo "<script> alert('Data Inserted'); </script>";
                                        echo "<script> window.location='../form.php?dc=sr' </script>";
                                    }else{
                                        mysqli_query($mysqli,"ROLLBACK");
                                        echo "<script> alert('Data Error!'); </script>";
                                        echo "<script> window.location='../form.php?dc=sr' </script>";
                                    }
                                   mysqli_query($mysqli,"UNLOCK TABLES");
?>