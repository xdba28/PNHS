<?php
    session_start();
    include("../myfunc/session3.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>
<?php include 'include/topnav.php';?>


<?php include 'include/sidenav.php';?>

<br><br>

    <div id="wrapper" style="margin-left: 60px;">
        
        <div class="container">
                    <div class="col-lg-11">
                        <center><label style="font-size:25px">LEAVE INFORMATION</label></center><br>
                        <form role="form" id = "form1" >
                                        
                                        <div class="col-lg-12">
										<div class="form-group">
                                            <label style = "color: red ">All with * are required.</label>
                                            <br>
                                            <center><label style="font-size:18px" >APPLICATION FOR LEAVE</label></center>
                                        </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Office</label>
                                            <input class="form-control" placeholder="DepED - Pag-asa NHS" disabled id = "" >
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Employee Name</label>
                                            <input class="form-control" placeholder="Enter Text" disabled id = "name1" >
                                        </div>
                                        </div>
                                        <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Date of Filing</label>
                                            <input class="form-control" placeholder="MM/DD/YY" disabled id = "" >
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Position</label>
                                            <input class="form-control" placeholder="" disabled id = "" >
                                        </div>
                                        </div>
                                        <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Salary</label>
                                            <input class="form-control" placeholder="00.00" disabled id="" name="">
                                        </div>
                                        </div>
                                        <div class="col-lg-12">
										<div class="form-group">
                                            <br>
                                        </div>
                                        </div>
                                        <div class="col-lg-12">
										<div class="form-group">
                                            <center><label style="font-size:20px">DETAILS OF APPLICATION</label></center>
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
										<div class="form-group">
                                            <label style="font-size:15px">A. TYPE OF LEAVE</label>
                                            <br>
                                            <input disabled type = "radio" name = "vac_leave" value = "on"> VACATION LEAVE
                                            <br>
                                            <input disabled type = "radio" name = "sick_leave" value = "on"> SICK LEAVE 
                                            <br>
                                            <input disabled type = "radio" name = "matpat_leave" value = "on"> MATERNITY/ PATERNITY LEAVE
                                            <br>
                                            <input disabled type = "radio" name = "others" value = "on"> OTHER REASON 
                                            <br>
                                            <label>Reason</label>
                                            <textarea disabled class="form-control" rows="5" id = "purpose1" name = "purpose1" placeholder="Enter Reason"></textarea>
                                            
                                        </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
										<div class="form-group">
                                            <label style="font-size:15px">B. WHERE WILL LEAVE BE SPENT</label>
                                            <input class="form-control" placeholder="" disabled id="" name="">
                                            <br>
                                            <label style="font-size:15px">C. NUMBER OF WORKING DAYS</label>
                                            
                                            <div class="col-lg-12">
                                            <div class="form-group">
                                            <label>Applied for: </label>
                                                <input class="form-control" placeholder="Enter Text" disabled id="" name="">
                                            </div>
                                            </div>
                                            <div class="col-lg-12">
                                            <div class="form-group">
                                            <label>Inclusive Date: </label>
                                                <input class="form-control" placeholder="Enter Date"  disabled id = "" name = "startOfLeave1" type="date">
                                            </div>
                                            </div>
                                            <br>
                                            <label style="font-size:15px">D. COMMUTATION</label>
                                            
                                            <input disabled type = "radio" name = "" value = "on"> Requested
                                            &emsp;&emsp;&emsp;&emsp;
                                            <input disabled type = "radio" name = "" value = "on"> Not Requested
                                        </div>
                                        </div>
                            
                                        <div class="col-lg-12">
										<div class="form-group">
                                            <center><label style="font-size:18px">DETAILS OF ACTION ON APPLICATION</label></center>
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
										<div class="form-group">
                                            <label style="font-size:15px">A. CERTIFICATION OF LEAVE CREDITS</label>
                                            <p>As of </p> <input type="date" class="form-control" placeholder="Enter Date" id = "" name = "" >
                                            <br>
                                            <div class="col-lg-4">
										    <div class="form-group">
                                                <center><label>Vacation</label></center>
                                                <input class="form-control" placeholder="No. of Days" id="" name="">
                                                <center><label>Days</label></center>
                                            </div>
                                            </div>
                                        
                                            <div class="col-lg-4">
                                            <div class="form-group">
                                                <center><label>Sick</label></center>
                                                <input class="form-control" placeholder="No. of Days" id="" name="">
                                                <center><label>Days</label></center>
                                            </div>
                                            </div>
                            
                                            <div class="col-lg-4">
                                            <div class="form-group">
                                                <center><label>Total</label></center>
                                                <input class="form-control" placeholder="No. of Days" disabled id="" name="">
                                                <center><label>Days</label></center>
                                            </div>
                                            </div>
                                            
                                        </div>
                                        </div>

                                        <div class="col-lg-6">
										<div class="form-group">
                                            <label style="font-size:15px">B. RECOMMENDATION</label>
                                            <br>
                                            <input type = "radio" name = "" value = "on"> Approved
                                            <br>
                                            
                                            <input type = "radio" name = "" value = "on"> Disapproved due to <textarea class="form-control" rows="3" id = "purpose1" name = "purpose1" placeholder="Enter Reason"></textarea>
                                            <br>
                                            <br>
                                            <br>
                                        </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
										<div class="form-group">
                                            <label style="font-size:15px">C. APPROVED FOR: </label>
                                            <br>
                                            
                                            <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>No. of Days with Pay</label>
                                                <input class="form-control" placeholder="No. of Days" id="" name="">
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>No. of Days Without Pay</label>
                                                <input class="form-control" placeholder="No. of Days" id="" name="">
                                            </div>
                                            </div>
                                            <br>
                                            <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Others <i>(Specify)</i></label>
                                                <textarea class="form-control" rows="3" id = "purpose1" name = "purpose1" placeholder="Enter Reason"></textarea>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                            
                                        <div class="col-lg-6">
										<div class="form-group">
                                            <label style="font-size:15px">D. DISAPPROVED DUE TO:</label>
                                            <br>
                                            <textarea class="form-control" rows="3" id = "purpose1" name = "purpose1" placeholder="Enter Reason"></textarea>
                                        </div>
                                        </div>
                        </form>
			</div>
        </div>
			</div><br><br>
<div id="wrapper">
<?php include 'include/footer.php';?>
</div>
    
    <script>
    $.sidebarMenu($('.sidebar-menu'))
    </script>

    <script>
    // tooltip 
    $('.tooltip').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    </script>
	<script src = "../js/_view_application1.js"></script>
    <script  src="../js/index.js"></script>
    

</body>
	<!------- ALL PHP CUSTOMS HERE ONLY ------->
		<?php
			include("../myfunc/view_application1.php");
		?>
	<!----------------------------------------->
</html>
