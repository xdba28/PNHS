<?php
//Delete exams
	session_start();
	if(isset($_POST['exam_no'])){
		require "connect.php";
		require "func.php";
		$exam_no = base64_url_decode($_POST['exam_no']);
		$response['stat'] = "Failed";
		try{
			$mysqli->autocommit(false);
			$mysqli->begin_transaction();
			$search_exam = $mysqli->query("select * from oes_exam where exam_no = '$exam_no' FOR UPDATE");
			if($search_exam && $search_exam->num_rows > 0){
				try{
							$search_res = $mysqli->query("select * from oes_exam_result res where res.exam_no = '$exam_no' FOR UPDATE");
							
							if($search_res){
								if($search_res->num_rows > 0){
									$del_res = $mysqli->query("delete from oes_exam_result where exam_no = '$exam_no'");
									
									if($del_res){
										$mysqli->commit();
									} else {
										$mysqli->rollback();
										throw new Exception("There's an error in deleting the exam results. Please try again.");
									}
								}
								$search_ans = $mysqli->query("select * from oes_exam_answer ans, oes_exam_content cont where ans.content_no = cont.content_no and cont.exam_no = '$exam_no' FOR UPDATE");
								if($search_ans){
									if($search_ans->num_rows > 0){
										$del_ans = $mysqli->query("delete ans.* from oes_exam_answer ans, oes_exam_content cont where ans.content_no = cont.content_no and cont.exam_no = '$exam_no'");
										if($del_ans){
											$mysqli->commit();
											
										} else {
											$mysqli->rollback();
											throw new Exception("There's an error in deleting the exam answers. Please try again.");
										}
									}
									$search_content = $mysqli->query("select * from oes_exam_content where exam_no = '$exam_no' FOR UPDATE");
									
									if($search_content){
										if($search_content->num_rows > 0){
											$del_content = $mysqli->query("delete from oes_exam_content where exam_no = '$exam_no'");
											if($del_content){
													$mysqli->commit();
											} else {
												$mysqli->rollback();
												throw new Exception("There's an error in deleting the exam content. Please try again.");
											}
										}
									$del_exam = $mysqli->query("DELETE FROM oes_exam WHERE exam_no = '$exam_no'");
									if($del_exam){
										$mysqli->commit();
										$response['stat'] = "Success";
									} else {
										$mysqli->rollback();
										throw new Exception("There's an error in deleting the exam. Please try again.");
									}
									}
									
								}
							}
					
							
				} catch (Exception $del_error){
						$err = "Delete Error! " . $del_error->getMessage();
						$response['stat'] = "Failed";
				}
			} else {
				$mysqli->rollback();
				throw new Exception("Exam does not exist! Please try again.");
			}
					
		} catch (Exception $search_error){
			$err = "Delete Error! " . $search_error->getMessage();
			$response['err'] = $err;
		}
		echo json_encode($response);
		$mysqli->close();
	}
?>