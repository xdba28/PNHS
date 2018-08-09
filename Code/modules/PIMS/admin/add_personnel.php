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
                                
							            <div class="col-lg-12">
            </div>

                     

                    <form role="form" id = "form1" >
			<div class="col-lg-4">
										<div class="form-group">
                                            <label>Employee Number:</label><i style="color: red;">(Required)</i>
                                            <input type = "number" class="form-control" id = "emp_No1" name = "emp_No1" >
                                        </div>
										<div class="form-group">
                                            <label>Last Name:</label></label><i style="color: red;">(Required)</i>
											<input class="form-control" id = "lname1" name = "lname1" >
                                        </div>
										<div class="form-group">
                                            <label>First Name:</label></label><i style="color: red;">(Required)</i>
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
			</div>
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Sex:</label></label><i style="color: red;">(Required)</i>
                                            <label class="radio-inline">
                                                <input type="radio" name="gender1" value="Male" selected> Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="gender1" value="Female"> Female
                                            </label>
                                        </div>
            </div>
                        <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Date of Birth:</label><i style="color: red;">(Required)</i>
                                            <input type="date" class="form-control" id = "birthdate1" name = "birthdate1" value="">
                                        </div>
            </div>
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Place of Birth:</label>
                                            <input class="form-control" id = "birthplace1" name = "birthplace1" placeholder="Enter Birth Place" value="">
                                        </div>
            </div>
           
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Civil Status:</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="civilStatus1" value="SINGLE" selected> Single
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="civilStatus1" value="MARRIED"> Married
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="civilStatus1" value="LIVE-IN"> Live-In
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="civilStatus1" value="SEPARATED"> Separated
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="civilStatus1" value="WIDOW"> Widow
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="civilStatus1" value="WIDOWER"> Widower
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="civilStatus1" value="DIVORCED"> Divorced
                                            </label>
                                        </div>
            </div>
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nationality:</label>
                                            <input class="form-control" id = "nationality1" name = "nationality1" placeholder="Enter Citizenship" value="">
                                        </div>
            </div>
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Dual Citizenship:</label>
                                            <label class="radio-inline">
                                                <input type="radio" name = "dual_citznshp" id="dual_citznshp_by_birth1dummy" value="birth" selected >by birth
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name = "dual_citznshp" id="dual_citznshp_by_naturalization1dummy" value="natural">by naturalization
                                            </label>
                                        </div>
                                        <div id = "dual_citznshp_by_birth1div" class="form-group" style="display: none;">
                                            <label>Dual Citizenship by Birth:</label>
                                            <input id = "dual_citznshp_by_birth1" name = "dual_citznshp_by_birth1" class="form-control" placeholder="Enter Dual Citizenship" value="">
                                        </div>
                                        <div id = "dual_citznshp_by_naturalization1div" class="form-group" style="display: none;">
                                            <label>Dual Citizenship by Naturalization:</label>
                                            <input id = "dual_citznshp_by_naturalization1" name = "dual_citznshp_by_naturalization1" class="form-control" placeholder="Enter Dual Citizenship" value="">
                                        </div>
            </div>
            
            <div class="col-lg-4">
                                        
                                        <div class="form-group">
                                            <label>Blood Type:</label>
                                            <input id = "bloodType1" name = "bloodType1" class="form-control" placeholder="Enter Blood Type" value="">
                                        </div>
            </div>
            <div class="col-lg-4">
                                        
                                        <div class="form-group">
                                            <label>GSIS ID No.:</label>
                                            <input id = "gsis1" name = "gsis1" class="form-control" placeholder="Enter No." value="">
                                        </div>
            </div>
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>PAGIBIG ID:</label>
                                            <input id = "pagibig1" name = "pagibig1" class="form-control" placeholder="Enter No." value="">
                                        </div>
            </div>
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>SSS No.:</label>
                                            <input id = "sss1" name = "sss1" class="form-control" placeholder="Enter No." value="">
                                        </div>
            </div>
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>TIN No.:</label>
                                            <input id = "tin1" name = "tin1" class="form-control" placeholder="Enter No." value="">
                                        </div>
            </div>
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>PHILHEALTH No.:</label>
                                            <input id = "philhealth1" name = "philhealth1" class="form-control" placeholder="Enter No." value="">
                                        </div>
            </div>
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Contact No.:</label>
                                            <input id = "contactNo1" name = "contactNo1" class="form-control" placeholder="Enter No." value="">
                                        </div>
            </div>
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Agency Employee No.:</label>
                                            <input id = "contactNo1" name = "contactNo1" class="form-control" placeholder="Enter No." value="">
                                        </div>
            </div>
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Telephone No.:</label>
                                            <input id = "telephoneNo1" name = "telephoneNo1" class="form-control" placeholder="Enter No." value="">
                                        </div>
            </div>
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Email Address:</label>
                                            <input id = "emailAddress1" name = "emailAddress1" class="form-control" placeholder="Enter Email" value="">
                                        </div>
            </div>
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Religion:</label>
                                            <input id = "religion1" name = "religion1" class="form-control" placeholder="Enter Religion" value="">
                                        </div>
            </div>
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Height ( in meters ):</label>
                                            <input id = "height1" name = "height1" class="form-control" placeholder="Enter Height" type = "number" value="">
                                        </div>
            </div>
            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Weight ( in kilograms ):</label>
                                            <input id = "weight1" name = "weight1" class="form-control" placeholder="Enter Weight" type = "number" value="">
                                        </div>
            </div>
            

                                        <div class="form-group">
            <div class="col-lg-12">        
                                        <br><br><br><input type="checkbox"  id = "checkBoxSame1" name = "checkBoxSame1" value = "checkBoxSame1" >&emsp;Temporary Address is the same as Permanent Address<br> <br> 
                                        <label>Temporary Address</label><br>  
            </div>

            <div class="form-group" id = "tempAddressDiv1" >
            <div class="col-lg-4">
                                            <label>Street:</label>
                                            <input class="form-control" id = "tempStreet1" name = "tempStreet1" value="">
            </div>
            <div class="col-lg-4">
                                            <label>House No.:</label>
                                            <input class="form-control" id = "tempHouseNo1" name = "tempHouseNo1" type = "number" value="0" >
            </div>
            <div class="col-lg-4">
                                            <label>Subdivision/Village:</label>
                                            <input class="form-control" id = "tempSubdivisionVillage1" name = "tempSubdivisionVillage1" value="">
            </div>
            <div class="col-lg-4">
                                            <label>Barangay:</label>
                                            <input class="form-control" id = "tempBarangay1" name = "tempBarangay1" value="">
            </div>
            <div class="col-lg-4">
                                            <label>City/Municipality:</label>
                                            <input class="form-control" id = "tempMunicipalityCity1" name = "tempMunicipalityCity1" value="" >
            </div>
            <div class="col-lg-4">
                                            <label>Province:</label>
                                            <input class="form-control" id = "tempProvince1" name = "tempProvince1" value="" >
            </div>
            <div class="col-lg-4">
                                            <label>ZIP Code:</label>
                                            <input class="form-control" type = "number" id = "tempZipCode1" name = "tempZipCode1" value="0">
            </div>
            </div>

            <div class="col-lg-12">
                                        <label>Permanent Address</label><br>
            </div>
            <div class="form-group">
            <div class="col-lg-4">
                                            <label>Street:</label>
                                            <input class="form-control" id = "permStreet1" name = "permStreet1" value="" >
            </div>
            <div class="col-lg-4">
                                            <label>House No.:</label>
                                            <input class="form-control" type = "number" id = "permHouseNo1" name = "permHouseNo1" value="0" >
            </div>
            <div class="col-lg-4">
                                            <label>Subdivision/Village:</label>
                                            <input class="form-control" id = "permSubdivisionVillage1" name = "permSubdivisionVillage1" value="">
            </div>
            <div class="col-lg-4">
                                            <label>Barangay:</label>
                                            <input class="form-control" id = "permBarangay1" name = "permBarangay1" value="" >
            </div>
            <div class="col-lg-4">
                                            <label>City/Municipality:</label>
                                            <input class="form-control" id = "permMunicipalityCity1" name = "permMunicipalityCity1" value="" >
            </div>
            <div class="col-lg-4">
                                            <label>Province:</label>
                                            <input class="form-control" id = "permProvince1" name = "permProvince1" value="" >
            </div>
            <div class="col-lg-4">
                                            <label>ZIP Code:</label>
                                            <input class="form-control" type = "number" id = "permZipCode1" name = "permZipCode1" value="0">
            </div>

            <div class="col-lg-4"> <br>                   
                    <button type="reset" class="btn btn-outline btn-primary">Reset</button>
            </div> 
            </div>                  
                
                    </form>
            </div>
							
                            </div>
                            <!-- /.row (nested) -->
                        </div>
          </div>
		

