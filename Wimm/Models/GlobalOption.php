<?php

namespace Wimm\Models;

use Wimm\DAO\GlobalOptions,
    Wimm\Application;

class GlobalOption
{

    private $name;
    private $value;
    private $description;

    /**
     *
     * @var GlobalOptions
     */
    private static $dao;

    function __construct()
    {
        if (!isset(self::$dao))
        {
            self::$dao = new GlobalOptions();
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function save()
    {
        self::$dao->save($this);
    }

    public function delete()
    {
        self::$dao->delete($this);
        Application::$instance->getGlobalOptionsFactory()->removeOption($this);
    }

}
