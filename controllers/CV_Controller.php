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
        #TODO refactor controllers into a base class
        $template_engine = AppSingleton::sharedInstance()->template_engine;
        # load a view and send it off
        $template = $template_engine->loadTemplate('cv');

        $data = array('title' => "Curriculum Vitae of Ersin Buckley" );
        echo $template->render($data);
    }
} // END class
