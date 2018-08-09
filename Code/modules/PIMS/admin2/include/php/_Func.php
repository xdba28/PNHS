<?php
	function dateFormat($date) {
		$str = explode("-", $date);
		$cyear = $str[0];
		$cmonth = '';
		$cdate = $str[2];
		switch($str[1]) {
			case '01': $cmonth = "January"; break;
			case '02': $cmonth = "February"; break;
			case '03': $cmonth = "March"; break;
			case '04': $cmonth = "April"; break;
			case '05': $cmonth = "May"; break;
			case '06': $cmonth = "June"; break;
			case '07': $cmonth = "July"; break;
			case '08': $cmonth = "August"; break;
			case '09': $cmonth = "September"; break;
			case '10': $cmonth = "October"; break;
			case '11': $cmonth = "November"; break;
			case '12': $cmonth = "December"; break;
		}
		$out = $cmonth." ".$cdate;
		if($cyear == date('y')){
			return $out;
		}
		else {
			return $out .= " ".$cyear;
		}
	}

	
?>