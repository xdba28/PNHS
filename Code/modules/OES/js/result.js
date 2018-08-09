var time = 1000;

$(function() {
  $('html').toggleClass('blur');
  $('.test-completion').show();
    var a = $( '.a' ).html();
    var b = $( '.b' ).html();

  function count($this, timeout, data){

        var current = parseInt($this.html(), 10);
        $this.html(++current);
        if(current !== $this.data(data)){
            setTimeout(function(){count($this, timeout, data)}, timeout);
        }
    }

 $(".score .a").each(function() {
	 
   var start = parseInt($(this).html(), 10);
   if(start == 0){
	    $(this).html(0);
   } else {
   $(this).data('correct', start);
   $(this).html(0);
   count($(this), time/start, 'correct');
   }
  });

  $(".score .b").each(function() {
    var start = parseInt($(this).html(), 10);
    $(this).data('max', start);
    $(this).html(0);
    count($(this), time/start, 'max');
  });

  $(".score .percent").each(function() {
	var start = Math.round(a/b * 100);
	if(start == 0){
		$(this).html(0);
		
	}else {
    console.log(start);
    $(this).data('percent', start);
    $(this).html(0);
    count($(this), time/start, 'percent');
	}
  });
});