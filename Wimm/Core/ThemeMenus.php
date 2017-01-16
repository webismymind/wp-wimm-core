<?php

namespace Wimm\Core;

class ThemeMenus {

    /**
     * Handle Wordpress Menu
     */
    public function __construct() {
        \register_nav_menu('mainMenu', 'Top navigation menu');
        \register_nav_menu('sideMenu', 'Side navigation menu');
        \register_nav_menu('footMenu', 'Footer navigation menu');
    }

}
