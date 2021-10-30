<?php session_start (); ?>

<!DOCTYPE html>
<html>

<head>
    <title>template</title>
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

    <form method="POST" action="validerModifProfileLocataire.php">

        <div class="jumbotron">
            <div class="container1">
                <h3>Formulaire de modification:</h3>
                <br>
                <table>
                    <tr>
                        <td>Nom :</td>
                        <td> <input type="text" value="<?php echo $_SESSION['donnees']['nom'] ?>" size="37" name="nom_N"> </td>
                    </tr>
                    <tr>
                        <td>Prenom :</td>
                        <td><input type="text" value="<?php echo $_SESSION['donnees']['prenom']?>" size="37" name="prenom_N"></td>
                    </tr>
                    <tr>
                        <td>Description: &nbsp;</td>
                        <td><textarea name="descr_N" id="" cols="40" rows="4" ><?php echo $_SESSION['donnees']['descriptions']?></textarea></td>
                    </tr>
                    <tr>
                        <td>Photo :</td>
                        <td>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02" name="pic_N">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                             <input type="submit" value="Modifier" class="btn btn-info">
                             <a href="profileLocataire.php"><input type="button" value="Annuler" class="btn btn-secondary"> </a>
                        </td>
                    </tr>
                </table>

                <br>

            </div>
        </div>
    
    </form>

</body>

</html>