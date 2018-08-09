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
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu13" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Schedule<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu13" role="menu">
                    <li>
                        <a href="../../css/admin/index.php">Create Schedule</a>
                    </li>
                    <li>
                        <a href="../../css/admin/list_sections.php">Sections</a>
                    </li>
                    <li>
                        <a href="../../css/admin/adviser.php">Assign Adviser</a>
                    </li>
                    <li>
                        <a href="../../css/admin/teacher_loads.php">Teacher Loads</a>
                    </li>

                </ul>
            </ul>
                <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu14" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>View Schedule<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu14" role="menu">
                    <li>
                        <a href="../../css/admin/year_level.php">Year Level</a>
                    </li>
                    <li>
                        <a href="../../css/admin/department.php">Department</a>
                    </li>
                </ul>
            </ul>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu15" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>School Year<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu15" role="menu">
                    <li>
                        <a href="../../css/admin/year_level.php">Active</a>
                    </li>
                    <li>
                        <a href="../../css/admin/history/year_level.php">History</a>
                    </li>
                </ul>
            </ul>    
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu16" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Options<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu16" role="menu">
                    <li>
                        <a href="../../css/admin/edit_sched.php">Edit Schedule</a>
                    </li>
                    <li>
                        <a href="../../css/admin/assign_teacher.php">Assign Teacher</a>
                    </li>
                    <li>
                        <a href="../../css/admin/subjects.php">Subjects</a>
                    </li>

                </ul>
            </ul>
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
                <a href="doc.php"><i class="fa fa-fw fa-file-o"></i>Documents</a>
            </li>
            <li>
                <a href="inbox.php"><i class="fa fa-fw fa-envelope-o"></i>Inbox</a>
            </li>
            <li>
                <a href="messagereport.php"><i class="fa fa-fw fa-pencil-square-o"></i>Message Reports</a>
            </li>
            <li>
                <a href="list.php"><i class="fa fa-fw fa-university"></i>Department Records</a>
            </li>
            <li>
                <a href="archiving.php"><i class="fa fa-fw fa-archive"></i>Archiving</a>
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
                    <li><a href="../user/form.php?dc=fi">Employee List</a></li>
                    <?php
                            }
                    ?>
                    <li><a href="../user/form.php?dc=sr">Service Records</a></li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu" aria-expanded="false">
                            School File<span class="caret"></span>
                        </a>
                    </li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu" role="menu">
                            <li><a href="../user/form.php?dc=sf1">School File One</a></li>
                            <li><a href="../user/form.php?dc=sf5">School File Five</a></li>
                        </ul>
                    </ul>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu1" aria-expanded="false">
                            Grade Files<span class="caret"></span>
                        </a>
                    </li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu1" role="menu">
                            <li><a href="../user/form.php?dc=mg">Master Grading Sheet</a></li>
                            <li><a href="../user/form.php?dc=qg">Quarterly Grades</a></li>
                        </ul>
                    </ul>
                    <?php } ?>
                </ul>
            </ul>
            <li>
                <a href="../user/add.php"><i class="fa fa-fw fa-paper-plane-o"></i>Document Request</a>
            </li>
        <?php
                    }
                }else if($emp_type=="Teaching" || $emp_type=="NON Teaching"){ ?>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i> Documents<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu" role="menu">
                    <li><a href="../user/form.php?dc=pds">Personal Data Sheet</a></li>
                    <?php if($emp_type=="Teaching"){ 
                            if(strstr($job_title,"HTEACH")){ ?>
                    <li><a href="../user/form.php?dc=fi">Employee List</a></li>
                    <?php
                            }
                    ?>
                    <li><a href="../user/form.php?dc=sr">Service Records</a></li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu" aria-expanded="false">
                            School File<span class="caret"></span>
                        </a>
                    </li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu" role="menu">
                            <li><a href="../user/form.php?dc=sf1">School File One</a></li>
                            <li><a href="../user/form.php?dc=sf5">School File Five</a></li>
                        </ul>
                    </ul>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu1" aria-expanded="false">
                            Grade Files<span class="caret"></span>
                        </a>
                    </li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu1" role="menu">
                            <li><a href="../user/form.php?dc=mg">Master Grading Sheet</a></li>
                            <li><a href="../user/form.php?dc=qg">Quarterly Grades</a></li>
                        </ul>
                    </ul>
                    <?php } ?>
                </ul>
            </ul>
            <li>
                <a href="../user/add.php"><i class="fa fa-fw fa-paper-plane-o"></i>Document Request</a>
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
                            <a href="../../oes/exam.php?tab=1">Create Exam</a>
                        </li>
                        <li>
                            <a href="../../oes/exam.php?tab=2">Manage Exam</a>
                        </li>
                        <li>
                            <a href="../../oes/report.php?tab=6">Exam Result</a>
                        </li>
                        <li>
                            <a href="../../oes/report.php?tab=7">Result Chart</a>
                        </li>

                    </ul>
                </ul>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu3" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Question Bank<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu3" role="menu">
                        <li>
                        <a href="../../oes/question.php?tab=4">Create Question</a>
                    </li>
                    <li>
                        <a href="../../oes/question.php?tab=5">Manage Questions</a>
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
                            <a href="../../ipcrm/admin_DH/view_formMasterTeacher.php">Master Teacher</a>
                        </li>
                        <li>
                            <a href="../../ipcrm/admin_DH/view_formTeacher.php">Teacher</a>
                        </li>
                    </ul>
                </ul>
                <li>
                    <a href="../../ipcrm/admin_DH/ipcrms_trans_rec.php">Request List</a>
                </li>
                <li>
                    <a href="../../ipcrm/admin_DH/ipcrms_rating.php">Department Rating</a>
                </li>

            <?php 
                        }else if(strstr($job_title,"TCH") || strstr($job_title,"HTEACH") || strstr($job_title,"INST")){ ?>
                <li>
                    <a href="../../ipcrm/user_form11.php">IPCR Form</a>
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
                            <a href="../../ipcrm/admin_SH/view_formMasterTeacher.php">Master Teacher</a>
                        </li>
                        <li>
                            <a href="../../ipcrm/admin_SH/view_formTeacher.php">Teacher</a>
                        </li>
                    </ul>
                </ul>
                <li>
                    <a href="../../ipcrm/admin_SH/ipcrms_update.php">Update Form</a>
                </li>
                <li>
                    <a href="../../ipcrm/admin_SH/ipcrms_rating.php">Overall Rating</a>
                </li>
                <li>
                    <a href="../../ipcrm/admin_SH/ipcrms_monitor.php">Submissions</a>
                </li>
                <li>
                    <a href="../../ipcrm/admin_SH/ipcrms_trans_rec.php">Reports</a>
                </li>
                <li>
                    <a href="../../ipcrm/admin_SH/ipcrms_trans_rec.php">Set Deadline</a>
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
                            <a href="../../pims/admin/add_personnel.php">Add Personnel</a>
                        </li>
                        <li>
                            <a href="../../pims/admin/update_personnel1.php">Update Personnel Info</a>
                        </li>
                    </ul>
                </ul>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu5" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Generate Reports<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu5" role="menu">
                        <li>
                            <a href="../../pims/admin/teaching.php">Teaching Faculty</a>
                        </li>
                        <li>
                            <a href="../../pims/admin/non_teaching.php">Non-Teaching Faculty</a>
                        </li>
                        <li>
                            <a href="../../pims/admin/on_leave_list.php">On-Leave Personnel</a>
                        </li>
                    </ul>
                </ul>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu7" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Leave Application History<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu7" role="menu">
                        <li>
                            <a href="../../pims/admin/leave_applicants.php">Pending</a>
                        </li>
                        <li>
                            <a href="../../pims/admin/approved_applicants.php">Approved</a>
                        </li>
                        <li>
                            <a href="../../pims/admin/disapproved_applicants.php">Disapproved</a>
                        </li>
                        <li>
                            <a href="../../pims/admin/approved_applicants.php">Cancelled by Applicants</a>
                        </li>
                    </ul>
                </ul>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu8" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Profile Update Application<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu8" role="menu">
                        <li>
                            <a href="../../PIMS/admin/profile_updates_pending.php">Pending</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu2" aria-expanded="false">
                                History<span class="caret"></span>
                            </a>
                        </li>
                        <ul>
                            <ul class="nav collapse dropdown-submenu" id="subsubsubmenu2" role="menu">
                                <li>
                                    <a href="../../pims/admin/.._approved.php">Approved</a>
                                </li>
                                <li>
                                    <a href="../../pims/admin/.._disapproved.php">Disapproved</a>
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
                            <a href="../../pims/admin2/view_formMasterTeacher.php">Master Teacher</a>
                        </li>
                        <li>
                            <a href="../../pims/admin2/view_formTeacher.php">Teacher</a>
                        </li>
                    </ul>
                </ul>
                <li>
                    <a href="../../pims/admin2/ipcrms_update.php">Update Form</a>
                </li>
                <li>
                    <a href="../../pims/admin2/ipcrms_rating.php">Overall Rating</a>
                </li>
                <li>
                    <a href="../../pims/admin2/ipcrms_monitor.php">Submissions</a>
                </li>
                <li>
                    <a href="../../pims/admin2/ipcrms_trans_rec.php">Reports</a>
                </li>
                <li>
                    <a href="../../pims/admin2/ipcrms_trans_rec.php">Set Deadline</a>
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
                    <a href="../../IPMS/IMS/pages/borrowed.php">Borrowed Items</a>
                </li>    
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu9" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Storage<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu9" role="menu">
                        <li><a href="../../ipms/ims/pages/inspection.php">Add Items</a></li>
                        <li><a href="../../ipms/ims/pages/equip.php">Equipment</a></li>
                        <li><a href="../../ipms/ims/pages/supply.php">Supply</a></li>
                        <li><a href="../../ipms/ims/pages/building.php">Buildings</a></li>
                    </ul>
                </ul>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu10" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Charts<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu10" role="menu">
                        <li><a href="../../ipms/ims/pages/bcequip.php">Equipment Chart</a></li>
                        <li><a href="../../ipms/ims/pages/bcsupply.php">Supply Chart</a></li>
                        <li><a href="../../ipms/ims/pages/bcbuilding.php">Building Chart</a></li>
                    </ul>
                </ul>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu10" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Reports<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu10" role="menu">
                        <li><a href="../../ipms/ims/pages/annreport.php">Storage Report</a></li>
                        <li><a href="../../ipms/ims/pages/bldgreport.php">Building Report</a></li>
                        <li><a href="../../ipms/ims/pages/borrowreport.php">Borrowed Items Report</a></li>
                        <li><a href="../../pages/equiphistory.php">Transaction History Report</a></li>
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
                <a href="../admin/ris_page.php">RIS</a>
            </li>
            <li>
                <a href="../admin/pr.php">Purchase Request</a>
            </li>
            <li>
                <a href="../admin/po.php">Purchase Order</a>
            </li>
            <li>
                <a href="../admin/delivery.php">Delivery</a><!-- Lahat ng about sa delivery -->
            </li>
            <li>
                <a href="../admin/supplier.php">Supplier</a>
            </li>
            <li>
                <a href="../admin/records.php">Records</a><!-- Lahat ng about sa records -->
            </li>
            <?php 
                        }else if(strstr($job_title,"SP") ){ ?>  
            <li>
                <a href="../admin1/request.php">Requests</a><!-- Lahat ng about sa requests -->
            </li>
            <li>
                <a href="../admin1/reports.php">Reports</a>
            </li>
            <li>
                <a href="../admin1/records.php">Records</a>
            </li>
            <?php
                        }else if($emp_type=="Teaching"){ ?>
            <li>
                <a href="../USER/requi.php">Request Item</a>
            </li>
            <li>
                <a href="../USER/trans.php">Transaction Records</a>
            </li>            
            <?php            
                        }
                    }else if($user_type=="user"){ 
                        if($emp_type=="Teaching"){ ?>
            <li>
                <a href="../USER/requi.php">Request Item</a>
            </li>
            <li>
                <a href="../USER/trans.php">Transaction Records</a>
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
                    <a href="../../prs/AdminB/employee.php">Employee Masterlist</a><!-- Equipment,Supply,Add item,borrowed items-->
                </li>
                <li>
                    <a href="../../prs/AdminB/sort.php">Summary Record</a><!-- Lahat ng about sa bldgs -->
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
                        if(strstr($job_title,"NURS")){ ?>    
                <li>
                    <a href="../../scms/pages/admin/daily.php">Daily Visit Log</a>
                </li>
                <li>
                    <a href="../../scms/pages/admin/patient.php">Patient Records</a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu11" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Medical Records<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu11" role="menu">
                        <li><a href="../../scms/pages/admin/student.php">Student</a></li>
                        <li><a href="../../scms/pages/admin/personnel.php">Personnel</a></li>
                    </ul>
                </ul>  
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu12" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Manage<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu12" role="menu">
                        <li><a href="../../scms/pages/admin/mse.php">Medicines</a></li>
                        <li><a href="../../scms/pages/admin/supplies.php">Supplies</a></li>
                        <li><a href="../../scms/pages/admin/equipment.php">Equipment</a></li>
                    </ul>
                </ul> 
                <li>
                    <a href="../../scms/admin/pages/reports.php">Reports</a>
                </li>
                <li>
                    <a href="../../scms/admin/pages/support.php">Support</a>
                </li>   
            <?php    
                        }else if($emp_type=="Teaching"){
                            if($dept=="7"){ ?>   
                <li>
                    <a href="../../scms/pages/mapeh/index.php">Medical Records</a>
                </li>
                <li>
                    <a href="../../scms/pages/mapeh/medhist_pers.php">My Medical Record</a>
                </li>
                <li>
                    <a href="../../scms/pages/mapeh/consult_history.php">Consultation History</a>
                </li>    
            <?php                    
                            }else{ ?>
                <li>
                    <a href="../../scms/pages/stuper/index.php">Medical Record</a>
                </li>
                <li>
                    <a href="../../scms/pages/stuper/consult_hist.php">Medical History</a>
                </li>
            <?php
                            }
                        }  
                    }else if($emp_type=="Teaching"){ ?>
                <li>
                    <a href="../../scms/pages/stuper/index.php">Medical Record</a>
                </li>
                <li>
                    <a href="../../scms/pages/stuper/consult_hist.php">Medical History</a>
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
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu10"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>Student<br>Management<span class="caret"></span></a>
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
                <a href="../../SIS/student/student_list.php.php">Student List</a>
            </li>
            <li>
                <a href="../../SIS/student/student_return.php">Change Student's Status</a>
            </li>
            <li>
                <a href="../../SIS/student/stu_drp_dwn.php">Assign Section</a>
            </li>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu12" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Add Student(s)<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu12" role="menu">
                    <li><a href="../../SIS/student/add.php">Add Single Student</a></li>
                    <li><a href=".php">Add Multiple Students</a></li>
                </ul>
            </ul>
            <li>
                <a href="../../SIS/student/stu_drp_dwn.php">Process Grade</a>
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
        