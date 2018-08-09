<html>
<?php
include('../../connection.php');

if(!empty($_POST["memoyear"]))
{	$year = $_POST["memoyear"];
	$query= mysqli_query($mysqli,"SELECT  monthname(date_change) as month FROM  prs_salary_history where year(date_change) ='$year'  group by monthname(date_change) ");
	
	while($row=mysqli_fetch_assoc($query))
	{
		
		$month 	   = $row['month'];
	
	?>
	<tr>
	<td><center><?php echo $month?></center></td>
	
	
	<td>
	<?php $query1 = mysqli_query($mysqli,"SELECT his_sal_memo as memomo FROM prs_salary_history where year(date_change) ='$year'  AND monthname(date_change)='$month' group by his_sal_memo");
	$memomo= "";
	while ($datechanges = mysqli_fetch_assoc($query1))
	{
		$memomo = $datechanges['memomo'];
		
	?>
	<center><a href="salmemprint.php?month=<?php echo $month;?>&&year=<?php echo $year; ?>&&memo=<?php echo $memomo;?>" target="_blank"><?php echo $memomo;?></a></center>
	<?php }?>

	</td>	
	
	<td>
	<?php $query2 = mysqli_query($mysqli,"SELECT date_change as changed FROM prs_salary_history where year(date_change) ='$year'  AND monthname(date_change)='$month' group by date_change limit 1 ");
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