<?php
include "../connect.php"; 
$id = $_GET['ris_no'];

												if(isset($_POST['btn'])){
													$mysqli->autocommit(FALSE);
													
													$query = mysqli_query($mysqli, "DELETE FROM `pms_ris_req` WHERE ris_no = $id ")
													&&
													$query = mysqli_query($mysqli, "DELETE FROM `pms_ris` WHERE ris_no = $id ")
													
													
													
													or die("Error: ".mysqli_error($mysqli));
						
													$mysqli->commit(); 

													echo "<script>alert('Request Cancelled!'); window.location.href='trans.php'</script>";
                                                }
?>