<div class="panel panel-default">
        <div class="panel-heading">
            <h3>EMPLOYMENT RECORD<h3>
        </div>

        <div class="panel-body">
                                <div id="empRec">
                                <form id = "form6">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Complete item no:</label><i style="color: red;">(Required)</i>
                                            <input id = "complete_item_no1" name = "complete_item_no1" class="form-control" >
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Work Status:</label><i style="color: red;">(Required)</i>
                                            <select class="form-control" id = "work_stat1" name = "work_stat1" >
                                                  <option value="WORKING">Working</option>
                                                  <option value="RETIRED">Retired</option>
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Role Type:</label><i style="color: red;">(Required)</i>
                                            <select class="form-control" id = "role_type1" name = "role_type1" >
                                                  <option value="Employee">Employee</option>
                                                  <option value="Manager">Manager</option>
                                                  <option value="Principal">Principal</option>
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Employment Status:</label><i style="color: red;">(Required)</i>
                                            <select class="form-control" id = "emp_status1" name = "emp_status1" >
                                                  <option value="PERMANENT">Permanent</option>
                                                  <option value="REGULAR PERMANENT">Regular Permanent</option>
                                                  <option value="SUBSTITUTE">Substitute</option>
                                                  <option value="PROBATIONARY">Probationary</option>
                                                  <option value="TEMPORARY">Temporary</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Date Joined:</label><i style="color: red;">(Required)</i>
                                            <input id = "date_joined1" name = "date_joined1" class="form-control" type = "date" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Date Retired:</label>
                                            <input id = "date_retired1" name = "date_retired1" class="form-control" type = "date" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Division Code:</label><i style="color: red;">(Required)</i>
                                            <input id = "div_code1" name = "div_code1" class="form-control" type = "number" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Biometric ID:</label><i style="color: red;">(Required)</i>
                                            <input id = "biometric_ID1" name = "biometric_ID1" class="form-control" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>School ID:</label><i style="color: red;">(Required)</i>
                                            <input id = "school_ID1" name = "school_ID1" class="form-control" type = "number" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Appointment date:</label><i style="color: red;">(Required)</i>
                                            <input id = "appointment_date1" name = "appointment_date1" class="form-control" type = "date" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Faculty Type:</label><i style="color: red;">(Required)</i>
                                            <select class="form-control" id = "faculty_type1" name = "faculty_type1" >
                                                  <option value="Teaching">Teaching</option>
                                                  <option value="Non Teaching">Non Teaching</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br><button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                </form>
                                </div>
