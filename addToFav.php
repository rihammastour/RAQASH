<?php
 session_start();
 include 'php/connectdatabase.php';
           
              $id = $_POST['artid'];
              $vistor = $_SESSION['username'];
              $sqlFav = "SELECT * 
                         FROM Favourite 
                         WHERE Artwork_id = '$id' AND Vistor_username ='$vistor'";
           $resultFav = mysqli_query($conn, $sqlFav);   
           if( mysqli_num_rows($resultFav) == 0){
            $sql = "INSERT INTO Favourite ( Vistor_username , Artwork_id) VALUES ('$vistor','$id')";
            mysqli_query($conn, $sql);
            
          }else{
            echo'<script>';
            echo'alert("You can\'t add to Favourite list")';
            echo'</script>';
          }
        
      

          

            // mysqli_close($conn);

?>