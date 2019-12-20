<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * Class KISRequest
 *
 * This object is the main renderer for the framework that will handle all types of general render
 *
 * @package KISFramework
 * @subpackage system/objects
 * @author Hugo Guerrier
 */
class KISRenderer {


    // ----- Attributes -----


    /**
     * This array contains all errors to display
     *
     * @var array
     */
    private static $errors = array();

    /**
     * This array contains all the warning to display
     *
     * @var array
     */
    private static $warnings = array();

    /**
     * This array contains all the info to display
     *
     * @var array
     */
    private static $infos = array();


    // ----- Object methods -----


    /**
     * Add an error to render in the final render
     *
     * @param Exception $exception_object The exception object
     * @param string $error_title The error title
     */
    public static function add_error($exception_object, $error_title = "Unnamed Error") {

    }


}