<?php session_start();
if($_SESSION['username']=='' || $_SESSION['roll'] != 'Artist'){

header("Location:index.php");
exit;
}


include 'php/connectdatabase.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADD ARTWORK</title>
    <link rel="icon" href="assets/raqash_icon.png">
    <link rel="stylesheet" type="text/css" href="CSS/ManageArtwork.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <!-- Nav Bar -->
    <header class="menu-bar">
                <nav>
                    <ul>
                        <li id ="Gsize"><a href="ArtistStudio.php">STUDIO</a></li>
        
                        <!-- dropdown menue -->
                       
                        
                          <!-- logo -->
                        <img src="assets/raqashlogo.png" alt="RAQASH Logo" width="100px" height="100px">
                        <div class = "drop">
                          <li class = "dropAccount"><a href="#">ACCOUNT▽</a></li>
                            <div class = "dropContent">
                                <a href="logout.php">LOG OUT</a>
                            </div>
                        </div>
          
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
        }</script>
        }</script>

<?php 

    $aid = $_GET['id'];
    $SQLupdateArtwork = "SELECT * FROM ArtWork WHERE AId ='$aid'";
    $resultUpdateArtwork = mysqli_query($conn, $SQLupdateArtwork);
    $artwork = mysqli_fetch_array($resultUpdateArtwork);

    $img = $artwork['img'];


?>

<div class = "content">
    <!-- page title -->
    <label class = "title"> <span id = "dot">•</span> MANAGE ARTWORK <span id = "dot">•</span> </label>
    <div class="container">
      <div class="right">
   
        <div class="uploadbox">
        <form action="updateArtwork.php" method ="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="<?php echo $id ?>" /> 


          <img  id ="imageUpdated" src=<?php echo "images/".$img?> width="200px" height="200px" >
         
          <label class="uploadTitle"> IMAGE TITlE: <?php echo  $artwork['Title']; ?></label>
          <p id="imagedate"><?php echo  $artwork['Published_date']; ?></p>

        </div>
      </div>
      <div class="left">
        <div>
          <div class="formbox">
            <input type="text" name="Title" placeholder="Title">
            <textarea name="desc" placeholder="Description" id="desc" cols="17" rows="5"></textarea>
            <input id= "modify" name="modify" type="submit" value="Save">
            <!--  class="modifiedart" -->
    </div>
        </div>
        <div class="checkBox">
          <input name = "disableComment" type="checkbox"  /><label> Disable Comment</label>
          </form>
        </div>

      </div>

    </div>


<div class = "footer">&copy;RAQASH Team 2020</div>
</body>
</html>