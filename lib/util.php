<?php
/**
 * Ersins utils
 * Contains misc functions i might find usefull
 * @author ErsinBuckley
 * @version 0.1
 * @copyright ErsinBuckley, 28 November, 2012
 **/

function debug()
{
    # parameters is obj, message
    $args = array();
    $msg = "";
    $obj = "";
    for ($i = 0; $i < func_num_args(); $i++) {
        $args[] = func_get_arg($i);
    }
    if (count($args) == 1){
        $obj = $args[0];
    }
    else if (count($args) == 2){
        $obj = $args[0];
        $msg= $args[1] ;
    }
    echo "<div id = \"error\" > <p>".$msg."</p><pre>";
    print_r($obj);
    echo "</pre></div>";
}
