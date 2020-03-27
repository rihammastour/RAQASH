function start(){

  window.addEventListener("scroll",scrollFunction,false);
  // document.getElementById("close").addEventListener("click",close);

}

function openForm(clicked) {
    if(clicked=="signUp"){
      document.getElementById("signup").style.display = "block";
      document.getElementById("login").style.display = "none";
      document.getElementById("forgetPassword").style.display = "none";

    }else if(clicked=="login"){
      document.getElementById("login").style.display = "block";
      document.getElementById("signup").style.display = "none";
      document.getElementById("forgetPassword").style.display = "none";   }
  
 document.getElementById('bg-model').style.display = 'flex';
    }

    
    function swichForm(clicked) {
      if(clicked=="signUp"){
        document.getElementById("signup").style.display = "block";
        document.getElementById("login").style.display = "none";
        document.getElementById("forgetPassword").style.display = "none";

  
      }else if(clicked=="login"){
        document.getElementById("login").style.display = "block";
        document.getElementById("signup").style.display = "none";
        document.getElementById("forgetPassword").style.display = "none";

  
    
      }else if(clicked == "forgetPass"){
        document.getElementById("forgetPassword").style.display = "block";
        document.getElementById("login").style.display = "none";
      }
      
      }
    
    
    function scrollFunction() {
      mybutton = document.getElementById("myBtn");
  
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
  
  
    function signUp(){
   if(document.getElementById("artistCheck").checked == true){ 
     alert("please wait for the approval email");

   }

  }

  //    function close(clicked){
  //     if(clicked=="signUp"){
  //       document.getElementById("signup").style.display = "none";
  //     }else if(clicked=="login"){
  //       document.getElementById("login").style.display = "none";
  //      }else{
  //       document.getElementById("forgetPassword").style.display = "none";
  //      }
    
  //  document.getElementById('bg-model').style.display = 'none';
  //   }

  $(document).ready(function(){
$('#close1 , #close2 , #close3').click(function (){
$(this).parent().hide();
$('#bg-model').hide();
});

});

  window.addEventListener("load",start,false)