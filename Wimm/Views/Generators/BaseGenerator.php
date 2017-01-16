<?php
namespace Wimm\Views\Generators;

abstract class BaseGenerator
{
    protected $parameters;
    
    public function __construct(array $a)
    {
        $this->parameters = $a;
    }
}