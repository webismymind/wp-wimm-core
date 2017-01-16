<?php

namespace Ltheme\Main\Factories;

use Wimm\Forms\Form,
    Wimm\Forms\Input,
    Wimm\Forms\InputSubmit,
    Wimm\InputColorpicker,
    Wimm\Forms\InputTextarea,
    Wimm\Forms\InputTypes,
    Wimm\Forms\InputText;


class FormFactory
{

    public function startForm(Form $f)
    {
        $action = $f->getAction() ? "action='" . $f->getAction() . "'" : null;
        $method = $f->getMethod() ? "method='" . $f->getMethod() . "'" : null;
        $id = $f->getId() ? "id='" . $f->getId() . "'" : null;

        $classes = count($f->getClasses()) != 0 ? "class='" : null;
        foreach ($f->getClasses() as $class)
        {
            $classes .= $class . " ";
        }
        $classes .= count($f->getClasses()) != 0 ? "'" : null;
        echo "<form " . $action . " " . $method . " " . $classes . " " . $id . ">";
    }

    public function getLabelInput(Form $f, $name)
    {
        $i = $f->getInputByName($name);
        echo "<label for='" . $i->getName() . "'>" . $i->getLabel() . "</label>";
    }

    public function getInput(Form $f, $name)
    {
        $i = $f->getInputByName($name);

        if ($i->getType() == InputTypes::TEXT)
        {
            echo "<input type='text' placeholder='" . $i->getPlaceholder() . "' name='" . $i->getName() . "' value='" . $i->getValue() . "' class='" . $i->getClasses() . "' id='" . $i->getId() . "' />";
        } elseif ($i->getType() == InputTypes::SUBMIT)
        {
            echo "<input type='submit' value='" . $i->getValue() . "' class='" . $i->getClasses() . "' />";
        } elseif ($i->getType() == InputTypes::TEXTAREA)
        {
            echo "<textarea name='" . $i->getName() . "' class='" . $i->getClasses() . "' rows='" . $i->getRows() . "' cols='" . $i->getCols() . "' />" . $i->getValue() . "</textarea>";
        } elseif ($i->getType() == InputTypes::SElECT) {
            echo "<select name='".$i->getName()."' class='".$i->getClasses()."'>";
            foreach ($i->getOptions() as $option)
            {
                $selected = $i->getValue() == $option->getValue() ? "selected" : null;
                echo "<option value='$option->getValue()' $selected>$option->getContent()</option>";
            }
            echo "</select>";


        }

    }

    public function endForm()
    {
        echo '</form>';
    }

}