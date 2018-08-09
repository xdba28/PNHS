<?php

$host = "localhost";
$user = "root";
$password ="";
$database = "inventory";

$id = "";
$iname = "";
$des = "";
$pcode = "";
$unit = "";
$val = "";
$liable = "";
$quan = "";
$type = "";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}
// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['iname'];
    $posts[2] = $_POST['des'];
    $posts[3] = $_POST['pcode'];
	$posts[4] = $_POST['unit'];
	$posts[5] = $_POST['val'];
	$posts[6] = $_POST['liable'];
	$posts[7] = $_POST['quan'];
	$posts[8] = $_POST['type'];
    return $posts;
}
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `supply` SET `supp_name`='$data[1]',`supp_description`='$data[2]',`supp_prod_num`=$data[3],`supp_unit`=$data[4],`supp_value`=$data[5],`supp_officer`=$data[6],`supp_qty`=$data[7],`supp_type`=$data[8] WHERE `supp_id` = $data[0]";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Updated';
            }else{
                echo 'Data Not Updated';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessage();
    }
}
// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM supply WHERE supp_id = $data[0]";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $id = $row['supp_id'];
				$iname = $row['supp_name'];
				$des = $row['supp_description'];
				$pcode = $row['supp_prod_num'];
				$unit = $row['supp_unit'];
				$val = $row['supp_value'];
				$liable = $row['supp_officer'];
				$quan = $row['supp_qty'];
				$type = $row['supp_type'];
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Request Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="C:\xampp\htdocs\PANAHAS\pages\index.html">Back to Home</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                            <!-- /input-group -->
                        </li>
                        <li>
                            </br></br></br></br></br></br><a href="forme.html"> Laboratory</a></br>
                        </li>
                         </li>
                        <li>
                            <a href="formej.html"> Janitorial</a></br>
                        </li>
						<li>
                            <a href="formet.html"> T.L.E.</a></br>
                        </li>
						<li>
                            <a href="formeel.html"> Electric</a></br>
                        </li>
						<li>
                            <a href="formep.html"> P.E.</a></br>
                        </li>
						<li>
                            <a href="formeco.html"> Construction</a></br>
                        </li>
						<li>
                            <a href="formecl.html"> Clinic</a></br>
                        </li>
                         </li>
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Equipment Request Form</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    <form action="updates.php" method="post">
									<input type="number" name="id" placeholder="Id" value="<?php echo $id;?>"><br><br>
									<input type="text" name="iname" placeholder="Item Name" value="<?php echo $iname;?>"><br><br>
									<input type="text" name="des" placeholder="Description" value="<?php echo $des;?>"><br><br>
									<input type="text" name="pcode" placeholder="Product Code" value="<?php echo $pcode;?>"><br><br>		
                                    <input type="text" name="unit" placeholder="Unit" value="<?php echo $unit;?>"><br><br>
									<input type="number" name="val" placeholder="Value" value="<?php echo $val;?>"><br><br>
									<input type="number" name="quan" placeholder="Quantity" value="<?php echo $quan;?>"><br><br>
									<input type="text" name="liable" placeholder="Liable" value="<?php echo $liable;?>"><br><br>
									<input type="text" name="type" placeholder="Type" value="<?php echo $type;?>"><br><br>
									<!-- Input For Edit Values -->
										<input type="submit" name="update" value="Update">
                                    
									<!-- Input For Find Values With The given ID -->
										<input type="submit" name="search" value="Find"><br><br> 
                                        </div>
                                       
                                        
                                    </form>
                                </div>
                               
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