</div>
</div>

<div class="panel panel-default">
        <div class="panel-heading">
            <h3>JOB TITLE AND DEPARTMENT<h3>
        </div>

        <div class="panel-body">
                                <form id = "form7" >
                                <div id="JobTitleCode">
                                    <br>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Job Title:</label><i style="color: red;">(Required)</i>
                                            <select class="form-control" id = "jobTitle1" name = "jobTitle1" >
                                                <?php include("../myfunc/add_personnel1.php"); ?>
                                            </select>
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
                                    </form>
                                </div>
                                <br><button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                </form>
                            
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
                                    <div class="col-lg-12">
                                        <big>ABOUT YOUR SPOUSE</big>
                                    </div>
                                   
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

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Occupation:</label>
                                            <input id = "soccupation1" name = "soccupation1" class="form-control" placeholder="Enter Occupation" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Employer/Business Name:</label>
                                            <input id = "employerbusinessname1" name = "employerbusinessname1" class="form-control" placeholder="Enter Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Business Address:</label>
                                            <input id = "businessaddress1" name = "businessaddress1" class="form-control" placeholder="Enter Address" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Telephone Number:</label>
                                            <input id = "steleponenumber1" name = "steleponenumber1" class="form-control" placeholder="Enter Address" value="">
                                        </div>
                                    </div>
                                    
                                    </div>
                                    
                                    <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <big>ABOUT YOUR FATHER</big>
                                    </div>
                                    <div class = "col-lg-3">
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
                                            <label>Extension Name:</label>
                                            <input id = "fename1" name = "fename1" class="form-control" placeholder="Enter Extension Name" value="">
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
                                            <input id = "foccupation1" name = "foccupation1" class="form-control" placeholder="Enter Occupation" value="">
                                        </div>
                                    </div>
                                    
                                    </div>

                                    <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <big>ABOUT YOUR MOTHER</big>
                                    </div>
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

                                    <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <big>ABOUT YOUR CHILDREN</big>
                                    </div>
                                    <div class = "col-lg-8">
                                    <div class="form-group">
                                            <label>Name of Children:</label>
                                            <input id = "childrenname1" name = "childrenname1" type = "text" class="form-control" placeholder="First Name - Middle Initial - Last Name" value="">
                                    </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Date of Birth:</label>
                                        <input id = "childrenbday1" name = "childrenbday1" type = "date" class="form-control" placeholder="Enter Date" value="">
                                    </div>
                                    <div class="col-lg-1"><br>
                                        <button class="btn btn-outline btn-primary">Add Row</button>
                                    </div>
                                    </div>


                                    
                                    <div class="col-lg-12">
                                    <button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                    </div>
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
                                            <input id = "elementaryFrom2" name = "elementaryFrom2" type="number" class="form-control" placeholder="Enter Year" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>To:</label>
                                            <input id = "elementaryTo2" name = "elementaryTo2" type="number" class="form-control" placeholder="Enter Year" value="">
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
                                            <input id = "highSchoolFrom2" name = "highSchoolFrom2" type="number" class="form-control" placeholder="Enter Year" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>To:</label>
                                            <input id = "highSchoolTo2" name = "highSchoolTo2" type="number" class="form-control" placeholder="Enter Year" value="">
                                        </div>
                                    </div>
                                    

                                    <div class = "col-lg-4">
                                    <div class="form-group">
                                            <label>Vocational:</label>
                                            <input id = "vocational_school_name1" name = "vocational_school_name1" class="form-control" placeholder="Enter School Name" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-4">
                                    <div class="form-group">
                                            <label>Degree/Course:</label>
                                            <input id = "vocational_course1" name = "vocational_course1" class="form-control" placeholder="Enter Course" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>From:</label>
                                            <input id = "vocational_academic_yrfr" name = "vocational_academic_yrfr" type="number" class="form-control" placeholder="Enter Year" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>To:</label>
                                            <input id = "vocational_academic_yrto" name = "vocational_academic_yrto" type="number" class="form-control" placeholder="Enter Year" value="">
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
                                            <input id = "collegeFrom2" name = "collegeFrom2" type="number" class="form-control" placeholder="Enter Year" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>To:</label>
                                            <input id = "collegeTo2" name = "collegeTo2" type="number" class="form-control" placeholder="Enter Year" value="">
                                        </div>
                                    </div>

									
                                    <div class = "col-lg-4">
                                    <div class="form-group">
                                            <label>Graduate Studies:</label>
                                            <input id = "gradStud_school1" name = "gradStud_school1" class="form-control" placeholder="Enter School Name" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-4">
                                    <div class="form-group">
                                            <label>Degree/Course:</label>
                                            <input id = "gradStud_course1" name = "gradStud_course1" class="form-control" placeholder="Enter Course" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>From:</label>
                                            <input id = "gradStud_yrfr" name = "gradStud_yrfr" type="number" class="form-control" placeholder="Enter Year" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>To:</label>
                                            <input id = "gradStud_yrto" name = "gradStud_yrto" type="number" class="form-control" placeholder="Enter Year" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-4">
                                    <div class="form-group">
                                            <label>Honor or Award:</label>
                                            <input id = "honor_or_award1" name = "honor_or_award1" class="form-control" placeholder="Enter Honor/Award" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-4">
                                    <div class="form-group">
                                            <label>Higher Units Earned:</label>
                                            <input type = "number" id = "highest_units1" name = "highest_units1" class="form-control" placeholder="If Undergraduate" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-4">
                                    <div class="form-group">
                                            <label>Affiliation:</label>
                                            <input id = "affiliations1" name = "affiliations1" class="form-control" placeholder="Enter Affiliation" value="">
                                        </div>
                                    </div>								
                                    <button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                    </form>
                                    
