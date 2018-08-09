
<?php
include "connect.php";

    if(!empty($_GET['item_id'])){ 
	$item = $_GET['item_id'];
	$qty = $_GET['qty'];
	$sample_ris = 1;
	$count = count($item);
	$x =0;
	for($i=0;$i<$count;$i++){
	$sql = mysqli_query($mysqli, "INSERT INTO `class_db`.`pms_ris_request`(`trans_id`, `item_id`, `ris_no`, `rqst_qty`, `iss_qty`) VALUES ('',$item[$i],$sample_ris,$qty[$i]") or die("Error: ".mysqli_error($mysqli));
			echo" <script> alert('Supplier Details Added '); window.location.href='supplier.php' </script>";;
	while(mysqli_fetch_array($sql))
	{

 } 
 
} 
}
?>
