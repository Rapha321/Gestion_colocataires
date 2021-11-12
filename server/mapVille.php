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
                    $ville = $_POST['id'];
                    $ville = trim($ville);
                    $result1 = $bdd->query("SELECT * FROM locations "); 
                    while ($row1 = $result1->fetch()) {
                        echo "['$row1[types]', $row1[montantloyer], $row1[latitude], $row1[longitude]],";
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