/**
 * @let letiables;
 * @let environment;
 */


document.addEventListener('wpcf7mailsent', function (event) {
    jQuery('#subscribe_succesfull').show();
    jQuery('.wpcf7-wrapper').css('opacity', '0');

}, false);

(function ($){
    $(document).ready(function() {

        $('a').click(function (e) {
            const $href = $(this).attr('href');
            const $element = $($href);
            if ($element.length) {
                e.preventDefault();
                let offsetTop = $element.offset().top;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });

        /* burger menu */
        $('.toggle-nav').click(function(e) {
            e.preventDefault();
            $('.nav-block, .toggle-nav').toggleClass('open');
            return false;
        });

        $('.nav-block .menu-menu-container li').each(function() {
            $(this).width( $(this).width() +10);
        });


        $('.nav-block .menu-menu-container li a').click(function() {
            $('.nav-block li a').removeClass('active');
            $(this).addClass('active');
            $('.nav-block, .toggle-nav').removeClass('open');
        });

        let hash = window.location.hash;
        let $a = false;
        if (hash) {
            $a = $('.nav-block li a[href="' + hash + '"]');
        } else {
            $a = $('.nav-block li a').first();
        }

        $a.trigger('click');

        /* header animation */
        $(window).scroll(function() {
            if ($(this).scrollTop() > 0) {
                $('#site-header').addClass('header-anime');
            } else {
                $('#site-header').removeClass('header-anime');
            }
        })

        $('.modal-close-container').on('click', function () {
            window.scrollTo({
                top: $('#site-header'),
                behavior: 'smooth'
            });
            $('.modal-window').hide();
            $('.wpcf7-wrapper').css('opacity', '1');
        });

    });

})(jQuery);
