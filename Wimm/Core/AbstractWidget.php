<?php
namespace Wimm\Core;

use Wimm\Application;

abstract class AbstractWidget extends \WP_Widget
{


    public function widget($args, $instance) {
        //widget content
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        echo $before_widget;
        if ($title)
            echo $before_title . $title . $after_title;

        $reflexion = new \ReflectionClass($this);
        $doc = $reflexion->getMethod("configure")->getDocComment();
        preg_match_all('#@(.*?)\n#s', $doc, $annotations);
        unset($annotations[0]);
        foreach ($annotations[1] as $annotation)
        {

            if (preg_match('#^controller#', $annotation))
            {
                $jsontxt = preg_replace('#^controller#','',$annotation);
                $class = json_decode(trim($jsontxt));


                if (!isset($class->name) || !isset($class->namespace) || !isset($class->view))
                {
                    throw new \Exception('Wrong Annotation Type Controller Widget');
                }

                $dir =  dirname($reflexion->getFileName());
                Application::$instance->registerFrontController($class->name,$class->namespace, $dir."/".$class->view);

                Application::$instance->getControllerHook()->loadController($class->name);


            }
        }
       // Application::$instance->registerFrontController()

        echo $after_widget;
    }


    function update($new_instance, $old_instance) {
        //widget params
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }



    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => ''));
        $title = strip_tags($instance['title']);
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
    <?php
    }
}