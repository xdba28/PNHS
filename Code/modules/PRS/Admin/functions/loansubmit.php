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

 
if(isset($_POST['submit'])){
//database connection

								  
				 
			     $emp_No= sanitise($_POST['emp_id']);
				 $loan_name= sanitise($_POST['loanname']);
				 $loan_amount= sanitise($_POST['loanamount']);
				 $start= sanitise($_POST['start']);
				 $end= sanitise($_POST['end']);
				 
						
				// Build example data
			
			
				$ongoing = 'ONGOING';
			
			$qry = mysqli_query($mysqli,"INSERT INTO prs_loan( loan_name, loan_amount, date_start, date_end, loan_status, emp_no) 
								VALUES ('$loan_name', '$loan_amount', '$start', '$end', '$ongoing', '$emp_No')") or die("Failed Sql Query");

				

				
				if($qry){
					
					echo "<script>swal({ title:'".$loan_name." Has Been Added!',type:'success'}, function(){window.location.href='../../admin/profile.php?emp_id=".$emp_No."'});</script>";
				}else{
					echo "<script>swal({ title:'ERROR!',type:'warning'}, function(){window.location.href='../../admin/profile.php?emp_id=".$emp_No."'});</script>";
				}
 
				

}
				
				//header('Location: ../../../profile.php');
				    

?>
</body>
</html>									