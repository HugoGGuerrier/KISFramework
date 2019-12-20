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
    private $route = array("controller" => "index", "method" => "index");

    /**
     * The request args for the framework
     *
     * @var array
     */
    private $framework_args = array();

    /**
     * The data of the request ($_GET or $_POST)
     *
     * @var array
     */
    private $data = array();


    // ----- Constructors -----


    /**
     * KISRequest constructor.
     * Construct an url from the current super globals and extract information about it.
     *
     * @throws KISBadMethodException If there is an error int the request parsing
     */
    public function __construct() {
        // Get the request method
        $method = $_SERVER["REQUEST_METHOD"];
        if(in_array($method, KISConfig::get_accepted_methods())) {
            $this->method = $method;
        } else {
            throw new KISBadMethodException("Unacceptable http method : " . $method);
        }

        // Split the request uri and clean it
        $split_uri = explode("/", $_SERVER["PHP_SELF"]);
        foreach ($split_uri as $key => $uri_part) {
            if ($uri_part === "") {
                unset($split_uri[$key]);
            }
        }

        // Get the index of the index.php word
        $index_index = array_search("index.php", $split_uri);

        // Get the access mode of the request (api or web)
        if(isset($split_uri[$index_index + 1])) {
            if($split_uri[$index_index + 1] === "api") {
                $this->access_mode = "api";
            } else {
                $this->access_mode = "web";
            }
        }

        // Get the requested route
        if($this->access_mode === "web") {
            if(isset($split_uri[$index_index + 1])) {
                $this->route["controller"] = $split_uri[$index_index + 1];
                if(isset($split_uri[$index_index + 2])) {
                    $this->route["method"] = $split_uri[$index_index + 2];
                }
            }
        } else {
            if(isset($split_uri[$index_index + 2])) {
                $this->route["controller"] = $split_uri[$index_index + 2];
                if(isset($split_uri[$index_index + 3])) {
                    $this->route["method"] = $split_uri[$index_index + 3];
                }
            }
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