</div>
</div>
</div>

                    <button style="position: fixed;bottom: 20px;z-index: 5;" 
                     id = "submitButton8" type="button" onclick = "<?php echo "submitallforms()"; ?>" class="btnx	 btn-primary btn-lg" >CREATE PERSONNEL ACCOUNT</button>

                    <br><br>

<div class="panel panel-default">
        <div class="panel-heading">
            <h3>CIVIL SERVICE ELIGIBILTY<h3>
        </div>

        <div class="panel-body">
                            <div id="">
                                    <form id = "form8">
                                    <div class = "col-lg-6">
                                    <div class="form-group">
                                            <label>Career Service:</label>
                                            <input name = "career_service1" id = "career_service1" class="form-control" placeholder="Enter" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-2">
                                    <div class="form-group">
                                            <label>Rating:</label>
                                            <select name = "rating1" id = "rating1" class="form-control" placeholder="Enter Rating" value="">
												<option value = "PASSED" >Passed</option>
												<option value = "FAILED" >Failed</option>
											</select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Date of Examination:</label>
                                            <input name = "exam_date1" id = "exam_date1" type = "date" class="form-control" placeholder="Enter Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Place of Examination:</label>
                                            <input name = "exam_place1" id = "exam_place1" class="form-control" placeholder="Enter Place">
                                        </div>
                                    </div>
                                    <div class = "col-lg-2">
                                    <div class="form-group">
                                            <label>License Number:</label>
                                            <input type = "number" name = "license_no1" id = "license_no1" class="form-control" placeholder="Enter Number" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Date of Validity:</label>
                                            <input type = "date" name = "license_validity_date1" id = "license_validity_date1" class="form-control" placeholder="Enter Date">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                    <br><button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                    &emsp;<?php echo ' <button id = "submitButton8" onclick = "submitcivilservice('.$_SESSION['pims_data']['emp_id'].')"  type="button" class="btn btn-outline btn-primary">Submit</button> '; ?>
                                    </div>
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
                                    <form id = "form4">
                                    <div class = "col-lg-2">
                                    <div class="form-group">
                                            <label>From:</label>
                                            <input type = "date" name = "we_date_from1" id = "we_date_from1" class="form-control" placeholder="Date" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-2">
                                    <div class="form-group">
                                            <label>To:</label>
                                            <input type = "date" name = "we_date_to1" id = "we_date_to1" class="form-control" placeholder="Date" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Position Title:</label>
                                            <input name = "we_position1" id = "we_position1" class="form-control" placeholder="Enter Position">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Agency/Company:</label>
                                            <input name = "company1" id = "company1" class="form-control" placeholder="Enter Comapny Name">
                                        </div>
                                    </div>
									
                                    <br><button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                    &emsp;<?php echo ' <button id = "submitButton4" onclick = "submitworkexperience('.$_SESSION['pims_data']['emp_id'].')"  type="button" class="btn btn-outline btn-primary">Submit</button> '; ?>
                                    </form>
                            </div>
