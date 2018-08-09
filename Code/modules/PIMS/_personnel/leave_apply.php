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
                        <center><h2>LEAVE APPLICATION FORM</h2></center><br>
                        <form role="form" id = "form1" >
                                        <div class="col-lg-11">
										<div class="form-group">
                                            <label style = "color: red ">All with * are required.</label>
                                        </div>
                                        </div>
                                        <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Name of Employee: </label>
                                            <input class="form-control" placeholder="Enter Text" disabled id = "name1" >
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><span style = "color: red">*</span>Place to be Visited: </label>
                                            <input class="form-control" placeholder="Enter Place" id = "placeToBeVisited1" name = "placeToBeVisited1" >
                                        </div>
                                        </div>
                                        <div class="col-lg-3">
										<div class="form-group">
                                            <label><span style = "color: red">*</span>Start of leave: </label>
                                            <input class="form-control" placeholder="Enter Date" id = "startOfLeave1" name = "startOfLeave1" type="date">
                                        </div>
                                        </div>
                                        <div class="col-lg-3">
                                        <div class="form-group">
                                            <label><span style = "color: red">*</span>End of leave: </label>
                                            <input class="form-control" placeholder="Enter Date" id = "timeOfReturn1" name = "timeOfReturn1" type="date">
                                        </div>
                                        </div>
                                        <div class="col-lg-11">
                                        <div class="form-group">
                                            <label>Purpose: </label>
                                            <textarea class="form-control" rows="3" id = "purpose1" name = "purpose1" placeholder="Enter Purpose"></textarea>
                                        </div>
                                        </div>
                                        <div class="col-lg-11">
                                        <div class="form-group">
											<label><span style = "color: red">*</span>Official or Personal Leave: </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name = "type1" value = "Official" >Official
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name = "type1" value = "Personal" >Personal
                                            </label>
                                        </div>
										</div>
                                        <div class="col-lg-11">
										<div class="form-group">
                                            <label>Attachment: ( If many, zip files )</label>
                                            <input class="" type = "file" id = "attachment1" name = "attachment1" >
                                        </div>
                                        </div>
                                        <div class="col-lg-11">
                                        <br>
                                        <?php echo '<button id = "submitButton1" type="button" class="btn btn-outline btn-primary" onclick = "formSubmit1('.$_SESSION['pims_data']['emp_id'].')" >Submit</button> '; ?>
                                        <button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                        </div>
                                    </form>
                        </div>



        </div><br><br><br>
        </div>
<div id="wrapper">
    <?php include 'include/footer.php'; ?>
</div>
	
	<!-- My Custom JavaScript -->
	<script src="../js/_leave_apply1.js"></script>
    <script  src="../js/index.js"></script>
</body>

</html>

	<!------- ALL PHP CUSTOMS HERE ONLY ------->
	<?php
		include("../myfunc/leave_apply1.php");
	?>
	<!----------------------------------------->
