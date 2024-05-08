<?php

namespace Inc;

use Service\Singleton;

class Shortcodes
{
    use Singleton;

    /**
     * Init general commands and hooks
     */
    public static function init()
    {
        Shortcodes::instance();
    }


    /**
     * Shortcodes constructor. Theme default options
     */
    private function __construct()
    {

	    add_shortcode( 'privacy', 'privacy_page_sc_vr51' );

    }

	function privacy_page_sc_vr51( $atts ) {
		# Creates a Privacy Page link shortcode.
		# Use as [privacy title="Privacy Page Title"] or [privacy]
		# Default page title is Privacy Page.
		# Page link points to the Privacy Page set in Dashboard > Privacy.
		# The privacy page will only display if the page is public (status = publish).
		# Place this snippet into the site theme's functions.php file, a custom functions plugin or some other
		# suitable place.

		$atts = shortcode_atts(
			array(
				'title' => 'Privacy Policy'
			), $atts
		);

		$title = sanitize_text_field( $atts['title'] );

		# See wp-admin/includes/class-wp-privacy-policy-content.php
		$privacy_page_id = (int) get_option( 'wp_page_for_privacy_policy' );

		if ( ! empty($privacy_page_id) && get_post_status( $privacy_page_id ) == 'publish' ) {
			$link = get_privacy_policy_url();
			return "<a href=\"$link\" />$title</a>";
		} else {
			return;
		}
	}
}