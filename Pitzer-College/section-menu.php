<?php 
/*
Section Menu Accordion
Version 1.5
Author Joseph Dickson
Date Created: July 2, 2014
Modified: 10-27-14 migrated to theme
*/

register_sidebar(array(
 'name' => 'Section Menu',
 'id' => 'section-menu',
 'before_title' => '<p class="title" data-section-title>',
 'after_title' => '</p>',
 'before_widget' => '<div id="section-menu" class="section-container accordion" data-section="accordion"><section>',
 'after_widget'  => '</section></div>',
 ));

/*
 * enqueue script
 */

function section_menu() {
	wp_enqueue_script( 'active-section', get_template_directory_uri() . '/section-menu.js', array ('jquery'),'',true );

}


add_action( 'wp_enqueue_scripts', 'section_menu');

?>
