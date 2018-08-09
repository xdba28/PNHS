<?php
	session_start();
	include("../myfunc/session3.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>
<?php include 'include/topnav.php';?><br>
<div id="wrapper">
<?php include 'include/sidenav.php';?>
	<br>
    <div class="container">
    <div class="row">
    <div class="col-lg-11">
        <div class="container-fluid">

		<h3>	PERSONNEL INFO</h3>


        <div class="row">
        	<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title" ><span id = "name1">Name</span> <span class="pull-right"><?php echo '<a href="../messaging/chatroom.php?fr=3&id='.$_GET["id"].'" type="button" class="btn btn-sm btn-warning">'; ?><i class="glyphicon glyphicon-envelope"></i> Message</a> <!--<?php //echo '<a href="update_personnel.php?id='.$_GET["id"].'" type="button" class="btn btn-sm btn-warning">'; ?><i class="glyphicon glyphicon-edit"></i></a>--> </span></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <?php echo ' <img alt="User Pic" src = "../myfunc/showimageprofile.php?id='.$_GET["id"].'" class="img-circle img-responsive"> '; ?> </div>
                
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
    </div>
    </div>
    </div>
    <?php include 'include/footer.php';?>
</div>
    
    <script>
    $.sidebarMenu($('.sidebar-menu'))
    </script>
    <script  src="../js/index.js"></script>


</body>
	<!------- ALL PHP CUSTOMS HERE ONLY ------->
		<?php
			include("../myfunc/browse_profile1.php");
		?>
	<!----------------------------------------->
</html>
