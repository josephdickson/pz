<?php
/*
Facebook
This automate description, title, and the featured images sent to Facebook when a page is shared
*/	
	include 'open-graph.php';

/*
Author: Zhen Huang
URL: http://themefortress.com/

This place is much cleaner. Put your theme specific codes here,
anything else you may wan to use plugins to keep things tidy.

*/

/*
1. lib/clean.php
    - head cleanup
	- post and images related cleaning
*/
require_once('lib/clean.php'); // do all the cleaning and enqueue here
/*
2. lib/enqueue-sass.php or enqueue-css.php
    - enqueueing scripts & styles for Sass OR CSS
    - please use either Sass OR CSS, having two enabled will ruin your weekend
*/
//require_once('lib/enqueue-sass.php'); // do all the cleaning and enqueue if you Sass to customize Reverie
require_once('lib/enqueue-css.php'); // to use CSS for customization, uncomment this line and comment the above Sass line
/*
3. lib/foundation.php
	- add pagination
	- custom walker for top-bar and related
*/
require_once('lib/foundation.php'); // load Foundation specific functions like top-bar
/*
4. lib/presstrends.php
    - add PressTrends, tracks how many people are using Reverie
*/
require_once('lib/presstrends.php'); // load PressTrends to track the usage of Reverie across the web, comment this line if you don't want to be tracked

/**********************
Add theme supports
**********************/
function reverie_theme_support() {
	// Add language supports. Please note that Reverie does not include language files, not yet
	load_theme_textdomain('reverie', get_template_directory() . '/lang');
	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	// set_post_thumbnail_size(150, 150, false);
	
	// rss thingy
	add_theme_support('automatic-feed-links');
	
	// Add post formats supports. http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary' => __('Primary Navigation', 'reverie'),
		'utility' => __('Utility Navigation', 'reverie')
	));
	
	// Add custom background support
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',  // background image default
	    'default-color' => '', // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);
}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}
// Additional Widget container which can be added to page templates and is a duplicate of Sidebar above
$sidebars = array('Sidebar-subnav');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}
// Additional Widget container which can be added to page templates and is a duplicate of Sidebar above
$sidebars = array('Sidebar-secondary-subnav');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}
// return entry meta information for posts, used by multiple loops.
function reverie_entry_meta() {
	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s at %s.', 'reverie'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
	echo '<p class="byline author">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
}

/*
 Sort My-Sites
Sorts the My Sites listing on both the page and in the 3.3 admin bar dropdown
Author Otto
Tested on: August 8, 2013 by Joseph Dickson
Addded: Joseph Dickson see http://wordpress.org/support/topic/how-to-sort-the-admin-bars-my-sites-in-alphabetical-order?replies=3
*/

add_filter('get_blogs_of_user','sort_my_sites');
function sort_my_sites($blogs) {
        $f = create_function('$a,$b','return strcasecmp($a->blogname,$b->blogname);');
        uasort($blogs, $f);
        return $blogs;
}

/* Pitzer Styles */
function pitzer_college_scripts() {
	wp_enqueue_style( 'pitzer-print', get_template_directory_uri() . '/print.css' , '' ,'' , 'print');
	wp_enqueue_style( 'pitzer-all', get_template_directory_uri() . '/main.css' , '' ,'' , 'screen'  );

}

add_action( 'wp_enqueue_scripts', 'pitzer_college_scripts' );


/*
Section Menu Accordion
Version 1.5
Author Joseph Dickson
Date Created: July 2, 2014
Modified: 10-27-14 migrated to theme


register_sidebar(array(
 'name' => 'Section Menu',
 'id' => 'section-menu',
 'before_title' => '<p class="title" data-section-title>',
 'after_title' => '</p>',
 'before_widget' => '<div id="section-menu" class="section-container accordion" data-section="accordion"><section>',
 'after_widget'  => '</section></div>',
 ));

// enqueue script


function pz_section_menu() {
	wp_enqueue_script( 'active-section', get_template_directory_uri() . '/section-menu.js', array ('jquery'),'',true );

}

add_action( 'wp_enqueue_scripts', 'pz_section_menu');
*/

