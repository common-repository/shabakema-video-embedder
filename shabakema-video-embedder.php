<?php
/*
Plugin Name: ShabakeMa Video Embedder
Description: ShabakeMa Video Embedder lets you easily add movies and videos from ShabakeMa.
Version: 1.0
Author: <a href="http://shabakema.com/">شبکه ما</a>
Author URI: http://shabakema.com
*/


// Create shabakema shortcode
function shabakema_embed_video_player($atts, $content = '') {
	extract(shortcode_atts(array(
		"height" =>'330',
		"width" =>'460',
		"fullscreen" =>'true'
	), $atts));

    $str = $content;
    $pieces=explode('/',$str,10);
    if($pieces[0]=='http:')
    {
        $id=$pieces[4];
    }
    if($pieces[0]=='www.shabakema.com' || $pieces[0]=='shabakema.com')
    {
        $id=$pieces[2];
    }
    $output = '<iframe src="http://www.shabakema.com/product/'. $id . '?embed=true"
                allowFullScreen="'. $fullscreen . '"
                webkitallowfullscreen="'. $fullscreen . '"
                mozallowfullscreen="'. $fullscreen . '"
                height="'. $height .'"
                width="'. $width .'" >
                </iframe>';

    return $output;
}

add_shortcode("shabakema", "shabakema_embed_video_player");
add_shortcode("shabakema", "shabakema_embed_video_player");


add_filter('mce_external_plugins', "shabakemaplugin_register");
add_filter('mce_buttons', 'shabakemaplugin_add_button', 0);

function shabakemaplugin_add_button($buttons)
{
    array_push($buttons, "separator", "shabakemaplugin");
    return $buttons;
}

function shabakemaplugin_register($plugin_array)
{
    $plugin_array['shabakemaplugin'] = WP_PLUGIN_URL . "/shabakema-video-embedder/tinyMCE/editor_plugin.js";
    return $plugin_array;
}

