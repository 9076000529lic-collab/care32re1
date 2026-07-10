! function (e) {
    "use strict";
    jQuery(document).ready(function (e) {
        e(".bg-img").each(function (s, o) {
            var a = e(o),
                t = a.data("bg");
            a.css("background-image", "url(" + t + ")")
        }), tippy(".trio-tooltip", {
            inertia: !0,
            animation: "shift-away",
            arrow: !0
        }), e(".off-canvas-btn").on("click", function () {
            e(".off-canvas-area-wrapper").addClass("show")
        }), e(".btn-close, .off-canvas-overlay").on("click", function () {
            e(".off-canvas-area-wrapper,.off-canvas-responsive-menu,.off-canvas-search-box").removeClass("show")
        }), e(".mobile-menu").on("click", function () {
            e(".off-canvas-responsive-menu").addClass("show")
        }), e(".search-box-open").on("click", function () {
            e(".off-canvas-search-box").addClass("show")
        });
        var s = e("header").outerHeight();
        e("header.header-area-wrapper:not('.transparent-header') + div").css("margin-top", s), e(".main-menu").slicknav({
            removeClasses: !0,
            closedSymbol: '<i class="fa fa-angle-down"></i>',
            openedSymbol: "-",
            prependTo: ".off-canvas-responsive-menu .off-canvas-content",
            nestedParentLinks: !1
        }), e(".odometer").each(function () {
            e(this).appear(function () {
                var s = e(this),
                    o = s.data("count");
                setTimeout(function () {
                    s.html(o)
                }, 1e3)
            })
        }), e(document).ready(function () {
            e(".ht-slick-slider").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: !0,
                arrows: !1,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: !0
                    }
                }]
            })
        }), e(document).width() > 1200 && e(".element-sticky").stickySidebar({
            topSpacing: 160
        });
        var o = e(".port-filter-menu li");
        o.on("click", function () {
            var s = e(this),
                a = s.data("filter");
            e(".portfolio-content .masonry-grid").isotope({
                filter: a
            }), o.removeClass("active"), s.addClass("active")
        }), e(".btn-video-popup").magnificPopup({
            type: "iframe",
            mainClass: "video-popup-wrap"
        }), e(".btn-img-gallery").magnificPopup({
            type: "image",
            closeBtnInside: !1,
            mainClass: "imagesGallery",
            gallery: {
                enabled: !0
            }
        });
        var a = e(".video-bg");
        a.each(function (s, o) {
            var t = e(o).data("url");
            a.YTPlayer({
                videoURL: t,
                startAt: 7,
                showControls: !1,
                showYTLogo: !1,
                mute: !0,
                quality: "highres",
                containment: ".video-bg-content-wrap"
            })
        }), e("select").niceSelect(), e(".smooth-scroll").smoothScroll({
            speed: 1e3
        }), e(".landing-nav li a, .slicknav_nav li a").smoothScroll({
            speed: 1e3,
            offset: 0
        }), e(".matchHeight").matchHeight(), e(".btn-demo-panel").on("click", function () {
            e(".demo-panel-wrap").toggleClass("open"), e("body").toggleClass("demo-fix")
        }), e(".demo-overlay").on("click", function () {
            e("body").removeClass("demo-fix"), e(".demo-panel-wrap").removeClass("open")
        })
    }), jQuery(window).on("scroll", function () {
        5 < e(document).scrollTop() ? e(".sticky-header").addClass("sticky") : e(".sticky-header").removeClass("sticky")
    }), jQuery(window).on("load", function () {
        e("body").removeClass("preloader-active"), e(".masonry-grid").isotope();
        var s = e(".parallaxBg");
        s.length && s.jarallax({
            speed: .2
        })
    })
}(jQuery), document.getElementById("animateButton").addEventListener("click", function (e) {
    e.preventDefault(), this.style.transition = "transform 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55)", this.style.transform = "scale(0.95)", setTimeout(() => {
        window.location.href = this.href
    }, 300)
});
var swiper = new Swiper(".swiper-container", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: !0,
    autoplay: {
        delay: 3e3,
        disableOnInteraction: !1
    },
    breakpoints: {
        768: {
            slidesPerView: 1
        },
        1024: {
            slidesPerView: 1
        }
    }
});

function goToStep(e) {
    document.querySelectorAll(".step").forEach(e => {
        e.style.display = "none"
    }), document.getElementById("step" + e).style.display = "block"
}

function goToSteps(e) {
    document.querySelectorAll(".steps").forEach(e => {
        e.style.display = "none"
    }), document.getElementById("steps" + e).style.display = "block"
}
$(document).ready(function () {
    $("#testimonials-slider .ht-slick-slider").slick({
        slidesToShow: 1,
        arrows: !0,
        prevArrow: "#testimonials-slider .prev-arrow",
        nextArrow: "#testimonials-slider .next-arrow",
        dots: !0,
        autoplay: !0,
        autoplaySpeed: 3e3
    })
}), $(document).ready(function () {
    $("#testimonial-sliders .ht-slick-slider").slick({
        slidesToShow: 1,
        arrows: !0,
        prevArrow: "#testimonial-sliders .prev-arrow",
        nextArrow: "#testimonials-sliders .next-arrow",
        dots: !0,
        autoplay: !0,
        autoplaySpeed: 3e3
    })
}), $(document).ready(function () {
    $(".ht-slick-slider").each(function () {
        var e = $(this);
        e.slick({
            slidesToShow: e.data("slick").slidesToShow,
            slidesToScroll: e.data("slick").slidesToScroll,
            arrows: e.data("slick").arrows,
            prevArrow: e.data("slick").prevArrow,
            nextArrow: e.data("slick").nextArrow,
            dots: e.data("slick").dots,
            autoplay: e.data("slick").autoplay,
            autoplaySpeed: e.data("slick").autoplaySpeed,
            centerMode: e.data("slick").centerMode,
            centerPadding: e.data("slick").centerPadding,
            responsive: e.data("slick").responsive
        })
    })
}), $(document).ready(function () {
    $(".ht-slick-slider").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: !0,
        prevArrow: "#slider-1 .prev-arrow",
        nextArrow: "#slider-1 .next-arrow",
        adaptiveHeight: !0,
        centerMode: !0,
        centerPadding: "0",
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 1
            }
        }]
    }),
        $(".ht-slick-slider").on("init afterChange", function () {
        var e, s;
        e = $("#slider-1 .single-testimonial-wrap3"), s = $("#slider-1 .slick-center").height(), e.each(function () {
            var e = $(this),
                o = e.hasClass("slick-center"),
                a = e.height();
            o ? e.css("margin-top", 0) : e.css("margin-top", (s - a) / 2)
        })
        })

    }),

    $(document).ready(function () {
        $(".ht-slick-slider").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: "#slider-1-1 .prev-arrow",
            nextArrow: "#slider-1-1 .next-arrow",
            adaptiveHeight: true,
            centerMode: true,
            centerPadding: "0px",
            autoplay: true,
            autoplaySpeed: 3000,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });





    document.getElementById("step1").style.display = "block", document.getElementById("steps1").style.display = "block", $(".mobile-menu").on("click", function () {
    $(".off-canvas-area-wrap").toggleClass("open")
}), $(".brand-logo-content").slick({
    infinite: !0,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: !0,
    autoplaySpeed: 0,
    speed: 5e3,
    cssEase: "linear",
    arrows: !1,
    pauseOnHover: !0,
    responsive: [{
        breakpoint: 768,
        settings: {
            slidesToShow: 3
        }
    }, {
        breakpoint: 480,
        settings: {
            slidesToShow: 2
        }
    }]
});