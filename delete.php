<?php
 session_start();
 include 'php/connectdatabase.php';
          
             $id = $_POST['row_id'];
             $vistor = $_SESSION['username'];
            $sql = "DELETE FROM Favourite WHERE Artwork_id = '$id' AND Vistor_username = '$vistor' ";
            mysqli_query($conn, $sql);
            
            mysqli_close($conn);

?>