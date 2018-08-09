<head>
  <meta charset="UTF-8">
  <title>PAG-ASA National High School</title>
    <!-- TABLE HEADER DESIGN -->
	<link rel="stylesheet" href="../css/heading.css">
	<!-- Custom Css -->
	<link rel="stylesheet" href="../css/delete.css">
    <!-- div button -->
    <link rel="stylesheet" href="../css/divdivflat.css">
	<!--link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css"-->
    <link rel='stylesheet prefetch' href='../css/bootstrap.min.css'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/w3.css">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/sweetalert.js">
	<!--JQUERY-->
	<script src='../js/bootstrap.min.js'></script>
	<link rel="stylesheet" href="../css/bootstrap.css" />
    <script src="../jquery/jquery.min.js"></script>
	<script src="../js/sweetalert.js"></script>
 
    <script type="text/javascript">
	$(document).ready(function(){
		var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_button'); //Add button selector
		var wrapper = $('.field_wrapper'); //Input field wrapper
		var fieldHTML = '<div class="form-group" ><div><input type="text" data-list="#list" placeholder="John Doe" name="studid[]" class="form-control awesomplete" value=""/></div><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="glyphicon glyphicon-remove">Remove</i></span></a></div>'; //New input field html 
		var x = 1; //Initial field counter is 1
		$(addButton).click(function(){ //Once add button is clicked
			if(x < maxField){ //Check maximum number of input fields
				x++; //Increment field counter
				$(wrapper).append(fieldHTML); // Add field html
			}
		});
		$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
	});
	</script>
</head>
	
	<style type="text/css">
/* BackToTop button css */
#scroll {
    position:fixed;
    right:10px;
    bottom:10px;
    cursor:pointer;
    width:50px;
    height:50px;
    background-color:#3498db;
    text-indent:-9999px;
    display:none;
    -webkit-border-radius:5px;
    -moz-border-radius:5px;
    border-radius:5px;
}
#scroll span {
    position:absolute;
    top:50%;
    left:50%;
    margin-left:-8px;
    margin-top:-12px;
    height:0;
    width:0;
    border:8px solid transparent;
    border-bottom-color:#ffffff
}
#scroll:hover {
    background-color:#e74c3c;
    opacity:1;
    filter:"alpha(opacity=100)";
    -ms-filter:"alpha(opacity=100)";
}

</style>
