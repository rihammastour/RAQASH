
var x =false;
function start(){

  var currentDate = new Date();
  document.getElementById("imagedate").innerHTML=currentDate.getDate()+"-"+currentDate.getMonth()+"-"+currentDate.getFullYear();

}
function trigger(){
  document.querySelector("#postArt").click();
}
function triggerProfileimage(){
  
  document.querySelector("#displayprofileimage").click()  ; 
  
  
}
function triggerImage(){
  
  document.querySelector("#disModifiedImage").click()  ; 
  
}
function displymodeimage(e){ 
  if (e.files[0]){
    var reader2 = new FileReader();
     
    reader2.onload = function(e){
    document.querySelector('#imageUpdated').setAttribute('src',e.target.result);

  }
    reader2.readAsDataURL(e.files[0]); 
   
 }
}


function displayArt(e){ 
  if (e.files[0]){
    var reader = new FileReader();
     
    reader.onload = function(e){
    document.querySelector('#artdisplay').setAttribute('src',e.target.result);

  }
    reader.readAsDataURL(e.files[0]); 
   
 }
}


function displyprofileimage(e){
 
  if (e.files[0]){
    var reader = new FileReader();
     
    reader.onload = function(e){
    document.querySelector('#Artist-image').setAttribute('src',e.target.result);
   
  }
   reader.readAsDataURL(e.files[0])
  
   document.querySelector("#profileImage1").click();
  
 }

    
}

 function reset(){
  document.querySelector("#updateProfile").reset();
  
 }

        $(document).ready(function(){
          $(".editbio,.editemail,.editname,.edittwitter,#Save,#cancel,h6,.contactinfo").hide();
     
       
       
       
          $("#edit").click(function(){
            $("p,h3,h5").hide();
            // $("h3").hide();
            $(".editbio,.editemail,.editname,.edittwitter,#save,#cancel,h6").show();
  
            $(this).hide();
        


          });
          $("#cancel,#Save").click(function(){
            $("p,h3").show();
        
            $(".text,#cancel,#Save,.editbio,.editemail,.editname,.contactinfo,.edittwitter").hide();
        
            $("#edit").show();
      
        


          });
        
          $("#post").click(function(){
            $("#addCard,#bg-model").hide();
            $(".bio,.Artist-image").show();
           
          });
          $(".modifiedart").click(function(){
            $(".manage-artwork,#bg-model").hide();
            
           
          });
     
          $('#close1').click(function (){
         
            $('#bg-model,#addCard').hide();
            });
            $('#close2').click(function (){
         
              $('#bg-model,.manage-artwork').hide();
              });

          $(".add").click(function(){
            $("#addCard").show();
            $("#bg-model").show();
            // $(".bio,.Artist-image").hide();
            


          });
          $(".add-srt").click(function(){
            $("#addCard").show();
            $("#bg-model").show();
            // $(".bio,.Artist-image").hide();
            


          });
       
       
      
         $(".manage").click(function(){
          var attr = $('.manage-artwork').attr('src');

          // For some browsers, `attr` is undefined; for others, `attr` is false. Check for both.
          if (typeof attr !== typeof undefined && attr !== false) {//بعض البيجز الصورة بنفس الهتمل فايل سو باخذ الصوره منه
                  attr = attr.replace('url(', '').replace(')', '').replace(/\"/gi, "");
                  $("#userPost").attr("src", attr);}

           $(".manage-artwork").show();
          $("#bg-model").show();
       
       
        
    

        //   })
      });
        $(document).mouseup(function (e) {
          var container = $("#addCard");
          var container2 = $(".manage-artwork");
       

          // if the target of the click isn't the container nor a descendant of the container
          if (!container.is(e.target) && container.has(e.target).length === 0 ) {
            if($("#addCard").is(":visible")){
            container.hide();
             $("#bg-model").hide();
             container2.reset();
            //  $(".bio,.Artist-image").show();

                
                  
            }


          }
          if (!container2.is(e.target) && container2.has(e.target).length === 0 ) {
            if($(".manage-artwork").is(":visible")){
            container2.hide();
             $("#bg-model").hide();
             $("#addCard").reset();
            //  $(".bio,.Artist-image").show();
                
                  
            }


          }
   

  });

        });
      
       function showManageArtwork(e){
        $.ajax({
          method: "POST",
          url: "updateArtwork.php",
          data: {artworkId : e}
        });
       }

      
       $(document).ready(function(){
        $("#addArtwork").validate({
          rules: {
            artdisplay: {
              required: true,
              extension: "jpg|jpeg|png|ico|bmp"
            },
            Title: {
              minlength: 6
            },
            desc:{
              minlength: 6
            }
          },
          messages: {
            artdisplay: {
              required: "please fill this field with your art!",
            }
           },

          tooltip_options: {
            artdisplay: {
            placement: 'bottom'
          },
          Title: {
            placement: 'bottom'
          },
          desc: {
            placement: 'bottom'
          }
          },


          });
      
      });
      


        window.addEventListener("load",start,false);