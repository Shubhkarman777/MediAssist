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
        <title>Doctor Profile</title>
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
        function showpreview(file) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#pic').attr('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }

        $(document).ready(function() {
            fetchAllPids();

            $("#search").click(function() {
                $dname = $("#name").val();
                $.getJSON("doctor-json-search.php?dname=" + $dname, function(jsonArray) {
                    if (jsonArray.length != 0) {

                        $("#mob").val(jsonArray[0].mob);
                        $('#pic').attr('src', jsonArray[0].pic);
                        $("#qual").val(jsonArray[0].qual);
                        $("#spcl").val(jsonArray[0].spec);
                        $("#exp").val(jsonArray[0].exp);
                        $("#hname").val(jsonArray[0].hname);
                        $("#add").val(jsonArray[0].hadd);
                        $("#city").val(jsonArray[0].city);
                        $("#inst").val(jsonArray[0].others);
                        $("#hdn").val(jsonArray[0].pic);

                    } else {
                        alert("Invalid Id");
                    }
                });
            });

            function fetchAllPids() {
                $dname = $("#name").val();

                $.getJSON("doctor-json-search.php?dname=" + $dname, function(jsonArray) {

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
            <?php include_once("header.php"); ?>
            <div class="row" style="height:230px; background-color:white; overflow-x:hidden">
                <img src="PICS/hc.jpg">
            </div>
            <div class="col-md-10 offset-1" style="background-color:antiquewhite;">
                <center>
                    <form action="doctor-profile-process.php" enctype="multipart/form-data" method="post">
                        <br>
                        <input type="hidden" id="hdn" name="hdn">
                        <div class="form-group col-md-5">
                            <img id="pic" width="150" height="150" style="border:1px solid black; background-color:white">
                            <br><br>
                            <label><h5>Upload Pic</h5></label>
                        </div>
                        <div class="custom-file col-md-5">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" value="Pic" onchange="showpreview(this);" name="Pic" id="Pic">
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        </div>
                        <br><br>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label><h5>Name</h5></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required readonly value=<?php echo $_SESSION[ "uid"];?>>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault03"><h5>Mobile No.</h5></label>
                                <input type="number" class="form-control" id="mob" name="mob" placeholder="Mobile" pattern=[7-9]{1}[0-9]{9}$ required>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-4">
                                <label><h5>Qualification</h5></label>
                                <input type="text" class="form-control" name="qual" id="qual" placeholder="Qualification" required>
                            </div>
                            <div class="col-md-4">
                                <label><h5>Specialization</h5></label>
                                <input type="text" class="form-control" id="spcl" name="spcl" placeholder="Specialization" required>
                            </div>
                            <div class="col-md-4">
                                <label><h5>Experience</h5></label>
                                <input type="text" class="form-control" id="exp" name="exp" placeholder="Experience" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-4">
                                <label><h5>Hospital Name</h5></label>
                                <input type="text" class="form-control" id="hname" name="hname" placeholder="Hospital Name" required>
                            </div>
                            <div class="col-md-4">
                                <label><h5>Address</h5></label>
                                <input type="text" class="form-control" id="add" name="add" placeholder="Hospital Address" required>
                            </div>
                            <div class="col-md-4">
                                <label><h5>City</h5></label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label><h5>Other Details</h5></label>
                            <textarea rows="3" class="form-control" id="inst" name="inst" placeholder="Other Details" required></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="modal-footer row" style="background-color:white">
                                <input type="button" class="btn" name="btn" value="search" id="search" style="background-color:black; color:white" disabled>
                                <input type="submit" class="btn" name="btn" value="save" id="save" style="background-color:black; color:white">
                                <input type="submit" class="btn" name="btn" value="update" id="update" style="background-color: black; color:white" disabled>
                            </div>
                        </div>
                        <br>
                    </form>
                </center>
            </div>
            <br><br>
            <?php include_once("footer.php"); ?>
        </div>
    </body>

    </html>
