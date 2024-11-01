<?php
/*
Plugin Name: Wd-image-magnifier-xoss
Plugin URI: http://wordpressdriver.com/test/wd-magnifier-test/
Description: Easy magnifier wordpress plugin.
Author: Rezaul haque
Author URI: http://www.wordpressdriver.com
Version: 1.0
*/



function wd_magnifire_wordpress_jQuery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'wd_magnifire_wordpress_jQuery');




function wd_manifirer_script_add() {
    wp_enqueue_script( 'wd_magnifer_js_main', plugins_url( '/js/tiksluszoom.min.js', __FILE__ ), array('jquery'), false);
    wp_enqueue_style( 'wd_magnifier_css', plugins_url( '/css/tiksluszoom.css', __FILE__ ));

}

add_action('init','wd_manifirer_script_add');



function wd_magnifire_shortcode($atts) {
	extract( shortcode_atts( array(
		'id' => '',
		'link' => '',
		'width' => '150',
		'height' => '100',
	), $atts ) );
	
	return'	<script language="javascript">
		jQuery(document).ready(function(){
		jQuery("#'.$id.'").tiksluszoom({lensWidth:'.$width.',lensHeight:'.$height.',});
		});	
		</script><div id="'.$id.'">  
        <img src="'.$link.'" data-big-image="'.$link.'"  class="tiksluszoom" /></div>';
}
add_shortcode('magni', 'wd_magnifire_shortcode');

?>