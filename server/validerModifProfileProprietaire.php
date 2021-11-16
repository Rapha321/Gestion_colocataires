<?php

    session_start ();
    include('Configuration.php');

    $id = $_SESSION['id'];
    $nom = $_POST['nom_N'];
    $prenom = $_POST['prenom_N'];
    $descr = $_POST['descr_N'];

    // Mise a jour le database du proprietaire avec les information additionnel saisie
    if (isset($nom) && isset($prenom) && isset($descr))
    {
        $update = $bdd->prepare("UPDATE proprietaire 
                                 INNER JOIN (SELECT id AS id FROM proprietaire WHERE id=:id) b 
                                                ON proprietaire.id = b.id 
                                 SET nom = :nom, 
                                     prenom = :prenom,
                                     descriptions = :descr;");
        
        if ($update->execute(array(
            ':id' => $id,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':descr' => $descr
        ))) {
            header("location:profileProprietaire.php");
        }
    }
    
    else 
    {
?>

<!-- Si le nom, prenom ou description ne pas saisie, affiche un message d'erreur -->
    <!DOCTYPE html>
    <html>

        <head>
            <title>Login</title>
            <meta name="viewport" content= "width=device-width, initial-scale=1.0">

            <!-- CSS -->
            <link rel="stylesheet" type="text/css" href="../styles/style.css">

            <!-- BOOTSTRAP -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        </head>

        <body>

            <div class="jumbotron">
                <h5>Erreur: Veuillez saisir toutes les informations!</h5>
                <br>
                <a href="modifierProfileProprietaire.php"><input type="button" value="Retour" class="btn btn-warning"> </a>
            </div>

        </body>

    </html>

<?php 
    }
?>
