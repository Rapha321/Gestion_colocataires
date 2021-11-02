<?php 
    session_start(); 
    include('Configuration.php');

    
    $result2 = $bdd->query("SELECT * FROM locations"); 

?>

<!DOCTYPE html>
<html>

<head>
    <title>Recherche Location</title>
    <meta name="viewport" content= "width=device-width, initial-scale=1.0 shrink-to-fit=no">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

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
            width: 90%;
            display: flex;
            justify-content: center;
            margin: auto;
            min-width: 90%;
            max-width: 90%;
        }

        .container2 {
            width: 80%;
            display: flex;
            justify-content: center;
            margin: auto;
        }

        #googlemap {
            width: 50%;
            height: 700px;
            max-height: 700px;
        }

        #container1 {
            width: 55%;
            margin-left: 1%;
            scroll-behavior: auto;
            max-height: 70%;
        }

        .jumbotron {
            height: 100%;
            overflow-y: scroll;
            height: 700px;
            max-height: 700px;
        }

        .form-filtre {
            width: 100%;
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
            width: 100%;
            padding-left: 5px;
            padding-right: 5px;
        }

        .ville {
            font-weight: bold;
        }

        .retourProfile {
            float: right;
        }

    </style>

</head>

<body onload="initMap()">

    <!-- FILTRE -->
    <div>
        <br>
            <form class="form-filtre" method="POST" action="">

                <div class="filtre">
                    <span>
                        &nbsp;&nbsp;&nbsp;
                        Ville :
                        <select name="ville" id="ville" onchange="selectVille()" >
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
                    &nbsp;&nbsp;&nbsp;
                    <a href="profileLocataire.php" class="retourProfile"><input type="button" value="Retour au profile" class="btn btn-info"></a>
                </div>
            </form>

            
    </div>

    <br>

    <!-- MAP -->
    <div class=" container2">
        <div id="googlemap">
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6_F1Aun0kO7VU6E06DEMMd_R_UseEVgg" async></script>

        </div>

        <!-- RESULTAT -->
        <div id="container1">
            <div class="jumbotron" >

                <table class="table-favori">
                    <tbody id="table-body">
                    
                    </tbody>
                </table>

            </div>

            
            
        </div>

    </div>

</body>

<script type='text/javascript'>
        function initMap() {
            var map;
            var bounds = new google.maps.LatLngBounds();
            var mapOptions = {
                mapTypeId: 'roadmap'
            };
                            
            // Display a map on the web page
            map = new google.maps.Map(document.getElementById("googlemap"), mapOptions);
            map.setTilt(100);

            // Multiple Markers
            var markers = [
                <?php 
                    $result1 = $bdd->query("SELECT * FROM locations "); 
                    while ($row1 = $result1->fetch()) {
                        echo "['$row1[types]', $row1[montant_loyer], $row1[latitude], $row1[longitude]],";
                    }
                ?>
            ];

            // Info Window Content
            var infoWindowContent = [
                // [
                // '<h3>Joe Brown Park</h3>' +
                // 'Named after 1 of the states largest independent oil producers, this park offers year-round events.' +
                // '</div>'
                // ],
                // [
                // '<h3>City Park </h3>' +
                // 'A 1,300 acre public park in New Orleans, Louisiana, is the 87th largest and 7th-most-visited urban public park in the United States.' +
                // '</div>'
                // ],
            ];

            // Display multiple markers on a map
            var infoWindow = new google.maps.InfoWindow(), marker, i;

            // Loop through our array of markers & place each one on the map  
            for (i = 0; i < markers.length; i++) {
                var position = new google.maps.LatLng(
                markers[i][2],
                markers[i][3]);
                bounds.extend(position);
                var label = String.fromCharCode(65 + i);
                marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0],
                label: label
                });

                // Allow each marker to have an info window    
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.open(map, marker);
                }
                })(marker, i));
            }
            map.fitBounds(bounds)
                
        }

    </script>

</html>