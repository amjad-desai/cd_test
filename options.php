<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_check'),
		'two' => __('Two', 'options_check'),
		'three' => __('Three', 'options_check'),
		'four' => __('Four', 'options_check'),
		'five' => __('Five', 'options_check')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_check'),
		'two' => __('Pancake', 'options_check'),
		'three' => __('Omelette', 'options_check'),
		'four' => __('Crepe', 'options_check'),
		'five' => __('Waffle', 'options_check')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue', 'georgia' => 'Georgia' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Basic Settings', 'options_check'),
        'type' => 'heading');
        
    $options[] = array(
        'name' => __('Site Logo', 'options_check'),
        'id' => 'site_logo',
		'type' => 'upload');
	
	$options[] = array(
		'name' => __('Address', 'options_check'),
		'id' => 'address',
		'type' => 'text');

	$options[] = array(
		'name' => __('Location', 'options_check'),
		'id' => 'location',
		'type' => 'text');

	$options[] = array(
		'name' => __('Contact Us Map(Add Map URL)', 'options_check'),
		'id' => 'contact-us-map',
		'type' => 'text');

	$options[] = array(
		'name' => __('Phone Number', 'options_check'),
		'id' => 'ph_no',
		'type' => 'text');

	$options[] = array(
		'name' => __('Mobile Number', 'options_check'),
		'id' => 'mo_no',
		'type' => 'text');

	$options[] = array(
		'name' => __('Email', 'options_check'),
		'id' => 'email',
		'type' => 'text');

	$options[] = array(
		'name' => __('Social Links', 'options_check'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Facebook', 'options_check'),
		'id' => 'fb_url',
		'type' => 'text');

	$options[] = array(
		'name' => __('Twitter', 'options_check'),
		'id' => 'tw_url',
		'type' => 'text');

	$options[] = array(
		'name' => __('Instagram', 'options_check'),
		'id' => 'insta_url',
		'type' => 'text');

	$options[] = array(
		'name' => __('API', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('MailChimp API Key', 'options_check'),
		'id' => 'mailchimp_api_key',
		'type' => 'text');

	$options[] = array(
		'name' => __('MailChimp List Id', 'options_check'),
		'id' => 'mailchimp_list_id',
		'type' => 'text');

	return $options;
}
