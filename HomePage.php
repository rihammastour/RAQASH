<?php     


    $Artistquery = "SELECT * FROM Artist";
    $artistResult = mysqli_query($conn,$Artistquery);
?>

<?php 
    $queryArtwork = "SELECT * FROM ArtWork ORDER BY AId DESC";
    $resultArtwork = mysqli_query($conn,$queryArtwork);
    $artworkArray = array();
    
    if(mysqli_num_rows($resultArtwork)!=0)
    while($Artwork = mysqli_fetch_assoc($resultArtwork)){
        $artworkArray[] = $Artwork;
    }
$i = 0;

?>

<?php 
    // $viewArtworkId = $_POST['ViewArtID'];
    // $queryViewArt = "SELECT * FROM ArtWork WHERE AId = '$viewArtworkId' ORDER BY AId DESC";
    // $resultView = mysqli_query($conn,$queryViewArt);

    // $viewArt = mysqli_fetch_array($resultView);
    // echo json_encode($viewArt)

?>


