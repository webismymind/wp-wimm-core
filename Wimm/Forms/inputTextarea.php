<?php

namespace Wimm\Forms;

class InputTextarea extends Input {

    protected $_cols;
    protected $_rows;

    public function __construct($rows, $cols) {
        $this->_type = "textarea";
        $this->_rows = $rows;
        $this->_cols = $cols;
    }

    public function getCols() {
        return $this->_cols;
    }

    public function setCols($cols) {
        $this->_cols = $cols;
        return $this;
    }

    public function getRows() {
        return $this->_rows;
    }

    public function setRows($rows) {
        $this->_rows = $rows;
        return $this;
    }

    public function getType()
    {
        return InputTypes::TEXTAREA;
    }


}
