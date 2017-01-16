<?php

namespace Wimm\Core;


class Menu {

    protected $_name;
    protected $_title;

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
        return $this;

    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }



} 