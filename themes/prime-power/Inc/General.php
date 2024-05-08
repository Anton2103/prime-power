<?php

namespace Inc;

use JetBrains\PhpStorm\NoReturn;
use Service\Singleton;

class General
{
    use Singleton;

    /**
     * Init general commands and hooks
     */
    public static function init()
    {
        General::instance();
    }


    /**
     * General constructor. Theme default options
     */
    private function __construct()
    {


        ################################################################################
        # setup theme
        ################################################################################

        add_action('init', [$this, 'registerScripts']);
        add_action('init', [$this, 'registerStyles']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);

	    add_action( 'personal_options_update', [$this, 'save_extra_user_profile_fields'] );
	    add_action( 'edit_user_profile_update', [$this, 'save_extra_user_profile_fields'] );

	    add_theme_support('post-thumbnails');

        ################################################################################
        # Settings
        ################################################################################

        add_action('acf/init', function() {

            // Check function exists.
            if( function_exists('acf_add_options_page') ) {

                // Register options page.
                $option_page = acf_add_options_page(array(
                    'page_title'    => __('Theme General Settings'),
                    'menu_title'    => __('Theme Settings'),
                    'menu_slug'     => 'theme-general-settings',
                    'capability'    => 'edit_posts',
                    'redirect'      => false
                ));
            }
       });

        add_theme_support('align-wide');


//         Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

	    // excerpt settings
	    add_filter('excerpt_length', [$this, 'new_excerpt_length'] );
	    add_filter( 'excerpt_more', [$this, 'new_excerpt_more'] );

	    // Images settings

	    add_filter('post_thumbnail_html', [$this, 'addBlankImage'] );

	    // POLYLANG flag settings

	    add_filter('pll_custom_flag', [$this, 'pll_custom_flag'], 10, 2);

        // Post commets

	    add_filter('comment_post_redirect', [$this, 'customCommentRedirect'], 10, 2);
	    add_filter( 'comment_form_default_fields', [$this, 'customCommentField'] );

	    ################################################################################
	    # Image
	    ################################################################################
	    ImagesSettings::instance();


	    ################################################################################
	    # Nav
	    ################################################################################

	    register_nav_menus(
            array(
                'primary' => esc_html__( 'Primary menu', 'prime_power' )
            )
        );

        /*
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
        */
        $logo_width  = 244;
        $logo_height = 37;

        add_theme_support(
            'custom-logo',
            array(
                'height'               => $logo_height,
                'width'                => $logo_width,
                'flex-width'           => true,
                'flex-height'          => true,
                'unlink-homepage-logo' => true,
            )
        );

    }

    /**
     * register styles for the theme
     */
    public function registerStyles()
    {
        wp_register_style(TEXTDOMAIN . '-normalize-css', ASSETSURL . '/css/normalize.css', '', ASSETS_VERSION);

	    wp_register_style(TEXTDOMAIN . '-style-css', ASSETSURL . '/css/style.css', '', ASSETS_VERSION);
        wp_register_style(TEXTDOMAIN . '-style-md-css', ASSETSURL . '/css/style-md.css', '', ASSETS_VERSION, 'screen and (min-width: 768px)');
        wp_register_style(TEXTDOMAIN . '-style-lg-css', ASSETSURL . '/css/style-lg.css', '', ASSETS_VERSION, 'screen and (min-width: 1024px)');

        wp_register_style(TEXTDOMAIN . '-style-main-css', THEMEURL . '/style.css', [TEXTDOMAIN . '-normalize-css'], ASSETS_VERSION);
        wp_register_style(TEXTDOMAIN . '-font-css', ASSETSURL . '/font/font-style.css', '', ASSETS_VERSION);
        wp_register_style(TEXTDOMAIN . '-google-css',   'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200', '', ASSETS_VERSION);
    }

    /**
     * register js scripts for the theme
     */
    public function registerScripts()
    {
        wp_register_script(TEXTDOMAIN . '-main-js', ASSETSURL . '/js/main.js', ['jquery'], ASSETS_VERSION, true);
        wp_register_script(TEXTDOMAIN . '-slick-js', ASSETSURL . '/js/slick.min.js', ['jquery'], ASSETS_VERSION, true);
    }

    /**
     *  enqueue all styles and scripts
     */
    public function enqueueScripts()
    {
	    wp_enqueue_style( TEXTDOMAIN . '-normalize-css');
        wp_enqueue_style(TEXTDOMAIN . '-font-css');
        wp_enqueue_style( TEXTDOMAIN . '-style-main-css');
        wp_enqueue_style( TEXTDOMAIN . '-style-css');
        wp_enqueue_style( TEXTDOMAIN . '-style-md-css');
        wp_enqueue_style( TEXTDOMAIN . '-style-lg-css');
        wp_enqueue_style( TEXTDOMAIN . '-google-css');

        wp_enqueue_script(TEXTDOMAIN . '-main-js');
        wp_enqueue_script(TEXTDOMAIN . '-slick-js');
    }

	/**
	 * change excerpt length(Post)
	 * @param $length
	 * @return int
	 */
	function new_excerpt_length($length) {
		return 15;
	}

	function new_excerpt_more( $more ){
		$post = get_post();

		return '<span> ...</span></br></br><a class="excerpt_more hover-underline-animation" href="'. get_permalink($post->ID) . '">Читати далі...</a>';
	}


	public function addBlankImage($html) {
		if (empty($html)) {
			$html = '<img src="'. ASSETSURL .'/image/no-image.svg" alt="" style="padding: 5px">';
		}
		return $html;
	}

	function pll_custom_flag( $flag, $code ) {
		$flag['url']    = ASSETSURL . "/image/flag/{$code}.svg";
		$flag['width']  = 32;
		$flag['height'] = 22;
		$flag['src'] = '';
		return $flag;
	}

	function customCommentRedirect($location, $comment) {
		$location = wp_get_referer();
		return $location;
	}

	function customCommentField( $fields ) {
		$comment_field = $fields['email'];
		$comment_field = $fields['url'];
		unset($fields['email']);
		unset($fields['url']);

        return $fields;
    }

}
