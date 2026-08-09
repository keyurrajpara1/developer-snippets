// Initialize Angular App
var app = angular.module("myApp", []);

// fruitsAjax Controller
app.controller("fruitsAjax", function ($scope, $http) {
    $scope.getFruits = function () {
        $http({
            method: "GET",
            url: "http://localhost/angular_js_ajax/dynamic_json/fruitsJSON.php?fruit=" + $scope.fruit
        }).then(function (response) {
            $scope.records = response.data.records;
            $scope.status = response.data.status;
            $scope.message = response.data.message;
        }, function (response) {

        });
    };
});

//-------------------------------------------------------------

// citiesAjax Controller
app.controller("citiesAjax", function ($scope, $http) {

    $scope.getCities = function () {

        var temp = {
            "city": $scope.city
        };

        $http({
            method: "POST",
            url: "http://localhost/angular_js_ajax/dynamic_json/citiesJSON.php",
            data: JSON.stringify(temp)
        }).then(function (response) {
            $scope.records = response.data.records;
            $scope.status = response.data.status;
            $scope.message = response.data.message;
            console.log($scope.records);
        }, function (response) {

        });
    };
});

//-------------------------------------------------------------

// autoCompleteAjax Controller
app.controller("autoCompleteAjax", function ($scope, $http) {
    $scope.getQuestions = function(){
        $http({
            method: "GET",
            url : "http://localhost/angular_js_ajax/dynamic_json/autoCompleteJSON.php?q=" + $scope.question
        }).then(function(response){
            $scope.records = response.data.records;
        }, function(response){
            
        });
    };
});

//-------------------------------------------------------------

// profilesAjax Controller
app.controller("profilesAjax", function ($scope, $http) {
    $scope.getProfiles = function(){
        $http({
            method : "GET",
            url : "http://localhost/angular_js_ajax/dynamic_json/profilesJSON.php?name=" + $scope.username
        }).then(function(response){
            $scope.records = response.data.records;
            $scope.status = response.data.status;
            $scope.message = response.data.message;
        }, function(response){
            
        });
    };
});


