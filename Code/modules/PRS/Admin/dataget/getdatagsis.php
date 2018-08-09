<html>
<?php
include('../../connection.php');

if(!empty($_POST["yeargsis"]))
{	$year = $_POST["yeargsis"];
	$query= mysqli_query($mysqli,"SELECT  monthname(date_issued) as month, sum(total_gsis) as total_net FROM  prs_report where year(date_issued) ='$year' group by monthname(date_issued) ");
	
	while($row=mysqli_fetch_assoc($query))
	{
		
		$total 	   = $row['total_net'];
		$total = number_format($total,2);
		$month 	   = $row['month'];
		
	
	?>
	<tr>
	<td><center><a href="gsisrem.php?month=<?php echo $month?>&&year=<?php echo $year?>" target="_blank"><?php echo $month?></a></option></center></td>
	<td><center>Php. <?php echo $total ?></center></td>	
	</tr>
	<?php
	}
	
}

?>
</html>