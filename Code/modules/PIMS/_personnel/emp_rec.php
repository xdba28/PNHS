<?php
    session_start();
    //error_reporting(0);
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
        <div class="panel-body">
                <center><h3>EMPLOYMENT RECORD</h3></center>
                <a style="float: right;" href="profile.php" >GO BACK TO PROFILE <i class="fa  fa-arrow-circle-right"></i></a><br>
            Complete Item No.:<label id = "for1"></label><br>
            Employee No.:<label id = "for2"></label>
            <br><br><br>

                        <table class="table " id = "emp_rec_div">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                            
                            <tbody>
                                <tr>
                                    <td id="for3"><label>Name:</label></td>
                                    <td id="for4"><label>Role Type:</label></td>
                                </tr>
                                <tr>
                                    <td id="for5"><label>Division Code:</label></td>
                                    <td id="for6"><label>Biometric ID:</label></td>
                                </tr>
                                <tr>
                                    <td id="for7"><label>School ID:</label></td>
                                    <td id="for8"><label>Region Org. Code:</label></td>
                                </tr>
                                <tr>
                                    <td id="for9"><label>Employment Status:</label></td>
                                    <td id="for10"><label>Date Joined:</label></td>
                                </tr>
                                <tr>
                                    <td id="for11"><label>Date of Original Appointment:</label></td>
                                    <td id="for12"><label>Job Title Code:</label></td>
                                </tr>
                                <tr>
                                    <td id="for13"><label>Job Title Name:</label></td>
                                    <td id="for14"><label>Department:</label></td>
                                </tr>
                            </tbody>
                        </table>
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
            include("../myfunc/new/emp_rec.php");
			echo "<script> $('#emp_rec_div').empty(); </script>";
			getemploymentrecords();
        ?>
    <!----------------------------------------->




