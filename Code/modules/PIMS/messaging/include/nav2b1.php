<?php
    include("../myfunc/nav1.php");
?>

<nav class="navbar navbar-inverse navbar-fixed-top navigation-side" id="sidebar-wrapper" role="navigation">
                <ul class="nav sidebar scrollbar sidebar-nav" id="style-4">
                    <li class="sidebar-brand">                       
                        <a href="#">
                            Menu
                            <button type="button" class="hamburger is-closed hamburger-side" data-toggle="offcanvas">
                            <span class="hamb hamb-top"></span>
                            <span class="hamb hamb-middle"></span>
                            <span class="hamb hamb-bottom"></span>
                            </button>
                        </a>
                    </li>

                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input id = "myInput" onkeyup="myFunction();" type="text" class="form-control" placeholder="Search Faculty">
                                <span class="input-group-btn">
                                <button id = "searchbutton1" class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                                <button id = "searchbutton2" style = "display:none" class="btn btn-default" type="button">
                                    <img src = "../img/dots.gif" style = "height:15px; width:15px ;">
                                </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>


                    <li>
                        <a href="#"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>



                    <li id = "side-menu1" >
                            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>View <span class="caret"></span></a>
                            <ul class="nav collapse dropdown-menu" role="menu" id="submenu1">
                                <li>
                                    <a href="emp_rec.php"><i class="fa fa-suitcase fa-fw"></i> Employment Records</a>
                                </li>
                                <li>
                                    <a href="service_rec.php"><i class="fa fa-columns fa-fw"></i> Service Record</a>
                                </li>
                                
                                <li>
                                    <a href="training.php"><i class="fa fa-list-alt fa-fw"></i> Training Programs</a>
                                </li>
                            </ul>
                    </li>

                    <li id = "leaveDropDown1" >
                            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu2"><i class="fa fa-fw fa-folder" aria-expanded="false"></i>Leave Application <span class="caret"></span></a>
                            <ul class="nav collapse dropdown-menu" role="menu" id="submenu2">
                                <li>
                                    <a href="leave_history.php"><i class="fa fa-history fa-fw"></i> Leave History</a>
                                </li>
                                <li>
                                    <a href="leave_apply.php"><i class="fa fa-thumb-tack fa-fw"></i> Apply</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                    </li>

                    <li id = "side-menu4">
                            <a href="profile_updates.php">
                              <i class="fa fa-history fa-fw"></i> <span>My Profile Updates</span>
                              &emsp;<font color="red"><span id = "pupdatesNum" ></span></font>
                            </a>
                    </li>

                    <?php
                            include("../myfunc/db_connect.php");
                                
                            $query = "select faculty_type from pims_employment_records where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
                            $result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
                            $row = mysqli_fetch_array($result);
                            
                            if ( $row['faculty_type'] == "Teaching" ){
                                echo '<li id = "side-menu2">
                                    <a href="../../OES/"><i class="fa fa-pencil fa-fw"></i> Create Exam</a>
                                </li>';
                            }
                            
                            if ( isset($_SESSION['user_data']['acct']['css_priv']) && $_SESSION['user_data']['acct']['css_priv'] == '1' ){
                                echo '<li id = "side-menu3">
                                    <a href="../../CSS/"><i class="fa fa-table fa-fw"></i> Class Schedule</a>
                                </li>
                                ';
                            }
                            
                            mysqli_close( $_SESSION['pims_data']['connection'] );
                            unset( $_SESSION['pims_data']['connection'] ); 
                        ?>
                 
                       
                        
                    </ul>
            </nav> 

