<?php

namespace Wimm\Core;

use Wimm\Application,
    Wimm\Views\View;

class ViewsHook
{

    public function __construct()
    {
        \add_action("admin_menu", array($this, "setup_theme_admin_menus"));
    }

    /**
     * Cette fonction est injectée dans wordpress pour enregistrer les vues définies dans la config.
     */
    public function setup_theme_admin_menus()
    {
        $config = Application::$instance->getConfig();


        foreach ($config['admin']['pages'] as $name => $page)
        {
            $vm = Application::$instance->getViewManager();

            if (!$vm->getView($name))
            {
                $view = new View($name, 'default');
                if (isset($page['templatepath']) )
                {
                    $view->setTemplate($page['templatepath']);
                }
                $vm->addView($name, $view);

            } else
            {
                $view = $vm->getView($name);
            }


            if (isset($page['parent'])) {
                \add_submenu_page($page['parent'], $page['title'], $page['title'], $page['capability'], $name, array($view, 'display'));
            } else {
                \add_menu_page($page['title'], $page['title'], $page['capability'], $name, array($view, 'display'));
            }
        }
    }

}

?>
