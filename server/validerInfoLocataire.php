<?php

    include('Configuration.php');

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $descr = $_POST['description'];
    $pic = $_POST['pic'];

    $req = $bdd->prepare("UPDATE locataire 
                          INNER JOIN (SELECT MAX(id_locataire) AS maxId FROM locataire) b 
                          ON locataire.id_locataire = b.maxId 
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
