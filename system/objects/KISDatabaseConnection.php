<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * Class KISDatabaseConnection
 *
 * This object contains the database pdo connection and can be used to execute sql query.
 *
 * @author Hugo Guerrier
 * @package KISFramework
 * @subpackage system/objects
 */
class KISDatabaseConnection {


    // ----- Object attributes -----


    /**
     * The pdo connection to the database
     *
     * @var PDO
     */
    private static $connection;

    /**
     * The database host
     *
     * @var string
     */
    private static $db_host = "";

    /**
     * The database port
     *
     * @var string
     */
    private static $db_port = "";

    /**
     * The database name
     *
     * @var string
     */
    private static $db_name = "";

    /**
     * The database user
     *
     * @var string
     */
    private static $db_user = "";

    /**
     * The database password
     *
     * @var string
     */
    private static $db_password = "";


    // ----- Object methods -----


    public static function connect() {
        // Load the database config
    }


}