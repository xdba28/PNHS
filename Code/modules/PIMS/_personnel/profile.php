<?php
	session_start();
	include("../myfunc/session1.php");  
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
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" >
                                <a href="edit_profile.php"><button class="btn btn-outline btn-primary">EDIT PROFILE</button></a>

                                <a style="float: right;" href="profile_updates.php" >VIEW EDIT HISTORY <i class="fa  fa-arrow-circle-right"></i></a>



                            <!-- Tab panes -->
                            <div class="tab-content" >

        <?php include 'include/normal_view.php';?> 

                                <br><br>
                            </div>
                        </div>
        </div>
    </div>
    </div>
<div id="wrapper">
<?php include 'include/footer.php';?>
</div>
</body>

</html>
    <!-- My Custom JavaScript -->
    <script  src="../js/index.js"></script>
	
		<?php
			
			include("../myfunc/new/profile.php");
			getpersonnelinfo();
			echo "<script> $('#familyBackgroundnv').empty(); </script>";
			getfamilyinfo();
			echo "<script> $('#educationalBackgroundnv').empty(); </script>";
			geteducationabackground();
			echo "<script> $('#csBackgroundnv').empty(); </script>";
			getcseligibility();
			echo "<script> $('#workExperiencenv').empty(); </script>";
			getworkexperience();
			echo "<script> $('#trainingProgramsnv').empty(); </script>";
			getsampletrainingprograms();

        ?>





