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
     * The data of the request ($_GET or $_POST)
     *
     * @var array
     */
    private $data = array();


    // ----- Constructor -----


    /**
     * KISRequest constructor.
     * Construct an url from the current super globals and extract information about it.
     *
     * @throws KISBadMethodException If there is an error int the request parsing
     * @throws KISBadModeException If the request is in a bad mode
     */
    public function __construct() {
        // Get the request method
        $method = $_SERVER["REQUEST_METHOD"];
        if(in_array($method, KISSecurity::get_accepted_methods())) {
            $this->method = $method;
        } else {
            throw new KISBadMethodException("Unacceptable http method : " . $method);
        }

        // Split the request uri and prepare it for parsing
        $split_uri_raw = explode("/", $_SERVER["PHP_SELF"]);
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

        var_dump(KISSecurity::is_valid_encoding($split_uri_clean[0]));

        // Verify the access mode
        if(in_array($this->access_mode, KISSecurity::get_accepted_modes())) {
            $this->access_mode = $mode;
        } else {
            throw new KISBadModeException("Unacceptable mode request : " . $mode);
        }

        // Get the framework's route and args


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