<?php

namespace Wimm\Views;

class View {

    private $name;
    private $action;
    public $params;
    private $path;

    public function addParam($key, $value) {
        $this->params->$key = $value;
        return $this;
    }

    public function setTemplate($path) {
        $this->path = $path;
    }

    public function __construct($name, $action) {
        $this->name = $name;
        $this->action = $action;
        $this->params = new \stdClass();
    }

    public function getName() {
        return $this->name;
    }

    public function display() {
        if (isset($this->path)) {
            include_once $this->path;
        }
        else if (is_file(\get_template_directory()."/wimmviews/". $this->name . '/' . $this->action . '.phtml')){
            include_once \get_template_directory()."/wimmviews/". $this->name . '/' . $this->action . '.phtml';
        }
        else {
            include_once $this->name . '/' . $this->action . '.phtml';
        }
    }

    public function getAction() {
        return $this->action;
    }

    public function setAction($action) {
        $this->action = $action;
    }

}
