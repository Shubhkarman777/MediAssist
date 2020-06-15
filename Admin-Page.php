<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <script type="text/javascript" src="JS/angular.min.js"></script>
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <script src="JS/jquery-1.9.1.js"></script>
    <script src="JS/bootstrap.js"></script>
    <style type="text/css">
        body {
            background-color: blanchedalmond;
            background-attachment: fixed;
        }

    </style>
    <script type="text/javascript">
        var myapp = angular.module("app", []);
        myapp.controller("mycontroller", function($scope, $http) {
            $scope.json;
            $scope.doFetchJson = function() {
                $http.get("Doctors-json-fetch-all.php").then(shanti, noshanti);

                function shanti(jsonArray) {
                    //alert(JSON.stringify(response.data));
                    $scope.json = jsonArray.data;

                }

                function noshanti(jsonArray) {
                    alert(jsonArray.data);
                }

            }

            $scope.json1;
            $scope.doFetchJson1 = function() {
                $http.get("Patients-json-fetch-all.php").then(shanti, noshanti);

                function shanti(jsonArray) {
                    //alert(JSON.stringify(response.data));
                    $scope.json1 = jsonArray.data;

                }

                function noshanti(jsonArray) {
                    alert(jsonArray.data);
                }

            }

            $scope.deleteRecord1 = function(dname) {
                $http.get("doctor-del-record.php?dname=" + dname).then(shanti, noshanti);

                function shanti(jsonArray) {
                    $scope.doFetchJson();
                }

                function noshanti(jsonArray) {
                    alert(jsonArray.data);
                }
            }

            $scope.deleteRecord2 = function(pid) {
                $http.get("patient-del-record.php?pid=" + pid).then(shanti, noshanti);

                function shanti(jsonArray) {
                    $scope.doFetchJson1();
                }

                function noshanti(jsonArray) {
                    alert(jsonArray.data);
                }
            }
        });

    </script>
</head>

<body ng-app="app" ng-controller="mycontroller" style="overflow-x:hidden">
    <div class="container-fluid">
        <div class="row">
           <div class="col-md-12 display-3 text-center" style="height:90px; background-color:pink; color:blue; font-weight:bold">
            ADMIN DASHBOARD
            </div>
        </div>
        <center>
            <br><br>
            <h3>Filter: <input type="text" ng-model="hint"></h3>
            <input type="button" class="btn" ng-click="doFetchJson();" value="Fetch all doctors details" style="background-color:black; color:white">
            <input type="button" class="btn" ng-click="doFetchJson1();" value="Fetch all patients details" style="background-color:black; color:white">
        </center>
        <hr>
        <div class="row col-md-12">
            <div class="col-md-5 offset-1">
                <table border=1 class="table-md-responsive text-center">
                    <tr>
                        <th>Sr. No</th>
                        <th>Uid</th>
                        <th>Password</th>
                        <th>Mobile</th>
                        <th>Delete record</th>
                    </tr>
                    <tr ng-repeat="record in json | filter:hint">
                        <td>{{$index+1}}</td>
                        <td>{{record.uid}}</td>
                        <td>{{record.pwd}}</td>
                        <td>{{record.mob}}</td>
                        <td><input type="button" ng-click="deleteRecord1(record.dname);" value="delete"></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table border=1 class="table-md-responsive text-center">
                    <tr>
                        <th>Sr. No</th>
                        <th>Uid</th>
                        <th>Password</th>
                        <th>Mobile</th>
                        <th>Delete record</th>
                    </tr>
                    <tr ng-repeat="record in json1 | filter:hint">
                        <td>{{$index+1}}</td>
                        <td>{{record.uid}}</td>
                        <td>{{record.pwd}}</td>
                        <td>{{record.mob}}</td>
                        <td><input type="button" ng-click="deleteRecord2(record.pid);" value="delete"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
