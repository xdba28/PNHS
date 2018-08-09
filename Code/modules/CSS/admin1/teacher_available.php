<?php
session_start(); 
include "db_conn.php";
	echo $_SESSION['time_select'];
if(!empty($_SESSION['time_select'])){
	echo $time_start = $_POST['time'];
	$teacher = mysqli_query($conn, "SELECT *
									FROM teacher, subject, department
									WHERE teacher.DEPT_ID = department.DEPT_ID
									AND subject.DEPT_ID = department.DEPT_ID
									AND SUBJ_ID = $sub_id");
}
else{
	$teacher = mysqli_query($conn, "SELECT * FROM teacher WHERE TEACHER_ID=999999");
}
if($_POST['sub_id']==50010){
	$teacher = mysqli_query($conn, "SELECT * FROM teacher WHERE TEACHER_ID != 0");
}

?>


						<div style="overflow-y: scroll;height: 200px; text-align: center;">				
						<table class="tables">			
							<thead>
							<td style="text-align:center; width: 50px;"><b>Major</td>
							<td style="text-align:center; width: 50px;"><b>Minor</td>
                            <td style="text-align:center; width: 50px;"><b>Related</td>
						  </thead>
						  <tr>
							<td>
							<?php foreach($teacher as $row){
							echo '<input type="checkbox" name="teach[]" value="'.$row['TEACHER_ID'].'">'.$row['TEACHER_NAME'].'</input>
							<br>';
							}
							?>
							</td>
							<td>
							<?php foreach($teacher as $row){
							echo '<input type="checkbox" name="teach[]" value="'.$row['TEACHER_ID'].'">'.$row['TEACHER_NAME'].'</input>
							<br>';
							}
							?>
							</td>
							<td>
							<?php foreach($teacher as $row){
							echo '<input type="checkbox" name="teach[]" value="'.$row['TEACHER_ID'].'">'.$row['TEACHER_NAME'].'</input>
							<br>';
							}
							?>
							</td>
						</tr>
						</table>
						</div>