<?php

    include('Configuration.php');

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $descr = $_POST['description'];
    

    $upload_status = FALSE;
    if(isset($_FILES['pic']))
    {
        echo 'picture set <br>';
    }
    else
    {
        echo 'picture not set <br>';
    }

    if (isset($_FILES['pic']) && file_exists($_FILES['pic']['tmp_name']))
    {
        $image = $_FILES['pic']['tmp_name'];

        //~ Check if image is an image
        if (@getimagesize($image))
        {
            $upload_status = TRUE;
            $name = $_FILES['pic']['name'];
            move_uploaded_file($image, "../images/$name");
        }
    }

    $pic=basename( $_FILES["pic"]["name"],".jpg");


    $req = $bdd->prepare("UPDATE proprietaire 
                          INNER JOIN (SELECT MAX(id) AS maxId FROM proprietaire) b 
                          ON proprietaire.id = b.maxId 
                          SET nom=:nom,
                              prenom = :prenom,
                              descriptions = :descr,
                              pic = :pic");

    $req->execute(array(
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':descr' => $descr,
        ':pic' => $pic
    ));

    header("location:profileProprietaire.php");

    $req->closeCursor();

?>