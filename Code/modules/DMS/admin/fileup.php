<?php
    include("../db/dbcon.php");
    date_default_timezone_set('Asia/Manila');
    $date=date("Y-m-d");
    if(isset($_POST['btnFile1'])){

        $type=$_GET['dc'];
        $pdf=$_FILES['file1']['name'];
        $pdf_tmp = $_FILES['file1']['tmp_name'];
        $emp=$_GET['emp'];
        $dir="../docs/pdf/";
        $ext=".pdf";
        $person=mysqli_query($mysqli,"SELECT concat(p_lname,'_',p_fname) as Name FROM pims_personnel WHERE emp_no=$emp");
        $pval=mysqli_fetch_assoc($person);
        if($type=='1'){
            $pdf_per=$pval['Name']."_ServiceRecord".$date;
            $doc=mysqli_query($mysqli,"SELECT dms_document.doc_id,sr_name 
            FROM pims_personnel,dms_document,dms_doc_type,dms_Sr 
            WHERE dms_document.doc_id=dms_sr.doc_id
            AND dms_sr.emp_no=pims_personnel.emp_no
            AND dms_document.emp_no=pims_personnel.emp_no
            AND dms_doc_type.type_id=dms_document.type_id 
            AND dms_document.emp_no=$emp AND dms_document.type_id=$type");
            $drow=mysqli_fetch_assoc($doc);
            $did=$drow['doc_id'];
            $dfile=$drow['sr_name'];
            if (file_exists("../docs/pdf/$dfile")){ 
                if(unlink("../docs/pdf/$dfile")){
                    if(move_uploaded_file($pdf_tmp, $dir.$pdf_per.$ext)){
                        mysqli_query($mysqli,"set autocommit=0");
                        mysqli_query($mysqli,"start transaction");
                        mysqli_query($mysqli,"LOCK TABLE dms_sr WRITE");
                        $up=mysqli_query($mysqli,"UPDATE dms_sr SET sr_file='".$dir.$pdf_per.$ext."',sr_name='".$pdf_per.$ext."' WHERE doc_id=$did AND emp_no=$emp");
                        if($up==true){
                            mysqli_query($mysqli,"COMMIT");
                            echo "<script>alert('SUCCESS!');</script>";
                            echo "<script>window.location='personnel.php?emp=$emp&dc=$type';</script>";
                        }else{
                            mysqli_query($mysqli,"ROLBACK");
                                echo "<script>alert('Error Updating File!');</script>";
                            echo "<script>window.location='personnel.php?emp=$emp&dc=$type';</script>";
                        }
                        mysqli_query($mysqli,"UNLOCK TABLES"); 
                    }else{
                        echo "<script>alert('Error Updating File! File size is too big!');</script>";
                        echo "<script>window.location='personnel.php?emp=$emp&dc=$type';</script>";
                    }
                }else{
                    echo "<script>alert('Error Updating File! Previous File Cannot be removed!');</script>";
                    echo "<script>window.location='personnel.php?emp=$emp&dc=$type';</script>";
                }
            }else{
                echo "<script>alert('Error Updating File! No Such file found!');</script>";
                echo "<script>window.location='personnel.php?emp=$emp&dc=$type';</script>";
            }
        }else if($type=='2'){
            $pdf_per=$pval['Name']."_PersonalDataSheet".$date;
            $doc=mysqli_query($mysqli,"SELECT dms_document.doc_id,pds_name 
            FROM dms_document,dms_doc_type,dms_pds,pims_personnel 
            WHERE dms_doc_type.type_id=dms_document.type_id 
            AND dms_document.emp_no=pims_personnel.emp_no
            AND dms_pds.emp_no=pims_personnel.emp_no
            AND dms_document.doc_id=dms_pds.doc_id
            AND dms_document.emp_no=$emp AND dms_document.type_id=$type");
            $drow=mysqli_fetch_assoc($doc);
            $did=$drow['doc_id'];
            $dfile=$drow['pds_name'];
            if (file_exists("../docs/pdf/$dfile")){ 
                if(unlink("../docs/pdf/$dfile")){
                    if(move_uploaded_file($pdf_tmp, $dir.$pdf_per.$ext)){
                        mysqli_query($mysqli,"set autocommit=0");
                        mysqli_query($mysqli,"start transaction");
                        mysqli_query($mysqli,"LOCK TABLE dms_pds WRITE");
                        $up=mysqli_query($mysqli,"UPDATE dms_pds SET pds_file='".$dir.$pdf_per.$ext."',pds_name='".$pdf_per.$ext."' WHERE doc_id=$did AND emp_no=$emp");
                        if($up==true){
                            mysqli_query($mysqli,"COMMIT");
                            echo "<script>alert('SUCCESS!');</script>";
                            echo "<script>window.location='personnel.php?emp=$emp&dc=$type';</script>";
                        }else{
                            mysqli_query($mysqli,"ROLBACK");
                                echo "<script>alert('Error Updating File!');</script>";
                            echo "<script>window.location='personnel.php?emp=$emp&dc=$type';</script>";
                        }
                        mysqli_query($mysqli,"UNLOCK TABLES"); 
                    }else{
                        echo "<script>alert('Error Updating File! File size is too big!');</script>";
                        echo "<script>window.location='personnel.php?emp=$emp&dc=$type';</script>";
                    }
                }else{
                    echo "<script>alert('Error Updating File! Previous File Cannot be removed!');</script>";
                    echo "<script>window.location='personnel.php?emp=$emp&dc=$type';</script>";
                }
            }else{
                echo "<script>alert('Error Updating File! No Such file found!');</script>";
                echo "<script>window.location='personnel.php?emp=$emp&dc=$type';</script>";
            }
            
        }else if($type=='3'){
            $yr=$_GET['yr'];
            $pdf_per=$pval['Name']."_MasterGrades".$date;
            $doc=mysqli_query($mysqli,"SELECT dms_master_grade.mg_id,mg_name 
            FROM dms_document,dms_doc_type,dms_master_grade 
            WHERE dms_document.doc_id=dms_master_grade.doc_id 
            AND dms_doc_type.type_id=dms_document.type_id
            ANd emp_no=$emp AND dms_document.type_id=$type AND section_id=$yr");
            $drow=mysqli_fetch_assoc($doc);
            $did=$drow['mg_id'];
            $dfile=$drow['mg_name'];
            if (file_exists("../docs/pdf/$dfile")){ 
                if(unlink("../docs/pdf/$dfile")){
                    if(move_uploaded_file($pdf_tmp, $dir.$pdf_per.$ext)){
                        mysqli_query($mysqli,"set autocommit=0");
                        mysqli_query($mysqli,"start transaction");
                        mysqli_query($mysqli,"LOCK TABLE dms_master_grade WRITE");
                        $up=mysqli_query($mysqli,"UPDATE dms_master_grade SET mg_file='".$dir.$pdf_per.$ext."',mg_name='".$pdf_per.$ext."' WHERE mg_id=$did");
                        if($up==true){
                            mysqli_query($mysqli,"COMMIT");
                            echo "<script>alert('SUCCESS!');</script>";
                            echo "<script>window.location='personnel.php?emp=$emp&dc=$type&yr=$yr';</script>";
                        }else{
                            mysqli_query($mysqli,"ROLBACK");
                                echo "<script>alert('Error Updating File!');</script>";
                        }
                        mysqli_query($mysqli,"UNLOCK TABLES"); 
                    }else{
                        echo "<script>alert('Error Updating File! File size is too big!');</script>";
                    }
                }else{
                    echo "<script>alert('Error Updating File! Previous File Cannot be removed!');</script>";
                }
            }else{
                echo "<script>alert('Error Updating File! No Such file found!');</script>";
            }
        }else if($type=='4'){
            $yr=$_GET['yr'];
            $pdf_per=$pval['Name']."_QuarterlyGrades".$date;
            $doc=mysqli_query($mysqli,"SELECT qg_id,mg_name 
            FROM dms_quarter_grade,dms_document,dms_doc_type 
            WHERE dms_document.doc_id=dms_quarter_grade.doc_id 
            AND dms_doc_type.type_id=dms_document.type_id
            AND emp_no=$emp AND dms_document.type_id=$type
            AND sched_id=$yr");
            $drow=mysqli_fetch_assoc($doc);
            $did=$drow['qg_id'];
            $dfile=$drow['qg_name'];
            if (file_exists("../docs/pdf/$dfile")){ 
                if(unlink("../docs/pdf/$dfile")){
                    if(move_uploaded_file($pdf_tmp, $dir.$pdf_per.$ext)){
                        mysqli_query($mysqli,"set autocommit=0");
                        mysqli_query($mysqli,"start transaction");
                        mysqli_query($mysqli,"LOCK TABLE dms_quarter_grade WRITE");
                        $up=mysqli_query($mysqli,"UPDATE dms_quarter_grade SET qg_file='".$dir.$pdf_per.$ext."',qg_name='".$pdf_per.$ext."' WHERE qg_id=$did");
                        if($up==true){
                            mysqli_query($mysqli,"COMMIT");
                            echo "<script>alert('SUCCESS!');</script>";
                            echo "<script>window.location='personnel.php?emp=$emp&dc=$type&yr=$yr';</script>";
                        }else{
                            mysqli_query($mysqli,"ROLBACK");
                                echo "<script>alert('Error Updating File!');</script>";
                        }
                        mysqli_query($mysqli,"UNLOCK TABLES"); 
                    }else{
                        echo "<script>alert('Error Updating File! File size is too big!');</script>";
                    }
                }else{
                    echo "<script>alert('Error Updating File! Previous File Cannot be removed!');</script>";
                }
            }else{
                echo "<script>alert('Error Updating File! No Such file found!');</script>";
            }
        }else if($type=='5'){
            $yr=$_GET['yr'];
            $pdf_per=$pval['Name']."_SchoolFileOne".$date;
            $doc=mysqli_query($mysqli,"SELECT sf1_id,sf1_name 
            FROM dms_sf1,dms_document,dms_doc_type 
            WHERE dms_document.doc_id=dms_sf1.doc_id 
            AND dms_doc_type.type_id=dms_document.type_id
            AND emp_no=$emp AND dms_document.type_id=$type
            AND section_id=$yr");
            $drow=mysqli_fetch_assoc($doc);
            $did=$drow['sf1_id'];
            $dfile=$drow['sf1_name'];
            if(file_exists("../docs/pdf/$dfile")){ 
                if(unlink("../docs/pdf/$dfile")){
                    if(move_uploaded_file($pdf_tmp, $dir.$pdf_per.$ext)){
                        mysqli_query($mysqli,"set autocommit=0");
                        mysqli_query($mysqli,"start transaction");
                        mysqli_query($mysqli,"LOCK TABLE dms_sf1 WRITE");
                        $up=mysqli_query($mysqli,"UPDATE dms_sf1 SET sf1_file='".$dir.$pdf_per.$ext."',sf1_name='".$pdf_per.$ext."' WHERE sf1_id=$did");
                        if($up==true){
                            mysqli_query($mysqli,"COMMIT");
                            echo "<script>alert('SUCCESS!');</script>";
                            echo "<script>window.location='personnel.php?emp=$emp&dc=$type&yr=$yr';</script>";
                        }else{
                            mysqli_query($mysqli,"ROLBACK");
                                echo "<script>alert('Error Updating File!');</script>";
                            echo "<script>window.location='personnel.php?emp=$emp&dc=$type&yr=$yr';</script>";
                        }
                        mysqli_query($mysqli,"UNLOCK TABLES"); 
                    }else{
                        echo "<script>alert('Error Updating File! File size is too big!');</script>";
                        echo "<script>window.location='personnel.php?emp=$emp&dc=$type&yr=$yr';</script>";
                    }
                }else{
                    echo "<script>alert('Error Updating File! Previous File Cannot be removed!');</script>";
                    echo "<script>window.location='personnel.php?emp=$emp&dc=$type&yr=$yr';</script>";
                }
            }else{
                echo "<script>alert('Error Updating File! $dfile No Such file found!');</script>";
                echo "<script>window.location='personnel.php?emp=$emp&dc=$type&yr=$yr';</script>";
            }
            
        }else if($type=='6'){
            $yr=$_GET['yr'];
            $pdf_per=$pval['Name']."_SchoolFileFive".$date;
            $doc=mysqli_query($mysqli,"SELECT sf5_id,sf5_name 
            FROM dms_sf5,dms_document,dms_doc_type 
            WHERE dms_document.doc_id=dms_sf5.doc_id 
            AND dms_doc_type.type_id=dms_document.type_id
            AND emp_no=$emp AND dms_document.type_id=$type
            AND section_id=$yr");
            $drow=mysqli_fetch_assoc($doc);
            $did=$drow['sf5_id'];
            $dfile=$drow['sf5_name'];
            if (file_exists("../docs/pdf/$dfile")){ 
                if(unlink("../docs/pdf/$dfile")){
                    if(move_uploaded_file($pdf_tmp, $dir.$pdf_per.$ext)){
                        mysqli_query($mysqli,"set autocommit=0");
                        mysqli_query($mysqli,"start transaction");
                        mysqli_query($mysqli,"LOCK TABLE dms_sf5 WRITE");
                        $up=mysqli_query($mysqli,"UPDATE dms_sf5 SET sf5_file='".$dir.$pdf_per.$ext."',sf5_name='".$pdf_per.$ext."' WHERE sf5_id=$did");
                        if($up==true){
                            mysqli_query($mysqli,"COMMIT");
                            echo "<script>alert('SUCCESS!');</script>";
                            echo "<script>window.location='personnel.php?emp=$emp&dc=$type&yr=$yr';</script>";
                        }else{
                            mysqli_query($mysqli,"ROLBACK");
                                echo "<script>alert('Error Updating File!');</script>";
                        }
                        mysqli_query($mysqli,"UNLOCK TABLES"); 
                    }else{
                        echo "<script>alert('Error Updating File! File size is too big!');</script>";
                    }
                }else{
                    echo "<script>alert('Error Updating File! Previous File Cannot be removed!');</script>";
                }
            }else{
                echo "<script>alert('Error Updating File! No Such file found!');</script>";
            }
        }
        
        
    }
?>