<?php
include("../../db_connect.php");
session_start();
include("../include/session.php");


	$id = base64_url_decode($_GET['id']);

	$q_getacc = mysqli_query($mysqli, "SELECT * FROM cms_account 
		WHERE cms_account_ID='".$id."'")
		or die ("Error: ".mysqli_error($mysqli));

	$row =mysqli_fetch_array($q_getacc);

    $fetch_schoolyr = mysqli_query($mysqli, "SELECT year FROM css_school_yr
    WHERE status = 'active'");
    $syr = mysqli_fetch_assoc($fetch_schoolyr);
    $explodeupdate =explode("-",$syr['year']); 
    $syrstart = $explodeupdate['0'];
    $syrend = $explodeupdate['1'];

  $update = mysqli_query($mysqli, "SELECT * FROM scms_medrec
    WHERE scms_medrec.cms_account_ID = '".$id."'
    AND date_of_update BETWEEN '".$syrstart."-06-01' AND '".$syrend."-03-30'")
    or die(mysqli_error($mysqli));
    $u = mysqli_fetch_assoc($update);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>PNHS</title>
      
    <!-- Latest compiled and minified CSS -->
	
    <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
	<link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/w3.css">
    
    <!-- Documents Path -->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/t.css">
    <link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/metisMenu.min.css" type="text/css">
    
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
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
    .snip1578 {
  font-family: 'Open Sans', Arial, sans-serif;
  position: relative;
  display: inline-block;
  margin: 40px 15px;
  min-width: 230px;
  max-width: 315px;
  width: 100%;
  color: #000;
  text-align: left;
  font-size: 16px;
  background: #d9edf7;
  border-radius: 5px;
}

.snip1578 *,
.snip1578:before,
.snip1578:after {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.snip1578 img {
  max-width: 35%;
  margin-top: -15px;
  margin-left: 60%;
  margin-bottom: 15px;
  backface-visibility: hidden;
  vertical-align: top;
  border-radius: 5px;
}

.snip1578 figcaption {
  position: absolute;
  top: 0;
  right: 40%;
  left: 0;
  bottom: 0;
  padding: 15px;
}

.snip1578 h3 {
  margin: 0;
  font-size: 1.1em;
  font-weight: normal;
}

.dl-horizontal dt {
    float: left;
    width: 150px;
    overflow: hidden;
    clear: left;
    text-align: right;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.dl-horizontal dd {
    margin-left: 180px;
}
	body {
        color: #404E67;
        background: #FFFFFF;
		font-family: 'arial', sans-serif;
	}	
	.icon-background4 {
    color: #36f40b;
	}
        dt{
            font-size: small;
        }    
                dd{
            font-size: small;
        }
</style>
</head>

<body>
         <?php include("../include/topnav.php"); ?>       
        <div id="wrapper">
            <?php if(isset($_SESSION['user_data']['acct']['emp_no'])){
                include("../include/sidenav.php");
            }
            ?>
            <div id="page-content-wrapper">
            <div class="container-fluid"  style="margin-right:40px;margin-left:70px;">
			<ol class="breadcrumb">
				<li><a href="index.php">Health Monitoring</a></li>
				<li class="active">Create Medical Record</li>                
			</ol>                
                <div class="col-lg-12">
                    <h1 class="page-header">Create <small><small> Medical History and Health Information</small></small>       
                    </h1>
                 </div>

  
            <!-- Row start -->
            <div class="row">
                <div class="col-lg-12">
			
                        <div class="panel-body">
                            <form action = "update_mr_stuper.php" method = "post">
                            <div class="row">
                                <div class="col-lg-6">
								
                                    <h3>Health Information</h3><br>
                                    
                                        <div class="form-group">
 			                            <input type="hidden" name="id" id = "id" value="<?php echo $id; ?>">
                                        <label>Allergies</label><br>
                                        <textarea class="control-label col-md-12 col-sm-4 col-xs-12" name = "allergies" id ="allergies"><?php echo $u['allergies'];?></textarea>
                                        </div>
										<div>
                                            <p class="help-block">Example: Pollen</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Do you wear eyeglasses?</label><span class="required"></span>
                                            <?php 
											if($u['eyeglass'] == "Yes")
											{
												echo '<br>
													<label class="radio-inline">
														<input type="radio" name="eye" id="eye1" value="Yes" checked >Yes
													</label>
													<label class="radio-inline">
														<input type="radio" name="eye" id="eye2" value="No" >No
													</label>
												';
											}
											else
											{
												echo '<br>
													<label class="radio-inline">
														<input type="radio" name="eye" id="eye1" value="Yes" >Yes
													</label>
													<label class="radio-inline">
														<input type="radio" name="eye" id="eye2" value="No" checked >No
													</label>
												';
											}
											?>
                                           
                                        </div> 
										<div>
                                        <div class="form-group">
                                        <label>Description</label><br>
                                        <textarea class="control-label col-md-12 col-sm-4 col-xs-12" name = "eyedesc" id ="eyedesc"><?php echo $u['eye_cond_desc'];?></textarea>
                                        </div>
                                            <p class="help-block">Example: Nearsighted</p>                                    
                                        </div>
                                        <div class="form-group">
                                            <label>Do you have an ear condition?</label><span class="required"></span>
                                            <?php
												if($u['ear_infection'] == "Yes")
												{
													echo'<br>
													<label class="radio-inline">
														<input type="radio" name="ear" id="ear1" value="Yes" checked >Yes
													</label>
													<label class="radio-inline">
														<input type="radio" name="ear" id="ear1" value="No" >No
													</label>
													';
												}
												else
												{
													echo'<br>
													<label class="radio-inline">
														<input type="radio" name="ear" id="ear1" value="Yes" >Yes
													</label>
													<label class="radio-inline">
														<input type="radio" name="ear" id="ear1" value="No" checked >No
													</label>
													';
												}
											?>
                                        </div> 
                                        <div class="form-group">
                                        <label>Description</label><br>
                                        <textarea class="control-label col-md-12 col-sm-4 col-xs-12" name = "eardesc" id ="eardesc"><?php echo $u['ear_cond_desc'];?></textarea>
                                        
                                            <p class="help-block">Example: Middle ear infection</p>                                    
                                        </div> <hr>
                                       <h3>Illness History</h3>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Illness</th>
                                                            <th>Record</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         <?php
                                                        $fetch_ill = mysqli_query($mysqli, "SELECT * FROM scms_illness")
                                                        or die(mysqli_error($mysqli));

                                                        $illcount = 0;
                                                        while($ill = mysqli_fetch_array($fetch_ill))
                                                        {
															$f_illness = mysqli_query($mysqli, "SELECT * FROM scms_illness_hist_line
																WHERE medrec_id = '".$u['medrec_id']."' 
																AND illness_no = '".$ill['illness_no']."'")
																or die(mysqli_error($mysqli));
															$illness = mysqli_fetch_array($f_illness);
																
                                                            $illcount++;
															
															echo'
																<tr>
																<td>'.$illcount.'</td>
																<td>'.$ill['illness_name'].'</td>
																<td>
																<label>
																';
																
															if($illness == NULL)
															{
																 echo'
																	<input type="checkbox" value="'.$ill['illness_no'].'" name="ill[]" >';
															}
															else
															{
																 echo'
																	<input type="checkbox" value="'.$ill['illness_no'].'" name="ill[]" checked>
																';
															}
															echo'
															</label>
															</td>
															</tr>
															';
                                                           
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>  

                                </div>
									<!-- /.col-lg-6 (nested) -->
									<div class="col-lg-6">
									<h3>For Emergency</h3><br>
											<div class="form-group">
												<label>Name<span class="required"></span></label>
												<input type="text" name="name" required="required" value = "<?php echo $u['emer_contact_name'];?>" class="form-control" placeholder="First Name/Last Name">
											</div>
											<div class="form-group">
												<label>Relationship<span class="required"></span></label>
												<input type="text" name="rel" required="required" value = "<?php echo $u['relationship'];?>" class="form-control" placeholder="">
											</div>
											<div class="form-group">
												<label>Contact Number<span class="required"></span></label>
												<input type="text" maxlength="11" minlength="11" value = "<?php echo $u['emer_contact_no'];?>" name="num" required="required" class="form-control" placeholder="">
											</div><br><br><br><br><br><br><br><br><br><br><hr>									
																		
															
												<h3>Immunization Record</h3>
												<div class="panel-body">
												<div class="table-responsive">
												<table class="table table-striped">
													<thead>
														<tr>
															<th>#</th>
															<th>Immunization</th>
															<th>Record</th>
														</tr>
													</thead>
													<tbody>
														<?php
                                                    $fetch_immune = mysqli_query($mysqli, "SELECT * FROM scms_immunization")
                                                    or die(mysqli_error($mysqli));

                                                    $immunecount = 0;
                                                    while($immune = mysqli_fetch_array($fetch_immune))
                                                    {
														$_immune = mysqli_query($mysqli, "SELECT * FROM scms_immune_rec_line, scms_immunization
															WHERE medrec_id = '".$u['medrec_id']."' 
															AND scms_immune_rec_line.vaccine_no = scms_immunization.vaccine_no
															AND scms_immune_rec_line.vaccine_no = '".$immune['vaccine_no']."'")
															or die(mysqli_error($mysqli));
														
														$im = mysqli_fetch_array($_immune);
														
                                                        $immunecount++;
														
														echo'
                                                        <tr>
                                                        <td>'.$immunecount.'</td>
                                                        <td>'.$immune['vaccine_name'].'</td>
                                                        <td>
														<label>';
														
														if($immune['vaccine_no'] == $im['vaccine_no'])
														{
															echo '<input type="checkbox" value="'.$immune['vaccine_no'].'" name="immune[]" checked >';
														}
														else
														{
															echo '<input type="checkbox" value="'.$immune['vaccine_no'].'" name="immune[]" >';
														}
														echo'
                                                        </label>
                                                        </td>
                                                        </tr>
                                                        ';
                                                    }
                                                    ?>
													</tbody>
												</table>
											     </div> 
											     </div>		
								    </div>
                                    <!-- /.col-lg-6 (nested) -->		
                            </div>
                            <!-- /.row (nested) -->
							            
                        								<button type="submit" name = "submit_medrec" class="btn btn-primary" style="float:right;margin-right:30px">Submit</button>
                                <button type="reset" class="btn btn-info" style="float:right;margin-right:10px">Reset</button>
                            </form>
						</div><br><br><br>
                        <!-- /.panel-body -->
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div> 
            </div>
        </div>
        <!-- Footer --> 
            <?php include "../../pages/include/footer.php"; ?>
    </div>
    
    <script src="../../js/index.js"></script>    
    

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
<script src="../../js/metisMenu.min.js"></script>    
<script src="../../js/sb-admin-2.min.js"></script>
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

</body>

</html>
