<?php include "../connect.php"; 
if($mysqli){
	
	if(!empty($_POST['item_name'])){
	$item=$_POST['item_name'];
	$qty=$_POST['rqst_qty'];
	$unit=$_POST['item_unit'];
    $desc=$_POST['item_des'];
	$risno=$_POST['id'];


	$sql = mysqli_query($mysqli, "UPDATE pms_ris_req SET req_item = '$item', req_desc = '$desc', req_unit = '$unit', req_qty = '$qty'
	WHERE ris_no = '$risno'")
	
	or die("Error: ".mysqli_error($mysqli));	
	$mysqli->commit();
	
			
			echo" <script> alert('Successfuly Updated! '); window.location.href='trans.php' </script>"; 
	}
}
?>
