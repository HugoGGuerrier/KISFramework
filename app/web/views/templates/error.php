<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

// Check the needed variables
if( !(
        isset($title) AND
        isset($message) AND
        isset($file) AND
        isset($line) AND
        isset($trace) AND
        isset($mortal)
    )
)
{
    exit("Error : Please follow the error reporting documentation !");
}

?>

<style>

</style>

<div>
    <h1>Error !</h1>

    <p id="error-title"><?php echo $title ?></p>

    <div id="exception-container">
        <?php
        if(ENV === 0) {
            $res = "<p id='exception-message'>Error message : $message</p>";
            $res .= "<p id='exception-file'>In file : $file</p>";
            $res .= "<p id='exception-line'>At line : $line</p>";
            $res .= "<div id='exception-trace-container'>";
            foreach ($trace as $step) {
                $res .= "<p class='trace-line'>- in " . $step['file'] . " at line " . $step['line'] . " in function " . $step['function'] . "</p>";
            }
            $res .= "</div>";

            echo $res;
        }
        ?>
    </div>

    <p id="exception-precision"><?php if($mortal) echo "Mortal Error !" ?></p>
</div>