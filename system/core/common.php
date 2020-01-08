<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * This file contains all common functions for the framework's system
 *
 * @package KISFramework
 * @subpackage system/core
 * @author Hugo Guerrier
 */

// ---------------------------------------------------------------------------------------------------------------------

if (!function_exists("load_config")) {

    /**
     * Function to load the framework's config and place it in the wanted objects and classes
     */
    function load_config() {
        // ----- Security section
        require_once BASE_PATH . "app/config/security.php";
        if(isset($security_config)) {
            KISSecurity::init_from_config($security_config);
        } else {
            $exception = new Exception("The KIS security config file is missing !");
            KISHandler::handle_php_error($exception, "Configuration error", TRUE);
        }
    }

}