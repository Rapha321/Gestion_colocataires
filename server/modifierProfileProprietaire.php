<?php 
    session_start (); 
    include('Configuration.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>location-A-tous</title>
    <meta name="viewport" content= "width=device-width, initial-scale=1.0">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/1183c3861a.js" crossorigin="anonymous"></script>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .jumbotron {
            width: 50%;
            margin-top: 5%;
            margin-left: 25%;
            padding-left: 10vw;
        }

        .container1 {
            margin: auto;
        }

    </style>
</head>

<body>

    <?php 
        include('header.php');

        $id = $_SESSION['id'];
        $select = $bdd->prepare("SELECT * FROM proprietaire where id=?");
        $select->execute([$id]);
        $info = $select->fetch();
    ?>

    <form method="POST" action="validerModifProfileProprietaire.php">

        <div class="jumbotron">
            <div class="container1">
                <h3>Formulaire de modification:</h3>
                <br>
                <table>
                    <tr>
                        <td>Nom :</td>
                        <td> <input type="text" value="<?php echo $info['nom'] ?>" size="37" name="nom_N"> </td>
                    </tr>
                    <tr>
                        <td>Prenom :</td>
                        <td><input type="text" value="<?php echo $info['prenom']?>" size="37" name="prenom_N"></td>
                    </tr>
                    <tr>
                        <td>Description: &nbsp;</td>
                        <td><textarea name="descr_N" id="" cols="40" rows="4" ><?php echo $info['descriptions']?></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                             <input type="submit" value="Modifier" class="btn btn-info">
                             <a href="profileProprietaire.php"><input type="button" value="Annuler" class="btn btn-secondary"> </a>
                        </td>
                    </tr>
                </table>

                <br>

            </div>
        </div>
    
    </form>

</body>

</html>