//	Advanced Custom Fields Pro Options Page
//	http://www.advancedcustomfields.com/resources/options-page/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_5464f860ced58',
	'title' => 'Header & Footer',
	'fields' => array (
		array (
			'key' => 'field_5464f8732d88d',
			'label' => 'Logo',
			'name' => 'logo_header',
			'prefix' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),


		array (
			'key' => 'field_546508b5804f3',
			'label' => 'Logo Footer',
			'name' => 'logo_footer',
			'prefix' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),
		array (
			'key' => 'field_5464f8832d88e',
			'label' => 'url Footer',
			'name' => 'url_header',
			'prefix' => '',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'http://www.pitzer.edu',
			'placeholder' => '',
		),
		array (
			'key' => 'field_546508dd804f4',
			'label' => 'url Footer',
			'name' => 'url_footer',
			'prefix' => '',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'http://www.pitzer.edu',
			'placeholder' => '',
		),
		array (
			'key' => 'field_54650e9fb5b51',
			'label' => 'Watermark',
			'name' => 'watermark',
			'prefix' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),
		array (
			'key' => 'field_54651a271b364',
			'label' => 'Banner Image',
			'name' => 'image_banner',
			'prefix' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

register_field_group(array (
	'key' => 'group_54592956ca395',
	'title' => 'Flexible Content',
	'fields' => array (
		array (
			'key' => 'field_54592991e1d35',
			'label' => 'Flexible Content',
			'name' => 'flexible_content',
			'prefix' => '',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'button_label' => 'Add Flexible Content',
			'min' => '',
			'max' => '',
			'layouts' => array (
				array (
					'key' => '5459299acdc1f',
					'name' => 'accordion',
					'label' => 'Accordion',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_54592a16e1d36',
							'label' => 'headline',
							'name' => 'headline',
							'prefix' => '',
							'type' => 'text',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
							'readonly' => 0,
							'disabled' => 0,
						),
						array (
							'key' => 'field_54592a28e1d37',
							'label' => 'content',
							'name' => 'content',
							'prefix' => '',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '545939949ba91',
					'name' => 'additional_content',
					'label' => 'Additional Content',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_545939a49ba92',
							'label' => 'Additional Content',
							'name' => 'wysiwyg',
							'prefix' => '',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '546a9cbbc8acf',
					'name' => 'columns',
					'label' => 'Columns',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_546aa65e6ef01',
							'label' => 'Number of columns',
							'name' => 'number_of_columns',
							'prefix' => '',
							'type' => 'select',
							'instructions' => 'Select the number of columns you would like to display side by side.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								1 => 1,
								2 => 2,
								3 => 3,
								4 => 4,
								5 => 5,
							),
							'default_value' => array (
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'field_546a9cf6c8ad0',
							'label' => 'Column Repeater',
							'name' => 'column_repeater',
							'prefix' => '',
							'type' => 'repeater',
							'instructions' => 'Add the same number of columns as selected in "number of columns" additional columns will start a new row.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'min' => '',
							'max' => '',
							'layout' => 'row',
							'button_label' => 'Add Column',
							'sub_fields' => array (
								array (
									'key' => 'field_546a9dfac8ad6',
									'label' => 'column content',
									'name' => 'column_content',
									'prefix' => '',
									'type' => 'wysiwyg',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'tabs' => 'all',
									'toolbar' => 'full',
									'media_upload' => 1,
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '54592d61e9a19',
					'name' => 'profile',
					'label' => 'Profile',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_54592b56e1d39',
							'label' => 'image',
							'name' => 'image',
							'prefix' => '',
							'type' => 'image',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
							'preview_size' => 'thumbnail',
							'library' => 'all',
						),
						array (
							'key' => 'field_54592b68e1d3a',
							'label' => 'content',
							'name' => 'content',
							'prefix' => '',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'front_page',
			),
		),
		array (
			array (
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'posts_page',
			),
		),
		array (
			array (
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'top_level',
			),
		),
		array (
			array (
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'parent',
			),
		),
		array (
			array (
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'child',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'field',
	'hide_on_screen' => '',
));

// Footer contact Information
register_field_group(array (
	'key' => 'group_546bbbcf710d6',
	'title' => 'Footer Contact Info',
	'fields' => array (
		array (
			'key' => 'field_546bbc8ea7d46',
			'label' => 'Office Name',
			'name' => 'office',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Office of Communications',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_546bbe69a7d47',
			'label' => 'Office Location',
			'name' => 'location',
			'prefix' => '',
			'type' => 'textarea',
			'instructions' => 'On campus office location.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Scott Hall 100',
			'maxlength' => '',
			'rows' => 3,
			'new_lines' => 'br',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_546bbefca7d48',
			'label' => 'Phone Numbers',
			'name' => 'phone',
			'prefix' => '',
			'type' => 'textarea',
			'instructions' => 'Add each number on a separate line.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '909.555.5555
Fax: 909.555.5555',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 3,
			'new_lines' => 'br',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_546bbf4fa7d49',
			'label' => 'Address',
			'name' => 'address',
			'prefix' => '',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '1050 N. Mills Avenue
Claremont, CA 91711',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 3,
			'new_lines' => 'br',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_546bbf88a7d4a',
			'label' => 'Email',
			'name' => 'email',
			'prefix' => '',
			'type' => 'text',
			'instructions' => 'Use a general email address.
When "Office Name" is clicked it will open an email to the provided address.
',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

// Redirect URL
register_field_group(array (
	'key' => 'group_54810d07aa9f1',
	'title' => 'Redirect URL',
	'fields' => array (
		array (
			'key' => 'field_54810d133f352',
			'label' => 'Redirect to URL',
			'name' => 'redirect_to_url',
			'prefix' => '',
			'type' => 'url',
			'instructions' => 'URL to redirect this page to.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'http://www.pitzer.edu',
			'placeholder' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-redirect.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;

?>
