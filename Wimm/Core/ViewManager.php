<?php

namespace Wimm\Core;

use Wimm\Views\View;

class ViewManager
{
    private $views = array();

    public function addView($name, View $v)
    {
        $this->views[$name] = $v;
    }

    public function getViews()
    {
        return $this->views;
    }

    public function getView($name)
    {
        if (isset($this->views[$name]))
            return $this->views[$name];
        else
            return false;
    }

}