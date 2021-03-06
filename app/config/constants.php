<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * DON'T MOVE OR RENAME THIS FILE
 *
 * This file contains all the framework constants, you can modify th existing or add ones to configure your application.
 */

// Framework config
defined("ENV")                               OR define("ENV", 0); // 0 = dev | 1 or more = production
defined("LOG_FORMAT")                        OR define("LOG_FORMAT", "%Y/%m/%d - %H:%i:%s :m"); // The log format, to configure it please refer to documentation

// Path definition
defined("COMMON_MODELS_PATH")                OR define("COMMON_MODELS_PATH", BASE_PATH . "app/models/"); // The path to the models
defined("COMMON_LOG_PATH")                   OR define("COMMON_LOG_PATH", BASE_PATH . "app/log/"); // The path to the log folder

defined("API_CONTROLLERS_PATH")              OR define("API_CONTROLLERS_PATH", BASE_PATH . "app/api/controllers/"); // The path to the api controllers

defined("WEB_CONTROLLERS_PATH")              OR define("WEB_CONTROLLERS_PATH", BASE_PATH . "app/web/controllers/"); // The path to the web controllers
defined("WEB_VIEWS_PATH")                    OR define("WEB_VIEWS_PATH", BASE_PATH . "app/web/views/"); // The path to the web views
