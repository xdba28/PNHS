<?php
    if($_SERVER['REQUEST_URI'] == "/PNHSLEA2/LEA/sidenav.php") {
        header('HTTP/1.0 403 Forbidden');
    }else{ ?>
    <link rel="stylesheet" href="../../../css/bin/diy.css">
    <link rel="stylesheet" href="../../../css/metisMenu.min.css">
    <link rel="stylesheet" href="../../../css/sb-admin-2.min.css">
    <link rel="stylesheet" href="../../../css/font-awesome/css/font-awesome.min.css">
    <script src="../../js/backToTop.js"></script>
    <?php 
    $sy = mysqli_query($mysqli, "SELECT * FROM css_school_yr");
?>
    <nav class="navbar-inverse navbar-fixed-top navigation-side" id="sidebar-wrapper" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav scrollbar style-4" id="side-menu">
                <li class="sidebar-brand">
                    <h4><b>Menu</b></h4>
                </li>
                <li>
                    <a href="../../../index.php"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>

                <!-- CMS -->
                <?php 
                if(isset($_SESSION['user_data']['acct']['emp_no']) AND ($_SESSION['user_data']['priv']['superadmin']=="1") ){
                    if($_SESSION['user_data']['priv']['cms_priv'] ) {
                ?>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i>Control Panel<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">
                        <i class="fa fa-fw fa-ravelry"></i> Overall Content<span class="fa arrow"></span>
                    </a>
                            <ul class="nav nav-third-level">
                                <li><a href="../../../admin/news.php"><i class="fa fa-fw fa-newspaper-o"></i>News</a></li>
                                <li><a href="../../../admin/memo.php"><i class="fa fa-fw fa-sticky-note"></i>Memorandum</a></li>
                                <li><a href="../../../admin/calendar.php"><i class="fa fa-fw fa-calendar"></i>Calendar</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-fw fa-image"></i>Gallery<span class="fa arrow"></span></a>
                                    <ul class="nav nav-fourth-level">
                                        <li><a href="../../../admin/edit_projects.php"><i class="fa fa-fw fa-circle-o"></i>Projects</a></li>
                                        <li><a href="../../../admin/documentation.php"><i class="fa fa-fw fa-circle-o"></i>Documentation</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-fw fa-desktop"></i> Site Content<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#"><i class="fa fa-fw fa-ellipsis-v"></i>About Us<span class="fa arrow"></span></a>
                                    <ul class="nav nav-fourth-level">
                                        <li><a href="../../../admin/edit_history.php"><i class="fa fa-fw fa-circle-o"></i>History</a></li>
                                        <li><a href="../../../admin/edit_mission.php"><i class="fa fa-fw fa-circle-o"></i>Mission</a></li>
                                        <li><a href="../../../admin/edit_vision.php"><i class="fa fa-fw fa-circle-o"></i>Vision</a></li>
                                        <li><a href="../../../admin/edit_hymn.php"><i class="fa fa-fw fa-circle-o"></i>Hymn</a></li>
                                        <li><a href="../../../admin/edit_principal.php"><i class="fa fa-fw fa-circle-o"></i>Principal's Corner</a></li>
                                        <li><a href="../../../admin/edit_orgchart.php"><i class="fa fa-fw fa-circle-o"></i>Organizational Chart</a></li>
                                        <li><a href="../../../admin/edit_gpta.php"><i class="fa fa-fw fa-circle-o"></i>GPTA Officers</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-fw fa-info-circle"></i>Programs<span class="fa arrow"></span></a>
                                    <ul class="nav nav-fourth-level">
                                        <li><a href="../../../admin/edit_hs.php"><i class="fa fa-fw fa-circle-o"></i>High School</a></li>
                                        <li><a href="../../../admin/edit_shs.php"><i class="fa fa-fw fa-circle-o"></i>Senior High School</a></li>
                                    </ul>
                                </li>
                                <li><a href="../../../admin/edit_header.php"><i class="fa fa-fw fa-code"></i>Header</a></li>
                                <li><a href="../../../admin/edit_sp.php"><i class="fa fa-fw fa-industry"></i>School Progress</a></li>
                                <li><a href="../../../admin/achievements.php"><i class="fa fa-fw fa-trophy"></i>Achievements</a></li>
                                <li><a href="../../../admin/edit_contacts.php"><i class="fa fa-fw fa-telegram"></i>Contact Us</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user-secret"></i>Account Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li><a href="../../../admin/student_accounts.php"><i class="fa fa-fw fa-circle-o"></i>Student Accounts</a></li>
                                <li><a href="../../../admin/personnel_accounts.php"><i class="fa fa-fw fa-circle-o"></i>Personnel Accounts</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php
                    }
                }
                ?>
                
                <!-- CSS -->
                    <?php 
                        if($_SESSION['user_data']['priv']['css_priv']=="1" || $_SESSION['user_data']['priv']['superadmin']=="1"){ ?>
                <li>
                    <a href="#"><i class="icon-calendar"></i> Class Scheduling<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">  
                        <li>
                            <a href="#"><i class="fa fa-calendar"></i> Class Schedule<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <?php
                                    if (empty($_SESSION['modal'])) {
                                      echo'
                                      <li><a data-toggle="tooltip" data-placement="right" title="Creates a new school year" href="../../css/admin/year_level.php" onclick="modal_session_assign_zero(this.value)"><i class="fa fa-circle-o"></i> Create</a></li>';
                                    }else{
                                      echo'
                                      <li><a data-toggle="tooltip" data-placement="right"href="../../css/admin/year_level.php" title="Creates a new school year" onclick="modal_session_assign_zero(this.value)"><i class="fa fa-circle-o"></i> Create</a></li>';
                                    }
                                ?>
                                <li><a data-toggle="tooltip" data-placement="right" title="Remove/Adds sections every year level" href="../../css/admin/list_sections.php"><i class="fa fa-circle-o"></i> Sections</a></li>
                                <li><a data-toggle="tooltip" data-placement="right" title="Assign teachers to their respective advisory classes" href="../../css/admin/adviser.php"><i class="fa fa-circle-o"></i> Assign Adviser</a></li>
                                <li><a  data-toggle="tooltip" data-placement="right" title="For viewing every teacher's load"  href="../../css/admin/teacher_loads.php"><i class="fa fa-circle-o"></i> Teacher Loads</a></li>
                            </ul>

                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o"></i> View Schedule<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li><a data-toggle="tooltip" data-placement="right" title="View schedules per year level"  href="../../css/admin/year_level.php"><i class="fa fa-circle-o" onclick="modal_dont_show(this.value)"></i> Year Level</a></li>
                                <li><a data-toggle="tooltip" data-placement="right" title="View schedules per department" href="../../css/admin/department.php"><i class="fa fa-circle-o"></i> Department</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book"></i> School Year<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#"><i class="fa fa-check"></i> Active<span class="fa arrow"></span></a>
                                    <ul class="nav nav-fourth-level">
                                        <?php
                                            $active = 0;
                                            foreach ($sy as $key) {
                                                if($key['status']=='active'){
                                                    echo '<li><a href="../../css/admin/year_level.php" title="View schedule for S.Y. '.$key['year'].'."><i class="fa fa-circle-o"></i>'; 
                                                    echo ' S.Y. '.$key['year'].'</a></li>';
                                                    $active = 1;
                                                }
                                            }
                                            if ($active != 1) {
                                                echo '<li style="color:#8aa4af;">&nbsp;&nbsp;No active schedule</li>';
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-fw fa-list"></i> History<span class="fa arrow"></span></a>
                                    <ul class="nav nav-fourth-level">
                                        <?php
                                            $history = 0;
                                            foreach ($sy as $key) {
                                                if($key['status']=='inactive'){
                                                    echo '<li><a href="../../css/admin/history/year_level.php?yr='.$key['sy_id'].'" title="View schedule for S.Y. '.$key['year'].'."><i class="fa fa-circle-o"></i> S.Y. '.$key['year'].'</a></li>';
                                                    $history = 1;
                                                }
                                            }
                                            if ($history != 1) {
                                                echo '<li style="color:#8aa4af;"><a>No history schedules</a></li>';
                                            }
                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>    
                        <li>
                            <a href="#"><i class="fa fa-gear" ></i> Options<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li><a data-toggle="tooltip" data-placement="right" title="Assigns Teachers to their respective subject"  href="../../css/admin/manage.php"><i class="fa fa-circle-o"></i> School Year</a></li>
                                <li><a data-toggle="tooltip" data-placement="right" title="Assigns Teachers to their respective subject"  href="../../css/admin/assign_teacher.php"><i class="fa fa-circle-o"></i> Assign Teachers</a></li>
                                <li><a data-toggle="tooltip" data-placement="right" title="Remove/Adds subject every year level" href="../../css/admin/subjects.php"><i class="fa fa-circle-o"></i> Subjects</a></li>

                            </ul>
                        </li>
                    </ul>
                </li>      
                    <?php        
                        }else if($_SESSION['user_data']['priv']['css_priv']=="0"){ ?>
                <li>
                    <a href="../../CSS/admin/teacher.php"><i class="icon-calendar"></i> View Schedule</a>
                </li>    
                    <?php                
                        }

                    ?>
                <!-- SIS -->
                    <?php 
                    if($_SESSION['user_data']['priv']['sis_priv']=="1" || ($_SESSION['user_data']['priv']['superadmin']=="1" && $_SESSION['user_data']['priv']['sis_priv']=="1") ){ ?>
                <li>
                    <a href="#"><i class="icon-user-check"></i>Student Management<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="../../SIS/student/student_list.php"><i class="fa fa-fw fa-th-list"></i>Student List</a>
                        </li>
                        <li>
                            <a href="../../SIS/student/student_return.php"><i class="fa fa-fw fa-rotate-left"></i>Change Student's Status</a>
                        </li>
                        <li>
                            <a href="../../SIS/student/student_list.php?m=3"><i class="fa fa-fw fa-chain"></i>Assign Section</a>
                        </li>
                        <li>
                            <a href="../../SIS/student/student_list.php?m=1"><i class="fa fa-fw fa-plus"></i>Add Student(s)</a>
                        </li>
                        <li>
                            <a href="../../SIS/student/student_list.php?m=2"><i class="fa fa-fw fa-gear"></i>Process Grade</a>
                        </li>
                        <li>
                            <a href="../../SIS/student/stat.php"><i class="fa fa-fw fa-line-chart"></i>Statistics</a>
                        </li>
                    </ul>
                </li>
                    <?php    
                    }else if($_SESSION['user_data']['priv']['sis_user']=="1"){ ?>
                <li>
                    <a href="#"><i class="icon-user-check"></i>Student Management<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="../../SIS/teacher/student_list.php"><i class="fa fa-fw fa-th-list"></i>Student List</a>
                        </li>
                        <li>
                            <a href="../../SIS/student/stat.php"><i class="fa fa-fw fa-line-chart"></i>Statistics</a>
                        </li>
                    </ul>
                </li>
                    <?php        
                    }     
                    ?>
                <!-- IPCR -->
                <?php 
                    if($_SESSION['user_data']['priv']['ipcrms2_priv']=="1" || ($_SESSION['user_data']['priv']['superadmin']=="1" && $_SESSION['user_data']['priv']['ipcrms2_priv']=="1") ){
                ?>
                    <li>
                        <a href="#"><i class="icon icon-profile"></i>Department Evaluation<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-file"></i>View Updated Form<span class="fa arrow"></span></a>
                                <ul class="nav third-level">
                                    <li>
                                        <a href="../../ipcrm/admin_DH/view_formMasterTeacher.php"><i class="fa fa-circle-o"></i>Master Teacher</a>
                                    </li>
                                    <li>
                                        <a href="../../ipcrm/admin_DH/view_formTeacher.php"><i class="fa fa-circle-o"></i>Teacher</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="../../ipcrm/admin_DH/ipcrms_trans_rec.php"><i class="fa fa-fw fa-bars"></i>Request List</a>
                            </li>
                            <li>
                                <a href="../../ipcrm/admin_DH/ipcrms_rating.php"><i class="fa fa-fw fa-star"></i>Department Rating</a>
                            </li>
                        </ul>
                    </li>    
                <?php 
                    }else if($_SESSION['user_data']['priv']['ipcrms_priv']=="1" || ($_SESSION['user_data']['priv']['superadmin']=="1" && $_SESSION['user_data']['priv']['ipcrms_priv']=="1")){ ?>
                    <li>
                        <a href="#"><i class="icon icon-profile"></i> Faculty Evaluation<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">    
                            <li>
                                <a href="#"><i class="fa fa-fw fa-file"></i>View Form<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="../../ipcrm/admin_SH/view_formMasterTeacher.php"><i class="fa fa-circle-o"></i>Master Teacher</a>
                                    </li>
                                    <li>
                                        <a href="../../ipcrm/admin_SH/view_formTeacher.php"><i class="fa fa-circle-o"></i>Teacher</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="../../ipcrm/admin_SH/ipcrms_update.php"><i class="fa fa-fw fa-refresh"></i>Update Form</a>
                            </li>
                            <li>
                                <a href="../../ipcrm/admin_SH/ipcrms_rating.php"><i class="fa fa-fw fa-star"></i>Overall Rating</a>
                            </li>
                            <li>
                                <a href="../../ipcrm/admin_SH/ipcrms_monitor.php"><i class="fa fa-fw fa-exchange"></i>Submissions</a>
                            </li>
                            <li>
                                <a href="../../ipcrm/admin_SH/ipcrms_trans_rec.php"><i class="fa fa-fw fa-list"></i>Reports</a>
                            </li>
                            <li>
                                <a href="../../ipcrm/admin_SH/ipcrms_trans_rec.php"><i class="fa fa-fw fa-clock-o"></i>Set Deadline</a>
                            </li>
                        </ul>
                    </li>    
                <?php            
                    }else if($_SESSION['user_data']['priv']['ipcrms_user']=="1"){ ?>
                    <li>
                        <a href="../../ipcrm/user_form11.php"><i class="icon icon-profile"></i> IPCR FORM</a>
                    </li>
                <?php
                    } 
                ?>

                <!-- PIMS -->
                <?php
                    if($_SESSION['user_data']['priv']['pims2_priv']=="1" || ($_SESSION['user_data']['priv']['superadmin']=="1" && $_SESSION['user_data']['priv']['pims2_priv']=="1")){
                ?>
            <li>
                <a href="#"><i class="icon-user-tie"></i>Personnel Management<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-check-square"></i>Manage Personnel<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="../../pims/admin/add_personnel.php"><i class="fa fa-fw fa-circle-o"></i>Add Personnel</a>
                            </li>
                            <li>
                                <a href="../../pims/admin/update_personnel1.php"><i class="fa fa-fw fa-circle-o"></i>Update Personnel Info</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-list"></i>Generate Reports<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="../../pims/admin/teaching.php"><i class="fa fa-fw fa-circle-o"></i>Teaching Faculty</a>
                            </li>
                            <li>
                                <a href="../../pims/admin/non_teaching.php"><i class="fa fa-fw fa-circle-o"></i>Non-Teaching Faculty</a>
                            </li>
                            <li>
                                <a href="../../pims/admin/on_leave_list.php"><i class="fa fa-fw fa-circle-o"></i>On-Leave Personnel</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-refresh"></i>My Profile Updates<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="../../PIMS/admin/profile_updates_pending.php"><i class="fa fa-fw fa-circle-o"></i>Pending</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-hourglass"></i>History<span class="fa arrow"></span></a>
                                <ul class="nav nav-fourth-level">
                                    <li>
                                        <a href="../../pims/admin/profile_updates_approved.php"><i class="fa fa-fw fa-circle-o"></i>Approved</a>
                                    </li>
                                    <li>
                                        <a href="../../pims/admin/profile_updates_disapproved.php"><i class="fa fa-fw fa-circle-o"></i>Disapproved</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" ><i class="fa fa-fw fa-user-plus"></i>Leave Application<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="../../pims/personnel/leave_history.php"><i class="fa fa-fw fa-circle-o"></i>Leave History</a>
                            </li>
                            <li>
                                <a href="../../pims/personnel/leave_apply.php"><i class="fa fa-fw fa-circle-o"></i>Apply</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../../pims/personnel/emp_rec.php"><i class="fa fa-fw fa-circle-o"></i>Employment Records</a>
                    </li>
                    <li>
                        <a href="../../pims/personnel/training.php"><i class="fa fa-fw fa-circle-o"></i>Training Programs</a>
                    </li>
                </ul>
            </li>
                <?php 
                    }else if($_SESSION['user_data']['priv']['pims_priv']=="1" || ($_SESSION['user_data']['priv']['superadmin']=="1" && $_SESSION['user_data']['priv']['pims_priv']=="1") ){ ?>
            <li>
                <a href="#"><i class="icon-user-tie"></i>Personnel Leave Management<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">    
                    <li>
                        <a href="#"><i class="fa fa-fw fa-check-square"></i>Manage Leave Applicants<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="../../pims/admin2/leave_applicants.php"><i class="fa fa-fw fa-circle-o"></i>Pending</a>
                            </li>
                            <li>
                                <a href="../../pims/admin2/on_leave_list.php"><i class="fa fa-fw fa-circle-o"></i>On-Leave</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user-plus"></i>Leave Application<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="../../pims/personnel/leave_history.php"><i class="fa fa-fw fa-circle-o"></i>Leave History</a>
                            </li>
                            <li>
                                <a href="../../pims/personnel/leave_apply.php"><i class="fa fa-fw fa-circle-o"></i>Apply</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-hourglass"></i>Leave History<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="../../pims/admin2/approved_applicants.php"><i class="fa fa-fw fa-circle-o"></i>Approved</a>
                            </li>
                            <li>
                                <a href="../../pims/admin2/disapproved_applicants.php"><i class="fa fa-fw fa-circle-o"></i>Disapproved</a>
                            </li>
                            <li>
                                <a href="../../pims/admin2/canceled_application.php"><i class="fa fa-fw fa-circle-o"></i>Cancelled by Applicant</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../../pims/personnel/emp_rec.php"><i class="fa fa-fw fa-circle-o"></i>Employment Records</a>
                    </li>
                    <li>
                        <a href="../../pims/personnel/training.php"><i class="fa fa-fw fa-circle-o"></i>Training Programs</a>
                    </li>
                </ul>
            </li>
                <?php            
                    }else if($_SESSION['user_data']['priv']['pims_user']=="1"){ ?>
            <li>
                <a href="#"><i class="icon-user-tie"></i>Personnel Management<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">    
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user-plus"></i>Leave Application<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="../../pims/personnel/leave_history.php"><i class="fa fa-fw fa-circle-o"></i>Leave History</a>
                            </li>
                            <li>
                                <a href="../../pims/personnel/leave_apply.php"><i class="fa fa-fw fa-circle-o"></i>Apply</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../../pims/personnel/emp_rec.php"><i class="fa fa-fw fa-circle-o"></i>Employment Records</a>
                    </li>
                    <li>
                        <a href="../../pims/personnel/training.php"><i class="fa fa-fw fa-circle-o"></i>Training Programs</a>
                    </li>
                </ul>
            </li>
            <?php
                    }  
                ?>
                
                <!-- OES -->
                <?php 
                if($_SESSION['user_data']['priv']['oes_priv']=="1" || $_SESSION['user_data']['priv']['superadmin']=="1"){ ?>
                    <li>
                        <a href="#"><i class="icon icon-book"></i> Online Examination<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-pencil"></i> Exam<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="../../oes/exam.php?tab=1"><i class="fa fa-circle-o"></i>Create Exam</a>
                                    </li>
                                    <li>
                                        <a href="../../oes/exam.php?tab=2"><i class="fa fa-circle-o"></i>Manage Exam</a>
                                    </li>
                                    <li>
                                        <a href="../../oes/report.php?tab=6"><i class="fa fa-circle-o"></i>Exam Result</a>
                                    </li>
                                    <li>
                                        <a href="../../oes/report.php?tab=7"><i class="fa fa-circle-o"></i>Result Chart</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-question-circle"></i>Question Bank<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="../../oes/question.php?tab=4"><i class="fa fa-circle-o"></i>Create Question</a>
                                    </li>
                                    <li>
                                        <a href="../../oes/question.php?tab=5"><i class="fa fa-circle-o"></i>Manage Questions</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                <?php
                    }
                ?>
                
                <!-- DMS -->
                <?php 
                if($_SESSION['user_data']['priv']['frms_priv']=="1" || $_SESSION['user_data']['priv']['superadmin']=="1"){ ?>
                <li>
                    <a href="#"><i class="icon icon-books"></i>Faculty Records<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php
                            if(strstr($job_title,"HRM") || $_SESSION['user_data']['priv']['superadmin']=="1"){
                        ?>  
                            <li>
                                <a href="../../dms/admin/service_rec.php"><i class="fa fa-fw fa-edit"></i>Service Record</a>
                            </li>
                            <li>
                                <a href="../../dms/admin/inbox.php"><i class="fa fa-fw fa-envelope-o"></i>Document Requests</a>
                            </li>
                            <li>
                                <a href="../../dms/admin/messagereport.php"><i class="fa fa-fw fa-list-alt"></i>Message Reports</a>
                            </li>
                            <li>
                                <a href="../../dms/admin/archiving.php"><i class="fa fa-fw fa-archive"></i>Archiving</a>
                            </li>
                        <?php
                            }else{ ?>
                            <li>
                                <a href="../../dms/admin/inbox.php"><i class="fa fa-fw fa-envelope-o"></i>Document Requests</a>
                            </li>
                            <li>
                                <a href="../../dms/admin/messagereport.php"><i class="fa fa-fw fa-list-alt"></i>Message Reports</a>
                            </li>
                            <li>
                                <a href="../../dms/admin/archiving.php"><i class="fa fa-fw fa-archive"></i>Archiving</a>
                            </li>    
                        <?php
                            }
                        ?>
                        </ul>
                    </li>
                <?php
                }else if($_SESSION['user_data']['priv']['frms_user']=="1"){
                        ?>
                    <li>
                        <a href="#"><i class="icon icon-books"></i>Faculty Records<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">    
                            <li>
                                <a href="#"><i class="fa fa-fw fa-paper-plane-o"></i>Document Request<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="../../dms/user/add.php"><i class="fa fa-circle-o"></i>Create Request</a>
                                    </li>
                                    <li>
                                        <a href="../../dms/user/inbox.php"><i class="fa fa-circle-o"></i>Request Inbox</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="../../dms/user/messagereport.php"><i class="fa fa-fw fa-list"></i>Message Reports</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                            }
                ?>
                
                <!-- IMS -->
                <?php 
                    if($_SESSION['user_data']['priv']['ims_priv']=="1" || $_SESSION['user_data']['priv']['superadmin']=="1"){
                ?>
                <li>
                    <a href="#"><i class="icon icon-database"></i> Inventory<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="../../IPMS/IMS/pages/borrowed.php"><i class="fa fa-fw fa-shopping-basket"></i>Borrowed Items</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-floppy-o"></i>Storage<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li><a href="../../ipms/ims/pages/inspection.php"><i class="fa fa-circle-o"></i>Add Items</a></li>
                                <li><a href="../../ipms/ims/pages/equip.php"><i class="fa fa-circle-o"></i>Equipment</a></li>
                                <li><a href="../../ipms/ims/pages/supply.php"><i class="fa fa-circle-o"></i>Supply</a></li>
                                <li><a href="../../ipms/ims/pages/building.php"><i class="fa fa-circle-o"></i>Buildings</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i>Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li><a href="../../ipms/ims/pages/bcequip.php"><i class="fa fa-circle-o"></i>Equipment Chart</a></li>
                                <li><a href="../../ipms/ims/pages/bcsupply.php"><i class="fa fa-circle-o"></i>Supply Chart</a></li>
                                <li><a href="../../ipms/ims/pages/bcbuilding.php"><i class="fa fa-circle-o"></i>Building Chart</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-clipboard"></i>Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li><a href="../../ipms/ims/pages/annreport.php"><i class="fa fa-circle-o"></i>Storage Report</a></li>
                                <li><a href="../../ipms/ims/pages/bldgreport.php"><i class="fa fa-circle-o"></i>Building Report</a></li>
                                <li><a href="../../ipms/ims/pages/borrowreport.php"><i class="fa fa-circle-o"></i>Borrowed Items Report</a></li>
                                <li><a href="../../ipms/ims/pages/equiphistory.php"><i class="fa fa-circle-o"></i>Transaction History Report</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php 
                    }
                ?>
                <!-- PMS -->
                <?php 
                    if($_SESSION['user_data']['priv']['pms_priv']=="1" || ($_SESSION['user_data']['priv']['superadmin']=="1" && $_SESSION['user_data']['priv']['pms_priv']=="1")){ ?>
            <li>
                <a href="#"><i class="icon icon-truck"></i>Procurement<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level"> 
                
                <li>
                    <a href="#" ><i class="fa fa-fw fa-clipboard"></i>Reports<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li><a href="../../ipms/pms/admin/risrec.php"><i class="fa fa-fw fa-circle-o"></i>RIS RECORDS</a></li>
                        <li><a href="../../ipms/pms/admin/pr_rec.php"><i class="fa fa-fw fa-circle-o"></i>PR RECORDS</a></li>
                        <li><a href="../../ipms/pms/admin/po_rec.php"><i class="fa fa-fw fa-circle-o"></i>PO RECORDSt</a></li>
                        <li><a href="../../ipms/pms/admin/iar.php"><i class="fa fa-fw fa-circle-o"></i>IAR RECORDS</a></li>
                    </ul>
                </li>   
                <li>
                    <a href="../../ipms/pms/admin/ris_page.php"><i class="fa fa-fw fa-file-text"></i>RIS</a>
                </li>
                <li>
                    <a href="../../ipms/pms/admin/pr.php"><i class="fa fa-fw fa-money"></i>Purchase Request</a>
                </li>
                <li>
                    <a href="../../ipms/pms/admin/po.php"><i class="fa fa-fw fa-cart-arrow-down"></i>Purchase Order</a>
                </li>
                <li>
                    <a href="../../ipms/pms/admin/delivery.php"><i class="fa fa-fw fa-dropbox"></i>Delivery</a>
                </li>
                <li>
                    <a href="../../ipms/pms/admin/supplier.php"><i class="fa fa-fw fa-group"></i>Supplier</a>
                </li>
                <li>
                    <a href="../../ipms/pms/USER/requi.php"><i class="fa fa-fw fa-plus"></i>Request Item</a>
                </li>
                <li>
                    <a href="../../ipms/pms/USER/trans.php"><i class="fa fa-fw fa-reorder"></i>Transaction Records</a>
                </li> 
                </ul>
            </li>        
                <?php 
                    }else if($_SESSION['user_data']['priv']['pms2_priv']=="1" || ($_SESSION['user_data']['priv']['superadmin']=="1" && $_SESSION['user_data']['priv']['pms2_priv']=="1")){ ?>  
            <li>
                <a href="#"><i class="icon icon-truck"></i>Procurement<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">        
                <li>
                    <a href="#"><i class="fa fa-fw fa-exclamation-triangle"></i>Requests<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li><a href="../../ipms/pms/admin1/ris_request.php"><i class="fa fa-fw fa-circle-o"></i>RIS Requests</a></li>
                        <li><a href="../../ipms/pms/admin1/requests.php"><i class="fa fa-fw fa-circle-o"></i>PR Requests</a></li>
                        <li><a href="../../ipms/pms/admin1/po_request.php"><i class="fa fa-fw fa-circle-o"></i>PO Requests</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../../ipms/pms/admin1/report.php"><i class="fa fa-fw fa-clipboard"></i>Reports</a>
                </li>
                </ul>
            </li>        
                <?php
                    }else if($_SESSION['user_data']['priv']['pms_user']=="1"){ ?>
            <li>
                <a href=`"#"><i class="icon icon-truck"></i>Procurement<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">    
                <li>
                    <a href="../../ipms/pms/USER/requi.php"><i class="fa fa-fw fa-plus"></i>Request Item</a>
                </li>
                <li>
                    <a href="../../ipms/pms/USER/trans.php"><i class="fa fa-fw fa-reorder"></i>Transaction Records</a>
                </li>   
                </ul>
            </li>     
                <?php 
                    }
                ?>
                   
                <!-- PRS -->
                <?php 
                    if($_SESSION['user_data']['priv']['prs_priv']=="1" || ($_SESSION['user_data']['priv']['superadmin']=="1" && $_SESSION['user_data']['priv']['prs_priv']=="1")){
                ?>
            <li>
                <a href="#"><i class="icon-calculator"></i>Monthly Attendance<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="../../prs/AdminB/mtr_import.php"><i class="fa fa-fw fa-circle-o"></i>MTR Import</a>
                        <!-- Equipment,Supply,Add item,borrowed items-->
                    </li>
                    <li>
                        <a href="../../prs/AdminB/sort.php"><i class="fa fa-fw fa-circle-o"></i>Summary Record</a>
                        <!-- Lahat ng about sa bldgs -->
                    </li>
                </ul>
            </li>
                <?php 
                    }else if($_SESSION['user_data']['priv']['prs2_priv']=="1"){ ?>
            <li>
                <a href="#"><i class="fa fa-fw fa-dashboard"></i>PAYROLL<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="../../prs/admin/employee.php"><i class="fa fa-fw fa-user"></i> <span>EMPLOYEE</span> </a>
                    </li>
                    <li>
                        <a href="../../prs/admin/payrollrep.php?gen=1"><i class="fa fa-fw fa-spin fa-spinner"></i>Generate Payroll</a>
                    </li>
                    <?php
                        $query_lastmonth=mysqli_query($mysqli,"SELECT * FROM prs_report where month(date_issued) = month(now()) and year(date_issued)= year(now())");
                        $know_if_available= mysqli_num_rows($query_lastmonth);
                        if($know_if_available > 0){ 
                    ?>
                    <li>
                        <a href="../../PRS/Admin/payrollrep.php"><i class="fa fa-fw fa-circle-o"></i>Month's Report</a>
                        <!-- Equipment,Supply,Add item,borrowed items-->
                    </li>
                    <?php }
                    $query_lastmonth=mysqli_query($mysqli,"SELECT * FROM prs_report where month(time_report_sign) = month(now()) and report_sign='LastMonthSign' and year(time_report_sign)= year(now())");
                    $know_if_available= mysqli_num_rows($query_lastmonth);
                    if($know_if_available > 0){
                    ?>
                    <li>
                        <a href="../../PRS/Admin/payrollreplastmonth.php"><i class="fa fa-fw fa-circle-o"></i>Last Month's Report</a>
                    </li>
                    <?php } ?>
                    <li><a href="../../prs/admin/setting.php"><i class="fa fa-gear"></i> <span>SETTING</span></a></li>

                    <li><a href="../../prs/admin/report.php"><i class="fa fa-th-list"></i> <span>REPORT</span></a></li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-list-alt"></i>Table<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="../../prs/admin/tax.php"><i class="fa fa-fw fa-circle-o"></i>Tax</a>
                            </li>
                            <li>
                                <a href="../../prs/admin/ph_table.php"><i class="fa fa-fw fa-circle-o"></i>PhilHealth</a>
                            </li>
                            <li>
                                <a href="../../prs/admin/sal_mem.php"><i class="fa fa-fw fa-circle-o"></i>Salary Memo</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php
                    }
             ?>
            <!-- SCMS -->
            <?php
                    if($_SESSION['user_data']['priv']['scms_priv']=="1" || ($_SESSION['user_data']['priv']['superadmin']=="1" && $_SESSION['user_data']['priv']['scms_priv']=="1")){ ?>    
        <li>
            <a href="#"><i class="icon-aid-kit"></i> School Clinic<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">            
                <li>
                    <a href="../../../scms/pages/admin/index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>								
                <li>
                    <a href="../../../scms/pages/admin/daily.php"><i class="fa fa-fw fa-th-list"></i> Daily Visit Log</a>
                </li>
                <li>
                    <a href="../../../scms/pages/admin/patient.php"><i class="fa fa-fw fa-user"></i> Patient Records</a>
                </li>
                <li>
                    <a href="#" ><i class="fa fa-fw fa-heartbeat"></i>Medical Records<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li><a href="../../../scms/pages/admin/student.php"><i class="fa fa-fw fa-circle-o"></i> Student</a></li>
                        <li><a href="../../../scms/pages/admin/personnel.php"><i class="fa fa-fw fa-circle-o"></i> Personnel</a></li>
                    </ul>
                </li>  
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i>Manage<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li><a href="../../../scms/pages/admin/mse.php"><i class="fa fa-fw fa-circle-o"></i> Medicines</a></li>
                        <li><a href="../../../scms/pages/admin/supplies.php"><i class="fa fa-fw fa-circle-o"></i> Supplies</a></li>
                        <li><a href="../../../scms/pages/admin/equipment.php"><i class="fa fa-fw fa-circle-o"></i> Equipment</a></li>
                    </ul>
                </li> 
                <li>
                    <a href="../../../scms/pages/admin/reports.php"><i class="fa fa-fw fa-clipboard"></i> Reports</a>
                </li>   
            </ul>
        </li>    
            <?php    
                    }else if($_SESSION['user_data']['priv']['scms_user']=="1"){ 
                        
            ?>
        <li>
            <a href="#"><i class="icon-aid-kit"></i> School Clinic<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">   
                <?php 
                    $check_adv=$mysqli->query("SELECT css_section.emp_rec_id 
                    FROM css_section,pims_employment_records,pims_personnel,css_school_yr 
                    WHERE pims_employment_records.emp_rec_id=css_section.emp_rec_id
                    AND pims_employment_records.emp_no=pims_personnel.emp_no
                    AND css_section.sy_id=css_School_yr.sy_id
                    AND pims_employment_records.emp_no=$emp");
                    $ch=$check_adv->num_rows;
                    if($scms_dept['dept_id']=="7" && $ch>0 ){ ?>
                <li>
                    <a href="../../../scms/pages/mapeh/index.php"><i class="fa fa-fw fa-th-list"></i> BMI Records</a>
                </li>
                <li>
                    <a href="../../../scms/pages/mapeh/medhist_pers.php"><i class="fa fa-fw fa-heartbeat"></i> My Medical Record</a>
                </li>
                <li>
                    <a href="../../../scms/pages/mapeh/consult_history.php"><i class="fa fa-fw fa-history"></i> Consultation History</a>
                </li>
                <?php
                    }else{ 
                        if($ch>0){ ?>
                <li>
                    <a href="../../../scms/pages/stuper/class_bmi.php"><i class="fa fa-fw fa-th-list"></i> BMI Record</a>
                </li>
                    <?php        
                        }
                    ?>
                <li>
                    <a href="../../../scms/pages/stuper/index.php"><i class="fa fa-fw fa-th-list"></i> Medical Record</a>
                </li>
                <li>
                    <a href="../../../scms/pages/stuper/consult_history.php"><i class="fa fa-fw fa-history"></i> Consultation History</a>
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
        </div>
        <!-- /.sidebar-collapse -->
    </nav>

    <script>
        function modalFunction(val){
            $.ajax({
              type: "POST",
              url: "default_session_modal.php",
              data: "value="+val,
              success: function(data){
                $("#d").html(data);
              }
            });
          }
              function modal_dont_show(val){
            $.ajax({
              type: "POST",
              url: "modal_dont_show.php",
              data: "value="+val,
              success: function(data){
              }
            });
          }
    </script>
    <?php
  }
?>