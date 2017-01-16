<?php

namespace Wimm\Factories;

use Wimm\Models\GlobalOption,
    Wimm\DAO\GlobalOptions,
    Wimm\Exceptions\GlobalOptionNotFoundException;

class GlobalOptionsFactory
{

    /**
     *
     * @var array
     */
    private $globalOptionsArray = array();
    private $dao;

    public function __construct()
    {
        $this->dao = new GlobalOptions();
    }

    public function createGlobalOption($name, $value)
    {
        $this->globalOptionsArray[$name] = new GlobalOption($name, $value);
    }

    /**
     * 
     * @param string $name
     * @return GlobalOption
     * @throws GlobalOptionNotFoundException
     */
    public function getGlobalOption($name)
    {
        if (!array_key_exists($name, $this->globalOptionsArray))
        {
            if ($this->dao->get($name))
            {
                $raw = $this->dao->get($name);
                $model = new GlobalOption();
                $model->setName($name)->setValue($raw['value'])->setDescription($raw['description']);
                $this->globalOptionsArray[$name] = $model;
            } else
            {
                throw new GlobalOptionNotFoundException("GlobalOption Not Found in Database: " . $name);
            }
        }
        return $this->globalOptionsArray[$name];
    }

    public function saveAll()
    {
        foreach ($this->globalOptionsArray as $item)
        {
            $item->save();
        }
    }

    public function getAllOptions()
    {
        foreach (\wp_load_alloptions() as $key => $opt)
        {
            $option = get_option($key);
            if (is_array($option) && array_key_exists("value", $option) && array_key_exists("description", $option))
            {
                if (!array_key_exists($key, $this->globalOptionsArray))
                {
                    $item = new GlobalOption();
                    $item->setName($key)->setValue($option['value'])->setDescription($option['description']);
                    $this->globalOptionsArray[$key] = $item;
                }
            }
        }

        return $this->globalOptionsArray;
    }

    public function removeOption(GlobalOption $option)
    {
        unset($this->globalOptionsArray[$option->getName()]);
    }

}