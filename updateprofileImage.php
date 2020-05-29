<?php
session_start();
if($_SESSION['username']=='' || $_SESSION['roll'] != 'Artist'){

header("Location:index.php");
exit;
}
$username =$_SESSION['username'];

include 'php/connectdatabase.php'; 
if (isset($_POST['profileImage1'])&&!empty($_POST['profileImage1'])){

   $modprofileimage = time().'_'.$_FILES['displayprofileimage']['name'];
   $target = 'images/' .$modprofileimage;
   if (move_uploaded_file( $_FILES['displayprofileimage']['tmp_name'], $target)){
    $sql = "UPDATE   Artist  SET account_image='$modprofileimage' WHERE ARusername= '$username'";

    if (mysqli_query($conn, $sql)){
       


echo '<script language="javascript">';
echo 'alert("PROFILE IMAGE UPDATED  SUCCESFULLY")';
echo '</script>';

   }else {
      
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  
    
   // }

}



} 
header("location:ArtistStudio.php");



?>
