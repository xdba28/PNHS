<?php 
    session_start();       
    include("../db/dbcon.php");
    if(isset($_POST['doc_val'])){
            $doc=$_POST['doc_val'];
            if($doc=="1" || $doc=="2"){
                $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
                $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
                $recrow=mysqli_fetch_assoc($rec);
                $recid=$recrow['rec_no'];
                echo "<option>Select Recepient</option>";
//              $PIA=$mysqli->query("SELECT job_title_code FROM pi WHERE admin_type='Personnel Information Document Admin'");
//                $cons2=$PIA->fetch_assoc();
//                $ft2=$cons2['faculty_type'];
//                $jt2=$cons2['job_title_code'];
                $rec=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname) as Name,job_title_name,dms_receiver.rec_no 
                FROM dms_receiver,cms_account,pims_personnel,pims_employment_records,pims_job_title 
                WHERE pims_personnel.emp_no=cms_account.emp_no
                AND cms_account.cms_account_ID=dms_receiver.cms_account_id
                And pims_employment_records.emp_No=pims_personnel.emp_No
                AND pims_employment_records.job_title_code=pims_job_title.job_title_code
                AND pims_employment_records.job_title_code LIKE '%HRM%'
                AND dms_receiver.rec_no!=$recid");
                while($recrow=mysqli_fetch_assoc($rec)){
                    echo "<option value='".$recrow['rec_no']."'>".$recrow['Name']." - ".$recrow['job_title_name']."</option>";
                }
            }else{
                $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
                $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
                $recrow=mysqli_fetch_assoc($rec);
                $recid=$recrow['rec_no'];
                echo "<option>Select Recepient</option>";
//                $SRA=$mysqli->query("SELECT faculty_type,job_title_code FROM cms_admin_cons WHERE admin_type='School Related Document Admin'");
//                $cons1=$SRA->fetch_assoc();
//                $ft1=$cons1['faculty_type'];
//                $jt1=$cons1['job_title_code'];  
                $rec=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname) as Name,job_title_name,dms_receiver.rec_no 
                FROM dms_receiver,cms_account,pims_personnel,pims_employment_records,pims_job_title
                WHERE pims_personnel.emp_no=cms_account.emp_no
                AND cms_account.cms_account_ID=dms_receiver.cms_account_id
                And pims_employment_records.emp_No=pims_personnel.emp_No
                AND pims_employment_records.job_title_code=pims_job_title.job_title_code
                AND pims_employment_records.job_title_code LIKE '%ICTD%'
                AND dms_receiver.rec_no!=$recid");
                while($recrow=mysqli_fetch_assoc($rec)){
                    echo "<option value='".$recrow['rec_no']."'>".$recrow['Name']." - ".$recrow['job_title_name']."</option>";
                }
            }
            exit();
    }
?>