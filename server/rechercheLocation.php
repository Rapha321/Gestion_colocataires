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
        .table-favori {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: auto;
        }

        .div-favori {
            height: 80%;
        }

        .descr-favori
        {
            position: relative;
            top: -15px;
        }

        .container {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .map {
            width: 50%;
        }

        #container1 {
            width: 50%;
            margin-left: 2%;
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

        .form-filtre {
            margin: 0 auto;
            width: 100%;
            height: 40px;
            background-color: bisque;
        }

        .filtre {
            display: flex;
            justify-content: center;
            align-items: center;
            /* flex-direction: row; */
        }

    </style>

</head>

<body>

    <div>
        <!-- FILTRE -->
        <br>
            <form class="form-filtre">
                <div class="filtre">
                    <span>
                        &nbsp;&nbsp;&nbsp;
                        Ville :
                        <select name="ville" id="" class="form-select">
                            
                            <option value="montreal">Montreal</option>
                        </select>
                    </span>
                    <span>
                        &nbsp;&nbsp;&nbsp;
                        Type de logement:
                        <select name="" id="">
                            <option value="studio">Studio</option>
                        </select>
                    </span>
                    <span>
                        &nbsp;&nbsp;&nbsp;
                        Grandeur :
                        <select name="" id="">
                            <option value="">1 1/2</option>
                        </select>
                    </span>
                    <span>
                        &nbsp;&nbsp;&nbsp;
                        Prix :
                        <select name="" id="">
                            <option value="">700</option>
                        </select>
                        &nbsp;&nbsp;&nbsp;
                    </span>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
                </div>
            </form>
        
    </div>

    <br>

    <!-- MAP -->
    <div class=" container">
        <div class="map">
            <?php
                if (isset($_POST["submit_address"]))
                {
                    $address = $_POST["address"];
                    $address = str_replace("", "+", $address);
                    ?>
                    <iframe title="map" width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>

            <?php 
                }
                if (isset($_POST['submit_coordinates'])) 
                {
                    $lat = $_POST['lat'];
                    $long = $_POST['long']
            ?>
                <iframe title="map" src="https://maps.google.com/maps?q=<?php echo $latitide; ?><?php echo $longitude; ?>&output=embed"" width="70%" height="500" ></iframe>
            <?php
                }
            ?>

            <form method="POST" action="">
                <p>
                    <input type="text" name="address">
                </p>
                <input type="submit" name="submit_address">
            </form>

            <form method="POST" action="">
                <p>
                    <input type="text" name="lat" placeholder="Enter latitude">
                </p>
                <p>
                    <input type="text" name="long" placeholder="Enterl longitude">
                </p>
                <input type="submit" name="submit_coordinates">

            </form>
        </div>


        <!-- RESULTAT -->
        <div id="container1">
            <div class="div-favori">
                <div class="jumbotron" >
                    <table class="table-favori">
                        <tr>
                            <td>&nbsp;&nbsp; <i class="far fa-heart"></i>&nbsp;&nbsp;</td>
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
        </div>

    </div>

</body>

</html>