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
                            <a class="navbar-brand w3-card-4" href="#"><img src="../docs/img/pnhs_logo.png"></a>
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
                                            if($dms_priv=="1" || $ipcr_priv=="1" || $pims_priv=="1" || $pms_priv=="1"){ ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span>Notifications</span><span class="label label-primary pull-right"><?php $inbox=mysqli_query($mysqli,
                                            "SELECT count(dms_message.mes_id) FROM dms_message,dms_receiver,cms_account,pims_personnel 
                                            WHERE dms_receiver.rec_no=dms_message.rec_no
                                            AND pims_personnel.emp_no=cms_account.emp_no
                                            AND dms_message.cms_account_id=cms_account.cms_account_id
                                            AND dms_receiver.rec_no=$recid
                                            AND mes_status='0' AND mes_delete='0'");
                                            $inboxrow=mysqli_fetch_assoc($inbox);
                                            echo $inboxrow['count(dms_message.mes_id)'];
                                        ?></span>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="../../pims/personnel/include/normal_view.php">My Profile</a></li>
                                        <li><a href="../logout.php">Change Password</a></li>
                                        <li><a href="../logout.php">Logout</a></li>
                                    </ul>
                                </li>
                                        <?php        
                                            }
                                        ?>
                                        
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