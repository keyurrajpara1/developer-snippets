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
<script type="text/javascript" src="../data/line.js"></script>
<script type="text/javascript" src="../data/point.js"></script>
<script type="text/javascript" src="../data/polygon.js"></script>
<script type="text/javascript">
	var mapLatitude = 21.5222;
	var mapLongitude = 70.4579;

	var mapOptions = {
	    center: [mapLatitude, mapLongitude],
	    zoom: 15
	};
	var map = L.map('idMap', mapOptions); // Map initialization
	
	var openStreetMap = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
	    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}); // Open street map layer
	openStreetMap.addTo(map);

	var stamenWatercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
		attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
		subdomains: 'abcd',
		minZoom: 1,
		maxZoom: 16,
		ext: 'jpg'
	});

	var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
	    maxZoom: 20,
	    subdomains:['mt0','mt1','mt2','mt3']
	});


	var marker1Latitude = 21.51838531540468;
	var marker1Longitude = 70.46343437916086;

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


	var marker2Latitude = 21.517141714033368;
	var marker2Longitude = 70.46338843918993;
	var marker2 = L.marker([marker2Latitude, marker2Longitude], markerIconOptions);


	// GeoJson
	var pointData = L.geoJSON(pointJson).addTo(map);
	var lineData = L.geoJSON(lineJson).addTo(map);
	var polygonData = L.geoJSON(polygonJson, {
		onEachFeature: function(feature, layer){
			layer.bindPopup(`<b>Name: </b>${feature.properties.name}`);
		},
		style: {
			fillColor: '#eee',
			fillOpacity: 1,
			color: '#c0c0c0'
		}
	}).addTo(map);


	// Raster Layers
	// TileLayer.WMS
	// WMS - Web Map Service
	var nexrad = L.tileLayer.wms("http://mesonet.agron.iastate.edu/cgi-bin/wms/nexrad/n0r.cgi", {
	    layers: 'nexrad-n0r-900913',
	    format: 'image/png',
	    transparent: true,
	    attribution: "Weather data © 2012 IEM Nexrad"
	});


	// Layers control
	var baseMaps = {
		openStreetMap,
		stamenWatercolor,
		googleHybrid
	};
	var overlayMaps = {
		marker1,
		marker2,
		pointData,
		lineData,
		polygonData,
		nexrad
	};
	var layerControlOptions = {
		collapsed: false
	};
	// map.removeLayer(openStreetMap);
	// map.removeLayer(marker1);
	L.control.layers(baseMaps, overlayMaps, layerControlOptions).addTo(map);
</script>
</body>
</html>