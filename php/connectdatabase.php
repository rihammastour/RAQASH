
<?php
    DEFINE('DB_USER','root');
    DEFINE('DB_PSWD','');
    DEFINE('DB_HOST','localhost');
    DEFINE('DB_NAME','RAQASH');
    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PSWD);
    if (!$conn)
        die("Connection failed.");

    if(!mysqli_select_db($conn, DB_NAME))
        die("Could not open the ".DB_NAME." database.");
        
       
?>

