<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * Class KISBadEncodingException
 *
 * This is a custom exception for a bad encoding
 *
 * @package KISFramework
 * @subpackage system/lib
 * @author Hugo Guerrier
 */
class KISBadEncodingException extends Exception {

    /**
     * KISBadEncodingException constructor, call to parent.
     *
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }

}