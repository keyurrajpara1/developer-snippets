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
	// Tile Layer Example

	// Tile layer provider
	// https://leaflet-extras.github.io/leaflet-providers/preview/

	var mapLatitude = 21.5222;
	var mapLongitude = 70.4579;

	var mapOptions = {
	    center: [mapLatitude, mapLongitude],
	    zoom: 13
	};
	var map = L.map('idMap', mapOptions); // Map initialization

	var stamenWatercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
		attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
		subdomains: 'abcd',
		minZoom: 1,
		maxZoom: 16,
		ext: 'jpg'
	});

	stamenWatercolor.addTo(map);
</script>
</body>
</html>