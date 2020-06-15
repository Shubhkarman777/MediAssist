$(document).ready(function () {

    $count = 0;

    $('.ratings_stars').click(function () {
        //var star = this;
        //$(star).addClass('ratings_vote');
        var id = $(this).attr('id');
        $(this).prevAll().andSelf().addClass('ratings_vote');
        //$(this).prevAll().andSelf().addClass('ratings_vote').nextAll.removeClass('ratings_vote');
        $(this).nextAll().removeClass('ratings_vote').addClass('ratings_empty'); 
        $count = id;
        $("#hdn").val($count);
    });

    /*$('.ratings_stars').dblclick(function () {
        var id = $(this).attr('id');
        $(this).andSelf().removeClass('ratings_vote').addClass('ratings_empty');
        $count = $count - 1;
        $("#hdn").val($count);
    });*/

    $("#items1").change(function () {
        $hname = $(this).val();
        $('#items2').val("");
        $.getJSON("fetch-all-doctors.php?hname=" + $hname, function (jsonArray) {
            var toAppend = '';
            $('#items2').val("");
            //alert(JSON.stringify(jsonArray));
            $.each(jsonArray, function (i, o) {
                toAppend += '<option>' + o.dname + '</option>';
            });
            $('#items2').append(toAppend);

        });
    });

    $("#save2").click(function () {
        $qs = $("#frm4").serialize();
        $url = "Reviews-process.php?" + $qs;
        $.get($url, function (response) {
            $("#resultt").html(response);
        });
    });
});
