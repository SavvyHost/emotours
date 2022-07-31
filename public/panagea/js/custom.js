$(function () {
    $(function () {
        $(".secondary_nav ul a").click(function (e) {
            "use strict";
            console.log(1)
            e.preventDefault();
            $("html, body").animate(
                {
                    scrollTop: $($(this).attr('href')).offset().top -70,
                },
                0
            );
        });
    })
    // Add Active Class on Navbar Link and Remove from the Siblings(if any exist!)
    $(".secondary_nav ul a").click(function () {
        $(".secondary_nav ul a").removeClass("active");
        $(this).addClass("active");
        $(this)
            .addClass("active")
            .parent()
            .siblings()
            .find("a")
            .removeClass("active");
    });

    // Sync Navbar Links With Sections

    $(window).scroll(function () {
        $("section").each(function () {
            if ($(window).scrollTop() >= $(this).offset().top - 160) {
                var blockId = $(this).attr("id");
                if (blockId != undefined) {
                    $(".secondary_nav ul a").removeClass("active");
                    $('.secondary_nav ul li a[href="#' + blockId + '"]').addClass("active");
                }
            }
        });
    });
});
