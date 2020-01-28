<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * Class KISView
 *
 * This class model a view to render with its params
 *
 * @package KISFramework
 * @subpackage system/lib
 * @author Hugo Guerrier
 */
class KISView {


    // ----- Attributes -----


    /**
     * The file of the wanted view
     *
     * @var string
     */
    private $view_file = "";

    /**
     * An array with all the param to render the view
     *
     * @var array
     */
    private $view_params = array();


    // ----- Constructors -----


    /**
     * Construct a new view with its file and its param
     *
     * @param string $view_file The name of the view file
     * @param array $view_params The param to render the view file with
     * @throws KISResourceException if the view file doesn't exists
     */
    public function __construct($view_file, $view_params = array()) {
        // Get the view file and test it
        $this->view_file = BASE_PATH . "app/web/views/" . $view_file . ".php";
        if (!is_readable($this->view_file)) {
            throw new KISResourceException("File not found : " . $this->view_file);
        }

        // Get the view params
        $this->view_params = $view_params;
    }


    // ----- Getter -----


    public function get_view_file() {
        return $this->view_file;
    }

    public function get_view_params() {
        return $this->view_params;
    }


    // ----- Setter -----


    public function set_view_file($view_file) {
        $this->view_file = $view_file;
    }

    public function set_view_params($view_pararms) {
        $this->view_params = $view_pararms;
    }


    // ----- Class methods -----


    /**
     * Render the view with its arguments
     */
    public function render() {
        // Create all view variables
        foreach ($this->view_params as $name => $param) {
            $$name = $param;
        }

        // Include the view file
        include $this->view_file;
    }


}