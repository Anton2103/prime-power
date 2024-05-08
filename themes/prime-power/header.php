<?php
?>
<!doctype html>
<html <?php language_attributes(); ?> >
<head>
    <title><?php the_title() ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'prime_power'); ?></a>
	<?php get_template_part('template-parts/header/site-header'); ?>
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
