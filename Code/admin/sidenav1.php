<nav class="navbar navbar-inverse navbar-fixed-top navigation-side" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar scrollbar sidebar-nav" id="style-4">
        <li class="sidebar-brand">                       
            <a href="#">
                Menu
                <button type="button" class="hamburger is-closed hamburger-side" data-toggle="offcanvas">
                <span class="hamb hamb-top"></span>
                <span class="hamb hamb-middle"></span>
                <span class="hamb hamb-bottom"></span>
                </button>
            </a>
        </li>
        <li>
            <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
        </li>
        <!-- CSS -->
            <?php 
                if($css_priv=="1"){ ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-fw fa-plus" aria-expanded="false"></i>Class<br>Scheduling<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu1">
            <?php
                    if($user_type=="admin"){
                        if($emp_type=="Teaching"){
            ?>  
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu13" aria-expanded="false"><i class="fa fa-calendar" aria-expanded="false"></i>Schedule<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu13" role="menu">
                    <?php
                        if(!empty($_SESSION['sy'])){
                          echo'
                          <li><a data-toggle="tooltip" data-placement="right" title="Creates a new school year" href="modules/css/admin/index.php"><i class="fa fa-circle-o"></i> Create</a></li>';
                        }else{
                          echo'
                          <li><a data-toggle="modal" data-target="#school_year" href="modules/css/admin/index.php" onclick="check_sy(this.value)"><i class="fa fa-circle-o"></i> Create</a></li>';
                        }
                    ?>
                    <li><a data-toggle="tooltip" data-placement="right" title="Remove/Adds sections every year level" href="modules/css/admin/list_sections.php"><i class="fa fa-circle-o"></i> Sections</a></li>
                    <li><a data-toggle="tooltip" data-placement="right" title="Assign teachers to their respective advisory classes" href="modules/css/admin/adviser.php"><i class="fa fa-circle-o"></i> Assign Adviser</a></li>
                    <li><a  data-toggle="tooltip" data-placement="right" title="For viewing every teacher's load"  href="modules/css/admin/teacher_loads.php"><i class="fa fa-circle-o"></i> Teacher Loads</a></li>

                </ul>
            </ul>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu14" aria-expanded="false"><i class="fa fa-files-o" aria-expanded="false"></i>View Schedule<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu14" role="menu">
                    <li><a data-toggle="tooltip" data-placement="right" title="View schedules per year level"  href="modules/css/admin/year_level.php"><i class="fa fa-circle-o"></i> Year Level</a></li>
                    <li><a data-toggle="tooltip" data-placement="right" title="View schedules per department" href="modules/css/admin/department.php"><i class="fa fa-circle-o"></i> Department</a></li>
                </ul>
            </ul>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu15" aria-expanded="false"><i class="fa fa-book" aria-expanded="false"></i>School Year<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu15" role="menu">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu3" aria-expanded="false">
                            <i class="fa fa-check" aria-expanded="false"></i>Active<span class="caret"></span>
                        </a>
                    </li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu3" role="menu">
                            <?php
									$active = 0;
									foreach ($sy as $key) {
										if($key['status']=='active'){
											echo '<li ><a href="modules/css/admin/year_level.php" title="View schedule for S.Y. '.$key['year'].'."><i class="fa fa-circle-o"></i>'; 
											echo ' S.Y. '.$key['year'].'</a></li>';
											$active = 1;
										}
									}
									if ($active != 1) {
										echo '<li style="color:#8aa4af">&nbsp;&nbsp;No active schedule</li>';
									}
									?>
                        </ul>
                    </ul>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu4" aria-expanded="false">
                            <i class="fa fa-fw fa-list" aria-expanded="false"></i>History<span class="caret"></span>
                        </a>
                    </li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu4" role="menu">
                            <?php
									$history = 0;
									foreach ($sy as $key) {
										if($key['status']=='inactive'){
											echo '<li><a href="modules/css/admin/history/year_level.php?yr='.$key['sy_id'].'" title="View schedule for S.Y. '.$key['year'].'."><i class="fa fa-circle-o"></i> S.Y. '.$key['year'].'</a></li>';
											$history = 1;
										}
									}
									if ($history != 1) {
										echo '<li ><a>No history schedules</a></li>';
									}
									?>
                        </ul>
                    </ul>
                </ul>
            </ul>    
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu16" aria-expanded="false"><i class="fa fa-gear" aria-expanded="false"></i>Options<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu16" role="menu">
                    <li><a data-toggle="tooltip" data-placement="right" title="Assigns Teachers to their respective subject"  href="modules/css/admin/manage.php"><i class="fa fa-circle-o"></i> School Year</a></li>
                    <li><a data-toggle="tooltip" data-placement="right" title="Assigns Teachers to their respective subject"  href="modules/css/admin/assign_teacher.php"><i class="fa fa-circle-o"></i> Assign Teachers</a></li>
                    <li><a data-toggle="tooltip" data-placement="right" title="Remove/Adds subject every year level" href="modules/css/admin/subjects.php"><i class="fa fa-circle-o"></i> Subjects</a></li>

                </ul>
            </ul>
            <?php 
                        }else if($user_type=="User"){ ?>
                <li>
                    <a href="modules/CSS/admin/teacher.php" >View Schedule</a>
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
                    if(strstr($job_title,"HRM") || strstr($job_title,"ICTD")){
        ?>      
            <li>
                <a href="modules/dms/admin/doc.php"><i class="fa fa-fw fa-file-o"></i>Documents</a>
            </li>
            <li>
                <a href="modules/dms/admin/inbox.php"><i class="fa fa-fw fa-envelope-o"></i>Inbox</a>
            </li>
            <li>
                <a href="modules/dms/admin/messagereport.php"><i class="fa fa-fw fa-pencil-square-o"></i>Message Reports</a>
            </li>
            <li>
                <a href="modules/dms/admin/list.php"><i class="fa fa-fw fa-university"></i>Department Records</a>
            </li>
            <li>
                <a href="modules/dms/admin/archiving.php"><i class="fa fa-fw fa-archive"></i>Archiving</a>
            </li>
        <?php 
                    }else if($emp_type=="Teaching" || $emp_type=="Non Teaching"){ ?>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i> Documents<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu" role="menu">
                    <li><a href="modules/dms/user/form.php?dc=pds">Personal Data Sheet</a></li>
                    <?php if($emp_type=="Teaching"){ 
                            if(strstr($job_title,"HTEACH")){ ?>
                    <li><a href="modules/dms/user/form.php?dc=fi">Employee List</a></li>
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
                            <li><a href="modules/dms/user/form.php?dc=sf1">School File One</a></li>
                            <li><a href="modules/dms/user/form.php?dc=sf5">School File Five</a></li>
                        </ul>
                    </ul>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu1" aria-expanded="false">
                            Grade Files<span class="caret"></span>
                        </a>
                    </li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu1" role="menu">
                            <li><a href="modules/dms/user/form.php?dc=mg">Master Grading Sheet</a></li>
                            <li><a href="modules/dms/user/form.php?dc=qg">Quarterly Grades</a></li>
                        </ul>
                    </ul>
                    <?php } ?>
                </ul>
            </ul>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu19" aria-expanded="false"><i class="fa fa-fw fa-paper-plane-o"></i>Document Requests<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu19" role="menu">
                    <li>
                        <a href="modules/dms/user/add.php">Create Request</a>
                    </li>
                    <li>
                        <a href="modules/dms/user/inbox.php">Request Response</a>
                    </li>

                </ul>
            </ul>
            <li>
                <a href="modules/dms/user/messagereport.php"><i class="fa fa-fw fa-list"></i>Message Reports</a>
            </li>
        <?php
                    }
                }else if($emp_type=="Teaching" || $emp_type=="Non Teaching"){ ?>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i> Documents<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu" role="menu">
                    <li><a href="modules/dms/user/form.php?dc=pds">Personal Data Sheet</a></li>
                    <?php if($emp_type=="Teaching"){ 
                            if(strstr($job_title,"HTEACH")){ ?>
                    <li><a href="modules/dms/user/form.php?dc=fi">Employee List</a></li>
                    <?php
                            }
                    ?>
                    <li><a href="modules/dms/user/form.php?dc=sr">Service Records</a></li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu" aria-expanded="false">
                            School File<span class="caret"></span>
                        </a>
                    </li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu" role="menu">
                            <li><a href="modules/dms/user/form.php?dc=sf1">School File One</a></li>
                            <li><a href="modules/dms/user/form.php?dc=sf5">School File Five</a></li>
                        </ul>
                    </ul>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu1" aria-expanded="false">
                            Grade Files<span class="caret"></span>
                        </a>
                    </li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu1" role="menu">
                            <li><a href="modules/dms/user/form.php?dc=mg">Master Grading Sheet</a></li>
                            <li><a href="modules/dms/user/form.php?dc=qg">Quarterly Grades</a></li>
                        </ul>
                    </ul>
                    <?php } ?>
                </ul>
            </ul>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu19" aria-expanded="false"><i class="fa fa-fw fa-paper-plane-o"></i>Document Requests<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu19" role="menu">
                    <li>
                        <a href="modules/dms/user/add.php">Create Request</a>
                    </li>
                    <li>
                        <a href="modules/dms/user/inbox.php">Request Response</a>
                    </li>

                </ul>
            </ul>
            <li>
                <a href="modules/dms/user/messagereport.php"><i class="fa fa-fw fa-list"></i>Message Reports</a>
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
                            <a href="modules/oes/exam.php?tab=1">Create Exam</a>
                        </li>
                        <li>
                            <a href="modules/oes/exam.php?tab=2">Manage Exam</a>
                        </li>
                        <li>
                            <a href="modules/oes/report.php?tab=6">Exam Result</a>
                        </li>
                        <li>
                            <a href="modules/oes/report.php?tab=7">Result Chart</a>
                        </li>

                    </ul>
                </ul>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu3" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Question Bank<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu3" role="menu">
                        <li>
                        <a href="modules/oes/question.php?tab=4">Create Question</a>
                    </li>
                    <li>
                        <a href="modules/oes/question.php?tab=5">Manage Questions</a>
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
                if($ipcr_priv=="1"){
                    if($emp_type=="Teaching"){
                        if(strstr($job_title,"HTEACH")){
            ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu4"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>Evaluation<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu4">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu4" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>View Updated Form<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu4" role="menu">
                        <li>
                            <a href="modules/ipcrm/admin_DH/view_formMasterTeacher.php">Master Teacher</a>
                        </li>
                        <li>
                            <a href="modules/ipcrm/admin_DH/view_formTeacher.php">Teacher</a>
                        </li>
                    </ul>
                </ul>
                <li>
                    <a href="modules/ipcrm/admin_DH/ipcrms_trans_rec.php">Request List</a>
                </li>
                <li>
                    <a href="modules/ipcrm/admin_DH/ipcrms_rating.php">Department Rating</a>
                </li>
            </ul>
        </li>    
            <?php 
                        }else if(strstr($job_title,"TCH") || strstr($job_title,"INST") || strstr($job_title,"ICTD")){ ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu4"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>Evaluation<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu4">
                <li>
                    <a href="modules/ipcrm/user_form11.php">IPCR Form</a>
                </li>   
            </ul>
        </li>
            <?php
                        }                 
                    }else if($job_title=="SP1" || $job_title=="SP2" || $job_title=="SP3"){ ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu4"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>Evaluation<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu4">    
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu24" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>View Form<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu24" role="menu">
                        <li>
                            <a href="modules/ipcrm/admin_SH/view_formMasterTeacher.php">Master Teacher</a>
                        </li>
                        <li>
                            <a href="modules/ipcrm/admin_SH/view_formTeacher.php">Teacher</a>
                        </li>
                    </ul>
                </ul>
                <li>
                    <a href="modules/ipcrm/admin_SH/ipcrms_update.php">Update Form</a>
                </li>
                <li>
                    <a href="modules/ipcrm/admin_SH/ipcrms_rating.php">Overall Rating</a>
                </li>
                <li>
                    <a href="modules/ipcrm/admin_SH/ipcrms_monitor.php">Submissions</a>
                </li>
                <li>
                    <a href="modules/ipcrm/admin_SH/ipcrms_trans_rec.php">Reports</a>
                </li>
                <li>
                    <a href="modules/ipcrm/admin_SH/ipcrms_trans_rec.php">Set Deadline</a>
                </li>
            </ul>
        </li>
            <?php
                    }       
                }
            ?>

        <!-- PIMS -->
            <?php 
                if($pims_priv=="1"){ ?>
        
            <?php
                    if($emp_type=="Teaching"){
                        if(strstr($job_title,"ICTD")){
            ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu5"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>Personnel Management<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu5">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu6" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Manage Personnel<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu6" role="menu">
                        <li>
                            <a href="modules/pims/admin/add_personnel.php">Add Personnel</a>
                        </li>
                        <li>
                            <a href="modules/pims/admin/update_personnel1.php">Update Personnel Info</a>
                        </li>
                    </ul>
                </ul>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu5" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Generate Reports<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu5" role="menu">
                        <li>
                            <a href="modules/pims/admin/teaching.php">Teaching Faculty</a>
                        </li>
                        <li>
                            <a href="modules/pims/admin/non_teaching.php">Non-Teaching Faculty</a>
                        </li>
                        <li>
                            <a href="modules/pims/admin/on_leave_list.php">On-Leave Personnel</a>
                        </li>
                    </ul>
                </ul>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu7" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Leave Application History<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu7" role="menu">
                        <li>
                            <a href="modules/pims/admin/leave_applicants.php">Pending</a>
                        </li>
                        <li>
                            <a href="modules/pims/admin/approved_applicants.php">Approved</a>
                        </li>
                        <li>
                            <a href="modules/pims/admin/disapproved_applicants.php">Disapproved</a>
                        </li>
                        <li>
                            <a href="modules/pims/admin/approved_applicants.php">Cancelled by Applicants</a>
                        </li>
                    </ul>
                </ul>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu8" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Profile Update Application<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu8" role="menu">
                        <li>
                            <a href="modules/PIMS/admin/profile_updates_pending.php">Pending</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu2" aria-expanded="false">
                                History<span class="caret"></span>
                            </a>
                        </li>
                        <ul>
                            <ul class="nav collapse dropdown-submenu" id="subsubsubmenu2" role="menu">
                                <li>
                                    <a href="modules/pims/admin/.._approved.php">Approved</a>
                                </li>
                                <li>
                                    <a href="modules/pims/admin/.._disapproved.php">Disapproved</a>
                                </li>
                            </ul>
                        </ul>
                        <li>

                    </ul>
                </ul>
            </ul>
        </li>
            <?php 
                        }else if(strstr($job_title,"SECSP")){ ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu5"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>Personnel Management<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu5">    
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu25" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>View Form<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu25" role="menu">
                        <li>
                            <a href="modules/pims/admin2/view_formMasterTeacher.php">Master Teacher</a>
                        </li>
                        <li>
                            <a href="modules/pims/admin2/view_formTeacher.php">Teacher</a>
                        </li>
                    </ul>
                </ul>
                <li>
                    <a href="modules/pims/admin2/ipcrms_update.php">Update Form</a>
                </li>
                <li>
                    <a href="modules/pims/admin2/ipcrms_rating.php">Overall Rating</a>
                </li>
                <li>
                    <a href="modules/pims/admin2/ipcrms_monitor.php">Submissions</a>
                </li>
                <li>
                    <a href="modules/pims/admin2/ipcrms_trans_rec.php">Reports</a>
                </li>
                <li>
                    <a href="modules/pims/admin2/ipcrms_trans_rec.php">Set Deadline</a>
                </li>
            </ul>
        </li>
            <?php

                    }
            ?>            
            <?php        
                }
                }
            ?>

        <!-- IMS -->
            <?php 
                if($ims_priv=="1"){ ?>

            <?php
                    if($job_title=="SUO1"){
            ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu6"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>Inventory<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu6">    
                <li>
                    <a href="modules/IPMS/IMS/pages/borrowed.php">Borrowed Items</a>
                </li>    
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu9" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Storage<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu9" role="menu">
                        <li><a href="modules/ipms/ims/pages/inspection.php">Add Items</a></li>
                        <li><a href="modules/ipms/ims/pages/equip.php">Equipment</a></li>
                        <li><a href="modules/ipms/ims/pages/supply.php">Supply</a></li>
                        <li><a href="modules/ipms/ims/pages/building.php">Buildings</a></li>
                    </ul>
                </ul>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu10" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Charts<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu10" role="menu">
                        <li><a href="modules/ipms/ims/pages/bcequip.php">Equipment Chart</a></li>
                        <li><a href="modules/ipms/ims/pages/bcsupply.php">Supply Chart</a></li>
                        <li><a href="modules/ipms/ims/pages/bcbuilding.php">Building Chart</a></li>
                    </ul>
                </ul>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu26" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Reports<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu26" role="menu">
                        <li><a href="modules/ipms/ims/pages/annreport.php">Storage Report</a></li>
                        <li><a href="modules/ipms/ims/pages/bldgreport.php">Building Report</a></li>
                        <li><a href="modules/ipms/ims/pages/borrowreport.php">Borrowed Items Report</a></li>
                        <li><a href="modules/ipms/ims/pages/equiphistory.php">Transaction History Report</a></li>
                    </ul>
                </ul>
            </ul>
        </li>          
            <?php 
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
                    if($job_title=="SUO1"){
            ?>   
            <li>
                <a href="modules/ipms/pms/admin/ris_page.php">RIS</a>
            </li>
            <li>
                <a href="modules/ipms/pms/admin/pr.php">Purchase Request</a>
            </li>
            <li>
                <a href="modules/ipms/pms/admin/po.php">Purchase Order</a>
            </li>
            <li>
                <a href="modules/ipms/pms/admin/delivery.php">Delivery</a><!-- Lahat ng about sa delivery -->
            </li>
            <li>
                <a href="modules/ipms/pms/admin/supplier.php">Supplier</a>
            </li>
            <li>
             <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu17" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Reports<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu17" role="menu">
                    <li><a href="modules/ipms/pms/admin/risrec.php">RIS RECORDS</a></li>
                    <li><a href="modules/ipms/pms/admin/pr_rec.php">PR RECORDS</a></li>
                    <li><a href="modules/ipms/pms/admin/po_rec.php">PO RECORDSt</a></li>
                    <li><a href="modules/ipms/pms/admin/iar.php">IAR RECORDS</a></li>
                </ul>
            </ul>
            <?php 
                        }else if($job_title=="SP1" || $job_title=="SP2" || $job_title=="SP3"){ ?>  
            <li>
             <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu18" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Requests<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu18" role="menu">
                    <li><a href="modules/ipms/pms/admin1/ris_request.php">RIS Requests</a></li>
                    <li><a href="modules/ipms/pms/admin1/requests.php">PR Requests</a></li>
                    <li><a href="modules/ipms/pms/admin1/po_request.php">PO Requests</a></li>
                </ul>
            </ul>
            <li>
                <a href="modules/ipms/pms/admin1/report.php">Reports</a>
            </li>
            <?php
                        }else if($emp_type=="Teaching" || $emp_type=="Non Teaching"){ ?>
            <li>
                <a href="modules/ipms/pms/USER/requi.php">Request Item</a>
            </li>
            <li>
                <a href="modules/ipms/pms/USER/trans.php">Transaction Records</a>
            </li>   
            <?php 
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
                <li>
                    <a href="modules/prs/AdminB/employee.php">Employee Masterlist</a><!-- Equipment,Supply,Add item,borrowed items-->
                </li>
                <li>
                    <a href="modules/prs/AdminB/sort.php">Summary Record</a><!-- Lahat ng about sa bldgs -->
                </li>
            </ul>
        </li>         
            <?php 
                    }else if(strstr($job_title,"REG") || strstr($job_title,"CASH")){ ?>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-fw fa-dashboard" aria-expanded="false">           </i>PAYROLL<span class="caret"></span></a>
                    <ul class="nav collapse dropdown-menu" role="menu" id="submenu1">
                        <li>
                            <a href="../employee.php"><i class="fa fa-user"></i> <span>EMPLOYEE</span> </a>
                        </li>
                        <li>
                            <a href="modules/prs/admin/payrollrep.php?gen=1">Generate Payroll</a>
                        </li>
                        <li>
                            <a href="modules/prs/admin/payrollrep.php"><i class="fa fa-fw fa-circle-o"></i>Month's Report</a><!-- Equipment,Supply,Add item,borrowed items-->
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu2"><i class="fa fa-fw fa-list-alt" aria-expanded="false"></i>Table<span class="caret"></span></a>
                        </li>
                        <ul>
                            <ul class="nav collapse dropdown-menu" role="menu" id="submenu2">

                                <li>
                                        <a href="modules/prs/admin/tax.php"><i class="fa fa-fw fa-circle-o"></i>Tax</a>
                                </li>
                                <li>
                                        <a href="modules/prs/admin/ph_table.php"><i class="fa fa-fw fa-circle-o"></i>PhilHealth</a>
                                </li>
                                <li>
                                        <a href="modules/prs/admin/sal_mem.php"><i class="fa fa-fw fa-circle-o"></i>Salary Memo</a>
                                </li>
                             </ul>
                        </ul>
                        <li><a href="modules/prs/admin/setting.php"><i class="fa fa-gear"></i> <span>SETTING</span></a></li>

                        <li><a href="modules/prs/admin/report.php"><i class="fa fa-th-list"></i> <span>REPORT</span></a></li>
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
                    <a href="modules/scms/pages/admin/daily.php">Daily Visit Log</a>
                </li>
                <li>
                    <a href="modules/scms/pages/admin/patient.php">Patient Records</a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu11" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Medical Records<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu11" role="menu">
                        <li><a href="modules/scms/pages/admin/student.php">Student</a></li>
                        <li><a href="modules/scms/pages/admin/personnel.php">Personnel</a></li>
                    </ul>
                </ul>  
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu12" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Manage<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu12" role="menu">
                        <li><a href="modules/scms/pages/admin/mse.php">Medicines</a></li>
                        <li><a href="modules/scms/pages/admin/supplies.php">Supplies</a></li>
                        <li><a href="modules/scms/pages/admin/equipment.php">Equipment</a></li>
                    </ul>
                </ul> 
                <li>
                    <a href="modules/scms/admin/pages/reports.php">Reports</a>
                </li>
                <li>
                    <a href="modules/scms/admin/pages/support.php">Support</a>
                </li>   
            <?php    
                        }else if($emp_type=="Teaching"){
                            if($dept=="7"){ ?>   
                <li>
                    <a href="modules/scms/pages/mapeh/index.php">Medical Records</a>
                </li>
                <li>
                    <a href="modules/scms/pages/mapeh/medhist_pers.php">My Medical Record</a>
                </li>
                <li>
                    <a href="modules/scms/pages/mapeh/consult_history.php">Consultation History</a>
                </li>    
            <?php                    
                            }else{ ?>
                <li>
                    <a href="modules/scms/pages/stuper/index.php">Medical Record</a>
                </li>
                <li>
                    <a href="modules/scms/pages/stuper/consult_hist.php">Medical History</a>
                </li>
            <?php
                            }
                        }else if($emp_type=="Non Teaching"){ ?>
                <li>
                    <a href="modules/scms/pages/stuper/index.php">Medical Record</a>
                </li>
                <li>
                    <a href="modules/scms/pages/stuper/consult_hist.php">Medical History</a>
                </li> 
            <?php                
                        }  
                    }else if($emp_type=="Teaching" || $emp_type=="Non Teaching" ){ ?>
                <li>
                    <a href="modules/scms/pages/stuper/index.php">Medical Record</a>
                </li>
                <li>
                    <a href="modules/scms/pages/stuper/consult_hist.php">Medical History</a>
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
                        if(strstr($job_title,"TCH") || strstr($job_title,"HTEACH") || strstr($job_title,"INST") || strstr($job_title,"ICTD")){
            ?>    
            <li>
                <a href="modules/SIS/teacher/student_list.php">Student List</a>
            </li>
            <?php 
                        }
                    }else if(strstr($job_title,"RK")){ ?>   
            <li>
                <a href="modules/SIS/student/student_list.php">Student List</a>
            </li>
            <li>
                <a href="modules/SIS/student/student_return.php">Change Student's Status</a>
            </li>
            <li>
                <a href="modules/SIS/student/stu_drp_dwn.php">Assign Section</a>
            </li>
            <li>
                <a href="modules/SIS/student/student_list.php?m=1">Add Student(s)</a>
            </li>
            <li>
                <a href="modules/SIS/student/student_list.php?m=2">Process Grade</a>
            </li>    
            <?php    
                    }    
            ?>
            </ul>
        </li>      
            <?php        
                }
            ?>

    </ul>
</nav>
        