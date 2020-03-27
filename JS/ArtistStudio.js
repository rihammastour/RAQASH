

function start(){

  var currentDate = new Date();
  document.getElementById("imagedate").innerHTML=currentDate.getDate()+"-"+currentDate.getMonth()+"-"+currentDate.getFullYear();

}


        $(document).ready(function(){
          $(".editbio,.editemail,.editname,.edittwitter,.save,.cancel,h6,manage-artwork").hide();
     
       
       
       
          $(".edit").click(function(){
            $("p,h3").hide();
            // $("h3").hide();
            $(".editbio,.editemail,.editname,.edittwitter,.save,.cancel,h6").show();
  
            $(this).hide();
        


          });
          $(".cancel,.save").click(function(){
            $("p,h3").show();
        
            $(".text,.cancel,.save,.editbio,.editemail,.editname,.edittwitter").hide();
        
            $(".edit").show();
      
        


          });
        
          $("#post").click(function(){
            $("#addCard,#bg-model").hide();
            $(".bio,.Artist-image").show();
           
          });
          $(".close").click(function(){
            $("#addCard,#bg-model").hide();
            $(".bio,.Artist-image").show();
           
          });
          $(".close").click(function(){
            $(".manage-artwork","#bg-model").hide();
          
           
          });
          

          $(".add").click(function(){
            $("#addCard").show();
            $("#bg-model").show();
            $(".bio,.Artist-image").hide();
            


          });
       
       
      
          $(".manage").click(function(){
            $(".manage-artwork").show();
            $("#bg-model").show();
       
       
           
         

          })
        });
      


             mybutton = document.getElementById("myBtn");
        
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};
        
        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
          } else {
            mybutton.style.display = "none";
          }
        }
  
        
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
          document.body.scrollTop = 0; // For Safari
          document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
        window.addEventListener("load",start,false);