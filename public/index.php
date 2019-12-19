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

// ----- Importing the framework config
require_once "app/config/constants.php";

// ------ Including all objects of the system
$libs_to_include = preg_grep("#^(KIS).+\.php$#", scandir("system/objects/"));
foreach ($libs_to_include as $lib) {
    require_once "system/objects/" . $lib;
}

// ------ Including all lib of the system
$libs_to_include = preg_grep("#^(KIS).+\.php$#", scandir("system/lib/"));
foreach ($libs_to_include as $lib) {
    require_once "system/lib/" . $lib;
}

// ----- Launching the framework's core
require_once "system/core/core.php";
