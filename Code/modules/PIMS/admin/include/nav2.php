<?php
    include("../myfunc/db_connect.php");
include("../myfunc/func.php");
        $funcemp=$_SESSION['user_data']['acct']['emp_no'];
        $funcaid=$_SESSION['user_data']['acct']['cms_account_ID'];
        $funcrec=mysqli_query($_SESSION['pims_data']['connection'],"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$funcaid");
        $recrow=mysqli_fetch_assoc($funcrec);
        $recid=$recrow['rec_no'];
		foreach(definePerson($funcaid) as $key=>$val) {
			if($key=="css") { $css_priv=$val; }
			else if($key=="dms") { $dms_priv=$val; }
			else if($key=="ims") { $ims_priv=$val; }
			else if($key=="ipcr") { $ipcr_priv=$val; }
			else if($key=="pims") { $pims_priv=$val; }
			else if($key=="pms") { $pms_priv=$val; }
			else if($key=="oes") { $oes_priv=$val; }
			else if($key=="prs") { $prs_priv=$val; }
			else if($key=="scms") { $scms_priv=$val; }
			else if($key=="sis") { $sis_priv=$val; }
			else if($key=="user_type") { $user_type=$val; }
			else if($key=="job") { $job_title=$val; }
			else if($key=="emp_type") { $emp_type=$val; }
			else if($key=="dept") { $dept=$val; }
		}
?>
<link rel="stylesheet" href="../../../css/bin/diy.css">
<?php 
    $sy = mysqli_query($_SESSION['pims_data']['connection'], "SELECT * FROM css_school_yr");
