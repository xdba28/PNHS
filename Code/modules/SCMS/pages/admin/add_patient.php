<?php
include_once('db_connect.php');
session_start();
include_once('log.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>Admin</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../../css/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/s.css">
    
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../Template (reference)/vendor/jquery/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../Template (reference)/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
body {
        color: #404E67;
        background: #F5F7FA;
		font-family: 'Open Sans', sans-serif;
	}
	.table-wrapper {
		width: 700px;
		margin: 30px auto;
        background: #fff;
        padding: 20px;	
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    .table-title .add-new {
        float: right;
		height: 30px;
		font-weight: bold;
		font-size: 12px;
		text-shadow: none;
		min-width: 100px;
		border-radius: 50px;
		line-height: 13px;
    }
	.table-title .add-new i {
		margin-right: 4px;
	}
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
		cursor: pointer;
        display: inline-block;
        margin: 0 5px;
		min-width: 24px;
    }    
	table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table td a.add i {
        font-size: 24px;
    	margin-right: -1px;
        position: relative;
        top: 3px;
    }    
    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }
	table.table .form-control.error {
		border-color: #f50000;
	}
	table.table td .add {
		display: none;
	}
	.icon-background4 {
    color: #36f40b;
	}
</style>

<script type="text/javascript">
	$(function () {
		$("#med").change(function () {
			var st = this.select;
			var value = selected(this.value);
			if (!st) {
				$("#qty").prop("disabled", true);	
			}
			else{
				$("#qty").prop("disabled", false);
			}
		});
	});
</script>
</head>

<body>
<nav class="w3-theme-bd5 w3-card-4 navbar navbar-fixed-top" style="background-color:rgba(42,101,149,0.95)!important">
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand" style="padding-top:5px;margin-left:5px" href="index.php"><img src="../../docs/img/pnhs_logo.png" style="max-width:40px;margin-left:50px;margin-right:50px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form class="navbar-form navbar-left hidden-sm">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
              </span>
          </div>
        </form>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="account.php"><i class="fa fa-user fa-fw"></i> Admin Profile</a></li>
        <li class="divider"></li>
        <li><a href="../login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
        <nav style="max-width:100%" class="hidden-xl hidden-lg hidden-md hidden-sm">
            <ul class="sidebar-menu">
			  <li class="sidebar-header">IMPORTANT</li>
			  <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			  <li class="active"><a href="daily.php"><i class="fa fa-clock-o fa-fw"></i> <span>Daily Visit Log</span></a></li>
			  <li><a href="patient.php"><i class="fa fa-bar-chart-o fa-fw"></i> Patient Records</a></li>
			  <li>
                <a href="#">
                  <i class="fa fa-table fa-fw"></i>
                  <span>Medical Records</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
				<li><a href="student.php"><i class="fa fa-circle-o"></i> Students</a></li>
                  <li><a href="personnel.php"><i class="fa fa-circle-o"></i> Personnels</a></li>
                </ul>
              </li>
			  <li>
                <a href="#">
                  <i class="fa fa-stethoscope fa-fw"></i>
                  <span>Manage</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
				<li><a href="medicine.php"><i class="fa fa-circle-o"></i> Medicine</a></li>
                <li><a href="supplies.php"><i class="fa fa-circle-o"></i> Supplies</a></li>
                <li><a href="equipment.php"><i class="fa fa-circle-o"></i> Equipment</a></li>
                </ul>
              </li>
			  <li><a href="reports.php"><i class="fa fa-thumb-tack fa-fw"></i> Reports</a></li>
			  <li><a href="support.php"><i class="fa fa-gears fa-fw"></i> Support</a></li>
              <li class="sidebar-header">EDIT</li>
			  <li><a href="edit.php"><i class="fa fa-edit fa-fw"></i>Home Page</a></li>
            </ul>
        </nav>
    </ul>
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
<hr class="w3-theme-yd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
<hr class="w3-theme-bd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
</nav>

