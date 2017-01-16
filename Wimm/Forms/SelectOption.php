<?php
/**
 * Created by PhpStorm.
 * User: Boulot
 * Date: 14/08/14
 * Time: 15:57
 */

namespace Wimm\Forms;


class SelectOption {


    protected $value;
    protected $content;


    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }





} 