<!--THE CODE BELOW IS FOR THE TOP NAV BAR-->


                <nav class="navbar navbar-static-top w3-card-4 navigation-top" style="position: fixed;width: 100%;">
                    <div class="container-full">
                        <button type="button" class="hamburger hamburger-remove is-closed fadeInLeft" data-toggle="offcanvas">
                        <span class="hamb hamb-top"></span>
                        <span class="hamb hamb-middle"></span>
                        <span class="hamb hamb-bottom"></span>
                        </button>
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"></button>
                                <a class="navbar-brand w3-card-4" href="#"><img src="../img/pnhs_logo.png"></a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <hr class="hidden-sm hidden-md hidden-lg">
                                <ul class="nav navbar-nav">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About Us</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="../messaging/">
                              <i class="fa fa-envelope fa-fw"></i> <span>Messages</span>
                              &emsp;<font color="red"><span id = "messagesNum" ></span></font>
                            </a></li>
                                    <li><a href="login.php">Notifications</a></li>
                                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo '<img alt="User Pic" style = " margin: 0 auto; max-height: 30px; max-width: 30px; " src = "../myfunc/showimageprofile.php?id='.$_SESSION['pims_data']['emp_id'].'" class="img-square ims-responsive"> '; ?> <label style="max-height: 10px; " ><?php echo $_SESSION['pims_data']['name'] ?></label> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> Profile</a></li>
                        <?php
                            //if ( isset($_SESSION['pims_data']['pims_priv_admin']) && $_SESSION['pims_data']['pims_priv_admin'] == '1' ){
                                include("../myfunc/db_connect.php");
                                
                                $query = "select job_title_code from pims_employment_records where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
                                $result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
                                $row = mysqli_fetch_array($result);
                                if ( $row['job_title_code'] == "ICTD" ){
                                    echo'
                                    <li><a href="../admin/"><i class="fa fa-user fa-fw"></i><b> Admin</b></a>
                                    </li>
                                    ';
                                }
                                else if ( $row['job_title_code'] == "SECSP2" ){
                                    echo'
                                    <li><a href="../admin2/"><i class="fa fa-user fa-fw"></i><b> Admin</b></a>
                                    </li>
                                    ';
                                }
                                mysqli_close( $_SESSION['pims_data']['connection'] );
                                unset( $_SESSION['pims_data']['connection'] ); 
                            //}
                        ?>
                        <!--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>-->
                        <li class="divider"></li>
                        <li><a href="../myfunc/login2.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
                                </ul>
                            </div>
                        </div>
                        <hr class="w3-theme-yd2">
                        <hr class="w3-theme-bd2">
                    </div>
                </nav>
    <br><br><br>



    <script>
            <?php
                include("../myfunc/nav2.php");
            ?>
                var typing = 0;
                var loading1 = 0;
                var loading2 = 0;
                
                function myFunction() {
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
                        $('#side-menu1').attr({ 'style':'display:block' });
                        $('#leaveDropDown1').attr({ 'style':'display:block' });
                        $('#side-menu2').attr({ 'style':'display:block' });
                        $('#side-menu3').attr({ 'style':'display:block' });
                        $('#side-menu4').attr({ 'style':'display:block' });
                        $('#side-menu5').attr({ 'style':'display:block' });
                        $('#searchbutton1').attr({ 'style':'display:block' });
                        $('#searchbutton2').attr({ 'style':'display:none' });
                        <?php
                            include("../myfunc/nav3.php");
                        ?>
                    }
                    else if ( typing == 1 && loading1 == 0 ){
                        loading1 = 1;
                        $('#myTable').attr({ 'style':'display:block' });
                        $('#side-menu1').attr({ 'style':'display:none' });
                        $('#leaveDropDown1').attr({ 'style':'display:none' });
                        $('#side-menu2').attr({ 'style':'display:none' });
                        $('#side-menu3').attr({ 'style':'display:none' });
                        $('#side-menu4').attr({ 'style':'display:none' });
                        $('#side-menu5').attr({ 'style':'display:none' });
                        $('#searchbutton1').attr({ 'style':'display:none' });
                        $('#searchbutton2').attr({ 'style':'display:block' });
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
                
                function messageCount(){
                    $.ajax({
                            url: '../myfunc/messagesCount1.php',
                            contentType: false,
                            cache: false,
                            processData:false,
                            success: function(data, textStatus, jqXHR)
                                {   
                                    if ( data > 0 ) $('#messagesNum').text(data);
                                    else $('#messagesNum').text("");
                                    setTimeout(messageCount, 3000);
                                },
                            error: function(jqXHR, textStatus, errorThrown) 
                                {   
                                    resetAlertify();
                                    alertify.error(jqXHR);
                                }          
                    });
                }
                
                $(document).ready(function(){
                    messageCount();
                });
            </script>