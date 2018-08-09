<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../func.php");
    include("../db/db.php");
    include("../sesh.php");
    date_default_timezone_set('Asia/Manila');
    $date=date("Y-m-d");
    $yesterday=date("Y-m-d",time()-86400);
    function base64_url_encode($input) {
     return strtr(base64_encode($input), '+/=', '._-');
    }

    function base64_url_decode($input) {
     return base64_decode(strtr($input, '._-', '+/='));
    }

?>
<head>
  <meta charset="UTF-8">
  <title>PAG-ASA National High School</title>
    <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
    <link rel='stylesheet prefetch' href='../css/bootstrap.min.css'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/w3.css">
    
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <script src='../js/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
    <script src="../js/sweetalert.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_button'); //Add button selector
		var wrapper = $('.field_wrapper'); //Input field wrapper
		var fieldHTML = '<div class="field_wrapper"><a href="javascript:void(0);" class="remove_button" title="Remove field"><img style="width:100px;padding-left:10px;" src="../docs/img/remove2.png"></a><div class="row"><div class="col-md-1"><br></div><div class="col-md-2"><label><h6><b>Inclusive date start</b></h6></label><input class="form-control" placeholder="yyyy-mm-dd" name="start[]" required></div><div class="col-md-2"><label><h6><b>Inclusive date end</b></h6></label><input class="form-control" placeholder="yyyy-mm-dd" name="end[]" required></div><div class="col-md-3"><label><h6><b>Source of Fund<br>&nbsp;</b></h6></label><input class="form-control" placeholder="e.g.,BSP" type="text" name="fund[]" required></div><div class="col-md-3"><label><h6><b>Remarks<br>&nbsp;</b></h6></label><input class="form-control" placeholder="e.g.,Promoted" type="text" name="remark[]" required></div></div><div class="row"><div class="col-md-1"><br></div><div class="col-md-2"><label><h6><b>Status</b></h6></label><input class="form-control" placeholder="e.g.,Permanent" type="text" name="stat[]" required></div><div class="col-md-2"><label><h6><b>Salary</b></h6></label><div class="input-group"><span class="input-group-addon" id="basic-addon1">&#8369;</span><input class="form-control" placeholder="1000.00" type="number" name="sal[]" required></div></div><div class="col-md-3"><label><h6><b>Designation&nbsp;</b></h6></label><input class="form-control" placeholder="e.g.,Teacher I" type="text" name="des[]" required></div><div class="col-md-3"><label><h6><b>Office Entry&nbsp;</b></h6></label><input class="form-control" placeholder="e.g.,PNHS" type="text" name="office[]" required></div><div class="col-md-1"><br></div></div><hr></div>'; //New input field html 
		var x = 1; //Initial field counter is 1
		$(addButton).click(function(){ //Once add button is clicked
			if(x < maxField){ //Check maximum number of input fields
				x++; //Increment field counter
				$(wrapper).append(fieldHTML); // Add field html
			}
		});
		$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
	});
	</script>
</head>

