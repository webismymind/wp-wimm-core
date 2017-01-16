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


add_action( 'init', 'github_plugin_updater_test_init' );
function github_plugin_updater_test_init()
{
    include_once 'updater.php';

    define('WP_GITHUB_FORCE_UPDATE', true);


    if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
        $config = array(
            'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
            'proper_folder_name' => 'wimm-core', // this is the name of the folder your plugin lives in
            'api_url' => 'https://api.github.com/repos/webismymind/wp-wimm-core', // the GitHub API url of your GitHub repo
            'raw_url' => 'https://raw.githubusercontent.com/webismymind/wp-wimm-core/master', // the GitHub raw url of your GitHub repo
            'github_url' => 'https://github.com/webismymind/wp-wimm-core', // the GitHub url of your GitHub repo
            'zip_url' => 'https://github.com/webismymind/wp-wimm-core/archive/master.zip', // the zip url of the GitHub repo
            'sslverify' => true, // whether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
            'requires' => '3.0', // which version of WordPress does your plugin require?
            'tested' => '3.3', // which version of WordPress is your plugin tested up to?
            'readme' => 'README.md', // which file to use as the readme for the version number
        );
        new \WP_GitHub_Updater($config);
    }


}


