<?php
//Save contents of exam
	session_start();
	if(isset($_POST['save_content'])){
	//Connect to database
	require 'connect.php';
	require 'func.php';
	$subject_id = base64_url_decode($_POST['subject_id']);
	$exam_no = base64_url_decode($_POST['exam_no']);
	$emp_no = $_SESSION['user_data']['acct']['emp_no'];
	
	
	// Get sched_id for subject and teacher
	$mysqli->autocommit(false);
	$mysqli->begin_transaction();
	
	$get_emp_rec = $mysqli->query("select emp_rec_id from pims_employment_records where emp_no = '$emp_no' LOCK IN SHARE MODE");
	
	if($get_emp_rec->num_rows > 0){
		while($row = $get_emp_rec->fetch_array()){
			$emp_rec[] = $row;
		}
		foreach($emp_rec as $emp){
			$emp_rec_id = $emp['emp_rec_id'];
		}
	}
	
	function select_id($question, $question_type, $subject_id, $emp_rec_id){
		require 'connect.php';
		$mysqli->autocommit(false);
		$mysqli->begin_transaction();
		$existing_ques = $mysqli->query("select question_no from oes_question_bank where question = '$question' and question_type='$question_type' and subject_id = '$subject_id' and emp_rec_id = '$emp_rec_id'");
		
		//Check for existing question
		if ($existing_ques->num_rows == 1){
				$ques_num = $existing_ques->fetch_assoc();
				$question_no = $ques_num['question_no'];
				
		} else {
			$question_no = 0;
		}
		return $question_no;
	}
	function delete_content($exam_no){
		//Connect to database
	require 'connect.php';
	$mysqli->autocommit(false);
	$mysqli->begin_transaction();
	try{
	$exam_no = $exam_no;
	$get_ans = $mysqli->query("select * from oes_exam_answer ans, oes_exam_content cont where ans.content_no = cont.content_no and cont.exam_no = '$exam_no'");
	if($get_ans->num_rows > 0){
		$err_mess = "<script>alert('Unable to delete contents. Students answers existing!');</script>";
		//return $err;
	} else {
		$mysqli->query("delete from oes_exam_content where exam_no = '$exam_no'");
		$mysqli->commit();
		return true;
	}
	
	} catch (Exception $e){
		echo "ERROR!".$e->getMessage();
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
				}else {
					$mysqli->rollback();
					throw new Exception("The question can't be found. Please try again.");
					return true;
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
	
	function edit_question($question_no, $question , $question_type){
			require 'connect.php';
			$mysqli->autocommit(false);
			$mysqli->begin_transaction();
			$mysqli->query("UPDATE oes_question_bank set question = '$question' where question_no = '$question_no' FOR UPDATE");
			delete_answers($question_no, $question_type);
	}
	
	function new_question($question, $question_type, $subject_id, $emp_rec_id){
		require 'connect.php';
		$mysqli->autocommit(false);
		$mysqli->begin_transaction();
		$mysqli->query("INSERT INTO `oes_question_bank` (`question_no`, `question`, `question_type`, subject_id, emp_rec_id) VALUES ('', '$question', '$question_type', '$subject_id', '$emp_rec_id')");
		$mysqli->commit();
		$question_no = select_id($question, $question_type, $subject_id, $emp_rec_id);
		return $question_no;
	}
	
	function insert_content($question_no, $exam_no, $index_question){
		require 'connect.php';
	
	$mysqli->autocommit(false);
	$mysqli->begin_transaction();
		foreach($_POST['mark'] as $index_mark => $mark){
			if($index_mark == $index_question){
				try{
					$search_cont = $mysqli->query("select content_no from oes_exam_content where question_no='$question_no' and exam_no='$exam_no'");
					
					if($search_cont->num_rows == 0){
						$ins_cont = $mysqli->query("insert into oes_exam_content(content_no,question_no,exam_no,points) values(NULL,'$question_no','$exam_no','$mark')");
						if($ins_cont){
							$mysqli->commit();
							echo $question_no;
							echo $exam_no;
							echo $index_question;
						} else {
							$mysqli->rollback();
							throw new Exception("There is an error in saving the question to the exam. Please try again");
						}
					} else {
						echo "EXIST";
					}
				} catch(Exception $e){
					echo "ERROR! " . $e->getMessage();
				}
			}
		}
		
	}
	
	try{
		delete_content($exam_no);
		
		if(!empty($_POST['ques_no'])){
		if(!empty($_POST['question'])){
		foreach( $_POST['question'] as $index_question => $question ){
		
		$question = $mysqli->escape_string($question);
		foreach( $_POST['question_type'] as $index_ques_type => $question_type ){
			if($index_ques_type == $index_question){
				foreach( $_POST['ques_no'] as $index_question_no => $question_no){
					$question_no = base64_url_decode($question_no);
					if($index_question_no == $index_question){
					try {
						
						if($question_no != 0){
							edit_question($question_no, $question , $question_type);
						} else {
							echo "QUESTION DOES NOT EXIST!!!!!!";
							$question_no = new_question($question, $question_type, $subject_id, $emp_rec_id);
						}
						echo "QUESTION NO =" . $question_no;
						switch($question_type){
							case 'Identification':
							foreach( $_POST['iden_no_correct'] as $index_iden_no_correct => $iden_no_correct){
								if($index_iden_no_correct < 1){ 
									foreach( $_POST['iden_correct'] as $index_iden_ans => $iden_correct){
										if($index_iden_ans < $iden_no_correct){
											try{
												echo $question;
												$iden_correct = $mysqli->escape_string($iden_correct);
												$iden_correct = explode(" ",$iden_correct);
												$iden_correct = implode("_",$iden_correct);
												$result_iden = $mysqli->query("insert into oes_ques_iden(iden_id, question_no, id_key_answer) values(NULL,'$question_no', '$iden_correct')");
												if(!$result_iden){
													throw new Exception("Cannot save answer to database. Please try again!");
												} else {
													$mysqli->commit();
													
												}
												
											}
											catch(Exception $iden){
												$mysqli->rollback();
												echo "Error: " . $iden->getMessage();
											}
											
										} else {
											$_POST['iden_correct'] = array_splice($_POST['iden_correct'],$iden_no_correct);
											break;
										}
									}
								}else{
									$_POST['iden_no_correct'] = array_splice($_POST['iden_no_correct'],1); //remove 1st element and reindex the others
									print_r($_POST['iden_no_correct']);
									break;
								}
							}
							
							break;
							case 'Multiple Choice':
										foreach( $_POST['mul_correct'] as $index_mul_ans => $mul_correct){
											if($index_mul_ans < 1){
												$mul_correct = $mysqli->escape_string($mul_correct);
												$mul_correct = explode(" ",$mul_correct);
												echo $mul_correct = implode("_",$mul_correct);
												
												foreach( $_POST['mul_no_wrong'] as $index_mul_no_wrong => $mul_no_wrong){
													if ($index_mul_no_wrong < 1){
														foreach( $_POST['mul_wrong'] as $index_mul_wrong => $mul_wrong){
															if ($index_mul_wrong < $mul_no_wrong ){
																try{
																	$mul_wrong = $mysqli->escape_string($mul_wrong);
																	$mul_wrong = explode(" ",$mul_wrong);
																	echo $mul_wrong = implode("_",$mul_wrong);
																	$result_mul = $mysqli->query("INSERT INTO `oes_ques_mulchoice` (`mul_id`, `question_no`, `choice`, `mul_key_answer`) VALUES (NULL, '$question_no', '$mul_wrong', '$mul_correct')");
																	if(!$result_mul){
																		throw new Exception("Cannot save answer to database. Please try again!");
																	} else {
																		$mysqli->commit();
																	}
																}
																catch(Exception $mul){
																	$mysqli->rollback();
																	//echo "Error: " . $mul->getMessage();
																}
															}else {
																$_POST['mul_wrong'] = array_splice($_POST['mul_wrong'],$mul_no_wrong);
																break;
															}
														} 
													}else {
														$_POST['mul_no_wrong'] = array_splice($_POST['mul_no_wrong'],1); //remove 1st element and reindex the others
														break;
													}
												}
											} else {
												$_POST['mul_correct'] = array_splice($_POST['mul_correct'],1);
												break;
											}
										}
								break;
								case "Enumeration":
									foreach( $_POST['enum_no_correct'] as $index_enum_no_correct => $enum_no_correct){
										if($index_enum_no_correct < 1){ 
											foreach( $_POST['enum_answer'] as $index_enum_ans => $enum_answer){
												if($index_enum_ans < $enum_no_correct){
													try{
														$enum_answer = $mysqli->escape_string($enum_answer);
														$enum_answer = explode(" ",$enum_answer);
														$enum_answer = implode("_",$enum_answer);
														echo $enum_answer . "<br>";
														
														$result_enum = $mysqli->query("insert into oes_ques_enum(enum_id, question_no, en_key_answers) values(NULL,'$question_no', '$enum_answer')");
														if(!$result_enum){
															throw new Exception("Cannot save answer to database. Please try again!");
														} else {
															$mysqli->commit();
														}
													} catch(Exception $enum){
														$mysqli->rollback();
														echo "Error: " . $enum->getMessage();
													}
												} else {
													
													$_POST['enum_answer'] = array_splice($_POST['enum_answer'],$enum_no_correct);
													
													break;
												}
											}
										}else{
											$_POST['enum_no_correct'] = array_splice($_POST['enum_no_correct'],1); //remove 1st element and reindex the others
											break;
										}
									}
									break;
					}//end of switch statement
					insert_content($question_no, $exam_no, $index_question);
	
							
								
								}//end of another try
								catch(Exception $t_err){
									echo "ERROR! " . $t_err->getMessage();
								}
					}//end of ques_no if
				}//end of foreach ques_no
								
					
			}//end of if - q_type(Never put else & break for foreach of question_type )
			
		}//end of foreach question_type(Never put )
		
	}//end of foreach question
	
	}
	}
	$it = 0;
	$items = $mysqli->query("select points from oes_exam_content where exam_no = '$exam_no'");
	if($items->num_rows > 0){
		while($items_up = $items->fetch_array()){
			$row[] = $items_up;
		}
		
		foreach($row as $rows){
			$it = $it + $rows[0];
		}
		
	}
	try{
		$ral = $mysqli->query("UPDATE oes_exam set no_of_items = '$it' where exam_no = '$exam_no'");
		if($ral){
			$mysqli->commit();
		} 
	} catch(Exception $y){
		echo "There is an error in saving the question(s) into the database. Please try again.";
	}
	
	   
	}	catch(Exception $s){
		echo "There is an error in saving the question(s) into the database. Please try again.";
	
	}
	$mysqli->close();
	header("Location: ../exam.php?tab=2");
} //end of if
?>