</div>
</div>

<div class="panel panel-default">
        <div class="panel-heading">
            <h3>VOLUNTARY WORK<h3>
        </div>

        <div class="panel-body">
                            <div id="workexp">
                                    <form id = "form4">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Name and Address of Organization:</label>
                                            <input name = "" id = "" class="form-control" placeholder="Enter Position">
                                        </div>
                                    </div>
                                    <div class = "col-lg-2">
                                    <div class="form-group">
                                            <label>From:</label>
                                            <input type = "date" name = "" id = "" class="form-control" placeholder="Date" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-2">
                                    <div class="form-group">
                                            <label>To:</label>
                                            <input type = "date" name = "" id = "" class="form-control" placeholder="Date" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>No of Hours:</label>
                                            <input name = "" id = "" class="form-control" placeholder="Enter ">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Position / Nature of Work:</label>
                                            <input name = "" id = "" class="form-control" placeholder="Enter ">
                                        </div>
                                    </div>
                                    
                                    <br><br><button type="reset" class="btn btn-outline btn-primary">Reset</button>
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
                                    
                                    <form id = "form5">
                                    <div class = "col-lg-3">
                                    <div class="form-group">
                                            <label>Title of Training:</label>
                                            <input id = "training_title1" name = "training_title1" class="form-control" placeholder="Title" value="">
                                        </div>
                                    </div>
                                    <div class = "col-lg-3">
                                    <div class="form-group">
                                            <label>Location:</label>
                                            <input id = "location1" name = "location1" class="form-control" placeholder="Location" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>Date Start:</label>
                                            <input id = "date_start1" type="date" name = "date_start1" class="form-control" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>Date End:</label>
                                            <input id = "date_finish1" type="date" name = "date_finish1" class="form-control" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>No. of Hours:</label>
                                            <input id = "no_of_hours1" type="number" name = "no_of_hours1" class="form-control" placeholder="Hours">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Sponsored by:</label>
                                            <input id = "" type="number" name = "" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <br><button type="reset" class="btn btn-outline btn-primary">Reset</button>
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


</div>
                    
</div>
</div>
</div>
</div>            
                    
    </div>
<div id="wrapper">
<?php include 'include/footer.php';?>
</div>
    
    <!--<script src = "../js/_add_personnel1.js"></script>-->
	<script  src="../myfunc/new/add_personnel.js"></script>
    <script  src="../js/index.js"></script>

</body>

</html>
