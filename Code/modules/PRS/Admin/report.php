<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../func.php");
    include('../connection.php');
    include("../sesh.php");
		//Get Info Contribution
	$contriget = mysqli_query($mysqli,"SELECT prs_gsis.gsis_percentage as percentage, prs_gsis.gsis_id as gsis_id, prs_pagibig.pagibig_id as pagibig_id ,prs_pagibig.pi_amount as amount FROM prs_gsis, prs_pagibig");
	$contcount = mysqli_num_rows($contriget);
	$controw=mysqli_fetch_assoc($contriget);
	$percentage = $controw['percentage'];
	$amount = $controw['amount'];
	$gsis_id = $controw['gsis_id'];
	$pagibig_id = $controw['pagibig_id'];
	
	$per = "%";

    
?>
            <?php include("../include/headlink.php");?>
<body>

            <?php include("../include/topnav.php");?>
      <div id="wrapper">
    
        <!-- Sidebar -->
        <?php include("../include/sidenav.php");?>
        <!-- /#sidebar-wrapper -->

           
			  <div class="container">
				<!--BODY CONTENT START--><br><br><br><br>
				 <div class="container-fluid" style="height:700px;max-width:100%;margin-right:20px;margin-left:20px;margin-bottom:10px">
        
			<div class="row">
		<div class="col-lg-12">
		<h3 class="page-header"><img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/report1.png" width="46px"><font face="helvetica" size="6px"><b>REPORTS</b></font></h3>
	 		</div>
			</div>


                <!--======== CONTENT STARTS HERE=============-->			
			
				 <div class="col-lg-12">
			 
				<div class="panel panel-default" style="width:700px; float: left; position: static">
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#allowance" data-toggle="tab"><b>Allowance</b></a>
                                </li>
                                <li><a href="#gsis" data-toggle="tab"><b>GSIS</b></a>
                                </li>
                                <li><a href="#pagibig" data-toggle="tab"><b>PAGIBIG</b></a>
                                </li>
                                <li><a href="#philhealth" data-toggle="tab"><b>PhilHealth</b></a>
                                </li>
								<li><a href="#salarymem" data-toggle="tab"><b>Salary Memo</b></a>
                                </li>
								<li><a href="#tax" data-toggle="tab"><b>Tax (BIR)</b></a></li> 
								<li><a href="#payroll" data-toggle="tab"><b>Payroll</b></a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
							
							 <!-- Allowance Tab -->
                                    
                                <div class="tab-pane fade in active" id="allowance">
								
								<h3 class="page-header"><i class="fa fa-money" aria-hidden="true"></i>&nbsp Allowance</h3>	
							<div class="panel1">
                            <div style="width: 50%;">
						   <label class="col-sm-4 control-label"><font face="helvetica" size="5px"><b>YEAR:</b></font></label>
										<div class="form-group input-group">
										
								<select  onChange="getAllowance(this.value)" class="form-control" required>
								<option>Select Year</option>
								<?php 
								$allowanceselect = mysqli_query($mysqli,"SELECT  year(date_change) as allowanceyear, setting_id as id FROM  prs_setting where name_setting = 'Allowance'  group by year(date_change)");
								
								while($allowancerow = mysqli_fetch_assoc($allowanceselect))
								{
								  
								   $allyear = $allowancerow['allowanceyear'];
								?>
								<option value="<?php echo $allyear; ?>"><?php echo $allyear; ?></option>
								<?php } ?>
								</select>
										</div>
							</div>
							</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Modification Date</th>
										<th>CHANGES</th>
                                    </tr>
                                </thead>
                                <tbody id="allowance_list">
                                    <tr  class="gradeA">
                                        <td></td>
                                        <td></td>
										<td></td>
                                    </tr>
                                    </tbody>
                            </table>
							</div>
							
                                </div>
								<!--  End Allowance Tab -->
								
								 <!-- GSIS Tab -->
								 
                                <div class="tab-pane fade" id="gsis">
								
                                    <h3 class="page-header"><i class="fa fa-money" aria-hidden="true"></i>&nbsp GSIS</h3>	
							
							
							
							
							<ul class="nav nav-tabs">
                                 
								<li class="active"><a href="#GSISREMIT" data-toggle="tab" style="font-size:20px"><b>Remittance</b></a>
                                </li>
                                <li ><a href="#GSISCHANGE" data-toggle="tab" style="font-size:20px"><b>Data Changes</b></a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            
						<div class="tab-content">
							<div class="tab-pane fade in active" id="GSISREMIT">
							
							<div class="panel1">  
							<div align="left" style="width: 50%;">
						   <label class="col-sm-4 control-label"><font face="helvetica" size="5px"><b>YEAR:</b></font></label> 
										<div class="form-group input-group">
										
									<select  id="year_list" onChange="getREMGSIS(this.value)" class="form-control" required>
									<option>Select Year</option>
								<?php
									$payselect= mysqli_query($mysqli,"SELECT year(date_issued) as yeargsis FROM  prs_report group by year(date_issued)"); 
								 while($payrollrow=mysqli_fetch_assoc($payselect))
								 {	 
									 $yeargsis = $payrollrow['yeargsis'];

									?>
								
								<option value="<?php echo $yeargsis?>"><?php echo $yeargsis ?></option>
								
								<?php } ?>
									</select>
										</div>
							</div>  
							</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example7">
                                <thead>
                                    <tr>
                                        <th><center>Month</center></th>
                                        <th><center>Total Remmited Amount</center></th>
                                    </tr>
                                </thead>
                                <tbody id="GSISrem" >
                                    <tr class="gradeA" >
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
							</div>
							
							<!---Table End--->
							</div>
								<!--GSIS CHANGES-->
								<div class="tab-pane fade" id="GSISCHANGE">
							<div class="panel1">
                            <div style="width: 50%;">
						   <label class="col-sm-4 control-label"><font face="helvetica" size="5px"><b>YEAR:</b></font></label>
										<div class="form-group input-group">
										
								<select  onChange="getGSIS(this.value)" class="form-control" required>
								<option>Select Year</option>
								<?php 
								$gsisselect = mysqli_query($mysqli,"SELECT  year(date_change) as gsisyear, setting_id as id FROM  prs_setting where name_setting = 'GSIS'  group by year(date_change)");
								
								while($gsisrow = mysqli_fetch_assoc($gsisselect))
								{
								  
								   $gsisyear = $gsisrow['gsisyear'];
								?>
								<option value="<?php echo $gsisyear; ?>"><?php echo $gsisyear; ?></option>
								<?php } ?>
								</select>
								
										</div>
							</div>
							</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Modification Date</th>
										<th>Changes</th>
                                    </tr>
                                </thead>
                                <tbody id="gsis_list">
                                    <tr class="gradeA" >
                                        <td></td>
                                        <td></td>
										<td></td>
                                    </tr>
                                    </tbody>
                            </table>
							</div>
							
							
								</div>
								
								
							</div>
                                </div>
								
								<!-- End GSIS Tab -->
								
								<!-- PAGIBIG Tab -->
								
                                <div class="tab-pane fade" id="pagibig">
								    <h3 class="page-header"><i class="fa fa-money" aria-hidden="true"></i>&nbsp PAGIBIG</h3>	
								<ul class="nav nav-tabs">
									<li class="active"><a href="#PIREMIT" data-toggle="tab" style="font-size:20px"><b>Remittance</b></a>
									</li>
									<li ><a href="#PICHANGE" data-toggle="tab" style="font-size:20px"><b>Data Changes</b></a>
									</li>
								</ul>

                            <!-- Tab panes -->
                            
							<div class="tab-content">
								
							<div class="tab-pane fade in active" id="PIREMIT">
						<div class="panel1">  
							<div align="left" style="width: 50%;">
						   <label class="col-sm-4 control-label"><font face="helvetica" size="5px"><b>YEAR:</b></font></label> 
										<div class="form-group input-group">
										
									<select  id="year_list" onChange="getREMPI(this.value)" class="form-control" required>
									<option>Select Year</option>
								<?php
									$payselect= mysqli_query($mysqli,"SELECT year(date_issued) as yearpi FROM  prs_report group by year(date_issued)"); 
								 while($payrollrow=mysqli_fetch_assoc($payselect))
								 {	 
									 $yearpi = $payrollrow['yearpi'];

									?>
								
								<option value="<?php echo $yearpi?>"><?php echo $yearpi ?></option>
								
								<?php } ?>
									</select>
										</div>
							</div>  
							</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example8">
                                <thead>
                                    <tr>
                                        <th><center>Month</center></th>
                                        <th><center>Total Remmited Amount</center></th>
                                    </tr>
                                </thead>
                                <tbody id="PIrem" >
                                    <tr class="gradeA" >
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
							</div>
							
							
							</div><!--PI Remittance END-->
							
							 <div class="tab-pane fade" id="PICHANGE">
						<div class="panel1">
                            <div style="width: 50%;">
						   <label class="col-sm-4 control-label"><font face="helvetica" size="5px"><b>YEAR:</b></font></label>
										<div class="form-group input-group">
										
									<select  onChange="getPI(this.value)" class="form-control" required>
								<option>Select Year</option>
								<?php 
								$piselect = mysqli_query($mysqli,"SELECT  year(date_change) as piyear FROM  prs_setting where name_setting = 'PAGIBIG'  group by year(date_change)");
								
								while($pirow = mysqli_fetch_assoc($piselect))
								{
								  
								   $piyear = $pirow['piyear'];
								
								?>
								<option value="<?php echo $piyear; ?>"><?php echo $piyear; ?></option>
								<?php } ?>
								</select>
										</div>
							</div>
							</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Modification Date</th>
										<th>Changes</th>
                                    </tr>
                                </thead>
                                <tbody id="pi_list">
                                    <tr class="gradeA">
                                        <td></td>
                                        <td></td>
										<td></td>
                                    </tr>
                                    </tbody>
                            </table>
						</div>
							<!--TABLE END-->
                                </div><!--PI CHANGES END-->
							</div>
								</div>
								
								<!-- End PAGIBIG Tab -->
								
								<!-- PhilHealth Tab -->
								
                                <div class="tab-pane fade" id="philhealth">
                                    <h3 class="page-header"><i class="fa fa-money" aria-hidden="true"></i>&nbsp PhilHealth</h3>	
										<ul class="nav nav-tabs">
									<li class="active"><a href="#PHREMIT" data-toggle="tab" style="font-size:20px"><b>Remittance</b></a>
									</li>
									<li ><a href="#PHCHANGE" data-toggle="tab" style="font-size:20px"><b>Data Changes</b></a>
									</li>
								</ul>

                            <!-- Tab panes -->
                            
							<div class="tab-content">
							<div class="tab-pane fade in active" id="PHREMIT">
								<div class="panel1">  
							<div align="left" style="width: 50%;">
						   <label class="col-sm-4 control-label"><font face="helvetica" size="5px"><b>YEAR:</b></font></label> 
										<div class="form-group input-group">
										
									<select   onChange="getREMPH(this.value)" class="form-control" required>
									<option>Select Year</option>
								<?php
									$payselect= mysqli_query($mysqli,"SELECT year(date_issued) as yearph FROM  prs_report group by year(date_issued)"); 
								 while($payrollrow=mysqli_fetch_assoc($payselect))
								 {	 
									 $yearph = $payrollrow['yearph'];

									?>
								
								<option value="<?php echo $yearph?>"><?php echo $yearph ?></option>
								
								<?php } ?>
									</select>
										</div>
							</div>  
							</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example9">
                                <thead>
                                    <tr>
                                        <th><center>Month</center></th>
                                        <th><center>Total Remmited Amount</center></th>
                                    </tr>
                                </thead>
                                <tbody id="PHrem" >
                                    <tr class="gradeA" >
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
							</div>
							
						
							</div>
							
							<div class="tab-pane fade" id="PHCHANGE">
							<div class="panel1">
                            <div style="width: 50%;">
						   <label class="col-sm-4 control-label"><font face="helvetica" size="5px"><b>YEAR:</b></font></label>
										<div class="form-group input-group">
										
									<select id="year_list" onChange="getPH(this.value)" class="form-control" required>
										<option>Select Year</option>
								<?php 
										$phselect = mysqli_query($mysqli,"SELECT year(change_date) as phyear FROM prs_ph_change group by year(change_date)");
										
										while($phrow = mysqli_fetch_assoc($phselect))
										{
											$phyear = $phrow['phyear'];
								?>
								 	<option value="<?php echo $phyear;?>" ><?php echo $phyear;?></option>
									
										<?php }?>
									</select>
										</div>
							</div>
							</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example3">
                               <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Modification Date</th>
                                   </tr>
                                </thead>
                                <tbody id="ph_list">

                                    <tr class="gradeA" >
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
							</div>
							</div>
							</div>
                                </div>
								
								<!-- End PhilHealth Tab -->
								
								<!-- Salary Memo Tab -->
								
								<div class="tab-pane fade" id="salarymem">
                                    <h3 class="page-header"><i class="fa fa-money" aria-hidden="true"></i>&nbsp Salary Memo</h3>	
							<div class="panel1">
                            <div style="width: 50%;">
						   <label class="col-sm-4 control-label"><font face="helvetica" size="5px"><b>YEAR:</b></font></label>
										<div class="form-group input-group">
										
									<select id="year_list" onChange="getMEMO(this.value)" class="form-control" required>
								<option>Select Year</option>
								<?php
								 $selectmemo = mysqli_query($mysqli,"SELECT year(date_change) as memoyear FROM prs_salary_history GROUP BY year(date_change)");
								while($rowmemo =mysqli_fetch_assoc($selectmemo))
								{
									$memoyear = $rowmemo['memoyear'];
								?>
								<option value="<?php echo $memoyear?>"><?php echo $memoyear?></option>
								<?php }?>
									</select>
										</div>
							</div>
							</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                <thead>
                                    <tr>
                                        <th>Month</th>
										<th><center>Memo</center></th>
                                        <th>Modification Date</th>
                                    </tr>
                                </thead>
                                <tbody id="memo_list">
                                    <tr class="gradeA" >
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
							</div>
							
                                </div>
								
								<!-- End Salary Memo Tab -->
								
								<!-- Tax Tab -->
								
								<div class="tab-pane fade" id="tax">
                                    <h3 class="page-header"><i class="fa fa-money" aria-hidden="true"></i>&nbsp Tax (BIR)</h3>	
							<div class="panel1">
                            <div style="width: 50%;">
						   <label class="col-sm-4 control-label"><font face="helvetica" size="5px"><b>YEAR:</b></font></label>
										<div class="form-group input-group">
										
									<select  onChange="getTax(this.value)" class="form-control" required>
									<option>Select Year</option>
								<?php
									$taxselect= mysqli_query($mysqli,"SELECT year(tax_change) as taxyear FROM prs_tax_change  group by year(tax_change)");
								
								while($taxrow = mysqli_fetch_assoc($taxselect))
								{
									$tax_change = $taxrow['taxyear'];
								?>
								
								<option value="<?php echo $tax_change;?>"> <?php echo $tax_change;?> </option>
								<?php } ?>
									</select>
										</div>
							</div>
							</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example5">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Modification Date</th>
                                    </tr>
                                </thead>
                                <tbody id="tax_list" >
                                    <tr class="gradeA" >
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
							</div>
							
                                </div>
								
								<!-- Tax Tab -->
								
								<!-- Payroll Tab -->
								
								
								<div class="tab-pane fade" id="payroll">
                                    <h3 class="page-header"><i class="fa fa-money" aria-hidden="true"></i>&nbsp Payroll</h3>	
							<div class="panel1">  <div style="float:right;"  ><a href="record.php"><img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 47%;background-color: #fdfdfd" src="../assets/images/records.png" width="43px"></a></div> 

                            <div align="left" style="width: 50%;">
						   <label class="col-sm-4 control-label"><font face="helvetica" size="5px"><b>YEAR:</b></font></label> 
										<div class="form-group input-group">
										
									<select  id="year_list" onChange="getYear(this.value)" class="form-control" required>
									<option>Select Year</option>
								<?php
									$payselect= mysqli_query($mysqli,"SELECT year(date_issued) as year FROM  prs_report group by year(date_issued)"); 
								 while($payrollrow=mysqli_fetch_assoc($payselect))
								 {	 
									 $year = $payrollrow['year'];

									?>
								
								<option value="<?php echo $year?>"><?php echo $year ?></option>
								
								<?php } ?>
									</select>
										</div>
							</div>  
							</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example6">
                                <thead>
                                    <tr>
                                        <th><center>Month</center></th>
                                        <th><center>Total Netpay</center></th>
                                    </tr>
                                </thead>
                                <tbody id="month_list" >
                                    <tr class="gradeA" >
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
							</div>
							
                                </div>
								
								<!-- Payroll Tab -->
								
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
				
				<div class="panel panel-default" style="width:300px;  height: 470px; float: right;" >
                   <div class="panelh2">
                            <i class="fa fa-history fa-fw"></i> Last Updated
                        </div>
                        <!-- /.panel-heading -->
                        
						<?php
