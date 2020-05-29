<?php
session_start();
if($_SESSION['username']=='' || $_SESSION['roll'] != 'Admin'){

header("Location:index.php");
exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- php -->
<?php include 'php/connectdatabase.php'; ?> 

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admain page</title>
    <link rel="icon" href="assets/raqash_icon.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
<!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="JS/adminpage.js"> </script>
    <link rel="stylesheet" type="text/css" href="CSS/adminpage.css">
</head>
<body>




    <!-- Nav Bar -->
    <header class="menu-bar">
        <nav>
            <ul>
                <li id ="Gsize"><a href="adminpage.php">requests</a></li>

                <!-- dropdown menue -->
          

                  <!-- logo -->
                <img src="assets/raqashlogo.png" alt="RAQASH Logo">

                <div class = "drop">
                  <li class = "dropAccount"><a href="#">ACCOUNT▽</a></li>
                    <div class = "dropContent">

                        <a href="logout.php">LOG OUT</a>
                    </div>
                </div>
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
  <label class = "title"> <span id = "dot">•</span> ACCOUNTS WAITING LIST <span id = "dot">•</span> </label>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div  class="accounts" >
    <ul class="list-group scrollbar-ripe-malinka">
 
    <?php   
 
      $sql = "SELECT ARusername , bio
             FROM Artist
             WHERE approved='false'";

     $result = mysqli_query($conn,$sql);
     $accountsArray =array();
    

if( mysqli_num_rows($result) != 0){
     while($row = mysqli_fetch_assoc($result)){ 
      $accountsArray[]=$row;
     }}

     $lenght = count($accountsArray);

  

if($lenght == 0){
echo "No Accounts to be approved";
      }else{ for ($i=0; $i <$lenght ; $i++) { ?>

<li class="list-group-item"><label><input type="checkbox" class="get_value" name="ch[]"value="<?php echo $accountsArray[$i]['ARusername']; ?>"> <?php echo $accountsArray[$i]['ARusername']; ?> </label>
          <!--  <span class="float-right"> <button type="button" class="btn" data-toggle="collapse" data-target=".toggle collapse"> &vee;</button></span>-->
           <div class="artistInfo"  ><?php echo $accountsArray[$i]['bio']; ?> </div>
        </li>  
        
        

        <?php }?>
        </ul>

        <div class = "Approvalbutton" >
                <input id='approve' type="submit" name="submit" value="Approve">
              <input type="submit" type="submit" name="disapprove" value="Disapprove">
              </div> <?php } ?> 


      </div>

      <script>
function load(){
	window.location.href="adminpage.php";
}
</script>

      <?php
  

    if(isset($_POST['submit']) ){
      if(!empty($_POST['ch'])){
   $check=$_POST['ch'];
   $count = count($check);
  for ($i=0; $i < $count; $i++) { 
   $approveduser = $check[$i];

   $query ="UPDATE Artist
   SET approved=True
   WHERE ARusername = '$approveduser'";
$result = mysqli_query($conn, $query);  

  }
}

echo "<script>";
echo "load();";
echo "</script>";
    }

  if(isset($_POST['disapprove']) ){
    if(!empty($_POST['ch'])){
    $check=$_POST['ch'];
    $count = count($check);
 
   for ($i=0; $i < $count; $i++) { 
    $nonapproveduser = $check[$i];
 
    $query ="DELETE FROM Artist 
    WHERE ARusername='$nonapproveduser'";
 $result = mysqli_query($conn, $query);  
 
   }

   }
  	echo "<script>";
	echo "load();";
	echo "</script>";
    }

  ?>
  </div>
  </form>

  
  
<!-- Foter -->
<div class = "footer">&copy;RAQASH Team 2020</div>


    </body>
    </html>
