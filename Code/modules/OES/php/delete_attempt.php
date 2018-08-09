<?php
//Delete attempt of any student based on the exam
if(isset($_POST['lrn']) && isset($_POST['exam_no'])){
	require 'connect.php';
	require 'func.php';
	$lrn = base64_url_decode($_POST['lrn']);
	$exam_no = base64_url_decode($_POST['exam_no']);
	$response['stat'] = "Failed";
	$mysqli->autocommit(false);
	$mysqli->begin_transaction();
	$sel_result = $mysqli->query("select * from oes_exam_result where lrn = '$lrn' and exam_no = '$exam_no' FOR UPDATE");
	try{
	if($sel_result){
		if($sel_result->num_rows > 0){
			$del_result = $mysqli->query("delete from oes_exam_result where lrn = '$lrn' and exam_no = '$exam_no'");
			try{
			if($del_result){
				$mysqli->commit();
				$sel_cont = $mysqli->query("select * from oes_exam_answer ans, oes_exam_content cont where ans.content_no = cont.content_no and cont.exam_no = '$exam_no' and ans.lrn = '$lrn' FOR UPDATE");
				if($sel_cont){
					if($sel_cont->num_rows > 0){
						$del_ans = $mysqli->query("delete ans.* from oes_exam_answer ans, oes_exam_content cont where ans.content_no = cont.content_no and cont.exam_no = '$exam_no' and ans.lrn = '$lrn'");
						if($del_ans){
							$mysqli->commit();
							$response['stat'] = "Success";
						}
					} else {
						$response['stat'] = "Success";
					}
				} 
			}
			} catch(Exception $a){
				$err = "Cannot delete result! " . $a->getMessage();
				$response['err'] = $err;
			}
		}
	}
	} catch(Exception $e){
		$err =  "Result does not exist!" . $e->getMessage();
		$response['err'] = $err;
	}
	
	echo json_encode($response);
	$mysqli->close();
} else if(isset($_POST['exam_no'])) {
	require 'connect.php';
	require 'func.php';
	$exam_no = base64_url_decode($_POST['exam_no']);
	$response['stat'] = "Failed";
	$mysqli->autocommit(false);
	$mysqli->begin_transaction();
	$sel_result = $mysqli->query("select * from oes_exam_result where exam_no = '$exam_no' FOR UPDATE");
	try{
	if($sel_result){
		if($sel_result->num_rows > 0){
			$del_result = $mysqli->query("delete from oes_exam_result where exam_no = '$exam_no'");
			try{
			if($del_result){
				$mysqli->commit();
				$sel_cont = $mysqli->query("select * from oes_exam_answer ans, oes_exam_content cont where ans.content_no = cont.content_no and cont.exam_no = '$exam_no' FOR UPDATE");
				if($sel_cont){
					if($sel_cont->num_rows > 0){
						$del_ans = $mysqli->query("delete ans.* from oes_exam_answer ans, oes_exam_content cont where ans.content_no = cont.content_no and cont.exam_no = '$exam_no'");
						if($del_ans){
							$mysqli->commit();
							$response['stat'] = "Success";
						}
					} else {
						$response['stat'] = "Success";
					}
				} 
			}
			} catch(Exception $a){
				$err = "Cannot delete result! " . $a->getMessage();
				$response['err'] = $err;
			}
		}
	}
	} catch(Exception $e){
		$err =  "Result does not exist!" . $e->getMessage();
		$response['err'] = $err;
	}
	
	echo json_encode($response);
	$mysqli->close();
}
?>