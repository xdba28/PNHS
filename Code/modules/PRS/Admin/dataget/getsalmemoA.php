

<?php
include('../../connection.php');

if(!empty($_POST["sal_memo_id"]))
{	$salary_memo = $_POST["sal_memo_id"];
	
					
			?>
	
		<form method="post" action="functions/salmemb.php">
			<tr>
			<input hidden name="salarymemotitle" value="<?php echo $salary_memo?>">
			<?php 
					$qry = mysqli_query($mysqli,"select * from  prs_grade ");
					$grade="";
					$grade="";
					while ($row=mysqli_fetch_assoc($qry))
					{
						$id    = $row ['grade_id'];
						$grade = $row['grade'];
					
			?>
			
			<td><?php echo $grade?></td>
					
					
					<?php
								$qry1 = mysqli_query($mysqli,"SELECT * FROM prs_salary, prs_grade, prs_salary_memo
													where prs_grade.grade_id=prs_salary.grade_id AND
													prs_salary_memo.sal_memo_id=prs_salary.sal_memo_id
													and prs_salary_memo.sal_memo_id='$salary_memo'
													and prs_grade.grade='$grade'");
								while($row1=mysqli_fetch_assoc($qry1))
								{
										$steps = $row1['step'];
										$grades = $row1['grade'];
										$memo = $row1['salary_memo'];
										$amount = $row1['amount'];
										$id    = $row1 ['salary_id'];
					
					?>
					<input hidden name="petmalu" value="<?php echo $memo?>">
					<input hidden name="salsteps[]" value="<?php echo $steps?>">
					<input hidden name="salgrade[]" value="<?php echo $grades?>">
					<input hidden name="salmemo[]" value="<?php echo $memo?>">
					<input  hidden  name="id[]" value="<?php echo $id; ?>">
			<td><input value="" name="step[]"  class="form-control"></td>				
						
							<?php }?>
							
			</tr>
			
<?php } ?>

			</form>

<?php } ?>

					
					
					


	

	
	
