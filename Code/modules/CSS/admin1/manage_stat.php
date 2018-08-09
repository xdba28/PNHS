<?php
include "db_conn.php";

if(!empty($_POST['syid'])){
	$syid = $_POST['syid'];
	$sy = mysqli_query($conn, "SELECT * FROM css_school_yr WHERE sy_id=$syid");

	foreach ($sy as $key) {
		$stat = $key['status'];
	}

	if($stat == "active"){
		$sql = mysqli_query($conn, "UPDATE css_school_yr SET status='inactive' WHERE sy_id=$syid");
	}
	else{
		$sql = mysqli_query($conn, "UPDATE css_school_yr SET status='inactive' WHERE status='active'");
		$sql = mysqli_query($conn, "UPDATE css_school_yr SET status='active' WHERE sy_id=$syid");
	}
}
                   
?>
<?php
            foreach($sy as $s_y){
          ?>
				      <table class="w3-table">
                  <tr>
                  	<form action="manage_rename.php" method="POST">
                    <td>
                      <input type="text" class="form-control" name="year" value="<?php echo $s_y['year']?>">
                    </td>
                    <td>
					<div class="col-md-6">
                      <select class="form-control col-md-3" onchange="stat(this.value)">
                        <?php 
                          if($s_y['status']=="active"){
                            echo '<option value="'.$s_y['sy_id'].'">active</option>
                                  <option value="'.$s_y['sy_id'].'">inactive</option>';
                          }
                          else{
                            echo '<option value="'.$s_y['sy_id'].'">inactive</option>
                                  <option value="'.$s_y['sy_id'].'">active</option>';
                          }
                        ?>
                      </select>
					</div> 
                      <button class="btn save" type="submit" name="btn" value="<?php echo $s_y['sy_id']?>">Update</button>
                      </form>
                      <a href="edit_sched.php?yr=<?php echo $s_y['sy_id']?>" class="btn save">Edit</a>
                      <button class="btn save" value="<?php echo $s_y['sy_id']?>" onclick="del_m(this.value)">Delete</button>
                    </td>
                  </tr>
                </table>
          <?php }
          echo ("<SCRIPT LANGUAGE='JavaScript'>
        location.reload();
        </SCRIPT>");?>