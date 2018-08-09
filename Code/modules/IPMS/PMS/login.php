

<?php include "connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>Procurement Management System</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/w3/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href=".docs/docs.min.css">
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="css/w3/blue.css">
    <link rel="stylesheet" href="css/w3/yellow.css">
    <link rel="stylesheet" href="css/w3/w3.css">
    <link rel="stylesheet" href="css/login-css.css">
    
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body><div class="container">
    <div id="login-box">
        <div class="logo">
            <img src="docs/img/pnhs_in_logo.png" class="img img-responsive img-circle center-block" style="width:100px; heigth:100px"/>
            <h1 class="logo-caption">Personnel</h1>
        </div><!-- /.logo -->
        <form class = "myclass" action = "log.php" method = "post">
        <div class="controls">
            <input type="text" required name="username" placeholder="Username" class="form-control" />
            <input type="password" required name="password" placeholder="Password" class="form-control" />
            <button name="btn" type="submit" class="btn btn-default btn-block btn-custom" value = "Login">Login</button>
            </form>


        </div><!-- /.controls -->
    </div><!-- /#login-box -->
</div><!-- /.container -->
<div id="particles-js"></div>
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>-->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="login-js.js"></script>

</body>
</html>