<html>
<?php
include('../connection.php');

if(!empty($_POST["year"]))
{	$year = $_POST["year"];
	$query= mysqli_query($mysqli,"SELECT  monthname(date_import) as month, count(personnel_id) as total FROM  prs_dtr_rec where year(date_import) ='$year' group by monthname(date_import) ");
	
	while($row=mysqli_fetch_assoc($query))
	{
		
		$total 	   = $row['total'];
		$month 	   = $row['month'];
	
	?>
	<tr class="gradeA">
	<td><center><a href="sort_month.php?month=<?php echo $month?>&&year=<?php echo $year?>" target="_blank"><?php echo $month?></a></option></center></td>
	<td><center><?php echo $total ?></center></td>	
	</tr>
	<?php
	}
	
}

?>
</html>