<?php
    $list=mysqli_query($mysqli,"select dms_document.emp_no,concat(p_fname,' ',p_lname) as Name,emp_status 
                                FROM pims_personnel,pims_employment_records,dms_document 
                                WHERE pims_personnel.emp_No=pims_employment_records.emp_No
                                and dms_document.emp_no=pims_personnel.emp_no
                                And arch_stat='0' AND doc_type='Service Record'");
    
    
    
?>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span>List of Faculties</span>
                        </div>
                        <!-- /.panel-heading -->
                        <form method="POST">
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><center>Action</center></th>
                                        <th><center>Name</center></th>
                                        <th><center>Working Status</center></th>
                                        <th><center>Data Status</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php
                                        $x=0;
                                        while($lrow=mysqli_fetch_assoc($list)){
                                            $stat=mysqli_query($mysqli,"SELECT pims_service_records.servRec_ID FROM pims_personnel,pims_service_records,pims_employment_records
                                                WHERE pims_employment_records.emp_No=pims_personnel.emp_No
                                                AND pims_service_records.emp_rec_ID=pims_employment_records.emp_rec_ID
                                                AND pims_personnel.emp_No=".$lrow["emp_no"]."");
                                            $i="";
                                            if(empty($srow=mysqli_fetch_assoc($stat))){
                                                $i+="0";
                                            }else{
                                                $i+="1";
                                            }
                                            
                                        
                                    ?>
                                    <tr>
                                        <?php
                                            if($i=="1"){
                                                
                                                $sr=mysqli_query($mysqli,"SELECT dms_document.doc_id,doc_lock 
                                                FROM dms_document,pims_service_records,pims_personnel,pims_employment_records
                                                WHERE dms_document.servRec_ID=pims_service_records.servRec_ID
                                                aND pims_personnel.emp_No=pims_employment_records.emp_No
                                                AND pims_service_records.emp_rec_ID=pims_employment_records.emp_rec_ID
                                                And dms_document.servRec_ID=".$srow['servRec_ID']." ");
                                                if(empty($recrow=mysqli_fetch_assoc($sr))){
                                                    ?>
                                        <input type="hidden" name="id" value="<?php echo $srow['servRec_ID'];?>">
                                        <input type="hidden" name="emp" value="<?php echo $lrow['emp_no'];?>">
                                        <td><center><button name="insert" type="submit" class="btn btn-primary">Insert Data</button></center></td>
                                                <?php }else{ 
                                                    if($recrow['doc_lock']=="0"){ ?>
                                                        
                                        <td><center><a href="gen.php" class="disabled btn btn-success"><i class="fa fa-lock"></i> Generate Document</a></center></td>                
                                        <?php                
                                                    }else{ ?>
                                                        
                                        <td><center><a href="gen.php" class="btn btn-success"><i class="fa fa-unlock"></i> Generate Document</a></center></td>                 
                                        <?php               
                                                    }
                                                ?>
                                                    
                                                <?php }
                                                ?>
                                        
                                            <?php }else if($i=="0"){ ?>
                                        <td><center><a href="#" class="disabled btn btn-danger">Insert Data</a></center></td>        
                                            <?php }
                                            
                                        ?>
                                        <td><center><?php echo $lrow['Name']; ?></center></td>
                                        <td><center><?php echo $lrow['emp_status']; ?></center></td>
                                        
                                        <?php
                                            if($i=="1"){
                                                ?>
                                        <td><center><span class="label label-info">Sufficient Data</span></center></td>
                                            <?php }else if($i=="0"){ ?>
                                        <td><center><span class="label label-danger">Insufficient Data</span></center></td>        
                                            <?php }
                                            
                                        ?>
                                        
                                    </tr>
                                    <?php 
                                        
                                        } ?>
                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        </form>
                        <?php
                            if(isset($_POST['insert'])){
                                $id=$_POST['id'];
                                $emp=$_POST['emp'];
                                $type="Service Record";
                                
                                mysqli_query($mysqli,"set autocommit=0");
                                mysqli_query($mysqli,"start transaction");
                                mysqli_query($mysqli,"LOCK TABLES dms_document,pims_service_records,pims_personnel READ");
                                $ins=mysqli_query($mysqli,"INSERT INTO dms_document (doc_type,doc_lock, emp_no, grade_id, pds_id, sf_id, servRec_ID) VALUES('Service Record','0',$emp,null,null,null,$id)");
                                
                                if($ins){
                                    mysqli_query($mysqli,"COMMIT");
                                    echo "<script> alert('Data Inserted'); </script>";
                                    echo "<script> window.location='form.php?dc=sr' </script>";
                                }else{
                                    mysqli_query($mysqli,"ROLLBACK");
                                    echo "<script> alert('".$id."Data Error!".$emp."'); </script>";
                                }
                               mysqli_query($mysqli,"UNLOCK TABLES");
                                
                            }
                        ?>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

