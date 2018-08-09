<?php
	if($_SERVER['REQUEST_URI'] == "/PNHSLEA2/LEA/footer.php") {
		header('HTTP/1.0 403 Forbidden');
	}
	else {
		echo '<footer class="w3-theme-bd5">
				<div class="container">
					<div class="col-lg-4 col-md-4">
						<h3 class="h3">PNHS</h3>
						<h6>All Rights Reserved &copy; 2018</h6>
					</div>
					<div class="col-lg-4 col-md-4">
					   <h1 class="h3">ADDRESS</h1>
					   <h6>';
									$cont_query = "SELECT * FROM `cms_site_content` WHERE `cms_content_label` = 'address';";
									$get_cont = $mysqli->query($cont_query);
									while($cont = $get_cont->fetch_assoc()) {
										echo $cont['cms_content_desc'];
									}
					   echo '</h6>
					</div>
					<div class="col-lg-4 col-md-4">
					   <h3 class="h3">CONTACT US</h3>
					   <h6>';
									$cont_query = "SELECT * FROM `cms_site_content` WHERE `cms_content_label` = 'contacts';";
									$get_cont = $mysqli->query($cont_query);
									while($cont = $get_cont->fetch_assoc()) {
										echo $cont['cms_content_desc'];
									}
					   echo '</h6>
					</div>
			 	</div>
			</footer>';
	}
?>