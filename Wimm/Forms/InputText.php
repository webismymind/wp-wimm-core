<?php
namespace Wimm\Forms;

class InputText extends Input
{
    protected $_placeholder;
    
    public function __construct() {
        $this->_type="text";
    }
    
    public function getPlaceholder() {
        return $this->_placeholder;
    }

    public function setPlaceholder($placeholder) {
        $this->_placeholder = $placeholder;
        return $this;
    }

    public function getType()
    {
        return InputTypes::TEXT;
    }


}

