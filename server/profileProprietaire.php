<?php 
    session_start(); 
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
        .page {
            display: flex;
            justify-content: center;
            flex-direction: row;
            margin-top: 2%;
        }

        .main {
            margin-top: 3vh;
        }

        .descr-profile {
            width: 300px;
        }

        .table-profile {
            width: 400px;
        }

        #btn {
            width: 350px;
            height: 35px;
            display: flex;
            justify-content: center;
            margin-bottom: 5px;
        }

        .table-favori {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: auto;
        }

        .div-profile {
            height: 55vh;
        }

        .div-favori {
            height: 80vh;
        }

        #btn-Chercher {
            width: 350px;
            height: 45px;
            display: flex;
            justify-content: center;
            margin: auto;
        }

        .td2 {
            padding-left: 20px;
            padding-right: 20px;
        }

        .descr-favori
        {
            position: relative;
            top: -15px;
        }

        #container1 {
            margin-top: 3vh;
            width: 40%;
            margin-left: 3%;
            scroll-behavior: auto;
            height: 60vh;
        }

        .prix {
            float: right;
            font-weight: bold;
            font-size: large;
        }

        .jumbotron {
            overflow-y: scroll;
            height: 60vh;
            max-height: 60vh;
            margin-bottom: 15px;
        }

        .type {
            font-weight: bold;
        }

        td, th {
            vertical-align:top;
        }

        #btn-modif {
            font-size: 10px;
            width: 65px;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        #btn-sup {
            font-size: 10px;
            width: 65px;
        }

        th {
            width: 120px;
        }

        .btn-modSup {
            max-width: 70px;
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
    
    <div class="page">
    
        <div class="main">
        
            <div class="div-profile">
            <form method="POST" action="modifierProfileProprietaire.php">
                <figure>
                    <?php 
                        echo  '<img src="../images/'.$info['pic'].'" width="290px" height="280px" />';
                    ?>
                </figure>
                <div>
                    <table class="table-profile">
                        <tr >
                            <th>Nom :</th>
                            <td><?php echo $info['nom'] ?></td>
                        </tr>
                        <tr>
                            <th>Prenom :</th>
                            <td><?php echo $info['prenom'] ?></td>
                        </tr>
                        <tr class="descr-profile">
                            <th>Description :</th>
                            <td><?php echo $info['descriptions'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div>
                <br><br>
                <hr>
                <input id="btn" type="submit" value="Modifier profile" class="btn btn-info">
        </form>
                <a href="supprimerProfileProprietaire.php?id_L=<?php echo $info['id'] ?>"> 
                    <button id="btn" class="btn btn-danger">Supprimer</button>
                </a>
            </div>
        </div>
   
        
        <div id="container1">
            <h4>Mes locations:</h4>
            <div class="div-favori">
                <div class="jumbotron" >
                    <table class="table-favori">

                        <?php 
                            $id = intval($_SESSION['id']);

                            $select = $bdd->prepare("SELECT * FROM locations WHERE id_proprietaire = ?");
                            $select->execute([$id]);
                            while ($info = $select->fetch())
                            {
                        ?>

                            <tr>
                                <td class="btn-modSup"> 
                                    <a href="modifierLocation.php?id_L=<?php echo $info['id_location'] ?>"> <button id="btn-modif" class="btn btn-info">Modifier</button> </a>     
                                    <a href="supprimerLocation.php?id_L=<?php echo $info['id_location'] ?>"> <button id="btn-sup" class="btn btn-danger" >Supprimer</button> </a> 
                                </td>
                                
                                <td class="img">
                                    <?php 
                                        echo  '<img src="../images/'.$info['pic'].'" width="100px" height="100px" />';
                                        // echo '<img src="data:image/jpg;base64,' . base64_encode( $info['pic'] ) . '" width="100px" height="100px" />';
                                    ?>
                                </td>  
                                <td class="td2">
                                    <div class="top-section">
                                        <span class="type"> <?php echo $info['types']; ?> </span> &nbsp; | &nbsp; 
                                        <span class="grandeur"> <?php echo $info['grandeur']; ?> </span> &nbsp; | &nbsp;
                                        <span class="ville"> <?php echo $info['ville']; ?> </span>
                                        <span class="prix"> $<?php echo $info['montantloyer']; ?> </span>
                                    </div>
                                
                                    <hr>
                                    <span class="descr-favori"> <?php echo $info['descriptions']; ?> </span>
                                </td>
                            </tr>
                            <tr>
                                
                                <td colspan="3">&nbsp;</td>
                            </tr>
                        
                        <?php
                            }
                        ?>

                    </table>
                </div>
                <a href="ajoutLocation.php"> <input id="btn-Chercher" type="submit" value="Ajouter un location" class="btn btn-primary"> </a>
            </div>
            
            
        </div>
    </div>
  
   
</body>

</html>