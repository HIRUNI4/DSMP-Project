<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sri Lankan Map with Mark and Save Location</title>
    <!-- Include Leaflet.js, OpenStreetMap, Control Geocoder -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
</head>
<body>
    <div id="map" style="height: 400px;"></div>
    <button onclick="saveLocation()">Save Location</button>

    <script>
        let map;
        let searchControl;
        let marker;
        let savedLocationLink = "";

        function initMap() {
            // Initialize the map centered on Sri Lanka
            map = L.map('map').setView([7.8731, 80.7718], 8);

            // Add OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            // Initialize the search control with the Geocoder plugin
            searchControl = L.Control.geocoder({
                defaultMarkGeocode: true, // Allow automatic marker placement
            }).addTo(map);

            // Event listener to handle map clicks
            map.on('click', function (e) {
                // Remove the existing marker if one exists
                if (marker) {
                    map.removeLayer(marker);
                }

                // Add a marker at the clicked location
                marker = L.marker(e.latlng).addTo(map);
            });

            // Event listener to handle geocoding result
            searchControl.on('markgeocode', function (event) {
                const { center, name } = event.geocode.properties;
                // Fly to the searched location with a zoom level of 15
                map.flyTo(center, 15);
            });
        }

        function saveLocation() {
            // Check if a marker is placed
            if (marker) {
                // Get the latitude and longitude of the marker
                const latlng = marker.getLatLng();

                // Construct the link with the coordinates
                savedLocationLink = `https://www.google.com/maps?q=${latlng.lat},${latlng.lng}&z=15`;

                if (window.opener) {
                    window.opener.setSavedLocation(savedLocationLink);
                }
                window.close();
            } else {
                alert('Please mark a location before saving.');
            }
        }

        document.addEventListener('DOMContentLoaded', initMap);
    </script>
</body>
</html>
