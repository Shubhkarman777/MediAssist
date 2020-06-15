function Pass(val, ref) {
        var r = /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
        if (r.test(val) == true && val.length > 8) {
            ref.style.color = "green";
            ref.innerHTML = "Valid and Strong";
        } else {
            if (val.length >= 8) {
                ref.style.color = "green";
                ref.innerHTML = "Valid and Average";
            } else {
                if (val.length >= 1 && val.length < 8) {
                    ref.style.color = "green";
                    ref.innerHTML = "Valid and Weak";
                } else {
                    ref.style.color = "red";
                    ref.innerHTML = "In-Valid";
                }
            }
        }
    }

    function Mobile(val, ref) {
        var r = /^[7-9]{1}[0-9]{9}$/;
        if (r.test(val) == true) {
            ref.style.color = "green";
            ref.innerHTML = "Valid";
        } else {
            ref.style.color = "red";
            ref.innerHTML = "In-Valid";
            document.getElementById("mobile").style.border = "2px solid red";
            document.getElementById("mobile").focus();
        }
    }

    $(document).ready(function() {

        $(document).ajaxStart(function() {
            $("#waitt").show();
        });

        $(document).ajaxStop(function() {
            $("#waitt").hide();
        });

        $("#uid").blur(function() {
            $uid = $("#uid").val();
            $.get("ajax-check-uid(signup).php?uid=" + $uid, function(data, status) {

                //$("#res").html(data);
                if (data == "1") {
                    $("#res").removeClass("one").addClass("two");
                } else {
                    $("#res").removeClass("two").addClass("one");
                }

            });
        });

        $("#signup").click(function() {
            if($("#uid").val() == "")
                {
                    $("#uid").css("border", "2px red solid");
                    $("#uid").focus();
                    return;
                }
            if($("#pwd").val() == "")
                {
                    $("#pwd").css("border", "2px red solid");
                    $("#pwd").focus();
                    return;
                }
            if($("#pwd2").val() == "")
                {
                    $("#pwd2").css("border", "2px red solid");
                    $("#pwd2").focus();
                    return;
                }
            if($("#mobile").val() == "")
                {
                    $("#mobile").css("border", "2px red solid");
                    $("#mobile").focus();
                    return;
                }
            $qs2 = $("#frm").serialize();
            $url = "signup-process.php?" + $qs2;
            $.get($url, function(response) {
                $("#result1").html(response);
            });
        });


        $("#login").click(function() {
            $qs2 = $("#frm1").serialize();
            $url = "login-process.php?" + $qs2;
            $.get($url, function(response) {
                if(response == "patient..")
                    location.href="Patient-Dashboard.php";
                else
                    if(response == "doctor..")
                        location.href="Doctor_Profile.php";
                else
                    $("#result").html(response); 
            });
        });

        $("#forgot").click(function() {
            $uid1 = $("#uid1").val();
            /*$.get("ajax-recover-pwd.php?uid1=" + $uid1, function(response, status) {
                if (response == "0")
                    alert("Invalid Id...");
                else
                    $("#pwd1").val(response);
            });*/
            $.get("forgot-password-sms.php?uid1=" + $uid1, function(response, status){
                alert(response);
            });
        });

        $("#pwd2").blur(function() {
            $a = $("#pwd").val();
            $b = $("#pwd2").val();
            if ($a == $b) {
                $("#errPwd1").css('color', "green");
                $("#errPwd1").html("Confirmed!!");
            } else {
                $("#errPwd1").css('color', "red");
                $("#errPwd1").html("Not Matched!!");
            }
        });

    });