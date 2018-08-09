
<?php

if(isset($_POST['upload'])){
$filename=$_FILES["xls_file"]["tmp_name"];
//echo "<script>alert('$filename');</script>";

ini_set("display_errors",1);
require_once 'include/excel_reader2.php';
require_once '../connection.php';
 
$data = new Spreadsheet_Excel_Reader($filename);

//echo "Total Sheets in this xls file: ".count($data->sheets)."<br /><br />"; // Ayos na this hihihi...
 
//$html="<table border='1'>";

for($i=0;$i<count($data->sheets);$i++) // Loop to get all sheets in a file.
{	
	if(count($data->sheets[$i]['cells'])>0) // checking sheet not empty
	{
		//echo "Sheet $i:<br /><br />Total rows in sheet $i  ".count($data->sheets[$i]['cells'])."<br />";
		
		for($row=7;$row<count($data->sheets[$i]['cells']);$row++) // loop used to get each row of the sheet
		{ 
		           
				
					for($col=10;$col<=count($data->sheets[$i]['cells'][$row]);$col++) // This loop is created to get data in a table format.  // column
					{
							$dept_name=$data->sheets[$i]['cells'][4][2];
							$name = $data->sheets[$i]['cells'][4][8];
							$date = $data->sheets[$i]['cells'][5][2];
							$id = $data->sheets[$i]['cells'][5][8];
							$absent_day=$data->sheets[$i]['cells'][8][1];
							$afl_day=$data->sheets[$i]['cells'][8][2];
							$out_day = $data->sheets[$i]['cells'][8][3];
							$onduty_day=$data->sheets[$i]['cells'][8][4];
							$overtime_wd=$data->sheets[$i]['cells'][8][5];
							$overtime_hld=$data->sheets[$i]['cells'][8][6];
							$late_times = $data->sheets[$i]['cells'][8][7];
							$late_min = $data->sheets[$i]['cells'][8][8];
							$leave_early_times=$data->sheets[$i]['cells'][8][9];
							$leave_early_min=$data->sheets[$i]['cells'][8][10];
					
					
					
					}
						
						$input =mysqli_query($mysqli,"INSERT INTO prs_dtr_rec(personnel,personnel_id,date,department,absent_day,afl_day,out_day,onduty_day,ot_workday,ot_holiday,late_times,late_min,le_times,le_min) 
						VALUES ('$name','$id','$date','$dept_name','$absent_day','$afl_day','$out_day','$onduty_day','$overtime_wd','$overtime_hld','$late_times','$late_min','$leave_early_times','$leave_early_min')") or die ("error!"); //dummy lang muna..
						
		}
		
		echo "<script> window.location='mtr_import.php'</script>";
} 
}
 

}
?>