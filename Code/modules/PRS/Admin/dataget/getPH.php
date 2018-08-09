<html>
<?php
include('../../connection.php');

if(!empty($_POST["phyear"]))
{	$year = $_POST["phyear"];
	$query= mysqli_query($mysqli,"SELECT  monthname(change_date) as month FROM  prs_ph_change where year(change_date) ='$year' group by monthname(change_date) ");
	
	while($row=mysqli_fetch_assoc($query))
	{
		
		$month 	   = $row['month'];
	
	?>
	<tr>
	<td><center><option><?php echo $month?></option></center></td>
	
	
	<td>
	<?php $query1 = mysqli_query($mysqli,"SELECT * FROM prs_ph_change where year(change_date) ='$year'  AND monthname(change_date)='$month' group by change_date limit 1 ");
	while ($datechanges = mysqli_fetch_assoc($query1))
	{
		$changes = $datechanges['change_date'];
	   
	?>
	<center><?php echo $changes;?></center>
	<!--center><a href="ph_print.php?month=<!?php echo $month?>&&year=<!?php echo $year?>"><!?php echo $changes;?></a></center-->
	
	<?php }?>

	</td>	
	
	
	
	
		</tr>
	<?php
	}
	
}

?>
</html>