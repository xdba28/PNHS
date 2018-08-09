	<?php
include '../connection.php';

$vid=$_GET['emp'];


	$sqry=mysql_query("SELECT * FROM pims_personnel, pims_employment_records, pims_job_title
where pims_personnel.emp_No=. pims_employment_records.emp_rec_ID and pims_job_title.job_title_code= pims_employment_records.job_title_code and pims_personnel.emp_No='$vid'");
$row3=mysql_fetch_assoc($sqry);
$pst=$row3['job_title_name'];
$nme=$row3['P_fname'];
	
	?>
	<meta charset="utf-8">
    <meta http-eq uiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>PNHS - IPCRMS</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../css/w3/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href=".docs/docs.min.css">
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="./css/w3/blue.css">
    <link rel="stylesheet" href="./css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="./css/sideNav.css">
    <link rel="stylesheet" href="./css/backToTop.css">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="./docs/img/pnhs_favicon.ico" type="image/x-icon">
    
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./jquery/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="./bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<html>
<body>

			<div class="jumbotron" style="background-color: #eee !important">
				<b>
					
					<br>
				</b>
					<div class="row centermid" >
						<div class="col-lg-5" >
							<label for="rating_period" class="control-label"> Employee Name: </label>
                  			<input type="text" class="form-control extend" style="background-color: white" id="name_of_faculty" value="<?php echo $nme; ?>" readonly></input>
						</div>
						<div class="col-lg-5" style="margin-left:150px">
							<label for="rating_period" class="control-label"> Division: </label>
                  			<input type="text" class="form-control extend" style="background-color: white" id="subj_code" value="<?php echo 'Legazpi City'; ?>" readonly></input>
						</div>
						<br><br><br><br>
						<div class="col-lg-5">
							<label for="rating_period" class="control-label"> Position: </label>
                  			<input type="text" class="form-control extend" style="background-color: white" id="subject_taught" value="<?php echo $pst; ?>" readonly></input>
						</div>
						<div class="col-lg-5" style="margin-left:150px">
							<label for="rating_period" class="control-label"> Rating Period: </label>
                  			<input type="text" class="form-control extend" style="background-color: white" id="subject_taught" value="<?php echo '2017-2018'; ?>" readonly></input>
						</div>
					</div>
					<form method = "POST" action = "insert_data.php">
					<input type = "hidden" name = "emp_no" value = "<?php echo $_SESSION['user_data']['acct']['emp_no'] ;?>">
					</form>


<br><br><br><br>

     <table class="table"  style="width: auto;" >
				<style>

					table,th,td
					{
						border: 1px solid black !important;
						border-collapse: collapse !important;
					}
					.centermid
					{
						width: 1020px;
						margin:auto;

					}
					.extend
					{
						width: 400px;
					}
				</style>
					<tr>
						<th style="background-color: #809fff !important"><div align="center" style="margin-top: 40px"><b>MFO</b></div></th>
						<th style="background-color: #809fff !important"><div align="center" style="margin-top: 40px"><b>KRA</b></div></th>
						<th style="background-color: #809fff !important" width = "20%"><div align="center" style="margin-top: 40px"><b>OBJECTIVES</b></div></th>
						<th style="background-color: #809fff !important"><div align="center" style="margin-top: 40px"><b>TIMELINE</b></div></th>
						<th style="background-color: #809fff !important"><div align="center" style="margin-top: 15px"><b>Weight per KRA</b></div></th>
						<th style="background-color: #809fff !important"><p align="center"><strong>PERFORMANCE  INDICATOR
						<div align="center">(Quality, Efficiency, Timeliness)</div>
						</strong></p></th>
						
						
							
								<th style="background-color: #809fff !important" width="3%"><div align="center" style="margin-top: 40px"><b>Q</b></div></th>
								<th style="background-color: #809fff !important" width="3%" ><div align="center" style="margin-top: 40px"><b>E</b></div></th>
								<th style="background-color: #809fff !important" width="3%" ><div align="center" style="margin-top: 40px"><b>T</b></div></th>
					</tr>
<tbody>

<?php

	$qry = mysql_query("Select ipcrms_kra.KRA_ID, ipcrms_obj.OBJ_ID, ipcrms_mfo.MFO_ID, ipcrms_mfo.MFO_Description, ipcrms_kra.KRA_Description, ipcrms_obj.kra_obj, ipcrms_obj.timeline, ipcrms_obj.kra_wpk, ipcrms_perf_indicator.perf_5, ipcrms_perf_indicator.perf_4, ipcrms_perf_indicator.perf_3	, ipcrms_perf_indicator.perf_2, ipcrms_perf_indicator.perf_1 from ipcrms_kra, ipcrms_obj, ipcrms_mfo, ipcrms_perf_indicator where ipcrms_kra.MFO_ID = '1' and ipcrms_obj.KRA_ID = ipcrms_kra.KRA_ID and ipcrms_kra.MFO_ID=ipcrms_mfo.MFO_ID and ipcrms_perf_indicator.OBJ_ID=ipcrms_obj.OBJ_ID ");
	
	
		while($row = mysql_fetch_array($qry)){
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
			
			$z = $objID;
			$s = $mfoid;
?>
			
			
						
							<tr>
								<td><?php echo $desc;?></td>
								<td><?php echo $kradesc;?></td>
								<td><?php echo $obj; ?></td>
								<td><?php echo $tim; ?></td>
								<td><?php echo $kwpk; ?></td>
								<td><?php echo $perf_5; ?> <br> <?php echo $perf_4; ?> <br><?php echo $perf_3; ?> <br> <?php echo $perf_2;?> <br> <?php echo $perf_1 ;?> </td>
								<?php 
									$vsql=mysql_query("Select * from ipcrms_content where ipcrms_content.OBJ_ID=$z");
									while($vrow=mysql_fetch_assoc($vsql)){ 
										$a = $vrow['q_val'];
										$b = $vrow['e_val'];
										$c =  $vrow['t_val']; ?>
										<td><b><?php echo $a;?></b></td>	
										<td><b><?php echo $b;?></b></td>
										<td><b><?php echo $c;?></b></td>
								<?php
									}
								?>
							</tr>	
					<?php }?>					
			
			
			</tbody>	
	</table>

	<style>
#myBtn1 {
  display: black;
  background-color: gray;
  position: fixed;
  bottom: 10px;
  right: 610px;
  border: none;
  outline: none;
  padding: 15px;
  width: 120px;
  text-align: center;
  border-radius: 10px;	
}

#myBtn1:hover {
  background-color: #fff;
}
#myBtn1 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

#myBtn1 span:after {
  content: '\02191';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

#myBtn1:hover span {
  padding-right: 25px;
}

#myBtn1:hover span:after {
  opacity: 1;
  right: 0;
}

12:38 PM 10/17/2017
.centermid1
{
    width: 1020px;
    margin:auto;

}
</style>
	
<div class="button" id="myBtn1" ><a href="ipcrms_index.php"><span>Back</span></a></div>
<BR>
<CENTER>
<button type="submit" name="submit" class="btn btn-primary" >VERIFIED</button>
<button type="submit" name="submit" class="btn btn-primary" >NOT SATISFIED</button>    
</CENTER>
	


	</div>
	</body>
	</html>
	
	