<?php
	session_start();
	include("../myfunc/session2.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>

<?php include 'include/topnav.php';?>


<?php include 'include/sidenav.php';?>

<br><br><br><br>

    <div id="wrapper" style="margin-left: 60px;">
        
        <div class="container">
                    <div class="col-lg-11">
                        <div class="panel-heading">
                            <h3 id = "name1">Name</h3>
                        </div>
         
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <center><?php echo ' <img alt="User Pic" src = "../myfunc/showimageprofile.php?id='.$_GET["id"].'" class="img-circle img-responsive"> '; ?> <br><br>
                <?php echo '<a href="../messaging/chatroom.php?fr=2&id='.$_GET["id"].'">'; ?><button class="btn btn-outline btn-primary">Message</button></a> <?php echo '<a href="update_personnel.php?id='.$_GET["id"].'" >'; ?><button class="btn btn-outline btn-primary">Update Profile</button></a></center>
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
    <div id="wrapper">
<?php include 'include/footer.php';?>
</div>


    
    <script  src="../js/index.js"></script>

</body>
	<!------- ALL PHP CUSTOMS HERE ONLY ------->
		<?php
			include("../myfunc/browse_profile1.php");
		?>
	<!----------------------------------------->
</html>
