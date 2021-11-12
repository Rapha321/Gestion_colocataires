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


    <!-- jQUERY -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <!-- jtoast Js -->
    <!-- <script src="jtoast.js"></script> -->

    <style>
        .page {
            display: flex;
            justify-content: center;
            flex-direction: row;
            padding-top: 5%;
        }

        /* .descr-profile {
            width: 300px;
        } */

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
            height: 80%;
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
            width: 40%;
            margin-left: 3%;
            scroll-behavior: auto;
            margin-bottom: 5px;
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
        }

        .type {
            font-weight: bold;
        }

        td, th {
            vertical-align:top;
        }

        th {
            width: 120px;
        }

        #btn-bin {
            height: 30px;
            width: 30px;
            display: flex;
            justify-content: center;
            margin-bottom: 5px;
        }

    </style>

</head>


<body>

    <?php
        
        $id = $_SESSION['id'];
        $select = $bdd->prepare("SELECT * FROM locataire where id=?");
        $select->execute([$id]);
        $info = $select->fetch();

        include('header.php');
    ?>

    <div class="page">
    
        <div class="main">


            <div class="div-profile">
            <form method="POST" action="modifierProfileLocataire.php?id_L=<?php echo $id ?>">
                <figure>
                    <?php 
                        echo  '<img src="../images/'.$info['pic'].'" width="290px" height="280px" />';
                    ?>
                </figure>
                <div>
                    <table class="table-profile">
                        <tr >
                            <th>Nom :</th>
                            <td><?php echo $info['nom']?></td>
                        </tr>
                        <tr>
                            <th>Prenom :</th>
                            <td><?php echo $info['prenom']?></td>
                        </tr>
                        <tr class="descr-profile">
                            <th>Description :</th>
                            <td><?php echo $info['descriptions']?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div>
                <br><br>
                <hr>
                <input id="btn" type="submit" value="Modifier profile" class="btn btn-info">
        </form>
                <a href="supprimerProfileLocataire.php?id_L=<?php echo $info['id'] ?>"> 
                    <button id="btn" class="btn btn-danger">Supprimer</button>
                </a>
            </div>
        </div>
   

        
        <div id="container1">
            <h4>Mes favori:</h4>
            <div class="div-favori">
                <div class="jumbotron" >
                    <table class="table-favori">

                        <?php 
                            $select = $bdd->prepare("SELECT * FROM locations
                                                     INNER JOIN favori ON locations.id_location = favori.locations
                                                     WHERE favori.locataire = $id");
                            $select->execute();
                            while ($info = $select->fetch())
                            {
                        ?>

                        <tr>
                            <td>
                                <a href="supprimerFavori.php?id_F=<?php echo $info['id_favori'] ?>">
                                    <button id="btn-bin" class="btn btn-primary" ><i class="fas fa-trash-alt"></i></button>
                                </a>
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
                            <td>
                                <?php 
                                echo '<img src="data:image/jpg;base64,' . base64_encode( $info['pic'] ) . '" width="100px" height="100px" />';
                                ?>
                                
                            </td>
                        </tr>

                        <?php 
                            }
                        ?>

                    </table>
                </div>
            </div>
            
            <a href="rechercheLocation.php"> <input id="btn-Chercher" type="submit" value="Chercher un location" class="btn btn-success"> </a>
        </div>
    </div>
  
   
</body>

</html>
