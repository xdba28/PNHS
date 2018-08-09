<html>
<?php
include("../../connection.php");

if(!empty($_POST["status"]))
{	$status = $_POST["status"];
	
	
	 if($status == 'Single')
	 {
	
		?>
	<form method="post" action="functions/single.php">
	<input hidden name="single" value="Single"/>
	<br>	
	<tr>
	<td>Tax Reg. Status: </td>
	<td>
		<select name="reg" class="form-control">
			<option value="Registered"> Registered</option>
			<option value="Not Registered" >Not Registered</option>
		</select>
	</td>
	</tr>
	
	<td>
	<div style="float:left; margin-right: 2;"><font color="#F44336" size="1" >*If Registered With Dependent(s)</font></div>
	<font>No. Of Dependent(s):</font>
	</td>
						<td>
									<div class="form-group">
                                            
                                            <label class="radio-inline">
                                                <input type="radio" name="dep" id="optionsRadiosInline1" value="0" checked>0
                                            </label>
											 <label class="radio-inline">
                                                <input type="radio" name="dep" id="optionsRadiosInline1" value="1" >1
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="dep" id="optionsRadiosInline2" value="2">2
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="dep" id="optionsRadiosInline3" value="3">3
                                            </label>
											<label class="radio-inline">
                                                <input type="radio" name="dep" id="optionsRadiosInline3" value="4">4
                                            </label>
                                        </div>
						</td>
	</tr>
	
									<tr>
							<td>
								&nbsp;
							</td>
								<td>
							<button type="submit" name="submitsingle" class="btn btn-success btn-lg">Submit</button>
								</td>
									</tr>
						<td>
						</td>
						
	
	</form>
	<?php
	 } elseif($status=='Married')
	 {
	?>
		
			<form method="post" action="functions/married.php">
	<br>
					<input hidden name="married" value="2"/>
						<tr>
					<td>Tax Reg. Status: </td>
				<td>
					<select name="reg" class="form-control">
						<option>Select</option>
						<option value="Registered">Registered</option>
						<option value="Not Registered">Not Registered</option>
					</select>
				</td>
						</tr>
						<tr>
					<td>
						<font>Spouse Name:</font>
					</td>
					<td>
						<input name="spouse" placeholder="Input Name" class="form-control">
					</td>
						</tr>
						
						<tr>
					<td>
						<font>Career Status</font>
					</td>
					<td>
						<select  name="career" class="form-control">
							<option value="Employed">Employed</option>
							<option value="Unemployed">Unemployed</option>
						</select>
					</td>
						</tr>
						
						<tr>
					<td>
						<font>*Spouse is engaged in a business?</font>
					</td>
					<td>
						<div class="form-group">
                           <label class="radio-inline">
                                <input type="radio" name="q1" id="optionsRadiosInline1" value="Yes">Yes
                            </label> &nbsp;
						<font>or</font> &nbsp;
							<label class="radio-inline">
								<input type="radio" name="q1" id="optionsRadiosInline1" value="No" checked>No
                           </label>
						</div>
					</td>
						</tr>
						
						
						<tr>
					<td>
						<font>*Spouse is non-resident cirizen recieving income from a foreign sources?</font>
					</td>
					<td>
						<div class="form-group">
                           <label class="radio-inline">
                                <input type="radio" name="q2" id="optionsRadiosInline1" value="Yes" >Yes
                            </label> &nbsp;
						<font>or</font> &nbsp;
							<label class="radio-inline">
								<input type="radio" name="q2" id="optionsRadiosInline1" value="No" checked>No
                           </label>
						</div>
					</td>
						</tr>
						
						<tr>
							<td>
							<font>No. of dependent(s): </font>
							</td>
							<td>
						<div class="form-group">
                           <label class="radio-inline">
                                <input type="radio" name="dependent" id="optionsRadiosInline1" value="0" checked>0
                            </label>
						   <label class="radio-inline">
                                <input type="radio" name="dependent" id="optionsRadiosInline1" value="1">1
                            </label>
						
							<label class="radio-inline">
								<input type="radio" name="dependent" id="optionsRadiosInline1" value="2" >2
                           </label>
						   
                           <label class="radio-inline">
                                <input type="radio" name="dependent" id="optionsRadiosInline1" value="3">3
                            </label>
						
							<label class="radio-inline">
								<input type="radio" name="dependent" id="optionsRadiosInline1" value="4" >4
                           </label>
						</div>
					</td>
						</tr>
						
						<tr>
							<td>
								&nbsp;&nbsp;&nbsp;
							</td>
							<td>
						<button type="submit" name="submitmarried" class="btn btn-success btn-lg">Submit</button>
							</td>
						</tr>
		
						</form>
						
	 <?php } elseif($status == 'Widowed'){
		 ?>
		

					<form method="post" action="functions/widowed.php">
	<input hidden name="widowed" value="3"/>
	<br>	
	<tr>
	<td>Tax Reg. Status: </td>
	<td>
		<select name="reg" class="form-control">
			<option value="Registered"> Registered</option>
			<option value="Not Registered" >Not Registered</option>
		</select>
	</td>
	</tr>
	
	<td>
	<div style="float:left; margin-right: 2;"><font color="#F44336" size="1" >*If Registered With Dependent(s)</font></div>
	<font>No. Of Dependent:</font>
	</td>
						<td>
									<div class="form-group">
                                            
                                            <label class="radio-inline">
                                                <input type="radio" name="dep" id="optionsRadiosInline1" value="0" checked>0
                                            </label>
											 <label class="radio-inline">
                                                <input type="radio" name="dep" id="optionsRadiosInline1" value="1" >1
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="dep" id="optionsRadiosInline2" value="2">2
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="dep" id="optionsRadiosInline3" value="3">3
                                            </label>
											<label class="radio-inline">
                                                <input type="radio" name="dep" id="optionsRadiosInline3" value="4">4
                                            </label>
                                        </div>
						</td>
	</tr>
	
									<tr>
							<td>
								&nbsp;
							</td>
								<td>
							<button type="submit" name="submitwidowed" class="btn btn-success btn-lg">Submit</button>
								</td>
									</tr>
		
	
	
						<td>
						</td>
						<!--td>
						<button type="submit" name="singlesubmit" class="btn btn-success btn-lg">Submit</button>
						</td-->
	
	</form>
	 
	 
	 <?php } 
}

?>
</html>