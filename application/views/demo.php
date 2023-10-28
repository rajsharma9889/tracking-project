<!DOCTYPE html>
<html>
  <head>
    <title>Google Maps Path with Markers, Details, Address, and InfoWindows</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByL_g4Q2QxEhCe5t7ZwdzyRupha8eRkcA&libraries=geometry,places"></script>
  </head>
  <body>
    <div id="map" style="height: 400px;"></div>
    <div id="address"></div>
    <div>
      <a id="drivingLink" target="_blank" href="#">Open in Driving Mode</a>
      <div id="distance"></div>
    </div>
    <script>
      function initMap() {
        const mapOptions = {
          center: { lat: 37.7749, lng: -122.4194 }, // Replace with your desired center coordinates
          zoom: 13, // Adjust the zoom level as needed
        };

        const map = new google.maps.Map(document.getElementById("map"), mapOptions);

        const pathCoordinates = [
          { lat: 37.7749, lng: -122.4194 }, // Replace with your desired coordinates for the path
          { lat: 37.7753, lng: -122.4184 },
          { lat: 37.7757, lng: -122.4174 },
          // Add more coordinates to define the path
        ];

        const path = new google.maps.Polyline({
          path: pathCoordinates,
          geodesic: true,
          strokeColor: "#FF0000", // Color of the path
          strokeOpacity: 1.0,
          strokeWeight: 2, // Adjust the thickness of the path
        });

        path.setMap(map);

        // Adding start marker
        const startMarker = new google.maps.Marker({
          position: pathCoordinates[0],
          map: map,
          title: "Start",
          icon: "https://maps.google.com/mapfiles/ms/icons/green-dot.png", // Custom marker icon
        });

        // Adding end marker
        const endMarker = new google.maps.Marker({
          position: pathCoordinates[pathCoordinates.length - 1],
          map: map,
          title: "End",
          icon: "https://maps.google.com/mapfiles/ms/icons/red-dot.png", // Custom marker icon
        });

        // InfoWindow content
        const startInfoWindowContent =
          '<div><img src="path/to/start-image.jpg" alt="Start Image" style="width: 100px; height: 100px;"></div>' +
          '<div><strong>Start Details:</strong><br>Details about the starting point.</div>' +
          '<div><strong>Address:</strong><br><span id="startAddress"></span></div>';

        const endInfoWindowContent =
          '<div><img src="path/to/end-image.jpg" alt="End Image" style="width: 100px; height: 100px;"></div>' +
          '<div><strong>End Details:</strong><br>Details about the ending point.</div>' +
          '<div><strong>Address:</strong><br><span id="endAddress"></span></div>';

        // InfoWindows for markers
        const startInfoWindow = new google.maps.InfoWindow({
          content: startInfoWindowContent,
        });

        const endInfoWindow = new google.maps.InfoWindow({
          content: endInfoWindowContent,
        });

        // Show InfoWindows on marker hover
        startMarker.addListener("mouseover", () => {
          getAddressForMarker(pathCoordinates[0], startInfoWindow);
          startInfoWindow.open(map, startMarker);
        });

        startMarker.addListener("mouseout", () => {
          startInfoWindow.close();
        });

        endMarker.addListener("mouseover", () => {
          getAddressForMarker(pathCoordinates[pathCoordinates.length - 1], endInfoWindow);
          endInfoWindow.open(map, endMarker);
        });

        endMarker.addListener("mouseout", () => {
          endInfoWindow.close();
        });

        // Generate the link for driving mode
        const startLat = pathCoordinates[0].lat;
        const startLng = pathCoordinates[0].lng;
        const endLat = pathCoordinates[pathCoordinates.length - 1].lat;
        const endLng = pathCoordinates[pathCoordinates.length - 1].lng;

        const drivingLink =
          "https://www.google.com/maps/dir/?api=1&origin=" +
          `${startLat},${startLng}&destination=${endLat},${endLng}&travelmode=driving`;

        document.getElementById("drivingLink").href = drivingLink;

        // Calculate and display the distance
        const distance = google.maps.geometry.spherical.computeLength(path.getPath());
        document.getElementById("distance").innerHTML = `Distance: ${distance.toFixed(2)} meters`;
      }

      // Helper function to get address for a marker
      function getAddressForMarker(latLng, infoWindow) {
        const geocoder = new google.maps.Geocoder();

        geocoder.geocode({ location: latLng }, (results, status) => {
          if (status === "OK") {
            if (results[0]) {
              const address = results[0].formatted_address;
              infoWindow.setContent(infoWindow.getContent().replace("<span", `<span>${address}</span>`));
            } else {
              console.log("No results found");
            }
          } else {
            console.log("Geocoder failed due to: " + status);
          }
        });
      }

      // Initialize the map when the page is loaded
      google.maps.event.addDomListener(window, "load", initMap);
    </script>
  </body>
</html>
