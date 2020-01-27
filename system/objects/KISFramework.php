<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * Class KISFramework
 *
 * This object contains all the framework objects and allow the user to access its with just one object.
 * This is the main class for the user
 *
 * @package KISFramework
 * @subpackage system/objects
 * @author Hugo Guerrier
 */
class KISFramework {


    // ----- Attributes -----


    /**
     * The parsed and verified request
     *
     * @var KISRequest
     */
    private static $request;


    // ----- Getter -----


    public function get_request() {
        return self::$request;
    }


    // ----- Setter -----


    public function set_request($request) {
        if($request instanceof KISRequest) {
            self::$request = $request;
        }
    }


}