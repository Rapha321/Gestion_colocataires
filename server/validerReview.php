<?php

    include('Configuration.php');
    session_start();

    $etoile = $_POST['etoile'];
    $description = $_POST['description'];
    $id_location = $_GET['id_Location'];
    $id_locataire = $_SESSION['id'];
    
    $req = $bdd->prepare("INSERT INTO review_location (etoile, description, id_locataire, id_location) 
                          VALUES ($etoile, '$description', $id_locataire, $id_location)");

    $req->execute();

    header("location:detailLocation.php?id_L=$id_location");

    $req->closeCursor();

?>
