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
                    <h3 class="page-header" align="center">TRAINING PROGRAM RECORDS</h3>
                    <a style="float: right;" href="profile.php" >GO BACK TO PROFILE <i class="fa  fa-arrow-circle-right"></i></a><br>

                <div class="row">
                    <div class="col-md-6">
                       <b>Employee Number:</b>  <span id = "empNo1"></span><br>
                        
                    </div>
                </div><br>
                <div class="table-responsive"><center>
                    <table id="t01" class="table">

                                            <tr>
                                                <th>Training ID </th>
                                                <th>Title of Training</th>
                                                <th>Location</th>
                                                <th>Date Start</th> 
                                                <th>Date End</th>
                                                <th>No. of Hour/s</th>
												<th>Other Info.</th>
                                            </tr>
                    </table>

                    </center>
                    
                                                       
                </div>
                </div>

                </div>
            </div>
    <div id="wrapper">
    <?php include 'include/footer.php'; ?>
</div>


</body>
    <script  src="../js/index.js"></script>
</html>

    <!------- ALL PHP CUSTOMS HERE ONLY ------->
        <?php
            include("../myfunc/training1.php");
        ?>
    <!----------------------------------------->




