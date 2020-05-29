<?php
session_start();
if($_SESSION['username']=='' || $_SESSION['roll'] != 'Artist'){

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
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/Studio.css">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
  
    <link rel="icon" href="assets/raqash_icon.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="JS/ArtistStudio.js"></script>

    
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



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="JS/onClickButtons.js"></script>
     <script src="JS/viewArtwork.js"></script>
    
    
</head>


<body>
<!-- nav bar  -->

        <header class="menu-bar">
                <nav>
                    <ul>
                        <li id ="Gsize"><a href="ArtistStudio.php">STUDIO</a></li>
        
                        <!-- dropdown menue -->
                       
                        
                          <!-- logo -->
                        <img src="assets/raqashlogo.png" alt="RAQASH Logo" width="100px" height="100px">
                        <div class = "drop">
                          <li class = "dropAccount" onclick= "showDropdownMenu()" ><a href="#">ACCOUNT▽</a></li>
                            <div class = "dropContent">
                                <a href="logout.php">LOG OUT</a>
                            </div>
                        </div>
          
                    </ul>
                </nav>
            </header>
             <!-- to top button -->
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

        function showDropdownMenu(){
          $(".dropContent").show();
        }
      }</script>


        

          <!-- add artwork button -->
                           <button class="add"  type="button"> 
                              <div class="addtext">ADD</div>
                              <img src="assets/Raqash Icon-add.svg" alt="Add button" width="25px" height="40px"> </button> 
                                        <!-- add profile image   -->
                               <form action="updateprofileImage.php" method ="post" enctype="multipart/form-data" >
                                       <button id ="addImge" type="button"  onclick="triggerProfileimage()"> 
                                     
                                                <img src="assets/camera.svg "alt="Add image" width="30px" height="40px">
                                               
                                                 </button> 
                                                 <input type="file" name = "displayprofileimage" id ="displayprofileimage" onchange="displyprofileimage(this)"style="display:none">
                                                 <input   id = "profileImage1" name ="profileImage1"  type="submit" style="display:none">
                                                
                                                  </form>

            <div class="account">
             
                    <div class="row">
                    <div class ="addCardbox">
                        <div id="addCard" >
                            <div class ="right">
                              <div class ="uploadbox">
                       
                                <form id="addArtwork" action="AddArtwork.php" method ="post" enctype="multipart/form-data">
                             
                                <img  id="artdisplay" src="assets/Raqash Icon-upload.svg" name ="artdisplay" width="200px" height="200px"alt="upload" onclick="trigger()">
                                  <input type="file" name = "postArt" id ="postArt" onchange="displayArt(this)"  alt="Submit" style="display:none">
                                  <label class="uploadTitle"> UPLOAD AN IMAGE</label>
                                  <input type ="hidden" id="imagedate" value="" >
                                 
                                
                                
                             </div>
                             </div>
                             <div class ="left">
                         <div>
                         <input type="button" value=&#10799 id="close1">
                               <div class ="formbox">
                           
                                  <input type="text" name="Title" id="Title"   placeholder="Tilte"> 
 
                                  <textarea name="desc"  id="desc" cols="17" rows="5" placeholder="Description"></textarea>

                                  <input  class = "post-art"name ="postart"   type="submit" value="Post" >
                             
                                    </div> 
                               <div class = "checkBox">
                                <input   name ="disableComment" id = "addcheckbox"type="checkbox" /><label>  Disable Comment</label>
                         
                              </div>
                              </div>
                               
                            </div>
                             </form>
                           </div>
                          </div>
                        <div class="col-md-6 text-center">
                            <img  id= "Artist-image"src="images/<?php echo $bio['account_image'];?>" alt="artist image">
                          
                            <div class="bio">
                            <form id ="updateProfile"action="updateprofile.php" method ="post" enctype="multipart/form-data">
                            <h4>A Few Words About Me </h4>

                            <h5><?php echo"Username: ".$username;?></h5>
                                <h5><?php echo"Name: ".$bio['name'];?></h5>
                          
                              <p> <?php echo"Bio: ".$bio['bio'];?> </p>
                   
                                 
                              
                             <p class="contact-info">

                                 contact me: 
                                 <a  href="https://twitter.com/<?php echo $bio['twitter'];?>"><img src="assets/Raqash Icon-twitter.svg" alt="twitter icon" width="30px" height="30px"></a>
                                 <a  href="mailto:<?php echo $bio['email'];?>"><img src="assets/Raqash Icon-email.svg" alt="Email icon" width="30px" height="30px"></a> </p>
                                
                               
                              <div>
                   
                                
                                </div>
                                </div>
                                </form>

                             
            
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                   <!-- Edit card  -->
            
  <!-- manage artwork -->


  <!-- Arts  -->

    <!-- page title -->
                <!-- Arts  -->

                        <!-- page title -->
                        <label class = "title"> <span id = "dot">•</span> ARTS <span id = "dot">•</span> </label>
                         <!--Grid row-->
                         <?php $counter=0?>
                      <?php foreach($arts as $art):?>
                      
                      <?php  if ($counter % 4 ==0 ):?>
                       <div class="row my-4">
                       
                         <div class = "cards-container"> 
                        <div class="card-deck">
                          <?php endif;?>
                            <div class="card " style="width: 18rem;">
                            <img class="card-img-top img-resize post" src="images/<?php echo $art['img'];?>" alt="wolf line art">
                                <div class="card-body">
                                  <h5 class="card-title"><?php echo $art['Title'];?> </h5>
                                  <p class="card-text"><?php echo$art['Art_description'];?></p>
                                </div>
                                <div class="card-footer">
                                    <a  class="manage" href="manageArtWork.php?id=<?php echo $art['AId'];?>"><img src="assets/Raqash Icon-edit.svg" alt="edit icon" width="30px" height="30px"></a>
                                    <a href="deleteArtwork.php?id=<?php echo $art['AId'];?>" onclick="return confirm('Are you sure you want to delete ArtWork?')"><img src="assets/Raqash Icon-remove.svg" alt ="delete icon" height="30px" width="30px"></a>
                                  </div> 
                              </div>
                            <?php $counter++;
                            if ($counter % 4 ==0 ):
                            ?>
                                    </div>
                                    </div>
                                  </div>
                                  <?php endif;?>
                          <?php endforeach; ?>
                            </div>
                      </div>
                    </div>
                            <!--Grid column-->
             

                 
          <!-- footer -->
          <div class = "footer">&copy;RAQASH Team 2020</div>
         <div id="bg-model"></div>  

</body>

</html>