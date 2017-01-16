<?php
/**
 * Created by PhpStorm.
 * User: Boulot
 * Date: 21/08/14
 * Time: 12:29
 */

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