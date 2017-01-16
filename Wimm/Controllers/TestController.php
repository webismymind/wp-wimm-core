<?php


namespace Wimm\Controllers;


use Wimm\Controllers\FrontController;

class TestController extends FrontController
{

       function defaultAction() {
           $this->getView()->addParam("toto","Ca marche");
       }

}