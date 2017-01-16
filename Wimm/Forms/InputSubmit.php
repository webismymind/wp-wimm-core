<?php

namespace Wimm\Forms;
class InputSubmit extends Input {
    
    public function __construct($value)
    {
        $this->_type='submit';
        $this->_value = $value;
    }

    public function getType()
    {
        return InputTypes::SUBMIT;
    }


}
?>
