<?php
  include 'php/connectdatabase.php';

 session_start();
 if($_SESSION['username']=='' || $_SESSION['roll'] != 'Vistor'){
 
 header("Location:index.php");
 exit;
 }
  $username = $_SESSION['username'];

$artWorks_query_result = mysqli_query($conn, "SELECT *
                                              FROM Favourite , Vistor 
                                              WHERE Vistor_username = Vusername AND Vistor_username = '$username'
                                              ORDER BY Artwork_id DESC ");
 $favourits = mysqli_fetch_all($artWorks_query_result,MYSQLI_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">
<head>

 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAVOURITES</title>
    <link rel="icon" href="assets/raqash_icon.png">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1    /jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="JS/onClickButtons.js"></script>

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <!-- Nav Bar -->
    <header>
        <nav class="menu-bar">
            <ul>
                <li><a href="VistorHomePage.php">GALLERY</a></li>

                <!-- dropdown menue -->
                <div class = "drop">
                  <li class = "dropAccount" onclick= "showDropdownMenu()"><a href="#">ACCOUNT▽</a></li>
                    <ul class = "dropContent">
                        <a href="FAVOURITS.php">FAVOURITES</a>
                        <a href="logout.php">LOG OUT</a>
                      </ul>
                </div>
                
                  <!-- logo -->
                <img src="assets/raqashlogo.png" alt="RAQASH Logo" width="100px" height="100px">

                <li><a href="VistorHomePage.php#AboutUs">ABOUT US</a></li>
                <li><a href="VistorHomePage.php#contactUs">CONTACT US</a></li>
            </ul>
        </nav>
         
    </header>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="assets/Raqash Icon-up.svg" width="30px" height="30px" alt="up"></button>
    <script>//Get the button:
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
        
        function showDropdownMenu(){
          $(".dropContent").show();
        }
        
        function delet(id){

        $(".favo").click(function(){
           $.ajax({
             type: "POST",
             url: 'delete.php',
             data:{ row_id: id }



});   
       
});
            $(this).attr("src", "assets/Raqash Icon-fav.svg");
        }
             
        
        </script>
<div class = "content">
    <!-- page title -->
    <label class = "title"> <span id = "dot">•</span> FAVOURITES <span id = "dot">•</span> </label>

<!--Grid row-->
<?php 
        $counter = 0;
      

        foreach ($favourits as $favourit):
          $artID =  $favourit['Artwork_id'];
          $result1 = mysqli_query($conn, "SELECT * FROM ArtWork WHERE AId = '$artID' ");
          $user= mysqli_fetch_array($result1);
          
          $ArtisitUsername = $user['Artist_username'];
          $desc = $user['Art_description'];
          $img = 'images/'.$user['img'];

        


         
    
          if($counter %3 ==0):

        

          ?>

 <div class="row my-4">

        <div class = "cards-container"> 
            <div class="card-deck">
          <?php endif;?>
        <!--Grid column-->
       
  
        

        <div class="card" style="width: 18rem;">
            <img class="card-img-top img-resize" src="<?php echo $img ;?>" alt="planet line art" >
            <div class="card-body">
              <h5 class="card-title"><?php echo $ArtisitUsername ;?></h5>
              <p class="card-text"><?php echo $desc;?></p>
            </div>
            <div class="card-footer">
                <a href="" class="favo" ><img src="assets/Raqash Icon-favActivated.svg" alt="bookmark icon" height="30px" width="30px" onclick="delet(<?php echo $artID;?>)" ></a>
              </div>
              
          </div>

         


          <?php
          $counter++;
          if($counter % 3 == 0):
          ?>
          </div>
          </div>
          </div>
          <?php endif;
          endforeach;

         
          

          // function d(){
          

           
          //  $conn= new mysqli("localhost","root","","RAQASH");
          //    $sql = "DELETE FROM Favourite WHERE AID =1 ";
          //    mysqli_query($conn, $sql);
          
            
          
          // }
          
          ?>
           </div>
          </div>
          </div>
        <!--Grid column-->
    
<!--     
        <div class="card" style="width: 18rem;">
            <img class="card-img-top img-resize" src="assets/pic2.jpg" alt="face line art">
            <div class="card-body">
              <h5 class="card-title">Artist Account</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer">
                <a href="#"><img src="assets/Raqash Icon-share.svg" alt="share icon" width="30px" height="30px"></a>
                <a href="#"><img src="assets/Raqash Icon-favActivated.svg" alt="bookmark icon" height="30px" width="30px"></a>
              </div>
          </div> -->
        <!--Grid column-->
    
        <!--Grid column-->
        <!-- <div class="card" style="width: 18rem;">
            <img class="card-img-top img-resize" src="assets/pic3.jpg" alt="wolf line art">
            <div class="card-body">
              <h5 class="card-title">Artist Account</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer">
                <a href="#"><img src="assets/Raqash Icon-share.svg" alt="share icon" width="30px" height="30px"></a>
                <a href="#"><img src="assets/Raqash Icon-favActivated.svg" alt="bookmark icon" height="30px" width="30px"></a>
              </div>
          </div> -->
        <!--Grid column-->
        <!-- <div class="card" style="width: 18rem;">
            <img class="card-img-top img-resize" src="assets/pic4.jpg" alt="human line art">
            <div class="card-body">
              <h5 class="card-title">Artist Account</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer">
                <a href="#"><img src="assets/Raqash Icon-share.svg" alt="share icon" width="30px" height="30px"></a>
                <a href="#"><img src="assets/Raqash Icon-favActivated.svg" alt="bookmark icon" height="30px" width="30px"></a>
              </div>
          </div>
          
        </div>
      </div>
</div> -->

 <!--Grid row-->
 <!-- <div class="row my-4">
    <div class = "cards-container"> 
        <div class="card-deck"> -->

    <!--Grid column-->
    <!-- <div class="card" style="width: 18rem;">
        <img class="card-img-top img-resize" src="assets/pic1.jpg" alt="planet line art" >
        <div class="card-body">
          <h5 class="card-title">Artist Account</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="card-footer">
            <a href="#"><img src="assets/Raqash Icon-share.svg" alt="share icon" width="30px" height="30px"></a>
            <a href="#"><img src="assets/Raqash Icon-favActivated.svg" alt="bookmark icon" height="30px" width="30px"></a>
          </div>
      </div> -->
    <!--Grid column-->

    <!--Grid column-->
    <!-- <div class="card" style="width: 18rem;">
        <img class="card-img-top img-resize" src="assets/pic2.jpg" alt="face line art">
        <div class="card-body">
          <h5 class="card-title">Artist Account</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="card-footer">
            <a href="#"><img src="assets/Raqash Icon-share.svg" alt="share icon" width="30px" height="30px"></a>
            <a href="#"><img src="assets/Raqash Icon-favActivated.svg" alt="bookmark icon" height="30px" width="30px"></a>
          </div>
      </div> -->
    <!--Grid column-->

    <!--Grid column-->
    <!-- <div class="card" style="width: 18rem;">
        <img class="card-img-top img-resize" src="assets/pic3.jpg" alt="wolf line art">
        <div class="card-body">
          <h5 class="card-title">Artist Account</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="card-footer">
            <a href="#"><img src="assets/Raqash Icon-share.svg" alt="share icon" width="30px" height="30px"></a>
            <a href="#"><img src="assets/Raqash Icon-favActivated.svg" alt="bookmark icon" height="30px" width="30px"></a>
          </div>
      </div> -->
    <!--Grid column-->
    <!-- <div class="card" style="width: 18rem;">
        <img class="card-img-top img-resize" src="assets/pic4.jpg" alt="human line art">
        <div class="card-body">
          <h5 class="card-title">Artist Account</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="card-footer">
            <a href="#"><img src="assets/Raqash Icon-share.svg" alt="share icon" width="30px" height="30px"></a>
            <a href="#"><img src="assets/Raqash Icon-favActivated.svg" alt="bookmark icon" height="30px" width="30px"></a>
          </div>
      </div>
      
    </div>
  </div>
</div> -->

 <!--Grid row-->
 <!-- <div class="row my-4">
    <div class = "cards-container"> 
        <div class="card-deck"> -->

    <!--Grid column-->
    <!-- <div class="card" style="width: 18rem;">
        <img class="card-img-top img-resize" src="assets/pic1.jpg" alt="planet line art" >
        <div class="card-body">
          <h5 class="card-title">Artist Account</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="card-footer">
            <a href="#"><img src="assets/Raqash Icon-share.svg" alt="share icon" width="30px" height="30px"></a>
            <a href="#"><img src="assets/Raqash Icon-favActivated.svg" alt="bookmark icon" height="30px" width="30px"></a>
          </div>
      </div> -->
    <!--Grid column-->

    <!--Grid column-->
    <!-- <div class="card" style="width: 18rem;">
        <img class="card-img-top img-resize" src="assets/pic2.jpg" alt="face line art">
        <div class="card-body">
          <h5 class="card-title">Artist Account</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="card-footer">
            <a href="#"><img src="assets/Raqash Icon-share.svg" alt="share icon" width="30px" height="30px"></a>
            <a href="#"><img src="assets/Raqash Icon-favActivated.svg" alt="bookmark icon" height="30px" width="30px"></a>
          </div>
      </div> -->
    <!--Grid column-->

    <!--Grid column-->
    <!-- <div class="card" style="width: 18rem;">
        <img class="card-img-top img-resize" src="assets/pic3.jpg" alt="wolf line art">
        <div class="card-body">
          <h5 class="card-title">Artist Account</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="card-footer">
            <a href="#"><img src="assets/Raqash Icon-share.svg" alt="share icon" width="30px" height="30px"></a>
            <a href="#"><img src="assets/Raqash Icon-favActivated.svg" alt="bookmark icon" height="30px" width="30px"></a>
          </div>
      </div> -->
    <!--Grid column-->
    <!-- <div class="card" style="width: 18rem;">
        <img class="card-img-top img-resize" src="assets/pic4.jpg" alt="human line art">
        <div class="card-body">
          <h5 class="card-title">Artist Account</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="card-footer">
            <a href="#"><img src="assets/Raqash Icon-share.svg" alt="share icon" width="30px" height="30px"></a>
            <a href="#"><img src="assets/Raqash Icon-favActivated.svg" alt="bookmark icon" height="30px" width="30px" id="fav"></a>
          </div>
      </div>
      
    </div>
  </div>
</div>

</div> -->

<div class = "footer">&copy;RAQASH Team 2020</div>
</body>
</html>