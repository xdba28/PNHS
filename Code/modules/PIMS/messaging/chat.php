<?php
    session_start();
	include("../myfunc/session1.php");
?>

<html>
<meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<meta HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<head>
	<script src="../vendor/jquery/jquery.min.js"></script>
	<link href="include/font-awesome.min.css" rel="stylesheet" type="text/css" >
	<link href="include/css2.css" rel="stylesheet" type="text/css" >
	<link href="include/css1.css" rel="stylesheet" type="text/css" >
</head>
<body>
	<div class="menu">
		<div class="back"><img id = "image1" src="" draggable="false" /></div>
		<div class="name" id = "name1"></div>
		
	</div>
	
	<ol class="chat" id = "chatappend">
		
	</ol>
	<?php echo '<form id = "form1"><input class="textarea" type="text" placeholder="Type here" onkeypress="return runScript(event)"  id = "textAreaMessage" name = "textAreaMessage" ></form><input type="button" class="send" value="" onclick = "sendMessage('.$_GET['id'].','.$_SESSION['pims_data']['cms_id'].')" /> '; ?>

</body>
	<script>
		window.scrollTo(0,document.body.scrollHeight);
		var lastmessage = 0;
		var updating = 0;
		var sending = 0;
		var formURL1 = "";
		
		function initialUpdate(id,name){
			$('#image1').attr({ 'src':'../myfunc/showimageprofileidmode.php?id='+id });
			$('#name1').html(name);
		}
		
		function newMessageSelf(id,id2,msg,time){
			if ( $('#avatar'+id).length == 0 ){
				$('#chatappend').append($('<li></li>').attr({ 'class':'self' , 'id':'self'+id }));
				
				$('#self'+id).append($('<div></div>').attr({ 'class':'avatar' , 'id':'avatar'+id }));
				$('#avatar'+id ).append($('<img />').attr({ 'src':'../myfunc/showimageprofileidmode.php?id='+id2 , 'draggable':'false' }));
				
				$('#self'+id).append($('<div></div>').attr({ 'class':'msg' , 'id':'msg'+id }));
				$('#msg'+id ).append($('<p>'+msg+'</p>'));
				$('#msg'+id ).append($('<time>'+time+'</time>'));
				window.scrollTo(0,document.body.scrollHeight);
			}
		}
		
		function newMessageOther(id,id2,msg,time){
			if ( $('#avatar'+id).length == 0 ){
				$('#chatappend').append($('<li></li>').attr({ 'class':'other' , 'id':'other'+id }));
				
				$('#other'+id).append($('<div></div>').attr({ 'class':'avatar' , 'id':'avatar'+id }));
				$('#avatar'+id ).append($('<img />').attr({ 'src':'../myfunc/showimageprofileidmode.php?id='+id2 , 'draggable':'false' }));
				
				$('#other'+id).append($('<div></div>').attr({ 'class':'msg' , 'id':'msg'+id }));
				$('#msg'+id ).append($('<p>'+msg+'</p>'));
				$('#msg'+id ).append($('<time>'+time+'</time>'));
				window.scrollTo(0,document.body.scrollHeight);
			}
		}
		
		function newDayDiv(text){
			$('#chatappend').append($('<div>' + text + '</div>').attr({ 'class':'day' }));
		}
		
		$("#form1").submit(function(e){
				var formObj1 = $(this);
		    	var formData1 = new FormData(this);
		   		$.ajax({
		     		url: formURL1,
					type: 'POST',
		        	data:  formData1,
		    		mimeType:"multipart/form-data",
		    		contentType: false,
		        	cache: false,
		        	processData:false,
		    		success: function(data, textStatus, jqXHR)
		    			{	
		 					sending = 0;
		    			}   
		    	});
		    	e.preventDefault(); //Prevent Default action. 
		}); 
		
		function sendMessage(f,s){
			if ( sending == 0 ){
				sending = 1;
				formURL1 = "myfunc/send.php?f=" + f + "&s=" + s;
				if ( $('#textAreaMessage').val() != "" ){
					$("#form1").submit();
					$('#textAreaMessage').val("");
					formURL1 = "";
				}
			}
		}
		
		function updateChat(idmyTimer){
			$.ajax({
	     					url: "myfunc/update3.php?f=" + idmyTimer + "&lm=" + lastmessage,
	    					contentType: false,
	        				cache: false,
	        				processData:false,
	    					success: function(data, textStatus, jqXHR)
	    						{	
	 								eval(data);
									updating = 0;
									setTimeout(myTimer, 10);
	    						}         
	    	});
		}
		
		function updatelastMessage(num){
			lastmessage = num;
		}
		
		function seenMessage(id){
			$.ajax({
	     					url: "myfunc/update4.php?id="+id,
	    					contentType: false,
	        				cache: false,
	        				processData:false     
	    	});
		}
		
	</script>
	<?php
		include("myfunc/update1.php");
		
		echo '
		<script>
		function myTimer() {
					var idmyTimer = '.$_GET['id'].';
					$.ajax({
		     					url: "myfunc/update2.php?f=" + idmyTimer ,
		    					contentType: false,
		        				cache: false,
		        				processData:false,
		    					success: function(data, textStatus, jqXHR)
		    						{	
		 								if ( data != lastmessage && updating == 0 ){
											updating = 1;
											updateChat(idmyTimer);
										}
										else if ( updating == 0 ){
											setTimeout(myTimer, 10);
										}
		    						},
		    					error: function(jqXHR, textStatus, errorThrown) 
		    						{	
										resetAlertify();
										alertify.error(jqXHR);
		     						}     
		    		});
		}
		
		function runScript(e) {
			if (e.keyCode == 13) {
				e.preventDefault();
				sendMessage('.$_GET['id'].','.$_SESSION['pims_data']['cms_id'].');
			}
		}
		myTimer();
		</script>
		';
		
	?>
</html>