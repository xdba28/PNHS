<?php
//Creating new questions directly from edited contents of exam
if(!empty($_POST['grant'])){
	//Connect to database
	require 'connect.php';
	
	// Get sched_id for subject and teacher

	$get_sched = $mysqli->query("select sched_id from oes_exam where exam_no = '$exam_no' LOCK IN SHARE MODE");
	
	if($get_sched->num_rows > 0){
		while($row = $get_sched->fetch_array()){
			$sched_id[] = $row;
		}
		foreach($sched_id as $sched){
			$schedule = $sched['sched_id'];
		}
	}
	
	//Select question number of the inserted question
	
	
	//start of foreach loop for each question added/submitted	
	try{
						echo $question . "<br>";
							// Insert question to question bank
							$add_ques = $mysqli->query("INSERT INTO `oes_question_bank` (`question_no`, `question`, `question_type`, `sched_id`) VALUES ('', '$question', '$question_type', '$schedule')");
							if($add_ques){
								$mysqli->commit();
								$question_no = select_quest($question, $question_type, $schedule);
								
							} else {
								$mysqli->rollback();
								throw new Exception("Cannot save question: " . $question . " into database. Please try again!");
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
											echo $iden_correct;
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
								print_r($_POST['iden_correct']);
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
											print_r($_POST['mul_wrong']);
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
										print_r($_POST['mul_wrong']);
										break;
									}
								}
								echo "<br>";
								break;
				}//end of switch statement

	//header('Location: ../exam.php?tab=2');
	} catch(Exception $s){
		echo "There is an error in saving the question(s) into the database. Please try again.";
	}
} //end of if
?>