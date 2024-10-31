<?php
/*
Plugin Name: Offshore Latest Posts
Description: This plugin is use for display latest posts on your website
Version: 1.0
Author: Sarvesh Patel
*/

function sdp_latest_posts () {
    ob_start();
	 $defaults = array(
        'numberposts' => 5,
        'category' => 0, 'orderby' => 'date',
        'order' => 'DESC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' =>'', 'post_type' => 'post',
        'suppress_filters' => true
    );
 
    $r = wp_parse_args( $args=null, $defaults );
	$get_posts = new WP_Query;
    $posts = $get_posts->query($r);
	foreach($posts as $post){
			echo "<a href='".get_permalink($post->ID)."'>";
			echo $post->post_title;
			echo "</a>";
			echo "<br/>";
	}
    return ob_get_clean();
}

add_shortcode( 'offshore_posts', 'sdp_latest_posts' );