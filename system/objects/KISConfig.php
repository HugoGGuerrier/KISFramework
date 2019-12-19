<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * Class KISConfig
 *
 * This object contains the framework configuration define in the app/config folder
 *
 * @author Hugo Guerrier
 * @package KISFramework
 * @subpackage system/objects
 */
class KISConfig {


    // ----- Object Attributes -----


    // Todo : create the needed attributes


    // ----- Object methods -----


    public static function load_config() {
        // Load the constants file
        require_once "app/config/constants.php";
    }

}