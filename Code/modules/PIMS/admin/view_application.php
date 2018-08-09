<?php
    session_start();
    error_reporting(0);
    include("../myfunc/session2.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>
<?php include 'include/topnav.php';?><br><br><br>
<div id="wrapper">
<?php include 'include/sidenav.php';?>
  <br>
    <div class="container">
    <div class="row">
    <div class="col-lg-12">
        <div class="container-fluid">
			<div class="row">
			<div class="panel panel-info">
			<div class="panel-body">
                <div class="row">
                            
                    <div class="panel-body">
                            <center><h3>LEAVE INFORMATION</h3></center><br>

                    <div class="col-lg-4">
                        <div class="pic-holder" id = "picHolder1">
                            <img id = "img1" alt = "Pic" style='height: 257px; width: 242px;'>
                        </div><br>
                        <label><span id = "span1">Mark Gil M. Mangampo</span></label><br><br>
                        <div class="panel-body">
                            REMAINING CREDITS: <label><span id = "span2" >4</span></label>
                        </div>
                    </div>

                    <div class="col-lg-8">
                            <label>Leave Type:</label> <span id = "span3" >Personal</span> <br>
                            <label>Leave Start:</label> <span id = "span4">October 10, 2017</span> <br>
                            <label>Leave End:</label> <span id = "span5" >October 18, 2017</span> <br>
                            <label>Place to be visited:</label> <span id = "span6">Sample Place</span> <br><br>
                            <label>Purpose:</label> <span id = "span7"></span> <br><br>
                            <label>Attachment:</label> <span id = "span8">None</span> <br><br><br>
							<label>Status:</label> <span id = "span9"></span> <br><br>
						<span id = "span10"></span>
                    </div>
                    </div>
                </div>
			</div>
			</div>
			</div>


    </div>
    </div>
    </div>
    </div></div>
    <?php include 'include/footer.php';?>
</div>
    

    <script>
    // tooltip 
    $('.tooltip').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    </script>
	<script src = "../js/_view_application1.js"></script>
    <script  src="../js/index.js"></script>
    

</body>
	<!------- ALL PHP CUSTOMS HERE ONLY ------->
		<?php
			include("../myfunc/view_application1.php");
		?>
	<!----------------------------------------->
</html>
