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


    // --- Config attributes

    public static $WEB_RENDER = 1;

    public static $API_RENDER = 2;

    public static $FILE_RENDER = 3;

    public static $OFF_RENDER = 0;

    /**
     * This array contains all the render functions
     *
     * @var array
     */
    private static $render_vector = array("off", "render_web", "render_api", "render_file");

    /**
     * This string determine the render mode
     *
     * @var string
     */
    private static $render_mode = 1;

    /**
     * The response code to send to the client
     *
     * @var int
     */
    private static $response_code = 200;

    // --- Data to render

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

    /**
     * The array of all the data to render in the api
     *
     * @var array
     */
    private static $api_data = array();

    /**
     * The path to the file to render when using the file renderer
     *
     * @var string
     */
    private static $file_to_render = "";


    // ----- Object methods -----


    // --- Methods to add view to render

    /**
     * Add an error to render in the final render
     *
     * @param KISView $error_view The exception view to render
     */
    public static function add_error($error_view) {
        self::$errors[] = $error_view;
    }

    // --- The main method of the renderer

    /**
     * THIS is the final function to render what the user want and exit the framework
     *
     * @param int $exit_code The exit code of the framework
     */
    public static function render($exit_code = 0) {
        // Set the response code
        http_response_code(self::$response_code);

        // If the renderer is not off
        if(self::$render_mode !== self::$OFF_RENDER) {

            // Select the render function
            $render_func = isset(self::$render_vector[self::$render_mode]) ? self::$render_vector[self::$render_mode] : "";

            if($render_func === "") {
                echo "Error in render mode ! Please correct it...";
                exit(1);
            }

            // Render if there is no error
            if($exit_code === 0) {
                $render_func();
            }

            // Render if the exit code indicate an error
            else {
                // If the renderer is set on file, change it into web to display error correctly
                if($render_func === self::$render_vector[self::$FILE_RENDER]) {
                    $render_func = self::$render_vector[self::$WEB_RENDER];
                }

                // Render all infos
                foreach (self::$infos as $info) {
                    if($info instanceof KISView) {
                        ($render_func . "_view")($info);
                    }
                }

                // Render all warnings
                foreach (self::$warnings as $warning) {
                    if($warning instanceof KISView) {
                        ($render_func . "_view")($warning);
                    }
                }

                // Render all errors
                foreach (self::$errors as $error) {
                    if($error instanceof KISView) {
                        ($render_func . "_view")($error);
                    }
                }
            }

        }

        // Quit the php interpreter
        exit($exit_code);
    }

    // --- The web renderer

    private static function render_web() {

    }

    private static function render_web_view($view) {

    }

    // --- The api renderer

    private static function render_api() {

    }

    private static function render_api_view($view) {

    }

    // --- The file renderer

    private static function render_file($view) {

    }


}