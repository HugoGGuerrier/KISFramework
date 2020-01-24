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

            // Render if there is no error
            if($exit_code === 0) {
                // Select the render function
                $render_func = isset(self::$render_vector[self::$render_mode]) ? self::$render_vector[self::$render_mode] : "";

                if($render_func === "" OR $render_func === "off") {
                    echo "Error in render mode ! Please correct it...";
                    exit(1);
                }

                // Render the website
                $render_func();

            }

            // Render if the exit code indicate an error
            else {

                // Chose the error render mode for now there are only two error render mode json and web
                switch (self::$render_mode) {

                    case (self::$WEB_RENDER):
                    case (self::$FILE_RENDER):

                        // Render errors
                        foreach (self::$errors as $error) {
                            if ($error instanceof KISView) {
                                $error->render();
                            }
                        }

                        // Render warnings
                        foreach (self::$warnings as $warning) {
                            if ($warning instanceof KISView) {
                                $warning->render();
                            }
                        }

                        // Render infos
                        foreach (self::$infos as $info) {
                            if ($info instanceof KISView) {
                                $info->render();
                            }
                        }

                        break;

                    case (self::$API_RENDER):

                        // Add errors to api result
                        foreach (self::$errors as $error) {
                            if ($error instanceof KISView) {
                                $error_params = $error->get_view_params();

                                self::$api_data[] = array(
                                    "error_title" => $error_params["title"],
                                    "error_message" => $error_params["message"],
                                    "error_file" => $error_params["file"],
                                    "error_line" => $error_params["line"],
                                    "error_trace" => $error_params["trace"],
                                    "is_error_mortal" => $error_params["mortal"]
                                );
                            }
                        }

                        // Add warnings to api result
                        foreach (self::$warnings as $warning) {
                            if ($warning instanceof KISView) {

                                // TODO : Define warning structure and make the api render

                            }
                        }

                        // Add infos to api result
                        foreach (self::$infos as $info) {
                            if ($info instanceof KISView) {

                                // TODO : Define info structure and make the api render

                            }
                        }

                        // Render the api result
                        self::render_api();

                        break;

                    default:
                        break;

                }

            }

        }

        // Quit the php interpreter
        exit($exit_code);
    }

    // --- The web renderer

    private static function render_web() {

    }

    // --- The api renderer

    private static function render_api() {

    }

    // --- The file renderer

    private static function render_file($view) {

    }


}