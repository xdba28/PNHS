<html>
<?php
include('../../connection.php');

if(!empty($_POST["gsisyear"]))
{	$year = $_POST["gsisyear"];
	$query= mysqli_query($mysqli,"SELECT  monthname(date_change) as month FROM  prs_setting where year(date_change) ='$year' AND name_setting='GSIS' group by monthname(date_change) ");
	
	while($row=mysqli_fetch_assoc($query))
	{
		
		$month 	   = $row['month'];
	
	?>
	<tr>
	<td><center><?php echo $month?></center></td>
	
	
	<td>
	<?php $query1 =mysqli_query($mysqli,"SELECT date_change as changes FROM prs_setting where year(date_change) ='$year' AND name_setting='GSIS' AND monthname(date_change)='$month'");
	while ($datechanges = mysqli_fetch_assoc($query1))
	{
		$changes = $datechanges['changes'];
	
	?>
	<center><?php echo $changes;?></center>
	<?php }?>

	</td>	
	
	<td>
	<?php $query2 =mysqli_query($mysqli,"SELECT changes as changed FROM prs_setting where year(date_change) ='$year' AND name_setting='GSIS' AND monthname(date_change)='$month'");
	while ($datechanged = mysqli_fetch_assoc($query2))
	{
		$changed = $datechanged['changed'];
	?>
	<center><b><?php echo $changed; ?>%</b></center>
	<?php } ?>
	</td>
	
	
		</tr>
	<?php
	}
	
}

?>
</html>