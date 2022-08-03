//Featured
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
            slidesPerView: 1,
        },
        576: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
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

    // loop: true,
    // loopFillGroupWithBlank: true,
    // grabCursor: true,
    // mousewheelControl: true,
    // keyboardControl: true,

    breakpoints: {
        320: {
            slidesPerView: 1,
            freeMode: true,
        },
        576: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 4,
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
    freeMode: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: true,
    },
    breakpoints: {
        992: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
        },
        576: {
            slidesPerView: 2,
        },
        320: {
            slidesPerView: 1,
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
    slidesPerView: 1,
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
