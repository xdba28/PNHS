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

    <div id="wrapper" style="margin-left: 300px;">
        
        <div class="container" style="text-align: center;">

    <div  style="width: 500px;">
        <div class="logo">
            <img src="../img/account.png" class="img img-responsive img-circle center-block" style="width:100px; height:100px"/>
            <br><br><center><label>Create Personnel Account</label></center>
        </div>
        <div><br><br>
        <form id = "form1">
        	<label>Employee Number:</label><input type="number" name="username" placeholder="Username" class="form-control" /><br>

            <label>Username:</label><input type="text" name="username" placeholder="Username" class="form-control" /><br>

            <a href="add_personnel.php"><button class="btn btn-outline btn-success">Create Account</button></a><br>
        </form>
        </div>
    </div>


    </div>
</div><br><br><br>
<div id="wrapper">
<?php include 'include/footer.php';?>
</div>
    <script  src="../js/index.js"></script>

</body>

</html>
