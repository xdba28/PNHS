<html>
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
    //PRS: Time Record Admin(HRM), Payroll Admin(REG || CASH)
    //CSS: *Appointed*
    ?>
    <script src="js/jquery.min.js"></script>
    <script>
            function per(val){
                $.ajax({
                    
                    type:"post",
                    url:"cons_ajax.php",
                    data:{
                        emp_val:val
                    },
                    success: function (response){
                        document.getElementById("ftype").innerHTML=response;
                    }
                });
            }
        
            function ft(val){
                $.ajax({
                    
                    type:"post",
                    url:"cons_ajax.php",
                    data:{
                        emp_val1:val
                    },
                    success: function (response){
                        document.getElementById("jt").innerHTML=response;
                    }
                });
            }
        </script>
    
<body>
    <h1>Account Constraints:</h1>
    <h4>Select Module:</h4>
    <a href="cons.php?m=CSS">CSS</a>
    <a href="cons.php?m=FRMS">DMS</a>
    <a href="cons.php?m=IMS">IMS</a>
    <a href="cons.php?m=IPCRMS">IPCRMS</a>
    <a href="cons.php?m=OES">OES</a>
    <a href="cons.php?m=PIMS">PIMS</a>
    <a href="cons.php?m=PMS">PMS</a>
    <a href="cons.php?m=PRS">PRS</a>
    <a href="cons.php?m=SCMS">SCMS</a>
    <a href="cons.php?m=SIS">SIS</a>
    
    <br>
    <form method="post">
    <?php 
        if(isset($_GET['m'])){ ?>
    <select onchange="per(this.value), ft(this.value)" name="pers">
        <option value="">Personnel</option>
        <?php 
            $jtq=$mysqli->query("SELECT emp_no,concat(p_fname,' ',p_lname) as Name FROM pims_personnel");
            while($jtr=$jtq->fetch_assoc()){
                echo "<option value='".$jtr['emp_no']."'>".$jtr['Name']."</option>";
            }
        ?>
    </select>    
    <select id="ftype" required name="ftype">
        <option value="">Faculty Type</option>
<!--
        <option value="">Faculty Type</option>
        <option value="Teaching">Teaching</option>
        <option value="Non Teaching">Non Teaching</option>
-->
    </select>
    <select id="jt" name="jt">
        <option value="">Job Title</option>
        <?php 
//            $jtq=$mysqli->query("SELECT job_title_code,job_title_name FROM pims_job_title");
//            while($jtr=$jtq->fetch_assoc()){
//                echo "<option value='".$jtr['job_title_code']."'>".$jtr['job_title_name']."</option>";
//            }
        ?>
    </select>
        
    <select name="admin">
        <option value="">Admin Type</option>
        <option value="School Related Document Admin">School Related Document Admin</option>
        <option value="Personnel Information Document Admin">Personnel Information Document Admin</option>
        <option value="Procurement Management Admin">Procurement Admin</option>
        <option value="Verification Admin">Verification Admin</option>
        <option value="Inventory Management Admin">Inventory Admin</option>
        <option value="Health Record Admin">Health Record Admin</option>
        <option value="Record Admin">Record Admin</option>
        <option value="Leave Management Admin">Leave Management Admin</option>
        <option value="Personnel Managemnet Admin">Personnel Managemnet Admin</option>
        <option value="Evaluation Verification Admin">Evaluation Verification Admin</option>
<!--        <option value="Department Evaluation Admin">Department Evaluation Admin</option>-->
        <option value="Time Record Admin">Time Record Admin</option>
        <option value="Payroll Admin">Payroll Admin</option>
        <option value="Class Scheduling Admin">Class Scheduling Admin</option>
    </select>
    <input value="<?php echo $m=$_GET['m'];?>" type="hidden" name="mod">    
    <br>
    <button name="btn">Confirm</button>
    <?php    
            //dms,css,pms,ipcrms,scms,pims,scms,oes
            
            if(isset($_POST['btn'])){
                $ftype=$_POST['ftype'];
                $jt=preg_replace('/[0-9]+/', '',$_POST['jt']);
                $per=$_POST['pers'];
                
                $mod=$_POST['mod'];
                $admin=$_POST['admin'];
                $qry=$mysqli->query("INSERT INTO cms_admin_cons(job_title_code,module,faculty_type,admin_type,emp_no) VALUES('$jt','$mod','$ftype','$admin',$per)");
                if($qry){
                    if($admin="School Related Document Admin"){
                        $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,fmrs_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','0','1','1','0','0','1','Admin',$acct)");
                        //echo "<script>alert('Success');</script>";
                    }else if($admin="Personnel Information Document Admin"){
                        $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,fmrs_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','0','0','0','1','0','0','Admin',$acct)");
                        //echo "<script>alert('Success');</script>";
                    }else if($admin="Procurement Management Admin"){
                        $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,fmrs_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','1','0','0','0','0','0','Admin',$acct)");
                        //echo "<script>alert('Success');</script>";
                    }else if($admin="Verification Admin"){
                        $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,fmrs_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','0','0','0','0','0','0','Admin',$acct)");
                        //echo "<script>alert('Success');</script>";
                    }else if($admin="Inventory Management Admin"){
                        $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,fmrs_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','1','0','0','0','0','0','Admin',$acct)");
                        //echo "<script>alert('Success');</script>";
                    }else if($admin="Health Record Admin"){
                        $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,fmrs_priv,pms_priv,scms_priv,pims_priv, ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','0','0','0','0','0','0','Admin',$acct)");
                        //echo "<script>alert('Success');</script>";
                    }else if($admin="Record Admin"){
                        $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,fmrs_priv,pms_priv,scms_priv,pims_priv, ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1',
                        '0','0','0','0','0','1','Admin',$acct)");
                        //echo "<script>alert('Success');</script>";
                    }else if($admin="Leave Management Admin"){
                        $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,fmrs_priv,pms_priv,scms_priv,pims_priv, ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1',
                        '0','0','0','0','0','0','Admin',$acct)");
                        //echo "<script>alert('Success');</script>";
                    }else if($admin="Personnel Managemnet Admin"){
                        $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,fmrs_priv,pms_priv,scms_priv,pims_priv, ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1',
                        '0','0','0','0','0','1','Admin',$acct)");
                        //echo "<script>alert('Success');</script>";
                    }else if($admin="Evaluation Admin"){
                        
                        //echo "<script>alert('Success');</script>";
                    }else if($admin="Time Record Admin"){
                        
                        //echo "<script>alert('Success');</script>";
                    }else if($admin="Payroll Admin"){
                        
                        //echo "<script>alert('Success');</script>";
                    }else if($admin="Class Scheduling Admin"){
                        
                        //echo "<script>alert('Success');</script>";
                    }
                    
                }else{
                    echo "<script>alert('Error');</script>";
                }
                //echo $ftype." ".$jt." ".$dept;
            }
        }
    ?>
    </form> 
    <table style="border:1px solid black; " >
        <tr>
            <th style="border:1px solid black; ">Module</th>
            <th style="border:1px solid black; ">Personnel</th>
            <th style="border:1px solid black; ">Faculty Type</th>
            <th style="border:1px solid black; ">Job Title</th>
            <th style="border:1px solid black; ">Admin Type</th>
        </tr>
        
            <?php 
                $cons=$mysqli->query("SELECT module,concat(p_fname,' ',p_lname) as Name,faculty_type,job_title_code,admin_type FROM cms_admin_cons,pims_personnel WHERE pims_personnel.emp_no=cms_admin_cons.emp_no ORDER BY module");
                while($consr=$cons->fetch_assoc()){ ?>
        <tr>
            <th style="border:1px solid black; "><?php echo $consr['module'];?></th>
            <th style="border:1px solid black; "><?php echo $consr['Name'];?></th>
            <th style="border:1px solid black; "><?php echo $consr['faculty_type'];?></th>
            <th style="border:1px solid black; "><?php echo $consr['job_title_code'];?></th>
            <th style="border:1px solid black; "><?php echo $consr['admin_type'];?></th>
        </tr>            
            <?php
                }
            ?>
        
    </table>
</body>
</html>