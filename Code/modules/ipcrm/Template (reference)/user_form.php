<?php
	include 'connection.php';
	


?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="utf-8">
    <meta http-eq uiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>PANAHAS Template</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="./css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="./css/w3/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href=".docs/docs.min.css">
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="./css/w3/blue.css">
    <link rel="stylesheet" href="./css/w3/yellow.css">
    <link rel="stylesheet" href="./css/w3/w3.css">
    <link rel="stylesheet" href="./css/sideNav.css">
    <link rel="stylesheet" href="./css/backToTop.css">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="./css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="./docs/img/pnhs_favicon.ico" type="image/x-icon">
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
    
<style>
body{
    background-image: url(./docs/img/mayon.png);
    background-repeat: no-repeat;
    background-position: top;
    background-color: white;
	
	
}
h3{
    text-align: left;
    font-family: "century gothic";
    margin-top:0px;
    margin-bottom:0px;
	color: white;
}
h4{
    text-align: left;
    margin-top:5px;
    margin-bottom:0px;
	color: white;
}
h1{
    text-align: left;
    font-family: "times new roman";
    margin-bottom:0px;
	color: white;
	
body {
      position: relative; 
  }
  .affix {
      top:0;
      width: 100%;
      z-index: 9999 !important;
  }
  .navbar {
      margin-bottom: 0px;
  }
    
  .affix ~ .container-fluid {
     position: relative;
     top: 50%;
  }

    .pagination a {
color: blue;
float: right;
padding: 10px 16px;
text-decoration: box;
transition: background-color .3s;
}

.pagination a.active {
background-color: #FFFF66 ;
color: white;
}
.pagination a:hover:not (.active) {background-color: #999999;} 

</style>
    
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50%">
    
<section id="work" > 
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding:0px">
            <img class="w3-right" src="./docs/img/pnhs_logo.png" style="margin-top:20px">
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding:0px">
            <div data-spy="container-fluid" style="height:140px">
                <div class="container-fluid w3-left" style="max-width:500px;margin-top:10px">
                    <h1>P A G - A S A</h1> <h3>NATIONAL HIGH SCHOOL</h3>
                    <h4><i>( IPCR Monitoring System )</i></h4>
                </div>
            </div>
        </div>
    </div>
</section>
    
<nav class="w3-theme-bd5 w3-card-4" style="background-color:rgba(42,101,149,0.95)!important" role="navigation"  data-offset-top="140" data-offset-top="140">
<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand w3-card-4" href="../pages/index2.1.html"><img src="./docs/img/pnhs_logo.png" width="75px" height="75px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
      <hr class="hidden-sm hidden-md hidden-lg" style="height:10px; border:0">
        <form class="navbar-form navbar-left hidden-sm">
          <div class="input-group">
              <span class="input-group-btn">
              </span>
          </div>
        </form>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="./user_home.php">IPCRMS Page</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Profile <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
              <li class="divider"></li>
              <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
<hr class="w3-theme-yd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
<hr class="w3-theme-bd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
</nav>
<div class="container" style="padding:35px; background:rga(0,0,0,0.5)"></div>

<div id="mySidenav" class="sidenav w3-card-4">
  <a href="javascript:void(0)" class="closebtn" style="margin-left:150px" onClick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a></div>





<form action="" method="POST" >
<form action='' method='get'>

				
	<div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#form1-pills" data-toggle="tab">Basic Education Services (Delivery)</a>
                                </li>
                                <li><a href="#form2-pills" data-toggle="tab">Improved PL/MPS in written/performance based evaluation</a>
                                </li>
                                <li><a href="#form3-pills" data-toggle="tab">
Planning Assessing and Reporting Learning Outcomes</a>
                                </li>
                                
                            </ul>	
							<br>
							
		<!-- Tab panes -->
        <div class="tab-content">
                <div class="tab-pane fade in active" id="form1-pills">
								
					<div class="container-fluid w3-text-black">
						<table width="80%" border="1">
							<div class="w3-card-4">
								<div class="col-md-1"> <br>
									<div align="center">

										<?php
										$sql="SELECT MFO_description FROM ipcrms_mfo WHERE ipcrms_mfo.MFO_ID=1";
										$record=mysql_query($sql);
										while($row=mysql_fetch_assoc($record))
										{
										$MFO_description=$row['MFO_description'];
										?>
										<tr class="w3-ul w3-border-top">
										  <td height="41" colspan="10"><h3 class="w3-theme-bl4"> <strong> <?php echo $MFO_description; ?></h3></td></strong>      
										<?php
										}
										?> 
										</tr>
										<tr class="w3-theme-bl4">
										  <td width="15%" rowspan="2"><div align="center"><strong>KRA'S</strong></div></td>
										  <td width="27%" rowspan="2"><div align="center"><strong>Objectives</strong></div></td>
										  <td width="8%" rowspan="2"><div align="center"><strong>Timeline</strong></div></td>
										  <td width="7%" rowspan="2"><div align="center"><strong>Weight per KRA</strong></div></td>
										  <td width="28%" rowspan="2"><p align="center"><strong>PERFORMANCE  INDICATOR</strong></p>
											  <div align="center">(Quality, Efficiency, Timeliness)</div></td>
										  <td colspan="3"><div align="center"><strong>ACTUAL  RESULTS</strong></div></td>
										</tr>
										<tr class="w3-theme-bl4">
										  <td width="5%"><div align="center">Q</div></td>
										  <td width="4%"><div align="center">E</div></td>
										  <td width="6%"><div align="center">T</div></td>
										</tr>
										
										
										
										<?php
										$sql="SELECT KRA_description, timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=ipcrms_kra.MFO_ID";
										$record=mysql_query($sql);
										while($row=mysql_fetch_assoc($record))
										{
										$KRA_description=$row['KRA_description'];

										echo '<tr class="w3-theme-bl5" >' ;
										echo '<td>','<center>' .$KRA_description. '</center>', '</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT obj_desc FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=1 AND ipcrms_obj.KRA_ID=1";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$obj_desc=$row['obj_desc'];
											//echo '<td>' .$obj_desc. '</td>' ; 
											$StrLen = strlen($obj_desc);
											echo "<td>";
											for ( $x = 0 ; $x < $StrLen ; $x++ ){
												if ( substr($obj_desc,$x,1) == "*" ){
													echo "<br><br>" . substr($obj_desc,$x,1);
												}
												else{
													echo substr($obj_desc,$x,1);
												}
											}
											echo "</td>";
										}
										?>
										<?php
										$c_sql="SELECT timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=ipcrms_kra.MFO_ID";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$timeline=$row['timeline'];
											echo '<td>' .$timeline. '</td>' ; 
										}
										?>
										
										<?php
										$c_sql="SELECT wpk FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=1 AND ipcrms_obj.KRA_ID=1";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$wpk=$row['wpk'];
											echo '<td>' , '<center>' .$wpk.'<center>' ,'</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT perf_5, perf_4, perf_3, perf_2, perf_1 FROM ipcrms_perf_indicator WHERE ipcrms_perf_indicator.OBJ_ID=1 AND ipcrms_perf_indicator.OBJ_ID=1";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$perf_5=$row['perf_5'];
											$perf_4=$row['perf_4'];
											$perf_3=$row['perf_2'];
											$perf_2=$row['perf_2'];
											$perf_1=$row['perf_1'];
											echo '<td>' .$perf_5. '<br>'.$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>' ; 
										}
										?>
										<td>
											<center>
											<input type="radio" name="quality" id="size_1" value="5">5</p>
											<input type="radio" name="quality" id="size_2" value="4">4</p>
											<input type="radio" name="quality" id="size_3" value="3">3</p>
											<input type="radio" name="quality" id="size_4" value="2">2</p>
											<input type="radio" name="quality" id="size_5" value="2">1</p>
											</center>
										</td>
										<td>
											<center>
											<input type="radio" name="efficiency" id="size_2" value="5">5</p>
											<input type="radio" name="efficiency" id="size_2" value="4">4</p>
											<input type="radio" name="efficiency" id="size_2" value="3">3</p>
											<input type="radio" name="efficiency" id="size_2" value="2">2</p>
											<input type="radio" name="efficiency" id="size_2" value="1">1</p>
											</center>
										</td> 
										<td>
											<center>
											<input type="radio" name="timeliness" id="size_11" value="5">5</p>
											<input type="radio" name="timeliness" id="size_12" value="4">4</p>
											<input type="radio" name="timeliness" id="size_13" value="3">3</p>
											<input type="radio" name="timeliness" id="size_14" value="2">2</p>
											<input type="radio" name="timeliness" id="size_15" value="1">1</p>
											</center>
										</td>
										
										<?php
										$sql="SELECT KRA_description, timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=2 AND ipcrms_kra.MFO_ID";
										$record=mysql_query($sql);
										while($row=mysql_fetch_assoc($record))
										{
										$KRA_description=$row['KRA_description'];

										echo '<tr class="w3-theme-bl5" >' ;
										echo '<td>','<center>' .$KRA_description. '</center>', '</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT obj_desc FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=2 AND ipcrms_obj.KRA_ID=2";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$obj_desc=$row['obj_desc'];
											//echo '<td>' .$obj_desc. '</td>' ; 
											$StrLen = strlen($obj_desc);
											echo "<td>";
											for ( $x = 0 ; $x < $StrLen ; $x++ ){
												if ( substr($obj_desc,$x,1) == "*" ){
													echo "<br><br>" . substr($obj_desc,$x,1);
												}
												else{
													echo substr($obj_desc,$x,1);
												}
											}
											echo "</td>";
											
											
										}
										?>
										<?php
										$c_sql="SELECT timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=ipcrms_kra.MFO_ID";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$timeline=$row['timeline'];
											echo '<td>' .$timeline. '</td>' ; 
										}
										?>
										
										<?php
										$c_sql="SELECT wpk FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=2 AND ipcrms_obj.KRA_ID=2";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$wpk=$row['wpk'];
											echo '<td>' , '<center>' .$wpk.'<center>' ,'</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT perf_5, perf_4, perf_3, perf_2, perf_1 FROM ipcrms_perf_indicator WHERE ipcrms_perf_indicator.perf_ID=2 AND ipcrms_perf_indicator.OBJ_ID=2";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$perf_5=$row['perf_5'];
											$perf_4=$row['perf_4'];
											$perf_3=$row['perf_2'];
											$perf_2=$row['perf_2'];
											$perf_1=$row['perf_1'];
											echo '<td>' .$perf_5. '<br>'.$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>' ; 
										}
										?>
										<td>
											<center>
											<input type="radio" name="quality1" id="size_1" value="5">5</p>
											<input type="radio" name="quality1" id="size_2" value="4">4</p>
											<input type="radio" name="quality1" id="size_3" value="3">3</p>
											<input type="radio" name="quality1" id="size_4" value="2">2</p>
											<input type="radio" name="quality1" id="size_5" value="2">1</p>
											</center>
										</td>
										<td>
											<center>
											<input type="radio" name="efficiency1" id="size_2" value="5">5</p>
											<input type="radio" name="efficiency1" id="size_2" value="4">4</p>
											<input type="radio" name="efficiency1" id="size_2" value="3">3</p>
											<input type="radio" name="efficiency1" id="size_2" value="2">2</p>
											<input type="radio" name="efficiency1" id="size_2" value="1">1</p>
											</center>
										</td> 
										<td>
											<center>
											<input type="radio" name="timeliness1" id="size_11" value="5">5</p>
											<input type="radio" name="timeliness1" id="size_12" value="4">4</p>
											<input type="radio" name="timeliness1" id="size_13" value="3">3</p>
											<input type="radio" name="timeliness1" id="size_14" value="2">2</p>
											<input type="radio" name="timeliness1" id="size_15" value="1">1</p>
											</center>
										</td>
										
										<?php
										$sql="SELECT KRA_description, timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=2 AND ipcrms_kra.MFO_ID";
										$record=mysql_query($sql);
										while($row=mysql_fetch_assoc($record))
										{
										$KRA_description=$row['KRA_description'];

										echo '<tr class="w3-theme-bl5" >' ;
										echo '<td>'	,'<center>' ,'</center>', '</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT obj_desc FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=3 AND ipcrms_obj.KRA_ID=2";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$obj_desc=$row['obj_desc'];
											//echo '<td>' .$obj_desc. '</td>' ; 
											$StrLen = strlen($obj_desc);
											echo "<td>";
											for ( $x = 0 ; $x < $StrLen ; $x++ ){
												if (( substr($obj_desc,$x,2) == "1." ) ||
													( substr($obj_desc,$x,2) == "2." ) ||
													 (substr($obj_desc,$x,2) == "3." ) ||
													  (substr($obj_desc,$x,2) == "4." ) ||
													   (substr($obj_desc,$x,2) == "5." ))
												{
													echo "<br><br>" . substr($obj_desc,$x,2);
													$x++;
												}
												else{
													echo substr($obj_desc,$x,1);
												}
											}
											echo "</td>"; 
											
											
										}
										?>
										<?php
										$c_sql="SELECT timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=ipcrms_kra.MFO_ID";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$timeline=$row['timeline'];
											echo '<td>' .$timeline. '</td>' ; 
										}
										?>
										
										<?php
										$c_sql="SELECT wpk FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=3 AND ipcrms_obj.KRA_ID=2";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$wpk=$row['wpk'];
											echo '<td>' , '<center>' .$wpk.'<center>' ,'</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT perf_5, perf_4, perf_3, perf_2, perf_1 FROM ipcrms_perf_indicator WHERE ipcrms_perf_indicator.perf_ID=3 AND ipcrms_perf_indicator.OBJ_ID=3";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$perf_5=$row['perf_5'];
											$perf_4=$row['perf_4'];
											$perf_3=$row['perf_2'];
											$perf_2=$row['perf_2'];
											$perf_1=$row['perf_1'];
											echo '<td>' .$perf_5. '<br>'.$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>' ; 
										}
										?>
										<td>
											<center>
											<input type="radio" name="quality2" value="5">5</p>
											<input type="radio" name="quality2" value="4">4</p>
											<input type="radio" name="quality2" value="3">3</p>
											<input type="radio" name="quality2" value="2">2</p>
											<input type="radio" name="quality2" value="2">1</p>
											</center>
										</td>
										<td>
											<center>
											<input type="radio" name="efficiency2" id="size_2" value="5">5</p>
											<input type="radio" name="efficiency2" id="size_2" value="4">4</p>
											<input type="radio" name="efficiency2" id="size_2" value="3">3</p>
											<input type="radio" name="efficiency2" id="size_2" value="2">2</p>
											<input type="radio" name="efficiency2" id="size_2" value="1">1</p>
											</center>
										</td> 
										<td>
											<center>
											<input type="radio" name="timeliness2" id="size_11" value="5">5</p>
											<input type="radio" name="timeliness2" id="size_12" value="4">4</p>
											<input type="radio" name="timeliness2" id="size_13" value="3">3</p>
											<input type="radio" name="timeliness2" id="size_14" value="2">2</p>
											<input type="radio" name="timeliness2" id="size_15" value="1">1</p>
											</center>
										</td>
										
										<?php
										$sql="SELECT KRA_description, timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=3 AND ipcrms_kra.MFO_ID";
										$record=mysql_query($sql);
										while($row=mysql_fetch_assoc($record))
										{
										$KRA_description=$row['KRA_description'];

										echo '<tr class="w3-theme-bl5" >' ;
										echo '<td>','<center>' .$KRA_description. '</center>', '</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT obj_desc FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=4 AND ipcrms_obj.KRA_ID=3";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$obj_desc=$row['obj_desc'];
											
											echo'<td>' .$obj_desc. '</td>' ; 
											
											
										}
										?>
										<?php
										$c_sql="SELECT timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=ipcrms_kra.MFO_ID";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$timeline=$row['timeline'];
											echo '<td>' .$timeline. '</td>' ; 
										}
										?>
										
										<?php
										$c_sql="SELECT wpk FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=4 AND ipcrms_obj.KRA_ID=3";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$wpk=$row['wpk'];
											echo '<td>' , '<center>' .$wpk.'<center>' ,'</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT perf_5, perf_4, perf_3, perf_2, perf_1 FROM ipcrms_perf_indicator WHERE ipcrms_perf_indicator.perf_ID=4 AND ipcrms_perf_indicator.OBJ_ID=4";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$perf_5=$row['perf_5'];
											$perf_4=$row['perf_4'];
											$perf_3=$row['perf_2'];
											$perf_2=$row['perf_2'];
											$perf_1=$row['perf_1'];
											echo '<td>' .$perf_5. '<br>'.$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>' ; 
										}
										?>
										<td>
											<center>
											<input type="radio" name="quality3" id="size_1" value="5">5</p>
											<input type="radio" name="quality3" id="size_2" value="4">4</p>
											<input type="radio" name="quality3" id="size_3" value="3">3</p>
											<input type="radio" name="quality3" id="size_4" value="2">2</p>
											<input type="radio" name="quality3" id="size_5" value="2">1</p>
											</center>
										</td>
										<td>
											<center>
											<input type="radio" name="efficiency3" id="size_2" value="5">5</p>
											<input type="radio" name="efficiency3" id="size_2" value="4">4</p>
											<input type="radio" name="efficiency3" id="size_2" value="3">3</p>
											<input type="radio" name="efficiency3" id="size_2" value="2">2</p>
											<input type="radio" name="efficiency3" id="size_2" value="1">1</p>
											</center>
										</td> 
										<td>
											<center>
											<input type="radio" name="timeliness3" id="size_11" value="5">5</p>
											<input type="radio" name="timeliness3" id="size_12" value="4">4</p>
											<input type="radio" name="timeliness3" id="size_13" value="3">3</p>
											<input type="radio" name="timeliness3" id="size_14" value="2">2</p>
											<input type="radio" name="timeliness3" id="size_15" value="1">1</p>
											</center>
										</td>
										<?php
										$sql="SELECT KRA_description, timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=3 AND ipcrms_kra.MFO_ID";
										$record=mysql_query($sql);
										while($row=mysql_fetch_assoc($record))
										{
										$KRA_description=$row['KRA_description'];

										echo '<tr class="w3-theme-bl5" >' ;
										echo '<td>'	,'<center>' ,'</center>', '</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT obj_desc FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=5 AND ipcrms_obj.KRA_ID=3";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$obj_desc=$row['obj_desc'];
											
											echo'<td>' .$obj_desc. '</td>' ; 
											
											
										}
										?>
										<?php
										$c_sql="SELECT timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=ipcrms_kra.MFO_ID";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$timeline=$row['timeline'];
											echo '<td>' .$timeline. '</td>' ; 
										}
										?>
										
										<?php
										$c_sql="SELECT wpk FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=5 AND ipcrms_obj.KRA_ID=3";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$wpk=$row['wpk'];
											echo '<td>' , '<center>' .$wpk.'<center>' ,'</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT perf_5, perf_4, perf_3, perf_2, perf_1 FROM ipcrms_perf_indicator WHERE ipcrms_perf_indicator.perf_ID=5 AND ipcrms_perf_indicator.OBJ_ID=5";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$perf_5=$row['perf_5'];
											$perf_4=$row['perf_4'];
											$perf_3=$row['perf_2'];
											$perf_2=$row['perf_2'];
											$perf_1=$row['perf_1'];
											echo '<td>' .$perf_5. '<br>'.$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>' ; 
										}
										?>
										<td>
											<center>
											<input type="radio" name="quality4" id="size_1" value="5">5</p>
											<input type="radio" name="quality4" id="size_2" value="4">4</p>
											<input type="radio" name="quality4" id="size_3" value="3">3</p>
											<input type="radio" name="quality4" id="size_4" value="2">2</p>
											<input type="radio" name="quality4" id="size_5" value="2">1</p>
											</center>
										</td>
										<td>
											<center>
											<input type="radio" name="efficiency4" id="size_2" value="5">5</p>
											<input type="radio" name="efficiency4" id="size_2" value="4">4</p>
											<input type="radio" name="efficiency4" id="size_2" value="3">3</p>
											<input type="radio" name="efficiency4" id="size_2" value="2">2</p>
											<input type="radio" name="efficiency4" id="size_2" value="1">1</p>
											</center>
										</td> 
										<td>
											<center>
											<input type="radio" name="timeliness4" id="size_11" value="5">5</p>
											<input type="radio" name="timeliness4" id="size_12" value="4">4</p>
											<input type="radio" name="timeliness4" id="size_13" value="3">3</p>
											<input type="radio" name="timeliness4" id="size_14" value="2">2</p>
											<input type="radio" name="timeliness4" id="size_15" value="1">1</p>
											</center>
										</td>
									</div>
								</div>
							</table>
						</div>  
				</div>
				
				
				
				<div class="tab-pane fade in active" id="form2-pills">
				
				
					<div class="container-fluid w3-text-black">
						<table width="80%" border="1">
							<div class="w3-card-4">
								<div class="col-md-1"> <br>
							
									<div align="center">
										
										<?php
										$sql="SELECT MFO_description FROM ipcrms_mfo WHERE ipcrms_mfo.MFO_ID=2";
										$record=mysql_query($sql);
										while($row=mysql_fetch_assoc($record))
										{
										$MFO_description=$row['MFO_description'];
										?>
										<tr class="w3-ul w3-border-top">
										  <td height="41" colspan="10"><h3 class="w3-theme-bl4"> <strong> <?php echo $MFO_description; ?></h3></td></strong>      
										<?php
										}
										?> 
										</tr>
										<tr class="w3-theme-bl4">
										  <td width="15%" rowspan="2"><div align="center"><strong>KRA'S</strong></div></td>
										  <td width="27%" rowspan="2"><div align="center"><strong>Objectives</strong></div></td>
										  <td width="8%" rowspan="2"><div align="center"><strong>Timeline</strong></div></td>
										  <td width="7%" rowspan="2"><div align="center"><strong>Weight per KRA</strong></div></td>
										  <td width="28%" rowspan="2"><p align="center"><strong>PERFORMANCE  INDICATOR</strong></p>
											  <div align="center">(Quality, Efficiency, Timeliness)</div></td>
										  <td colspan="3"><div align="center"><strong>ACTUAL  RESULTS</strong></div></td>
										</tr>
										<tr class="w3-theme-bl4">
										  <td width="5%"><div align="center">Q</div></td>
										  <td width="4%"><div align="center">E</div></td>
										  <td width="6%"><div align="center">T</div></td>
										</tr>
										
										<?php
										$sql="SELECT KRA_description, timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=4 AND ipcrms_kra.MFO_ID";
										$record=mysql_query($sql);
										while($row=mysql_fetch_assoc($record))
										{
										$KRA_description=$row['KRA_description'];

										echo '<tr class="w3-theme-bl5" >' ;
										echo '<td>'	,'<center>' .$KRA_description.'</center>', '</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT obj_desc FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=6 AND ipcrms_obj.KRA_ID=4";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$obj_desc=$row['obj_desc'];
											
											echo'<td>' .$obj_desc. '</td>' ; 
											
											
										}
										?>
										<?php
										$c_sql="SELECT timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=ipcrms_kra.MFO_ID";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$timeline=$row['timeline'];
											echo '<td>' .$timeline. '</td>' ; 
										}
										?>
										
										<?php
										$c_sql="SELECT wpk FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=6 AND ipcrms_obj.KRA_ID=4";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$wpk=$row['wpk'];
											echo '<td>' , '<center>' .$wpk.'<center>' ,'</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT perf_5, perf_4, perf_3, perf_2, perf_1 FROM ipcrms_perf_indicator WHERE ipcrms_perf_indicator.perf_ID=6 AND ipcrms_perf_indicator.OBJ_ID=6";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$perf_5=$row['perf_5'];
											$perf_4=$row['perf_4'];
											$perf_3=$row['perf_2'];
											$perf_2=$row['perf_2'];
											$perf_1=$row['perf_1'];
											echo '<td>' .$perf_5. '<br>'.$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>' ; 
										}
										?>
										<td>
											<center>
											<input type="radio" name="quality5" id="size_1" value="5">5</p>
											<input type="radio" name="quality5" id="size_2" value="4">4</p>
											<input type="radio" name="quality5" id="size_3" value="3">3</p>
											<input type="radio" name="quality5" id="size_4" value="2">2</p>
											<input type="radio" name="quality5" id="size_5" value="2">1</p>
											</center>
										</td>
										<td>
											<center>
											<input type="radio" name="efficiency5" id="size_2" value="5">5</p>
											<input type="radio" name="efficiency5" id="size_2" value="4">4</p>
											<input type="radio" name="efficiency5" id="size_2" value="3">3</p>
											<input type="radio" name="efficiency5" id="size_2" value="2">2</p>
											<input type="radio" name="efficiency5" id="size_2" value="1">1</p>
											</center>
										</td> 
										<td>
											<center>
											<input type="radio" name="timeliness5" id="size_11" value="5">5</p>
											<input type="radio" name="timeliness5" id="size_12" value="4">4</p>
											<input type="radio" name="timeliness5" id="size_13" value="3">3</p>
											<input type="radio" name="timeliness5" id="size_14" value="2">2</p>
											<input type="radio" name="timeliness5" id="size_15" value="1">1</p>
											</center>
										</td>
										
										<?php
										$sql="SELECT KRA_description, timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=4 AND ipcrms_kra.MFO_ID";
										$record=mysql_query($sql);
										while($row=mysql_fetch_assoc($record))
										{
										$KRA_description=$row['KRA_description'];

										echo '<tr class="w3-theme-bl5" >' ;
										echo '<td>'	,'<center>' ,'</center>', '</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT obj_desc FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=7 AND ipcrms_obj.KRA_ID=4";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$obj_desc=$row['obj_desc'];
											
											echo'<td>' .$obj_desc. '</td>' ; 
											
											
										}
										?>
										<?php
										$c_sql="SELECT timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=ipcrms_kra.MFO_ID";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$timeline=$row['timeline'];
											echo '<td>' .$timeline. '</td>' ; 
										}
										?>
										
										<?php
										$c_sql="SELECT wpk FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=7 AND ipcrms_obj.KRA_ID=4";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$wpk=$row['wpk'];
											echo '<td>' , '<center>' .$wpk.'<center>' ,'</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT perf_5, perf_4, perf_3, perf_2, perf_1 FROM ipcrms_perf_indicator WHERE ipcrms_perf_indicator.perf_ID=7 AND ipcrms_perf_indicator.OBJ_ID=7";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$perf_5=$row['perf_5'];
											$perf_4=$row['perf_4'];
											$perf_3=$row['perf_2'];
											$perf_2=$row['perf_2'];
											$perf_1=$row['perf_1'];
											echo '<td>' .$perf_5. '<br>'.$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>' ; 
										}
										?>
										<td>
											<center>
											<input type="radio" name="quality6" id="size_1" value="5">5</p>
											<input type="radio" name="quality6" id="size_2" value="4">4</p>
											<input type="radio" name="quality6" id="size_3" value="3">3</p>
											<input type="radio" name="quality6" id="size_4" value="2">2</p>
											<input type="radio" name="quality6" id="size_5" value="2">1</p>
											</center>
										</td>
										<td>
											<center>
											<input type="radio" name="efficiency6" id="size_2" value="5">5</p>
											<input type="radio" name="efficiency6" id="size_2" value="4">4</p>
											<input type="radio" name="efficiency6" id="size_2" value="3">3</p>
											<input type="radio" name="efficiency6" id="size_2" value="2">2</p>
											<input type="radio" name="efficiency6" id="size_2" value="1">1</p>
											</center>
										</td> 
										<td>
											<center>
											<input type="radio" name="timeliness6" id="size_11" value="5">5</p>
											<input type="radio" name="timeliness6" id="size_12" value="4">4</p>
											<input type="radio" name="timeliness6" id="size_13" value="3">3</p>
											<input type="radio" name="timeliness6" id="size_14" value="2">2</p>
											<input type="radio" name="timeliness6" id="size_15" value="1">1</p>
											</center>
										</td>
										
										<?php
										$sql="SELECT KRA_description, timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=4 AND ipcrms_kra.MFO_ID";
										$record=mysql_query($sql);
										while($row=mysql_fetch_assoc($record))
										{
										$KRA_description=$row['KRA_description'];

										echo '<tr class="w3-theme-bl5" >' ;
										echo '<td>'	,'<center>' ,'</center>', '</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT obj_desc FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=8 AND ipcrms_obj.KRA_ID=4";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$obj_desc=$row['obj_desc'];
											
											echo'<td>' .$obj_desc. '</td>' ; 
											
											
										}
										?>
										<?php
										$c_sql="SELECT timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=ipcrms_kra.MFO_ID";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$timeline=$row['timeline'];
											echo '<td>' .$timeline. '</td>' ; 
										}
										?>
										
										<?php
										$c_sql="SELECT wpk FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=8 AND ipcrms_obj.KRA_ID=4";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$wpk=$row['wpk'];
											echo '<td>' , '<center>' .$wpk.'<center>' ,'</td>' ; 
										}
										?>
										<?php
										$c_sql="SELECT perf_5, perf_4, perf_3, perf_2, perf_1 FROM ipcrms_perf_indicator WHERE ipcrms_perf_indicator.perf_ID=8 AND ipcrms_perf_indicator.OBJ_ID=8";
										$record=mysql_query($c_sql);
										while($row=mysql_fetch_assoc($record))
										{
											$perf_5=$row['perf_5'];
											$perf_4=$row['perf_4'];
											$perf_3=$row['perf_2'];
											$perf_2=$row['perf_2'];
											$perf_1=$row['perf_1'];
											echo '<td>' .$perf_5. '<br>'.$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>' ; 
										}
										?>
										<td>
											<center>
											<input type="radio" name="quality7" id="size_1" value="5">5</p>
											<input type="radio" name="quality7" id="size_2" value="4">4</p>
											<input type="radio" name="quality7" id="size_3" value="3">3</p>
											<input type="radio" name="quality7" id="size_4" value="2">2</p>
											<input type="radio" name="quality7" id="size_5" value="2">1</p>
											</center>
										</td>
										<td>
											<center>
											<input type="radio" name="efficiency7" id="size_2" value="5">5</p>
											<input type="radio" name="efficiency7" id="size_2" value="4">4</p>
											<input type="radio" name="efficiency7" id="size_2" value="3">3</p>
											<input type="radio" name="efficiency7" id="size_2" value="2">2</p>
											<input type="radio" name="efficiency7" id="size_2" value="1">1</p>
											</center>
										</td> 
										<td>
											<center>
											<input type="radio" name="timeliness7" id="size_11" value="5">5</p>
											<input type="radio" name="timeliness7" id="size_12" value="4">4</p>
											<input type="radio" name="timeliness7" id="size_13" value="3">3</p>
											<input type="radio" name="timeliness7" id="size_14" value="2">2</p>
											<input type="radio" name="timeliness7" id="size_15" value="1">1</p>
											</center>
										</td>
									</div>
								</div>
							</div>
						</table>
					</div> 
				
				</div>
				
				
	<div class="tab-pane fade in active" id="form3-pills">
	 <div class="container-fluid w3-text-black">
      <table width="80%" border="1">
        <div class="w3-card-4">
			<div class="col-md-1"> <br>
        
				<div align="center">
					
					<?php
					$sql="SELECT MFO_description FROM ipcrms_mfo WHERE ipcrms_mfo.MFO_ID=3";
					$record=mysql_query($sql);
					while($row=mysql_fetch_assoc($record))
					{
					$MFO_description=$row['MFO_description'];
					?>
					<tr class="w3-ul w3-border-top">
					  <td height="41" colspan="10"><h3 class="w3-theme-bl4"> <strong> <?php echo $MFO_description; ?></h3></td></strong>      
					<?php
					}
					?> 
					</tr>
					<tr class="w3-theme-bl4">
					  <td width="15%" rowspan="2"><div align="center"><strong>KRA'S</strong></div></td>
					  <td width="27%" rowspan="2"><div align="center"><strong>Objectives</strong></div></td>
					  <td width="8%" rowspan="2"><div align="center"><strong>Timeline</strong></div></td>
					  <td width="7%" rowspan="2"><div align="center"><strong>Weight per KRA</strong></div></td>
					  <td width="28%" rowspan="2"><p align="center"><strong>PERFORMANCE  INDICATOR</strong></p>
						  <div align="center">(Quality, Efficiency, Timeliness)</div></td>
					  <td colspan="3"><div align="center"><strong>ACTUAL  RESULTS</strong></div></td>
					</tr>
					<tr class="w3-theme-bl4">
					  <td width="5%"><div align="center">Q</div></td>
					  <td width="4%"><div align="center">E</div></td>
					  <td width="6%"><div align="center">T</div></td>
					</tr>
					
					<?php
					$sql="SELECT KRA_description, timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=5 AND ipcrms_kra.MFO_ID";
					$record=mysql_query($sql);
					while($row=mysql_fetch_assoc($record))
					{
					$KRA_description=$row['KRA_description'];

					echo '<tr class="w3-theme-bl5" >' ;
					echo '<td>'	,'<center>' .$KRA_description.'</center>', '</td>' ; 
					}
					?>
					<?php
					$c_sql="SELECT obj_desc FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=9 AND ipcrms_obj.KRA_ID=5";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$obj_desc=$row['obj_desc'];
						
						echo'<td>' .$obj_desc. '</td>' ; 
						
						
					}
					?>
					<?php
					$c_sql="SELECT timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=ipcrms_kra.MFO_ID";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$timeline=$row['timeline'];
						echo '<td>' .$timeline. '</td>' ; 
					}
					?>
					
					<?php
					$c_sql="SELECT wpk FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=9 AND ipcrms_obj.KRA_ID=5";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$wpk=$row['wpk'];
						echo '<td>' , '<center>' .$wpk.'<center>' ,'</td>' ; 
					}
					?>
					<?php
					$c_sql="SELECT perf_5, perf_4, perf_3, perf_2, perf_1 FROM ipcrms_perf_indicator WHERE ipcrms_perf_indicator.perf_ID=9 AND ipcrms_perf_indicator.OBJ_ID=9";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$perf_5=$row['perf_5'];
						$perf_4=$row['perf_4'];
						$perf_3=$row['perf_2'];
						$perf_2=$row['perf_2'];
						$perf_1=$row['perf_1'];
						echo '<td>' .$perf_5. '<br>'.$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>' ; 
					}
					?>
					<td>
						<center>
						<input type="radio" name="quality8" id="size_1" value="5">5</p>
						<input type="radio" name="quality8" id="size_2" value="4">4</p>
						<input type="radio" name="quality8" id="size_3" value="3">3</p>
						<input type="radio" name="quality8" id="size_4" value="2">2</p>
						<input type="radio" name="quality8" id="size_5" value="2">1</p>
						</center>
					</td>
					<td>
						<center>
						<input type="radio" name="efficiency8" id="size_2" value="5">5</p>
						<input type="radio" name="efficiency8" id="size_2" value="4">4</p>
						<input type="radio" name="efficiency8" id="size_2" value="3">3</p>
						<input type="radio" name="efficiency8" id="size_2" value="2">2</p>
						<input type="radio" name="efficiency8" id="size_2" value="1">1</p>
						</center>
					</td> 
					<td>
						<center>
						<input type="radio" name="timeliness8" id="size_11" value="5">5</p>
						<input type="radio" name="timeliness8" id="size_12" value="4">4</p>
						<input type="radio" name="timeliness8" id="size_13" value="3">3</p>
						<input type="radio" name="timeliness8" id="size_14" value="2">2</p>
						<input type="radio" name="timeliness8" id="size_15" value="1">1</p>
						</center>
					</td>
					
					<?php
					$sql="SELECT KRA_description, timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=5 AND ipcrms_kra.MFO_ID";
					$record=mysql_query($sql);
					while($row=mysql_fetch_assoc($record))
					{
					$KRA_description=$row['KRA_description'];

					echo '<tr class="w3-theme-bl5" >' ;
					echo '<td>'	,'<center>' ,'</center>', '</td>' ; 
					}
					?>
					<?php
					$c_sql="SELECT obj_desc FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=10 AND ipcrms_obj.KRA_ID=5";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$obj_desc=$row['obj_desc'];
						//echo '<td>' .$obj_desc. '</td>' ; 
						$StrLen = strlen($obj_desc);
						echo "<td>";
						for ( $x = 0 ; $x < $StrLen ; $x++ ){
							if ( substr($obj_desc,$x,1) == "*" ){
								echo "<br><br>" . substr($obj_desc,$x,1);
							}
							else{
								echo substr($obj_desc,$x,1);
							}
						}
						echo "</td>";
						
						
					}
					?>
					<?php
					$c_sql="SELECT timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=ipcrms_kra.MFO_ID";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$timeline=$row['timeline'];
						echo '<td>' .$timeline. '</td>' ; 
					}
					?>
					
					<?php
					$c_sql="SELECT wpk FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=10 AND ipcrms_obj.KRA_ID=5";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$wpk=$row['wpk'];
						echo '<td>' , '<center>' .$wpk.'<center>' ,'</td>' ; 
					}
					?>
					<?php
					$c_sql="SELECT perf_5, perf_4, perf_3, perf_2, perf_1 FROM ipcrms_perf_indicator WHERE ipcrms_perf_indicator.perf_ID=10 AND ipcrms_perf_indicator.OBJ_ID=10";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$perf_5=$row['perf_5'];
						$perf_4=$row['perf_4'];
						$perf_3=$row['perf_2'];
						$perf_2=$row['perf_2'];
						$perf_1=$row['perf_1'];
						echo '<td>' .$perf_5. '<br>'.$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>' ; 
					}
					?>
					<td>
						<center>
						<input type="radio" name="quality9" id="size_1" value="5">5</p>
						<input type="radio" name="quality9" id="size_2" value="4">4</p>
						<input type="radio" name="quality9" id="size_3" value="3">3</p>
						<input type="radio" name="quality9" id="size_4" value="2">2</p>
						<input type="radio" name="quality9" id="size_5" value="2">1</p>
						</center>
					</td>
					<td>
						<center>
						<input type="radio" name="efficiency9" id="size_2" value="5">5</p>
						<input type="radio" name="efficiency9" id="size_2" value="4">4</p>
						<input type="radio" name="efficiency9" id="size_2" value="3">3</p>
						<input type="radio" name="efficiency9" id="size_2" value="2">2</p>
						<input type="radio" name="efficiency9" id="size_2" value="1">1</p>
						</center>
					</td> 
					<td>
						<center>
						<input type="radio" name="timeliness9" id="size_11" value="5">5</p>
						<input type="radio" name="timeliness9" id="size_12" value="4">4</p>
						<input type="radio" name="timeliness9" id="size_13" value="3">3</p>
						<input type="radio" name="timeliness9" id="size_14" value="2">2</p>
						<input type="radio" name="timeliness9" id="size_15" value="1">1</p>
						</center>
					</td>
					
					<?php
					$sql="SELECT KRA_description, timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=5 AND ipcrms_kra.MFO_ID";
					$record=mysql_query($sql);
					while($row=mysql_fetch_assoc($record))
					{
					$KRA_description=$row['KRA_description'];

					echo '<tr class="w3-theme-bl5" >' ;
					echo '<td>'	,'<center>' ,'</center>', '</td>' ; 
					}
					?>
					<?php
					$c_sql="SELECT obj_desc FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=11 AND ipcrms_obj.KRA_ID=5";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$obj_desc=$row['obj_desc'];
						
						echo'<td>' .$obj_desc. '</td>' ; 
						
						
					}
					?>
					<?php
					$c_sql="SELECT timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=ipcrms_kra.MFO_ID";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$timeline=$row['timeline'];
						echo '<td>' .$timeline. '</td>' ; 
					}
					?>
					
					<?php
					$c_sql="SELECT wpk FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=11 AND ipcrms_obj.KRA_ID=5";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$wpk=$row['wpk'];
						echo '<td>' , '<center>' .$wpk.'<center>' ,'</td>' ; 
					}
					?>
					<?php
					$c_sql="SELECT perf_5, perf_4, perf_3, perf_2, perf_1 FROM ipcrms_perf_indicator WHERE ipcrms_perf_indicator.perf_ID=11 AND ipcrms_perf_indicator.OBJ_ID=11";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$perf_5=$row['perf_5'];
						$perf_4=$row['perf_4'];
						$perf_3=$row['perf_2'];
						$perf_2=$row['perf_2'];
						$perf_1=$row['perf_1'];
						echo '<td>' .$perf_5. '<br>'.$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>' ; 
					}
					?>
					<td>
						<center>
						<input type="radio" name="quality10" id="size_1" value="5">5</p>
						<input type="radio" name="quality10" id="size_2" value="4">4</p>
						<input type="radio" name="quality10" id="size_3" value="3">3</p>
						<input type="radio" name="quality10" id="size_4" value="2">2</p>
						<input type="radio" name="quality10" id="size_5" value="2">1</p>
						</center>
					</td>
					<td>
						<center>
						<input type="radio" name="efficiency10" id="size_2" value="5">5</p>
						<input type="radio" name="efficiency10" id="size_2" value="4">4</p>
						<input type="radio" name="efficiency10" id="size_2" value="3">3</p>
						<input type="radio" name="efficiency10" id="size_2" value="2">2</p>
						<input type="radio" name="efficiency10" id="size_2" value="1">1</p>
						</center>
					</td> 
					<td>
						<center>
						<input type="radio" name="timeliness10" id="size_11" value="5">5</p>
						<input type="radio" name="timeliness10" id="size_12" value="4">4</p>
						<input type="radio" name="timeliness10" id="size_13" value="3">3</p>
						<input type="radio" name="timeliness10" id="size_14" value="2">2</p>
						<input type="radio" name="timeliness10" id="size_15" value="1">1</p>
						</center>
					</td>
					
					<?php
					$sql="SELECT KRA_description, timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=6 AND ipcrms_kra.MFO_ID";
					$record=mysql_query($sql);
					while($row=mysql_fetch_assoc($record))
					{
					$KRA_description=$row['KRA_description'];

					echo '<tr class="w3-theme-bl5" >' ;
					echo '<td>'	,'<center>' .$KRA_description. '</center>', '</td>' ; 
					}
					?>
					<?php
					$c_sql="SELECT obj_desc FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=12 AND ipcrms_obj.KRA_ID=6";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$obj_desc=$row['obj_desc'];
						//echo '<td>' .$obj_desc. '</td>' ; 
						$StrLen = strlen($obj_desc);
						echo "<td>";
						for ( $x = 0 ; $x < $StrLen ; $x++ ){
							if ( substr($obj_desc,$x,1) == "*" ){
								echo "<br><br>" . substr($obj_desc,$x,1);
							}
							else{
								echo substr($obj_desc,$x,1);
							}
						}
						echo "</td>";
						
						
					}
					?>
					<?php
					$c_sql="SELECT timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=ipcrms_kra.MFO_ID";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$timeline=$row['timeline'];
						echo '<td>' .$timeline. '</td>' ; 
					}
					?>
					
					<?php
					$c_sql="SELECT wpk FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=12 AND ipcrms_obj.KRA_ID=6";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$wpk=$row['wpk'];
						echo '<td>' , '<center>' .$wpk.'<center>' ,'</td>' ; 
					}
					?>
					<?php
					$c_sql="SELECT perf_5, perf_4, perf_3, perf_2, perf_1 FROM ipcrms_perf_indicator WHERE ipcrms_perf_indicator.perf_ID=12 AND ipcrms_perf_indicator.OBJ_ID=12";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$perf_5=$row['perf_5'];
						$perf_4=$row['perf_4'];
						$perf_3=$row['perf_2'];
						$perf_2=$row['perf_2'];
						$perf_1=$row['perf_1'];
						echo '<td>' .$perf_5. '<br>'.$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>' ; 
					}
					?>
					<td>
						<center>
						<input type="radio" name="quality11" id="size_1" value="5">5</p>
						<input type="radio" name="quality11" id="size_2" value="4">4</p>
						<input type="radio" name="quality11" id="size_3" value="3">3</p>
						<input type="radio" name="quality11" id="size_4" value="2">2</p>
						<input type="radio" name="quality11" id="size_5" value="2">1</p>
						</center>
					</td>
					<td>
						<center>
						<input type="radio" name="efficiency11" id="size_2" value="5">5</p>
						<input type="radio" name="efficiency11" id="size_2" value="4">4</p>
						<input type="radio" name="efficiency11" id="size_2" value="3">3</p>
						<input type="radio" name="efficiency11" id="size_2" value="2">2</p>
						<input type="radio" name="efficiency11" id="size_2" value="1">1</p>
						</center>
					</td> 
					<td>
						<center>
						<input type="radio" name="timeliness11" id="size_11" value="5">5</p>
						<input type="radio" name="timeliness11" id="size_12" value="4">4</p>
						<input type="radio" name="timeliness11" id="size_13" value="3">3</p>
						<input type="radio" name="timeliness11" id="size_14" value="2">2</p>
						<input type="radio" name="timeliness11" id="size_15" value="1">1</p>
						</center>
					</td>
					
					<?php
					$sql="SELECT KRA_description, timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=6 AND ipcrms_kra.MFO_ID";
					$record=mysql_query($sql);
					while($row=mysql_fetch_assoc($record))
					{
					$KRA_description=$row['KRA_description'];

					echo '<tr class="w3-theme-bl5" >' ;
					echo '<td>'	,'<center>' ,'</center>', '</td>' ; 
					}
					?>
					<?php
					$c_sql="SELECT obj_desc FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=13 AND ipcrms_obj.KRA_ID=6";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$obj_desc=$row['obj_desc'];
						
						echo'<td>' .$obj_desc. '</td>' ; 
						
						
					}
					?>
					<?php
					$c_sql="SELECT timeline FROM ipcrms_kra WHERE ipcrms_kra.KRA_ID=ipcrms_kra.MFO_ID";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$timeline=$row['timeline'];
						echo '<td>' .$timeline. '</td>' ; 
					}
					?>
					
					<?php
					$c_sql="SELECT wpk FROM ipcrms_obj WHERE ipcrms_obj.OBJ_ID=13 AND ipcrms_obj.KRA_ID=6";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$wpk=$row['wpk'];
						echo '<td>' , '<center>' .$wpk.'<center>' ,'</td>' ; 
					}
					?>
					<?php
					$c_sql="SELECT perf_5, perf_4, perf_3, perf_2, perf_1 FROM ipcrms_perf_indicator WHERE ipcrms_perf_indicator.perf_ID=13 AND ipcrms_perf_indicator.OBJ_ID=13";
					$record=mysql_query($c_sql);
					while($row=mysql_fetch_assoc($record))
					{
						$perf_5=$row['perf_5'];
						$perf_4=$row['perf_4'];
						$perf_3=$row['perf_2'];
						$perf_2=$row['perf_2'];
						$perf_1=$row['perf_1'];
						echo '<td>' .$perf_5. '<br>'.$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>' ; 
					}
					?>
					<td>
						<center>
						<input type="radio" name="quality12" id="size_1" value="5">5</p>
						<input type="radio" name="quality12" id="size_2" value="4">4</p>
						<input type="radio" name="quality12" id="size_3" value="3">3</p>
						<input type="radio" name="quality12" id="size_4" value="2">2</p>
						<input type="radio" name="quality12" id="size_5" value="2">1</p>
						</center>
					</td>
					<td>
						<center>
						<input type="radio" name="efficiency12" id="size_2" value="5">5</p>
						<input type="radio" name="efficiency12" id="size_2" value="4">4</p>
						<input type="radio" name="efficiency12" id="size_2" value="3">3</p>
						<input type="radio" name="efficiency12" id="size_2" value="2">2</p>
						<input type="radio" name="efficiency12" id="size_2" value="1">1</p>
						</center>
					</td> 
					<td>
						<center>
						<input type="radio" name="timeliness12" id="size_11" value="5">5</p>
						<input type="radio" name="timeliness12" id="size_12" value="4">4</p>
						<input type="radio" name="timeliness12" id="size_13" value="3">3</p>
						<input type="radio" name="timeliness12" id="size_14" value="2">2</p>
						<input type="radio" name="timeliness12" id="size_15" value="1">1</p>
						</center>
					</td>
					
					
					</tr>
					
					</tr>
					
					
					
				</div>
			</div>
		</table>
	</div>  
     
	<center>
						<input class="btn btn-primary" type="submit" name="submit" value="SUBMIT" onClick="return verify(this);" ></a>
						<input class="btn btn-IMPORTANT" type="reset" name="reset" value="RESET" onClick="return verify(this);" >

					</center>
		</div>
	</div>
	
	
	
