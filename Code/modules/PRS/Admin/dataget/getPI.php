<html>
<?php
include('../../connection.php');

if(!empty($_POST["piyear"]))
{	$year = $_POST["piyear"];
	$query= mysqli_query($mysqli,"SELECT  monthname(date_change) as month FROM  prs_setting where year(date_change) ='$year' AND name_setting='PAGIBIG' group by monthname(date_change) ");
	
	while($row=mysqli_fetch_assoc($query))
	{
		
		$month 	   = $row['month'];
	
	?>
	<tr>
	<td><center><a href="sort_month.php?month=<?php echo $month?>&&year=<?php echo $year?>" target="_blank"><?php echo $month?></a></option></center></td>
	
	
	<td>
	<?php $query1 =mysqli_query($mysqli,"SELECT date_change as changes FROM prs_setting where year(date_change) ='$year' AND name_setting='PAGIBIG' AND monthname(date_change)='$month'");
	while ($datechanges = mysqli_fetch_assoc($query1))
	{
		$changes = $datechanges['changes'];
	   // $changes = date("F d, Y h:i:s A");
	?>
	<center><?php echo $changes;?></center>
	<?php }?>

	</td>

	<td>
	<?php $query2 =mysqli_query($mysqli,"SELECT changes as changed FROM prs_setting where year(date_change) ='$year' AND name_setting='PAGIBIG' AND monthname(date_change)='$month'");
	while ($datechanged = mysqli_fetch_assoc($query2))
	{
		$changed = $datechanged['changed'];
	?>
	<center><?php echo $changed; ?></center>
	<?php } ?>
	</td>
	
		</tr>
	<?php
	}
	
}

?>
</html>