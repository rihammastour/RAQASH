 <?php

session_start();
if($_SESSION['username']=='' || $_SESSION['roll'] != 'Artist'){

header("Location:index.php");
exit;
}


include 'php/connectdatabase.php'; 


if (isset($_POST['modify'])){

    $aid=$_POST['action'];

    $SQLupdateArtwork = "SELECT * FROM ArtWork WHERE AId ='$aid'";
    $resultUpdateArtwork = mysqli_query($conn, $SQLupdateArtwork);
    $artwork = mysqli_fetch_array($resultUpdateArtwork);

    $modTitle = $artwork['Title'];
    $modDesc = $artwork['Art_description'];
    $disable= $artwork['disabel_comment'];

if(!empty($_POST['Title']))
    $modTitle= $_POST['Title'];
if(!empty($_POST['desc']))
    $modDesc= $_POST['desc'];
if(!empty($_POST['disableComment'])){
      $disable=1;
    }
    
    $sql1 ="UPDATE ArtWork SET Title='$modTitle',Art_description ='$modDesc',disabel_comment='$disable' WHERE  AId='$aid' ";
   
   if (mysqli_query($conn, $sql1)){
    echo '<script language="javascript">';
    echo 'alert("ART WORK UPDATED  SUCCESFULLY")';
    echo '</script>';
     }else {
           echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
      } 
 


    }




header("location:ArtistStudio.php");
 ?>