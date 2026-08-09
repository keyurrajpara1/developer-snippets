<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript" src="js/angular.min.js"></script>
</head>
<body ng-app="myApp" ng-controller="formController">
	<form name="frmUser" ng-submit="insertData()">
		<label class="text-success">{{successInsert}}</label>
		<table>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="firstName" ng-model="requestData.firstName"></td>
				<td><span class="text-danger">{{errorFirstName}}</span></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="lastName" ng-model="requestData.lastName"></td>
				<td><span class="text-danger">{{errorLastName}}</span></td>
			</tr>
			<tr>
				<td colspan="3" align="center"><input type="submit" name="btnSubmit" value="Submit"></td>
			</tr>
		</table>
	</form>
	<script type="text/javascript">
		var application = angular.module("myApp", []);
		application.controller('formController', function($scope, $http){
			$scope.requestData = {};
			$scope.insertData = function(){
				$http({
					method: "post",
					url: "insert.php",
					data: $scope.requestData,
				})
				.then(function (response){
					let responseData = response.data;
					if(responseData.error){
						$scope.errorFirstName = responseData.error.firstName;
						$scope.errorLastName = responseData.error.lastName;
						$scope.successInsert = null;
					}
					else{
						$scope.successInsert = responseData.message;
						$scope.requestData = null;
						$scope.errorFirstName = null;
						$scope.errorLastName = null;
					}
				},
				function (error){
					console.log(error);
				});
			}
		});
	</script>
</body>
</html>