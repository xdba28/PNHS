<?php
//Update question
session_start();
if(isset($_POST['edit_save_btn'])){
	//Connect to database
	require 'connect.php';
	require 'func.php';
	$question_no = base64_url_decode($_POST['edit_question_no']);
	echo $question_no;
	echo $question_type = $_POST['edit_question_type'];
	echo $question = $_POST['edit_question'];
	
	
	// Get sched_id for subject and teacher
	$mysqli->autocommit(false);
	$mysqli->begin_transaction();
	
	
	//Select question number of the inserted question
	function select_quest($question_no, $question){
		require 'connect.php';
		$get_ques_no = $mysqli->query("SELECT * from oes_question_bank where question_no = '$question_no' FOR UPDATE");
		if ( $get_ques_no->num_rows == 1 ){
			$question = $mysqli->escape_string($question);
			$mysqli->query("UPDATE oes_question_bank set question = '$question' where question_no = '$question_no'");
			return false;
		}else {
			$mysqli->rollback();
			throw new Exception("The question can't be found. Please try again.");
			return true;
		}
	}
	
	function delete_answers($question_no, $question_type){
		require 'connect.php';
		switch($question_type){
			case 'Identification':
				$sel_ans = $mysqli->query("SELECT * from oes_ques_iden where question_no = '$question_no' FOR UPDATE");
				if ($sel_ans->num_rows > 0){
					$mysqli->query("DELETE FROM oes_ques_iden where question_no = '$question_no'");
					return false;
				}
				$sel_ans->close();
				break;
			case 'Multiple Choice':
				$sel_ans = $mysqli->query("SELECT * from oes_ques_mulchoice where question_no = '$question_no' FOR UPDATE");
				if ($sel_ans->num_rows > 0){
					$mysqli->query("DELETE FROM oes_ques_mulchoice where question_no = '$question_no'");
					return false;
				}else {
					throw new Exception("The question can't be found. Please try again.");
					return true;
				}
				$sel_ans->close();
				break;
			case 'Enumeration':
				$sel_ans = $mysqli->query("SELECT * from oes_ques_enum where question_no = '$question_no' FOR UPDATE");
				echo $sel_ans->num_rows;
				if ($sel_ans->num_rows > 0){
					$mysqli->query("DELETE FROM oes_ques_enum where question_no = '$question_no'");
					return false;
				}else {
					throw new Exception("The question can't be found. Please try again.");
					return true;
				}
				$sel_ans->close();
				break;
		}
	}
	try{
		select_quest($question_no, $question);
		delete_answers($question_no, $question_type);
		switch($question_type){
			case 'Identification':
				foreach( $_POST['edit_iden_correct'] as $index_edit_iden_ans => $edit_iden_correct){
					try{
						$edit_iden_correct = $mysqli->escape_string($edit_iden_correct);
						$edit_iden_correct = explode(" ",$edit_iden_correct);
						$edit_iden_correct = implode("_",$edit_iden_correct);

						$result_iden = $mysqli->query("insert into oes_ques_iden(iden_id, question_no, id_key_answer) values(NULL,'$question_no', '$edit_iden_correct')");
						if(!$result_iden){
							throw new Exception("Cannot save answer to database. Please try again!");
						} else {
							$mysqli->commit();
						}
					}catch(Exception $iden){
						$mysqli->rollback();
						echo "Error: " . $iden->getMessage();
					}
					}
				break;
			case 'Multiple Choice':
				$edit_mul_correct = $_POST['edit_mul_correct']; 
				$edit_mul_correct = $mysqli->escape_string($edit_mul_correct);
				$edit_mul_correct = explode(" ",$edit_mul_correct);
				$edit_mul_correct = implode("_",$edit_mul_correct);
				foreach( $_POST['edit_mul_wrong'] as $index_mul_wrong => $edit_mul_wrong){
					try{
						$edit_mul_wrong = $mysqli->escape_string($edit_mul_wrong);
						$edit_mul_wrong = explode(" ",$edit_mul_wrong);
						$edit_mul_wrong = implode("_",$edit_mul_wrong);
						$result_mul = $mysqli->query("INSERT INTO `oes_ques_mulchoice` (`mul_id`, `question_no`, `choice`, `mul_key_answer`) VALUES (NULL, '$question_no', '$edit_mul_wrong', '$edit_mul_correct')");
						if(!$result_mul){
							throw new Exception("Cannot save answer to database. Please try again!");
						} else {
							$mysqli->commit();
						}
					}catch(Exception $mul){
						$mysqli->rollback();
						echo "Error: " . $mul->getMessage();
					}
				}
				echo "<br>";
				break;
			case "Enumeration":
				foreach( $_POST['edit_enum_answer'] as $index_edit_mul_ans => $edit_enum_answer){
					try{
						$edit_enum_answer = $mysqli->escape_string($edit_enum_answer);
						$edit_enum_answer = explode(" ",$edit_enum_answer);
						$edit_enum_answer = implode("_",$edit_enum_answer);
						$result_iden = $mysqli->query("insert into oes_ques_enum(enum_id, question_no, en_key_answers) values(NULL,'$question_no', '$edit_enum_answer')");
							if(!$result_iden){
								throw new Exception("Cannot save answer to database. Please try again!");
							} else {
								$mysqli->commit();
							}
					}catch(Exception $enum){
						$mysqli->rollback();
						echo "Error: " . $enum->getMessage();
					}
				}
				break;
				}//end of switch statement
				
				$mysqli->close();
				header('Location: ../question.php?tab=2');
	}catch(Exception $e){
		$mysqli->close();
		echo 'Error! ' . $e->getMessage();
	}
	
	
	}//end of if
			
	
?>