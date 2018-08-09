<div class="col-lg-12">
                    <div class="panel panel-info">
                    <div class="panel-heading" >
                            <b>OTHER INFORMATION</b>
                    </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#fambg" data-toggle="tab"><b>FAMILY BACKGROUND</b></a>
                                </li>
                                <li><a href="#edbg" data-toggle="tab"><b>EDUCATIONAL BACKGROUND</b></a>
                                </li>
                                <!--<li><a href="#leavebal" data-toggle="tab"><b>LEAVE CREDITS</b></a>
                                </li>-->
                                <li><a href="#departmentID" data-toggle="tab"><b>DEPARTMENT</b></a>
                                </li>
                                <li><a href="#workexp" data-toggle="tab"><b>WORK EXPERIENCE</b></a>
                                </li>
                                <li><a href="#trainings" data-toggle="tab"><b>TRAININGS ATTENDED</b></a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="fambg">
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
                                            <input id = "mlname1" name = "mlname1" class="form-control" placeholder="Enter Surame" value="">
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
                                            <input id = "moccupation1" name = "moccupation1" class="form-control" placeholder="Enter First Name" value="">
                                        </div>
                                    </div>
									
                                    </div>

                                    <div class="col-lg-12">
                                    <div class = "col-lg-3">
                                    <div class="form-group">
                                            <label>Number of Children:</label>
                                            <input id = "nos1" name = "nos1" type = "number" class="form-control" placeholder="Enter Number" value="0">
                                    </div>
                                    </div>
                                    </div>

									
									
                                    <?php echo ' <button id = "submitButton2" type="button" class="btn btn-primary" onclick = "submitForm2('.$_SESSION['pims_data']['emp_id'].')">Submit</button> ' ;?>
                                    <button type="reset" class="btn btn-primary">Reset</button>

                                    </form>
                             
                                </div>
                                <div class="tab-pane fade" id="edbg">
                                    <br><br><br>
                                    <form id = "form3">
									<div class = "col-lg-12">
										<label style = "color: red ">All with * are required.</label>
									</div>
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
									
                                    <?php echo ' <button id = "submitButton3" onclick = "submitForm3('.$_SESSION['pims_data']['emp_id'].')"  type="button" class="btn btn-primary">Submit</button> '; ?>
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                    </form>
                                    
                                </div>
                                <div class="tab-pane fade" id="workexp">
                                    <br><br><br>
                                    <form>
                                    <div class="col-lg-12">
                                        <table width="1000" border="1">
                                            <td width="auto"><div align="center"><strong>FROM:</strong></div></td>
                                            <td width="auto"><div align="center"><strong>TO:</strong></div></td>
                                            <td width="auto"><div align="center"><strong>POSITION TITLE:</strong></div></td>
                                            <td width="auto"><div align="center"><strong>AGENCY/COMPANY</strong></div></td>
                                            <td width="auto"><div align="center"><strong>MONTHLY SALARY</strong></div></td>
    
                                        <tr>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                        </tr>
    
                                        <tr>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name="" ></center></td>
                                            <td><center><input type="text"  name="" ></center></td>
                                            <td><center><input type="text"  name="" ></center></td>
                                            <td><center><input type="text"  name="" ></center></td>
                                        </tr>
    
                                        <tr>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name="" ></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                        </tr>
    
                                        <tr>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                        </tr>
                                    </table>

                                    </div>
                                    <br>
                                    <button class="btn btn-primary"><i class="fa fa-plus"></i>Add Row</button>
                                    &emsp;<button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                                
                                <div class="tab-pane fade" id="trainings">
                                    <br><br><br>
                                    <form>
                                    <div class="col-lg-12">
                                        <table width="1000" border="1">
                                            <td width="auto"><div align="center"><strong>Title of Training:</strong></div></td>
                                            <td width="auto"><div align="center"><strong>Location:</strong></div></td>
                                            <td width="auto"><div align="center"><strong>Date Start:</strong></div></td>
                                            <td width="auto"><div align="center"><strong>Date End:</strong></div></td>
                                            <td width="auto"><div align="center"><strong>No of Hours:</strong></div></td>
                                            <td width="auto"><div align="center"><strong>Other Info:</strong></div></td>
    
                                        <tr>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                        </tr>
    
                                        <tr>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name="" ></center></td>
                                            <td><center><input type="text"  name="" ></center></td>
                                            <td><center><input type="text"  name="" ></center></td>
                                            <td><center><input type="text"  name="" ></center></td>
                                        </tr>
    
                                        <tr>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name="" ></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                        </tr>
    
                                        <tr>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                        </tr>
                                        <tr>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                            <td><center><input type="text"  name=""></center></td>
                                        </tr>
                                    </table>



                                    </div>
                                    <br>
                                    
                                    <button class="btn btn-primary"><i class="fa fa-plus"></i>Add Row</button>
                                    &emsp;<button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                        
                                <div class="tab-pane fade" id="leavebal">
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
                                <div class="tab-pane fade" id="empRec">
                                    <div class = "col-lg-12">
                                        <label style = "color: red ">All fields are required. Except Date Retired</label>
                                    </div>
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
                                </div>
                                <div class="tab-pane fade" id="JobTitleCode">
                                    <br>
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
                                            <select class="form-control" id = "" name = "" >
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="trainings">
                                    <br>
                                    <div class="col-lg-12">
                                        <table>
                                            
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="departmentID">
                                    <br>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Department:</label>
                                            <select class="form-control" id = "department1" name = "department1" >
                                                <?php include("../myfunc/add_personnel2.php"); ?>
                                            </select>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <center>
                    <button id = "submitButton4" type="button" onclick = "" class="btn btn-primary btn-lg" >SUBMIT ALL</button>
                    </center>
                    <br><br>
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

</div>