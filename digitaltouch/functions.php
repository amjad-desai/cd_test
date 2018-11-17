<?php
define('SITEURL', get_bloginfo('url'));
define('TEMPLATE_PATH', get_template_directory_uri());
define('TEMPLATE_DIR_PATH', get_template_directory());

function digitaltouch_setup() {
    load_theme_textdomain( 'digitouch' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'digitouch' ),
		'footer'  => __( 'Footer Menu', 'digitouch' ),
	) );
}
add_action( 'after_setup_theme', 'digitaltouch_setup' );

function digi_post_types_init() {
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name', 'digitouch' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name', 'digitouch' ),
		'menu_name'          => _x( 'Testimonials', 'admin menu', 'digitouch' ),
		'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'digitouch' ),
		'add_new'            => _x( 'Add New', 'Testimonial', 'digitouch' ),
		'add_new_item'       => __( 'Add New Testimonial', 'digitouch' ),
		'new_item'           => __( 'New Testimonial', 'digitouch' ),
		'edit_item'          => __( 'Edit Testimonial', 'digitouch' ),
		'view_item'          => __( 'View Testimonial', 'digitouch' ),
		'all_items'          => __( 'All Testimonials', 'digitouch' ),
		'search_items'       => __( 'Search Testimonials', 'digitouch' ),
		'parent_item_colon'  => __( 'Parent Testimonials:', 'digitouch' ),
		'not_found'          => __( 'No Testimonials found.', 'digitouch' ),
		'not_found_in_trash' => __( 'No Testimonials found in Trash.', 'digitouch' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'digitouch' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimonial' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

    register_post_type( 'testimonial', $args );
}
add_action( 'init', 'digi_post_types_init' );