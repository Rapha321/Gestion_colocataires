<?php

    include('Configuration.php');
    session_start();

    $etoile = $_POST['etoile'];
    $description = $_POST['description'];
    $id_location = $_GET['id_Location'];
    $id_locataire = $_SESSION['id'];
    

        // $mysqli = new mysqli('localhost','root','','gestion_coloc');
        
        // $query = "INSERT INTO review_location (etoile, description, id_locataire, id_location) VALUES ($etoile, '$description', $id_locataire, $id_location)";

        // $exec = mysqli_query($mysqli, $query);

        // if ($exec) {
        //     echo "Review ajouter avec success!";
        // }
        // else {
        //     echo mysqli_error($mysqli);
        // }



    $req = $bdd->prepare("INSERT INTO review_location (etoile, description, id_locataire, id_location) VALUES ($etoile, '$description', $id_locataire, $id_location)");

    $req->execute();

    header("location:detailLocation.php?id_L=$id_location");

    $req->closeCursor();

?>
