<?php
?>

<div class="contacts-wrapper">

    <div class="phone-contacts">
        <div class="socials__text">
            <?php $phone = get_field('phone_number', 'option'); ?>
            <p class="socials__header"><?php _e('Телефонуйте нам','prime-power') ?></p>
        </div>
        <div class="socials__link button-grow">
            <span><?php echo $phone; ?></span>
            <a class="button-grow" href="tel:<?php echo $phone; ?>" aria-label="<?php _e('Телефонуйте нам','prime-power') ?>"></a>
        </div>
    </div>
    <div class="email-contacts">
        <div class="socials__text">
			<?php $email = get_field('email', 'option'); ?>
            <p class="socials__header"><?php _e('Напишіть нам','prime-power') ?></p>
        </div>
        <div class="socials__link button-grow">
            <span><?php echo $email; ?></span>
            <a class="button-grow" href="mailto:<?php echo $email; ?>" aria-label="<?php _e('Напишіть нам','prime-power') ?>"></a>
        </div>
    </div>

    <div class="socials-contacts">
	    <?php
            if (have_rows('social_network', 'option')):
                while (have_rows('social_network', 'option')) : the_row();
                    $url_social = get_sub_field('url_social_network');
                    $social_icon_header = get_sub_field('social_icon_header');
                    $active_social = get_sub_field('active_social');
                    $social_name = get_sub_field('social_name');
                    $social_context = get_sub_field('social_context');

                    if ($active_social == 'true'):
                        ?>
                        <div class="socials__text">
                            <p class="socials__header"><?php echo $social_name ?></p>
                            <p class="socials__context" ><?php echo $social_context?></p>
                        </div>
                        <div class="socials__link button-grow">
                            <img class="light-theme" src="<?php echo $social_icon_header; ?>" alt="<?php echo $url_social; ?>">
                            <span><?php echo  $social_name; ?></span>
                            <a href="<?php echo $url_social; ?>" aria-label="<?php echo $social_name; ?>" target="_blank"> </a>
                        </div>
                    <?php
                    endif;
                endwhile;
            endif;
	    ?>
    </div>


</div>
