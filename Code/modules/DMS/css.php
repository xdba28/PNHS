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