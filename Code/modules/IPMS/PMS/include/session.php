<?php session_start();
    if($_SESSION['user_data']['priv']['pms_priv']=="1" || $_SESSION['user_data']['priv']['pms2_priv']=="1" || $_SESSION['user_data']['priv']['pms_user']=="1" && isset($_SESSION['user_data']['acct']['emp_no']) && isset($_SESSION['user_data']['acct']['cms_account_ID'])){
        $emp=$_SESSION['user_data']['acct']['emp_no'];
        $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
        $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
        $recrow=mysqli_fetch_assoc($rec);
        $recid=$recrow['rec_no'];
        $n=mysqli_query($mysqli, "SELECT concat(p_fname,' ',p_lname) as Name  FROM pims_personnel WHERE pims_personnel.emp_no=$emp");
    $na = mysqli_fetch_assoc($n);
   // $name = $na['p_fname'];
$o=mysqli_query($mysqli, "SELECT dept_name
FROM pims_personnel, pims_employment_records, pims_department
WHERE pims_personnel.emp_No = pims_employment_records.emp_No
AND pims_employment_records.dept_id = pims_department.dept_id
AND pims_personnel.emp_no = $emp");
$no = mysqli_fetch_assoc($o);
$name = $na['Name'];
$dept = $no['dept_name'];
        }
else{
        echo "<script>alert('Error! You do not have permission to access this site!'); window.location='../../../../admin_idx.php';</script>";
    }
    ?>