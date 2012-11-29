<?php
/**
 * Controller for the CV section of website
 *
 * @author Ersin Buckley
 * @version 0.1
 * @copyright Me, 28 November, 2012
 **/

require_once APP_LOCATION.'AppSingleton.php';

class CV_Controller
{
    public function __construct() {
    }
    public function respond ()
    {
        $template_engine = AppSingleton::sharedInstance()->template_engine;
        # load a view and send it off
        $template = $template_engine->loadTemplate('cv');

        $data = array('title' => "Curriculum Vitae of Ersin Buckley",
                'navitems' => array(
                    array('url'=>APP_URL_PREFIX, 'name'=>'Home'),
                    array('url'=>APP_URL_PREFIX.'/cv/', 'name'=>'CV', 'isactive'=>true),
                    array('url'=>"https://github.com/ebuckley/", 'name'=>'Github'),
                    array('url'=>"https://twitter.com/ersinbuckley", 'name'=>'@ersinbuckley'),
                )
        );
        echo $template->render($data);
    }
} // END class
