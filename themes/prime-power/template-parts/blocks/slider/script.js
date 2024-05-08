

/**
 * @let letiables;
 * @let environment;
 */

(function ($){
    $(document).ready(function() {
        $('.slider').slick({
            autoplay: true,
            arrows: false,
            dots: false,
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            rtl: true,
            autospeed: 1000,
            speed: 3000,
        });


        $(window).resize();
    });

})(jQuery);
