<?php
namespace Wimm\Core;

use Wimm\Walkers\NavWalker;

abstract class WimmTheme {



    /**
     * @var Theme
     */
    public static $instance;


    public final function __construct()
    {
        self::$instance = $this;

        $reflexion = new \ReflectionClass($this);
        $doc = $reflexion->getMethod("configure")->getDocComment();
        preg_match_all('#@(.*?)\n#s', $doc, $annotations);
        unset($annotations[0]);

        $this->generateSupport($annotations[1]);
        $this->generateMenu($annotations[1]);
        $this->generateHook($annotations[1]);

    }


    /**
     * Get hierarchical array of a theme menu location
     * @param $menu_location_name
     * @param int $depth
     * @return array
     */
    public function wimm_get_menu_items($menu_location_name, $depth = 1){
        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_location_name ] ) ) {
            $menu = wp_get_nav_menu_object( $locations[ $menu_location_name ] );

            $walker = new NavWalker();
            return $walker->walk(wp_get_nav_menu_items($menu->term_id),$depth);
        }
        else {
            return array();
        }
    }


    private function generateMenu($a)
    {
        foreach ($a as $annotations)
        {
            if (preg_match('#^menu#', $annotations))
            {
               $jsontxt = preg_replace('#^menu#','',$annotations);
                $class = json_decode($jsontxt);

                if (!isset($class->name) || !isset($class->label))
                {
                    throw new \Exception('Wrong Annotation Type Menu');
                }
                $menu = new Menu();
                $menu->setName($class->name);
                $menu->setTitle($class->label);
                $menuManager = new MenuManager();
                $menuManager->registerMenu($menu);
            }
        }
    }

    private function generateHook($a)
    {
        foreach ($a as $annotations)
        {
            if (preg_match('#^hook#', $annotations))
            {
                $jsontxt = preg_replace('#^hook#','',$annotations);
                $class = json_decode($jsontxt);

                if (!isset($class->name) || !isset($class->label))
                {
                    throw new \Exception('Wrong Annotation Type Menu');
                }

                \register_sidebar( array(
                    'name'         => $class->label,
                    'id'           => $class->name,
                    'description'  => __( 'WimmTheme Hook.' ),
                    'before_title' => '<h3 class="Wimmtheme_hook_title">',
                    'after_title'  => '</h3>',
                   'before_widget' => '<div class="Wimmtheme_hook">',
                    'after_widget' => '</div>',

                ) );


            }
        }
    }

    private function generateSupport($a)
    {
        foreach ($a as $annotations)
        {
            if (preg_match('#^support#', $annotations))
            {
                $jsontxt = trim(preg_replace('#^support#','',$annotations));


                $defaults_header = array(
                    'default-image'          => '',
                    'random-default'         => false,
                    'width'                  => 0,
                    'height'                 => 0,
                    'flex-height'            => false,
                    'flex-width'             => false,
                    'default-text-color'     => '',
                    'header-text'            => false,
                    'uploads'                => true,
                    'wp-head-callback'       => '',
                    'admin-head-callback'    => '',
                    'admin-preview-callback' => '',
                );
                $support = new ThemeSupport();

                if ($jsontxt === "custom-header")
                {
                    $support->addSupport($jsontxt, $defaults_header);

                }
                else {
                    $support->addSupport($jsontxt);

                }


            }
        }
    }

}