<script src="../js/jquery.min.js"></script>
<?php 
    include("../db/dbcon.php");
    $mid=$_GET['mes'];
    $emp=$_GET['emp'];
    $dc=$_GET['dc'];
    switch($dc){
        case '1':
            $link="service_record_pdf.php?emp=$emp";
            break;
        case '2':
            $link="PDS_pdf.php?emp=$emp&dc=2";
            break;
        case '3':
            $docmg=$mysqli->query("SELECT css_section.section_id 
            FROM pims_personnel,pims_employment_records,css_section,css_school_yr
            WHERE css_section.sy_id=css_school_yr.sy_id
            AND pims_personnel.emp_no=pims_employment_records.emp_no
            AND pims_employment_records.emp_rec_id=css_section.emp_rec_id
            AND pims_employment_records.emp_no=$emp");
            $mg=mysqli_fetch_assoc($docmg);
            $sec=$mg['section_id'];
            $link="master_pdf.php?emp=$emp&sec=$sec&dc=3";
            break;
        case '4':
            $docqg=$mysqli->query("SELECT css_schedule.sched_id FROM pims_personnel,pims_employment_records,css_section,css_school_yr,css_subject,css_schedule
            WHERE css_section.sy_id=css_school_yr.sy_id
            AND css_schedule.section_id=css_section.section_id
            AND css_schedule.subject_id=css_subject.subject_id
            AND css_schedule.sy_id=css_school_yr.sy_id
            AND pims_employment_records.emp_rec_id=css_schedule.emp_rec_id
            AND pims_personnel.emp_no=pims_employment_records.emp_no
            AND pims_employment_records.emp_no=$emp");
            $sec=$mg['sched_id'];
            $link="quarterly.php?emp=$emp&sec=$sec&dc=4";
            break;
        case '5':
            $docsf1=$mysqli->query("SELECT css_section.section_id 
            FROM pims_personnel,pims_employment_records,css_section,css_school_yr
            WHERE css_section.sy_id=css_school_yr.sy_id
            AND pims_personnel.emp_no=pims_employment_records.emp_no
            AND pims_employment_records.emp_rec_id=css_section.emp_rec_id
            AND pims_employment_records.emp_no=$emp");
            $sf1=mysqli_fetch_assoc($docsf1);
            $sec=$sf1['section_id'];
            $link="sf1.php?emp=$emp&sec=$sec&dc=5";
            break;
        case '6':
            $docsf5=$mysqli->query("SELECT css_section.section_id 
            FROM pims_personnel,pims_employment_records,css_section,css_school_yr
            WHERE css_section.sy_id=css_school_yr.sy_id
            AND pims_personnel.emp_no=pims_employment_records.emp_no
            AND pims_employment_records.emp_rec_id=css_section.emp_rec_id
            AND pims_employment_records.emp_no=$emp");
            $sf5=mysqli_fetch_assoc($docsf5);
            $sec=$sf5['section_id'];
            $link="sf5.php?emp=$emp&sec=$sec&dc=6";
            break;
        case '7':
            $doclist=$mysqli->query("SELECT pims_employment_records.dept_id 
            FROM pims_personnel,pims_department,pims_employment_records
            WHERE pims_employment_records.dept_ID=pims_department.dept_ID
            AND pims_personnel.emp_No=pims_employment_records.emp_No
            AND pims_employment_records.emp_no=$emp");
            $list=mysqli_fetch_assoc($doclist);
            $deep=$list['dept_id'];
            $link="list.php?dep=$deep";
            break;
    }
    $up=$mysqli->query("UPDATE dms_message SET doc_lock='1' WHERE mes_id=$mid");
    if($up){
        echo "<script>window.open('fpdf/$link', '_blank'); window.location.href='message.php?mid=$mid';</script>";
    }else{
        echo "<script>window.location.href='message.php?mid=$mid';</script>";
    }
?>