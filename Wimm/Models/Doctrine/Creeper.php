<?php
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
*/
class Creeper
{

/**
* @ORM\Id()
* @ORM\Column(type="integer")
* @ORM\GeneratedValue(strategy="AUTO")
* @var int
*/
private $id;

/**
* @ORM\Column(type="string", length=255)
* @var string
*/
private $content;

public function __construct($content) {
$this->setContent($content);
}

/**
* @return int
*/
public function getId() {
return $this->id;
}

/**
* @return string
*/
public function getContent() {
return $this->content;
}

/**
* @param string $content
*/
public function setContent($content) {
$this->content = (string) $content;
}

}