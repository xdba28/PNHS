<?php
    session_start();
    error_reporting(0);
    include("../myfunc/session1.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>
	<?php include 'include/topnav.php';?><br><br><br>
        <div id="wrapper">
        <?php include 'include/sidenav.php';?>
        <div class="container">
        <br><br>
                <div class="col-lg-12">
                    <h3 class="page-header" align="center">Performance Reports</h3>
                </div>

                
                <br>
                <div class="row">
                            
                            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                            </div>
                        </div>
                
                </div>
                <?php include 'include/footer.php'; ?>
                </div>
    
    <!-- My Custom JavaScript -->
    <script src="../js/_profile1.js"></script>
    <script  src="../js/index.js"></script>

</body>

</html>

    <!------- ALL PHP CUSTOMS HERE ONLY ------->
        <?php
            include("../myfunc/profile1.php");
            include("../myfunc/profile2.php");
        ?>
    <!----------------------------------------->




