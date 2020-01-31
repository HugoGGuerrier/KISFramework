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
     * If the database has to connect automatically
     *
     * @var bool
     */
    private static $auto_connect = FALSE;

    /**
     * The DSN for the pdo object
     *
     * @var string
     */
    private static $data_source_name = "";

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

    /**
     * The connection options
     *
     * @var array
     */
    private static $options = array();


    // ----- Getter -----


    public static function get_db_connection() {
        return self::$connection;
    }

    public static function get_auto_connect() {
        return self::$auto_connect;
    }

    public static function get_dsn() {
        return self::$data_source_name;
    }

    public static function get_db_user() {
        return self::$db_user;
    }

    public static function get_db_password() {
        return self::$db_password;
    }

    public static function get_options() {
        return self::$options;
    }


    // ----- Setter -----


    /**
     * Function to configure the database object with the configuration array
     *
     * @param array $config_array
     */
    public static function init_from_config(array $config_array) {
        // Auto connection
        if(isset($config_array["auto_connect"])) {
            self::$auto_connect = $config_array["auto_connect"];
        }

        // Data source name
        if(isset($config_array["dsn"])) {
            self::$data_source_name = $config_array["dsn"];
        }

        // User name
        if(isset($config_array["user"])) {
            self::$db_user = $config_array["user"];
        }

        // User password
        if(isset($config_array["password"]))     {
            self::$db_password = $config_array["password"];
        }

        // Options
        if(isset($config_array["options"])) {
            self::$options = $config_array["options"];
        }
    }


    // ----- Object methods -----


    /**
     * This method create the pdo connection with the configuration
     *
     * @throws PDOException If there is an error in connection
     */
    public static function connect() {
        try {
            self::$connection = new PDO(self::$data_source_name, self::$db_user, self::$db_password, self::$options);
        } catch (PDOException $e) {
            KISHandler::handle_exception($e, "PDO can't open database connection", TRUE);
        }
    }

    /**
     * Disconnect from the database
     */
    public static function disconnect() {
        self::$connection = null;
    }

    public static function prepare_statement(string $sql, array $args = array()) {

    }


}