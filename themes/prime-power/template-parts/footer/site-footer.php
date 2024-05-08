<?php


$footer_logo = get_field('footer_logo', 'option');
?>

<div class="footer-container">

    <div class="footer-contacts">
		<?php $phone = get_field('phone_number', 'option'); ?>
        <a class="button-grow" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>

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
    <div class="site-logo">
        <img src="<?php echo $footer_logo; ?>" alt="">
    </div>
</div>

