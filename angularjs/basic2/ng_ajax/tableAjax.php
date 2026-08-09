<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>AngularJS Tutorial</title>
      <script src="js/angular.min.js"></script>
      <script src="js/custom.js"></script>
      <style>
         table, th , td {
             border: 1px solid grey;
             border-collapse: collapse;
             padding: 5px;
         }

         table tr:nth-child(odd) {
             background-color: #f1f1f1;
         }

         table tr:nth-child(even) {
             background-color: #ffffff;
         }
      </style>
   </head>
   <body ng-app="myApp">
      <div ng-controller="profilesAjax" class="container" style="width: 500px;">
         Profile: <input type="text" ng-model="username" name="username" ng-change="getProfiles()" size="30">
         <hr>
         <table border="1">
            <tr>
               <th>S.No.</th>
               <th>Name</th>
               <th>Password</th>
               <th>Email</th>
            </tr>
            <tr ng-repeat="x in records | orderBy : 'name'">
               <td>{{ $index + 1 }}</td>
               <td>{{ x.name}}</td>
               <td>{{ x.password}}</td>
               <td>{{ x.email}}</td>
            </tr>
         </table>
      </div>
   </body>
</html>
