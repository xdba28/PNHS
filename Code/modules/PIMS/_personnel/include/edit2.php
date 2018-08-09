
<div class="panel panel-default">
        <div class="panel-heading">
            <h3>FAMILY BACKGROUND<h3>
        </div>
                        <div class="panel-body">
                           
                                <div id="fambg">
                                    <br><br><br>
                                    <form id = "form2" >
									
									<div class="col-lg-12">
                                   
                                    <div class = "col-lg-3">
                                    <div class="form-group">
                                            <label>Spouse's Last Name:</label>
                                            <input id = "slname1" name = "slname1" class="form-control" placeholder="Enter Last Name" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-3">
                                    <div class="form-group">
                                            <label> First Name:</label>
                                            <input id = "sfname1" name = "sfname1" class="form-control" placeholder="Enter First Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input id = "smname1" name = "smname1" class="form-control" placeholder="Enter Middle Name " value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Extension Name:</label>
                                            <input id = "sename1" name = "sename1" class="form-control" placeholder="Enter Extension Name" value="">
                                        </div>
                                    </div>
									
                                    </div>
									
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
                                            <input id = "fbirthdate1" name = "fbirthdate1" type="date" class="form-control" value="1980-01-01" >
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
                                            <input id = "mbirthdate1" name = "mbirthdate1" type="date" class="form-control" value="1980-01-01">
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


									
									
                                    <?php echo ' <button id = "submitButton2" type="button" class="btn btn-outline btn-primary" onclick = "submitfamilybackground('.$_SESSION['pims_data']['emp_id'].')">Submit</button> ' ;?>
                                    <button type="reset" class="btn btn-outline btn-primary">Reset</button>

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
                                            <label>Elementary:</label>
                                            <input id = "elementary2" name = "elementary2" class="form-control" placeholder="Enter School Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>From:</label>
                                            <input id = "elementaryFrom2" name = "elementaryFrom2" type="number" class="form-control" placeholder="Enter Year" value="0000">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>To:</label>
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
                                    <?php echo ' <button id = "submitButton3" onclick = "submiteducationalbackground('.$_SESSION['pims_data']['emp_id'].')"  type="button" class="btn btn-outline btn-primary">Submit</button> '; ?>
                                    <button type="reset" class="btn btn-outline btn-primary">Reset</button>
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
                                            <input name = "workexp_from[]" class="form-control" placeholder="Year" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-2">
                                    <div class="form-group">
                                            <label>To:</label>
                                            <input name = "workexp_to[]" class="form-control" placeholder="Year" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Position Title:</label>
                                            <input name = "workexp_positiontitle[]" class="form-control" placeholder="Enter Position">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Agency/Company:</label>
                                            <input name = "workexp_agencycompany[]" class="form-control" placeholder="Enter Comapny Name">
                                        </div>
                                    </div>
									
									<div id = "workexpappendhere" >
									</div>
                                    <br><button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                    &emsp;<button type="submit" class="btn btn-outline btn-primary">Submit</button>
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
                                            <input id = "" type="number" name = "" class="form-control" placeholder="Hours">
                                        </div>
                                    </div>
                                    <br><button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                    &emsp;<button type="submit" class="btn btn-outline btn-primary">Submit</button>
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
                                            <input id = "complete_item_no1" name = "complete_item_no1" class="form-control" >
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Work Status:</label>
                                            <select class="form-control" id = "work_stat1" name = "work_stat1" >
                                                  <option value="WORKING">Working</option>
                                                  <option value="RETIRED">Retired</option>
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Role Type:</label>
											<select class="form-control" id = "role_type1" name = "role_type1" >
                                                  <option value="Employee">Employee</option>
                                                  <option value="Manager">Manager</option>
                                                  <option value="Principal">Principal</option>
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Employment Status:</label>
                                            <select class="form-control" id = "emp_status1" name = "emp_status1" >
                                                  <option value="PERMANENT">Permanent</option>
                                                  <option value="REGULAR PERMANENT">Regular Permanent</option>
                                                  <option value="SUBSTITUTE">Substitute</option>
                                                  <option value="PROBATIONARY">Probationary</option>
                                                  <option value="TEMPORARY">Temporary</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Date Joined:</label>
                                            <input id = "date_joined1" name = "date_joined1" class="form-control" type = "date" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Date Retired:</label>
                                            <input id = "date_retired1" name = "date_retired1" class="form-control" type = "date" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Division Code:</label>
                                            <input id = "div_code1" name = "div_code1" class="form-control" type = "number" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Biometric ID:</label>
                                            <input id = "biometric_ID1" name = "biometric_ID1" class="form-control" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>School ID:</label>
                                            <input id = "school_ID1" name = "school_ID1" class="form-control" type = "number" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Appointment date:</label>
                                            <input id = "appointment_date1" name = "appointment_date1" class="form-control" type = "date" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Faculty Type:</label>
                                            <select class="form-control" id = "faculty_type1" name = "faculty_type1" >
                                                  <option value="Teaching">Teaching</option>
                                                  <option value="Non Teaching">Non Teaching</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br><button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                    &emsp;<button type="submit" class="btn btn-outline btn-primary">Submit</button>
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
                                    <br>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Job Title:</label>
                                            <select class="form-control" id = "jobTitle1" name = "jobTitle1" >
                                                <?php include("../myfunc/add_personnel1.php"); ?>
                                            </select>
                                        </div>
                                    </div>
									<!--
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Or Create a new Job Title:</label>
                                            <select class="form-control" id = "" name = "" >
                                                
                                            </select>
                                        </div>
                                    </div>
									-->
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
                                    <br><button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                    &emsp;<button type="submit" class="btn btn-outline btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
</div>
</div>
                    </div>
                    <center>
                    <button id = "submitButton4" type="button" onclick = "" class="btn btn-outline btn-primary btn-lg" >SUBMIT ALL</button>
                    </center>
                    <br><br>
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

</div>