<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * Class KISSecurity
 *
 * This object contains all security methods and config of the framework
 *
 * @package KISFramework
 * @subpackage system/objects
 * @author Hugo Guerrier
 */
class KISSecurity {


    // ----- Object attributes -----


    /**
     * The list of the http method that the app will accept
     *
     * @var array
     */
    private static $accepted_methods = array();

    /**
     * The list of the framework accepted modes
     *
     * @var array
     */
    private static $accepted_modes = array();

    /**
     * The list of the accepted encodings
     *
     * @var array
     */
    private static $accepted_encodings = array();


    // ----- Getter -----


    /**
     * @return array
     */
    public static function get_accepted_methods() {
        return self::$accepted_methods;
    }

    /**
     * @return array
     */
    public static function get_accepted_modes() {
        return self::$accepted_modes;
    }

    /**
     * @return array
     */
    public static function get_accepted_encodings() {
        return self::$accepted_encodings;
    }


    // ----- Setter -----


    /**
     * Configure the security object with the configuration array
     *
     * @param array $config_array The configuration array
     */
    public static function init_from_config($config_array) {
        // Accepted methods
        if(isset($config_array["accepted_methods"])) {
            self::$accepted_methods = $config_array["accepted_methods"];
        }

        // Accepted modes
        if(isset($config_array["accepted_modes"])) {
            self::$accepted_modes = $config_array["accepted_modes"];
        }

        // Accepted encodings
        if(isset($config_array["accepted_encodings"])) {
            self::$accepted_encodings = $config_array["accepted_encodings"];
        }
    }


    // ----- Objects methods -----
    

    public static function xss_clean($string_to_clean) {
        $res = htmlspecialchars($string_to_clean);
        $res = trim($res);
        $res = stripslashes($res);

        return $res;
    }

    /**
     * Return a boolean to say if the string is in an accepted encoding
     *
     * @param string $string_to_verify The string to verify
     * @return bool If the string is valid
     */
    public static function is_valid_encoding($string_to_verify) {
        $res = mb_detect_encoding($string_to_verify, self::$accepted_encodings, TRUE);
        return $res !== FALSE;
    }

    public static function put_csrf_token() {

    }

    public static function remove_csrf_token() {

    }

    public static function is_csrf_token_valid() {

    }


}