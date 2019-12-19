<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * Class KISRequest
 *
 * This object is the renderer that will show the special framework's template to help debugging
 *
 * @package KISFramework
 * @subpackage system/objects
 * @author Hugo Guerrier
 */

class KISSpecialRenderer {


    // ----- Object methods -----


    /**
     * Render an error from the framework
     *
     * @param $exception_object
     * @param string $error_title
     * @param bool $stop_exec
     */
    public static function render_error($exception_object, $error_title = "Unknown error", $stop_exec = false) {

        $error_object = $exception_object;

        include BASE_PATH . "system/templates/error.php";

        if($stop_exec) {
            exit(1);
        }

    }


}