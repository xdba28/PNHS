<!DOCTYPE html>
<html lang="en" >
    <?php
    include("func.php");
	include("dbcon.php");
	include("session.php");
	
	$name=mysqli_query($mysqli, "SELECT concat(p_fname,' ',p_lname) as Name,job_title_name FROM pims_personnel,pims_employment_records,pims_job_title
	WHERE pims_personnel.emp_no=pims_employment_records.emp_no
	AND pims_job_title.job_title_code=pims_employment_records.job_title_code
	AND pims_personnel.emp_no=$emp");
	$nrow=mysqli_fetch_assoc($name);
	$_SESSION['job_title']=$nrow['job_title_name'];	
	$jt=$_SESSION['job_title'];
	
    ?>
    <head>
        <meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
        <link rel='stylesheet prefetch' href='pages/css/bootstrap.min.css'>
        <link rel="icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="pages/css/style.css">
        <link rel="stylesheet" href="pages/css/w3.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
		<!-- MetisMenu CSS -->
		<link href="pages/css/sb-admin-2.css" rel="stylesheet">
		<link href="pages/css/metisMenu.min.css" rel="stylesheet">

    </head>
    <body>
	  <?php 
		include("topnav_user.php");
		?>
	
        <div id="wrapper">
            <?php 
				include("sidenav_user.php");
			?>
<br><br><br><br>
<?php 
            
				$selsy=mysqli_query($mysqli,"SELECT year,sy_id FROM css_school_yr where status='active'");
				$selr=mysqli_fetch_assoc($selsy);
				$s_id=$selr['sy_id'];
				$s_yr=$selr['year'];
            ?>

<div class="container">
			<div class="jumbotron" style="background-color: #eee !important">
			
				<b>
					
					<br>
				</b>
					<div class="row" style="margin-left:30px">
						<div class="col-lg-5" >
							<label for="rating_period" class="control-label"> Employee Name: </label>
                  			<input type="text" class="form-control" style="background-color: white" id="name_of_faculty" value="<?php echo $nrow['Name']; ?>" readonly></input>
						</div>
						<div class="col-lg-5" style="margin-left:100px">
							<label for="rating_period" class="control-label"> Division: </label>
                  			<input type="text" class="form-control" style="background-color: white" id="subj_code" value="<?php echo 'Legazpi City'; ?>" readonly></input>
						</div>
						<br><br><br><br>
						<div class="col-lg-5">
							<label for="rating_period" class="control-label"> Position: </label>
                  			<input type="text" class="form-control" style="background-color: white" id="subject_taught" value="<?php echo $jt; ?>" readonly></input>
						</div>
						<div class="col-lg-5" style="margin-left:100px">
							<label for="rating_period" class="control-label"> Rating Period: </label>
                  			<input type="text" class="form-control" style="background-color: white" id="subject_taught" value="<?php echo $s_yr; ?>" readonly></input>
						</div>
					</div>
					<form method = "POST" action = "insert_data.php">
					<input type = "hidden" name = "emp_no" value = "<?php echo $_SESSION['user_data']['acct']['emp_no'] ;?>">
					</form>


<br><br><br><br>
					<!--Modal Code-->

<?php

echo '<table class="table" >
				<style>
					table{
			  			background-color: #ccddff;
					}
					table,th,td{
						border: 1px solid black !important;
						border-collapse: collapse !important;
					}

				</style>
					<tr>
						<th style="background-color: #809fff !important"><div align="center" style="margin-top: 50px"><b>MFO</b></div></td>
						<th style="background-color: #809fff !important"><div align="center" style="margin-top: 50px"><b>KRA</b></div></td>
						<th style="background-color: #809fff !important" width = "20%"><div align="center" style="margin-top: 50px"><b>OBJECTIVES</b></div></td>
						<th style="background-color: #809fff !important"><div align="center" style="margin-top: 50px"><b>TIMELINE</b></div></td>
						<th style="background-color: #809fff !important"><div align="center" style="margin-top: 25px"><b>Weight per KRA</b></div></td>
						<th style="background-color: #809fff !important"><div align="center"><strong>PERFORMANCE INDICATOR</strong></div><br>
						 <div align="center">(Quality, Efficiency, Timeliness)</div></td>
						
							
								<th style="background-color: #809fff !important" width="5%"><div align="center" style="margin-top: 50px"><b>Q</b></div></td>
								<th style="background-color: #809fff !important" width="5%" ><div align="center" style="margin-top: 50px"><b>E</b></div></td>
								<th style="background-color: #809fff !important" width="5%" ><div align="center" style="margin-top: 50px"><b>T</b></div></td>
                                <th style="background-color: #809fff !important" width="5%" ><div align="center" style="margin-top: 50px"><b>Rating</b></div></td>
                                <th style="background-color: #809fff !important" width="5%" ><div align="center" style="margin-top: 50px"><b>Score</b></div></td>
					</tr>';

$mfo_id = $_GET['mfoid'];

if($mfo_id==2){
	$qry = mysqli_query($mysqli, "Select ipcrms_kra.KRA_ID, ipcrms_obj.OBJ_ID, ipcrms_mfo.MFO_ID, ipcrms_mfo.MFO_Description, ipcrms_kra.KRA_Description, ipcrms_obj.kra_obj, ipcrms_obj.timeline, ipcrms_obj.kra_wpk, ipcrms_perf_indicator.perf_5, ipcrms_perf_indicator.perf_4, ipcrms_perf_indicator.perf_3, ipcrms_perf_indicator.perf_2, ipcrms_perf_indicator.perf_1 from ipcrms_kra, ipcrms_obj, ipcrms_mfo, ipcrms_perf_indicator where ipcrms_kra.MFO_ID = ".$mfo_id." and ipcrms_obj.KRA_ID = ipcrms_kra.KRA_ID and ipcrms_kra.MFO_ID=ipcrms_mfo.MFO_ID and ipcrms_perf_indicator.OBJ_ID=ipcrms_obj.OBJ_ID ");
	
	if($qry){
        $oa=0;
		while($row = mysqli_fetch_array($qry)){
			$kraID = $row['KRA_ID'];
			$objID = $row['OBJ_ID'];
			$desc = $row['MFO_Description'];
					$kradesc = $row['KRA_Description'];
					$obj = $row['kra_obj'];
					
					if ( $row['OBJ_ID'] == 27 ){
												$obj_desc=$obj;
												$obj = "";
												for ( $x = 0 ; $x < $StrLen ; $x++ ){
													if (( substr($obj_desc,$x,2) == "1." ) ||
														( substr($obj_desc,$x,2) == "2." ) ||
														 (substr($obj_desc,$x,2) == "3." ) ||
														  (substr($obj_desc,$x,2) == "4." ) ||
														   (substr($obj_desc,$x,2) == "5." ))
													{
														$obj = $obj . "<br><br>" . substr($obj_desc,$x,2);
														$x++;
													}
													else{
														$obj = $obj . substr($obj_desc,$x,1);
													}
												}
											}
											else{
												$obj_desc=$obj;
												$obj = "";
												$StrLen = strlen($obj_desc);
												for ( $x = 0 ; $x < $StrLen ; $x++ ){
													if ( substr($obj_desc,$x,1) == "*" ){
														$obj = $obj . "<br><br>" . substr($obj_desc,$x,1);
													}
													else{
														$obj = $obj . substr($obj_desc,$x,1);
													}
												}
											}
					
					$tim = $row['timeline'];
					$kwpk = $row['kra_wpk'];
					$mfoid = $row['MFO_ID'];
					$kraid = $row['KRA_ID'];
					$perf_5 = $row['perf_5'];
					$perf_4 = $row['perf_4'];
					$perf_3 = $row['perf_3'];
					$perf_2 = $row['perf_2'];
					$perf_1 = $row['perf_1'];
					
					$krawp = $kwpk * 100;
			
			$z = $objID;
			$s = $mfoid;
			$q = $_GET['q'.$objID.''];
			$e = $_GET['e'.$objID.''];
			$t = $_GET['t'.$objID.''];
			$syy = $_GET['sid'];
			$rating=($q+$e+$t)/3;
            $score=$rating*$kwpk;
            $oa+=number_format($score,3);
			echo '
						
							<tr>
								<td>'.$desc.'</td>
								<td>'.$kradesc.'</td>
								<td>'.$obj.'</td>
								<td>'.$tim.'</td>
								<td>'.$krawp.'%</td>
								<td>'.$perf_5. '<br>' .$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>
								
						
					';
					
			echo	'<form action = "insert_data.php" method = "GET">
			
			
					<td><b>'.$q.'</b></td>	
					<td><b>'.$e.'</b></td>
					<td><b>'.$t.'</b></td>
					<td><b>'.number_format($rating,3).'</b></td>
                    <td><b>'.number_format($score,3).'</b></td>
					<input type="hidden" name="q'.$objID.'" value="'.$q.'" />
					<input type="hidden" name="e'.$objID.'" value="'.$e.'" />
					<input type="hidden" name="t'.$objID.'" value="'.$t.'" />
					<input type="hidden" name="sy" value="'.$syy.'" />
					';
			
				
			
		}
	}
    
	echo '<input type="hidden" name="objid" value="'.$z.'"  />
			<input type="hidden" name="mfoid" value="'.$s.'"  />';
}

else{
	$qry = mysqli_query($mysqli, "Select ipcrms_kra.KRA_ID, ipcrms_obj.OBJ_ID, ipcrms_mfo.MFO_ID, ipcrms_mfo.MFO_Description, ipcrms_kra.KRA_Description, ipcrms_obj.kra_obj, ipcrms_obj.timeline, ipcrms_obj.kra_wpk, ipcrms_perf_indicator.perf_5, ipcrms_perf_indicator.perf_4, ipcrms_perf_indicator.perf_3, ipcrms_perf_indicator.perf_2, ipcrms_perf_indicator.perf_1 from ipcrms_kra, ipcrms_obj, ipcrms_mfo, ipcrms_perf_indicator where ipcrms_kra.MFO_ID = ".$mfo_id." and ipcrms_obj.KRA_ID = ipcrms_kra.KRA_ID and ipcrms_kra.MFO_ID=ipcrms_mfo.MFO_ID and ipcrms_perf_indicator.OBJ_ID=ipcrms_obj.OBJ_ID ");
	
	if($qry){
		$oa=0;
		while($row = mysqli_fetch_array($qry)){
			$kraID = $row['KRA_ID'];
			$objID = $row['OBJ_ID'];
			$desc = $row['MFO_Description'];
					$kradesc = $row['KRA_Description'];
					$obj = $row['kra_obj'];
					$tim = $row['timeline'];
					$kwpk = $row['kra_wpk'];
					$mfoid = $row['MFO_ID'];
					$kraid = $row['KRA_ID'];
					$perf_5 = $row['perf_5'];
					$perf_4 = $row['perf_4'];
					$perf_3 = $row['perf_3'];
					$perf_2 = $row['perf_2'];
					$perf_1 = $row['perf_1'];
					
					$krawp = $kwpk * 100;
			         
			$z = $objID;
			$s = $mfoid;
			$q = $_GET['q'.$objID.''];
			$e = $_GET['e'.$objID.''];
			$t = $_GET['t'.$objID.''];
			$syy = $_GET['sid'];
            $rating=($q+$e+$t)/3;
            $score=$rating*$kwpk;
            $oa+=number_format($score,2);
			echo '
						
							<tr>
								<td>'.$desc.'</td>
								<td>'.$kradesc.'</td>
								<td>'.$obj.'</td>
								<td>'.$tim.'</td>
								<td>'.$krawp.'%</td>
								<td>'.$perf_5. '<br>' .$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>
								
						
					';
					
			echo	'<form action = "insert_data.php" method = "GET">
			
			
					<td><b>'.$q.'</b></td>	
					<td><b>'.$e.'</b></td>
					<td><b>'.$t.'</b></td>
                    <td><b>'.number_format($rating,2).'</b></td>
                    <td><b>'.number_format($score,2).'</b></td>
					<input type="hidden" name="sy" value="'.$syy.'" />
					<input type="hidden" name="q'.$objID.'" value="'.$q.'" />
					<input type="hidden" name="e'.$objID.'" value="'.$e.'" />
					<input type="hidden" name="t'.$objID.'" value="'.$t.'" />
					
					';
			
				
			
		}
	}
	echo '<input type="hidden" name="objid" value="'.$z.'"  />
			<input type="hidden" name="mfoid" value="'.$s.'"  />';
		
}

echo '</table>';
echo"<table style='position:relative;left:625px;'>
        <th width='255px;'><center>OVERALL RATING FOR ACCOMPLISHMENTS</center></th>
        <th width='140px;'><center>".number_format($oa,2)."</center></th>
    </table>";


?>
<div class="col-lg-3" style="right:-375px">	
<br><br>					
								<?php
									
										
											echo '<a id="enabled" data-toggle="modal" data-target="#confirmationModal">
									<button id="enabled" type="submit" class="form-control btn btn-primary text-center">Submit</button>
									</a>';
    
										
									?>
									
								</div>
								<br><br>
								
</div>
</div><?php include("footer.php"); ?>
</div>

								<div class="modal fade" id="confirmationModal">
								<br><br><br>
								<div class="modal-dialog modal-sm" style="width:700px">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal">
												<span aria-hidden="true">&times;</span>
												<span class="sr-only"></span>
											</button><br>
				<?php 
            
				$selsy=mysqli_query($mysqli,"SELECT year,sy_id FROM css_school_yr where status='active'");
				$selr=mysqli_fetch_assoc($selsy);
				$s_id=$selr['sy_id'];
				$s_yr=$selr['year'];
            ?>
										</div>
										<div class="modal-body" align="center" style="margin-left:75px;margin-right:75px"><br>
										<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I, <?php echo $nrow['Name']; ?> of PAG-ASA NATIONAL HIGH SCHOOL commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated measures for the period of <?php echo $s_yr; ?>.</label><br>
										
											<br>
										</div>
										<div class="modal-footer">
											
											<a id="enabled" data-toggle="modal" data-dismiss="modal" data-target="#questModal">
									<button id="enabled" type="submit" class="btn btn-primary btn-xs">Continue</button>
									</a>
										</div>
									</div>
								</div>
							</div>
							

								

								<div class="modal fade" id="questModal">
								<div class="modal-dialog modal-sm">
								<br><br><br><br>
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal">
												<span aria-hidden="true">&times;</span>
												<span class="sr-only"></span>
											</button>
										</div>
										<div class="modal-body" align="center">
										<label> Are you sure you want to Submit your Evaluated Form?</label><br>
										
											<br>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">
												No
											</button>
											<button type="submit" data-target="#myModal" data-toggle="modal" name="btn_submit" class="btn btn-primary btn-xs">
												Yes
											</button>
										</div>
									</div>
								</div>
							</div>	
							
							
					
						<div class="modal fade" id="myModal" role="dialog" >
								<div class="modal-dialog modal-sm" style="width:450px">
								<br><br><br><br>
									<div class="modal-content" style="background-color:#eee">
										<div class="modal-header">
						  <!-- Modal content-->
							<div class="row center">
									<div class="modalbox success center animate">
											
											<!--/.icon--> 
										
											
											<style>
											.style{
												font-family: 'Montserrat', sans-serif;
												font-size: 15px;												}
											.style2{
												font-family: 'Montserrat', sans-serif;
												font-size: 40px; color:eee;
											}
											.style3{
												font-size:37px;
												color:#f93535;
												}
											</style><div style="background-color:#7ed780; height:60px">
											<center><span class="style3 fa fa-check-square-o  " aria-hidden="true"></span><span class="style2"><b>&nbsp;Thank You!</b></span><br></div></center><br>
											<center><div class="style">Your form has been submitted.</div></center>
									<br></div>
									</div>
									</div>
					</div>				<!--/.success-->
					</div>
					</div>
					
<!--footer-->

       
            <script src='pages/js/jquery.min.js'></script>
            <script src='pages/js/bootstrap.min.js'></script>
            <script  src="pages/js/index.js"></script>

            <script src='pages/js/sb-admin-2.min.js'></script>
            <script src='pages/js/metisMenu.min.js'></script>
    </body>
</html>