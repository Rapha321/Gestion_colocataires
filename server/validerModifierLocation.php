<?php

    session_start ();
    include('Configuration.php');

    $types = isset($_POST['types_N']) ? $_POST['types_N'] : null;
    $grandeur = isset($_POST['grandeur_N']) ? $_POST['grandeur_N'] : null;
    $descr = isset($_POST['descr_N']) ? $_POST['descr_N'] : null;
    $bail = isset($_POST['bail_N']) ? $_POST['bail_N'] : null;
    $montant = isset($_POST['montant_N']) ? intval($_POST['montant_N']) : null;
    $meubler = isset($_POST['meubler_N']) ? $_POST['meubler_N'] : null;
    $fumeur = isset($_POST['fumeur_N']) ? $_POST['fumeur_N'] : null;
    $animal = isset($_POST['animal_N']) ? $_POST['animal_N'] : null;
    $electricite = isset($_POST['electricite_N']) ? $_POST['electricite_N'] : null;
    $chauffage = isset($_POST['chauffage_N']) ? $_POST['chauffage_N'] : null;
    $ville = $_POST['ville_N'] != "neutre" ? $_POST['ville_N'] : "";
    $province = isset($_POST['province_N']) ? $_POST['province_N'] : null;
    $rue = isset($_POST['rue_N']) ? $_POST['rue_N'] : null;
    $pays = isset($_POST['pays_N']) ? $_POST['pays_N'] : null;
    $codepostal = isset($_POST['codepostal_N']) ? $_POST['codepostal_N'] : null;
    $longitude = isset($_POST['longitude_N']) ? floatval($_POST['longitude_N']) : null;
    $latitude = isset($_POST['latitude_N']) ? floatval($_POST['latitude_N']) : null;

    $id_L = $_GET['id_L'];
    $id_L = intval($id_L);

    // Mise a jour du database location avec le nouveau information saisie
    $req = $bdd->prepare("UPDATE `locations` 
                          SET `types` = ?, `grandeur` = ?, `descriptions` = ?, `bail` = ?, `montantloyer` = ?, `meubler` = ?, 
                         `fumeur` = ?, `animal` = ?, `electricite` = ?, `chauffage` = ?, `ville` = ?, `province` = ?, `street` = ?, 
                         `pays` = ?, `codePostal` = ?, `latitude` = ?, `longitude` = ?
                          WHERE id_location = ?");

    try  {
        $req->execute([$types,$grandeur, $descr, $bail, $montant, $meubler, $fumeur, $animal, $electricite, 
        $chauffage, $ville, $province, $rue, $pays, $codepostal, $latitude, $longitude, $id_L]);
        echo "Location mise a jour avec success!";
        header("location:profileProprietaire.php");
    }
    catch(PDOException $e) {
        echo "Probleme de connection: <br>" . $e->getMessage() ;
    }

    $req->closeCursor();


?>
