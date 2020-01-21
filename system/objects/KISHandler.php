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
     * Method to handle an error
     *
     * @param Exception $error_object The exception object of the error
     * @param string $error_title The error title
     * @param bool $error_mortal If the framework has to stop
     */
    public static function handle_error($error_object, $error_title = "Unnamed error", $error_mortal = FALSE) {
        // Get the errors params to display it
        $view_args = array(
            "title" => $error_title,
            "message" => $error_object->getMessage(),
            "file" => $error_object->getFile(),
            "line" => $error_object->getLine(),
            "trace" => $error_object->getTrace(),
            "mortal" => $error_mortal
        );

        // If the env is prod just render an internal server error (500)
        if(ENV === 0) {
            $error_view = new KISView("templates/error.php", $view_args);
        } else {
            $error_view = new KISView("errors/500.php", array());
            $error_mortal = TRUE;
        }

        // Add the view and render if mortal error
        KISRenderer::add_error($error_view);
        if($error_mortal) {
            KISRenderer::render(1);
        }
    }


}