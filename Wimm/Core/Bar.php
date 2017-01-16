<?php

namespace Wimm\Core;

/**
 * Represents a WP Sidebar
 */
class Bar {
    
    protected $name;
    protected $id;
    protected $beforeWidget;
    protected $afterWidget;
    protected $beforeTitle;
    protected $afterTitle;
    
    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }

    public function getBeforeWidget() {
        return $this->beforeWidget;
    }

    public function getAfterWidget() {
        return $this->afterWidget;
    }

    public function getBeforeTitle() {
        return $this->beforeTitle;
    }

    public function getAfterTitle() {
        return $this->afterTitle;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setBeforeWidget($beforeWidget) {
        $this->beforeWidget = $beforeWidget;
        return $this;
    }

    public function setAfterWidget($afterWidget) {
        $this->afterWidget = $afterWidget;
        return $this;
    }

    public function setBeforeTitle($beforeTitle) {
        $this->beforeTitle = $beforeTitle;
        return $this;
    }

    public function setAfterTitle($afterTitle) {
        $this->afterTitle = $afterTitle;
        return $this;
    }


}