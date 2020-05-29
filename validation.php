<?php


 include 'php/connectdatabase.php'; 
session_start();

// check if user input not empty. 


  #All input  
$username = "@".$_POST['username'];  
$password = $_POST['pass'];  

if (empty($username) || empty($password) ) {
  header("Location:index.php?Ferror='t'");
  exit; }
                 

//encrypt 
$pass= md5($password);

// chack if exist
    // Artist
    $sqlValidate= " SELECT ARusername , ARpassword , name , Approved
                    FROM Artist
                    WHERE ARusername = '$username' And ARpassword='$pass'" ;
$result=mysqli_query($conn, $sqlValidate);

$accountsArray =array();

if( mysqli_num_rows($result) != 0){
    while($row = mysqli_fetch_assoc($result)){ 
     $accountsArray[]=$row;
    }}

    $lenght = count($accountsArray);

    if($lenght == 1){

      //check if approved or not yet

      if($accountsArray[0]['Approved']==false){
        header("Location:index.php?approval='t'");
        exit;
      }else{

    $_SESSION['roll']="Artist";
    $_SESSION['username']=$username;

  header('location:ArtistStudio.php'); }
}else{

// chack if exist
   //Vsitor
     $sqlValidate= " SELECT Vusername , Vpassword , name
      FROM Vistor
      WHERE Vusername = '$username' And Vpassword='$pass'" ;

    $result= mysqli_query($conn,$sqlValidate);
    $accountsArray =array();

    if( mysqli_num_rows($result) != 0){
    while($row = mysqli_fetch_assoc($result)){ 
    $accountsArray[]=$row;
    }}

    $lenght = count($accountsArray);

    if($lenght == 1){
      $_SESSION['roll']= "Vistor";
      $_SESSION['name']= $accountsArray[0]['name'];
      $_SESSION['username']=$username;
    header('Location:VistorHomePage.php');
    }else{

// chack if exist
// Admin

      $sqlValidate= "SELECT Ausername
                     FROM Admin 
                     WHERE Ausername='$username' and Apassword='$pass' " ;
    $result=mysqli_query($conn, $sqlValidate);
    $accountsArray =array();

      if( mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)){ 
        $accountsArray[]=$row;
        }}
    
        $lenght = count($accountsArray);

        if($lenght == 1){
          $_SESSION['roll']="Admin";
          $_SESSION['username']=$username;
        header('Location:adminpage.php');
        exit;
        }else{ 
       header("Location:index.php?Ferror='t'");
    exit; }

}
}

?>