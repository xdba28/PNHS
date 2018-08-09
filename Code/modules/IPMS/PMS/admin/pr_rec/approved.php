<div class="panel-body">



						<table id="featured-datatable1" class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th><center>PR No.</center></th>
                                        <th><center>Personnel</center></th>
                                        <th><center>Department</center></th>
                                        
                                        <th><center>Date Requested</center></th>
                                        <th><center>Est. Total</center></th>
                                        <th><center>Status</th>
                                        <th><center>Action</center></th>
										
									</tr>
								</thead>
								<tbody>
									
								<?php 
									$fetch_pr = mysqli_query($mysqli, "SELECT * FROM pims_personnel, pms_ris, pms_ris_req, pms_pr_con, 	pms_pr WHERE pms_ris.emp_no = pims_personnel.emp_no 
									AND pms_ris.ris_no = pms_ris_req.ris_no 
									AND pms_pr.pr_no = pms_pr_con.pr_no 
									AND pms_ris_req.req_item_id = pms_pr_con.req_item_id
									AND pms_pr.pr_status = 'Approved'")or die(mysqli_error($mysqli));
                                        
									$pr_no_prev = 0;
									while($preq = mysqli_fetch_array($fetch_pr))
									{
										$fetch_items = mysqli_query($mysqli, "SELECT * FROM pms_ris_req WHERE ris_no = '".$preq['ris_no']."'")
										or die(mysqli_error($mysqli));
										$items = '';

										$o=mysqli_query($mysqli, "SELECT dept_name
											FROM pims_personnel, pims_employment_records, pims_department
											WHERE pims_personnel.emp_no = pims_employment_records.emp_No
											AND pims_employment_records.dept_id = pims_department.dept_id
											AND pims_personnel.emp_no = '".$preq['emp_No']."'");
										$no = mysqli_fetch_array($o);
										$dept = $no['dept_name'];
										
										while($item = mysqli_fetch_array($fetch_items))
										{
											$items = $item['req_qty'].' '.$item['req_unit'].' '.$item['req_item'].'<br>'.$items;
										}
										
										if ($pr_no_prev != $preq['pr_no']) {
											echo'
											<tr class="success">
											<td><center>'.$preq['pr_no'].'</center></td>
											<td><center>'.$preq['P_fname'].' '.$preq['P_lname'].'</center></td>
											<td><center>'.$dept.'</center></td>
											
											<td><center>'.$preq['pr_date'].'</center></td>
											<td><center>₱'.$preq['pr_total'].'.00</center></td>
											<td><center>'.$preq['pr_status'].'</center></td>
											<td><center><div class="btn-group" role="group" aria-label="...">
											<a href="../fpdf/PR.php?pr='.$preq['pr_no'].'" class="btn btn-primary"><span class="fa fa-print" title="Print PR"></span> Print PR</a></div></center></td>
											</tr>';
											$pr_no_prev = $preq['pr_no'];
										}
									}
									?>
							
									
								</tbody>
								
							</table>
													
							<?php  ?>

										</div>	