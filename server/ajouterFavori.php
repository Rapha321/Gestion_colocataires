<?php

    session_start ();
    include('Configuration.php');

    $id_locataire = intval($_SESSION['id']);
    $id_location = intval($_GET['id_L']);

    $favoriExist = false;
    $check = $bdd->prepare("SELECT * FROM favori");
    $check->execute();
    $info = $check->fetchAll();
    for ($i=0; $i < sizeof($info); $i++)
    {
        if ($info[$i]['locations'] == $id_location && $info[$i]['locataire'] == $id_locataire ) 
        {
            echo "Vous avez deja cet location dans votre favori!";
            $favoriExist = true;
            header("location:rechercheLocation.php");
        }
    }


    if ($favoriExist == false)
    {
        $req = $bdd->prepare("INSERT INTO favori (locations, locataire) VALUES (?,?)"); 
    
        try  {
            $req->execute([$id_location, $id_locataire]);
            echo "Location favori ajouter avec success!";
            header("location:rechercheLocation.php");
        }
        catch(PDOException $e) {
            echo "Probleme de connection: <br>" . $e->getMessage() ;
        }
    }

    $req->closeCursor();

?>

