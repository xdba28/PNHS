<?php
 include "connect.php";

    if(isset($_POST['btn'])){
        $uname=$_POST['username'];
        $pass=$_POST['password'];
        $qry=mysqli_query($mysqli,"SELECT * FROM cms_account,cms_privilege WHERE cms_privilege.cms_account_id=cms_account.cms_account_id AND cms_username='$uname' AND cms_password='$pass' ");
        $arow=mysqli_fetch_assoc($qry);
        if($arow['cms_username']==$uname && $arow['cms_password']==$pass){
            if($arow['pms_priv']=='1'){
                if($arow['cms_account_type']=="admin"){
                    session_start();
                    $_SESSION['user_data']['priv']['pms_priv']=$arow['pms_priv'];
                    $_SESSION['user_data']['acct']['emp_no']=$arow['emp_no'];
                    $_SESSION['user_data']['acct']['cms_account_ID']=$arow['cms_account_ID'];
                    $_SESSION['user_data']['acct']['cms_username']=$arow['cms_username'];
                    $_SESSION['user_data']['acct']['cms_password']=$arow['cms_password'];

    $fetch_roletype = mysqli_query($mysqli, "SELECT * FROM pims_personnel, pims_employment_records, pims_job_title
        WHERE pims_employment_records.emp_No = pims_personnel.emp_No
        AND pims_employment_records.job_title_code=pims_job_title.job_title_code
        AND pims_personnel.emp_No = '".$arow['emp_no']."'")
        or die("Error: ".mysqli_error($mysqli));
        
        $roletype = mysqli_fetch_array($fetch_roletype);

                    if($roletype['job_title_code'] == 'P3'&& $roletype['role_type'] == "Principal"){

                    echo "<script>
                        alert('Welcome!');
                        window.location='pages/index.php';
                    </script>"; 
                    header("Location: pages/index.php");


                }else{
                    echo "<script>
                        alert('Welcome!');
                        window.location='index.php';
                    </script>"; 
                    header("Location: index.php");
                    }
                }
                   
                
            }else{
                echo "<script>
                    alert('You are not allowed in this module lol!');
                    </script>"; 
                    header("Location: login.php");
            }
        }else{
            echo "<script>alert('Wrong Username and/or Password');</script>";
            header("Location: login.php");
        }
        
    }
?>