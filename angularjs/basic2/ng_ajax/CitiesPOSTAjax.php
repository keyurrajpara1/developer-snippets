<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>AngularJS Tutorial</title>
      <script src="js/angular.min.js"></script>
      <script src="js/custom.js"></script>
   </head>
   <body ng-app="myApp">
      <div ng-controller="citiesAjax" class="container" style="width: 500px;">
         City: <input type="text" ng-model="city" name="city" ng-change="getCities()" size="30">
         <hr>
         <ul>
            <li ng-repeat="x in records">{{ "City: " + x.name + ", Country: " + x.country }}</li>
         </ul>
      </div>
   </body>
</html>

