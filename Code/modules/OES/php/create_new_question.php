<?php
//Create new question
session_start();
if(isset($_POST['submit_btn'])){
	//Connect to database
	require 'connect.php';
	require 'func.php';
	
	$subject_code = base64_url_decode($_POST['questioncreate_subject']);
	$emp_no = $_SESSION['user_data']['acct']['emp_no'];
	
	
	// Get subject_id and teacher_id  and teacher
	$mysqli->autocommit(false);
	$mysqli->begin_transaction();
	$get_sched = $mysqli->query("select emp_rec_id from pims_employment_records where emp_no = '$emp_no' LOCK IN SHARE MODE");
	
	if($get_sched->num_rows > 0){
		while($row = $get_sched->fetch_array()){
			$emprec_id[] = $row;
		}
		foreach($emprec_id as $emp){
			$emp_rec_id = $emp['emp_rec_id'];
		}
	}
	//Check if there is an existing question
	function quest_exist($question, $question_type){
		require 'connect.php';
		
		$existing_ques = $mysqli->query("Select question_no from oes_question_bank where question = '$question' and question_type='$question_type'");
		//Check for existing question
				
		if ($existing_ques->num_rows == 1){
			throw new Exception("Question: " . $question . " already exists!"); 
			return true;
		}
		
	}
	//Select question number of the inserted question
	function select_quest($question, $question_type, $subject_code, $emp_rec_id){
		require 'connect.php';
		$get_ques_no = $mysqli->query("SELECT question_no from oes_question_bank where question = '$question' and question_type = '$question_type' and subject_id = '$subject_code' and emp_rec_id = '$emp_rec_id' LOCK IN SHARE MODE");
		if ( ($ques_res = $get_ques_no->num_rows) == 1 ){
			while($row_ques_no = $get_ques_no->fetch_array()){
				$ques_id[] = $row_ques_no;
			}
			foreach($ques_id as $question_num){
				$ques_no = $question_num['question_no'];
				
			}
			return $ques_no;
		}else if($ques_res == 0){
			throw new Exception("No question found. Please try again.");
			return true;
		} else {
			throw new Exception("Multiple questions found. Please review your question.");
			return true;
		}
		
		
	}
	
	//start of foreach loop for each question added/submitted	
	try{
	foreach( $_POST['question'] as $index_question => $question ){
		$question = $mysqli->escape_string($question);
		echo "<br>";
		foreach( $_POST['question_type'] as $index_ques_type => $question_type ){
			
			if($index_ques_type == $index_question){
				try {
					if (!quest_exist($question, $question_type)){
							try{
							// Insert question to question bank
							$add_ques = $mysqli->query("INSERT INTO `oes_question_bank` (`question_no`, `question`, `question_type`, `subject_id`,emp_rec_id) VALUES ('', '$question', '$question_type', '$subject_code','$emp_rec_id')");
							if($add_ques){
								$mysqli->commit();
								$question_no = select_quest($question, $question_type, $subject_code, $emp_rec_id);
								
							} else {
								$mysqli->rollback();
								throw new Exception("Cannot save question: " . $question . " into database. Please try again!");
							}
							}
							catch(Exception $ques_err){
								echo "Error!" . $ques_err->getMessage();
							}
							
					}
					
					switch($question_type){
						case 'Identification':
						foreach( $_POST['iden_no_correct'] as $index_iden_no_correct => $iden_no_correct){
							echo $index_iden_no_correct . $iden_no_correct;
							if($index_iden_no_correct < 1){ 
								foreach( $_POST['iden_correct'] as $index_iden_ans => $iden_correct){
									if($index_iden_ans < $iden_no_correct){
										try{
											echo $question;
											echo $iden_correct;
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
											$mysqli->quey("Delete from oes_question_bank where question_no = '$question'");
											$mysqli->commit();
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
						echo "<br>";
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
																$mysqli->quey("Delete from oes_question_bank where question_no = '$question'");
																$mysqli->commit();
																echo "Error: " . $mul->getMessage();
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
							echo "<br>";
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
													$mysqli->quey("Delete from oes_question_bank where question_no = '$question'");
													$mysqli->commit();
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
								echo "<br>";
								break;
				}//end of switch statement
			
				} 
				catch(Exception $e){
					echo 'Error! ' . $e->getMessage();
				}
				
				
			}//end of if (Never put else & break for foreach of question_type )
			
		}//end of foreach question_type(Never put )
		
	}//end of foreach question
	header('Location: ../question.php?tab=2');
	} catch(Exception $s){
		echo "There is an error in saving the question(s) into the database. Please try again.";
	}
} //end of if
?>