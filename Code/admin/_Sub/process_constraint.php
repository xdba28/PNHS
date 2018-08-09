<?php
    require('../../func.php');
    require('../../php/connection.php');
    require('../../php/_Func.php');
    require('../../php/_Def.php');
    if(isset($_SESSION['user_data'])) {
        //echo print_r($_REQUEST); die();
        if(isset($_POST['submit'])) {
            $ftype=$mysqli->real_escape_string($_POST['ftype']);
            $jt=$mysqli->real_escape_string($_POST['jt']);                     
            $mod=$mysqli->real_escape_string($_POST['mod']);
            $admin=$mysqli->real_escape_string($_POST['admin']);
            $qry=$mysqli->query("INSERT INTO cms_admin_cons(job_title_code,module,faculty_type,admin_type,emp_no) VALUES('$jt','$mod','$ftype','$admin',NULL)");
            if($qry) {
                $_SESSION['msg']='Successfully Added';
                header('Location: ../cons.php');
            }
            else {
                $_SESSION['msg']='Adding Failed';
                header('Location: ../cons.php');
            }
        }
        else {
            header('Location: ../cons.php');
        }
    }
    else {
        header('Location: ../../index.php');
    }
?>