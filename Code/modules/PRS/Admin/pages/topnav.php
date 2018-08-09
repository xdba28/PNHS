<?php

    $date = date_default_timezone_set('Asia/Manila');

    $prevyear = date('Y', strtotime('-1 months'));
    $prevmonth = date('m', strtotime('-1 months'));

    $queryreport = mysql_query("SELECT * FROM prs_report WHERE month(date_issued) = '$prevmonth' AND year(date_issued) = '$prevyear'" );
    $checkreport = mysql_num_rows($queryreport);

    $checkmtrmonth = mysql_query("SELECT * FROM `prs_mtr` WHERE month(time_issued)= month(now()) and year(time_issued) =year(now())");
    $checkmtrrow = mysql_num_rows($checkmtrmonth);


     $queryempselect= mysql_query(" SELECT * FROM pims_personnel, pims_employment_records 
    Where pims_personnel.emp_No=pims_employment_records.emp_No");
     $checksalrec= '';
     $checkaddinfoget= '';

    $checkempno= mysql_query("SELECT emp_No
                                        FROM pims_personnel 
                                        WHERE emp_No NOT IN
                                    (SELECT emp_No FROM prs_salary_record)");
    $rowcheckempno = mysql_num_rows($checkempno);

    $checkempadd= mysql_query("SELECT emp_No
                                        FROM pims_personnel 
                                        WHERE emp_No NOT IN
                                    (SELECT emp_No FROM prs_add_info)");
    $rowcheckempadd = mysql_num_rows($checkempadd); //check Prs_add_info if an emp_No exist in it.
?>		

                <nav class="navbar navbar-static-top w3-card-4 navigation-top">
                    <div class="container-full">
                        <button type="button" class="hamburger is-closed fadeInLeft" data-toggle="offcanvas">
                        <span class="hamb hamb-top"></span>
                        <span class="hamb hamb-middle"></span>
                        <span class="hamb hamb-bottom"></span>
                        </button>
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"></button>
                                <a class="navbar-brand w3-card-4" href="#"><img src="../img/pnhs_logo.png"></a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <hr class="hidden-sm hidden-md hidden-lg">
                                <ul class="nav navbar-nav">
                                  
								    <li>&nbsp;</li>
									
                                    <?php 
                                        date_default_timezone_set('Asia/Manila');
                                        $clock = date('F d, Y ');
                                    ?>
	  
                                    <li class="visible-lg">
                                        <font color="white" border="solid" style="float:left; border-left: solid; border-right:solid; border-bottom:solid; padding:5; margin-left: 10" >
                                            <?php echo $clock;?>
                                            <font id ="clockDisplay">03:23:54 AM</font>
                                        </font>
                                    </li>
	  
                                    <script type ="text/javascript" language="javascript">
                                          function renderTime() {

                                            var currentTime = new Date();
                                            var diem ="PM"
                                            var h = currentTime.getHours();
                                            var m = currentTime.getMinutes();
                                            var s = currentTime.getSeconds();

                                            if(h == 0){
                                                h=12;
                                            }else if ( h>12){
                                                h=h-12;
                                                deim ="AM";
                                            }
                                             if(h<10){
                                             h="0"+h;
                                             }
                                             if(m<10){
                                             m="0"+m;
                                             }
                                             if(s<10){
                                             s="0"+s;
                                             }

                                             var myClock = document.getElementById('clockDisplay');
                                             myClock.textContent = h + ":" + m + ":" + s + diem;
                                             myClock.innerText = h + ":" + m + ":" + s + diem;
                                             setTimeout('renderTime()',1000);
                                        }
                                          renderTime();
                                    </script>
							     </ul>
								
							     <ul class="nav navbar-nav navbar-right">
                                    <?php
                                        if(isset($_SESSION['user_data'])){ ?>
                                <li><a href="login.php">Messages</a></li>
                                <?php 
                                    if($prs_priv=="1"){
                                 ?>
                                <li>
                                    <a href="#" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                                       <?php if(!empty($checkreport) && empty($checkmtrrow) && empty($rowcheckempno) && !empty($rowcheckempadd)){?>		
                                                <img class="blink-image" src="../assets/images/alert.png" style=" width: 20px;height: 17px;border-radius: 50%;position: absolute;
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
                                                        <p class="item-info"><a data-toggle="modal" data-target="#generatelast">CLICK HERE TO GENERATE</a></p>
                                                    </div>
                                                </a>
                                            <?php } 
                                                if(empty($checkmtrrow)) {?>
                                                <a class="content" href="#">
                                                    <div class="notification-item">
                                                        <h4 class="item-title">This month's attendance was not submitted </h4>
                                                        <p class="item-info">Marketing 101, Video Assignment</p>
                                                    </div>
                                                </a>
                                            <?php } 
                                                if (!empty($rowcheckempadd) || !empty($rowcheckempno) ){	?>
                                                <a class="content" href="#">
                                                    <div class="notification-item">
                                                        <h4 class="item-title">There's an employee who have an incomplete data.</h4>
                                                        <p class="item-info"><a href="employee.php" style="text-decoration: none;"><font style="color: #185c92;font-size: 10px;font-weight: 600;">Go to Employee list</font></a></p>
                                                        </div>
                                                </a>
                                            <?php  } else {?>
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
                                                <a class="content" href="../../ipcrm/view.php?emp=<?php echo $norow['emp_No']; ?> ">
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
                                    
									<li>	
								         <a href="#" class="dropdown-toggle inl" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <span class="inl"><?php 
                                            $empname=mysql_query("SELECT concat(p_fname,' ',p_lname)as Name FROM pims_personnel WHERE emp_no=$emp");
                                            $emprow=mysql_fetch_assoc($empname);
                                            echo $emprow['Name']." ";
                                            ?></span>
                                            <span class="cart caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="../../pims/personnel/include/normal_view.php">My Profile</a></li>
                                        <li><a href="../logout.php">Change Password</a></li>
                                        <li><a href="../../../php/_logout.php">Logout</a>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr class="w3-theme-yd2">
                        <hr class="w3-theme-bd2">
                    </div>
                </nav>
				
				
			  <!--==== this modal is for GENERATE Last Month's PAY ====-->
      <div class="modal fade" id="generatelast" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:18px 50px;">
				<div style="float: left">
					<a class="delete" data-toggle="modal" data-target="#popup98">&nbsp;?&nbsp;</a>
				</div>
				<button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
				<h3 align="center"><b>Generate Last Month's Pay</b></h3>
            </div>
            <div class="modal-body" style="padding:20px 50px;">

              <form class="form-horizontal" action="generatelast.php" name="form" method="post">
               
               <center>
			 <table>
				<tr>
			   <td> <button type="submit" name="generate" class="btn btn-success btn-lg">YES</button></td>
					<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <td>
			   <td>or</td>
					<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <td>
				<td>
					<button type="submit" name="No" class="btn btn-danger btn-lg" data-dismiss="modal" title="Close">
						<font><b>NO</b></font>
					</button>
				</td>
				</tr>
			</table>
			   </center>
		</div>
                </div>
                
              </form>

            </div>
          </div>   
		  
		  <!--=====END OF MODAL====-->