<?php

    include('Configuration.php');

    $jeSuisUn = $_POST['jeSuisUn'];
    $validation = false;

    if (isset($_POST['email']) && isset($_POST['password']))
    {
        if ($jeSuisUn == "locataire") 
        {
            $select = $bdd->query('SELECT * FROM locataire');
        }
        else
        {
            $select = $bdd->query('SELECT * FROM proprietaire');
        }
        
        while($donnees = $select->fetch())
        {
            if ($_POST['email'] == $donnees['email'] && $_POST['password'] == $donnees['pwd']) 
            {
                session_start (); 
                $_SESSION['email'] = $_POST['email']; 
                $_SESSION['password'] = $_POST['password']; 
                $_SESSION['donnees'] = $donnees;
                $validation = true;

                if ($jeSuisUn == "locataire") 
                {
                    header("location:profileLocataire.php"); // TO CHANGE
                } 
                else 
                {
                    header("location:profileProprietaire.php"); // TO CHANGE
                } 
            } 
        }    
    }
    
    if (!$validation)
    {
?>

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
                <h5>Erreur: L'information saisie ne pas correct. Veuillez re-essayer!</h5>
                <br>
                <a href="../client/login.html"><input type="submit" value="Retour" class="btn btn-warning"> </a>
            </div>

        </body>

    </html>

<?php 
    }
?>
