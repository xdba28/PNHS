<?php
 include "../connect.php"; 
if($mysqli){
	if(!empty($_POST['company_name'])){
			// $company_id = $_POST['company_id']
             $company_name = $_POST['company_name'];
             $sup_address = $_POST['sup_address'];
             $sup_contact = $_POST['sup_contact'];
             $supp_status = $_POST['supp_status'];
       



	$query1 = mysqli_query($mysqli, "LOCK TABLE pms_po, pms_supplier WRITE");
	$query2 = mysqli_query($mysqli, "START TRANSACTION");
	$query2 = mysqli_query($mysqli, "SET AUTOCOMMIT = 0");
	$query = mysqli_query($mysqli, "INSERT INTO `class_db`.`pms_supplier` ( `company_name`, `sup_address`, `sup_contact`,`supp_status`) VALUES('$company_name', '$sup_address','$sup_contact','$supp_status')") or die("Error: ".mysqli_error($mysqli));

	if($query){

	$query2 = mysqli_query($mysqli, "COMMIT");
			echo" <script> alert('Supplier Added '); window.location.href='po_make.php' </script>";
	}
	else{
	$query2 = mysqli_query($mysqli, "ROLLBACK");
			echo "<script> alert('Error'); window.location.href='po_make.php' </script>";
		}

	$query1 = mysqli_query($conn, "UNLOCK TABLES");
	}	
}
?>