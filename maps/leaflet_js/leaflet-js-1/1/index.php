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
	    zoom: 13
	};
	var map = L.map('idMap', mapOptions); // Map initialization
	
	var openStreetMap = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
	    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}); // Open street map layer

	openStreetMap.addTo(map);
</script>
</body>
</html>