<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
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

            /*$scope.doSms=function(mobile,pwd)
            {

                $http.get("sms-send.php?mobile="+mobile+"&msg="+pwd).then(shanti, noshanti);

                function shanti(jsonArray) {
                    //alert(JSON.stringify(response.data));
                    alert( jsonArray.data);
                }

                function noshanti(jsonArray) {
                    alert(jsonArray.data);
                }
            }*/

        });

    </script>
</head>

<body ng-app="app" ng-controller="mycontroller">
    <center>
       <br><br>
        <h3>Filter: <input type="text" ng-model="hint"></h3>
            <input type="button" class="btn" ng-click="doFetchJson();" value="Fetch all doctors details" style="background-color:black; color:white">
    </center>
    <hr>
    <div class="container">
        <div class="row">

            <div class="col-md-4" ng-repeat="record in json| filter:hint">
               <br><br>
                <div class="card">
                    <img class="card-img-top" src="{{record.pic}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{record.dname}}</h5>
                        <p class="card-text"></p>
                        <p>
                            <h6>Mobile:</h6>{{record.mob}}
                            <p>
                                <h6>Qualification:</h6>{{record.qual}}
                                <p>
                                    <h6>Specialization:</h6>{{record.spec}}
                                    <p>
                                        <h6>Expeience:</h6>{{record.exp}}
                                        <p>
                                            <h6>Hospital Name:</h6>{{record.hname}}
                                            <p>
                                                <h6>Hospital Address:</h6>{{record.hadd}}
                                                <p>
                                                    <h6>City:</h6>{{record.city}}
                                                    <p>
                                                        <h6>Other Details:</h6>{{record.others}}
                                                        <!--<input type="button" ng-click="doSms(record.mobile,record.pwd);" class="btn btn-primary" value="Send SMS">-->
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
