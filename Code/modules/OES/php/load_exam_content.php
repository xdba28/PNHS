<?php
//Load existing exam contents for editing
	if(isset($_POST['exam_no'])){
	require "connect.php";
	require 'func.php';
	$exam_no = base64_url_decode($_POST['exam_no']);
	try{
	$result_question = $mysqli->query("select bnk.*, ex_cont.points from oes_question_bank bnk, oes_exam_content ex_cont where bnk.question_no = ex_cont.question_no and ex_cont.exam_no = '$exam_no' order by ex_cont.content_no asc");
	
	if($result_question->num_rows > 0){
		$data = array();
		while($row = $result_question->fetch_array()){
			$ques_bank[] = $row;
		}
		$result_question->close();
		
		foreach($ques_bank as $ques){
			$question_type = $ques['question_type'];
			$question_no = $ques['question_no'];
			$mark = $ques['points'];
			$key_answer = '';
			$wrong = '';
			switch($question_type){
				case "Identification":
				try{
					$iden_query = $mysqli->query("select id_key_answer from oes_ques_iden where question_no = '$question_no' order by iden_id asc");
					if($iden_query){
						$iden_answer = array();
						while($iden_row = $iden_query->fetch_array()){
							$iden_answer[] = $iden_row;
						}
						foreach($iden_answer as $iden){
							$ans = $iden['id_key_answer'];
							$key_answer = $key_answer . $ans ." ";
							
						}
						$iden_query->close();
					} else {
						$key_answer = '';
						$wrong='';
						$mysqli->rollback();
						throw new Exception("There's an error in retrieving the question. Please try again!");
					}
				} catch(Exception $iden_err){
					echo "ERROR: " . $iden_err->getMessage();
				}
				break;
				
				case "Multiple Choice":
				try{
					$mul_query = $mysqli->query("select mul_key_answer, choice from oes_ques_mulchoice where question_no = '$question_no' order by mul_id asc");
					if($mul_query){
						$mul_answer = array();
						while($mul_numrow = $mul_query->fetch_array()){
							$mul_answer[] = $mul_numrow;
						}
						foreach($mul_answer as $mul){
							$key_answer = $mul['mul_key_answer'];
							$ans = $mul['choice'];
							$wrong = $wrong . $ans . " ";
						}
						$mul_query->close();
					} else {
						$key_answer = '';
						$wrong='';
						$mysqli->rollback();
						throw new Exception("There's an error in retrieving the question. Please try again!");
					}
				} catch(Exception $mul_err){
					echo "ERROR: " . $mul_err->getMessage();
				}
				break;
				
				case "Enumeration":
				try{
					$enum_query = $mysqli->query("select en_key_answers from oes_ques_enum where question_no = '$question_no' order by enum_id asc");
					if($enum_query){
						$enum_answer = array();
						while($enum_numrow = $enum_query->fetch_array()){
							
							$enum_answer[] = $enum_numrow;
							
						}
						foreach($enum_answer as $enum){
							$ans = $enum['en_key_answers'];
							$key_answer = $key_answer . $ans ." ";
							
						}
						$enum_query->close();
						
					} else {
						$key_answer = '';
						$wrong='';
						$mysqli->rollback();
						throw new Exception("There's an error in retrieving the question. Please try again!");
					}
				} catch(Exception $enum_err){
					echo "ERROR: " . $enum_err->getMessage();
				}
				break;
			}
			$question = $ques['question']; 
			$data[] = array(
				'question_no' => $question_no,
				'question' => $question,
				'question_type' => $question_type,
				'key_answer' => $key_answer,
				'wrong_answer' => $wrong,
				'mark' => $mark
			);
		}
		foreach($data as $key=>$dat){
				$data[$key]['question_no'] = base64_url_encode($dat['question_no']);
		}
		echo json_encode($data);
	} else {
		$mysqli->rollback();
		throw new Exception("There's an error in retrieving the question. Please try again.");
	}
	} catch(Exception $sel_err){
		echo "ERROR!" . $sel_err->getMessage();
	}
	}
?>