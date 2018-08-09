
<!DOCTYPE html>
<html lang="en" >
<?php

include("../../db_connect.php");
session_start();

include("../include/session.php");  


?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>Admin</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/style.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="../../css/w3.css">
    
    <!-- Documents Path -->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/s.css">
    <link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/metisMenu.min.css" type="text/css">
    
	<link rel="stylesheet" href="../../vendor/morris.js/morris.css">  

    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../Template (reference)/vendor/jquery/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../Template (reference)/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js1/jquery.js" type="text/javascript"></script>
	
	<style>
	body {
        color: #404E67;
        background: #FFFFFF;
		font-family: 'arial', sans-serif;
	}	
	.icon-background4 {
    color: #36f40b;
	}
	
	
	</style>		
    </head>
<script>
	function showPat(str) {
	  if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	  } 
	  if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
		if (this.readyState==4 && this.status==200) {
		  document.getElementById("txtHint").innerHTML=this.responseText;
		}
	  }
	  xmlhttp.open("GET","getstat.php?r="+str,true);
	  xmlhttp.send();
	}
</script>
<script type="text/javascript">
	window.onload = function () {
		<?php
			mysqli_query($mysqli, "LOCK TABLES css_school_yr READ");
			
			$updateyear = mysqli_query($mysqli,"SELECT year from css_school_yr
			WHERE status = 'active'")
			or die(mysqli_error($mysqli));
			$fuyr = mysqli_fetch_assoc($updateyear);
			
			if(empty($fuyr))
			{
				$uyrstart = 0000;
				$uyrend = 0000;
			}
			else
			{
				$explodeupdate =explode("-",$fuyr['year']); 
				$uyrstart = $explodeupdate['0'];
				$uyrend = $explodeupdate['1'];
			}
			mysqli_query($mysqli, "UNLOCK TABLES");
		
			mysqli_query($mysqli, "LOCK TABLES scms_consultation, pims_personnel, sis_student, scms_bmi_rec, sis_student, cms_account, sis_stu_rec, css_section, css_school_yr READ");
			
			$sq="SELECT DATE_FORMAT(scms_consultation.cons_date, '%Y') AS Month, COUNT(scms_consultation.patient_id) AS Total FROM scms_consultation 
				WHERE (MONTH(scms_consultation.cons_date) IN (4,5,6,7,8,9,10,11,12) AND YEAR(scms_consultation.cons_date) = '".$uyrstart."') OR 
				(MONTH(scms_consultation.cons_date) IN (1,2,3) AND YEAR(scms_consultation.cons_date) = '".$uyrend."')
				GROUP BY Month ORDER BY YEAR(scms_consultation.cons_date), MONTH(scms_consultation.cons_date)";
			$re=mysqli_query($mysqli,$sq);
			$totalpat = 0;
			while($row=mysqli_fetch_array($re))
			{ 
				$totalpat = $totalpat + $row['Total'];
				$ye_ar = $row['Month'];
			}	
			
			
		?>
		var chart1 = new CanvasJS.Chart("chartContainer1",
		{
			
			/*<?php 
			$luh = 1;
			function luh() {
   $luh=0;
}
			if ($luh==1){
			echo'width:550,';
			}
			else{
				echo'width:450,';
			}
			?>*/
			width:530,
			height: 300,

			title:{
				text: "Monthly Patient Count: <?php echo $ye_ar;?>", 
				margin: 30,
				fontFamily: "Arial",
				fontSize: 18
			},
			subtitles:[
			{
				text: "Total: <?php echo $totalpat;?>",
				margin: 30,
				fontFamily: "arial",
				fontWeight: "normal",
				fontSize: 14,
			}
			],
                exportEnabled: true,
				animationEnabled: true,
			axisX:{

				gridColor: "gray",
				tickColor: "black",				
				labelFontFamily: "Arial",
				

			},                        
                        toolTip:{
                          shared:true
                        },
			theme: "theme2",
			axisY: {
				gridColor: "gray",
				tickColor: "gray",
				labelFontFamily: "Arial",

			},
			legend:{
				verticalAlign: "center",
				horizontalAlign: "right"
			},
			data: [
			{        
				type: "line",
				showInLegend: true,
				lineThickness: 2,
				name: "Patient Count",
				markerType: "circle",
				color: "#265173",
				dataPoints: [
					<?php
					  $sql="SELECT DATE_FORMAT(scms_consultation.cons_date, '%b') AS Month, COUNT(scms_consultation.patient_id) AS Total FROM scms_consultation 
								WHERE (MONTH(scms_consultation.cons_date) IN (4,5,6,7,8,9,10,11,12) AND YEAR(scms_consultation.cons_date) = '".$uyrstart."') OR 
								(MONTH(scms_consultation.cons_date) IN (1,2,3) AND YEAR(scms_consultation.cons_date) = '".$uyrend."')
								GROUP BY Month ORDER BY YEAR(scms_consultation.cons_date), MONTH(scms_consultation.cons_date)";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$mon=$row['Month'];
						$total=$row['Total'];
					?>
					{ label: "<?php echo $mon; ?>",  y: <?php echo $total; ?>  },
					<?php	
						}
					?>
				]
			},
		],
          legend:{
            cursor:"pointer",
			fontFamily: "Arial",			
            itemclick:function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              	e.dataSeries.visible = false;
              }
              else{
                e.dataSeries.visible = true;
              }
              chart1.render();
            }
          }
		});
