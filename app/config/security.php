<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * DON'T MOVE OR RENAME THIS FILE
 *
 * This file contains all the security features configuration, please read carefully documentation before using it :)
 * "With great power, comes great responsibility"
 */


// This array contains all the security configuration of the framework.
// You can change all of it BUT be careful of your app security.
$security_config = array(

    // This array contains all the http methods the framework will accept.
    // Reminder (don't thank me) : GET, POST, PUT, HEAD, DELETE, OPTIONS, CONNECT, TRACE, PATCH
    "accepted_methods" => array("GET", "POST"),

    // This array contains the accepted framework's mode (api and web)
    "accepted_modes" => array("web", "api"),

    // This array contains all encodings that the framework will accept
    // This array is used by a mb_detect_encoding() function, please refer the php doc to see available encodings
    "accepted_encodings" => array("UTF-8"),

);


