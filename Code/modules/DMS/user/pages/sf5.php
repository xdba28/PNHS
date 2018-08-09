<?php 
$sec=$_GET['sec'];
$sql=mysqli_query($mysqli,'SELECT sf5_file,doc_lock,dms_document.type_id,dms_document.doc_id FROM dms_doc_type,dms_document,dms_sf5,css_section,pims_personnel 
WHERE dms_document.doc_id=dms_sf5.doc_id AND pims_personnel.emp_no=dms_document.emp_no AND css_section.section_id=dms_sf5.section_id AND dms_doc_type.type_id=dms_document.type_id AND dms_sf5.section_id='.$sec.' AND dms_document.emp_no='.$emp.'');
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
    
    $file=$secrow['sf5_file'];
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
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="<?php echo $file; ?>#toolbar=0" type="application/pdf" class="embed-responsive-item">
                </iframe>
            </div>
        </div>
        <div class='row'>
            <div class="col-md-2">
                <br>
            </div>
            <div class="col-md-8">
                <div role="group" class="btn-group btn-group-justified">
                    <div class="btn-group" role="group">
                        <a id="DL" target="_new" href="download.php?id=<?php echo $secrow['doc_id']; ?>&type=<?php echo $secrow['type_id']?>" type="button" class="btn btn-success no-print">Download</a>
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
