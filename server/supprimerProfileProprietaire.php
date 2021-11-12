<?php 

    session_start ();
    include('Configuration.php');

    $id_L = $_GET['id_L'];
    $id_L = intval($id_L);

    $req = $bdd->prepare("DELETE FROM `proprietaire` 
                          WHERE id = ?");

    try  {
        $req->execute([$id_L]);
        echo "Proprietaire supprimer avec success";
        session_unset(); 
        session_destroy(); 
        header("location:../client/login.html");
    }
    catch(PDOException $e) {
        echo "Probleme de connection: <br>" . $e->getMessage() ;
    }

    $req->closeCursor();

?>