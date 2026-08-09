<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript">
		var app = angular.module("myModule", []);
		app.controller("firstController", function($scope){
			$scope.message = "AngularJS Tutorial";
		});
		app.controller("dataController", function($scope){
			let listEmployees = [
				{ firstName: "Dawn", lastName: "Cassidy", gender: "Female", salary: 35000 },
				{ firstName: "Paul", lastName: "Hastings", gender: "Male", salary: 25000 },
				{ firstName: "Steve", lastName: "Payne", gender: "Male", salary: 30000 },
				{ firstName: "Tina", lastName: "Duggan", gender: "Female", salary: 28000 },
				{ firstName: "Edward", lastName: "Garrett", gender: "Male", salary: 30000 },
				{ firstName: "Claudia", lastName: "Fox", gender: "Female", salary: 32000 },
			];
			$scope.employees = listEmployees;
		});
	</script>
</head>
<body ng-app="myModule">
	<div ng-controller="firstController">
		{{ message }}
	</div>
	<div ng-controller="dataController">
		<!-- <input type="text" ng-model="searchText"><br> -->
		Search by firstname: <input type="text" ng-model="search.firstName"><br>
		Search by lastname: <input type="text" ng-model="search.lastName"><br>
		<table>
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Gender</th>
					<th>Salary</th>
				</tr>
			</thead>
			<tbody>
				<!-- <tr ng-repeat="employee in employees | filter:searchText | orderBy:'-salary'"> -->
				<tr ng-repeat="employee in employees | filter:search | orderBy:'-salary'">
					<td>{{ employee.firstName | uppercase }}</td>
					<td>{{ employee.lastName | lowercase }}</td>
					<td>{{ employee.gender }}</td>
					<td>{{ employee.salary | currency:"$" }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>