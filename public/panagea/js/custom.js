//Featured Tours Swiper
const swiperFeatured = new Swiper(".swiper-featured-tours", {
    direction: "horizontal",
    spaceBetween: 10,
    freeMode: true,
    breakpoints: {
        320: {
            slidesPerView: 1.2,
            freeMode: true
        },
        576: {
            slidesPerView: 2.3
        },
        768: {
            slidesPerView: 3.3,
            spaceBetween: 15
        },
        992: {
            slidesPerView: 4.2,
            spaceBetween: 20
        }
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
    }
});

const swiperCategory = new Swiper(".swiper-category", {
    // Optional parameters
    direction: "horizontal",
    freeMode: true,
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
    },
    breakpoints: {
        320: {
            slidesPerView: 1.2
        },
        576: {
            slidesPerView: 2.3
        },
        768: {
            slidesPerView: 3.3,
            spaceBetween: 15
        },
        992: {
            slidesPerView: 5,
            spaceBetween: 20
        }
    }
});

// Locations
const swiperLocations = new Swiper(".swiper-locations", {
    direction: "horizontal",
    spaceBetween: 10,
    freeMode: true,
    breakpoints: {
        320: {
            slidesPerView: 1.2,
            freeMode: true
        },
        576: {
            slidesPerView: 2.3
        },
        768: {
            slidesPerView: 3.3,
            spaceBetween: 15
        },
        992: {
            slidesPerView: 5,
            spaceBetween: 20
        }
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
    }
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
        disableOnInteraction: true
    },
    breakpoints: {
        320: {
            slidesPerView: 1.2
        },
        576: {
            slidesPerView: 2.2
        },
        768: {
            slidesPerView: 3
        },
        992: {
            slidesPerView: 4,
            spaceBetween: 20
        }
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true
    }
});

// swiper featured item

const featuredItem = new Swiper(".swiper-featured", {
    direction: "horizontal",
    spaceBetween: 10,
    autoplay: {
        delay: 6000,
        disableOnInteraction: true
    },

    breakpoints: {
        320: {
            slidesPerView: 1
        },
        576: {
            slidesPerView: 2
        },
        768: {
            slidesPerView: 3
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 20
        }
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true
    }
});

// End of Swiper JS

// start single tour page js

// $(function () {
//     $(function () {
//         $(".mdc-tab-bar a").click(function (e) {
//             "use strict";
//             console.log(1);
//             e.preventDefault();
//             $("html, body").animate(
//                 {
//                     scrollTop: $($(this).attr("href")).offset().top - 65,
//                 },
//                 0
//             );
//         });
//     });
//     // Add Active Class on Navbar Link and Remove from the Siblings(if any exist!)
//     $(".mdc-tab-bar a").click(function () {
//         $(".mdc-tab-bar a").removeClass("mdc-tab--active");
//         $(this).addClass("mdc-tab--active");
//         $(this)
//             .addClass("mdc-tab--active")
//             .parent()
//             .siblings()
//             .find("a")
//             .removeClass("mdc-tab--active");
//     });

//     // Sync Navbar Links With Sections
//     $(window).scroll(function () {
//         $("section").each(function () {
//             if ($(window).scrollTop() >= this.offset().top - 160) {
//                 var blockId = $(this).attr("id");
//                 if (blockId != undefined) {
//                     $(".secondary_nav ul a").removeClass("active");
//                     $(
//                         '.secondary_nav ul li a[href="#' + blockId + '"]'
//                     ).addClass("active");
//                 }
//             }
//         });
//     });
// });

import { MDCTabBar } from "@material/tab-bar";
import { MDCTabIndicator } from "@material/tab-indicator";
import { MDCTabScroller } from "@material/tab-scroller";

// const tabBar = new MDCTabBar(document.querySelector(".mdc-tab-bar"));

// tabBar.focusOnActivate = true;

// // tabBar.activateTab((index: number) => void ) ;

// const tabIndicator = new MDCTabIndicator(
//     document.querySelector(".mdc-tab-indicator")
// );
// const tabScroller = new MDCTabScroller(
//     document.querySelector(".mdc-tab-scroller")
// );
// // End single tour page js

// this is an example 1 of js code for dynamic tabs

function initTabs(el) {
    var tabBar = new mdc.tabBar.MDCTabBar(document.querySelector("#" + el));
    var panels = document.querySelector("[for=" + el + "]");
    tabBar.preventDefaultOnClick = true;
    function updatePanel(index) {
        var activePanel = panels.querySelector(
            ".mdc-tab-content.mdc-tab-content--active"
        );
        if (activePanel) {
            activePanel.classList.remove("mdc-tab-content--active");
        }
        var newActivePanel = panels.querySelector(
            ".mdc-tab-content:nth-child(" + (index + 1) + ")"
        );
        if (newActivePanel) {
            newActivePanel.classList.add("mdc-tab-content--active");
        }
    }
    tabBar.listen("MDCTabBar:activated", function(t) {
        var tabs = t.detail;
        var nthChildIndex = tabs.index;
        updatePanel(nthChildIndex);
    });
}
initTabs("tab1");

// this is an example 2 of js code for dynamic tabs

var dynamicTabBar = (window.dynamicTabBar = new mdc.tabs.MDCTabBar(
    document.querySelector("#dynamic-tab-bar")
));
var dots = document.querySelector(".dots");
var panels = document.querySelector(".panels");

dynamicTabBar.tabs.forEach(function(tab) {
    tab.preventDefaultOnClick = true;
});

function updateDot(index) {
    var activeDot = dots.querySelector(".dot.active");
    if (activeDot) {
        activeDot.classList.remove("active");
    }
    var newActiveDot = dots.querySelector(
        ".dot:nth-child(" + (index + 1) + ")"
    );
    if (newActiveDot) {
        newActiveDot.classList.add("active");
    }
}

function updatePanel(index) {
    var activePanel = panels.querySelector(".panel.active");
    if (activePanel) {
        activePanel.classList.remove("active");
    }
    var newActivePanel = panels.querySelector(
        ".panel:nth-child(" + (index + 1) + ")"
    );
    if (newActivePanel) {
        newActivePanel.classList.add("active");
    }
}

dynamicTabBar.listen("MDCTabBar:change", function({ detail: tabs }) {
    var nthChildIndex = tabs.activeTabIndex;

    updatePanel(nthChildIndex);
    updateDot(nthChildIndex);
});

dots.addEventListener("click", function(evt) {
    if (!evt.target.classList.contains("dot")) {
        return;
    }

    evt.preventDefault();

    var dotIndex = [].slice
        .call(dots.querySelectorAll(".dot"))
        .indexOf(evt.target);

    if (dotIndex >= 0) {
        dynamicTabBar.activeTabIndex = dotIndex;
    }

    updatePanel(dotIndex);
    updateDot(dotIndex);
});
