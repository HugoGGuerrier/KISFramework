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
     *
     * @throws KISResourceException If a configuration file is missing
     */
    function load_config() {
        // ----- Security section

        // Test the security config file
        $security_config_file = BASE_PATH . "app/config/security.php";
        if(!is_readable($security_config_file)) {
            throw new KISResourceException("File not found : " . $security_config_file);
        }

        // Read the file
        require_once $security_config_file;

        // Config the security class
        if(isset($security_config)) {
            KISSecurity::init_from_config($security_config);
        } else {
            throw new KISResourceException("Security config file is incorrect");
        }

        // ----- Database configuration

        // Test the database config file
        $database_config_file = BASE_PATH . "app/config/database.php";
        if(!is_readable($database_config_file)) {
            throw new KISResourceException("File not found : " . $database_config_file);
        }

        // Read the file
        require_once $database_config_file;

        // Config the database
        if(isset($database_config)) {
            KISDatabaseConnection::init_from_config($database_config);
        } else {
            throw new KISResourceException("Database config file is incorrect");
        }
    }

}

// ---------------------------------------------------------------------------------------------------------------------

if (!function_exists("autoload")) {

    /**
     * This function load all the wanted files in the autoload config file
     *
     * @throws KISResourceException If the autoload file is missing
     */
    function autoload() {
        // Test the autoload file
        $autoload_file = BASE_PATH . "app/config/autoload.php";

        if(!is_readable($autoload_file)) {
            throw new KISResourceException("File not found : " . $autoload_file);
        }

        require_once $autoload_file;
    }

}

// ---------------------------------------------------------------------------------------------------------------------

if (!function_exists("check_file_system")) {

    function check_file_system() {
        // TODO : check all the framework file system (is_writable, is_readable, etc...)
    }

}