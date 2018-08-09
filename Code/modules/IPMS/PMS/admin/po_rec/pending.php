<div class="panel-body">



						<table id="featured-datatable2" class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										  <th><center>PO No.</center></th>
                                        <th><center>PR No.</center></th>
                                        <th><center>Personnel</center></th>
                                    
                                        <th><center>Payment Term</center></th>
                                        <th><center>Delivery Term</center></th>
                                        <th><center>Delivery Date</center></th>
                                        <th><center>Total Cost</center></th>
                                        <th><center>Status</th>
                                        <th><center>Action</center></th>
										
									</tr>
								</thead>
								<tbody>
									
								<?php
            
            $poo = mysqli_query($mysqli, "SELECT * FROM pims_personnel, pms_ris, pms_ris_req, pms_pr_con, pms_pr, pms_po_con, pms_po
                                WHERE pms_ris.emp_no = pims_personnel.emp_no 
                                AND pms_ris.ris_no = pms_ris_req.ris_no 
                                AND pms_pr.pr_no = pms_pr_con.pr_no 
                                AND pms_ris_req.req_item_id = pms_pr_con.req_item_id
                                AND pms_pr_con.pr_id = pms_po_con.pr_id
                                AND pms_po_con.po_no = pms_po.po_no 
                                AND pms_po.po_no = pms_po.po_no
                                AND pms_po.po_status = 'Pending' group by pms_po.po_no ");

            ?>
            <?php while($po = mysqli_fetch_array($poo)){ ?>
                  

                                        
                                     
                                        <tr class="info">
                                        <td><center><?php echo ($po['po_no'])?></center></td>
                                        <td><center><?php echo ($po['pr_no'])?></center></td>
                                        <td><center><?php echo ($po['P_fname'].' '.$po['P_lname'])?></center></td>
                                    
                                        <td><center><?php echo ($po['payment_term'])?></center></td>
                                        <td><center><?php echo ($po['delivery_term'])?></center></td>
                                        <td><center><?php echo ($po['delivery_date'])?></center></td>
                                        <td><center><?php echo ($po['po_total'])?></center></td>
                                        <td><center><?php echo ($po['po_status'])?></center></td>
                                        <td><center><div class="btn-group" role="group" aria-label="...">
                                        <a href="../fpdf/purchase_order.php?po=<?php echo $po['po_no'];?>" class="btn btn-primary"><span class="fa fa-print" title="Print PO"></span> Print PO</a></div></center></td>
                                        </tr>
                                        <?php }  ?>
									
								</tbody>
								
							</table>
													
							<?php  ?>

										</div>	