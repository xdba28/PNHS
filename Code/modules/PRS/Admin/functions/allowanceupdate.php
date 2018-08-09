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

 
if(isset($_POST['allowancesubmit'])){
//database connection

					$allowance= sanitise($_POST['allowance']);
				 			  
				 $qry1 = mysqli_query($mysqli,"SELECT * FROM prs_allowance");
				
				$num = mysqli_num_rows($qry1);
				 
				 if($num > 0)
				 {
						$insertup = mysqli_query($mysqli,"INSERT INTO prs_setting(name_setting, changes) VALUES('Allowance', '$allowance')");
					$qry = mysqli_query($mysqli,"UPDATE prs_allowance
												SET prs_allowance.allowance='$allowance'
												") or die("Failed Sql Query");
						
					 if($qry){
					echo "<script>swal({ title:'Allowance Has Been Updated!',type:'success'}, function(){window.location.href='../../Admin/setting.php'});</script>";
					
							}else{
									echo "<script>swal({ title:'ERROR!',type:'warning'}, function(){window.location.href='../../Admin/setting.php'});</script>";
								 }
				} else {
							$insertup1 = mysqli_query($mysqli,"INSERT INTO prs_setting(name_setting, changes) VALUES('Allowance', '$allowance')");
							
							$qry3 =mysqli_query($mysqli," INSERT INTO prs_allowance(allowance) values ('$allowance')
												") or die("Failed Sql Query");
									
						if($qry3){
					echo "<script>swal({ title:'Allowance Has Been Added!',type:'success'}, function(){window.location.href='../../Admin/setting.php'});</script>";
					
										}else{
												echo "<script>swal({ title:'ERROR!',type:'warning'}, function(){window.location.href='../../Admin/setting.php'});</script>";
											 }
							
						}
			     
				 
}
				    

?>						
</body>
</html>		