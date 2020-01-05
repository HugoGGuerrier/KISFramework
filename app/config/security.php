<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * DON'T MOVE OR RENAME THIS FILE
 *
 * This file contains all the security features configuration, please read carefully documentation before using it :)
 * "With great power, comes great responsibility"
 */


// This array contains all the http methods the framework will accept.
// Reminder (don't thank me) : GET, POST, PUT, HEAD, DELETE, OPTIONS
$accepted_methods = array("GET", "POST");

// This array contains the accepted framework's mode (api and web)
$accepted_modes = array("web", "api");

// This array contains all encodings that the framework will accept (if the auto_sanitize is "on")
// This array is used by a mb_detect_encoding() function, please refer the php doc to see available encodings
$accepted_encodings = array("UTF-8");

// This boolean says if you want the framework to sanitize every input (Forms, request params, POST and GET...)
// This sanitization include XSS injection, charset verification
$auto_sanitize = TRUE;