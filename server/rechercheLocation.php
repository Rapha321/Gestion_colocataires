<?php 
    session_start(); 
    include('Configuration.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Recherche Location</title>
    <meta name="viewport" content= "width=device-width, initial-scale=1.0 shrink-to-fit=no">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/1183c3861a.js" crossorigin="anonymous"></script>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script>

        window.load=$( document ).ready(function() {
            
            $.ajax({
                type:'POST',
                url:'afficherTousLocation.php',
                success:function(html){
                    $("#table-body").html(html);
                }
            }); 
                
        }); 

        function selectVille() {
            var x = document.getElementById("ville").value;
            $.ajax({
                url: "rechercheVille.php",
                method: "POST",
                data: { id: x},
                success: function(data) {
                    $("#table-body").html(data);
                }
            });
        }

        function selectTypes() {
            var x = document.getElementById("types").value;
            $.ajax({
                url: "rechercheTypeLocation.php", // call upon the page that will query the database and pass the value to 'data'
                method: "POST", 
                data : { type: x }, // save the value of x in type so that we can query database base on type
                success: function(data) {
                    $("#table-body").html(data); // pass the data obtained form recherche.php to #table-body
                }
            });
        }

        function selectGrandeur() {
            var x = document.getElementById("grandeur").value;
            $.ajax({
                url: "rechercheGrandeur.php", 
                method: "POST", 
                data : { grandeur: x },
                success: function(data) {
                    $("#table-body").html(data); 
                }
            });
        }

        function selectPrixMin() {
            var x = document.getElementById("prixMin").value;
            $.ajax({
                url: "recherchePrixMin.php", 
                method: "POST", 
                data : { min: x }, 
                success: function(data) {
                    $("#table-body").html(data); 
                }
            });
        }

        function selectPrixMax() {
            var x = document.getElementById("prixMax").value;
            $.ajax({
                url: "recherchePrixMax.php", 
                method: "POST", 
                data : { max: x }, 
                success: function(data) {
                    $("#table-body").html(data); 
                }
            });
        }

    </script>

    <style>
        .table-favori {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: auto;
        }

        .container2 {
            width: 80%;
            display: flex;
            justify-content: center;
            margin: auto;
        }

        .map {
            width: 50%;
        }

        #container1 {
            width: 55%;
            margin-left: 1%;
            scroll-behavior: auto;
        }

        .jumbotron {
            height: 100%;
            overflow-y: scroll;
        }

        .form-filtre {
            margin: 0 auto;
            width: 80%;
            height: 40px;
            background-color: bisque;
        }

        .filtre {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .type {
            font-weight: bold;
        }

        .prix {
            float: right;
            font-weight: bold;
            font-size: large;
        }

        .descr-favori {
            position: relative;
            top: -15px;
        }

        .td2 {
            width: 300px;
            padding-left: 5px;
            padding-right: 5px;
        }

        .ville {
            font-weight: bold;
        }

    </style>

</head>

<body>

    <!-- FILTRE -->
    <div>
        <br>
            <form class="form-filtre" method="POST" action="">

                <div class="filtre">
                    <span>
                        &nbsp;&nbsp;&nbsp;
                        Ville :
                        <select name="ville" id="ville" onchange="selectVille()">
                            <option value="neutre">Neutre</option>
                            <?php 
                                $ville = $bdd->query("SELECT DISTINCT ville FROM locations");
                                $v = $ville->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($v as $ville) { 
                            ?>
                                <option value="<?php echo $ville['ville'];?>" > <?php echo $ville['ville'] ?></option>
                            <?php } ?>
                        </select>
                    </span>
                    <span>
                        &nbsp;&nbsp;&nbsp;
                        Type de logement:
                        <select name="types" id="types" onchange="selectTypes()">
                            <option value="neutre">Neutre</option>
                            <?php 
                                $types = $bdd->query("SELECT DISTINCT types FROM locations");
                                $t = $types->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($t as $types) { 
                                ?>
                                <option value="<?php echo $types['types'];?>" > <?php echo $types['types'] ?></option>
                            <?php } ?>
                        </select>
                    </span>
                    <span>
                        &nbsp;&nbsp;&nbsp;
                        Grandeur :
                        <select name="grandeur" id="grandeur" onchange="selectGrandeur()">
                            <option value="neutre">Neutre</option>
                            <?php 
                                $grandeur = $bdd->query("SELECT DISTINCT grandeur FROM locations");
                                $g = $grandeur->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($g as $grandeur) { 
                            ?>
                                <option value="<?php echo $grandeur['grandeur'];?>" > <?php echo $grandeur['grandeur'] ?></option>
                            <?php } ?>

                        </select>
                    </span>
                    <span>
                        &nbsp;&nbsp;&nbsp;
                        Prix Min:
                        <input type="text" value="" name="prixMin" id="prixMin" size="3" onchange="selectPrixMin()" placeholder="0">$
                        &nbsp;&nbsp;&nbsp;
                        Prix Max:
                        <input type="text" value="" name="prixMax" id="prixMax" onchange="selectPrixMax()" size="3" placeholder="5000">$
                        &nbsp;&nbsp;&nbsp;
                    </span>

                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
                </div>
            </form>
    </div>

    <br>

    <!-- MAP -->
    <div class=" container2">
        <div class="map">

            <script>
                let selectedLocation = document.getElementById("ville").value;
            </script>

             <?php
                $selectedLocation = 'Montreal';

                if (isset($_POST["submit_address"]))
                {
                    $address = $_POST["address"];
                    $address = str_replace("", "+", $address);
                    ?>
                    <iframe title="map" width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo 'selectedLocation'; ?>&output=embed"></iframe>

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
            <div class="jumbotron" >

                <table class="table-favori">
                    <tbody id="table-body">
                  
                    </tbody>
                </table>

            </div>
            <br>
        </div>

    </div>

</body>




</html>