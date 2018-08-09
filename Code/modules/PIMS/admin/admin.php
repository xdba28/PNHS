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

    <div id="wrapper" style="margin-left: 60px;">
        
        <div class="container">
                    <div class="col-lg-11">
        <div class="container-fluid">

        <div class="row">

            <div class="col-lg-6 col-md-6">
            <a href="non_teaching.php">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/non.png" style="height: 250px;width: 250px;" alt="Non-Teaching Personnel">
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><br></div>
                                    <div><h2>NON TEACHING PERSONNEL</h2></div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
            </a>
                </div>

            <div class="col-lg-6 col-md-6">
            <a href="teaching.php">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/teaching.png" style="height: 250px;width: 250px;" alt="Non-Teaching Personnel">
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><br></div>
                                    <div><h2>TEACHING PERSONNEL</h2></div>
                                </div>
                            </div>
                        </div>
                       
                        
                    </div>
            </a>
                </div>
        </div>

<br><br>

		<div class="row">
		<div class="col-lg-12">
		<a href="all_personnel.php">
		<div class="panel panel-info">
                        <div class="panel-heading">

                                    <div><h1>SEE ALL PERSONNEL<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></h1></div>
                        </div>
                        
              </div> 
        </a>         
        </div>
        </div><br>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-gears fa-fw"></i>&emsp;Personnel Information Management
                        </div>
                            <div class="panel-footer">
                                <br><br><p>&emsp;The Personnel Profile Management allows the administrator to add and update PNHS personnel profiles. It lets the administrator checked recent profile updates and have the privilege to approve or disapprove profile update and iteration. Furthermore, all important data regarding the function of the system are safely stored in the database to promote data security and integrity.</p>
                                <br><br><p></p>

                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
            </div>






    </div>
    </div>
    </div>
</div>
<div id="wrapper">
<?php include 'include/footer.php';?>
</div>
    
	<!--
    <script>
    $.sidebarMenu($('.sidebar-menu'))
    </script> -->
    <script  src="../js/index.js"></script>

</body>

</html>
