<?php
include "../connect.php"; 
$id = $_GET['ris_no'];

												if(isset($_POST['btn1'])){
													$mysqli->autocommit(FALSE);
													
													$ris=mysqli_query($mysqli,"UPDATE pms_ris SET emp_no='$emp', remarks=NULL, req_date='$date', req_status='Pending', reason='$reason', ris_seen='0' where ris_no = $id");
													&&
													$req=mysqli_query($mysqli,"UPDATE pms_ris_req SET ris_no='$id', req_item='$item[$x]', req_desc='$desc[$x]', req_qty='$qty[$x]', req_unit='$unit[$x]' where ris_no = $id");
													
													
													
													or die("Error: ".mysqli_error($mysqli));
						
													$mysqli->commit(); 

													echo "<script>alert('Request Cancelled!'); window.location.href='trans.php'</script>";
                                                }
?>

 