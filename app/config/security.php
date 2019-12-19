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
$accepted_methods = array("", "POST");