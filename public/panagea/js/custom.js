//Featured
const swiperFeatured = new Swiper(".swiper-featured", {
    // Optional parameters
    direction: "horizontal",
    freemode: true,
    slidesPerView: 1,
    spaceBetween: 10,

    // If we need pagination
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

    // Navigation arrows
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    // And if we need scrollbar
    scrollbar: {
        el: ".swiper-scrollbar",
    },

    breakpoints: {
        640: {
            slidesPerView: 3,
            spaceBetween: 15,
        },
    },
});

// Locations
const swiperLocations = new Swiper(".swiper-locations", {
    direction: "horizontal",
    slidesPerView: 1,
    spaceBetween: 10,
    //  slidesPerGroup: 1,
    //  loop: true,
    //  loopFillGroupWithBlank: true,
    //  grabCursor: true,
    //  mousewheelControl: true,
    //  keyboardControl: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
