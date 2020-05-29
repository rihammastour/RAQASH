
function start(){

  window.addEventListener("scroll",scrollFunction,false);

  // function errormsg(){
  //   document.alert("works");
  //   var msgErr = document.getElementById("error");
  //   msgErr.style.display = "block";
  //   msgErr.innerHTML="error";}

  // document.getElementById("close").addEventListener("click",close);

}

function openForm(clicked) {
    if(clicked=="signUp"){
      document.getElementById("signup").style.display = "block";
      document.getElementById("login").style.display = "none";
      //document.getElementById("forgetPassword").style.display = "none";

    }else if(clicked=="login"){
      document.getElementById("login").style.display = "block";
      document.getElementById("signup").style.display = "none";}
     // document.getElementById("forgetPassword").style.display = "none";   }
  
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

      }
    
      // }else if(clicked == "forgetPass"){
      //   document.getElementById("forgetPassword").style.display = "block";
      //   document.getElementById("login").style.display = "none";
      // 
    
      
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
   var name = document.getElementsByName("Sname")[0].value
     alert("Glad to have "+name+"\n looking forward to see you'er work , your account must be approval to be active ");
    
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

    
$('.close').click(function (){
$(this).parent().hide();
$('#bg-model').hide();
});

$('#artistCheck').change(function (){
  var c = this.checked ? 
$('#textareaforartist').show() : $('#textareaforartist').hide();



});
});

//validate signup signin
$(document).ready(function(){
  $("#formbox").validate({
  rules: {
    username: {
      required: true,
      minlength: 5
    },
    email: {
      required: true,
      email: true
    },
    pass: {
      required: true,
      minlength: 6
    },
    repass:{
      required: true,
      equalTo: "#pass"
    },
    Sname:{
      required: true,
      minlength: 2
    }
  },
  messages: {
    username: {
      required: "please fill this field with your username!",
    },
    email: {
      required: "please fill this field with your email!",
    },
    pass: {
      required: "please fill this field with your password!",
    },
    Sname:{
      required: "please fill this field with your name!",
    }
 },
  tooltip_options: {
    username: {
      placement: 'bottom'
    },
    email: {
      placement: 'bottom'
    },
    pass: {
      placement: 'bottom'
    },
    repass:{
      placement: 'bottom'
    },
    Sname:{
      placement: 'bottom'
    }
  },
});
});


$(document).ready(function(){
  $("#loginform").validate({
    rules: {
      username: {
        required: true,
        minlength: 5
      },
      pass: {
        required: true,
        minlength: 6
      }
    },
    messages: {
      username: {
        required: "please fill this field with your username!",
      },
      pass: {
        required: "please fill this field with your password!",
      }
     },
    tooltip_options: {
    username: {
      placement: 'bottom'
    },
    pass: {
      placement: 'bottom'
    }
    },
    });

});

$(document).ready(function(){
  $("#signupForm").validate({
  rules: {
    username: {
      required: true,
      minlength: 5
    },
    email: {
      required: true,
      email: true
    },
    name:{
      required: true,
   },
    password: {
      required: true,
      minlength: 6
    },
    repassword:{
      required: true,
      equalTo: "#password"
    },
    textareaforartist:{
      required: true,
      minlength: 2
    }
  },
  messages: {
    username: {
      required: "please fill this field with your username!",
    },
    email: {
      required: "please fill this field with your email!",
    },
    name:{
      required: "please fill this field with your name!",
    },
    password: {
      required: "please fill this field with your password!",
    },
    repassword:{
      required: "please fill this field with your password!",
    },
    textareaforartist:{
      required: "please fill this field with brief discription about your ART!",
    }
 },
  tooltip_options: {
    username: {
      placement: 'bottom'
    },
    email: {
      placement: 'bottom'
    },
    name:{
      placement: 'bottom'
    },
    password: {
      placement: 'bottom'
    },
    repassword:{
      placement: 'bottom'
    },
    textareaforartist:{
      placement: 'bottom'
    }
  },
});
});


  window.addEventListener("load",start,false)

