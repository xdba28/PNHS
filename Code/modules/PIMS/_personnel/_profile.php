<?php
	session_start();
	include("../myfunc/session1.php");  
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>

<?php include 'include/topnav.php';?><br>


<?php include 'include/sidenav.php';?>

    <div id="page-wrapper">
        
        <div class="container">


                <div class="col-lg-11">
                    <h2 class="page-header" align="center">PERSONNEL INFORMATION</h2>
                </div>
                <!-- /.col-lg-12 -->

                    <div class="col-lg-11">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" >
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#home-pills" data-toggle="tab">PROFILE</a>
                                </li>
                                <li><a href="#profile-pills" data-toggle="tab">EDIT</a>
                                </li>
                            
                                <a style="float: right;" href="profile_updates.php" >VIEW EDIT HISTORY <i class="fa  fa-arrow-circle-right"></i></a>
                                
                            </ul>


                            <!-- Tab panes -->
                            <div class="tab-content" >

        <?php include 'include/normal_view.php';?> 
                   
<br>
        <?php include 'include/editing_view.php';?>


		
                                <br><br>
                            </div>
                        </div>
                        <!-- /.panel-body -->
<div id="wrapper">
<?php include 'include/footer.php';?>
</div>
</body>

</html>
    <!-- My Custom JavaScript -->
    <script src="../myfunc/new/tempjsprofile.js"></script>
    <script  src="../js/index.js"></script>
	
		<?php
			
			include("../myfunc/new/profile.php");
			getpersonnelinfo();
			getpersonneledittinginfo();
			getpersonnelbackgroundedittinginfo();
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





