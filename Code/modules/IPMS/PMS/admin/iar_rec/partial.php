<div class="panel-body">



						<table id="featured-datatable2" class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										  <th><center>IAR No.</center></th>
                                        <th><center>PO No.</center></th>
                                        <th><center>Date of Delivery</center></th>
                                        <th><center>Date of Inspection</center></th>
                                        <th><center>Status</th>
                                        <th><center>Action</center></th>
										
									</tr>
								</thead>
								<tbody>
									
								 <?php 
                                      $fetch_iar = mysqli_query($mysqli, "SELECT DISTINCT pms_iar.iar_no, pms_po.po_no, pms_iar.received_date, pms_iar.ins_date, pms_iar.iar_status FROM pms_iar, pms_iar_con, pms_po, pms_po_con
                                      WHERE pms_iar_con.po_id = pms_po_con.po_id
                                      AND pms_po.po_no = pms_po_con.po_no
                                      AND pms_iar.iar_no = pms_iar_con.iar_no
									  and pms_iar.iar_status = 'Partial'
									  order by pms_iar.iar_no
									  ")
                                      or die(mysqli_error($mysqli));
                                        
                                      $iar_no_prev = 0;      
                                      while($preq = mysqli_fetch_array($fetch_iar))
                                      {
										
                                        if ($iar_no_prev != $preq['iar_no']) {
											echo'
											<tr class="warning">
											<td><center>'.$preq['iar_no'].'</center></td>
											<td><center>'.$preq['po_no'].'</center></td>
											<td><center>'.$preq['received_date'].'</center></td>
											<td><center>'.$preq['ins_date'].'</center></td>
											<td><center>'.$preq['iar_status'].'</center></td>
											<td><center><div class="btn-group" role="group" aria-label="...">
											<a href="../fpdf/IAR1.php?iar='.$preq['iar_no'].'" class="btn btn-primary"><span class="fa fa-print" title="Print IAR"></span> Print IAR</a></div></center></td>
											</tr>';
											$iar_no_prev = $preq['iar_no'];
										}
                                      }
                                      ?>
									
								</tbody>
								
							</table>
													
							<?php  ?>

										</div>	