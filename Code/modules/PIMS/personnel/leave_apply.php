<?php
	session_start();
	include("../myfunc/session1.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>

<?php include 'include/topnav.php';?>

<?php include 'include/sidenav.php';?>

<br><br><br><br>

    <div id="wrapper" style="margin-left: 60px;">

        <div class="container">
                        <div class="col-lg-11">
                        <center><h3>LEAVE APPLICATION FORM</h3></center><br>
                        <form role="form" id = "form1" >
                                        
                                        <div class="col-lg-12">
										<div class="form-group">
                                            <label style = "color: red ">All with * are required.</label>
                                            <br>
                                            <center><big>APPLICATION FOR LEAVE</big></center>
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
                                            <label><span style = "color: red">*</span>Position</label> 
                                                <select name="" class="form-control">
                                                <option value="none">-Select-</option>
                                                <option value="">Teacher I</option>
                                                <option value="">Teacher II</option>
                                                </select>
                                        </div>
                                        </div>
                                        <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Salary</label>
                                            <input class="form-control" placeholder="00.00" id="" name="">
                                        </div>
                                        </div>
                                        <div class="col-lg-12">
										<div class="form-group">
                                            <br>
                                        </div>
                                        </div>
                                        <div class="col-lg-12">
										<div class="form-group">
                                            <center><big>DETAILS OF APPLICATION</big></center>
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
										<div class="form-group">
                                            <label style="font-size:15px"><span style = "color: red">*</span>A. TYPE OF LEAVE</label>
                                            <br>
                                            <input type = "radio" name = "vac_leave" value = "on"> VACATION LEAVE
                                            <br>
                                            &emsp;&emsp;<input type = "radio" name = "vac_leave" value = "on"> TO SEEK EMPLOYMENT
                                            <br>
                                            &emsp;&emsp;<input type = "radio" name = "vac_leave" value = "on"> OTHERS <i>(Specify)</i><textarea class="form-control" rows="3" id = "purpose1" name = "purpose1" placeholder="Enter Reason"></textarea>
                                            <br>
                                            <input type = "radio" name = "sick_leave" value = "on"> SICK LEAVE <i>(Specify)</i><textarea class="form-control" rows="3" id = "purpose1" name = "purpose1" placeholder="Enter Reason"></textarea>
                                            <br>
                                             &emsp;&emsp;<input type = "radio" name = "" value = "on"> IN HOSPITAL <i>(Specify)</i>
                                            <textarea class="form-control" rows="3" id = "purpose1" name = "purpose1" placeholder="Enter Reason"></textarea>
                                            <br>
                                             &emsp;&emsp;<input type = "radio" name = "" value = "on"> OUT PATIENT <i>(Specify)</i>
                                            <textarea class="form-control" rows="3" id = "purpose1" name = "purpose1" placeholder="Enter Reason"></textarea>
                                            <br>
                                            <input type = "radio" name = "matpat_leave" value = "on"> MATERNITY/ PATERNITY LEAVE
                                            <br>
                                            <input type = "radio" name = "others" value = "on"> OTHER REASON <i>(Specify)</i>
                                            <textarea class="form-control" rows="3" id = "purpose1" name = "purpose1" placeholder="Enter Reason"></textarea>
                                            
                                        </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
										<div class="form-group">
                                            <label style="font-size:15px"><span style = "color: red">*</span>B. WHERE WILL LEAVE BE SPENT</label>
                                            <br>
                                                <input type = "checkbox" name = "maths" value = "on"> Withing the Philippines
                                            <br>
                                                <input type = "checkbox" name = "physics" value = "on"> ABROAD <i>(Specify)</i><textarea class="form-control" rows="3" id = "purpose1" name = "purpose1" placeholder="Enter Reason"></textarea>
                                            <br>
                                            <label style="font-size:15px"><span style = "color: red">*</span>C. NUMBER OF WORKING DAYS</label>
                                            <br>
                                            <div class="col-lg-12">
                                            <div class="form-group">
                                            <label><span style = "color: red">*</span>Applied for: </label>
                                                <input class="form-control" placeholder="Enter Text" id="" name="">
                                            </div>
                                            </div>
                                            <div class="col-lg-12">
                                            <div class="form-group">
                                            <label><span style = "color: red">*</span>Inclusive Date: </label>
                                                <input class="form-control" placeholder="Enter Date" id = "" name = "startOfLeave1" type="date">
                                            </div>
                                            </div>
                                            
                                            <label style="font-size:15px"><span style = "color: red">*</span>D. COMMUTATION</label>
                                            <br>
                                            <input type = "radio" name = "" value = "on"> Requested
                                            &emsp;&emsp;&emsp;&emsp;
                                            <input type = "radio" name = "" value = "on"> Not Requested
                                        </div>
                                        </div>
                            
                                        <div class="col-lg-12">
										<div class="form-group">
                                            <label>Attachment: ( If many, zip files )</label>
                                            <input class="" type = "file" id = "attachment1" name = "attachment1" >
                                        </div>
                                        </div>
                            
                            <div class="col-lg-12">            
                                <br>
                                <br>
                            <h5>INSTRUCTIONS</h5>
                            <p>1. Application for vacation/ sick leave for one full day or more shall be made in this frm and to be accomplished in triplicate.</p>
                            <p>2. Application for vacation leave shall be filled in advance or whenever possible, five (5) days  before going to such leave.</p>
                            <p>3. Application filed in advance or exceeding should be filed by the applicant. For leave incurred for more thatn five (5) days, indicate reason.</p>
                            <p>4. An employee absent without leave shall not be entitled to recieve salary corresponding to the period of his/her leave of absence</p>
                            <p>5. An application for leave of absence of thirty (30) days or more shall be accompanied by a clearance of money and property accountability.</p>
                            </div>
                                        
                                        
                                        <div class="col-lg-12">
                                        <br>
                                        <button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                        <a href="leave_form.php"><button id = "submitButton1" type="button" class="btn btn-outline btn-primary" onclick = "" >Submit Application</button></a>
                                        
                                        </div>
                                    </form>
                            
                            
                        </div>



        </div><br><br><br>
        </div>
<div id="wrapper">
    <?php include 'include/footer.php'; ?>
</div>
	
	<!-- My Custom JavaScript -->
	<script src="../js/_leave_apply1.js"></script>
    <script  src="../js/index.js"></script>
</body>

</html>

	<!------- ALL PHP CUSTOMS HERE ONLY ------->
	<?php
		include("../myfunc/leave_apply1.php");
	?>
	<!----------------------------------------->
