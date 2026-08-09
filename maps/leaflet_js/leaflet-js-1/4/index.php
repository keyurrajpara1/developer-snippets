<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../leaflet/leaflet.css">
	<script type="text/javascript" src="../leaflet/leaflet.js"></script>
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
		}
		#idMap{
			width: 100%;
			height: 100vh;
		}
	</style>
</head>
<body>
<div id="idMap"></div>
<script type="text/javascript">
	var mapLatitude = 21.5222;
	var mapLongitude = 70.4579;

	var mapOptions = {
	    center: [mapLatitude, mapLongitude],
	    zoom: 15
	};
	var map = L.map('idMap', mapOptions); // Map initialization

	var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
	    maxZoom: 20,
	    subdomains:['mt0','mt1','mt2','mt3']
	});

	googleHybrid.addTo(map);


	var marker1Latitude = 21.51838531540468;
	var marker1Longitude = 70.46343437916086;

	// Marker - Example 1
	// var marker1 = L.marker([marker1Latitude, marker1Longitude]).addTo(map);


	// Marker - Example 2
	// var marker1 = L.marker([marker1Latitude, marker1Longitude]);
	// var popup = marker1.bindPopup('My Home').openPopup();
	// popup.addTo(map);


	// Marker - Example 3
	var markerIcon = L.icon({
		iconUrl: '../images/png-transparent-google-maps-logo-pin-location-marker-gps-navigation-position-route-thumbnail.png',
		iconSize: [40, 40]
	});
	var markerIconOptions = {
		icon: markerIcon,
		draggable: true
	};
	var marker1 = L.marker([marker1Latitude, marker1Longitude], markerIconOptions);
	var popup = marker1.bindPopup('My Home. ' + marker1.getLatLng()).openPopup();
	popup.addTo(map);
	console.log(marker1.toGeoJSON());
</script>
</body>
</html>