<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>AngularJS Tutorial</title>
      <script src="js/angular.min.js"></script>
      <script src="js/custom.js"></script>
   </head>
   <body ng-app="myApp">
      <div ng-controller="autoCompleteAjax" class="container" style="width: 700px;">
         Question: <input type="text" ng-model="question" name="question" list="question" size="60" ng-change="getQuestions()" ng-click="getQuestions()">
         <hr>
         <datalist id="question">
            <option ng-repeat="x in records">{{ x.title }}</option>
         </datalist>
      </div>
   </body>
</html>


