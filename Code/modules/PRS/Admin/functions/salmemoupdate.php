<html>
<head>
 <link rel="stylesheet" href="../../css/sweetalert.css">
 <script src="../../jquery/jquery.min.js"></script>
 <script src="../../js/sweetalert-dev.js"></script>
</head>
<body>
<?php
		include('../../connection.php');

		
		if(isset($_POST['memosubmit']))
		{		$memo = $_POST['memo'];
                
				$memoinsert = mysqli_query ($mysqli,"INSERT INTO prs_setting (name_setting, special_attribute, changes) VALUES('SALARY MEMO', 'Salary Memo' ,'$memo')") or die("memoinsert have an error!");
                   $emp = mysqli_query($mysqli,"SELECT * FROM pims_personnel");
                 
                    while($emprow= mysqli_fetch_assoc($emp))
                    {	
                        $emp_No = $emprow['emp_No'];
                        $stepselect = mysqli_query($mysqli,"SELECT prs_salary.step as step, prs_grade.grade as grade FROM pims_personnel, prs_salary_memo, prs_salary, prs_grade, prs_salary_record
                        WHERE prs_salary_memo.sal_memo_id = prs_salary.sal_memo_id
                        AND   prs_grade.grade_id = prs_salary.grade_id
                        AND   prs_salary.salary_id = prs_salary_record.salary_id
                        AND   prs_grade.grade_id = prs_salary_record.grade_id
                        AND   pims_personnel.emp_No = prs_salary_record.emp_No
                        AND   pims_personnel.emp_No = '$emp_No'") or die("stepselect have error!"); 
                        while($steprow=mysqli_fetch_assoc($stepselect))
                        {
                            $step1 = $steprow['step'];
                            $grade1 = $steprow['grade'];
                            $select = mysqli_query($mysqli,"SELECT * FROM prs_salary, prs_salary_memo, prs_grade								   
                            WHERE prs_salary_memo.sal_memo_id = prs_salary.sal_memo_id
                            AND   prs_grade.grade_id = prs_salary.grade_id
                            AND   prs_salary_memo.sal_memo_ID='$memo'
                            AND   prs_salary.step = '$step1'
                            AND   prs_grade.grade = '$grade1'") or die("select  have an error!");
                           $step ="";
                           while($selectrow=mysqli_fetch_assoc($select))
                           {
                                $sal_id = $selectrow['salary_id'];
                                $grade_id = $selectrow['grade_id'];
                                $getidsal = mysqli_query($mysqli,"SELECT * FROM pims_personnel, prs_salary_record where pims_personnel.emp_No='$emp_No' and pims_personnel.emp_No=prs_salary_record.emp_No") or die("getidsal have error!");
                                $w=0;// Kaylangan mo kasing gawing array yung results query mo kasi maraming update ang nangyayare dun. kung hindi mo siya gagawing array yung final  update lang siya maga base.
                                while($getrec_row =mysqli_fetch_assoc($getidsal))
                                {
                                    $rec_id = $getrec_row['sal_rec_id'];
                                    $update = mysqli_query($mysqli,"UPDATE prs_salary_record set salary_id ='$sal_id' , grade_id='$grade_id' WHERE sal_rec_id='$rec_id'") or die("Failed Sql Query");
                                    //r=Right , x=Wrong
                                   
                                }
                           }

                        }
                        
				    }
                        echo "<script>swal({ title:'Salary Memo Has Been Updated For This Year!',type:'success'}, function(){window.location.href='../../Admin/setting.php'});</script>";

                    
                }
?>
</body>
</html>