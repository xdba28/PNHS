<?php
	
	mysql_connect("localhost", "root", "");
	mysql_select_db("mydb");
	
	$sql = "SELECT * FROM signup";
	$rec = mysql_query($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Accounts</title>
</head>

<body>

<div class="col-sm-6 col-md-6 col-lg-8" style="background-color:#2000c8;height:60px;" >
        <ol class="breadcrumb" id="menu">
            
            </li> 
        </ol>
    </div>
<p align="center">

	<img src="xampp\htdocs" id="logo"/>
<p align="center">
		
		
		<p align="center">
	<form method="POST" action="process2.php">
  		<h1 align="center"><font face="Century Gothic"><strong>SUPPLY</strong></font></h1>
		
		<h4 align="center"><font face="Georgia"><label></label>
    		
 		<h4 align="center">
		
  		<p align="center"><label>Supply<br/></label> 
  			<input type="text" name="supply" id="supply" />
  		</p>  
    	<p align="center"><label>Quantity<br/></label> 
    		<input type="text" name="quantity" id="quantity" />  
  		</p>
  		
		<p align="center"><label>Description<br/></label> 
    		<input type="text" name="quantity" id="quantity" />  
  		</p>
		
  		<input type="submit" name="btn2" id="btn2" value="Add" />
			<input type="submit" name="btn2" id="btn2" value="Update" />
			<input type="submit" name="btn2" id="btn2" value="Delete" />
	</form>
</p>




</table>
</body>
</html>
