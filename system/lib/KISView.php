<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

/**
 * Class KISView
 *
 * This class model a view to render with its params
 */
class KISView {


    // ----- Attributes -----


    /**
     * The file of the wanted view
     *
     * @var string
     */
    private $view_file = "";

    /**
     * An array with all the param to render the view
     *
     * @var array
     */
    private $view_params = array();


}