<?php
    include('../func.php');
    include('../php/connection.php');
    include('../php/_Func.php');
    include('../php/_Def.php');
    include('../php/fpdf/fpdf.php');
class PDF extends FPDF
{
		function Header()
{
    $dept=$_GET['dep'];
    $dp=$mysqli->query("SELECT dept_name FROM pims_department WHERE dept_id=$dept");
    $dpr=$dp->fetch_assoc();
    $depart=$dpr['dept_name'];
    $this->Image('../../docs/img/pnhs_logo.png',25,6,30);
    $this->SetFont("Arial","","10");
    // Title
    $this->Cell(0,5,"Republic of the Philippines",0,1,"C");
    $this->SetFont('Arial','B','10');
    $this->Cell(0,5,"DEPARTMENT OF EDUCATION",0,1,"C");
    $this->Cell(0,5,"REGION V",0,1,"C");
    $this->SetFont("Arial","","10");
    $this->Cell(0,5,"DIVISION OF LEGAZPI CITY",0,1,"C");
    $this->SetFont("Arial","B","10");
    $this->Cell(0,5,"Pag-asa National High School",0,1,"C");
    $this->SetFont("Times","B","14");
    $this->Cell(0,5,"LIST OF EMPLOYEES",0,1,"C");
    $this->SetFont("Times","","8");
    $this->Cell(0,5,"($depart)",0,1,"C");
    $this->Image('../../docs/img/deped1.png',160,6,30);
    $this->SetFont("Times","B","16");
    $this->ln();
    $this->SetFont("Times","B","12");
    $this->Cell(45,6,"Employee Number",1,0,"C");
    $this->Cell(56,6,"Employee Name",1,0,"C");
    $this->Cell(45,6,"Role Type",1,0,"C");
    $this->Cell(50,6,"Job Title",1,0,"C");
    
}

}


$dept=$_GET['dep'];
$pdf = new PDF('P','mm','Legal');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',7.5);
$pdf->AddPage();
$per=$mysqli->query("SELECT pims_personnel.emp_no,concat(p_lname,' ',p_fname) as Name,role_type,job_title_name
FROM pims_personnel,pims_employment_records,pims_job_title,pims_department
WHERE pims_personnel.emp_no=pims_employment_records.emp_no
AND pims_department.dept_id=pims_employment_records.dept_id
AND pims_employment_records.job_title_code=pims_job_title.job_title_code
AND pims_employment_records.dept_id=$dept
AND work_stat!='retired' 
ORDER BY p_lname ASC");
while($perr=$per->fetch_assoc()){
    $name=$perr['Name'];
    $emp=$perr['emp_no'];
    $role=$perr['role_type'];
    $jt=$perr['job_title_name'];
    $pdf->SetFont("Times","","12");
    $pdf->ln();
    $pdf->Cell(45,6,"$emp",1,0,"C");
    $pdf->Cell(56,6,"$name",1,0,"C");
    $pdf->Cell(45,6,"$role",1,0,"C");
    $pdf->Cell(50,6,"$jt",1,0,"C");
    
}
$dept=$_GET['dep'];
    $sy=$mysqli->query("SELECT year FROM css_school_yr WHERE status='active'");
    $syr=$sy->fetch_assoc();
    $syear=$syr['year'];
    $dp=$mysqli->query("SELECT dept_name FROM pims_department WHERE dept_id=$dept");
    $dpr=$dp->fetch_assoc();
    $depart=$dpr['dept_name'];
    date_default_timezone_set('Asia/Manila');
    $date=date("M d ,Y");
    $name=$depart."_List.pdf";
$pdf->SetFont('Arial','',"8");
$pdf->ln();
$pdf->Cell(150,6,"*This is a list of active personnels in the $depart for School Year $syear. Issued today $date",0,0,'C');
$pdf->Output('I',$name);
?>