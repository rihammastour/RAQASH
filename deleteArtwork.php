<!-- delete ArtWork -->

<?php
include 'php/connectdatabase.php'; 
if (isset($_GET['id'])){
    $deltedID= $_GET['id'];
    $SSQL= "SELECT * FROM ArtWork WHERE AId ='$deltedID'";
 
    // $Sresult =mysqli_query($conn, $SSQl);
    if ( $Sresult =mysqli_query($conn, $SSQL)){
        $sql = "SELECT * FROM Favourite WHERE Artwork_id = '$deltedID'";
        $result2 =mysqli_query($conn, $sql);
        if(mysqli_num_rows($result2) !=0){
            $FDSQL= "DELETE FROM Favourite WHERE  Artwork_id = '$deltedID' ";
        }


        
         }else {
               echo "Error: " . $SSQL . "<br>" . mysqli_error($conn);
          }
    $deleteRow= mysqli_fetch_array($Sresult);
    $artWorkName=  $deleteRow['img'];
    $path ="images/".$artWorkName;
    if (unlink($path)){
    $DSQL= "DELETE FROM ArtWork WHERE  AId = '$deltedID' ";
    if(mysqli_query($conn,$DSQL)){
        echo '<script language="javascript">';
        echo 'alert("  NEW ART WORK ADDED ")';
        echo '</script>';
    }else{
        echo "Error: " . $DSQL . "<br>" . mysqli_error($conn);
    }
 }

}   
header("location:ArtistStudio.php");

 ?>