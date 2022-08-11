jQuery(document).ready(function ($) {
//Post Carousel
    if ($('.ct-header-carousel').length > 0) {
        $(".ct-header-carousel").slick({
            slidesToShow: 3,
            accessibility: true,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            centerMode: false,
            autoplay: true,
            lazyLoad: 'ondemand',
            speed: 400,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
});