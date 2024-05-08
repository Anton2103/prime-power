<?php

$args = array(
	'echo' => 1,
	'show_flags' => 1,
	'show_names' => 0,
	'hide_if_empty' => 1,
);

?>

<header id="site-header" role="banner">
    <div class="header-wrapper">
        <div class="container menu-container sticky">
            <div class="brand">
			    <?php if (has_custom_logo()) : ?>
                    <div class="site-logo"><?php
					    the_custom_logo(); ?></div>
			    <?php endif; ?>
            </div>
            <div class="nav-block">
			    <?php
			    wp_nav_menu(
				    array(
					    'primary' => 'Primary menu'
				    )
			    );

			    ?>
                <div class="header-contacts">
                    <div class="tel phone-btn button-grow">
			            <?php $phone = get_field('phone_number', 'option'); ?>
                        <a class="button-grow" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
                    </div>
                    <div class="social-block">
			            <?php

			            if (have_rows('social_network', 'option')):
				            while (have_rows('social_network', 'option')) : the_row();
					            $url_social = get_sub_field('url_social_network');
					            $icon_social_header = get_sub_field('social_icon_header');
					            $active_social = get_sub_field('active_social');

					            if ($active_social == 'true'):
						            ?>
                                    <div class="social-block__img-shadow button-grow">
                                        <a href="<?php echo $url_social; ?>" target="_blank" >
                                            <img class="light-theme" src="<?php echo $icon_social_header; ?>" alt="<?php echo $url_social; ?>">
                                        </a>
                                    </div>

					            <?php
					            endif;
				            endwhile;
			            endif;
			            ?>
                    </div>
                </div>
                <div class="languages-toggle">
<!--                    <img src="--><?php //echo ASSETSURL . "/image/language.png"; ?><!--" alt="language">-->
                    <ul><?php pll_the_languages($args);?></ul>
                </div>
            </div>
            <div class="toggle-nav">
                <span class="toggle-nav__first"></span>
                <span class="toggle-nav__second"></span>
            </div>


        </div>
    </div>
</header>