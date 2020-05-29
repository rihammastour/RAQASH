<?php
session_start();
if($_SESSION['username']==''  || $_SESSION['roll'] != 'Artist'){

header("Location:index.php");
exit;
}
$username =$_SESSION['username'];


include 'php/connectdatabase.php'; 
$disable=0;
if (isset($_POST['postart'])){
if(!empty($_POST['disableComment']))
$disable=1;
   $title= $_POST['Title'];
   $desc= $_POST['desc'];
   $artName = time().'_'.$_FILES['postArt']['name'];
   $target = 'images/' .$artName;

   date_default_timezone_set('UTC');
   $date = date('Y-m-d');
  
   if (move_uploaded_file( $_FILES['postArt']['tmp_name'], $target)){
   
$SQL = "INSERT INTO ArtWork(Title,img,Art_description,Artist_username ,Published_date,disabel_comment) VALUES ('$title','$artName','$desc','$username','$date','$disable')";

if (mysqli_query($conn, $SQL)){
    echo '<script language="javascript">';
    echo 'alert("  NEW ART WORK ADDED SUCCESFULLY")';
    echo '</script>';
    
     }else {
           echo "Error: " . $SQL . "<br>" . mysqli_error($conn);
      } 
    
  
  
}
header("location:ArtistStudio.php");


} 



?>




 



