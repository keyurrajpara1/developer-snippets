<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript" src="js/angular.min.js"></script>
</head>
<body>
	<form>
		<div ng-app="">
			<table>
				<tr>
					<td>First Name</td>
					<td><input type="text" ng-model="firstName"></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><input type="text" ng-model="lastName"></td>
				</tr>
				<tr>
					<td>Quantity</td>
					<td><input type="text" ng-model="quantity"></td>
				</tr>
				<tr>
					<td>Cost</td>
					<td><input type="text" ng-model="cost" value="50"></td>
				</tr>
				<tr>
					<td><input type="button" value="Click Here" ng-click="message=firstName + ' ' + lastName + ' has to pay ' + cost * quantity"></td>
					<td>{{message}}</td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>