<?php
    session_start ();
    include('Configuration.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>location-A-tous</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>

        .detail-review {
            display: flex;
            flex-direction: row;
            margin-left: 10%;
            margin-top: 2%;
        }

        #detail-location {
            width: 40vw;
            height: 80vh;
            max-height: 80vw;
            margin-right: 1vw;
        }

        .td1 {
            width: 160px;
            font-weight: bold;
        }

        #review {
            width: 40vw;
            height: 80vh;
            max-height: 80vw;
            scroll-behavior: auto;
        }  
        
        .star {
            padding-left: 150px;
        }

        .menu-btn {
            padding-left: 40%;
        }

    </style>

</head>

<body>

    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <h3>location-À-tous</h3>
        <span class="menu-btn">
            <a href="rechercheLocation.php" > <button class="btn btn-outline-info">Continuer à chercher</button> </a> 
            <a href="profileLocataire.php"> <button class="btn btn-outline-success">Retour au profile</button> </a> 
            <a href="logout.php"><button class="btn btn-outline-danger">Se déconnecter</button></a>
        </span>
    </nav>

    <?php $id_location = $_GET['id_L']; ?>

    <form enctype="multipart/form-data" method="POST" action="validerReview.php?id_Location=<?php echo $id_location ?>" data-ajax='false' >

        <?php
            $req = $bdd->prepare("SELECT * FROM locations WHERE id_location = $id_location");
            $req->execute();
            $info = $req->fetch();
        ?>

        <div class="detail-review">

            <!-- DETAIL DU LOCATION -->
            <div id="detail-location" class="jumbotron">
                <div>
                    <img src="../images/<?php echo $info['pic'] ?>" alt="" width=250px" height="200px" />
                </div>
                <br>
                <table>
                    <tr>
                        <td class="td1"> Type : </td>
                        <td> <?php echo $info['types'] ?> </td>
                    </tr>
                    <tr>
                        <td class="td1"> Grandeur : </td>
                        <td> <?php echo $info['grandeur'] ?> </td>
                    </tr>
                    <tr>
                        <td class="td1"> Description: &nbsp;</td>
                        <td> <?php echo $info['descriptions'] ?> </td>
                    </tr>
                    <tr>
                        <td class="td1">Bail :</td>
                        <td> <?php echo $info['bail'] ?> </td>
                    </tr>
                    <tr>
                        <td class="td1">Montant :</td>
                        <td> <?php echo $info['montantloyer'] ?> </td>
                    </tr>
                    <tr>
                        <td class="td1">Meubler :</td>
                        <td> <?php echo $info['meubler'] ?> </td>
                    </tr>
                    <tr>
                        <td class="td1">Fumeur acceptable:</td>
                        <td> <?php echo $info['fumeur'] ?> </td>
                    </tr>
                    <tr>
                        <td class="td1">Animal domestique:</td>
                        <td> <?php echo $info['animal'] ?> </td>
                    </tr>
                    <tr>
                        <td class="td1">Electricité inclus:</td>
                        <td> <?php echo $info['electricite'] ?> </td>
                    </tr>
                    <tr>
                        <td class="td1">Chauffage inclus:</td>
                        <td> <?php echo $info['chauffage'] ?> </td>
                    </tr>
                    <tr>
                        <td class="td1">Ville :</td>
                        <td> <?php echo $info['ville'] ?> </td>
                    </tr>
                    <tr>
                        <td class="td1">Rue :</td>
                        <td> <?php echo $info['street'] ?> </td>
                    </tr>
                    <tr>
                        <td class="td1">Province :</td>
                        <td> <?php echo $info['province'] ?> </td>
                    </tr>
                    <tr>
                        <td class="td1">Pays :</td>
                        <td> <?php echo $info['pays'] ?> </td>
                    </tr>
                    <tr>
                        <td class="td1">Code Postal :</td>
                        <td> <?php echo $info['codePostal'] ?> </td>
                    </tr>

                </table>
            </div>

            <!-- REVIEW -->
            <div id="review" class="jumbotron">
                <div>
                    <?php 
                        $x = $_GET['id_L'];
                        $review = $bdd->prepare("SELECT * FROM review_location WHERE id_location = $x");
                        $review->execute();
                        while ($result = $review->fetch())
                        {
                    ?>
                    <table>
                        <tr>
                            <?php 
                                $id_locataire = $result['id_locataire'];
                                $evaluateur = $bdd->prepare("SELECT * FROM locataire WHERE id = $id_locataire");
                                $evaluateur->execute();
                                $res = $evaluateur->fetch();
                            ?>
                            <td> <i>Evaluer par: <?php echo $res['nom'], $res['prenom']?> </i></td>
                            <td class="star"> 
                                    <?php                       
                                        if ($result['etoile'] == 1) {echo '⭐';} 
                                        else if ($result['etoile'] == 2) {echo '⭐⭐';} 
                                        else if ($result['etoile'] == 3) {echo '⭐⭐⭐';} 
                                        else if ($result['etoile'] == 4) {echo '⭐⭐⭐⭐';} 
                                        else if ($result['etoile'] == 5) {echo '⭐⭐⭐⭐⭐';} 
                                    ?> 
                                
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><?php echo $result['description'] ?></td>
                        </tr>
                    </table>

                    <hr>

                    <?php 
                        }
                    ?>
                </div>

                <div>
                    <h6>Ajouter une evaluation:</h6>
                    <table>
                        <tr>
                            <td>Etoiles: </td>
                            <td>
                                <select name="etoile">
                                    <option value="1">⭐</option>
                                    <option value="2">⭐⭐</option>
                                    <option value="3">⭐⭐⭐</option>
                                    <option value="4">⭐⭐⭐⭐</option>
                                    <option value="5">⭐⭐⭐⭐⭐</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <textarea name="description" cols="60" rows="4"></textarea>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" value="Soumettre" class="btn btn-primary btn-sm">
                </div>

            </div>

        </div>
    </form>

</body>

</html>