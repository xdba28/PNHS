$(document).ready( function(){
	$('.attempt_btn').on("click", function(e){
		var $modalAnimateTime = 300;
		var $msgAnimateTime = 150;
		var $msgShowTime = 2000;
		if($('.pass_input').val() != ""){
		var exam_no = $('.exam_no').val();
		$.ajax({
		method: "POST",
		url: "php/select_pass.php",
		data: {exam_no: exam_no},
		success: function(data) {
				var pass_input = $('.pass_input').val();
				if( pass_input == data){
					msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Password Correct");
					$(".attempt_exam").submit();
					
				} else {
					e.preventDefault();
					msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Password Error");
				}
			}
		});
		} else {
		}
	});
});
function exam_no(exam_no){
    $('.pass_input').val('');
    $('#login-modal').modal('show');
    $('.exam_no').val(exam_no);
};
$(function(){
    $('.modal-content').keypress(function(e){
        if(e.which == 13) {
            $(".attempt_btn").click();
        }
    })
});
function msgFade ($msgId, $msgText) {
		var $formLogin = $('#login-form');
		var $divForms = $('#div-forms');
		var $modalAnimateTime = 300;
		var $msgAnimateTime = 150;
		var $msgShowTime = 2000;
        $msgId.fadeOut($msgAnimateTime, function() {
            $(this).text($msgText).fadeIn($msgAnimateTime);
        });
}
    
function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
		var $formLogin = $('#login-form');
		var $divForms = $('#div-forms');
		var $modalAnimateTime = 300;
		var $msgAnimateTime = 150;
		var $msgShowTime = 2000;
        var $msgOld = $divTag.text();
        msgFade($textTag, $msgText);
        $divTag.addClass($divClass);
        $iconTag.removeClass("glyphicon-chevron-right");
        $iconTag.addClass($iconClass + " " + $divClass);
        setTimeout(function() {
            msgFade($textTag, $msgOld);
            $divTag.removeClass($divClass);
            $iconTag.addClass("glyphicon-chevron-right");
            $iconTag.removeClass($iconClass + " " + $divClass);
  		}, $msgShowTime);
    }



(function() {
  var DefaultAvatar;
  DefaultAvatar = (function() {
    function DefaultAvatar(name1, container) {
      this.name = name1;
      this.container = container;
      this.initials = this.getInitials(this.name);
      this.canvas = this.container;
      this.context = this.canvas.getContext('2d');
      this.canvasWidth = '45';
      this.canvasHeight = '45';
      this.color = this.defineColor();
      this.fontSize = this.canvasHeight * 0.4;
      this.font = this.fontSize + 'px Rubik';
      this.checkDevicePixelRatio();
      this.drawCanvas();
      this.drawText();
    }

    DefaultAvatar.prototype.checkDevicePixelRatio = function() {
      if (window.devicePixelRatio) {
        $(this.canvas).attr('width', this.canvasWidth * window.devicePixelRatio);
        $(this.canvas).attr('height', this.canvasHeight * window.devicePixelRatio);
        return this.context.scale(window.devicePixelRatio, window.devicePixelRatio);
      }
    };

    DefaultAvatar.prototype.defineColor = function() {
      var charIndex, colourIndex, colours;
      charIndex = this.initials.charCodeAt(0) - 65;
      colourIndex = charIndex % 26;
      colours = ["#F8B195", "#F67280", "#C06C84", "#6C5B7B", "#355C7D", "#99B898", "#FECEAB", "#FF847C", "#E844A5F", "#2A363B", "#594F4F", "#546980", "#45ADA8", "#E5FCC2", "#547980", "#45ADA8", "#9DE0AD", "#FE4365", "#83AF9B", "#CC527A", "#E8175D", "#A8A7A7", "#FF8C94", "#58d68d", "#d35400", "#884ea0"];
      return colours[colourIndex];
    };

    DefaultAvatar.prototype.getInitials = function(name) {
      var i, key, len, nameSplit, parsedInitials;
      nameSplit = name.split(' ');
      parsedInitials = [];
      for (i = 0, len = nameSplit.length; i < len; i++) {
        key = nameSplit[i];
        parsedInitials.push(key.charAt(0).toUpperCase());
      }
      return parsedInitials.slice(0, 2).join('');
    };

    DefaultAvatar.prototype.drawCanvas = function() {
      this.context.fillStyle = this.color;
      return this.context.fillRect(0, 0, this.canvas.width, this.canvas.height);
    };

    DefaultAvatar.prototype.drawText = function() {
      this.context.font = this.font;
      this.context.textAlign = 'center';
      this.context.fillStyle = '#FFF';
      return this.context.fillText(this.initials, this.canvasWidth / 2, this.canvasHeight / 2 + this.fontSize / 3);
    };

    DefaultAvatar.prototype.checkForAvatar = function() {
      if ($('canvas[js-avatar-missing]')) {
        return $('canvas[js-avatar-missing]').each((function(_this) {
          return function(index, element) {
            var avatar, username;
            username = $(element).attr('js-avatar-missing');
            var tmp = username.split(" ");
            username = tmp[0] + " " + tmp[tmp.length-1];
            return avatar = new DefaultAvatar(username, element);
          };
        })(this));
      }
    };

    return DefaultAvatar;

  })();

  DefaultAvatar.prototype.checkForAvatar();

}).call(this);