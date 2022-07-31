$(function () {
    // Add Active Class on Navbar Link and Remove from the Siblings(if any exist!)
    $(".secondary_nav ul a").click(function () {
        $(".secondary_nav ul a").removeClass("active");
        $(this).addClass("active");
        console.log(1)
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
            if ($(window).scrollTop() >= $(this).offset().top - 100) {
                var blockId = $(this).attr("id");
                if(blockId != undefined){
                    $(".secondary_nav ul a").removeClass("active");
                    $('.secondary_nav ul li a[href="#' + blockId + '"]').addClass("active");
                }
            }
        });
    });
});
