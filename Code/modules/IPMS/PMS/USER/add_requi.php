<?php
include "connect.php";

if(!empty($_GET['name'])){
	$item = $_GET['name'];
	$desc = $_GET['desc'];
	$unit = $_GET['unit'];
	
	$query = mysqli_query($mysqli, "INSERT INTO `pms_item` (`item_id`, `item_name`, `item_des`, `item_unit`, `status`) VALUES ('','$item','$desc','$unit','For Procurement')") or die("Error : " . mysqli_error($mysqli));
	
	echo "<script>alert('Item Requested'); location.href='requi.php';</script>";
}
?>