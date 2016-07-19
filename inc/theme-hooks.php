<?php
/**
 * Theme Hooks
 * tfn = Twenty Five North
 * @package Twenty Five North
 * @subpackage inc
 */

/*-----------------------------------------------------------------------------------*/
/* Header - header.php */
/*-----------------------------------------------------------------------------------*/

function tfn_after_body() {
	// Your Code Here
}
add_action('after_body', 'tfn_after_body');

function tfn_before_wrapper() {
	// Your Code Here
}
add_action('before_wrapper', 'tfn_after_body');

function tfn_before_top_bar() {
	// Your Code Here
}
add_action('before_top_bar', 'tfn_before_top_bar');

function tfn_before_header() {
	// Your Code Here
}
add_action('before_header', 'tfn_before_header');

function tfn_before_main_content() {
	// Your Code Here
}
add_action('before_main_content', 'tfn_before_main_content');

/*-----------------------------------------------------------------------------------*/
/* Footer - footer.php */
/*-----------------------------------------------------------------------------------*/

function tfn_before_footer_widgets() {
	// Your Code Here
}
add_action('before_footer_widgets', 'tfn_before_footer_widgets');

function tfn_before_footer() {
	// Your Code Here
}
add_action('before_footer', 'tfn_before_footer');

function tfn_after_wrapper() {
	// Your Code Here
}
add_action('after_wrapper', 'tfn_after_wrapper');

/*-----------------------------------------------------------------------------------*/
/* Sidebar - sidebar.php */
/*-----------------------------------------------------------------------------------*/

function tfn_before_sidebar() {
	// Your Code Here
}
add_action('before_sidebar', 'tfn_before_sidebar');

function tfn_after_sidebar() {
	// Your Code Here
}
add_action('after_sidebar', 'tfn_after_sidebar');

/*-----------------------------------------------------------------------------------*/
/* Listing Grid - layouts/blog-large.php */
/*-----------------------------------------------------------------------------------*/

function tfn_before_post_header() {
	// Your Code Here
}
add_action('before_post_header', 'tfn_before_post_header');

function tfn_before_post_lead_media() {
	// Your Code Here
}
add_action('before_post_lead_media', 'tfn_before_post_lead_media');

function tfn_before_post_excerpt() {
	// Your Code Here
}
add_action('before_post_excerpt', 'tfn_before_post_excerpt');

function tfn_after_post_excerpt() {
	// Your Code Here
}
add_action('after_post_excerpt', 'tfn_after_post_excerpt');

/*-----------------------------------------------------------------------------------*/
/* Single Post - single.php */
/*-----------------------------------------------------------------------------------*/

function tfn_before_single_header() {
	// Your Code Here
}
add_action('before_single_header', 'tfn_before_single_header');

function tfn_before_single_content() {
	// Your Code Here
}
add_action('before_single_content', 'tfn_before_single_content');

function tfn_before_single_sidebar() {
	// Your Code Here
}
add_action('before_single_sidebar', 'tfn_before_single_sidebar');

function tfn_after_single_sidebar() {
	// Your Code Here
}
add_action('after_single_sidebar', 'tfn_after_single_sidebar');

/*-----------------------------------------------------------------------------------*/
/* Page - page.php */
/*-----------------------------------------------------------------------------------*/

function tfn_before_page_header() {
	// Your Code Here
}
add_action('before_page_header', 'tfn_before_page_header');

function tfn_before_page_content() {
	// Your Code Here
}
add_action('before_page_content', 'tfn_before_page_content');

function tfn_before_page_sidebar() {
	// Your Code Here
}
add_action('before_page_sidebar', 'tfn_before_page_sidebar');

function tfn_after_page_sidebar() {
	// Your Code Here
}
add_action('after_page_sidebar', 'tfn_after_page_sidebar');

/*-----------------------------------------------------------------------------------*/
/* Archive - archive.php */
/*-----------------------------------------------------------------------------------*/

function tfn_before_archive_header() {
	// Your Code Here
}
add_action('before_archive_header', 'tfn_before_archive_header');

function tfn_before_archive_content() {
	// Your Code Here
}
add_action('before_archive_content', 'tfn_before_archive_content');

function tfn_before_archive_sidebar() {
	// Your Code Here
}
add_action('before_archive_sidebar', 'tfn_before_archive_sidebar');

function tfn_after_archive_sidebar() {
	// Your Code Here
}
add_action('after_archive_sidebar', 'tfn_after_archive_sidebar');

/*-----------------------------------------------------------------------------------*/
/* Agent - author.php */
/*-----------------------------------------------------------------------------------*/

function tfn_before_agent_header() {
	// Your Code Here
}
add_action('before_agent_header', 'tfn_before_agent_header');

function tfn_before_agent_content() {
	// Your Code Here
}
add_action('before_agent_content', 'tfn_before_agent_content');

function tfn_before_agent_listings() {
	// Your Code Here
}
add_action('before_agent_listings', 'tfn_before_agent_listings');

function tfn_after_agent_listings() {
	// Your Code Here
}
add_action('after_agent_listings', 'tfn_after_agent_listings');

/*-----------------------------------------------------------------------------------*/
/* Comments - comments.php */
/*-----------------------------------------------------------------------------------*/

function tfn_before_post_comments() {
	// Your Code Here
}
add_action('before_post_comments', 'tfn_before_post_comments');

function tfn_after_post_comments() {
	// Your Code Here
}
add_action('after_post_comments', 'tfn_after_post_comments');

?>
