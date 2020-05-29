<html lang="en">

<?php
session_start();
if($_SESSION['username']=='' || $_SESSION['roll'] != 'Vistor'){

header("Location:index.php");
exit;
}
$username =$_SESSION['username'];
?>

<html lang="en">

<?php include 'ArtistStudioqueries.php';?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ARTIST STUDIO</title>
  <link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="icon" href="assets/raqash_icon.png">
  <link rel="stylesheet" type="text/css" href="CSS/Studio.css">
  <script src="JS/viewArtwork.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="JS/onClickButtons.js"></script>
</head>


<body>
  <!-- nav bar  -->
  <header class="menu-bar">
    <nav>
      <ul>
        <li id="Gsize"><a href="VistorHomePage.php">GALLERY</a></li>

        <!-- dropdown menue -->
        <div class="drop">
          <li class="dropAccount" onclick= "showDropdownMenu()"><a href="#">ACCOUNT▽</a></li>
          <div class="dropContent">
            <!-- <a href="#">ARTST STUDIO</a> -->
            <a href="FAVOURITS.php">BOOKMARK</a>
            <a href="logout.php">LOG OUT</a>
          </div>
        </div>

        <!-- logo -->
        <img src="assets/raqashlogo.png" alt="RAQASH Logo" width="100px" height="100px">

        <li id="Asize"><a href="ArtistHomePage1.html#AboutUs">ABOUT US</a></li>
        <li id="Csize"><a href="ArtistHomePage1.html#contactUs">CONTACT US</a></li>
      </ul>
    </nav>
  </header>
  <!-- to top button -->
  <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="assets/Raqash Icon-up.svg" width="20px"
      height="20px" alt="up"></button>
  <script>//Get the button:
    mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () { scrollFunction() };

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
    
    function showDropdownMenu(){
          $(".dropContent").show();
        }
    </script>



  <!-- Bio  -->
<?php  $username = $_GET['id'];
 $sql2 = "SELECT * FROM Artist where ARusername ='$username';";
 $result2 = mysqli_query($conn, $sql2);
 $bio2= mysqli_fetch_array($result2);
?>
  <div class="account">
             
             <div class="row">
            
                   </div>
                 <div class="col-md-6 text-center">
                     <img  id= "Artist-image"src="images/<?php echo $bio2['account_image'];?>" alt="artist image">
                   
                     <div class="bio">
                     <form id ="updateProfile"action="updateprofile.php" method ="post" enctype="multipart/form-data">
                          <h4>A Few Words About Me </h4>

                            <h5><?php echo"Username: ".$bio2['ARusername'];?></h5>
                                <h5><?php echo"Name: ".$bio2['name'];?></h5>
                          
                              <p> <?php echo"Bio: ".$bio2['bio'];?> </p>

                           <h6 class= "contactinfo">Contact Information </h6>
                        
                       
                      <p class="contact-info">

                          contact me: 
                          <a  href="https://twitter.com/<?php echo $bio2['twitter'];?>"><img src="assets/Raqash Icon-twitter.svg" alt="twitter icon" width="30px" height="30px"></a>
                          <a  href="mailto:<?php echo $bio['email'];?>"><img src="assets/Raqash Icon-email.svg" alt="Email icon" width="30px" height="30px"></a> </p>
                         
                        
                    
                         </div>
                    

                      
     
                     </div>
                 </div>
             </div>
             
         </div>
                  





  <!-- Arts  -->
  <div class="content">

    <!-- page title -->
    <label class="title"> <span id="dot">•</span> ARTS <span id="dot">•</span> </label>

    <!--Grid row-->
    <?php $counter=0?>
                      <?php foreach($arts as $art):?>
                      
                      <?php  if ($counter % 3 ==0 ):?>
                       <div class="row my-4">
                       
                         <div class = "cards-container"> 
                        <div class="card-deck">
                          <?php endif;?>
                            <div class="card"   style="width: 18rem;">
                            <img class="card-img-top img-resize post" onclick="window.location='viewArtWork1.php?id=<?php echo $art['AId']?>'"src="images/<?php echo $art['img'];?>" alt="wolf line art">
                                <div class="card-body">
                                  <h5 class="card-title"><?php echo $art['Title'];?> </h5>
                                  <p class="card-text"><?php echo$art['Art_description'];?></p>
                                </div>
                                <div class="card-footer">
                                <label><?php echo $art['Number_of_dislike']?></label><img src="assets/Raqash Icon-dislike.svg" alt="dislike icon " data-row_id ="<?php echo $art['AId'];?>" height="30px" width="30px" class="dislike">
                                <label><?php echo $art['Number_of_like']?></label><img src="assets/Raqash Icon-like.svg" alt="like icon " height="30px" data-row_id ="<?php echo $art['AId'];?>" width="30px" class="like">
                                 <img src="assets/Raqash Icon-fav.svg" alt="fav icon " height="30px" width="30px" class ="favbutton"onclick= "addfav(<?php echo $art['AId'];?>)">
                                  </div> 
                              </div>
                            <?php $counter++;
                            if ($counter % 3 ==0 ):
                            ?>
                                    </div>
                                    </div>
                                  </div>
                                  <?php endif;?>
                          <?php endforeach; ?>
                            </div>
                      </div>
                    </div>
  <!-- end -->


  <!-- footer -->
  <div class="footer">&copy;RAQASH Team 2020</div>
  <div id="bg-model"></div>  
</body>

</html>