<br<br><Br><br<br><Br><br<br><Br><br<br><Br><br<br><Br>
</form>

<?php
	if (isset($_POST['submit']) && $_POST['submit']!=""){
		
		$quality=$_POST['quality'];
		$quality1=$_POST['quality1'];
		$quality2=$_POST['quality2'];
		$quality3=$_POST['quality3'];
		$quality4=$_POST['quality4'];
		$quality5=$_POST['quality5'];
		$quality6=$_POST['quality6'];
		$quality7=$_POST['quality7'];
		$quality8=$_POST['quality8'];
		$quality9=$_POST['quality9'];
		$quality10=$_POST['quality10'];
		$quality11=$_POST['quality11'];
		$quality12=$_POST['quality12'];
		$quality11=$_POST['quality11'];
		$quality12=$_POST['quality12'];
		
		
		$efficiency=$_POST['efficiency'];
		$efficiency1=$_POST['efficiency1'];
		$efficiency2=$_POST['efficiency2'];
		$efficiency3=$_POST['efficiency3'];
		$efficiency4=$_POST['efficiency4'];
		$efficiency5=$_POST['efficiency5'];
		$efficiency6=$_POST['efficiency6'];
		$efficiency7=$_POST['efficiency7'];
		$efficiency8=$_POST['efficiency8'];
		$efficiency9=$_POST['efficiency9'];
		$efficiency10=$_POST['efficiency10'];
		$efficiency11=$_POST['efficiency11'];
		$efficiency12=$_POST['efficiency12'];
		
		
		$timeliness=$_POST['timeliness'];
		$timeliness1=$_POST['timeliness1'];
		$timeliness2=$_POST['timeliness2'];
		$timeliness3=$_POST['timeliness3'];
		$timeliness4=$_POST['timeliness4'];
		$timeliness5=$_POST['timeliness5'];
		$timeliness6=$_POST['timeliness6'];
		$timeliness7=$_POST['timeliness7'];
		$timeliness8=$_POST['timeliness8'];
		$timeliness9=$_POST['timeliness9'];
		$timeliness10=$_POST['timeliness10'];
		$timeliness11=$_POST['timeliness11'];
		$timeliness12=$_POST['timeliness12'];
		
		if(mysql_query("INSERT INTO ipcrms_content(q_val, e_val, t_val, rating, score, perf_id , Personnel_ID) 
			VALUES($quality, $efficiency, $timeliness , ". ( $quality + $efficiency + $timeliness ) / 3 ." , ". (( $quality + $efficiency + $timeliness ) / 3)*0.10 ." , 12 , 1)"));
		{
			echo '';
		}	
		
		if(mysql_query("INSERT INTO ipcrms_content(q_val, e_val, t_val, rating, score, perf_id , Personnel_ID) 
			VALUES($quality1, $efficiency1, $timeliness1 , ". ( $quality1 + $efficiency1 + $timeliness1 ) / 3 ." , ". (( $quality1 + $efficiency1 + $timeliness1 ) / 3)*0.15 ." , 12 , 1)"));
		{
			echo '';
		}	
		if(mysql_query("INSERT INTO ipcrms_content(q_val, e_val, t_val, rating, score, perf_id , Personnel_ID) 
			VALUES($quality2, $efficiency2, $timeliness2 , ". ( $quality2 + $efficiency2 + $timeliness2 ) / 3 ." ,  ". (( $quality2 + $efficiency2 + $timeliness2 ) / 3)*0.15 ." , 13 , 1)"));
		{
			echo '';
		}	
		if(mysql_query("INSERT INTO ipcrms_content(q_val, e_val, t_val, rating, score, perf_id , Personnel_ID) 
			VALUES($quality3, $efficiency3, $timeliness3 , ". ( $quality3 + $efficiency3 + $timeliness3 ) / 3 ." , ". (( $quality3 + $efficiency3 + $timeliness3 ) / 3)*0.10 ." , 12 , 1)"));
		{
			echo '';
		}
		if(mysql_query("INSERT INTO ipcrms_content(q_val, e_val, t_val, rating, score, perf_id , Personnel_ID) 
			VALUES($quality4, $efficiency4, $timeliness4 , ". ( $quality4 + $efficiency4 + $timeliness4 ) / 3 ." , ". (( $quality4 + $efficiency4 + $timeliness4 ) / 3)*0.10 ." , 12 , 1)"));
		{
			echo '';
		}
		if(mysql_query("INSERT INTO ipcrms_content(q_val, e_val, t_val, rating, score, perf_id , Personnel_ID) 
			VALUES($quality5, $efficiency5, $timeliness5 , ". ( $quality5 + $efficiency5 + $timeliness5 ) / 3 ." , ". (( $quality5 + $efficiency5 + $timeliness5 ) / 3)*0.10 ." , 12 , 1)"));
		{
			echo '';
		}
		if(mysql_query("INSERT INTO ipcrms_content(q_val, e_val, t_val, rating, score, perf_id , Personnel_ID) 
			VALUES($quality6, $efficiency6, $timeliness6 , ". ( $quality6 + $efficiency6 + $timeliness6 ) / 3 ." , ". (( $quality6 + $efficiency6 + $timeliness6 ) / 3)*0.10 ." , 12 , 1)"));
		{
			echo '';
		}
		if(mysql_query("INSERT INTO ipcrms_content(q_val, e_val, t_val, rating, score, perf_id , Personnel_ID) 
			VALUES($quality7, $efficiency7, $timeliness7 , ". ( $quality7 + $efficiency7 + $timeliness7 ) / 3 ." , ". (( $quality7 + $efficiency7 + $timeliness7 ) / 3)*0.10 ." , 12 , 1)"));
		{
			echo '';
		}	
		if(mysql_query("INSERT INTO ipcrms_content(q_val, e_val, t_val, rating, score, perf_id , Personnel_ID) 
			VALUES($quality8, $efficiency8, $timeliness8 , ". ( $quality8 + $efficiency8 + $timeliness8 ) / 3 ." , ". (( $quality8 + $efficiency8 + $timeliness8 ) / 3)*0.10 ." , 12 , 1)"));
		{
			echo '';
		}
		if(mysql_query("INSERT INTO ipcrms_content(q_val, e_val, t_val, rating, score, perf_id , Personnel_ID) 
			VALUES($quality9, $efficiency9, $timeliness9 , ". ( $quality9 + $efficiency9 + $timeliness9 ) / 3 ." , ". (( $quality9 + $efficiency9 + $timeliness9 ) / 3)*0.10 ." , 12 , 1)"));
		{
			echo '';
		}
		if(mysql_query("INSERT INTO ipcrms_content(q_val, e_val, t_val, rating, score, perf_id , Personnel_ID) 
			VALUES($quality10, $efficiency10, $timeliness10 , ". ( $quality10 + $efficiency10 + $timeliness10 ) / 3 ." , ". (( $quality10 + $efficiency10 + $timeliness10 ) / 3)*0.10 ." , 12 , 1)"));
		{
			echo '';
		}
		if(mysql_query("INSERT INTO ipcrms_content(q_val, e_val, t_val, rating, score, perf_id , Personnel_ID) 
			VALUES($quality11, $efficiency11, $timeliness11 , ". ( $quality11 + $efficiency11 + $timeliness11 ) / 3 ." , ". (( $quality11 + $efficiency11 + $timeliness11 ) / 3)*0.10 ." , 12 , 1)"));
		{
			echo '';
		}
		if(mysql_query("INSERT INTO ipcrms_content(q_val, e_val, t_val, rating, score, perf_id , Personnel_ID) 
			VALUES($quality12, $efficiency12, $timeliness12 , ". ( $quality12 + $efficiency12 + $timeliness12 ) / 3 ." , ". (( $quality12 + $efficiency12 + $timeliness12 ) / 3)*0.10 ." , 12 , 1)"));
		{
			echo '';
		}	
	}

?>

      
                <!-- /.col-lg-4 -->



<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="./js/alert.js"></script>
<script src="./js/slideshow.js"></script>
<script src="./js/backToTop.js"></script>
<script src="./js/sideNav.js"></script>
<script src="./js/showNav.js"></script>
</div>
<br>
<br>
<br>
<!-- Footer -->
<footer class="container-fluid w3-theme-bd5" style="padding-top:10px;padding-bottom:20px">
    <div class="row">
        <div class="col-lg-4 col-md-4 w3-left">
            <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P A N A H A S</h2>
            <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Rights Reserved &copy; 2017</h6>
        </div>
        <div class="col-lg-4 col-md-4 w3-right">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Us:</h5>
            <a href="#"><i class="fa fa-bullseye w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-phone w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-facebook w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-twitter w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-google-plus w3-xlarge"></i></a>
        </div>
    </div>
</footer>
    
</body>
</html>

