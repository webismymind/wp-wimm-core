<?php

namespace Wimm\Core;

use Wimm\Application,
    Wimm\Views\View;

class ControllersHook {

    public function __construct() {
        if (Application::$instance->getRequest()->getUrlVar() && isset(Application::$instance->getRequest()->getUrlVar()->page)) {
            $askedPage = Application::$instance->getRequest()->getUrlVar()->page;
            $config = Application::$instance->getConfig();
            if (isset($config['admin']['pages'][$askedPage])) {
                $view = new View($askedPage, 'default');
                if (isset($config['admin']['pages'][$askedPage]['templatepath'])) {
                    $view->setTemplate($config['admin']['pages'][$askedPage]['templatepath']);
                }
                $vm = Application::$instance->getViewManager();
                $vm->addView($askedPage, $view);

                $active_controller = new $config['admin']['pages'][$askedPage]['controller']($view);
            }
        }
    }

    public function loadController($name) {
        $config = Application::$instance->getConfig();
        if (isset($config['front']['pages'][$name])) {
            $view = new View($name, 'default');
            if (isset($config['front']['pages'][$name]['templatepath'])) {
                $view->setTemplate($config['front']['pages'][$name]['templatepath']);
            }
            $active_controller = new $config['front']['pages'][$name]['controller']($view);
            $active_controller->getView()->display();
        }
    }

}
