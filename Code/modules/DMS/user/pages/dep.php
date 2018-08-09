<?php 
$p=mysqli_query($mysqli,"SELECT dept_id FROM pims_personnel,pims_employment_records WHERE pims_employment_records.emp_no=pims_personnel.emp_no AND pims_employment_records.emp_no=$emp");
$prow=mysqli_fetch_assoc($p);
$yr=$_GET['yr'];
$sql=mysqli_query($mysqli,'SELECT dms_list.doc_id,list_file,doc_lock,dms_document.type_id 
FROM dms_doc_type,dms_document,dms_list,pims_department,css_school_yr 
WHERE dms_document.doc_id=dms_list.doc_id 
AND css_school_yr.sy_id=dms_list.sy_id 
AND dms_list.dept_id=pims_department.dept_id
AND dms_doc_type.type_id=dms_document.type_id 
AND dms_list.dept_id='.$prow['dept_id'].' AND dms_list.sy_id='.$yr.'');
$secrow=mysqli_fetch_assoc($sql);
if(empty($secrow)){ ?>
    <div class="row">
        <div class="col-md-2">
            <br>
        </div>
        <div class="col-md-8">
            <img src="../docs/img/DOC1.png" class="img-responsive">
        </div>
        
        <div class="col-md-1">
            <br>
        </div>
    </div>
<?php
}else{
    
    $file=$secrow['list_file'];
    $lock=$secrow['doc_lock'];
    
    if($lock=="1"){ ?>
    <div class="row">
        <div class="col-md-2">
            <br>
        </div>
        <div class="col-md-8">
            <a href="add.php"><img src="../docs/img/LOCKED1.png" class="img-responsive"></a>
        </div>
        
        <div class="col-md-1">
            <br>
        </div>
    </div>    
<?php
    }else{ ?>
        <div class="embed-responsive embed-responsive-16by9">
                <iframe src="<?php echo $file; ?>#toolbar=0" type="application/pdf" class="embed-responsive-item">
                </iframe>
            </div>
        <div class='row'>
            <div class="col-md-2">
                <br>
            </div>
            <div class="col-md-8">
                <div role="group" class="btn-group btn-group-justified">
                    <div class="btn-group" role="group">
                        <a id="DL" target="_new" href="download.php?id=<?php echo $secrow['doc_id']; ?>&type=7" type="button" class="btn btn-success no-print">Download</a>
                    </div>
                </div>
                <script type='text/javascript'>
                $('#DL').click(function() {
                    window.location.href = $(this).attr('href');
                    setTimeout(location.reload(), 400);
                });
                </script>
            </div>
            <div class="col-md-2">
                <br>
            </div>
        </div>

 <?php
    }

}


?>
