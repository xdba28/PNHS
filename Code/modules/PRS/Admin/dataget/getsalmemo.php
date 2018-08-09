

<?php
include('../../connection.php');

if(!empty($_POST["sal_memo_id"]))
{	$salary_memo = $_POST["sal_memo_id"];
	
	
					
					$qry = mysqli_query($mysqli,"select * from  prs_grade ");
					$grade="";
					while ($row=mysqli_fetch_assoc($qry))
					{
						$id    = $row ['grade_id'];
						$grade = $row['grade'];
					
			?>
			
			<tr>
			<td><?php echo $grade?></td>
					
					
					<?php
								$qry1 = mysqli_query($mysqli,"SELECT * FROM prs_salary, prs_grade, prs_salary_memo
													where prs_grade.grade_id=prs_salary.grade_id AND
													prs_salary_memo.sal_memo_id=prs_salary.sal_memo_id
													and prs_salary_memo.sal_memo_id='$salary_memo'
													and prs_grade.grade='$grade'");
								while($row1=mysqli_fetch_assoc($qry1))
								{
										$amount = $row1['amount'];
							
					
					?>
			<?php echo "<td>".$amount."</td>"?>
				
						
							<?php }?>
							
			</tr>
<?php } ?>



<?php } ?>

					