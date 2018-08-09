<?php
include "db_conn.php";
include "../func.php";
include "../session.php";

$sy = mysqli_query($conn, "SELECT * FROM css_school_yr WHERE status!='used'");

?>

<!DOCTYPE html>
<html lang="en" >

	
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>New S.Y. Class Schedule</title>
      
    <!-- Latest compiled and minified CSS -->
	<?php if ($_SESSION['screen_width'] >= 1600 ) {
			echo '<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">';
			echo '<link rel="stylesheet" href="../css/w3/blue.css">';
		}
		elseif ($_SESSION['screen_width'] > 1142 ) {
			echo '<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min2.css">';
			echo '<link rel="stylesheet" href="../css/w3/blue2.css">';

		}
		else{
			echo '<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min3.css">';
			echo '<link rel="stylesheet" href="../css/w3/blue3.css">';
		}
	?>
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="../css/w3/w3.css">
	<link rel="stylesheet" href="../css/style.css">

    <!-- Documents Path --->
    <link rel="stylesheet" href="..docs/docs.min.css">
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/sidebar-menu.css">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_logoicon.jpg" type="image/x-icon">
	
	    <!-- DataTables CSS -->
    <link href="../css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../css/dataTables.responsive.css" rel="stylesheet">
	
    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">
	
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
	
	        <style>
        /*A class for form controls*/
        .inputstl { 
            padding: 9px; 
            border: solid 1px #B3FFB3; 
            outline: 0; 
            background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #A4FFA4), to(#FFFFFF)); 
            background: -moz-linear-gradient(top, #FFFFFF, #A4FFA4 1px, #FFFFFF 25px); 
            box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
            -moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
            -webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 

            } 

                    /* Style The tables */
                    .column-title{
                      background-color: #246884;
                      text-align: center;
                      font-size:15px; 
                      color: #fff;
                    }
                    .time{
                      background-color: #153948;
                      color: #fff;
                    }
                    .check{
                      width: 28px;
                      height: 28px;
                      position: relative;
                      margin: 20px auto;
                      background: #fcfff4;
                      background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
                      border-radius: 50px;
                      box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
                    }    
                    /* Style The Dropdown Button */
                    .dropbtn {
                        background-color:transparent;
                        color:#999;
                        text-align: right;
                        font-size: 13px;
                        border: none;
                        cursor: pointer;
                    }
                                                
                    /* The container div - needed to position the dropdown content */
                    .dropdown {
                        position: relative;
                        display: inline-block;
                    }
                                       
                    /* Dropdown Content (Hidden by Default) */
                    .dropdown-content {
                        display: none;
                        position: absolute;
                        background-color: #f9f9f9;
                        min-width: 100px;
                        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                        z-index: 1;
                    }
                     
                    /* Links inside the dropdown */
                    .dropdown-content a {
                        color: black;
                        padding: 9px 25px;
                        text-decoration: none;
                        display: block;
                        font-size: 13px;

                    }
                    /* Change color of dropdown links on hover */
                    .dropdown-content a:hover {background-color:#B8BDED}                    
          
                    /* Show the dropdown menu on hover */
                    .dropdown:hover .dropdown-content {
                        display: block;
                    }          
                    
                    /* Change the background color of the dropdown button when the dropdown content is shown */
                    .dropdown:hover .dropbtn {
                        background-color:transparent; 
                    }
                    .a{
                      float: right;
                      margin: 0;
                    }
                    table {
                      table-layout: fixed;
                      width: 1040px;
					  word-wrap:break-word;
                    }
</style>
	
    <body>
    <?php include("../topnav.php"); ?>
        <div id="wrapper" style = "height:115%">
            <?php include("../sidenav.php"); ?> 
				
                <div class="container" style = "min-height:800px">
                    <?php 
                    if(mysqli_num_rows($sy)==0){
                        echo '<center><h2 style="padding-bottom: 30px; padding-top: 50px">No School Years<br></h2></center>';
                    }
                    else{ 
                    ?>
					<center><h2 style="padding-bottom: 30px; padding-top: 50px">Manage School Years<br></h2></center>
					<div class="tab-content">
					<div id="add" class="tab-pane fade in active">
					 <div class="row"><br>
					   <div class="col-md-12">
						 <div class="panel panel-default">
						   <div class="panel-heading">School Year</div>
						   <div class="panel-body">
					  <div id="change_stat">
					  <?php
						foreach($sy as $s_y){
                            if($s_y['status']=='used'){
                                continue;
                            }
                            else{
					  ?>
								  <table class="w3-table">
							  <tr>
								<form action="manage_rename.php" method="POST">
								<td>
								  <input type="text" class="form-control" name="year" value="<?php echo $s_y['year']?>">
								</td>
								<td>
								<div class="col-md-6">
								  <select class="form-control col-md-3" onchange="stat(this.value)">
									<?php 
									  if($s_y['status']=="active"){
										echo '<option value="'.$s_y['sy_id'].'">active</option>
											  <option value="'.$s_y['sy_id'].'">inactive</option>';
									  }
									  else{
										echo '<option value="'.$s_y['sy_id'].'">inactive</option>
											  <option value="'.$s_y['sy_id'].'">active</option>';
									  }
									?>
								  </select>
								</div> 
								  <button class="btn save" type="submit" name="btn" value="<?php echo $s_y['sy_id']?>">Update</button>
								  </form>
								  <a href="edit_sched.php?yr=<?php echo $s_y['sy_id']?>" class="btn save">Edit</a>
								  <button class="btn save" value="<?php echo $s_y['sy_id']?>" onclick="del_m(this.value)">Delete</button>
								</td>
							  </tr>
							</table>
					  <?php 
                          }
                        }?>
					  </div>
						   </div>
						 </div>
					   </div>
					 </div>
					</div>
                    <?php }?>
				</div>
				</div> <!-- DIV FOR CONTAINER -->
	<!-- FOOOTER --->

	<?php 
		include "../include/footer.php";
	?>
	<!-- FOOOTER --->
	</div> <!-- DIV FOR WRAPPER -->

   
<!-- SCRIPT -->
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/sidebar-menu.js"></script>
<script src="../js/sideNav.js"></script>
<script  src="../js/index.js"></script>
<script  src="../js/index2.js"></script>
<script  src="../js/index3.js"></script>
<script  src="../js/index4.js"></script>
<script src="../js/select2.min.js"></script>
  <script src="../../../js/metisMenu.min.js"></script>
  <script src="../../../js/sb-admin-2.min.js"></script>
	<script>
		$('#select2').select2();
	</script>

<!-- DataTables JavaScript -->
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
    <script src="../js/dataTables.responsive.js"></script>

<!-- Page-Level Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
	
    <script>
    $(document).ready(function() {
        $('#dataTables-example2').DataTable({
            responsive: true
        });
    });
    </script>
	
    <script>
    $(document).ready(function() {
        $('#dataTables-example3').DataTable({
            responsive: true
        });
    });
    </script>	
	
    <script>
    $(document).ready(function() {
        $('#dataTables-example4').DataTable({
            responsive: true
        });
    });
    </script>

	

	
<!-- Page-Level Scripts - Tables - Use for reference END -->

	
<script>
	$.sidebarMenu($('.sidebar-menu'))
</script>


<script type="text/javascript">
  function stat(val){
    $.ajax({
      type: "POST",
      url: "manage_stat.php",
      data: "syid="+val,
      success: function(data){
        $("#change_stat").html(data);
      }
    });
  }

  function del_m(val){
    var r = confirm('Are you sure you want to DELETE this School Year?');
    if(r == true){
      $.ajax({
        type: "POST",
        url: "manage_delete.php",
        data: "syid="+val,
      });
      location.reload();
        }
    else{
      window.location.href='manage.php';
    }
  }
</script>

<!-- SCRIPT -->   

</body>
</html>
