<?php

namespace Wimm;

use Wimm\Factories\GlobalOptionsFactory,
    Wimm\Core\ViewsHook,
    Wimm\Core\ControllersHook,
    Wimm\Core\Request,
    Wimm\Core\ThemeSupport,
    Wimm\Core\ThemeMenus,
    Wimm\Core\BarManager,
    Wimm\Core\WidgetManager,
    Wimm\Core\Interfaces\iPlugin,
    Wimm\Widgets\FeaturedPosts,
    Wimm\Core\ViewManager;

use Doctrine\ORM\EntityManager;



class Application {

    /**
     *
     * @var Application
     */
    public static $instance;
    private $globalOptionsFactory;
    private $config;
    private $request;
    private $viewManager;
    private $controllerHook;
    private $plugins = array();
    protected $plugindir;
    private $entityManager;
    private $widgetManager;

    private function __construct() {
        self::$instance = $this;
        require_once 'Config/config.php';
        $this->plugindir = __DIR__;
        $this->config = $conf;

        \do_action('Wimm_autoloaders');



        $this->widgetManager = new WidgetManager();

        \add_action('admin_enqueue_scripts', array($this, 'registerAdminStyles'));

        // A hook to load plugins who depends of the wimm-core and want to inject configs
        \do_action('Wimm-config');

        $this->request = new Request();
        $this->viewManager = new ViewManager();
        $this->globalOptionsFactory = new GlobalOptionsFactory();
        $this->controllerHook = new ControllersHook();
        $viewsHook = new ViewsHook();

        //Register widgets
        $this->widgetManager->registerWidget(new FeaturedPosts());

    }

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param mixed $entityManager
     * @return Application
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * @return \Wimm\Core\WidgetManager
     */
    public function getWidgetManager()
    {
        return $this->widgetManager;
    }







    public static function run() {
        if (!self::$instance) {
            new Application();
        }

    }

    /**
     * Return the directory of the plugin main class
     * @return string
     */
    public function getPluginDir() {
        return $this->plugindir;
    }

    public function registerAdminStyles() {
        //wp_register_style('core_admin', plugins_url() . '/Wimm-core/medias/css/bootstrap.min.css', false, '1.0.0');
        //  wp_enqueue_style('core_admin');
    }

    /**
     * 
     * @return ControllersHook
     */
    public function getControllerHook() {
        return $this->controllerHook;
    }



    /**
     * 
     * @return GlobalOptionsFactory
     */
    public function getGlobalOptionsFactory() {
        return $this->globalOptionsFactory;
    }

    public function getConfig() {
        return $this->config;
    }

    /**
     * 
     * @return Request
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * 
     * @return ViewManager
     */
    public function getViewManager() {
        return $this->viewManager;
    }

    public function hookPlugins() {
        try {
            $dir = opendir(__DIR__ . '/Plugins');
            while ($Entry = @readdir($dir)) {
                if (is_dir(__DIR__ . '/Plugins/' . $Entry) && $Entry != '.' && $Entry != '..') {
                    if (class_exists("Wimm\Plugins\\" . $Entry . "\\" . $Entry)) {
                        $class = "Wimm\Plugins\\" . $Entry . "\\" . $Entry;

                        $plugin = new $class();
                        if (!$plugin instanceof iPlugin) {
                            throw new \Exception('WARNING: Plugin [' . $class . '] not loaded; Plugin main class MUST implements iPlugin core interface');
                        }
                        $this->plugins[] = $plugin;
                        $plugin->onLoad();
                    }
                }
            }
            closedir($dir);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Register an admin controller into the core. Call this function in the Wimm-config hook
     * @param string $name
     * @param string $title
     * @param string $cap
     * @param string $namespace
     */
    public function registerAdminController($name, $title, $cap, $namespace, $viewpath = null, $parent = null) {
        $this->config['admin']['pages'][$name] = array(
            "title" => $title,
            "capability" => $cap,
            "controller" => $namespace,
            "defaultview" => "default",
        );

        if ($viewpath != null) {
            $this->config['admin']['pages'][$name]['templatepath'] = $viewpath;
        }
        if ($parent != null) {
            $this->config['admin']['pages'][$name]['parent'] = $parent;
        }
    }

    /**
     * Register a front controller
     * @param type $name
     * @param type $namespace
     * @param type $viewpath
     */
    public function registerFrontController($name, $namespace, $viewpath = null) {
        $this->config['front']['pages'][$name] = array(
            "controller" => $namespace,
            "defaultview" => "default",
        );

        if ($viewpath != null) {
            $this->config['front']['pages'][$name]['templatepath'] = $viewpath;
        }
    }



}

?>
