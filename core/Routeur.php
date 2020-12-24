<?php


namespace Core;


class Routeur
{
    const CONTROLLERS = array(
        'home' => ['show'],
        'post' => ['show'],
        'client' => ['show']
    );

    private $controller;
    private $action;


    function __construct()
    {
        if (isset($_GET['controller'])) {
            $controller = $_GET['controller'];
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            } else {
                $action = 'show';
            }
        } else {
            $controller = 'home';
            $action = 'show';
        }

        if (array_key_exists($controller, self::CONTROLLERS)) {
            $this->controller = $controller;
            if (in_array($action, self::CONTROLLERS[$controller])) {
                $this->action = $action;
            } else {
                $this->action = self::CONTROLLERS[$controller][0];
            }
        } else {
            $this->controller = 'home';
            $this->action = 'show';
        }
    }

    function call()
    {
        switch ($this->controller) {
            case 'home':
                $controller = new \App\controllers\HomeController();
                break;
            case 'post':
                $controller = new \App\controllers\PostController();
                break;
            case 'client':
                $controller = new \App\controllers\ClientController();
                break;
        }

        $controller->{$this->action}();
    }
} 