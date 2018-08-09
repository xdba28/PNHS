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
                          <a href="profile.php"><button class="btn btn-outline btn-primary">PROFILE</button></a>&emsp;
                <a href="profile_updates.php"><button class="btn btn-outline btn-primary">VIEW EDIT HISTORY</button></a>  
                    </div>
                        <div class="panel-body" >

        <?php include 'include/editing_view.php';?>

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
	<script  src="../myfunc/new/edit_profile.js"></script>
    <script  src="../js/index.js"></script>
	
	<?php
		include("../myfunc/new/edit_profile.php");
		getpersonneledittinginfo();
		getpersonnelbackgroundedittinginfo();
	?>




