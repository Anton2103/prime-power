<?php

get_header(); ?>
<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
    <header class="projects-single-header ">
        <h1 class="projects-single-title"><?php single_post_title(); ?></h1>
    </header>
<?php endif; ?>
    <div class="projects-single-wrapper">
        <h1><?php the_title() ?></h1>
        <div class="projects-single-content"> <?php the_content(); ?></div>

        <div class="wrapper-author">
            <picture class="img-author">
               <?php echo get_avatar( get_the_author_meta('ID'), 167 );?>
            </picture>
            <div class="wrap-about-author">
                <h3><?php print get_the_author_meta('user_firstname')?></h3>
                <p><?php print get_the_author_meta('position')?></p>
                <p><?php print get_the_author_meta('user_description')?></p>
                <button>Read full bio</button>
            </div>
        </div>
    </div>
<?php
get_footer();