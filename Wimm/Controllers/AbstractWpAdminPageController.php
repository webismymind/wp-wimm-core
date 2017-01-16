<?php

namespace Wimm\Controllers;

use Wimm\Application,
    Wimm\Views\View,
    Wimm\Core\Request;

abstract class AbstractWpAdminPageController implements iController
{

    private $view;

    /**
     *
     * @var Request
     */
    protected $request;

    public function __construct($view)
    {
        $this->request = Application::$instance->getRequest();
        $this->setView($view);
        if (Application::$instance->getRequest()->getPost() && isset(Application::$instance->getRequest()->getPost()->action))
        {
            $action = Application::$instance->getRequest()->getPost()->action;
            $actionC = $action . "Action";

            $this->$actionC();
            $this->getView()->setAction($action);
        } else
        {
            $this->defaultAction();
        }
    }

    /**
     * 
     * @return View
     */
    public function getView()
    {
        return $this->view;
    }

    public function setView(View $v)
    {
        $this->view = $v;
        return $this;
    }

    public function defaultAction()
    {
        // TODO: Implement defaultAction() method.
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
    }


}
