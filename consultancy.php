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
        <title>Consultations</title>
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
            $("#PID").blur(function() {
                $PID = $("#PID").val();
                $.getJSON("doctor-json-fetch-all-doctors.php?PID=" + $PID, function(jsonArray) {
                    for (i = 0; i < jsonArray.length; i++) {
                        $("#Doctor").append("<option value='" + jsonArray[i].Doctor + "'>" + jsonArray[i].Doctor + "</option>");
                    }

                });
            });

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
            <br><br>
            <div class="col-md-10 offset-1" style="background-color:antiquewhite;">
                <center>
                    <form action="Consultancy-process.php" enctype="multipart/form-data" method="post">
                        <br>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label><h5>Patient Id</h5></label>
                                <input type="text" class="form-control" name="PID" id="PID" placeholder="Patient Id" readonly required value=<?php echo $_SESSION[ "uid"];?>>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect2"><h5>Doctor Name</h5></label>
                                <select class="form-control" id="Doctor" name="Doctor" required>
                            <option value="none">Select</option>
                        </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label><h5>Consultation Date</h5></label>
                                <input type="date" class="form-control" id="cdate" name="cdate" required>
                            </div>
                            <div class="col-md-6">
                                <label><h5>Next Consultation Date</h5></label>
                                <input type="date" class="form-control" id="ncdate" name="ncdate" required>
                            </div>
                        </div>
                        <div class="form-group col-md-5">

                        </div><br>
                        <div class="form-group col-md-5">
                            <img id="pic" width="150" height="150" style="border:1px solid black; background-color:white">
                            <br><br>
                            <label><h5>Upload Prescription</h5></label>
                        </div>
                        <div class="custom-file col-md-5">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" value="Pic" onchange="showpreview(this);" name="Pic" id="Pic" required>
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label><h5>Instructions By the Doctor</h5></label>
                            <textarea rows="3" class="form-control" id="inst" name="inst" required></textarea>
                        </div>
                        <div class="form-group col-md-5">

                        </div>
                        <div class="form-group">
                            <div class="modal-footer row" style="background-color:white">
                                <input type="submit" class="btn" name="btn" value="save" id="save" style="background-color:black; color:white">
                            </div>
                        </div>
                        <br>
                    </form>
                </center>
            </div>
            <br><br>
            <?php include_once("footer.php") ?>
        </div>
    </body>

    </html>
