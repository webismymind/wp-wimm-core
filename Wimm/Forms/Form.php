<?php

namespace Wimm\Forms;

class Form {

    protected $_inputs = array();
    protected $_method;
    protected $_action;
    protected $_classes = array();
    protected $_id;
    
    public function addClass($class) {
        $this->_classes[] = $class;
    }

    public function __construct($method, $action = '') {
        $this->_method = $method;
        $this->_action = $action;
    }

    public function addInput(Input $i) {
        $this->_inputs[$i->getName()] = $i;
    }
    
    public function getInputs() {
        return $this->_inputs;
    }

    public function getMethod() {
        return $this->_method;
    }

    public function getAction() {
        return $this->_action;
    }

    public function getClasses() {
        return $this->_classes;
    }

    public function getId() {
        return $this->_id;
    }

    /**
     * @param $name
     * @return Input
     */
    public function getInputByName($name)
    {
        return $this->_inputs[$name];
    }



}
