<?php

namespace Wimm\Core;

class BarManager {

    protected $bars;

    public function __construct() {
        $bar = new Bar();
        $bar->setName('Right Side Bar')->setId('right_side_bar')->setBeforeWidget('<div class="widget-wrapper">')->setAfterWidget('</div>')->setBeforeTitle('<div class="widget_title fakeh2 bandebleu">')->setAfterTitle('</div>');
        $this->addBar($bar);

        /**
         * Do not delete this line...
         */
        $this->registerBars();
        \add_action('widgets_init', array($this, 'registerBars'));
    }

    public function addBar(Bar $b) {
        $this->bars[] = $b;
    }

    public function registerBars() {
        foreach ($this->bars as $bar) {
            \register_sidebar(array(
                'name' => $bar->getName(),
                'id' => $bar->getId(),
                'before_widget' => $bar->getBeforeWidget(),
                'after_widget' => $bar->getAfterWidget(),
                'before_title' => $bar->getBeforeTitle(),
                'after_title' => $bar->getAfterTitle(),
            ));
        }
    }

}
