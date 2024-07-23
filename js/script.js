function openLocationPicker() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            
            document.getElementById("location_picker").value = "Latitude: " + latitude + ", Longitude: " + longitude;
            document.getElementById("location_link").value = "https://www.google.com/maps?q=" + latitude + "," + longitude;

        });
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}
