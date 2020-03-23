
 function favButton(buttonName){
        buttonName.src="assets/Raqash Icon-favActivated.svg"
    
 }


 $(document).ready(function(){

        $("#viewArt").hide();
       
      
        $(".post").click(function(){   
          $("#commentsPost").hide();
          
           var bg = $(this).css("background-image");
           bg = bg.replace('url(','').replace(')','').replace(/\"/gi, "");
           $("#userPost").attr("src", bg);
             var pos = $(this).position();
             var width = $(this).outerWidth();
             var top = pos.top;
      
            
             $("#viewArt ").css("position","absolute");
             $("#viewArt ").css("top",top+"px");
             $("#viewArt ").css("left",25+"%");
      
             $("#commentsPost").css("position","absolute");
             $("#commentsPost ").css("top",pos.top+"px");
             $("#commentsPost").css("left",25+"%");
             $("#bg-model").show();
             $("#viewArt").show();
             
      
        });
      
        $(".close").click(function(){
               $("#viewArt").hide();
              $("#bg-model").hide();
              $("#commentsPost").hide();
      
      
        });
       
        //close the div when click any where out side the div
        $(document).mouseup(function(e){
          var container = $("#viewArt");
          var container2 = $("#commentsPost");
      
          // if the target of the click isn't the container nor a descendant of the container
          if (!container.is(e.target) && container.has(e.target).length === 0 && container2.has(e.target).length === 0)  {
              container.hide();
              $("#bg-model").hide();
              $("#commentsPost").hide();
          }
          
      });
      
   


      });
      
      