<?php 
//Used to get logistics of exam
    session_start();
	if(isset($_POST['subject_code']) && !empty($_SESSION['user_data']['acct']['emp_no'])){
		require 'connect.php';
		require 'func.php';
		$subject_code = base64_url_decode($_POST['subject_code']);
		$emp_no = $_SESSION['user_data']['acct']['emp_no'];
		$get_exam = $mysqli->query("select distinct(ex_g.exam_no) from oes_exam_group ex_g, css_schedule sched, pims_employment_records emp_rec where sched.sched_id = ex_g.sched_id and sched.emp_rec_id = emp_rec.emp_rec_ID and sched.subject_id = '$subject_code' and emp_rec.emp_no = '$emp_no' LOCK IN SHARE MODE");
		
		if($get_exam){
			
			if($get_exam->num_rows > 0){
				while($exams = $get_exam->fetch_array()){
					$exam_det[] = $exams;
				}
				foreach($exam_det as $exam_dat){
					$exam_no = $exam_dat['exam_no'];
					$query = sprintf('select count(CASE WHEN equivalent_grade BETWEEN 0 AND 10 THEN 1 END) as "0 to 10", count(CASE WHEN equivalent_grade BETWEEN 11 AND 20 THEN 1 END) as "11 to 20", count(CASE WHEN equivalent_grade BETWEEN 21 AND 30 THEN 1 END) as "21 to 30", count(CASE WHEN equivalent_grade BETWEEN 31 AND 40 THEN 1 END) as "31 to 40", count(CASE WHEN equivalent_grade BETWEEN 41 AND 50 THEN 1 END) as "41 to 50", count(CASE WHEN equivalent_grade BETWEEN 51 AND 60 THEN 1 END) as "51 to 60", count(CASE WHEN equivalent_grade BETWEEN 61 AND 70 THEN 1 END) as "61 to 70", count(CASE WHEN equivalent_grade BETWEEN 71 AND 80 THEN 1 END) as "71 to 80", count(CASE WHEN equivalent_grade BETWEEN 81 AND 90 THEN 1 END) as "81 to 90", count(CASE WHEN equivalent_grade BETWEEN 91 AND 100 THEN 1 END) as "91 to 100", ex.exam_title from oes_exam_result res, oes_exam ex where res.exam_no = ex.exam_no and res.exam_no = %u',$exam_no);
					$result = $mysqli->query($query);
					if($result){
        
						if ($result = $mysqli->query($query)) {
							while($rows = $result->fetch_array()){
								$row_res[] = $rows;
							}
							
							$data = array();
							foreach($row_res as $row){
								$data[] = array(
									"zero"=>$row[0],
									"one"=>$row[1],
									"two"=>$row[2],
									"three"=>$row[3],
									"four"=>$row[4],
									"five"=>$row[5],
									"six"=>$row[6],
									"seven"=>$row[7],
									"eight"=>$row[8],
									"nine"=>$row[9],
									"exam_title" => $row[10]
								);
							}
							
							//
						
						}
					}
			}
			//print_r($row_res);
			echo json_encode($data);
		}
		}
	} else if(isset($_POST['exam_no']) && isset($_POST['sched_id'])){
		require 'connect.php';
		require 'func.php';
		$exam_no = base64_url_decode($_POST['exam_no']);
		$sched_id = base64_url_decode($_POST['sched_id']);
		
		$query = sprintf('select count(CASE WHEN equivalent_grade BETWEEN 0 AND 10 THEN 1 END) as "0 to 10", count(CASE WHEN equivalent_grade BETWEEN 11 AND 20 THEN 1 END) as "11 to 20", count(CASE WHEN equivalent_grade BETWEEN 21 AND 30 THEN 1 END) as "21 to 30", count(CASE WHEN equivalent_grade BETWEEN 31 AND 40 THEN 1 END) as "31 to 40", count(CASE WHEN equivalent_grade BETWEEN 41 AND 50 THEN 1 END) as "41 to 50", count(CASE WHEN equivalent_grade BETWEEN 51 AND 60 THEN 1 END) as "51 to 60", count(CASE WHEN equivalent_grade BETWEEN 61 AND 70 THEN 1 END) as "61 to 70", count(CASE WHEN equivalent_grade BETWEEN 71 AND 80 THEN 1 END) as "71 to 80", count(CASE WHEN equivalent_grade BETWEEN 81 AND 90 THEN 1 END) as "81 to 90", count(CASE WHEN equivalent_grade BETWEEN 91 AND 100 THEN 1 END) as "91 to 100" from oes_exam_result res, oes_exam_group ex_g, css_schedule sched, sis_stu_rec stu_rec, sis_student stud, css_section sect where res.exam_no = ex_g.exam_no and ex_g.sched_id = sched.sched_id and sched.section_id = stu_rec.section_id and sched.section_id = sect.section_id and res.lrn = stu_rec.lrn and stu_rec.lrn = stud.lrn and res.exam_no =%u and ex_g.sched_id = %u',$exam_no, $sched_id);
		$result = $mysqli->query($query);
		if($result){
			$data = array();
			foreach($result as $row){
				
			}
			foreach($row as $key=>$value){
				$data[] = $value;
			}
			
		}
		echo json_encode($data);
	} else if(isset($_POST['exam_no'])){
		require 'connect.php';
		require 'func.php';
		$exam_no = base64_url_decode($_POST['exam_no']);
		
		
		$query = sprintf('select count(CASE WHEN equivalent_grade BETWEEN 0 AND 10 THEN 1 END) as "0 to 10", count(CASE WHEN equivalent_grade BETWEEN 11 AND 20 THEN 1 END) as "11 to 20", count(CASE WHEN equivalent_grade BETWEEN 21 AND 30 THEN 1 END) as "21 to 30", count(CASE WHEN equivalent_grade BETWEEN 31 AND 40 THEN 1 END) as "31 to 40", count(CASE WHEN equivalent_grade BETWEEN 41 AND 50 THEN 1 END) as "41 to 50", count(CASE WHEN equivalent_grade BETWEEN 51 AND 60 THEN 1 END) as "51 to 60", count(CASE WHEN equivalent_grade BETWEEN 61 AND 70 THEN 1 END) as "61 to 70", count(CASE WHEN equivalent_grade BETWEEN 71 AND 80 THEN 1 END) as "71 to 80", count(CASE WHEN equivalent_grade BETWEEN 81 AND 90 THEN 1 END) as "81 to 90", count(CASE WHEN equivalent_grade BETWEEN 91 AND 100 THEN 1 END) as "91 to 100" from oes_exam_result res where res.exam_no = %u',$exam_no);
		$result = $mysqli->query($query);
		if($result){
			$data = array();
			foreach($result as $row){
				
			}
			foreach($row as $key=>$value){
				$data[] = $value;
			}
			
		}
		echo json_encode($data);
	}
    
?>