<html>
<?php
include('../../connection.php');

if(!empty($_POST["taxyear"]))
{	$year = $_POST["taxyear"];

	$query= mysqli_query($mysqli,"SELECT  monthname(tax_change) as month FROM  prs_tax_change where year(tax_change) ='$year'  group by monthname(tax_change) ");
	
	while($row=mysqli_fetch_assoc($query))
	{
		
		$month 	   = $row['month'];
	
	?>
	<tr>
	<td><center><?php echo $month?></center></td>
	
	<td>
	<?php $query1 = mysqli_query($mysqli,"SELECT tax_change as changes FROM prs_tax_change where year(tax_change) ='$year' AND monthname(tax_change)='$month' group by tax_change ");
	while ($datechanges = mysqli_fetch_assoc($query1))
	{
		$changes = $datechanges['changes'];
		
	?>
	<center><?php echo $changes;?></center>
	
	<!--center><a href="taxprint.php?month=<!?php echo $month;?>&&year=<!?php echo $year;?>" target="_blank"><!?php echo $changes;?></a></center-->
	
	<?php }?>

	</td>	
	
		</tr>
	<?php
	}
	
}

?>
</html>