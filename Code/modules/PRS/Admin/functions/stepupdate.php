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

if (isset($_POST['submit3'])) {
	
			 	 $emp_No= sanitise($_POST['emp_id']);
				 $grade= sanitise($_POST['grade']);
				 $step= sanitise($_POST['step']);
					 $sal_id= sanitise($_POST['sal_id']);
				 
				 
				 $qry= mysqli_query ($mysqli,"SELECT * FROM pims_personnel, prs_salary_record
															  where  pims_personnel.emp_No='$emp_No' 
															  AND pims_personnel.emp_No=prs_salary_record.emp_No
                                      ");


					if(mysqli_num_rows($qry) > 0)
					{
					$qry2= mysqli_query($mysqli,"UPDATE prs_salary_record SET salary_id = '$step', grade_id='$grade' where sal_rec_id='$sal_id'");	
					
					echo "<script>swal({ title:'STEP AND GRADE HAS BEEN UPDATED',type:'success'}, function(){window.location.href='../../admin/profile.php?emp_id=".$emp_No."'});</script>";
					
					}
					else
					{
					$qry1= mysqli_query($mysqli,"INSERT INTO prs_salary_record ( salary_id, grade_id, emp_No) values ('$step','$grade','$emp_No')");
					
					echo "<script>swal({ title:'STEP AND GRADE HAS BEED ADDED',type:'success'}, function(){window.location.href='../../admin/profile.php?emp_id=".$emp_No."'});</script>";
					
					}
					
					
				

}
?>
</body>
</html>

