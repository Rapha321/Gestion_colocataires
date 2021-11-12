<?php session_start (); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Ajout location</title>
    <meta name="viewport" content= "width=device-width, initial-scale=1.0">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/1183c3861a.js" crossorigin="anonymous"></script>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .jumbotron {
            width: 50%;
            margin-top: 1%;
            margin-left: 25%;
            padding-left: 10vw;
            padding-top: 3%;
        }

        .container1 {
            margin: auto;
        }

    </style>
</head>


<body>

    <?php 
        include('header.php');
    ?>

    <form enctype="multipart/form-data" method="POST" action="validerAjoutLocation.php" data-ajax='false'>

        <div class="jumbotron">
            <div class="container1">
                <h3>Ajouter un location:</h3>
                <br>
                <table>
                    <tr>
                        <td>Type :</td>
                        <td> 
                            <select name="types" >
                                <option value="Studio">Studio</option>
                                <option value="Chambre">Chambre</option>
                                <option value="Maison">Maison</option>
                                <option value="Appartment">Appartment</option>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td>Grandeur :</td>
                        <td>
                        <select name="grandeur" >
                                <option value="neutre">-</option>
                                <option value="1 1/2">1 1/2</option>
                                <option value="2 1/2">2 1/2</option>
                                <option value="3 1/2">3 1/2</option>
                                <option value="4 1/2">4 1/2</option>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td>Description: &nbsp;</td>
                        <td>
                            <textarea name="descr" cols="40" rows="4"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Bail :</td>
                        <td> 
                            <select name="bail" >
                                <option value="Annuel">Annuel</option>
                                <option value="Mensuel">Mensuel</option>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td>Montant :</td>
                        <td>
                            <input type="text" name="montant">$
                        </td>
                    </tr>
                    <tr>
                        <td>Meubler :</td>
                        <td>
                            <select name="meubler">
                                <option value="Neutre">Neutre</option>
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                     <td>Fumeur acceptable:</td>
                        <td>
                            <select name="fumeur">
                                <option value="Neutre">Neutre</option>
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                     <td>Animal domestique:</td>
                        <td>
                            <select name="animal">
                                <option value="Neutre">Neutre</option>
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                     <td>Electricité inclus:</td>
                        <td>
                            <select name="electricite">
                                <option value="Neutre">Neutre</option>
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                     <td>Chauffage inclus:</td>
                        <td>
                            <select name="chauffage">
                                <option value="Neutre">Neutre</option>
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                     <td>Ville :</td>
                        <td>
                            <select name="ville">
                                <option value="neutre">Neutre</option>
                                <option value="Montreal">Montreal</option>
                                <option value="Toronto">Toronto</option>
                                <option value="Ottawa">Ottawa</option>
                                <option value="Halifax">Halifax</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                     <td>Rue :</td>
                        <td>
                            <input type="text" name="rue">
                        </td>
                    </tr>
                    <tr>
                        <td>Province :</td>
                        <td>
                            <select name="province">
                                <option value="Quebec">Quebec</option>
                                <option value="Ontatio">Ontatio</option>
                                <option value="Nova Scotia">Nouvelle Ecosse</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                     <td>Pays :</td>
                        <td>
                            <input type="text" name="pays">
                        </td>
                    </tr>
                    <tr>
                     <td>Code Postal :</td>
                        <td>
                            <input type="text" name="codepostal">
                        </td>
                    </tr>
                    <tr>
                     <td>Longitude :</td>
                        <td>
                            <input type="text" name="longitude">
                        </td>
                    </tr>
                    <tr>
                     <td>Latitude :</td>
                        <td>
                            <input type="text" name="latitude">
                        </td>
                    </tr>
                    <tr>
                        <td>Photo :</td>
                        <td>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02" name="pic_N" >
                            </div>
                        </td>
                    </tr>
                </table>

                <br>

                <input type="submit" value="Ajouter" class="btn btn-success">
                <a href="profileProprietaire.php"><input type="button" value="Annuler" class="btn btn-secondary"> </a>

            </div>
        </div>
    
    </form>

</body>

</html>