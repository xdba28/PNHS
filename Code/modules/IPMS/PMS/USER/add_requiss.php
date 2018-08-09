<?php 
include "connect.php";

$name = $_REQUEST['name'];

$sql = mysqli_query($mysqli, "SELECT * from pms_item where item_name = '$name'") or die("ERROR : " . mysqli_error($mysqli));
$stat = mysqli_num_rows($sql);

if($stat!=0){
while($row = mysqli_fetch_array($sql)){
	$a[] = $row['item_name'];
}
}else{
	$a[] = "Bond Paper";
}

$hint = "";

if($name !== ""){
	$name = strtolower($name);
	$len = strlen($name);
	foreach($a as $lol){
		if(stristr($name,substr($lol, 0 ,$len))){
			if($hint === ""){
				$hint = $lol;
			}else {
				$hint .= ", $lol";
			}
		}
	}

}

echo $hint === "" ? "no suggestion" : $hint;

?>