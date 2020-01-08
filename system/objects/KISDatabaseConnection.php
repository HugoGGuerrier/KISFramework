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


    // ----- Getter -----


    /**
     * @return PDO
     */
    public static function get_db_connection() {
        return self::$connection;
    }

    /**
     * @return string
     */
    public static function get_db_host() {
        return self::$db_host;
    }

    /**
     * @return string
     */
    public static function get_db_port() {
        return self::$db_port;
    }

    /**
     * @return string
     */
    public static function get_db_name() {
        return self::$db_name;
    }

    /**
     * @return string
     */
    public static function get_db_user() {
        return self::$db_user;
    }

    /**
     * @return string
     */
    public static function get_db_password() {
        return self::$db_password;
    }


    // ----- Setter -----


    /**
     * Function to configure the database object with the configuration array
     *
     * @param array $config_array
     */
    public static function init_from_config($config_array) {
        // TODO
    }


    // ----- Object methods -----


    public static function connect() {
        // Load the database config
    }


}