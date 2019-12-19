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


    /**
     * The array that define the accepted methods
     *
     * @var array
     */
    private static $accepted_methods = array();


    // ----- Getter -----


    public static function get_accepted_methods() {
        return self::$accepted_methods;
    }


    // ----- Object methods -----


    public static function load_config() {
        // ----- Load the security config
        require_once BASE_PATH . "app/config/security.php";

        // Set the accepted methods
        if(isset($accepted_methods) AND $accepted_methods !== array()) {
            self::$accepted_methods = $accepted_methods;
        }

    }


}