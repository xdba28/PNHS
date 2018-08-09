<form action="update.php" method="post">
<input type="hidden" name="id" value="<?php echo $row['ris_no'];?>">	
<td><input class="btn btn-primary" <?php if ($row['req_status']=='Approved' || $row['req_status']=='Denied'){ ?> Disabled <?php }?> type="submit" name="update" value="Edit">
</td>
</form>