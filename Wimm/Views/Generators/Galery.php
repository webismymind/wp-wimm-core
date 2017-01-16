<?php

namespace Wimm\Views\Generators;

/**
 * Galery Generator
 * array structure given:
 * 
 * array : 
 *  items(array) : 
 *      image(string_url),
 *      description(string)
 *  
 */
class Galery extends BaseGenerator implements iGenerator
{

    public function __construct(array $a)
    {
        parent::__construct($a);
        if (!file_exists(\get_template_directory() . '/img/galery-left.png'))
        {
            throw new \Exception(\get_template_directory() . '/img/galery-left.png NOT FOUND');
        }
        if (!file_exists(\get_template_directory() . '/img/galery-right.png'))
        {
            throw new \Exception(\get_template_directory() . '/img/galery-left.png NOT FOUND');
        }
    }

    public function getHtml()
    {
        $html = '';
        $count = 0;
        foreach ($this->parameters['items'] as $item)
        {
            $html .= '<div class = "all">';
            $html .= '<img id="'.$count.'" src = "' . $item["image"] . '" class = "galery-content" alt = "' . $item["description"] . '" />';
            $html .='</div>';
            $count++;
        }
        return $html;
    }

    public function getJs()
    {
        $js =
                '<script type="text/javascript">
            var _G_LEFT_ARROW="' . \get_template_directory_uri() . '/img/galery-left.png";   
            var _G_RIGHT_ARROW="' . \get_template_directory_uri() . '/img/galery-right.png";           
            var _G_JSON =  '.json_encode($this->parameters['items']).';
            var _CURR_POS = 0;
            </script>';
        $js.= '<script src="' . \get_template_directory_uri() . '/js/jquery.isotope.js" type="text/javascript"></script>';
        $js.= '<script src="' . \get_template_directory_uri() . '/js/galery-generator.js" type="text/javascript"></script>';

        return $js;
    }

}