<?php
 include "connect.php";
 session_start();
$uname=$_SESSION['user_data']['acct']['cms_username'];
$qry=mysqli_query($mysqli,"SELECT * FROM cms_account,cms_privilege WHERE cms_privilege.cms_account_id=cms_account.cms_account_id AND cms_username='$uname'  ");
        $arow=mysqli_fetch_assoc($qry);

 


$fetch_roletype = mysqli_query($mysqli, "SELECT * FROM pims_personnel, pims_employment_records, pims_job_title
        WHERE pims_employment_records.emp_No = pims_personnel.emp_No
        AND pims_employment_records.job_title_code=pims_job_title.job_title_code
        AND pims_personnel.emp_No = '".$arow['emp_no']."'")
        or die("Error: ".mysqli_error($mysqli));
        
        $roletype = mysqli_fetch_array($fetch_roletype);

        if(stristr($roletype['role_type'], "Principal") ){
            $emp=$_SESSION['user_data']['acct']['emp_no'];
                    echo "<script>
                        alert('Welcome!');
                        window.location='admin1/admin1_idx.php';
                    </script>"; 


                }else{
                    echo "<script>
                        alert('Welcome!');
                        window.location='admin/admin_idx.php';
                    </script>";
                }
 ?>