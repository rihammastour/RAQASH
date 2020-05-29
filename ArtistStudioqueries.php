<?php


$username2 = $_SESSION['username'];
include 'php/connectdatabase.php'; 

 $query1 = "SELECT * FROM ArtWork ORDER BY AId DESC";
 $result = mysqli_query($conn, $query1);
 $arts = mysqli_fetch_all($result,MYSQLI_ASSOC);?>

 <?php 
 
 $sql = "SELECT * FROM Artist where ARusername ='$username2';";
 $result1 = mysqli_query($conn, $sql);
 $bio= mysqli_fetch_array($result1);


 ?>