$(document).ready(function(){
   
    $(window).scroll(function(){
        var scroll= $(window).scrollTop();
        var duration = 500;
        if(scroll>250){
            $(".to-top").fadeIn(duration);
        }else{
            $(".to-top").fadeOut(duration);
        }
    });  

    $(".to-top").click(function(){
            $('body,html').animate({scrollTop: 0}, 700);
    });

   
});


$(document).ready(function(){
   
    $(window).scroll(function(){
        var scroll= $(window).scrollTop();
        var duration = 500;
        if(scroll>200){
            $("#for-sticky").css("position","fixed");
            $("#for-sticky").css("z-index","2");
            $("#for-sticky").css("top","0");
            $("#for-sticky").css("z-index","999");
            $("#for-sticky").fadeIn(duration);
            $("#for-sticky").css("box-shadow","0 2px 5px rgb(0,0,0,.5)");
            $(".nav-links").css("top","13vh");
          

        }else{
            $("#for-sticky").css("position","relative");
            $(".nav-links").css("top","31vh");
        }
    });
    
    
    


    $(".to-top").click(function(){
            $('body,html').animate({scrollTop: 0}, 700);
    });

   
});

  

$(document).ready(function () {
    var location = window.location.href;
    $('.nav-links li a').each(function(){              
        if(location.indexOf(this.href)>-1) {
          
           $(this).parent().addClass('active');
        }else{
            $(this).parent().removeClass('active');
        }
    });
});





$(window).on('load',function(){
    $(".overlay").addClass("complete");
    $(".spinner").addClass("com");
  });
