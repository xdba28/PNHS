<?php
    session_start();
	include("../myfunc/session1.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php
	include 'include/header2.php';
	include("myfunc/messagingSession1.php");
?>
<body>
<?php include 'include/topnav.php';?>


<?php include 'include/sidenav.php';?>

<br><br><br><br>

    <div id="wrapper" style="margin-left: 60px;">
        
        <div class="container">
                    <div class="col-lg-11">

        <div class="col-lg-4">
            <div class="panel-outline panel-success">
            <div class="panel-heading">
            	<div class="sidebar-search"><br>
                        <div class="input-group custom-search-form">
                                <input id = "myInput" type="text" onkeyup="myFunctionsearchall()" class="form-control" placeholder="Search Faculty">
                                <span class="input-group-btn">
                                <div class="btn btn-success">
                                    <img src = "../img/dots.gif" style = "height:15px; width:15px ;">
                                </div>
                                </span>
                        </div>
                </div>
            <h4 id = "title01" >RECENT CONTACTS</h4>
            </div>
            <table style = "display:block" id = "myTable2"></table>
			<table style = "display:none" id = "myTable"></table>
            </div>
        </div>
        <div class="col-lg-7" class="panel  panel-default">
			
				 <iframe id = 'myframe' src = 'chat_intro.php' alt = 'Select a personnel to begin with' height="auto"></iframe> 
			
        </div>
        </div>
        <br><br>
        </div>
        </div>

<div id="wrapper">
<?php include 'include/footer.php';?>
</div>
    
</body>
	<script src = "js/chatroom1.js" ></script>
    <script  src="../js/index.js"></script>
</html>
<script>
            <?php
                include("../myfunc/nav2v3-1.php");
				include("myfunc/nav1.php");
            ?>
                var typing = 0;
                var loading1 = 0;
                var loading2 = 0;
                
                function myFunctionsearchall() {
                     // Declare variables
                      
                      
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("myTable");
                    tr = table.getElementsByTagName("tr");
                    
                    if ( $('#myInput').val() == "" ){
                        typing = 0;
                    }
                    else{
                        typing = 1;
                    }
                    
                    if ( typing == 0 && loading1 == 1 ){
                        loading1 = 0;
                        $('#myTable').attr({ 'style':'display:none' });
						$('#myTable2').attr({ 'style':'display:block' });
						$("#title01").text("RECENT CONTACTS");

                    }
                    else if ( typing == 1 && loading1 == 0 ){
                        loading1 = 1;
                        $('#myTable').attr({ 'style':'display:block' });
						$('#myTable2').attr({ 'style':'display:none' });
						$("#title01").text("ALL CONTACTS");
                    }
                    
                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                                $('#zeroresults').attr({ 'style':'display:none' });
                            } else {
                                tr[i].style.display = "none";
                                if( $('#myTable').children(':visible').length === 0 ) {
                                    $('#zeroresults').attr({ 'style':'display:block' });
                                }
                                else{
                                    $('#zeroresults').attr({ 'style':'display:none' });
                                }
                            }
                        }
                    }
                    
                }
                
            </script>