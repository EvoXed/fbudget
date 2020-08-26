$(function () {
    $(".changePassBtn").click(function () {
        let neww = $(".changePass input").css("width");
        $(this).animate({
            width: neww
        }, 300, function () {
            $(".changePass input").fadeIn(300, function () {
                $(".changePassBtn").hide();
            }).focus();
        });
    });

    /*//Shows Button When Unfocussed
    $(".changePass input").blur(function () {
        $(".changePassBtn").css("width", "auto");
        let neww = $(".changePassBtn").css("width");
        $(this).animate({
            width: neww
        }, 300, function () {
            $(".changePassBtn").show(0, function () {
                $(".changePass input").fadeOut(500, function () {
                    $(".changePass input").css("width", "auto");
                });
            });
        });
    });*/
});
