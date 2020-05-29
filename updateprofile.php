<?php
include 'php/connectdatabase.php'; 
session_start();
if($_SESSION['username']=='' || $_SESSION['roll']=='' || $_SESSION['roll'] != 'Artist'){

header("Location:index.php");
exit;
}
$name= $_SESSION['name'];
$username =$_SESSION['username'];

$SQLupdate = "SELECT * FROM Artist WHERE ARusername ='$username'";
$resultUpdate = mysqli_query($conn, $SQLupdate);
$Artist = mysqli_fetch_array($resultUpdate);


$name = $Artist['name'];
$email = $Artist['email'];
$bio = $Artist['bio'];
$twitter = $Artist['twitter'];


if (isset($_POST['Save'])){
   if(!empty($_POST['name']))
    $name= $_POST['name'];
   if(!empty($_POST['bio']))
    $bio= $_POST['bio'];
   if(!empty($_POST['email']))
    $email=$_POST['email'];
   if(!empty($_POST['twitter']))
    $twitter= $_POST['twitter'];

   

    $sql1 ="UPDATE  Artist SET name='$name', bio='$bio',email='$email',twitter= '$twitter' WHERE ARusername ='$username' ";
   
   if (mysqli_query($conn, $sql1)){
    echo '<script language="javascript">';
    echo 'alert("PROFILE  UPDATED  SUCCESFULLY")';
    echo '</script>';
     }else {
        echo '<script language="javascript">';
        echo 'alert("<?php . $sql1 . "<br>" . mysqli_error($conn); ?>")';
        echo '</script>';
         
     }

      
   
} 
header("location:ArtistStudio.php");

 

 ?>