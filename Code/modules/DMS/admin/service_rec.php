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
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <script src="../js/sweetalert.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_button'); //Add button selector
		var wrapper = $('.field_wrapper'); //Input field wrapper
		var fieldHTML = '<div class="form-group" ><div><input type="text" data-list="#list" placeholder="John Doe" name="studid[]" class="form-control awesomplete" value=""/></div><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="glyphicon glyphicon-remove">Remove</i></span></a></div>'; //New input field html 
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
                <?php
                    $pers=mysqli_query($mysqli,"SELECT pims_employment_records.emp_rec_id,pims_employment_records.emp_no,concat(p_lname,', ',p_fname,' ',substring(ifnull(p_mname,''),'1','1')) as Name,emp_status,work_stat,role_type,faculty_type,job_title_name 
                    FROM pims_personnel,pims_employment_records,pims_job_title
                    WHERE pims_personnel.emp_no=pims_employment_records.emp_no
                    AND pims_job_title.job_title_code=pims_employment_records.job_title_code
                    AND work_stat!='RETIRED'
                    AND pims_personnel.emp_no NOT IN (SELECT dms_archive.emp_no FROM dms_archive,pims_personnel WHERE pims_personnel.emp_no=dms_archive.emp_no)
                    ORDER by p_lname");
                    
                ?>
                <div class="row">
                    <div class="col-lg-1">
                        <br>
                    </div>
                    <div class="col-lg-10">
                        <h1 class="page-header"> <img class="img-responsive" src="../docs/img/ServiceRecord2.png"></h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-1">
                        <br>
                </div>    
                <div class="col-lg-10">
                    <div class="panel panel-default">
                        <form method="POST"><!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th><center>Name</center></th>
                                            <th><center>Employment Status</center></th>
                                            <th><center>Role</center></th>
                                            <th><center>Job Title</center></th>
                                            <th><center>View</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($emprow=$pers->fetch_assoc()){ ?>
                                        <tr>
                                            <td><center><b><?php echo $emprow['Name']; ?></b></center></td>
                                            <td><center><?php echo $emprow['emp_status']; ?></center></td>
                                            <td><center><?php echo $emprow['faculty_type']; ?></center></td>
                                            <td><center><?php echo $emprow['job_title_name']; ?></center></td>
                                            <td>
                                                <center><a class="btn btn-primary" href="sr_view.php?emp=<?php echo $emprow['emp_rec_id']; ?>">
                                                    <i class="fa fa-eye"></i>
                                                    </a></center>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
                            </div>
                        </form>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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
<script src='../js/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<script src="../js/index.js"></script>
<script src="../../../js/metisMenu.min.js"></script>
<script src="../../../js/sb-admin-2.min.js"></script>    
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script> 
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
        });
    });
</script>
</body>

</html>
