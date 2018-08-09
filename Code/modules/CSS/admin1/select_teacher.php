<?php
session_start(); 
include "db_conn.php";
$t_id;
if(!empty($_POST['time_e'])){
	$time_e = $_POST['time_e'];
	$sub_id = $_SESSION['sub'];
	$time_s = $_SESSION['time_s'];
	$sec_id = $_SESSION['sec_id'];

	// if($sub_id==50007){
	// 	$query = mysqli_query($conn, "SELECT DISTINCT pims_employment_records.emp_rec_ID
	// 							FROM css_schedule, pims_employment_records, pims_personnel, css_school_yr
	// 							WHERE pims_employment_records.emp_rec_ID=css_schedule.emp_rec_ID
 //                              	AND pims_employment_records.emp_No=pims_personnel.emp_No
	// 							AND (subject_id=$sub_id OR subject_id = 50005)
	// 							AND css_schedule.SY_ID=css_school_yr.SY_ID AND DAY='regular'
	// 							AND status='used' AND (section_id=$sec_id OR TIME_START='$time_s' AND TIME_END='$time_e')");
	// }
	// else if($sub_id==50013){
	// 	$query = mysqli_query($conn, "SELECT DISTINCT pims_employment_records.emp_rec_ID
	// 							FROM css_schedule, pims_employment_records, pims_personnel, css_school_yr
	// 							WHERE pims_employment_records.emp_rec_ID=css_schedule.emp_rec_ID
 //                              	AND pims_employment_records.emp_No=pims_personnel.emp_No
	// 							AND (subject_id=$sub_id OR subject_id = 50009)
	// 							AND css_schedule.SY_ID=css_school_yr.SY_ID AND DAY='regular'
	// 							AND status='used' AND (section_id=$sec_id OR TIME_START='$time_s' AND TIME_END='$time_e')");
	// }
	// else if($sub_id==50006){
	// 	$query = mysqli_query($conn, "SELECT DISTINCT pims_employment_records.emp_rec_ID
	// 							FROM css_schedule, pims_employment_records, pims_personnel, css_school_yr
	// 							WHERE pims_employment_records.emp_rec_ID=css_schedule.emp_rec_ID
 //                              	AND pims_employment_records.emp_No=pims_personnel.emp_No
	// 							AND css_schedule.SY_ID=css_school_yr.SY_ID AND DAY='regular'
	// 							AND status='used' AND (section_id=$sec_id OR TIME_START='$time_s' AND TIME_END='$time_e')");
	// }
	// else{
		$query = mysqli_query($conn, "SELECT DISTINCT pims_employment_records.emp_rec_ID
								FROM css_schedule, pims_employment_records, pims_personnel, css_school_yr
								WHERE pims_employment_records.emp_rec_ID=css_schedule.emp_rec_ID
                              	AND pims_employment_records.emp_No=pims_personnel.emp_No
								AND css_schedule.SY_ID=css_school_yr.SY_ID 
								AND DAY='regular' AND (section_id=$sec_id OR TIME_START='$time_s' AND TIME_END='$time_e')
								AND status='used'");
	// }

	foreach ($query as $key) {
		$t_id[] = $key['emp_rec_ID'];
	}

	
}


?>


						<div style="overflow-y: scroll;height: 200px; text-align: center;">				
						<table class="tables">			
						<?php 
							if($sub_id==50005){
								$check_sub = mysqli_query($conn, "SELECT * FROM css_schedule, css_school_yr
																WHERE subject_id=50007 AND section_id='$sec_id' AND status='used'");
								if(mysqli_num_rows($check_sub)==0){
									echo '<b>Please add Science schedule first.</b>';
								}
								else{
									echo '<b>Please click save.</b>';
								}
							}
							elseif ($sub_id==50009) {
								$check_sub = mysqli_query($conn, "SELECT * FROM css_schedule, css_school_yr
																WHERE subject_id=50013 AND section_id='$sec_id' AND status='used'");
								if(mysqli_num_rows($check_sub)==0){
									echo '<b>Please add Math schedule first.</b>';
								}
								else{
									echo '<b>Please click save.</b>';
								}
							}
							elseif ($sub_id==50012) {
								$check_sub = mysqli_query($conn, "SELECT * FROM css_schedule, css_school_yr
																WHERE subject_id=50006 AND section_id='$sec_id' AND status='used'");
								if(mysqli_num_rows($check_sub)==0){
									echo '<b>Please add English schedule first.</b>';
								}
								else{
									echo '<b>Please click save.</b>';
								}
							}
							else { ?>
							<thead>
							<td style="text-align:center; width: 50px;"><b>Major</td>
							<td style="text-align:center; width: 50px;"><b>Minor</td>
                            <td style="text-align:center; width: 50px;"><b>Related</td>
						  </thead>

						  
						  <tr>
							<td style="vertical-align: top;">
							<?php

							if($sub_id==50008){
								$teacher = mysqli_query($conn, "SELECT pims_employment_records.emp_rec_ID, P_fname, P_lname FROM css_credentials, pims_employment_records, pims_personnel
									WHERE css_credentials.emp_rec_id=pims_employment_records.emp_rec_ID
									AND pims_employment_records.emp_No=pims_personnel.emp_No
									AND cred_title='Major' AND subject_id=50006");
							}
							else if($sub_id==50010){
								$teacher = mysqli_query($conn, "SELECT pims_employment_records.emp_rec_ID, P_fname, P_lname FROM css_credentials, pims_employment_records, pims_personnel
									WHERE css_credentials.emp_rec_id=pims_employment_records.emp_rec_ID
									AND pims_employment_records.emp_No=pims_personnel.emp_No
									AND cred_title='Major' AND (subject_id=50006 OR subject_id=50004)");
							}
							else{
								$teacher = mysqli_query($conn, "SELECT pims_employment_records.emp_rec_ID, P_fname, P_lname FROM css_credentials, pims_employment_records, pims_personnel
									WHERE css_credentials.emp_rec_id=pims_employment_records.emp_rec_ID
									AND pims_employment_records.emp_No=pims_personnel.emp_No
									AND cred_title='Major' AND subject_id=$sub_id");
							}
							foreach($teacher as $row){
								$teach_str = substr($row['P_fname'], 0, 1).". ".$row['P_lname'];
								$c=0;
								if(!empty($t_id)){
									for($i=0; $i<count($t_id); $i++){
										if($row['emp_rec_ID']==$t_id[$i]){
											$c++;
										}
									}
									if($c==0){
										echo '<input type="checkbox" name="teach[]" value="'.$row['emp_rec_ID'].'">'.$teach_str.'</input>
											<br>';
									}

								}
								else{
									echo '<input type="checkbox" name="teach[]" value="'.$row['emp_rec_ID'].'">'.$teach_str.'</input>
											<br>';
								}
							}
							?>
							</td>
							<td style="vertical-align: top;">
							<?php 
							if($sub_id==50008){
								$teacher = mysqli_query($conn, "SELECT pims_employment_records.emp_rec_ID, P_fname, P_lname FROM css_credentials, pims_employment_records, pims_personnel
									WHERE css_credentials.emp_rec_id=pims_employment_records.emp_rec_ID
									AND pims_employment_records.emp_No=pims_personnel.emp_No
									AND cred_title='Minor' AND subject_id=50006");
							}
							else if($sub_id==50010){
								$teacher = mysqli_query($conn, "SELECT pims_employment_records.emp_rec_ID, P_fname, P_lname FROM css_credentials, pims_employment_records, pims_personnel
									WHERE css_credentials.emp_rec_id=pims_employment_records.emp_rec_ID
									AND pims_employment_records.emp_No=pims_personnel.emp_No
									AND cred_title='Minor' AND (subject_id=50006 OR subject_id=50004)");
							}
							else{
								$teacher = mysqli_query($conn, "SELECT pims_employment_records.emp_rec_ID, P_fname, P_lname FROM css_credentials, pims_employment_records, pims_personnel
									WHERE css_credentials.emp_rec_id=pims_employment_records.emp_rec_ID
									AND pims_employment_records.emp_No=pims_personnel.emp_No
									AND cred_title='Minor' AND subject_id=$sub_id");
							}
							$co = mysqli_num_rows($teacher);
						if($co!=0){
							foreach($teacher as $row){
								$teach_str = substr($row['P_fname'], 0, 1).". ".$row['P_lname'];
								$c=0;
								if(!empty($t_id)){
									for($i=0; $i<count($t_id); $i++){
										if($row['emp_rec_ID']==$t_id[$i]){
											$c++;
										}
									}
									if($c==0){
										echo '<input type="checkbox" name="teach[]" value="'.$row['emp_rec_ID'].'">'.$teach_str.'</input>
											<br>';
									}

								}
								else{
									echo '<input type="checkbox" name="teach[]" value="'.$row['emp_rec_ID'].'">'.$teach_str.'</input>
											<br>';
								}
							}
						}

							?>
							</td>
							<td style="vertical-align: top;">
							<?php 
							if($sub_id==50008){
								$teacher = mysqli_query($conn, "SELECT pims_employment_records.emp_rec_ID, P_fname, P_lname FROM css_credentials, pims_employment_records, pims_personnel
									WHERE css_credentials.emp_rec_id=pims_employment_records.emp_rec_ID
									AND pims_employment_records.emp_No=pims_personnel.emp_No
									AND cred_title='Related' AND subject_id=50006");
							}
							else if($sub_id==50010){
								$teacher = mysqli_query($conn, "SELECT pims_employment_records.emp_rec_ID, P_fname, P_lname FROM css_credentials, pims_employment_records, pims_personnel
									WHERE css_credentials.emp_rec_id=pims_employment_records.emp_rec_ID
									AND pims_employment_records.emp_No=pims_personnel.emp_No
									AND cred_title='Related' AND (subject_id=50006 OR subject_id=50004)");
							}
							else{
								$teacher = mysqli_query($conn, "SELECT pims_employment_records.emp_rec_ID, P_fname, P_lname FROM css_credentials, pims_employment_records, pims_personnel
									WHERE css_credentials.emp_rec_id=pims_employment_records.emp_rec_ID
									AND pims_employment_records.emp_No=pims_personnel.emp_No
									AND cred_title='Related' AND subject_id=$sub_id");
							}
							$co = mysqli_num_rows($teacher);
						if($co!=0){
							foreach($teacher as $row){
								$teach_str = substr($row['P_fname'], 0, 1).". ".$row['P_lname'];
								$c=0;
								if(!empty($t_id)){
									for($i=0; $i<count($t_id); $i++){
										if($row['emp_rec_ID']==$t_id[$i]){
											$c++;
										}
									}
									if($c==0){
										echo '<input type="checkbox" name="teach[]" value="'.$row['emp_rec_ID'].'">'.$teach_str.'</input>
											<br>';
									}

								}
								else{
									echo '<input type="checkbox" name="teach[]" value="'.$row['emp_rec_ID'].'">'.$teach_str.'</input>
											<br>';
								}
							}
						}
							?>
							</td>
						</tr>
						<?php }?>
						</table>
						</div>