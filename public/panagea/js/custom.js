//Featured
const swiperCategory = new Swiper(".swiper-category", {
    // Optional parameters
    direction: "horizontal",
    // freemode: true,
    slidesPerView: 4,
    // spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

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
    slidesPerView: 4,
    //  spaceBetween: 10,
    // slidesPerGroup: 2,
    //  loop: true,
    //  loopFillGroupWithBlank: true,
    //  grabCursor: true,
    //  mousewheelControl: true,
    //  keyboardControl: true,
    breakpoints: {
        640: {
            slidesPerView: 3,
        },

        480: {
            slidesPerView: 2,
        },
        320: {
            slidesPerView: 1,
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
    slidesPerView: 3,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
        },
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
