<?php
include_once('db_connect.php');
session_start();
   
$acc_id = null;
$cart_count = 0;

if(isset($_POST['uname'])){
    if($_POST['pass'] != $_POST['conpass']){
        $error_msg .= "Password does not match!\n";
    }
    else{
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
		$email = $_POST['email'];
		$uname = $_POST['uname'];
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $gender = $_POST['gender'];
        if(empty($_POST['phone'])){
            $no = "";
        }
        else{
            $no = $_POST['phone'];
		}
		
		$query = mysqli_query($connect, "SELECT * FROM account");
        while(true){
            $c = 0;
            $temp_id = sprintf('%07d', rand(0,9999999)); 
            foreach ($query as $key) {
                $id = explode("-", $key['AccountID']);
                if($id[1]==$temp_id){
                    $c++;
                }
            }
            if($c==0){
                $temp_id = "ACC-".$temp_id;
				$sql = mysqli_query($connect, "INSERT INTO account VALUES('$temp_id', '$uname', '$pass', '$fname', '$lname', '$email', '$gender', '$no',  'Customer')");
                break;
            }
        }   

        if($sql === false){
            echo "error";
        }
        else{
            header('Location: login');
        }
    }
    


}
?>
<!DOCTYPE html>
<html>
<head>
<title>PERSCENT Perfume • Scents</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,600,800,700,500,300,100,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/component.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Fashions Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" 
		/>	
<script src="js/jquery.easydropdown.js"></script>		
<script src="js/jquery.min.js"></script>
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- start menu -->
<style>
.megamenu>li>a{float:left;padding:8px 63.1px;text-decoration:none;text-transform:capitalize;font-size:1em; -webkit-transition: all 0.3s ease-in-out;text-transform:uppercase;
	-moz-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	transition: all 0.3s ease-in-out;
	background: #36384c;
	text-decoration:none;
	color:#fff;
	font-size: 16px;
	font-weight: 300;
}

