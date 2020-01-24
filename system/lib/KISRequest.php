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
     * The request method
     *
     * @var string
     */
    private $method;

    /**
     * The application access mode (web | api)
     *
     * @var string
     */
    private $access_mode;

    /**
     * The request route
     *
     * @var array
     */
    private $route = array("controller" => "index", "method" => "index");

    /**
     * The request args for the framework
     *
     * @var array
     */
    private $framework_args = array();

    /**
     * The data of the request ($_GET and $_POST)
     *
     * @var array
     */
    private $data = array("GET" => array(), "POST" => array());


    // ----- Constructor -----


    /**
     * KISRequest constructor.
     * Construct an url from the current super globals and extract information about it.
     *
     * @throws KISBadMethodException If there is an error int the request parsing
     * @throws KISBadModeException If the request is in a bad mode
     * @throws KISBadEncodingException If the request contains a bad encoding string
     */
    public function __construct() {
        // ----- Get the request context (method and mode)

        // Get the request method
        $method = $_SERVER["REQUEST_METHOD"];
        if(in_array($method, KISSecurity::get_accepted_methods())) {
            $this->method = $method;
        } else {
            throw new KISBadMethodException("Unacceptable http method : " . $method);
        }

        // Verify the request uri
        $uri_raw = $_SERVER["PHP_SELF"];
        if(!KISSecurity::is_valid_encoding($uri_raw)) {
            throw new KISBadEncodingException("URI encoding exception : " . $uri_raw);
        }

        // Split the request uri and prepare it for parsing
        $split_uri_raw = explode("/", $uri_raw);
        $split_uri_clean = array();
        $index_key = array_search("index.php", $split_uri_raw);

        foreach ($split_uri_raw as $key => $uri_part) {
            if ($uri_part !== "" && $key > $index_key) {
                $split_uri_clean[] = $uri_part;
            }
        }

        // Get the access mode of the request (api or web) and prepare the array for routing
        $mode = "web";
        if($split_uri_clean[0] === "api") {
            $mode = "api";
            $split_uri_clean = array_splice($split_uri_clean, 1);
        }

        // Verify the access mode
        if(in_array($mode, KISSecurity::get_accepted_modes())) {
            $this->access_mode = $mode;
        } else {
            throw new KISBadModeException("Unacceptable mode request : " . $mode);
        }

        // ----- Get the framework's route and args and the request data

        // Get the controller
        if(isset($split_uri_clean[0])) {
            $this->route["controller"] = $split_uri_clean[0];
            $split_uri_clean = array_splice($split_uri_clean, 1);
        }

        // Get the method
        if(isset($split_uri_clean[0])) {
            $this->route["method"] = $split_uri_clean[0];
            $split_uri_clean = array_splice($split_uri_clean, 1);
        }

        // Get the framework's args
        $this->framework_args = $split_uri_clean;

        // Verify the GET and POST data before getting them
        foreach ($_GET as $arg) {
            if(!KISSecurity::is_valid_encoding($arg)) {
                throw new KISBadEncodingException("GET argument encoding exception : " . $arg);
            }
        }

        foreach ($_POST as $arg) {
            if(!KISSecurity::is_valid_encoding($arg)) {
                throw new KISBadEncodingException("POST argument encoding exception : " . $arg);
            }
        }

        // Get the GET and POST data
        $this->data["GET"] = $_GET;
        $this->data["POST"] = $_POST;
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

    public function get_data() {
        return $this->data;
    }


    // ----- No setter for the request, it's a final object -----


    // ----- Class methods -----


    /**
     * Get the GET param of the request
     *
     * @return array The GET params of the request
     */
    public function get_get() {
        return $this->data["GET"];
    }

    /**
     * Get the post array of the request
     *
     * @return array The POST array of the request
     */
    public function get_post() {
        return $this->data["POST"];
    }


}