function get_timeago( $ptime )
{
    $estimate_time = time() - $ptime;

    if( $estimate_time < 1 )
    {
        return 'less than minute ago';
    }

    $condition = array( 
                12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return  $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
        }
    }
}
?>
						
						<div class="panel-body" style="width:300px; float: right; height:auto;">
                            <div class="list-group" style="height:auto;">
                                
								<a href="#" class="list-group-item">
                                    <i class="fa fa-circle-o fa-fw"></i> Allowance
                                    <span class="pull-right text-muted small">
									<em>
									<?php 
									$alldate = mysqli_query($mysqli,"select date_change from prs_setting where name_setting='Allowance' group by date_change DESC LIMIT 1 ");
									$allroww = mysqli_fetch_assoc($alldate);
									$alldates = get_timeago(strtotime($allroww['date_change']));
									?>
									
									<?php echo $alldates;?>
									</em>
                                    </span>
                                </a>
								
								
								 <a href="#" class="list-group-item">
                                    <i class="fa fa-circle-o fa-fw"></i> GSIS
                                    <span class="pull-right text-muted small">
									<em>
									<?php
									 $gsisdate = mysqli_query($mysqli,"select date_change from prs_setting where name_setting='GSIS' group by date_change DESC LIMIT 1");
									$gsisnum = mysqli_num_rows($gsisdate);
									$gsisroww = mysqli_fetch_assoc($gsisdate);
									$gsisdates = get_timeago(strtotime($gsisroww['date_change']));
									?>
									
									<?php if($gsisnum > 0)
									{
									?>
									<?php echo $gsisdates;?>
									<?php } else{ ?>
										...
									<?php } ?>
									</em>
                                    </span>
                                </a>
								
								<a href="#" class="list-group-item">
                                    <i class="fa fa-circle-o fa-fw"></i> PAGIBIG
                                    <span class="pull-right text-muted small">
									<em>
									<?php
									 $pidate = mysqli_query($mysqli,"select date_change from prs_setting where name_setting='PAGIBIG' group by date_change DESC LIMIT 1");
									$pinumm = mysqli_num_rows($pidate);
									$piroww = mysqli_fetch_assoc($pidate);
									$pidates = get_timeago(strtotime($piroww['date_change']));
									?>
									
									<?php if($pinumm > 0)
									{
									?>
									<?php echo $pidates;?>
									<?php } else{ ?>
										...
									<?php } ?>
									</em>
                                    </span>
                                </a>
								
								
								<a href="#" class="list-group-item" style="padding-bottom: 10">
                                    <i class="fa fa-circle-o fa-fw"></i> PhilHealth
                                    <span class="pull-right text-muted small">
									<em>
									<?php 
									  $getdateph = mysqli_query($mysqli,"select * from prs_ph_change group by change_date DESC limit 1  ");
										$rowpht = mysqli_fetch_assoc($getdateph);
										$phdate = get_timeago(strtotime($rowpht['change_date']));
										
									?>
									<time><?php echo $phdate;?></time>
									</em>
                                    </span>
                                </a>
                               
                               
							   
                                <a href="#" class="list-group-item" style="padding-bottom: 10">
                                    <i class="fa fa-table fa-fw"></i> SAL.MEMO 1
                                    <span class="pull-right text-muted small">
									<em>
									<?php
									$smdate1 = mysqli_query($mysqli,"SELECT date_change from prs_salary_history where his_sal_memo = 'Salary Memo 1' GROUP BY date_change DESC LIMIT 1");
									$sm1num = mysqli_num_rows($smdate1);
									$smrow1 = mysqli_fetch_assoc($smdate1);
									$sm1date = get_timeago(strtotime($smrow1['date_change']));
									?>
									<?php if($sm1num > 0)
									{
									?>
									<?php echo $sm1date;?>
									<?php } else{ ?>
										...
									<?php } ?>
									</em>
                                    </span>
                                </a>
								
								
                                <a href="#" class="list-group-item" style="padding-bottom: 10">
                                    <i class="fa fa-table fa-fw"></i> SAL.MEMO 2
                                    <span class="pull-right text-muted small">
									<em>
									<?php
									$smdate2 = mysqli_query($mysqli,"SELECT date_change from prs_salary_history where his_sal_memo = 'Salary Memo 2' GROUP BY date_change DESC LIMIT 1");
									$sm2num = mysqli_num_rows($smdate2);
									$smrow2 = mysqli_fetch_assoc($smdate2);
									$sm2date = get_timeago(strtotime($smrow2['date_change']));
									?>
									<?php if($sm2num > 0)
									{
									?>
									<?php echo $sm2date;?>
									<?php } else{ ?>
										...
									<?php } ?>
									</em>
                                    </span>
                                </a>
								
								<a href="#" class="list-group-item" style="padding-bottom: 10">
                                    <i class="fa fa-table fa-fw"></i> SAL.MEMO 3
                                    <span class="pull-right text-muted small">
									<em>
									<?php
									$smdate3 = mysqli_query($mysqli,"SELECT date_change from prs_salary_history where his_sal_memo = 'Salary Memo 3' GROUP BY date_change DESC LIMIT 1");
									$sm3num = mysqli_num_rows($smdate3);
									$smrow3 = mysqli_fetch_assoc($smdate3);
									$sm3date = get_timeago(strtotime($smrow3['date_change']));
									?>
									<?php if($sm3num > 0)
									{
									?>
									<?php echo $sm3date;?>
									<?php } else{ ?>
										...
									<?php } ?>
									</em>
                                    </span>
                                </a>
								
								
								<a href="#" class="list-group-item" style="padding-bottom: 10">
                                    <i class="fa fa-table fa-fw"></i> SAL.MEMO 4
                                    <span class="pull-right text-muted small">
									<em>
									<?php
									$smdate4 = mysqli_query($mysqli,"SELECT date_change from prs_salary_history where his_sal_memo = 'Salary Memo 4' GROUP BY date_change DESC LIMIT 1");
									$sm4num = mysqli_num_rows($smdate4);
									$smrow4 = mysqli_fetch_assoc($smdate4);
									$sm4date = get_timeago(strtotime($smrow4['date_change']));
									?>
									<?php if($sm4num > 0)
									{
									?>
									<?php echo $sm4date;?>
									<?php } else{ ?>
										...
									<?php } ?>
									</em>
                                    </span>
                                </a>
								
                               
							   <a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> PAYROLL
                                    <span class="pull-right text-muted small">
									<em>
									<?php
									
									$pyup = mysqli_query($mysqli,"select date_issued from prs_report group by date_issued DESC limit 1");
									$pynum = mysqli_num_rows($pyup);
									$pyrow = mysqli_fetch_assoc($pyup);
									$pydate = get_timeago(strtotime($pyrow['date_issued']));
									?>
								
									<?php if($pynum > 0)
									{
									?>
									<?php echo $pydate;?>
									<?php } else{ ?>
										...
									<?php } ?>
									</em>
                                    </span>
                                </a>
                                
                                
                            </div>
                            <!-- /.list-group -->
                            
                        </div>
                        <!-- /.panel-body -->
                        <!-- /.panel-body -->
					</div>
				
				
			 </div>
	
 

				 <!--======== CONTENT ENDS HERE=============-->
       
         </div>	
				<!--BODY CONTENT END-->
            
            <br><br><br><br><br><br><br><br>
        <!-- /#page-content-wrapper -->
        <footer class="w3-theme-bd5">
         <div class="container">
            <div class="col-lg-3 col-md-3">
               <h3 class="h3">PNHS</h3>
               <h6>All Rights Reserved &copy; 2018</h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">ADDRESS</h1>
               <h6><b>Pag-asa National Highschool</b><br><span>PNHS Building, Rawis, East Service<br>  Road, Legazpi City, PH 2424</span></h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h3 class="h3">CONTACT US</h3>
               <h6 class="w3-justify">
                  <b>Phone:</b>
                  <span>(+632) 887-2232</span>
                  <br>
                  <b>E-mail:</b> 
                  <span>officialpnhs@pnhs.gov.ph</span>
                  <br>
               </h6>
            </div>
             <div class="col-lg-3 col-md-3">
               <h3 class="h3">FOLLOW US ON:</h3>
                  <a href="#"><i class="fa fa-bullseye w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-phone w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-facebook w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-google-plus w3-xlarge" aria-hidden="true"></i></a>
            </div>
         </div>
      </footer>    
    </div>
    
    <!-- /#wrapper -->
