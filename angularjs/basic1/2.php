<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript" src="js/angular.min.js"></script>
</head>
<body>
<h1>Sample Application</h1>
<div ng-app="">
	<p>Enter your name: <input type="text" ng-model="name"></p>
	<p>Hello <span ng-bind="name"></span>!</p>
</div>
</body>
</html>