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

        // Set the accepted methods
        if(isset($accepted_methods)) {
            KISSecurity::set_accepted_methods($accepted_methods);
        }

        // Set the accepted modes
        if(isset($accepted_modes)) {
            KISSecurity::set_accepted_modes($accepted_modes);
        }

        // Set the accepted encodings
        if(isset($accepted_encodings)) {
            KISSecurity::set_accepted_encodings($accepted_encodings);
        }

        // Set the auto sanitize or not
        if(isset($auto_sanitize)) {
            KISSecurity::set_auto_sanitize($auto_sanitize);
        }
    }

}