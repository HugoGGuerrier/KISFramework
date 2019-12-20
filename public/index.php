<?php

/**
 * ---------------------------------------------------------------------------------------------------------------------
 * Keep It Simple Framework : a simple web application framework
 * ---------------------------------------------------------------------------------------------------------------------
 *
 * This is a web app framework with back-end and front-end functions to simplify and optimise web app dev.
 * This is the enter point of tha application and the file that will launch all framework's processes.
 *
 * PLEASE DON'T TOUCH THIS FILE AND USE THE CONFIG FOLDER (app/config) INSTEAD !
 *
 * @author Hugo Guerrier
 * @version 0.1a 2019
 */

// ----- Define the ENTER_POINT var to make the framework know you're at the good enter point
define("ENTER_POINT", true);

// ----- Define the absolute base path of the framework root
$root_path = explode("/", __DIR__);
unset($root_path[count($root_path) - 1]);
$root_path = join("/", $root_path);
define("BASE_PATH", $root_path . "/");

// ----- Import the framework constants
require_once BASE_PATH . "app/config/constants.php";

// ----- Including all objects of the system
$libs_to_include = preg_grep("#^(KIS).+\.php$#", scandir( BASE_PATH . "system/objects/"));
foreach ($libs_to_include as $lib) {
    require_once BASE_PATH . "system/objects/" . $lib;
}

// ----- Including all lib of the system
$libs_to_include = preg_grep("#^(KIS).+\.php$#", scandir(BASE_PATH . "system/lib/"));
foreach ($libs_to_include as $lib) {
    require_once BASE_PATH . "system/lib/" . $lib;
}

// ----- Including all custom exceptions
$libs_to_include = preg_grep("#^(KIS).+\.php$#", scandir( BASE_PATH . "system/lib/exceptions/"));
foreach ($libs_to_include as $lib) {
    require_once BASE_PATH . "system/lib/exceptions/" . $lib;
}

// ----- Load the framework configuration
KISConfig::load_config();

// ----- Launching the framework's core
require_once BASE_PATH . "system/core/core.php";
