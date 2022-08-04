//Featured

// Locations
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
            slidesPerView: 2.2,
        },
        768: {
            slidesPerView: 3.2,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 5.2,
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
            slidesPerView: 2.2,
        },
        768: {
            slidesPerView: 3.2,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 5.2,
            spaceBetween: 20,
        },
    },
});

// Locations
const swiperLocations = new Swiper(".swiper-locations", {
    direction: "horizontal",
    loop: true,
    spaceBetween: 0,
    grabCursor: true,
    autoplay: {
        delay: 1,
        disableOnInteraction: true
    },
    freeMode: true,
    speed: 5000,
    freeModeMomentum: false,
    breakpoints: {
        320: {
            slidesPerView: 1.2,
            freeMode: true,
        },
        576: {
            slidesPerView:2.2,
        },
        768: {
            slidesPerView:3.2,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 5.2,
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
        992: {
            slidesPerView: 4.2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3.2,
        },
        576: {
            slidesPerView: 2.2,
        },
        320: {
            slidesPerView: 1.2,
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
            slidesPerView: 1.2,
        },
        576: {
            slidesPerView: 2.2,
        },
        768: {
            slidesPerView: 3.2,
        },
        1024: {
            slidesPerView: 4.2,
            spaceBetween: 20,
        },
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