<!--chart2-->		
	<?php
	 $fetch_yr = mysqli_query($mysqli, "SELECT * FROM css_school_yr
					 WHERE status = 'active'")
					 or die(mysqli_error($mysqli));
					 
					 $year = mysqli_fetch_array($fetch_yr);
					 
					 $y = $year['year'];
					 $yr =explode("-",$y);
					 $s = $yr[0]."-06-01";
					 $e = $yr[1]."-03-31";
	
	$sq="SELECT scms_bmi_rec.nutri_status AS Status, COUNT(scms_bmi_rec.bmi_no) AS Total 
			FROM `scms_bmi_rec`
			WHERE bmi_date_of_update BETWEEN '".$s."' AND '".$e."'
			GROUP BY Status";
		$re=mysqli_query($mysqli,$sq);
		$t = 0;
	while($r = mysqli_fetch_array($re))
	{
		$t = $t + $r['Total'];
	}
	?>
								
	 var chart2 = new CanvasJS.Chart("chartContainer2",
    {
		width:350,
		height: 300,
		title:{
        text: "Overall Nutritional Status",
		
		margin: 30,
        fontFamily: "arial",
        fontWeight: "normal",
		fontSize: 18,
      },
	  subtitles:[
		{
			text: "Total: <?php echo $t;?>",
			margin: 30,
			fontFamily: "arial",
			fontWeight: "normal",
			fontSize: 14,
		}
		],
        exportEnabled: true,
		animationEnabled: true,	  

      legend:{
        verticalAlign: "bottom",
        horizontalAlign: "left",
      },
      data: [
      {
        //startAngle: 15,
       indexLabelFontSize: 12,
       indexLabelFontFamily: "arial",
       indexLabelFontColor: "black",
       indexLabelLineColor: "black",
       indexLabelPlacement: "outside",
       type: "doughnut",
       showInLegend: true,
	   margin: 10,
       dataPoints: [
					<?php
					 $fetch_yr = mysqli_query($mysqli, "SELECT * FROM css_school_yr
					 WHERE status = 'active'")
					 or die(mysqli_error($mysqli));
					 
					 $year = mysqli_fetch_array($fetch_yr);
					 
					 $y = $year['year'];
					 $yr =explode("-",$y);
					 $s = $yr[0]."-06-01";
					 $e = $yr[1]."-03-31";
					
					  $sql="SELECT scms_bmi_rec.nutri_status AS Status, COUNT(scms_bmi_rec.bmi_no) AS Total 
							FROM `scms_bmi_rec`
							WHERE bmi_date_of_update BETWEEN '".$s."' AND '".$e."'
							GROUP BY Status";
							$res=mysqli_query($mysqli,$sql);
							
					  while($row=mysqli_fetch_array($res))
					  { 
						$mon=$row['Status'];
						$total=$row['Total'];	
						$per = ($total / $t) * 100;
						$percent = round($per, 2);
					?>
					{ label: "<?php echo $percent.'% '.$mon; ?>", y: <?php echo $total; ?>, legendText:"<?php echo $mon.': '.$total; ?>"   },
					<?php	
						}
					?>	

       ]
     }
     ]
   });	

     
chart1.render();
chart2.render();

<!--chart7-->
    var chart = new CanvasJS.Chart("chartContainer7",
    {
		width:325,
		height: 250,
      title:{
        text: "GRADE 7",
		margin: 15,
		fontFamily: "arial",
		fontSize: 15,
		fontColor: "Black"		
      },
        axisX:{

				gridColor: "gray",
				tickColor: "black",				
				labelFontFamily: "Arial",
				

			},                        
        exportEnabled: true,
		animationEnabled: true,	  
      axisY: {
        title: "",
		gridColor: "gray",
		tickColor: "gray",

      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme2",
      data: [

      {        
        type: "column",  
        showInLegend: false, 
        legendMarkerColor: "Silver",
        legendText: "",
        dataPoints: [      
					<?php
					  $sql="SELECT scms_bmi_rec.nutri_status AS Status, COUNT(scms_bmi_rec.bmi_no) AS Total
							FROM scms_bmi_rec, sis_student, cms_account, sis_stu_rec, css_section 
							WHERE scms_bmi_rec.cms_account_ID = cms_account.cms_account_ID AND
							cms_account.lrn = sis_student.lrn AND
							sis_student.lrn = sis_stu_rec.lrn AND
							sis_stu_rec.section_id = css_section.SECTION_ID AND
							css_section.YEAR_LEVEL = '7'
							GROUP BY scms_bmi_rec.nutri_status";
							$res=mysqli_query($mysqli,$sql);
							
					$stat = ["Severely Wasted", "Wasted", "Normal", "Overweight", "Obese"];
					$total = ['0', '0', '0', '0', '0'];
					  while($row=mysqli_fetch_array($res))
					  { 
						if($row['Status'] == 'Severely Wasted')
						{
							$total[0] = $row['Total'];
						}
						else if($row['Status'] == 'Wasted')
						{
							$total[1] = $row['Total'];
						}
						else if($row['Status'] == 'Normal')
						{
							$total[2] = $row['Total'];
						}
						else if($row['Status'] == 'Overweight')
						{
							$total[3] = $row['Total'];
						}
						else if($row['Status'] == 'Obese')
						{
							$total[4] = $row['Total'];
						}
						
					  }
					  $statcount = 0;
					while($statcount < 5)
					{
						$s=$stat[$statcount];
						$totalf=$total[$statcount];
					?>
					{ label: "<?php echo $s; ?>",  y: <?php echo $totalf; ?>  },
					<?php	
					$statcount++;	}
					?>
					]
      }   
      ]
    });


chart.render();

 function chartTab2() {
 <!--chart8-->
    var chart1 = new CanvasJS.Chart("chartContainer8",
    {
		width:275,
		height: 250,
	title:{
        text: "GRADE 8",
		margin: 15,
		fontFamily: "arial",
		fontSize: 15,
		fontColor: "Black",
      },
        exportEnabled: true,
		animationEnabled: true,	
        axisX:{

				gridColor: "gray",
				tickColor: "black",				
				labelFontFamily: "Arial",
				

			},         
		axisY: {
        title: "",
		gridColor: "Gray",
		tickColor: "Gray",

      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme2",
      data: [

      {        
        type: "column",  
        showInLegend: false, 
        legendMarkerColor: "Silver",
        legendText: "",
		fontFamily: "Arial",
        dataPoints: [      
					<?php
					  $sql="SELECT scms_bmi_rec.nutri_status AS Status, COUNT(scms_bmi_rec.bmi_no) AS Total
							FROM scms_bmi_rec, sis_student, cms_account, sis_stu_rec, css_section 
							WHERE scms_bmi_rec.cms_account_ID = cms_account.cms_account_ID AND
							cms_account.lrn = sis_student.lrn AND
							sis_student.lrn = sis_stu_rec.lrn AND
							sis_stu_rec.section_id = css_section.SECTION_ID AND
							css_section.YEAR_LEVEL = '8'
							GROUP BY scms_bmi_rec.nutri_status";
							$res=mysqli_query($mysqli,$sql);
							
					$stat = ["Severely Wasted", "Wasted", "Normal", "Overweight", "Obese"];
					$total = ['0', '0', '0', '0', '0'];
					  while($row=mysqli_fetch_array($res))
					  { 
						if($row['Status'] == 'Severely Wasted')
						{
							$total[0] = $row['Total'];
						}
						else if($row['Status'] == 'Wasted')
						{
							$total[1] = $row['Total'];
						}
						else if($row['Status'] == 'Normal')
						{
							$total[2] = $row['Total'];
						}
						else if($row['Status'] == 'Overweight')
						{
							$total[3] = $row['Total'];
						}
						else if($row['Status'] == 'Obese')
						{
							$total[4] = $row['Total'];
						}
						
					  }
					  $statcount = 0;
					while($statcount < 5)
					{
						$s=$stat[$statcount];
						$totalf=$total[$statcount];
					?>
					{ label: "<?php echo $s; ?>",  y: <?php echo $totalf; ?>  },
					<?php	
					$statcount++;	}
					?>
					]
      }   
      ]
    });
    chart1.render();
  }

$('#bs-tab2').on("shown.bs.tab",function(){
      chartTab2();
      $('#bs-tab2').off(); // to remove the binded event after the initial rendering
  });
  
  function chartTab3() {
<!--chart9-->
    var chart2 = new CanvasJS.Chart("chartContainer9",
    {
		width:275,
		height: 250,
	title:{
        text: "GRADE 9",
		margin: 15,
		fontFamily: "arial",
		fontSize: 15,
		fontColor: "Black"		
      },
        exportEnabled: true,
		animationEnabled: true,	  
        axisX:{

				gridColor: "gray",
				tickColor: "black",				
				labelFontFamily: "Arial",
				

			},
        axisY: {
        title: "",
		gridColor: "gray",
		tickColor: "gray",

      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center",
		fontFamily: "arial black",
      },
      theme: "theme2",
      data: [

      {        
        type: "column",  
        showInLegend: false, 
        legendMarkerColor: "Silver",
        legendText: "",
        dataPoints: [      
					<?php
					  $sql="SELECT scms_bmi_rec.nutri_status AS Status, COUNT(scms_bmi_rec.bmi_no) AS Total
							FROM scms_bmi_rec, sis_student, cms_account, sis_stu_rec, css_section 
							WHERE scms_bmi_rec.cms_account_ID = cms_account.cms_account_ID AND
							cms_account.lrn = sis_student.lrn AND
							sis_student.lrn = sis_stu_rec.lrn AND
							sis_stu_rec.section_id = css_section.SECTION_ID AND
							css_section.YEAR_LEVEL = '9'
							GROUP BY scms_bmi_rec.nutri_status";
							$res=mysqli_query($mysqli,$sql);
							
					 $stat = ["Severely Wasted", "Wasted", "Normal", "Overweight", "Obese"];
					$total = ['0', '0', '0', '0', '0'];
					  while($row=mysqli_fetch_array($res))
					  { 
						if($row['Status'] == 'Severely Wasted')
						{
							$total[0] = $row['Total'];
						}
						else if($row['Status'] == 'Wasted')
						{
							$total[1] = $row['Total'];
						}
						else if($row['Status'] == 'Normal')
						{
							$total[2] = $row['Total'];
						}
						else if($row['Status'] == 'Overweight')
						{
							$total[3] = $row['Total'];
						}
						else if($row['Status'] == 'Obese')
						{
							$total[4] = $row['Total'];
						}
						
					  }
					  $statcount = 0;
					while($statcount < 5)
					{
						$s=$stat[$statcount];
						$totalf=$total[$statcount];
					?>
					{ label: "<?php echo $s; ?>",  y: <?php echo $totalf; ?>  },
					<?php	
					$statcount++;	}
					?>
					]
      }   
      ]
    });
    chart2.render();
  }

$('#bs-tab3').on("shown.bs.tab",function(){
      chartTab3();
      $('#bs-tab3').off(); // to remove the binded event after the initial rendering
  }); 
  
   function chartTab4() {
<!--chart10-->
    var chart3 = new CanvasJS.Chart("chartContainer10",
    {
		width:275,
		height: 250,
	title:{
        text: "GRADE 10",
		margin: 15,
		fontFamily: "arial",
		fontSize: 15,
		fontColor: "Black"		
      },
        exportEnabled: true,
		animationEnabled: true,	
        axisX:{

				gridColor: "gray",
				tickColor: "black",				
				labelFontFamily: "Arial",
				

			},          
	  axisY: {
        title: "",
		gridColor: "Gray",
		tickColor: "Gray",
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center",
		fontFamily: "arial",		
      },
      theme: "theme2",
      data: [

      {        
        type: "column",  
        showInLegend: false, 
        legendMarkerColor: "Silver",
        legendText: "",
        dataPoints: [      
					<?php
					  $sql="SELECT scms_bmi_rec.nutri_status AS Status, COUNT(scms_bmi_rec.bmi_no) AS Total
							FROM scms_bmi_rec, sis_student, cms_account, sis_stu_rec, css_section 
							WHERE scms_bmi_rec.cms_account_ID = cms_account.cms_account_ID AND
							cms_account.lrn = sis_student.lrn AND
							sis_student.lrn = sis_stu_rec.lrn AND
							sis_stu_rec.section_id = css_section.SECTION_ID AND
							css_section.YEAR_LEVEL = '10'
							GROUP BY scms_bmi_rec.nutri_status";
							$res=mysqli_query($mysqli,$sql);
					$stat = ["Severely Wasted", "Wasted", "Normal", "Overweight", "Obese"];
					$total = ['0', '0', '0', '0', '0'];
					  while($row=mysqli_fetch_array($res))
					  { 
						if($row['Status'] == 'Severely Wasted')
						{
							$total[0] = $row['Total'];
						}
						else if($row['Status'] == 'Wasted')
						{
							$total[1] = $row['Total'];
						}
						else if($row['Status'] == 'Normal')
						{
							$total[2] = $row['Total'];
						}
						else if($row['Status'] == 'Overweight')
						{
							$total[3] = $row['Total'];
						}
						else if($row['Status'] == 'Obese')
						{
							$total[4] = $row['Total'];
						}
						
					  }
					  $statcount = 0;
					while($statcount < 5)
					{
						$s=$stat[$statcount];
						$totalf=$total[$statcount];
					?>
					{ label: "<?php echo $s; ?>",  y: <?php echo $totalf; ?>  },
					<?php	
					$statcount++;	}
					?>
					]
      }   
      ]
    });
	
    chart3.render();
  }

$('#bs-tab4').on("shown.bs.tab",function(){
      chartTab4();
      $('#bs-tab4').off(); // to remove the binded event after the initial rendering
  });  
  
    function chartTab5() {
<!--chart11-->
    var chart4 = new CanvasJS.Chart("chartContainer11",
    {
		width:275,
		height: 250,
	title:{
        text: "GRADE 11",
		margin: 15,
		fontFamily: "arial",
		fontSize: 15,
		fontColor: "Black"		
      },
        axisX:{

				gridColor: "gray",
				tickColor: "black",				
				labelFontFamily: "Arial",
				

			},        
        exportEnabled: true,
		animationEnabled: true,	  	  
      axisY: {
        title: "",
		gridColor: "Gray",
		tickColor: "Gray",
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme2",
      data: [

      {        
        type: "column",  
        showInLegend: false, 
        legendMarkerColor: "Silver",
        legendText: "",
        dataPoints: [      
					<?php
					  $sql="SELECT scms_bmi_rec.nutri_status AS Status, COUNT(scms_bmi_rec.bmi_no) AS Total
							FROM scms_bmi_rec, sis_student, cms_account, sis_stu_rec, css_section 
							WHERE scms_bmi_rec.cms_account_ID = cms_account.cms_account_ID AND
							cms_account.lrn = sis_student.lrn AND
							sis_student.lrn = sis_stu_rec.lrn AND
							sis_stu_rec.section_id = css_section.SECTION_ID AND
							css_section.YEAR_LEVEL = '11'
							GROUP BY scms_bmi_rec.nutri_status";
							$res=mysqli_query($mysqli,$sql);
					$stat = ["Severely Wasted", "Wasted", "Normal", "Overweight", "Obese"];
					$total = ['0', '0', '0', '0', '0'];
					  while($row=mysqli_fetch_array($res))
					  { 
						if($row['Status'] == 'Severely Wasted')
						{
							$total[0] = $row['Total'];
						}
						else if($row['Status'] == 'Wasted')
						{
							$total[1] = $row['Total'];
						}
						else if($row['Status'] == 'Normal')
						{
							$total[2] = $row['Total'];
						}
						else if($row['Status'] == 'Overweight')
						{
							$total[3] = $row['Total'];
						}
						else if($row['Status'] == 'Obese')
						{
							$total[4] = $row['Total'];
						}
						
					  }
					  $statcount = 0;
					while($statcount < 5)
					{
						$s=$stat[$statcount];
						$totalf=$total[$statcount];
					?>
					{ label: "<?php echo $s; ?>",  y: <?php echo $totalf; ?>  },
					<?php	
					$statcount++;	}
					?>
					]
      }   
      ]
    });
	
    chart4.render();
  }

$('#bs-tab5').on("shown.bs.tab",function(){
      chartTab5();
      $('#bs-tab5').off(); // to remove the binded event after the initial rendering
  });  
 
 function chartTab6() {
	<!--chart12-->
    var chart5 = new CanvasJS.Chart("chartContainer12",
    {
		width:275,
		height: 250,
	title:{
        text: "GRADE 12",
		margin: 15,
		fontFamily: "arial",
		fontSize: 15,
		fontColor: "Black"
      },
        axisX:{

				gridColor: "gray",
				tickColor: "black",				
				labelFontFamily: "Arial",
				

			},          
        exportEnabled: true,
		animationEnabled: true,	  
      axisY: {
        title: "",
		gridColor: "Gray",
		tickColor: "Gray",
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme2",
      data: [

      {        
        type: "column",  
        showInLegend: false, 
        legendMarkerColor: "Silver",
        legendText: "",
        dataPoints: [      
					<?php
					  $sql="SELECT scms_bmi_rec.nutri_status AS Status, COUNT(scms_bmi_rec.bmi_no) AS Total
							FROM scms_bmi_rec, sis_student, cms_account, sis_stu_rec, css_section 
							WHERE scms_bmi_rec.cms_account_ID = cms_account.cms_account_ID AND
							cms_account.lrn = sis_student.lrn AND
							sis_student.lrn = sis_stu_rec.lrn AND
							sis_stu_rec.section_id = css_section.SECTION_ID AND
							css_section.YEAR_LEVEL = '12'
							GROUP BY scms_bmi_rec.nutri_status";
							$res=mysqli_query($mysqli,$sql);
					$stat = ["Severely Wasted", "Wasted", "Normal", "Overweight", "Obese"];
					$total = ['0', '0', '0', '0', '0'];
					  while($row=mysqli_fetch_array($res))
					  { 
						if($row['Status'] == 'Severely Wasted')
						{
							$total[0] = $row['Total'];
						}
						else if($row['Status'] == 'Wasted')
						{
							$total[1] = $row['Total'];
						}
						else if($row['Status'] == 'Normal')
						{
							$total[2] = $row['Total'];
						}
						else if($row['Status'] == 'Overweight')
						{
							$total[3] = $row['Total'];
						}
						else if($row['Status'] == 'Obese')
						{
							$total[4] = $row['Total'];
						}
						
					  }
					  $statcount = 0;
					while($statcount < 5)
					{
						$s=$stat[$statcount];
						$totalf=$total[$statcount];
					?>
					{ label: "<?php echo $s; ?>",  y: <?php echo $totalf; ?>  },
					<?php	
					$statcount++;	}
					?>
					]
      }   
      ]
    });
	
    chart5.render();
  }

$('#bs-tab6').on("shown.bs.tab",function(){
      chartTab6();
      $('#bs-tab6').off(); // to remove the binded event after the initial rendering
  });  
}
</script>

<body>
   
                <?php include("../include/topnav.php"); ?>  
 <div id="wrapper">     
		            <?php include("../include/sidenav.php"); ?>  
        <div class="container-fluid" style="margin-right:40px;margin-left:70px;">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li><a href="index.php">School Clinic</a></li>
				<li class="active">Dashboard</li>
			</ol>
                    <h1 class="page-header">Dashboard<small><small> School Clinic Data and Statistics</small></small></h1>
						<div class=".col-md-6">
						<div class="col-lg-2">
							<div class="panel panel-info">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-check-circle fa-2x"></i>
										</div>
										<div class="col-xs-2 text-right">
											<div>
											<?php
											$fetch_daily_pat = mysqli_query($mysqli,"SELECT COUNT(patient_id) AS Total FROM `scms_consultation` WHERE cons_date = CURRENT_DATE");
   
											$daily_pat = mysqli_fetch_array($fetch_daily_pat);
											
											echo $daily_pat['Total']
											?>
											<small><div><b>TODAY'S </b>Patients</div></small>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="panel panel-info">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-check-circle fa-2x"></i>
										</div>
										<div class="col-xs-2 text-right">
											<div>
											<?php

										$z=date('d');
										$m=date('m');
										
										if ($z>=01 && $z<=07){
											$month_week='1st week';
											$start_week=date('Y-m-01');
											$end_week=date('Y-m-07');

										}else if ($z>=8 && $z<=14){
											$month_week='2nd week';
											$start_week=date('Y-m-08');
											$end_week=date('Y-m-14');

										}else if ($z>=15 && $z<=21){
											$month_week='3rd week';
											$start_week=date('Y-m-15');
											$end_week=date('Y-m-21');

										}else{
											$month_week='4th week';
											$start_week=date('Y-m-22');
											if($m==04 || $m==06 || $m==09 || $m==11)
											{	
											$end_week=date('Y-m-30');  
											}
											else if($m==01 || $m==03 || $m==05 || $m==07  || $m==08 || $m==10 || $m==12 )
											{	
											$end_week=date('Y-m-31');  
											}
											else{
											$end_week=date('Y-m-28');      
											}
										}
												
											$fetch_weekly_pat = mysqli_query($mysqli, "SELECT COUNT(patient_id) AS Total
												FROM scms_consultation 
												WHERE cons_date BETWEEN '$start_week' AND '$end_week'") 
												or die("Error: Could not fetch rows!".mysqli_error($mysqli));
											
											$weekly_pat = mysqli_fetch_array($fetch_weekly_pat);
											
											echo $weekly_pat['Total']
											 		
											 ?>
											</div>
											<small><div><b>WEEKLY </b>Patients</div></small>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="panel panel-info" >
								<div class="panel-heading">
										<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-check-circle fa-2x"></i>
										</div>
										<div class="col-xs-2 text-right">
											<div>
										<?php
										$current_date = (date('m')); 
									
										
										if ($current_date=="01"){
												 $start_date=date('Y-01-01');
												 $end_date=date('Y-01-31');     

										}else if ($current_date=="02"){

												$leap_check=date('Y');
												$result=$leap_check%4;

													if($result==0){
														 $start_date=date('Y-02-01');
														 $end_date=date('Y-02-29');
													}else{
														 $start_date=date('Y-02-01');
														 $end_date=date('Y-02-28');
													}

										}else if ($current_date=="03"){

													 $start_date=date('Y-03-01');
													 $end_date=date('Y-03-31');
										}else if ($current_date=="04"){

													 $start_date=date('Y-04-01');
													 $end_date=date('Y-04-30');
										}else if ($current_date=="05"){

													 $start_date=date('Y-05-01');
													 $end_date=date('Y-05-31');
										}else if ($current_date=="06"){

													 $start_date=date('Y-06-01');
													 $end_date=date('Y-06-30');
										}else if ($current_date=="07"){
											
													 $start_date=date('Y-07-01');
													 $end_date=date('Y-07-31');
										}else if ($current_date=="08"){
													
													 $start_date=date('Y-08-01');
													 $end_date=date('Y-08-31');
										}else if ($current_date=="09"){

													 $start_date=date('Y-09-01');
													 $end_date=date('Y-09-30');
										}else if ($current_date=="10"){

													 $start_date=date('Y-10-01');
													 $end_date=date('Y-10-31');
										}else if ($current_date=="11"){

													 $start_date=date('Y-11-01');
													 $end_date=date('Y-11-30');
										}else if ($current_date=="12"){

													 $start_date=date('Y-12-01');
													 $end_date=date('Y-12-31');
										}
											$fetch_monthly_pat = mysqli_query($mysqli, "SELECT COUNT(patient_id) AS Total
												FROM scms_consultation 
												WHERE cons_date BETWEEN '$start_date' AND '$end_date'") 
												or die("Error: Could not fetch rows!".mysqli_error($mysqli));
											
											$monthly_pat = mysqli_fetch_array($fetch_monthly_pat);
											
											echo $monthly_pat['Total']			
											 ?>											
											</div>
											<small><div><b>MONTHLY </b>Patients</div></small>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
						
						<div class=".col-md-6 .col-md-offset-3">
						<div class="col-lg-3">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-7">
											<i class="fa fa-child fa-4x"></i>
										</div>
										<div class="col-xs-5 text-right">
											<div>
											<?php
											$fetch_stud = mysqli_query($mysqli,"SELECT COUNT(sis_student.lrn) AS Total FROM sis_student");
   
											$total_stud = mysqli_fetch_array($fetch_stud);
											
											echo $total_stud['Total']
											?>

											</div>
											<div class="padding:0"><small><b>TOTAL </b>Students</small></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-7">
											<i class="fa fa-user fa-4x"></i>
										</div>
										<div class="col-xs-5 text-right">
											<div>
											<?php
											$fetch_per = mysqli_query($mysqli,"SELECT COUNT(pims_personnel.emp_No) AS Total FROM pims_personnel");
   
											$total_per = mysqli_fetch_array($fetch_per);
											
											echo $total_per['Total']
											?>
											</div>
											<div class="padding:0"><small><b>TOTAL </b>Personnel</small></div>
										</div>
									</div>
								</div>
							</div>
						</div>	
						</div>	
						
			<div class="col-lg-7">
                    <div class="panel panel-info">
                        <!-- /.panel-heading -->
                          <div class="panel-body">

                        <div class="ab"  id="chartContainer1" style="height:310px; width: 100%; ">
						</div>		 	
                        <!-- /.panel-body -->
							</div>
							
                    <!-- /.panel -->
                </div>
			</div>

			<div class="col-lg-5">
                    <div class="panel panel-info">
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <div class="" id="chartContainer2" style="height:310px; width: 100%;">
							</div>
                        <!-- /.panel-body -->
							</div>
                    <!-- /.panel -->
                </div>
			</div>					


			<div class="col-lg-3">
                <div class="panel panel-info">
                        <!-- /.panel-heading -->
                        <div class="panel-heading">
							<b><center>Commonly Diagnosed Illnesses</center></b>
                        </div>	
						<?php
							$codate = date('Y-m');
											
							$fetch_tp = mysqli_query($mysqli, "SELECT COUNT(patient_id)  AS Total, diagnosis  AS Diagnosis
							FROM scms_consultation
							WHERE cons_date LIKE '".$codate."%'
							GROUP BY diagnosis 
							ORDER by COUNT(patient_id) DESC")
							or die(mysqli_error($mysqli));
							
							$counttp = 0;
							$tpnum = mysqli_num_rows($fetch_tp);
							while($top = mysqli_fetch_array($fetch_tp))
							{
								$counttp = $counttp + $top['Total'];
							}
							echo'<div style = "padding-left: 14px; padding-top: 5px;"><small>'."Number of Illnesses: <b>".$tpnum.'</b><br/>'."Total Patient: <b>".$counttp.'</b></small></div>';
						
						?>
							
						<div class="panel-body">
									<table class="table table-striped">
										<tbody>
											<thead>
												<tr>
													<th><small>Rank</small></th>												
													<th><small>Diagnosis</small></th>
													<th><small>Total</small></th>
													
												</tr>
												</thead>
											<?php
											$condate = date('Y-m');
											
											$fetch_top = mysqli_query($mysqli, "SELECT COUNT(patient_id)  AS Total, diagnosis  AS Diagnosis
											FROM scms_consultation
											WHERE cons_date LIKE '".$condate."%'
											GROUP BY diagnosis 
											ORDER by COUNT(patient_id) DESC
											LIMIT 5")
											or die(mysqli_error($mysqli));

											$counttop = 1;

											while($top = mysqli_fetch_array($fetch_top) or $counttop < 6)
											{
												echo'
												
												<tr>
													<td><small>'.$counttop.'</small></td>												
													<td><small>'.$top['Diagnosis'].'</small></td>
													<td><small>'.$top['Total'].'</small></td>										
												</tr>';
												$counttop++;
											}
											
											?>
										</tbody>
									</table>
						</div>
				</div>				

            </div>				

			<div class="col-lg-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                          <b><center>Class Nutritional Status</center></b>
                        </div>
						
						<div class="col-xs-5" style="float:right; padding-top:10px;padding-bottom:40px">
								<form action = "">
									<select style="float:right" class="btn btn-default" name="section" onchange="showPat(this.value)">
									<?php
									$fetch_sect = mysqli_query($mysqli, "SELECT year, SECTION_ID, CONCAT(css_section.YEAR_LEVEL,' - ',css_section.SECTION_NAME) AS YR_SEC FROM `css_section`, css_school_yr
											WHERE css_section.sy_id = css_school_yr.sy_id
											AND status = 'active'
											ORDER BY YEAR_LEVEL")
											or die(mysqli_error($mysqli));
											
											while($sect = mysqli_fetch_array($fetch_sect))
											{
												echo'<option value="'.$sect['SECTION_ID'].'">'.$sect['YR_SEC'].'</option>';
											}
											
											 $secty = $sect['year'];
											 $sectyr =explode("-",$secty);
											 $sect_s = $sectyr[0]."-06-01";
											 $sect_e = $sectyr[1]."-03-31";
											
											
									?>
									
									</select>
								</form>
						</div>
						
						
						<div id="txtHint" style = "margin-top: 0px; padding-top: 40px;">
                        
                                        	<?php
									$fetch_status = mysqli_query($mysqli, "SELECT scms_bmi_rec.nutri_status, 
                                            COUNT(CASE WHEN sis_student.sis_gender='Male' THEN 1 END) As Male, 
											COUNT(CASE WHEN sis_student.sis_gender='Female' THEN 1 END) As Female, 
											COUNT(scms_bmi_rec.bmi_no) AS Total, 
											CONCAT(css_section.year_level,'-',css_section.section_name) AS YR_SEC
											FROM scms_bmi_rec, cms_account, sis_student, sis_stu_rec, css_section 
											WHERE cms_account.cms_account_ID = scms_bmi_rec.cms_account_ID 
											AND cms_account.lrn = sis_student.LRN AND sis_student.LRN = sis_stu_rec.LRN 
											AND sis_stu_rec.section_ID = css_section.section_ID 
											AND css_section.section_ID = '1' 
											AND bmi_date_of_update BETWEEN '".$sect_s."' AND '".$sect_e."'
                                            GROUP BY scms_bmi_rec.nutri_status")
                                        
									or die(mysqli_error($mysqli));
									
									$total = ['0', '0', '0', '0', '0'];
									$male = ['0', '0', '0', '0', '0'];
									$female = ['0', '0', '0', '0', '0'];
									$stat = ["Severely Wasted", "Wasted", "Normal", "Overweight", "Obese"];
									$ftotal = 0;
									while($st = mysqli_fetch_array($fetch_status))
									{
										if($st['nutri_status'] == 'Severely Wasted')
										{
											$total[0] = $st['Total'];
											$male[0] = $st['Male'];
											$female[0] = $st['Female'];
										}
										else if($st['nutri_status'] == 'Wasted')
										{
											$total[1] = $st['Total'];
											$male[1] = $st['Male'];
											$female[1] = $st['Female'];
										}
										else if($st['nutri_status'] == 'Normal')
										{
											$total[2] = $st['Total'];
											$male[2] = $st['Male'];
											$female[2] = $st['Female'];
										}
										else if($st['nutri_status'] == 'Overweight')
										{
											$total[3] = $st['Total'];
											$male[3] = $st['Male'];
											$female[3] = $st['Female'];
										}
										else if($st['nutri_status'] == 'Obese')
										{
											$total[4] = $st['Total'];
											$male[4] = $st['Male'];
											$female[4] = $st['Female'];
										}
										$ftotal = $st['Total'] + $ftotal;
									}
									mysqli_query($mysqli, "UNLOCK TABLES");
									
									echo' 
									
										<h6 style = "padding-left: 15px;font-size:12px;font-family:Arial;">Total Students: <b>'.$ftotal.'</b></h6>';
									echo'<div class="panel-body">
										<div class="table-responsive"><small>
										<table class="table table-striped table-bordered table-hover">
										<thead>
										<tr>
											<th>Status</th>
											<th>Male</th>
											<th>Female</th>
											<th>Total</th>
										</tr>
										</thead>
										<tbody>';
									
									$statcount = 0;
									while($statcount < 5)
									{
										
											echo'<tr>
											<td>'.$stat[$statcount].'</td>
											<td>'.$male[$statcount].'</td>
											<td>'.$female[$statcount].'</td>
											<td>'.$total[$statcount].'</td>
											</tr>';
										
										$statcount++;
									}
									
									echo'
                                    </tbody>
                                </table></small>
								</div>
							</div>';
									?>
						</div>
                    </div>
            </div>
				<div class="col-lg-5">
                    <div class="panel panel-info">
					     <div class="panel-heading">
							<b><center>Year Level Nutritional Status</center></b>
                        </div>
						
						<div class="panel-body">
						   <div class="container" style="margin:0;padding:0">						
								<div class="col-md-4">
									<ul class="nav nav-pills nav-jt">
										<li class="active"><a data-toggle="tab" href="#tab1"><small><small>G.7</small></small></a></li>
										<li><a data-toggle="tab" id= "bs-tab2" href="#tab2"><small><small>G.8</small></small></a></li>
										<li><a data-toggle="tab" id= "bs-tab3" href="#tab3"><small><small>G.9</small></small></a></li>
										<li><a data-toggle="tab" id= "bs-tab4" href="#tab4"><small><small>G.10</small></small></a></li>
										<li><a data-toggle="tab" id= "bs-tab5" href="#tab5"><small><small>G.11</small></small></a></li>
										<li><a data-toggle="tab" id= "bs-tab6" href="#tab6"><small><small>G.12</small></small></a></li>			
									</ul><hr>
									<div class="tab-content">
										<div id="tab1" class="tab-pane fade active in">
											<div id="chartContainer7" style="height: 250px; width: 100%;"></div>
										</div>
										<div id="tab2" class="tab-pane">
											<div id="chartContainer8" style=" height: 250px; width: 100%;"></div>
										</div>
										<div id="tab3" class="tab-pane">
											<div id="chartContainer9" style="height: 250px; width: 100%;"></div>
										</div>
										<div id="tab4" class="tab-pane">
											<div id="chartContainer10" style=" height: 250px; width: 100%;"></div>
										</div>
										<div id="tab5" class="tab-pane">
											<div id="chartContainer11" style="height: 250px; width: 100%;"></div>
										</div>
										<div id="tab6" class="tab-pane">
											<div id="chartContainer12" style=" height: 250px; width: 100%;"></div>
										</div>			
									</div>
								</div>
							</div>
						</div>
						<!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>			
                <!-- /.col-lg-5 -->		
  
        </div></div>
		<br><br><br>
		<?php include "../../pages/include/footer.php"; ?>
    </div>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../js/alert.js"></script>
<script src="../../js/index.js"></script>
<script src="../../js/slideshow.js"></script>
<script src="../../js/backToTop.js"></script>
<script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../Template%20(reference)svendor/jquery/jquery-3.0.0.min.js"></script>
<script src="../../js/sidebar-menu.js"></script>
<script src="../../js/sideNav.js"></script>

<!-- Morris Charts JavaScript -->
    <script src="../../vendor/raphael/raphael.min.js"></script>
    <script src="../../vendor/morrisjs/morris.min.js"></script>
	<script src="../../vendor/canvasjs/canvasjs.min.js"></script>
    <script src="../../data/morris-data.js"></script>
    <script src="../../js/metisMenu.min.js"></script>
    <script src="../../js/sb-admin-2.min.js"></script>
	


						<script>
							$(document).ready(function(){
								var donut_chart = Morris.Donut({
									element: 'chart',
									data: <?php echo $data;?>
								})
							})
						</script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>
<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    </script>

	
<!-- Footer -->

</body>

</html>
