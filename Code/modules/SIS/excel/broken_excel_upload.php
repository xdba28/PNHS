<?php

require_once '../Classes/PHPExcel.php';
include_once('../DB Con.php');

$action = $_POST['action'];
//$section_post = $_POST['section'];

$name = $_FILES['excel_file']['name']; // excel name

$target_dir = "../import/";
$target_file = $target_dir . basename($_FILES["excel_file"]["name"]); // excel directory + file name

$excel_file_type = pathinfo($target_file,PATHINFO_EXTENSION);

move_uploaded_file($_FILES["excel_file"]["tmp_name"], $target_file); // excel save in import directory

$excel_read = PHPExcel_IOFactory::createReaderForFile($target_file); // excel read file
$excel_object = $excel_read->load($target_file);
$stu_worksheet = $excel_object->getSheet(0);
$parent_worksheet = $excel_object->getSheet(1);

$column = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", 
		"N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");

$row = 2; // excel index starts at 1;

$count = 0;

if($action=='add')      // --------------------------------------- ADD STUDENT ---------------------------//
{
        for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
        {
                
                $lrn[$row]           = $stu_worksheet->getCell($column[0] . $row)->getValue();
                $stu_fname[$row]     = $stu_worksheet->getCell($column[1] . $row)->getValue();
                $stu_mname[$row]     = $stu_worksheet->getCell($column[2] . $row)->getValue();
                $stu_lname[$row]     = $stu_worksheet->getCell($column[3] . $row)->getValue();
                $b_day[$row]         = $stu_worksheet->getCell($column[4] . $row)->getValue();
                $plc[$row]           = $stu_worksheet->getCell($column[5] . $row)->getValue();
                $gender[$row]        = $stu_worksheet->getCell($column[6] . $row)->getValue();
                $religion[$row]      = $stu_worksheet->getCell($column[7] . $row)->getValue();
                $mother_tounge[$row] = $stu_worksheet->getCell($column[8] . $row)->getValue();
                $ethnic[$row]        = $stu_worksheet->getCell($column[9] . $row)->getValue();
                $status[$row]        = $stu_worksheet->getCell($column[10] . $row)->getValue();
                $stu_contact[$row]   = $stu_worksheet->getCell($column[11] . $row)->getValue();
                $email[$row]         = $stu_worksheet->getCell($column[12] . $row)->getValue();
                $house_no[$row]      = $stu_worksheet->getCell($column[13] . $row)->getValue();
                $street[$row]        = $stu_worksheet->getCell($column[14] . $row)->getValue();
                $brng[$row]          = $stu_worksheet->getCell($column[15] . $row)->getValue();
                $munic[$row]         = $stu_worksheet->getCell($column[16] . $row)->getValue();
                $section[$row]       = $stu_worksheet->getCell($column[17] . $row)->getValue();
                $sy_yr[$row]         = $stu_worksheet->getCell($column[18] . $row)->getValue();
                $yr_lvl[$row]        = $stu_worksheet->getCell($column[19] . $row)->getValue();
                $enro_desc[$row]     = $stu_worksheet->getCell($column[20] . $row)->getValue();

                //Birthdate array_search()

                $cur_year = date('Y');
                        

                $save_stu_excel = mysql_query("INSERT INTO sis_student(lrn, stu_fname, stu_mname, stu_lname, 
                                                b_day, plc_birth, gender, religion, m_tounge, ethnic, stu_status, 
                                                stu_contact, email, house_no, street, brng, munic)

                                VALUES('$lrn[$row]', '$stu_fname[$row]', '$stu_mname[$row]', '$stu_lname[$row]', 
                                        '$b_day[$row]', '$plc[$row]', '$gender[$row]', '$religion[$row]', '$mother_tounge[$row]', 
                                        '$ethnic[$row]', '$status[$row]', '$stu_contact[$row]', '$email[$row]', '$house_no[$row]', 
                                        '$street[$row]', '$brng[$row]', '$munic[$row]')")
                                or die("Error: save_stu_excel: ".mysql_error());


                $row = 2; // excel index starts at 1;

                $count = 0;

                for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
                {
                        $pg_lrn[$row]        = $parent_worksheet->getCell($column[0] . $row)->getValue();
                        $father[$row]        = $parent_worksheet->getCell($column[1] . $row)->getValue();
                        $mother[$row]        = $parent_worksheet->getCell($column[2] . $row)->getValue();
                        $guardian[$row]      = $parent_worksheet->getCell($column[3] . $row)->getValue();
                        $guardian_rela[$row] = $parent_worksheet->getCell($column[4] . $row)->getValue();
                        $pg_contact[$row]    = $parent_worksheet->getCell($column[5] . $row)->getValue();

                        $save_pg_excel = mysql_query("INSERT INTO sis_parent_guardian(lrn, sis_father, sis_mother, sis_guardian, 
                                                                guardian_relation, pg_contact)

                                                        VALUES('$pg_lrn[$row]', '$father[$row]', '$mother[$row]', '$guardian[$row]', 
                                                                '$guardian_rela[$row]', '$pg_contact[$row]')")
                                                        or die("Error: save_pg_excel: ".mysql_error());
                }
                
                $get_sy = mysql_query("SELECT sy_id, sy_start, sy_end FROM sis_school_yr WHERE sy_start = $cur_year")
                or die("Error get_sy: ".mysql_error());
                            
                while($row = mysql_fetch_array($get_sy))
                {
                        $sy_id = $row['sy_id'];
                        $sy_start = $row['sy_start'];

                        $sy_id = explode("-", $sy_id);

                $save_stu_rec_excel = mysql_query("INSERT INTO sis_stu_rec(lrn, section_id, sy_id, stu_yr_lvl)
                        
                                                        VALUES('$lrn[$row]', '$section[$row]', '$sy_id[0]', '$yr_lvl[$row]')")
                                                        or die("Error save_stu_rec_excel: " .mysql_error());
                }
        }
}
else if($action=='transfer_in')         //------------------------------ ELSE IF ADD TRANSFER IN STUDENT -----------------//
{
        for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
        {
                $lrn[$row]           = $stu_worksheet->getCell($column[0] . $row)->getValue();
                $stu_fname[$row]     = $stu_worksheet->getCell($column[1] . $row)->getValue();
                $stu_mname[$row]     = $stu_worksheet->getCell($column[2] . $row)->getValue();
                $stu_lname[$row]     = $stu_worksheet->getCell($column[3] . $row)->getValue();
                $b_day[$row]         = $stu_worksheet->getCell($column[4] . $row)->getValue();
                $plc[$row]           = $stu_worksheet->getCell($column[5] . $row)->getValue();
                $gender[$row]        = $stu_worksheet->getCell($column[6] . $row)->getValue();
                $religion[$row]      = $stu_worksheet->getCell($column[7] . $row)->getValue();
                $mother_tounge[$row] = $stu_worksheet->getCell($column[8] . $row)->getValue();
                $ethnic[$row]        = $stu_worksheet->getCell($column[9] . $row)->getValue();
                $status[$row]        = $stu_worksheet->getCell($column[10] . $row)->getValue();
                $stu_contact[$row]   = $stu_worksheet->getCell($column[11] . $row)->getValue();
                $email[$row]         = $stu_worksheet->getCell($column[12] . $row)->getValue();
                $house_no[$row]      = $stu_worksheet->getCell($column[13] . $row)->getValue();
                $street[$row]        = $stu_worksheet->getCell($column[14] . $row)->getValue();
                $brng[$row]          = $stu_worksheet->getCell($column[15] . $row)->getValue();
                $munic[$row]         = $stu_worksheet->getCell($column[16] . $row)->getValue();
                $section[$row]       = $stu_worksheet->getCell($column[17] . $row)->getValue();
                $sy_yr[$row]         = $stu_worksheet->getCell($column[18] . $row)->getValue();
                $yr_lvl[$row]        = $stu_worksheet->getCell($column[19] . $row)->getValue();
                $enro_desc[$row]     = $stu_worksheet->getCell($column[20] . $row)->getValue();
                $transfer_in[$row]   = $stu_worksheet->getCell($column[21] . $row)->getValue();
        
                //Birthdate array_search()
        
                $trans_save_stu_excel = mysql_query("INSERT INTO sis_student(lrn, stu_fname, stu_mname, stu_lname, 
                                                b_day, plc_birth, gender, religion, m_tounge, ethnic, stu_status, 
                                                 stu_contact, email, trnsf_in_date, house_no, street, brng, munic)
        
                                                VALUES('$lrn[$row]', '$stu_fname[$row]', '$stu_mname[$row]', '$stu_lname[$row]', 
                                                        '$b_day[$row]', '$plc[$row]', '$gender[$row]', '$religion[$row]', '$mother_tounge[$row]', 
                                                        '$ethnic[$row]', '$status[$row]', '$stu_contact[$row]', '$email[$row]', '$transfer_in[$row]', 
                                                        '$house_no[$row]', '$street[$row]', '$brng[$row]', '$munic[$row]')")
                                                or die("Error: trans_save_stu_excel: ".mysql_error());
        }
        
        $row = 2; // excel index starts at 1;
        
        $count = 0;
        
        for($row=2;$stu_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
        {
                $pg_lrn[$row]        = $parent_worksheet->getCell($column[0] . $row)->getValue();
                $father[$row]        = $parent_worksheet->getCell($column[1] . $row)->getValue();
                $mother[$row]        = $parent_worksheet->getCell($column[2] . $row)->getValue();
                $guardian[$row]      = $parent_worksheet->getCell($column[3] . $row)->getValue();
                $guardian_rela[$row] = $parent_worksheet->getCell($column[4] . $row)->getValue();
                $pg_contact[$row]    = $parent_worksheet->getCell($column[5] . $row)->getValue();
        
                $trans_save_pg_excel = mysql_query("INSERT INTO sis_parent_guardian(lrn, sis_father, sis_mother, sis_guardian, 
                                                                guardian_relation, pg_contact)
        
                                                VALUES('$pg_lrn[$row]', '$father[$row]', '$mother[$row]', '$guardian[$row]', 
                                                                '$guardian_rela[$row]', '$pg_contact[$row]')")
                                                        or die("Error: trans_save_pg_excel: ".mysql_error());
                
        }
}
else if($action=='del_stu')
{
        $row = 2;
        for($row-2;$parent_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
        {
                $lrn[$row] = $parent_worksheet->getCell($column[0] . $row)->getValue();
                
                $del_pg_excel = mysql_query("DELETE FROM sis_parent_guardian WHERE lrn = '$lrn[$row]'")
                                                or die("Error: del_pg_excel: ".mysql_error());
        }
        
        $row = 2;
        for($row-2;$parent_worksheet->getCell($column[0] . $row)->getValue()!=NULL;$row++)
        {
                $lrn[$row] = $stu_worksheet->getCell($column[0] . $row)->getValue();
                
                $del_stu_excel = mysql_query("DELETE FROM sis_student WHERE lrn = '$lrn[$row]'")
                                                or die("Error: del_stu_excel: ".mysql_error());
        }
}


header('Location: excel_result.php?file=' . $name);