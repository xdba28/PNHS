<?php
function sanitise($str) {
		$str = @trim($str);
		$str = addslashes($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
		}


?>