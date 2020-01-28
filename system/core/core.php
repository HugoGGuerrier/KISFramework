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

// ----- STEP 1 : Load the core files, load the configuration and make auto action

// ---------------------------------------------------------------------------------------------------------------------
require_once BASE_PATH . "system/core/common.php";

// Load the framework's configuration
try {
    load_config();
} catch (KISResourceException $e) {
    KISHandler::handle_exception($e, "Configuration error", TRUE);
}

// Auto load
try {
    autoload();
} catch (KISResourceException $e) {
    KISHandler::handle_exception($e, "Autoload file is missing", FALSE);
}

// Connect to the database if the auto_connect is on
if(KISDatabaseConnection::get_auto_connect()) {
    KISDatabaseConnection::connect();
}

// ---------------------------------------------------------------------------------------------------------------------

// ----- STEP 2 : Process and determine the route to take

// ---------------------------------------------------------------------------------------------------------------------

// Create a request object

try {

    $request = new KISRequest();
    KISFramework::set_request($request);

} catch (KISBadMethodException $e) {

    KISHandler::handle_exception($e, "Bad HTTP method", TRUE);

} catch (KISBadModeException $e) {

    KISHandler::handle_exception($e, "Bad access mode", TRUE);

} catch (KISBadEncodingException $e) {

    KISHandler::handle_exception($e, "Bad encoding", TRUE);

}

echo "core ended correctly !";
exit(0);