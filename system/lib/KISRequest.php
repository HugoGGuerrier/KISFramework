<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * Class KISRequest
 *
 * This is a class to model a url request with all wanted parameters for the framework's job.
 *
 * @package KISFramework
 * @subpackage system/lib
 * @author Hugo Guerrier
 */

class KISRequest {


    // ----- Attributes -----


    /**
     * The request method (GET | POST | PUT | HEAD | DELETE)
     *
     * @var string
     */
    private $method;

    /**
     * The application access mode (web | api)
     *
     * @var string
     */
    private $access_mode = "web";

    /**
     * The request route
     *
     * @var array
     */
    private $route = array();

    /**
     * The request args for the framework
     *
     * @var array
     */
    private $framework_args = array();


    // ----- Constructors -----


    /**
     * KISRequest constructor with an url to extract information about it
     *
     * @throws Exception If there is an error int the request parsing
     */
    public function __construct() {
        // Get the request method
        $method = $_SERVER["REQUEST_METHOD"];
        if(in_array($method, KISConfig::get_accepted_methods())) {
            $this->method = $method;
        } else {
            throw new Exception("Unacceptable http method : " . $method);
        }
    }


    // ----- Getter -----


    public function get_method() {
        return $this->method;
    }

    public function get_access_mode() {
        return $this->access_mode;
    }

    public function get_route() {
        return $this->route;
    }

    public function get_framework_args() {
        return $this->framework_args;
    }


}