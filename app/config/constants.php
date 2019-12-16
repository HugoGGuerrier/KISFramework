<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * This file contains the framework configuration, you can't move or rename it but you can change a lot of things in it.
 *
 * @author Hugo Guerrier
 * @package KISFramework
 * @subpackage app/config
 */

// Framework config
defined("ENV")                              OR define("ENV", 0); // 0 = dev | 1 or more = production

// Path definition
defined("COMMON_MODEL_PATH")                OR define("COMMON_MODEL_PATH", "app/models/");
defined("WEB_CONTROLLER_PATH")              OR define("WEB_CONTROLLER_PATH", "app/web/controllers/"); // The path to the web controllers
defined("API_CONTROLLER_PATH")              OR define("API_CONTROLLER_PATH", "app/api/controllers/"); // The path to the api controllers
defined("WEB_VIEW_PATH")                    OR define("WEB_VIEW_PATH", "app/web/views/"); // The path to the web views