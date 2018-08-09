 
        <div class="col-lg-6">
                                    <div class="pic-holder" id = "picHolder1" style=""><center>
                                    <?php echo " <img id = 'image1' src='../myfunc/showimageprofile.php?id=".$_SESSION['pims_data']['emp_id']."' style='height: 257px; width: 242px;'> "; ?></center>
                                    </div>
                                    <div class="row show-grid">
                                            <div class="col-md-12" >
                                            <label id = "name1" >NAME:</label>&emsp;|&emsp;<label id = "spanpersonneltype" ></label>
                                            </div>
                                    </div><br>
                                    <p style="color: red;">Note: Fields with * are required.</p>

                    <form role="form" id = "form1" >
										<div class="form-group">
                                            <label>Change Profile Picture: </label>
											<input type="checkbox"  id = "profilepicturechange" name = "profilepicturechange" value = "profilepicturechange" />&nbsp Change Picture?<br />
											<div id = "divforuploadimage" style="display:none" >
											<label>UPLOAD</label>: <input type="file" id = "Picture1" name = "Picture1" accept="image/*" />
											<label>OR</label>
											<input type="checkbox"  id = "profilepicturereset" name = "profilepicturereset" value = "profilepicturereset" />&nbsp Reest to Default<br />
											</div>
                                        </div>
										
                                        <div class="form-group">
                                            <label><i style="color: red;">*</i>Sex:&emsp;</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="gender1" value="Male" selected> Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="gender1" value="Female"> Female
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label><i style="color: red;">*</i>Date of Birth:</label>
                                            <input type="date" class="form-control" id = "birthdate1" name = "birthdate1" value="1890-01-01">
                                        </div>
										
										<div class="form-group">
                                            <label><i style="color: red;">*</i>Place of Birth:</label>
                                            <input class="form-control" id = "birthplace1" name = "birthplace1" placeholder="Enter Birth Place" value="">
                                        </div>

                                        <div class="form-group">
                                            <label><i style="color: red;">*</i>Nationality:</label>
                                            <input class="form-control" id = "nationality1" name = "nationality1" placeholder="Enter Citizenship" value="">
                                        </div>

                                        <div class="form-group">
                                            <label><i style="color: red;">*</i>Civil Status:&emsp;</label>
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
										
                                        <div class="form-group">
                                            <label>Blood Type:</label>
                                            <input id = "bloodType1" name = "bloodType1" class="form-control" placeholder="Enter Blood Type" value="">
                                        </div>
										
                                        <div class="form-group">
                                            <label>GSIS ID No.:</label>
                                            <input id = "gsis1" name = "gsis1" class="form-control" placeholder="Enter No." value="">
                                        </div>
										
										<div class="form-group">
                                            <label>PAGIBIG ID:</label>
                                            <input id = "pagibig1" name = "pagibig1" class="form-control" placeholder="Enter No." value="">
                                        </div>
										
										<div class="form-group">
                                            <label>SSS No.:</label>
                                            <input id = "sss1" name = "sss1" class="form-control" placeholder="Enter No." value="">
                                        </div>
										
										<div class="form-group">
                                            <label>TIN No.:</label>
                                            <input id = "tin1" name = "tin1" class="form-control" placeholder="Enter No." value="">
                                        </div>
										
										<div class="form-group">
                                            <label>PHILHEALTH No.:</label>
                                            <input id = "philhealth1" name = "philhealth1" class="form-control" placeholder="Enter No." value="">
                                        </div>
										
                                        <div class="form-group">
                                            <label>Contact No.:</label>
                                            <input id = "contactNo1" name = "contactNo1" class="form-control" placeholder="Enter No." value="">
                                        </div>
										
										<div class="form-group">
                                            <label>Telephone No.:</label>
                                            <input id = "telephoneNo1" name = "telephoneNo1" class="form-control" placeholder="Enter No." value="">
                                        </div>
										
                                        <div class="form-group">
                                            <label>Email Address:</label>
                                            <input id = "emailAddress1" name = "emailAddress1" class="form-control" placeholder="Enter Email" value="">
                                        </div>
										
										<div class="form-group">
                                            <label>Religion:</label>
                                            <input id = "religion1" name = "religion1" class="form-control" placeholder="Enter Religion" value="">
                                        </div>
										
										<div class="form-group">
                                            <label><i style="color: red;">*</i>Height ( in meters ):</label>
                                            <input id = "height1" name = "height1" class="form-control" placeholder="Enter Height" type = "number" value="">
                                        </div>
										
										<div class="form-group">
                                            <label><i style="color: red;">*</i>Weight ( in kilograms ):</label>
                                            <input id = "weight1" name = "weight1" class="form-control" placeholder="Enter Weight" type = "number" value="">
                                        </div>
										
										<div class="form-group">
                                            <label>Dual Citizenship by Birth:</label>
                                            <input id = "dual_citznshp_by_birth1" name = "dual_citznshp_by_birth1" class="form-control" placeholder="Enter Dual Citizenship" value="">
                                        </div>
										
										<div class="form-group">
                                            <label>Dual Citizenship by Nationality:</label>
                                            <input id = "dual_citznshp_by_naturalization1" name = "dual_citznshp_by_naturalization1" class="form-control" placeholder="Enter Dual Citizenship" value="">
                                        </div>


            </div>

            <div class="col-lg-6">
                                        <div class="form-group">
                                                
                                                    <input type="checkbox"  id = "checkBoxSame1" name = "checkBoxSame1" value = "checkBoxSame1" > Check if Temporary Address is the same as Permanent Address
                                                
                                        </div>
                                        <div class="form-group" id = "tempAddressDiv1" >
                                            <label>Temporary Address</label><br>
                                            <label>Street:</label>
                                            <input class="form-control" id = "tempStreet1" name = "tempStreet1" value="">
                                            <label>House No.:</label>
                                            <input class="form-control" id = "tempHouseNo1" name = "tempHouseNo1" type = "number" value="0" >
											<label>Subdivision/Village:</label>
                                            <input class="form-control" id = "tempSubdivisionVillage1" name = "tempSubdivisionVillage1" value="">
                                            <label>Barangay:</label>
                                            <input class="form-control" id = "tempBarangay1" name = "tempBarangay1" value="">
                                            <label><i style="color: red;">*</i>City/Municipality:</label>
                                            <input class="form-control" id = "tempMunicipalityCity1" name = "tempMunicipalityCity1" value="" >
                                            <label>Province:</label>
                                            <input class="form-control" id = "tempProvince1" name = "tempProvince1" value="" >
                                            <label><i style="color: red;">*</i>ZIP Code:</label>
                                            <input class="form-control" type = "number" id = "tempZipCode1" name = "tempZipCode1" value="0">
                                        </div>

                                        <div class="form-group">
                                            <label>Permanent Address</label><br>
                                            <label>Street:</label>
                                            <input class="form-control" id = "permStreet1" name = "permStreet1" value="" >
                                            <label>House No.:</label>
                                            <input class="form-control" type = "number" id = "permHouseNo1" name = "permHouseNo1" value="0" >
											<label>Subdivision/Village:</label>
                                            <input class="form-control" id = "permSubdivisionVillage1" name = "permSubdivisionVillage1" value="">
                                            <label>Barangay:</label>
                                            <input class="form-control" id = "permBarangay1" name = "permBarangay1" value="" >
                                            <label><i style="color: red;">*</i>City/Municipality:</label>
                                            <input class="form-control" id = "permMunicipalityCity1" name = "permMunicipalityCity1" value="" >
                                            <label>Province:</label>
                                            <input class="form-control" id = "permProvince1" name = "permProvince1" value="" >
                                            <label><i style="color: red;">*</i>ZIP Code:</label>
                                            <input class="form-control" type = "number" id = "permZipCode1" name = "permZipCode1" value="0">
                                        </div>

                                        
                                        <?php echo ' <button id = "submitButton1" type="button"  class="btn btn-primary" onclick = "submitpersonalinfomation('.$_SESSION['pims_data']['emp_id'].')">Submit</button> '; ?>
                                        <button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                        
                
                    </form>
            </div>