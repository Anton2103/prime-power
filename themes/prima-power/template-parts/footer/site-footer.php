<?php

$author = get_field('author', 'options');
$email = get_field('email', 'options');

?>

<div class="footer-container">
    <div class="site-logo">
		<?php the_custom_logo(); ?>
        <p><?php echo _e('Голоси всередині', 'holosy') ?></p>
    </div>
    <div class="footer-contacts">
        <p><?php echo $author ?></p>
        <a class="button-grow" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
    </div>
</div>

