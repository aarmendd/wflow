<?php

/**
 * Plugin Name: Wflow
 * Author: Armend Ahmeti
 * Author URI: 
 * Version: 1.0.0
 * Description: WordPress React Integration.
 * Text-Domain: wflow
 */

if (!defined('ABSPATH')) : exit();
endif; // No direct access allowed.

/**
 * Define Plugins Contants
 */
define('WPRK_PATH', trailingslashit(plugin_dir_path(__FILE__)));
define('WPRK_URL', trailingslashit(plugins_url('/', __FILE__)));


function near_react_shortcode()
{
    wp_enqueue_script('wflow', WPRK_URL . 'dist/bundle.js', ['jquery', 'wp-element'], wp_rand(), true);
    wp_localize_script('wflow', 'appLocalizer', [
        'apiUrl' => home_url('/wp-json'),
        'nonce' => wp_create_nonce('wp_rest'),
    ]);

    $appContainer = '<div class="w3-container"><div id="root"></div></div>';
    echo $appContainer;
}

function mytheme_enqueue_style()
{
    wp_enqueue_style('myplugin-style', plugin_dir_url(__FILE__)  . '/src/style.css');
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_style');

add_shortcode('near_react_shortcode', 'near_react_shortcode');
