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
        <style>
            table {
                background-color: #ccddff;
            }
            table,th,td{
                border: 1px solid #8f8f8f !important;
                border-collapse: collapse !important;
            }
            .centermid1
            {
                width: 1020px;
                margin:auto;

            }
            #deadline
            {
              display: show;
              position: fixed;
              bottom: 150px;
              opacity:0.5;
            }
            #deadline:hover {
             opacity:1;
            }
        </style>
    </head>
	
	  
<body>  

<?php 
		include("topnav_user.php");
		?>
	
        <div id="wrapper">
            <?php 
				include("sidenav_user.php");
			?>
			
<?php
$yrn=date("Y");
$qry=mysqli_query($mysqli, "Select distinct * from pims_personnel, ipcrms_content 
where pims_personnel.emp_No=ipcrms_content.emp_No 
and pims_personnel.emp_No=$emp
and year(date_submitted)='$yrn'");
$num=mysqli_num_rows($qry);
if ($num==0){
	echo "<SCRIPT LANGUAGE= 'JavaScript'>
					window.location = 'user_form11.php';
			</SCRIPT>";
	
}
else {
	 ?>
<br><br><br><br>
<div class="container">
    <div class="jumbotron" style="background-color: #eee !important">		
        <div class="row" style="margin-left:30px">
            <div class="col-lg-5" >
                <label for="rating_period" class="control-label"> Employee Name: </label>
                <input type="text" class="form-control" style="background-color: white" id="name_of_faculty" value="<?php echo $nrow['Name']; ?>" readonly>
            </div>
            <div class="col-lg-5" style="margin-left:100px">
                <label for="rating_period" class="control-label"> Division: </label>
                <input type="text" class="form-control" style="background-color: white" id="subj_code" value="<?php echo 'Legazpi City'; ?>" readonly>
            </div>
            <br><br><br><br>
            <div class="col-lg-5">
                <label for="rating_period" class="control-label"> Position: </label>
                <input type="text" class="form-control" style="background-color: white" id="subject_taught" value="<?php echo $jtn; ?>" readonly>
            </div>
            <div class="col-lg-5" style="margin-left:100px">
                <label for="rating_period" class="control-label"> Rating Period: </label>
                <input type="text" class="form-control" style="background-color: white" id="subject_taught" value="<?php echo '2017-2018'; ?>" readonly>
            </div>
        </div>
        <br><br><br><br>
        <table class="table table-responsive table-hover table-bordered " >
            <th style="background-color: #809fff !important">
                <div align="center" style="margin-top: 50px"><b>MFO</b></div>
            </th>
            <th style="background-color: #809fff !important">
                <div align="center" style="margin-top: 50px"><b>KRA</b></div>
            </th>
            <th style="background-color: #809fff !important" width = "20%">
                <div align="center" style="margin-top: 50px"><b>OBJECTIVES</b></div>
            </th>
            <th style="background-color: #809fff !important">
                <div align="center" style="margin-top: 50px"><b>TIMELINE</b></div>
            </th>
            <th style="background-color: #809fff !important">
                <div align="center" style="margin-top: 25px"><b>Weight per KRA</b></div>
            </th>
            <th style="background-color: #809fff !important">
                <div align="center"><strong>PERFORMANCE INDICATOR</strong></div><br>
                <div align="center">(Quality, Efficiency, Timeliness)</div>
            </th>

            <form <?php 
            if(!isset($_SESSION['target'])){
                echo 'method="POST"';
            }else{
                echo 'action ="submit_form.php" method="GET"';
            } ?> >
            <th style="background-color: #809fff !important" width="5%"><div align="center" style="margin-top: 50px"><b>Q</b></div></th>
            <th style="background-color: #809fff !important" width="5%" ><div align="center" style="margin-top: 50px"><b>E</b></div></th>
            <th style="background-color: #809fff !important" width="5%" ><div align="center" style="margin-top: 50px"><b>T</b></div></th>
            <th style="background-color: #809fff !important" width="5%" ><div align="center" style="margin-top: 50px"><b>Rating</b></div></th>
            <th style="background-color: #809fff !important" width="5%" ><div align="center" style="margin-top: 50px"><b>Score</b></div></th>    
            <?php 
                $jt=$_SESSION['job_title'];
                $code=$job_title;
                $y = 0;
                $x = 0;
                $count = 0;
                $bn = [];
			//echo $emp . "<br>" . $yrn;
            if(strstr($jt,"TCH")){

                    $qry = mysqli_query($mysqli, "Select e_val,q_val,t_val,ipcrms_obj.OBJ_ID, ipcrms_mfo.MFO_ID, ipcrms_kra.KRA_ID, MFO_Description,KRA_Description,kra_obj,timeline,kra_wpk,perf_5,perf_4,perf_3,perf_2,perf_1,rating,score 
                    from ipcrms_mfo, ipcrms_kra, ipcrms_obj, ipcrms_perf_indicator,ipcrms_content,pims_personnel
                    where IPCRMS_MFO.MFO_ID=2 
                    and ipcrms_kra.MFO_ID=ipcrms_mfo.MFO_ID 
                    and ipcrms_obj.KRA_ID=ipcrms_kra.KRA_ID 
                    and ipcrms_perf_indicator.OBJ_ID=ipcrms_obj.OBJ_ID
                    AND ipcrms_content.obj_id=ipcrms_obj.obj_id
                    AND ipcrms_content.emp_no=pims_personnel.emp_no
                    AND ipcrms_content.emp_no='$emp'
                    AND year(date_submitted)='$yrn'");
							$oa="";
                            while($row=mysqli_fetch_array($qry)){	
                            $desc = $row['MFO_Description'];
                            $kradesc = $row['KRA_Description'];
                            $obj = $row['kra_obj'];
                            if ( $row['OBJ_ID'] == 27 ){
                                $obj_desc=$obj;
                                $obj = "";
                                for ( $x = 0 ; $x < $StrLen ; $x++ ){
                                    if (( substr($obj_desc,$x,2) == "1." ) || ( substr($obj_desc,$x,2) == "2." ) || (substr($obj_desc,$x,2) == "3." ) ||    (substr($obj_desc,$x,2) == "4." ) || (substr($obj_desc,$x,2) == "5." )){
                                        $obj = $obj . "<br><br>" . substr($obj_desc,$x,2);
                                        $x++;
                                    }else{
                                        $obj = $obj . substr($obj_desc,$x,1);
                                    }
                                }
                            }else{
                                $obj_desc=$obj;
                                $obj = "";
                                $StrLen = strlen($obj_desc);
                                for ( $x = 0 ; $x < $StrLen ; $x++ ){
                                    if ( substr($obj_desc,$x,1) == "*" ){
                                        $obj = $obj . "<br><br>" . substr($obj_desc,$x,1);
                                    }else{
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
                            $rating = $row['rating'];   
                            $score = $row['score'];   
							$oa+=number_format($score,2);	

                            $krawp = $kwpk * 100;

                            $a = $mfoid;
                            $b = $kraid; 
                            $c = $objid;
                                
                            ?><tr>
                                        <td><?php echo $desc; ?></td>
                                        <td><?php echo $kradesc; ?></td>
                                        <td><?php echo $obj; ?></td>
                                        <td><?php echo $tim; ?></td>
                                        <td><?php echo ''.$krawp.'%'; ?></td>
                                        <td><?php echo $perf_5.'<br>' .$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1; ?></td>
                            <?php
                                $y = $b;
                                $bn = $c;

                                ?>
                                
                                <td>
                                    <input type="radio" <?php if($row['q_val']=="5"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?> name="q<?php echo $bn;?>" value="5"/>5
                                    <input type="radio" <?php if($row['q_val']=="4"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?> name="q<?php echo $bn;?>" value="4"/>4
                                    <input type="radio" <?php if($row['q_val']=="3"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="q<?php echo $bn;?>" value="3"/>3
                                    <input type="radio" <?php if($row['q_val']=="2"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="q<?php echo $bn;?>" value="2"/>2
                                    <input type="radio" <?php if($row['q_val']=="1"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="q<?php echo $bn;?>" value="1"/>1

                                </td>
                                <td>
                                    <input type="radio" <?php if($row['e_val']=="5"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="e<?php echo $bn;?>" value="5"/>5
                                    <input type="radio" <?php if($row['e_val']=="4"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="e<?php echo $bn;?>" value="4"/>4
                                    <input type="radio" <?php if($row['e_val']=="3"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="e<?php echo $bn;?>" value="3"/>3
                                    <input type="radio" <?php if($row['e_val']=="2"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="e<?php echo $bn;?>" value="2"/>2
                                    <input type="radio" <?php if($row['e_val']=="1"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="e<?php echo $bn;?>" value="1"/>1
                                </td>
                                <td>
                                    <input type="radio" <?php if($row['t_val']=="5"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="t<?php echo $bn;?>" value="5"/>5
                                    <input type="radio" <?php if($row['t_val']=="4"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="t<?php echo $bn;?>" value="4"/>4
                                    <input type="radio" <?php if($row['t_val']=="3"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="t<?php echo $bn;?>" value="3"/>3
                                    <input type="radio" <?php if($row['t_val']=="2"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="t<?php echo $bn;?>" value="2"/>2
                                    <input type="radio" <?php if($row['t_val']=="1"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="t<?php echo $bn;?>" value="1"/>1
                                </td>
                                <td>
                                    <center><?php echo number_format($rating,2); ?></center>
                                </td>
                                <td>
                                    <center><?php echo number_format($score,2); ?></center>
                                </td>
                                </tr><?php
                            
                            $count++;
                    }
                    echo '<input type="hidden" name="mfoid" value="'.$row['MFO_ID'].'";  />';

            }else{
                $qry = mysqli_query($mysqli, "Select e_val,q_val,t_val,ipcrms_obj.OBJ_ID, ipcrms_mfo.MFO_ID, ipcrms_kra.KRA_ID, MFO_Description,KRA_Description,kra_obj,timeline,kra_wpk,perf_5,perf_4,perf_3,perf_2,perf_1 
                    from ipcrms_mfo, ipcrms_kra, ipcrms_obj, ipcrms_perf_indicator,ipcrms_content,pims_personnel, ipcrms_records
                    where IPCRMS_MFO.MFO_ID=1
					and ipcrms_records.emp_No = pims_personnel.emp_no
                    and ipcrms_kra.MFO_ID=ipcrms_mfo.MFO_ID 
                    and ipcrms_obj.KRA_ID=ipcrms_kra.KRA_ID 
                    and ipcrms_perf_indicator.OBJ_ID=ipcrms_obj.OBJ_ID
                    AND ipcrms_content.obj_id=ipcrms_obj.obj_id
                    AND ipcrms_content.emp_no=pims_personnel.emp_no
                    AND ipcrms_content.emp_no='$emp'
                    AND year(date_submitted)='$yrn'");
					$oa="";
                            while($row=mysqli_fetch_array($qry))
							{	
                            $desc = $row['MFO_Description'];
                            $kradesc = $row['KRA_Description'];
                            $obj = $row['kra_obj'];
                            if ( $row['OBJ_ID'] == 27 )
							{
                                $obj_desc=$obj;
                                $obj = "";
                                for ( $x = 0 ; $x < $StrLen ; $x++ ){
                                    if (( substr($obj_desc,$x,2) == "1." ) || ( substr($obj_desc,$x,2) == "2." ) || (substr($obj_desc,$x,2) == "3." ) ||    (substr($obj_desc,$x,2) == "4." ) || (substr($obj_desc,$x,2) == "5." )){
                                        $obj = $obj . "<br><br>" . substr($obj_desc,$x,2);
                                        $x++;
                                    }else{
                                        $obj = $obj . substr($obj_desc,$x,1);
                                    }
                                }
                            }
							else
							{
                                $obj_desc=$obj;
                                $obj = "";
                                $StrLen = strlen($obj_desc);
                                for ( $x = 0 ; $x < $StrLen ; $x++ ){
                                    if ( substr($obj_desc,$x,1) == "*" ){
                                        $obj = $obj . "<br><br>" . substr($obj_desc,$x,1);
                                    }else{
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
                            $rating = $row['rating'];   
                            $score = $row['score'];   
							$oa+=number_format($score,2);	
							
                            $krawp = $kwpk * 100;

                            $a = $mfoid;
                            $b = $kraid; 
                            $c = $objid;
                            ?><tr>
                                        <td><?php echo $desc; ?></td>
                                        <td><?php echo $kradesc; ?></td>
                                        <td><?php echo $obj; ?></td>
                                        <td><?php echo $tim; ?></td>
                                        <td><?php echo ''.$krawp.'%'; ?></td>
                                        <td><?php echo $perf_5.'<br>' .$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1; ?></td>
                            <?php
                                $y = $b;
                                $bn = $c;

                                ?>
                                
                                <td>
                                    <input type="radio" <?php if($row['q_val']=="5"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?> name="q<?php echo $bn;?>" value="5"/>5
                                    <input type="radio" <?php if($row['q_val']=="4"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?> name="q<?php echo $bn;?>" value="4"/>4
                                    <input type="radio" <?php if($row['q_val']=="3"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?> name="q<?php echo $bn;?>" value="3"/>3
                                    <input type="radio" <?php if($row['q_val']=="2"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?> name="q<?php echo $bn;?>" value="2"/>2
                                    <input type="radio" <?php if($row['q_val']=="1"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?> name="q<?php echo $bn;?>" value="1"/>1

                                </td>
                                <td>
                                    <input type="radio" <?php if($row['e_val']=="5"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="e<?php echo $bn;?>" value="5"/>5
                                    <input type="radio" <?php if($row['e_val']=="4"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="e<?php echo $bn;?>" value="4"/>4
                                    <input type="radio" <?php if($row['e_val']=="3"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="e<?php echo $bn;?>" value="3"/>3
                                    <input type="radio" <?php if($row['e_val']=="2"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="e<?php echo $bn;?>" value="2"/>2
                                    <input type="radio" <?php if($row['e_val']=="1"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="e<?php echo $bn;?>" value="1"/>1
                                </td>
                                <td>
                                    <input type="radio" <?php if($row['t_val']=="5"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="t<?php echo $bn;?>" value="5"/>5
                                    <input type="radio" <?php if($row['t_val']=="4"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="t<?php echo $bn;?>" value="4"/>4
                                    <input type="radio" <?php if($row['t_val']=="3"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="t<?php echo $bn;?>" value="3"/>3
                                    <input type="radio" <?php if($row['t_val']=="2"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="t<?php echo $bn;?>" value="2"/>2
                                    <input type="radio" <?php if($row['t_val']=="1"){echo "checked='checked'"; }else{ echo "disabled='disabled'";}?>name="t<?php echo $bn;?>" value="1"/>1
                                </td>
                                </tr><?php
                            
                            $count++;
                    }
                    echo '<input type="hidden" name="mfoid" value="'.$row['MFO_ID'].'";  />';
            }
        ?>
            </form>
        </table>
        <table style='position:relative;left:625px;'>
            <th width='255px;'><center>OVERALL RATING FOR ACCOMPLISHMENTS</center></th>
            <th width='140px;'><center><?php echo $oa ;?></center></th>
        </table>
    </div>
    <?php include("footer.php"); ?>
</div>
    </div>											
<?php
}
?>
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

    </body>
</html>