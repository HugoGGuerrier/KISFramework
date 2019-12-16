<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

// Check the needed variables
if( !(isset($error_title) AND isset($error_object) AND isset($stop_exec)) OR is_null($error_object) ) {
    exit("Error : Please follow the error reporting documentation !");
}

?>

<style>

</style>

<div>
    <h1>KIS Error !</h1>

    <p id="error-title"><?php echo $error_title ?></p>

    <div id="exception-container">
        <?php
        if(ENV === 0) {
            $message = $error_object->getMessage();
            $file = $error_object->getFile();
            $line = $error_object->getLine();
            $stack_trace = $error_object->getTrace();

            $res = "<p id='exception-message'>Error message : $message</p>";
            $res .= "<p id='exception-file'>In file : $file</p>";
            $res .= "<p id='exception-line'>At line : $line</p>";
            $res .= "<div id='exception-trace-container'>";
            foreach ($stack_trace as $step) {
                $res .= "<p class='trace-line'>- in " . $step['file'] . " at line " . $step['line'] . " in function " . $step['function'] . "</p>";
            }
            $res .= "</div>";

            echo $res;
        }
        ?>
    </div>

    <p id="exception-precision"><?php if($stop_exec) echo "Mortal Error !" ?></p>
</div>