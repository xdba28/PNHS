<?php
session_start();
include "db_conn.php";
if(!empty($_SESSION['grade'])){
  $grade = $_SESSION['grade'];
}
else{
  $grade = 7;
  $_SESSION['grade'] = $grade;
}
$subject = mysqli_query($conn, "SELECT * FROM css_subject ORDER BY sub_desc ");
if(!empty($_POST['sec_id'])){
	$_SESSION['sec_id'] = $_POST['sec_id'];

                              $sec_id = $_SESSION['sec_id'];
                              $sub_ex = mysqli_query($conn, "SELECT DISTINCT subject_id
                                                      FROM css_schedule, css_section
                                                      WHERE css_section.SECTION_ID=css_schedule.section_id
                                                      AND css_section.SECTION_ID=$sec_id");
                              foreach ($sub_ex as $key) {
                                $sub_id = $key['subject_id'];
                                $sub_str = "";
                                $sub_ex_sql = mysqli_query($conn, "SELECT DAY FROM css_schedule WHERE SECTION_ID=$sec_id 
                                                                    AND subject_id=$sub_id");
                                foreach ($sub_ex_sql as $bus) {
                                  if($bus['DAY']=="regular"){
                                    $sub_ex_id[] = $key['subject_id'];
                                  }
                                  else{
                                    $sub_str .= $bus['DAY'];
                                  }
                                  $sub_str = str_replace("-","",$sub_str);
                                  if(strlen($sub_str)==6){
                                    $sub_ex_id[] = $key['subject_id'];
                                  }
                                } 
                              }
                              $_SESSION['sec_id_t'] = $sec_id;
                              //$_SESSION['sec_id'] = null; 
                            
}
?>
<?php
                            
                          ?>
<option value="">Select</option>
                            <?php 
                              foreach ($subject as $subj) {
                                if(!empty($sub_ex_id)){
                                  $c=0;
                                  for($i=0; $i<count($sub_ex_id); $i++){
                                    if($sub_ex_id[$i]==$subj['subject_id']){
                                      $c++;
                                    }
                                  }
                                  if($c==0){
                                    echo '<option value="'.$subj['subject_id'].'">'.$subj['sub_desc'].'</option>';
                                  }
                                }
                                else{
                                  echo '<option value="'.$subj['subject_id'].'">'.$subj['sub_desc'].'</option>';
                                }
                              }
                            ?> 
                            </select>