<?php
// test - inserts a link to share the post on twitter and provide the url and title
function wptuts_first_shortcode($atts, $content=null){  
    
    $post_url = get_permalink($post->ID);  
    $post_title = get_the_title($post->ID);  
    $tweet = '<a href="http://twitter.com/home/?status=Read ' . $post_title . ' at ' . $post_url . '">Share on Twitter</a>';  
    
    return $tweet;  
  }  
    
  add_shortcode('twitter', 'wptuts_first_shortcode'); 
  
  
// insert a button 
function sButton($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#'), $atts));
   extract(shortcode_atts(array('class' => ''), $atts));
   return '<a href="'.$link.'"><span class="button '.$class.'">' . do_shortcode($content) . '</span></a>';
}
add_shortcode('button', 'sButton');

// Wraps a Foundation Panel around content
function sPanel($atts, $content = null) {
   extract($atts);
   extract(shortcode_atts(array('class' => '#'), $atts));
   return '<div class="panel '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('panel', 'sPanel');

// Wraps a Foundation Section container for an accordion for Foundation 4.3.2
function sAcc($atts, $content = null) {
   extract($atts);
   return 	'<div class="section-container accordion" data-section="accordion">'
				. do_shortcode($content) . 
			'</div>';
}
add_shortcode('acc', 'sAcc');

// Wraps a Foundation the actual Accordion around content for Foundation 4.3.2
function sAccordion($atts, $content = null) {
   extract($atts);
   extract(shortcode_atts(array('title' => '#'), $atts));
   extract(shortcode_atts(array('n' => '#'), $atts));
   return '<section class="">
    <p class="title" data-section-title><strong><a href="#'.$n.'">'.$title.'</a></strong></p>
    <div id="'.$n.'" class="content" data-section-content>'
      . do_shortcode($content) . 
    '</div>
  </section>';
}
add_shortcode('accordion', 'sAccordion');

// Wraps a Foundation Section container for an second accordion *for nesting purposes
function sAcc2($atts, $content = null) {
   extract($atts);
   return '<div class="section-container accordion" data-section="accordion">'
			. do_shortcode($content) . 
			'</div>';
}
add_shortcode('acc2', 'sAcc2');

// Wraps the second actual Accordion around content *for nesting purposes
function sAccordion2($atts, $content = null) {
   extract($atts);
   extract(shortcode_atts(array('title' => '#'), $atts));
   extract(shortcode_atts(array('class' => '#'), $atts));
   return '<section>
    <p class="title" data-section-title><a href="#"><strong class="'.$class.'">'.$title.'</strong></a></p>
    <div class="content" data-section-content>'
			. do_shortcode($content) . '
    </div>
  </section>';
}
add_shortcode('accordion2', 'sAccordion2');

// Wraps a div around content with a class and data
function sDiv($atts, $content = null) {
   extract(shortcode_atts(array('class' => '#'), $atts));
   extract(shortcode_atts(array('data' => '#'), $atts));
	return 
		'<div class="'.$class.'" data="'.$data.'">'
			. do_shortcode($content) . 
		'</div>';
}
add_shortcode('div', 'sDiv');

// Wraps a "parent" div around content with a class and data so it can nest another div
function sDiv2($atts, $content = null) {
   extract(shortcode_atts(array('class' => '#'), $atts));
   extract(shortcode_atts(array('data' => '#'), $atts));
	return 
		'<div class="'.$class.'" data="'.$data.'">'
			. do_shortcode($content) . 
		'</div>';
}
add_shortcode('div2', 'sDiv2');

// Wraps a div class="row" around another div with a class and data
function sRow($atts, $content = null) {
   extract(shortcode_atts(array('class' => ''), $atts));
   extract(shortcode_atts(array('data' => ''), $atts));
	return 
		'<div class="row' .$class.'" data="'.$data.'">'
				. do_shortcode($content) . 
			'</div>';
}
add_shortcode('row', 'sRow');

// Creates a Reveal Video for a Vimeo video
// foundation.zurb.com/docs/components/reveal.html
function sVimeo($atts, $content = null) {
   extract(shortcode_atts(array('number' => ''), $atts));
   extract(shortcode_atts(array('title' => ''), $atts));
   extract(shortcode_atts(array('code' => ''), $atts));
   extract(shortcode_atts(array('width' => ''), $atts));
	return 
		'<a href="#" data-reveal-id="myModal'.$number.'">'.$code.$title.'</a>
		<div id="myModal'.$number.'" class="reveal-modal '.$width.'">
			<div class="flex-video widescreen vimeo">
				<iframe src="http://player.vimeo.com/video/'.$number.'"frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				<a class="close-reveal-modal">&#215;</a>
			</div>
		</div>';
}
add_shortcode('vimeo', 'sVimeo');

// Creates a Reveal Video for a YouTube video
// foundation.zurb.com/docs/components/reveal.html
function sYouTube($atts, $content = null) {
   extract(shortcode_atts(array('number' => ''), $atts));
   extract(shortcode_atts(array('title' => ''), $atts));
   extract(shortcode_atts(array('width' => ''), $atts));
	return 
		'<a href="#" data-reveal-id="myModal'.$number.'">'.$title.'</a>
		<div id="myModal'.$number.'" class="reveal-modal '.$width.'">
			<div class="flex-video">
				<iframe src="//www.youtube.com/embed/'.$number.'?rel=0" frameborder="0" allowfullscreen></iframe>
				<a class="close-reveal-modal">&#215;</a>
			</div>
		</div>';
}
add_shortcode('youtube', 'sYouTube');

// Creates a Reveal for a YouTube video with an image
// foundation.zurb.com/docs/components/reveal.html
function sYouTubeIMG($atts, $content = null) {
   extract(shortcode_atts(array('number' => ''), $atts));
   extract(shortcode_atts(array('title' => ''), $atts));
   extract(shortcode_atts(array('width' => ''), $atts));
   extract(shortcode_atts(array('img' => ''), $atts));
	return 
		'<a href="#" data-reveal-id="myModal'.$number.'"><img src="'.$img.'" />'.$title.'</a>
		<div id="myModal'.$number.'" class="reveal-modal '.$width.'">
			<div class="flex-video widescreen">
				<iframe src="//www.youtube.com/embed/'.$number.'?rel=0" frameborder="0" allowfullscreen></iframe>
				<a class="close-reveal-modal">&#215;</a>
			</div>
		</div>';
}
add_shortcode('youtubeimg', 'sYouTubeIMG');


// Creates a Orbit slideshow 
// foundation.zurb.com/docs/components/reveal.html
function sOrbit($atts, $content = null) {
   extract(shortcode_atts(array('number' => '#'), $atts));
   extract(shortcode_atts(array('title' => '#'), $atts));
   extract(shortcode_atts(array('width' => '#'), $atts));
	return 
		'<div class="slideshow-wrapper">
			<div class="preloader"></div>
				<ul data-orbit="">'
					. do_shortcode($content) .
				'</ul>
			</div>';
}
add_shortcode('orbit', 'sOrbit');

// Creates a Citation - anchor link to footnote on same page
function sCitation($atts, $content = null) {
   extract(shortcode_atts(array('number' => ''), $atts));
	return 
		'<sup><a href="#footnote-'.$number.'" class="cite" id="cite-'.$number.'"> ['.$number.']</a></sup>';
}
add_shortcode('citation', 'sCitation');

// Creates a Footnote - anchor link to citation on same page
function sFootnote($atts, $content = null) {
   extract(shortcode_atts(array('number' => ''), $atts));
	return 
		'<span id="footnote-'.$number.'" class="footnote"> <sup><a href="#cite-'.$number.'">['.$number.']</a></sup> ' . do_shortcode($content) . '</span>';
}
add_shortcode('footnote', 'sFootnote');


// Creates a slide for Orbit slideshow 
// foundation.zurb.com/docs/components/reveal.html
function sSlide($atts, $content = null) {
   extract(shortcode_atts(array('title' => '#'), $atts));
   extract(shortcode_atts(array('url' => '#'), $atts));
   extract(shortcode_atts(array('img' => '#'), $atts));
   extract(shortcode_atts(array('caption' => '#'), $atts));
	return 
		'<li><a title="'.$title.'" href="'.$url.'"><img alt="'.$title.'" src="'.$img.'" /></a>
<div class="orbit-caption">'.$caption.'</div></li>';
}
add_shortcode('slide', 'sSlide');

// Creates a data-interchange for responsive images
// http://foundation.zurb.com/docs/components/interchange.html
function sInterchange($atts, $content = null) {
   extract(shortcode_atts(array('url' => '#'), $atts));
   extract(shortcode_atts(array('extension' => 'jpg'), $atts));

	return 
		'<img src="'.$url.'-300x240.'.$extension.'" data-interchange="['.$url.'-300x240.'.$extension.', (default)], ['.$url.'.'.$extension.', (extrasmall)]">';
}
add_shortcode('interchange', 'sInterchange');

// Magellan navigation item
function sMagellan($atts, $content = null) {
   extract(shortcode_atts(array('title' => ''), $atts));
	return 
		'<li data-magellan-arrival="'.$title.'"><a href="#'.$title.'">'.$title.'</a></li>';
}
add_shortcode('magellan', 'sMagellan');

// Creates a forced line break
function sBreak($atts, $content = null) {
   extract($atts);
   extract(shortcode_atts(array(), $atts));
   return '<br />';
}
add_shortcode('break', 'sBreak');


// Profile tile - 3 columns
// Creates a forced line break
function sProfile($atts, $content = null) {
   extract($atts);
   extract(shortcode_atts(array(), $atts));
   return '<div class="small-12 large-4 columns small staff-profile">'  . do_shortcode($content) . '</div>';
}
add_shortcode('profile', 'sProfile');

// Caption for Images
// set width of caption to be the same as the image
function sCaption($atts, $content = null) {
	extract(shortcode_atts(array('width' => '#'), $atts));
	extract(shortcode_atts(array('align' => '#'), $atts));
	extract(shortcode_atts(array('id' => '#'), $atts));
	return '<figcaption class="'.$align.'" id="'.$id.'" style="width:'.$width.'px;">'  . do_shortcode($content) . '</figcaption>';
	}
add_shortcode('caption', 'sCaption');

// Post Forwarding from another blog on the same network
// Imports a post based on post_id and blog_id numbers see http://codex.wordpress.org/Function_Reference/get_blog_post

function sPostForwarding($atts = null) {
	extract(shortcode_atts(array('post' => '#'), $atts));
	extract(shortcode_atts(array('blog' => '#'), $atts));
	$import_post = get_blog_post( $blog, $post);
	echo wpautop (do_shortcode($import_post -> post_content));
	}
add_shortcode('PostForwarding','sPostForwarding');

// Creates a Flex Video YouTube Embedding
function sFlex( $atts, $content = null ) {
	extract(shortcode_atts(array('number' => ''), $atts));
	extract(shortcode_atts( array(
		'youtube' => '
			<div class="flex-video">
				<iframe src="//www.youtube-nocookie.com/embed/'.$number.'" frameborder="0" allowfullscreen></iframe>
			</div>',
		), $atts));
	extract(shortcode_atts(array('class' => ''), $atts));

	return "{$youtube}";
}
add_shortcode('flex', 'sFlex');

// Creates a Flex Video Vimeo Embedding
function sFlexVimeo( $atts, $content = null ) {
	extract(shortcode_atts(array('number' => ''), $atts));
	extract(shortcode_atts( array(
		'vimeo' => '
			<div class="flex-video widescreen vimeo">
				<iframe src="//player.vimeo.com/video/'.$number.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ff9933" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>',

		), $atts));
	extract(shortcode_atts(array('class' => ''), $atts));

	return "{$vimeo}";
}
add_shortcode('flexvimeo', 'sFlexVimeo');

/*
Plugin Name: Scripps College TinyMCE Shortcode Buttons
Plugin URI: http://www.scrippscollege.edu
Description: Shortcode buttons.
Version: 1.0
Author: Matt Hutaff
Author URI: http://www.scrippscollege.edu
Adapted by: Joseph Dickson
Adapted URI: http://www.pitzer.edu


/*-----------------------------------------------------------------------------------*/
/* Adds shortcode buttons to tinyMCE */
/*-----------------------------------------------------------------------------------*/

add_action('init', 'add_button');

function add_button() {  
	add_filter('mce_external_plugins', 'add_plugin');  
	add_filter('mce_buttons_3', 'register_button');  
}

function register_button($buttons) {  
	array_push($buttons, "panel", "accordion", "div" , "row" , "vimeo" , "youtube" , "citation" , "footnote" , "break" , "flex");  
	return $buttons;  
}  

function add_plugin($plugin_array) {  
	 $plugin_array['accordion'] 		= '/wp-content/themes/reverie-master/custombuttons.js';
     $plugin_array['panel']				= '/wp-content/themes/reverie-redford-conservancy/custombuttons.js';
	 $plugin_array['div']				= '/wp-content/themes/reverie-redford-conservancy/custombuttons.js';
	 $plugin_array['row']				= '/wp-content/themes/reverie-redford-conservancy/custombuttons.js';
 	 $plugin_array['vimeo']				= '/wp-content/themes/reverie-redford-conservancy/custombuttons.js';
	 $plugin_array['youtube']			= '/wp-content/themes/reverie-redford-conservancy/custombuttons.js';
 	 $plugin_array['citation']			= '/wp-content/themes/reverie-redford-conservancy/custombuttons.js';
	 $plugin_array['footnote']			= '/wp-content/themes/reverie-redford-conservancy/custombuttons.js';
	 $plugin_array['break']				= '/wp-content/themes/reverie-redford-conservancy/custombuttons.js';
	 $plugin_array['flex']				= '/wp-content/themes/reverie-redford-conservancy/custombuttons.js';
   return $plugin_array;  
}  

?>
<?php
/* Add CSS to Visual Editor. */
$your_custom_stylesheet = 'visual-editor.css';
add_editor_style($your_custom_stylesheet);
?>