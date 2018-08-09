<?php 
include("../db/dbcon.php");

$pro2=mysqli_query($mysqli,"select concat(p_fname,' ',p_lname) as Name,doc_file,doc_year,doc_lock 
                                        FROM pims_personnel,dms_document
                                        WHERE pims_personnel.emp_No=dms_document.emp_no
                                        AND dms_document.emp_no=1
                                        AND doc_type='Service Record'");
$row=mysqli_fetch_assoc($pro2);
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="'.$row['doc_file'].'"');
header('Content-Length: '.filesize($row['doc_file']));


?>