<body>

            <?php include("../topnav.php");?>
      <div id="wrapper">
    
        <!-- Sidebar -->
        <?php include("../sidenav.php");?>
        <!-- /#sidebar-wrapper -->

            <div class="container">
                <form action="sr_proc.php" method="POST">
                <?php
                    $emp_no=$_GET['emp'];
                    $person=$mysqli->query("SELECT faculty_type,concat(p_lname,', ',p_fname,' ',substring(ifnull(p_mname,''),'1','1')) as Name
                    FROM pims_personnel,pims_employment_records
                    WHERE pims_personnel.emp_no=pims_employment_records.emp_no
                    AND pims_employment_records.emp_rec_id=$emp_no");
                    $per=$person->fetch_assoc();
                    
                ?>
                <div class="row">
                    <div class="col-lg-1">
                        <br>
                </div>    
                    <div class="col-lg-10">
                        <h1 class="page-header"> <img class="img-responsive" src="../docs/img/ServiceRecord2.png"></h1>
                        <h3><b><?php echo $per['Name'];?></b><small><a style="float: right;margin-bottom: 5px;" class="btn btn-primary btn-sm" href="sr_view.php?emp=<?php echo $emp_no; ?>">View Records</a></small></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1">
                        <br>
                </div>    
                    <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="row">

                                <div class="col-md-1">

                                <a href="javascript:void(0);" class="add_button"><img style="width:70px;padding-left:10px;padding-top:10px" class="img-responsive" src="../docs/img/addfield3.png"></a>
                                </div> 
                            </div>      
                            <div class="form-group">
                                <div class="field_wrapper">
                                <div class="row">
                                    <div class="col-md-1">
                                        <br>
                                        <input name="emp_rec" type="hidden" value="<?php echo $emp_no; ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label><h6><b>Inclusive date start</b></h6></label> 
                                        <input class="form-control" placeholder="yyyy-mm-dd" name="start[]" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label><h6><b>Inclusive date end</b></h6></label> 
                                        <input class="form-control" placeholder="yyyy-mm-dd" name="end[]" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label><h6><b>Source of Fund<br>&nbsp;</b></h6></label> 
                                        <input class="form-control" placeholder="e.g.,BSP" type="text" name="fund[]" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label><h6><b>Remarks<br>&nbsp;</b></h6></label> 
                                        <input class="form-control" placeholder="e.g.,Promoted" type="text" name="remark[]" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <br>
                                    </div>
                                    <div class="col-md-2">
                                        <label><h6><b>Status</b></h6></label> 
                                        <input class="form-control" placeholder="e.g.,Permanent" type="text" name="stat[]" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label><h6><b>Salary</b></h6></label> 
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">&#8369;</span>
                                            <input class="form-control" placeholder="1000.00" type="number" name="sal[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label><h6><b>Designation&nbsp;</b></h6></label> 
                                        <input class="form-control" placeholder="e.g.,Teacher I" type="text" name="des[]" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label><h6><b>Office Entry&nbsp;</b></h6></label> 
                                        <input class="form-control" placeholder="e.g.,PNHS" type="text" name="office[]" required>
                                    </div>
                                    <div class="col-md-1">
                                        <br>
                                    </div>
                                </div>
                                <hr>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <br>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <button name="sr" type="submit" class="btn btn-primary btn-lg btn-block">Create Record</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <br>
                    </div>
                </div>
                </form>
            </div>
            <br><br><br><br><br><br><br><br>
        <!-- /#page-content-wrapper -->
        <footer class="w3-theme-bd5">
         <div class="container">
            <div class="col-lg-3 col-md-3">
               <h3 class="h3">PNHS</h3>
               <h6>All Rights Reserved &copy; 2018</h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">ADDRESS</h1>
               <h6><b>Pag-asa National Highschool</b><br><span>PNHS Building, Rawis, East Service<br>  Road, Legazpi City, PH 2424</span></h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h3 class="h3">CONTACT US</h3>
               <h6 class="w3-justify">
                  <b>Phone:</b>
                  <span>(+632) 887-2232</span>
                  <br>
                  <b>E-mail:</b> 
                  <span>officialpnhs@pnhs.gov.ph</span>
                  <br>
               </h6>
            </div>
             <div class="col-lg-3 col-md-3">
               <h3 class="h3">FOLLOW US ON:</h3>
                  <a href="#"><i class="fa fa-bullseye w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-phone w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-facebook w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-google-plus w3-xlarge" aria-hidden="true"></i></a>
            </div>
         </div>
      </footer>
    </div>
    <!-- /#wrapper -->

<script src="../js/index.js"></script>
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script> 
<script src="../../../js/metisMenu.min.js"></script>
<script src="../../../js/sb-admin-2.min.js"></script>    
<!-- velocity -->
<script src="../js/velocity.min.js.download"></script>
    <script src="../js/velocity.ui.min.js.download"></script>
<script>// add the animation to the popover
$('a[rel=popover]').popover().click(function(e) {
  e.preventDefault();
  var open = $(this).attr('data-easein');
  if (open == 'shake') {
    $(this).next().velocity('callout.' + open);
  } else if (open == 'pulse') {
    $(this).next().velocity('callout.' + open);
  } else if (open == 'tada') {
    $(this).next().velocity('callout.' + open);
  } else if (open == 'flash') {
    $(this).next().velocity('callout.' + open);
  } else if (open == 'bounce') {
    $(this).next().velocity('callout.' + open);
  } else if (open == 'swing') {
    $(this).next().velocity('callout.' + open);
  } else {
    $(this).next().velocity('transition.' + open);
  }

});

// add the animation to the modal
$(".modal").each(function(index) {
  $(this).on('show.bs.modal', function(e) {
    var open = $(this).attr('data-easein');
    if (open == 'shake') {
      $('.modal-dialog').velocity('callout.' + open);
    } else if (open == 'pulse') {
      $('.modal-dialog').velocity('callout.' + open);
    } else if (open == 'tada') {
      $('.modal-dialog').velocity('callout.' + open);
    } else if (open == 'flash') {
      $('.modal-dialog').velocity('callout.' + open);
    } else if (open == 'bounce') {
      $('.modal-dialog').velocity('callout.' + open);
    } else if (open == 'swing') {
      $('.modal-dialog').velocity('callout.' + open);
    } else {
      $('.modal-dialog').velocity('transition.' + open);
    }

  });
});
//# sourceURL=pen.js
</script>

       
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
            "scrollX": true
        });
    });
</script>
    



</body>

</html>