<?php
include("fpdf.php");
include('../db_con_i.php');
include('../../../php/_Func.php');

if(isset($_GET['lvl_sec']))
{
	$get_sec_lvl = $_GET['lvl_sec'];
}
else
{
	?>
	<script>
		alert('Empty Year Level and Section');
        window.location = "../student/student_list.php";
	</script>
	<?php
}

$ex_get = explode("-", $get_sec_lvl);

$get_section = $mysqli->query("SELECT sis_student.lrn as lrn, cms_username, cms_password, stu_lname, stu_fname, stu_mname, section_name, year_level 
								FROM css_section, sis_student, sis_stu_rec, css_school_yr, cms_account
                                WHERE sis_student.lrn = sis_stu_rec.lrn
                                AND sis_stu_rec.section_id = css_section.section_id
                                AND sis_stu_rec.sy_id = css_school_yr.sy_id
								AND cms_account.lrn = sis_student.lrn
								AND css_school_yr.status = 'active'
								AND css_section.section_name = '$ex_get[1]'
								AND css_section.year_level = '$ex_get[0]'
								AND cms_account.lrn IS NOT NULL")
                            or die("<script>
							alert('Error getting Student Accounts');
							window.location = '../student/student_list.php';
							</script>");

class PDF extends FPDF
{
	function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);

        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;

        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }

        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);

        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }

    //Cell with horizontal scaling only if necessary
    function CellFitScale($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,false);
    }

    //Cell with horizontal scaling always
    function CellFitScaleForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,true);
    }

    //Cell with character spacing only if necessary
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }

    //Cell with character spacing always
    function CellFitSpaceForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        //Same as calling CellFit directly
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,true);
    }

    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }

		function Header()
        {
			include('../db_con_i.php');
			$get_sec_lvlF = $_GET['lvl_sec'];
            $this->SetFont('Arial','B','14');
            $this->Cell(0,5,"PAG-ASA National High School",0,1,"C");
            $this->SetFont('Arial','','14');
            $this->Cell(0,5,"Student Account List",0,1,"C");
            $this->Ln();
			$this->Cell(200,10,"Section: $get_sec_lvlF", 1, 1,"C");
			$this->SetFont('Arial','B','10');
            $this->Cell(50,9,"Learner's Reference Number", 1, 0, "C");
			$this->Cell(50,9,"Student Name", 1, 0, "C");
			$this->Cell(50,9, "Username", 1, 0, "C");
			$this->Cell(50,9, "Password", 1, 0, "C");
            $this->ln();

		}
}

$pdf = new PDF('P','mm','Legal');
$file_name = $get_sec_lvl . ' Student Accounts.pdf';
$pdf->SetTitle('Student Accounts');
$pdf->SetFont('Arial','',12);
$pdf->AddPage();

if(mysqli_num_rows($get_section) !== 0)
{

	while($row = $get_section->fetch_array())
	{
		$uname = $row['stu_lname'] . ", " . $row['stu_fname'] . " " . $row['stu_mname'];
		$name = iconv('UTF-8', 'windows-1252', $uname);

		$user_utf = iconv('UTF-8', 'windows-1252', $row['cms_username']);
		$password = pcrypt($row['cms_password'], "dcrypt");
		$pass_utf = iconv('UTF-8', 'windows-1252', $password);

		$pdf->CellFitScale(50, 9, $row['lrn'], 1, 0, "C");
		$pdf->CellFitScale(50, 9, $name, 1, 0, "C");
		$pdf->CellFitScale(50, 9, $user_utf, 1, 0, "C");
		$pdf->CellFitScale(50, 9, $pass_utf, 1, 0, "C");
		$pdf->Ln();
	}
}
else
{
	?>
	<script>
		alert('No students assigned in this section');
		window.location = '../student/stat.php'
	</script>
	<?php
}

$pdf->Output('', $file_name);
?>