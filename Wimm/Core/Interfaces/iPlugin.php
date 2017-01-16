<?php

namespace Wimm\Core\Interfaces;

interface iPlugin {
    
    public function onLoad();
    public function onRun();
    
}