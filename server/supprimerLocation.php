<?php 

    session_start ();
    include('Configuration.php');

    $id_L = $_GET['id_L'];
    $id_L = intval($id_L);

    $req = $bdd->prepare("DELETE FROM `locations` 
                          WHERE id_location = ?");

    try  {
        $req->execute([$id_L]);
        echo "Location supprimer avec success";
        header("location:profileProprietaire.php");
    }
    catch(PDOException $e) {
        echo "Probleme de connection: <br>" . $e->getMessage() ;
    }

    $req->closeCursor();

?>