<!DOCTYPE html>

<html lang="en">
<!-- php -->
<?php include 'php/connectdatabase.php'; ?> 

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- style sheets -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
  <link rel="stylesheet" type="text/css" href="CSS/welcomePage.css">

  <!--  Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!--jquerey validation-->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="JS/jquery-validation-bootstrap-tooltip-master/jquery-validate.bootstrap-tooltip.min.js"></script>

  <script src="JS/welcomPage.js"></script>

  <!-- icons -->
  <!-- <link rel="icon" href="assets/raqash_icon.png"> -->
  <link rel="icon" href="assets/raqash_icon.png" type="image/png" sizes="16x16">

  <title>RAQASH</title>

  <style>
    .badge {

      display: block;
      position: relative;
      width: 20rem;
      height: 20rem;
      cursor: pointer;
      background: url(assets/helloImg.jpg) no-repeat 100% 50%;
      background-size: 120%;
      border-radius: 50%;
      -webkit-transition: all 0.5s cubic-bezier(0.55, 0, 0.1, 1);
      transition: all 0.5s cubic-bezier(0.55, 0, 0.1, 1);
      box-shadow: 0px 0.5rem 1rem rgba(0, 0, 0, 0.75);


    }
  </style>

</head>

<body>

  <!-- navgation bar -->
  <header>
    <nav class="menu-bar">
      <ul>
        <li><a href="#contactUs">CONTACT US</a></li>
        <!-- logo -->
        <img src="assets/raqashlogo.png" alt="RAQASH Logo" width="100px" height="100px">

        <li><a href="#AboutUs">ABOUT US</a></li>

      </ul>
    </nav>

  </header>


  <div class="content">

    <!-- signUp -->

    <div class="container" id="signup" id="container">
      <!-- close button-->
      <input type="button" value=&#10799; class="close" id="close1">


      <div class="Sleft"><img src="assets/aleph.jpg">
      </div>
      <div class="Sright">



        <!-- title -->
        <div class="formsTitle">
          <h3> Sign Up </h3>
        </div>
        <div id="error">  </div>
        <form class="formbox" id="signupForm" action="registration.php" method="post">

         <!-- addslashes() to store in database -->
         <!-- stripslashes() to retrive from database -->

          <input type="text" name="username" placeholder="username" >

          <input type="text" name="email" placeholder="email" >

          <input type="text" name="name" placeholder="name" >

          <input type="password" id= "password" name="password" placeholder="password" >

          <input type="password" name="repassword" placeholder="reapet password" >


          <div class="check"> <input type="checkbox" name="artist" id="artistCheck" value='yes'>
            <lebel>I'm artist</lebel>
            <textarea id="textareaforartist" name="about-artist" rows="7" placeholder="About me"></textarea>
          </div>
          <input type="submit" value="submit" onclick="signUp()">

          <p>Already have an account? <a onclick="swichForm('login')">Log in.</a> </p>
        </form>
      </div>
    </div>



		<script>

  function errormsg(){
    document.alert("works");
    var msgErr = document.getElementById("error");
    msgErr.style.display = "block";
    msgErr.innerHTML="error";}

	</script>

	<?php
	
	if(isset($_GET['username'])){
  echo "<script>";
  echo "alert('please entere username');";
  echo "openForm('signUp');";
	echo "</script>";
  }
  
	if(isset($_GET['taken'])){
    echo "<script>";
    echo "alert('username is taken');";
    echo "openForm('signUp');";
    echo "</script>";
    }

		
	if(isset($_GET['email'])){
  echo "<script>";
  echo "alert('please entere email');";
  echo "openForm('signUp');";
	echo "</script>";
  }


  if(isset($_GET['wrongemail'])){
    echo "<script>";
    echo "alert('please entere email prpably');";
    echo "openForm('signUp');";
    echo "</script>";
  }
			
	if(isset($_GET['name'])){
	echo "<script>";
	echo "alert('Please Enter Name ');";
  echo "openForm('signUp');";
	echo "</script>";
  }
  
	if(isset($_GET['password'])){

	echo "<script>";
	echo "alert('Please Enter Password ');";
  echo "openForm('signUp');";
	echo "</script>";
	}
	
	if(isset($_GET['repassword'])){
    echo "<script>";
    echo "alert('Please repeate Password ');";
    echo "openForm('signUp');";
    echo "</script>";
    }
    

  if(isset($_GET['match'])){
    echo "<script>";
    echo "alert('Password not maching');";
    echo "openForm('signUp');";
    echo "</script>";}
	
	?>


    <!-- log in -->
    <div class="container" id="login">
      <!-- close button-->
      <input type="button" value=&#10799; class="close" id="close3">

      <div class="Lleft"><img src="assets/aleph.jpg"></div>
      <div class="Lright">

        <div class="formsTitle">
          <h3> login </h3>
        </div>
        <form class="formbox"  id="loginform" action="validation.php" method='post'>

          
            <input type="text" name="username" placeholder="username">
            <input type="password" name="pass" placeholder="password">
          

          <!-- <a class="forgetPass" onclick="swichForm('forgetPass')"> forget Password?</a> -->

          <input type="submit" value="login">
          <p>Don't have an account yet? <a onclick="swichForm('signUp')">Sign up.</a> </p>
        </form>
      </div>
    </div>

    <?php