<div class="row">
    <div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
        <div class="navbar navbar-fixed-top" style="width:200px; margin-top:56px">
            <ul class="sidebar-menu">
			<li style="padding-left:15px;padding-top:10px;padding-bottom:25px;padding-right:15px">
				  <img src="../../docs/img/kyunga.jpg" class="img-circle pull-left" alt="User Image" style="max-width:60px;border:3px solid white">
				  <small>
				  <a style="float:right;padding-top:10px;color:white"><?php echo $wholename['P_fname'].' '.$wholename['P_lname'];?><br></a>
				  <a class="text-right" style="padding-left:55px;color:white"><i class="fa fa-circle icon-background4"></i>&ensp;Online</a>
				  </small>
			  <li>
			  <li class="sidebar-header">IMPORTANT</li>
			  <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			  <li class="active"><a href="daily.php"><i class="fa fa-clock-o fa-fw"></i> <span>Daily Visit Log</span></a></li>
			  <li><a href="patient.php"><i class="fa fa-bar-chart-o fa-fw"></i> Patient Records</a></li>
			  <li>
                <a href="#">
                  <i class="fa fa-table fa-fw"></i>
                  <span>Medical Records</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
				<li><a href="student.php"><i class="fa fa-circle-o"></i> Students</a></li>
                  <li><a href="personnel.php"><i class="fa fa-circle-o"></i> Personnels</a></li>
                </ul>
              </li>
			  <li>
                <a href="#">
                  <i class="fa fa-stethoscope fa-fw"></i>
                  <span>Manage</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
				<li><a href="mse.php"><i class="fa fa-circle-o"></i> Medicine</a></li>
                <li><a href="supplies.php"><i class="fa fa-circle-o"></i> Supplies</a></li>
                <li><a href="equipment.php"><i class="fa fa-circle-o"></i> Equipment</a></li>
                </ul>
              </li>
			  <li><a href="reports.php"><i class="fa fa-thumb-tack fa-fw"></i> Reports</a></li>
			  <li><a href="support.php"><i class="fa fa-gears fa-fw"></i> Support</a></li>
              <li style="padding-bottom:100%"></li>
            </ul>
		</div>
	</div>
    <div class="col-lg-10 col-md-9 col-sm-9">
        <div class="container-fluid" style="height:700px;max-width:100%;margin-top:70px;margin-right:20px;margin-left:20px;margin-bottom:10px">
			<h1 class="page-header">
	<!--		<button type="button" onclick="goBack()" class="btn btn-info btn-circle"><i class="fa fa-reply"></i>
             </button>
			<script>
			function goBack() {
			window.history.back();
			}
			</script>-->
			Add Patient</h1>
			<div class="col-lg-7" style="padding-top:25px;padding-bottom:25px;">
			<div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
			         <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="save_pat.php" method="post">
						
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Name:<span class="required"></span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						<!--combobox-->
						<link href="../../css/bootstrap-combobox.css" rel="stylesheet" type="text/css"><style>
						body { background-color:#fafafa;}
						.container { margin:150px auto; max-width:400px;}
						h2 { margin:30px auto; font-size:16px;}
						</style>

						<script src="../../js/bootstrap-combobox.js"></script>
						<script>
						$(document).ready(function(){
								  $('.combobox').combobox()
								});
						</script>
						<!--/combobox-->
							<?php 
							mysqli_query($mysqli, "LOCK TABLES cms_account, sis_student, pims_personnel READ");
							$fetch_students = mysqli_query($mysqli, "SELECT *
							FROM cms_account, sis_student
							WHERE sis_student.lrn = cms_account.lrn")
							or die("Error: Could not fetch rows!".mysqli_error($mysqli));
							
							$fetch_personnel = mysqli_query($mysqli, "SELECT *
							FROM cms_account, pims_personnel
							WHERE pims_personnel.emp_No = cms_account.emp_no")
							or die("Error: Could not fetch rows!".mysqli_error($mysqli));
							
							echo'<select name="record" id="combobox" class="combobox input-large form-control col-md-7 col-xs-12" required="required">';
							
							while($rowstud = mysqli_fetch_array($fetch_students))
							{
								echo'
								<option value="'.$rowstud['cms_account_ID'].'">'.$rowstud['stu_fname']." ".$rowstud['stu_mname']." ".$rowstud['stu_lname'].'</option>';
							}
							
							while($rowper = mysqli_fetch_array($fetch_personnel))
							{
								echo'
								<option value="'.$rowper['cms_account_ID'].'">'.$rowper['P_fname']." ".$rowper['P_lname'].'&nbsp&nbsp&nbsp'.'</option>';
							}
							
							$mysqli_query($mysqli, "UNLOCK TABLES");
							
						  ?>
						  </select>
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Complaint:<span class="required"></span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" name="complaint" id="complaint" required=""  placeholder="" class="form-control col-md-7 col-xs-12" >
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Diagnosis:<span class="required"></span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" name="diagnosis" id = "diagnosis" required="required" placeholder="" class="form-control col-md-7 col-xs-12" >
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Treatment:<span class="required"></span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" name="treatment" id = "treatment" required="required"  placeholder="" class="form-control col-md-7 col-xs-12" >
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Disposition:<span class="required"></span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <select name = "dispo" id = "dispo" placeholder="" class="form-control col-md-7 col-xs-12">
							<option value="Stay in clinic">Stay in clinic</option>
							<option value="Back to classroom">Back to classroom</option>
							<option value="Send home">Send home</option>
							<option value="Send to hospital">Send to hospital</option>
						  </select>
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Time In:<span class="required"></span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="time" name="timein" id = "timein" required="required" placeholder="" class="form-control col-md-7 col-xs-12" >
						</div>
					  </div>
					   <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Time Out:<span class="required"></span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="time" name="timeout" id = "timeout" placeholder="" class="form-control col-md-7 col-xs-12" >
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Medicine:<span class="required"></span>
						</label>
						<div id="education_fields">
						<div class="col-sm-2 nopadding" style="padding-left:29px"><div class="form-group">
						
						<?php
						 $fetch_med = mysqli_query($mysqli, "SELECT * FROM scms_medicine ORDER BY gen_name ASC")
							or die("Error: Could not fetch rows!".mysqli_error($mysqli));
						 $count = 0;
							echo'
							<input type="number" class="form-control" id="qty" name="qty[]" placeholder="Qty" required min="1"></div></div>
							<div class="col-sm-4" style="padding-left:24px;padding-right:29px"><div class="form-group">
							<select class="form-control" id="med" name="med[]">
							<option value="NO" selected></option>';
						 while($row = mysqli_fetch_array($fetch_med))
						 {
							$medno = $row['med_no'];
							echo'
							<option value="'.$medno.'">'.$row{'brand_name'}.'</option>
							';
							$count++;
						 }
						?>
						      </select>
							  </div>
							  </div>
						
						<div class="col-sm-2 nopadding" style="padding-left:29px"><div class="form-group">
						<button class="btn btn-info" type="button"  onclick="education_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
						</div> </div>
						
						</div>
						</div>
						
					<div style="float:right">
						<button type="submit" class="btn btn-success " name="submit_pat">Submit</button>
						<button type="reset" class="btn btn-warning">Reset</button>
					</div>
					
			</form>
					  </div>
  
			
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
        <!-- /#col -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../js/alert.js"></script>
<script src="../../js/slideshow.js"></script>
<script src="../../js/backToTop.js"></script>
<script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../Template%20(reference)/vendor/jquery/jquery-3.0.0.min.js"></script>
<script src="../../js/sidebar-menu.js"></script>
<script src="../../js/sideNav.js"></script>

<!-- Morris Charts JavaScript -->
    <script src="../../vendor/raphael/raphael.min.js"></script>
    <script src="../../vendor/morrisjs/morris.min.js"></script>
    <script src="../../data/morris-data.js"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>
<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    </script>


<script>
var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
	var oldHTML = document.getElementById('para').innerHTML;
    divtest.innerHTML = '<div class="col-md-12" style="margin-left:24%">'+oldHTML+'<div class="col-sm-2 nopadding" style="padding-left:29px"><div class="form-group"><button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"><span class="fa fa-minus" aria-hidden="true"></span> </button></div></div> </div>';
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
</script>
			
<div id='para'style="visibility: hidden;">
						<div class="col-sm-2 nopadding" style="padding-left:28px"><div class="form-group">
	<?php
						 $fetch_med1 = mysqli_query($mysqli, "SELECT * FROM scms_medicine ORDER BY gen_name ASC")
							or die("Error: Could not fetch rows!".mysqli_error($mysqli));
						 $count = 1;
							echo'
							<input type="number" class="form-control" id="qty" name="qty[]" placeholder="Qty" required min="1"></div></div>
							<div class="col-sm-4" style="padding-left:24px;padding-right:29px"><div class="form-group">
							<select class="form-control" id="med" name="med[]"">';
						 while($row = mysqli_fetch_array($fetch_med1))
						 {
							$medno = $row['med_no'];
							echo'
							<option value="'.$medno.'">'.$row{'brand_name'}.'</option>
							';
							$count++;
						 }
							?>
						      </select>
							  </div>
							  </div>
							  
							  
</div>
<!-- Footer -->
<?php include "../../pages/include/footer.php"; ?>

</body>

</html>
