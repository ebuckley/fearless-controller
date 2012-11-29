<?php
/**
 * This controller displays a simple messageThis controller displays a simple message
 *
 * @author Ersin Buckley
 * @version 0.1
 * @copyright Ersin Buckley, 28 November, 2012
 **/
class SimpleMessageController
{
    var $themessage;

    public function __construct( $msg )
    {
        if (isset($msg)) {
            $this->themessage = $msg;
        } else {
            die('cant respond with Simple Messagecontroller because no message was set');
        }
    }

    /**
     * Respond with the simple message passed to this controller
     *
     * @return void
     * @author Ersin Buckley
     **/
    public function respond ()
    {
        echo $this->themessage;
    }
} // END class SimpleMessageController.phpclass
