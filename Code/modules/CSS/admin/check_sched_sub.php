<?php
if($sub==50005||$sub==50009||$sub==50012||$sub==50011){          
	if($sub==50012){
		$query_sub = mysqli_query($conn, "SELECT emp_rec_id FROM css_school_yr, css_schedule
										WHERE css_schedule.sy_id=css_schedule.sy_id
										AND subject_id=50006 AND SECTION_ID=$sec AND status='used'");
		if(mysqli_num_rows($query_sub)==0){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Sorry, there is no English subject scheduled in this section. Schedule a English subject first to proceed.')
                    window.location.href='index.php';
                    </SCRIPT>");
                    die();
		}
		else{
			$ss = mysqli_fetch_row($query_sub);
			$teach = $ss[0];
		}
	}
	else if($sub==50005){
		$query_sub = mysqli_query($conn, "SELECT emp_rec_id FROM css_school_yr, css_schedule
										WHERE css_schedule.sy_id=css_schedule.sy_id
										AND subject_id=50007 AND SECTION_ID=$sec AND status='used'");
		if(mysqli_num_rows($query_sub)==0){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Sorry, there is no Science subject scheduled in this section. Schedule a Science subject first to proceed.')
                    window.location.href='index.php';
                    </SCRIPT>");
                    die();
		}
		else{
			$ss = mysqli_fetch_row($query_sub);
			$teach = $ss[0];
		}
	}
	else if($sub==50009){
		$query_sub = mysqli_query($conn, "SELECT emp_rec_id FROM css_school_yr, css_schedule
										WHERE css_schedule.sy_id=css_schedule.sy_id
										AND subject_id=50013 AND SECTION_ID=$sec AND status='used'");
		if(mysqli_num_rows($query_sub)==0){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Sorry, there is no Math subject scheduled in this section. Schedule a Math subject first to proceed.')
                    window.location.href='index.php';
                    </SCRIPT>");
                    die();
		}
		else{
			$ss = mysqli_fetch_row($query_sub);
			$teach = $ss[0];
		}
	}
	else if($sub==50011){
                $teach="";
    }
    else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error: No teacher is selected.')
            window.location.href='index.php';
            </SCRIPT>");
            die();
    }
}
else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error: No teacher is selected.')
            window.location.href='index.php';
            </SCRIPT>");
            die();
}
?>