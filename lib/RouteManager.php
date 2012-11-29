<?php
/**
 * RouteManager, a singleton that is used for dispatching requests
 *
 * @author Ersin Buckley
 * @version 0.1
 * @copyright Ersin Buckley, 28 November, 2012
 **/

class RouteManager
{
    private $routes = array();
    private static $router = Null;

    /**
     * If router cant dispatch a specific controller then error controller will be used for response
     * @var Controller
     **/
    var $error_controller = null;

    // how we access the singleton
    static public function sharedRouter()
    {
        if (self::$router === Null) {
            self::$router = new RouteManager();
        }
        return self::$router;
    }

    /**
     * Add a route to the routemanager, this will be a route that is checked when dispatching a controller
     * @return void
     * @author Ersin Buckley
     **/
    public function addRoute($target, $controller)
    {
        if (isset($target) && isset($controller)) {
            $this->routes[$target] = $controller;
        }
    }

    /**
     * Dispatch the controller for the current route
     *
     * @return Controller object
     * @author Ersin Buckley
     **/
    public function dispatch() {

        #clean the uri so we can get to the good part
        $request_string = $_SERVER["REQUEST_URI"];

        $delta = strlen(APP_URL_PREFIX);
        $request_string = substr($request_string, $delta);

        if (isset($this->routes[$request_string])) {
            return new $this->routes[$request_string]();
        }
        # if we cant dispatch another controller then dispatch the error_controller
        return $this->error_controller;
    }

}
