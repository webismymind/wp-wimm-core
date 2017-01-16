<?php
namespace Wimm\Core;

class MenuManager {
    public function registerMenu(Menu $m)
    {
        \register_nav_menu($m->getName(), $m->getTitle());

    }
}