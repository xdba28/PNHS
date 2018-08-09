<?php 
    include("../db/dbcon.php");
    if(isset($_POST['emp_val'])){
        $per=$_POST['emp_val'];
        $prov_q=$mysqli->query("SELECT faculty_type from pims_employment_records,pims_personnel WHERE pims_employment_records.emp_no=pims_personnel.emp_no AND pims_employment_records.emp_no=$per");
        while($prov=$prov_q->fetch_assoc()){
            echo "<option value='".$prov['faculty_type']."'>".$prov['faculty_type']."</option>";
        }
        exit();
    }

    if(isset($_POST['emp_val1'])){
        $per=$_POST['emp_val1'];
        $prov_q=$mysqli->query("SELECT pims_employment_records.job_title_code from pims_employment_records,pims_personnel,pims_job_title WHERE pims_employment_records.emp_no=pims_personnel.emp_no AND pims_employment_records.job_title_code=pims_job_title.job_title_code AND pims_employment_records.emp_no=$per");
        while($prov=$prov_q->fetch_assoc()){
            echo "<option value='".$prov['job_title_code']."'>".$prov['job_title_code']."</option>";
        }
        exit();
    }

?>