<html>

<head>
    <?php
        include("../db/dbcon.php");
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="3;url=form.php" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>Faculty Records Management System</title>
</head>
<body>
    <?php
    $id=$_GET['id'];
    $type=$_GET['type'];
    if($type=='1'){
        
        $show=$mysqli->query("SELECT sr_file,sr_name FROM dms_document,dms_sr where dms_document.doc_id=dms_sr.doc_id AND dms_sr.doc_id=$id");
        $pdf=$show->fetch_assoc();
        $file=$pdf['sr_file'];
        $name=$pdf['sr_name'];
        mysqli_query($mysqli,"set autocommit=0");
        mysqli_query($mysqli,"start transaction");
        mysqli_query($mysqli,"LOCK TABLE dms_document WRITE");
        $update=mysqli_query($mysqli,"UPDATE dms_document SET doc_lock='1' WHERE doc_id=$id");
        if($update){

            mysqli_query($mysqli,"COMMIT");
            header("Content-type: application/pdf");
            header("Content-Disposition: attachment;filename=\"$name\"");
            readfile($file);
            
        }else{
            mysqli_query($mysqli,"ROLLBACK");
            echo "<script>alert('File Error!'); window.location='form.php?dc=sr'; </script>";
        }
        mysqli_query($mysqli,"UNLOCK TABLE");
        
    }else if($type=='2'){
        $show=$mysqli->query("SELECT pds_file,pds_name FROM dms_document,dms_pds where dms_document.doc_id=dms_pds.doc_id AND dms_pds.doc_id=$id");
        $pdf=$show->fetch_assoc();
        $file=$pdf['pds_file'];
        $name=$pdf['pds_name'];
        mysqli_query($mysqli,"set autocommit=0");
        mysqli_query($mysqli,"start transaction");
        mysqli_query($mysqli,"LOCK TABLE dms_document WRITE");
        $update=mysqli_query($mysqli,"UPDATE dms_document SET doc_lock='1' WHERE doc_id=$id");
        if($update){
            
            mysqli_query($mysqli,"COMMIT");
            header("Content-type: application/pdf");
            header("Content-Disposition: attachment;filename=\"$name\"");
            readfile($file);
        }else{
            mysqli_query($mysqli,"ROLLBACK");
            echo "<script>alert('File Error!'); window.location='form.php?dc=pds'; </script>";
        }
        mysqli_query($mysqli,"UNLOCK TABLE");
    }else if($type=='3'){
        $show=$mysqli->query("SELECT mg_file,mg_name FROM dms_document,dms_master_grade where dms_document.doc_id=dms_master_grade.doc_id AND dms_master_grade.doc_id=$id");
        $pdf=$show->fetch_assoc();
        $file=$pdf['mg_file'];
        $name=$pdf['mg_name'];
        mysqli_query($mysqli,"set autocommit=0");
        mysqli_query($mysqli,"start transaction");
        mysqli_query($mysqli,"LOCK TABLE dms_document WRITE");
        $update=mysqli_query($mysqli,"UPDATE dms_document SET doc_lock='1' WHERE doc_id=$id");
        if($update){
            
            mysqli_query($mysqli,"COMMIT");
            echo "<script>alert('Downloading...'); window.location='form.php?dc=mg'; </script>";
            header("Content-type: application/pdf");
            header("Content-Disposition: attachment;filename=\"$name\"");
            readfile($file);
        }else{
            mysqli_query($mysqli,"ROLLBACK");
            echo "<script>alert('File Error!'); window.location='form.php?dc=mg'; </script>";
        }
        mysqli_query($mysqli,"UNLOCK TABLE");
    }else if($type=='4'){
        $show=$mysqli->query("SELECT qg_file,qg_name FROM dms_document,dms_quarter_grade where dms_document.doc_id=dms_quarter_grade.doc_id AND dms_quarter_grade.doc_id=$id");
        $pdf=$show->fetch_assoc();
        $file=$pdf['qg_file'];
        $name=$pdf['qg_name'];
        mysqli_query($mysqli,"set autocommit=0");
        mysqli_query($mysqli,"start transaction");
        mysqli_query($mysqli,"LOCK TABLE dms_document WRITE");
        $update=mysqli_query($mysqli,"UPDATE dms_document SET doc_lock='1' WHERE doc_id=$id");
        if($update){
            
            mysqli_query($mysqli,"COMMIT");
            echo "<script>alert('Downloading...'); window.location='form.php?dc=qg'; </script>";
            header("Content-type: application/pdf");
            header("Content-Disposition: attachment;filename=\"$name\"");
            readfile($file);
        }else{
            mysqli_query($mysqli,"ROLLBACK");
            echo "<script>alert('File Error!'); window.location='form.php?dc=qg'; </script>";
        }
        mysqli_query($mysqli,"UNLOCK TABLE");
    }else if($type=='5'){
        $show=$mysqli->query("SELECT sf1_file,sf1_name FROM dms_document,dms_sf1 where dms_document.doc_id=dms_sf1.doc_id AND dms_sf1.doc_id=$id");
        $pdf=$show->fetch_assoc();
        $file=$pdf['sf1_file'];
        $name=$pdf['sf1_name'];
        mysqli_query($mysqli,"set autocommit=0");
        mysqli_query($mysqli,"start transaction");
        mysqli_query($mysqli,"LOCK TABLE dms_document WRITE");
        $update=mysqli_query($mysqli,"UPDATE dms_document SET doc_lock='1' WHERE doc_id=$id");
        if($update){
            
            mysqli_query($mysqli,"COMMIT");
            echo "<script>alert('Downloading...'); window.location='form.php?dc=sf1'; </script>";
            header("Content-type: application/pdf");
            header("Content-Disposition: attachment;filename=\"$name\"");
            readfile($file);
        }else{
            mysqli_query($mysqli,"ROLLBACK");
            echo "<script>alert('File Error!'); window.location='form.php?dc=sf1'; </script>";
        }
        mysqli_query($mysqli,"UNLOCK TABLE");
    }else if($type=='6'){
        $show=$mysqli->query("SELECT sf5_file,sf5_name FROM dms_document,dms_sf5 where dms_document.doc_id=dms_sf5.doc_id AND dms_sf5.doc_id=$id");
        $pdf=$show->fetch_assoc();
        $file=$pdf['sf5_file'];
        $name=$pdf['sf5_name'];
        mysqli_query($mysqli,"set autocommit=0");
        mysqli_query($mysqli,"start transaction");
        mysqli_query($mysqli,"LOCK TABLE dms_document WRITE");
        $update=mysqli_query($mysqli,"UPDATE dms_document SET doc_lock='1' WHERE doc_id=$id");
        if($update){
            
            mysqli_query($mysqli,"COMMIT");
            echo "<script>alert('Downloading...'); window.location='form.php?dc=sf5'; </script>";
            header("Content-type: application/pdf");
            header("Content-Disposition: attachment;filename=\"$name\"");
            readfile($file);
        }else{
            mysqli_query($mysqli,"ROLLBACK");
            echo "<script>alert('File Error!'); window.location='form.php?dc=sf5'; </script>";
        }
        mysqli_query($mysqli,"UNLOCK TABLE");
    }else if($type=='7'){
        $show=$mysqli->query("SELECT list_file,list_name FROM dms_document,dms_list where dms_document.doc_id=dms_list.doc_id AND dms_list.doc_id=$id");
        $pdf=$show->fetch_assoc();
        $file=$pdf['list_file'];
        $name=$pdf['list_name'];
        mysqli_query($mysqli,"set autocommit=0");
        mysqli_query($mysqli,"start transaction");
        mysqli_query($mysqli,"LOCK TABLE dms_document WRITE");
        $update=mysqli_query($mysqli,"UPDATE dms_document SET doc_lock='1' WHERE doc_id=$id");
        if($update){
            
            mysqli_query($mysqli,"COMMIT");
            echo "<script>alert('Downloading...'); window.location='form.php?dc=fi'; </script>";
            header("Content-type: application/pdf");
            header("Content-Disposition: attachment;filename=\"$name\"");
            readfile($file);
        }else{
            mysqli_query($mysqli,"ROLLBACK");
            echo "<script>alert('File Error!'); window.location='form.php?dc=fi'; </script>";
        }
        mysqli_query($mysqli,"UNLOCK TABLE");
    }
    
    ?>
</body>

</html>