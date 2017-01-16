<?php


namespace Wimm\Core;


class WidgetManager {

    public function registerWidget(AbstractWidget $widget)
    {
        $rf = new \ReflectionClass($widget);

        \add_action('widgets_init', create_function('', 'return register_widget("'.$rf->getName().'");'));

    }

    public function test()
    {
        var_dump('FIRE');
    }


} 