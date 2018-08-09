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

 
if(isset($_POST['submitmarried'])){
//database connection

				 $married= sanitise($_POST['civil']);
				 $reg= sanitise($_POST['reg']);
		     	 $dependent= sanitise($_POST['dependent']);
				 $spouse= sanitise($_POST['spouse']);
				 $career= sanitise($_POST['career']);
				 $q1= sanitise($_POST['q1']);
				 $q2= sanitise($_POST['q2']);
				 $emp_No= sanitise($_POST['emp_No']);
				 
				 
   				
				$check = mysqli_query($mysqli,"SELECT count(prs_add_info.emp_No) as count FROM  prs_add_info , pims_personnel where pims_personnel.emp_NO=prs_add_info.emp_No and pims_personnel.emp_No='$emp_No'");
				$checkrow = mysqli_fetch_assoc($check);
				$count = $checkrow['count'];
				
				
			if($count == 0)
				{
					$insert = mysqli_query($mysqli,"INSERT INTO prs_add_info (spouse_name, career_status, register, no_of_dependents, Q1, Q2, emp_No, civil_id ) values ('$spouse','$career','$reg','$dependent', '$q1', '$q2','$emp_No', '$married')")or die ("Error"); 
						
						echo "<script>swal({ title:'Additional Info. has been inserted!',type:'success'}, function(){window.location.href='../../admin/profile.php?emp_id=".$emp_No."'});</script>";
					
				}
				else
				{
					$update = mysqli_query($mysqli,"UPDATE prs_add_info set prs_add_info.spouse_name='$spouse',prs_add_info.career_status='$career', prs_add_info.register = '$reg',prs_add_info.no_of_dependents = '$dependent', prs_add_info.Q1= $q1', prs_add_info.Q2='$q2', prs_add_info.civil_id='$married' ");
					
						echo "<script>swal({ title:'Additional Info. has been updated!',type:'success'}, function(){window.location.href='../../admin/profile.php?emp_id=".$emp_No."'});</script>";
				}
					
			    
				
}
				
				//header('Location: ../../../profile.php');
				    

?>			
</body>
</html>						