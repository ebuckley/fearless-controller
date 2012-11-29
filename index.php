<?php
/**
 * Front Controller for ersinbuckley.com
 *
 * @author Ersin Buckley
 * @version 0.1
 * @copyright Ersin Buckley, 28 November, 2012
 **/

#config variables
#path to the mustache library
define('MUSTACHE_LOCATION', 'Mustache/');

# location of the app library files
define('APP_LOCATION', 'lib/');

# location of the controllers
define('CONTROLLER_LOCATION', 'controllers/');

#path to the app, include the slash at beginning of the path but not at the end
define('APP_URL_PREFIX', '/ersin');


#report all errors
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);


#includes
#TODO make factory for importing these files
require APP_LOCATION.'util.php';
require APP_LOCATION.'RouteManager.php';
require APP_LOCATION.'Controller.php';
require APP_LOCATION.'AppSingleton.php';

require MUSTACHE_LOCATION.'Autoloader.php';

require CONTROLLER_LOCATION.'Index_Controller.php';
require CONTROLLER_LOCATION.'CV_Controller.php';
require CONTROLLER_LOCATION.'SimpleMessageController.php';

Mustache_Autoloader::register();

$app = AppSingleton::sharedInstance();
$app->template_engine = new Mustache_Engine(array(
        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/views'),
        'partials_loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/views/partials')
    ));


# route the request
$router = RouteManager::sharedRouter();
$router->error_controller = new SimpleMessageController("404, quickly  <a href='https://github.com/ebuckley/fearless-controller'>fix this</a> before someone notices! ");
$router->addRoute('/', 'Index_Controller');
$router->addRoute('/cv/', 'CV_Controller');

# get the appropriate controller to respond
$controller = $router->dispatch();
$controller->respond();





