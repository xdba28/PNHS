	<?php
    include("../func.php");
	include("../dbcon.php");
	include("../session.php");

$vid=$_GET['emp'];


	$sqry=mysqli_query($mysqli,"SELECT * FROM pims_personnel NATURAL JOIN pims_employment_records  NATURAL JOIN pims_job_title
where emp_No='$vid'");
$row3=mysqli_fetch_assoc($sqry);
$pst=$row3['job_title_name'];
$empp=$row3['P_fname'].' '. $row3['P_mname'] .' '. $row3['P_lname'] ;
	
	?>
    <head>
        <meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
        <link rel='stylesheet prefetch' href='pages/css/bootstrap.min.css'>
        <link rel="icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="pages/css/style.css">
        <link rel="stylesheet" href="pages/css/w3.css">
		<link rel="stylesheet" href="css/ayuson.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
		<!-- DataTables CSS -->
	    <link href="pages/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
	    <link href="pages/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	    <!-- DataTables Responsive CSS -->
	    <link href="pages/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
		<!-- MetisMenu CSS -->
		<link href="pages/css/sb-admin-2.css" rel="stylesheet">
		<link href="pages/css/metisMenu.min.css" rel="stylesheet">
    </head>
<body>

	  <?php 
		include("topnav.php");
		?>
	
        <div id="wrapper">
            <?php 
				include("sidenav.php");
			?>

<br><br>
<div class="container">
			<div style="background-color: #eee !important">
	<form>		
    <div class="container-fluid">
         <div align="center">
             <br>
             <strong>Department of Education<br></strong>
             Region V(Bicol)<br> 
             Schools Division of Legaspi City <br> 
             <strong>PAG-ASA NATIONAL HIGH SCHOOL</strong><br> 
             Rawis, Legaspi City<br>
       

      <h5><center><img src="../docs/img/leg.png" width="85px" height="85px"> &nbsp; &nbsp; &nbsp;<strong> &nbsp;INDIVIDUAL PERFORMANCE COMMITMENT AND REVIEW FORM</strong> &nbsp; &nbsp; &nbsp; &nbsp;<img src="../docs/img/pnhs_logo.PNG" width="85px" height="85px">
          </center>
      </h5>
        <tr>
            <td width="50%">
                <p><br>
                </p>
        </td>
 				<b>
					
					
				</b>
				 <?php 
				$selsy=mysqli_query($mysqli,"SELECT year,sy_id FROM css_school_yr where status='active'");
				$selr=mysqli_fetch_assoc($selsy);
				$s_id=$selr['sy_id'];
				$s_yr=$selr['year'];
            ?>
					<div class="row" style="margin-left:30px">
						<div class="col-lg-5" >
							<label for="rating_period" class="control-label"> Employee Name: </label>
                  			<input type="text" class="form-control extend" style="background-color: white" id="name_of_faculty" value="<?php echo $empp; ?>" readonly></input>
						</div>
						<div class="col-lg-5" style="margin-left:100px">
							<label for="rating_period" class="control-label"> Division: </label>
                  			<input type="text" class="form-control extend" style="background-color: white" id="subj_code" value="<?php echo 'Legazpi City'; ?>" readonly></input>
						</div>
						<br><br><br><br>
						<div class="col-lg-5">
							<label for="rating_period" class="control-label"> Position: </label>
                  			<input type="text" class="form-control extend" style="background-color: white" id="subject_taught" value="<?php echo $pst; ?>" readonly></input>
						</div>
						<div class="col-lg-5" style="margin-left:100px">
							<label for="rating_period" class="control-label"> Rating Period: </label>
                  			<input type="text" class="form-control extend" style="background-color: white" id="subject_taught" value="<?php echo $s_yr; ?>" readonly></input>
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
						width: 1000px;
						margin:auto;
					}
					.extend
					{
						width: 400px;
					}
				</style>
					<tr>
						<th style="background-color: #809fff !important"><div align="center" style="margin-top: 40px"><b>MFO</b></div></th>
						<th style="background-color: #809fff !important" ><div align="center" style="margin-top: 40px"><b>KRA</b></div></th>
						<th style="background-color: #809fff !important" width = "20%"><div align="center" style="margin-top: 40px"><b>OBJECTIVES</b></div></th>
						<th style="background-color: #809fff !important"><div align="center" style="margin-top: 40px"><b>TIMELINE</b></div></th>
                        <th style="background-color: #809fff !important"><div align="center" style="margin-top: 10px"><b>Weight <font size=2> per </font> KRA</b></div></th>
						<th style="background-color: #809fff !important"><p align="center"><font size=3><strong>PERFORMANCE  INDICATOR</font>
						<div align="center"><font size=0.5>(Quality, Efficiency, Timeliness)</font></div>
						</strong></p></th>
						
						
						<th style="background-color: #809fff !important" width="3%"><div align="center" style="margin-top: 40px"><b>Q</b></div></th>
						<th style="background-color: #809fff !important" width="3%" ><div align="center" style="margin-top: 40px"><b>E</b></div></th>
						<th style="background-color: #809fff !important" width="3%" ><div align="center" style="margin-top: 40px"><b>T</b></div></th>
						<th style="background-color: #809fff !important" width="3%" ><div align="center" style="margin-top: 40px"><b>Rating</b></div></th>
						<th style="background-color: #809fff !important" width="3%" ><div align="center" style="margin-top: 40px"><b>Score</b></div></th>
					</tr>
