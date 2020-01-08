<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * This file contains the core processing of the framework
 *
 * @package KISFramework
 * @subpackage system/core
 * @author Hugo Guerrier
 */

// ---------------------------------------------------------------------------------------------------------------------

// ----- STEP 1 : Load the core files and load the configuration

// ---------------------------------------------------------------------------------------------------------------------
require_once BASE_PATH . "system/core/common.php";

// Load the framework's configuration
load_config();

// ---------------------------------------------------------------------------------------------------------------------

// ----- STEP 2 : Process and determine the route to take

// ---------------------------------------------------------------------------------------------------------------------

// Create a request object
try {

    $request = new KISRequest();

} catch (KISBadMethodException $e) {

    echo "BAD_METHOD!";
    exit(1);

} catch (KISBadModeException $e) {

    echo "BAD_KIS_MODE!";
    exit(1);

}

// Test the request parsing
var_dump($request);