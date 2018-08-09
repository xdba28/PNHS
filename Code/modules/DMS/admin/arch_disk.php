<html>
<head>
<link href="../css/sweetalert.css" rel="stylesheet">    
<script src="../js/jquery.min.js"></script>    
<script src="../js/sweetalert-dev.js"></script>
<link href="../css/bootstrap.min.css">
</head>
<body>   
<script>
   
    
    swal({
  title: "Select Storage Drive",
  text: "",
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
  animation: "slide-from-top",
  inputPlaceholder: "D"
},
function(inputValue){
  if (inputValue === false){
        window.location.href="archiving.php";
      return false
  }

  if (inputValue === "") {
    swal.showInputError("You need to write something!");
    return false
  }else{
      //var ch = inputValue.exists();
      window.location.href="arch_re.php?disk="+inputValue;
  }
  //swal("Nice!", "You wrote: " + inputValue, "success");
});
    
</script>
</body>
</html>