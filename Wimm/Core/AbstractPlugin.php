<?php


namespace Wimm\Core;

use Wimm\Core\Interfaces\iPlugin;

class AbstractPlugin implements iPlugin {


    private static $instance;

    public function onLoad()
    {
        // TODO: Implement onLoad() method.
    }

    public function onRun()
    {
        // TODO: Implement onRun() method.
    }


    public function __construct()
    {



        $reflexion = new \ReflectionClass($this);

        /*

         $doc = $reflexion->getMethod("configure")->getDocComment();

        preg_match_all('#@(.*?)\n#s', $doc, $annotations);
        unset($annotations[0]);
        foreach ($annotations[1] as $annotation)
        {

            if (preg_match('#^controller#', $annotation))
            {
                $jsontxt = preg_replace('#^controller#','',$annotation);
                $class = json_decode(trim($jsontxt));





            }
        }
        */
    }






}