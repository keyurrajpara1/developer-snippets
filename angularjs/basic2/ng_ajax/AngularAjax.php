<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>AngularJS Tutorial</title>
      <script src="js/angular.min.js"></script>
      <script src="js/custom.js"></script>
   </head>
   <body ng-app="myApp">
      <div ng-controller="fruitsAjax" class="container" style="width: 500px;">
         Fruits: <input type="text" ng-model="fruit" ng-change="getFruits()" name="fruit" size="30">
         <hr>
         <ul>
            <li ng-repeat="x in records">{{ "Name: " + x.name + ", Price: " + ( x.price | currency ) + ", Quantity: " + x.quantity }}</li>
         </ul>
      </div>
   </body>
</html>