.megamenu>li.showhide{display:none;width:100%;height:50px;cursor:pointer;color:#fff;border-bottom:solid 1px rgba(0,0,0,0.1);background:#eee;background:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2VlZWVlZSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNkYmRiZGIiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);background:-moz-linear-gradient(top,#eee 0,#36384C 100%);background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#eee),color-stop(100%,#36384C));background:-webkit-linear-gradient(top,#eee 0,#36384C 100%);background:-o-linear-gradient(top,#eee 0,#36384C 100%);background:-ms-linear-gradient(top,#eee 0,#36384C 100%);background:linear-gradient(to bottom,#eee 0,#36384C 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#eeeeee',endColorstr='#36384C',GradientType=0)}
.megamenu>li.showhide span.title{margin:15px 0 0 25px;float:left}.megamenu>li.showhide span.icon1:after{position:absolute;content:"";right:25px;top:15px;height:3px;width:25px;font-size:50px;border-top:3px solid #fff;border-bottom:3px solid #fff;z-index:1}
.megamenu>li.showhide span.icon2:after{position:absolute;content:"";right:25px;top:27px;height:3px;width:25px;font-size:50px;border-top:3px solid #fff;border-bottom:3px solid #fff;z-index:1}
.megamenu>li>.megapanel{position:absolute;display:none;background:#d3d3d3;box-shadow: 0px 2px 4px #777; width:95.5%;top:45px;left:0px;z-index:99;padding:20px 30px 20px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
.header2{
   background:url(./images/banner34.jpg) no-repeat 0px 0px;
	background-size:cover;
	-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
	min-height:280px;
}
.reg form input[type="submit"]{
	width:80%;
	margin:0 auto;
	display:block;
	padding: 8px;
	font-size: 1.2em;
	font-weight: 400;
	border:1.5px solid #849974;
	color:#fff;
	border-radius:5px;
	outline: none;
	background:#849974;
	margin-top:1em;
	transition: 0.5s all;
	-webkit-transition: 0.5s all;
	-moz-transition: 0.5s all;
	-o-transition: 0.5s all;
}
.reg-right h3{
	color:#849974;
	font-size:1.3em;
	margin-bottom:0.5em;
	font-family: 'Raleway', sans-serif;
}
.fotter{
	background:url(./images/baba.jpeg) no-repeat 0px 0px;
	background-size:cover;
	-webkit-background-size: cover;
    moz-background-size: cover;
    -o-background-size: cover;
	min-height:520px;
	padding:3.5em 0;
}
.fotter-logo{
background: #36384c;
padding:1.5em 0;
}
.fotter-logo a:hover{
	color:#849974;
}

</style>
</head>
<body>
<!--header-->
<div class="header2 text-center">
	 <div class="container">
		 <div class="main-header">
			  <div class="carting">
				 <ul><li><a href="login.php"> LOGIN</a></li></ul>
				 </div>
			 <div class="logo">
				 <h3><a href="index.php">PERSCENT&#8482;</a></h3>
			  </div>			  
			 <div class="box_1">				 
				 <a href="login.php"><h3>Cart: <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)<img src="images/cart1.png" alt=""/></h3></a>
                 <br>
			 
			 </div>
			 
			 <div class="clearfix"></div>
		 </div>
				<!-- start header menu -->
		 <ul class="megamenu skyblue">
			<li class="grid"><a class="color1" href="index.php">Home</a></li>
			<li class="grid"><a href="men.php">HIS</a></li>
			<li class="grid"><a href="women.php">HER</a></li>
			<li class="grid"><a href="unisex.php">UNISEX</a></li>
			 <li class="grid"><a href="infant.php">INFANT</a></li>	
            <li class="grid"><a href="login.php">Wishlists <span class="glyphicon glyphicon-heart"></span></a></li>					
			
				
				</ul> 	
			 </div>
			  <div class="clearfix"></div> 
	 </div>
</div>
<!--header//-->
<div class="registration-form">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Registration</li>
		 </ol>
		 <h2>Registration</h2>
		 <div class="col-md-6 reg-form">
			 <div class="reg">
				 <p>Welcome, please enter the folling to continue.</p>
				 <p>If you have previously registered with us, <a href="#">click here</a></p>
				 <form  action="registration" enctype="multipart/form-data"  method="post">
					 <ul>
						 <li class="text-info">First Name: </li>
						 <li><input type="text" name="fname" id="fname"></li>
					 </ul>
					 <ul>
						 <li class="text-info">Last Name: </li>
						 <li><input type="text" name="lname" id="lname"></li>
					 </ul>
                     <ul>
						 <li class="text-info">Gender:</li>
                         <input type="radio" name="gender" id="gender" value="Male"> Male
                         &nbsp;&nbsp;&nbsp; 
                         <input type="radio" name="gender" id="gender" value="Female"> Female   
					 </ul>
					 <ul>
						 <li class="text-info">Mobile Number:</li>
						 <li><input type="text" name="phone" id="phone" maxlength="11"></li>
					 </ul>	
					<ul>
						 <li class="text-info">Email: </li>
						 <li><input type="text" name="email" id="email"></li>
					 </ul>	
					<ul>
						 <li class="text-info">Username: </li>
						 <li><input type="text" name="uname" id="uname"></li>
					 </ul>
					 <ul>
						 <li class="text-info">Password: </li>
						 <li><input type="password" name="pass" id="pass"></li>
					 </ul>
					 <ul>
						 <li class="text-info">Re-enter Password:</li>
						 <li><input type="password" name="conpass" id="conpass"></li>
					 </ul>
					
					 <input type="submit" value="Register Now">
					 <p class="click">By clicking this button, you agree to my modern style <a href="#">Policy Terms and Conditions</a> to Use</p> 
				 </form>
			 </div>
		 </div>
		 <div class="col-md-6 reg-right">
			 <h3>Completely Free Account</h3><br>
			 <p>SAMPLE PARAGRAPH HERE
			 ....................................................</p><br>
			 <h3 class="lorem">Lorem ipsum dolor sit amet elit.</h3><br>
			 <p>SAMPLE PARAGRAPH HERE
			 ....................................................</p>
		 </div>
		 <div class="clearfix"></div>		 
	 </div>
</div>
<!--fotter-->
<div class="fotter-logo">
	 <div class="container"><div class="ftr-logo"><h3><a href="index.php">PERSCENT&#8482;</a></h3></div>
	 <div class="ftr-info">
	 <p>&copy; 2017 All Rights Reserved </a> </p>
	</div>
	 <div class="clearfix"></div>
	 </div>
</div>
<!--fotter//-->	
</body>
</html>
		