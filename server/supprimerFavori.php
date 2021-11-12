<?php 

    session_start ();
    include('Configuration.php');

    $id_F = intval($_GET['id_F']);

    $req = $bdd->prepare("DELETE FROM `favori` 
                          WHERE id_favori = ?");

    try  {
        $req->execute([$id_F]);
        echo "Favori supprimer avec success";
        header("location:profileLocataire.php");
    }
    catch(PDOException $e) {
        echo "Probleme de connection: <br>" . $e->getMessage() ;
    }

    $req->closeCursor();

?>