<?php
session_start();
if(isset($_SESSION["uid"])==false)
{
    header("location:Index.html"); 
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
    </head>
    <script type="text/javascript" src="JS/angular.min.js"></script>
    <script type="text/javascript" src="JS/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="JS/bootstrap.js"></script>
    <script type="text/javascript" src="Patient-Dashboard-js.js"></script>
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <script type="text/javascript" src="rating.js"></script>
    <style type="text/css">
        body {
            background-color: blanchedalmond;
            background-attachment: fixed;
        }

        #pid {
            line-height: 10px;
            width: 150px;
        }

        a {
            text-decoration: inherit;
            color: black
        }

        a:hover {
            text-decoration: inherit;
            color: darkred;
        }

        #card:hover {
            transform: scale(0.9);
        }

        #waitt {
            display: none;
        }

        #waitt1 {
            display: none;
        }

        a {
            text-decoration: inherit;
            color: black
        }

        a:hover {
            text-decoration: inherit;
            color: darkred;
        }

        .rate_widget {
            overflow: visible;
            padding: 10px;
            position: relative;
            height: 270px;
            margin-left: 150px;
        }

        .ratings_stars {
            background: url('PICS/star_empty.png') no-repeat;
            float: left;
            height: 28px;
            padding: 1px;
            width: 32px;
        }

        ,
        ratings_empty {
            background: url('PICS/star_empty.png') no-repeat;
        }

        .ratings_vote {
            background: url('PICS/star_full.png') no-repeat;
        }

        #goToTopBtn {
            bottom: 30px;
            opacity: .6;
            right: 10px;
            position: fixed;
            text-align: center;
            color: #FFF;
            font-weight: bold;
            border-radius: 50%;
            z-index: 10;
        }

        #goToTopBtn span {
            color: #FFF;
            font-size: 25px;
            padding: 0px 5px 0px 5px;
        }

    </style>
    <script type="text/javascript">
        var myapp = angular.module("app", []);
        myapp.controller("mycontroller", function($scope, $http) {
            $scope.json;
            $scope.piddd;
            $scope.selectedd;
            $scope.jsonArray;
            $scope.doFetchJson = function(sel) {
                $http.get("appointments-json-fetch-all.php?PID=" + $scope.piddd + "&Doctor=" + $scope.selectedd.Doctor).then(shanti, noshanti);

                function shanti(jsonArray) {
                    //alert(JSON.stringify(response.data));
                    $scope.json = jsonArray.data;

                }

                function noshanti(jsonArray) {
                    alert(jsonArray.data);
                }

            }
            $scope.doFetchDoctors = function() {
                $scope.piddd = document.getElementById("pidd").value;
                $http.get("doctor-json-fetch-all-doctors.php?PID=" + $scope.piddd).then(shanti, noshanti);

                function shanti(jsonarr) {
                    $scope.jsonArray = jsonarr.data;
                }

                function noshanti(jsonArray) {
                    alert(jsonarr.data);
                }

            }

            $scope.deleteRecord = function(napp) {
                $http.get("appointments-json-del-record.php?NewAppointment=" + napp).then(shanti, noshanti);

                function shanti(jsonArray) {

                    alert(jsonArray.data);
                    $scope.doFetchJson();
                }

                function noshanti(jsonArray) {
                    alert(jsonArray.data);
                }
            }


        });
        findallhospitals();

        function findallhospitals() {
            $.getJSON("fetch-all-hospitals.php", function(jsonArray) {
                var toAppend = '';
                $('#items1').val("");
                //alert(JSON.stringify(jsonArray));
                $.each(jsonArray, function(i, o) {
                    toAppend += '<option>' + o.hname + '</option>';
                });
                $('#items1').append(toAppend);

            });
        }


        /* $(document).ready(function() {

             $("#pidd").blur(function() {
                 $pidd = $("#pidd").val();
                 $.getJSON("doctor-json-fetch-all-doctors.php?PID=" + $pidd, function(jsonArray) {
                     //alert(JSON.stringify(jsonArray));
                     for (i = 0; i < jsonArray.length; i++) {
                         $("#doctorr").append("<option value='" + jsonArray[i].Doctor + "'>" + jsonArray[i].Doctor + "</option>");
                     }
                 });
             });

         });*/

    </script>

    <body ng-app="app" ng-controller="mycontroller" id="top">
        <a href="#top" id="goToTopBtn">
            <!-- see its styling in "code-font-size.php" -->
            <span class="btn bg-danger btn-outline-light">
		^
       </span>
        </a>
        <div class="container-fluid">
            <?php include_once("header.php");?>
            <div class="row" style="height:230px; background-color:white; overflow-x:hidden">
            <img src="PICS/hc.jpg">
            </div>
            <div class="row">
                <div class="col-md-12 text-md-center" style="background-color: darksalmon; height: 50px; font-size: 30px; font-family: cursive;">
                    Patient Dashboard
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card-deck">
                    <div class="col-md-3" id="card">
                        <a href="#" data-toggle="modal" data-target="#Sugar-Record">
                            <div class="card bg-transparent text-black small" style="font-family:sans-serif; font-weight:bold">
                                <img class="card-img-top" src="PICS/bloodsugar.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">SUGAR RECORD</h4>
                                    <p class="card-text">
                                        <p>
                                            If you have diabetes, self-testing your blood sugar (blood glucose) can be an important tool in managing your treatment plan.So, try to check regularly!!
                                        </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3" id="card">
                        <a href="#" data-toggle="modal" data-target="#BP-Record">
                            <div class="card bg-transparent text-black small" style="font-family:sans-serif; font-weight:bold">
                                <img class="card-img-top" src="PICS/bloodpressure.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">BP RECORD</h4>
                                    <p class="card-text">
                                        <p>It is also important for managing hypertension that is under control and reducing the risk of complications.So, try to check regularly!!</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3" id="card">
                        <a href="Highcharts-SugarRecord.php">
                            <div class="card bg-transparent text-black small" style="font-family:sans-serif; font-weight:bold">
                                <img class="card-img-top" src="PICS/blood-sugar-level-chart.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">SUGAR CHART</h4>
                                    <p class="card-text"></p>
                                    <p>You can check your monthly sugar record from here with the help of highcharts and also can download the report!!</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3" id="card">
                        <a href="Highcharts-BpRecord.php">
                            <div class="card bg-transparent text-black small" style="font-family:sans-serif; font-weight:bold">
                                <img class="card-img-top" src="PICS/p1_BPChart_ML0418.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">BP CHART</h4>
                                    <p class="card-text"></p>
                                    <p>You can check your monthly BP record from here with the help of highcharts and also can download the report!!</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card-deck">
                    <div class="col-md-3" id="card">
                        <a href="consultancy.php">
                            <div class="card bg-transparent text-black small" style="font-family:sans-serif; font-weight:bold">
                                <img class="card-img-top" src="PICS/doctor-patient-consultation.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">DOCTOR CONSULTATIONS</h4>
                                    <p class="card-text">
                                        <p></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3" id="card">
                        <a href="#" data-toggle="modal" data-target="#Appointments-schedule">
                            <div class="card bg-transparent text-black small" style="font-family:sans-serif; font-weight:bold">
                                <img class="card-img-top" src="PICS/appointment.png" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">APPOINTMENTS SCHEDULE</h4>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3" id="card">
                        <a href="#" data-toggle="modal" data-target="#Reviews">
                            <div class="card bg-transparent text-black small" style="font-family:sans-serif; font-weight:bold">
                                <img class="card-img-top" src="Pics/reviews.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">WRITE DOCTOR REVIEWS</h4>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3" id="card">
                        <a href="Patient-profile.php">
                            <div class="card bg-transparent text-black small" style="font-family:sans-serif; font-weight:bold">
                                <img class="card-img-top" src="PICS/profile.png" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">PATIENT PROFILE</h4>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card-deck">
                    <div class="col-md-3 offset-3" id="card">
                        <a href="#" data-toggle="modal" data-target="#Sugar-recommend">
                            <div class="card bg-transparent text-black small" style="font-family:sans-serif; font-weight:bold">
                                <img class="card-img-top" src="PICS/maxresdefault.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">15 Easy Ways to Lower Blood Sugar Levels Naturally</h4>
                                    <p class="card-text">
                                        <p></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3" id="card">
                        <a href="#" data-toggle="modal" data-target="#BP-recommend">
                            <div class="card bg-transparent text-black small" style="font-family:sans-serif; font-weight:bold">
                                <img class="card-img-top" src="PICS/hqdefault.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">10 ways to control high blood pressure without medication</h4>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <br><br>
            <?php include_once("footer.php") ?>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="BP-Record">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:darksalmon">
                        <h5 class="modal-title">Record Blood Pressure</h5><img id="waitt" src="PICS/loading9.gif">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <form id="frm">
                        <div class="modal-body">
                            <div class="form-group">
                                <center>
                                    <img src="PICS/bloodpressure2.jpg">
                                </center>
                            </div>
                            <div class="form-group" style="font-family:cursive; color:black">
                                <label for="formGroupExampleInput">Patient id</label>
                                <input type="text" class="form-control" id="pid1" name="pid1" placeholder="Patient id" readonly value=<?php echo $_SESSION[ "uid"];?>>
                            </div>
                            <div class="form-group" style="font-family:cursive; color:black">
                                <label for="formGroupExampleInput">Low</label>
                                <input type="number" class="form-control" id="lowl" name="lowl" placeholder="Diastolic">
                            </div>
                            <div class="form-group" style="font-family:cursive; color:black">
                                <label for="formGroupExampleInput">High</label>
                                <input type="number" class="form-control" id="highl" name="highl" placeholder="Systolic">
                            </div>
                            <div class="form-group" style="font-family:cursive; color:black">
                                <label for="formGroupExampleInput">Date</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="Date">
                            </div>
                            <div class="form-group" style="font-family:cursive; color:black">
                                <label for="formGroupExampleInput">Time</label>
                                <input type="time" class="form-control" id="time" name="time" placeholder="time">
                            </div>
                        </div>
                        <center>
                            <div class="form-group">
                                <span id="result" style="color: red; font-weight: bold; font-size: 15px; font-family: cursive"></span>
                            </div>
                        </center>
                        <div class="modal-footer" style="background-color:darksalmon ">
                            <button type="button" class="btn bg-white" name="btn" value="save" id="save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="Sugar-Record">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:darksalmon">
                        <h5 class="modal-title">Record Sugar</h5><img id="waitt1" src="PICS/loading9.gif">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <form id="frm1">
                        <div class="modal-body">
                            <div class="form-group">
                                <center>
                                    <img src="PICS/Diabetes-Diagnosis.jpg">
                                </center>
                            </div>
                            <div class="form-group" style="font-family:cursive; color:black">
                                <label for="formGroupExampleInput">Patient id</label>
                                <input type="text" class="form-control" id="pid2" name="pid2" placeholder="Patient id" readonly value=<?php echo $_SESSION[ "uid"];?>>
                            </div>
                            <div class="form-group" style="font-family:cursive; color:black">
                                <label for="formGroupExampleInput">Sugar Type</label>
                                <select id="type" name="type">
                                <option value="none">Select</option>
                                <option value="Blood sugar Test">Blood sugar Test</option>
                                <option value="Urine sugar Test">Urine sugar Test</option>
                            </select>
                            </div>
                            <div class="form-group" style="font-family:cursive; color:black">
                                <label for="formGroupExampleInput">Category</label>
                                <select id="cate" name="cate">
                                <option value="none">Select</option>
                                <option value="Random">Random</option>
                                <option value="Fasting">Fasting</option>
                            </select>
                            </div>
                            <div class="form-group" style="font-family:cursive; color:black">
                                <label for="formGroupExampleInput">Normal</label>
                                <input type="text" class="form-control" id="lev" name="lev" placeholder="Sugar Level">
                            </div>
                            <div class="form-group" style="font-family:cursive; color:black">
                                <label for="formGroupExampleInput">Pre-Diabetic</label>
                                <input type="text" class="form-control" id="lev1" name="lev1" placeholder="Sugar Level">
                            </div>
                            <div class="form-group" style="font-family:cursive; color:black">
                                <label for="formGroupExampleInput">Diabetic</label>
                                <input type="text" class="form-control" id="lev2" name="lev2" placeholder="Sugar Level">
                            </div>
                            <div class="form-group" style="font-family:cursive; color:black">
                                <label for="formGroupExampleInput">Date</label>
                                <input type="date" class="form-control" id="date1" name="date1" placeholder="Date">
                            </div>
                            <div class="form-group" style="font-family:cursive; color:black">
                                <label for="formGroupExampleInput">Time</label>
                                <input type="time" class="form-control" id="time1" name="time1" placeholder="time">
                            </div>
                        </div>
                        <center>
                            <div class="form-group">
                                <span id="result1" style="color: red; font-weight: bold; font-size: 15px; font-family: cursive"></span>
                            </div>
                        </center>
                        <div class="modal-footer" style="background-color:darksalmon">
                            <button type="button" class="btn bg-white" name="btn" value="save1" id="save1">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="BP-recommend">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:darksalmon">
                        <h5 class="modal-title">Recommendations to control high Blood Pressure</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <form id="frm2">
                        <div class="modal-body">
                            <div class="form-group" style="font-family:cursive; color:black">
                                <p>1. Lose extra pounds and watch your waistline</p>
                                <p>2. Exercise regularly</p>
                                <p>3. Eat a healthy diet</p>
                                <p>4. Reduce sodium in your diet</p>
                                <p>5. Limit the amount of alcohol you drink</p>
                                <p>6. Quit smoking</p>
                                <p>7. Cut back on caffeine</p>
                                <p>8. Reduce your stress</p>
                                <p>9. Monitor your blood pressure at home and see your doctor regularly</p>
                                <p>10. Get support</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="Sugar-recommend">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:darksalmon">
                        <h5 class="modal-title">Recommendations to maintain normal Blood Sugar Level</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <form id="frm3">
                        <div class="modal-body">
                            <div class="form-group" style="font-family:cursive; color:black">
                                <p>1. Exercise Regularly</p>
                                <p>2. Control Your Carb Intake</p>
                                <p>3. Increase Your Fiber Intake</p>
                                <p>4. Drink Water and Stay Hydrated</p>
                                <p>5. Implement Portion Control</p>
                                <p>6. Choose Foods With a Low Glycemic Index</p>
                                <p>7. Control Stress Levels</p>
                                <p>8. Monitor Your Blood Sugar Levels</p>
                                <p>9. Get Enough Quality Sleep</p>
                                <p>10. Eat Foods Rich in Chromium and Magnesium</p>
                                <p>11. Try Apple Cider Vinegar</p>
                                <p>12. Experiment With Cinnamon Extract</p>
                                <p>13. Try Berberine</p>
                                <p>14. Eat Fenugreek Seeds</p>
                                <p>15. Lose Some Weight</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" role="dialog" id="Appointments-schedule">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:darksalmon">
                        <h5 class="modal-title">Appointments-Schedule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <form id="frm5">
                        <div class="modal-body">
                            <div class="form-group" style="font-family:cursive; color:black">
                                <label for="formGroupExampleInput">Patient id</label>
                                <input type="text" class="form-control" id="pidd" name="pidd" ng-blur="doFetchDoctors();" placeholder="Patient Id" readonly ng-init=<?php echo $_SESSION[ "uid"];?> value=
                                <?php echo $_SESSION[ "uid"];?>>
                            </div>
                            <div class="form-group" style="font-family:cursive; color:black">
                                <label for="formGroupExampleInput">Doctor</label>
                                <select class="form-control" id="doctorr" ng-model="selectedd" ng-options="one.Doctor for one in jsonArray" ng-change="doFetchJson();">
                                </select>
                            </div>
                            <div class="form-group">
                                <center>
                                    <table border="1" class="table-responsive table-sm">
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>PID</th>
                                            <th>DName</th>
                                            <th>Prev. Appointments</th>
                                            <th>Next Appointments</th>
                                            <th>Prescription Slip</th>
                                            <th>Cancel Appointment</th>
                                        </tr>
                                        <tr ng-repeat="record in json">
                                            <td style="text-align:center;">{{$index+1}}</td>
                                            <td style="text-align:center;">{{record.PID}}</td>
                                            <td style="text-align:center;">{{record.Doctor}}</td>
                                            <td style="text-align:center;">{{record.CDate}}</td>
                                            <td style="text-align:center;">{{record.NewAppointment}}</td>
                                            <td style="text-align:center;"><a href='{{record.Pic}}' target="_blank">{{record.Pic}}</a></td>
                                            <td style="text-align:center;"><button type="button" class="btn bg-primary" name="btn" style="color:white" ng-click="deleteRecord(record.NewAppointment);">Cancel</button></td>
                                        </tr>
                                    </table>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="Reviews">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:darksalmon">
                        <h5 class="modal-title">Rate the Doctors</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <form id="frm4">
                        <input type="hidden" name="hdn" id="hdn">
                        <br><br>
                        <select id="items1" name="items1" style="margin-left:80px">
                        <option value="none">Hospital</option>
                        </select>
                        <select id="items2" name="items2" style="margin-left:85px">
                        <option value="none">Doctor</option>
                        </select>
                        <div id="r1" class="rate_widget">
                            <div class="ratings_stars" id="1"></div>
                            <div class="ratings_stars" id="2"></div>
                            <div class="ratings_stars" id="3"></div>
                            <div class="ratings_stars" id="4"></div>
                            <div class="ratings_stars" id="5"></div>
                            <br><br>
                            <textarea rows="7" cols="20" id="rev" name="rev" required style="margin-right:-50px;"></textarea><br><br>
                        </div>
                        <div class="form-group" style="margin-left:150px;">
                            <span id="resultt" style="color: red; font-weight: bold; font-size: 15px; font-family: cursive;"></span>
                        </div>
                        <div class="modal-footer" style="background-color:darksalmon">
                            <button type="button" class="btn bg-white" name="btn" value="save2" id="save2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
