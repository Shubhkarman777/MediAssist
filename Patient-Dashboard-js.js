    $(document).ready(function () {

        $(document).ajaxStart(function () {
            $("#waitt").show();
        });

        $(document).ajaxStop(function () {
            $("#waitt").hide();
        });

        $(document).ajaxStart(function () {
            $("#waitt1").show();
        });

        $(document).ajaxStop(function () {
            $("#waitt1").hide();
        });

        $("#save").click(function () {
            if ($("#pid1").val() == "") {
                $("#pid1").css("border", "2px red solid");
                $("#pid1").focus();
                return;
            }
            if ($("#lowl").val() == "") {
                $("#lowl").css("border", "2px red solid");
                $("#lowl").focus();
                return;
            }
            if ($("#highl").val() == "") {
                $("#highl").css("border", "2px red solid");
                $("#highl").focus();
                return;
            }
            if ($("#date").val() == "") {
                $("#date").css("border", "2px red solid");
                $("#date").focus();
                return;
            }
            if ($("#time").val() == "") {
                $("#time").css("border", "2px red solid");
                $("#time").focus();
                return;
            }
            $qs2 = $("#frm").serialize();
            $url = "BP-Records.php?" + $qs2;
            $.get($url, function (response) {
                $("#result").html(response);
            });
        });

        $("#save1").click(function () {
            if ($("#pid2").val() == "") {
                $("#pid2").css("border", "2px red solid");
                $("#pid2").focus();
                return;
            }
            if ($("#type").val() == "none") {
                $("#type").css("border", "2px red solid");
                $("#type").focus();
                return;
            }
            if ($("#cate").val() == "none") {
                $("#cate").css("border", "2px red solid");
                $("#cate").focus();
                return;
            }
            if ($("#lev").val() == "") {
                $("#lev").css("border", "2px red solid");
                $("#lev").focus();
                return;
            }
            if ($("#lev1").val() == "") {
                $("#lev1").css("border", "2px red solid");
                $("#lev1").focus();
                return;
            }
            if ($("#lev2").val() == "") {
                $("#lev2").css("border", "2px red solid");
                $("#lev2").focus();
                return;
            }
            if ($("#date1").val() == "") {
                $("#date1").css("border", "2px red solid");
                $("#date1").focus();
                return;
            }
            if ($("#time1").val() == "") {
                $("#time1").css("border", "2px red solid");
                $("#time1").focus();
                return;
            }
            $qs2 = $("#frm1").serialize();
            $url = "Sugar-Records.php?" + $qs2;
            $.get($url, function (response) {
                $("#result1").html(response);
            });
        });
    });
