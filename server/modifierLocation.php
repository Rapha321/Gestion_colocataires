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

        $id_L = $_GET['id_L'];
        $id_L = intval($id_L);
        $req = $bdd->prepare("SELECT * FROM locations WHERE id_location='$id_L'");
        $req->execute();

        $info = $req->fetch();

    ?>

    <form method="POST" action="validerModifierLocation.php?id_L=<?php echo $info['id_location'] ?>">



        <div class="jumbotron">
            <div class="container1">
                <h3>Modifier location:</h3>
                <br>
                <table>
                    <tr>
                        <td>Type :</td>
                        <td> 
                            <select name="types_N" >
                                <option value="Studio" <?php if($info['types'] == "Studio") { echo "selected"; } ?>>Studio</option>
                                <option value="Chambre" <?php if($info['types'] == "Chambre") { echo "selected"; } ?>>Chambre</option>
                                <option value="Maison" <?php if($info['types'] == "Maison") { echo "selected"; } ?>>Maison</option>
                                <option value="Appartment" <?php if($info['types'] == "Appartment") { echo "selected"; } ?>>Appartment</option>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td>Grandeur :</td>
                        <td>
                        <select name="grandeur_N">
                                <option value="neutre" <?php if($info['grandeur'] == "neutre") { echo "selected"; } ?> >-</option>
                                <option value="1 1/2" <?php if($info['grandeur'] == "1 1/2") { echo "selected"; } ?> >1 1/2</option>
                                <option value="2 1/2" <?php if($info['grandeur'] == "2 1/2") { echo "selected"; } ?> >2 1/2</option>
                                <option value="3 1/2" <?php if($info['grandeur'] == "3 1/2") { echo "selected"; } ?> >3 1/2</option>
                                <option value="4 1/2" <?php if($info['grandeur'] == "4 1/2") { echo "selected"; } ?> >4 1/2</option>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td>Description: &nbsp;</td>
                        <td>
                            <textarea name="descr_N" cols="40" rows="4" ><?php echo $info['descriptions'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Bail :</td>
                        <td> 
                            <select name="bail_N" >
                                <option value="Annuel" <?php if($info['bail'] == "Annuel") { echo "selected"; } ?> >Annuel</option>
                                <option value="Mensuel" <?php if($info['bail'] == "Mensuel") { echo "selected"; } ?> >Mensuel</option>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td>Montant :</td>
                        <td>
                            <input type="text" name="montant_N" value="<?php echo $info['montantloyer'] ?>">$
                        </td>
                    </tr>
                    <tr>
                        <td>Meubler :</td>
                        <td>
                            <select name="meubler_N">
                                <option value="Neutre" <?php if($info['meubler'] == "Neutre") { echo "selected"; } ?> >Neutre</option>
                                <option value="Oui" <?php if($info['meubler'] == "Oui") { echo "selected"; } ?> >Oui</option>
                                <option value="Non" <?php if($info['meubler'] == "Non") { echo "selected"; } ?> >Non</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                     <td>Fumeur acceptable:</td>
                        <td>
                            <select name="fumeur_N">
                                <option value="Neutre" <?php if($info['fumeur'] == "Neutre") { echo "selected"; } ?> >Neutre</option>
                                <option value="Oui" <?php if($info['fumeur'] == "Oui") { echo "selected"; } ?> >Oui</option>
                                <option value="Non" <?php if($info['fumeur'] == "Non") { echo "selected"; } ?> >Non</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                     <td>Animal domestique:</td>
                        <td>
                            <select name="animal_N">
                                <option value="Neutre" <?php if($info['animal'] == "Neutre") { echo "selected"; } ?> >Neutre</option>
                                <option value="Oui" <?php if($info['animal'] == "Oui") { echo "selected"; } ?> >Oui</option>
                                <option value="Non" <?php if($info['animal'] == "Non") { echo "selected"; } ?> >Non</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                     <td>Electricité inclus:</td>
                        <td>
                            <select name="electricite_N">
                                <option value="Neutre" <?php if($info['electricite'] == "Neutre") { echo "selected"; } ?> >Neutre</option>
                                <option value="Oui" <?php if($info['electricite'] == "Oui") { echo "selected"; } ?> >Oui</option>
                                <option value="Non" <?php if($info['electricite'] == "Non") { echo "selected"; } ?> >Non</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                     <td>Chauffage inclus:</td>
                        <td>
                            <select name="chauffage_N">
                                <option value="Neutre" <?php if($info['chauffage'] == "Neutre") { echo "selected"; } ?> >Neutre</option>
                                <option value="Oui" <?php if($info['chauffage'] == "Oui") { echo "selected"; } ?> >Oui</option>
                                <option value="Non" <?php if($info['chauffage'] == "Non") { echo "selected"; } ?> >Non</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                     <td>Ville :</td>
                        <td>
                            <select name="ville_N">
                                <option value="neutre" <?php if($info['ville'] == "neutre") { echo "selected"; } ?> >Neutre</option>
                                <option value="Montreal" <?php if($info['ville'] == "Montreal") { echo "selected"; } ?> >Montreal</option>
                                <option value="Toronto" <?php if($info['ville'] == "Toronto") { echo "selected"; } ?> >Toronto</option>
                                <option value="Ottawa" <?php if($info['ville'] == "Ottawa") { echo "selected"; } ?> >Ottawa</option>
                                <option value="Halifax" <?php if($info['ville'] == "Halifax") { echo "selected"; } ?> >Halifax</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                     <td>Rue :</td>
                        <td>
                            <input type="text" name="rue_N" value="<?php echo $info['street'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Province :</td>
                        <td>
                            <select name="province_N">
                                <option value="Quebec" <?php if($info['province'] == "Quebec") { echo "selected"; } ?> >Quebec</option>
                                <option value="Ontario" <?php if($info['province'] == "Ontario") { echo "selected"; } ?> >Ontario</option>
                                <option value="Nouvelle Ecosse" <?php if($info['province'] == "Nouvelle Ecosse") { echo "selected"; } ?> >Nouvelle Ecosse</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                     <td>Pays :</td>
                        <td>
                            <input type="text" name="pays_N" value="<?php echo $info['pays'] ?>">
                        </td>
                    </tr>
                    <tr>
                     <td>Code Postal :</td>
                        <td>
                            <input type="text" name="codepostal_N" value="<?php echo $info['codePostal'] ?>">
                        </td>
                    </tr>
                    <tr>
                     <td>Longitude :</td>
                        <td>
                            <input type="text" name="longitude_N" value="<?php echo $info['longitude'] ?>">
                        </td>
                    </tr>
                    <tr>
                     <td>Latitude :</td>
                        <td>
                            <input type="text" name="latitude_N" value="<?php echo $info['latitude'] ?>">
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>Photo :</td>
                        <td>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02" name="pic_N" >
                            </div>
                        </td>
                    </tr> -->
                </table>

                <br>

                <input type="submit" value="Modifier" class="btn btn-success">
                <a href="profileProprietaire.php"><input type="button" value="Annuler" class="btn btn-secondary"> </a>

            </div>
        </div>
    
    </form>

</body>

</html>