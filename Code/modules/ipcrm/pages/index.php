<!DOCTYPE html>
<html lang="en" >
    <?php
    include("func.php");
    if($_GET['id']){
        $id=$_GET['id'];
        foreach(definePerson($id) as $key=>$val){
            if($key=="css"){
                $css_priv=$val;
            }else if($key=="dms"){
                $dms_priv=$val;
            }else if($key=="ims"){
                $ims_priv=$val;
            }else if($key=="ipcr"){
                $ipcr_priv=$val;
            }else if($key=="pims"){
                $pims_priv=$val;
            }else if($key=="pms"){
                $pms_priv=$val;
            }else if($key=="oes"){
                $oes_priv=$val;
            }else if($key=="prs"){
                $prs_priv=$val;
            }else if($key=="scms"){
                $scms_priv=$val;
            }else if($key=="sis"){
                $sis_priv=$val;
            }else if($key=="user_type"){
                $user_type=$val;
            }else if($key=="job"){
                $job_title=$val;
            }else if($key=="emp_type"){
                $emp_type=$val;
            }else if($key=="dept"){
                $dept=$val;
            }
        }
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
        <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
        <link rel="icon" href="img/pnhs_favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/w3.css">
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
                <ul class="nav sidebar scrollbar sidebar-nav" id="style-4">
                    <li class="sidebar-brand">
                        <a href="#">
                            Menu
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>

                    <!-- CSS -->
                    <?php
                    if($css_priv=="1"){ ?>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-fw fa-plus" aria-expanded="false"></i>Class<br>Scheduling<span class="caret"></span></a>
                        <ul class="nav collapse dropdown-menu" role="menu" id="submenu1">
                            <?php
                            if($emp_type=="Teaching"){
                            if(strstr($job_title,"TCH") || strstr($job_title,"HTEACH") || strstr($job_title,"INST")){
                            ?>
                            <li>
                                <a href="../pages/equip.php">Schedule</a><!-- Equipment,Supply,Add item,borrowed items-->
                            </li>
                            <li>
                                <a href="../pages/building.php">School Year</a><!-- Lahat ng about sa bldgs -->
                            </li>
                            <?php
                            }
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    }
                    ?>
                    
                    <!-- DMS -->
                    <?php
                    if($dms_priv=="1"){ ?>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu2"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>Document Management<span class="caret"></span></a>
                        <ul class="nav collapse dropdown-menu" role="menu" id="submenu2">
                            <?php
                            if($user_type=="admin"){
                            if(strstr($job_title,"HRM") || strstr($job_title,"ICT")){
                            ?>
                            <li>
                                <a href="../dms/admin/doc.php"><i class="fa fa-fw fa-file-o"></i>Documents</a>
                            </li>
                            <li>
                                <a href="../dms/admin/inbox.php"><i class="fa fa-fw fa-envelope-o"></i>Inbox</a>
                            </li>
                            <li>
                                <a href="../dms/admin/messagereport.php"><i class="fa fa-fw fa-pencil-square-o"></i>Message Reports</a>
                            </li>
                            <li>
                                <a href="../dms/admin/list.php"><i class="fa fa-fw fa-university"></i>Department Records</a>
                            </li>
                            <li>
                                <a href="../dms/admin/archiving.php"><i class="fa fa-fw fa-archive"></i>Archiving</a>
                            </li>
                            <?php
                            }else if($emp_type=="Teaching" || $emp_type=="NON Teaching"){ ?>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i> Documents<span class="caret"></span></a>
                            </li>
                            <ul>
                                <ul class="nav collapse dropdown-submenu" id="subsubmenu" role="menu">
                                    <li><a href="../dms/user/form.php?dc=pds">Personal Data Sheet</a></li>
                                    <?php if($emp_type=="Teaching"){
                                    if(strstr($job_title,"HTEACH")){ ?>
                                    <li><a href="../dms/user/form.php?dc=fi">Employee List</a></li>
                                    <?php
                                    }
                                    ?>
                                    <li><a href="../dms/user/form.php?dc=sr">Service Records</a></li>
                                    <li>
                                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu" aria-expanded="false">
                                            School File<span class="caret"></span>
                                        </a>
                                    </li>
                                    <ul>
                                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu" role="menu">
                                            <li><a href="../dms/user/form.php?dc=sf1">School File One</a></li>
                                            <li><a href="../dms/user/form.php?dc=sf5">School File Five</a></li>
                                        </ul>
                                    </ul>
                                    <li>
                                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu1" aria-expanded="false">
                                            Grade Files<span class="caret"></span>
                                        </a>
                                    </li>
                                    <ul>
                                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu1" role="menu">
                                            <li><a href="../dms/user/form.php?dc=mg">Master Grading Sheet</a></li>
                                            <li><a href="../dms/user/form.php?dc=qg">Quarterly Grades</a></li>
                                        </ul>
                                    </ul>
                                    <?php } ?>
                                </ul>
                            </ul>
                            <li>
                                <a href="../dms/user/add.php"><i class="fa fa-fw fa-paper-plane-o"></i>Document Request</a>
                            </li>
                            <?php
                            }
                            }else if($emp_type=="Teaching" || $emp_type=="NON Teaching"){ ?>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i> Documents<span class="caret"></span></a>
                            </li>
                            <ul>
                                <ul class="nav collapse dropdown-submenu" id="subsubmenu" role="menu">
                                    <li><a href="../dms/user/form.php?dc=pds">Personal Data Sheet</a></li>
                                    <?php if($emp_type=="Teaching"){
                                    if(strstr($job_title,"HTEACH")){ ?>
                                    <li><a href="../dms/user/form.php?dc=fi">Employee List</a></li>
                                    <?php
                                    }
                                    ?>
                                    <li><a href="../dms/user/form.php?dc=sr">Service Records</a></li>
                                    <li>
                                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu" aria-expanded="false">
                                            School File<span class="caret"></span>
                                        </a>
                                    </li>
                                    <ul>
                                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu" role="menu">
                                            <li><a href="../dms/user/form.php?dc=sf1">School File One</a></li>
                                            <li><a href="../dms/user/form.php?dc=sf5">School File Five</a></li>
                                        </ul>
                                    </ul>
                                    <li>
                                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu1" aria-expanded="false">
                                            Grade Files<span class="caret"></span>
                                        </a>
                                    </li>
                                    <ul>
                                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu1" role="menu">
                                            <li><a href="../dms/user/form.php?dc=mg">Master Grading Sheet</a></li>
                                            <li><a href="../dms/user/form.php?dc=qg">Quarterly Grades</a></li>
                                        </ul>
                                    </ul>
                                    <?php } ?>
                                </ul>
                            </ul>
                            <li>
                                <a href="../dms/user/add.php"><i class="fa fa-fw fa-paper-plane-o"></i>Document Request</a>
                            </li>
                            <?php
                            } ?>
                        </ul>
                    </li>
                    <?php
                        }
                            ?>
                        
                    
                    <!-- OES -->
                    <?php
                    if($oes_priv=="1"){ ?>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu3"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>Online Examination<span class="caret"></span></a>
                        <ul class="nav collapse dropdown-menu" role="menu" id="submenu3">
                            <?php
                            if($emp_type=="Teaching"){
                            ?>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu2" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i> Exam<span class="caret"></span></a>
                            </li>
                            <ul>
                                <ul class="nav collapse dropdown-submenu" id="subsubmenu2" role="menu">
                                    <li>
                                        <a href="../oes/exam.php?tab=1">Create Exam</a>
                                    </li>
                                    <li>
                                        <a href="../oes/exam.php?tab=2">Manage Exam</a>
                                    </li>
                                    <li>
                                        <a href="../oes/report.php?tab=6">Exam Result</a>
                                    </li>
                                    <li>
                                        <a href="../oes/report.php?tab=7">Result Chart</a>
                                    </li>
                                    
                                </ul>
                            </ul>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu3" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Question Bank<span class="caret"></span></a>
                            </li>
                            <ul>
                                <ul class="nav collapse dropdown-submenu" id="subsubmenu3" role="menu">
                                    <li>
                                        <a href="../oes/question.php?tab=4">Create Question</a>
                                    </li>
                                    <li>
                                        <a href="../oes/question.php?tab=5">Manage Questions</a>
                                    </li>
                                </ul>
                            </ul>
                            <?php
                            } ?>
                        </ul>
                    </li>
                        <?php
                            }
                        ?>
                        
                    
                    <!-- IPCR -->
                    <?php
                    if($ipcr_priv=="1"){ ?>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu4"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>IPCR<span class="caret"></span></a>
                        <ul class="nav collapse dropdown-menu" role="menu" id="submenu4">
                            <?php
                            if($emp_type=="Teaching"){
                            if(strstr($job_title,"HTEACH")){
                            ?>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu4" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>View Updated Form<span class="caret"></span></a>
                            </li>
                            <ul>
                                <ul class="nav collapse dropdown-submenu" id="subsubmenu4" role="menu">
                                    <li>
                                        <a href="../ipcrm/admin_DH/view_formMasterTeacher.php">Master Teacher</a>
                                    </li>
                                    <li>
                                        <a href="../ipcrm/admin_DH/view_formTeacher.php">Teacher</a>
                                    </li>
                                </ul>
                            </ul>
                            <li>
                                <a href="../ipcrm/admin_DH/ipcrms_trans_rec.php">Request List</a>
                            </li>
                            <li>
                                <a href="../ipcrm/admin_DH/ipcrms_rating.php">Department Rating</a>
                            </li>
                            
                            <?php
                            }else if(strstr($job_title,"TCH") || strstr($job_title,"HTEACH") || strstr($job_title,"INST")){ ?>
                            <li>
                                <a href="../ipcrm/user_form11.php">IPCR Form</a>
                            </li>
                            <?php
                            }
                            }else if(strstr($job_title,"SP")){ ?>
                            
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu4" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>View Form<span class="caret"></span></a>
                            </li>
                            <ul>
                                <ul class="nav collapse dropdown-submenu" id="subsubmenu4" role="menu">
                                    <li>
                                        <a href="../ipcrm/admin_SH/view_formMasterTeacher.php">Master Teacher</a>
                                    </li>
                                    <li>
                                        <a href="../ipcrm/admin_SH/view_formTeacher.php">Teacher</a>
                                    </li>
                                </ul>
                            </ul>
                            <li>
                                <a href="../ipcrm/admin_SH/ipcrms_update.php">Update Form</a>
                            </li>
                            <li>
                                <a href="../ipcrm/admin_SH/ipcrms_rating.php">Overall Rating</a>
                            </li>
                            <li>
                                <a href="../ipcrm/admin_SH/ipcrms_monitor.php">Submissions</a>
                            </li>
                            <li>
                                <a href="../ipcrm/admin_SH/ipcrms_trans_rec.php">Reports</a>
                            </li>
                            <li>
                                <a href="../ipcrm/admin_SH/ipcrms_trans_rec.php">Set Deadline</a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    }
                    ?>
                    
                    <!-- PIMS -->
                    <?php
                    if($pims_priv=="1"){ ?>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu5"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>Personnel Management<span class="caret"></span></a>
                        <ul class="nav collapse dropdown-menu" role="menu" id="submenu5">
                            <?php
                            if($emp_type=="Teaching"){
                            if(strstr($job_title,"ICT")){
                            ?>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu6" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Manage Personnel<span class="caret"></span></a>
                            </li>
                            <ul>
                                <ul class="nav collapse dropdown-submenu" id="subsubmenu6" role="menu">
                                    <li>
                                        <a href="../pims/admin/add_personnel.php">Add Personnel</a>
                                    </li>
                                    <li>
                                        <a href="../pims/admin/update_personnel1.php">Update Personnel Info</a>
                                    </li>
                                </ul>
                            </ul>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu5" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Generate Reports<span class="caret"></span></a>
                            </li>
                            <ul>
                                <ul class="nav collapse dropdown-submenu" id="subsubmenu5" role="menu">
                                    <li>
                                        <a href="../pims/admin/teaching.php">Teaching Faculty</a>
                                    </li>
                                    <li>
                                        <a href="../pims/admin/non_teaching.php">Non-Teaching Faculty</a>
                                    </li>
                                    <li>
                                        <a href="../pims/admin/on_leave_list.php">On-Leave Personnel</a>
                                    </li>
                                </ul>
                            </ul>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu7" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Leave Application History<span class="caret"></span></a>
                            </li>
                            <ul>
                                <ul class="nav collapse dropdown-submenu" id="subsubmenu7" role="menu">
                                    <li>
                                        <a href="../pims/admin/leave_applicants.php">Pending</a>
                                    </li>
                                    <li>
                                        <a href="../pims/admin/approved_applicants.php">Approved</a>
                                    </li>
                                    <li>
                                        <a href="../pims/admin/disapproved_applicants.php">Disapproved</a>
                                    </li>
                                    <li>
                                        <a href="../pims/admin/approved_applicants.php">Cancelled by Applicants</a>
                                    </li>
                                </ul>
                            </ul>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu8" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Profile Update Application<span class="caret"></span></a>
                            </li>
                            <ul>
                                <ul class="nav collapse dropdown-submenu" id="subsubmenu8" role="menu">
                                    <li>
                                        <a href="profile_updates_pending.php">Pending</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu2" aria-expanded="false">
                                            History<span class="caret"></span>
                                        </a>
                                    </li>
                                    <ul>
                                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu2" role="menu">
                                            <li>
                                                <a href="../pims/admin/.._approved.php">Approved</a>
                                            </li>
                                            <li>
                                                <a href="../pims/admin/.._disapproved.php">Disapproved</a>
                                            </li>
                                        </ul>
                                    </ul>
                                    <li>
                                        
                                    </ul>
                                </ul>
                                
                                <?php
                                }else if(strstr($job_title,"TCH") || strstr($job_title,"HTEACH") || strstr($job_title,"INST")){ ?>
                                <li>
                                    <a href="user_form11.php">IPCR Form</a>
                                </li>
                                <?php
                                }
                                }else if(strstr($job_title,"SP")){ ?>
                                
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu4" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>View Form<span class="caret"></span></a>
                                </li>
                                <ul>
                                    <ul class="nav collapse dropdown-submenu" id="subsubmenu4" role="menu">
                                        <li>
                                            <a href="../pims/admin2/view_formMasterTeacher.php">Master Teacher</a>
                                        </li>
                                        <li>
                                            <a href="../pims/admin2/view_formTeacher.php">Teacher</a>
                                        </li>
                                    </ul>
                                </ul>
                                <li>
                                    <a href="../pims/admin2/ipcrms_update.php">Update Form</a>
                                </li>
                                <li>
                                    <a href="../pims/admin2/ipcrms_rating.php">Overall Rating</a>
                                </li>
                                <li>
                                    <a href="../pims/admin2/ipcrms_monitor.php">Submissions</a>
                                </li>
                                <li>
                                    <a href="../pims/admin2/ipcrms_trans_rec.php">Reports</a>
                                </li>
                                <li>
                                    <a href="../pims/admin2/ipcrms_trans_rec.php">Set Deadline</a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                        
                        <!-- IMS -->
                        <?php
                        if($ims_priv=="1"){ ?>
                        
                            <?php
                            if($user_type=="admin"){
                                if($job_title=="SUO1"){
                            ?>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu6"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>Inventory<span class="caret"></span></a>
                                <ul class="nav collapse dropdown-menu" role="menu" id="submenu6">
                                    <li>
                                        <a href="../pages/borrowed.php">Borrowed Items</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu9" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Storage<span class="caret"></span></a>
                                    </li>
                                    <ul>
                                        <ul class="nav collapse dropdown-submenu" id="subsubmenu9" role="menu">
                                            <li><a href="../ipms/ims/pages/inspection.php">Add Items</a></li>
                                            <li><a href="../ipms/ims/pages/equip.php">Equipment</a></li>
                                            <li><a href="../ipms/ims/pages/supply.php">Supply</a></li>
                                            <li><a href="../ipms/ims/pages/building.php">Buildings</a></li>
                                        </ul>
                                    </ul>
                                    <li>
                                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu10" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Charts<span class="caret"></span></a>
                                    </li>
                                    <ul>
                                        <ul class="nav collapse dropdown-submenu" id="subsubmenu10" role="menu">
                                            <li><a href="../ipms/ims/pages/bcequip.php">Equipment Chart</a></li>
                                            <li><a href="../ipms/ims/pages/bcsupply.php">Supply Chart</a></li>
                                            <li><a href="../ipms/ims/pages/bcbuilding.php">Building Chart</a></li>
                                        </ul>
                                    </ul>
                                    <li>
                                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu10" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Reports<span class="caret"></span></a>
                                    </li>
                                    <ul>
                                        <ul class="nav collapse dropdown-submenu" id="subsubmenu10" role="menu">
                                            <li><a href="../ipms/ims/pages/annreport.php">Storage Report</a></li>
                                            <li><a href="../ipms/ims/pages/bldgreport.php">Building Report</a></li>
                                            <li><a href="../ipms/ims/pages/borrowreport.php">Borrowed Items Report</a></li>
                                            <li><a href="../pages/equiphistory.php">Transaction History Report</a></li>
                                        </ul>
                                    </ul>
                                </ul>
                            </li>
                            <?php
                            }
                            }
                            ?>
                        
                        <?php
                        }
                        ?>
                        
                        <!-- PMS -->
                        <?php
                        if($pms_priv=="1"){ ?>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu7"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>Procurement<span class="caret"></span></a>
                            <ul class="nav collapse dropdown-menu" role="menu" id="submenu7">
                                <?php
                                if($user_type=="admin"){
                                if($job_title=="SUO1"){
                                ?>
                                <li>
                                    <a href="../ipms/pms/admin/ris_page.php">RIS</a>
                                </li>
                                <li>
                                    <a href="../ipms/pms/admin/pr.php">Purchase Request</a>
                                </li>
                                <li>
                                    <a href="../ipms/pms/admin/po.php">Purchase Order</a>
                                </li>
                                <li>
                                    <a href="../ipms/pms/admin/delivery.php">Delivery</a><!-- Lahat ng about sa delivery -->
                                </li>
                                <li>
                                    <a href="../ipms/pms/admin/supplier.php">Supplier</a>
                                </li>
                                <li>
                                    <a href="../ipms/pms/admin/records.php">Records</a><!-- Lahat ng about sa records -->
                                </li>
                                <?php
                                }else if(strstr($job_title,"SP") ){ ?>
                                <li>
                                    <a href="../ipms/pms/admin1/request.php">Requests</a><!-- Lahat ng about sa requests -->
                                </li>
                                <li>
                                    <a href="../ipms/pms/admin1/reports.php">Reports</a>
                                </li>
                                <li>
                                    <a href="../ipms/pms/admin1/records.php">Records</a>
                                </li>
                                <?php
                                }else if($emp_type=="Teaching"){ ?>
                                <li>
                                    <a href="../ipms/pms/USER/requi.php">Request Item</a>
                                </li>
                                <li>
                                    <a href="../ipms/pms/USER/trans.php">Transaction Records</a>
                                </li>
                                <?php
                                }
                                }else if($user_type=="user"){
                                if($emp_type=="Teaching"){ ?>
                                <li>
                                    <a href="../ipms/pms/USER/requi.php">Request Item</a>
                                </li>
                                <li>
                                    <a href="../ipms/pms/USER/trans.php">Transaction Records</a>
                                </li>
                                <?php
                                }
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                        
                        <!-- PRS -->
                        <?php
                        if($prs_priv=="1"){
                            if(strstr($job_title,"HRM")){
                        ?>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu8"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>Monthly Attendance<span class="caret"></span></a>
                            <ul class="nav collapse dropdown-menu" role="menu" id="submenu8">
                                <li class="dropdown-header">User Privilege</li>
                                <li>
                                    <a href="../prs/AdminB/admin/employee.php">Employee Masterlist</a><!-- Equipment,Supply,Add item,borrowed items-->
                                </li>
                                <li>
                                    <a href="../prs/AdminB/admin/sort.php">Summary Record</a><!-- Lahat ng about sa bldgs -->
                                </li>
                            </ul>
                        </li>
                        <?php
                            }
                        
                        }
                        ?>
                        
                        <!-- SCMS -->
                        <?php
                        if($scms_priv=="1"){ ?>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu9"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>School Clinic<span class="caret"></span></a>
                            <ul class="nav collapse dropdown-menu" role="menu" id="submenu9">
                                <?php
                                if($user_type=="admin"){
                                if(strstr($job_title,"NRS")){ ?>
                                <li>
                                    <a href="../scms/pages/admin/daily.php">Daily Visit Log</a>
                                </li>
                                <li>
                                    <a href="../scms/pages/admin/patient.php">Patient Records</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu11" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Medical Records<span class="caret"></span></a>
                                </li>
                                <ul>
                                    <ul class="nav collapse dropdown-submenu" id="subsubmenu11" role="menu">
                                        <li><a href="../scms/pages/admin/student.php">Student</a></li>
                                        <li><a href="../scms/pages/admin/personnel.php">Personnel</a></li>
                                    </ul>
                                </ul>
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu12" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Manage<span class="caret"></span></a>
                                </li>
                                <ul>
                                    <ul class="nav collapse dropdown-submenu" id="subsubmenu12" role="menu">
                                        <li><a href="../scms/pages/admin/mse.php">Medicines</a></li>
                                        <li><a href="../scms/pages/admin/supplies.php">Supplies</a></li>
                                        <li><a href="../scms/pages/admin/equipment.php">Equipment</a></li>
                                    </ul>
                                </ul>
                                <li>
                                    <a href="../scms/admin/pages/reports.php">Reports</a>
                                </li>
                                <li>
                                    <a href="../scms/admin/pages/support.php">Support</a>
                                </li>
                                <?php
                                }else if($emp_type=="Teaching"){
                                if($dept=="7"){ ?>
                                <li>
                                    <a href="../scms/pages/mapeh/index.php">Medical Records</a>
                                </li>
                                <li>
                                    <a href="../scms/pages/mapeh/medhist_pers.php">My Medical Record</a>
                                </li>
                                <li>
                                    <a href="../scms/pages/mapeh/consult_history.php">Consultation History</a>
                                </li>
                                <?php
                                }else{ ?>
                                <li>
                                    <a href="../scms/pages/stuper/index.php">Medical Record</a>
                                </li>
                                <li>
                                    <a href="../scms/pages/stuper/consult_hist.php">Medical History</a>
                                </li>
                                <?php
                                }
                                }
                                }else if($emp_type=="Teaching"){ ?>
                                <li>
                                    <a href="../scms/pages/stuper/index.php">Medical Record</a>
                                </li>
                                <li>
                                    <a href="../scms/pages/stuper/consult_hist.php">Medical History</a>
                                </li>
                                <?php
                                } ?>
                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                        
                        <!-- SIS -->
                        <?php
                        if($sis_priv=="1"){ ?>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu10"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>Student Management<span class="caret"></span></a>
                            <ul class="nav collapse dropdown-menu" role="menu" id="submenu10">
                                <?php
                                if($emp_type=="Teaching"){
                                if(strstr($job_title,"TCH") || strstr($job_title,"HTEACH") || strstr($job_title,"INST")){
                                ?>
                                <li>
                                    <a href="employee.php">Student List</a>
                                </li>
                                <li>
                                    <a href="sort.php">Grade Processing</a>
                                </li>
                                <?php
                                }
                                }else if($user_type=="admin"){
                                if(strstr($job_title,"RK")){ ?>
                                <li>
                                    <a href="../SIS/student/student_list.php.php">Student List</a>
                                </li>
                                <li>
                                    <a href="../SIS/student/student_return.php">Change Student's Status</a>
                                </li>
                                <li>
                                    <a href="../SIS/student/stu_drp_dwn.php">Assign Section</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu12" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Add Student(s)<span class="caret"></span></a>
                                </li>
                                <ul>
                                    <ul class="nav collapse dropdown-submenu" id="subsubmenu12" role="menu">
                                        <li><a href="../SIS/student/add.php">Add Single Student</a></li>
                                        <li><a href=".php">Add Multiple Students</a></li>
                                    </ul>
                                </ul>
                                <li>
                                    <a href="../SIS/student/stu_drp_dwn.php">Process Grade</a>
                                </li>
                                <?php
                                }
                                
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                        
                    </ul>
                </nav>
                
                <nav class="navbar navbar-default navbar-static-top w3-card-4">
                    <div class="container-full">
                        <button type="button" class="hamburger is-closed fadeInLeft" data-toggle="offcanvas">
                        <span class="hamb hamb-top"></span>
                        <span class="hamb hamb-middle"></span>
                        <span class="hamb hamb-bottom"></span>
                        </button>
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"></button>
                                <a class="navbar-brand w3-card-4" href="#"><img src="img/pnhs_logo.png"></a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <hr class="hidden-sm hidden-md hidden-lg">
                                <ul class="nav navbar-nav">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About Us</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="login.php">Messages</a></li>
                                    <li><a href="login.php">Notifications</a></li>
                                    <li><a href="login.php">Login</a></li>
                                </ul>
                            </div>
                        </div>
                        <hr class="w3-theme-yd2">
                        <hr class="w3-theme-bd2">
                    </div>
                </nav>
                <div class="container-fluid" style="height:10px;max-width:100%;margin-top:0px;margin-right:40px;margin-left:1000px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">   
                <div class="panel-heading">
                    <i class="fa fa-calendar"> &nbsp;
                        <font color="#044e6f">DEADLINE Of SUBMISSION</font>
                    </i>    
                    
                 </div>
                    <div class="w3-container w3-text-blacktheme">     
                        <div class="panel-body">
                         <center>
							
                            <strong><?php
								$ded=mysql_query("Select rp_date from ipcrms_due_date, css_school_yr where css_school_yr.sy_id=ipcrms_due_date.sy_id and css_school_yr.status='active'");
								while($line=mysql_fetch_assoc($ded)){
									echo $line['rp_date'];
								}
								?>
							</strong>
							
                          <BR>(on or before)
                          <br>    
                            <ul class="w3-ul w3-border-top"> 
                          <font color="gray">deadline</font></center>
                        </div> 
                    </div>
                </div>
            </div>
        </div>    
    </div>
<div class="w3-row-padding">
  <div class="w3-card-4">
       <div class="col-md-1">
            <br>
        </div>
      <div class="col-md-10">    
<ul class="w3-ul w3-border-top">
  <li class="w3-theme-bl5">
<br>
    <div align="center"><h7>Individual Performance Commitment and Review Monitoring System</h7></div><br>
        <font size="4">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; is a web-based sytem for the teaching personnel of Pag-asa National High School. This allows the user to fill up the IPCR Form and can be send directly to their department head for checking.
        </font>        
        <br>
         <br>
  </li>
      <ul class="w3-ul w3-border-top"></ul>
</ul>
      </div>
   </div>
</div>
<br>
<div align="right" class="w3-row-padding">
  <div class="w3-card-4">
       <div class="col-md-2">
            <br>
        </div>
      <div class="col-md-9">
    <?php
		echo '<a href="user_form11.php?id='.$_SESSION['job_code'].'">';
	?>       
		<button1 class="button1"><span>CONTINUE</span></button>
    </button>
    </a>    
      </div>
   </div>
</div>
                <footer class="w3-theme-bd5">
                    <div class="container">
                        <div class="col-lg-3 col-md-3">
                            <h3 class="h3">PNHS</h3>
                            <h6>All Rights Reserved &copy; 2018</h6>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <h1 class="h3">ADDRESS</h1>
                            <h6><b>Pag-asa National Highschool</b><br><span>PNHS Building, Rawis, East Service<br>  Road, Legazpi City, PH 2424</span></h6>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <h3 class="h3">CONTACT US</h3>
                            <h6 class="w3-justify">
                            <b>Phone:</b>
                            <span>(+632) 887-2232</span>
                            <br>
                            <b>E-mail:</b>
                            <span>officialpnhs@pnhs.gov.ph</span>
                            <br>
                            </h6>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <h3 class="h3">FOLLOW US ON:</h3>
                            <a href="#"><i class="fa fa-bullseye w3-xlarge" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-phone w3-xlarge" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-facebook w3-xlarge" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter w3-xlarge" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-google-plus w3-xlarge" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </footer>
            </div>
            <script src='js/jquery.min.js'></script>
            <script src='js/bootstrap.min.js'></script>
            <script  src="js/index.js"></script>
        </body>
    </html>