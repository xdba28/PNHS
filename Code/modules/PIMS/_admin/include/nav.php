<div class="w3-theme-bd5 w3-card-4 navbar navbar-fixed-top" style="background-color:rgba(42,101,149,0.95)!important">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand" style="padding-top:5px;margin-left:5px" href="admin.php"><img src="../img/pnhs_logo.png" style="max-width:40px;margin-left:50px;margin-right:50px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<!--
        <form class="navbar-form navbar-left hidden-sm">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Personnel">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
              </span>
          </div>
        </form>
	-->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo '<img alt="User Pic" style = " margin: 0 auto; max-height: 25px; max-width: 25px; " src = "../myfunc/showimageprofile.php?id='.$_SESSION['pims_data']['emp_id'].'" class="img-square ims-responsive"> '; ?><label style="max-height: 10px; ">ADMIN | <?php echo $_SESSION['pims_data']['name'] ?></label></a>
        <ul class="dropdown-menu dropdown-user">
          <li><a href="../index.html"><i class="fa fa-user fa-fw"></i> Profile</a></li>
          <!--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>-->
          <li class="divider"></li>
          <li><a href="../myfunc/login2.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
        </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  <hr class="w3-theme-yd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
  <hr class="w3-theme-bd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
</div>

<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
        <div class="navbar navbar-fixed-top" style="width:200px; margin-top:56px">
            <ul class="sidebar-menu">
              <center><li class="sidebar-header"><h5>PERSONNEL MANAGEMENT</h5></li></center>
              
              <li>
                <a href="admin.php">
                  <i class="fa fa-home fa-fw"></i>
                  <span>Home</span>
                  <span class="label label-primary pull-right"></span>
                </a>
                </li>
        
              <li>
                <a href="#">
                  <i class="fa fa-file-text fa-fw"></i>
                  <span>Manage</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="add_personnel.php"><i class="fa fa-edit fa-fw"></i> Add Personnel</a></li>
                  <li><a href="update_personnel1.php"><i class="fa fa-edit fa-fw"></i>  Update Personnel Information</a></li>
                  <!--<li><a href="del_personnel.php"><i class="fa fa-edit fa-fw"></i> Delete Personnel Profile</a></li>-->
                </ul>
              </li>
        
              <li>
                <a href="#">
                  <i class="fa fa-file-text fa-fw"></i>
                  <span>Generate Reports</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="teaching.php"><i class="fa fa-edit fa-fw"></i> Teaching Faculty List</a></li>
                  <li><a href="non_teaching.php"><i class="fa fa-edit fa-fw"></i>  Non-Teaching Faculty List</a></li>
                  <!--<li><a href="#"><i class="fa fa-edit fa-fw"></i> Personnel Status</a></li>-->
                  <li><a href="on_leave_list.php"><i class="fa fa-edit fa-fw"></i> On-Leave Personnel</a></li>
                </ul>
              </li>
        
            <!--<li>
                <a href="#">
                  <i class="fa fa-file-text fa-fw"></i>
                  <span>Sort Personnel</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="#"><i class="fa fa-edit fa-fw"></i> By Department</a></li>
                  <li><a href="#"><i class="fa fa-edit fa-fw"></i>  By Sex</a></li>
                  <li><a href="#"><i class="fa fa-edit fa-fw"></i> By Level</a></li>
                  <li><a href="#"><i class="fa fa-edit fa-fw"></i> By Type</a></li>
                </ul>
              </li> -->
			<li>
                <a href="#">
                  <i class="fa fa-edit fa-fw"></i>
                  <span>Profile Updates Application</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">

                  <li><a href="profile_updates_pending.php"><i class="fa fa-align-right fa-fw"></i>Pending</a></li>
                  <!--<li><a href="flagged_applicants.php"><i class="fa fa-flag-o fa-fw"></i>Flagged</a></li>-->
                  <li>
                  <a href="#"><i class="fa fa-history fa-fw"></i>HISTORY<span class="fa arrow"></span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="profile_updates_approved.php"><i class="fa fa-thumbs-up fa-fw"></i>Approved</a></li>
                      <li><a href="profile_updates_disapproved.php"><i class="fa fa-thumbs-down fa-fw"></i>Disapproved</a></li>
                    </ul>
                  </li>
                </ul>
              </li> 
            <center><li class="sidebar-header"><font color="yellow"><span id = "totalNotif" ></span></font>&emsp;NOTIFICATIONS</li></center>

            <li>
                <a href="../messaging/">
                  <i class="fa fa-envelope fa-fw"></i> <span>Messages</span>
                  &emsp;<font color="yellow"><span id = "messagesNum" ></span></font>
                </a>
            </li>

            <li>
                <a href="profile_updates_pending.php">
                  <i class="fa fa-bell-o fa-fw"></i> <span>Profile Updates</span>
                  &emsp;<font color="yellow"><span id = "profileUpdatesNum" ></span></font>
                </a>
            </li>
			
        <li style="padding-bottom:200%"></li>
              
        </div>
    </div>
	<script>
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
							profileUpdatesCount(data);
	    				},
	    			error: function(jqXHR, textStatus, errorThrown) 
	    				{	
							resetAlertify();
							alertify.error(jqXHR);
	     				}          
	    	});
		}
		
		function profileUpdatesCount(n){
			$.ajax({
	     			url: '../myfunc/profileUpdatesCount1.php',
	    			contentType: false,
	        		cache: false,
	        		processData:false,
	    			success: function(data, textStatus, jqXHR)
	    				{	
	 						if ( data > 0 ) $('#profileUpdatesNum').text(data);
							else $('#profileUpdatesNum').text("");
							totalNotifCount(parseInt(data)+parseInt(n));
	    				},
	    			error: function(jqXHR, textStatus, errorThrown) 
	    				{	
							resetAlertify();
							alertify.error(jqXHR);
	     				}          
	    	});
		}
		
		function totalNotifCount(n){
			if ( n > 0 ) $('#totalNotif').text(n);
			else $('#totalNotif').text("");
			setTimeout(messageCount, 3000);
		}
		
		
		
				
		$(document).ready(function(){
			messageCount();
		});
	</script>