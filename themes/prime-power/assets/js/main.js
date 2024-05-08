/**
 * @let letiables;
 * @let environment;
 */

(function ($){
    $(document).ready(function() {

        $('.toggle-nav').click(function(e) {
            e.preventDefault();
            $('.nav-block, .toggle-nav').toggleClass('open');
            return false;
        });

        $('.nav-block .menu li').each(function() {
            $(this).width( $(this).width() +10);
        });

        $('.nav-block .menu li a').click(function() {
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


        $(window).resize();


    });

})(jQuery);
