<?php
	include("../myfunc/nav1.php");
?>

<div style="z-index: 4;width: 100%;position: relative;">
<!-- Navigation -->
        <nav class="w3-theme-bd5 w3-card-4" style="width: 100%;background-color:rgba(42,101,149,0.95)!important; position: fixed;" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand w3-card-4" href="#"><img src="../img/pnhs_logo.png" width="75px" height="75px"></a>
                <ul class="nav navbar-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <hr class="hidden-sm hidden-md hidden-lg" style="height:10px; border:0">
            
        
<ul class="nav navbar-nav navbar-right">

            <li><a href="login.php">Messages</a></li>
            <li><a href="login.php">Notifications</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<?php echo '<img alt="User Pic" style = " margin: 0 auto; max-height: 30px; max-width: 30px; " src = "../myfunc/showimageprofile.php?id='.$_SESSION['pims_data']['emp_id'].'" class="img-square ims-responsive"> '; ?> <label style="max-height: 10px; " ><?php echo $_SESSION['pims_data']['name'] ?></label> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> Profile</a></li>
                        <?php
							//if ( isset($_SESSION['pims_data']['pims_priv_admin']) && $_SESSION['pims_data']['pims_priv_admin'] == '1' ){
								include("../myfunc/db_connect.php");
								
								$query = "select job_title_code from pims_employment_records where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
								$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
								$row = mysqli_fetch_array($result);
								if ( $row['job_title_code'] == "ICTD" ){
									echo'
									<li><a href="../admin/"><i class="fa fa-user fa-fw"></i><b> Admin</b></a>
									</li>
									';
								}
								else if ( $row['job_title_code'] == "SECSP2" ){
									echo'
									<li><a href="../admin2/"><i class="fa fa-user fa-fw"></i><b> Admin</b></a>
									</li>
									';
								}
								mysqli_close( $_SESSION['pims_data']['connection'] );
								unset( $_SESSION['pims_data']['connection'] ); 
							//}
						?>
                        <!--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>-->
                        <li class="divider"></li>
                        <li><a href="../myfunc/login2.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->


        </div>
        </div>
        <hr class="w3-theme-yd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
        <hr class="w3-theme-bd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
            <!-- /.navbar-header -->




        </nav>
        </div>
<br><br><br>
        <div class="navbar-default sidebar" role="navigation" style="color: black;position: fixed;" id = "sideNav1">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu" >
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input id = "myInput" onkeyup="myFunction();" type="text" class="form-control" placeholder="Search Faculty">
                                <span class="input-group-btn">
                                <button id = "searchbutton1" class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
								<button id = "searchbutton2" style = "display:none" class="btn btn-default" type="button">
									<img src = "../img/dots.gif" style = "height:15px; width:15px ;">
                                </button>
								</span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li id = "side-menu1" >
                            <a href="#"><i class="fa fa-folder-open fa-fw"></i>  View<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="emp_rec.php"><i class="fa fa-suitcase fa-fw"></i> Employment Records</a>
                                </li>
                                <li>
                                    <a href="service_rec.php"><i class="fa fa-columns fa-fw"></i> Service Record</a>
                                </li>
								
                                <li>
                                    <a href="training.php"><i class="fa fa-list-alt fa-fw"></i> Training Programs</a>
                                </li>
                            </ul>
                        </li>

                        <li id = "leaveDropDown1" >
                            <a href="#"><i class="fa fa-edit fa-fw"></i>  Leave Application<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="leave_history.php"><i class="fa fa-history fa-fw"></i> Leave History</a>
                                </li>
                                <li>
                                    <a href="leave_apply.php"><i class="fa fa-thumb-tack fa-fw"></i> Apply</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

						<li id = "side-menu4">
							<a href="profile_updates.php">
							  <i class="fa fa-history fa-fw"></i> <span>My Profile Updates</span>
							  &emsp;<font color="red"><span id = "pupdatesNum" ></span></font>
							</a>
						</li>

						<li id = "side-menu5">
							<a href="../messaging/">
							  <i class="fa fa-envelope fa-fw"></i> <span>Messages</span>
							  &emsp;<font color="red"><span id = "messagesNum" ></span></font>
							</a>
						</li>

                        <?php
							include("../myfunc/db_connect.php");
								
							$query = "select faculty_type from pims_employment_records where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
							$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
							$row = mysqli_fetch_array($result);
							
							if ( $row['faculty_type'] == "Teaching" ){
								echo '<li id = "side-menu2">
									<a href="../../OES/"><i class="fa fa-pencil fa-fw"></i> Create Exam</a>
								</li>';
							}
							
							if ( isset($_SESSION['user_data']['acct']['css_priv']) && $_SESSION['user_data']['acct']['css_priv'] == '1' ){
								echo '<li id = "side-menu3">
									<a href="../../CSS/"><i class="fa fa-table fa-fw"></i> Class Schedule</a>
								</li>
								';
							}
							
							mysqli_close( $_SESSION['pims_data']['connection'] );
							unset( $_SESSION['pims_data']['connection'] ); 
						?>
                    </ul>
					<table style = "display:block" id = "myTable" width="100%" class="table table-striped table-bordered table-hover" >
							
					</table>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
			<script>
			<?php
				include("../myfunc/nav2.php");
			?>
				var typing = 0;
				var loading1 = 0;
				var loading2 = 0;
				
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
						$('#side-menu1').attr({ 'style':'display:block' });
						$('#leaveDropDown1').attr({ 'style':'display:block' });
						$('#side-menu2').attr({ 'style':'display:block' });
						$('#side-menu3').attr({ 'style':'display:block' });
						$('#side-menu4').attr({ 'style':'display:block' });
						$('#side-menu5').attr({ 'style':'display:block' });
						$('#searchbutton1').attr({ 'style':'display:block' });
						$('#searchbutton2').attr({ 'style':'display:none' });
                        <?php
	                        include("../myfunc/nav3.php");
                        ?>
					}
					else if ( typing == 1 && loading1 == 0 ){
						loading1 = 1;
						$('#myTable').attr({ 'style':'display:block' });
						$('#side-menu1').attr({ 'style':'display:none' });
						$('#leaveDropDown1').attr({ 'style':'display:none' });
						$('#side-menu2').attr({ 'style':'display:none' });
						$('#side-menu3').attr({ 'style':'display:none' });
						$('#side-menu4').attr({ 'style':'display:none' });
						$('#side-menu5').attr({ 'style':'display:none' });
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
				
				$(document).ready(function(){
					messageCount();
				});
			</script>