//invalid username/password
if(isset($_GET['Ferror'])){
  echo "<script>";
  echo "alert('username/passwoed invalid');";
  echo "openForm('login');";
	echo "</script>";
  }
  //Artist not approved
  if(isset($_GET['approval'])){
  echo'<script>';
  echo'alert("You\'er Account not approved yet, please wait the approval to be part of RAQASH")';
  echo'</script>';
  }


  ?>

    <!-- top up botten -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="assets/Raqash Icon-up.svg" width="30px"
        height="30px" alt="up"></button>

    <!-- hello -->
    <div class="hello">
      <div class='badge'>
        <div class='text'>’Hallo!</div>
      </div>
    </div>

    <!-- sign up and log in butoon -->
    <div class="inner-buttons">
      <button type="button" class="btn btn-outline-secondary" value="signUp" onclick="openForm(value)">sign up</button>
      <button type="button" class="btn btn-outline-secondary" value="login" onclick="openForm(value)">log in</button>
    </div>

    <!-- about us -->
    <div id="AboutUs" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
      <label class="title"> <span id="dot">•</span> ABOUT US<span id="dot">•</span> </label>

      <p>

        <strong>RAQASH </strong>Means in Arabic (خط), Line art is any image that consists of distinct straight or curved
        lines <br>
        placed against a (usually plain) background without gradations in shade (darkness) or hue (color) to <br>
        represent two-dimensional or three-dimensional objects. <br>
        <strong>Our website is a great place for artists to represent their work and share it with others!</strong>

      </p>

    </div>

  <!-- footer with contact us -->
  <footer id="RAQASHTEAM">

    <div id="contactUs">
      <label class="title"> <span id="dot">•</span> CONTACT US <span id="dot">•</span> </label>

      <ul class="list-unstyled">
        <li> <img src="assets/tele icon.png" alt="twitter icon" width="30px" height="30px"> 0558807732 </li>
        <li> <img src="assets/Raqash Icon-email.svg" alt="twitter icon" width="25px" height="25px"> <a
            href="mailto:RAQASH@gmail.com">
            Contact us</a></li>
        <a href="https://twitter.com/RAQASH381"><img src="assets/Raqash Icon-twitter.svg" alt="twitter icon"
            width="30px" height="30px"> twitter</a>
        <li><img src="assets/Raqash Icon-loc.svg" alt="twitter icon" width="30px" height="30px">Riyadh</li>

      </ul>
    </div>
    &copy;RAQASH Team 2020
  </footer>

   

  </div>
  <!-- end button of go to-up -->
  <div id="bg-model"></div>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

  <script>
    AOS.init({
      duration: 600, // values from 0 to 3000, with step 50ms
    });
  </script>
.jl
  </body>
</html>