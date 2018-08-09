<?php
//Delete questions
//Exemptions: 
// when a question is included in an exam
	session_start();
	if(isset($_POST['question_no'])){
		try{
			
			require "connect.php";
			require "func.php";
			$mysqli->autocommit(false);
			$mysqli->begin_transaction();
			$question_no = base64_url_decode($_POST['question_no']);
			$ques_sel = $mysqli->query("SELECT question from oes_question_bank where question_no = '$question_no' FOR UPDATE");
			if($ques_sel->num_rows > 0){
				$del = $mysqli->query("DELETE FROM oes_question_bank WHERE question_no = '$question_no'");
				if($del){
					$mysqli->commit();
					$response['stat'] = 'Success';
					echo json_encode($response);
				} else {
					$mysqli->rollback();
					throw new Exception("Delete Error! There is an error in deleting the question. Please try again.");
				}
				$mysqli->close();
			} else {
				throw new Exception("Delete Error! Unable to delete the question. Please try again.");
			}
		} catch(Exception $del_err){
			$response['stat'] = 'Failed';
			echo json_encode($response);
		}
	}
?>