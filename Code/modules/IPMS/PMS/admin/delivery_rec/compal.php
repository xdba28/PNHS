<div class="panel-body">


						<table id="featured-datatable" class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th><center>Expected Delivery Date</th>
                                        <th><center>Received Date</th>
                                        <th><center>Supplier</th>
                                        <th><center>Expected Item</th>
                                        <th><center>Delivery Status</th>
                                        <th><center>Remarks</th>
										
									</tr>
								</thead>
								<tbody>
									
								 <?php 
                $sql = mysqli_query($mysqli, "SELECT distinct * FROM pms_iar, pms_iar_con, pms_po_con, pms_pr_con, pms_ris_req, pms_ris, pms_po, pms_supplier
                    WHERE pms_iar_con.iar_no = pms_iar.iar_no
                    AND pms_iar_con.po_id = pms_po_con.po_id
                    AND pms_pr_con.pr_id = pms_po_con.pr_id
                    AND pms_pr_con.req_item_id = pms_ris_req.req_item_id
                    AND pms_ris.ris_no = pms_ris_req.ris_no
                    AND pms_po.po_no = pms_po_con.po_no
                    AND pms_supplier.company_id = pms_po.company_id
                    ")
                or die("Error: ".mysqli_error($mysqli));

                  $iar_no_prev = 0;                    
                    while($row = mysqli_fetch_array($sql))
                    {
                        $fetch_items = mysqli_query($mysqli, "SELECT distinct * FROM pms_iar, pms_iar_con, pms_po_con, pms_pr_con, pms_ris_req, pms_ris, pms_po, pms_supplier
                    WHERE pms_iar_con.iar_no = pms_iar.iar_no
                    AND pms_iar_con.po_id = pms_po_con.po_id
                    AND pms_pr_con.pr_id = pms_po_con.pr_id
                    AND pms_pr_con.req_item_id = pms_ris_req.req_item_id
                    AND pms_ris.ris_no = pms_ris_req.ris_no
                    AND pms_po.po_no = pms_po_con.po_no
                    AND pms_supplier.company_id = pms_po.company_id
                    AND pms_iar.iar_no = '".$row['iar_no']."'")
                            or die(mysqli_error($mysqli));
                            $items = '';
                            while($item = mysqli_fetch_array($fetch_items))
                            {
                            $items = $item['received_qty'].' '.$item['req_unit'].' '.$item['req_desc'].' '.$item['req_item'].'<br>'.$items;
                            }
                            if ($row['next_del_date'] == '0000-00-00' && $row['status'] == 'NOT COMPLETE') {
                                if($row['req_date'] == $row['req_date']){
                                    $remarks = 'Ontime';
                                }
                                else {
                                    $remarks = 'Delayed';
                                }
                                
                                if ($iar_no_prev != $row['iar_no']) {
                                    echo'
                                    <tr class="">
                                    <td><center>'.$row['delivery_date'].'</center></td>
                                    <td><center>'.$row['received_date'].'</center></td>
                                    <td><center>'.$row['company_name'].'</center></td>
                                    <td><center>'.$items.'</center></td>
                                    <td><center>'.$row['iar_status'].'</center></td>
                                    <td><center>'.$remarks.'</center></td>
                                    </tr>';
                                    $iar_no_prev = $row['iar_no'];
                                    }
                            }
                            if ($row['next_del_date'] == '0000-00-00' && $row['status'] == 'COMPLETE') {
                                $fetch_nxt_del_date = $row['delivery_date'];
                                if($fetch_nxt_del_date == $row['received_date']){
                                    $remarks = 'Ontime';
                                }

                                else {
                                    $remarks = 'Delayed';
                                }
                                
                                if ($iar_no_prev != $row['iar_no']) {
                                    echo'
                                    <tr class="">
                                    <td><center>'.$fetch_nxt_del_date.'</center></td>
                                    <td><center>'.$row['received_date'].'</center></td>
                                    <td><center>'.$row['company_name'].'</center></td>
                                    <td><center>'.$items.'</center></td>
                                    <td><center>'.$row['iar_status'].'</center></td>
                                    <td><center>'.$remarks.'</center></td>
                                    </tr>';
                                    $iar_no_prev = $row['iar_no'];
                                    }
                            }
                            else {
                                if ($iar_no_prev != $row['iar_no']) {
                                    if($row['req_date'] == $row['received_date']){
                                        $remarks = 'Ontime';
                                    }
                                    else {
                                        $remarks = 'Delayed';
                                    }                                   
                                    $fetch_nxt_del_date = $row['next_del_date'];
                                    echo'
                                    <tr class="">
                                    <td><center>'.$fetch_nxt_del_date .'</center></td>
                                    <td><center>'.$row['received_date'].'</center></td>
                                    <td><center>'.$row['company_name'].'</center></td>
                                    <td><center>'.$items.'</center></td>
                                    <td><center>'.$row['iar_status'].'</center></td>
                                    <td><center>'.$remarks.'</center></td>
                                    </tr>';
                                    $iar_no_prev = $row['iar_no'];
                                    }
                            }
                    }
                    ?>							
									
								</tbody>
								
							</table>
													
							<?php  ?>

										</div>	
										
										