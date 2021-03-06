<?php
/**
 * Created by PhpStorm.
 * User: alexg
 * Date: 06.05.2018
 * Time: 14:20
 */

namespace core;
class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct($uri, $method = 'GET')
    {
        $arr = require 'config/routes.php';

        foreach ($arr as $k => $v) {
            $this->add($k, $v);
        }
    }

    public function getParams()
    {
        return $this->params;
    }

    public function add($route, $param)
    {
        $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $param;
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        if (is_numeric($match)) {
                            $match = (int) $match;
                        }
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {
            $path = 'Controllers\\' . ucfirst($this->params['controller'] . 'Controller');
            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);

        }
    }


}