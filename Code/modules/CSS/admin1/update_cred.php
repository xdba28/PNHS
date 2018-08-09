<?php
session_start(); 
include "db_conn.php";

if(!empty($_POST['cred'])){
	$emp = $_POST['cred'];
	$inc = mysqli_query($conn, "SELECT sub_desc FROM pims_field, css_subject WHERE pims_field.major=css_subject.subject_id");
	$row = mysqli_fetch_row($inc);
	echo '
	<label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Major &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
		<div class="col-md-8">
			<input type="text" value="'.$row[0].'" class="form-control" disabled=""><br>
		</div>';
	$inc = mysqli_query($conn, "SELECT sub_desc FROM pims_field, css_subject WHERE pims_field.minor=css_subject.subject_id");
	$row = mysqli_fetch_row($inc);
	echo '
	<label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Minor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
		<div class="col-md-8">
			<input type="text" value="'.$row[0].'" class="form-control" disabled=""><br>
		</div>';
	$inc = mysqli_query($conn, "SELECT sub_desc FROM pims_field, css_subject WHERE pims_field.related=css_subject.subject_id");
	$row = mysqli_fetch_row($inc);
	echo '
	<label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Related &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
		<div class="col-md-8">
			<input type="text" value="'.$row[0].'" class="form-control" disabled=""><br>
		</div>';
	
}
else if(empty($_POST['cred'])){
	echo '
	<label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Major &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
		<div class="col-md-8">
			<input type="text" value="" class="form-control" disabled=""><br>
		</div>
	<label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Minor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
		<div class="col-md-8">
			<input type="text" value="" class="form-control" disabled=""><br>
		</div>
	<label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Related &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
		<div class="col-md-8">
			<input type="text" value="" class="form-control" disabled=""><br>
		</div>
	';
}
?>