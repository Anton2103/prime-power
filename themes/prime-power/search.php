<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package storefront
 */

get_header(); ?>
	<div>
		<?php wp_redirect(home_url()) ?>
	</div>
<?php
get_footer();