<tbody>

<?php

	$qry = mysqli_query($mysqli,"Select ipcrms_content.obj_id,MFO_Description,KRA_Description, ipcrms_obj.OBJ_ID,kra_obj, timeline, kra_wpk, perf_5, perf_4, perf_3	,perf_2,perf_1
	from ipcrms_kra, ipcrms_obj, ipcrms_mfo, ipcrms_perf_indicator,ipcrms_content 
	where ipcrms_obj.KRA_ID = ipcrms_kra.KRA_ID 
	and ipcrms_kra.MFO_ID=ipcrms_mfo.MFO_ID
	and ipcrms_content.obj_id=ipcrms_obj.obj_id
	and ipcrms_perf_indicator.OBJ_ID=ipcrms_obj.OBJ_ID
	and ipcrms_content.emp_No=$vid");

	
	$vss=1;
		while($row = mysqli_fetch_array($qry)){
			$desc = $row['MFO_Description'];
					$kradesc = $row['KRA_Description'];
					$kraobj = $row['kra_obj'];
					if ( $row['OBJ_ID'] == 27 ){
												$obj_desc=$kraobj;
												$kraobj = "";
												for ( $x = 0 ; $x < $StrLen ; $x++ ){
													if (( substr($obj_desc,$x,2) == "1." ) ||
														( substr($obj_desc,$x,2) == "2." ) ||
														 (substr($obj_desc,$x,2) == "3." ) ||
														  (substr($obj_desc,$x,2) == "4." ) ||
														   (substr($obj_desc,$x,2) == "5." ))
													{
														$kraobj = $kraobj . "<br><br>" . substr($obj_desc,$x,2);
														$x++;
													}
													else{
														$kraobj = $kraobj . substr($obj_desc,$x,1);
													}
												}
											}
											else{
												$obj_desc=$kraobj;
												$kraobj = "";
												$StrLen = strlen($obj_desc);
												for ( $x = 0 ; $x < $StrLen ; $x++ ){
													if ( substr($obj_desc,$x,1) == "*" ){
														$kraobj = $kraobj . "<br><br>" . substr($obj_desc,$x,1);
													}
													else{
														$kraobj = $kraobj . substr($obj_desc,$x,1);
													}
												}
											}


					$tim = $row['timeline'];
					$kwpk = $row['kra_wpk'];
					$perf_5 = $row['perf_5'];
					$perf_4 = $row['perf_4'];
					$perf_3 = $row['perf_3'];
					$perf_2 = $row['perf_2'];
					$perf_1 = $row['perf_1'];
					$obj=$row['obj_id'];
					
					$krawp = $kwpk * 100;
?>
			
			
						
							<tr>
								<td><?php echo $desc;?></td>
								<td><?php echo $kradesc;?></td>
								<td><?php echo $kraobj; ?></td>
								<td><?php echo $tim; ?></td>
								<td><?php echo ''.$krawp.'%'; ?></td>
								<td><?php echo $perf_5; ?> <br> <?php echo $perf_4; ?> <br><?php echo $perf_3; ?> <br> <?php echo $perf_2;?> <br> <?php echo $perf_1;?> </td>
								<input type="hidden" id="wpk_<?php echo $vss;?>" value="<?php echo $kwpk;?>">
								<?php 
									$vsql=mysqli_query($mysqli,"Select * from ipcrms_content where ipcrms_content.OBJ_ID=$obj 
										and ipcrms_content.emp_No=$vid");
									
									while($vrow=mysqli_fetch_assoc($vsql)){ 
									$a=$vrow['q_val'];
									$b=$vrow['e_val'];
									$c=$vrow['t_val'];
									$d=$vrow['rating'];
									$e=$vrow['score'];
										 ?>
										 <input type="hidden" id="num_row" value="<?php echo $vss;?>">
										 
										<td><b><input name="q<?php echo $vss; ?>)" onChange="cal(<?php echo $vss; ?>)" id="num1_<?php echo $vss;?>" style="width:30px;" type="number" max="5" min="1" value="<?php echo $a;?>"></b></td>	
										<td><b><input name="e<?php echo $vss; ?>)" onChange="cal(<?php echo $vss; ?>)" id="num2_<?php echo $vss;?>" style="width:30px;" type="number" max="5" min="1" value="<?php echo $b;?>"></b></td>
										<td><b><input name="t<?php echo $vss; ?>)" onChange="cal(<?php echo $vss; ?>)" id="num3_<?php echo $vss;?>" style="width:30px;" type="number" max="5" min="1" value="<?php echo $c;?>"></b></td>
										<td><b><input style="width:45px;" disabled id="rating_<?php echo $vss;?>" value="<?php echo number_format((float)$d, 1, '.', '');?>"></b></td>
										<td><b><input style="width:45px;" disabled id="score_<?php echo $vss;?>" value="<?php echo number_format((float)$e, 1, '.', '');?>"></b></td>
								<?php
									
									}
								?>
							</tr>	
					<?php 
					$vss++;
					}?>	

					
			
			
			</tbody>
		
	
	
	</table>
	<style>

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
	<br><br>

	<script>
    function cal($i)
    {
		var x = document.getElementById('num1_'+$i).value;
		var y = document.getElementById('num2_'+$i).value;
		var z = document.getElementById('num3_'+$i).value;
		var wpk = document.getElementById('wpk_'+$i).value;
		var num_row = document.getElementById('num_row').value;
		var rating = (parseInt(x)+parseInt(y)+parseInt(z))/3;
		
		document.getElementById('rating_'+$i).value = rating;
		var score= rating*wpk;
		document.getElementById('score_'+$i).value = score;
    }
    
</script> 
		<div class="col-lg-3" style="right:-375px">	
			<input type="hidden" name="emp" value="<?php echo $vid; ?>">
			<button type="submit" class="form-control btn btn-primary text-center">Verify</button>
		</div>
		<?php 
			if(isset($_POST['ver'])){
				$emp=$_POST['emp'];
				$upda=mysqli_query($mysqli,"UPDATE ipcrms_content SET Status='Verified'  WHERE emp_no=$emp");
				if($upda){
					echo "<script>alert('Form Verified!'); window.location.href='ipcrms_trans_rec.php';</script>";
				}else{
					echo "<script>alert('Error! Form not Verified!'); window.location.href='ipcrms_trans_rec.php';</script>";
				}
													
				}
		?>

	</div>
</div></div></div>

				<?php include("footer.php");?>
			</div>
            <script src='pages/js/jquery.min.js'></script>
            <script src='pages/js/bootstrap.min.js'></script>
            <script  src="pages/js/index.js"></script>
			
			<script src='pages/js/sb-admin-2.min.js'></script>
            <script src='pages/js/metisMenu.min.js'></script>
	</body>




	</html>
	
	