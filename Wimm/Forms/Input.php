<?php

namespace Wimm\Forms;

abstract class Input {

    protected $_type;
    protected $_value;
    protected $_id;
    protected $_label;
    protected $_name;
    protected $_classes = array();


    public function getValue() {
        return $this->_value;
    }

    public function setValue($value) {
        $this->_value = $value;
        return $this;
    }

    public function getName() {
        return $this->_name;
    }

    public function setName($name) {
        $this->_name = $name;
        return $this;
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
        return $this;
    }

    public function getLabel() {
        return $this->_label;
    }

    public function setLabel($label) {
        $this->_label = $label;
        return $this;
    }

    public function getClasses() {
        $class = '';
        foreach ($this->_classes as $cl) {
            
            $class .= $cl . ' ';
        }

        return $class;
    }

    public function setClasses($classes) {
        $this->_classes = $classes;
        return $this;
    }

    public function getType()
    {
        return InputTypes::UNDEFINED;
    }

}