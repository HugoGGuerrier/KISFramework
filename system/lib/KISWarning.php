<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * Class KISWarning
 *
 * This class represents a warning from the framework
 *
 * @package KISFramework
 * @subpackage system/lib
 * @author Hugo Guerrier
 */
class KISWarning {


    // ----- Attributes -----


    /**
     * The title of the warning
     *
     * @var string
     */
    private $title = "Unnamed warning";

    /**
     * The message of the warning
     *
     * @var string
     */
    private $message = "";


    // ----- Constructors -----


    /**
     * Construct a new warning with it's name and title
     *
     * @param $title
     * @param $message
     */
    public function __construct($title, $message) {
        $this->title = $title;
        $this->message = $message;
    }


    // ----- Getter -----


    public function get_title() {
        return $this->title;
    }

    public function get_message() {
        return $this->message;
    }


    // ----- Setter -----


    public function set_title($title) {
        $this->title = $title;
    }

    public function set_message($message) {
        $this->message = $message;
    }


}