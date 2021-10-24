<?php

    include('Configuration.php');

    $jeSuisUn = $_POST['jeSuisUn'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($jeSuisUn == "locataire") 
    {
        $select = $bdd->query('SELECT * FROM locataire');
    } 
    else if ($jeSuisUn == "proprietaire") 
    {
        $select = $bdd->query('SELECT * FROM proprietaire');
    } 

    $valider = false;

    while($donnees = $select->fetch())
    {
        if ($email == $donnees['email'] && $password == $donnees['password']) 
        {
            header("location:GestionEtudiant.php");
            $valider = true;
        } 
    }

    if ($valider == false) 
    {

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Login</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="../styles/style.css">

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>

        <div class="jumbotron">

            <h5>Erreur: L'information saisie ne pas correct. Veuillez re-essayer!</h5>
            <br>
            <a href="../client/login.html"><input type="submit" value="Retour" class="btn btn-warning"> </a>

        </div>

    </body>

</html>

<?php 
}
?>