<?php include("../include/bottomscript.php");?>     
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
	
	<script text="text/javascript" src="../jquery/jquery-migrate-1.4.1.js"></script>
	
	<script>
				function getYear(val)
				{
					 $.ajax({
						 type: "POST",
						 url: "dataget/getdata1.php",
						 data: 'year='+val,
						 success: function(data)
						 {
							 $("#month_list").html(data);
						 }
					 })
				}
				
	</script>
  
  <script>
				function getAllowance(val)
				{
					 $.ajax({
						 type: "POST",
						 url: "dataget/getAllowance.php",
						 data: 'allowanceyear='+val,
						 success: function(data)
						 {
							 $("#allowance_list").html(data);
						 }
					 })
				}
				
	</script>

	<script>
				function getGSIS(val)
				{
					 $.ajax({
						 type: "POST",
						 url: "dataget/getGSIS.php",
						 data: 'gsisyear='+val,
						 success: function(data)
						 {
							 $("#gsis_list").html(data);
						 }
					 })
				}
				
	</script>
	
	<script>
				function getPI(val)
				{
					 $.ajax({
						 type: "POST",
						 url: "dataget/getPI.php",
						 data: 'piyear='+val,
						 success: function(data)
						 {
							 $("#pi_list").html(data);
						 }
					 })
				}
				
	</script>
	
	<script>
				function getPH(val)
				{
					 $.ajax({
						 type: "POST",
						 url: "dataget/getPH.php",
						 data: 'phyear='+val,
						 success: function(data)
						 {
							 $("#ph_list").html(data);
						 }
					 })
				}
				
	</script>
	
	<script>
				function getTax(val)
				{
					 $.ajax({
						 type: "POST",
						 url: "dataget/getTax.php",
						 data: 'taxyear='+val,
						 success: function(data)
						 {
							 $("#tax_list").html(data);
						 }
					 })
				}
				
	</script>
	
	
	<script>
				function getMEMO(val)
				{
					 $.ajax({
						 type: "POST",
						 url: "dataget/getMemo.php",
						 data: 'memoyear='+val,
						 success: function(data)
						 {
							 $("#memo_list").html(data);
						 }
					 })
				}
				
	</script>

	
	<script>
				function getREMGSIS(val)
				{
					 $.ajax({
						 type: "POST",
						 url: "dataget/getdatagsis.php",
						 data: 'yeargsis='+val,
						 success: function(data)
						 {
							 $("#GSISrem").html(data);
						 }
					 })
				}
				
	</script>
	
	<script>
				function getREMPI(val)
				{
					 $.ajax({
						 type: "POST",
						 url: "dataget/getdatapi.php",
						 data: 'yearpi='+val,
						 success: function(data)
						 {
							 $("#PIrem").html(data);
						 }
					 })
				}
				
	</script>
		<script>
				function getREMPH(val)
				{
					 $.ajax({
						 type: "POST",
						 url: "dataget/getdataph.php",
						 data: 'yearph='+val,
						 success: function(data)
						 {
							 $("#PHrem").html(data);
						 }
					 })
				}
				
	</script>

