<?php
    if($_SERVER['REQUEST_URI'] == "/PNHSLEA2/LEA/topnav.php") {
        header('HTTP/1.0 403 Forbidden');
    }
    else {
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
                            <a class="navbar-brand w3-card-4" href="index.php"><img src="../img/pnhs_logo.png"></a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <hr class="hidden-sm hidden-md hidden-lg">
                            <ul class="nav navbar-nav">
                                <li><a href="../index.php">Home</a></li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        About Us<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="../history.php">History</a></li>
                                        <li><a href="../vision_and_mission.php">Vision & Mission</a></li>
                                        <li><a href="../hymn.php">PNHS Hymn</a></li>
                                        <li><a href="../achievements.php">Achievements</a></li>
                                        <li><a href="../gpta.php">PNHS GPTA Officers</a></li>
                                        <li><a href="../map.php">Location and Campus Map</a></li>
                                        <li><a href="../orgchart.php">Organizational Chart</a></li>
                                        <li ><a href="../acknowledgements.php">Acknowledgement</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Programs <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="../hs.php">High School</a></li>
                                        <li><a href="../shs.php">Senior High School</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-left">
                                 <li> <a href="../sp.php"><span> School Progress </span></a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-left">
                                <li><a href="../feedback.php">Feedback</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                        <?php
                                        if(isset($_SESSION['user_data'])){ ?>
                                <li><a href="login.php">Messages</a></li>
                                <?php
                                            if($dms_priv=="1" || $ipcr_priv=="1" || $pims_priv=="1" || $pms_priv=="1"){ ?>
                                <!-- <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span>Notifications</span><span class="label label-primary"><?php 
                                            $notif=0;                                                                           
                                            $inbox=mysqli_query($mysqli,
                                            "SELECT count(dms_message.mes_id) FROM dms_message,dms_receiver,cms_account,pims_personnel 
                                            WHERE dms_receiver.rec_no=dms_message.rec_no
                                            AND pims_personnel.emp_no=cms_account.emp_no
                                            AND dms_message.cms_account_id=cms_account.cms_account_id
                                            AND dms_receiver.rec_no=$recid
                                            AND mes_status='0' AND mes_delete='0'");
                                            $inboxrow=mysqli_fetch_assoc($inbox);
                                            
                                            //IPCRM     
                                            if(strstr($job_title,"HTEACH")){                                                                          
                                                $nsql=mysqli_query($mysqli,"SELECT distinct concat(p_fname,' ',p_lname) as Name FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Verified' ");
                                                $ntsql=mysqli_num_rows($nsql);
                                                if ($ntsql > 0) {
                                                    $notif+=$ntsql;
                                                }                                                                           
                                                $notif+=$inboxrow['count(dms_message.mes_id)'];
                                            }else if(strstr($job_title,"SP")){
                                                $nsql=mysqli_query($mysqli,"SELECT distinct concat(p_fname,' ',p_lname) as Name FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Verified' ");
                                                $ntsql=mysqli_num_rows($nsql);
                                                if ($ntsql > 0) {
                                                    $notif+=$ntsql;
                                                }
                                            }
                                            
                                            echo $notif;                                            
                                        ?></span>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                        if($notif!=0){
                                            //DMS        
                                            if($inboxrow['count(dms_message.mes_id)']>=1){
                                                $mes=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname) as Name,dms_message.mes_id,mes_title,sent FROM dms_message,dms_receiver,cms_account,pims_personnel 
                                                WHERE dms_receiver.rec_no=dms_message.rec_no
                                                AND pims_personnel.emp_no=cms_account.emp_no
                                                AND dms_message.cms_account_id=cms_account.cms_account_id
                                                AND dms_receiver.rec_no=$recid
                                                AND mes_status='0'");
                                                while($mesrow=mysqli_fetch_assoc($mes)){
                                                $dt=strtotime($mesrow['sent']);
                                                $datetime=date("M d,Y h:i A",$dt);
                                                ?>    
                                                <li>
                                                    <a href="mes_update.php?read=1&del=0&mid=<?php echo $mesrow['mes_id']; ?>">
                                                        <span class="image"><?php echo $mesrow['Name']; ?><br>responded on your request</span>
                                                        <span class="message">
                                                             <?php
                                                                if($yesterday==$mesrow['sent']){
                                                                    echo "<em>Yesterday</em>";
                                                                }else{
                                                                    echo "<em>".$datetime."</em>";
                                                                }
                                                            ?>
                                                        </span>
                                                    </a>
                                                </li> <?php         
                                                }
                                            }
                                            //IPCRM     
                                            if(strstr($job_title,"HTEACH")){   
                                                if($ntsql>0){
                                                    $notif=mysqli_query($mysqli,"SELECT distinct concat(p_fname,' ',p_lname) as Name,ipcrms_content.emp_No FROM ipcrms_content,pims_personnel, pims_employment_records WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Pending' AND dept_ID='$dept' and pims_personnel.emp_No = pims_employment_records.emp_No");
                                                    while($norow=mysqli_fetch_assoc($notif)){ ?>
                                                        <li class="header">
                                                            <a href="view.php?emp=<?php echo $norow['emp_No']; ?> ">
                                                            <font color="black" size="2"><?php echo $norow['Name'];?> has submitted a form </font>
                                                            </a>
                                                        </li>
                                                    <?php	

                                                        }
                                                }

                                            }else if(strstr($job_title,"SP")){
                                                if($ntsql>0){
                                                    $notif=mysqli_query($mysqli,"SELECT distinct concat(p_fname,' ',p_lname) as Name,ipcrms_content.emp_No FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Verified'");
                                                    while($norow=mysqli_fetch_assoc($notif)){ ?>
                                                    <li class="header">
                                                        <a href="view.php?emp=<?php echo $norow['emp_No']; ?> ">
                                                        <font color="black" size="2"><?php echo $norow['Name'];?>'s form has been verified </font>
                                                        </a>
                                                    </li>
                                                    <?php	

                                                        }
                                                }
                                            }     
                                        }else{
                                            ?>    
                                            <li><a>You have no notifications yet</a></li> <?php
                                        } ?>
                                        
                                    </ul>
                                </li> -->
                                        <?php        
                                        }   
                                        }
                                        
                                        ?>
                                <?php 
                                    if(isset($_SESSION['user_data'])) { ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?php 
                                        $empname=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname)as Name FROM pims_personnel WHERE emp_no=$emp");
                                        $emprow=mysqli_fetch_assoc($empname);
                                        echo $emprow['Name']." ";
                                        ?>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="../../pims/personnel/include/normal_view.php">My Profile</a></li>
                                        <li><a href="cpasswd.php">Change Password</a></li>
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
<?php
    }
?>