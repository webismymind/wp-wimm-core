<?php

namespace Wimm\DAO;

use Wimm\Models\GlobalOption;

/**
 * Hook Application to the WP theme options System. 
 * 
 */
class GlobalOptions
{

    public function get($name)
    {
        return \get_option($name) ? \get_option($name) : false;
    }

    public function save(GlobalOption $g)
    {
       
        \update_option($g->getName(), array(
            'value' => $g->getValue(),
            'description' => $g->getDescription()
        ));
    }

    public function delete(GlobalOption $g)
    {
        \delete_option($g->getName());
    }

}