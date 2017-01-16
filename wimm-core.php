<?php


/**
 * Plugin Name: Wimm Core
 * Plugin URI: http://webismymind.be
 * Description: Main Wimm Plugin
 * Version: 1.0
 * Author: Webismymind
 * Author URI: http://webismymind.be
 */
use Wimm\Application;


//REGISTER CLASSLOADER ** REQUIRE PHP 5.3
spl_autoload_register(function($class) {

    $dir = str_replace('\\', '/', $class);
    if (file_exists(__DIR__ . '/' . $dir . '.php')) {
        include_once(__DIR__ . '/' . $dir . '.php');
    }
});

//CREATE THE APPLICATION INSTANCE
if(function_exists('add_action'))
{
    add_action('setup_theme', 'wimmcore_run');
}
function wimmcore_run() {

    Application::run();

}

