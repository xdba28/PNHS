<?php
require_once '../Classes/PHPExcel.php';



if(!empty($_FILES['excel_file']['name']))
{
	$file_type = $_FILES['excel_file']['type'];
	if($file_type=="application/vnd.ms-excel");
	elseif($file_type=='application/vnd.ms-excel.addin.macroEnabled.12');
	elseif($file_type=='application/vnd.ms-excel.sheet.binary.macroEnabled.12');
	elseif($file_type=='application/vnd.ms-excel.sheet.macroEnabled.12');
	elseif($file_type=='application/vnd.ms-excel.template.macroEnabled.12');
	elseif($file_type=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	else	
	{
		?>
		<script>
			alert('Wrong file submitted!');
			window.location = "test_excel_import.php";
		</script>
		<?php
	}
}
else
{
?>
<script>
    alert('Empty Submittion!');
	window.location = "test_excel_import.php";
</script>
<?php
}
echo 'exited if statement';

$name = $_FILES['excel_file']['name']; // excel name

$target_dir = "../import/";
$target_file = $target_dir . basename($_FILES["excel_file"]["name"]); // excel directory + file name

$excel_file_type = pathinfo($target_file,PATHINFO_EXTENSION);

move_uploaded_file($_FILES["excel_file"]["tmp_name"], $target_file); // excel save in import directory

$excel_read = PHPExcel_IOFactory::createReaderForFile($target_file); // excel read file
$excel_object = $excel_read->load($target_file);
$stu_worksheet = $excel_object->getSheet(0);

$column = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", 
				"N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");

$row = 2; // excel index starts at 1;

$count = 0;

for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
{
	$sy[$row] = $stu_worksheet->getCell($column[0] . $row)->getValue();

	$sy_cut = $sy[$row];

	$sy_cut = explode("-", $sy_cut);

	echo $sy_cut[0];
}

?>