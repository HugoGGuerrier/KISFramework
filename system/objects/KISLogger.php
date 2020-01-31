<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * Class KISLogger
 *
 * This object is use to log actions of the framework, user can do it also.
 *
 * @package KISFramework
 * @subpackage system/object
 * @author Hugo Guerrier
 */
class KISLogger {


    // ----- Class methods -----


    /**
     * Log an exception easily
     *
     * @param Exception $exception The exception to log
     */
    public static function log_error(Exception $exception) {
        // TODO : format the log exception
    }

    /**
     * Log a warning
     *
     * @param KISWarning $warning The warning to load
     */
    public static function log_warning(KISWarning $warning) {
        // TODO : format the log warning
    }

    /**
     * Log an info message
     *
     * @param string $info The info to log
     */
    public static function log_info(string $info) {
        self::write_log($info, "info.log");
    }

    /**
     * The short method to write a log line in the web.log file
     *
     * @param string $message The message to write
     */
    public static function log_web(string $message) {
        self::write_log($message, "web.log");
    }

    /**
     * The short method to write a log line in the api.log file
     *
     * @param string $message The message to write
     */
    public static function log_api(string $message) {
        self::write_log($message, "api.log");
    }

    /**
     * The short method to write a log line in the database.log file
     *
     * @param string $message The message to write
     */
    public static function log_database(string $message) {
        self::write_log($message, "database.log");
    }

    /**
     * Write a log message in any log file (In the log app folder)
     *
     * @param string $message The message to write
     * @param string $log_file The file to write the message
     */
    public static function write_log(string $message, string $log_file) {

    }


}