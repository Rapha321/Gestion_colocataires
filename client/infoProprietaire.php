<!DOCTYPE html>
<html>

<head>
    <title>location-A-tous</title>

    <!-- CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="../styles/infoProprietaire.css"> -->
    <link rel="stylesheet" href="../styles/infoProprietaire.css?v=<?php echo time(); ?>">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



</head>

<body>

    <div class="titre">
        <h1>Felicitation! </h1>
        <h4>Veuillez saisir les information suivantes:</h4>
    </div>

    <!-- Enregistrement d'un proprietaire -->
    <form enctype="multipart/form-data" method="POST" action="../server/validerInfoProprietaire.php" data-ajax='false' >
        <div class="jumbotron">
            <table>
                <tr>
                    <td>Nom :</td>
                    <td>
                        <input type="text" size="37.5" name="nom">
                    </td>
                </tr>
                <tr>
                    <td>Prenom : </td>
                    <td>
                        <input type="text" size="37.5" name="prenom">
                    </td>
                </tr>
                <tr>
                    <td>A propos de vous :</td>
                    <td><textarea name="description" id="" cols="40" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>Photo :</td>
                    <td>
                        <div class="input-group mb-3">
                            <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
                            <input type="file" class="form-control" id="inputGroupFile02" name="pic" capture>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Soumettre" class="btn btn-success">
                    </td>
                </tr>
            </table>
        </div>
    </form>

</body>

</html>