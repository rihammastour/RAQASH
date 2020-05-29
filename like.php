<?php
include 'php/connectdatabase.php';
session_start();
if($_SESSION['username']=='' || $_SESSION['roll'] != 'Vistor'){

header("Location:index.php");
exit;
}
$username =$_SESSION['username'];

 if (!empty($_POST['likeAction']) && $_POST['likeAction'] == 'like') {

             $id = $_POST['artid'];
             $sql = "INSERT INTO likes ( Vistor_username , Artwork_id) VALUES ('$username','$id')";
             mysqli_query($conn, $sql);

             $sql ="UPDATE ArtWork SET Number_of_like = Number_of_like+1  WHERE AId = '$id' ";
             mysqli_query($conn, $sql);
 }

 if (!empty($_POST['dislikeAction']) && $_POST['dislikeAction'] == 'dislike') {
            $id = $_POST['artid'];
            $vistor = $_SESSION['Vusername'];
            $sql = "INSERT INTO likes ( Vistor_username , Artwork_id) VALUES ('$username','$id')";
            mysqli_query($conn, $sql);
            $sql ="UPDATE ArtWork SET Number_of_dislike =  Number_of_dislike+1 WHERE AId = '$id' ";
            mysqli_query($conn, $sql);
} 
            mysqli_close($conn);


?>