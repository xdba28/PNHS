<?php
	session_start();
	include("../myfunc/session1.php");
	include("../myfunc/session3.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>
<?php include 'include/topnav.php';?>
<div id="wrapper">
<?php include 'include/sidenav.php';?>
    <br>
    <div class="container">
    <div class="row">
    <div class="col-lg-11">
        <div class="container-fluid">
        <br>
        <div class="row">
            <center><h2>Personnel Leave Application Management</h2></center><br>
            </div>
            <!-- /.row -->
            <div class="row">

                <div class="col-lg-3 col-md-6">
                <a href="leave_applicants.php">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-align-right fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Pending !</div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        
                    </div>
                    </a>
                </div>
				
                <div class="col-lg-3 col-md-6">
                <a href="approved_applicants.php">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-thumbs-up fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Approved Leave</div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        
                    </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6">
                <a href="disapproved_applicants.php">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-thumbs-down fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Disapproved Leave</div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        
                    </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6">
                <a href="canceled_application.php">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-arrow-circle-right fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Canceled Application</div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        
                    </div>
                    </a>
                </div>

            </div>

<br><br>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-gears fa-fw"></i>&emsp;Personnel Leave Application Management
                        </div>
                            <div class="panel-footer">
                                <br><br><p>&emsp;The Personnel Leave Application Management helps to effectively respond to personnels leave applications. It grants or decline leave applicants with enough information provided by the system. It allows the administrator to review history of applications and generate reports from it. The system also provides 24-hour service making it convenient both for the applicants and the administrator. Furthermore, all important data regarding the function of the system are safely stored in the database to promote data security and integrity.</p>
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
    <?php include 'include/footer.php';?>
</div>
    
    <script>
    $.sidebarMenu($('.sidebar-menu'))
    </script>
    <script  src="../js/index.js"></script>


</body>

</html>
