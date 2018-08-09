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

if (isset($_POST['submit1'])) {
	
	
	$ids = array_keys($_POST['salary']);
  foreach ($ids as $index) {
	  
	  
	  $sql =mysqli_query($mysqli,"UPDATE prs_salary 
			SET   amount = '".$_POST['amount'][$index]."'
			WHERE salary_id='".$_POST['salary'][$index]."'	
			") or die ("Error"); 	
							}
	
	
	if($sql){
					echo "<script>swal({ title:'Salary Memo Has Been Updated!',type:'success'}, function(){window.location.href='../../Admin/salarymemo.php'});</script>";
					
				}else{
					echo "<script>swal({ title:'ERROR!',type:'warning'}, function(){window.location.href='../../Admin/salarymemo.php'});</script>";
					
				}
							 }

?>
</body>
</html>

