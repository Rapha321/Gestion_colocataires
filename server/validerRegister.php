<?php

    include('Configuration.php');

    $jeSuisUn = $_POST['jeSuisUn'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    if ($jeSuisUn == "locataire") 
    {
        $req = $bdd->prepare("INSERT INTO locataire (email, pwd) VALUES (:email, :pwd)");
        $req->execute([':email' => $email, ':pwd' => $pwd]);
        header("location:../client/infoLocataire.html");
        
    } 
    else if ($jeSuisUn == "proprietaire") 
    {
        $req = $bdd->prepare("INSERT INTO proprietaire (email, pwd) VALUES (:email, :pwd)");
        $req->execute([':email' => $email, ':pwd' => $pwd]);
        header("location:../client/infoProprietaire.html");
    } 

?> 