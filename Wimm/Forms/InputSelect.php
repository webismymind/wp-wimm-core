<?php
/**
 * Created by PhpStorm.
 * User: Boulot
 * Date: 14/08/14
 * Time: 15:59
 */

namespace Wimm\Forms;


class InputSelect extends Input {

    protected $options = array();
    protected $selectedOption;

    /**
     * @param SelectOption $options
     */
    public function addOptions(SelectOption $options)
    {
        $this->options[] = $options;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param SelectOption $selectedOption
     */
    public function setSelectedOption(SelectOption $selectedOption)
    {
        $this->selectedOption = $selectedOption;
    }

    /**
     * @return SelectOption
     */
    public function getSelectedOption()
    {
        return $this->selectedOption;
    }

    public function getType(){
        return InputTypes::SElECT;
    }






} 