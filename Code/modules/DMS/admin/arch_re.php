<html>
<head>
<link href="../css/sweetalert.css" rel="stylesheet">    
<script src="../js/jquery.min.js"></script>    
<script src="../js/sweetalert-dev.js"></script>
<link href="../css/bootstrap.min.css">
</head>
<body>   
<!--
<script>
    swal({
  title: "Select Storage Srive",
  text: "eg.,D://:",
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
  animation: "slide-from-top",
  inputPlaceholder: "Write something"
},
function(inputValue){
  if (inputValue === false) return false;

  if (inputValue === "") {
    swal.showInputError("You need to write something!");
    return false
  }

  swal("Nice!", "You wrote: " + inputValue, "success");
});
</script>    
-->
<?php 
    include("../db/db.php");
    $pers=mysqli_query($mysqli,"SELECT pims_employment_records.emp_no,concat(p_lname,', ',p_fname,' ',substring(ifnull(p_mname,''),'1','1')) as Name,emp_status,work_stat,role_type,faculty_type,job_title_name 
    FROM pims_personnel,pims_employment_records,pims_job_title
    WHERE pims_personnel.emp_no=pims_employment_records.emp_no
    AND pims_job_title.job_title_code=pims_employment_records.job_title_code
    AND work_stat='RETIRED'
    AND pims_personnel.emp_no NOT IN (SELECT dms_archive.emp_no FROM dms_archive,pims_personnel WHERE pims_personnel.emp_no=dms_archive.emp_no)");
    $ct=$pers->num_rows;
    $syqry=$mysqli->query("SELECT year FROM css_school_yr WHERE status='active'");
    $syrow=$syqry->fetch_assoc();
    $synow=$syrow['year'];
    $t_disk=$_GET['disk'];
    $disk= str_split($t_disk);
    
    if(file_exists("$disk[0]://")){
        while($row=$pers->fetch_assoc()){
            $empp=$row['emp_no'];
            $emp_name_pro=$mysqli->query("SELECT concat(p_fname,' ',p_lname) as Name FROM pims_personnel WHERE emp_no=$empp");
            $emp_name=mysqli_fetch_assoc($emp_name_pro);
            $nname=$emp_name['Name'];
            if(!file_exists($disk[0].'://Archive_'.$synow)){
                mkdir($disk[0].'://Archive_'.$synow, 0777, true);
                if(!file_exists($disk[0].'://Archive_'.$synow.'/'.$nname)){
                    mkdir($disk[0].'://Archive_'.$synow.'/'.$nname, 0777, true);
                    echo "<script>window.open('fpdf/archive_sr.php?emp=".$empp."&disk=".$disk[0]."','_blank');</script>";
                }else{
                    echo "<script>window.open('fpdf/archive_sr.php?emp=".$empp."&disk=".$disk[0]."','_blank');</script>";
                }

            }else{
                if(!file_exists($disk[0].'://Archive_'.$synow.'/'.$nname)){
                    mkdir($disk[0].'://Archive_'.$synow.'/'.$nname, 0777, true);
                    echo "<script>window.open('fpdf/archive_sr.php?emp=".$empp."&disk=".$disk[0]."','_blank');</script>";
                }else{
                    echo "<script>window.open('fpdf/archive_sr.php?emp=".$empp."&disk=".$disk[0]."','_blank');</script>";
                }
            }
        }
        echo "<script>alert('Documents have been archived!');window.location.href='archiving.php';</script>";
    }else{
        echo "<script>swal({
        title:'Storage disk does not exist in the server!',
        text:'Enter storage disk again?',
        type:'warning',
        showCancelButton:true,},
        function(decide){
            if(decide===true){
                window.location.href='arch_disk.php';
            }else{
                window.location.href='archiving.php';
            }
        
        });</script>";
    }
?>
</body>    
</html>    