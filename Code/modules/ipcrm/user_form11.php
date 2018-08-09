<!DOCTYPE html>
<html lang="en" >
    <?php
    include("func.php");
	include("dbcon.php");
	include("session.php");
	
	$name=mysqli_query($mysqli, "SELECT concat(p_fname,' ',p_lname) as Name,job_title_name,pims_employment_records.job_title_code FROM pims_personnel,pims_employment_records,pims_job_title
	WHERE pims_personnel.emp_no=pims_employment_records.emp_no
	AND pims_job_title.job_title_code=pims_employment_records.job_title_code
	AND pims_personnel.emp_no=$emp");
	$nrow=mysqli_fetch_assoc($name);
	$_SESSION['job_title']=$nrow['job_title_code'];	
	$jt=$_SESSION['job_title'];
	$jtn=$nrow['job_title_name'];
    ?>
	
    <head>
        <meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
        <link rel='stylesheet prefetch' href='pages/css/bootstrap.min.css'>
        <link rel="icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="pages/css/style.css">
        <link rel="stylesheet" href="pages/css/w3.css">
		<link rel="stylesheet" href="admin_SH/css/ayuson.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
		<!-- MetisMenu CSS -->
		<link href="pages/css/sb-admin-2.css" rel="stylesheet">
		<link href="pages/css/metisMenu.min.css" rel="stylesheet">
	
    </head>
    
	

<?php

$qry=mysqli_query($mysqli, "Select * from pims_personnel, ipcrms_content 
where pims_personnel.emp_No=ipcrms_content.emp_No and pims_personnel.emp_No=$emp");
$num=mysqli_num_rows($qry);
if ($num>0){
	echo "<SCRIPT LANGUAGE= 'JavaScript'>
					window.location = 'user_form11dis.php';
			</SCRIPT>";
	
}
else {
	 ?>
<body>
	  <?php 
		include("topnav_user.php");
		?>
	
        <div id="wrapper">
            <?php 
				include("sidenav_user.php");
			?>
<br><br><br>
<div class="modal fade" id="generate" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
        <div class="modal-content">
            <form class="form-horizontal" name="form" method="post">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                <h3 align="center"><b>Set Target</b></h3>
            </div>
            <div class="modal-body">
                <label>Target:</label>
                <select required class="form-control" name="target">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="submit" name="btn_target" class="btn btn-primary">
                    Proceed
                </button>
            </div>
            </form>
            <?php 
                if(isset($_POST['btn_target'])){
                    $tr=$_POST['target'];
                    $_SESSION['target']=$tr;
                }
				$selsy=mysqli_query($mysqli,"SELECT year,sy_id FROM css_school_yr where status='active'");
				$selr=mysqli_fetch_assoc($selsy);
				$s_id=$selr['sy_id'];
				$s_yr=$selr['year'];
            ?>
        </div>
    </div>
</div>    


<div class="container">
			<div class="jumbotron" style="background-color: #eee !important">
			
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
                  			<input type="text" class="form-control" style="background-color: white" id="subject_taught" value="<?php echo $jtn; ?>" readonly></input>
						</div>
						<div class="col-lg-5" style="margin-left:100px">
							<label for="rating_period" class="control-label"> Rating Period: </label>
                  			<input type="text" class="form-control" style="background-color: white" id="subject_taught" value="<?php echo $s_yr; ?>" readonly></input>
						</div>
					</div>



<br><br><br><br>
<table class="table table-responsive table-hover table-bordered " >
	<style>
		table {
  			background-color: #ccddff;
		}
		table,th,td{
			border: 1px solid #8f8f8f !important;
			border-collapse: collapse !important;
		}
		

	</style>
						<th style="background-color: #809fff !important"><div align="center" style="margin-top: 50px"><b>MFO</b></div></td>
						<th style="background-color: #809fff !important"><div align="center" style="margin-top: 50px"><b>KRA</b></div></td>
						<th style="background-color: #809fff !important" width = "20%"><div align="center" style="margin-top: 50px"><b>OBJECTIVES</b></div></td>
						<th style="background-color: #809fff !important"><div align="center" style="margin-top: 50px"><b>TIMELINE</b></div></td>
						<th style="background-color: #809fff !important"><div align="center" style="margin-top: 25px"><b>Weight per KRA</b></div></td>
						<th style="background-color: #809fff !important"><div align="center"><strong>PERFORMANCE INDICATOR</strong></div><br>
						 <div align="center">(Quality, Efficiency, Timeliness)</div></td>
						
							<form <?php 
    if(!isset($_SESSION['target'])){
        echo 'method="POST"';
    }else{
        echo 'action ="submit_form.php" method="GET"';
    } ?> >
								<th style="background-color: #809fff !important" width="5%"><div align="center" style="margin-top: 50px"><b>Q</b></div></td>
								<th style="background-color: #809fff !important" width="5%" ><div align="center" style="margin-top: 50px"><b>E</b></div></td>
								<th style="background-color: #809fff !important" width="5%" ><div align="center" style="margin-top: 50px"><b>T</b></div></td>
<?php 
	
	$y = 0;
	$x = 0;
	$count = 0;
	$bn = [];
	
	if($jt=='TCH1' || $jt=='TCH2' || $jt=='TCH3') {

			$qry = mysqli_query ($mysqli, "Select ipcrms_obj.OBJ_ID, ipcrms_mfo.MFO_ID, ipcrms_kra.KRA_ID, ipcrms_mfo.MFO_Description,  ipcrms_kra.KRA_Description, ipcrms_obj.kra_obj, ipcrms_obj.timeline, ipcrms_obj.kra_wpk, ipcrms_perf_indicator.perf_5, ipcrms_perf_indicator.perf_4, ipcrms_perf_indicator.perf_3, ipcrms_perf_indicator.perf_2, ipcrms_perf_indicator.perf_1 
			from ipcrms_mfo, ipcrms_kra, ipcrms_obj, ipcrms_perf_indicator 
			where IPCRMS_MFO.MFO_ID=2 and ipcrms_kra.MFO_ID=ipcrms_mfo.MFO_ID and ipcrms_obj.KRA_ID=ipcrms_kra.KRA_ID and ipcrms_perf_indicator.OBJ_ID=ipcrms_obj.OBJ_ID ");
			
			
					while($row=mysqli_fetch_array($qry)){	
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
					$objid = $row['OBJ_ID'];
					$timm=explode('-',$tim);
					$s_yrr=explode('-',$s_yr);
					$krawp = $kwpk * 100;
					
					$a = $mfoid;
					$b = $kraid; 
					$c = $objid;
					if ($b != $y ){
					echo '
						
							<tr>
								<td>'.$desc.'</td>
								<td>'.$kradesc.'</td>
								<td>'.$obj.'</td>
								<td>'.$timm[0].' '.$s_yrr[0].'-'.$timm[1].' '.$s_yrr[1].'</td>
								<td>'.$krawp.'%</td>
								<td>'.$perf_5. '<br>' .$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>
								
						
					';
						$y = $b;
						$bn = $c;
						
						echo '<form action ="submit_form.php" method="GET">
						<td><input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)"	required="" value="5"/>5
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="4"/>4
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="3"/>3
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="2"/>2
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="1"/>1
								
						</td>
						<td><input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="5"/>5
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="4"/>4
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="3"/>3
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="2"/>2
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="1"/>1
								
						</td>
						<td><input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="5"/>5
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="4"/>4
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="3"/>3
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="2"/>2
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="1"/>1
								
						</td>
						</tr>';
					}
					else {
						echo '
						
							<tr>
								<td></td>
								<td></td>
								<td>'.$obj.'</td>
								<td>'.$timm[0].' '.$s_yrr[0].'-'.$timm[1].' '.$s_yrr[1].'</td>
								<td>'.$krawp.'%</td>
								<td>'.$perf_5. '<br>' .$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>
							
						
					';
					$bn = $c;
					
					echo '<form action ="submit_form.php" method="GET">
						<input type="hidden" name="sid" value="'.$s_id.'">
						<td><input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="5"/>5
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="4"/>4
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="3"/>3
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="2"/>2
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="1"/>1
								
						</td>
						<td><input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="5"/>5
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="4"/>4
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="3"/>3
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="2"/>2
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="1"/>1
								
						</td>
						<td><input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="5"/>5
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="4"/>4
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="3"/>3
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="2"/>2
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="1"/>1
								
						</td>
							</tr>';
					
						
					}
					$count++;
					
					
			}
			echo '<input type="hidden" name="mfoid" value="'.$a.'"  />
						';
			
	}
	else if($jt=="MTCHR1" || $jt=="MTCHR2" || $jt=="MTCHR3" || $jt=="MTCHR4" || $jt=="MTCHR5" || $jt=="MTCHR6"){
		
		$qry = mysqli_query ($mysqli, "Select ipcrms_obj.OBJ_ID, ipcrms_mfo.MFO_ID, ipcrms_kra.KRA_ID, ipcrms_mfo.MFO_Description,  ipcrms_kra.KRA_Description, ipcrms_obj.kra_obj, ipcrms_obj.timeline, ipcrms_obj.kra_wpk, ipcrms_perf_indicator.perf_5, ipcrms_perf_indicator.perf_4, ipcrms_perf_indicator.perf_3, ipcrms_perf_indicator.perf_2, ipcrms_perf_indicator.perf_1 
			from ipcrms_mfo, ipcrms_kra, ipcrms_obj, ipcrms_perf_indicator 
			where IPCRMS_MFO.MFO_ID= 1 and ipcrms_kra.MFO_ID=ipcrms_mfo.MFO_ID and ipcrms_obj.KRA_ID=ipcrms_kra.KRA_ID and ipcrms_perf_indicator.OBJ_ID=ipcrms_obj.OBJ_ID ");

					while($row=mysqli_fetch_array($qry)){
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
					$objid = $row['OBJ_ID'];
					$timm=explode('-',$tim);
					$s_yrr=explode('-',$s_yr);

					$krawp = $kwpk * 100;
					
					
					$a = $mfoid;
					$b = $kraid; 
					$c = $objid;
					if ($b != $y ){
					echo '
						
							<tr>
								<td>'.$desc.'</td>
								<td>'.$kradesc.'</td>
								<td>'.$obj.'</td>
								<td>'.$timm[0].' '.$s_yrr[0].'-'.$timm[1].' '.$s_yrr[1].'</td>
								<td>'.$krawp.'%</td>
								<td>'.$perf_5. '<br>' .$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>
								
						
					';
						$y = $b;
						$bn = $c;
						
						echo '<form action ="submit_form.php" method="GET">
						
						<td><input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="5"/>5
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this) " required="" value="4"/>4
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="3"/>3
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="2"/>2
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="1"/>1
								
						</td>
						<td><input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="5"/>5
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="4"/>4
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="3"/>3
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="2"/>2
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="1"/>1
								
						</td>
						<td><input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="5"/>5
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="4"/>4
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="3"/>3
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="2"/>2
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="1"/>1
								
						</td>
						</tr>';
					}
					else {
						echo '
						
							<tr>
								<td></td>
								<td></td>
								<td>'.$obj.'</td>
								<td>'.$tim.'</td>
								<td>'.$krawp.'%</td>
								<td>'.$perf_5. '<br>' .$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>
							
						
					';
					$bn = $c;
					
					echo '<form action ="submit_form.php" method="GET">
                    <input type="hidden" name="sid" value="'.$s_id.'">
						<td><input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="5"/>5
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="4"/>4
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="3"/>3
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="2"/>2
								<input type="radio" name="q'.$bn.'" onmouseover="checkButton(this)" required="" value="1"/>1
								
						</td>.
						<td><input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="5"/>5
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="4"/>4
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="3"/>3
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="2"/>2
								<input type="radio" name="e'.$bn.'" onmouseover="checkButton(this)" required="" value="1"/>1
								
						</td>
						<td><input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="5"/>5
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="4"/>4
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="3"/>3
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="2"/>2
								<input type="radio" name="t'.$bn.'" onmouseover="checkButton(this)" required="" value="1"/>1
								
						</td>
							</tr>';
					
						
					}
					$count++;
					
					
			}
			echo '<input type="hidden" name="mfoid" value="'.$a.'"  />';
	}
	

?>
		

</table>
<center>
<button type="reset"  class="btn btn-danger">RESET</button>
<button <?php 
    if(!isset($_SESSION['target'])){
        echo 'type="submit" name="dont"';
    }else{
        echo 'type="submit" name="submit"';
    } ?> 
    class="btn btn-primary" >VIEW SUMMARY</button>



						</div></form><br></center></div><?php include("footer.php"); ?></div></div></div>
						
 
						
<?php
}
?>
<style>
.centermid1
{
    width: 1020px;
    margin:auto;

}
 </style>
 
 <SCRIPT>
 function checkButton(element){
  element.checked = true;
}
 </SCRIPT>
 

       
            <script src='pages/js/jquery.min.js'></script>
            <script src='pages/js/bootstrap.min.js'></script>
            <script  src="pages/js/index.js"></script>
			
			<script src='pages/js/sb-admin-2.min.js'></script>
            <script src='pages/js/metisMenu.min.js'></script>
            <?php 
            if(isset($_POST['dont'])){
                echo "<script>$('#generate').modal('show');</script>";
            }

            if(!isset($_SESSION['target'])){
                echo "<script>$('#generate').modal('show');</script>";
            }
        ?>
    </body>
</html>