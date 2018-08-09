<?php
if(isset($_POST['btn'])){
	$name=$_POST['name'];
	
	echo $name;
}
	
 ?>
 <form method="post">
 <input type="text" name="name" />
 <button name="btn" value="btn">Send</button>
</form>
