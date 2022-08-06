//Featured Tours Swiper
const swiperFeatured = new Swiper(".swiper-featured-tours", {
    direction: "horizontal",
    spaceBetween: 10,
    freeMode: true,
    breakpoints: {
        320: {
            slidesPerView: 1.2,
            freeMode: true,
        },
        576: {
            slidesPerView: 2.3,
        },
        768: {
            slidesPerView: 3.3,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 4.2,
            spaceBetween: 20,
        },
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

const swiperCategory = new Swiper(".swiper-category", {
    // Optional parameters
    direction: "horizontal",
    freeMode: true,
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        320: {
            slidesPerView: 1.2,
        },
        576: {
            slidesPerView: 2.3,
        },
        768: {
            slidesPerView: 3.3,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 5,
            spaceBetween: 20,
        },
    },
});

// Locations
const swiperLocations = new Swiper(".swiper-locations", {
    direction: "horizontal",
    spaceBetween: 10,
    freeMode: true,
    breakpoints: {
        320: {
            slidesPerView: 1.2,
            freeMode: true,
        },
        576: {
            slidesPerView: 2.3,
        },
        768: {
            slidesPerView: 3.3,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 5,
            spaceBetween: 20,
        },
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

//
const swiperReviews = new Swiper(".swiper-reviews", {
    direction: "horizontal",
    spaceBetween: 10,
    loop: true,
    loopFillGroupWithBlank: true,
    grabCursor: true,
    mousewheelControl: true,
    freeMode: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: true,
    },
    breakpoints: {
        320: {
            slidesPerView: 1.2,
        },
        576: {
            slidesPerView: 2.2,
        },
        768: {
            slidesPerView: 3,
        },
        992: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

// swiper featured item

const featuredItem = new Swiper(".swiper-featured", {
    direction: "horizontal",
    spaceBetween: 10,
    autoplay: {
        delay: 6000,
        disableOnInteraction: true,
    },

    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        576: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

// End of Swiper JS

// start single tour page js

$(function () {
    $(function () {
        $(".secondary_nav ul a").click(function (e) {
            "use strict";
            console.log(1);
            e.preventDefault();
            $("html, body").animate(
                {
                    scrollTop: $($(this).attr("href")).offset().top - 65,
                },
                0
            );
        });
    });
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
                    $(
                        '.secondary_nav ul li a[href="#' + blockId + '"]'
                    ).addClass("active");
                }
            }
        });
    });
});

// End single tour page js
