<?php include 'php/connectdatabase.php';?>
<?php
session_start();
if($_SESSION['username']=='' || $_SESSION['roll'] != 'Vistor'){

header("Location:index.php");
exit;
}
$username =$_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="JS/viewArtwork.js"></script>
   <link rel="icon" href="assets/raqash_icon.png">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="CSS/viewArtwork.css">
    <script src="JS/onClickButtons.js"></script>

</head>
<body>
   <!-- Nav Bar -->
    <header class="menu-bar">
        <nav>
            <ul>
            <li id="Gsize"><a href="VistorHomePage.php">GALLERY</a></li>

                <!-- dropdown menue -->
                <div class = "drop">
                  <li class = "dropAccount"><a href="#">ACCOUNT▽</a></li>
                    <div class = "dropContent">
                    <a href="FAVOURITS.php">FAVOURITS</a>
                        <a href="logout.php">LOG OUT</a>
                    </div>
                </div>

                  <!-- logo -->
                <img src="assets/raqashlogo.png" alt="RAQASH Logo">

                <li id ="Asize"><a href="VistorHomePage.php#AboutUs">ABOUT US</a></li>
                <li id ="Csize"><a href="VistorHomePage.php#contactUs">CONTACT US</a></li>
            </ul>
        </nav>
    </header>
    <!-- go up button -->
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

        <!-- content of Admin page-->
      <div class="content">
  <?php
 
 if(isset($_GET['id'])){
   $id = $_GET['id'];
   $queryViewArt = "SELECT * FROM ArtWork WHERE AId = '$id' ORDER BY AId DESC";
   $resultView = mysqli_query($conn,$queryViewArt);
 
   $viewArt = mysqli_fetch_array($resultView);
 
     
 ?>

<div class = "content">
    <!-- page title -->
    <label class = "title"> <span id = "dot">•</span>VIWE ARTWORK<span id = "dot">•</span> </label>

<!-- view art work  -->
<div class = "container" id="viewArt">
            
    <div class="left">
        <img id="userPost" src=<?php echo "images/".$viewArt['img']?> alt="">
    </div>
    <div class="right">
        <div class=" date">
            <label class = "title"> <span id = "dot">•</span><?php echo $viewArt['Title']?><span id = "dot">•</span> </label>
            <p id="date"><?php echo $viewArt['Published_date']?> </p>
        </div>
       
        <div class="description">
            <p>
            <?php echo $viewArt['Art_description']?>
            </p>
        </div>
        <div class="artist">
            <a href="#" id="userName"><?php echo $viewArt['Artist_username']?></a>
        </div>
        <div class="comments">
        <?php if($viewArt['disabel_comment']==true){
          $display = "display:none; ";
        }else{
          $display = "display:block; ";
        }
          ?>

          <button class="btn comment-btn " type="button"  onclick="viewArt('commentsView')"style= "<?php echo $display ?>"> Comments </button>
        </div>  
       
    </div>
    

      

  </div>   
  
  <?php 
 $comments = array();
  $conn = mysqli_connect("localhost","root","","RAQASH");
  $comments_query_result = mysqli_query($conn, "SELECT * FROM Comment WHERE Art_work_id= '$id'");
  $comments = mysqli_fetch_all($comments_query_result, MYSQLI_ASSOC);
?>

 <div class="container" id="commentsPost">

   <button type="button" id="back" class="close" aria-label="Close">
     <span aria-hidden="true">&larr;</span>
   </button>

   <div class="commentsArea">
     <div class="list-group">
     
     <?php foreach ($comments as $comment): ?>
       <a href="#" class="list-group-item list-group-item-action">
         <p id="Commentusername"> <?php echo $comment['Vistor_username']; ?> :</p>
         <?php echo $comment['Text']; ?>
       </a>
       <?php endforeach ?>
     </div>
     <div class="addCommentArea">
     <form action="comment.php" method="post">
     <input type="hidden" name="action" value="<?php echo $id ?>" /> 
       <textarea name="addcomment" id="commentTextArea" cols="40" rows="3" placeholder="write a comment"></textarea>

     </div>

     <div id="submitButton"> <input name ="commentButton" type="submit" value="submit"> </div>
     </form>




   </div>
 </div>


 <?php     }
?>

  
  
<!-- Foter -->
<div class = "footer">&copy;RAQASH Team 2020</div>


    </body>
    </html>
