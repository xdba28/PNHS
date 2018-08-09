<style>
    <?php 
	
			include("php/connection.php");
			
			
			if(isset($_SESSION['user_data']['acct']['emp_no'])){ ?>
            #wrapper{
                padding-left: 14%!important;
            }
    <?php } ?>
</style>
<link rel="stylesheet" href="../../../css/notif.css">
<?php 
    date_default_timezone_set('Asia/Manila');
    $navdate=date("Y-m-d");
    $yesterday=date("Y-m-d",time()-86400);

    $prsdate = date_default_timezone_set('Asia/Manila');

    $prevyear = date('Y', strtotime('-1 months'));
    $prevmonth = date('m', strtotime('-1 months'));
    if(isset($_SESSION['user_data'])){
        if(isset($_SESSION['user_data']['acct']['lrn'])){
            $lrn=$_SESSION['user_data']['acct']['lrn'];
            $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
            
        }else if(isset($_SESSION['user_data']['acct']['emp_no'])){
            $emp=$_SESSION['user_data']['acct']['emp_no'];
            $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
            $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
            $recrow=mysqli_fetch_assoc($rec);
            $recid=$recrow['rec_no'];
			 $sql_dept=mysqli_query($mysqli,"SELECT pims_employment_records.dept_id FROM pims_personnel,pims_employment_records,pims_department WHERE pims_employment_records.emp_no=pims_personnel.emp_no
            AND pims_employment_records.dept_id=pims_department.dept_id
            AND pims_employment_records.emp_no=$emp");
            $sql_drow=mysqli_fetch_assoc($sql_dept);
            $dept=$sql_drow['dept_id'];
        }
        if($_SESSION['user_data']['priv']['prs_priv']=="1" || $_SESSION['user_data']['priv']['prs2_priv']=="1"){
            $queryreport = mysqli_query($mysqli,"SELECT * FROM prs_report WHERE month(date_issued) = '$prevmonth' AND year(date_issued) = '$prevyear'" );
            $checkreport = mysqli_num_rows($queryreport);

            $checkmtrmonth = mysqli_query($mysqli,"SELECT * FROM `prs_dtr_rec` WHERE month(date_import)= month(now()) and year(date_import) =year(now())");
            $checkmtrrow = mysqli_num_rows($checkmtrmonth);


             $queryempselect= mysqli_query($mysqli," SELECT * FROM pims_personnel, pims_employment_records 
            Where pims_personnel.emp_No=pims_employment_records.emp_No");
             $checksalrec= '';
             $checkaddinfoget= '';

            $checkempno= mysqli_query($mysqli,"SELECT emp_No
                                                FROM pims_personnel 
                                                WHERE emp_No NOT IN
                                            (SELECT emp_No FROM prs_salary_record)");
            $rowcheckempno = mysqli_num_rows($checkempno);

            $checkempadd= mysqli_query($mysqli,"SELECT emp_No
                                                FROM pims_personnel 
                                                WHERE emp_No NOT IN
                                            (SELECT emp_No FROM prs_add_info)");
            $rowcheckempadd = mysqli_num_rows($checkempadd);    
        }    
    }
    ?>
<nav class="navbar navbar-static-top w3-card-4 navigation-top" style="font-size:14px">
                <div class="container-full">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="row"> 
                                <div class="col-md-2">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"></button>
                                        <a href="../../../index.php"><img style="width:210px;" src="../../../docs/img/pnhs_logo 3.png"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                        <div class="row">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <hr class="hidden-sm hidden-md hidden-lg">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        About Us<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
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
                            <ul class="nav navbar-nav navbar-left">
                                <li><a href="../../../contact.php">Feedback</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right" style="margin-right:20px">
                                
                                
                                        <?php
                                        if(isset($_SESSION['user_data']['acct']['emp_no'])){ 
                                        $job_title=$_SESSION['user_data']['priv']['job_title_code'];
                                        $scms=$mysqli->query("SELECT pims_employment_records.dept_id 
                                        FROM cms_account,pims_personnel,pims_employment_records,pims_department
                                        WHERE pims_employment_records.dept_id=pims_department.dept_id
                                        AND pims_personnel.emp_no=pims_employment_records.emp_no
                                        AND pims_personnel.emp_no=cms_account.emp_no
                                        AND cms_account_id=".$_SESSION['user_data']['acct']['cms_account_ID']." ");
                                        $scms_dept=$scms->fetch_assoc();
                                        ?>
                                <li><a href="../../PIMS/messaging/chatroom.php">Messages</a></li>
                                <?php
                                            if( 
                                                ($_SESSION['user_data']['priv']['frms_priv']=="1") || 
                                                ($_SESSION['user_data']['priv']['frms_user']=="1") || 
                                                ($_SESSION['user_data']['priv']['ipcrms_priv']=="1") || 
                                                ($_SESSION['user_data']['priv']['ipcrms2_priv']=="1") || 
                                                ($_SESSION['user_data']['priv']['ipcrms_user']=="1") || 
                                                ($_SESSION['user_data']['priv']['prs_priv']=="1") || 
                                                ($_SESSION['user_data']['priv']['prs2_priv']=="1") || 
                                                ($_SESSION['user_data']['priv']['pms_priv']=="1") || 
                                                ($_SESSION['user_data']['priv']['pms2_priv']=="1") || 
                                                ($_SESSION['user_data']['priv']['pms_user']=="1") ){ ?>
                                <li class="dropdown-notif">
                                    <a role="button" data-toggle="dropdown" href="#" class="notif">
                                        <span>Notifications</span> <span class="label label-primary">
                                        <?php 
                                            $notif=0; 
                                            if($recid!=""){
                                                $inbox=mysqli_query($mysqli,
                                                "SELECT count(dms_message.mes_id) FROM dms_message,dms_receiver,cms_account,pims_personnel 
                                                WHERE dms_receiver.rec_no=dms_message.rec_no
                                                AND pims_personnel.emp_no=cms_account.emp_no
                                                AND dms_message.cms_account_id=cms_account.cms_account_id
                                                AND dms_receiver.rec_no=$recid
                                                AND mes_status='0' AND mes_delete='0'");
                                                $inboxrow=mysqli_fetch_assoc($inbox);
                                                $notif+=$inboxrow['count(dms_message.mes_id)'];       
                                            }    
                                            //PMS
                                            if(strstr($job_title,"SUO")){                                                                          
                                                
                                                $risqla=mysqli_query($mysqli,"SELECT ris_no,concat(p_fname,' ',p_lname) as Name FROM pims_personnel,pms_ris WHERE req_status='Approved'
                                                AND ris_seen='0'
                                                AND pms_ris.emp_no=pims_personnel.emp_no");
                                                $risnuma=mysqli_num_rows($risqla);
                                                if ($risnuma > 0) {
                                                    $notif+=$risnuma;
                                                }
                                                
                                                $risqld=mysqli_query($mysqli,"SELECT ris_no,concat(p_fname,' ',p_lname) as Name FROM pims_personnel,pms_ris WHERE req_status='Denied'
                                                AND ris_seen='0'
                                                AND pms_ris.emp_no=pims_personnel.emp_no");
                                                $risnumd=mysqli_num_rows($risqld);
                                                if ($risnumd > 0) {
                                                    $notif+=$risnumd;
                                                }
                                                
                                                $prsqla=mysqli_query($mysqli,"SELECT pr_no FROM pms_pr WHERE pr_status='Approved' AND pr_seen='0'");
                                                $prnuma=mysqli_num_rows($prsqla);
                                                if ($prnuma > 0) {
                                                    $notif+=$prnuma;
                                                }
                                                
                                                $prsqld=mysqli_query($mysqli,"SELECT pr_no FROM pms_pr WHERE pr_status='Denied' AND pr_seen='0' 
                                                ");
                                                $prnumd=mysqli_num_rows($prsqld);
                                                if ($prnumd > 0) {
                                                    $notif+=$prnumd;
                                                }
                                                
                                                $posqla=mysqli_query($mysqli,"SELECT po_no FROM pms_po WHERE po_status='Approved' AND po_seen='0' 
                                                ");
                                                $ponuma=mysqli_num_rows($posqla);
                                                if ($ponuma > 0) {
                                                    $notif+=$ponuma;
                                                }
                                                
                                                $posqld=mysqli_query($mysqli,"SELECT po_no FROM pms_po WHERE po_status='Denied' AND po_seen='0'
                                                ");
                                                $ponumd=mysqli_num_rows($posqld);
                                                if ($ponuma > 0) {
                                                    $notif+=$ponumd;
                                                }
                                            }else if(strstr($job_title,"SP")){
                                                $risql=mysqli_query($mysqli,"SELECT req_date,ris_no,concat(p_fname,' ',p_lname) as Name FROM pims_personnel,pms_ris WHERE req_status='Pending'
                                                AND ris_seen='0'
                                                AND pms_ris.emp_no=pims_personnel.emp_no");
                                                $risnum=mysqli_num_rows($risql);
                                                if ($risnum > 0) {
                                                    $notif+=$risnum;
                                                }
                                                
                                                $prsql=mysqli_query($mysqli,"SELECT pr_date,pr_no FROM pms_pr WHERE pr_status='Pending' AND pr_seen='0'");
                                                $prnum=mysqli_num_rows($prsql);
                                                if ($prnum > 0) {
                                                    $notif+=$prnum;
                                                }
                                                
                                                $posql=mysqli_query($mysqli,"SELECT po_date,po_no FROM pms_po WHERE po_status='Pending' AND po_seen='0'");
                                                $ponum=mysqli_num_rows($posql);
                                                if ($ponum > 0) {
                                                    $notif+=$ponum;
                                                }
                                            }else{
                                                $risqla=mysqli_query($mysqli,"SELECT pms_ris.ris_no FROM pms_ris,pims_personnel 
                                                WHERE req_status='Approved' 
                                                AND pms_ris.emp_no=pims_personnel.emp_no
                                                AND pms_ris.emp_no=$emp");
                                                $risnuma=mysqli_num_rows($risqla);
                                                if ($risnuma > 0) {
                                                    $notif+=$risnuma;
                                                }
                                                
                                                $risqld=mysqli_query($mysqli,"SELECT pms_ris.ris_no FROM pms_ris,pims_personnel 
                                                WHERE req_status='Denied' 
                                                AND pms_ris.emp_no=pims_personnel.emp_no
                                                AND ris_seen='0'
                                                AND pms_ris.emp_no=$emp");
                                                $risnumd=mysqli_num_rows($risqld);
                                                if ($risnumd > 0) {
                                                    $notif+=$risnumd;
                                                }
                                            }
                                                
                                            //IPCRM     
                                            if(strstr($job_title,"HTEACH")){                                                                          
                                                $nsql=mysqli_query($mysqli,"SELECT distinct concat(p_fname,' ',p_lname) as Name FROM ipcrms_content,pims_personnel,pims_employment_records,pims_department 
                                                WHERE pims_personnel.emp_no=ipcrms_content.emp_No 
                                                AND pims_employment_records.emp_no=pims_personnel.emp_no
                                                AND pims_employment_records.dept_id=pims_department.dept_id
                                                AND pims_employment_records.dept_id=$dept
                                                AND status='Pending' ");
                                                $ntsql=mysqli_num_rows($nsql);
                                                if ($ntsql > 0) {
                                                    $notif+=$ntsql;
                                                }                                                                           
                                                //$notif+=$inboxrow['count(dms_message.mes_id)'];
                                            }else if(strstr($job_title,"SP")){
                                                $nsql=mysqli_query($mysqli,"SELECT distinct concat(p_fname,' ',p_lname) as Name FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Verified' ");
                                                $ntsql=mysqli_num_rows($nsql);
                                                if ($ntsql > 0) {
                                                    $notif+=$ntsql;
                                                }
                                            }else if(strstr($job_title,"TCH") || strstr($job_title,"MTCHR")){
                                                $nsql=mysqli_query($mysqli,"SELECT distinct concat(p_fname,' ',p_lname) as Name FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Approved' and pims_personnel.emp_no=$emp");
                                                $ntsql=mysqli_num_rows($nsql);
                                                if ($ntsql > 0) {
                                                    $notif+=$ntsql;
                                                }      
                                            }
                                            
                                            //PRS
                                            $prs_rep=0;
                                            $prs_tom=0;
                                            $prs_chemp=0; 
                                            if($_SESSION['user_data']['priv']['prs2_priv']=="1"){    
                                                if(empty($checkreport)){
                                                    $notif+=1;
                                                    $prs_rep+=1; 
                                                } 
                                                if (!empty($rowcheckempadd) || !empty($rowcheckempno) ){
                                                $notif+=1;
                                                $prs_chemp+=1;    
                                                }
                                            }
                                            if($_SESSION['user_data']['priv']['prs_priv']=="1"){
                                                if(empty($checkmtrrow)) {
                                                $notif+=1;
                                                $prs_tom+=1;  
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
                                            //PRS
                                        if($_SESSION['user_data']['priv']['prs2_priv']=="1"){    
                                            if($prs_rep>=1){ ?>
                                        <a class="content" href="#">
                                            <div class="notification-item">
                                                <h4 class="item-title">Last Month's Pay was not generated</h4>
                                                <p class="item-info"><a href="../../prs/admin/payrolrep.php?gen=2">CLICK HERE TO GENERATE</a></p>
                                            </div>
                                        </a>   
                                            <?php
                                            }
                                        }
                                            
                                            if($_SESSION['user_data']['priv']['prs_priv']=="1"){
                                                if($prs_tom>=1){ //andres only?>  
                                        <a class="content" href="#">
                                            <div class="notification-item">
                                                <h4 class="item-title">This month's attendance was not submitted </h4>
                                            </div>
                                        </a>
                                            <?php
                                                }
                                            }
                                        if($_SESSION['user_data']['priv']['prs2_priv']=="1"){    
                                            if($prs_chemp>=1){ ?>
                                        <a class="content" href="#">
                                            <div class="notification-item">
                                                <h4 class="item-title">There's an employee who have an incomplete data.</h4>
                                                <p class="item-info"><a href="../../prs/admin/employee.php" style="text-decoration: none;"><font style="color: #185c92;font-size: 10px;font-weight: 600;">Go to Employee list</font></a></p>
                                                </div>
                                        </a>
                                            <?php
                                            }
                                        }
                                            
                                            
                                            //DMS   
                                            if($recid!=""){
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
                                            }
                                            
                                            //IPCRM     
                                            if(strstr($job_title,"HTEACH")){   
                                                if($ntsql>0){
                                                    $notif=mysqli_query($mysqli,"SELECT distinct concat(p_fname,' ',p_lname) as Name,ipcrms_content.emp_No FROM ipcrms_content,pims_personnel, pims_employment_records WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Pending' AND dept_ID='$dept' and pims_personnel.emp_No = pims_employment_records.emp_No");
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
                                                    $notif=mysqli_query($mysqli,"SELECT distinct concat(p_fname,' ',p_lname) as Name,ipcrms_content.emp_No FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Verified'");
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
                                                $notif=mysqli_query($mysqli,"SELECT distinct concat(p_fname,' ',p_lname) as Name,ipcrms_content.emp_No FROM ipcrms_content,pims_personnel WHERE pims_personnel.emp_no=ipcrms_content.emp_No AND status='Approved' and pims_personnel.emp_no=$emp");
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
                                                
                                            <a class="content" href="../../IPMS/PMS/admin/ris_page.php">
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
                                                
                                            <a class="content" href="../../IPMS/PMS/admin/ris_page.php">
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
                                                
                                            <a class="content" href="../../IPMS/PMS/admin/pr.php">
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
                                                
                                            <a class="content" href="../../IPMS/PMS/admin/pr.php">
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
                                                
                                            <a class="content" href="../../IPMS/PMS/admin/po.php">
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
                                                
                                            <a class="content" href="../../IPMS/PMS/admin/po.php">
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
                                                
                                            <a class="content" href="../../IPMS/PMS/admin1/ris_request.php">
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
                                                
                                            <a class="content" href="../../IPMS/PMS/admin1/requests.php">
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
                                                
                                            <a class="content" href="../../IPMS/PMS/admin1/po_request.php">
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
                                                
                                            <a class="content" href="../../IPMS/PMS/USER/trans.php">
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
                                        Health Monitoring
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="../../SCMS/pages/stuper/index.php">Medical Record</a></li>
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
                                        $empname=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname)as Name FROM pims_personnel WHERE emp_no=$emp");
                                        $emprow=mysqli_fetch_assoc($empname);
                                        echo $emprow['Name']." ";
                                        ?>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="../../pims/personnel/profile.php">My Profile</a></li>
                                        <li><a href="../../../admin/cpassword.php">Change Password</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="" data-toggle="modal" data-target="#logoutModal">Logout</a></li>
                                    </ul>
                                </li>
                                <?php        
                                    }else if(isset($_SESSION['user_data']['acct']['lrn'])){ ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?php 
                                        $sesh_lrn=$_SESSION['user_data']['acct']['lrn'];
                                        $empname=mysqli_query($mysqli,"SELECT concat(stu_fname,' ',stu_lname)as Name FROM sis_student WHERE lrn=$sesh_lrn");
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
                    </div>
                    </div>
                    <hr class="w3-theme-yd2">
                    <hr class="w3-theme-bd2">
                </div>
            </nav>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Log Out?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="../../../php/_logout.php" class="btn btn-danger">Log Out</a>
                </div>
        </div>
    </div>     
</div>