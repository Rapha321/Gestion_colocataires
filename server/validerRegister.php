<?php
    session_start();
    include('Configuration.php');

    $jeSuisUn = $_POST['jeSuisUn'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    if ($jeSuisUn == "locataire") 
    {
        $req = $bdd->prepare("INSERT INTO `locataire` (`email`, `pwd`) VALUES (?,?)");

        try  {
            $req->execute([$email, $pwd]);
            echo "Locataire ajout avec success!";

            $id = $bdd->lastInsertId();
            $_SESSION["id"] = $id;

            header("location:../client/infoLocataire.php");
        }
        catch(PDOException $e) {
            echo "Probleme de connection: <br>" . mysqli_error($conn) ;
        }
    } 

    else if ($jeSuisUn == "proprietaire") 
    {
        $req = $bdd->prepare("INSERT INTO proprietaire (email, pwd) VALUES (?,?)");
        try  {
            $req->execute([$email, $pwd]);
            echo "Proprietaire ajout avec success!";

            $id = $bdd->lastInsertId();
            var_dump($id);
            $_SESSION['id'] = $id;

            header("location:../client/infoProprietaire.php");
        }
        catch(PDOException $e) {
            echo "Probleme de connection: <br>" . $e->getMessage() ;
        }
    } 

    $req->closeCursor();

?> 