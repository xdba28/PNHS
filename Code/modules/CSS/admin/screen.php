<?php 
if (isset($_POST['recordSize'])) {
	$height = $_POST['height'];
	$width = $_POST['width'];
	$_SESSION['screen_height'] = $height;
	$_SESSION['screen_width'] = $width;
}
?>

<script>
	$(document).ready(function() {
		var height = $(window).height()
		var width = $(window).width();
		$.ajax({
			url: "index.php",
			type: "post",
			data: { "width" : width, "height" : height, "recordSize" : "true" },
			success: function(response) {
				$("body").html(response);
			}
		});	
	});
</script>