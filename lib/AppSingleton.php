<?php
/**
 * This singleton holds references to utillities that are usefull for the controllers to
 *
 * @author Ersin Buckley
 * @version 0.1
 * @copyright Ersin Buckley, 28 November, 2012
 **/

class AppSingleton
{
    #singleton instance
    private static $_sharedInstance;
    public $template_engine;


    public static function sharedInstance()
    {
        if (!isset(self::$_sharedInstance)) {
            self::$_sharedInstance = new AppSingleton;
        }
        return self::$_sharedInstance;
    }
}
