<?php 
    session_start(); 
    include('Configuration.php');
?>

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
        body {
            display: flex;
            justify-content: center;
            flex-direction: row;
            padding-top: 5%;
        }

        #btn {
            width: 350px;
            height: 35px;
            display: flex;
            justify-content: center;
            margin-bottom: 5px;
        }

        .table-favori {
            width: 90%;
            display: flex;
            justify-content: center;
            margin: auto;
        }

        .div-profile {
            height: 80%;
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
        }

        .prix {
            float: right;
            font-weight: bold;
            font-size: large;
        }

        .jumbotron {
            height: 100%;
            overflow-y: scroll;
        }

        .type {
            font-weight: bold;
        }

    </style>

</head>

<body>

    <?php
        $id = $_SESSION['donnees']['id_locataire'];
        $select = $bdd->prepare("SELECT * FROM locataire where id_locataire=?");
        $select->execute([$id]);
        $info = $select->fetch();
    ?>
    
    <form method="POST" action="modifierProfileLocataire.php">
        <div class="main">


            <div class="div-profile">

                <figure>
                    <?php 
                        echo '<img src="data:image/jpg;base64,' . base64_encode( $info['pic'] ) . '"width="290px" height="280px" class="img-thumbnail"/>';
                    ?>
                </figure>
                <div>
                    <table class="table-profile">
                        <tr>
                            <th>Nom </th>
                            <td>&nbsp; : &nbsp;</td>
                            <td><?php echo $info['nom']?></td>
                        </tr>
                        <tr>
                            <th>Prenom </th>
                            <td>&nbsp; : &nbsp;</td>
                            <td><?php echo $info['prenom']?></td>
                        </tr>
                        <tr>
                            <th>Description </th>
                            <td>&nbsp; : &nbsp;</td>
                            <td><?php echo $info['descriptions']?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div>
                <br><br>
                <hr>
                <input id="btn" type="submit" value="Modifier profile" class="btn btn-info">
                <input id="btn" type="button" value="Supprimer profile" class="btn btn-danger">
            </div>
        </div>
    </form>
        
        <div id="container1">
            <h4>Mes favori:</h4>
            <div class="div-favori">
                <div class="jumbotron" >
                    <table class="table-favori">
                        <tr>
                            <td>&nbsp;&nbsp; <i class="fas fa-trash-alt"></i>&nbsp;&nbsp;</td>
                            <td class="td2">
                                <span class="type">Studio</span>
                                <span class="prix">$700</span>
                                <hr>
                                <span class="descr-favori">Studio a louer. Tout inclus. Disponibles immediatements. Meubler!!!</span>
                            </td>
                            <td>
                                <?php 
                                echo '<img src="data:image/jpg;base64,' . base64_encode( $_SESSION['donnees']['pic'] ) . '" width="100px" height="100px" />';
                                ?>
                            
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            
            <a href="rechercheLocation.php"> <input id="btn-Chercher" type="submit" value="Chercher un location" class="btn btn-primary"> </a>
        </div>
   
</body>

</html>