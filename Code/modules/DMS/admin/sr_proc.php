<?php
    include("../db/dbcon.php");
    if(isset($_POST['sr'])){
        $emp=$_POST['emp_rec'];
        $start=$_POST['start'];
        $end=$_POST['end'];
        $fund=$_POST['fund'];
        $rem=$_POST['remark'];
        $stat=$_POST['stat'];
        $sal=$_POST['sal'];
        $des=$_POST['des'];
        $office=$_POST['office'];
        $ct=count($start);
        $check=0;
        $error=0;
        $date_err=0;
        mysqli_query($mysqli,"set autocommit=0");
        mysqli_query($mysqli,"start transaction");
        mysqli_query($mysqli,"LOCK TABLES pims_service_records WRITE");
        for($n=0;$n<$ct;$n++){
            $f_start=strtotime($start[$n]);
            $f_end=strtotime($end[$n]);
            if($f_start<$f_end){
                $ins=$mysqli->query("INSERT INTO pims_service_records(inclusive_date_start,inclusive_date_end,designation,salary,place_of_assignment,srce_of_fund,remarks,sr_status,emp_rec_id)
                VALUES('$start[$n]','$end[$n]','$des[$n]','$sal[$n]','$office[$n]','$fund[$n]','$rem[$n]','$stat[$n]','$emp')");
                if($ins){
                    $check+=1;
                }else{
                    $error+=1;
                }
            }else{
                $error+=1;
                $date_err+=1;
            }
            
        }
        if($error>=1){
            if($date_err>=1){
                mysqli_query($mysqli,"ROLLBACK");
                echo "<script>alert('ERROR!Please Check the date inputs');</script>"; 
                echo "<script>window.location='sr_input.php?emp=$emp';</script>";
            }else{
                mysqli_query($mysqli,"ROLLBACK");
                echo "<script>alert('ERROR!');</script>"; 
                echo "<script>window.location='sr_input.php?emp=$emp';</script>";
            }
            
        }else{
            mysqli_query($mysqli,"COMMIT");
            echo "<script>alert('SUCCESS!');</script>";
            echo "<script>window.location='sr_view.php?emp=$emp';</script>";
            //echo "<script>window.location='sr_input.php?emp=$emp';</script>";
        }
        mysqli_query($mysqli,"UNLOCK TABLES");

    }
?>