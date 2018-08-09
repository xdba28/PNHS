<?php
    $list=mysqli_query($mysqli,"select pims_personnel.emp_no,concat(p_fname,' ',p_lname) as Name,emp_status 
                                FROM pims_personnel,pims_employment_records 
                                WHERE pims_personnel.emp_No=pims_employment_records.emp_No");
    
    
    
?>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span>List of Faculties</span>
                        </div>
                        <!-- /.panel-heading -->
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
                                            $stat=mysqli_query($mysqli,"SELECT pims_service_records.servRec_ID FROM pims_personnel,pims_service_records
                                                WHERE pims_service_records.emp_No=pims_personnel.emp_No
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
                                                ?>
                                        <td><center><a href="#" class="btn btn-primary">Generate</a></center></td>
                                            <?php }else if($i=="0"){ ?>
                                        <td><center><a href="#" class="disabled btn btn-danger">Generate</a></center></td>        
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
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>