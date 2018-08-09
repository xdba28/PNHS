$(document).ready( function(){
	color_all();
	$('.sqr').click(function(){
		var no = $(this).text();
		var q_page = $('.question_per_page').val();
		var page = no/q_page;
		page = Math.ceil(page);
		$('.page').val(page);
		var i;
		var a = 0;
		var total = $('.page_total').val();
		var total_q = total * q_page;
		var limitx = (page-1)*q_page;
		var limity = page* q_page;
		color_all();
		for(i=1;i<=total_q;i++){
			if( i > limitx && i <= limity){
				$('.div'+i).show();
				$(".sqr"+i).css({
				"background":"red","color": "black"
				});
				a++;
			} else {
				$('.div'+i).hide();
			}
		}
		if(page == total){
			$('.next_page').prop("disabled",true);
			$('.prev_page').prop("disabled",false);
		} else {
			$('.next_page').prop("disabled",false);
		}
		if(page < total){
			$('.next_page').prop("disabled",false);
			$('.prev_page').prop("disabled",false);
		}
		if(page == 1 ){
			$('.prev_page').prop("disabled",true);
		}
		
	});
	var q_page = $('.question_per_page').val();
	function color_all(){
		var q_page = $('.question_per_page').val();
		var t;
		var sqr = $('.sqr').last().text();
		var earned;
		var points;
		var ans;
		var bg;
		for(t=1;t<=sqr;t++){
			earned = $('.div'+t).find('.earned').text();
			points = $('.div'+t).find('.points').text();
			ans = $('.div'+t).find('.ans').val();
			
				if(earned == points || earned != 0){
					bg = 'lawngreen';
					
				} else if(ans == ''){
					bg = 'white';
				} else{
						bg = '#ee82ee';
				}

			$(".sqr:contains("+t+")").css({"background":bg,"color": "black"});
			}
			var b;
			
	}
	
	
	window.scrollTo(0,0);
	var question_per_page = $('.question_per_page').val();
	var page = $('.page').val();
	var total = $('.page_total').val();
	var end = '';
	for(i=1; i <= question_per_page; i++ ){
		$('.div'+i).show();
		$(".sqr"+i).css({
				"background":"red","color": "black"
			});
	}
	
	$('.prev_page').prop("disabled",true);
	if(page == total){
		$('.next_page').prop("disabled",true);
	}
	$("li").click(function(){
		var ans = $(this).text();
		$(this).parent().siblings(".ans").val(ans);
	});
	
	//Next page button
	$('.next_page').click(function(){
		window.scrollTo(0, $(".reply-thread").offset().top);

		var page = $('.page').val();
		var q_page = $('.question_per_page').val();
		var sum = 1; 
		sum+=Number(page);
		$('.page').val(sum);
		page = $('.page').val();
		var i;
		
		var total = $('.page_total').val();
		var total_q = total * q_page;
		var limitx = (page-1)*q_page;
		var limity = page* q_page;
		var limitz = limitx - q_page;
		var k = 1;
		var a=0;
		color_all();

		for(i=1;i<=limity;i++){
			
			if( i > limitx && i <= limity){
				$('.div'+i).show();
				
				$(".sqr"+i).css({
				"background":"red","color": "black"
				});
				a++;
			} else {
				$('.div'+i).hide();
			}
		}
		page = $('.page').val();
		if(page == total){
			$('.next_page').prop("disabled",true);
		} else {
			$('.next_page').prop("disabled",false);
		}
		$('.prev_page').prop("disabled",false);
		
		
	});
	$('.back_page').click(function(){
        window.history.back();
    });
                         
	//Previous Page Button
	$('.prev_page').click(function(){
		window.scrollTo(0, $(".reply-thread").offset().top);
		var page = $('.page').val();

		var q_page = $('.question_per_page').val();
		var diff = 1; 
		page = page - diff;
		$('.page').val(page);
		var i;
		var total = $('.page_total').val();
		var total_q = total * q_page;
		var limitx = page*q_page;
		var limity = (page-1)* q_page;
		var limitz = limitx;
		limitz+=Number(q_page);
		var a=0;
		color_all();
		for(i=limitz;i>0;i--){
			
			if( i > limitx && i <= limitz){

				$('.div'+i).hide();
				
			} else {
				if(i <= limitx && i > limity){
				$('.div'+i).show();
				
				$(".sqr"+i).css({
				"background":"red","color": "black"
				});
				a++;
				}
				
			}
		}
		page = $('.page').val();
		if(page < total){
			$('.next_page').prop("disabled",false);
		}
		if(page == 1 ){
			$('.prev_page').prop("disabled",true);
		}
	});
	
});



/* Multiple Choice */
var Quiz = function(){
  var self = this;
  this.init = function(){
   
  }
  
}
var quiz = new Quiz();
quiz.init();

/* Fill in the blank */
function resizeInput() {
    $(this).attr('size', $(this).val().length);
}

$('input[type="text"]')
    .keyup(resizeInput)
    .each(resizeInput);


function pad(n) {
	return (n < 10 ? '0' : '') + n;
}