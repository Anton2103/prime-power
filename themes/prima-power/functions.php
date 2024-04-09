<?php

use Inc\General;
use Inc\Shortcodes;
use Service\Gutenberg;
use Service\TaxonomyCreator;
use Service\PostTypeCreator;
use Entity\YourBlog;
use Entity\Faq;
use Inc\ImagesSettings;


################################################################################
# Constants
################################################################################

$theme = wp_get_theme();
$textdomain = $theme->get('TextDomain');
$version = $theme->get('Version');

define('THEMEURL', get_stylesheet_directory_uri());
define('THEMEDIR', __DIR__);

define('TEXTDOMAIN', $textdomain);

define('ASSETSURL', THEMEURL . '/assets');
define('ASSETSDIR', THEMEDIR . '/assets');

define('INCDIR', THEMEDIR . DIRECTORY_SEPARATOR . 'Inc');
define('VENDORDIR', THEMEDIR . DIRECTORY_SEPARATOR . 'vendor');

define('ADMINDIR', THEMEDIR . DIRECTORY_SEPARATOR . 'Admin');
define('ADMINURI', THEMEURL . '/Admin');

define('VERSION', $version ?? '0.0.6');

define('ASSETS_VERSION', '1.0.3');

################################################################################
# Load the translations from the child theme if present
################################################################################

add_action('after_setup_theme', function () {
    load_theme_textdomain('accountant', get_stylesheet_directory() . '/languages');
});



function cw_post_type_projects() {
	$supports = array(
		'title', // post title
		'author', // post author
		'thumbnail', // featured images
		'excerpt', // post excerpt
		'comments', // post comments
	);
	$labels = array(
		'name' => _x('Projects', 'plural'),
		'singular_name' => _x('Project', 'singular'),
		'menu_name' => _x('projects', 'admin menu'),
		'name_admin_bar' => _x('projects', 'admin bar'),
		'add_new' => _x('Add New', 'add new'),
		'add_new_item' => __('Add New projects'),
		'new_item' => __('New projects'),
		'edit_item' => __('Edit projects'),
		'view_item' => __('View projects'),
		'all_items' => __('All projects'),
		'search_items' => __('Search projects'),
		'not_found' => __('No projects found.'),
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'projects'),
		'has_archive' => true,
		'hierarchical' => false,
	);
	register_post_type('projects', $args);
}
add_action('init', 'cw_post_type_projects');

################################################################################
# Includes
################################################################################

require_once VENDORDIR . '/autoload.php';

################################################################################
# Init
################################################################################

General::init();
Shortcodes::init();
Gutenberg::init();

################################################################################
# New Post Types
################################################################################

add_action('init', function() {

},-999);

// Init
TaxonomyCreator::addToInit(); // Taxonomies need to be init before the PostTypes for the correct url structure
PostTypeCreator::addToInit();
