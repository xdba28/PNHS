
$(document).ready( function(){
	color_all();
	$('.sqr').click(function(){
		var no = $(this).text();
		if(no != 0){
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
		var r;
		var answer;
		
		for(t=1;t<=sqr;t++){
			var qty = $('.div'+t).find('.qtype').val();
			ans = $('.div'+t).find('.ans').val();
			
				if(qty == 'Enumeration'){
					var len = $('.div'+t).find('.ans').length;
					var white = 0;
					for(r = 1; r <= len; r++){
						var answer = $('.div'+t).find('.answer'+t+r).val();
						if(answer != ''){
							--white;
						} else {
							white++;
						}
						
					}
					if(white == -len){
						bg = 'lawngreen';
					} else {
						bg = 'white';
					}
				} else {
					if(ans.length > 0){
						bg = 'lawngreen';
						
					} else if(ans == ''){
						bg = 'white';
					} else{
							bg = '#ee82ee';
					}
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
	
	
	$(document).on('click', '.exam_submit_ans', function(e) {
			swal({
          title: "You have remaining time left!",
          text: "Are you sure you want to submit all your answers?",
          icon: "warning",
          buttons: [
            'Cancel',
            'Continue'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {
              $('.form_exam').submit();              
          } else {
              e.preventDefault();
          }
        });
		});
	
	


/* Multiple Choice */
var Quiz = function(){
  var self = this;
  this.init = function(){
    self._bindEvents();
  }
  
  this._pickAnswer = function($answer, $answers){
    $answers.find('.quiz-answer').removeClass('active');
    $answer.addClass('active');
  }
  this._bindEvents = function(){
    $('.quiz-answer').on('click', function(){
      var $this = $(this),
          $answers = $this.closest('ul[data-quiz-question]');
      self._pickAnswer($this, $answers);
    });
  }
}
var quiz = new Quiz();
quiz.init();



/* Timer */

var minutes = $( '#set-time' ).val();

var target_date = new Date().getTime() + ((minutes * 60 ) * 1000); // set the countdown date
var time_limit = ((minutes * 60 ) * 1000);
//set actual timer
setTimeout(
  function() 
  {
	swal( 'TIME FINISHED. Your answers are being recorded!' );
	$('.form_exam').submit();
  }, time_limit );

var days, hours, minutes, seconds; // variables for time units

var countdown = document.getElementById("tiles"); // get tag element

getCountdown();

setInterval(function () { getCountdown(); }, 1000);

function getCountdown(){

	// find the amount of "seconds" between now and target
	var current_date = new Date().getTime();
	var seconds_left = (target_date - current_date) / 1000;
  
if ( seconds_left >= 0 ) {
  console.log(time_limit);
   if ( (seconds_left * 1000 ) < ( time_limit / 2 ) )  {
     $( '#tiles' ).removeClass('color-full');
     $( '#tiles' ).addClass('color-half');

		} 
    if ( (seconds_left * 1000 ) < ( time_limit / 4 ) )  {
    	$( '#tiles' ).removeClass('color-half');
    	$( '#tiles' ).addClass('color-empty');
    }
  
	days = pad( parseInt(seconds_left / 86400) );
	seconds_left = seconds_left % 86400;
		 
	hours = pad( parseInt(seconds_left / 3600) );
	seconds_left = seconds_left % 3600;
		  
	minutes = pad( parseInt(seconds_left / 60) );
	seconds = pad( parseInt( seconds_left % 60 ) );

	// format countdown string + set tag value
	countdown.innerHTML = "<span>" + hours + ":</span><span>" + minutes + ":</span><span>" + seconds + "</span>";  
}
}

function pad(n) {
	return (n < 10 ? '0' : '') + n;
}
});