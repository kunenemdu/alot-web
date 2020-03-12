// the men ul li drop-down


// sticky header and top button fade


$(function(){
    $(window).scroll(function(){
        // fade
        var wind=$(window);
        var Toptop=$(".To-top")
       if(wind.scrollTop()>400){
           Toptop.fadeIn();
       }
       else{
           Toptop.fadeOut();
       }
    //    sticky
       var ht=$(".headtop");
       var ser=$(".search");
       var hb=$(".headbottom");
       hb.css({"top":"0","position":"sticky"});
      ser.css({"z-index":-1000});
     
    });
});
// mouseup for to-top this prevents the mouse top
// button form appearing on loading and the drop-down for men and women

$(function(){
    if($(document).ready()) {
        $(".To-top").fadeOut();
        $(".dropmen").css({"display":"none"});
        $(".dropwomen").css({"display":"none"});
    }
    else{
        $(".To-top").fadeIn(100);
        $(".dropmen").fadeIn();
    }
})



// on little attempt to scroll top show  me the whole header.
// chek this again its  not working




// The drop down menu for men

$(function(){
    var men=$(".men");
    var women=$(".women");
    var dropmen=$(".dropmen");
    var dropwomen=$(".dropwomen");
    men.mouseover(function(){
        dropmen.fadeIn(500);
        dropmen.css({"z-index":"1000"});
    })
    men.mouseleave(function(){
        dropmen.fadeOut();
    });

    women.mouseover(function(){
        dropwomen.fadeIn(500);
        dropwomen.css({"z-index":"1000"});
    })
    women.mouseleave(function(){
        dropwomen.fadeOut();
    });

})

//scroll body back to the top
$(function(){
    $(".To-top").click(function()
    {
       $("html,body").animate({scrollTop:0},1000);
     
    });
});

// displaying the login and sign up pages
$(function(){
    $(".register").click(function(){
        $(".losi").css({"z-index":1000});
        $("#search").fadeOut("slow");
        $(".search").css("z-idex:-100");
        $(".slider").css("z-idex:-100");
        $("#sbt").fadeOut("slow");
        $(".losi").slideDown("fast",function(){
          
      });
 });
 // hiding the logim/signup page
 $(".losi").mouseleave(function(){
    $("#search").fadeIn("slow");
    $(".losi").slideUp("fast",function(){
        $("#sbt").fadeIn("slow");
  });
  $(".headbottom").slideDown("fast");
});
});

//expanding the news letter region 
$(function(){
    $("#email").click(function(){
        $(".email").animate({"height":"150px"});
        $(".subm").slideDown("slow");
    })

    $(".subm").click(function(){
        $(".email").animate({"height":"80px"});
        $(".subm").fadeOut("slow");
    })
})
$(function(){
    $(".subm").click(function(){
        confirm("By clicking okay you agree to receive news, click cancel to opt else");
    });
});




// The increament javascript slider.

var sw1=$("#sw1");
var sw2=$("#sw2");
var sw3=$("#sw3");
var sw4=$("#sw4");
var sota=$("#sota")
var sota2=$("#sota2");
var sota3=$("#sota3");
var sota4=$("#sota4");
var swipe=$(".swipe")
var swipes=$(".swipes");
var slider=$(".slider");
var i=0;


// // main slider function....

 var again= $(function(){
    $(".slider").click(function(){
    setTimeout(function(){ 
    sw1.css({"height":"70vh"})
    sw1.fadeIn(1500)
    sota.slideDown(1500);
    sota.animate({"paddingLeft":"200px"})
    sota.animate({"paddingTop":"30px"})
    sota.animate({"paddingLeft":"300px"})   
     
 },1100),

 setTimeout(function(){ 
    sw2.css({"height":"70vh"})
    sw2.css({"width":"100vw"})
    sw2.fadeIn(1500)
    sota2.slideDown(1000);
    sota2.animate({"paddingLeft":"200px"})
    sota2.animate({"paddingTop":"30px"})
    sota2.animate({"paddingLeft":"300px"})
 
 }, 6000),

 setTimeout(function(){ 
    sw3.css({"height":"70vh"})
    sw3.css({"width":"100vw"})
    sw3.fadeIn(1500)
    sota3.slideDown(1000);
    sota3.animate({"paddingLeft":"100px"})
    sota3.animate({"paddingTop":"20px"})
    sota3.animate({"paddingLeft":"170px"})

 }, 12000),

    setTimeout(function(){ 
    sw4.css({"height":"70vh"})
    sw4.css({"width":"100vw"})
    sw4.fadeIn(1000)
    sota4.slideDown(1000);
    sota4.animate({"paddingLeft":"100px"})
    sota4.animate({"paddingTop":"20px"})
    sota4.animate({"paddingLeft":"170px"})
  
 }, 18000)

    })
})


// ONCLICK EVENT slider

$(function(){
    $(".dbl").click(function(){
    $(".play").css("opacity:-10");
      sw4.css({"heigth":"70vh"});
      sw4.slideUp(1000);
      sw3.slideUp(1000);
      sw2.slideUp(1000);
      sw1.slideUp(1000);
      sota.slideUp(1000);
      sota2.slideUp(1000);
      sota3.slideUp(1000);
      sota4.slideUp(1000);

      $(function(){
            again
      })

    // alternatively you can hide  all swipe events at once then on click
    // a button on slider main page the slider starts again

    });
});


// The unload event


$(function(){
    $(window).scroll(function(){
        if(window.scrollTop()>500){
            var hb=$(".headbottom");
            hb.fadeOut(1000);  
    }
    else{
        alert("check the function format");
    }
    })

});







    

















 




















     









