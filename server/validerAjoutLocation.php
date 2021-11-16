<?php

    session_start ();
    include('Configuration.php');

    $types = isset($_POST['types']) ? $_POST['types'] : null;
    $grandeur = isset($_POST['grandeur']) ? $_POST['grandeur'] : null;
    $descr = isset($_POST['descr']) ? $_POST['descr'] : null;
    $bail = isset($_POST['bail']) ? $_POST['bail'] : null;
    $montant = isset($_POST['montant']) ? intval($_POST['montant']) : null;
    $meubler = isset($_POST['meubler']) ? $_POST['meubler'] : null;
    $fumeur = isset($_POST['fumeur']) ? $_POST['fumeur'] : null;
    $animal = isset($_POST['animal']) ? $_POST['animal'] : null;
    $electricite = isset($_POST['electricite']) ? $_POST['electricite'] : null;
    $chauffage = isset($_POST['chauffage']) ? $_POST['chauffage'] : null;
    $ville = $_POST['ville'] != "neutre" ? $_POST['ville'] : "";
    $province = isset($_POST['province']) ? $_POST['province'] : null;
    $rue = isset($_POST['rue']) ? $_POST['rue'] : null;
    $pays = isset($_POST['pays']) ? $_POST['pays'] : null;
    $codepostal = isset($_POST['codepostal']) ? $_POST['codepostal'] : null;
    $longitude = isset($_POST['longitude']) ? floatval($_POST['longitude']) : null;
    $latitude = isset($_POST['latitude']) ? floatval($_POST['latitude']) : null;
    $id = intval($_SESSION['id']);

    // Uploader le photo 
    $upload_status = FALSE;
    if(isset($_FILES['pic_N']))
    {
        echo 'picture set <br>';
    }
    else
    {
        echo 'picture not set <br>';
    }

    if (isset($_FILES['pic_N']) && file_exists($_FILES['pic_N']['tmp_name']))
    {
        $image = $_FILES['pic_N']['tmp_name'];

        //~ Check if image is an image
        if (@getimagesize($image))
        {
            $upload_status = TRUE;
            $name = $_FILES['pic_N']['name'];
            move_uploaded_file($image, "../images/$name");
        }
    }

    // Sauvegarder le nom du photo
    $pic=basename( $_FILES["pic_N"]["name"],".jpg");

    // Ajouter une nouvelle location dans le database locations
    try  {
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $req = $bdd->prepare("INSERT INTO `locations` (`types`, `grandeur`, `descriptions`, `bail`, `montantloyer`, `meubler`, 
        `fumeur`, `animal`, `electricite`, `chauffage`, `ville`, `province`, `street`, `pays`, `codePostal`, `pic`, 
        `id_proprietaire`, `latitude`, `longitude`) 
         VALUES ('$types','$grandeur', '$descr', '$bail', '$montant', '$meubler', '$fumeur', '$animal', '$electricite', 
        '$chauffage', '$ville', '$province', '$rue', '$pays', '$codepostal', '$pic', '$id', '$latitude', '$longitude')"); 

        $req->execute();
        echo "Location added successfully!";
        header("location:profileProprietaire.php");
    }
    catch(PDOException $e) {
        echo "Probleme de connection: <br>" . $e->getMessage() ;
    }

    $req->closeCursor();

?>
