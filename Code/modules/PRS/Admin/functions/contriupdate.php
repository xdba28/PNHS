<html>
<head>
 <link rel="stylesheet" href="../../css/sweetalert.css">
 <script src="../../jquery/jquery.min.js"></script>
 <script src="../../js/sweetalert-dev.js"></script>
</head>
<body>
<?php
 
 include('../../connection.php');
 include('../../sanitise.php');
 
if(isset($_POST['submit1'])){
//database connection

				 $gsis= sanitise($_POST['gsis']);
				 $pi= sanitise($_POST['pi']);
				 $gsis_id= sanitise($_POST['gsis_id']);
				 $pagibig_id= sanitise($_POST['pagibig_id']);
				 
				  $qry = mysqli_query($mysqli,"SELECT prs_gsis.gsis_percentage as percentage, prs_pagibig.pi_amount as amount FROM prs_gsis, prs_pagibig");
				  $num = mysqli_num_rows($qry);
	
				  if($num > 0)
				  {
					  $qry = mysqli_query($mysqli,"UPDATE prs_pagibig, prs_gsis
						  SET prs_pagibig.pi_amount='$pi', prs_gsis.gsis_percentage='$gsis'
                          where prs_pagibig.pagibig_id = '$pagibig_id' AND prs_gsis.gsis_id='$gsis_id'
						") or die("Failed Sql Query");
					  
					  $insertup1 = mysqli_query($mysqli,"INSERT INTO prs_setting(name_setting, changes) VALUES('GSIS', '$gsis')");
					  $insertup2 = mysqli_query($mysqli,"INSERT INTO prs_setting(name_setting, changes) VALUES('PAGIBIG', '$pi')");
					  
				  

				if($qry){
					echo "<script>swal({ title:'Contribution Has Been Updated!',type:'success'}, function(){window.location.href='../../Admin/setting.php'});</script>";
					
				}else{
					echo "<script>swal('Error!'); </script>";
				     }
 
				  } else {
					  
							
					  $insertup3 = mysqli_query($mysqli,"INSERT INTO prs_setting(name_setting, changes) VALUES('GSIS', '$gsis')");
					  
					  $insertup4 = mysqli_query($mysqli,"INSERT INTO prs_setting(name_setting, changes) VALUES('PAGIBIG', '$pi')");
					  
					       $qry1 = mysqli_query($mysqli,"INSERT INTO prs_gsis(gsis_percentage) values('$gsis')
												");
						   $qry2 = mysqli_query($mysqli,"INSERT INTO prs_pagibig(pi_amount) values('$pi')
												") or die("Failed Sql Query");
							
							if($qry2){
								echo "<script>swal({ title:'Contribution Has Been Added!',type:'success'}, function(){window.location.href='../../Admin/setting.php'});</script>";
								}else{
									echo "<script>swal({ title:'ERROR!',type:'warning'}, function(){window.location.href='../../Admin/setting.php'});</script>";
								 }
			
				}
				
				 
				

}
				
				//header('Location: ../../../profile.php');
				    

?>			
</body>
</html>			