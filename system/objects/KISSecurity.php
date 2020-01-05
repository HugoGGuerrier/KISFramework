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

    /**
     * If the framework has to sanitize all inputs
     *
     * @var bool
     */
    private static $auto_sanitize;


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

    /**
     * @return bool
     */
    public static function is_auto_sanitize() {
        return self::$auto_sanitize;
    }


    // ----- Setter -----


    /**
     * @param array $accepted_methods The array of the accepted methods
     */
    public static function set_accepted_methods($accepted_methods) {
        self::$accepted_methods = $accepted_methods;
    }

    /**
     * @param array $accepted_modes The array of the accepted modes
     */
    public static function set_accepted_modes($accepted_modes) {
        self::$accepted_modes = $accepted_modes;
    }

    /**
     * @param array $accepted_encodings The array of the accepted encodings
     */
    public static function set_accepted_encodings($accepted_encodings) {
        self::$accepted_encodings = $accepted_encodings;
    }

    /**
     * @param bool $auto_sanitize A boolean to auto sanitize or not
     */
    public static function set_auto_sanitize($auto_sanitize) {
        self::$auto_sanitize = $auto_sanitize;
    }


    // ----- Objects methods -----


    public static function full_clean($string_to_clean) {

    }

    public static function xss_clean($string_to_clean) {

    }

    public static function sql_clean($string_to_clean) {

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


    // ----- String verifying methods -----


    public static function is_valid_mail($string_to_verify) {

    }

    public static function is_valid_phone($string_to_verify) {

    }


}