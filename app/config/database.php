<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * DON'T MOVE OR RENAME THIS FILE
 *
 * This file contains the PDO configuration for the database connection
 * You need to edit it to use database.
 */

$database_config = array(

    "auto_connect" => FALSE,

    "dsn" => "mysql:host=localhost;port=3306;dbname=kis_test",

    "user" => "kis_user",

    "password" => "kis_password",

    "options" => array()

);