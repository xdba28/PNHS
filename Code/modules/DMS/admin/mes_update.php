<?php
    date_default_timezone_set('Asia/Manila');
    $date=date("Y-m-d H:i:s",time());
    session_start();
    //$recid=$_GET['rid'];
    include("../db/dbcon.php");
    $mesid=$_GET['mid'];
    $read=$_GET['read'];
    $del=$_GET['del'];
    if($read==1&&$del==0){
        $mes=mysqli_query($mysqli,"SELECT mes_status FROM dms_message WHERE
        dms_message.mes_id=$mesid");
        $mesrow=mysqli_fetch_assoc($mes);
        if($mesrow['mes_status']=='1'){
            echo "<script>window.location='message.php?mid=".$mesid."'</script>";  
        }else{
            mysqli_query($mysqli,"set autocommit=0");
            mysqli_query($mysqli,"start transaction");
            mysqli_query($mysqli,"LOCK TABLES dms_message,dms_document WRITE");
            $mesup=mysqli_query($mysqli,"UPDATE dms_message SET mes_status='1', received='$date' WHERE mes_id=$mesid ");
            if($mesup){
                mysqli_query($mysqli,"COMMIT");
                echo "<script>window.location='message.php?mid=".$mesid."'</script>";  
            }else{
                mysqli_query($mysqli,"ROLLBACK");
                
                echo "<script>window.location='../error.php'</script>";
            }
            mysqli_query($mysqli,"UNLOCK TABLES");
              
        }
    }else if($read==0&&$del==1){
        mysqli_query($mysqli,"set autocommit=0");
        mysqli_query($mysqli,"start transaction");
        mysqli_query($mysqli,"LOCK TABLE dms_message WRITE");
        $mesup=mysqli_query($mysqli,"UPDATE dms_message SET mes_delete='1' WHERE mes_id=$mesid ");
            if($mesup){
                mysqli_query($mysqli,"COMMIT");
                echo "<script>alert('Message Deleted')</script>";
                echo "<script>window.location='inbox.php'</script>";  
            }else{
                mysqli_query($mysqli,"ROLLBACK");
                echo "<script>alert('An Error Occured! Message was not deleted!')</script>";
                echo "<script>window.location='inbox.php'</script>";
            }
            mysqli_query($mysqli,"UNLOCK TABLE");
        
    }else{
        echo "<script>window.location='error.php'</script>"; 
        
    }
    
    
?>