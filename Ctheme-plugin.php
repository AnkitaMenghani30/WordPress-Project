<?php
/*
@package CthemePlugin
*/

/*
Plugin Name: Ctheme Plugin
Plugin URI: http://custom-theme.com/plugin
Description: This is my first attempt on writing a custom plugin for this project.
Version: 1.0.0
Author: Kirti Purswani
Author URI: http://custom-theme.com
License: GPLv2 or later 
Text Domain: Ctheme-plugin
*/

/*

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

This program incorporates work covered by the following copyright and
permission notices:

  b2 is (c) 2001, 2002 Michel Valdrighi - m@tidakada.com -
  http://tidakada.com
*/
function np_register_scripts() {
    if (!is_admin()) {
        // register
        wp_register_script('np_nivo-script', plugins_url('nivo-slider/jquery.nivo.slider.js', __FILE__), array( 'jquery' ));
        wp_register_script('np_script', plugins_url('script.js', __FILE__));
 
        // enqueue
        wp_enqueue_script('np_nivo-script');
        wp_enqueue_script('np_script');
    }
}
 
function np_register_styles() {
    // register
    wp_register_style('np_styles', plugins_url('nivo-slider/nivo-slider.css', __FILE__));
    wp_register_style('np_styles_theme', plugins_url('nivo-slider/themes/default/default.css', __FILE__));
 
    // enqueue
    wp_enqueue_style('np_styles');
    wp_enqueue_style('np_styles_theme');
}

function np_init() {
    $args = array(
        'public' => true,
        'label' => 'Custom Images',
        'supports' => array(
            'title',
            'thumbnail'
        )
    );
    register_post_type('np_images', $args);
}
add_action('init', 'np_init');

add_action('wp_print_scripts', 'np_register_scripts');
add_action('wp_print_styles', 'np_register_styles');
?>