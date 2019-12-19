<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * DON'T MOVE OR RENAME THIS FILE
 *
 * This file contains all the framework constants, you can modify or add ones.
 */

// Framework config
defined("ENV")                              OR define("ENV", 0); // 0 = dev | 1 or more = production

// Path definition
defined("COMMON_MODEL_PATH")                OR define("COMMON_MODEL_PATH", "app/models/");
defined("WEB_CONTROLLER_PATH")              OR define("WEB_CONTROLLER_PATH", "app/web/controllers/"); // The path to the web controllers
defined("API_CONTROLLER_PATH")              OR define("API_CONTROLLER_PATH", "app/api/controllers/"); // The path to the api controllers
defined("WEB_VIEW_PATH")                    OR define("WEB_VIEW_PATH", "app/web/views/"); // The path to the web views