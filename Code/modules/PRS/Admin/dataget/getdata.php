<html>
<?php
include("../../connection.php");

if(!empty($_POST["grade_id"]))
{	$grade_id = $_POST["grade_id"];
	
	$saldate = mysqli_query($mysqli,"SELECT * FROM prs_setting where special_attribute='Salary Memo' group by date_change DESC LIMIT 1 ");
										$saldaterow = mysqli_fetch_assoc($saldate);
											$changes = $saldaterow['changes'];
											
	$query= mysqli_query($mysqli,"SELECT * FROM prs_salary where grade_id = '$grade_id'  AND sal_memo_id='$changes'");
	
	while($row=mysqli_fetch_assoc($query))
	{
		
		$salary_id = $row['salary_id'];
		$step 	   = $row['step'];
	
	?>
	
	<option value="<?php echo $salary_id?>"><?php echo $step?></option>
		
	<?php
	}
	
}

?>
</html>