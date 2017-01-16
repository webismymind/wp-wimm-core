<?php

namespace Wimm\Widgets;


use Wimm\Core\AbstractWidget;

class FeaturedPosts extends AbstractWidget {

    /**
     * @controller {"name":"widget_featured_controller", "namespace":"\\Wimm\\Controllers\\TestController", "view":"Templates/featured.phtml"}
     */
    public function configure()
    {

    }

    public function __construct() {
        parent::__construct( 'im_featured_posts', 'Featured Posts' );
    }

} 