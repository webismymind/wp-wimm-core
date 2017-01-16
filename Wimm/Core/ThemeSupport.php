<?php

namespace Wimm\Core;

class ThemeSupport
{

    /**
     * Handle Theme Support
     */

    const CUSTOM_HEADER = "custom-header";
    const MENUS = "menus";
    const THUMBNAILS = "post-thumbnails";


    public static function addSupport($support, $array = null) {

        if (!is_null($array)) {
            \add_theme_support($support,$array);

        }
        else{
            \add_theme_support($support);

        }

    }

}
