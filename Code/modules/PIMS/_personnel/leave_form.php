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

                    <div class="col-lg-9">
                            <div class="tobeprint" style="background-color:#fcf8e3;margin-left: 20px;margin-right: 20px;">

                            <center>
                                <p>Republic of the Philippines<br>
                                <b>DEPARTMENT OF EDUCATION</b><br>
                                Region V (Bicol)<br>
                                Divison of Legazpi City<br><br><br>
                                <p><b>PAG-ASA NATIONAL HIGH SCHOOL</b><br>
                                Rawis, Legazpi City</p>
                            
                                <center><b>_________________________________________________________________</b></center>
                            <h4>LOCATOR'S SLIP</h4></center>

                            <br>
                                <label>Name of Employee: </label><br>
                                <label>Place to be Visited: </label><br>
                                <label>Start of Leave: </label><br>
                                <label>End of Leave: </label><br>
                                <label>Purpose: </label><br><br><br>
                                <input type="radio" checked> <label>Personal</label><br><br><br><br>

                                <center>
                                <p>Signature of Employee</p><br><br>

                                <label>Approved:</label><br><br><br>

                                
                                School Principal</center><br><br>

                                <center><b>_________________________________________________________________</b></center>

                            </div>

                            <br><br>
                            <a href="javascript:window.print()"><button class="btn btn-outline btn-primary"><i class="fa  fa-print"></i> PRINT</button></a>&emsp;
                            <button class="btn btn-outline btn-primary"><i class="fa  fa-print"></i> DOWNLOAD</button><br><br>
                    </div>

        </div>
        </div>
<div id="wrapper">
    <?php include 'include/footer.php'; ?>
</div>
    
</body>


</html>