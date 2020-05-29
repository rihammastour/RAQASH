<?php
include 'php/connectdatabase.php';
session_start();
if($_SESSION['username']=='' || $_SESSION['roll'] != 'Vistor'){

header("Location:index.php");
exit;
}
$username =$_SESSION['username'];

if(isset($_POST['commentButton']) ){
    if(!empty($_POST['addcomment'])){
    $comment=$_POST['addcomment'];
    $postId=$_POST['action'];

 
    date_default_timezone_set('UTC');
    $date = date('Y-m-d');
 
    $query ="INSERT INTO Comment (Date,Text,CId,Vistor_username,Art_work_id) VALUES ('$date','$comment',null,'$username' , '$postId')";
    $result = mysqli_query($conn, $query);  

    if ($result){
        echo '<script language="javascript">';
        echo 'alert("ART WORK UPDATED  SUCCESFULLY")';
        echo '</script>';
         }else {
               echo "Error: " . $query . "<br>" . mysqli_error($conn);
          } 
     }
     
    }
    header('Location:viewArtWork1.php?id='.$postId.'');    
?>