<!--JS FOR TABLE FUNCTION-->
 
	
	 <script>
    $(document).ready(function() {
        $('#dataTables-example1').DataTable({
            responsive: true
        });
    });
    </script>
	
	 <script>
    $(document).ready(function() {
        $('#dataTables-example2').DataTable({
            responsive: true
        });
    });
    </script>
	
	 <script>
    $(document).ready(function() {
        $('#dataTables-example3').DataTable({
            responsive: true
        });
    });
    </script>
	
	 <script>
    $(document).ready(function() {
        $('#dataTables-example4').DataTable({
            responsive: true
        });
    });
    </script>
	
	 <script>
    $(document).ready(function() {
        $('#dataTables-example5').DataTable({
            responsive: true
        });
    });
    </script>
	
	 <script>
    $(document).ready(function() {
        $('#dataTables-example6').DataTable({
            responsive: true
        });
    });
    </script>
	 <script>
    $(document).ready(function() {
        $('#dataTables-example7').DataTable({
            responsive: true
        });
    });
    </script>
	
	<script>
    $(document).ready(function() {
        $('#dataTables-example8').DataTable({
            responsive: true
        });
    });
    </script>
		<script>
    $(document).ready(function() {
        $('#dataTables-example9').DataTable({
            responsive: true
        });
    });
    </script>
	
	

<script>
$('.openBtn').on('click',function(){
    $('.calculate').load('function_modal/generate_modal.php',function(){
        $('#calculate').modal({show:true});
    });
});
</script>
    </body>

</html>
