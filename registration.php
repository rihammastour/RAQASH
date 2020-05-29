<?php

 include 'php/connectdatabase.php'; 

session_start();

// check if user input not empty. 
 if (empty($_POST["username"])) {
    header("Location:index.php?username='t'");
    exit; }

 if (empty($_POST['email'])) {
    header("Location:index.php?email='t'");
    exit; } 

if (empty($_POST["name"])) {
    header("Location:index.php?name='t'");
    }

if (empty($_POST["password"])) {
    header("Location:index.php?password='t'");
    exit; }

if (empty($_POST["repassword"])) {
    header("Location:index.php?repassword='t'");
    exit; }

    

                 
  #All input  
$password = $_POST['password'];  
$repassword = $_POST['repassword']; 
$username = "@".$_POST['username'];  
$email = $_POST['email'];  
$name = $_POST['name'];
$about_Artist = $_POST['about-artist'];

//encrypt 
$pass= md5($password);
$passrep= md5($repassword);


// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
header("Location:index.php?wrongemail='r'");
exit; }


 
//check if password and repassword machinig  
if(strcmp( $pass , $passrep ) != 0){
 header("Location:index.php?match='r'");
 exit; } 




// chack if exist
    $sqlValidate= " SELECT users 
                    FROM allusers
                    WHERE users = '$username'" ;

$result= mysqli_query($conn,$sqlValidate);
$accountsArray =array();

if( mysqli_num_rows($result) != 0){
    while($row = mysqli_fetch_assoc($result)){ 
     $accountsArray[]=$row;
    }}

    $lenght = count($accountsArray);

    
    if($lenght == 1){ // alardy exist 
        header("Location:index.php?taken='r'");
        exit;
}else{
    
    if(!(empty($_POST['artist']))){
        $reg="INSERT INTO `Artist`(`ARusername`, `name`, `ARpassword`, `email`, `admin_username`, `bio`, `Approved` )
         VALUES ('$username','$name','$pass','$email','admin','$about_Artist', false)"; 
        $roll="Artist";
        $url="index.php?approval='t'.php";
               
    }else{
        $reg="INSERT INTO `Vistor`(`Vusername`, `Vpassword`, `email`, `name`) VALUES ('$username','$pass','$email','$name')";
        $roll="Vistor";
        $url='VistorHomePage.php';
    }


    if (mysqli_query($conn, $reg)){
      $_SESSION['roll']=$roll;
      $_SESSION['name']=$accountsArray[0]['name'];
      $_SESSION['username']=$username;
    header("Location:$url");
    
         }else {
               echo "Error: <br>" . mysqli_error($conn);
          }
    
}



?>