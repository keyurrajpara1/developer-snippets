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
	// Google map in leaflet

	// https://gis.stackexchange.com/questions/225098/using-google-maps-static-tiles-with-leaflet

	// googleStreets
	// http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}

	// googleHybrid
	// http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}

	// googleSatellite
	// http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}

	// googleTerrain
	// http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}

	var mapLatitude = 21.5222;
	var mapLongitude = 70.4579;

	var mapOptions = {
	    center: [mapLatitude, mapLongitude],
	    zoom: 13
	};
	var map = L.map('idMap', mapOptions); // Map initialization

	var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
	    maxZoom: 20,
	    subdomains:['mt0','mt1','mt2','mt3']
	});

	googleHybrid.addTo(map);
</script>
</body>
</html>