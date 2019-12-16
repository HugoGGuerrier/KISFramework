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

// ----- STEP 1 : Process and determine the route to take

// ---------------------------------------------------------------------------------------------------------------------

// Create a request object
$request = new KISRequest();