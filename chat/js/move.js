$(function(){
    var mouseX = 0, limitX = 80; 
    $(window).mousemove(function(e){
        var offset = $('.move-wrap').offset();
        mouseX = Math.min(e.pageX - offset.left, limitX);

        if (mouseX < 0) mouseX = -70; 
});
 
    var follower = $("#follower");
    var xp = 0;
    var loop = setInterval(function(){         
        xp += (mouseX - xp) / 50;
        follower.css({left:xp});
         
    }, 20);
});