<?php

/**
 * Controller for the index of ersinbuckley
 *
 * @author Ersin Buckley
 * @version 0.1
 * @copyright Me, 28 November, 2012
*
 **/
class Index_Controller {
    public function respond ()
    {
        $template_engine = AppSingleton::sharedInstance()->template_engine;
        # load a view and send it off
        $template = $template_engine->loadTemplate('index');

        #TODO make a navigation manager so i dont end up copying the navitems into the template data all the time
        $data = array('title' => "Ersin Buckley's personal web app",
            'navitems' => array(
                array('url'=>APP_URL_PREFIX, 'name'=>'Home', 'isactive'=>True),
                array('url'=>APP_URL_PREFIX.'/cv/', 'name'=>'CV'),
                array('url'=>"https://github.com/ebuckley/", 'name'=>'Github'),
                array('url'=>"https://twitter.com/ersinbuckley", 'name'=>'@ersinbuckley'),
            ),
        );
        echo $template->render($data);
    }
} // END class Index_Controllerclass
