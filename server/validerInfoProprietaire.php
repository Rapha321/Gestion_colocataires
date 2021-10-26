<?php

    include('Configuration.php');

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $descr = $_POST['description'];
    $pic = $_POST['pic'];

    $req = $bdd->prepare("UPDATE proprietaire 
                          INNER JOIN (SELECT MAX(id_proprietaire) AS maxId FROM proprietaire) b 
                          ON proprietaire.id_proprietaire = b.maxId 
                          SET nom=:nom,
                              prenom = :prenom,
                              descriptions = :descr,
                              pic = :pic ;");

    $req->execute(array(
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':descr' => $descr,
        ':pic' => $pic
    ));

    header("location:profileLocataire.php");

    $req->closeCursor();

?>