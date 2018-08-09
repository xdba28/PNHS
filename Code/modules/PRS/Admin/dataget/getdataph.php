<html>
<?php
include('../../connection.php');

if(!empty($_POST["yearph"]))
{	$year = $_POST["yearph"];
	$query= mysqli_query($mysqli,"SELECT  monthname(date_issued) as month, sum(total_ph) as total_ph FROM  prs_report where year(date_issued) ='$year' group by monthname(date_issued) ");
	
	while($row=mysqli_fetch_assoc($query))
	{
		
		$total 	   = $row['total_ph'];
		$total = number_format($total,2);
		$month 	   = $row['month'];
		
	
	?>
	<tr>
	<td><center><a href="philhealthrem.php?month=<?php echo $month?>&&year=<?php echo $year?>" target="_blank"><?php echo $month?></a></option></center></td>
	<td><center>Php. <?php echo $total ?></center></td>	
	</tr>
	<?php
	}
	
}

?>
</html>