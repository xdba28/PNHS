<?php
	include("../func.php");
    include("../session.php");
	session_start();

    function fetch_data() {

	$vid = $_GET['emp'];

	require '../dbcon.php';
	$qry = mysqli_query( $mysqli, "Select ipcrms_content.obj_id,MFO_Description,KRA_Description, KRA_ID,kra_obj, timeline, kra_wpk, perf_5, perf_4, perf_3	,perf_2,perf_1
	from ipcrms_kra, ipcrms_obj, ipcrms_mfo, ipcrms_perf_indicator,ipcrms_content 
	where ipcrms_obj.KRA_ID = ipcrms_kra.KRA_ID 
	and ipcrms_kra.MFO_ID=ipcrms_mfo.MFO_ID
	and ipcrms_content.obj_id=ipcrms_obj.obj_id
	and ipcrms_perf_indicator.OBJ_ID=ipcrms_obj.OBJ_ID
	AND ipcrms_content.emp_No=$vid");

	
		$wp_obj_sum = 0;
		$y = 0;
		$output = '';

		while($row = mysqli_fetch_array($qry)){
			$desc = $row['MFO_Description'];
					$kradesc = $row['KRA_Description'];
					$kraobj = $row['kra_obj'];
					$tim = $row['timeline'];
					$kwpk = $row['kra_wpk'];
					$krawpk=$kwpk*100;
					$wp_obj_sum += $kwpk * (100);

					$perf_5 = $row['perf_5'];
					$perf_4 = $row['perf_4'];
					$perf_3 = $row['perf_3'];
					$perf_2 = $row['perf_2'];
					$perf_1 = $row['perf_1'];
					$obj=$row['obj_id'];
					$kraid = $row['KRA_ID'];
					$x=$kraid;
					
				
					
				$vsql=mysqli_query($mysqli,"Select * from ipcrms_content where ipcrms_content.OBJ_ID=$obj 
										and ipcrms_content.emp_No=$vid");
									while($vrow=mysqli_fetch_assoc($vsql)){ 
									$a=$vrow['q_val'];
									$b=$vrow['e_val'];
									$c=$vrow['t_val'];
									$d=$vrow['rating'];
									$e=$vrow['score'];

							
				if ($x != $y) {
				$output .= '
				<tr>

				<td width="11%">'.$desc.'</td>
				<td width="11%">'.$kradesc.'</td>

				<td width="25%">'.$kraobj.'</td>
				<td  width="6%"> <b>'.$tim.'</b> </td>
				<td  width="5%"> <b>'.$kwpk.'</b>% </td>
				<td width="25%">'.$perf_5. '<br>' .$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>
				
				<td style="text-align: center; font-weight: bold; font-size: 11px;" width="3%">'.$a.'</td>
				<td style="text-align: center; font-weight: bold; font-size: 11px;" width="3%">'.$b.'</td>
				<td style="text-align: center; font-weight: bold; font-size: 11px;" width="3%">'.$c.'</td>
				
				<td style="text-align: center; font-weight: bold; font-size: 11px;" width="4%">'.$d.'</td>
				<td style="text-align: center; font-weight: bold; font-size: 11px;" width="4%">'.$e.'</td>
				</tr>
				';
				}
				else{
				$output .='
				
				<tr>

				<td width="11%"></td>
				<td width="11%"></td>

				<td width="25%">'.$kraobj.'</td>
				<td  width="6%"> <b>'.$tim.'</b> </td>
				<td  width="5%"> <b>'.$kwpk.'</b>% </td>
				<td width="25%">'.$perf_5. '<br>' .$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>
				
				<td style="text-align: center; font-weight: bold; font-size: 11px;" width="3%">'.$a.'</td>
				<td style="text-align: center; font-weight: bold; font-size: 11px;" width="3%">'.$b.'</td>
				<td style="text-align: center; font-weight: bold; font-size: 11px;" width="3%">'.$c.'</td>
				
				<td style="text-align: center; font-weight: bold; font-size: 11px;" width="4%">'.$d.'</td>
				<td style="text-align: center; font-weight: bold; font-size: 11px;" width="4%">'.$e.'</td>
				</tr>
				';
				
					
				}
				
				
				
				
			}
		}									
						
	return $output;
	


}

	
	require '../dbcon.php';
	require 'tcpdf/tcpdf.php';
	// array('215.9','330.2')

	$obj_pdf = new TCPDF('L', 'mm', 'Legal', true, 'UTF-8', false);
	$obj_pdf->SetCreator(PDF_CREATOR);
	$obj_pdf->SetTitle("IPCRF");
	$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
	$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	$obj_pdf->SetDefaultMonospacedFont('helvetica');
	$obj_pdf->SetFooterMargin('6');
	$obj_pdf->SetMargins('5', '5', '5');
	$obj_pdf->setPrintHeader(false);
	$obj_pdf->setPrintFooter(true);
	$obj_pdf->SetAutoPageBreak(TRUE, 6);
	$obj_pdf->SetFont('helvetica', '', 6);
	$obj_pdf->AddPage();	

	$content = '';
	
	$content .= '
	<div align="center" style="line-height: 4px;">
	<p style="font-size: 10px;"><b>Department of Education</b></p>
	<p style="font-size: 9px;">Region V (Bicol)</p>
	<p style="font-size: 9px;">Schools Division of Legaspi City </p>
	<p style="font-size: 11px;"><b>PAG-ASA NATIONAL HIGH SCHOOL</b></p>
	<p style="font-size: 9px;">Rawis, Legaspi City</p>
	</center>
	</div>
	';

	//$obj_pdf->Image('..\docs\img\leg.png', 85,35,20);
	

	


	$content .= '
	<table border="1" cellspacing="0" cellpadding="2">
	<thead>
	<tr align="center" nobr="true">
	<th rowspan="2" width="11%">MFOs</th>
	<th rowspan="2" width="11%">KRAs</th>
	<th rowspan="2" width="25%">OBJECTIVES</th>
	<th rowspan="2" width="6%">TIMELINE</th>
	<th rowspan="2" width="5%">Weight <br/> per <br/> KRA</th>
	<th rowspan="2" width="25%">PERFORMANCE INDICATORS<br/>(Quality, Efficiency, Timeliness)</th>
	<th colspan="3" width="9%">Actual Result</th>
	<th rowspan="2" width="4%">RATING</th>
	<th rowspan="2" width="4%">SCORE</th>
	</tr>
	<tr>
	<th width="3%">Q</th>
	<th width="3%">E</th>
	<th width="3%">T</th>
	</tr>
	</thead>

	<tbody>
	';

	$content .= fetch_data();

	$content .= '
	</tbody>
	</table>
	';





	$obj_pdf->writeHTML($content);

	ob_end_clean();

	$obj_pdf->Output('IPCRF.pdf', 'I');



?>
