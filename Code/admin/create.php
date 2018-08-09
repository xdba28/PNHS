<?php
    include('../func.php');
    include('../php/connection.php');
    include('../php/_Func.php');
    include('../php/_Def.php');
    $_SESSION['hist'] = $_SERVER['REQUEST_URI'];
    if(isset($_SESSION['user_data']['acct']['emp_no']) AND (in_array("superadmin", $_SESSION['user_data']['priv']['cms_account_type']) OR in_array("admin", $_SESSION['user_data']['priv']['cms_account_type']))) {
        $keysa = array_search('superadmin', $_SESSION['user_data']['priv']['cms_account_type']);
        $keya = array_search('admin', $_SESSION['user_data']['priv']['cms_account_type']);
        if($_SESSION['user_data']['priv']['cms_priv'][$keysa]==1 OR $_SESSION['user_data']['priv']['cms_priv'][$keya]==1) {

        }
        else {
            //header('Location: ../index.php');
            //die();
        }
    }
    else {
        //header('Location: ../index.php');
        //die();
    }

    if(isset($_SESSION['user_data'])) {
        if(isset($_SESSION['user_data']['acct']['lrn'])){
            $lrn=$_SESSION['user_data']['acct']['lrn'];
            $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
            foreach(defineStudent($aid) as $key=>$val) {
                if($key=="css") { $css_priv=$val; }
                else if($key=="oes") { $oes_priv=$val; }
                else if($key=="scms") { $scms_priv=$val; }
                else if($key=="sis") { $sis_priv=$val; }
            }
        }else if(isset($_SESSION['user_data']['acct']['emp_no'])){
            $emp=$_SESSION['user_data']['acct']['emp_no'];
            $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
            $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
            $recrow=mysqli_fetch_assoc($rec);
            $recid=$recrow['rec_no'];
            foreach(definePerson($aid) as $key=>$val) {
                if($key=="css") { $css_priv=$val; }
                else if($key=="dms") { $dms_priv=$val; }
                else if($key=="ims") { $ims_priv=$val; }
                else if($key=="ipcr") { $ipcr_priv=$val; }
                else if($key=="pims") { $pims_priv=$val; }
                else if($key=="pms") { $pms_priv=$val; }
                else if($key=="oes") { $oes_priv=$val; }
                else if($key=="prs") { $prs_priv=$val; }
                else if($key=="scms") { $scms_priv=$val; }
                else if($key=="sis") { $sis_priv=$val; }
                else if($key=="job") { $job_title=$val; }
                else if($key=="emp_type") { $emp_type=$val; }
                else if($key=="user_type") { $user_type=$val; }
                else if($key=="css_admin") { $css_admin=$val; }
                else if($key=="dms1_admin") { $dms1_admin=$val; }
                else if($key=="dms2_admin") { $dms2_admin=$val; }
                else if($key=="ims_admin") { $ims_admin=$val; }
                else if($key=="ipcr1_admin") { $ipcr1_admin=$val; }
                else if($key=="ipcr2_admin") { $ipcr2_admin=$val; }
                else if($key=="pims1_admin") { $pims1_admin=$val; }
                else if($key=="pims2_admin") { $pims2_admin=$val; }
                else if($key=="pms1_admin") { $pms1_admin=$val; }
                else if($key=="pms2_admin") { $pms2_admin=$val; }
                else if($key=="oes_admin") { $oes_admin=$val; }
                else if($key=="prs1_admin") { $prs1_admin=$val; }
                else if($key=="prs2_admin") { $prs2_admin=$val; }
                else if($key=="scms1_admin") { $scms1_admin=$val; }
                else if($key=="scms2_admin") { $scms2_admin=$val; }
                else if($key=="sis_admin") { $sis_admin=$val; }
            }
        }
    }
    else {
        //header('Location: ../index.php');
        //die('');
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php 
    include("../db/dbcon.php");
    //Identify if Teaching or Non Teaching
    //! If teaching get dept_id
    //Identify job title if regular teacher(TCH1-4), master teacher(MTCHR1-4), Department Head(HTEACH1-6), ICT Director(ICTD1)
    //Modules if regualr teacher OR Master Teacher OR Department Head: FRMS, PMS, SCMS,SIS,OES,PIMS,IPCR [User Type:User]
    //Modules if ICT Director : FRMS, PMS, SCMS,SIS,OES,PIMS,IPCR [User Type:Admin]

    //! If non teaching
    //Identify the job title: Supply Officer(SUO1),Record Keeper(RK1),Human Resource(HRM1),Registrar(REG),Cashier(CASH),Nurse(NURS),Secondary School Principal(SECSP1-2),School Principal(SP1-4)
    //If SUO: FRMS,PMS,SCMS,PIMS,IMS [User Type:Admin]
    //If RK: FRMS,PMS,SCMS,PIMS,SIS [User Type:Admin]
    //If HRM: FRMS,PMS,SCMS,PIMS,PRS [User Type:Admin]
    //If REG: FRMS,PMS,SCMS,PIMS,PMS [User Type:Admin]
    //If CASH: FRMS,PMS,SCMS,PIMS [User Type:Admin]
    //If NURS: FRMS,PMS,SCMS,PIMS [User Type:Admin]
    //If SECSP: FRMS,PMS,SCMS,PIMS [User Type:Admin]
    //If SP: FRMS,PMS,SCMS,PIMS,IMS,IPCR,IMS [User Type:Superadmin]

    //! CSS Admin cannot be identified if teaching or non teaching but the principal assigns the person and that person should only have the css priv set as 1
    
    
    //Administrator names should be identified
    //FRMS: School Related Document Admin(ICTD), Personnel Information Document Admin(HRM)
    //PMS: Procurement Admin(SUO), Verification Admin(SP)
    //IMS: Inventory Admin(SUO)
    //SCMS: Main Health Record Admin(NURS)
    //SIS: Record Admin(RK)
    //OES: *All Teaching Faculty*
    //PIMS: Leave Management Admin(SECSP), Personnel Managemnet Admin(ICTD)
    //IPCR: Evaluation Verification Admin(SP), Department Evaluation Admin(HTEACH1-6)
    //PRS: Time Record Admin(HRM), Payroll Admin1&2(REG || CASH)
    //CSS: *Appointed*
    ?>    
<body>
    <form method="post">
    <a href="cons.php"><h6>Account Constraints</h6></a>
    <?php 
        if(isset($_GET['cr'])){ ?>   
    <h1>Create Account:</h1>
    
    <br>
    <?php 
        $id=$_GET['id'];    
        $ns=$mysqli->query("SELECT p_fname FROM pims_personnel WHERe emp_no=$id");
        $nr=$ns->fetch_assoc();
        ?>
    <input value="<?php echo strtolower($nr['p_fname']);?>" name="uname">    
    <input value="<?php echo strtolower($nr['p_fname']."_pnhs");?>" type="password" name="pw">    
    <br>
    <button name="btn">Confirm</button>
    <?php    
            //dms,css,pms,ipcrms,scms,pims,scms,oes
            
            
    ?>
    </form> 
    <table style="border:1px solid black; " >
        <tr>
            <th style="border:1px solid black; ">Name</th>
            <th style="border:1px solid black; ">Faculty Type</th>
            <th style="border:1px solid black; ">Job Title</th>
            <th style="border:1px solid black; ">Action</th>
        </tr>
        
            <?php 
                $cons=$mysqli->query("Select pims_personnel.emp_no,concat(p_fname,' ',p_lname) as Name,faculty_type,pims_employment_records.job_title_code FROM pims_personnel,pims_employment_records,pims_job_title
                WHERE pims_personnel.emp_no NOT IN (SELECT emp_no FROM cms_account)
                AND pims_employment_records.emp_no=pims_personnel.emp_no
                AND pims_employment_records.job_title_code=pims_job_title.job_title_code ORDER BY Name ASC");
                while($consr=$cons->fetch_assoc()){  ?>
            
        <tr>
            <th style="border:1px solid black; "><?php echo $consr['Name'];?></th>
            <th style="border:1px solid black; "><?php echo $consr['faculty_type'];?></th>
            <th style="border:1px solid black; "><?php echo $consr['job_title_code'];?></th>
            <th style="border:1px solid black; "><a href="create.php?cr=1&id=<?php echo $consr['emp_no'];?>">Create Account</a></th>
        </tr> 
            <?php
                    }
            ?>
        
    </table>
</body>
</html>