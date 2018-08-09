<?php 
    include("../db/dbcon.php");
    if(isset($_POST['jobt_val'])){
        $job=$_POST['jobt_val'];
        echo "<option>Select Personnel</option>";
        $prov_q=$mysqli->query("SELECT pims_employment_records.emp_no,concat(p_fname,' ',p_lname) as Name 
                                FROM pims_personnel,pims_employment_records,pims_job_title
                                WHERE pims_personnel.emp_no=pims_employment_records.emp_no
                                AND pims_employment_records.job_title_code=pims_job_title.job_title_code
                                AND pims_employment_records.job_title_code='$job'");
        while($prov=$prov_q->fetch_assoc()){
            echo "<option value='".$prov['emp_no']."'>".$prov['Name']."</option>";
        }
        exit();
    }
?>