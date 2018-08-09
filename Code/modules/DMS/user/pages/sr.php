<?php 
    include('../curr.php');
    $emp_no=$emp;
    //$dc=$_GET['dc'];
    $fi=$mysqli->query("SELECT dms_document.doc_id,sr_file,doc_lock FROM dms_document,dms_doc_type,dms_sr,pims_personnel 
            WHERE dms_sr.doc_id=dms_document.doc_id
            AND dms_document.emp_no=pims_personnel.emp_No
            AND dms_document.type_id=dms_doc_type.type_id
            AND dms_sr.emp_no=pims_personnel.emp_no
            AND dms_sr.emp_no=$emp_no ");
    $num=$fi->num_rows;
    $frow=$fi->fetch_assoc();
    if(empty($num)){ ?>

        <div id="main" class="container-fluid ">
            <div class="row">
                <div class="col-md-2">
                    <br>
                </div>
                
                <div class="col-md-8">
                    <img class="img-responsive" src="../docs/img/DOC1.png">
                </div>
                <div class="col-md-1">
                    <br>
                </div>
            </div>
        </div>  

    <?php
    }else{
        if($frow['doc_lock']=='1'){ ?>

        <div id="main" class="container-fluid ">
            <div class="row">
                <div class="col-md-2">
                    <br>
                </div>
                
                <div class="col-md-8">
                    <a href="add.php"><img class="img-responsive" src="../docs/img/LOCKED1.png"></a>
                </div>
                <div class="col-md-1">
                    <br>
                </div>
            </div>
        </div>

        <?php    
        }else{ 
    
            if(!empty($frow)){ 
                $file=$frow['sr_file'];
                if(file_exists($file)){ ?>
        
        <div class="embed-responsive embed-responsive-16by9">
                <iframe src="<?php echo $file; ?>#toolbar=0" type="application/pdf" class="embed-responsive-item">
                </iframe>
            </div>
        <?php            
                }else{
                    echo "<h1>ERROR! MISSING DIRECTORY</h1>";
                }
?>
            <div class='row'>
    <div class="col-md-2">
        <br>
    </div>
    <div class="col-md-8">
        <div role="group" class="btn-group btn-group-justified">
            <div class="btn-group" role="group">
                <a id="DL" target="_new" href="download.php?id=<?php echo $frow['doc_id']; ?>&type=1" type="button" class="btn btn-success no-print">Download</a>
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
}
?>

    



