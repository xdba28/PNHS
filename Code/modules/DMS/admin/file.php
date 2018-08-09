<?php
    include("../db/dbcon.php");
    if(isset($_POST['btnFile'])){
        
        
        $type=$_GET['dc'];
        $emp=$_GET['emp'];
        $person=mysqli_query($mysqli,"SELECT concat(p_lname,'_',p_fname) as Name FROM pims_personnel WHERE emp_no=$emp");
        $pdf=$_FILES['file']['name'];
        $pdf_tmp = $_FILES['file']['tmp_name'];
        $dir="../docs/pdf/";
        $ext=".pdf";
        $pval=mysqli_fetch_assoc($person);
        if($type=='1'){
            
            $pdf_per=$pval['Name']."_ServiceRecord";
            mysqli_query($mysqli,"set autocommit=0");
            mysqli_query($mysqli,"start transaction");
            mysqli_query($mysqli,"LOCK TABLES dms_document,dms_doc_type,dms_sr,pims_personnel READ");
            $doc=$mysqli->query("INSERT INTO dms_document(emp_no,doc_lock,type_id) VALUES($emp,'1',$type) ");
            if($doc=== true){
                $docid=$mysqli->insert_id;
                if(move_uploaded_file($pdf_tmp, $dir.$pdf_per.$ext)){
                    
                    $file=$mysqli->query("INSERT INTO dms_sr(sr_file,sr_name,emp_no,doc_id) VALUES('".$dir.$pdf_per.$ext."','".$pdf_per.$ext."',$emp,$docid)");
                    if($file===true){
                        mysqli_query($mysqli,"COMMIT");
                        echo "<script>alert('SUCCESS!');</script>";
                        echo "<script>window.location='personnel.php?emp=$emp&dc=$type';</script>";
                    }else{
                        mysqli_query($mysqli,"ROLBACK");
                        echo "<script>alert('Error Inserting New File!!! $docid ');</script>";
                    }
                    
                }else{
                    mysqli_query($mysqli,"ROLBACK");
                    echo "<script>alert('Error Inserting New Document!!');</script>";
                }

            }else{
                mysqli_query($mysqli,"ROLBACK");
                echo "<script>alert('Error Inserting New Document!');</script>";
            }

            mysqli_query($mysqli,"UNLOCK TABLES");
        }else if($type=='2'){
            $pdf_per=$pval['Name']."_PersonalDataSheet";
            mysqli_query($mysqli,"set autocommit=0");
            mysqli_query($mysqli,"start transaction");
            mysqli_query($mysqli,"LOCK TABLES dms_document,dms_doc_type,dms_pds,pims_personnel READ");
            $doc=$mysqli->query("INSERT INTO dms_document(emp_no,doc_lock,type_id) VALUES($emp,'1',$type) ");
            if($doc=== true){
                $docid=$mysqli->insert_id;
                if(move_uploaded_file($pdf_tmp, $dir.$pdf_per.$ext)){
                    $file=$mysqli->query("INSERT INTO dms_pds(pds_file,pds_name,emp_no,doc_id) VALUES('".$dir.$pdf_per.$ext."','".$pdf_per.$ext."',$emp,$docid)");
                    if($file===true){
                        mysqli_query($mysqli,"COMMIT");
                        echo "<script>alert('SUCCESS!');</script>";
                        echo "<script>window.location='personnel.php?emp=$emp&dc=$type';</script>";
                    }else{
                        mysqli_query($mysqli,"ROLBACK");
                        echo "<script>alert('Error Inserting New File!!!');</script>";
                    }
                    
                }else{
                    mysqli_query($mysqli,"ROLBACK");
                    echo "<script>alert('Error Inserting New Document!!');</script>";
                }

            }else{
                mysqli_query($mysqli,"ROLBACK");
                echo "<script>alert('Error Inserting New Document!');</script>";
            }

            mysqli_query($mysqli,"UNLOCK TABLES");
        }else if($type=='3'){
            
            $yr=$_GET['yr'];
            $pdf_per=$pval['Name']."_MasterGradingSheet";
            mysqli_query($mysqli,"set autocommit=0");
            mysqli_query($mysqli,"start transaction");
            mysqli_query($mysqli,"LOCK TABLES dms_document,dms_master_grade WRITE");
            $doc=$mysqli->query("INSERT INTO dms_document(emp_no,doc_lock,type_id) VALUES($emp,'1',$type) ");
            if($doc=== true){
                $docid=$mysqli->insert_id;
                if(move_uploaded_file($pdf_tmp, $dir.$pdf_per.$ext)){
                    $file=$mysqli->query("INSERT INTO dms_master_grade(section_id,mg_file,mg_name,doc_id) VALUES($yr,'".$dir.$pdf_per.$ext."','".$pdf_per.$ext."',$docid)");
                    if($file===true){
                        mysqli_query($mysqli,"COMMIT");
                        echo "<script>alert('SUCCESS!');</script>";
                        echo "<script>window.location='personnel.php?emp=$emp&dc=$type&yr=$yr';</script>";
                    }else{
                        mysqli_query($mysqli,"ROLBACK");
                        echo "<script>alert('Error Inserting New File!!!');</script>";
                    }
                    
                }else{
                    mysqli_query($mysqli,"ROLBACK");
                    echo "<script>alert('Error Inserting New Document!!');</script>";
                }

            }else{
                mysqli_query($mysqli,"ROLBACK");
                echo "<script>alert('Error Inserting New Document!');</script>";
            }
            mysqli_query($mysqli,"UNLOCK TABLES");
        }else if($type=='4'){
            $yr=$_GET['yr'];
            $pdf_per=$pval['Name']."_QuarterlyGrades";
            mysqli_query($mysqli,"set autocommit=0");
            mysqli_query($mysqli,"start transaction");
            mysqli_query($mysqli,"LOCK TABLES dms_document,dms_querter_grade WRITE");
            $doc=$mysqli->query("INSERT INTO dms_document(emp_no,doc_lock,type_id) VALUES($emp,'1',$type) ");
            if($doc=== true){
                $docid=$mysqli->insert_id;
                if(move_uploaded_file($pdf_tmp, $dir.$pdf_per.$ext)){
                    $file=$mysqli->query("INSERT INTO dms_quarter_grade(sched_id,qg_file,qg_name,doc_id) VALUES($yr,'".$dir.$pdf_per.$ext."','".$pdf_per.$ext."',$docid)");
                    if($file===true){
                        mysqli_query($mysqli,"COMMIT");
                        echo "<script>alert('SUCCESS!');</script>";
                        echo "<script>window.location='personnel.php?emp=$emp&dc=$type&yr=$yr';</script>";
                    }else{
                        mysqli_query($mysqli,"ROLBACK");
                        echo "<script>alert('Error Inserting New File!!!');</script>";
                    }
                    
                }else{
                    mysqli_query($mysqli,"ROLBACK");
                    echo "<script>alert('Error Inserting New Document!!');</script>";
                }

            }else{
                mysqli_query($mysqli,"ROLBACK");
                echo "<script>alert('Error Inserting New Document!');</script>";
            }
            mysqli_query($mysqli,"UNLOCK TABLES");
        }else if($type=='5'){
            $yr=$_GET['yr'];
            $pdf_per=$pval['Name']."_SchoolFileOne";
            mysqli_query($mysqli,"set autocommit=0");
            mysqli_query($mysqli,"start transaction");
            mysqli_query($mysqli,"LOCK TABLES dms_document,dms_sf1 WRITE");
            $doc=$mysqli->query("INSERT INTO dms_document(emp_no,doc_lock,type_id) VALUES($emp,'1',$type) ");
            if($doc=== true){
                $docid=$mysqli->insert_id;
                if(move_uploaded_file($pdf_tmp, $dir.$pdf_per.$ext)){
                    $file=$mysqli->query("INSERT INTO dms_sf1(section_id,sf1_file,sf1_name,doc_id) VALUES($yr,'".$dir.$pdf.$ext."','".$pdf_per.$ext."',$docid)");
                    if($file===true){
                        mysqli_query($mysqli,"COMMIT");
                        echo "<script>alert('SUCCESS!');</script>";
                        echo "<script>window.location='personnel.php?emp=$emp&dc=$type&yr=$yr';</script>";
                    }else{
                        mysqli_query($mysqli,"ROLBACK");
                        echo "<script>alert('Error Inserting New File!!!');</script>";
                    }
                    
                }else{
                    mysqli_query($mysqli,"ROLBACK");
                    echo "<script>alert('Error Inserting New Document!!');</script>";
                }

            }else{
                mysqli_query($mysqli,"ROLBACK");
                echo "<script>alert('Error Inserting New Document!');</script>";
            }
            mysqli_query($mysqli,"UNLOCK TABLES");
        }else if($type=='6'){
            $yr=$_GET['yr'];
            $pdf_per=$pval['Name']."_SchoolFileFive";
            mysqli_query($mysqli,"set autocommit=0");
            mysqli_query($mysqli,"start transaction");
            mysqli_query($mysqli,"LOCK TABLES dms_document,dms_sf5 WRITE");
            $doc=$mysqli->query("INSERT INTO dms_document(emp_no,doc_lock,type_id) VALUES($emp,'1',$type) ");
            if($doc=== true){
                $docid=$mysqli->insert_id;
                if(move_uploaded_file($pdf_tmp, $dir.$pdf_per.$ext)){
                    $file=$mysqli->query("INSERT INTO dms_sf5(section_id,sf5_file,sf5_name,doc_id) VALUES($yr,'".$dir.$pdf."','".$pdf_per.$ext."',$docid)");
                    if($file===true){
                        mysqli_query($mysqli,"COMMIT");
                        echo "<script>alert('SUCCESS!');</script>";
                        echo "<script>window.location='personnel.php?emp=$emp&dc=$type&yr=$yr';</script>";
                    }else{
                        mysqli_query($mysqli,"ROLBACK");
                        echo "<script>alert('Error Inserting New File!!!');</script>";
                    }
                    
                }else{
                    mysqli_query($mysqli,"ROLBACK");
                    echo "<script>alert('Error Inserting New Document!!');</script>";
                }

            }else{
                mysqli_query($mysqli,"ROLBACK");
                echo "<script>alert('Error Inserting New Document!');</script>";
            }
            mysqli_query($mysqli,"UNLOCK TABLES");
        }
        
        
    }
?>