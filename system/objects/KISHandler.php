<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * Class KISHandler
 *
 * This object handle all special framework's event (error, warning, info, etc...)
 */
class KISHandler {


    // ----- Object methods -----


    /**
     * This method handle all error and render the correct result
     *
     * @param Exception $exception_object The exception object
     * @param string $error_title The error title
     * @param bool $stop_exec If the framework has to stop
     */
    public static function handle_php_error($exception_object, $error_title = "Unnamed error", $stop_exec = FALSE) {
        // TODO
    }

    /**
     * This method handle an http error with its code and render the template
     *
     * @param string $error_code
     */
    public static function handle_http_error($error_code) {
        include BASE_PATH . "app/web/views/errors/" . $error_code . ".php";
        exit(1);
    }


}