<?php
	session_start();
	error_reporting(0);
	include("../myfunc/session1.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>

<?php include 'include/topnav.php';?><br><br><br>
        <div id="wrapper">

        <?php 
    include 'include/sidenav.php';
?>
	<div id="page-content-wrapper">
        <div class="container">

						<div class="col-lg-12">
							<h3 class="page-header" align="center">Faculty Information</h3>
						</div>
						<!-- /.col-lg-12 -->

							<div class="panel panel-default">
								<div class="panel-heading">
									
								</div>
								<!-- /.panel-heading -->
								<div class="panel-body" >
									<div class="panel panel-info">
					<div class="panel-heading">
					  <h3 class="panel-title" ><span id = "name1">Name</span></h3>
					</div>
					<div class="panel-body">
					  <div class="row">
						<div class="col-md-3 col-lg-3 " align="center"> <?php echo ' <img alt="User Pic" src = "../myfunc/showimageprofile.php?id='.$_GET["id"].'" class="img-circle img-responsive"> '; ?>
							<br>
							<?php 
                                include("../myfunc/db_connect.php");
                                $query = "select * from cms_account where emp_no = ".$_GET["id"]."; ";
	                            $result = mysqli_query($_SESSION['pims_data']['connection'] , $query );
                                $row = mysqli_fetch_array($result);
                                echo '<a href="../messaging/chatroom.php?fr=1&id='.$row['cms_account_ID'].'" type="button" class="btn btn-sm btn-primary">'; 
                                mysqli_close( $_SESSION['pims_data']['connection'] );
	                            unset( $_SESSION['pims_data']['connection'] ); 
                            ?>
                            <i class="fa fa-envelope fw"></i>&emsp;MESSAGE</a>
						</div>
						
						<div class=" col-md-9 col-lg-9 "> 
						  <table class="table table-user-information">
							<tbody>
								<tr>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Department:</td>
									<td id = "department1" >Programming</td>
								</tr>
								<tr>
									<td>Faculty Type:</td>
									<td id = "facultyType1" >Teaching</td>
								</tr>
								<tr>
									<td>Job Title:</td>
									<td id = "jobTitle1" >Teaching</td>
								</tr>
								<tr>
									<td>Hire date:</td>
									<td id = "hireDate1" >00/00/0000</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td><label>Personal Information:</label></td>
									<td></td>
								</tr>
								<tr>
									<td>Gender</td>
									<td id = "gender1" >Male</td>
								</tr>
								<tr>
									<td>Age</td>
									<td id = "age1" >00</td>
								</tr>
								<tr>
									<td>Date of Birth</td>
									<td id = "birthdate1">00/00/0000</td>
								</tr>
								<tr>
									<td>Permanent Address</td>
									<td id = "tempAdd1" >Address</td>
								</tr>
								<tr>
									<td>Temporary Address</td>
									<td id = "permAdd1" >Address</td>
								</tr>
								<tr>
									<td>Email</td>
									<td id = "email1" >username@domain</a></td>
								</tr>
								<tr>
									<td>Contact Number</td>
									<td id = "contactNo1">123-4567-890(Landline)<br><br>555-4567-890(Mobile)</td>
								</tr>
								   
							  
							 
							</tbody>
						  </table>
						  
						</div>
					  </div>
					</div>
						
				  </div>
                            
                        </div>
                        </div>
                        <!-- /.panel-body -->
                </div>
                </div>
                <?php include 'include/footer.php';?>   
                </div>
</body>
	<script src='../js/jquery.min.js'></script>
    <script src='../js/bootstrap.min.js'></script>
    <script  src="../js/index.js"></script>
		<?php
			include("../myfunc/browse_profile1.php");
		?>
	
</html>
    




