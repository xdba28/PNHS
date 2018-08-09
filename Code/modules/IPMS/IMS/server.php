<?php
session_start();
	$username="";
	$password="";
	$errors=array();
	
	
	$db =mysqli_connect('localhost','root','','student');
	
	
	
	
	if(isset($_POST['login'])){
			$username = $_POST['Username'];
			$password = $_POST['Password'];
			
			
			if(empty($username)){
				array_push($errors,"Username is required");
			}
			if(empty($password)){
				array_push($errors,"Password is required");
			}
			if (count($errors)==0){
				$password=md5($password);
				$query="SELECT * FROM stud_info WHERE username='$username' AND password='$password'";
				$result=mysqli_query($db,$query);
				if(mysqli_num_rows($result)==1){
				$_SESSION['username']=$username;
				$_SESSION['success']="You are now logged in ";
				header('location: index.html');
			}
			else{
				array_push($errors,"Wrong username/password combination");
				
			}
		}
	}
	
	
	
	
?>