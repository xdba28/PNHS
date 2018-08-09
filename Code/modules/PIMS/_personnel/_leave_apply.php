<?php
	session_start();
	include("../myfunc/session1.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>

<?php include 'include/topnav.php';?>

        <?php 
    include 'include/sidenav.php';
?>
    <div id="page-wrapper">

        <div class="container">
                        <div class="col-lg-7" style="margin-top: 50px;">

                        <form role="form" id = "form1" >
                        <h2 style="text-align: center;">APPLICATION FORM</h2><br>
										<div class="form-group">
                                            <label style = "color: red ">All with * are required.</label>
                                        </div>
                                        <div class="form-group">
                                            <label>Name of Employee: </label>
                                            <input class="form-control" placeholder="Enter Text" disabled id = "name1" >
                                        </div>
                                        <div class="form-group">
                                            <label>Place to be Visited: </label>
                                            <input class="form-control" placeholder="Enter text" id = "placeToBeVisited1" name = "placeToBeVisited1" >
                                        </div>
										<div class="form-group">
                                            <label><span style = "color: red">*</span>Start of leave: </label>
                                            <input class="form-control" placeholder="Enter text" id = "startOfLeave1" name = "startOfLeave1" type="date">
                                        </div>
                                        <div class="form-group">
                                            <label><span style = "color: red">*</span>End of leave: </label>
                                            <input class="form-control" placeholder="Enter text" id = "timeOfReturn1" name = "timeOfReturn1" type="date">
                                        </div>

                                        <div class="form-group">
                                            <label>Purpose: </label>
                                            <textarea class="form-control" rows="3" id = "purpose1" name = "purpose1"></textarea>
                                        </div>
                                        
                                        <div class="form-group">
											<label><span style = "color: red">*</span>Official or Personal Leave: </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name = "type1" value = "Official" >Official
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name = "type1" value = "Personal" >Personal
                                            </label>
                                        </div>
										
										<div class="form-group">
                                            <label>Attachment: ( If many, zip files )</label>
                                            <input class="form-control" type = "file" id = "attachment1" name = "attachment1" >
                                        </div>
                                        <br>
                                        <?php echo '<button id = "submitButton1" type="button" class="btn btn-outline btn-primary" onclick = "formSubmit1('.$_SESSION['pims_data']['emp_id'].')" >Submit</button> '; ?>
                                        <button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                        <?php //Aldrick please indicate the date using timestamp. I no longer add the date in the form. You know what i mean.?>
                                        <br>
                                        <p>Note: The application is to be approved or not by the Secondary School Principal.</p>
                                    </form>
                        </div>



        </div>
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
