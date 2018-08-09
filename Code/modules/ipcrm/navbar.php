<nav class="navbar navbar-static-top w3-card-4 navigaion-top">
                <div class="container-full">
                    <button type="button" class="hamburger hamburger-remove is-closed fadeInLeft" data-toggle="offcanvas">
                        <span class="hamb hamb-top"></span>
                        <span class="hamb hamb-middle"></span>
                        <span class="hamb hamb-bottom"></span>
                    </button>
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"></button>
                            <a class="navbar-brand w3-card-4" href="#"><img src="docs/img/pnhs_logo.png"></a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <hr class="hidden-sm hidden-md hidden-lg">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Home</a></li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <li><a href="#">Announcements</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="login.php">Messages</a></li>
                                
                                
                                <?php
                                        if(isset($_SESSION['user_data'])){ ?>
		
                                <?php
                                            if($dms_priv=="1" || $ipcr_priv=="1" || $pims_priv=="1" || $pms_priv=="1"){ ?>
                                <li class="dropdown-notif">
                                    <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
                                        <span>Notifications</span><span class="label label-primary">
                                        <?php 
                                            $notif=0;                                                                           
                                            $inbox=mysql_query(
                                            "SELECT count(dms_message.mes_id) FROM dms_message,dms_receiver,cms_account,pims_personnel 
                                            WHERE dms_receiver.rec_no=dms_message.rec_no
                                            AND pims_personnel.emp_no=cms_account.emp_no
                                            AND dms_message.cms_account_id=cms_account.cms_account_id
                                            AND dms_receiver.rec_no=$recid
                                            AND mes_status='0' AND mes_delete='0'");
                                            $inboxrow=mysql_fetch_assoc($inbox);
                                            $notif+=$inboxrow['count(dms_message.mes_id)'];
                                            //IPCRM     
                                            if(strstr($job_title,"HTEACH")){                                                                          
                                                $nsql=mysql_query("SELECT distinct concat(p_fname,' ',p_lname) as Name FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Verified' ");
                                                $ntsql=mysql_num_rows($nsql);
                                                if ($ntsql > 0) {
                                                    $notif+=$ntsql;
                                                }                                                                           
                                                $notif+=$inboxrow['count(dms_message.mes_id)'];
                                            }else if(strstr($job_title,"SP")){
                                                $nsql=mysql_query("SELECT distinct concat(p_fname,' ',p_lname) as Name FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Verified' ");
                                                $ntsql=mysql_num_rows($nsql);
                                                if ($ntsql > 0) {
                                                    $notif+=$ntsql;
                                                }
                                            }else if(strstr($job_title,"TCH") || strstr($job_title,"MTCHR")){
                                                $nsql=mysql_query("SELECT distinct concat(p_fname,' ',p_lname) as Name FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Approved' and pims_personnel.emp_no=$emp");
                                                $ntsql=mysql_num_rows($nsql);
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
                                                $mes=mysql_query("SELECT concat(p_fname,' ',p_lname) as Name,dms_message.mes_id,mes_title,sent FROM dms_message,dms_receiver,cms_account,pims_personnel 
                                                WHERE dms_receiver.rec_no=dms_message.rec_no
                                                AND pims_personnel.emp_no=cms_account.emp_no
                                                AND dms_message.cms_account_id=cms_account.cms_account_id
                                                AND dms_receiver.rec_no=$recid
                                                AND mes_status='0'");
                                                while($mesrow=mysql_fetch_assoc($mes)){
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
                                                    $notif=mysql_query("SELECT distinct concat(p_fname,' ',p_lname) as Name,ipcrms_content.emp_No FROM ipcrms_content,pims_personnel, pims_employment_records WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Pending' AND dept_ID='$dept' and pims_personnel.emp_No = pims_employment_records.emp_No");
                                                    while($norow=mysql_fetch_assoc($notif)){ ?>
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
                                                    $notif=mysql_query("SELECT distinct concat(p_fname,' ',p_lname) as Name,ipcrms_content.emp_No FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Verified'");
                                                    while($norow=mysql_fetch_assoc($notif)){ ?>
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
                                                $notif=mysql_query("SELECT distinct concat(p_fname,' ',p_lname) as Name,ipcrms_content.emp_No FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Approved' and pims_personnel.emp_no=$emp");
								                while($norow=mysql_fetch_assoc($notif)){ ?>
                                                <a class="content" href="../../ipcrm/admin_SH/view.php?emp=<?php echo $norow['emp_No']; ?> ">
                                                    <div class="notification-item">
                                                        <h4 class="item-title"><?php echo $norow['Name'];?></h4>
                                                        <p class="item-info"><?php echo $norow['Name'];?>, your form has been approved</p>
                                                    </div>
                                                </a>
                                        <?php          
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
                                ?>
                                        
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?php 
                                        $empname=mysql_query("SELECT concat(p_fname,' ',p_lname)as Name FROM pims_personnel WHERE emp_no=$emp");
                                        $emprow=mysql_fetch_assoc($empname);
                                        echo $emprow['Name']." ";
                                        ?>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="../../pims/personnel/include/normal_view.php">My Profile</a></li>
                                        <li><a href="../logout.php">Change Password</a></li>
                                        <li><a href="../logout.php">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr class="w3-theme-yd2">
                    <hr class="w3-theme-bd2">
                </div>
            </nav>