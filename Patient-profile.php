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
        <title>Patient Profile</title>
    </head>
    <script type="text/javascript" src="JS/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="JS/bootstrap.js"></script>
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <style type="text/css">
        body {
            background-color: blanchedalmond;
            background-attachment: fixed;
        }

        #pid {
            line-height: 10px;
            width: 150px;
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
        $(document).ready(function() {

            fetchAllPids();

            $("#search").click(function() {

                $pidd = $("#pidd").val();

                $.getJSON("Patient-profile-search.php?pid=" + $pidd, function(jsonArray) {

                    if (jsonArray.length != 0) {
                        $("#fname").val(jsonArray[0].fname);
                        $("#lname").val(jsonArray[0].lname);
                        $("#mail").val(jsonArray[0].mail);
                        $("#mob").val(jsonArray[0].mob);
                        $("#gndr").val(jsonArray[0].gender);
                        $("#city").val(jsonArray[0].city);
                        $("#state").val(jsonArray[0].state);
                        $("#zip").val(jsonArray[0].zip);
                    } else {
                        alert("Invalid PID!!")
                    }

                });

            });

            function fetchAllPids() {
                $pidd = $("#pidd").val();

                $.getJSON("Patient-profile-search.php?pid=" + $pidd, function(jsonArray) {

                    if (jsonArray.length != 0) {
                        $("#search").prop('disabled', false);
                        $("#update").prop('disabled', false);
                        $("#save").prop('disabled', true);
                    }
                });

            }

        });

    </script>

    <body id="top">
        <a href="#top" id="goToTopBtn">
            <!-- see its styling in "code-font-size.php" -->
            <span class="btn bg-danger btn-outline-light">
		^
</span>
        </a>
        <div class="container-fluid">
            <?php include_once("header.php") ?>
            <div class="row" style="height:230px; background-color:white; overflow-x:hidden">
                <img src="PICS/hc.jpg">
            </div>
            <br>
            <div class="col-md-10 offset-1" style="background-color:antiquewhite;">
                <center>
                    <form action="patient-profile-process.php" id="frm">
                        <br>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationDefault01"><h5>First name</h5></label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationDefault02"><h5>Last name</h5></label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationDefaultUsername"><h5>Username</h5></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                    </div>
                                    <input type="text" class="form-control" id="pidd" name="pidd" placeholder="Username" readonly value=<?php echo $_SESSION[ "uid"];?> required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationDefault03"><h5>Email Id</h5></label>
                                <input type="email" class="form-control" placeholder="Email" id="mail" name="mail" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationDefault03"><h5>Mobile No.</h5></label>
                                <input type="text" class="form-control" placeholder="Mobile" id="mob" name="mob" pattern=[7-9]{1}[0-9]{9}$ required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationDefault03"><h5>Gender</h5></label>
                                <div class="form-group">
                                    <select class="form-control" id="gndr" name="gndr" required>
                                  <option>Male</option>
                                  <option>Female</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationDefault03"><h5>City</h5></label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationDefault04"><h5>State</h5></label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="State" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationDefault05"><h5>Zip</h5></label>
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <div class="modal-footer row" style="background-color:white">
                                <input type="button" class="btn" name="btn" value="search" id="search" style="background-color:black; color:white" disabled>
                                <input type="submit" class="btn" name="btn" value="save" id="save" style="background-color:black; color:white">
                                <input type="submit" class="btn" name="btn" value="update" id="update" style="background-color:black; color:white" disabled>
                            </div>
                        </div>
                    </form>
                </center>
            </div>
            <br><br>
            <?php include_once("footer.php") ?>
        </div>

    </body>

    </html>