?>
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
            <a href="../../../index.php"><i class="fa fa-fw fa-home"></i> Home</a>
        </li>
        <!-- CMS -->
        <?php 
                if(isset($_SESSION['user_data']['acct']['emp_no']) AND (in_array("superadmin", $_SESSION['user_data']['priv']['cms_account_type'])) ){
                    $keysa = array_search('superadmin', $_SESSION['user_data']['priv']['cms_account_type']);
                    if($_SESSION['user_data']['priv']['cms_priv'][$keysa]==1) {
        ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu12"><i class="icon icon-book" aria-expanded="false"></i> CONTROL PANEL<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu12">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenuOC" aria-expanded="false">
                        <i class="fa fa-fw fa-file-o" aria-expanded="false"></i> Overall Content<span class="caret"></span>
                    </a>
                </li>   
                <ul class="nav collapse dropdown-submenu" id="submenuOC" role="menu">
                    <li><a href="../../../admin/news.php">News</a></li>
                    <li><a href="../../../admin/memo.php">Memorandum</a></li>
                    <li><a href="../../../admin/calendar.php">Calendar</a></li>
                    <li><a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenuGallery" aria-expanded="false">Gallery<span class="caret"></span></a></li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="submenuGallery" role="menu">
                            <li><a href="../../../admin/edit_projects.php">Projects</a></li>
                            <li><a href="../../../admin/documentation.php">Documentation</a></li>
                        </ul>
                    </ul>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenuAM" aria-expanded="false">Account Management<span class="caret"></span></a>
                    </li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="submenuAM" role="menu">
                            <li><a href="../../../admin/student_accounts.php">Student Accounts</a></li>
                            <li><a href="../../../admin/personnel_accounts.php">Personnel Accounts</a></li>
                        </ul>
                    </ul>
                </ul>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenuMC" aria-expanded="false">
                        <i class="fa fa-fw fa-file-o" aria-expanded="false"></i> Site Content<span class="caret"></span>
                    </a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="submenuMC" role="menu">
                        <li><a href="../../../admin/edit_header.php">Header</a></li>
                        <li><a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenuAU" aria-expanded="false">About Us<span class="caret"></span></a></li>
                        <ul>
                            <ul class="nav collapse dropdown-submenu" id="submenuAU" role="menu">
                                <li><a href="../../../admin/edit_history.php">History</a></li>
                                <li><a href="../../../admin/edit_mission.php">Mission</a></li>
                                <li><a href="../../../admin/edit_vision.php">Vision</a></li>
                                <li><a href="../../../admin/edit_hymn.php">Hymn</a></li>
                                <li><a href="../../../admin/edit_principal.php">Principal's Corner</a></li>
                                <li><a href="../../../admin/edit_orgchart.php">Organizational Chart</a></li>
                                <li><a href="../../../admin/edit_gpta.php">GPTA Officers</a></li>
                            </ul>
                        </ul>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenuP" aria-expanded="false">Programs<span class="caret"></span></a>
                        </li>
                        <ul>
                            <ul class="nav collapse dropdown-submenu" id="submenuP" role="menu">
                                <li><a href="../../../admin/edit_hs.php">High School</a></li>
                                <li><a href="../../../admin/edit_shs.php">Senior High School</a></li>
                            </ul>
                        </ul>
                        <li><a href="../../../admin/edit_sp.php">School Progress</a></li>
                        <li><a href="../../../admin/achievements.php">Achievements</a></li>
                        <li><a href="../../../admin/edit_contacts.php">Contact Us</a></li>
                    </ul>
                </ul>
            </ul>
        </li>    
            <?php
            
                    }
                }
            ?>
        <!-- CSS -->
            <?php 
                if($css_priv=="1" || ($user_type=="superadmin" && $css_priv=="1") ){ ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu1"><i class="icon-calendar" aria-expanded="false"></i> Class Scheduling<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu1">
            <?php
                    if($user_type=="admin" || ($user_type=="superadmin" && $css_priv=="1") ){
                        if($emp_type=="Teaching" || ($user_type=="superadmin" && $css_priv=="1") ){
            ?>  
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu13" aria-expanded="false"><i class="fa fa-calendar" aria-expanded="false"></i> Class Schedule<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu13" role="menu">
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
            </ul>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu14" aria-expanded="false"><i class="fa fa-files-o" aria-expanded="false"></i> View Schedule<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu14" role="menu">
                    <li><a data-toggle="tooltip" data-placement="right" title="View schedules per year level"  href="../../css/admin/year_level.php"><i class="fa fa-circle-o" onclick="modal_dont_show(this.value)"></i> Year Level</a></li>
                    <li><a data-toggle="tooltip" data-placement="right" title="View schedules per department" href="../../css/admin/department.php"><i class="fa fa-circle-o"></i> Department</a></li>
                </ul>
            </ul>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu15" aria-expanded="false"><i class="fa fa-book" aria-expanded="false"></i> School Year<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu15" role="menu">
                    <li style="margin-left:-40px">
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu3" aria-expanded="false">
                            <i class="fa fa-check" aria-expanded="false"></i> Active<span class="caret"></span>
                        </a>
                    </li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu3" role="menu">
                            <?php
									$active = 0;
									foreach ($sy as $key) {
										if($key['status']=='active'){
											echo '<li style="margin-left:-80px;width:171px"><a href="../../css/admin/year_level.php" title="View schedule for S.Y. '.$key['year'].'."><i class="fa fa-circle-o"></i>'; 
											echo ' S.Y. '.$key['year'].'</a></li>';
											$active = 1;
										}
									}
									if ($active != 1) {
										echo '<li style="color:#8aa4af;margin-left:-80px;width:171px">&nbsp;&nbsp;No active schedule</li>';
									}
									?>
                        </ul>
                    </ul>
                    <li style="margin-left:-40px">
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu4" aria-expanded="false">
                            <i class="fa fa-fw fa-list" aria-expanded="false"></i> History<span class="caret"></span>
                        </a>
                    </li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu4" role="menu">
                            <?php
									$history = 0;
									foreach ($sy as $key) {
										if($key['status']=='inactive'){
											echo '<li style="margin-left:-80px;width:171px"><a href="../../css/admin/history/year_level.php?yr='.$key['sy_id'].'" title="View schedule for S.Y. '.$key['year'].'."><i class="fa fa-circle-o"></i> S.Y. '.$key['year'].'</a></li>';
											$history = 1;
										}
									}
									if ($history != 1) {
										echo '<li style="color:#8aa4af;margin-left:-80px;width:171px"><a>No history schedules</a></li>';
									}
									?>
                        </ul>
                    </ul>
                </ul>
            </ul>    
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu16" aria-expanded="false"><i class="fa fa-gear" aria-expanded="false"></i> Options<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu16" role="menu">
                    <li><a data-toggle="tooltip" data-placement="right" title="Assigns Teachers to their respective subject"  href="../../css/admin/manage.php"><i class="fa fa-circle-o"></i> School Year</a></li>
                    <li><a data-toggle="tooltip" data-placement="right" title="Assigns Teachers to their respective subject"  href="../../css/admin/assign_teacher.php"><i class="fa fa-circle-o"></i> Assign Teachers</a></li>
                    <li><a data-toggle="tooltip" data-placement="right" title="Remove/Adds subject every year level" href="../../css/admin/subjects.php"><i class="fa fa-circle-o"></i> Subjects</a></li>

                </ul>
            </ul>
            <?php 
                        }else if($user_type=="User"){ ?>
                <li>
                    <a href="../../CSS/admin/teacher.php" >View Schedule</a>
                </li>    
            <?php                
                        }
                    }
            ?>
            </ul>
        </li>      
            <?php        
                }else if($css_priv=="0"){ ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu1"><i class="icon-calendar" aria-expanded="false"></i> Class Scheduling<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu1">
                <li>
                    <a href="../../CSS/admin/teacher.php" >View Schedule</a>
                </li> 
            </ul>
        </li>    
            <?php                
                        }
                    
            ?>


        <!-- DMS -->
        <?php 
            if($dms_priv=="1" || ($user_type=="superadmin" && $dms_priv=="1")){ ?>
    <li>
        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu2"><i class="icon icon-books" aria-expanded="false"></i>Faculty Records<span class="caret"></span></a>
        <ul class="nav collapse dropdown-menu" role="menu" id="submenu2">
        <?php
                if($user_type=="admin" || ($user_type=="superadmin" && $dms_priv=="1")){
                    if(strstr($job_title,"HRM") || strstr($job_title,"ICTD") || ($user_type=="superadmin" && $dms_priv=="1")){
        ?>      
            <li>
                <a href="../../dms/admin/doc.php"><i class="fa fa-fw fa-file-o"></i>Documents</a>
            </li>
            <li>
                <a href="../../dms/admin/inbox.php"><i class="fa fa-fw fa-envelope-o"></i>Inbox</a>
            </li>
            <li>
                <a href="../../dms/admin/messagereport.php"><i class="fa fa-fw fa-pencil-square-o"></i>Message Reports</a>
            </li>
            <li>
                <a href="../../dms/admin/list.php"><i class="fa fa-fw fa-university"></i>Department Records</a>
            </li>
            <li>
                <a href="../../dms/admin/archiving.php"><i class="fa fa-fw fa-archive"></i>Archiving</a>
            </li>
        <?php 
                    }else if($emp_type=="Teaching" || $emp_type=="Non Teaching" ){ ?>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i> Documents<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu" role="menu">
                    <li><a href="../../dms/user/form.php?dc=pds">Personal Data Sheet</a></li>
                    <?php if($emp_type=="Teaching"){ 
                            if(strstr($job_title,"HTEACH")){ ?>
                    <li><a href="../../dms/user/form.php?dc=fi">Employee List</a></li>
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
                            <li><a href="../../dms/user/form.php?dc=sf1">School File One</a></li>
                            <li><a href="../../dms/user/form.php?dc=sf5">School File Five</a></li>
                        </ul>
                    </ul>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu1" aria-expanded="false">
                            Grade Files<span class="caret"></span>
                        </a>
                    </li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu1" role="menu">
                            <li><a href="../../dms/user/form.php?dc=mg">Master Grading Sheet</a></li>
                            <li><a href="../../dms/user/form.php?dc=qg">Quarterly Grades</a></li>
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
                        <a href="../../dms/user/add.php">Create Request</a>
                    </li>
                    <li>
                        <a href="../../dms/user/inbox.php">Request Response</a>
                    </li>

                </ul>
            </ul>
            <li>
                <a href="../../dms/user/messagereport.php"><i class="fa fa-fw fa-list"></i>Message Reports</a>
            </li>
        <?php
                    }
                }else if($emp_type=="Teaching" || $emp_type=="Non Teaching"){ ?>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i> Documents<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu" role="menu">
                    <li><a href="../../dms/user/form.php?dc=pds">Personal Data Sheet</a></li>
                    <?php if($emp_type=="Teaching"){ 
                            if(strstr($job_title,"HTEACH") ){ ?>
                    <li><a href="../../dms/user/form.php?dc=fi">Employee List</a></li>
                    <?php
                            }
                    ?>
                    <li><a href="../../dms/user/form.php?dc=sr">Service Records</a></li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu" aria-expanded="false">
                            School File<span class="caret"></span>
                        </a>
                    </li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu" role="menu">
                            <li><a href="../../dms/user/form.php?dc=sf1">School File One</a></li>
                            <li><a href="../../dms/user/form.php?dc=sf5">School File Five</a></li>
                        </ul>
                    </ul>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubsubmenu1" aria-expanded="false">
                            Grade Files<span class="caret"></span>
                        </a>
                    </li>
                    <ul>
                        <ul class="nav collapse dropdown-submenu" id="subsubsubmenu1" role="menu">
                            <li><a href="../../dms/user/form.php?dc=mg">Master Grading Sheet</a></li>
                            <li><a href="../../dms/user/form.php?dc=qg">Quarterly Grades</a></li>
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
                        <a href="../../dms/user/add.php">Create Request</a>
                    </li>
                    <li>
                        <a href="../../dms/user/inbox.php">Request Response</a>
                    </li>

                </ul>
            </ul>
            <li>
                <a href="../../dms/user/messagereport.php"><i class="fa fa-fw fa-list"></i>Message Reports</a>
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
                if($oes_priv=="1" || $user_type=="superadmin"){ ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu3"><i class="icon icon-book" aria-expanded="false"></i> Online Examination<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu3">
            <?php
                    if($emp_type=="Teaching" || $user_type=="superadmin"){
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
                if($ipcr_priv=="1" || $user_type=="superadmin"){
                    if($emp_type=="Teaching" || $user_type=="superadmin"){
                        if(strstr($job_title,"HTEACH") || $user_type=="superadmin"){
            ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu4"><i class="icon icon-profile" aria-expanded="false"></i> Department Evaluation<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu4">
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
            </ul>
        </li>    
            <?php 
                        }else if(strstr($job_title,"TCH") || strstr($job_title,"INST") || strstr($job_title,"ICTD")){ ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu4"><i class="icon icon-profile" aria-expanded="false"></i> Evaluation<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu4">
                <li>
                    <a href="../../ipcrm/user_form11.php">IPCR Form</a>
                </li>   
            </ul>
        </li>
            <?php
                        }                 
                    } 
                    
                    if($job_title=="SP1" || $job_title=="SP2" || $job_title=="SP3" || ($user_type=="superadmin" && $ipcr_priv=="1")){ ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu11"><i class="icon icon-profile" aria-expanded="false"></i> Faculty Evaluation<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu11">    
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu24" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>View Form<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu24" role="menu">
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
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu5"><i class="icon-user-tie" aria-expanded="false"></i>My Profile Management<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu5">
                
                <li>
                    <a href="../../pims/personnel/profile_updates.php">My Profile Updates</a>
                </li>
                <li>
                    <a href="../../pims/personnel/emp_rec.php">My Employment Records</a>
                </li>
                <li>
                    <a href="../../pims/personnel/service_rec.php">My Service Record</a>
                </li>
                <li>
                    <a href="../../pims/personnel/training.php">My Training Programs</a>
                </li>
            </ul>
        </li>


        <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu25" aria-expanded="false"><i class="fa fa-map-marker" aria-expanded="false"></i> My Leave Application<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu25" role="menu">
                        <li>
                            <a href="../../pims/personnel/leave_history.php">Leave History</a>
                        </li>
                        <li>
                            <a href="../../pims/personnel/leave_apply.php">Apply</a>
                        </li>
                    </ul>
                </ul>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu6"><i class="icon-user-tie" aria-expanded="false"></i> Personnel Information Management<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu6">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu7" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Manage Personnel<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu7" role="menu">
                        <li>
                            <a href="../../pims/admin/add_personnel.php">Add Personnel</a>
                        </li>
                        <li>
                            <a href="../../pims/admin/update_personnel1.php">Update Personnel Info</a>
                        </li>
                    </ul>
                </ul>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu8" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Generate Reports<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu8" role="menu">
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
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu9" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Profile Update <br>Application<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu9" role="menu">
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
                                    <a href="../../pims/admin/profile_updates_approved.php">Approved</a>
                                </li>
                                <li>
                                    <a href="../../pims/admin/profile_updates_disapproved.php">Disapproved</a>
                                </li>
                            </ul>
                        </ul>
                        <li>

                    </ul>
                </ul>
            </ul>
        </li>

            <?php 
                        }else{ ?>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu5"><i class="icon-user-tie" aria-expanded="false"></i>My Profile Management<span class="caret"></span></a>
                    <ul class="nav collapse dropdown-menu" role="menu" id="submenu5">    
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu25" aria-expanded="false">My Leave Application<span class="caret"></span></a>
                        </li>
                        <ul>
                            <ul class="nav collapse dropdown-submenu" id="subsubmenu25" role="menu">
                                <li>
                                    <a href="../../pims/personnel/leave_history.php">Leave History</a>
                                </li>
                                <li>
                                    <a href="../../pims/personnel/leave_apply.php">Apply</a>
                                </li>
                            </ul>
                        </ul>
                        <li>
                            <a href="../../pims/personnel/profile_updates.php">My Profile Updates</a>
                        </li>
                        <li>
                            <a href="../../pims/personnel/emp_rec.php">My Employment Records</a>
                        </li>
                        <li>
                            <a href="../../pims/personnel/service_rec.php">My Service Record</a>
                        </li>
                        <li>
                            <a href="../../pims/personnel/training.php">My Training Programs</a>
                        </li>
                    </ul>
                </li>
                    <?php
                        }    
                        
                    }else{
                        if(strstr($job_title,"SECSP")){ ?>
                    <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu5"><i class="icon-user-tie" aria-expanded="false"></i>My Profile Management<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu5">
                
                <li>
                    <a href="../../pims/personnel/profile_updates.php">My Profile Updates</a>
                </li>
                <li>
                    <a href="../../pims/personnel/emp_rec.php">My Employment Records</a>
                </li>
                <li>
                    <a href="../../pims/personnel/service_rec.php">My Service Record</a>
                </li>
                <li>
                    <a href="../../pims/personnel/training.php">My Training Programs</a>
                </li>
            </ul>
        </li>


        <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu25" aria-expanded="false"><i class="fa fa-map-marker" aria-expanded="false"></i> My Leave Application<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu25" role="menu">
                        <li>
                            <a href="../../pims/personnel/leave_history.php">Leave History</a>
                        </li>
                        <li>
                            <a href="../../pims/personnel/leave_apply.php">Apply</a>
                        </li>
                    </ul>
                </ul>

                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu6"><i class="icon-user-tie" aria-expanded="false"></i>Personnel Leave Management<span class="caret"></span></a>
                        <ul class="nav collapse dropdown-menu" role="menu" id="submenu6">    
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu26" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Manage Leave <br>Applicants<span class="caret"></span></a>
                            </li>
                            <ul>
                                <ul class="nav collapse dropdown-submenu" id="subsubmenu26" role="menu">
                                    <li>
                                        <a href="../../pims/admin2/leave_applicants.php">Pending</a>
                                    </li>
                                    <li>
                                        <a href="../../pims/admin2/on_leave_list.php">On-Leave</a>
                                    </li>
                                </ul>
                            </ul>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu20" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Leave History<span class="caret"></span></a>
                            </li>
                            <ul>
                                <ul class="nav collapse dropdown-submenu" id="subsubmenu20" role="menu">
                                    <li>
                                        <a href="../../pims/admin2/approved_applicants.php">Approved</a>
                                    </li>
                                    <li>
                                        <a href="../../pims/admin2/disapproved_applicants.php">Disapproved</a>
                                    </li>
                                    <li>
                                        <a href="../../pims/admin2/canceled_application.php">Cancelled by Applicant</a>
                                    </li>
                                </ul>
                            </ul>
                            </ul>
                    </li>
                        <?php

                        }else{ ?>
                     <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu5"><i class="icon-user-tie" aria-expanded="false"></i>My Profile Management<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu5">
                
                <li>
                    <a href="../../pims/personnel/profile_updates.php">My Profile Updates</a>
                </li>
                <li>
                    <a href="../../pims/personnel/emp_rec.php">My Employment Records</a>
                </li>
                <li>
                    <a href="../../pims/personnel/service_rec.php">My Service Record</a>
                </li>
                <li>
                    <a href="../../pims/personnel/training.php">My Training Programs</a>
                </li>
            </ul>
        </li>


        <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu25" aria-expanded="false"><i class="fa fa-map-marker" aria-expanded="false"></i> My Leave Application<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu25" role="menu">
                        <li>
                            <a href="../../pims/personnel/leave_history.php">Leave History</a>
                        </li>
                        <li>
                            <a href="../../pims/personnel/leave_apply.php">Apply</a>
                        </li>
                    </ul>
                </ul>      
                    <?php        
                        }            
                    }        
                }
            ?>

        <!-- IMS -->
            <?php 
                if($ims_priv=="1" || ($user_type=="superadmin" && $ims_priv=="1")){
                    if($job_title=="SUO1" || ($user_type=="superadmin" && $ims_priv=="1")){
            ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu6"><i class="icon icon-database" aria-expanded="false"></i> Inventory<span class="caret"></span></a>
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
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu26" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Reports<span class="caret"></span></a>
                </li>
                <ul>
                    <ul class="nav collapse dropdown-submenu" id="subsubmenu26" role="menu">
                        <li><a href="../../ipms/ims/pages/annreport.php">Storage Report</a></li>
                        <li><a href="../../ipms/ims/pages/bldgreport.php">Building Report</a></li>
                        <li><a href="../../ipms/ims/pages/borrowreport.php">Borrowed Items Report</a></li>
                        <li><a href="../../ipms/ims/pages/equiphistory.php">Transaction History Report</a></li>
                    </ul>
                </ul>
            </ul>
        </li>          
            <?php 
                    }
                }
            ?>

        <!-- PMS -->
            <?php 
                if($pms_priv=="1" || ($user_type=="superadmin" && $pms_priv=="1")){ ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu7"><i class="icon icon-truck" aria-expanded="false"></i>Procurement<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu7"> 
            <?php
                    if($job_title=="SUO1" || ($user_type=="superadmin" && $pms_priv=="1")){
            ?>   
            <li>
                <a href="../../ipms/pms/admin/ris_page.php">RIS</a>
            </li>
            <li>
                <a href="../../ipms/pms/admin/pr.php">Purchase Request</a>
            </li>
            <li>
                <a href="../../ipms/pms/admin/po.php">Purchase Order</a>
            </li>
            <li>
                <a href="../../ipms/pms/admin/delivery.php">Delivery</a><!-- Lahat ng about sa delivery -->
            </li>
            <li>
                <a href="../../ipms/pms/admin/supplier.php">Supplier</a>
            </li>
            <li>
             <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu17" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Reports<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu17" role="menu">
                    <li><a href="../../ipms/pms/admin/risrec.php">RIS RECORDS</a></li>
                    <li><a href="../../ipms/pms/admin/pr_rec.php">PR RECORDS</a></li>
                    <li><a href="../../ipms/pms/admin/po_rec.php">PO RECORDSt</a></li>
                    <li><a href="../../ipms/pms/admin/iar.php">IAR RECORDS</a></li>
                </ul>
            </ul>
            <?php 
                        }else if($job_title=="SP1" || $job_title=="SP2" || $job_title=="SP3"){ ?>  
            <li>
             <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#subsubmenu18" aria-expanded="false"><i class="fa fa-fw fa-file-o" aria-expanded="false"></i>Requests<span class="caret"></span></a>
            </li>
            <ul>
                <ul class="nav collapse dropdown-submenu" id="subsubmenu18" role="menu">
                    <li><a href="../../ipms/pms/admin1/ris_request.php">RIS Requests</a></li>
                    <li><a href="../../ipms/pms/admin1/requests.php">PR Requests</a></li>
                    <li><a href="../../ipms/pms/admin1/po_request.php">PO Requests</a></li>
                </ul>
            </ul>
            <li>
                <a href="../../ipms/pms/admin1/report.php">Reports</a>
            </li>
            <?php
                        }else if($emp_type=="Teaching" || $emp_type=="Non Teaching"){ ?>
            <li>
                <a href="../../ipms/pms/USER/requi.php">Request Item</a>
            </li>
            <li>
                <a href="../../ipms/pms/USER/trans.php">Transaction Records</a>
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
                if($prs_priv=="1" || ($user_type=="superadmin" && $prs_priv=="1")){
                    if(strstr($job_title,"HRM") || ($user_type=="superadmin" && $prs_priv=="1")){
            ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu8"><i class="icon-calculator" aria-expanded="false"></i>Monthly Attendance<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu8"> 
                <li>
                    <a href="../../prs/AdminB/employee.php">Employee Masterlist</a><!-- Equipment,Supply,Add item,borrowed items-->
                </li>
                <li>
                    <a href="../../prs/AdminB/sort.php">Summary Record</a><!-- Lahat ng about sa bldgs -->
                </li>
            </ul>
        </li>         
            <?php 
                    }else if(strstr($job_title,"REG") || strstr($job_title,"CASH")){ ?>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu8"><i class="fa fa-fw fa-dashboard" aria-expanded="false">           </i>PAYROLL<span class="caret"></span></a>
                    <ul class="nav collapse dropdown-menu" role="menu" id="submenu8">
                        <li>
                            <a href="../../prs/admin/employee.php"><i class="fa fa-user"></i> <span>EMPLOYEE</span> </a>
                        </li>
                        <li>
                            <a href="../../prs/admin/payrollrep.php?gen=1">Generate Payroll</a>
                        </li>
                        <li>
                            <a href="../../prs/admin/payrollrep.php"><i class="fa fa-fw fa-circle-o"></i>Month's Report</a><!-- Equipment,Supply,Add item,borrowed items-->
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu2"><i class="fa fa-fw fa-list-alt" aria-expanded="false"></i>Table<span class="caret"></span></a>
                        </li>
                        <ul>
                            <ul class="nav collapse dropdown-menu" role="menu" id="submenu2">

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
                        </ul>
                        <li><a href="../../prs/admin/setting.php"><i class="fa fa-gear"></i> <span>SETTING</span></a></li>

                        <li><a href="../../prs/admin/report.php"><i class="fa fa-th-list"></i> <span>REPORT</span></a></li>
                    </ul>
                </li>    
        <?php
                            }

                }
            ?>

         <!-- SCMS -->
            <?php 
                if($scms_priv=="1" || ($user_type=="superadmin" && $scms_priv=="1")){ ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu9"><i class="icon-aid-kit" aria-expanded="false"></i> School Clinic<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu9"> 
            <?php
                    if($user_type=="admin" || ($user_type=="superadmin" && $scms_priv=="1")){
                        if(strstr($job_title,"NURS") || ($user_type=="superadmin" && $scms_priv=="1")){ ?>    
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
                    <a href="../../scms/pages/admin/reports.php">Reports</a>
                </li>   
            <?php    
                        }else if($emp_type=="Teaching"){
                            if($dept=="7"){ ?>   
                <li>
                    <a href="../../scms/pages/mapeh/index.php">BMI Records</a>
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
                        }else if($emp_type=="Non Teaching"){ ?>
                <li>
                    <a href="../../scms/pages/stuper/index.php">Medical Record</a>
                </li>
                <li>
                    <a href="../../scms/pages/stuper/consult_hist.php">Medical History</a>
                </li> 
            <?php                
                        }  
                    }else if($emp_type=="Teaching" || $emp_type=="Non Teaching" ){ ?>
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
                if($sis_priv=="1" || ($user_type=="superadmin" && $sis_priv=="1")){ ?>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu10"><i class="icon-user-check" aria-expanded="false"></i>Student<br>Management<span class="caret"></span></a>
            <ul class="nav collapse dropdown-menu" role="menu" id="submenu10">
            <?php
                    if($emp_type=="Teaching" ){
                        if(strstr($job_title,"TCH") || strstr($job_title,"HTEACH") || strstr($job_title,"INST") || strstr($job_title,"ICTD")){
            ?>    
            <li>
                <a href="../../SIS/teacher/student_list.php">Student List</a>
            </li>
            <?php 
                        }
                    }else if(strstr($job_title,"RK") || ($user_type=="superadmin" && $sis_priv=="1")){ ?>   
            <li>
                <a href="../../SIS/student/student_list.php">Student List</a>
            </li>
            <li>
                <a href="../../SIS/student/student_return.php">Change Student's Status</a>
            </li>
            <li>
                <a href="../../SIS/student/stu_drp_dwn.php">Assign Section</a>
            </li>
            <li>
                <a href="../../SIS/student/student_list.php?m=1">Add Student(s)</a>
            </li>
            <li>
                <a href="../../SIS/student/student_list.php?m=2">Process Grade</a>
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
<script>	 
  function modal_session_assign_zero(val){
    $.ajax({
      type: "POST",
      url: "default_session_modal.php",
      data: "value="+val,
      success: function(data){
      }
    });
  }
</script>	 


<script>	 
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

<!--THE CODE BELOW IS FOR THE TOP NAV BAR-->


                <link rel="stylesheet" href="../../../css/notif.css">
<?php 
    date_default_timezone_set('Asia/Manila');
    $navdate=date("Y-m-d");
    $yesterday=date("Y-m-d",time()-86400);

    $prsdate = date_default_timezone_set('Asia/Manila');

    $prevyear = date('Y', strtotime('-1 months'));
    $prevmonth = date('m', strtotime('-1 months'));

    $queryreport = mysqli_query($_SESSION['pims_data']['connection'],"SELECT * FROM prs_report WHERE month(date_issued) = '$prevmonth' AND year(date_issued) = '$prevyear'" );
    $checkreport = mysqli_num_rows($queryreport);

    $checkmtrmonth = mysqli_query($_SESSION['pims_data']['connection'],"SELECT * FROM `prs_mtr` WHERE month(time_issued)= month(now()) and year(time_issued) =year(now())");
    $checkmtrrow = mysqli_num_rows($checkmtrmonth);


     $queryempselect= mysqli_query($_SESSION['pims_data']['connection']," SELECT * FROM pims_personnel, pims_employment_records 
    Where pims_personnel.emp_No=pims_employment_records.emp_No");
     $checksalrec= '';
     $checkaddinfoget= '';

    $checkempno= mysqli_query($_SESSION['pims_data']['connection'],"SELECT emp_No
                                        FROM pims_personnel 
                                        WHERE emp_No NOT IN
                                    (SELECT emp_No FROM prs_salary_record)");
    $rowcheckempno = mysqli_num_rows($checkempno);

    $checkempadd= mysqli_query($_SESSION['pims_data']['connection'],"SELECT emp_No
                                        FROM pims_personnel 
                                        WHERE emp_No NOT IN
                                    (SELECT emp_No FROM prs_add_info)");
    $rowcheckempadd = mysqli_num_rows($checkempadd); //check Prs_add_info if an emp_No exist in it.

?>
<nav class="navbar navbar-static-top w3-card-4 navigaion-top">
                <div class="container-full">
                    <?php 
                    if(isset($_SESSION['user_data']['acct']['emp_no'])){ ?>
                    <button type="button" class="hamburger hamburger-remove is-closed fadeInLeft" data-toggle="offcanvas">
                        <span class="hamb hamb-top"></span>
                        <span class="hamb hamb-middle"></span>
                        <span class="hamb hamb-bottom"></span>
                    </button>
                    <?php
                    }
                    ?>
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"></button>
                            <a class="navbar-brand w3-card-4" href="../../../index.php"><img src="../img/pnhs_logo.png"></a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <hr class="hidden-sm hidden-md hidden-lg">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-target="dropdown-menu1">
                                        About Us<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" id="dropdown-menu1">
                                        <li><a href="../../../history.php">History</a></li>
                                        <li><a href="../../../vision_and_mission.php">Vision & Mission</a></li>
                                        <li><a href="../../../hymn.php">PNHS Hymn</a></li>
                                        <li><a href="../../../achievements.php">Achievements</a></li>
                                        <li><a href="../../../gpta.php">PNHS GPTA Officers</a></li>
                                        <li><a href="../../../map.php">Location and Campus Map</a></li>
                                        <li><a href="../../../orgchart.php">Organizational Chart</a></li>
                                        <li ><a href="../../../acknowledgement.php">Acknowledgement</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Programs <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="../../../hs.php">High School</a></li>
                                        <li><a href="../../../shs.php">Senior High School</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-left">
                                
                                 <li> <a href="../../../sp.php"><span> School Progress </span></a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                
                                
                                        <?php
                                        if(isset($_SESSION['user_data']['acct']['emp_no'])){ ?>
                                <li><a href="../../PIMS/messaging/chatroom.php">Messages</a></li>
                                <?php 
                                    if($prs_priv=="1"){
                                 ?>
                                <li>
                                    <a href="#" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                                       <?php if(!empty($checkreport) && empty($checkmtrrow) && empty($rowcheckempno) && !empty($rowcheckempadd)){?>		
                                                <img class="blink-image" src="../../prs/assets/images/alert.png" style=" width: 20px;height: 17px;border-radius: 50%;position: absolute;
                                        bottom: 22px; left: -5px"><?php } ?>
                                       Reminder
                                    </a>


                                    <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">

                                        <div class="notification-heading">
                                            <h4 class="menu-title">REMINDER</h4>
                                        </div>
                                        <li class="divider"></li>
                                        <div class="notifications-wrapper">
                                            <?php 

                                                if(empty($checkreport)){

                                            ?>
                                                <a class="content" href="#">
                                                    <div class="notification-item">
                                                        <h4 class="item-title">Last Month's Pay was not generated</h4>
                                                        <p class="item-info"><a href="../../prs/admin/payrolrep.php?gen=2">CLICK HERE TO GENERATE</a></p>
                                                    </div>
                                                </a>
                                            <?php } 
                                                if(empty($checkmtrrow)) {?>
                                                <a class="content" href="#">
                                                    <div class="notification-item">
                                                        <h4 class="item-title">This month's attendance was not submitted </h4>
<!--                                                        <p class="item-info">Marketing 101, Video Assignment</p>-->
                                                    </div>
                                                </a>
                                            <?php } 
                                                if (!empty($rowcheckempadd) || !empty($rowcheckempno) ){	?>
                                                <a class="content" href="#">
                                                    <div class="notification-item">
                                                        <h4 class="item-title">There's an employee who have an incomplete data.</h4>
                                                        <p class="item-info"><a href="../../prs/admin/employee.php" style="text-decoration: none;"><font style="color: #185c92;font-size: 10px;font-weight: 600;">Go to Employee list</font></a></p>
                                                        </div>
                                                </a>
                                            <?php  } if(empty($rowcheckempno) && !empty($checkmtrrow) && !empty($checkreport)) {?>
                                                        <a class="content" href="#">
                                                    <div class="notification-item">
                                                        <h4 class="item-title">You are up to date with all your requirements</h4>
                                                        <p class="item-info"></p>
                                                        </div>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php
                                            if($dms_priv=="1" || $ipcr_priv=="1" || $pims_priv=="1" || $pms_priv=="1"){ ?>
                                <li class="dropdown-notif">
                                    <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
                                        <span>Notifications</span><span class="label label-primary">
                                        <?php 
                                            $notif=0;                                                                           
                                            $inbox=mysqli_query($_SESSION['pims_data']['connection'],
                                            "SELECT count(dms_message.mes_id) FROM dms_message,dms_receiver,cms_account,pims_personnel 
                                            WHERE dms_receiver.rec_no=dms_message.rec_no
                                            AND pims_personnel.emp_no=cms_account.emp_no
                                            AND dms_message.cms_account_id=cms_account.cms_account_id
                                            AND dms_receiver.rec_no=$recid
                                            AND mes_status='0' AND mes_delete='0'");
                                            $inboxrow=mysqli_fetch_assoc($inbox);
                                            $notif+=$inboxrow['count(dms_message.mes_id)'];
                                                
                                            //PMS
                                            if(strstr($job_title,"SUO")){                                                                          
                                                
                                                $risqla=mysqli_query($_SESSION['pims_data']['connection'],"SELECT ris_no,concat(p_fname,' ',p_lname) as Name FROM pims_personnel,pms_ris WHERE req_status='Approved' 
                                                AND pms_ris.emp_no=pims_personnel.emp_no");
                                                $risnuma=mysqli_num_rows($risqla);
                                                if ($risnuma > 0) {
                                                    $notif+=$risnuma;
                                                }
                                                
                                                $risqld=mysqli_query($_SESSION['pims_data']['connection'],"SELECT ris_no,concat(p_fname,' ',p_lname) as Name FROM pims_personnel,pms_ris WHERE req_status='Denied' 
                                                AND pms_ris.emp_no=pims_personnel.emp_no");
                                                $risnumd=mysqli_num_rows($risqld);
                                                if ($risnumd > 0) {
                                                    $notif+=$risnumd;
                                                }
                                                
                                                $prsqla=mysqli_query($_SESSION['pims_data']['connection'],"SELECT pr_no FROM pms_pr WHERE pr_status='Approved' ");
                                                $prnuma=mysqli_num_rows($prsqla);
                                                if ($prnuma > 0) {
                                                    $notif+=$prnuma;
                                                }
                                                
                                                $prsqld=mysqli_query($_SESSION['pims_data']['connection'],"SELECT pr_no FROM pms_pr WHERE pr_status='Denied' 
                                                ");
                                                $prnumd=mysqli_num_rows($prsqld);
                                                if ($prnumd > 0) {
                                                    $notif+=$prnumd;
                                                }
                                                
                                                $posqla=mysqli_query($_SESSION['pims_data']['connection'],"SELECT po_no FROM pms_po WHERE po_status='Approved' 
                                                ");
                                                $ponuma=mysqli_num_rows($posqla);
                                                if ($ponuma > 0) {
                                                    $notif+=$ponuma;
                                                }
                                                
                                                $posqld=mysqli_query($_SESSION['pims_data']['connection'],"SELECT po_no FROM pms_po WHERE po_status='Denied' 
                                                ");
                                                $ponumd=mysqli_num_rows($posqld);
                                                if ($ponuma > 0) {
                                                    $notif+=$ponumd;
                                                }
                                            }else if(strstr($job_title,"SP")){
                                                $risql=mysqli_query($_SESSION['pims_data']['connection'],"SELECT req_date,ris_no,concat(p_fname,' ',p_lname) as Name FROM pims_personnel,pms_ris WHERE req_status='Pending'
                                                AND pms_ris.emp_no=pims_personnel.emp_no");
                                                $risnum=mysqli_num_rows($risql);
                                                if ($risnum > 0) {
                                                    $notif+=$risnum;
                                                }
                                                
                                                $prsql=mysqli_query($_SESSION['pims_data']['connection'],"SELECT pr_date,pr_no FROM pms_pr WHERE pr_status='Pending' ");
                                                $prnum=mysqli_num_rows($prsql);
                                                if ($prnum > 0) {
                                                    $notif+=$prnum;
                                                }
                                                
                                                $posql=mysqli_query($_SESSION['pims_data']['connection'],"SELECT po_date,po_no FROM pms_po WHERE po_status='Pending'");
                                                $ponum=mysqli_num_rows($posql);
                                                if ($ponum > 0) {
                                                    $notif+=$ponum;
                                                }
                                            }else{
                                                $risqla=mysqli_query($_SESSION['pims_data']['connection'],"SELECT pms_ris.ris_no FROM pms_ris,pims_personnel 
                                                WHERE req_status='Approved' 
                                                AND pms_ris.emp_no=pims_personnel.emp_no
                                                AND pms_ris.emp_no=$funcemp");
                                                $risnuma=mysqli_num_rows($risqla);
                                                if ($risnuma > 0) {
                                                    $notif+=$risnuma;
                                                }
                                                
                                                $risqld=mysqli_query($_SESSION['pims_data']['connection'],"SELECT pms_ris.ris_no FROM pms_ris,pims_personnel 
                                                WHERE req_status='Denied' 
                                                AND pms_ris.emp_no=pims_personnel.emp_no
                                                AND pms_ris.emp_no=$funcemp");
                                                $risnumd=mysqli_num_rows($risqld);
                                                if ($risnumd > 0) {
                                                    $notif+=$risnumd;
                                                }
                                            }
                                                
                                            //IPCRM     
                                            if(strstr($job_title,"HTEACH")){                                                                          
                                                $nsql=mysqli_query($_SESSION['pims_data']['connection'],"SELECT distinct concat(p_fname,' ',p_lname) as Name FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Pending' ");
                                                $ntsql=mysqli_num_rows($nsql);
                                                if ($ntsql > 0) {
                                                    $notif+=$ntsql;
                                                }                                                                           
                                                //$notif+=$inboxrow['count(dms_message.mes_id)'];
                                            }else if(strstr($job_title,"SP")){
                                                $nsql=mysqli_query($_SESSION['pims_data']['connection'],"SELECT distinct concat(p_fname,' ',p_lname) as Name FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Verified' ");
                                                $ntsql=mysqli_num_rows($nsql);
                                                if ($ntsql > 0) {
                                                    $notif+=$ntsql;
                                                }
                                            }else if(strstr($job_title,"TCH") || strstr($job_title,"MTCHR")){
                                                $nsql=mysqli_query($_SESSION['pims_data']['connection'],"SELECT distinct concat(p_fname,' ',p_lname) as Name FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Approved' and pims_personnel.emp_no=$funcemp");
                                                $ntsql=mysqli_num_rows($nsql);
                                                if ($ntsql > 0) {
                                                    $notif+=$ntsql;
                                                }      
                                            }
                                            
                                            echo $notif;                                            
                                        ?></span>
                                        <span class="caret"></span>
                                    </a>

                                  <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">

                                    <div class="notification-heading">
                                        <h4 class="menu-title">Notifications</h4>
<!--                                    <h4 class="menu-title pull-right">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4>-->
                                    </div>
                                    <li class="divider"></li>
                                    <div class="notifications-wrapper">
                                       <?php 
                                        
                                        if($notif!=0){
                                            //DMS        
                                            if($inboxrow['count(dms_message.mes_id)']>=1){
                                                $mes=mysqli_query($_SESSION['pims_data']['connection'],"SELECT concat(p_fname,' ',p_lname) as Name,dms_message.mes_id,mes_title,sent FROM dms_message,dms_receiver,cms_account,pims_personnel 
                                                WHERE dms_receiver.rec_no=dms_message.rec_no
                                                AND pims_personnel.emp_no=cms_account.emp_no
                                                AND dms_message.cms_account_id=cms_account.cms_account_id
                                                AND dms_receiver.rec_no=$recid
                                                AND mes_status='0'");
                                                while($mesrow=mysqli_fetch_assoc($mes)){
                                                $dt=strtotime($mesrow['sent']);
                                                $datetime=date("M d,Y h:i A",$dt);
                                                if(strstr($job_title,"HRM") || strstr($job_title,"ICTD")){ ?>
                                                
                                                <a class="content" href="../../dms/admin/mes_update.php?read=1&del=0&mid=<?php echo $mesrow['mes_id']; ?>">
                                                    <div class="notification-item">
                                                        <h4 class="item-title"><?php echo $mesrow['Name']; ?>
                                                            <?php
                                                                if($yesterday==$mesrow['sent']){
                                                                    echo "<em>Yesterday</em>";
                                                                }else{
                                                                    echo "<em>".$datetime."</em>";
                                                                }
                                                            ?>
                                                        </h4>
                                                        <p class="item-info"><?php echo $mesrow['Name']; ?> sent you a request</p>
                                                    </div>
                                                </a>
                                                <?php    
                                                }else{ ?>
                                                <a class="content" href="../../dms/user/mes_update.php?read=1&del=0&mid=<?php echo $mesrow['mes_id']; ?>">
                                                    <div class="notification-item">
                                                        <h4 class="item-title"><?php echo $mesrow['Name']; ?>
                                                            <?php
                                                                if($yesterday==$mesrow['sent']){
                                                                    echo "<em>Yesterday</em>";
                                                                }else{
                                                                    echo "<em>".$datetime."</em>";
                                                                }
                                                            ?>
                                                        </h4>
                                                        <p class="item-info"><?php echo $mesrow['Name']; ?> responded on your request</p>
                                                    </div>
                                                </a>
                                            <?php        
                                                }    
                                                ?>
                                                
                                        <?php         
                                                }
                                            }
                                            //IPCRM     
                                            if(strstr($job_title,"HTEACH")){   
                                                if($ntsql>0){
                                                    $notif=mysqli_query($_SESSION['pims_data']['connection'],"SELECT distinct concat(p_fname,' ',p_lname) as Name,ipcrms_content.emp_No FROM ipcrms_content,pims_personnel, pims_employment_records WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Pending' AND dept_ID='$dept' and pims_personnel.emp_No = pims_employment_records.emp_No");
                                                    while($norow=mysqli_fetch_assoc($notif)){ ?>
                                                <a class="content" href="../../ipcrm/admin_DH/view.php?emp=<?php echo $norow['emp_No']; ?> ">
                                                    <div class="notification-item">
                                                        <h4 class="item-title"><?php echo $norow['Name'];?></h4>
                                                        <p class="item-info"><?php echo $norow['Name'];?> has submitted a form</p>
                                                    </div>
                                                </a>
                                        <?php	

                                                    }
                                                }

                                            }else if(strstr($job_title,"SP")){
                                                if($ntsql>0){
                                                    $notif=mysqli_query($_SESSION['pims_data']['connection'],"SELECT distinct concat(p_fname,' ',p_lname) as Name,ipcrms_content.emp_No FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Verified'");
                                                    while($norow=mysqli_fetch_assoc($notif)){ ?>
                                                <a class="content" href="../../ipcrm/admin_SH/view.php?emp=<?php echo $norow['emp_No']; ?> ">
                                                    <div class="notification-item">
                                                        <h4 class="item-title"><?php echo $norow['Name'];?></h4>
                                                        <p class="item-info"><?php echo $norow['Name'];?>'s form has been verified </p>
                                                    </div>
                                                </a>
                                        <?php	

                                                    }
                                                }
                                            }else if(strstr($job_title,"TCH") || strstr($job_title,"MTCHR")){
                                                if($ntsql>0){
                                                $notif=mysqli_query($_SESSION['pims_data']['connection'],"SELECT distinct concat(p_fname,' ',p_lname) as Name,ipcrms_content.emp_No FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Approved' and pims_personnel.emp_no=$funcemp");
								                while($norow=mysqli_fetch_assoc($notif)){ ?>
                                                <a class="content" href="../../ipcrm/view.php?emp=<?php echo $norow['emp_No']; ?> ">
                                                    <div class="notification-item">
                                                        <h4 class="item-title"><?php echo $norow['Name'];?></h4>
                                                        <p class="item-info"><?php echo $norow['Name'];?>, your form has been approved</p>
                                                    </div>
                                                </a>
                                        <?php          
                                                }
                                                }
                                            }
                                            
                                            //PMS
                                            if(strstr($job_title,"SUO")){                                                                          
                                                
                                                if ($risnuma > 0) { 
                                                    while($risra=mysqli_fetch_assoc($risqla)){ ?>
                                                
                                            <a class="content" href="#">
                                                <div class="notification-item">
                                                    <h4 class="item-title">
                                                    </h4>
                                                    <p class="item-info">RIS request No.<?php echo $risra['ris_no']; ?> has been approved!</p>
                                                </div>
                                            </a>
                                                <?php        
                                                    }
                                                }
                                                
                                                if ($risnumd > 0) { 
                                                    while($risrd=mysqli_fetch_assoc($risqld)){ ?>
                                                
                                            <a class="content" href="#">
                                                <div class="notification-item">
                                                    <h4 class="item-title">
                                                    </h4>
                                                    <p class="item-info">RIS request No.<?php echo $risrd['ris_no']; ?> has been denied!</p>
                                                </div>
                                            </a>
                                                <?php        
                                                    }
                                                }
                                                
                                                if ($prnuma > 0) { 
                                                    while($prra=mysqli_fetch_assoc($prsqla)){ ?>
                                                
                                            <a class="content" href="#">
                                                <div class="notification-item">
                                                    <h4 class="item-title">
                                                    </h4>
                                                    <p class="item-info">PR No.<?php echo $prra['pr_no']; ?> has been approved!</p>
                                                </div>
                                            </a>
                                                <?php        
                                                    }
                                                }
                                                
                                                if ($prnumd > 0) { 
                                                    while($prrd=mysqli_fetch_assoc($prsqld)){ ?>
                                                
                                            <a class="content" href="#">
                                                <div class="notification-item">
                                                    <h4 class="item-title">
                                                    </h4>
                                                    <p class="item-info">PR No.<?php echo $prrd['pr_no']; ?> has been denied!</p>
                                                </div>
                                            </a>
                                                <?php        
                                                    }
                                                }
                                                
                                                if ($ponuma > 0) { 
                                                    while($pora=mysqli_fetch_assoc($posqla)){ ?>
                                                
                                            <a class="content" href="#">
                                                <div class="notification-item">
                                                    <h4 class="item-title">
                                                    </h4>
                                                    <p class="item-info">PO No.<?php echo $pora['po_no']; ?> has been approved!</p>
                                                </div>
                                            </a>
                                                <?php        
                                                    }
                                                }
                                                
                                                if ($ponumd > 0) { 
                                                    while($pord=mysqli_fetch_assoc($posqld)){ ?>
                                                
                                            <a class="content" href="#">
                                                <div class="notification-item">
                                                    <h4 class="item-title">
                                                    </h4>
                                                    <p class="item-info">PO No.<?php echo $pord['po_no']; ?> has been denied!</p>
                                                </div>
                                            </a>
                                                <?php        
                                                    }
                                                }
                                                
                                            }else if(strstr($job_title,"SP")){
                                                if ($risnum > 0) { 
                                                    while($risr=mysqli_fetch_assoc($risql)){ ?>
                                                
                                            <a class="content" href="#">
                                                <div class="notification-item">
                                                    <h4 class="item-title"><?php echo $risr['req_date'];?>
                                                    </h4>
                                                    <p class="item-info"><?php echo $risr['Name'];?> has sent you an RIS request with RIS No.<?php echo $risr['ris_no']; ?></p>
                                                </div>
                                            </a>
                                                <?php        
                                                    }
                                                }
                                                
                                                if ($prnum > 0) { 
                                                    while($prr=mysqli_fetch_assoc($prsql)){ ?>
                                                
                                            <a class="content" href="#">
                                                <div class="notification-item">
                                                    <h4 class="item-title"><?php echo $prr['pr_date'];?>
                                                    </h4>
                                                    <p class="item-info">The Supply Officer has sent you a PR request with PR No.<?php echo $prr['pr_no']; ?></p>
                                                </div>
                                            </a>
                                                <?php        
                                                    }
                                                }
                                                
                                                if ($ponum > 0) { 
                                                    while($por=mysqli_fetch_assoc($posql)){ ?>
                                                
                                            <a class="content" href="#">
                                                <div class="notification-item">
                                                    <h4 class="item-title"><?php echo $por['po_date'];?>
                                                    </h4>
                                                    <p class="item-info">The Supply Officer has sent you a PO request with PO No.<?php echo $por['po_no']; ?></p>
                                                </div>
                                            </a>
                                                <?php        
                                                    }
                                                }
                                            }else{
                                                if ($risnuma > 0) { 
                                                    while($risra=mysqli_fetch_assoc($risqla)){ ?>
                                                
                                            <a class="content" href="#">
                                                <div class="notification-item">
                                                    <h4 class="item-title">
                                                    </h4>
                                                    <p class="item-info">Your RIS No.<?php echo $risra['ris_no']; ?> has been approved</p>
                                                </div>
                                            </a>
                                                <?php        
                                                    }
                                                }
                                                
                                                if ($risnumd > 0) { 
                                                    while($risrd=mysqli_fetch_assoc($risqld)){ ?>
                                                
                                            <a class="content" href="#">
                                                <div class="notification-item">
                                                    <h4 class="item-title">
                                                    </h4>
                                                    <p class="item-info">Your RIS No.<?php echo $risrd['ris_no']; ?> has been Denied</p>
                                                </div>
                                            </a>
                                                <?php        
                                                    }
                                                }
                                            }
                                        }else{
                                            ?>    
                                            <a class="content" href="#">
                                                <div class="notification-item">
                                                    <h4 class="item-title">You have no new notification</h4>
                                                </div>
                                            </a> 
                                       <?php
                                        } ?>
                                    
                                    </div>
                                  </ul>

                                </li>
                                    <?php 
                                            }
                                        }
                                
                                if(isset($_SESSION['user_data']['acct']['lrn'])){  
                                       
                                        if($css_priv=="1"){ ?>
                                <li>
                                    <a href="../../CSS/admin/section.php" >My Schedule</a>
                                </li>      
                                        <?php        
                                            } 
                                        if($oes_priv=="1"){ ?>
                                <li>
                                    <a href="../../OES/my_subjects.php"> My Subjects</a>
                                </li>     
                                        <?php        
                                            } 
                                    
                                        if($scms_priv=="1"){ ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        Health Monitor
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="../../SCMS/pages/stuper/index.php">Medical Records</a></li>
                                        <li><a href="../../SCMS/pages/stuper/consult_history.php">Consultation History</a></li>
                                    </ul>
                                </li>     
                                        <?php        
                                            } 
                                      
                                        } 
                                ?>
                                    
                                
                                
                                <?php 
                                    if(isset($_SESSION['user_data']['acct']['emp_no'])){ ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?php 
                                        $empname=mysqli_query($_SESSION['pims_data']['connection'],"SELECT concat(p_fname,' ',p_lname)as Name FROM pims_personnel WHERE emp_no=$funcemp");
                                        $emprow=mysqli_fetch_assoc($empname);
                                        echo $emprow['Name']." ";
                                        ?>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="../../pims/personnel/profile.php">My Profile</a></li>
                                        <li><a href="../../../admin/cpassword.php">Change Password</a></li>
                                        <li><a href="../myfunc/login2.php">Logout</a></li>
                                    </ul>
                                </li>
                                <?php        
                                    }else if(isset($_SESSION['user_data']['acct']['lrn'])){ ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?php 
                                        $sesh_lrn=$_SESSION['user_data']['acct']['lrn'];
                                        $empname=mysqli_query($_SESSION['pims_data']['connection'],"SELECT concat(stu_fname,' ',stu_lname)as Name FROM sis_student WHERE lrn=$sesh_lrn");
                                        $emprow=mysqli_fetch_assoc($empname);
                                        echo $emprow['Name']." ";
                                        ?>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="../../SIS/stu/student_pi.php">My Profile</a></li>
                                        <li><a href="../../../admin/cpassword.php">Change Password</a></li>
                                        <li><a href="" data-toggle="modal" data-target="#logoutModal">Logout</a></li>
                                    </ul>
                                </li>
                                <?php    
                                    }else{ ?>
                                    <li><a href="" data-toggle="modal" data-target="#myModal">Login</a></li>
                                <?php        
                                    }
                                ?>        
                                
                            </ul>
                        </div>
                    </div>
                    <hr class="w3-theme-yd2">
                    <hr class="w3-theme-bd2">
                </div>
            </nav>
    <br><br><br>
	<script>
	
			<?php
                include("../myfunc/nav2v3.php");
            ?>
                var typing = 0;
                var loading1 = 0;
                var loading2 = 0;
		
		function messageCount(){
			$.ajax({
	     			url: '../myfunc/messagesCount1.php',
	    			contentType: false,
	        		cache: false,
	        		processData:false,
	    			success: function(data, textStatus, jqXHR)
	    				{	
	 						if ( data > 0 ) $('#messagesNum').text(data);
							else $('#messagesNum').text("");
							setTimeout(messageCount, 3000);
	    				},
	    			error: function(jqXHR, textStatus, errorThrown) 
	    				{	
							resetAlertify();
							alertify.error(jqXHR);
	     				}          
	    	});
		}
		
		
                
                function myFunction() {
                     // Declare variables
                      
                      
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("myTable");
                    tr = table.getElementsByTagName("tr");
                    
                    if ( $('#myInput').val() == "" ){
                        typing = 0;
                    }
                    else{
                        typing = 1;
                    }
                    
                    if ( typing == 0 && loading1 == 1 ){
                        loading1 = 0;
                        $('#myTable').attr({ 'style':'display:none' });
                        $('#side-menu0').attr({ 'style':'display:block' });
						$('#side-menu1').attr({ 'style':'display:block' });
                        $('#side-menu2').attr({ 'style':'display:block' });
                        $('#side-menu3').attr({ 'style':'display:block' });
                        $('#searchbutton1').attr({ 'style':'display:block' });
                        $('#searchbutton2').attr({ 'style':'display:none' });
                    }
                    else if ( typing == 1 && loading1 == 0 ){
                        loading1 = 1;
                        $('#myTable').attr({ 'style':'display:block' });
						$('#side-menu0').attr({ 'style':'display:none' });
						$('#side-menu1').attr({ 'style':'display:none' });
                        $('#side-menu2').attr({ 'style':'display:none' });
                        $('#side-menu3').attr({ 'style':'display:none' });
                        $('#searchbutton1').attr({ 'style':'display:none' });
                        $('#searchbutton2').attr({ 'style':'display:block' });
                    }
                    
                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                                $('#zeroresults').attr({ 'style':'display:none' });
                            } else {
                                tr[i].style.display = "none";
                                if( $('#myTable').children(':visible').length === 0 ) {
                                    $('#zeroresults').attr({ 'style':'display:block' });
                                }
                                else{
                                    $('#zeroresults').attr({ 'style':'display:none' });
                                }
                            }
                        }
                    }
                    
                }
				
		$(document).ready(function(){
			messageCount();
		});
	</script>


   