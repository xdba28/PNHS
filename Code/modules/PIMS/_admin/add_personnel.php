<?php
	header( "Expires: Mon, 20 Dec 1998 01:00:00 GMT" );
	header( "Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" );
	header( "Cache-Control: no-cache, must-revalidate" );
	header( "Pragma: no-cache" );

	session_start();
	include("../myfunc/session2.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>
<?php include 'include/topnav.php';?>


<?php include 'include/sidenav.php';?>

<br><br><br><br>

    <div id="wrapper" style="margin-left: 60px;"><br>
        
        <div class="container">
                    

    <div class="col-lg-11"><center><h2>PERSONNEL INFORMATION</h2></center><br>
    
    <div class="panel panel-default">
                	<div class="panel-heading">
    				<h3>PERSONAL INFORMATION</h3>
					</div>
          
                        <div class="panel-body">
                            <div class="row">
                                
                                      
                    <div class="col-lg-6">
                                    
                                        <div class="row show-grid">
                                            <div class="col-md-12" >
                                            <label id = "name1" >NAME:</label>
                                            </div>
                                        </div>
										
										<form role="form" id = "form1" >
										<div class="form-group">
                                            <label><i style="color: red;">*</i>Last Name:</label>
											<input class="form-control" id = "lname1" name = "lname1" >
                                        </div>
										<div class="form-group">
                                            <label><i style="color: red;">*</i>First Name:</label>
                                            <input class="form-control" id = "fname1" name = "fname1" >
                                        </div>
										<div class="form-group">
                                            <label>Middle Name:</label>
                                            <input class="form-control" id = "mname1" name = "mname1" >
                                        </div>
										 <div class="form-group">
                                            <label>Extension Name:</label>
                                            <input class="form-control" id = "extension_name1" name = "extension_name1" >
                                        </div>

                                        
										<div class="form-group">
                                            <label>Profile Picture</label>
											<input type="file" id = "Picture1" name = "Picture1" accept="image/*" >
                                        </div>
										
                                        <div class="form-group">
                                            <label><i style="color: red;">*</i>Gender:&emsp;</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="gender1" value="Male" selected> Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="gender1" value="Female"> Female
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label><i style="color: red;">*</i>Date of Birth:</label>
                                            <input type="date" class="form-control" id = "birthdate1" name = "birthdate1" >
                                        </div>

                                        <div class="form-group">
                                            <label><i style="color: red;">*</i>Nationality:</label>
                                            <input class="form-control" id = "nationality1" name = "nationality1" placeholder="Enter Citizenship">
                                        </div>

                                        <div class="form-group">
                                            <label><i style="color: red;">*</i>Civil Status:&emsp;</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="civilStatus1" value="Single" selected> Single
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="civilStatus1" value="Married"> Married
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="civilStatus1" value="Widowed"> Widowed
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="civilStatus1" value="Seperated"> Seperated
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="civilStatus1" value="Others" > Others
												<input type="textarea" id = "civilStatusOthers1" name = "civilStatusOthers1" style = "display: none" placeholder="Enter Civil Status" > 
                                            </label>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Blood Type:</label>
                                            <input id = "bloodType1" name = "bloodType1" class="form-control" placeholder="Enter Blood Type">
                                        </div>
										
                                        <div class="form-group">
                                            <label>GSIS ID No.:</label>
                                            <input id = "gsis1" name = "gsis1" class="form-control" placeholder="Enter No.">
                                        </div>
										
                                        <div class="form-group">
                                            <label>Contact No.:</label>
                                            <input id = "contactNo1" name = "contactNo1" class="form-control" placeholder="Enter No.">
                                        </div>
										
                                        <div class="form-group">
                                            <label>Email Address:</label>
                                            <input id = "emailAddress1" name = "emailAddress1" class="form-control" placeholder="Enter Email">
                                        </div>
										<div class="form-group">
                                            <label>Religion:</label>
                                            <input id = "religion1" name = "religion1" class="form-control" placeholder="Enter Religion">
                                        </div>


                        </div>

                        <div class="col-lg-6">

                                        <div class="form-group">
                                                
                                                    <input type="checkbox"  id = "checkBoxSame1" name = "checkBoxSame1" > Check if Temporary Address is the same as Permanent Address
                                                
                                        </div>
                                        <div class="form-group" id = "tempAddressDiv1" >
                                            <label>Temporary Address</label><br>
											<label>Street:</label>
                                            <input class="form-control" id = "tempStreet1" name = "tempStreet1">
                                            <label>House No.:</label>
                                            <input class="form-control" id = "tempHouseNo1" name = "tempHouseNo1" type = "number" >
                                            <label><i style="color: red;">*</i>Barangay:</label>
                                            <input class="form-control" id = "tempBarangay1" name = "tempBarangay1" >
                                            <label><i style="color: red;">*</i>City/Municipality:</label>
                                            <input class="form-control" id = "tempMunicipalityCity1" name = "tempMunicipalityCity1" >
                                            <label><i style="color: red;">*</i>Province:</label>
                                            <input class="form-control" id = "tempProvince1" name = "tempProvince1" >
                                            <label><i style="color: red;">*</i>ZIP Code:</label>
                                            <input class="form-control" type = "number" id = "tempZipCode1" name = "tempZipCode1">
                                        </div>

                                        <div class="form-group">
                                            <label>Permanent Address</label><br>
                                            <label>Street:</label>
                                            <input class="form-control" id = "permStreet1" name = "permStreet1" >
                                            <label>House No.:</label>
                                            <input class="form-control" type = "number" id = "permHouseNo1" name = "permHouseNo1" >
                                            <label><i style="color: red;">*</i>Barangay:</label>
                                            <input class="form-control" id = "permBarangay1" name = "permBarangay1" >
                                            <label><i style="color: red;">*</i>City/Municipality:</label>
                                            <input class="form-control" id = "permMunicipalityCity1" name = "permMunicipalityCity1" >
                                            <label><i style="color: red;">*</i>Province:</label>
                                            <input class="form-control" id = "permProvince1" name = "permProvince1" >
                                            <label><i style="color: red;">*</i>ZIP Code:</label>
                                            <input class="form-control" type = "number" id = "permZipCode1" name = "permZipCode1">
                                        </div>

                                        
                                         <button id = "submitButton1" type="button"  class="btn btn-outline btn-success" onclick = "submitForm1('.$_SESSION['pims_data']['emp_id'].')">Submit</button>
                                        <button type="reset" class="btn btn-outline btn-success">Reset</button>
                                        
                
                                    </form>
                        </div>
                                <!-- /.col-lg-6 (nested) -->

                            </div>
                            <!-- /.row (nested) -->
                        </div>
          </div>
		
		
<div class="panel panel-default">
        <div class="panel-heading">
            <h3>FAMILY BACKGROUND<h3>
        </div>
                        <div class="panel-body">
                           
                                <div id="fambg">
                                    <br><br><br>
                                    <form id = "form2" >
                                    
                                    <div class="col-lg-12">
                                    
                                    <div class = "col-lg-4">
                                    <div class="form-group">
                                            <label> Father's Surname:</label>
                                            <input id = "flname1" name = "flname1" class="form-control" placeholder="Enter Surname">
                                        </div>
                                    </div>
                                    <div class = "col-lg-3">
                                    <div class="form-group">
                                            <label>First Name:</label>
                                            <input id = "ffname1" name = "ffname1" class="form-control" placeholder="Enter First Name">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input id = "fmname1" name = "fmname1" class="form-control" placeholder="Enter Middle Name" value="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Birthdate:</label>
                                            <input id = "fbirthdate1" name = "fbirthdate1" type="date" class="form-control" value="1890-01-01" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Occupation:</label>
                                            <input id = "foccupation1" name = "foccupation1" class="form-control" placeholder="Enter First Name" value="">
                                        </div>
                                    </div>
                                    
                                    </div>

                                    <div class="col-lg-12">
                                   
                                    <div class = "col-lg-3">
                                    <div class="form-group">
                                            <label>Mother's Maiden Name:</label>
                                            <input id = "mmaidenname1" name = "mmaidenname1" class="form-control" placeholder="Enter Maiden Name" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-3">
                                    <div class="form-group">
                                            <label> Surname:</label>
                                            <input id = "mlname1" name = "mlname1" class="form-control" placeholder="Enter Surname" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input id = "mfname1" name = "mfname1" class="form-control" placeholder="Enter First Name " value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input id = "mmname1" name = "mmname1" class="form-control" placeholder="Enter Middle Name" value="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Birthdate:</label>
                                            <input id = "mbirthdate1" name = "mbirthdate1" type="date" class="form-control" value="1890-01-01">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Occupation:</label>
                                            <input id = "moccupation1" name = "moccupation1" class="form-control" placeholder="Enter Occupation" value="">
                                        </div>
                                    </div>
                                    
                                    </div>

                                   
                                    <div class = "col-lg-3">
                                    <div class="form-group">
                                            <label>Number of Children:</label>
                                            <input id = "nos1" name = "nos1" type = "number" class="form-control" placeholder="Enter Number" value="0">
                                    </div>
                                    </div>


                                    
                                    
                                    <?php echo ' <button id = "submitButton2" type="button" class="btn btn-outline btn-success" onclick = "submitForm2('.$_SESSION['pims_data']['emp_id'].')">Submit</button> ' ;?>
                                    <button type="reset" class="btn btn-outline btn-success">Reset</button>

                                    </form>
                            </div>

</div>
</div>


<div class="panel panel-default">
        <div class="panel-heading">
            <h3>EDUCATIONAL BACKGROUND<h3>
        </div>

        <div class="panel-body">
                                <div  id="edbg">
                                    <br><br><br>
                                    <form id = "form3">
                                    
                                    <div class = "col-lg-8">
                                    <div class="form-group">
                                            <label><i style="color: red;">*</i>Elementary:</label>
                                            <input id = "elementary2" name = "elementary2" class="form-control" placeholder="Enter School Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label><i style="color: red;">*</i>From:</label>
                                            <input id = "elementaryFrom2" name = "elementaryFrom2" type="number" class="form-control" placeholder="Enter Year" value="0000">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label><i style="color: red;">*</i>To:</label>
                                            <input id = "elementaryTo2" name = "elementaryTo2" type="number" class="form-control" placeholder="Enter Year" value="0000">
                                        </div>
                                    </div>

                                    <div class = "col-lg-8">
                                    <div class="form-group">
                                            <label>High School:</label>
                                            <input id = "highSchool2" name = "highSchool2" class="form-control" placeholder="Enter School Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>From:</label>
                                            <input id = "highSchoolFrom2" name = "highSchoolFrom2" type="number" class="form-control" placeholder="Enter Year" value="0000">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>To:</label>
                                            <input id = "highSchoolTo2" name = "highSchoolTo2" type="number" class="form-control" placeholder="Enter Year" value="0000">
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class = "col-lg-4">
                                    <div class="form-group">
                                            <label>College:</label>
                                            <input id = "college2" name = "college2" class="form-control" placeholder="Enter School Name" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-4">
                                    <div class="form-group">
                                            <label>Degree/Course:</label>
                                            <input id = "collegeDegree2" name = "collegeDegree2" class="form-control" placeholder="Enter Course" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>From:</label>
                                            <input id = "collegeFrom2" name = "collegeFrom2" type="number" class="form-control" placeholder="Enter Year" value="0000">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>To:</label>
                                            <input id = "collegeTo2" name = "collegeTo2" type="number" class="form-control" placeholder="Enter Year" value="0000">
                                        </div>
                                    </div>
                                    <div class = "col-lg-4">
                                    <div class="form-group">
                                            <label>Honor or Award:</label>
                                            <input id = "honorAward2" name = "honorAward2" class="form-control" placeholder="Enter Honor/Award" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-4">
                                    <div class="form-group">
                                            <label>Affiliation:</label>
                                            <input id = "affiliation2" name = "affiliation2" class="form-control" placeholder="Enter Affiliation" value="">
                                        </div>
                                    </div>                                  
                                    <?php echo ' <button id = "submitButton3" onclick = "submitForm3('.$_SESSION['pims_data']['emp_id'].')"  type="button" class="btn btn-outline btn-success">Submit</button> '; ?>
                                    <button type="reset" class="btn btn-outline btn-success">Reset</button>
                                    </form>
                                    
</div>
</div>
</div>

<div class="panel panel-default">
        <div class="panel-heading">
            <h3>WORK EXPERIENCE<h3>
        </div>

        <div class="panel-body">
                            <div id="workexp">
                                    <form>
                                    <div class = "col-lg-2">
                                    <div class="form-group">
                                            <label>From:</label>
                                            <input id = "" name = "" class="form-control" placeholder="Year" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-2">
                                    <div class="form-group">
                                            <label>To:</label>
                                            <input id = "" name = "" class="form-control" placeholder="Year" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Position Title:</label>
                                            <input id = "" name = "" class="form-control" placeholder="Enter Position">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Agency/Company:</label>
                                            <input id = "" name = "" class="form-control" placeholder="Enter Comapny Name">
                                        </div>
                                    </div>
                                    <br><button type="reset" class="btn btn-outline btn-success">Reset</button>
                                    &emsp;<button type="submit" class="btn btn-outline btn-success">Submit</button>
                                    </form>
                            </div>
</div>
</div>


<div class="panel panel-default">
        <div class="panel-heading">
            <h3>TRAININGS ATTENDED<h3>
        </div>

        <div class="panel-body">
                                <div id="trainings">
                                    
                                    <form>
                                    <div class = "col-lg-3">
                                    <div class="form-group">
                                            <label>Title of Training:</label>
                                            <input id = "" name = "" class="form-control" placeholder="Title" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-3">
                                    <div class="form-group">
                                            <label>Location:</label>
                                            <input id = "" name = "" class="form-control" placeholder="Location" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>Date Start:</label>
                                            <input id = "" type="date" name = "" class="form-control" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>Date End:</label>
                                            <input id = "" type="date" name = "" class="form-control" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>No. of Hours:</label>
                                            <input id = "" type="time" name = "" class="form-control" placeholder="Hours">
                                        </div>
                                    </div>
                                    <br><button type="reset" class="btn btn-outline btn-success">Reset</button>
                                    &emsp;<button type="submit" class="btn btn-outline btn-success">Submit</button>
                                    </form>
                                </div>

</div>
</div>


                    <!--            <div id="leavebal">
                                    <form id = "form4"> 
                                    <div class="form-group" id = "checkBoxSame2div" >
                                            <input type = "checkbox" id = "checkBoxSame2" name = "checkBoxSame2" class="form-control">
                                            <center><b>Create Leave for the employee</b></center>
                                    </div>
                                    <div class = "col-lg-4">
                                    <br>
                                    <div class="form-group" id = "leaveCredits2div" style = "display: none"  >
                                        <label>Leave Credits: </label>
                                        <input type = "number" id = "leaveCredits2" name = "leaveCredits2" class="form-control" placeholder="Enter Number" >
                                    </div>
                                    </div>
                                </div>
                    -->
<div class="panel panel-default">
        <div class="panel-heading">
            <h3>EMPLOYMENT RECORD<h3>
        </div>

        <div class="panel-body">
                                <div id="empRec">
                                <form>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Complete item no:</label>
                                            <input id = "completeItemNo1" name = "completeItemNo1" class="form-control" >
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Work Status:</label>
                                            <select class="form-control" id = "workStatus1" name = "workStatus1" >
                                                  <option value="WORKING">Working</option>
                                                  <option value="RETIRED">Retired</option>
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Role Type:</label>
                                            <input id = "roleType1" name = "roleType1" class="form-control" >
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Employment Status:</label>
                                            <select class="form-control" id = "employmentStatus1" name = "employmentStatus1" >
                                                  <option value="PERMANENT">Permanent</option>
                                                  <option value="REGULAR PERMANENT">Regular Permanent</option>
                                                  <option value="SUBSTITUTE">Substitute</option>
                                                  <option value="PROBATIONARY">Probationary</option>
                                                  <option value="TEMPORARY">Temporary</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Date Joined:</label>
                                            <input id = "dateJoined1" name = "dateJoined1" class="form-control" type = "date" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Date Retired:</label>
                                            <input id = "dateRetired1" name = "dateRetired1" class="form-control" type = "date" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Division Code:</label>
                                            <input id = "divCode1" name = "divCode1" class="form-control" type = "number" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Biometric ID:</label>
                                            <input id = "biometricID1" name = "biometricID1" class="form-control" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>School ID:</label>
                                            <input id = "schoolID1" name = "schoolID1" class="form-control" type = "number" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Appointment date:</label>
                                            <input id = "appointmentDate1" name = "appointmentDate1" class="form-control" type = "date" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Faculty Type:</label>
                                            <select class="form-control" id = "facultyType1" name = "facultyType1" >
                                                  <option value="Teaching">Teaching</option>
                                                  <option value="Non Teaching">Non Teaching</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br><button type="reset" class="btn btn-outline btn-success">Reset</button>
                                    &emsp;<button type="submit" class="btn btn-outline btn-success">Submit</button>
                                </form>
                                </div>
</div>
</div>

<div class="panel panel-default">
        <div class="panel-heading">
            <h3>JOB TITLE AND DEPARTMENT<h3>
        </div>

        <div class="panel-body">
                                <div id="JobTitleCode">
                                    <br><form>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Job Title:</label>
                                            <select class="form-control" id = "jobTitle1" name = "jobTitle1" >
                                                <?php include("../myfunc/add_personnel1.php"); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Or Create a new Job Title:</label>
                                            <input type="" name="" placeholder="Job Title" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div id="departmentID">
                                    <br>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Department:</label>
                                            <select class="form-control" id = "department1" name = "department1" >
                                                <?php include("../myfunc/add_personnel2.php"); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br><button type="reset" class="btn btn-outline btn-success">Reset</button>
                                    &emsp;<button type="submit" class="btn btn-outline btn-success">Submit</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
</div>
</div>
                    
                    <center>
                    <button id = "submitButton4" type="button" onclick = "finalEditSubmit()" class="btn btn-outline btn-success btn-lg" >SUBMIT ALL</button>
                    </center><br><br>
    </div>
<div id="wrapper">
<?php include 'include/footer.php';?>
</div>
    
    <script src = "../js/_add_personnel1.js"></script>
    <script  src="../js/index.js"></script>

</body>

</html>
