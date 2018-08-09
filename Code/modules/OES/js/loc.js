$(document).ready(function(){
	if(window.location.href.indexOf("tab") > -1){
        var tab_id = window.location.toString().split("=");
        if ($("#tab" + tab_id[tab_id.length - 1]).length > 0){
            document.getElementById("tab" + tab_id[tab_id.length - 1]).checked = true;
        }
        else{
            window.history.back();
        }
	}
});