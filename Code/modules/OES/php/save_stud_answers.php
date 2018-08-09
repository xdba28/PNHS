<?php
//Save answers of student in exam
if(isset($_POST['exam_no'])){
	session_start();
	require 'load_exam_content.php';
	require 'check_status.php';
	if($result == "Unposted"){
		$mysqli->close();
		header("Location: my_subjects.php");
	} else {
		$lrn = $_POST['session_lrn'];
		$no_items = $_POST['no_items'];
		$passing = $_POST['passing'];
		
		
		$mysqli->autocommit(false);
		$exam_no_enc = $_POST['exam_no'];
		$exam_no= base64_url_decode($_POST['exam_no']);
		
		$score = 0;
		
		foreach($data as $key=>$row){
			$data[$key]['question_no'] = base64_url_decode($row['question_no']);
			$ques_no = $data[$key]['question_no'];
			$key_answer = $row['key_answer'];
			$mark = $row['mark'];
		}
		foreach($_POST['question_no'] as $index_qno => $qno){
			$qno = base64_url_decode($qno);
			foreach($_POST['question_type'] as $index_qtype => $qtype){
				if($index_qtype < 1){
					foreach($_POST['content_no'] as $index_cont => $cont){
						if($index_cont < 1){
							foreach($data as $row){
								$ques_no = $row['question_no'];
								$key_answer = $row['key_answer'];
								$mark = $row['mark'];
								
								if($qno == $ques_no ){
									switch($qtype){
										case 'Identification':
											$earned = 0;
											foreach($_POST['iden_answer'] as $index_iden => $iden_ans){
												if($index_iden < 1){
													$key_answer = explode(" ",$key_answer);
													$key_count = count($key_answer);
													$iden_ans = trim($iden_ans);
													for ($i = 0; $i < $key_count; $i++){
														$key_answer[$i] = explode("_",$key_answer[$i]);
														$key_answer[$i] = implode(" ",$key_answer[$i]);
														
														if($iden_ans == ''){
															break;
														} else if(strcasecmp($key_answer[$i], $iden_ans) == 0){
															$earned = $mark;
														}
													}
													
													$iden_ans = explode(" ",$iden_ans);
													$iden_ans = implode("_",$iden_ans);
													$iden_ans = $mysqli->escape_string($iden_ans);
													$mysqli->query("INSERT INTO `oes_exam_answer` (`answer_no`, `content_no`, `lrn`, `answer`, `points_earned`) VALUES (NULL, '$cont', '$lrn', '$iden_ans', '$earned')");
													$mysqli->commit();
													$score = $score + $earned;
												} else {
													$_POST['iden_answer'] = array_splice($_POST['iden_answer'],1);
													break;
												}
											}
											break;
										case 'Multiple Choice':
											$earned = 0;
											foreach($_POST['mul_answer'] as $index_mul => $mul_ans){
													if($index_mul < 1){
														$key_answer = explode("_",$key_answer);
														$key_answer = implode(" ",$key_answer);
														
														if($mul_ans == ''){
														}else if(strcasecmp($key_answer, $mul_ans) == 0){
															$earned = $mark;
														}
														$mul_ans = explode(" ",$mul_ans);
														$mul_ans = implode("_",$mul_ans);
														$mul_ans = $mysqli->escape_string($mul_ans);
														$mysqli->query("INSERT INTO `oes_exam_answer` (`answer_no`, `content_no`, `lrn`, `answer`, `points_earned`) VALUES (NULL, '$cont', '$lrn', '$mul_ans', '$earned')");
														$mysqli->commit();
														$score = $score + $earned;
													} else {
														$_POST['mul_answer'] = array_splice($_POST['mul_answer'],1);
														break;
													}
												}
											break;
										case 'Enumeration';
											
											
											foreach($_POST['enum_count'] as $index_enum_count => $enum_count){
												if($index_enum_count < 1){
													
													$key_answer = explode(" ",$key_answer);
													$key_count = count($key_answer);
													$mark = $mark / ($key_count - 1);
													
															
													foreach($_POST['enum_ans'] as $index_enum_ans => $enum_ans){
														if($index_enum_ans < $enum_count){
															$earned = 0;
															for ($i = 0; $i < $key_count; $i++){
																$key_answer[$i] = explode("_",$key_answer[$i]);
																$key_answer[$i] = implode(" ",$key_answer[$i]);
																$enum_ans = trim($enum_ans);
																if($enum_ans == ''){
																	break;
																}else if(strcasecmp($enum_ans, $key_answer[$i]) == 0){
																	
																	$earned = $mark;
																	array_splice($key_answer, $i,1);
																	$key_count = count($key_answer);
																	break;
																}
																
															}
															
															$enum_ans = explode(" ",$enum_ans);
															$enum_ans = implode("_",$enum_ans);
															$enum_ans = $mysqli->escape_string($enum_ans);
															$mysqli->query("INSERT INTO `oes_exam_answer` (`answer_no`, `content_no`, `lrn`, `answer`, `points_earned`) VALUES (NULL, '$cont', '$lrn', '$enum_ans', '$earned')");
															$mysqli->commit();
															$score = $score + $earned;
														} else {
															$_POST['enum_ans'] = array_splice($_POST['enum_ans'],$enum_count);
															break;
														}
													} 
												} else {
													$_POST['enum_count'] = array_splice($_POST['enum_count'],1); //remove 1st element and reindex the others
													break;
												}
											}
											break;
							}
								}
							}
							
							
						} else {
							$_POST['content_no'] = array_splice($_POST['content_no'],1);
							break;
						}
					}
				} else {
					$_POST['question_type'] = array_splice($_POST['question_type'],1);
					break;
				}
			}
		}
		
		$equi = ($score/$no_items) * 100;
		$equi =  round($equi, 2);
		if($equi >= $passing){
			$remark = 'Passed!';
		} else {
			$remark = 'Failed.';
		}
		$mysqli->query("UPDATE `oes_exam_result` SET `result_remarks` = '$remark', exam_score = '$score', equivalent_grade ='$equi' WHERE `exam_no` = '$exam_no' and lrn = '$lrn'");
		$mysqli->commit();
		header("Location: ../result.php?id=".$exam_no_enc);
	}
}
?>