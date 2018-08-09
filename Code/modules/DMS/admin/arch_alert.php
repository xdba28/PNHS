<html>
<head>
<link href="../css/sweetalert.css" rel="stylesheet">    
<script src="../js/jquery.min.js"></script>    
<script src="../js/sweetalert-dev.js"></script>
<link href="../css/bootstrap.min.css">
</head>
<body>   
<?php 
    $s=$_GET['su'];
    $e=$_GET['er'];
    if($s=="1"){
        echo "<script>swal({title:'Documents Successfuly Archived!'}, function(){ window.close(); });</script>";
    }else if($e=="1"){
        echo "<script>swal({title:'An error occurred!Archiving Interrupted!'}, function(){ window.close(); });</script>";
    }
    ?>
</body>
</html>