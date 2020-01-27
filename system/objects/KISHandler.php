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
     * @param Exception $exception The exception object of the error
     * @param string $exception_title The error title
     * @param bool $exception_mortal If the framework has to stop
     */
    public static function handle_exception($exception, $exception_title = "Unnamed error", $exception_mortal = FALSE) {
        // Get the errors params to display it
        $view_args = array(
            "title" => $exception_title,
            "message" => $exception->getMessage(),
            "file" => $exception->getFile(),
            "line" => $exception->getLine(),
            "trace" => $exception->getTrace(),
            "mortal" => $exception_mortal
        );

        // If the env is prod just render an internal server error (500)
        if(ENV === 0) {

            try {
                $error_view = new KISView("templates/error", $view_args);
            } catch (KISResourceException $e) {
                http_response_code(500);
                echo "Missing app/web/views/templates/error.php file !";
                exit(1);
            }

        } else {

            try {
                $error_view = new KISView("errors/500");
                KISRenderer::set_response_code(500);
            } catch (KISResourceException $e) {
                http_response_code(500);
                echo "<title>500 - Internal server error</title>";
                echo "Internal server error !";
                exit(1);
            }
            $exception_mortal = TRUE;

        }

        // Add the view and render if mortal error
        KISRenderer::add_error($error_view);
        if($exception_mortal) {
            KISRenderer::set_response_code(500);
            KISRenderer::render(1);
        }
    }


}